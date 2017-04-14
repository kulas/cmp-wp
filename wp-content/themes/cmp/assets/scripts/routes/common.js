export default {
  init() {
    // JavaScript to be fired on all pages

    $('.nav > .menu-item').on('click', function(){
      $('.sub-menu', this).toggleClass('active')
    });



    $('.nav-mobile--toggle').on('click', function(){
      $('ul.nav--mobile').toggleClass('active');
    });

    //
    // $('.mobile--nav_link').click(function() {
    //   var clicked = $(this);
    //   var upArrow = '<i class="fa fa-chevron-up" aria-hidden="true">';
    //   var downArrow = '<i class="fa fa-chevron-down" aria-hidden="true">'
    //
    //   if( clicked && clicked.next().hasClass('active') ) {
    //     clicked.find('.mobile--arrow__container').html(downArrow);
    //   }
    //
    //   else {
    //     $('.mobile--nav_link').not(clicked).next().removeClass('active');
    //     clicked.find('.mobile--arrow__container').html(upArrow);
    //     $('.mobile--nav_link').not(clicked).find('.mobile--arrow__container').html(downArrow);
    //   }
    //
    //
    //   clicked.next().toggleClass('active')

    // });



  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
