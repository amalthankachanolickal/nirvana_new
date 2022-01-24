<?php 

include("../model/class.expert.php");
include("../RWAVendor/controller/custom_mailer_functions.php");
 
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
include('PHPMailer-master/PHPMailerAutoload.php');

include('passwordHash.php');

if($_SESSION['UR_LOGINID']!=""){
  
   $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['TEMP_LOGINID']));

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("temp_car_stickers");




$rec[0]['user_id']=$ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']);
$resultU = $ModelCall->insert('tbl_car_stickers',$rec[0]);
        header("location:".SITE_URL."?actionResult=carsubmitsussess");

}
else{
   
        header("location:".SITE_URL."login_signup.php?actionResult=loginrequiredsubmit&back_tracker=car_sticker_final_step.php");
}?>
