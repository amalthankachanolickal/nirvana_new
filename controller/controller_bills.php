
<?php 

require("../model/class.expert.php");
require("../RWAVendor/controller/custom_mailer_functions.php");
 
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

if($_REQUEST['viewbill']){
    
    $_SESSION['bill_id']=$_REQUEST['bill_no'];
   
    error_reporting(E_ALL);
       header("Location: https://sitename.com/login.php");
       exit();
}
?>