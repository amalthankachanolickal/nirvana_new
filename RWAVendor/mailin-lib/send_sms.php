<?php 

/*
This function calls the Fast2SMS api
*/

function sendSMS($fields){
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($fields),
      CURLOPT_HTTPHEADER => array(
        "authorization: hMKc1x8Gyg6eJfLsbA4RD3mWHFrw9zuT7n20UqCQIa5jESNlvXYb08NU7vIl32j4S1uJHEdtZBWPDnhA",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
      ),
    ));
    //echo "sent";
    $response = curl_exec($curl);
    //echo $response;
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      //echo "";
    }
}



?>