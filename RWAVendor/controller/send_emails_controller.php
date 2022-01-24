<?php 

error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");

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
if(($_REQUEST['ActionCall']=="sending_emails"))
{
   
    if($_REQUEST['mail_notification']!=0){
    if($_REQUEST['mail_notification']==1){
   /// $ModelCall->where("user_status","Active");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['mail_notification']==2){
   $ModelCall->where("user_status","Active");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['mail_notification']==3){
    $ModelCall->where("user_status","DeActived");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['mail_notification']==4){
    $ModelCall->where("user_status","Suspended");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
  if($_REQUEST['mail_notification']==5){
      
    $ModelCall->where("user_email","charanbajrang21@gmail.com");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");

    
}  
    foreach($rec as $ressend){
      
            $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $ressend['first-name']." ".$ressend['last_name'];

$ToAddress =  $ressend['email'];      // Add a recipient
$Subject = 'New Vender Account Login from '.strip_tags(SITENAME).'!';


if($_REQUEST['mail_notification1']=='formate1'){
    
user_info_mail($ressend);
}  


if($_REQUEST['mail_notification1']=='formate2'){

email_varify_mail($ressend);
} 
if($_REQUEST['mail_notification1']=='formate3'){

account_ready_to_use_mail($ressend);
}
if($_REQUEST['mail_notification1']=='formate4'){
 custom_email($ressend,$_REQUEST);
} 
if($_REQUEST['mail_notification1']=='formate5'){
    print_r($ressend);
 send_email_billing($ressend);
} 
 }
}
header("location:".DOMAIN.AdminDirectory."send_emails.php?actionResult=adminsuccess");    
    
}

?>