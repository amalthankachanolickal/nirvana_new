<?php include("../model/class.expert.php");
include("mail_functions.php");
require('../mailin-lib/Mailin.php');
include('CheckCustomerLogin.php');
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

 $dataU1111 = array(
	'user_id' => $_SESSION['UR_LOGINID'],
	'mob_num' => $_REQUEST['mobile_num']);
   
   
   $dataWoUserUpdate = array(
      'phone_number' =>  $_REQUEST['mobile_num'],
      'user_phone' => $_REQUEST['mobile_num']
   );
      
   
   $ModelCall->where('user_id',$_SESSION['UR_LOGINID']);
   $rec_curr = $ModelCall->get('Wo_Users');
      if( is_null($rec_curr[0]['user_phone']) && is_null($rec_curr[0]['phone_number']) ){
         $ModelCall->where('user_id',$_SESSION['UR_LOGINID']);
         $result = $ModelCall->update('Wo_Users',$dataWoUserUpdate);  
      }

   $ModelCall->where('user_id',$_SESSION['UR_LOGINID']);
   $ModelCall->where('mob_num',$_POST['mobile_num']);
   $rec = $ModelCall->get('tbl_non_primary_mob');

 if(count($rec)>0){
      $_SESSION['message']='This Number already exisits for you in system.';
   } else {
      $resultU1111 = $ModelCall->insert('tbl_non_primary_mob',$dataU1111);
      $_SESSION['message']='Phone Details are added';
   }

    header("location:".SITE_URL."housedetails.php");