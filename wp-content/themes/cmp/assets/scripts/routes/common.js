export default {
  init() {
    // JavaScript to be fired on all pages

    //display menu items on desktop and mobile
    $('.nav > .menu-item, .nav--mobile > .menu-item').on('click', function(){
      var clicked = $(this);
      clicked.toggleClass('active')
      $('.nav > .menu-item, .nav--mobile > .menu-item').not(clicked).children().removeClass('active');
      $('.nav > .menu-item, .nav--mobile > .menu-item').not(clicked).removeClass('active');
      clicked.children().toggleClass('active');
    });

    //display drop down on mobile
    $('.nav-mobile-symbols__hamburger').on('click', function(){
      $('.plan').removeClass('active');
      $('.nav--mobile__search').removeClass('active');
      $('ul.nav--mobile').toggleClass('active');
    });

    //display search on mobile
    $('.nav-mobile-symbols__search').click(function(){
      $('.nav--mobile').removeClass('active');
      $('.plan').removeClass('active');
      $('.nav--mobile__search ').toggleClass('active');
    });

    //display plan your visit on mobile
    $('.nav-mobile__plan, .nav-mobile-symbols__down').click(function(){
      $('.nav--mobile').removeClass('active');
      $('.nav--mobile__search ').removeClass('active');
      $('.plan').toggleClass('active');
    });

    // $(document).click(function(event){
    //   var clicked = $(event.target);
    //   var mobileOpened = $('.nav--mobile').hasClass('active');
    //   var desktopOpened = $('.nav li.menu-item').hasClass('active');
    //
    //   if (desktopOpened && !clicked.hasClass('active')) {
    //     $('.nav li.menu-item').click();
    //   }
    //   if (mobileOpened && !clicked.hasClass('active')) {
    //     $('.nav--mobile').click();
    //   }
    // })






  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
