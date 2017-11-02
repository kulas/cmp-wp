export default function setupTabs() {
  $('.tab__button').click(function(e) {
    e.preventDefault();

    const tab_index = $('.tab__button:visible').index($(this));
    if($(this).is('[aria-expanded="true"]')) {
      closeTabs();
    }
    else {
      setIndex(tab_index);
    }

  }).keyup(function(e) {
    e.preventDefault();

    const tab_index = $(this).is('.tab__link') ? $('.tab__button:visible').index($('.tab__link[aria-selected="true"]')) : $('.tab__button:visible').index($('.tab__button[aria-expanded="true"]'));
    if(e.key === 'ArrowRight') {
      setIndex(Math.min(tab_index + 1, $('.tab__button:visible').length - 1));
    }
    else if(e.key === 'ArrowLeft') {
      setIndex(Math.max(tab_index - 1, 0));
    }
  });

  if($('.tabs-list').is(':hidden')) {
    $('button.tab__button:first').click(); // collapse the tab accordion on mobile
  }
}

function setIndex(tab_index) {
  closeTabs();

  $(`.tab__link:visible:eq(${tab_index})`).attr(
    {
      tabindex: '0',
      'aria-selected': 'true',
    }
  );

  $(`.tab__title:visible:eq(${tab_index})`).attr('aria-expanded', 'true');
  $(`.tab-panel:eq(${tab_index})`).attr('aria-hidden', 'false');
}

function closeTabs() {
  $('.tab__link:visible').attr(
    {
      tabindex: '-1',
      'aria-selected': 'false',
    }
  );

  $('.tab__title:visible').attr('aria-expanded', 'false');
  $('.tab-panel').attr('aria-hidden', 'true');
}
