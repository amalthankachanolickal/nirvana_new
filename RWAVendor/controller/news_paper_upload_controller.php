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


if($_FILES['newspaper_excel_sheet_upload']['name']!='')
{
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["newspaper_excel_sheet_upload"]["type"],$allowedFileType))
{
$targetPath = 'newspaper_uploads/'.rand(0,999999).$_FILES['newspaper_excel_sheet_upload']['name'];
move_uploaded_file($_FILES['newspaper_excel_sheet_upload']['tmp_name'], $targetPath);
$Reader = new SpreadsheetReader($targetPath);
$sheetCount = count($Reader->sheets());
for($i=0;$i<$sheetCount;$i++)
{
$Reader->ChangeSheet($i);
foreach ($Reader as $emapData)
{ print_r($emapData);
    exit;
    
$ModelCall->where("email", $ModelCall->utf8_decode_all($emapData[4]));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
if($rec[0]>0)
{ 
$getFullName = $emapData[1].' '.$emapData[3];
if($emapData[0]== 'Mr.' || $emapData[0]== 'mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}
$dataU = array(
	'user_title' => $emapData[0],
	'username' => $getFullName, 
	'first_name' => $emapData[1],
	'gender' => $gender, 
	'middle_name' => $emapData[2],
	'last_name' => $emapData[3],
	'block_id' => $_REQUEST['block_id'],
	'house_number_id' =>  $emapData[6]);
$ModelCall->where ("email", $emapData[4]);
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
else 
{
$getFullName = $emapData[1].' '.$emapData[3];
$GetNewpassword = sha1(mt_rand(100000,999999));
if($emapData[0]== 'Mr.' || $emapData[0]== 'mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}

$dataU = array( 
	'username' => $getFullName, 
	'email' => $emapData[4],
	'client_id' => $getClientInfo[0]['id'],
	'password' => $GetNewpassword,
	'first_name' => $emapData[1], 
	'user_title' => $emapData[0], 
	'middle_name' => $emapData[2], 
	'last_name' => $emapData[3],
	'gender' => $gender, 
	'website_status' => '1',
	'status' => '0',
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
	'status' => '1',
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
	'email_code' => md5($emapData[4]),
	'block_id' => $_REQUEST['block_id'], 
	'house_number_id' => $emapData[6],
	'floor_number' => $_REQUEST['floor_number'],
	'user_type' => '0',
	'user_resident_type' => '0', 
	'admin_approval' => '1',
	'email_verify' => '1',
	'created_date' => date("F j, Y, g:i a"),
	'created_ip' => $ModelCall->getRealIpAddr(),
	'ip_address' => $ModelCall->getRealIpAddr(),
	'join_date' => $ModelCall->get_today_date());
	
	//print_r($dataU);
$resultU = $ModelCall->insert('Wo_Users',$dataU);
}       
}
}
}
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customersuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=viruserror");
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

function generate_userName_new(){
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

function generate_userPass(){
      $characters = array('Neem','Jacaranda','Baobab','Teak','Sausage','Lead','Proteaceae','Verbenaceae','Moraceae'); 
      for ($i = 0; $i <1; $i++) { 
        $index = rand(0, count($characters) - 1); 
        $randomString1 .= $characters[$index]; 
    } 
          $characters = '0123456789'; 
      for ($i = 0; $i < 3; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString2 .= $characters[$index]; 
    }
    return $randomString1."@".$randomString2;
    
}
 function track($a){
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = $a."\n";
fwrite($myfile, $txt);
fclose($myfile);
}
?>