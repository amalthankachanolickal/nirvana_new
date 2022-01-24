<?php 
/* plugins-> functions wallcolor
* @autor Pp Galvan - LdrMx
*/
	function get_colorbox($c) {
	global $wo;
		if(!$c){ return false; }
		if($c == 1){ $t = "background-color : rgb(252, 216, 114);"; }
		else if($c == 2){ $t = "background-image : linear-gradient(45deg, rgb(252, 216, 114) 0%, rgb(243, 83, 105) 100%);"; }
		else if($c == 3){ $t = "background-color : rgb(243, 83, 105);"; }
		else if($c == 4){ $t = "background-color : rgb(23, 172, 255);"; }	
		else if($c == 5){ $t = "background-image : linear-gradient(45deg, rgb(252, 54, 253) 0%, rgb(93, 63, 218) 100%);"; }
		else if($c == 6){ $t = "background-color: rgb(255, 0, 64);"; }
		else if($c == 7){ $t = "background-image: linear-gradient(45deg, rgb(255, 31, 70) 0%, rgb(30, 53, 199) 100%);"; }
		else if($c == 8){ $t = "background-image: linear-gradient(45deg, rgb(252, 54, 253) 0%, rgb(93, 63, 218) 100%);"; }
		else if($c == 9){ $t = "background-color : rgb(74, 144, 226);"; }
		else if($c == 10){ $t = "background-image : linear-gradient(45deg, rgb(102, 244, 133) 0%, rgb(23, 172, 255) 100%);"; }
		else if($c == 11){ $t = "background-image : linear-gradient(45deg, rgb(248, 240, 35) 0%, rgb(5, 174, 53) 100%);"; }
		else if($c == 12){ $t = "background-color : rgb(255, 99, 35);"; }
		else if($c == 13){ $t = "background-image: url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/13.jpg&quot;);"; }
		else if($c == 14){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/14.jpg&quot;);"; }
		else if($c == 15){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/15.jpg&quot;);"; }
		else if($c == 16){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/16.jpg&quot;);"; }
		else if($c == 17){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/17.jpg&quot;);"; }
		else if($c == 18){ $t = "background-color : rgb(95, 102, 115);"; }
		else if($c == 19){ $t = "background-color: rgb(17, 17, 17);"; }
		else if($c == 20){ $t = "background-image: linear-gradient(45deg, rgb(255, 0, 71) 0%, rgb(44, 52, 199) 100%);"; }
		else if($c == 21){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/21.jpg&quot;);"; }
		else if($c == 22){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/22.jpg&quot;);"; }
		else if($c == 23){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/23.jpg&quot;);"; }
		else if($c == 24){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/24.jpg&quot;);"; }
		else if($c == 25){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/25.jpg&quot;);"; }
		else if($c == 26){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/26.jpg&quot;);"; }
		else if($c == 27){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/27.jpg&quot;);"; }
		else if($c == 28){ $t = "background-image : url(&quot;".$wo['config']['site_url']."/assets/plugins/colorbox/images/28.jpg&quot;);"; }
		
		if(!empty($t)){ $a = $t.'color:rgba(255,255,255,1.00);font-size:30px;font-weight:700;line-height:1.2000em;padding:50px 30px;text-align:center; background-repeat: no-repeat;
    background-size: 100% 100%; height: 245px;'; return $a; }
	}
?>