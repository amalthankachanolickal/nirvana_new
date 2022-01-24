<?php
/* Plugin Ads Advanced
 * @author Pp Galvan - LdrMx
 */
 
/*class of plugin*/
include_once "assets/plugins/points/functions-points.php";
include_once "assets/plugins/points/class-points.php";

/*gets*/  
$view_points = ( isset($_POST['view']) ? $_POST['view'] : ( isset($_GET['view']) ? $_GET['view'] : '' ) );

//ADMIN
if($plugin_page == "admin-plugins"){

	/*start menus and tabs array list*/
	$wo['plugin_list']['admin_menu'][] = array('Assing Activity Points' => 'points_assign', 'Give Points' => 'points_give', 'Points Offerts'=>'points_offerts', 'Points Shop'=>'points_shop', 'Points Shop Users' =>'points_shop_users', 'Points Ranks'=>'points_ranks', 'Points Setting'=>'points_setting');
	
	$wo['plugin_list']['admin_tab'][] = array(
	'points_give' => 'points/admin/userpoints_give', 
	'points_assign' => 'points/admin/userpoints_assign', 
	'points_offerts'=>'points/admin/userpoints_offers', 
	'points_shop'=>'points/admin/userpoints_shop', 
	'points_shop_users'=>'points/admin/userpoints_shop_users', 
	'points_ranks'=>'points/admin/userpoints_pointranks', 
	'points_setting' => 'points/admin/userpoints'
	);

}

/*index content*/	
$wo['plugin_list']['plugin_wo'][] = array('invite' => 'index', 'user_points' => 'index', 'user_points_offers' => 'index', 'user_points_shop' => 'index', 'user_points_top' => 'index'); 

$wo['plugin_list']['index_content'][] = array('invite' => 'points/invite.phtml', 'user_points' => 'points/user_points.phtml', 'user_points_offers' => 'points/user_points_offers.phtml', 'user_points_shop' => 'points/user_points_shop.phtml', 'user_points_top' => 'points/user_points_top.phtml');  

/*load js and css */
//$wo['plugin_list']['header_css'][] = 'points/css/points';
$wo['plugin_list']['footer_js'][] = 'points/js/points';

if($wo['loggedin'] == true){

	//menu home
	$wo['plugin_list']['plugin_menu'][] = array('name' => 'invite', 'link' => 'invite',  'icon'=> 'fa-users', 'title' => $wo['lang']['plugin_point_invite_friends'] );   
	$wo['plugin_list']['plugin_menu'][] = array('name' => 'user_points', 'link' => 'user_points',  'icon'=> 'fa-star', 'title' => $wo['lang']['plugin_point_my_points'] ); 
	// header
	$wo['plugin_list']['plugin_head_menu_down'][] = array('name' => 'invite', 'class'=>'visible-xs-block', 'url' => '', 'link' => 'invite', 'icon'=> 'fa-users', 'title' => $wo['lang']['plugin_point_invite_friends'] );
	$wo['plugin_list']['plugin_head_menu_down'][] = array('name' => 'user_points', 'class'=>'visible-xs-block', 'url' => '', 'link' => 'user_points', 'icon'=> 'fa-star', 'title' => $wo['lang']['plugin_point_my_points'] );

	if($wo['system']['setting_userpoints_enable_offers'] == 1){
		//menu home
		$wo['plugin_list']['plugin_menu'][] = array('name' => 'user_points_offers', 'link' => 'user_points_offers',  'icon'=> 'fa-money', 'title' => $wo['lang']['plugin_point_earn_points'] ); 
		// header
		$wo['plugin_list']['plugin_head_menu_down'][] = array('name' => 'user_points_offers', 'class'=>'visible-xs-block', 'url' => '', 'link' => 'user_points_offers', 'icon'=> 'fa-money', 'title' => $wo['lang']['plugin_point_earn_points'] );
	} 
	
	if($wo['system']['setting_userpoints_enable_shop'] == 1){
		//menu home
		$wo['plugin_list']['plugin_menu'][] = array('name' => 'user_points_shop', 'link' => 'user_points_shop',  'icon'=> 'fa-star-o', 'title' => $wo['lang']['plugin_point_spend_points'] ); 
		// header
		$wo['plugin_list']['plugin_head_menu_down'][] = array('name' => 'user_points_shop', 'class'=>'visible-xs-block', 'url' => '', 'link' => 'user_points_shop', 'icon'=> 'fa-star-o', 'title' => $wo['lang']['plugin_point_spend_points'] );
	}
	
	if($wo['system']['setting_userpoints_enable_topusers'] == 1) {
		//menu home
		$wo['plugin_list']['plugin_menu'][] = array('name' => 'user_points_top', 'link' => 'user_points_top',  'icon'=> 'fa-trophy', 'title' => $wo['lang']['plugin_point_top_users'] );
		// header
		$wo['plugin_list']['plugin_head_menu_down'][] = array('name' => 'user_points_top', 'class'=>'visible-xs-block', 'url' => '', 'link' => 'user_points_top', 'icon'=> 'fa-trophy', 'title' => $wo['lang']['plugin_point_top_users'] );
	}

	if($plugin_page == 'index' && $view_points == 'user_points_offers'){
	
		$item_id = ( isset($_POST['item_id']) ? $_POST['item_id'] : ( isset($_GET['item_id']) ? $_GET['item_id'] : '0' ) );
		  
		if($wo['system']['setting_userpoints_enable_offers'] == 1){
			   $wo['plugin_list']['index_view'][] = 'user_points_offers'; 
			   $wo['plugin_list']['index_content'][] = array('user_points_offers' => 'points/user_points_offers.phtml');			   		   		   
		}
	
	} elseif($plugin_page == 'index' && $view_points == 'user_points_shop'){
	 
		if($wo['system']['setting_userpoints_enable_shop'] == 1){		       
			   $wo['plugin_list']['index_view'][] = 'user_points_shop'; 
			   $wo['plugin_list']['index_content'][] = array('user_points_shop' => 'points/user_points_shop.phtml');
		}
	
	}  elseif($plugin_page == 'index' && $view_points == 'user_points_top'){
		if($wo['system']['setting_userpoints_enable_topusers'] == 1){
			   $wo['plugin_list']['index_view'][] = 'user_points_top'; 
			   $wo['plugin_list']['index_content'][] = array('user_points_top' => 'points/user_points_top.phtml');  
		}		   
	} elseif($plugin_page == 'index' && $view_points == 'user_points'){
			// page header
			page_header(__("My Points")); 
			$wo['plugin_list']['index_view'][] = 'user_points'; 
			$wo['plugin_list']['index_content'][] = array('user_points' => 'points/user_points.phtml');  				  
	}elseif($plugin_page == 'index' && $view_points == 'invite'){   			    
			// page header
			page_header(__("Invite Your Friends"));     	
			/*view input add*/
			$wo['plugin_list']['index_view'][] = 'invite'; 
			$wo['plugin_list']['index_view'][] = 'invite_pending'; 
			$wo['plugin_list']['index_view'][] = 'invite_reflink';           
			/*index content*/
			$wo['plugin_list']['index_content'][] = array('invite' => 'points/invite.phtml', 'invite_pending' => 'points/invite_pending.phtml', 'invite_reflink' =>'points/invite_reflink.phtml');
	}

}
?>