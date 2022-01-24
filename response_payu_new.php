<?php include('model/class.expert.php');
include('CheckCustomerLogin.php');
require('mailin-lib/Mailin.php');
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
//print_r($rec );
//exit(0);
$postdata = $_POST;
//   echo "<pre>";
//    print_r($_POST);
//   exit(0);
$msg = '';

// Merchant Salt as provided by Payu
//$SALT = "OwPaosAjUf";
// Merchant Salt as provided by Payu for TESTING 
$SALT = "Bwxo1cPe";
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
    'address2' =>$postdata['address2'],
    'city' => $postdata['city'],
    'state' => $postdata['state'],
    'country' => $postdata['country'],
    'zipcode' =>$postdata['zipcode'],
    'email' => $postdata['email'],
    'phone' => $postdata['phone'],
    'response_msg' =>$postdata['response_msg'],
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
    'discount' => $postdata['discount'],
    'net_amount_debit' => $postdata['net_amount_debit'],
    'status' =>$postdata['status'],
    'addedon' => $postdata['addedon'],
    'user_id' => $rec[0]['user_id'],
    'action_from_website' => $postdata['udf1'],
    'bill_no_on_website' => $postdata['udf2'],
);

$resultU1111 = $ModelCall->insert('tbl_transations_payu',$dataU);

	if (($status == 'success') && ($resphash==$CalcHashString)) {
       $msg = "Transaction Successful and Hash Verified...";
       if($postdata['udf1']=='NewsBillpaperModule' && $postdata['udf2']!=''){
        $ModelCall->where("bill_no", $postdata['udf2']);
        $updateArray=array(
            "amt_paid" => $postdata['amount'],
            "date_paid" => $postdata['addedon'],
            "PGway_status" => $postdata['status'],

         );
        $ModelCall->update("tbl_newspaper_bill", $updateArray);
        header("Location: ".SITE_URL."user_news_paper_bill.php?actionResult=regsuccess");
        exit(0);
       }
       if($postdata['udf1']=='eventsModule'){
       //    echo "<br/> billid ". $postdata['udf2']. "<br/>";
        $ModelCall->where ("billid", $postdata['udf2']);
        $result =  $ModelCall->get('tbl_event_ticket_sold_temp');
       // print_r( $result);
        if($result){
            foreach($result as $ticket_type){
            $resultU = $ModelCall->insert('tbl_event_ticket_sold',$ticket_type);
            
            $ModelCall->where ("eid", $ticket_type['eid']);
            $result =  $ModelCall->get('tbl_event_ticket_inventory');
           // print_r($result);
            $sold=$result['0']['sold_by_us']+$ticket_type['quantity'];
            $availble=$result['0']['available_tickets']-$ticket_type['quantity'];
            // print_r($sold);
            // print_r($availble);
            $data4=array(
                'sold_by_us'=>$sold,
                'available_tickets'=>$availble
                
                );
               // print_r($data4);

            $ModelCall->where ("id", $ticket_type['ticket_id']);
            $resul2t =  $ModelCall->get('tbl_events_tickets');
           // print_r($resul2t);
             if($resul2t[0]['pinventory']){
                    $ModelCall->where ("eid", $resul2t[0]['eid']);
                    $resultU = $ModelCall->update('tbl_event_ticket_inventory',$data4);
                }
           // print_r($resultU);
           $tkt_category.=  $resul2t[0]['category'].', ';
           $total_quantity = $total_quantity+$ticket_type['quantity'];
           $amount= $ticket_type['total_amount'];
            }
            $total_amount_charged= $postdata['amount'];

            $dataMailArray=array(
                'tkt_category'=>$tkt_category,
                'total_quantity'=>$total_quantity,
                'amount'=>$amount,
                'total_amount_charged'=>$total_amount_charged
                
                );

        }
        send_email_event_successful_transaction($rec,$dataMailArray);
        $_SESSION['actionResult']='ticketsuccess';
        header("Location: ".SITE_URL."event_ticket.php?eid=".$result[0]['eid']);
        exit(0);  
       }

		//Do success order processing here...
	}
	else {
        //tampered or failed
        $msg = "Payment failed for Hash not verified...";
       // header("Location: ".SITE_URL."user_news_paper_bill.php?actionResult=regfail");
        exit(0);

		
	} 
}
else exit(0);

function send_email_event_successful_transaction($rec, $dataArray){
    echo"<pre>";
    print_r($dataArray);
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha","charanbajrang21@gmail.com"=>"Bajrang","kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Your New Year Party places are booked online.",
        "html" => "Dear ".$rec[0]['first_name']." ".$rec[0]['last_name'].", 
        <br /> <br />
        your Nye places are booked online as per the details below. 
        (Table of category ".
        $dataArray['tkt_category']. ", no of tickets ".
        $dataArray['total_quantity']. ", amount ".
        $dataArray['amount']. " 
        Charges (total) no mention of gst here.  
        Total amount paid ".
        $dataArray['total_amount_charged']. "
        <br /> <br />
        Look forward to seeing you at event and have a great party. 
        <br /> <br />
        Warn Regards,
        <br />
        Nrwa Office"
    );
    echo"<pre>";
    print_r($toArray);

    print_r($mailin->send_email($data));
    echo "</pre>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	