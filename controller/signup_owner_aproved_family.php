<?php include("../model/class.expert.php");
//include("../RWAVendor/controller/custom_mailer_functions.php");
//print_r($_REQUEST);
include("mail_functions.php");
require('../mailin-lib/Mailin.php');
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
//print_r($_REQUEST);

 
if(($_REQUEST['first_name']!='') && ($_REQUEST['last_name']!='') && ($_REQUEST['user_email']!='') )
{
    
    
$ModelCall->where("user_id",$_SESSION['UR_LOGINID']);
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$recowner = $ModelCall->get("Wo_Users"); 

if(!isset($_SESSION['UR_LOGINID']))
{
    
header("location:".SITE_URL."login_signup.php?actionResult=regerror");
}
else 
{
     $failedpass=0;
   if($_REQUEST['user_type']==0 || $_REQUEST['user_type']==1){
    $ModelCall->where("block_id", $_REQUEST['block_id']);
$ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
$ModelCall->where("floor_number", $_REQUEST['floor_number']);
$ModelCall->where("floor_number", $_REQUEST['floor_number']);
$ModelCall->where("user_type", $_REQUEST['user_type']);
$rec = $ModelCall->get("Wo_Users");
if($ModelCall->count ==1){
    $failedpass=1;
}
else{
    $failedpass=0;
}
}



if($failedpass){
    header("location:".SITE_URL."login_signup.php?actionResult=loginblockalready");
}
else{
    echo "me";
$getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'];
$getFullNameowner = $recowner[0]['first_name'].' '.$recowner[0]['last_name'];
$getFullName1 = ucwords($_REQUEST['first_name']).' '.ucwords($_REQUEST['last_name']);
$GetNewpassword = generate_pwd();
if($_REQUEST['user_title'] == 'Mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}

$user_name=generate_username();
if($_REQUEST['owner_name']){
    
    $owner=$_REQUEST['owner_name'];
    
}
else{
    
    $owner=$getFullName;
}
if($_REQUEST['owner_email']){
    
    $owner_email=$_REQUEST['owner_email'];
    
}
else{
    
    $owner=$_REQUEST['email'];;
}
if($_REQUEST['owner_mb_num']){
    
    $owner_mb_num=$_REQUEST['owner_mb_num'];
    
}
else{
    
    $owner_mb_num=0;
}
if($_REQUEST['user_type']==2){
    $_REQUEST['user_resident_type']=null;
    $_REQUEST['block_id']=null;
    $_REQUEST['house_number_id']=null;
    $_REQUEST['floor_number']=null;
}
$ModelCall->where("user_name",$recowner[0]['email']);
//$ModelCall->where("website_status ='1'");
//$ModelCall->orderBy("user_id","asc");
$reco = $ModelCall->get("Wo_Users"); 
if($reco[0]['user_name']==$recowner[0]['email']){
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      for ($i = 0; $i < 3; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString1 .= $characters[$index]; 
    } 
    $user_name=$randomString1.$recowner[0]['email'];
}
else{
    $user_name=$recowner[0]['email'];
}
$dataU = array( 
	'username' => $user_name, 
	'email' => $_REQUEST['user_email'],
	'client_id' => $getClientInfo[0]['id'],
	'password' => $GetNewpassword,
	'first_name' => ucwords($_REQUEST['first_name']), 
	'user_title' => $_REQUEST['user_title'], 
	'middle_name' => ucwords($_REQUEST['middle_name']), 
	'last_name' => ucwords($_REQUEST['last_name']),
	'gender' => $gender, 
	'user_name'=>$user_name,
	'owner_name' =>  $getFullNameowner,
	'owner_email' => $recowner[0]['email'], 
	'owner_mb_num' => $recowner[0]['phone_number'], 
	'status' => '0',
	'website_status' =>'0',
	'user_status'=>'Active',
	'active' => '1',
	'avatar' => 'upload/photos/d-avatar.jpg',
	'cover' => 'upload/photos/d-cover.jpg',
	'background_image_status' => '0',
	'relationship_id' => '0',
	'birthday' => '0000-00-00',
	'country_id' => '0',
	'language' => 'english',
	'email_code' => '0',
	'src' => 'site',
	'follow_privacy' => '0',
	'friend_privacy' => '0',
	'post_privacy' => 'ifollow',
	'message_privacy' => '0',
	'confirm_followers' => '0',
	'show_activities_privacy' => '1',
	'birth_privacy' => '0',
	'visit_privacy' => '0',
	'verified' => '0',
	'lastseen' => '0',
	'showlastseen' => '1',
	'emailNotification' => '1',
	'e_liked' => '1',
	'e_wondered' => '1',
	'e_shared' => '1',
	'e_followed' => '1',
	'e_commented' => '1',
	'e_visited' => '1',
	'e_liked_page' => '1',
	'e_mentioned' => '1',
	'e_joined_group' => '1',
	'e_accepted' => '1',
	'e_profile_wall_post' => '1',
	'status' => '0',
	'admin' => '0',
	'type' => 'user',
	'registered' => '0/0000',
	'start_up' => '0',
	'start_up_info' => '0',
	'startup_follow' => '0',
	'startup_image' => '0',
	'last_email_sent' => '0',
	'sms_code' => '0',
	'is_pro' => '0',
	'pro_time' => '0',
	'pro_type' => '0',
	'joined' => '0',
	'referrer' => '0',
	'balance' => '0',
	'notifications_sound' => '0',
	'order_posts_by' => '1',
	'social_login' => '0',
	'wallet' => '0.00',
	'lat' => '0',
	'lng' => '0',
	'last_location_update' => '0',
	'share_my_location' => '1',
	'user_allowed' => '1',
	'user_invitesleft' => '10',
	'user_referer' => '0',
	'email_code' => md5($recowner[0]['user_email']),
	'block_id' => isset($recowner[0]['block_id'])?$recowner[0]['block_id']:0, 
	'house_number_id' =>isset($recowner[0]['house_number_id'])?$recowner[0]['house_number_id']:0,
	'floor_number' => isset($recowner[0]['floor_number'])?$recowner[0]['floor_number']:0,
	'user_type' => 3+$recowner[0]['user_type'],
	'user_resident_type' =>$_REQUEST['user_resident_type'], 
	'admin_approval' => '1',
	'email_verify' => '0',
	'created_date' => date("F j, Y, g:i a"),
	'created_ip' => $ModelCall->getRealIpAddr(),
	'ip_address' => $ModelCall->getRealIpAddr(),
	'user_number'=>$user_name, 
	'join_date' => $ModelCall->get_today_date()
 
	);
	
//print_r($dataU);	
//if ($ModelCall->insert('Wo_Users',$dataU))
  //echo $ModelCall->count . ' records were updated';
//else
  //echo 'update failed: ' . $ModelCall->getLastError();	
   
$resultU = $ModelCall->insert('Wo_Users',$dataU);

	email_varify_mail($dataU);
header("location:".SITE_URL."housedetails.php");
}
}}
else
{
header("location:".SITE_URL."login_signup.php?actionResult=regvirus");
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
function generate_pwd(){
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      for ($i = 0; $i < 4; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString1 .= $characters[$index]; 
    } 
          $characters = '0123456789'; 
      for ($i = 0; $i < 4; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString2 .= $characters[$index]; 
    }

    return $randomString1.$randomString2;
    
    
}