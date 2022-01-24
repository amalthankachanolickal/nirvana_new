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
  $ModelCall->orderBy("id","asc");
$getNewsInfo = $ModelCall->get("tbl_newspaper_module");
$today= date("Y-m-d");
$end_date = date('Y-m-d', strtotime('+1 years'));
 foreach($getNewsInfo as $value){
           if($_REQUEST[$value['id']]){
           $dataU = array('user_id' => $_SESSION['UR_LOGINID'],
                          'news_id'=>$value['id'],
                          'quantity'=>$_REQUEST[$value['id']],
                          'amt'=>$_REQUEST["amt".$value['id']],
                          'start_date'=>$today,
                          'end_date'=>$end_date
           
           
           
           
           );    
           $resultU = $ModelCall->insert('tbl_newspaper_subscription',$dataU);
           }}


        header("location:".SITE_URL."?actionResult=carsubmitsussess");

}
else{
   
        header("location:".SITE_URL."login_signup.php?actionResult=loginrequiredsubmit&back_tracker=car_sticker_final_step.php");
}?>
