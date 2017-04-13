export default {
  init() {
    // JavaScript to be fired on all pages

    $('.nav__link').on('click', function(){
      $('.nav__dropdown', this).slideToggle();
    });

    $('.mobile__plan').on('click', function(){
       $('.mobile__expanded').slideToggle();
    });

    $('.mobile--nav_link').on('click', function(){

      $(this).next().slideToggle();

      if( $(this).next().css('display') == 'none' ) {
        $('.mobile--arrow__container', this).html('<i class="fa fa-chevron-down" aria-hidden="true">')
        console.log($(this).next().css('display'))
      }

      else {
        $('.mobile--arrow__container', this).html('<i class="fa fa-chevron-up" aria-hidden="true">');
        console.log($(this).next().css('display'))
      }

      $('.mobile--nav_link').click(function() {
        var clicked = $(this);
        $('.mobile--nav_link').not(clicked).next().css('display', 'none')
        clicked.next().css('display', 'block')
      });


    })

    // $('.mobile--nav_link').on('click', function(){
    //   if( $(this).next().css('display') == 'block' ) {
    //     $(this).next().css('display', 'none');
    //     $('.mobile--arrow__container', this).html('<i class="fa fa-chevron-down" aria-hidden="true">')
    //   }
    //   else {
    //     $('.mobile--nav_link').css('display', 'none');
    //     $(this).next().css('display', 'block');
    //     $('.mobile--arrow__container', this).html('<i class="fa fa-chevron-up" aria-hidden="true">');
    //   }
    // })





  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
