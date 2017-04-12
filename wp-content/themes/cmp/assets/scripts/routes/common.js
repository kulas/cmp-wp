export default {
  init() {
    // JavaScript to be fired on all pages

    $('.nav__link').on('click', function(){
      $('.nav__dropdown', this).toggle(
        function(){$('.nav__dropdown', this).css({"display": "block"});
      })
    });

    $('.mobile__plan').on('click', function(){
      $('.mobile__expanded').toggleClass('show');
    });





  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
