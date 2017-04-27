export default {
  init() {
    // JavaScript to be fired on all pages

    // close all nav trays
    function closeNav() {
      $('.navMobile__search, .navmobile__planDrop, .nav--mobile, .overlay, .site-header').removeClass('active');
    }

    $(window).click(function() {
      closeNav();
    });

    $('.site-header').click(function(event){
        event.stopPropagation();
    });

    //display menu items on desktop and mobile
    $('.nav > .menu-item, .nav--mobile > .menu-item').on('click', function(){
      var clicked = $(this);
      clicked.toggleClass('active');
      //
      // $('.site-header').toggleClass('active');
      // $('.overlay').toggleClass('active');
      $('.nav > .menu-item, .nav--mobile > .menu-item').not(clicked).children().removeClass('active');
      $('.nav > .menu-item, .nav--mobile > .menu-item').not(clicked).removeClass('active');
      clicked.children().toggleClass('active');
    });

    //display drop down on mobile
    $('.nav__symHamburger').on('click', function(){
      //
      // $('.site-header').toggleClass('active');
      // $('.overlay').toggleClass('active');
      $('.navmobile__planDrop').removeClass('active');
      $('.navMobile__search').removeClass('active');
      $('ul.nav--mobile').toggleClass('active');
    });

    //display search on mobile
    $('.nav__symSearch').click(function(){
      //
      // $('.site-header').toggleClass('active');
      // $('.overlay').toggleClass('active');
      $('.nav--mobile').removeClass('active');
      $('.navmobile__planDrop').removeClass('active');
      $('.navMobile__search ').toggleClass('active');
    });

    //display plan your visit on mobile
    $('.nav__plan, .nav__symDown').click(function(){
      //
      // $('.site-header').toggleClass('active');
      // $('.overlay').toggleClass('active');
      $('.nav--mobile').removeClass('active');
      $('.navMobile__search ').removeClass('active');
      $('.navmobile__planDrop').toggleClass('active');
    });




    // $(document).click(function(){
    //   var clicked = $(this);
    //
    //   if ( !clicked.hasClass('nav-primary')) {
    //     $('.nav--mobile').removeClass('active');
    //     $('.navMobile__search ').removeClass('active');
    //     $('.plan').removeClass('active');
    //   }
    //
    // })






  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
