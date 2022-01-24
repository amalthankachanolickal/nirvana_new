/* reaction.js (v2)
 * @autor: Pp Galvan - LdrMx
 */


$(document).click(function(e) { 
	if($(e.target).closest(".story-react-container").length == 0) { 
		$('.emotionreaction').html('');
	}
});   


function ReactionsHtmL(post_id, result){ var rHtml = '';
	$.each(result.result, function(i,val){
		rHtml += '<span data-title="'+val.text+'" class="btn" onclick="set_reaction($(this), \''+val.key+'\', '+post_id+');" title="'+val.text+'"><img src="'+site_url+'/'+val.src+'" alt="'+val.text+'" data-title="'+val.text+'"></span>';
	});
	return rHtml;
}


$('body').on('mouseover','.story-react-container',function(){ 
	if($(this).find('.emotionreaction').html() == ''){ 
		var post_id = $(this).closest('.post').attr('data-post-id');
		var reac_html = ReactionsHtmL(post_id, reactions_array);
		$(this).find('.emotionreaction').html('<div class="story-react-wrapper" style="position: absolute;">'+reac_html+'</div>');
	}
});	



// Like story
function set_reaction(self, r, post_id){
		
    story_container = $(".post[data-post-id="+post_id+"]");   
	like_button = story_container.find('.story-like-btn');
    like_activity_button = story_container.find('.story-like-activity');
    
    // count
	var count = story_container.find('.post-like-status').attr('data-count');
	// attr old btn
	var r_t = story_container.find('.story-react-container .text-link').attr('title');
	// attr old like
	var is_like = story_container.find('.post-like-status').attr('data-like');
	
	// get info - important
	var r_html = get_reaction(r, r_t, post_id);
	
	//show btn return
	story_container.find('.story-react-container').html(r_html.html);	
	
	// attr new btn
	var r_t_check = story_container.find('.story-react-container .text-link').attr('title');
	// attr new like
	var is_like_check = story_container.find('.post-like-status').attr('data-like');
	
	//insert emotion
	story_container.find('.r_img').html(r_html.icon);	
	
	if(r_html.icon == ''){		
			story_container.find('.post-like-status').attr({'data-like':''});	
			story_container.find('.post-like-status').attr({'data-count': (parseInt(count)-1)});
			
			//alert(r_t+'-'+r_t_check+'-'+count+'-'+is_like);
	
			//r_t == r_t_check
			if(r_t_check == ''){
				if(count == 0){
					story_container.find('.post-like-status .u_i_1').html('');
					story_container.find('.r_img_old').html('');
					story_container.find('.r_img').html('');
				} else if(count == 1 && is_like == 1){ 
					story_container.find('.post-like-status .u_i_1').html('');
					story_container.find('.r_img_old').html('');
					story_container.find('.r_img').html('');
				} else if(count == 1 && is_like == 0){
					story_container.find('.post-like-status .u_i_1').html('');
					story_container.find('.r_img_old img').show();
				} else if(count == 2 && is_like == 1){ 
					story_container.find('.post-like-status .u_i_1').html('');
					story_container.find('.r_img_old img').show();
				} else {
					//story_container.find('.post-like-status .u_i_1').html('');
					// new count
					var new_count = story_container.find('.post-like-status').attr('data-count');
					story_container.find('.post-like-status .u_i_2').html(new_count);
					story_container.find('.r_img_old img').show();
				}
			}
	}else {
		
		story_container.find('.post-like-status').attr({'data-like':'1'});			
		if(r_t != r_t_check && is_like == 0){
			story_container.find('.post-like-status').attr({'data-count': (parseInt(count)+1)});	
		}
		
		//alert(r_t+'-'+r_t_check+'-'+count+'-'+is_like);
		if(count == 0 && is_like == ''){
			story_container.find('.post-like-status .u_i_1').html(__['You like this']);
		} else if(count == 1 && is_like == 1){ 
			story_container.find('.post-like-status .u_i_1').html(__['You like this']);
			story_container.find('.r_img_old').html('');
		} else if(count == 1 && is_like == 0){ 
			story_container.find('.post-like-status .u_i_1').html(__['You and']);
			story_container.find('.r_img_old img[data-r='+r_html.key+']').hide();
		} else if(count == 2 && is_like == 1){ 
			story_container.find('.post-like-status .u_i_1').html(__['You and']);
			story_container.find('.r_img_old img[data-r='+r_html.key+']').hide();
		} else {
			//story_container.find('.post-like-status .u_i_1').html(__['You']);
			// new count
	        var new_count = story_container.find('.post-like-status').attr('data-count');
			story_container.find('.post-like-status .u_i_2').html(new_count);
			story_container.find('.r_img_old img[data-r='+r_html.key+']').hide();
		}	
					
	} 
	
	//show 
	if(count == 0){ 
		story_container.find('.js_post-likes').show(); 
	}
    
	$.get( site_ajax,{'f':'combo', 's':'like', 'reaction': r, 'post_id': post_id },function(data){
            /**/if(data.status == 200){   
			     if(data.liked == true){
				    //show likes count
                    //like_button.after(data.button_html).remove();
                    like_activity_button.html(data.activity_html);
                    //story_container.find('.js_post-likes').show();				
				} else {
				    //hidden likes count
                    //like_button.after(data.button_html).remove();
                    like_activity_button.html(data.activity_html);
					/*if(parseInt(story_container.find('#likes').text()) == 0) {
                       story_container.find('.js_post-likes').hide();
                    }*/	
                }
            }
	});

}


//coment photo theater
$('body').on('click', '.comment-image a', function(event){ event.preventDefault(); ;
	var img = $(this).attr('href');
	$('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lightbox-content"><div class="story-img"><img src="'+img+'" alt="media"></div></div></div>');
});