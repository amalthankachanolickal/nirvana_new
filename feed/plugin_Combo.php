<?php
/* Plugin Combo
 * @author Pp Galvan - LdrMx
 */
 
/*class of plugin*/
include "assets/plugins/combo/functions_combo.php";

/* REACTION */
if(!empty($wo['system']['combo_enable_reaction']) && $wo['system']['combo_enable_reaction'] == 1){
	$wo['plugin_list']['header_css'][] = 'combo/css/reaction';
	if($wo['loggedin'] == true){ $wo['plugin_list']['footer_js'][] = 'combo/js/reaction'; }
}  
/* REACTION */

if($wo['loggedin'] == true) { 
	//suggest friend
	$wo['plugin_list']['footer_js'][] = 'combo/js/suggest_friend';

	//reaction header
	$wo['plugin_list']['header'][] = 'combo/header_combo';
	
	//ADMIN
	if($plugin_page == "admin-plugins"){
		// menu admin   
		$wo['plugin_list']['admin_menu'][] = array('Reaction Setting' => 'reaction_setting', 'Combo Setting' => 'combo_setting');
		$wo['plugin_list']['admin_tab'][] = array('reaction_setting' => 'combo/admin/reaction_setting','combo_setting' => 'combo/admin/combo_setting');
	}

	/* COMBO TAGS FRIENDS */
	if(!empty($wo['system']['combo_enable_tag_action'])  && $wo['system']['combo_enable_tag_action'] == 1){
		
		$wo['plugin_list']['footer_js'][] = 'combo/js/tag_friend';
	
		$wo['plugin_list']['publiser_footer'][] = array('name' => 'tag_friend', 'id' => 'tag_friend', 'icon'=> 'fa-user', 'text' => 'people' ); 
		$wo['plugin_list']['plugin_wall_tabs'][] = array('name' => 'tag_friend', 'id' => 'tag_friend', 'icon'=> 'fa-users', 'tab_input' => 'create', 'text' => 'Tag Friends',
'tab_content' => '<div class="publisher-meta publisher_tag_friend js_autocomplete"><i class="fa fa-users fa-fw"></i><ul class="tags"></ul><input type="text" placeholder="Who are you with?" class="who_are_you_with" autocomplete="off"></div>' );
	
	}
	/* COMBO TAGS FRIENDS */
	
	/* SUGGEST YB */
	if(!empty($wo['system']['combo_enable_tag_action'])  && $wo['system']['combo_enable_tag_action'] == 1){}
		
		$wo['plugin_list']['footer_js'][] = 'combo/js/suggest_yb';
	
		$wo['plugin_list']['publiser_footer'][] = array('name' => 'yb', 'id' => 'yb', 'icon'=> 'fa-youtube', 'text' => 'people' ); 
		$wo['plugin_list']['plugin_wall_tabs'][] = array('name' => 'yb', 'id' => 'yb', 'icon'=> 'fa-youtube', 'tab_input' => 'create', 'text' => 'Youtube sugest',
'tab_content' => '<div class="publisher-meta publisher_yb js_yb_autocomplete"><i class="fa fa-youtube fa-fw"></i><ul class="tags_yb"></ul><input type="text" placeholder="Search Youtube video" autocomplete="off"></div>' );
	
	
	/* SUGGEST YB  */
	

	/* DRAG & DROP */
	if(!empty($wo['system']['combo_enable_dragdrop']) && $wo['system']['combo_enable_dragdrop'] == 1){
		$wo['plugin_list']['footer_js'][] = 'combo/js/drag_drop';
	}
	/* DRAG & DROP */
	
		/* WELCOME */
	if(!empty($wo['system']['combo_enable_welcome']) && $wo['system']['combo_enable_welcome'] == 1){
		$wo['plugin_list']['publisher'][] = 'plugins/combo/publisher_combo';
	}
	/* WELCOME */
}	  
?>