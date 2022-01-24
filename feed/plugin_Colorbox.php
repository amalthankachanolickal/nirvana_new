<?php
/* Plugin Colorbox
 * @author Pp Galvan - LdrMx
 */
 
/*class of plugin*/
include "assets/plugins/colorbox/functions_colorbox.php";

	$wo['plugin_list']['header_css'][] = 'colorbox/css/colorbox';
	if($wo['loggedin'] == true){ $wo['plugin_list']['footer_js'][] = 'colorbox/js/colorbox'; }

if($wo['loggedin'] == true) { 
		
		$wo['plugin_list']['publiser_footer'][] = array('name' => 'colorbox', 'id' => 'colorbox', 'icon'=> 'fa-font', 'text' => 'people' ); 
		
		$wo['plugin_list']['plugin_wall_tabs'][] = array('name' => 'colorbox', 'id' => 'colorbox', 'tab_input' => 'create', 'tab_content' => '<div class="publisher-meta publisher_colorbox">
					<div class="btn _9sg" data-id="0">
						  <div class="_23jq _3oi9 _23jt" style="background-color: #e9ebee;"></div>
					</div>
					<div class="btn" data-id="1">
						  <div class="_23jq _3oi9" style="background-color: rgb(252, 216, 114);"></div>
					</div>
					<div class="btn" data-id="2">
						  <div class="_23jq _3oi9" style="background-color: rgb(243, 83, 105);"></div>
					</div>
					<div class="btn" data-id="3">
						  <div class="_23jq _3oi9" style="background-color: rgb(243, 83, 105);"></div>
					</div>
					<div class="btn" data-id="4">
						  <div class="_23jq _3oi9" style="background-color: rgb(23, 172, 255);"></div>
					</div>
					<div class="btn" data-id="5">
						  <div class="_23jq _3oi9" style="background-color: rgb(93, 63, 218);"></div>
					</div>					
					<div class="btn" data-id="6">
						  <div class="_23jq _3oi9" style="background-color: rgb(255, 0, 64);"></div>
					</div>					
					<div class="btn" data-id="7">
						  <div class="_23jq _3oi9" style="background-image: linear-gradient(45deg, rgb(255, 31, 70) 0%, rgb(30, 53, 199) 100%);"></div>
					</div>
					<div class="btn" data-id="8">
						  <div class="_23jq _3oi9" style="background-image: linear-gradient(45deg, rgb(252, 54, 253) 0%, rgb(93, 63, 218) 100%);"></div>
					</div>
					<div class="btn" data-id="9">
						  <div class="_23jq _3oi9" style="background-color: rgb(74, 144, 226);"></div>
					</div>
					
					<div class="btn" data-id="10">
						  <div class="_23jq _3oi9" style="background-image: linear-gradient(45deg, rgb(102, 244, 133) 0%, rgb(23, 172, 255) 100%);"></div>
					</div>
					<div class="btn" data-id="11">
						  <div class="_23jq _3oi9" style="background-image: linear-gradient(45deg, rgb(248, 240, 35) 0%, rgb(5, 174, 53) 100%);"></div>
					</div>
					<div class="btn" data-id="12">
						  <div class="_23jq _3oi9" style="background-color: rgb(255, 99, 35);"></div>
					</div>
					<div class="btn" data-id="13">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/13.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="14">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/14.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="15">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/15.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="16">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/16.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="17">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/17.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="18">
						  <div class="_23jq _3oi9" style="background-color: rgb(95, 102, 115);"></div>
					</div>
					<div class="btn" data-id="19">
						  <div class="_23jq _3oi9" style="background-color: rgb(17, 17, 17);"></div>
					</div>
					<div class="btn" data-id="20">
						  <div class="_23jq _3oi9" style="background-image: linear-gradient(45deg, rgb(255, 0, 71) 0%, rgb(44, 52, 199) 100%);"></div>
					</div>
					<div class="btn" data-id="21">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/21.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="22">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/22.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="23">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/23.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="24">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/24.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="25">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/25.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="26">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/26.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="27">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/27.jpg&quot;);"></div>
					</div>
					<div class="btn" data-id="28">
						  <div class="_23jq _3oi9" style="background-image: url(&quot;'.$wo['config']['site_url'].'/assets/plugins/colorbox/images/28.jpg&quot;);"></div>
					</div>					
					
					<input type="hidden" name="color">
	   </div>
' );
}	  
?>