<?php
require "../model/class.expert.php";

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


date_default_timezone_set("Asia/Kolkata");

$current_date = date('Y-m-d H:i:s');



function send_sms_to_donar($value,$requestor){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value['title_first'].' '.$value['fname_first'].' '.$value['lname_first'].', You have been requested to donate plasma by '.$requestor['requestor_name'].'.';
    $message .= "You have received plasma donation request from - ".$requestor['requestor_title']." ".$requestor['requestor_fname']." ".$requestor['requestor_lname'].". Please check your mail.";
        
    
     $numbers=$value['phone_number'];
    //  $numbers='8096773208,7011966293,9810490363';
  // $numbers='9560889608, 9079247349, 9810490363, 8013333816';
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
function send_sms_to_requestor($value,$donar){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value['requestor_fname'].',';
    
       $message .= "Your request for Plasma Donar have been submitted successfully  to - ".$donar['title_first']." ".$donar['fname_first']." ".$donar['lname_first'].".
            Please check your mail.";
        

     /*echo $message;*/
//exit(0);
     $numbers=$value['requestor_mobile'];
    //  $numbers='8096773208,7011966293,9810490363';
  // $numbers='9560889608, 9079247349, 9810490363, 8013333816';
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


function getBlock($block_id) {
  $block = $block_id;
  if ($block_id == "1") {
    $block = "AG";
  } else if ($block_id == "2") {
    $block = "BC";
  } else if ($block_id == "3") {
    $block = "CC";
  } else if ($block_id == "4") {
    $block = "DW";
  } else if ($block_id == "5") {
    $block = "ES";
  }

  return $block;
}

function getFloor($floor_number) {
  if ($floor_number == "NA") {
    return "";
  }

  return $floor_number;
}



function sendMailRequestor($value,$donar) {
	 /*$to = 'iambommanakavya@gmail.com';*/
  /*$to = 'iambommanakavya@gmail.com,techlead@myrwa.online';*/
  $to = $value['requestor_email'];
  $subject = 'App: Request Sent to Plasma Donar';
 
   $from = 'office.nrwa@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= "
  <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            <p>Dear ".$value['requestor_title']." ".$value['requestor_fname']." ".$value['requestor_lname'].",</p> 
            <p>Your request for Plasma Donar have been submitted successfully  to - ".$donar['title_first']." ".$donar['fname_first']." ".$donar['lname_first'].".
            The details of the Request are as below- </p>
            
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Blood Group  - ".$value['bloodgroup_required']."</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Message</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>".$value['message']."</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>City - ".$value['city']."</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Locality - ".$value['locality']."</p>
            


            <p>Warm Regards,</p> <br><br>
            NRWA Office <br>
            www.nirvanacountry.co.in <br></span>
                    </span></p></td></tr></tbody></table>";

    "CC: kushalbhasin@gmail.com";

  mail($to, $subject, $message, $headers);
}




function sendMailDonar($value,$requestor) {
 /*	$to = 'iambommanakavya@gmail.com';*/
/*$to = 'iambommanakavya@gmail.com,techlead@myrwa.online';*/
$to = $value['user_email'];
  $subject = 'App: Received Request For Plasma';
  
 
   $from = 'office.nrwa@nirvanacountry.co.in';
  
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= "
  <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear ".$value['title_first']." " .$value['fname_first']." ".$value['lname_first'].",</p>
            <p>You have received plasma donation request from - ".$requestor['requestor_title']." ".$requestor['requestor_fname']." ".$requestor['requestor_lname'].". Kindly find
            the details below :</p>
            
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Blood Group  - ".$requestor['bloodgroup_required']."</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Message</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>".$requestor['message']."</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>City - ".$requestor['city']."</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Locality - ".$requestor['locality']."</p>
           <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Email - ".$requestor['requestor_email']."</p>
           <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Mobile - ".$requestor['requestor_mobile']."</p>
           
           <span style='text-align:center'> Warm Regards, <br><br>
            NRWA Office <br>
            www.nirvanacountry.co.in <br></span>
                    </span></p></td></tr></tbody></table>";


"CC: kushalbhasin@gmail.com";
  mail($to, $subject, $message, $headers);
}
if (isset($_POST['request'])) {
    
    print_r($_POST);
    exit;
    
  $ip = $_SERVER['REMOTE_ADDR'];

  $insert_data = array(
    "donar_id" => $_POST["donar_id"],
    "requestor_email" => $_POST["resquestor_email"],
    "requestor_isd" => $_POST["resquestor_isd"],
    "requestor_mobile" => $_POST["resquestor_mobile"],
    "requestor_title" => $_POST["requestor_title"],
    "requestor_fname" => $_POST["resquestor_fname"],
    "requestor_lname" => $_POST["resquestor_lname"],
    "requestor_mname" => $_POST["resquestor_mname"],
    "locality" => $_POST["resquestor_locality"],
    "city" => $_POST["resquestor_city"],
    "bloodgroup_required" => $_POST["bloodgroup_required"],
    "message" => $_POST["msg11"],
    "ip_address" => $ip,
    "inserted_date" => $current_date
  );
  $ModelCall->insert("plasma_request", $insert_data);
$DonarID = $_POST['donar_id'];
$getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `tbl_self_isolation_data_start`   where id='$DonarID' ");
   
    echo "<pre>". count($getrecUsers);
   // print_r($getrecUsers);
    
  foreach($getrecUsers as $rec){
      send_sms_to_donar($rec,$insert_data);
      sendMailDonar($rec,$insert_data);
      
send_sms_to_requestor($insert_data,$rec);
  sendMailRequestor($insert_data,$rec);
     
  }
       


  
  header("Location: ../covid-dashboard.php?actionResult=sent");
}
?>