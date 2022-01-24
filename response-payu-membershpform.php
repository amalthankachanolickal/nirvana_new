<?php include('model/class.expert.php');

include('Email_Configuration_files.php');

require('mailin-lib/Mailin.php');

// Report all errors

error_reporting(E_ALL);



// Merchant Salt as provided by Payu

$SALT = "OwPaosAjUf";

// Merchant Salt as provided by Payu for TESTING 

//$SALT = "Bwxo1cPe";

$postdata = $_POST;

// print_r($postdata);
// exit(0);

if (isset($postdata ['key'])) {

	$key				=   $postdata['key'];

	//$salt				=   $postdata['salt'];

	$txnid 				= 	$postdata['txnid'];

    $amount      		= 	$postdata['amount'];

	$productInfo  		= 	$postdata['productinfo'];

	$firstname    		= 	$postdata['firstname'];

    $email        		=	$postdata['email'];

    $udf1				=   $postdata['udf1'];

    $udf2				=   $postdata['udf2'];

    $udf3				=   $postdata['udf3'];

    $udf4				=   $postdata['udf4'];

	$udf5				=   $postdata['udf5'];

	$mihpayid			=	$postdata['mihpayid'];

	$status				= 	$postdata['status'];

    $resphash			= 	$postdata['hash'];

    $additionalCharges	=  (empty($postdata['additionalCharges'])) ? '0.00' : $postdata['additionalCharges'];

    //Calculate response hash to verify	

    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5";

	$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$udf5.'|||||';

	$keyArray 	  		= 	explode("|",$keyString);

	$reverseKeyArray 	= 	array_reverse($keyArray);

	$reverseKeyString	=	implode("|",$reverseKeyArray);

	//$CalcHashString 	= 	strtolower(hash('sha512', $additionalCharges.'|'.$SALT.'|'.$status.'|'.$reverseKeyString));

    $CalcHashString 	= 	strtolower(hash('sha512', $SALT.'|'.$status.'|'.$reverseKeyString));

    

   // echo "hash passed". $resphash.'<br/>';

    //echo "Calculated HashString ". $CalcHashString;

  

$dataU = array(

  'mihpayid' =>$postdata['mihpayid'],

  'mode' => $postdata['mode'],

  'txnid' => $postdata['txnid'],

  'amount' =>$postdata['amount'],

  'additionalCharges' => $additionalCharges,

  'productinfo' => $postdata['productinfo'],

  'firstname' =>$postdata['firstname'],

  'lastname' => $postdata['lastname'],

  'address1' => $postdata['address1'],

  'address2' => (empty($postdata['address2'])) ? '' : $postdata['address2'],

  'city' => (empty($postdata['city'])) ? '' : $postdata['city'],

  'state' => (empty($postdata['state'])) ? '' : $postdata['state'],

  'country' => (empty($postdata['country'])) ? 'India' : $postdata['country'],

  'zipcode' =>$postdata['zipcode'],

  'email' => $postdata['email'],

  'phone' => $postdata['phone'],

  'response_msg' =>(empty($postdata['response_msg'])) ? '' : $postdata['response_msg'],

  'PG_TYPE' => (empty($postdata['PG_TYPE'])) ? '' : $postdata['PG_TYPE'],

  'hash' => $postdata['hash'],

  'encryptedPaymentId' =>(empty($postdata['encryptedPaymentId'])) ? '' : $postdata['encryptedPaymentId'],

  'bank_ref_num' => $postdata['bank_ref_num'],

  'bankcode' => $postdata['bankcode'],

  'error_Message' => $postdata['error_Message'],

  'name_on_card' => (empty($postdata['name_on_card'])) ? '' : $postdata['name_on_card'],

  'cardnum' => (empty($postdata['cardnum'])) ? '' : $postdata['cardnum'],

  'amount_split' =>(empty($postdata['amount_split'])) ? '' : $postdata['amount_split'],

  'payuMoneyId' => $postdata['payuMoneyId'],

  'discount' => (empty($postdata['discount'])) ? '0.00' : $postdata['discount'],

  'net_amount_debit' => (empty($postdata['net_amount_debit'])) ? '0.00' : $postdata['net_amount_debit'],

  'status' =>$postdata['status'],

  'addedon' => $postdata['addedon'],

  'user_id' =>NULL,

  'action_from_website' => $postdata['udf1'],

  'bill_no_on_website' => (empty($postdata['udf2'])) ? '' : $postdata['udf2'],

);





$resultU1111 = $ModelCall->insert('tbl_transations_payu',$dataU);



	if ($status == 'success') {

       $msg = "Transaction Successful and Hash Verified...";

       if($postdata['udf1']=='MembershipPayments'){

      //  $ModelCall->where("bill_no", $postdata['udf2']);
     if($postdata['udf3']=='1'){
            $updateArray=array(
    
                "reference_number_1"=> $postdata['txnid'],
    
                "payment_date_1"=>$postdata['addedon'],
    
                "amount_1"=> $postdata['amount'],
    
               
    
             );
  } else if($postdata['udf3']=='2'){
        $updateArray=array(
    
                "reference_number_2"=>$postdata['txnid'],
    
                "payment_date_2"=>$postdata['addedon'],
    
                "amount_2" => $postdata['amount'],
    
             );
  } else {
       
            $updateArray=array(
    
                "reference_number_1"=> $postdata['txnid'],
    
                "payment_date_1"=>$postdata['addedon'],
    
                "amount_1"=> $postdata['amount'],
    
                "reference_number_2"=>$postdata['txnid'],
    
                "payment_date_2"=>$postdata['addedon'],
    
                "amount_2" => $postdata['amount'],
    
             );
  }
  
         $ModelCall->where("id",$postdata['udf2']);
        $res = $ModelCall->update('Wo_Membership', $updateArray);

        $msg = "Payment Sucessfully Done...";
     $ModelCall->where("id", $postdata['udf2']);
      $rec = $ModelCall->get('Wo_Membership');
      
       send_payment_sucess_mail($rec[0],$updateArray);

      //  send_new_payment_intimation($updateArray);

      sendMailUser($rec[0], base64_encode($postdata['udf2']));
      
      sendMailAdmin($rec[0], base64_encode($postdata['udf2']));
      
     // sendMailRecommender($rec[0], base64_encode($postdata['udf2']));
       header("location:".SITE_URL."membership.php?success=true");


        exit(0);

       }



		//Do success order processing here...

	} else {

        //tampered or failed
         $msg = "Payment failed ...";
        $updateArray=array(
    
                "approved_status"=> 0,
    
             );
       
        $ModelCall->where("id",$postdata['udf2']);
        $res = $ModelCall->update('Wo_Membership', $updateArray);
         header("location:".SITE_URL."membership.php?paymentfailed=true&fid=".base64_encode($postdata['udf2']));

       exit(0);

	} 

}

