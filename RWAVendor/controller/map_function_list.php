<?php
//https://developers.google.com/maps/documentation/distance-matrix/intro
//https://stackoverflow.com/questions/3317892/cron-job-geocode-address-field-to-lat-long-in-mysql-database

function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $kilometers = $miles * 1.609344;
    return $kilometers;
}
function get_coordinates($Fulladdress)
{
    $address = urlencode($Fulladdress);
    $url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=".GOOGLE_MAP_KEY."";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
	//print_r($response);
    curl_close($ch);
    $response_a = json_decode($response);
	//print_r($response_a);
    $status = $response_a->status;

    if ( $status == 'ZERO_RESULTS' )
    {
        return FALSE;
    }
    else
    {
    $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
     return $return;
    }
}
function GetDrivingDistance($lat1, $lat2, $long1, $long2,$getmode)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=".$getmode."&key=".GOOGLE_MAP_KEY."";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
	//print_r($response_a);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
	$distvalue = $response_a['rows'][0]['elements'][0]['distance']['value'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
	$timevalue = $response_a['rows'][0]['elements'][0]['duration']['value'];
	
	$destination_addressesvalue = $response_a['destination_addresses'][0];
	$origin_addressesvalue = $response_a['origin_addresses'][0];
	
	$distmiles = round($response_a['rows'][0]['elements'][0]['distance']['text']/1.609344,1);

    return array('distance_text' => $dist, 'duration_time_text' => $time,'distance_value' => $distvalue, 'duration_time_value' => $timevalue, 'distance_miles' => $distmiles , 'destination_address_value' => $destination_addressesvalue, 'origin_address_value' => $origin_addressesvalue);
}
function get_distance($lat1, $lat2, $long1, $long2)
{
    /* These are two points in New York City */
    $point1 = array('lat' => $lat1, 'long' => $long1);
    $point2 = array('lat' => $lat2, 'long' => $long2);

    $distance = getDistanceBetweenPoints($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
    return $distance;
}

function getDistance($addressFrom, $addressTo, $unit){
    //Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
    $outputTo = json_decode($geocodeTo);
    
    //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344).' km';
    } else if ($unit == "N") {
        return ($miles * 0.8684).' nm';
    } else {
        return $miles.' mi';
    }
}


function getPostcode($lat, $lng) {
  $returnValue = NULL;
  $returnValue1 = NULL;
  $ch = curl_init();
  $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&sensor=false&key=".GOOGLE_MAP_KEY."&language=de&region=IN";
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  $json = json_decode($result, TRUE);

  if (isset($json['results'])) {
     foreach    ($json['results'] as $result) {
        foreach ($result['address_components'] as $address_component) {
          $types = $address_component['types'];
          if (in_array('postal_code', $types) && sizeof($types) == 1) {
             $returnValue = $address_component['short_name'];
          }
		  if (in_array('locality', $types) && sizeof($types) == 2) {
             $returnValue1 = $address_component['long_name'];
          }
		  
    }
     }
  }
  return $returnValue.'_'.$returnValue1;
}



function getPostcode_Full($lat, $lng) {
  $returnValue = NULL;
  $ch = curl_init();
  $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&sensor=false&key=".GOOGLE_MAP_KEY."&language=en&region=IN";
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  $json = json_decode($result, TRUE);
  return $json;
}

function getZipcode_using_address($address){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&key='.GOOGLE_MAP_KEY.'&sensor=false&language=de&region=IN'); 
        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $latitude  = $output1->results[0]->geometry->location->lat; 
        $longitude = $output1->results[0]->geometry->location->lng;
        //Send request and receive json data by latitude longitute
        $geocodeFromLatlon = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&key='.GOOGLE_MAP_KEY.'&sensor=false&language=de&region=IN');
        $output2 = json_decode($geocodeFromLatlon);
        if(!empty($output2)){
            $addressComponents = $output2->results[0]->address_components;
            foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'postal_code'){
                    //Return the zipcode
                    return $addrComp->long_name;
                }
            }
            return false;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}




/*$addressFrom = 'Insert from address';
$addressTo = 'Insert to address';
$distance = getDistance($addressFrom, $addressTo, "K");
echo $distance;*/

/*echo $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=D+242+Sector+63+Noida&destinations=E+155+Sector+71+Noida&mode=driving&key=AIzaSyAtQZRAPp9W_XQWwGjhR_5yx8sIzxyFZW4";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
print_r($response_a);
*/
?>