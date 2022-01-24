<?php include("../model/class.expert.php");
include("mail_functions.php");
include("Email_Configuration_files.php");
require('../mailin-lib/Mailin.php');
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


if(($_REQUEST['ActionCall']=="AccessYaarPerform"))
{
    
/*=================Cookiecode=================*/
$cookie_name = "cookie_name";
$cookie_pass = "cookie_pass";
if(isset($_POST["remember"])) {
    $cookie_username = $_REQUEST["user_email"];
    $cookie_password = $_REQUEST["user_pass_login"];
    setcookie($cookie_name, $cookie_username, time() + (86400 * 30), "/");// 86400 = 1 day
    setcookie($cookie_pass, $cookie_password, time() + (86400 * 30), "/"); // 86400 = 1 day
}else{
    setcookie($cookie_name, '', time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie($cookie_pass, '', time() + (86400 * 30), "/"); // 86400 = 1 day
}
/*=============================================*/




if($_REQUEST['policy_accept']==1){
$GetNewpassword = $_REQUEST['user_pass_login'];


$ModelCall->where("user_name", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
$ModelCall->where("password", $GetNewpassword);

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if(count($rec)==1 && $rec[0]['admin_approval']==1  && $rec[0]['email_verify']==1 && ($rec[0]['user_status']!='Deactivated'))
{ 
$hash = sha1(rand(111111111, 999999999)) . md5(microtime()) . rand(11111111, 99999999) . md5(rand(5555, 9999));
$ModelCall->where("session_id",$hash);
$ModelCall->orderBy("session_id","asc");
$deleteCustomerRecord = $ModelCall->delete("Wo_AppsSessions");

 if($deleteCustomerRecord) 
 {
 $dataU1111 = array(
	'user_id' => $rec[0]['user_id'],
	'session_id' => $hash,
	'platform' => 'web', 
	'time' => time());
	$resultU1111 = $ModelCall->insert('Wo_AppsSessions',$dataU1111);
 }
 else
 {
   $dataU1111 = array('user_id' => $rec[0]['user_id'],
	'session_id' => $hash,
	'platform' => 'web', 
	'time' => time());
	$resultU1111 = $ModelCall->insert('Wo_AppsSessions',$dataU1111);
 }

if($rec[0]['first_login']==0){
    header("location:".SITE_URL."PasswordResetFirstLogin.php?uid=".session_id().session_id()."&userid=".base64_encode($rec[0]['user_id'])."&verifycode=".$GetNewpassword."&utm_campaign=verify_user&utm_medium=email&utm_source=oridle&utm_content=html&uniqid=".$getSerialNumber."&account_email_verify=0");
    
}else{
    $_SESSION['UR_LOGINID']=$rec[0]['user_id'];
$_SESSION['UR_LOGINNAME']=$ModelCall->utf8_decode_all($rec[0]['first_name']).' '.$ModelCall->utf8_decode_all($rec[0]['last_name']);
$_SESSION['UR_NAME']=$rec[0]['username'];
$_SESSION['user_id'] = $hash;
$_SESSION['unit_no']="NIR-".$rec[0]['block_id']."-".$rec[0]['house_number_id']."-".$rec[0]['floor_number'];
$_SESSION['user_type'] = $rec[0]['user_type'];
 $_SESSION['EC']=0;
$ModelCall->where("user_id", $rec[0]['user_id']);
$recr = $ModelCall->get("tbl_EC_uses");

foreach($recr as $rece){
    if($rece['status']=='Current'){
        $_SESSION['EC']=1;
        break;
    }
}
$_REQUEST['back_tracker'];
$_REQUEST['view_mode'];
$_SESSION['u_type'] = "user";
$_SESSION['user_id'] = $rec[0]['user_id'];
$_SESSION['username'] = $_REQUEST['user_email'];

if (isset($_SESSION['log_redirect'])) {
  header("location: ../dashboard/");
} else if(isset($_REQUEST['back_tracker'])&& !isset($_REQUEST['view_mode']) ){
    
    header("location:".SITE_URL.$_REQUEST['back_tracker']);
} 
else if(isset($_REQUEST['back_tracker'])&& isset($_REQUEST['view_mode']) ){
    
    header("location:".SITE_URL.$_REQUEST['back_tracker']."&view-mode=".$_REQUEST['view_mode']);
} 
else{
    header("location:".SITE_URL."");
    
}
    
}
}


else 
{
    if($rec[0]['admin_approval']==0){
    header("location:".SITE_URL."login_signup.php?actionResult=loginerror");
    }else if($rec[0]['email_verify']==0){
    header("location:".SITE_URL."login_signup.php?actionResult=passworvarifyemail");
    }else{
    header("location:".SITE_URL."login_signup.php?actionResult=invalidloginerror");
    }
}
}
else{
    header("location:".SITE_URL."login_signup.php?actionResult=nocheckbox");
}
}


if(($_POST['ActionCall']=="LoginAccessNew"))
{
   // print_r($_POST);
    
    /* $token = $_POST["token"];
    
     $curlData = array(
        'secret' => '6LfCdcQZAAAAAFIq_wpiiCopBhaGW46wAz9-MXbT',
        'response' => $token
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curlData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curlResponse = curl_exec($ch);
    
    $captchaResponse = json_decode($curlResponse, true);
   // print_r($captchaResponse); 
   // echo  $_SERVER['SERVER_NAME'];
   // exit(0);
    if ($captchaResponse['success'] == '1' && $captchaResponse['action'] == $_POST['ActionCall'] && $captchaResponse['score'] >= 0.5) {
       // echo 'Form Submitted Successfully';
    } else {
         header("location:".SITE_URL."login_signup.php?actionResult=novalidCaptcha");
         exit(0);
    }
    */
   
/*=================Cookiecode=================*/
$cookie_name = "cookie_name";
$cookie_pass = "cookie_pass";
if(isset($_POST["remember"])) {
    $cookie_username = $_REQUEST["user_email"];
    $cookie_password = $_REQUEST["user_pass_login"];
    setcookie($cookie_name, $cookie_username, time() + (86400 * 30), "/");// 86400 = 1 day
    setcookie($cookie_pass, $cookie_password, time() + (86400 * 30), "/"); // 86400 = 1 day
}else{
    setcookie($cookie_name, '', time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie($cookie_pass, '', time() + (86400 * 30), "/"); // 86400 = 1 day
}
/*=============================================*/




if($_REQUEST['policy_accept']==1){
$GetNewpassword = $_REQUEST['user_pass_login'];


$ModelCall->where("user_name", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
$ModelCall->where("password", $GetNewpassword);

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
print_r($rec);
if(count($rec)==1 && $rec[0]['admin_approval']==1  && $rec[0]['email_verify']==1 && ($rec[0]['user_status']=='Active'))
{ 
$hash = sha1(rand(111111111, 999999999)) . md5(microtime()) . rand(11111111, 99999999) . md5(rand(5555, 9999));
$ModelCall->where("session_id",$hash);
$ModelCall->orderBy("session_id","asc");
$deleteCustomerRecord = $ModelCall->delete("Wo_AppsSessions");

 if($deleteCustomerRecord) 
 {
 $dataU1111 = array(
	'user_id' => $rec[0]['user_id'],
	'session_id' => $hash,
	'platform' => 'web', 
	'time' => time());
	$resultU1111 = $ModelCall->insert('Wo_AppsSessions',$dataU1111);
 }
 else
 {
   $dataU1111 = array('user_id' => $rec[0]['user_id'],
	'session_id' => $hash,
	'platform' => 'web', 
	'time' => time());
	$resultU1111 = $ModelCall->insert('Wo_AppsSessions',$dataU1111);
 }

if($rec[0]['first_login']==0){
    header("location:".SITE_URL."PasswordResetFirstLogin.php?uid=".session_id().session_id()."&userid=".base64_encode($rec[0]['user_id'])."&verifycode=".$GetNewpassword."&utm_campaign=verify_user&utm_medium=email&utm_source=oridle&utm_content=html&uniqid=".$getSerialNumber."&account_email_verify=0");
    
}else{
    $_SESSION['UR_LOGINID']=$rec[0]['user_id'];
$_SESSION['UR_LOGINNAME']=$ModelCall->utf8_decode_all($rec[0]['first_name']).' '.$ModelCall->utf8_decode_all($rec[0]['last_name']);
$_SESSION['UR_NAME']=$rec[0]['username'];
$_SESSION['user_id'] = $hash;
$_SESSION['unit_no']="NIR-".$rec[0]['block_id']."-".$rec[0]['house_number_id']."-".$rec[0]['floor_number'];
$_SESSION['user_type'] = $rec[0]['user_type'];
 $_SESSION['EC']=0;
$ModelCall->where("user_id", $rec[0]['user_id']);
$recr = $ModelCall->get("tbl_EC_uses");

foreach($recr as $rece){
    if($rece['status']=='Current'){
        $_SESSION['EC']=1;
        break;
    }
}
$_REQUEST['back_tracker'];
$_REQUEST['view_mode'];
$_SESSION['u_type'] = "user";
$_SESSION['user_id'] = $rec[0]['user_id'];
$_SESSION['username'] = $_REQUEST['user_email'];

if (isset($_SESSION['log_redirect'])) {
  header("location: ../dashboard/");
} else if(isset($_REQUEST['back_tracker'])&& !isset($_REQUEST['view_mode']) ){
    
    header("location:".SITE_URL.$_REQUEST['back_tracker']);
} 
else if(isset($_REQUEST['back_tracker'])&& isset($_REQUEST['view_mode']) ){
    
    header("location:".SITE_URL.$_REQUEST['back_tracker']."&view-mode=".$_REQUEST['view_mode']);
} 
else{
    header("location:".SITE_URL."");
    
}
    
}
}else {
    if(count($rec)==0){
        header("location:".SITE_URL."login_signup.php?actionResult=invalidloginerror");
    }else if($rec[0]['admin_approval']==0){
         echo "here1";
    header("location:".SITE_URL."login_signup.php?actionResult=loginerror");
    }else if($rec[0]['email_verify']==0){
         echo "here2";
    header("location:".SITE_URL."login_signup.php?actionResult=passworvarifyemail");
    }else{
        echo "here3";
    header("location:".SITE_URL."login_signup.php?actionResult=invalidloginerror");
   }
}
}
else{
    header("location:".SITE_URL."login_signup.php?actionResult=nocheckbox");
}
}


if(($_REQUEST['ActionCall']=="UpdateDetails"))
{
if($_SESSION['UR_LOGINID'])
{
 
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 

if(count($rec)==1)
{ 

$getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'].rand();

$getFullName1 = ucwords($_REQUEST['first_name']).' '.ucwords($_REQUEST['last_name']);

$GetNewpassword = $rec[0]['password'];

if($_REQUEST['old_pass']==$GetNewpassword){
    
     if($_REQUEST['new_pass']!=""){
         $GetNewpassword =$_REQUEST['new_pass'];
     }
     
}
else{
    header("location:".SITE_URL."user_profile.php?actionResult=passnomtch");
   exit(0);
}

if($_REQUEST['user_name']!=''){
 
$ModelCall->where("user_name",$_REQUEST['user_name']);
//$ModelCall->where("website_status ='1'");

$rec1 = $ModelCall->get("Wo_Users"); 
if($rec1[0]['user_id']!=$ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']))
{ 

header("location:".SITE_URL."user_profile.php?actionResult=regerror");
exit(0);
}

}

if($_REQUEST['user_title'] == 'Mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}

$dataU = array( 
	'username' => $getFullName, 
	
	'client_id' => $getClientInfo[0]['id'],
	'password' => $GetNewpassword,
	'first_name' => ucwords($_REQUEST['first_name']), 
	'user_title' => $_REQUEST['user_title'], 
	'middle_name' =>ucwords($_REQUEST['middle_name']), 
	'last_name' => ucwords($_REQUEST['last_name']),
	'gender' => $gender, 
	'user_name'=>$_REQUEST['user_name'],
	'status' => '0',
	'website_status' =>'0',
	'active' => '1',
	'phone_number' =>  ucwords($_REQUEST['mob']),
	'email_code' => md5($_REQUEST['user_email']),
	 
	
	'user_type' => $_REQUEST['user_type'],
	'user_resident_type' => $_REQUEST['user_resident_type'], 
	'working' => $_REQUEST['working'],

 
	);
	
////print_r($dataU);	
////if ($ModelCall->insert('Wo_Users',$dataU))
  // echo count($rec) . ' records were updated';
////else
   //echo 'update failed: ' . $ModelCall->getLastError();	
 

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);

$ModelCall->where("primary_email",$_REQUEST['user_email']);
$result1 =  $ModelCall->update ('resident_directory_new', array('1st_owner_professsion' => $_REQUEST['working']));
// print_r($result1);

// exit(0);

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 




if(count($rec)==1)
{ 
$_SESSION['UR_LOGINNAME']=ucwords($rec[0]['first_name']).' '.ucwords($rec[0]['last_name']);
}

// user_info_update_mail($rec[0]);






header("location:".SITE_URL."user_profile.php");
}
}
else
{
header("location:".SITE_URL."");
}
}

if(($_REQUEST['ActionCall']=="IndexValues"))
{
if(($_REQUEST['first_index']!='') && ($_REQUEST['secound_index']!=''))
{


$dataU = array(
	'first_index' => $_REQUEST['first_index'],
	'secound_index' => $_REQUEST['secound_index']);

$resultU = $ModelCall->update('tbl_ads_index',$dataU);
header("location:".DOMAIN.AdminDirectory."ads_management_management.php");
}
}



if(($_POST['ActionCall']=="FirstRegistration"))
{
   // print_r($_POST); 
    
     $token = $_POST["token"];
    
     $curlData = array(
        'secret' => '6LfCdcQZAAAAAFIq_wpiiCopBhaGW46wAz9-MXbT',
        'response' => $token
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curlData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curlResponse = curl_exec($ch);
    
    $captchaResponse = json_decode($curlResponse, true);
    // print_r($captchaResponse); 
    // echo  $_SERVER['SERVER_NAME'];
    // exit(0);
    if ($captchaResponse['success'] == '1' && $captchaResponse['action'] == $_POST['ActionCall'] && $captchaResponse['score'] >= 0.5) {
       // echo 'Form Submitted Successfully';
    } else {
         header("location:".SITE_URL."login_signup.php?actionResult=novalidCaptcha");
         exit(0);
    }
    
    if($_REQUEST['policy_accept']==1){
        if(($_REQUEST['first_name']!='') && ($_REQUEST['last_name']!='') && ($_REQUEST['user_email']!='') &&  ($_REQUEST['user_name']!='') && ($_REQUEST['psw']!='') )
        {
            $ModelCall->where("user_name",$_REQUEST['user_name']);
            //$ModelCall->where("website_status ='1'");
            $ModelCall->orderBy("user_id","asc");
            $rec = $ModelCall->get("Wo_Users"); 

            if(isset($rec[0]['user_id'])){
                header("location:".SITE_URL."login_signup.php?actionResult=regerror");
            }else { 
            
                $failedpass=0;
               if($_REQUEST['user_type']==0 || $_REQUEST['user_type']==1){
                $ModelCall->where("block_id", $_REQUEST['block_id']);
                $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
                $ModelCall->where("floor_number", $_REQUEST['floor_number']);
                $ModelCall->where("floor_number", $_REQUEST['floor_number']);
                $ModelCall->where("user_type", $_REQUEST['user_type']);
                $rec = $ModelCall->get("Wo_Users");
              //  print_r($rec);
                    if(count($rec) ==1){
                         
                        $failedpass=1;
                    }else{
                           
                        $failedpass=0;
                    }
                }
            
            
            
            // if($failedpass){
            //     header("location:".SITE_URL."login_signup.php?actionResult=loginblockalready");
            //  }else{
            
            $getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'].rand();
            
            $getFullName1 = ucwords($_REQUEST['first_name']).' '.ucwords($_REQUEST['last_name']);
            $GetNewpassword = $_REQUEST['psw'];
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
                
                $owner=$_REQUEST['email'];
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
            $dataU = array( 
            	'username' => $getFullName, 
            	'email' => $_REQUEST['user_email'],
            	'client_id' => $getClientInfo[0]['id'],
            	'password' => $GetNewpassword,
            	'user_email' => $_REQUEST['user_email'], 
            	'first_name' => ucwords($_REQUEST['first_name']), 
            	'user_title' => $_REQUEST['user_title'], 
            	'middle_name' => ucwords($_REQUEST['middle_name']), 
            	'last_name' => ucwords($_REQUEST['last_name']),
            	'gender' => $gender, 
            	'user_name'=>$_REQUEST['user_name'],
            	'owner_name' => $owner, 
            	'owner_email' => $owner_email, 
            	'owner_mb_num' => $owner_mb_num, 
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
            	'email_code' => md5($_REQUEST['user_email']),
            	'block_id' => isset($_REQUEST['block_id'])?$_REQUEST['block_id']:0, 
            	'house_number_id' =>isset($_REQUEST['house_number_id'])?$_REQUEST['house_number_id']:0,
            	'floor_number' => isset($_REQUEST['floor_number'])?$_REQUEST['floor_number']:0,
            	'user_type' => $_REQUEST['user_type'],
            	'user_resident_type' =>$_REQUEST['user_resident_type'], 
            	'admin_approval' => '0',
            	'email_verify' => '0',
            	'created_date' => date("F j, Y, g:i a"),
            	'created_ip' => $ModelCall->getRealIpAddr(),
            	'ip_address' => $ModelCall->getRealIpAddr(),
            	'user_number'=>$user_name, 
            	'join_date' => $ModelCall->get_today_date()
             
            	);
            	
            // print_r($dataU);	
            // exit(0);
            //if ($ModelCall->insert('Wo_Users',$dataU))
              //echo count($rec) . ' records were updated';
            //else
              //echo 'update failed: ' . $ModelCall->getLastError();	
               
            $resultU = $ModelCall->insert('Wo_Users',$dataU);
            
             email_varify_mail($dataU);
             email_to_admin($dataU);
                    
           // $idinsert = $ModelCall->getInsertId();
            
               if($_REQUEST['user_type']==1){
               
               /*==================Tenant Notication=================*/
            $dataNotification = array(
            	'notification_tenant' => 1,
            	);    
            
            $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['owner_email']));
            $ModelCall->where("block_id", $_REQUEST['block_id']);
            $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
            $ModelCall->where("floor_number", $_REQUEST['floor_number']);
            $ModelCall->where("user_type", 0);
            $result =  $ModelCall->update ('Wo_Users', $dataNotification);
            
            /*======================================================*/
            
             $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['owner_email']));
             $ModelCall->where("block_id", $_REQUEST['block_id']);
            $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
            $ModelCall->where("floor_number", $_REQUEST['floor_number']);
            $ModelCall->where("user_type", 0);
            $recowner = $ModelCall->get("Wo_Users");
            
            
                    send_email_owner_approval($dataU,$recowner[0]);    
                    }
                    
                     if($_REQUEST['user_type']==3){
                        $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['owner_email']));
                $ModelCall->where("block_id", $_REQUEST['block_id']);
            $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
            $ModelCall->where("floor_number", $_REQUEST['floor_number']);
            $ModelCall->where("user_type", 0);
            $recowner = $ModelCall->get("Wo_Users");
            
                    send_email_owner_approval_family($dataU,$recowner[0]);    
                    }
                       if($_REQUEST['user_type']==4){
                        $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['owner_email']));
                $ModelCall->where("block_id", $_REQUEST['block_id']);
            $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
            $ModelCall->where("floor_number", $_REQUEST['floor_number']);
            $ModelCall->where("user_type", 1);
            $recowner = $ModelCall->get("Wo_Users");
            
                    send_email_owner_approval_family($dataU,$recowner[0]);    
                    }
                    
                   // echo "here";
                   
                header("location:".SITE_URL."login_signup.php?actionResult=regsuccess");
               // }
                }
        
        } else{
            header("location:".SITE_URL."login_signup.php?actionResult=regvirus");
        }
     } else{
    header("location:".SITE_URL."signup.php?actionResult=nocheckbox");  
    }
}