else  {

    //tampered or failed

   // $msg = "Payment failed ...";

   header("Location: ".SITE_URL."RE.php?actionResult=regfail");

   exit(0);



    

} 



function send_payment_sucess_mail($result, $updateArray){

  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");

$From = "website.admin@nirvanacountry.co.in";

$FromName = "Website Admin";

$getFullName = $result['first_name']." ".$result['last_name'];

$toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");

//$ToAddress ="nishthagupta@gmail.com";

//$toArray= array($result['emailid']=> $result['first_name']); 

$Subject = 'Acknowledgement of your Online payment for Membershp Fee';

     

    $Body="<table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 

    style='border-collapse:collapse;'>

    <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>

    <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>

    <span>

     Dear ".$result['title_1']." ".ucfirst($result['tenant_first_name'])." ".ucfirst($result['tenant_last_name']).

    "<br><br>

     We are pleased to inform you that your Payment is successful with Nirvana Country for membership fee. <br><br>    

     Your payment of Rs. 500 was successful.          

   Visit your  <a  href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other new features.

 

<span style='text-align:center'> Warm Regards, <br><br>

NRWA Office <br>

www.nirvanacountry.co.in <br></span>

</span></p></td></tr></tbody></table>";

   

$data = array( "to" => $toArray,

"from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),

"subject" => "Acknowledgement of your Online payment for Membership Fee",

"html" =>$Body,



);

//   echo"<pre>";

//   print_r($toArray);

$mailin->send_email($data);



// if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {

// //echo 'Yippie, message send via Gmail';

// } else {

//  if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {

//  if (!empty($error)) echo $error;

//  } else {

// //echo 'Yep, the message is send (after doing some hard work)';

//  }

// }

//echo $ToAddress;

//echo $From;



}



function send_new_payment_intimation($result){

  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");

 // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");

$toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");

 

  $data = array( "to" => $toArray,

      "from" => array("website.admin@nirvanacountry.co.in", "Website Manager"),

      "subject" => "New Payment Received for ". $result['source']. " Registration.",

      "html" => "<table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 

      style='border-collapse:collapse;'>

      <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>

      <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>

      <span>

      Dear Sir

      <br><br>

      The New Payment has come through the website. Following are the details given : <br><br>  

        Name : ". $result['first_name']. " ".$result['last_name']."<br/>

       Payment of Rs. ".$result['amt_paid']." was successful.   <br/>

       emailid : ". $result['emailid']. "<br/>

       phoneno : ". $result['phoneno']."<br/>    

       message : ". $result['message']."<br/>    

       source : ". $result['source']."<br/>    

  <span style='text-align:center'> Warm Regards, <br><br>

  NRWA Office <br>

  www.nirvanacountry.co.in <br></span>

  </span></p></td></tr></tbody></table>",

  );

//   echo"<pre>";

//   print_r($toArray);

$mailin->send_email($data);

}


