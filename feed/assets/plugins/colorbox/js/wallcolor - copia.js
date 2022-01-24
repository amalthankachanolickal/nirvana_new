    $('body').on('click', '.js_colorbox', function() {
        $(this).toggleClass('active');
        $('.publisher_colorbox').slideToggle('fast');
    });
	
	$('body').on('click', '.publisher_colorbox .btn', function() {
		var ic = $('.publisher_colorbox input[name="background_color"]');
		var ii = $('.publisher_colorbox input[name="background_image"]');
        $('.publisher_colorbox ._3oi9').removeClass('_23jt');
        $(this).find('._3oi9').addClass('_23jt');
		var c = $(this).attr('data-id');
		$('.publisher_box .postText').removeAttr('style');		
		
		if(c == 1){ $('.publisher_box .postText').css({'background-color':'rgb(252, 216, 114)' }); ic.val(c); ii.val('');}
		else if(c == 2){ $('.publisher_box .postText').css({'background-image':'linear-gradient(45deg, rgb(252, 216, 114) 0%, rgb(243, 83, 105) 100%)' }); ii.val(c); ic.val(''); }
		else if(c == 3){ $('.publisher_box .postText').css({'background-color':'rgb(243, 83, 105)' }); ic.val(c); ii.val(''); }
		else if(c == 4){ $('.publisher_box .postText').css({'background-image':'linear-gradient(45deg, rgb(102, 244, 133) 0%, rgb(23, 172, 255) 100%)' }); ii.val(c); ic.val(''); }
		else if(c == 5){ $('.publisher_box .postText').css({'background-color':'rgb(74, 144, 226)' }); ic.val(c); ii.val(''); }
		else if(c == 6){ $('.publisher_box .postText').css({'background-image':'linear-gradient(45deg, rgb(252, 54, 253) 0%, rgb(93, 63, 218) 100%)' }); ii.val(c); ic.val(''); }
		else if(c == 7){ $('.publisher_box .postText').css({'background-color':'rgb(95, 102, 115)' }); ic.val(c); ii.val(''); }
		
		if(c != 0){ 
			$('.publisher_box .postText').addClass('color_ph');
			$('.publisher_box .postText').css({'color':'rgb(255, 255, 255)', 'font-size':'30px', 'font-weight':'700', 'line-height':'1.2em', 'padding':'100px 27px', 'text-align':'center', 'height' : '245px'});
		} else {
			$('.publisher_box .postText').removeClass('color_ph');
			$('.publisher_box .postText').css({'height' : '75px'});
			ic.val('');
		    ii.val('');
		}
    });