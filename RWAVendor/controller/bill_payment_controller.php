<?php

error_reporting(E_ALL);
include("../model/class.expert.php"); 
//include("custom_mailer_functions.php");
//include('../../CheckCustomerLogin.php');

?>
<?php

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



    if($_REQUEST['paynow']){
$_REQUEST['billid'] =$_REQUEST['paynow'];
$_REQUEST['bill_no']=$_REQUEST['paynow'];
$_REQUEST['amount'] =$_REQUEST['amt_'.$_REQUEST['paynow']];

$_SESSION['event_ticket']=$_REQUEST;


//print_r($_SESSION['event_ticket']);
//redirect_post(SITE_URL."pay_bills_new.php",$_REQUEST);

header("location: ".SITE_URL."pay_bills_module.php"); //payu
/*header("location: ".SITE_URL."Patym/cam_bill.php");*/ /*Paytm*/
 
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