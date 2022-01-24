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

//print_r($postdata);

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

       if($postdata['udf1']=='BrokersRegistration' || $postdata['udf1']=='ContractorRegistration' || $postdata['udf1']=='AdsPayments'){

      //  $ModelCall->where("bill_no", $postdata['udf2']);

        $updateArray=array(

            "first_name"=> $postdata['firstname'],

            "last_name"=> $postdata['lastname'],

            "emailid"=> $postdata['email'],

            "phoneno"=>$postdata['phone'],

            "amt_paid"=>$postdata['amount'],

            "txnid" => $postdata['txnid'],

            "message" =>$postdata['udf2'],

            "status" => $postdata['status'],

            "source" =>$postdata['udf1'],

         );

       



        $ModelCall->insert("brokers_details", $updateArray);

        $msg = "Payment Sucessfully Done...";

        send_payment_sucess_mail($updateArray);

        send_new_payment_intimation($updateArray);

        if($postdata['udf1']=='BrokersRegistration')

        header("Location: ".SITE_URL."RE.php?actionResult=regsuccess");
        
        else if($postdata['udf1']=='AdsPayments')

        header("Location: ".SITE_URL."XYZ.php?actionResult=regsuccess");

        else

        header("Location: ".SITE_URL."IN.php?actionResult=regsuccess");



        exit(0);

       }



		//Do success order processing here...

	} else {

        //tampered or failed

        $msg = "Payment failed ...";

        if($postdata['udf1']=='BrokersRegistration')

        header("Location: ".SITE_URL."RE.php?actionResult=regfail");
        
        else if($postdata['udf1']=='AdsPayments')

        header("Location: ".SITE_URL."XYZ.php?actionResult=regsuccess");

        else

        header("Location: ".SITE_URL."IN.php?actionResult=regfail");



       exit(0);



		

	} 

}

else  {

    //tampered or failed

   // $msg = "Payment failed ...";

   header("Location: ".SITE_URL."RE.php?actionResult=regfail");

   exit(0);



    

} 



function send_payment_sucess_mail($result){

  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");

$From = "office.nrwa@nirvanacountry.co.in";

$FromName = "NRWA Office";

$getFullName = $result['first_name']." ".$result['last_name'];

//$ToAddress ="nishthagupta@gmail.com";

$toArray= array($result['emailid']=> $result['first_name']); 

$Subject = 'Acknowledgement of your Online payment for Resgistration';

     

    $Body="<table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 

    style='border-collapse:collapse;'>

    <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>

    <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>

    <span>

    Dear ".$result['first_name']." ".$result['last_name'].",

    <br><br>

     We are pleased to inform you that your Payment is successful with Nirvana Country. <br><br>    

     Your payment of Rs. ".$result['amt_paid']." was successful.          

   Visit your  <a  href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other new features.

 

<span style='text-align:center'> Warm Regards, <br><br>

NRWA Office <br>

www.nirvanacountry.co.in <br></span>

</span></p></td></tr></tbody></table>";

   

$data = array( "to" => $toArray,

"from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),

"subject" => "Acknowledgement of your Online payment for Resgistration",

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

      The New registration has come through the website. Following are the details given : <br><br>  

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