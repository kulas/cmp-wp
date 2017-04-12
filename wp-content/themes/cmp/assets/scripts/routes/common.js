export default {
  init() {
    // JavaScript to be fired on all pages

    $('.nav__link').on('click', function(){
      $('.nav__dropdown', this).toggle(
        function(){$('.nav__dropdown', this).css({"display": "block"});
      })
    });

    $('.mobile__plan').on('click', function(){
      if( $('.mobile__expanded').css('display') == 'none' ) {
        $('.mobile__expanded').css('display', 'block')
      }
      else {
        $('.mobile__expanded').css('display', 'none')
      }
    });

    $('.mobile--nav_link').on('click', function(){
      if( $(this).next().css('display') == 'block' ) {
        $(this).next().css('display', 'none');
        $('.mobile--arrow__container', this).html('<i class="fa fa-chevron-down" aria-hidden="true">')
      }
      else {
        $(this).next().css('display', 'block');
        $('.mobile--arrow__container', this).html('<i class="fa fa-chevron-up" aria-hidden="true">');
      }

    })



    // if( $('.mobile-nav--sub__items').css('display') == 'block' ) {
    //   alert('block!')
    // }
    // else {
    //   alert($('.mobile-nav--sub__items').css('display'));
    // }


  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
