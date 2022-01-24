/* HTML SUGGEST IN POSTS */
function HtmlWallFriends(friends){ var Html = "";
	$.each(friends, function( i, fof ) {
		Html += '<li><div class="sug-card">'+
		'<a href="'+site_url+'/'+fof.user_name+'"><img src="'+fof.user_picture+'" alt="'+fof.user_name+' Profile Picture" /></a> '+
		'<div class="sug-details">'+fof.full_name+'</div>'+
		'<div>'+fof.btn+'</div>'+
		'</div></li>';
	});	
	return Html;
}


/* load sugest list */	 
function load_friend_suggest(){ 
	if($('.posts_load .post').length == 0){ setTimeout('load_friend_suggest()', 10000); return false; }
	$.ajax({type: 'post', url: site_ajax+"/?f=autocomplete&s=new_users", data:{'only':'combo'},
		cache : false, success : function(result) {
			if(result.count != 0&& result.result == 1){	   
				HtmlWallF = HtmlWallFriends(result.fof);
				$('.posts_load .post:eq(2)').closest('.post-container').before('<div class="panel panel-default panel-sug-post"> <div class="panel-heading"><strong>'+__['People you may know']+'</strong> <a class="l_m_f_s_1 '+pull_right+'" style="cursor:pointer;" onclick="load_more_friend_suggest($(this));"><i class="fa fa-repeat progress-icon" data-icon="repeat"></i></a> <div class="panel-body" style="max-width: 542px; padding:0; overflow: scroll; overflow-y: hidden; position: relative;"><ul>'+HtmlWallF+'</ul><div></div>');
			}
		} 
	}); 
}


/* LOAD IN START OF WEBSITE */	
$(function(){ 
	load_friend_suggest();
});	


$('body').on('click','.l_m_f_s_1', function(e){ e.preventDefault(); });


/* LOAD MORE */
function load_more_friend_suggest(self){
	self.find('.progress-icon').removeClass('fa-repeat').addClass('fa-spinner fa-spin');
	$.ajax({type: 'post', url: site_ajax+"/?f=autocomplete&s=new_users", 
		cache : false, success : function(result) {
			if(result.count != 0&& result.result == 1){	   
				HtmlWallF = HtmlWallFriends(result.fof);
				self.parent().find('.panel-body ul').html(HtmlWallF);
				self.find('.progress-icon').removeClass('fa-spinner fa-spin').addClass('fa-repeat');
			}
		} 
	}); 
}