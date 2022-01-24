<?php include("../model/class.expert.php");
//include("../RWAVendor/controller/custom_mailer_functions.php");
//print_r($_REQUEST);

?>
<?php
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

function BookaTablegenRandomString11() {
$length =8;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
} 

function CustomerRandomCode() {
$length =6;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
return $string;
} 

function WalletTransactionNo() {
$length =12;
$characters ='0123456789';
$string ='';    
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
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

include('passwordHash.php');
// print_r($_POST);
// exit(0);
 
$dataU1 = array( 
	'user_id'=>$_POST['user_id'],
	'start_date' => $_POST['start_date'],
	'end_date' => $_POST['end_date']
	);
	
print_r($dataU1);	

//if ($ModelCall->insert('tbl_tanancy_dates',$dataU1))
 //echo $ModelCall->count . ' records were updated';
//else
 //echo 'update failed: ' . $ModelCall->getLastError();	
  $ModelCall->where('user_id',$_POST['user_id']);
  $rec = $ModelCall->get('tbl_tanancy_dates');
  if(count($rec)>0){
   $ModelCall->where('user_id',$_POST['user_id']);
   $ModelCall->update('tbl_tanancy_dates',$dataU1);
  } else {
   $ModelCall->insert('tbl_tanancy_dates',$dataU1);
  }

$_SESSION['message']='Details are updated';
header("location:".SITE_URL."housedetails.php");