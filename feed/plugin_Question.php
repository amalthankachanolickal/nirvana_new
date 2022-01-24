<?php
 /* Question plugin
  * Plugins for Wowonder
  * @author Pepe Galvan - LdrMx
  */
    
	/* default */
    $question_list = array(); 
    $post_question = array();
    $view_question = ( isset($_POST['view']) ? $_POST['view'] : ( isset($_GET['view']) ? $_GET['view'] : '' ) ); 
	
	// load css
	$wo['plugin_list']['header_css'][] = 'question/css/question';
   
    if($wo['system']['question_enable_show_in_profile'] == 1){
       /*view*/
       $wo['plugin_list']['profile_view'][] = 'question'; 
       /*profile content*/
       $wo['plugin_list']['profile_content'][] = array('question' => 'question/profile_content_question.phtml');  
       /*tab name and icons and active for*/
       $wo['plugin_list']['plugin_profile'][] = array('id' => 'question', 'for' => 'active', 'icon' => 'fa-bar-chart', 'text' => $wo['lang']['plugin_question_questions'] );   
    }
	    
	if ($wo['loggedin'] == true) {
		
		/* class of plugin */
		include "assets/plugins/question/class-question.php";      	  
		
		//ADMIN
		if($plugin_page == "admin-plugins"){
			$wo['plugin_list']['admin_menu'][] = array('Question Setting'=>'question_setting','Question List'=>'question_list');  
			$wo['plugin_list']['admin_tab'][] = array('question_setting'=>'question/admin/question_setting', 'question_list'=>'question/admin/question_list');
		}

	
    /* start menus and tabs array list */
    $wo['plugin_list']['header'][] = 'question/header_question';
  

    }
    if($wo['loggedin'] == true){
	   // load js
	   $wo['plugin_list']['footer_js'][] = 'question/js/question';
       // menu home
	   //$wo['plugin_list']['plugin_menu'][] = array('name' => 'question', 'link' => 'questions', 'url' => $wo['config']['site_url'].'/'.$wo['user']['username'].'/questions', 'icon'=> 'fa-bar-chart', 'title' => $wo['lang']['plugin_question_questions'] );
    }
	
    //wall name and icons
    $wo['plugin_list']['plugin_wall'][] = array('name' => 'question', 'id' => 'question', 'icon'=> 'fa-bar-chart', 'for' => 'disable', 'text' => $wo['lang']['plugin_question_questions'] ); 
	$wo['plugin_list']['plugin_wall_menu'][] = array('name' => 'question', 'id' => 'question', 'icon'=> 'fa-bar-chart', 'text' => $wo['lang']['plugin_question_questions'] ); 
    $wo['plugin_list']['plugin_wall_tabs'][] = array('name' => 'question', 'id' => 'question', 'icon'=> 'fa-bar-chart', 'tab_input' => 'new', 'text' => $wo['lang']['plugin_question_questions'] ); 
    
    /*conten profile
    if($wo['system']['question_enable_show_in_profile'] == 1){
        if($plugin_page == 'timeline' && $view_question == 'question'){
            //check owner profile
            if($_GET['username'] != $user->_data['user_name']){
               // get profile info
               $get_profile = $sqlConnect->query("SELECT user_id FROM Wo_Users WHERE user_name = '".$_GET['username']."' LIMIT 1");
                     if($get_profile->num_rows != 0){ 
                        $get_plugin_user = $get_profile->fetch_array(MYSQLI_ASSOC); 
                        $owner_id = $get_plugin_user['user_id']; 
                     }
            } else { 
			    $owner_id = $user->_data['user_id'];
			}
  		    $where = " question_user_id='{$owner_id}' ";
  		    // get question list
  		    $question_list = Question::get_question_lists(10, FALSE, FALSE, " question_id DESC ", $where); 
  		}
  		if(count($question_list)>0){
  		    foreach($question_list['question'] as $question){
  		       // get post
			   $post_question[] = $user->get_post($question['post_id'], true, false);
  		    }
  		 }
	}*/
?>