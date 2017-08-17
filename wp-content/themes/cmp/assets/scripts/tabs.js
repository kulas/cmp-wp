export default function setupTabs() {
  $('.tab__link').click(function(e) {
    e.preventDefault();

    const tab_index = $('.tab__link').index($(this));
    setIndex(tab_index);

  }).keyup(function(e) {
    e.preventDefault();

    const tab_index = $('.tab__link').index($('.tab__link[aria-selected="true"]'));
    if(e.key === 'ArrowRight') {
      setIndex(Math.min(tab_index + 1, $('.tab__link').length - 1));
    }
    else if(e.key === 'ArrowLeft') {
      setIndex(Math.max(tab_index - 1, 0));
    }
  });
}

function setIndex(tab_index) {
  $('.tab__link').attr(
    {
      tabindex: '-1',
      'aria-selected': 'false',
    }
  );

  $(`.tab__link:eq(${tab_index})`).attr(
    {
      tabindex: '0',
      'aria-selected': 'true',
    }
  );

  $('.tab-panel').attr('aria-hidden', 'true');
  $(`.tab-panel:eq(${tab_index})`).attr('aria-hidden', 'false');
}
