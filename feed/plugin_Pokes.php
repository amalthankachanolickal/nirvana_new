<?php
/* Poke plugin
 * @author Pp Galvan - LdrMx
 */

/*input*/
$view_pokes = ( isset($_POST['view']) ? $_POST['view'] : ( isset($_GET['view']) ? $_GET['view'] : '' ) );

/*adding to array menu in wall & profile*/
if($wo['loggedin'] == true){
	//load css & js
	$wo['plugin_list']['header_css'][] = 'pokes/css/pokes';
	$wo['plugin_list']['footer_js'][] = 'pokes/js/pokes';
	
	//menu home
	$wo['plugin_list']['plugin_menu'][] = array('name' => 'pokes', 'link' => 'pokes',  'icon'=> 'fa-hand-o-right', 'title' => 'Pokes' ); 
	// header
	$wo['plugin_list']['plugin_head_menu_down'][] = array('name' => 'pokes', 'class'=>'visible-xs-block', 'url' => '', 'link' => 'pokes', 'icon'=> 'fa-hand-o-right', 'title' => 'Pokes' );
	
		//ADMIN
	if($plugin_page == "admin-plugins"){
		// menu admin   
		$wo['plugin_list']['admin_menu'][] = array('Poke List' => 'poke_list');
		$wo['plugin_list']['admin_tab'][] = array('poke_list' => 'pokes/admin/poke_list');
	}
	
	if($plugin_page == 'pokes'){
		
		/*class of plugin*/
		include "assets/plugins/pokes/class-poke.php";    
		//theme
		$wo['plugin_list']['plugin_wo'][] = array('pokes' => 'index'); 
		//title
		$wo['page']        = 'pokes';
		$wo['title']       = 'Pokes | ' . $wo['config']['siteTitle'];  
		/*view input add*/
		$wo['plugin_list']['index_view'][] = 'pokes';    
		/*index content*/
		$wo['plugin_list']['index_content'][] = array('pokes' => 'pokes/pokes.phtml');  
		
	}else if($plugin_page == 'timeline'){ 
		$wo['plugin_list']['plugin_main_profile'][] = array('name' => 'poke', 'icon' => 'fa-hand-o-right', 'title' => 'Send a Poke' );
	}  
}
?>