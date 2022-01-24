<?php include('model/class.expert.php');
include('CheckCustomerLogin.php');
//include('controller/Email_Configuration_files.php');
require('mailin-lib/Mailin.php');
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
$postdata = $_POST;
//  echo "<pre>";
//  print_r($_POST);
$msg = '';
// Merchant Salt as provided by Payu
$SALT = "OwPaosAjUf";
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
        $ModelCall->where("bill_no", $postdata['udf2']);
        $updateArray=array(
            "amt_paid" => $postdata['amount'],
            "date_paid" => $postdata['addedon'],
            "PGway_status" => $postdata['status'],
            "bill_details" => 'Online- '.$postdata['mode'],
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
         $ModelCall->update("tbl_newspaper_bill", $updateArray);
        send_payment_sucess_mail($result);
       
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
  $getFullName = $result['first_name']." ".$result['last_name'];
  $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($result['user_email']=>$result['first_name']);
   // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Acknowledgement of your payment of Newspaper Bill Online",
        "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
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
                          Username : ".$result['user_name']."  Pwd :  ".$result['password']." </p>
                          <p>Reagards <br/> NRWA Office.</p>
                                              
                          </tr>
                 
                          <tr>
                            <td align='left' valign='middle' style='padding:0px 15px 0 55px'><br>
                            
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
      </table>"
        
        
    );
   // echo"<pre>";
    //print_r($toArray);
$mailin->send_email($data);
  //  echo "</pre>";

}
?>
