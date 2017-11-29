function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    let j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

export default {
  init() {
    // randomize featured exhibits
    const exhibitsJSON = window.exhibitsJSON;

    if (exhibitsJSON) {
      // check featured exhibit ID cookie value and shuffle exhibits until first one is different
      shuffleArray(exhibitsJSON);
      while (parseInt($.cookie('featured_exhibit_id'), 10) === exhibitsJSON[0].exhibit_image.id) {
        shuffleArray(exhibitsJSON);
      }

      // store/update cookie with new featured exhibit image ID
      $.cookie('featured_exhibit_id', exhibitsJSON[0].exhibit_image.id);

      // loop through each exhibit and update its content
      const $exhibits = $('[data-exhibit-id]');
      $exhibits
        .each((index, exhibitEl) => {
          const $exhibit = $(exhibitEl);
          const exhibit = exhibitsJSON[index];

          // update link
          $exhibit.find('a').attr('href', exhibit.link);

          // update image
          const imageSrc = exhibit.exhibit_image.url;
          $exhibit.find('.hero-header img').attr('src', imageSrc);
          $exhibit.find('.exhibit__image').css({
            backgroundImage: `url('${imageSrc}')`,
          });

          // update credit and caption
          $exhibit.find('.media-details__credit').html(exhibit.exhibit_image.credit);
          $exhibit.find('.media-details__caption').html(exhibit.exhibit_image.caption);

          // update title
          $exhibit.find('h2.button--link a').html(exhibit.title);

          // update summary
          $exhibit.find('.exhibit-preview__summary-text').html(exhibit.summary);

          // update dates
          $exhibit.find('.start-date').html(exhibit.dates);
        })

        // show the featured exhibits
        .css({
          opacity: 1,
          visibility: 'visible',
        })
      ;
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
