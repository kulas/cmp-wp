import WPAPI from 'wpapi';
import cheerio from 'cheerio';
import dotenv from 'dotenv';
import fetch from 'isomorphic-fetch';
import queue from 'queue';

dotenv.config();
const { WP_USER, WP_PASS } = process.env;

// init queue
let q = queue({
  concurrency: 5,
  autostart: true,
  timeout: 30000
});

// connect to WP
const wp = new WPAPI({
  endpoint: 'http://localhost:8000/wp-json',
  username: WP_USER,
  password: WP_PASS
});

wp.issues = wp.registerRoute('wp/v2', '/issue/(?P<id>)');
wp.articles = wp.registerRoute('wp/v2', '/archive_article/(?P<id>)');

// from https://github.com/WP-API/node-wpapi#using-pagination-headers
const getAll = async request => {
  try {
    return request.then(response => {
      if (!response._paging || !response._paging.next) {
        return response;
      }
      // Request the next page and return both responses as one collection
      return Promise.all([response, getAll(response._paging.next)]).then(responses => {
        return [].concat(...responses);
      });
    });
  } catch (error) {
    console.error(error);
  }
};

const getIssues = async () => {
  try {
    return getAll(
      wp
        .issues()
        .perPage(100)
        .order('asc')
        .orderby('meta_value')
        .param('meta_key', 'issue_number')
    );
  } catch (error) {
    console.error(error);
  }
};

const fetchUrl = async url => {
  try {
    const response = await fetch(url);
    return response.ok ? response.text() : '';
  } catch (error) {
    console.error(error);
  }
};

const getArticleLinks = (html, issue) => {
  const { acf } = issue;
  const { issue_url, issue_type, issue_number } = acf;
  const n = parseFloat(issue_number);
  const $ = cheerio.load(html);

  let selector = 'body';

  // ignore: calendar, mailto
  const $links = $(selector).find(
    'a:not([href^="mailto:"]):not([href^="#"]):not([href^="http"]):not([href="index.html"]):not([href$=".pdf"])'
  );
  return [
    ...new Set(
      Object.values(
        $links
          .get()
          .filter(link => $(link).attr('href'))
          .map((link, index) => ({
            title: $(link)
              .text()
              .replace(/\n/, ' ')
              .trim(),
            href: $(link).attr('href')
          }))
          // remove duplicate links, keeping the one with the longer title
          .reduce((validLinks, link) => {
            const { [link.href]: existingLink } = validLinks;
            if (existingLink) {
              if (link.title.length < existingLink.title.length) {
                return validLinks;
              }
            }

            validLinks[link.href] = link;
            return validLinks;
          }, {})
      )
    )
  ];
};

const extractContent = (html, issue) => {
  const { acf } = issue;
  const { issue_url, issue_type, issue_number } = acf;
  const n = parseFloat(issue_number);
  const $ = cheerio.load(html);

  const titleSelector = 'h1, h2, h3, .feature-page-title';
  const contentSelector = 'body';

  const title = $(titleSelector)
    .first()
    .text()
    .trim();

  const regex = title ? new RegExp(`.*?${title}`) : '';
  const content = $(contentSelector)
    .first()
    .text()
    .replace(regex, '')
    .trim();

  return { content, title: title.replace(/\n/, ' ').trim() };
};

const init = async () => {
  const issues = await getIssues();

  issues.forEach(issue => {
    // get issue URL
    const { acf, id } = issue;
    const {
      issue_url: issueUrl,
      issue_type: issueType,
      issue_season: issueSeason,
      issue_year: issueYear
    } = acf;
    let { issue_articles: issueArticles = [] } = acf;
    if (issueArticles === null) {
      issueArticles = [];
    }

    if (issueType === 'archived') {
      q.push(async issueCb => {
        // fetch issue homepage
        const issueHtml = await fetchUrl(issueUrl);
        let articleIds = [];

        // extract table of contents links
        let links = getArticleLinks(issueHtml, issue);
        links.forEach((link, index) => {
          const { title, href } = link;

          q.push(async linkCb => {
            const articleUrl = href.match(/^(https?:)?\/\//) ? href : `${issueUrl}${href}`;
            const articleHtml = await fetchUrl(articleUrl);

            // for each TOC link, try to scrape 1) article title, and 2) article text
            if (articleHtml) {
              const { content, title: extractedTitle } = extractContent(
                articleHtml,
                issue,
                articleUrl
              );

              let newTitle = title ? title : extractedTitle;
              if (!newTitle) {
                if (articleUrl.match(/editor_note.html$/)) {
                  if (articleUrl.match(/\/2005\/summer\//)) {
                    newTitle = "President's Note";
                  } else {
                    newTitle = "Editor's Note";
                  }
                } else {
                  console.log(link, `No title for: ${articleUrl}`);
                }
              }

              // create archive_article post
              q.push(articleCb => {
                try {
                  wp
                    .articles()
                    .create({
                      title: `${newTitle} (${issueSeason} ${issueYear})`,
                      content,
                      status: 'publish',
                      fields: {
                        from_issue: id,
                        article_url: articleUrl
                      }
                    })
                    .then(response => {
                      const { id: articleId } = response;
                      if (!articleId) {
                        console.warn(`Post not created for: ${articleUrl}`);
                      } else {
                        articleIds.push(articleId);
                      }

                      // if this is the last link/article, update issue "Issue Articles" meta value
                      if (index === links.length - 1) {
                        q.push(metaCb => {
                          try {
                            wp
                              .issues()
                              .id(id)
                              .update({
                                fields: {
                                  ...acf,
                                  issue_articles: articleIds
                                }
                              })
                              .then(metaResponse => {
                                // queue callback
                                metaCb();
                              });
                          } catch (error) {
                            console.error(error);

                            // queue callback
                            metaCb();
                          }
                        });
                      }

                      // queue callback
                      articleCb();
                    });
                } catch (error) {
                  console.error(error);

                  // queue callback
                  articleCb();
                }
              });
            }

            // queue callback
            linkCb();
          });
        });

        // queue callback
        issueCb();
      });
    }
  });
};

init();
