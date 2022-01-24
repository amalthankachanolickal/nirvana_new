$(function(){
	var c = 0;
	var ct = $('.publisher-box .postText');
	var ic = $('.publisher_colorbox input[name="color"]');
	
	$('body').on('click', '.js_colorbox', function() {
        $(this).toggleClass('active');
        $('.publisher_colorbox').slideToggle('fast');
		ic.val('');
		ct.removeAttr('style').removeClass('color_ph').css({'height' : '75px'});
		$('.publisher_colorbox ._3oi9').removeClass('_23jt');
		$('.publisher_colorbox ._3oi9:first').addClass('_23jt');
		c = 0;
    });
	
	function publisher_color(c){
		var ct = $('.publisher-box .postText');
	    var ic = $('.publisher_colorbox input[name="color"]');
	
		if(c == 1){ ct.css({'background-color':'rgb(252, 216, 114)' }); }
		else if(c == 2){ ct.css({'background-image':'linear-gradient(45deg, rgb(252, 216, 114) 0%, rgb(243, 83, 105) 100%)' }); }
		else if(c == 3){ ct.css({'background-color':'rgb(243, 83, 105)' }); }
		else if(c == 4){ ct.css({'background-color':'rgb(23, 172, 255)' }); }
		else if(c == 5){ ct.css({'background-color':'rgb(93, 63, 218)' }); }
		else if(c == 6){ ct.css({'background-color':'rgb(255, 0, 64)' }); }
		else if(c == 7){ ct.css({'background-image':'linear-gradient(45deg, rgb(255, 31, 70) 0%, rgb(30, 53, 199) 100%)' }); }
		else if(c == 8){ ct.css({'background-image':'linear-gradient(45deg, rgb(252, 54, 253) 0%, rgb(93, 63, 218) 100%)' }); }
		else if(c == 9){ ct.css({'background-color':'rgb(74, 144, 226)' }); }
		else if(c == 10){ ct.css({'background-image':'linear-gradient(45deg, rgb(102, 244, 133) 0%, rgb(23, 172, 255) 100%)' }); }
		else if(c == 11){ ct.css({'background-image':'linear-gradient(45deg, rgb(248, 240, 35) 0%, rgb(5, 174, 53) 100%)' }); }
		else if(c == 12){ ct.css({'background-color':'rgb(255, 99, 35)' }); }		
		else if(c == 13){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/13.jpg)' }); }
		else if(c == 14){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/14.jpg)' }); }
		else if(c == 15){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/15.jpg)' }); }
		else if(c == 16){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/16.jpg)' }); }
		else if(c == 17){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/17.jpg)' }); }
		else if(c == 18){ ct.css({'background-color':'rgb(95, 102, 115)' }); }
		else if(c == 19){ ct.css({'background-color':'rgb(17, 17, 17)' }); }
		else if(c == 20){ ct.css({'background-image':'linear-gradient(45deg, rgb(255, 0, 71) 0%, rgb(44, 52, 199) 100%)' }); }
		else if(c == 21){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/21.jpg)' }); }
		else if(c == 22){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/22.jpg)' }); }
		else if(c == 23){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/23.jpg)' }); }
		else if(c == 24){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/24.jpg)' }); }
		else if(c == 25){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/25.jpg)' }); }
		else if(c == 26){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/26.jpg)' }); }
		else if(c == 27){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/27.jpg)' }); }
		else if(c == 28){ ct.css({'background-image':'url('+site_url+'/assets/plugins/colorbox/images/28.jpg)' }); }
		
		if(c != 0){ 
			ct.addClass('color_ph');
			ct.css({'color':'rgb(255, 255, 255)', 'font-size':'30px', 'font-weight':'700', 'line-height':'1.2em', 'padding':'100px 27px', 'text-align':'center', 'background-repeat': 'no-repeat', 'background-size': '100% 100%', 'height' : '245px'});
			ic.val(c);
		} else {
			ct.removeClass('color_ph').css({'height' : '75px'});
			ic.val('');
		}
	}
	
	$('body').on('click', '.publisher_colorbox .btn', function() {
        $('.publisher_colorbox ._3oi9').removeClass('_23jt');
        $(this).find('._3oi9').addClass('_23jt');
		c = $(this).attr('data-id');
		ct.removeAttr('style');		
		publisher_color(c);
    });
	
	$('body').on('keyup','.publisher-box .postText', function(){  
		var self = $(this);
		var text = $(this).val();
		var count_text = parseInt(text.length);
		if(count_text>=50){
			$('.js_colorbox').parent().parent().hide();
			$('.js_colorbox').removeClass('active');
			$('.publisher_colorbox').hide();
			ic.val('');
			ct.removeAttr('style').removeClass('color_ph').css({'height' : '75px'});
			$('.publisher_colorbox ._3oi9').removeClass('_23jt');
			$('.publisher_colorbox ._3oi9:first').addClass('_23jt');
		} else {
			$('.js_colorbox').parent().parent().show();
			if(c != 0){				
				$('.js_colorbox').addClass('active');
				$('.publisher_colorbox').show();
				ic.val(c); 
				$('.publisher_colorbox ._3oi9').removeClass('_23jt');
				$('.publisher_colorbox .btn[data-id="'+c+'"] ._3oi9').addClass('_23jt');
				publisher_color(c);
			}
		}
	});

});