if(($_REQUEST['ActionCall']=="ForgotPasswordResponse")){
//   print_r($_POST);
if(($_REQUEST['user_email']!=''))
{
$ModelCall->where("block_id", $_REQUEST['block_id']);
$ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
$ModelCall->where("floor_number", $_REQUEST['floor_number']);
$rec = $ModelCall->get("Wo_Users");

// print_r($rec);
// exit(0);
if(count($rec)==0){
    header("location:".SITE_URL."login_signup.php?actionResult=passworblock");
}
else{
$ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));

$rec = $ModelCall->get("Wo_Users");
    if(count($rec) ==0){
    header("location:".SITE_URL."login_signup.php?actionResult=passworemail");
}
else{
    
    
   $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
   $ModelCall->where("block_id", $_REQUEST['block_id']);
 $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
 $ModelCall->where("floor_number", $_REQUEST['floor_number']);
   $ModelCall->where("email_verify", '0');
$rec = $ModelCall->get("Wo_Users");

    if(count($rec) >0){
email_varify_mail($rec[0]);    
        
  header("location:".SITE_URL."login_signup.php?actionResult=passworvarifyemail");  
}
else{
    $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
    $ModelCall->where("block_id", $_REQUEST['block_id']);
$ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
$ModelCall->where("floor_number", $_REQUEST['floor_number']);
   $ModelCall->where("admin_approval", '0');
$rec = $ModelCall->get("Wo_Users");
    if(count($rec) >0){
        admin_approval_pending_mail($rec[0]);
  header("location:".SITE_URL."login_signup.php?actionResult=passworvarifyadmin");  
}
else{
    
$ModelCall->where("block_id", $_REQUEST['block_id']);
$ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
$ModelCall->where("floor_number", $_REQUEST['floor_number']);
$ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
$ModelCall->where("user_status ='Active'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
// print_r($rec);
// exit(0);
if(count($rec)>0)
{ 
 pass_reset_mail($rec[0]);

header("location:".SITE_URL."login_signup.php?actionResult=passwordsent");
}else {
header("location:".SITE_URL."login_signup.php?actionResult=passworderror");
}
}
}
}
}
}
else
{
header("location:".SITE_URL."login_signup.php?actionResult=regvirus");
}
}

