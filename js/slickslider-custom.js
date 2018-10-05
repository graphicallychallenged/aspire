
function scheduleSlider($) {

  $('.slider-for').slick({ 
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    asNavFor: '.slider-nav',
    adaptiveHeight: true,
    infinite: false,
    draggable: false,
    arrows: false
  });

  $('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    infinite: false,
    dots: false,
    centerMode: false,
    arrows: true,
    focusOnSelect: true,
    responsive: [
        {
          breakpoint: 1170,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 970,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
  });
};
