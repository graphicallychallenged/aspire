var curDay = 0;
jQuery(document).ready(function($){
  scheduleSlider($);

});



function getData ($,data) {
  
   $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: data,
      error: function() {
          //alert('Error loading PHP script.');
      },
      success: function(answer) {
        //console.log("got timeslot")
        //console.log(answer);
        //console.log($(".slider-nav .slick-current").data('slick-index'));
        
        $("#schedule-data-wrapper .day-"+curDay).html(answer); 

        //$("#schedule-data-wrapper").append(answer);  
        //$('#schedule-data-wrapper').slick('slickAdd',answer);  
        //$('#schedule-data-wrapper').slick("slickGoTo",$(".slider-nav .slick-current").data('slick-index'));
        //$("#schedule-data-wrapper .day-"+curDay).fadeIn(0);
        //$('#schedule-data-wrapper').animate({'opacity':'1'},{duration:400});

        //$('.slider-for,.slider-nav').slick('reinit');
        $(".slider-for .slick-list").height($("#schedule-data-wrapper .day-"+curDay).height());
      }
  });
}


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

  $('.slider-nav')
    .on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var btn = $('.slider-nav').find("a").eq(nextSlide);
      curDay = nextSlide;
      if (!btn.hasClass("ajaxed")) {
        
        btn.addClass("ajaxed");
        
        var _data = {
            action:       'get_timeslots_ajax',
            day:          btn.data('day'),
            nextday:      btn.data('nextday'),
            item_num:      btn.data('item-num')
          };
        
        getData($,_data);

        /*$('#schedule-data-wrapper').animate({'opacity':'0'},{duration:400,complete:function () {
          //$("#schedule-data-wrapper .day-"+curDay).fadeOut(0);
          
          getData($,_data);

        }});*/

      }
    })
    
    .slick({
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
}
