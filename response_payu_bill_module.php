<?php include('model/class.expert.php');
error_reporting(1);
include('CheckCustomerLogin.php');
require('mailin-lib/Mailin.php');
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
////print_r($rec );
//exit(0);
$postdata = $_POST;
//  echo "<pre>";
// print_r($_POST);
// exit(0);
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

	//if (($status == 'success') && ($resphash==$CalcHashString)) {
        if ($status == 'success'){
	    $ModelCall->where("bill_number",$postdata['udf2']);
        $rec = $ModelCall->get("tbl_billing_new");
	    //echo $status;
	    //print_r($postdata);
       $data=array('mode'=>'online',

       'bill_num'=>$postdata['udf2'],
       'unit_num'=>$rec[0]['flat_no'],
       'bill_start_date'=>$rec[0]['bill_date'],
       'amount_received'=>$postdata['udf5'],
       'date_received'=>date("Y-m-d"),
       'pay_ref'=>$postdata['txnid'],
       'amount_received_bank'=>$postdata['udf5'],
       'date_received_bank'=>date("Y-m-d"),
        'source'=>'PAYU',
        'payment_mode'=>$postdata['mode']
       );
       //print_r($data);
        $resultU11 = $ModelCall->insert('tbl_bill_payment_details',$data);

        $amt_paid=$rec[0]['amt_paid'];
        $total_outstanding=$rec[0]['total_outstanding'];
        $datau=array(
            'amt_paid'=>$amt_paid+$postdata['udf5'],
            'total_outstanding'=>$total_outstanding-$postdata['udf5'],
            );
        $ModelCall->where("bill_number",$postdata['udf2']);
        $rec_bl = $ModelCall->update("tbl_billing_new",$datau);  
		//Do success order processing here...
		$dataArray=array('amount'=>$postdata['udf5'],'bill_date'=>$rec[0]['bill_date'],'total_outstanding'=>$total_outstanding-$postdata['udf5']);
		$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
        $ModelCall->orderBy("user_id","asc");
        $rec2 = $ModelCall->get("Wo_Users");
        $data_phone=array(
            'user_phone'=> $postdata['phone'],
            'phone_number'=> $postdata['phone']
            );
            
            $dataNew = array(
          "block_id"=> $rec2[0]['block_id'],
          "house_number"=> $rec2[0]['house_number_id'],
          "floor"=> $rec2[0]['floor_number'],
          "amount"=>$postdata['udf5'],
          "first_name"=> $rec2[0]['first_name'],
          "last_name"=> $rec2[0]['last_name'],
          "BillNo"=> $postdata['udf2'],
          "payment_consent"=> $rec2[0]['payment_consent'],
      );
      
            $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
            $rec_up = $ModelCall->update("Wo_Users",$data_phone);
                send_email_event_successful_transaction($rec2, $dataArray);
                send_new_payment_intimation($dataNew);
                header("Location: ".SITE_URL."bills.php");
                exit(0);
    }else {
        //tampered or failed
        $msg = "Payment failed for Hash not verified...";
        header("Location: ".SITE_URL."bills.php");
        exit(0);

		
	} 
}
else 
exit(0);

function send_email_event_successful_transaction($rec, $dataArray){
    //print_r($rec);
    
   // echo"<pre>";
    //print_r($dataArray);
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec[0]['user_email']=>$rec[0]['firstname']);
     $bccArray= array("techlead@myrwa.online"=>"Nishtha");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha","charanbajrang21@gmail.com"=>"Bajrang","kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
            "bcc" => $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Online Bill Payment Confirmation.",
        "html" => "Dear ".$rec[0]['user_title']." ".$rec[0]['first_name']." ".$rec[0]['last_name'].", 
        <br /> <br />
        Thank your for your payment of Rs.".$dataArray['amount']." towards your CAM Bill Dated ".$dataArray['bill_date'].".
        <br /> <br />
       In case you need any further assistance,
          please contact us at <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>
        <br />  Warm Regards,
        <br />
        NRWA Office <br />
        <a href='https://www.nirvanacountry.co.in/' target='_blank'>www.nirvanacountry.co.in/</a>"
        
    );
   // echo"<pre>";
    //print_r($toArray);

   $mailin->send_email($data);
  //  echo "</pre>";
}

function send_new_payment_intimation($datatobeSent){
  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
 // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
  $toArray= array("accounts.nirvana@nimbusharbor.com"=>"Accounts",
  "accounts@nirvanacountry.co.in"=>"NRWA Accounts",
  "office.nrwa@nirvanacountry.co.in"=>"NRWA OFFice",
  "customers@myrwa.online"=>"Kushal",
  "kushalbhasin@gmail.com"=>"Kushal",
  "techlead@myrwa.online"=>"Nishtha",
  );
 
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



  $data = array( "to" => $toArray,
      "from" => array("website.admin@nirvanacountry.co.in", "Website Manager"),
      "subject" => "New Payment on CAM Bill Received online from website.",
      "html" => "Hello, <br><br> 
      This is to inform you that we have receievd a new payment on CAM Bill section online for - <br>
      Member Name :". $datatobeSent['first_name']." ".$datatobeSent['last_name'].".<br>
      Flat No : ".$block."-".$datatobeSent['house_number']."-". $floor.".<br>
      Amount: ".$datatobeSent['amount'].".<br>
      Nature : CAM BILL <br>
      Bill No   : ".$datatobeSent['BillNo']." <br>
      Prospective Settlement Date : ". date('d-M-Y', strtotime(' + 2 days'))." <br><br>
      
      Warm Regards <br> Website Manager<br />
        <a href='https://www.nirvanacountry.co.in/' target='_blank'>www.nirvanacountry.co.in/</a>"
  );
$mailin->send_email($data);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
	