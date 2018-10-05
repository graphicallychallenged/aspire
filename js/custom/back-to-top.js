// Back to Top
jQuery(function () {

  if (jQuery('.docs-top').length) {
    _backToTopButton()
    jQuery(window).on('scroll', _backToTopButton)
    function _backToTopButton () {
      if (jQuery(window).scrollTop() > 450) {
        jQuery('.docs-top').fadeIn()
      } else {
        jQuery('.docs-top').fadeOut()
      }
    }
  }

  // scroll body to 0px on click
  jQuery('.docs-top').click(function () {
      jQuery('body,html').animate({
          scrollTop: 0
      }, 800);
      return false;
  });

})
