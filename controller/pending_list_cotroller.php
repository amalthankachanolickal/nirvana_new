<?php
require "../model/class.expert.php";

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


date_default_timezone_set("Asia/Kolkata");

$current_date = date('Y-m-d H:i:s');

$get_id = $_REQUEST['id'];


$getUserData = $ModelCall->rawQuery("SELECT * FROM covid_case_details WHERE id = '$get_id' ");
;
$house_no = $_REQUEST['house_no'];
$link= SITE_URL."/Plasma_Form_new.php?uid=$get_id";
function send_sms_to_donar($insert_data_tracking_tle,$mobile){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear Sir/Madam';
    $message .= " Please Update the Form- ".$insert_data_tracking_tle[link]. " Thank you.";
        
    //$numbers=$mobile;
     $numbers='8096773208,7011966293,9810490363';
     // set post fields
     $post = [
      'sender' => $SENDER,
      'smstype' => $smstype,
      'numbers'   => $numbers,
      'apikey' => $apikey,
      'message' => $message
    ];

      $ch = curl_init('http://sms.pearlsms.com/public/sms/send');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      // execute!
      $response = curl_exec($ch);

      // close the connection, release resources used
      curl_close($ch);

      // do anything you want with your response
      var_dump($response);
    }




function sendMailDonar($insert_data_tracking_tle,$email) {
 $to = $email;
//$to = 'iambommanakavya@gmail.com,techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = 'Plasma Donation List';
  
 
   $from = 'office.nrwa@nirvanacountry.co.in';
  
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  //'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com'."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= "
  <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
           Hi,</p>
           <p>Hope you/ family are recovering well from COVID. <br><br>
           As you may know, some COIVD patients, need urgent PLASMA donation for their treatment. To assist Nirvana residents, we have created online <a href='".SITE_URL."covid-dashboard.php'>Donor List</a>  for those in urgent need to contact potential donors. As you may see, the requester contacts you online but your information remains completely confidential.  <br><br>
           If you would be willing to make a donation if need arises, then kindly reply by  <a href='".$insert_data_tracking_tle['link']."'>clicking here. </a>
           </p>
            <p>Your donation may help save a life.  </p>
            
            
           <span style='text-align:center'>Regards, <br><br>
            NRWA Office <br>
           <a href='".SITE_URL."'> www.nirvanacountry.co.in</a> <br></span>
                    </span></p></td></tr></tbody></table>";


"CC: kushalbhasin@gmail.com";
  mail($to, $subject, $message, $headers);
}
  
  $insert_data_tracking_tle = array(
    "house_no" => $house_no,
    "link" => $link
  );
  $ModelCall->insert("pending_list_request", $insert_data_tracking_tle);
  
  
  $update_data_covid_tle = array(
    "is_mail_sent" => 'Yes'
  );
  $ModelCall->where("id",$get_id);
  $result =  $ModelCall->update('covid_case_details', $update_data_covid_tle);
  
  //send_sms_to_donar($insert_data_tracking_tle,$getUserData[0]['mobile']);
   sendMailDonar($insert_data_tracking_tle,$getUserData[0]['email']);
  
  header("Location: ../pending_list.php?actionResult=sent");
    
 
?>