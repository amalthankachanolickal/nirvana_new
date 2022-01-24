
    
/* INDEX
----------------------------------------------------------------------------------------

01. Preloader js

02. change Menu background on scroll js 

03. Navigation js

04. Smooth scroll to anchor

05. Scroll-to-top

06. Portfolio js

07. Magnific Popup js

08. Testimonial js

09. owl slider js for home and blog

10. client js

11. Google Map js

12. Ajax Contact Form js

13. Mailchimp js

-------------------------------------------------------------------------------------- */





(function($) {
'use strict';

    var bzone = $(window);

    /*-------------------------------------------------------------------------*
     *                  01. Preloader js                                       *
     *-------------------------------------------------------------------------*/
      bzone.on( 'load', function(){
        
          $('#preloader').delay(300).fadeOut('slow',function(){
            $(this).remove();
          });    

      }); // $(window).on end



    /*-------------------------------------------------------------------------*
     *             02. change Menu background on scroll js                     *
     *-------------------------------------------------------------------------*/
     bzone.on('scroll', function () {

          var menu_area = $('.menu-area');

          if (bzone.scrollTop() > 0) {
              menu_area.addClass('sticky-menu');
          } else {
              menu_area.removeClass('sticky-menu');
          }
      }); // $(window).on('scroll' end




    /*-------------------------------------------------------------------------*
     *                   03. Navigation js                                     *
     *-------------------------------------------------------------------------*/
      $(document).on('click', '.navbar-collapse.in', function (e) {
          if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
              $(this).collapse('hide');
          }
      });

      $('body').scrollspy({
          target: '.navbar-collapse',
          offset: 195
      });



    /*-------------------------------------------------------------------------*
     *                   04. Smooth scroll to anchor                           *
     *-------------------------------------------------------------------------*/
      $('a.smooth_scroll').on("click", function (e) {
          e.preventDefault();
          var anchor = $(this);
          $('html, body').stop().animate({
              scrollTop: $(anchor.attr('href')).offset().top - 50
          }, 1000);
      });


      /*-------------------------------------------------------------------------*
     *                       5. Scroll-to-top                           *
     *-------------------------------------------------------------------------*/ 
    bzone.on( 'scroll', function () {

      var top_top = $('#scroll-to-top');

      if (bzone.scrollTop() > 500) {
        top_top.fadeIn();
      } else {
        top_top.fadeOut();
      }
    });
        /*END SCROLL TO TOP*/


    /*-------------------------------------------------------------------------*
     *                  06. Portfolio js                                       *
     *-------------------------------------------------------------------------*/
      $('.portfolio').mixItUp();



    /*-------------------------------------------------------------------------*
     *                  07. Magnific Popup js                                  *
     *-------------------------------------------------------------------------*/
      $('.work-popup').magnificPopup({
          type: 'image',
          gallery: {
              enabled: true
          },
          zoom: {
              enabled: true,
              duration: 300, // don't foget to change the duration also in CSS
              opener: function(element) {
                  return element.find('img');
              }
          }
          
      });
      

      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
      });


    /*-------------------------------------------------------------------------*
     *                  08. Testimonial js                                     *
     *-------------------------------------------------------------------------*/
      $(".testimonial-list").owlCarousel({
          slideSpeed      : 1000,
          paginationSpeed : 500,
          singleItem      : true,
          lazyLoad        : false,
          pagination      : true,
          navigation      : false,
          autoPlay        : true,
      });


      /*-------------------------------------------------------------------------*
     *                    9. owl slider js for home and blog                                    *
     *-------------------------------------------------------------------------*/
    $(".owl-slider").owlCarousel({
          items               : 1,
          itemsDesktop        : [1199, 1],
          itemsDesktopSmall   : [980, 1],
          itemsTablet         : [768, 1],
          itemsMobile         : [479, 1],
          pagination          : false,
          navigation          : true,
          navigationText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
      });


    /*-------------------------------------------------------------------------*
     *                       10. client js                                     *
     *-------------------------------------------------------------------------*/
      $(".owl-client").owlCarousel({
          items               : 4,
          autoPlay            : true,
          itemsDesktop        : [1199, 3],
          itemsDesktopSmall   : [980, 2],
          itemsTablet         : [768, 2],
          itemsMobile         : [479, 1],
          pagination          : false,
          navigation          : true,
          autoHeight          : false,
		  navigationText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
      });

      $(".team-slide").owlCarousel({
          items               : 4,
          autoPlay            : true,
          itemsDesktop        : [1199, 3],
          itemsDesktopSmall   : [980, 2],
          itemsTablet         : [768, 2],
          itemsMobile         : [479, 1],
          pagination          : false,
          navigation          : true,
          navigationText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
      });


    		
    /*-------------------------------------------------------------------------*
     *                       12. Google Map js                                 *
     *-------------------------------------------------------------------------*/

    var myCenter=new google.maps.LatLng(23.779908,90.3669903);
    function initialize()
    {
      var mapProp = {
        center:myCenter,
        scrollwheel: false,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("contactgoogleMap"),mapProp);
      var marker=new google.maps.Marker({
        position:myCenter,
        animation:google.maps.Animation.BOUNCE,
        icon:'assets/img/map-marker.png',
        map: map,
      });
      var styles = [
        {
          stylers: [
            { hue: "#c5c5c5" },
            { saturation: -100 }
          ]
        },
      ];
      map.setOptions({styles: styles});
      marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
		





    /*-------------------------------------------------------------------------*
     *                  12. Ajax Contact Form js                               *
     *-------------------------------------------------------------------------*/
      // Get the form.
      var form = $('#ajax-contact');

      // Get the messages div.
      var formMessages = $('#form-messages');

      // Set up an event listener for the contact form.
      $(form).on('submit', function(e) {
          // Stop the browser from submitting the form.
          e.preventDefault();

          // Serialize the form data.
          var formData = $(form).serialize();

          // Submit the form using AJAX.
          $.ajax({
              type: 'POST',
              url: $(form).attr('action'),
              data: formData
          })
          .done(function(response) {
              // Make sure that the formMessages div has the 'success' class.
              $(formMessages).removeClass('error');
              $(formMessages).addClass('success');

              // Set the message text.
              $(formMessages).text(response);

              // Clear the form.
              $('#name').val('');
              $('#email').val('');
              $('#subject').val('');
              $('#phone').val('');
              $('#message').val('');

          })
          .fail(function(data) {
              // Make sure that the formMessages div has the 'error' class.
              $(formMessages).removeClass('success');
              $(formMessages).addClass('error');

              // Set the message text.
              if (data.responseText !== '') {
                  $(formMessages).text(data.responseText);
              } else {
                  $(formMessages).text('Oops! An error occured and your message could not be sent.');
              }
          });

      });



        /*-------------------------------------------------------------------------*
         *                   13. MailChimp js                                    *
         *-------------------------------------------------------------------------*/
          $('#mc-form').ajaxChimp({
            language: 'en',
            callback: mailChimpResponse,

            // ADD YOUR MAILCHIMP URL BELOW HERE!
            url: 'http://coderspoint.us14.list-manage.com/subscribe/post?u=e5d45c203261b0686dad32537&amp;id=d061f39c51'
            
          });

          function mailChimpResponse(resp) {
            if (resp.result === 'success') {
              $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
              $('.mailchimp-error').fadeOut(400);

            } else if(resp.result === 'error') {
              $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
            }  
          }

		// Home Page Slider Settings
		 $('#carousel-example-generic').carousel({
			interval: 5000,
			cycle: false
		  }); 

		  
		  
})(jQuery);