if(($_REQUEST['ActionCall']=="ForgotUserNameResponce"))
{
   //  print_r($_POST);
    if(($_REQUEST['user_email']!=''))
    {
    $ModelCall->where("block_id", $_REQUEST['block_id']);
    $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
    $ModelCall->where("floor_number", $_REQUEST['floor_number']);
    $rec = $ModelCall->get("Wo_Users");
        if(count($rec) ==0){
            header("location:".SITE_URL."login_signup.php?actionResult=passworblock");
        }else{
        $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
        $rec = $ModelCall->get("Wo_Users");
            if(count($rec) ==0){
            header("location:".SITE_URL."login_signup.php?actionResult=passworemail");
            }else{
             
           $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
           $ModelCall->where("block_id", $_REQUEST['block_id']);
            $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
             $ModelCall->where("floor_number", $_REQUEST['floor_number']);
              $ModelCall->where("email_verify", '0');
         $rec = $ModelCall->get("Wo_Users");
          if(count($rec) >0){
             email_varify_mail($rec[0]);    
                
                
          header("location:".SITE_URL."login_signup.php?actionResult=passworvarifyemail");  
        }
        else{
            $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
            $ModelCall->where("block_id", $_REQUEST['block_id']);
        $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
        $ModelCall->where("floor_number", $_REQUEST['floor_number']);
           $ModelCall->where("admin_approval", '0');
        $rec = $ModelCall->get("Wo_Users");
            if(count($rec) >0){
                admin_approval_pending_mail($rec[0]);
          header("location:".SITE_URL."login_signup.php?actionResult=passworvarifyadmin");  
        }
        else{
            
        $ModelCall->where("block_id", $_REQUEST['block_id']);
        $ModelCall->where("house_number_id", $_REQUEST['house_number_id']);
        $ModelCall->where("floor_number", $_REQUEST['floor_number']);
        $ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
        //$ModelCall->where("website_status ='1'");
        $ModelCall->orderBy("user_id","asc");
        $rec = $ModelCall->get("Wo_Users");
        if(count($rec)==1)
        { 
        
        $getFullName = $result['title']." ".$rec[0]['first_name']." ".$rec[0]['last_name'];
      //  echo $getFullName;
        
        $From = WEBSITESUPPORTEMAIL;
        $FromName = ''.strip_tags(SITENAME).'';
        //$ToAddress = 'nishthagupta@gmail.com'; 
        $ToAddress = $rec[0]['email'];     // Add a recipient
        $Subject = 'Reset User Name Request from '.strip_tags(SITENAME).'!';
        $Body  = "<!DOCTYPE html>
        <html lang='en'>
        
        <title>".strip_tags(SITENAME)." - Confirmation :: Thank you for registration!</title>
        <meta name='viewport' content='' id='viewport' />
        <link rel='stylesheet' type='text/css' href='https://fonts.google.com/specimen/Open+Sans' />
        <link rel='apple-touch-icon' sizes='180x180' href='".SITE_URL."favicons/favicons/apple-touch-icon.png'>
        <link rel='icon' type='image/png' href='".SITE_URL."favicons/favicons/favicon-32x32.png' sizes='32x32'>
        <link rel='icon' type='image/png' href='".SITE_URL."favicons/favicons/favicon-16x16.png' sizes='16x16'>
        <link rel='manifest' href='".SITE_URL."favicons/favicons/manifest.json'>
        <link rel='manifest' href='favicons/favicons/manifest.json'>
        <meta name='theme-color' content='#ffffff'>
        </head>
        <body>
        <div id='messagecontent'>
          <div class='leftcol' role='region' aria-labelledby='aria-label-messagebody'>
            <div id='messagebody'>
              <div class='message-htmlpart' id='message-htmlpart1' style='background-color: #fafafa'>
                <!-- html ignored -->
                <!-- head ignored -->
                <!-- meta ignored -->
                <style type='text/css'> 
        #message-htmlpart1 div.rcmBody html{font-size:100%;
        -webkit-text-size-adjust:100%;
        -ms-text-size-adjust:100%}#message-htmlpart1 div.rcmBody{margin:0;
        font-family:Arial,Helvetica,Arial,sans-serif;
        font-size:14px;
        line-height:18px;
        color:#404040;
        background-color:#fff}#message-htmlpart1 div.rcmBody a{color:#006898;
        text-decoration:none;
        border:0}#message-htmlpart1 div.rcmBody a:hover{color:#3e8dbd;
        text-decoration:underline}#message-htmlpart1 div.rcmBody p{color:#404040}#message-htmlpart1 div.rcmBody img{border:none}
        .im{ color:#404040!important;}
        </style>
                <div class='rcmBody'  style='font-family: Arial, Helvetica, sans-serif'>
                  <table align='left' height='100%' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fafafa'>
                    <tr>
                      <td><table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#fafafa'>
                          <tr>
                            <td colspan='3' height='50' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#fafafa' style='padding: 0; margin: 0; font-size: 1; line-height: 0'><table width='690' align='center' border='0' cellspacing='0' cellpadding='0'>
                                
                              </table></td>
                          </tr>
                          <!-- script not allowed -->
                          <tr bgcolor='#8dc63f' >
                            <td width='30'></td>
                            <td align='center' height='60'></td>
                            <td width='30' bgcolor='#8dc63f'></td>
                          </tr>
                          <tr bgcolor='#ffffff'>
                            <td width='30'></td>
                            <td><table width='630' align='center' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                  <td colspan='3' width='630' height='30' style='padding: 0; margin: 0; font-size: 1; line-height: 0'></td>
                                </tr>
                                
                                <tr>
                                  <td align='center' valign='middle' style='padding: 0; margin: 0; font-size: 1; line-height: 0'><a  style='display:inline-block' target='_blank' ><img src='".SITE_URL."nirwana-img/login_bg.png'></a></td>
                                  <td width='20'></td>
                                </tr>
                                 <tr>
                                  <td colspan='3' width='630' height='20' style='padding: 0; margin: 0; font-size: 1; line-height: 0'></td>
                                </tr>
                               
                                <tr>
                                  <td colspan='3' height='20'></td>
                                </tr>
                                <tr>
                                  <td colspan='3' align='left'><p style='color: #404040; font-size: 16px; line-height: 20px; padding: 0; margin: 0'>Dear <strong>".$getFullName."</strong>,</td>
                                  </tr><tr>
                                 <td>Reset your User Name.<br>
                                   This email has been sent in response to a request to have your User Name reset. If you requested a User Name reset, click the button below. </p></td>
                                </tr>
                                <tr>
                                  <td colspan='3' height='40'></td>
                                </tr>
                                <tr>
                                  <td><table bgcolor='#77be53' align='center' cellpadding='0' cellspacing='0' style='font-family: Arial, sans-serif; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; height: 40px'>
                                      <tr>
                                        <td align='center' style='padding: 10px 20px; margin: 0; font-family: Arial,Helvetica,sans-serif; font-size: 16px; line-height: 1em'><a href='".SITE_URL."AccountResetUserName.php?uid=".session_id().session_id()."&userid=".base64_encode($rec[0]['user_id'])."&verifycode=".$GetNewpassword."&utm_campaign=verify_user&utm_medium=email&utm_source=oridle&utm_content=html&uniqid=".$getSerialNumber."&account_email_verify=0' style='font-size: 14px; font-weight: bold; color: white; text-decoration: none; padding: 10px 0' target='_blank' rel='noreferrer'> Reset User Name </a></td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td colspan='3' height='40'></td>
                                </tr>
                                <tr>
                                  <td align='center'><p style='color: #777; font-size: 14px; line-height: 20px; padding: 0; margin: 0'> If you didn't make this request, ignore this email. If you have any questions or comments regarding the login process, please email us at <a href='mailto:admin@nirvanacountry.co.in' style='color: #0070bf; font-weight: normal' onclick='return rcmail.command('compose','office.nrwa@gmail.com',this)' rel='noreferrer'>admin@nirvanacountry.co.in</a>. </p></td>
                                </tr>
                                <tr>
                                  <td colspan='3' height='50' style='padding: 0; margin: 0; font-size: 1; line-height: 0'></td>
                                </tr>
                              </table></td>
                            <td width='30' bgcolor='#ffffff'></td>
                          </tr>
                        </table></td>
                    </tr>
                       <tr>
                      <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'>Copyright � 2019  Innovatus Technologies Pvt. Ltd. All rights reserved.</td>
                    </tr>
                    <tr>
                      <td><table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#fafafa' style='margin-top: 3px;'>
                          <tr>
                            <td colspan='2' height='30'></td>
                          </tr>
                       
                         
                          <tr>
                            <td colspan='2' height='80'></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </body>";
        if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
       echo 'Yippie, message send via Gmail';
        } else {
         if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
         if (!empty($error)) echo $error;
         } else {
         echo 'Yep, the message is send (after doing some hard work)';
         }
        }
        
        
        header("location:".SITE_URL."login_signup.php?actionResult=userdsent");
        }
        else 
        {
        header("location:".SITE_URL."login_signup.php?actionResult=passworderror");
        }
        }
        }
        }
            }
    }else{
    header("location:".SITE_URL."login_signup.php?actionResult=regvirus");
    }
}





