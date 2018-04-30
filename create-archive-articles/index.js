import WPAPI from 'wpapi';
import cheerio from 'cheerio';
import dotenv from 'dotenv';
import fetch from 'isomorphic-fetch';

dotenv.config();
const { WP_USER, WP_PASS } = process.env;

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
    return wp
      .issues()
      .perPage(1)
      .order('asc')
      .orderby('meta_value')
      .param('meta_key', 'issue_number');
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

  // ignore: calendar, mailto

  let selector = 'body';
  if (issue_number > 1997.06) {
    // if (issue_number < )
  }

  const $links = $(selector).find('a:not([href^="mailto:"]):not([href^="#"])');
  return [...new Set($links.get().map((link, index) => $(link).attr('href')))];
};

const extractArticle = (html, issue) => {
  const { acf } = issue;
  const { issue_url, issue_type, issue_number } = acf;
  const n = parseFloat(issue_number);
  const $ = cheerio.load(html);

  const titleSelector = 'h1, h2, h3';
  if (issue_number > 1997.06) {
    // if (issue_number < )
  }
  const title = $(titleSelector)
    .first()
    .text()
    .trim();

  const contentSelector = 'body';
  if (issue_number > 1997.06) {
    // if (issue_number < )
  }
  const regex = new RegExp(title);
  const content = $(contentSelector)
    .first()
    .text()
    .replace(regex, '')
    .trim();

  return {
    title,
    content
  };
};

const init = async () => {
  const issues = await getIssues();

  issues.forEach(async issue => {
    // get issue URL
    const { acf } = issue;
    const { issue_url: issueUrl, issue_type: issueType, issue_number } = acf;

    if (issueType === 'archived') {
      let archive_articles = [];

      // fetch issue homepage
      const issueHtml = await fetchUrl(issueUrl);

      // extract table of contents links
      let links = getArticleLinks(issueHtml, issue);
      links.forEach(async link => {
        const articleUrl = link.match(/^(https?:)?\/\//) ? link : `${issueUrl}${link}`;
        const articleHtml = await fetchUrl(articleUrl);

        // for each TOC link, try to scrape 1) article title, and 2) article text
        if (articleHtml) {
          const { title, content } = extractArticle(articleHtml, issue);
          console.log('\n\n', articleUrl, '\n', title, '\n', content.substring(0, 20));

          // create archive_article post
          // add "From Issue" meta value to archive_article post
          // update issue "Archive Articles" meta value
        }
      });

      // update issue "Archive Articles" meta value
    }
  });
};

init();
