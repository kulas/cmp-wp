export default {
  init() {
    // JavaScript to be fired on all pages

    $('.nav > .menu-item, .nav--mobile > .menu-item').on('click', function(){
      var clicked = $(this);
      clicked.toggleClass('active')
      $('.nav > .menu-item, .nav--mobile > .menu-item').not(clicked).children().removeClass('active');
      $('.nav > .menu-item, .nav--mobile > .menu-item').not(clicked).removeClass('active');


      clicked.children().toggleClass('active');
    });



    $('.nav-mobile--toggle').on('click', function(){
      $('ul.nav--mobile').toggleClass('active');
    });






  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
