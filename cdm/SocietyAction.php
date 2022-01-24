<?php include("../model/class.expert.php"); ?>
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
include('Email_Configuration_files.php');
include('passwordHash.php');


if(($_REQUEST['ActionCall']=="AccessYaarPerform"))
{
$GetNewpassword = $_REQUEST['user_pass_login'];


$ModelCall->where("user_name", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
$ModelCall->where("password", $GetNewpassword);

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1 && $rec[0]['admin_approval']==1  && $rec[0]['email_verify']==1 && ($rec[0]['user_status']!='DeActivated'))
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
$_SESSION['UR_LOGINID']=$rec[0]['user_id'];
$_SESSION['UR_LOGINNAME']=$ModelCall->utf8_decode_all($rec[0]['first_name']).' '.$ModelCall->utf8_decode_all($rec[0]['last_name']);
$_SESSION['UR_NAME']=$rec[0]['username'];
$_SESSION['user_id'] = $hash;
header("location:".SITE_URL."");
}
else 
{
if($rec[0]['email']!='')
{
header("location:".SITE_URL."login_signup.php?actionResult=loginerror");
}
else
{
header("location:".SITE_URL."login_signup.php?actionResult=invalidloginerror");
}
}
}


if(($_REQUEST['ActionCall']=="UpdateDetails"))
{
if($_SESSION['UR_LOGINID'])
{
    echo $_SESSION['UR_LOGINID'];
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 

if($ModelCall->count==1)
{ 

$getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'].rand();

$getFullName1 = ucwords($_REQUEST['first_name']).' '.ucwords($_REQUEST['last_name']);

$GetNewpassword = $rec[0]['password'];
echo $GetNewpassword;
if($_REQUEST['old_pass']==$GetNewpassword){
    $GetNewpassword =$_REQUEST['new_pass'];
    
}
if($_REQUEST['user_name']!=''){
 
$ModelCall->where("user_name",$_REQUEST['user_name']);
//$ModelCall->where("website_status ='1'");

$rec = $ModelCall->get("Wo_Users"); 
if(isset($rec[0]['user_name']))
{ 

header("location:".SITE_URL."user_profile.php/actionResult?regerror");
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
	'email' => $_REQUEST['user_email'],
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
	 
	
	'user_type' => $_REQUEST['user_type'],
	'user_resident_type' => $_REQUEST['user_resident_type'], 
	

 
	);
	
//print_r($dataU);	
//if ($ModelCall->insert('Wo_Users',$dataU))
  // echo $ModelCall->count . ' records were updated';
//else
   //echo 'update failed: ' . $ModelCall->getLastError();	
 

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 


if($ModelCall->count==1)
{ 
$_SESSION['UR_LOGINNAME']=ucwords($rec[0]['first_name']).' '.ucwords($rec[0]['last_name']);
}

 $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$ToAddress = $rec[0]['email'];     // Add a recipient
$Subject = 'Changes to your user profile';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".SITE_URL."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".SITE_URL."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$getFullName1.",</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                        <pYou have updated your User Profile. Please login to check your new details..</p>
                        <p>In case you haven't requested for these changes then kindly change your password and update your correct User Profile information. </p>
                        <p><strong> Also intimate us of this on <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in.</a></strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".SITE_URL."verifyemail.php?num=".$_REQUEST['user_name']."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify your email address</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Cheers,<br>
                        Nirvana Country</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td height='30'>&nbsp;</td>
            </tr>
            <tr>
              <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                  <tbody>
                    <tr>
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".SITE_URL."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".SITE_URL."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/terms-of-service/' target='_blank'>Terms</a></td>
                    </tr>
                    <tr>
                      <td style='border-bottom:1px solid #ccc'><table width='75' border='0' align='center' cellpadding='0' cellspacing='0'>
                          <tbody>
                            <tr>
                              <td width='37' height='20' align='center' valign='middle'></td>
                              <td width='38' align='center' valign='middle'></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'>Copyright � 2019  Innovatus Technologies Pvt. Ltd. All rights reserved.</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>";

if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
 echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
 echo 'Yep, the message is send (after doing some hard work)';
 }
}




header("location:".SITE_URL."");
}
}
else
{
header("location:".SITE_URL."");
}
}








