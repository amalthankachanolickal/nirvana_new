<?php include('model/class.expert.php');
include('CheckCustomerLogin.php');
include('Email_Configuration_files.php');
require('mailin-lib/Mailin.php');

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
$postdata = $_POST;
//   echo "<pre>";
//   print_r($_POST);
//   exit(0);
$msg = '';

// Merchant Salt as provided by Payu
$SALT = "OwPaosAjUf";
// Merchant Salt as provided by Payu for TESTING 
//$SALT = "Bwxo1cPe";
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
	$CalcHashString 	= 	strtolower(hash('sha512', $additionalCharges.'|'.$SALT.'|'.$status.'|'.$reverseKeyString));
    //
    //echo "hash passed". $resphash.'<br/>';
   // echo "Calculated HashString ". $CalcHashString;
  
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
  'city' => $postdata['city'],
  'state' => (empty($postdata['state'])) ? '' : $postdata['state'],
  'country' => (empty($postdata['country'])) ? 'India' : $postdata['country'],
  'zipcode' =>$postdata['zipcode'],
  'email' => $postdata['email'],
  'phone' => $postdata['phone'],
  'response_msg' =>(empty($postdata['response_msg'])) ? '' : $postdata['response_msg'],
  'PG_TYPE' => $postdata['PG_TYPE'],
  'hash' => $postdata['hash'],
  'encryptedPaymentId' =>$postdata['encryptedPaymentId'],
  'bank_ref_num' => $postdata['bank_ref_num'],
  'bankcode' => $postdata['bankcode'],
  'error_Message' => $postdata['error_Message'],
  'name_on_card' =>$postdata['name_on_card'],
  'cardnum' => $postdata['cardnum'],
  'amount_split' => $postdata['amount_split'],
  'payuMoneyId' => $postdata['payuMoneyId'],
  'discount' => (empty($postdata['discount'])) ? '0.00' : $postdata['discount'],
  'net_amount_debit' => $postdata['net_amount_debit'],
  'status' =>$postdata['status'],
  'addedon' => $postdata['addedon'],
  'user_id' => $rec[0]['user_id'],
  'action_from_website' => $postdata['udf1'],
  'bill_no_on_website' => $postdata['udf2'],
);


$resultU1111 = $ModelCall->insert('tbl_transations_payu',$dataU);

	if ($status == 'success') {
       $msg = "Transaction Successful and Hash Verified...";
       if($postdata['udf1']=='NewsBillpaperModule' && $postdata['udf2']!=''){
      //  $ModelCall->where("bill_no", $postdata['udf2']);
        $updateArray=array(
            "bill_no"=> $postdata['udf2'],
            "month_name"=> date('MY'),
            "block_number"=>$rec[0]['block_id'],
            "house_number"=>$rec[0]['house_number_id'],
            "floor"=>$rec[0]['floor_number'],
            "total_bill_amt" => $postdata['amount'],
            "amt_paid" => $postdata['amount'],
            "date_paid" => $postdata['addedon'],
            "PGway_status" => $postdata['status'],
            "rcvd_amt" => $postdata['amount'],
            "rcvd_date" => $postdata['addedon'],

         );
         $result = array(
             "user_id"=>$rec[0]['user_id'],
             "user_name"=>$rec[0]['user_name'],
             "user_email"=>$rec[0]['user_email'],
             "password"=>$rec[0]['password'],
             "amount"=>$postdata['amount'],
             "first_name"=>$rec[0]['first_name'],
             "last_name"=>$rec[0]['last_name'],
             "BillNo"=> $postdata['udf2']
         );

         $dataNew = array(
          "block_id"=>$rec[0]['block_id'],
          "house_number"=>$rec[0]['house_number_id'],
          "floor"=>$rec[0]['floor_number'],
          "amount"=>$postdata['amount'],
          "first_name"=>$rec[0]['first_name'],
          "last_name"=>$rec[0]['last_name'],
          "BillNo"=> $postdata['udf2'],
          "payment_consent"=>$rec[0]['payment_consent'],
      );

        $ModelCall->insert("tbl_newspaper_bill", $updateArray);
        send_payment_sucess_mail($result);
        send_new_payment_intimation($dataNew);
        header("Location: ".SITE_URL."user_news_paper_bill.php?actionResult=regsuccess");
        exit(0);
       }

		//Do success order processing here...
	}
	else {
        //tampered or failed
        $msg = "Payment failed for Hash not verified...";
        header("Location: ".SITE_URL."user_news_paper_bill.php?actionResult=regfail");
        exit(0);

		
	} 
}
else exit(0);

