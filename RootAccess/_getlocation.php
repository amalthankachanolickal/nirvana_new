<?php 
//Get user IP address
$ip=$_SERVER['REMOTE_ADDR'];
//Using the API to get information about this IP
 $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=$ip"));
//Using the geoplugin to get the continent for this IP
 $continent=$details->geoplugin_continentCode;
 //print_r($continent);
//And for the country
$country=$details->geoplugin_countryCode;
//print_r($country);
   // if($country==="IN" || $country==="GB" || $country==="UK"||  $country==="US"){
    if($country==="IN"){
        // header('Location: http://therwa.in/401.shtml' );
        // exit(0);

}else{    
header('Location: https://nirvanacountry.co.in/401.shtml' );
exit(0);
    }
?>