function sendMailAdmin($details, $url) {
   $to = 'techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com';
  //$to = 'techlead@myrwa.online';
  $subject = 'NRWA Application Pending Admin Approval';
  $from = 'website.admin@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  'Reply-To: '.$from."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear Sir,</p>';
  
 if($details['title_1']=='other'){
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">New Memberhip Application have been submitted through the Website. To view the submitted NRWA membership form by '.$details['tenant_other_title'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).' <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a>. </p>';
   }else{
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">New Memberhip Application have been submitted through the Website. To view the submitted NRWA membership form by '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).' <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a>. </p>';
   }

  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Documents submitted with the membership request: </p>
  <ol type="1">';
  if($details['proof_of_identity']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof of Identity - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
  }
   if($details['proof_of_address']!=''){
    $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof of Address - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
   }
    if($details['proof_of_dob']!=''){
  $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof Of Date Of Birth - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
   }
     if($details['ownership_proof']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Ownership Proof - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
    }
    if($details['photograph_user']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Photograph - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
    }
  $message .= '</ol>
      <span style="text-align:center"> Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';

  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}



function sendMailRecommender($details, $url) {
   $to = 'techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com';
  //$to = 'techlead@myrwa.online';
  $subject = 'Application for Recommendation-  Membership Application';
  $from = 'website.admin@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  'Reply-To: '.$from."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['rec_per_title'].' '.ucfirst($details['rec_per_fname']).' '.ucfirst($details['rec_per_mname']).' '.ucfirst($details['rec_per_lname']).',</p>';
  
 if($details['title_1']=='other'){
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
   NRWA membership form has been submitted by '.$details['tenant_other_title'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).' and has suggested your name for Recommender. Kindly review the application and grant your recommendation. <a href="'.SITE_URL.'membership.php?fid='.$url.'&view-mode=R">click here</a>. </p>';
   }else{
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
    NRWA membership form has been submitted by '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).' and has suggested your name for Recommender. Kindly review the application and grant your recommendation.  <a href="'.SITE_URL.'membership.php?fid='.$url.'&view-mode=R">click here</a>. </p>';
   }

  $message .= '<span style="text-align:center"> Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';

  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}


function sendMailUser($details, $formID) {
  $to = 'techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
  $subject = 'NRWA Membership Form Submitted';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  'Reply-To: '.$from."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_last_name']).',</p>
 
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">We have received your application for the membership of Nirvana Residents\' Welfare Association and thank you for the same. We will review the same and send for the approval of the President/ Secretary.</p>
  
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
  You may visit <a href="'.SITE_URL.'membership.php?fid='.$formID.'">NRWA Online</a>  to view your application, or check its current status. We also keep intimated of its progress via email.
  
  </p> ';
  
  $message .= '<span style="text-align:center">Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  </body>
  </html>';


  mail($to, $subject, $message, $headers);
}




?>



<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>PayUmoney </title>

</head>

<style type="text/css">

	.main {

		margin-left:30px;

		font-family:Verdana, Geneva, sans-serif, serif;

	}

	.text {

		float:left;

		width:180px;

	}

	.dv {

		margin-bottom:5px;

	}

</style>

<body>

<div class="main">

	<div>

    	<img src="images/payumoney.png" />

    </div>

    <div>

    	<h3>PayUmoney Response</h3>

    </div>

	

    <div class="dv">

    <span class="text"><label>Merchant Key:</label></span>

    <span><?php echo $key; ?></span>

    </div>

   

    

    <div class="dv">

    <span class="text"><label>Transaction/Order ID:</label></span>

    <span><?php echo $txnid; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>Amount:</label></span>

    <span><?php echo $amount; ?></span>    

    </div>

    

    <div class="dv">

    <span class="text"><label>Product Info:</label></span>

    <span><?php echo $productInfo; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>First Name:</label></span>

    <span><?php echo $firstname; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>Email ID:</label></span>

    <span><?php echo $email; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>Mihpayid:</label></span>

    <span><?php echo $mihpayid; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>Hash:</label></span>

    <span><?php echo $resphash; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>Transaction Status:</label></span>

    <span><?php echo $status; ?></span>

    </div>

    

    <div class="dv">

    <span class="text"><label>Message:</label></span>

    <span><?php echo $msg; ?></span>

    </div>

</div>

</body>

</html>

	 -->