if(($_REQUEST['ActionCall']=="FirstRegistration"))
{
    
if(($_REQUEST['first_name']!='') && ($_REQUEST['last_name']!='') && ($_REQUEST['user_email']!='') &&  ($_REQUEST['user_name']!='') && ($_REQUEST['user_pass']!='') && ($_REQUEST['block_id']!='') && ($_REQUEST['house_number_id']!=''))
{
    
    
$ModelCall->where("user_name",$_REQUEST['user_name']);
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 

if(isset($rec[0]['user_id']))
{
    
header("location:".SITE_URL."account/create/regerror/");
}
else 
{
$getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'].rand();

$getFullName1 = ucwords($_REQUEST['first_name']).' '.ucwords($_REQUEST['last_name']);
$GetNewpassword = $_REQUEST['user_pass'];
if($_REQUEST['user_title'] == 'Mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}

$user_name=generate_username();

$dataU = array( 
	'username' => $getFullName, 
	'email' => $_REQUEST['user_email'],
	'client_id' => $getClientInfo[0]['id'],
	'password' => $GetNewpassword,
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
	'block_id' => $_REQUEST['block_id'], 
	'house_number_id' => $_REQUEST['house_number_id'],
	'floor_number' => $_REQUEST['floor_number'],
	'user_type' => $_REQUEST['user_type'],
	'user_resident_type' => $_REQUEST['user_resident_type'], 
	'admin_approval' => '0',
	'email_verify' => '0',
	'created_date' => date("F j, Y, g:i a"),
	'created_ip' => $ModelCall->getRealIpAddr(),
	'ip_address' => $ModelCall->getRealIpAddr(),
	'user_number'=>$user_name, 
	'join_date' => $ModelCall->get_today_date()
 
	);
	
//print_r($dataU);	
//if ($ModelCall->insert('Wo_Users',$dataU))
  // echo $ModelCall->count . ' records were updated';
//else
   //echo 'update failed: ' . $ModelCall->getLastError();	
   
$resultU = $ModelCall->insert('Wo_Users',$dataU);
$idinsert = $ModelCall->getInsertId();  
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$ToAddress = $_REQUEST['user_email'];     // Add a recipient
$Subject = 'Welcome! And confirm your email';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".SITE_URL."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".SITE_URL."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$getFullName1.",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registration !</span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".SITE_URL."verifyemail.php?num=".$_REQUEST['user_name']."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify your email address</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Cheers,<br>
                        Nirvana Country</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td height='30'>&nbsp;</td>
            </tr>
            <tr>
              <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                  <tbody>
                    <tr>
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".SITE_URL."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".SITE_URL."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/terms-of-service/' target='_blank'>Terms</a></td>
                    </tr>
                    <tr>
                      <td style='border-bottom:1px solid #ccc'><table width='75' border='0' align='center' cellpadding='0' cellspacing='0'>
                          <tbody>
                            <tr>
                              <td width='37' height='20' align='center' valign='middle'></td>
                              <td width='38' align='center' valign='middle'></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'>Copyright � 2019  Innovatus Technologies Pvt. Ltd. All rights reserved.</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>";

if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
 echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
 echo 'Yep, the message is send (after doing some hard work)';
 }
}

header("location:".SITE_URL."account/create/regsuccess/");
}
}
else
{
header("location:".SITE_URL."account/create/regvirus/");
}
}



if(($_REQUEST['ActionCall']=="ForgotPasswordResponse"))
{
if(($_REQUEST['user_email']!=''))
{
$ModelCall->where("email", $ModelCall->utf8_decode_all($_REQUEST['user_email']));
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
if($ModelCall->count==1)
{ 

$getFullName = $rec[0]['first_name']." ".$rec[0]['last_name'];

$From = WEBSITESUPPORTEMAIL;
$FromName = ''.strip_tags(SITENAME).'';
$ToAddress = $rec[0]['email'];     // Add a recipient
$Subject = 'Reset Password Request from '.strip_tags(SITENAME).'!';
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
                          <td colspan='3' align='left'><p style='color: #404040; font-size: 16px; line-height: 20px; padding: 0; margin: 0'>Hi <strong>".$getFullName."</strong>,</td>
                          </tr><tr>
                         <td>Reset your password.<br>
                           This email has been sent in response to a request to have your password reset. If you requested a password reset, click the button below. </p></td>
                        </tr>
                        <tr>
                          <td colspan='3' height='40'></td>
                        </tr>
                        <tr>
                          <td><table bgcolor='#77be53' align='center' cellpadding='0' cellspacing='0' style='font-family: Arial, sans-serif; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; height: 40px'>
                              <tr>
                                <td align='center' style='padding: 10px 20px; margin: 0; font-family: Arial,Helvetica,sans-serif; font-size: 16px; line-height: 1em'><a href='".SITE_URL."AccountResetPassword.php?uid=".session_id().session_id()."&userid=".base64_encode($rec[0]['user_id'])."&verifycode=".$GetNewpassword."&utm_campaign=verify_user&utm_medium=email&utm_source=oridle&utm_content=html&uniqid=".$getSerialNumber."&account_email_verify=0' style='font-size: 14px; font-weight: bold; color: white; text-decoration: none; padding: 10px 0' target='_blank' rel='noreferrer'> Reset Password </a></td>
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
// echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
// echo 'Yep, the message is send (after doing some hard work)';
 }
}

header("location:".SITE_URL."account/login/passwordsent/");
}
else 
{
header("location:".SITE_URL."account/login/passworderror/");
}
}
else
{
header("location:".SITE_URL."account/login/regvirus/");
}
}


if(($_REQUEST['ActionCall']=="CustomerPasswordReset"))
{
if(($_REQUEST['userid']!='') && ($_REQUEST['user_pass']!=''))
{
$ModelCall->where("user_id", base64_decode($_REQUEST['userid']));
$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users"); 
if($ModelCall->count==1)
{ 
$GetNewpassword = $_REQUEST['user_pass'];
$dataU = array('password' => $GetNewpassword);
$ModelCall->where ("user_id", $rec[0]['user_id']);
$result =  $ModelCall->update ('Wo_Users', $dataU);
header("location:".SITE_URL."account/login/passchangedsuccess/");
}
else 
{
header("location:".SITE_URL."account/login/passchangederror/");
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