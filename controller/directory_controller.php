<?php
require "../model/class.expert.php";

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


date_default_timezone_set("Asia/Kolkata");

$current_date = date('Y-m-d H:i:s');



function send_sms_to_resident_member($value,$requestor){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value['1st_owner_first_name'].' '.$value['1st_owner_middle_name'].' '.$value['1st_owner_last_name'].', ';
    $message .= "You have received message from - ".$requestor['requestor_title']." ".$requestor['requestor_fname']." ".$requestor['requestor_lname']." through the website.";
        
    
     $numbers=$value['phone_number'];
     //$numbers='8096773208,7011966293,9810490363';
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
function send_sms_to_requestor($requestor,$donar){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$requestor['requestor_title'].' '.$requestor['requestor_fname'].' '.$requestor['requestor_lname'].',';
    
       $message .= "Your message has been successfully sent to - ".$donar['1st_owner_first_name']." ".$donar['1st_owner_middle_name']." ".$donar['1st_owner_last_name']."
            of ".$donar['block']."-".$donar['flat_no']." through the website.";
        

     /*echo $message;*/
//exit(0);
     $numbers=$value['requestor_mobile'];
    // $numbers='8096773208,7011966293,9810490363';
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
	 $to = $value['email'];
//   $to = 'iambommanakavya@gmail.com,techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = "Message sent from Website to - ".$donar['1st_owner_first_name']." ".$donar['1st_owner_middle_name']." ".$donar['1st_owner_last_name']." ";
 
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
            <p>Your message to ".$donar['1st_owner_first_name']." ".$donar['1st_owner_middle_name']." ".$donar['1st_owner_last_name']."., H/o ".$donar['block']." ".$donar['flat_no']." has been sent through email & SMS. 
             </p>
             
             <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Message:</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>".$value['message']."</p>
            
            


            <p>Warm Regards,</p> <br><br>
            Website Admin<br>
            <a href='www.nirvanacountry.co.in'>www.nirvanacountry.co.in</a> <br></span>
                    </span></p></td></tr></tbody></table>";

    "CC: kushalbhasin@gmail.com";

  mail($to, $subject, $message, $headers);
}




function sendMailResident_member($value,$requestor) {
 	$to = $requestor['requestor_email'];
// $to = 'iambommanakavya@gmail.com,techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = "Message received from - ".$requestor['requestor_title']." ".$requestor['requestor_fname']." ".$requestor['requestor_lname']." ";
  
 
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
            Dear ".$value['1st_owner_first_name']." " .$value['1st_owner_middle_name']." ".$value['1st_owner_last_name'].",</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            You have received the following message from ".$requestor['requestor_title']." ".$requestor['requestor_fname']." ".$requestor['requestor_lname']."., 
            </p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            You may respond to them by <a href='#'>clicking here</a>. 
            </p>
            
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>Message:</p>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>".$requestor['message']."</p>
           <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
           You can view the residents directory online and contact any owner/ tenant of your locality one on one through your Nirvana website. 
           </p>
           
           <p>Warm Regards,</p> <br><br>
            Website Admin<br>
            <a href='www.nirvanacountry.co.in'>www.nirvanacountry.co.in</a> <br></span>
                    </span></p></td></tr></tbody></table>";


  mail($to, $subject, $message, $headers);
}
if (isset($_POST['request'])) {
  $ip = $_SERVER['REMOTE_ADDR'];

  $insert_data = array(
    "directory_id" => $_POST["resident_member_id"],
    "requestor_email" => $_POST["resquestor_email"],
    "requestor_isd" => $_POST["resquestor_isd"],
    "requestor_mobile" => $_POST["resquestor_mobile"],
    "requestor_title" => $_POST["requestor_title"],
    "requestor_fname" => $_POST["resquestor_fname"],
    "requestor_lname" => $_POST["resquestor_lname"],
    "requestor_mname" => $_POST["resquestor_mname"],
    "message" => $_POST["msg11"],
    "ip_address" => $ip,
    "inserted_date" => $current_date
  );
  $ModelCall->insert("directory_request", $insert_data);
  
  
  
$DirectoryID = $_POST['resident_member_id'];
$getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `resident_directory_new`   where id='$DirectoryID' ");
   
    echo "<pre>". count($getrecUsers);
   // print_r($getrecUsers);
    
  foreach($getrecUsers as $rec){
      send_sms_to_resident_member($rec,$insert_data);
      sendMailResident_member($rec,$insert_data);
     send_sms_to_requestor($insert_data,$rec);
    sendMailRequestor($insert_data,$rec);
  }
       

  
  header("Location: ../directory.php?actionResult=sent");
}
?>