if(($_REQUEST['ActionCall']=="CustomerPasswordReset"))
{
if(($_REQUEST['userid']!='') && ($_REQUEST['psw']!=''))
{
$ModelCall->where("user_id", base64_decode($_REQUEST['userid']));
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 
if(count($rec)==1)
{ 
$GetNewpassword = $_REQUEST['psw'];
$dataU = array('password' => $GetNewpassword);
$ModelCall->where ("user_id", $rec[0]['user_id']);
$result =  $ModelCall->update ('Wo_Users', $dataU);
header("location:".SITE_URL."login_signup.php?actionResult=passchangedsuccess");
}
else 
{
header("location:".SITE_URL."login_signup.php?actionResult=passchangederror");
}
}
}

if(($_REQUEST['ActionCall']=="FirstLoginPasswordReset"))
{
   
if(($_REQUEST['userid']!='') && ($_REQUEST['psw']!=''))
{
$ModelCall->where("user_id", base64_decode($_REQUEST['userid']));
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 
if(count($rec)==1)
{ 
$GetNewpassword = $_REQUEST['psw'];
$dataU = array('password' => $GetNewpassword,'first_login'=>'1');
print_r($dataU);
$ModelCall->where ("user_id", $rec[0]['user_id']);
$result =  $ModelCall->update ('Wo_Users', $dataU);

header("location:".SITE_URL."login_signup.php?actionResult=passchangedsuccess");
}
else 
{
header("location:".SITE_URL."login_signup.php?actionResult=passchangederror");
}
}
}


if(($_REQUEST['ActionCall']=="CustomerUserReset"))
{
if(($_REQUEST['userid']!='') && ($_REQUEST['user_name']!=''))
{
$ModelCall->where("user_id", base64_decode($_REQUEST['userid']));
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 
if(count($rec)==1)
{ 
$GetNewuser_name = $_REQUEST['user_name'];
$dataU = array('user_name' => $GetNewuser_name);
$ModelCall->where ("user_id", $rec[0]['user_id']);
$result =  $ModelCall->update ('Wo_Users', $dataU);
header("location:".SITE_URL."login_signup.php?actionResult=userchangedsuccess");
}
else 
{
header("location:".SITE_URL."login_signup.php?actionResult=userchangederror");
}
}
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
?>