function send_payment_sucess_mail($result){
  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
$From = "office.nrwa@nirvanacountry.co.in";
$FromName = "NRWA Office";
$getFullName = $result['first_name']." ".$result['last_name'];
// $ToAddress ="nishthagupta@gmail.com";
// $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
$toArray= array($result['user_email']=>$getFullName); 
$Subject = 'Acknowledgement of your payment of Newspaper Bill Online';
     
    $Body="<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".DOMAIN."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".DOMAIN."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Thank you for paying the Newspaper Bill Online. We acknowledge your payment of Rs. ".$result['amount']."/- for the Bill of  ".$result['BillNo'].". </span>
    </p>
    <p>Your payment will reach the Newspaper Vendor in 3 working days and we have intimated him of the same.  </p>
    <p>You can check the status online too.Login to your account with following details as :-
    Username :  ".$result['user_name']."  Pwd :  ".$result['password']." </p>
    <p>Reagards <br/> NRWA Office.</p>
                        
                    </tr>
					 
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'><br>
                       >
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you need any further assistance,<br>
                        please contact us at <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        NRWA Office</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td height='30'>&nbsp;</td>
            </tr>
            <tr>
              <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
               
                </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>";
   
$data = array( "to" => $toArray,
"from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
"subject" => "Acknowledgement of your payment of Newspaper Bill Online.",
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

function send_new_payment_intimation($datatobeSent){
  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
 // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
  $toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");
 
     switch($datatobeSent['block_id']){

         Case 1: 
         $block= "AG";
         break;

        Case 2: 
        $block= "BC";
        break;

         Case 3: 
         $block= "CC";
         break;

      Case 4: 
      $block= "DC";
      break;
     
      Case 5: 
      $block= "ES";
      break;

     } 

     switch($datatobeSent['floor']){

      Case 1: 
      $floor= "GF";
      break;

      Case 2: 
     $floor= "FF";
     break;

      Case 3: 
      $floor= "SF";
      break;

   Case 4: 
   $floor= "TF";
   break;
  
  } 

 if ($datatobeSent['payment_consent']=='' || is_null($datatobeSent['payment_consent'])) {
   $consent = 'Not Received';
 } else if ($datatobeSent['payment_consent']=='0'){
  $consent = 'No';
 } else if ($datatobeSent['payment_consent']=='1'){
  $consent = 'Yes';
 } else if ($datatobeSent['payment_consent']=='2'){
  $consent = 'Annual Payment';
 }

  $data = array( "to" => $toArray,
      "from" => array("website.admin@nirvanacountry.co.in", "Website Manager"),
      "subject" => "New Payment on Newspaper Received.",
      "html" => "Hello, <br><br> 
      This is to inform you that we have receievd a new payment on newpaper section online for - <br>
      Member Name :". $datatobeSent['first_name']." ".$datatobeSent['last_name'].".<br>
      Flat No : ".$block."-".$datatobeSent['house_number']."-". $floor.".<br>
      Amount: ".$datatobeSent['amount'].".<br>
      Nature : NewsPaper <br>
      Prospective Settlement Date : ". date('d-M-Y', strtotime(' + 2 days'))." <br><br>
      Payment Consent  : ". $consent." <br><br>
      Warm Regards <br>Website Manager",
  );
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