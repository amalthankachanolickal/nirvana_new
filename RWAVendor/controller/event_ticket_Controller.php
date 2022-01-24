<?php

error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
include('../../CheckCustomerLogin.php');

?>
<?php
function TripCodeGenerate($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
} 
function phpexpertOTPSPONSER($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
} 

function phpexpertOTPSPONSER1($length = 6, $chars = '0987654321')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
}
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
include('PHPMailer-master/PHPMailerAutoload.php');
include('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
include('spreadsheet-reader-master/SpreadsheetReader.php');

include('passwordHash.php');
//print_r($_REQUEST);


if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='eventsModule'))
{
    $ModelCall->where ("eid", $_REQUEST['eid']);
    $result =  $ModelCall->get('tbl_events_tickets');
    $bill_no=generate_username();
    $quantity=0;
    foreach($result as $ticket_type){
        if($_REQUEST["event".$ticket_type['id']]){
                $dataU3 = array(
                            'billid'=>$bill_no,
                            'user_id'=>$_SESSION['UR_LOGINID'],
                            'ticket_id'=>$ticket_type['id'],
                            'quantity'=>$_REQUEST["event".$ticket_type['id']],
                            'total_amount'=>$_REQUEST['amount'],
                            'eid'=>$_REQUEST['eid']
                            );
    //echo "<pre>";
    //print_r($dataU3) ;
            if($ticket_type['pinventory']){
                $quantity=$quantity+$_REQUEST["event".$ticket_type['id']];
                
            }

            $resultU = $ModelCall->insert('tbl_event_ticket_sold_temp',$dataU3);
        }
    
    }
$_REQUEST['billid'] =$bill_no;
$_SESSION['event_ticket']=$_REQUEST;
//print_r($_SESSION['event_ticket']);
//redirect_post(SITE_URL."pay_bills_new.php",$_REQUEST);

$ModelCall->where("eid",$_REQUEST['eid']);
$geteventinvInfo = $ModelCall->get("tbl_event_ticket_inventory");
$today=strtotime(date("Y-m-d"));
$last=strtotime($geteventinvInfo[0]['offer_date']);
$sold_by_admin=$geteventinvInfo[0]['sold_by_admin'];
$sold_by_us=$geteventinvInfo[0]['sold_by_us'];
$total_sold=$sold_by_admin+$sold_by_us;
$availble =$geteventinvInfo[0]['total_tickets']-$total_sold;
if($availble<1){
    header("location: ".SITE_URL."event_ticket.php?eid=".$_REQUEST['eid']);
    $_SESSION['error']='Sorry , No Places are left.';
}
if($availble<$quantity){
    header("location: ".SITE_URL."event_ticket.php?eid=".$_REQUEST['eid']);
    $_SESSION['error']='Sorry , Only '.$availble.'  Places are left.Kindly select total number of places less than'.$availble;
}
elseif($geteventinvInfo[0]['otl']<$quantity+$total_sold){
    $left = ($quantity+$total_sold)-$geteventinvInfo[0]['otl'];
    header("location: ".SITE_URL."event_ticket.php?eid=".$_REQUEST['eid']);
    $_SESSION['error']='Only '. $left .' Places are available at the offer amount. Kindly select total number of places less than '. $left ;
}
else{
 header("location: ".SITE_URL."pay_bills_new.php");
}


}

if ($_REQUEST['ActionCall']=='EditTRDRates'){
// print_r($_REQUEST);
// exit(0);
$dataU = array(
	'our_charge' => $_REQUEST['our_charge']
    );
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('payment_mode_charges', $dataU);
if($result){
$_SESSION['error']='The Changres are updated.';
}else{
 $_SESSION['error']='Error! The Changres not updated. Try Again.';
}
header("location: ".DOMAIN.AdminDirectory."tdr-rate-management.php");
}

function generate_username(){
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      for ($i = 0; $i < 4; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString1 .= $characters[$index]; 
    } 
          $characters = '0123456789'; 
      for ($i = 0; $i < 10; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString2 .= $characters[$index]; 
    }
    return $randomString1.$randomString2;
    
}

/**
 * Redirect with POST data.
 *
 * @param string $url URL.
 * @param array $post_data POST data. Example: array('foo' => 'var', 'id' => 123)
 * @param array $headers Optional. Extra headers to send.
 */
function redirect_post($url, array $data, array $headers = null){
    $params = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    if (!is_null($headers)) {
        $params['http']['header'] = '';
        foreach ($headers as $k => $v) {
            $params['http']['header'] .= "$k: $v\n";
        }
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if ($fp) {
        echo @stream_get_contents($fp);
        die();
    } else {
        // Error
        throw new Exception("Error loading '$url', $php_errormsg");
    }
}



?>