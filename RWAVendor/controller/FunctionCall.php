<?php 
error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
   
?>
<?php
function TripCodeGenerate($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars[rand(0, $chars_length)];  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars[rand(0, $chars_length)];  
            if ($r != $string[$i - 1]) $string .= $r;  
         }  
         return $string;
} 
function phpexpertOTPSPONSER($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars[rand(0, $chars_length)];  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars[rand(0, $chars_length)];  
            if ($r != $string[$i - 1]) $string .= $r;  
         }  
         return $string;
} 

function phpexpertOTPSPONSER1($length = 6, $chars = '0987654321')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars[rand(0, $chars_length)];  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars[rand(0, $chars_length)];  
            if ($r != $string[$i - 1]) $string .= $r;  
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

if(($_REQUEST['ActionCall']=="AdminloginAccessCall"))
{
$ModelCall->where("client_email", $ModelCall->utf8_decode_all($_REQUEST['adminemail']));
$ModelCall->where("client_password", $ModelCall->utf8_decode_all($_REQUEST['password']));
$ModelCall->where("status",1);
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_client_sub_account");
if($ModelCall->count==1)
{ 
$_SESSION['ADMIN_CLIENT_LOGINID']=$rec[0]['id'];

header("location:".DOMAIN.AdminDirectory."index.php?actionResult=loginsuccess");
}
else 
{
header("location:".DOMAIN.AdminDirectory."login.php?actionResult=loginerror");
}
}


if(($_REQUEST['ActionCall']=="AddUpdateHomeFlashBanner"))
{
if($_FILES['banner_image']['name']!='')
{
$banner_imageData=uniqid().clean($_FILES['banner_image']['name']);
if(move_uploaded_file($_FILES['banner_image']['tmp_name'],'../homesliders/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['banner_imageOld'];
}

if($_REQUEST['window_type'] == 'on')
    $window_type = 1;
else
    $window_type = 0;

$dataU = array(
	'banner_title' => $_REQUEST['banner_title'],
	'banner_content' => $_REQUEST['banner_content'],
	'client_id' => $_REQUEST['client_id'],
	'banner_image' => $banner_imageData,
	'link'         =>$_REQUEST['link'],
	'button_text'  =>$_REQUEST['button_text'],
	'window_type'  =>$window_type,
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());

if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_home_flash_banner',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_home_flash_banner', $dataU);
}
header("location:".DOMAIN.AdminDirectory."home_flash.php?actionResult=flashsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteHomeFlashBanner'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_home_flash_banner');
header("location:".DOMAIN.AdminDirectory."home_flash.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateHomeFlashBanner'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_home_flash_banner', $data);
header("location:".DOMAIN.AdminDirectory."home_flash.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpateClientWebsiteSetting"))
{
if(($_REQUEST['client_company_name']!='') && ($_REQUEST['client_name']!='') && ($_REQUEST['client_address']!='') && ($_REQUEST['client_country']!='') && ($_REQUEST['client_city']!='') && ($_REQUEST['client_state']!=''))
{
if($_FILES['client_logo']['name']!='')
{
$banner_imageData=uniqid().clean($_FILES['client_logo']['name']);
if(move_uploaded_file($_FILES['client_logo']['tmp_name'],'../client_logo/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['client_logoOld'];
}


$dataU = array(
	'client_company_name' => $_REQUEST['client_company_name'],
	'client_name' => $_REQUEST['client_name'],
	'client_address' => $_REQUEST['client_address'],
	'client_country' => $_REQUEST['client_country'],
	'client_city' => $_REQUEST['client_city'],
	'client_state' => $_REQUEST['client_state'],
	'client_zipcode' => $_REQUEST['client_zipcode'],
	'client_email' => $_REQUEST['client_email'],
	'client_phone' => $_REQUEST['client_phone'],
	'client_mobile' => $_REQUEST['client_mobile'],
	'client_fax_number' => $_REQUEST['client_fax_number'],
	'client_gst_number' => $_REQUEST['client_gst_number'],
	'client_company_number' => $_REQUEST['client_company_number'],
	'client_support_email' => $_REQUEST['client_support_email'],
	'client_accountant_email' => $_REQUEST['client_accountant_email'],
	'client_office_email' => $_REQUEST['client_office_email'],
	'client_info_email' => $_REQUEST['client_info_email'],
	'client_website_url' => $_REQUEST['client_website_url'],
	'client_instagram_url' => $_REQUEST['client_instagram_url'],
	'client_facebook_url' => $_REQUEST['client_facebook_url'],
	'client_twitter_url' => $_REQUEST['client_twitter_url'],
	'client_google_url' => $_REQUEST['client_google_url'],
	'client_youtube_url' => $_REQUEST['client_youtube_url'],
	'client_google_play_store' => $_REQUEST['client_google_play_store'],
	'client_apple_store' => $_REQUEST['client_apple_store'],
	'client_copy_right' => $_REQUEST['client_copy_right'],
	'client_office_timings' => $_REQUEST['client_office_timings'],
	'client_youtube_embed_url' => $_REQUEST['client_youtube_embed_url'],
	'client_logo' => $banner_imageData,
	
	'office_crm_email' => $_REQUEST['office_crm_email'],
	'office_website_email' => $_REQUEST['client_support_email'],
	'office_ec_update_email' => $_REQUEST['office_ec_update_email'],
	'client_google_group_mail' => $_REQUEST['client_google_group_mail'],
	'client_marketing_mail' => $_REQUEST['client_marketing_mail'],);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_clients', $dataU);
header("location:".DOMAIN.AdminDirectory."settings.php?actionResult=settingsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."settings.php?actionResult=viruserror");
}
}
////////////////////////////////Add Survey Form////////////////////////////////////////////////////
if(($_REQUEST['ActionCall']=="CreateForm"))
{
  $dataU=array(
    'survey_name' => $_REQUEST['details']['formid'],
    'author' => $getAdminSubInfo[0]['client_name'],
    'start_date' => $_REQUEST['details']['start'],
    'exp_date' => $_REQUEST['details']['expiry'],
    'Description' => $_REQUEST['details']['desc'],
    'status' => 'Pending',
    'Questions' => $_REQUEST['questions']
  );
  $resultU = $ModelCall->insert('tbl_survey',$dataU);
}


///////////////////////////////Survey Form Edit//////////////////////////////////////////////////////
if(($_REQUEST['ActionCall']=="EditForm"))
{
  $dataU=array(
    'survey_name' => $_REQUEST['edetails']['formid'],
    'author' => $getAdminSubInfo[0]['client_name'],
    'start_date' => $_REQUEST['edetails']['start'],
    'exp_date' => $_REQUEST['edetails']['expiry'],
    'Description' => $_REQUEST['edetails']['desc'],
    'status' => 'Pending',
    'Questions' => $_REQUEST['equestions']
  );
  $ModelCall->where ("id", $_REQUEST['eid']);
  $resultU = $ModelCall->update('tbl_survey',$dataU);
header("location:".DOMAIN.AdminDirectory."Survey_forms_management.php?actionResult=asuccess");
}
/////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////Approve Form////////////////////////////////////////////////////////////
if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ApproveSurveyForm'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_survey', $data);
header("location:".DOMAIN.AdminDirectory."Survey_forms_management.php?actionResult=asuccess");
}
////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////Publish Form////////////////////////////////////////////////////////////
if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='PublishSurveyForm'))
{
$data = array('is_published' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_survey', $data);
header("location:".DOMAIN.AdminDirectory."Survey_forms_management.php?actionResult=asuccess");
}
////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////Delete Survey Form////////////////////////////////////////////////////////////

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteSurveyForm'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_survey');
header("location:".DOMAIN.AdminDirectory."Survey_forms_management.php?actionResult=dsuccess");
}

///////////////////////////////////////////////////////////////////////////////////////////////////


if($_REQUEST['ActionCall']=="AddUpdateEC"){
    if($_REQUEST['eid']==""){
    if($_REQUEST['Email'] && $_REQUEST['block_number'] && $_REQUEST['house_number']&& $_REQUEST['Floor_nubmer'] ){
      //  print_r($_REQUEST);
        $ModelCall->where("user_email",$_REQUEST['Email']);
$ModelCall->where("block_id",$_REQUEST['block_number']);
$ModelCall->where("house_number_id",$_REQUEST['house_number']);
$ModelCall->where("floor_number",$_REQUEST['Floor_nubmer']);
$rec = $ModelCall->get("Wo_Users");
$origDate = $_REQUEST['start_date'];
 
$date = str_replace('/', '-', $origDate );
//echo $date;
$start_date = date("Y-m-d", strtotime($date));
//echo $start_date;
if($_REQUEST['end_date']){
$origDate1 = $_REQUEST['end_date'];

$date1 = str_replace('/', '-', $origDate1 );
$end_date = date("Y-m-d", strtotime($date1));
   $today= date('Y-m-d');
   if($end_date>=$today){
      $status='Current'; 
   }
   else{
       $status='Former';
   }
}
else{
 $end_date =NULL;   
 $status='Current';
}
if($ModelCall->count==1){
    $dataU = array(
	'user_id' => $rec[0]['user_id'],
	'Email' => $rec[0]['user_email'],
	'name' => $rec[0]['first_name']." ".$rec[0]['last_name'],
	'unit_no' => "NIR-".$rec[0]['block_id']."-".$rec[0]['house_number_id']."-".$rec[0]['floor_number'],
	'start_date' => $start_date,
	'end_date' => $end_date,
	'designation'=>$_REQUEST['designation'],
	'status'=>$status);
	
$resultU = $ModelCall->insert('tbl_EC_uses',$dataU);

header("location:".DOMAIN.AdminDirectory."EC_management.php?actionResult=ecsuccess");

    
}
        
 if($ModelCall->count==0){
    

header("location:".DOMAIN.AdminDirectory."EC_management.php?actionResult=nouserec");

    
}
if($ModelCall->count>1){
   

header("location:".DOMAIN.AdminDirectory."EC_management.php?actionResult=moreoneuserec");

    
}
    }
    
    
    
    
}
else{
        
       
        
$origDate = $_REQUEST['start_date'];
 
$date = str_replace('/', '-', $origDate );
echo $date;
$start_date = date("Y-m-d", strtotime($date));

if($_REQUEST['end_date']){
    $origDate = $_REQUEST['start_date'];
 
$date = str_replace('/', '-', $origDate );
echo $date;
$start_date = date("Y-m-d", strtotime($date));
$origDate1 = $_REQUEST['end_date'];

$date1 = str_replace('/', '-', $origDate1 );
$end_date = date("Y-m-d", strtotime($date1));
     $today= date('Y-m-d');
   if($end_date>=$today){
      $status='Current'; 
   }
   else{
       $status='Former';
   }
}
else{
 $end_date =NULL;   
  $status='Current';
}

    $dataU = array('end_date' => $end_date,'start_date' => $start_date,'designation' => $_REQUEST['designation'],'status' => $status);

$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_EC_uses', $dataU);

header("location:".DOMAIN.AdminDirectory."EC_management.php?actionResult=noticesuccess");

    

        
        
    }
    

}
if(($_REQUEST['ActionCall']=="AddUpdateNoticePost"))
{
if(($_REQUEST['notice_title']!='') && ($_REQUEST['notice_content']!=''))
{


if($_FILES['notice_file']['name']!='')
{
$banner_imageName=clean($_FILES['notice_file']['name']);
$banner_imageData=uniqid().clean($_FILES['notice_file']['name']);
if(move_uploaded_file($_FILES['notice_file']['tmp_name'],'../documents/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['notice_fileOld'];
$banner_imageName = $_REQUEST['notice_file_nameOLD'];
}


$dataU = array(
	'notice_title' => $_REQUEST['notice_title'],
	'notice_content' => $_REQUEST['notice_content'],
	'client_id' => $_REQUEST['client_id'],
	'notice_file' => $banner_imageData,
	'notice_file_name' => $banner_imageName,
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_notice_post',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_notice_post', $dataU);
}
header("location:".DOMAIN.AdminDirectory."notice_post_management.php?actionResult=noticesuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."notice_post_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteNoticePost'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_notice_post');
header("location:".DOMAIN.AdminDirectory."notice_post_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateNoticePost'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_notice_post', $data);
header("location:".DOMAIN.AdminDirectory."notice_post_management.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateAmenities"))
{
if(($_REQUEST['amenities_title']!=''))
{
if($_FILES['amenities_image']['name']!='')
{
$banner_imageData=uniqid().clean($_FILES['amenities_image']['name']);
if(move_uploaded_file($_FILES['amenities_image']['tmp_name'],'../amenities_image/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['amenities_imageOld'];
}


$dataU = array(
	'amenities_title' => $_REQUEST['amenities_title'],
	'client_id' => $_REQUEST['client_id'],
	'amenities_image' => $banner_imageData,
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_amenities',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_amenities', $dataU);
}
header("location:".DOMAIN.AdminDirectory."amenities_management.php?actionResult=amenitiessuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."amenities_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteAmenities'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_amenities');
header("location:".DOMAIN.AdminDirectory."amenities_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateAmenities'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_amenities', $data);
header("location:".DOMAIN.AdminDirectory."amenities_management.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateAdmin"))
{
if(($_REQUEST['client_name']!='') && ($_REQUEST['client_email']!='') && ($_REQUEST['client_password']!=''))
{
$ModelCall->where("(client_email ='".$ModelCall->utf8_decode_all($_REQUEST['client_email'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_client_sub_account");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=adminerror");
}
else 
{

$dataU = array(
	'client_name' => $_REQUEST['client_name'],
	'client_password' => trim($_REQUEST['client_password']),
	'client_email' => trim($_REQUEST['client_email']),
	'client_mobile' => trim($_REQUEST['client_mobile']),
	'highlight_event' => $_REQUEST['highlight_event'],
	'notice_board' => $_REQUEST['notice_board'],
	'home_slider' => $_REQUEST['home_slider'],
	'blocks_management' => $_REQUEST['blocks_management'],
	'event_management' => $_REQUEST['event_management'],
	'amenities_management' => $_REQUEST['amenities_management'],
	'user_management' => $_REQUEST['user_management'],
	'document_management' => $_REQUEST['document_management'],
	'team_management' => $_REQUEST['team_management'],
	'cms_management' => $_REQUEST['cms_management'],
	'google_ad_management' => $_REQUEST['google_ad_management'],
	'setting_management' => $_REQUEST['setting_management'],
	'advertise_request_management' => $_REQUEST['advertise_request_management'],
	'service_bazaar_management' => $_REQUEST['service_bazaar_management'],
	'vendor_admin_management' => $_REQUEST['vendor_admin_management'],
	'login_type' => '0',
	'status' => '1',
	'content_web_url'=>$_REQUEST['web_link'],
	'client_id' => $_REQUEST['client_id'],
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
$resultU = $ModelCall->insert('tbl_client_sub_account',$dataU);

user_info_update_mail($dataU);


header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=adminsuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=viruserror");
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

if(($_REQUEST['ActionCall']=="EditUpdateAdmin"))
{
if(($_REQUEST['adminName']!='') && ($_REQUEST['adminemail']!='') && ($_REQUEST['adminMobile']!='') && ($_REQUEST['password']!=''))
{
if($_FILES['AdminImage']['name']!='')
{
$sitelogoData=uniqid().clean($_FILES['AdminImage']['name']);
if(move_uploaded_file($_FILES['AdminImage']['tmp_name'],'../client_logo/'.$sitelogoData)){}
}
else
{
$sitelogoData=$_REQUEST['AdminImageOld'];
}
$dataU = array(
	'client_name' => $_REQUEST['adminName'],
	'client_email' => $_REQUEST['adminemail'],
	'client_mobile' => $_REQUEST['adminMobile'],
	'client_password' => $_REQUEST['password'],
	'profile_image' => $sitelogoData);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_client_sub_account', $dataU);
header("location:".DOMAIN.AdminDirectory."edit-profile.php?actionResult=profilesuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."edit-profile.php?actionResult=viruserror");
}
}


if(($_REQUEST['ActionCall']=="AddUpdateBank"))
{
if(($_REQUEST['bank_name']!='') && ($_REQUEST['bank_holder_name']!='') && ($_REQUEST['bank_account_number']!='') && ($_REQUEST['bank_branch_name']!='') && ($_REQUEST['bank_ifsc_code']!=''))
{
if($_REQUEST['eid']!="")
{
$ModelCall->where("(id !='".$ModelCall->utf8_decode_all($_REQUEST['eid'])."')" );
}
$ModelCall->where("(bank_account_number ='".$ModelCall->utf8_decode_all($_REQUEST['bank_account_number'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_bank_information");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."bank-list.php?actionResult=bankerror");
}
else 
{

$dataU = array(
	'bank_name' => $_REQUEST['bank_name'],
	'bank_holder_name' => $_REQUEST['bank_holder_name'],
	'bank_account_number' => $_REQUEST['bank_account_number'],
	'bank_branch_name' => $_REQUEST['bank_branch_name'],
	'bank_ifsc_code' => $_REQUEST['bank_ifsc_code'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_bank_information',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_bank_information', $dataU);
}
header("location:".DOMAIN.AdminDirectory."bank-list.php?actionResult=banksuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."bank-list.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteBank'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_bank_information');
header("location:".DOMAIN.AdminDirectory."bank-list.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateBank'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_bank_information', $data);
header("location:".DOMAIN.AdminDirectory."bank-list.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateInvoices"))
{
if(($_REQUEST['freight_bill_no']!='') && ($_REQUEST['invoice_client_name']!='') && ($_REQUEST['invoice_vehicle_no']!='') && ($_REQUEST['invoice_client_address']!='') && ($_REQUEST['invoice_item_name']!='') && ($_REQUEST['invoice_from']!='') && ($_REQUEST['invoice_to']!='') && ($_REQUEST['invoice_item_amount']!='') && ($_REQUEST['invoice_grand_total_amount']!='') && ($_REQUEST['invoice_bank_info']!=''))
{
$dataU = array(
	'freight_bill_no' => $_REQUEST['freight_bill_no'],
	'invoice_client_name' => $_REQUEST['invoice_client_name'],
	'invoice_vehicle_no' => $_REQUEST['invoice_vehicle_no'],
	'invoice_client_email' => $_REQUEST['invoice_client_email'],
	'invoice_client_address' => $_REQUEST['invoice_client_address'],
	'invoice_billing_address' => $_REQUEST['invoice_billing_address'],
	'invoice_client_mobile' => $_REQUEST['invoice_client_mobile'],
	'invoice_date' => $_REQUEST['invoice_date'],
	'invoice_paid_status' => $_REQUEST['invoice_paid_status'],
	'invoice_item_name' => $_REQUEST['invoice_item_name'],
	'invoice_item_date' => $_REQUEST['invoice_item_date'],
	'invoice_from' => $_REQUEST['invoice_from'],
	'invoice_to' => $_REQUEST['invoice_to'],
	'invoice_type_vehicle' => $_REQUEST['invoice_type_vehicle'],
	'invoice_pkgs_weight' => $_REQUEST['invoice_pkgs_weight'],
	'invoice_freight_info' => $_REQUEST['invoice_freight_info'],
	'invoice_item_other_info' => $_REQUEST['invoice_item_other_info'],
	'invoice_item_gst_number' => $_REQUEST['invoice_item_gst_number'],
	'invoice_item_amount' => $_REQUEST['invoice_item_amount'],
	'invoice_grand_total_amount' => $_REQUEST['invoice_grand_total_amount'],
	'invoice_bank_info' => $_REQUEST['invoice_bank_info'],
	'invoice_pay_release_by' => $_REQUEST['invoice_pay_release_by'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_invoice_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_invoice_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."invoices.php?actionResult=invoicesuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."invoices.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteInvoices'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_invoice_management');
header("location:".DOMAIN.AdminDirectory."invoices.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateInvoices'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_invoice_management', $data);
header("location:".DOMAIN.AdminDirectory."invoices.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateBlocks"))
{
if(($_REQUEST['block_name']!='') && ($_REQUEST['block_code']!=''))
{
if($_REQUEST['eid']!="")
{
$ModelCall->where("(id !='".$ModelCall->utf8_decode_all($_REQUEST['eid'])."')" );
}
$ModelCall->where("(block_name ='".$ModelCall->utf8_decode_all($_REQUEST['block_name'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_block_entry");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."block_management.php?actionResult=blockerror");
}
else 
{
$dataU = array(
	'block_name' => $_REQUEST['block_name'],
	'block_code' => $_REQUEST['block_code'],
	'client_id' => $_REQUEST['client_id'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_block_entry',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_block_entry', $dataU);
}
header("location:".DOMAIN.AdminDirectory."block_management.php?actionResult=blocksuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."block_management.php?actionResult=viruserror");
}
}




if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteBlocks'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_block_entry');
header("location:".DOMAIN.AdminDirectory."block_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateBlocks'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_block_entry', $data);
header("location:".DOMAIN.AdminDirectory."block_management.php?actionResult=asuccess");
}



if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteCustomer'))
{
    $data = array('user_status' => 'Deactivated');
$ModelCall->where ("user_id", $_REQUEST['eid']);
$result =  $ModelCall->update ('Wo_Users', $data);
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateCustomer'))
{
$data = array('admin_approval' => $_REQUEST['website_status']);
$ModelCall->where ("user_id", $_REQUEST['eid']);
$result =  $ModelCall->update ('Wo_Users', $data);

$ModelCall->where ("user_id", $_REQUEST['eid']);
$rec =  $ModelCall->get ('Wo_Users');
email_varify_mail($rec[0]);
account_ready_to_use_mail($rec[0]);
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=asuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='UpdateUserStatus'))
{
    //echo $_REQUEST['user_status'];
   
$data = array('user_status' => $_REQUEST['user_status']);
$ModelCall->where ("user_id", $_REQUEST['eid']);
$result =  $ModelCall->update ('Wo_Users', $data);
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=asuccess");
}
if(($_REQUEST['ActionCall']=='UpdatePaymnetStatus'))
{
  
   $_REQUEST['total_outstanding']=$_REQUEST['bill_amount']-$_REQUEST['received_cash']-$_REQUEST['received_cheque']-$_REQUEST['received_e_payment'];
   if($_REQUEST['received_cash']!=0){
       
       $_REQUEST['received_cash']=1;
   }
   if($_REQUEST['received_cheque']!=0){
       
       $_REQUEST['received_cheque']=1;
   }
   if($_REQUEST['received_e_payment']!=0){
       
       $_REQUEST['received_e_payment']=1;
   }
   
$data = array('received_cash' => $_REQUEST['received_cash'],'received_cheque' => $_REQUEST['received_cheque'],'received_e_payment' => $_REQUEST['received_e_payment'],'total_outstanding' => $_REQUEST['total_outstanding']);
$ModelCall->where ("id", '1');
$result =  $ModelCall->update ('tbl_billing', $data);
header("location:".DOMAIN.AdminDirectory."billing_management.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateEvent"))
{
if(($_REQUEST['event_name']!='') && ($_REQUEST['event_date']!='') && ($_REQUEST['event_location']!='') && ($_REQUEST['event_time']!=''))
{
if($_FILES['event_pic']['name']!='')
{
$banner_imageData=uniqid().clean($_FILES['event_pic']['name']);
if(move_uploaded_file($_FILES['event_pic']['tmp_name'],'../events/photo/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['event_picOld'];
}

if($_FILES['event_poster']['name']!='')
{
$banner_imageData1=uniqid().clean($_FILES['event_poster']['name']);
if(move_uploaded_file($_FILES['event_poster']['tmp_name'],'../events/photo/'.$banner_imageData1)){}
}
else
{
$banner_imageData1=$_REQUEST['event_posterOld'];
}

$getDay = strtotime($_REQUEST['event_date']);
$dayResult = date('D', $getDay);

$getMonth = strtotime($_REQUEST['event_date']);
$MonthResult = date('F', $getMonth);

$dataU = array(
	'event_name' => $_REQUEST['event_name'],
	'event_date' => $_REQUEST['event_date'],
	'event_month' => $MonthResult,
	'event_day' => $dayResult,
	'event_time' => $_REQUEST['event_time'],
	'event_contact_number' => $_REQUEST['event_contact_number'],
	'event_location' => $_REQUEST['event_location'],
	'client_id' => $_REQUEST['client_id'],
	'event_description' => $_REQUEST['event_description'],
	'event_terms' => $_REQUEST['event_terms'],
	'event_pic' => $banner_imageData,
	'event_poster' => $banner_imageData1,
	'sending_invitation_to' => $_REQUEST['sending_invitation_to'],
	'sending_invitation_date' => $_REQUEST['sending_invitation_date'],
	'type_of_event' => $_REQUEST['type_of_event'],
/*	'no_of_tickets' => $_REQUEST['no_of_tickets'],
	'price_of_ticket' => $_REQUEST['price_of_ticket'],*/
	'email_sent' => '0',
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_events',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_events', $dataU);
}


/*


if($_REQUEST['sending_invitation_to']!=0){
    if($_REQUEST['sending_invitation_to']==1){
   /// $ModelCall->where("user_status","Active");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['sending_invitation_to']==2){
   $ModelCall->where("user_status","Active");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['sending_invitation_to']==3){
    $ModelCall->where("user_status","DeActived");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['sending_invitation_to']==4){
    $ModelCall->where("user_status","Suspended");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
    
    foreach($rec as $ressend){
        
        
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$ToAddress = $ressend['email']; 
//$client_name=$rec1[0]['client_name'];// Add a recipient
$Subject = 'New member added || Requires your varification';
$site_url='http://pts.palmterracesselect.com/';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".$site_url."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".$site_url."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$client_name.",</strong> <span style='padding-bottom:4px;display:block'>New member added </span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".$site_url."adminaprroval.php?num=".$user_number."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Approve</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".$site_url."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".$site_url."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
echo $ToAddress;
echo $From;
echo $fromName;
echo $Subject;
 
        
        
    }
    
   // exit;
   
}


*/

header("location:".DOMAIN.AdminDirectory."event_management.php?actionResult=flashsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."event_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteEvent'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_events');
header("location:".DOMAIN.AdminDirectory."event_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateEvent'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_events', $data);
header("location:".DOMAIN.AdminDirectory."event_management.php?actionResult=asuccess");
}


////////Edit Bills


if(($_REQUEST['ActionCall']=='EditBills'))
{

$dataU = array(
    
    'bill_number' => $_REQUEST['bill_number'],
	'bill_date' => $_REQUEST['bill_date'],
	
	'start_period_date' => $_REQUEST['start_period_date'],
	'end_period_date' => $_REQUEST['end_period_date'],
	'actual_due_date' => $_REQUEST['actual_due_date'],
	'display_due_date' => $_REQUEST['display_due_date'],
	'bill_area' => $_REQUEST['bill_area'],
	
	'flat_no' => $_REQUEST['flat_no'],
	
	'member_name' => $_REQUEST['member_name'],
	'cam_o_m_services' => $_REQUEST['cam_o_m_services'],
	'diesel_cost' => $_REQUEST['diesel_cost'],
	'utility_charge' => $_REQUEST['utility_charge'],
	'total' => $_REQUEST['total'],
	'taxable_amount' => $_REQUEST['taxable_amount'],
	'arrears' => $_REQUEST['arrears'],
	'interest' => $_REQUEST['interest'],
	'cheque_dishonour_charges' => $_REQUEST['cheque_dishonour_charges'],
	'cgst_cheque_dishonour' => $_REQUEST['cgst_cheque_dishonour'],
	'sgst_cheque_dishonour' => $_REQUEST['sgst_cheque_dishonour'],
	
	'payable_amount' => $_REQUEST['payable_amount'],
	'amt_paid' => $_REQUEST['amt_paid'],
	'total_outstanding' => $_REQUEST['total_outstanding'],
	
	'late_fee_charge' => $_REQUEST['late_fee_charge'],
	'pay_after_due' => $_REQUEST['pay_after_due'],
	
	);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update('tbl_billing_new',$dataU);
header("location:".DOMAIN.AdminDirectory."billing_management_new.php?actionResult=asuccess");
}

///////////Edit Bills

if(($_REQUEST['ActionCall']=='Addpayment'))
{

$dataU = array(
    
    'mode' => $_REQUEST['mode'],
	'amount' => $_REQUEST['amount'],
	'bill_num' => $_REQUEST['bill_num'],
	'date' => $_REQUEST['date_paid'],

	);

$result =  $ModelCall->insert('tbl_bill_payment_details',$dataU);
$ModelCall->where("bill_number",$_REQUEST['bill_num']);
$rec = $ModelCall->get("tbl_billing_new");
$amt_paid=$rec[0]['amt_paid'];
$total_outstanding=$rec[0]['total_outstanding'];
$datau=array(
    'amt_paid'=>$amt_paid+$_REQUEST['amount'],
    'total_outstanding'=>$total_outstanding-$_REQUEST['amount'],
    );
  $ModelCall->where("bill_number",$_REQUEST['bill_num']);
$rec = $ModelCall->update("tbl_billing_new",$datau); 
header("location:".DOMAIN.AdminDirectory."billing_management_new.php?actionResult=asuccess");
}















if(($_REQUEST['ActionCall']=="AddUpdateNews")){
if($_FILES['image']['name']!='')
{
$imageData=$_FILES['image']['name'];
if(move_uploaded_file($_FILES['image']['tmp_name'],'http://pts.palmterracesselect.com/RWAVendor/newspaper_logos/'.$imageData)){}
}

$dataU = array(
	'name' => $_REQUEST['name'],
	'e_paper' => $_REQUEST['e_paper'],
	'language' => $_REQUEST['language'],
	'format' => $_REQUEST['format'],
	'price' => $_REQUEST['price'],
	'annual_cost' => $_REQUEST['annual_cost'],
	'discount_offer' => $_REQUEST['discount_offer'],
	'weekday_rates' => $_REQUEST['weekday_rates'],
	'Weekend_rates' => $_REQUEST['Weekend_rates'],
	'Delivery_charges' => $_REQUEST['Delivery_charges'],
	'annual' => $_REQUEST['annual'],
	'image' => $imageData,
	'bought' => $_REQUEST['bought'],
	);
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_newspaper_module',$dataU);
}
else
{
$ModelCall->where("id", $_REQUEST['eid']);
$result =  $ModelCall->update('tbl_newspaper_module', $dataU);
}
header("location:".DOMAIN.AdminDirectory."newspaper_management.php?actionResult=asuccess");
}

if(($_REQUEST['ActionCall']=='EditNews'))
{
if($_FILES['image']['name']!='')
{
$imageData=$_FILES['image']['name'];
if(move_uploaded_file($_FILES['image']['tmp_name'],'http://pts.palmterracesselect.com/RWAVendor/newspaper_logos/'.$imageData)){}
}
$dataU = array(
	'name' => $_REQUEST['name'],
	'e_paper' => $_REQUEST['e_paper'],
	'language' => $_REQUEST['language'],
	'format' => $_REQUEST['format'],
	'price' => $_REQUEST['price'],
	'annual_cost' => $_REQUEST['annual_cost'],
	'discount_offer' => $_REQUEST['discount_offer'],
	'weekday_rates' => $_REQUEST['weekday_rates'],
	'Weekend_rates' => $_REQUEST['Weekend_rates'],
	'Delivery_charges' => $_REQUEST['Delivery_charges'],
	'annual' => $_REQUEST['annual'],
	'image' => $imageData,
	'bought' => $_REQUEST['bought'],
	);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update('tbl_newspaper_module',$dataU);
header("location:".DOMAIN.AdminDirectory."newspaper_management.php?actionResult=asuccess");
}

if(($_REQUEST['ActionCall']=='DeleteNews'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_newspaper_module');
header("location:".DOMAIN.AdminDirectory."newspaper_management.php?actionResult=asuccess");
}

/////////////////Newspaper Billing Start

if(($_REQUEST['ActionCall']=="UploadNewsBills"))
{
if($_FILES['newspaper_excel_sheet_upload']['name']!=''){
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["newspaper_excel_sheet_upload"]["type"],$allowedFileType))
{
$info = pathinfo($_FILES['newspaper_excel_sheet_upload']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = rand(0,9999999)."news_billing_upload_example.".$ext; 

$targetPath = 'newspaper_uploads/'.$newname;
move_uploaded_file($_FILES['newspaper_excel_sheet_upload']['tmp_name'], $targetPath);

$Reader = new SpreadsheetReader($targetPath);
$sheetCount = count($Reader->sheets());

$check = 'true';


$filename = date('Y-m-d')."_errors.csv";         //File Name
// Create connection 
	$fp = fopen('php://output', 'w'); 
               $headers  = array(
                "0"   => "BillNumber",
                "1"  => "Month",
"2"  => "BlockNumber",
"3"  => "HouseNumber",
"4"  => "Floor",
"5"  => "TotalBillAmount",
"6"  => "AmountPaid",
"7"  => "DatePaid",
"8"  => "PGwayStatus",
"9"  => "ReceivedDate",
"10" => "ReceivedAmount",
"11" => "AmountVendor",
"12" => "DateVendor",
);
 
 
//print_r($headers);
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $headers);
fclose($fp);


for($i=0;$i<$sheetCount;$i++)
{
$Reader->ChangeSheet($i);
foreach ($Reader as $emapData)
{
    if($emapData[0] == 'BillNumber')
    {
        foreach($headers as $i => $header)
        {
            if($emapData[$i] != $header)
            {
                $error_msg[] = 'Format Mismatch';
                $check = 'false';
            }
        }
    }
    //$user_number=generate_username();
    if($emapData[0] != 'BillNumber' && $emapData[0] != '')
	{
		//print_r($emapData);
		$ModelCall->where("bill_no", $emapData[0]);
		$rec_first = $ModelCall->get("tbl_newspaper_bill");
		if(isset($rec_first[0]) && $rec_first[0] > 0){
		    $error_msg[] = 'Duplicate Bill Number';
		    $check = 'false';
		}
		
		if(false){}
		else 
		{
			/*$ModelCall->where("email", $ModelCall->utf8_decode_all($emapData[10]));
			$ModelCall->orderBy("user_id","asc");
			$rec = $ModelCall->get("Wo_Users");*/
			if(false){}
			//if(!isset($rec[0]) && $rec[0] <= 0){}
			else 
			{
					
	$dataU = array(
	'bill_no' => $emapData[0],
	'month_name' => $emapData[1],
	'block_number' => $emapData[2],
	'house_number' => (empty($emapData[3]) ? 0 :  $emapData[3]),
	'floor' => 	$emapData[4],
	'total_bill_amt' => 	$emapData[5],
	'amt_paid' => 	$emapData[6],
	'date_paid' => 	(empty($emapData[7]) ? 0 :  $emapData[7]),
	'PGway_status' => 	$emapData[8],
	'rcvd_date' => 		(empty($emapData[9]) ? 0000.00 :  $emapData[9]),
	'rcvd_amt' => 	(empty($emapData[10]) ? 0000.00 :  $emapData[10]),
	'amt_Vendor' => 	$emapData[11],
	'date_Vendor' => 	$emapData[12],
	);
	

//$pos = strpos($check, 'true');

if($check == 'true')
{
    $error_msg[] = 'Success';
    $resultU = $ModelCall->insert('tbl_newspaper_bill',$dataU);
}

    $errors = implode(",",$error_msg);
	$dataU['error/success'] = $errors;
	$fp = fopen('php://output', 'w');
	fputcsv($fp, $dataU);
	fclose($fp);

 }      
}}}}
}
if($check == 'true')
{
    header("location:".DOMAIN.AdminDirectory."newspaper_bills_managements.php");
}
else
{
    exit;
    //header("location:".DOMAIN.AdminDirectory."billing_management.php");
    //header("location:".DOMAIN.AdminDirectory."download.php?file=".$filename);
}
}
else
{
header("location:".DOMAIN.AdminDirectory."newspaper_bills_managements.php");
}

}

/////////////////Newspaper Billing end

/*if($_REQUEST['ActionCall']=='AdvertiseWIthUs'){
   $dataU= array(
'category'=>  $_REQUEST['category'],
'sub_category'=>  $_REQUEST['sub_category'],
'sub_sub_category'=>  $_REQUEST['sub_sub_category'],
//'other_category'=>  $_REQUEST['other_category'],
//'bussiness_name'=>$_REQUEST['bussiness_name'],
'title'=>  $_REQUEST['title'],
'first_name'=>  $_REQUEST['first_name'],
'middle_name'=>  $_REQUEST['middle_name'],
'last_name'=>  $_REQUEST['last_name'],
'contact'=>  $_REQUEST['contact'],
'email'=>  $_REQUEST['email'],
'address_1'=>  $_REQUEST['address_1'],
'address_2'=>  $_REQUEST['address_2'],
'pin_code'=>  $_REQUEST['pin_code'],
'url'=>  $_REQUEST['url'],
'text_advertisement'=>  $_REQUEST['text_advertisement']
/*'image'=>  $_REQUEST['image']
    $resultU = $ModelCall->insert('tbl_adervitiser_module',$dataU);
    error_reporting(E_ALL);
    print_r($dataU);
    exit;
}*/

if(($_REQUEST['ActionCall'] == "AddCovidDocument")) {

 // print_r($_REQUEST);
  //exit(0);
if(($_REQUEST['document_tilte']!=''))
{
if($_FILES['document_file']['name']!='')
{
$banner_imageName=clean($_FILES['document_file']['name']);
$banner_imageData=uniqid().clean($_FILES['document_file']['name']);
if(move_uploaded_file($_FILES['document_file']['tmp_name'],'../documents/covid/'.$banner_imageData)){
  $filepath = '../documents/covid/'.$banner_imageData;

}
}
else
{
$banner_imageData=$_REQUEST['document_fileOld'];
$banner_imageName = $_REQUEST['document_file_nameOLD'];
}
if($_REQUEST['upload_date'] && $_REQUEST['upload_date']!="" ){
  $origDate = $_REQUEST['upload_date'];
   
  $date = str_replace('/', '-', $origDate );
  $newDate = date("Y-m-d", strtotime($date));
  }else{
    $newDate = date("Y-m-d");
  }

$dataU = array(
  'document_title' => $_REQUEST['document_tilte'],
  'client_id' => $_REQUEST['client_id'],
  'document_file' => $banner_imageData,
  'document_file_name' => $_REQUEST['document_name'],
  'status' => '1',
  'created_ip' => $ModelCall->getRealIpAddr(),
  'created_date' => $newDate,
  'description'=>$_REQUEST['comment'],
  'message'=>(empty($_REQUEST['message'])) ? '' : $_REQUEST['message']);

$resultU = $ModelCall->insert('tbl_covid_document',$dataU);

if(count($_REQUEST['mail_notification'])>0){
  // echo count($_REQUEST['mail_notification']);
 foreach($_REQUEST['mail_notification'] as $mailoption){
    // echo $mailoption;
    
    if($mailoption==""){
      continue;
      }

    if($mailoption=="OfficeBearers"){
     // $ModelCall->where("status","1");

   // $rec = $ModelCall->get("tbl_team");
   $rec = $ModelCall->rawQuery("SELECT team_email as email FROM `tbl_team` where status=1");
   //$rec[0]['email'] ="kushalbhasin@gmail.com";  
    }

    if($mailoption=="EC"){
    //  $ModelCall->where("status","Current");
    //$ModelCall->orderBy("id","asc");
    //$rec = $ModelCall->get("tbl_EC_uses");
    
   $rec = $ModelCall->rawQuery("SELECT Email as  email  FROM `tbl_EC_uses` where status='Current'");
   // $rec[0]['email'] ="arit.p19@imi.edu";   
    }

    if($mailoption=="CRM"){
      $rec[0]['email'] ="crm.nirvana@nimbusharbor.com";
        
    }

    if($mailoption=="Marketing"){
      $rec[0]['email'] ="nirwana.marketing@gmail.com";
        
    }

    if($mailoption=="Accounts"){
      $rec[0]['email'] ="accounts.nirvana@nimbusharbor.com";
        
    }

    if($mailoption=="Office"){
      $rec[0]['email'] ="office.nrwa@nirvanacountry.co.in";
      $rec[1]['email'] ="office.nrwa@gmail.com"; 
    }


    if($mailoption=="Active"){
      $ModelCall->where("user_status","Active");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
        
    }

    if($mailoption=="Deactivated"){
        $ModelCall->where("user_status","Deactivated");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
        
    }

    if($mailoption=="Suspended"){
        $ModelCall->where("user_email","nishthagupta@gmail.com");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
        
    }

    if($mailoption=='animesh.bhardwaj@nimbusharbor.com'){
    
      $ModelCall->where("user_email","animesh.bhardwaj@nimbusharbor.com");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
    }


    if($mailoption=='Group'){
    // $rec[0]['email'] ="nishthagupta@gmail.com";
    $rec[0]['email'] ="NirvanaResidents@googlegroups.com";
    }


   
   foreach($rec as $ressend){
             
             
       $From = 'office.nrwa@nirvanacountry.co.in';
       $FromName = 'NRWA Office';
     $ToAddress = $ressend['email']; 
     //$client_name=$rec1[0]['client_name'];// Add a recipient
     $Subject = 'New Covid Document '. $_REQUEST['document_name']. ' is added on website.';
     $site_url=DOMAIN;
     $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
     <tbody>
    
       <tr>
         <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>  Dear Residents, </p>
           The '".$_REQUEST['document_name']."' , have been added  online under Home Page / Covid Response ".$_REQUEST['document_tilte'].". You may <a href='".$site_url."RWAVendor/documents/covid/". str_ireplace("'",  "&apos;", $banner_imageData)."' target='_blank'>Click here </a>to view the same.";
if($_REQUEST['message']!=""){
$Body = $Body . "<p>".$_REQUEST['message']."</p>";
}

         
$Body = $Body ."
         For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>
         <br><br>
         Best Regards<br>
         NRWA Office.<br>
       <a href='".$site_url."'> www.nirvanacountry.co.in</a><br><br>
       Visit <a href='".$site_url."'>www.nirvanacountry.co.in</a> for latest COVID Updates, all NRWA related information, forms, documents, rules, meeting minutes and a host of other features and information.
       </td>
       </tr>
   
       <tr>
         <td align='center' valign='middle'>&nbsp;</td>
       </tr>
      
     </tbody>
   </table>";
  if($_REQUEST['mailattach']=="No"){
         smtpmailer($ToAddress, $From, $FromName, $Subject, $Body);
    }else {
     if (smtpmailerwithattachment($ToAddress, $From, $FromName, $Subject, $Body, $filepath )) {
     //echo 'Yippie, message send via Gmail';
     } else {
     if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
     if (!empty($error)) echo $error;
     } else {
     //echo 'Yep, the message is send (after doing some hard work)';
     }
     }
     }
     // echo $ToAddress;
     // echo $From;
     // echo $fromName;
     // echo $Subject;
     // exit;
             
       
   }
   
 }   
   
}

  header("location:".DOMAIN.AdminDirectory."covid_document_management.php?actionResult=documentsuccess");
  }else{
  header("location:".DOMAIN.AdminDirectory."covid_document_management.php?actionResult=viruserror");
  }
}

if (($_REQUEST['ActionCall'] == "UpdateCovidDocument")){
if(($_REQUEST['document_name']!=''))
{
if($_FILES['document_file']['name']!='')
{
$banner_imageName=clean($_FILES['document_file']['name']);
$banner_imageData=uniqid().clean($_FILES['document_file']['name']);
if(move_uploaded_file($_FILES['document_file']['tmp_name'],'../documents/covid/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['document_fileOld'];
$banner_imageName = $_REQUEST['document_file_nameOLD'];
}

$dataU = array(
  'client_id' => $_REQUEST['client_id'],
  'document_file' => $banner_imageData,
  'document_file_name' => $_REQUEST['document_name'],
  'status' => '1',
  'created_ip' => $ModelCall->getRealIpAddr());
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_covid_document', $dataU);header("location:".DOMAIN.AdminDirectory."covid_document_management.php?actionResult=documentupdatesuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."covid_document_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['ActionCall']=="AddUpdateDocument"))
{
/* print_r($_REQUEST);
  exit(0);*/

if(($_REQUEST['document_tilte']!=''))
{
if($_FILES['document_file']['name']!='')
{
$banner_imageName=clean($_FILES['document_file']['name']);
$banner_imageData=uniqid().clean($_FILES['document_file']['name']);
if(move_uploaded_file($_FILES['document_file']['tmp_name'],'../documents/'.$banner_imageData)){

  $filepath = '../documents/'.$banner_imageData;
  $size = filesize($_FILES['document_file']['tmp_name']);
  
  if($size>25000000){
   $liinkinMail = "Link to the Document - " . SITE_URL.AdminDirectory."/documents/".$banner_imageData; 
   // $tnmp_name = $_FILES['document_file']['tmp_name'];
    
 // $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],$_FILES['uploaded_file']['name']); 
  
  }
//echo "here";
}
}
else
{
$banner_imageData=$_REQUEST['document_fileOld'];
$banner_imageName = $_REQUEST['document_file_nameOLD'];
}

if($_REQUEST['upload_date'] && $_REQUEST['upload_date']!="" ){
$origDate = $_REQUEST['upload_date'];
 
$date = str_replace('/', '-', $origDate );
$newDate = date("Y-m-d", strtotime($date));
}else{
  $newDate = date("Y-m-d");
}


$dataU = array(
	'document_tilte' => $_REQUEST['document_tilte'],
	'client_id' => $_REQUEST['client_id'],
	'document_file' => $banner_imageData,
	'document_file_name' => $_REQUEST['document_name'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $newDate,
  'description'=>$_REQUEST['comment'],
  'message'=>(empty($_REQUEST['message'])) ? '' : $_REQUEST['message']);
  
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_document_directory',$dataU);
/*======================Notification Code===========================*/
/*0===>Seen 1====>Unseen*/

    if($_REQUEST['document_tilte'] == "Forms"){
        $dataUpdate = array( 
    	'notification_form' => 1,
    	);
        $Status = 0;
        $ModelCall->where("notification_form",$Status);
        $resultUpdate =  $ModelCall->update ('Wo_Users', $dataUpdate);
    }
    
    if($_REQUEST['document_tilte'] == "Notices"){
        $dataUpdate = array( 
    	'notification_notices' => 1,
    	);
        $Status = 0;
        $ModelCall->where("notification_notices",$Status);
        $resultUpdate =  $ModelCall->update ('Wo_Users', $dataUpdate);
    }
    if($_REQUEST['document_tilte'] == "RWA_ByeLaws"){
        $dataUpdate = array( 
    	'notification_byelaws' => 1,
    	);
        $Status = 0;
        $ModelCall->where("notification_byelaws",$Status);
        $resultUpdate =  $ModelCall->update ('Wo_Users', $dataUpdate);
    }
    if($_REQUEST['document_tilte'] == "Construction_Guidelines"){
        $dataUpdate = array( 
    	'notification_guidelines' => 1,
    	);
        $Status = 0;
        $ModelCall->where("notification_guidelines",$Status);
        $resultUpdate =  $ModelCall->update ('Wo_Users', $dataUpdate);
    }
    if($_REQUEST['document_tilte'] == "Society_Rules"){
        $dataUpdate = array( 
    	'notification_society' => 1,
    	);
        $Status = 0;
        $ModelCall->where("notification_society",$Status);
        $resultUpdate =  $ModelCall->update ('Wo_Users', $dataUpdate);
    }
/*=================================================================*/
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_document_directory', $dataU);
}

if(count($_REQUEST['mail_notification'])>0){
   // echo count($_REQUEST['mail_notification']);
  foreach($_REQUEST['mail_notification'] as $mailoption){

    if($mailoption==""){
     continue;
     }
     
     if($mailoption=="Owners"){
     $ModelCall->where("user_status","Active");
       $ModelCall->where("user_type","0");
         $ModelCall->where("email_verify","1");
           $ModelCall->where("admin_approval","1");
    $ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
    }
    
       if($mailoption=="Tenants"){
     $ModelCall->where("user_status","Active");
       $ModelCall->where("user_type","1");
         $ModelCall->where("email_verify","1");
           $ModelCall->where("admin_approval","1");
    $ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
    }
    
    //  echo $mailoption;
    if($mailoption=="OfficeBearers"){
     // $ModelCall->where("status","1");

   // $rec = $ModelCall->get("tbl_team");
   $rec = $ModelCall->rawQuery("SELECT team_email as email FROM `tbl_team` where status=1");
   //$rec[0]['email'] ="kushalbhasin@gmail.com";  
    }

    if($mailoption=="EC"){
    //  $ModelCall->where("status","Current");
    //$ModelCall->orderBy("id","asc");
    //$rec = $ModelCall->get("tbl_EC_uses");
    
   $rec = $ModelCall->rawQuery("SELECT Email as  email  FROM `tbl_EC_uses` where status='Current'");
   // $rec[0]['email'] ="arit.p19@imi.edu";   
    }

    if($mailoption=="CRM"){
      $rec[0]['email'] ="crm.nirvana@nimbusharbor.com";
        
    }

    if($mailoption=="Marketing"){
      $rec[0]['email'] ="nirwana.marketing@gmail.com";
        
    }

    if($mailoption=="Accounts"){
      $rec[0]['email'] ="accounts.nirvana@nimbusharbor.com";
        
    }

    if($mailoption=="Office"){
      $rec[0]['email'] ="office.nrwa@nirvanacountry.co.in";
      $rec[1]['email'] ="office.nrwa@gmail.com"; 
    }


    if($mailoption=="Active"){
      $ModelCall->where("user_status","Active");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
        
    }

    if($mailoption=="Deactivated"){
        $ModelCall->where("user_status","Deactivated");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
        
    }

    if($mailoption=="Suspended"){
         $rec[0]['email'] ="iambommanakavya@gmail.com";
        
    }

    if($mailoption=='animesh.bhardwaj@nimbusharbor.com'){
    
      $ModelCall->where("user_email","animesh.bhardwaj@nimbusharbor.com");
    //$ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("Wo_Users");
    }


    if($mailoption=='Group'){
    // $rec[0]['email'] ="nishthagupta@gmail.com";
    $rec[0]['email'] ="NirvanaResidents@googlegroups.com";
    }


    
    foreach($rec as $ressend){
              
              
        $From = 'office.nrwa@nirvanacountry.co.in';
        $FromName = 'NRWA Office';
       $ToAddress = $ressend['email'];
       //$client_name=$rec1[0]['client_name'];// Add a recipient
      $Subject = 'New Document '. $_REQUEST['document_name']. ' is added on website.';
      $site_url=DOMAIN;
      $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
      <tbody>
     
        <tr>
          <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>  Dear Residents, </p>
            The '".$_REQUEST['document_name']."' , have been added  online under Home Page / ".$_REQUEST['document_tilte'].". You may <a href='".$site_url."RWAVendor/documents/". str_ireplace("'",  "&apos;", $banner_imageData). "' target='_blank'>Click here </a>to view the same.";
if($_REQUEST['message']!=""){
$Body = $Body . "<p>".$_REQUEST['message']."</p>";
}

          
$Body = $Body ."
          For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>
          <br>". $liinkinMail ."<br><br>
          Best Regards<br>
          NRWA Office.<br>
        <a href='".$site_url."'> www.nirvanacountry.co.in</a><br><br>
        Visit <a href='".$site_url."'>www.nirvanacountry.co.in</a> for latest COVID Updates, all NRWA related information, forms, documents, rules, meeting minutes and a host of other features and information.</td>
        </tr>
        <tr>
          <td align='center' valign='middle'>&nbsp;</td>
        </tr>
      </tbody>
    </table>";

    if($_REQUEST['mailattach']=="No"){
        smtpmailer($ToAddress, $From, $FromName, $Subject, $Body);
    }else {
      if (smtpmailerwithattachment($ToAddress, $From, $FromName, $Subject, $Body, $filepath )) {
      //echo 'Yippie, message send via Gmail';
      } else {
      if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
      if (!empty($error)) echo $error;
      } else {
      //echo 'Yep, the message is send (after doing some hard work)';
      }
      }
      }
      // echo $ToAddress;
      // echo $From;
      // echo $fromName;
      // echo $Subject;
      // exit;
              
      
    }
    
  }   
    
}


header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=documentsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteCovidDocument'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_covid_document');
header("location:".DOMAIN.AdminDirectory."covid_document_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteDocument'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_document_directory');
header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=dsuccess");
}


if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateCovidDocument'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_covid_document', $data);
header("location:".DOMAIN.AdminDirectory."covid_document_management.php?actionResult=asuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateDocument'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_document_directory', $data);
header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateCMSManagement"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."aboutus_content.php?actionResult=cmssuccess");
}



if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementDiscussion"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."discussion_content.php?actionResult=cmssuccess");
}



if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementPrivacy"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."privacy_content.php?actionResult=cmssuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementTerms"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."terms_content.php?actionResult=cmssuccess");
}

if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementAdvertiseTNC"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."ad_tnc.php?actionResult=cmssuccess");
}

if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementCookies"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."cookies_policy_content.php?actionResult=cmssuccess");
}



if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementAdvertise"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."advertise_content.php?actionResult=cmssuccess");
}



if(($_REQUEST['ActionCall']=="AddUpdateCMSManagementContribute"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'content_data' => $_REQUEST['content_data'],
	'meta_title' => $_REQUEST['meta_title'],
	'meta_keyword' => $_REQUEST['meta_keyword'],
	'meta_description' => $_REQUEST['meta_description'],
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_cms_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_cms_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."contribute_content.php?actionResult=cmssuccess");
}


if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteAdvertiseRequest'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_advertise_request');
header("location:".DOMAIN.AdminDirectory."advertise_request_management.php?actionResult=dsuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateCategory"))
{
if(($_REQUEST['category_name']!=''))
{
if($_REQUEST['eid']!="")
{
$ModelCall->where("(id !='".$ModelCall->utf8_decode_all($_REQUEST['eid'])."')" );
}
$ModelCall->where("(category_name ='".$ModelCall->utf8_decode_all($_REQUEST['category_name'])."')" );
$ModelCall->where("(client_id ='".$ModelCall->utf8_decode_all($_REQUEST['client_id'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_category_entry");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."service_category_management.php?actionResult=categoryerror");
}
else 
{

$dataU = array(
	'category_name' => $_REQUEST['category_name'],
	'client_id' => $_REQUEST['client_id'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_category_entry',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_category_entry', $dataU);
}
header("location:".DOMAIN.AdminDirectory."service_category_management.php?actionResult=categorysuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."service_category_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteCategory'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_category_entry');
header("location:".DOMAIN.AdminDirectory."service_category_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateCategory'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_category_entry', $data);
header("location:".DOMAIN.AdminDirectory."service_category_management.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateSubCategory"))
{
if(($_REQUEST['sub_category_name']!='') && ($_REQUEST['catgeory_id']!=''))
{
if($_REQUEST['eid']!="")
{
$ModelCall->where("(id !='".$ModelCall->utf8_decode_all($_REQUEST['eid'])."')" );
}
$ModelCall->where("(sub_category_name ='".$ModelCall->utf8_decode_all($_REQUEST['sub_category_name'])."')" );
$ModelCall->where("(catgeory_id ='".$ModelCall->utf8_decode_all($_REQUEST['catgeory_id'])."')" );
$ModelCall->where("(client_id ='".$ModelCall->utf8_decode_all($_REQUEST['client_id'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_sub_category_entry");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."service_subcategory_management.php?actionResult=categoryerror");
}
else 
{

$dataU = array(
	'sub_category_name' => $_REQUEST['sub_category_name'],
	'client_id' => $_REQUEST['client_id'],
	'catgeory_id' => $_REQUEST['catgeory_id'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_sub_category_entry',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_sub_category_entry', $dataU);
}
header("location:".DOMAIN.AdminDirectory."service_subcategory_management.php?actionResult=categorysuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."service_subcategory_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteSubCategory'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_sub_category_entry');
header("location:".DOMAIN.AdminDirectory."service_subcategory_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateSubCategory'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_sub_category_entry', $data);
header("location:".DOMAIN.AdminDirectory."service_subcategory_management.php?actionResult=asuccess");
}



if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteServiceListing'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_service_bazzar');
header("location:".DOMAIN.AdminDirectory."service_bazzar_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateServiceListing'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_service_bazzar', $data);
header("location:".DOMAIN.AdminDirectory."service_bazzar_management.php?actionResult=asuccess");
}


if(($_REQUEST['ActionCall']=="AddUpateServiceListing"))
{
if(($_REQUEST['catgeory_id']!='') && ($_REQUEST['service_state_id']!='') && ($_REQUEST['service_city_id']!='') && ($_REQUEST['service_name']!=''))
{
if($_REQUEST['eid']!="")
{
$ModelCall->where("(id !='".$ModelCall->utf8_decode_all($_REQUEST['eid'])."')" );
}
$ModelCall->where("(catgeory_id ='".$ModelCall->utf8_decode_all($_REQUEST['catgeory_id'])."')" );
$ModelCall->where("(service_state_id ='".$ModelCall->utf8_decode_all($_REQUEST['service_state_id'])."')" );
$ModelCall->where("(service_city_id ='".$ModelCall->utf8_decode_all($_REQUEST['service_city_id'])."')" );
$ModelCall->where("(service_name ='".$ModelCall->utf8_decode_all($_REQUEST['service_name'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_service_bazzar");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."add_service_listing.php?actionResult=servicelistingerror");
}
else 
{

if($_FILES['service_pic']['name']!='')
{
$sitelogoData=uniqid().clean($_FILES['service_pic']['name']);
if(move_uploaded_file($_FILES['service_pic']['tmp_name'],'../events/photo/'.$sitelogoData)){}
}
else
{
$sitelogoData=$_REQUEST['service_picOld'];
}

$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($_REQUEST['catgeory_id'])."')" );
$ModelCall->orderBy("id","asc");
$getMainCategory = $ModelCall->get("tbl_category_entry");

$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($_REQUEST['catgeory_sub_id'])."')" );
$ModelCall->orderBy("id","asc");
$getSubCategory = $ModelCall->get("tbl_sub_category_entry");


$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($_REQUEST['service_state_id'])."')" );
$ModelCall->orderBy("id","asc");
$getState = $ModelCall->get("states");

$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($_REQUEST['service_city_id'])."')" );
$ModelCall->orderBy("id","asc");
$getCity = $ModelCall->get("cities");



$dataU = array(
	'catgeory_id' => $_REQUEST['catgeory_id'],
	'catgeory_sub_id' => $_REQUEST['catgeory_sub_id'],
	'service_state_id' => $_REQUEST['service_state_id'],
	'service_city_id' => $_REQUEST['service_city_id'],
	'service_name' => $_REQUEST['service_name'],
	'service_locality' => $_REQUEST['service_locality'],
	'rating' => $_REQUEST['rating'],
	'service_address' => $_REQUEST['service_address'],
	'service_zipcode' => $_REQUEST['service_zipcode'],
	'service_contact_name' => $_REQUEST['service_contact_name'],
	'service_contact_email' => $_REQUEST['service_contact_email'],
	'service_contact_phone' => $_REQUEST['service_contact_phone'],
	'service_contact_mobile' => $_REQUEST['service_contact_mobile'],
	'service_contact_website' => $_REQUEST['service_contact_website'],
	'service_opening_days' => $_REQUEST['service_opening_days'],
	'service_opening_times' => $_REQUEST['service_opening_times'],
	'about_service' => $_REQUEST['about_service'],
	'service_pic' => $sitelogoData,
	'client_id' => $_REQUEST['client_id'],
	'seo_service_url' => seo_friendly_url($_REQUEST['service_name']),
	'seo_category_url' => seo_friendly_url($getMainCategory[0]['category_name']),
	'seo_state_url' => seo_friendly_url($getState[0]['name']),
	'seo_city_url' => seo_friendly_url($getCity[0]['name']),
	'category_name' => $getMainCategory[0]['category_name'],
	'subcategory_name' => $getSubCategory[0]['sub_category_name'],
	'state_name' => $getState[0]['name'],
	'city_name' => $getCity[0]['name'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_service_bazzar',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_service_bazzar', $dataU);
}
header("location:".DOMAIN.AdminDirectory."service_bazzar_management.php?actionResult=servicelistingsuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."service_bazzar_management.php?actionResult=viruserror");
}
}




if(($_REQUEST['ActionCall']=="AddUpdateGoogleAdManagement"))
{
$dataU = array(
	'client_id' => $_REQUEST['client_id'],
	'page_name' => $_REQUEST['page_name'],
	'google_ad1' => $_REQUEST['google_ad1'],
	'google_ad2' => $_REQUEST['google_ad2'],
	'google_ad3' => $_REQUEST['google_ad3'],
	'google_ad4' => $_REQUEST['google_ad4']);
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_google_ad_management',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_google_ad_management', $dataU);
}
header("location:".DOMAIN.AdminDirectory."contribute_content.php?actionResult=cmssuccess");
}


if(($_REQUEST['ActionCall']=="AddUpdateTeam"))
{
if(($_REQUEST['team_name']!='') && ($_REQUEST['team_destination']!=''))
{
if($_REQUEST['eid']!="")
{
$ModelCall->where("(id !='".$ModelCall->utf8_decode_all($_REQUEST['eid'])."')" );
}
$ModelCall->where("(team_name ='".$ModelCall->utf8_decode_all($_REQUEST['team_name'])."')" );
$ModelCall->where("(team_destination ='".$ModelCall->utf8_decode_all($_REQUEST['team_destination'])."')" );
$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("tbl_team");
if($ModelCall->count==1)
{ 
header("location:".DOMAIN.AdminDirectory."team_management.php?actionResult=teamerror");
}
else 
{

if($_FILES['team_pic']['name']!='')
{
$sitelogoData=uniqid().clean($_FILES['team_pic']['name']);
if(move_uploaded_file($_FILES['team_pic']['tmp_name'],'../events/photo/'.$sitelogoData)){}
}
else
{
$sitelogoData=$_REQUEST['team_picOld'];
}

$dataU = array(
	'team_name' => $_REQUEST['team_name'],
	'order_position' => $_REQUEST['order_position'],
	'team_destination' => $_REQUEST['team_destination'],
	'team_email' => $_REQUEST['team_email'],
	'team_mobile_no' => $_REQUEST['team_mobile_no'],
	'team_address' => $_REQUEST['team_address'],
	'team_description' => $_REQUEST['team_description'],
	'team_pic' => $sitelogoData,
	'client_id' => $_REQUEST['client_id'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_team',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_team', $dataU);
}
header("location:".DOMAIN.AdminDirectory."team_management.php?actionResult=teamsuccess");
}
}
else
{
header("location:".DOMAIN.AdminDirectory."team_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteTeam'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_team');
header("location:".DOMAIN.AdminDirectory."team_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateTeam'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_team', $data);
header("location:".DOMAIN.AdminDirectory."team_management.php?actionResult=asuccess");
}

if(($_REQUEST['ActionCall']=="AddUpateClientWebsiteSetting1"))
{
if(($_REQUEST['highlight_content']!=''))
{
if($_FILES['first_client_logo']['name']!='')
{
$Fbanner_imageData=uniqid().clean($_FILES['first_client_logo']['name']);
if(move_uploaded_file($_FILES['first_client_logo']['tmp_name'],'../client_logo/'.$Fbanner_imageData)){}
}
else
{
$Fbanner_imageData=$_REQUEST['first_client_logoOld'];
}

if($_FILES['second_client_logo']['name']!='')
{
$Sbanner_imageData=uniqid().clean($_FILES['second_client_logo']['name']);
if(move_uploaded_file($_FILES['second_client_logo']['tmp_name'],'../client_logo/'.$Sbanner_imageData)){}
}
else
{
$Sbanner_imageData=$_REQUEST['second_client_logoOld'];
}


$dataU = array(
	'highlight_content' => $_REQUEST['highlight_content'],
	'first_client_logo' => $Fbanner_imageData,
	'content_web_url'=>$_REQUEST['web_link'],
	'second_client_logo' => $Sbanner_imageData);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_clients', $dataU);
header("location:".DOMAIN.AdminDirectory."highlight_settings.php?actionResult=settingsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."highlight_settings.php?actionResult=viruserror");
}
}

//Advertisement Start


if($_REQUEST['ActionCall']=='AdvertiseWIthUs'){
if($_FILES['image']['name']!='')
{
$imageData=$_FILES['image']['name'];
if(move_uploaded_file($_FILES['image']['tmp_name'],'../ads_managements/photos/'.$imageData)){}
}

   $dataU= array(
'category'=>  $_REQUEST['category'],
'sub_category'=>  $_REQUEST['sub_category'],
'sub_sub_category'=>  $_REQUEST['sub_sub_category'],
'other_category'=>  $_REQUEST['other_category'],
'bussiness_name'=>$_REQUEST['bussiness_name'],
'title'=>  $_REQUEST['title'],
'first_name'=>  $_REQUEST['first_name'],
'middle_name'=>  $_REQUEST['middle_name'],
'last_name'=>  $_REQUEST['last_name'],
'contact1'=>  $_REQUEST['contact1'],
'contact2'=>  $_REQUEST['contact2'],
//'contact3'=>  $_REQUEST['contact3'],
'landline_isd1'=>  $_REQUEST['landline_isd1'],
'landline_isd2'=>  $_REQUEST['landline_isd2'],
//'landline_isd3'=>  $_REQUEST['landline_isd3'],
'landline_std1'=>  $_REQUEST['landline_std1'],
'landline_std2'=>  $_REQUEST['landline_std2'],
//'landline_std3'=>  $_REQUEST['landline_std3'],
'landline_number1'=>  $_REQUEST['landline_number1'],
'landline_number2'=>  $_REQUEST['landline_number2'],
//'landline_number3'=>  $_REQUEST['landline_number3'],
'email'=>  $_REQUEST['email'],
'email2'=>  $_REQUEST['email2'],
'email3'=>  $_REQUEST['email3'],
'address_1'=>  $_REQUEST['address_1'],
'address_2'=>  $_REQUEST['address_2'],
'pin_code'=>  $_REQUEST['pin_code'],
'contact'=>  $_REQUEST['contact'],
'url'=>  $_REQUEST['web_link'],
'image' => $imageData,
'text_advertisement'=>  $_REQUEST['text_advertisement'],
'pay_amount' => $_REQUEST['pay_amount'],
'pay_date' => $_REQUEST['pay_date'],
'pay_mode' => $_REQUEST['pay_mode'],
'pay_ref' => $_REQUEST['pay_ref']
);

/*echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";
echo "<pre>";
var_dump($dataU);
echo "</pre>";*/

$resultU = $ModelCall->insert('tbl_adervitiser_module',$dataU);

//echo "Your Form Is Submitted";
$ModelCall->orderBy("id","asc");
$ModelCall->where("id","$resultU");

//---------------------------------Mail to Admin Start Here-------------------------------------------

$From = "website.admin@nirvanacountry.co.in";
//$FromName = strip_tags(SITENAME);
$ToAddress = "kushalbhasin@gmail.com"; 
//$ToAddress = "huzaifausmaan@gmail.com";

$AdClient = $ModelCall->get("tbl_adervitiser_module");
//$ToAddress = addCC('huzaifausmaan@gmail.com');

/*echo "<pre>";
var_dump($AdClient);
echo "</pre>";
exit;*/
$ModelCall->orderBy("id","asc");
$ModelCall->where("id","$resultU");
//$client_name="Huzaifa";// Add a recipient
$client_category = end($AdClient)['category'];
$client_sub_category = end($AdClient)['sub_category'];
$client_sub_sub_category = end($AdClient)['sub_sub_category'];
$client_other_category = end($AdClient)['other_category'];
$client_contact1 = end($AdClient)['contact1'];
$client_contact2 = end($AdClient)['contact2'];
$client_landline_isd1 = end($AdClient)['landline_isd1'];
$client_landline_std1 = end($AdClient)['landline_std1'];
$client_landline_number1 = end($AdClient)['landline_number1'];
$client_address_1 = end($AdClient)['address_1'];
$client_address_2 = end($AdClient)['address_2'];
$client_pin_code = end($AdClient)['pin_code'];

$client_name = end($AdClient)['first_name'];
//$client_name = $AdClient[0]['first_name'];
$client_business = end($AdClient)['bussiness_name'];
$client_mobile = end($AdClient)['contact'];
$client_email = end($AdClient)['email'];
$client_email2 = end($AdClient)['email2'];
$client_url = end($AdClient)['url'];
//$client_name=end(array_values($AdClient))['first_name'];
//print_r($client_name);
//print_r($client_business);
//exit;
$Subject = 'New Ad Requires Your Approval';
$site_url=SITE_URL;
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".$site_url."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".$site_url."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi Team Nirvana,</strong> <span style='padding-bottom:4px;display:block'>New Advertisement Received </span></p>
                        <p>You have received a new advertisement request from ".$client_name." </p>
                        <p>Please have a look and activate the ad accordingly.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Category : $client_category </td>
                    
                    <tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Sub Category : $client_sub_category </td>
                    
                    <tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Sub sub Category : $client_sub_sub_category </td>
                    
                    <tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Other Category : $client_other_category </td>
                    
                    <tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Primaary Conatct : $client_contact1 </td>
                    
                    <tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Secondary Conatct : $client_contact2 </td>
                    
                    <tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Business Name : $client_business </td>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Click to Dial Contact : $client_mobile </td>
                    </tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Primary Email : $client_email</td>
                    </tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Secondary Email : $client_email2</td>
                    </tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Click to Visit Web Page : $client_url </td>
                    </tr>
               
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".$site_url."RWAVendor/ads_management_management.php' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Activate</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".$site_url."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".$site_url."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/terms-of-service/' target='_blank'>Terms</a></td>
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

if (smtpmailer2($ToAddress, $From, $FromName, $Subject, $Body)) {
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer2($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}

//---------------------------------Mail to Admin End Here-------------------------------------------


//---------------------------------Mail to User Start Here-------------------------------------------


$From = "website.admin@nirvanacountry.co.in";
//$FromName = strip_tags(SITENAME);
//$ToAddress = "WebAdmin@Nirvanacountry.co.in"; 
$AdClient = $ModelCall->get("tbl_adervitiser_module");
$ModelCall->orderBy("id","asc");
$ModelCall->where("id","$resultU");
$ToAddress = end($AdClient)['email'];

//echo $ToAddress;
//$client_name="Huzaifa";// Add a recipient
$client_category = end($AdClient)['category'];
$client_sub_category = end($AdClient)['sub_category'];
$client_sub_sub_category = end($AdClient)['sub_sub_category'];
$client_other_category = end($AdClient)['other_category'];
$client_contact1 = end($AdClient)['contact1'];
$client_contact2 = end($AdClient)['contact2'];
$client_landline_isd1 = end($AdClient)['landline_isd1'];
$client_landline_std1 = end($AdClient)['landline_std1'];
$client_landline_number1 = end($AdClient)['landline_number1'];
$client_landline_isd2 = end($AdClient)['landline_isd2'];
$client_landline_std2 = end($AdClient)['landline_std2'];
$client_landline_number2 = end($AdClient)['landline_number2'];
$client_address_1 = end($AdClient)['address_1'];
$client_address_2 = end($AdClient)['address_2'];
$client_pin_code = end($AdClient)['pin_code'];

$client_name = end($AdClient)['first_name'];
$client_middle_name = end($AdClient)['middle_name'];
$client_last_name = end($AdClient)['last_name'];
//$client_name = $AdClient[0]['first_name'];
$client_business = end($AdClient)['bussiness_name'];
$client_mobile = end($AdClient)['contact'];
$client_email = end($AdClient)['email'];
$client_email2 = end($AdClient)['email2'];
$client_email3 = end($AdClient)['email3'];
$client_url = end($AdClient)['url'];
$client_ad_text = end($AdClient)['text_advertisement'];
$client_pay_amount = end($AdClient)['pay_amount'];
$client_pay_date = end($AdClient)['pay_date'];
$client_pay_mode = end($AdClient)['pay_mode'];
$client_ref_no = end($AdClient)['pay_ref'];
//$client_name=end(array_values($AdClient))['first_name'];
//print_r($client_name);
//print_r($client_business);
//exit;
$Subject = 'Your Advertisement Is Submitted';
$site_url=SITE_URL;
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".$site_url."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".$site_url."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$client_name.",</strong> </p>
                        <p>We have received your advertisement request. Admin will activate your add accordingly.</p>
                       <p><strong>Below are the details submitted by you for Advertisement : </strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Category : $client_category </td>
                     <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Sub Category : $client_sub_category </td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Sub sub Category : $client_sub_sub_category </td>
                     <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Other Category : $client_other_category </td>
                    
                    </tr>
                    
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Business Name : $client_business </td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Name: $client_name &nbsp; $client_middle_name &nbsp; $client_last_name</td>
                    
                    </tr>
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Primaary Conatct : $client_contact1 </td>
                     <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Secondary Conatct : $client_contact2 </td>
                    
                    </tr>
                    <tr>
                    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Landline No. 1 : $client_landline_isd1 &nbsp; $client_landline_std1 &nbsp; $client_landline_number1</td>
                    </tr>
                    
                    <tr>
                    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Landline No. 2 : $client_landline_isd2 &nbsp; $client_landline_std2 &nbsp; $client_landline_number2 </td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Primary Email : $client_email</td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Secondary Email : $client_email2</td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Third Email : $client_email3</td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>Address : $client_address_1 &nbsp; $client_address_2 &nbsp; $client_pin_code </td>
                    </tr>
                    
                    <tr>
                        
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Click to Dial Contact : $client_mobile </td>
                     <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Click to Visit Web Page : $client_url </td>
                    
                    </tr>
                    
                    
                    
                     <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Text for your advertisement : $client_ad_text </td>
                    </tr>
                    
                    <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Paid Amount : $client_pay_amount </td>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Payment Date : $client_pay_date </td>
                    </tr>
                    
                  
                    
                     <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Payment Mode : $client_pay_mode </td>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> Transaction Reference No. : $client_ref_no </td>
                    </tr>
                    
                     
                  
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'> 
                    <p><strong>Thank you for advertising with us.</strong></p>
                    </td>
       
                     </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>For any other enquiries,<br>
                        you may write to us at <a href='Nirvana.Marketing@nirvanacountry.co.in' target='_blank'>Nirvana.Marketing@nirvanacountry.co.in</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".$site_url."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".$site_url."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/terms-of-service/' target='_blank'>Terms</a></td>
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

if (smtpmailer2($ToAddress, $From, $FromName, $Subject, $Body)) {
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer2($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}
//---------------------------------Mail to User End Here-------------------------------------------
//echo "before going to header";
  header("location: https://www.nirvanacountry.co.in/");
//echo "after going to header";  
}



//billing start

if(($_REQUEST['ActionCall']=="AddBilling"))
{
if($_FILES['customer_excel_sheet_upload']['name']!=''){
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["customer_excel_sheet_upload"]["type"],$allowedFileType))
{
$info = pathinfo($_FILES['customer_excel_sheet_upload']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = rand(0,9999999)."billing_upload_example.".$ext; 

$targetPath = 'billing_uploads/'.$newname;
move_uploaded_file($_FILES['customer_excel_sheet_upload']['tmp_name'], $targetPath);

$Reader = new SpreadsheetReader($targetPath);
$sheetCount = count($Reader->sheets());

$check = 'true';


$filename = date('Y-m-d')."_errors.csv";         //File Name
// Create connection 
	$fp = fopen('php://output', 'w'); 
               $headers  = array(
                "0"   => "Bill Number",
                "1"  => "GST IN",
"2"  => "PAN No.",
"3"  => "Reverse Charge",
"4"  => "Member Name",
"5"  => "Block Name",
"6"  => "Virtual A/c",
"7"  => "Resident GST No",
"8"  => "Flat No",
"9"  => "Bill Area",
"10" => "Bill Area For Print",
"11" => "Address",
"12" => "City",
"13" => "Email id",
"14" => "Tenant Email id",
"15" => "Mobile Number",
"16" => "Land Line Number",
"17" => "Tenant Mobile Number",
"18" => "CAM Rate",
"19" => "CAM Rebate",
"20" => "CAM Final Rate",
"21" => "CAM and O & M Services",
"22" => "CGST",
"23" => "SGST",
"24" => "Previous DG Reading Date",
"25" => "Current DG Reading Date",
"26" => "Op DG Reading",
"27" => "Clsg DG Reading",
"28" => "Sanc Grid LOAD (KW)",
"29" => "Sanc DG LOAD",
"30" => "Total DG Units",
"31" => "DG Rate",
"32" => "DG Rebate",
"33" => "DG Final Rate",
"34" => "Reimbursement of Diesel Cost for Running DG Sets, at 3.0 KWH /Ltr (3 Months)",
"35" => "CGST",
"36" => "SGST",
"37" => "Total DG Amount",
"38" => "Utility  Rate",
"39" => "Utility Rebate",
"40" => "Utility Final Rate",
"41" => "Utility Charge (Water +Sewer +Common Electricity (3 Months)",
"42" => "CGST",
"43" => "SGST",
"44" => "Sewer Rate",
"45" => "Sewer Charge for 3 month",
"46" => "Current Total Bill Amount",
"47" => "Taxable Amount",
"48" => "Total GST @9%",
"49" => "Total SST @9%",
"50" => "Payment After Due Date",
"51" => "Received Cash",
"52" => "Received Cheque",
"53" => "Received E Payment",
"54" => "Receiced Amt",
"55" => "Received Cash Date",
"56" => "Received Cheque Date",
"57" => "Received E Payment Date",
"58" => "Bill Date",
"59" => "Start Period Date",
"60" => "End Period Date",
"61" => "Bill Period",
"62" => "Display Due Date",
"63" => "Grace Period (Days)",
"64" => "Actual Due Date",
"65" => "Arrears",
"66" => "Surcharge Total",
"67" => "Due Amount Till Dec",
"68" => "Outstanding Subs Till MAR",
"69" => "CAM Till Dec",
"70" => "Payeable Amount",
"71" => "Surcharge Total Amount",
"72" => "Payment After Due Date 25 Jan",
"73" => "DG-CGST rate",
"74" => "DG-SGST rate",
"75" => "CGSTApplicable on CAM",
"76" => "CGSTApplicable on DG Set",
"77" => "CGSTApplicable on Sewer",
"78" => "CCGST on Interest",
"79" => "SGST Applicable on CAM",
"80" => "SGST Applicable on DG Set",
"81" => "SGST Applicable on Sewer",
"82" => "SGST on Interest",
"83" => "Interest",
"84" => "Cheque Dishonour Charges",
"85" => "CGST on Cheque Dishonour Charges",
"86" => "SGST on Cheque Dishonour Charges",
"87" => "Payment After Due Date");
 
 
//print_r($headers);
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $headers);
fclose($fp);


for($i=0;$i<$sheetCount;$i++)
{
$Reader->ChangeSheet($i);
foreach ($Reader as $emapData)
{
    if($emapData[0] == 'Bill Number')
    {
        foreach($headers as $i => $header)
        {
            if($emapData[$i] != $header)
            {
                $error_msg[] = 'Format Mismatch';
                $check = 'false';
            }
        }
    }
    //$user_number=generate_username();
    if($emapData[0] != 'Bill Number' && $emapData[0] != '')
	{
		//print_r($emapData);
		$ModelCall->where("bill_number", $emapData[0]);
		$rec_first = $ModelCall->get("tbl_billing");
		if(isset($rec_first[0]) && $rec_first[0] > 0){
		    $error_msg[] = 'Duplicate Bill Number';
		    $check = 'false';
		}
		
		if(false){}
		else 
		{
			/*$ModelCall->where("email", $ModelCall->utf8_decode_all($emapData[10]));
			$ModelCall->orderBy("user_id","asc");
			$rec = $ModelCall->get("Wo_Users");*/
			if(false){}
			//if(!isset($rec[0]) && $rec[0] <= 0){}
			else 
			{
					
	$dataU = array(
	'bill_number' => $emapData[0],
	'gst_in' => $emapData[1],
	'pan_no' => $emapData[2],
	'reverse_charge' => (empty($emapData[3]) ? 0 :  $emapData[3]),
	'member_name' => 	$emapData[4],
	'block_name' => 	$emapData[5],
	'virtual_acc' => 	$emapData[6],
	'resident_gst_no' => 	(empty($emapData[7]) ? 0 :  $emapData[7]),
	'flat_no' => 	$emapData[8],
	'bill_area' => 		(empty($emapData[9]) ? 0000.00 :  $emapData[9]),
	'area_in_sqyds_for_print' => 	(empty($emapData[10]) ? 0000.00 :  $emapData[10]),
	'address' => 	$emapData[11],
	'city' => 	$emapData[12],
	'email_id' => 	$emapData[13],
	'tenant_email_id' => 	$emapData[14],
	'mobile_no' => 	$emapData[15],
	'land_line_no' => 	$emapData[16],
	'tenant_mob_no' => 	$emapData[17],
	'cam_rate' => 		(empty($emapData[18]) ? 0000.00 :  $emapData[18]),
	'cam_rebate' =>   (empty($emapData[19]) ? 0000.00 :  $emapData[19]),
	'cam_final_rate' => (empty($emapData[20]) ? 0000.00 :  $emapData[20]),
	'cam_amount' => 		(empty($emapData[21]) ? 0 :  $emapData[21]),
	'cam_cgst' => 	(empty($emapData[22]) ? 000.00 :  $emapData[22]),
	'cam_sgst' => 	(empty($emapData[23]) ? 000.00 :  $emapData[23]),
	'previous_dg_reading_date' => $emapData[24],
	'current_dg_reading_date' => $emapData[25],
	'op_dg_reading' => (empty($emapData[26]) ? 0 :  $emapData[26]),
	'clsg_dg_reading' => (empty($emapData[27]) ? 0 :  $emapData[27]),
	'sanc_grid_load' => $emapData[28],
	'sanc_dg_load' => $emapData[29],
	'total_dg_units' => (empty($emapData[30]) ? 0 :  $emapData[30]),
	'dg_rate' => (empty($emapData[31]) ? 00.00 :  $emapData[31]),
    'dg_rebate' => (empty($emapData[32]) ? 00.00 :  $emapData[32]),
    'dg_final_rate' => (empty($emapData[33]) ? 00.00 :  $emapData[33]),
    'dg_amount' => (empty($emapData[34]) ? 0 :  $emapData[34]),
    'dg_cgst' => (empty($emapData[35]) ? 000.00 :  $emapData[35]),
    'dg_sgst' => (empty($emapData[36]) ? 000.00 :  $emapData[36]),
    'total_dg_amount' => (empty($emapData[37]) ? 0 :  $emapData[37]),
    'utility_rate' => (empty($emapData[38]) ? 00.00 :  $emapData[38]),
    'utility_rebate' => (empty($emapData[39]) ? 00.00 :  $emapData[39]),
    'utility_final_rate' => (empty($emapData[40]) ? 00.00 :  $emapData[40]),
    'utility_charge' => (empty($emapData[41]) ? 00.00 :  $emapData[41]),
    'utility_charge_cgst' => (empty($emapData[42]) ? 000.00 :  $emapData[42]),
    'utility_charge_sgst' => (empty($emapData[43]) ? 000.00 :  $emapData[43]),
    'sewer_rate' => 	(empty($emapData[44]) ? 000.00 :  $emapData[44]),
	'sewer_charge_for_3_month' => 	(empty($emapData[45]) ? 0 :  $emapData[45]),
	'current_total_bill_amount' => 	(empty($emapData[46]) ? 0 :  $emapData[46]),
	'taxable_amount' => (empty($emapData[47]) ? 0 :  $emapData[47]),
	'total_cgst' => (empty($emapData[48]) ? 000.00 :  $emapData[48]),
    'total_sgst' => (empty($emapData[49]) ? 000.00 :  $emapData[49]),
    'payment_after_due' =>  (empty($emapData[50]) ? 0 :  $emapData[50]),
  	'received_cash' => 		(empty($emapData[51]) ? 0 :  $emapData[51]),
	'received_cheque' => 		(empty($emapData[52]) ? 0 :  $emapData[52]),
	'received_e_payment' => 		(empty($emapData[53]) ? 0 :  $emapData[53]),
	'receiced_amt' => 	(empty($emapData[54]) ? 0 :  $emapData[54]),
	'received_cash_date' => 	$emapData[55],
	'received_cheque_date' => 	$emapData[56],
	'received_e_payment_date' => 	$emapData[57],
	'billing_date' => 	$emapData[58],
	'start_period_date' => $emapData[59],
    'end_period_date' => $emapData[60],
    'bill_period' =>  (empty($emapData[61]) ? 0 :  $emapData[61]),
    'due_date' => 	$emapData[62],  
    'grace_period' => (empty($emapData[63]) ? 0 :  $emapData[63]),
    'actual_due_date' => $emapData[64],
    'total_outstanding' => 	(empty($emapData[65]) ? 0 :  $emapData[65]),
    'surcharge_total' => 	(empty($emapData[66]) ? 0 :  $emapData[66]),
	'due_amount_till_dec' => 	(empty($emapData[67]) ? 0 :  $emapData[67]),
	'outstanding_subs_till_mar' => 	(empty($emapData[68]) ? 0 :  $emapData[68]),
	'cam_till_dec' => 	(empty($emapData[69]) ? 0 :  $emapData[69]),
	'payeable_amount' => 	(empty($emapData[70]) ? 0 :  $emapData[70]),
	'surcharge_total_2' => 	(empty($emapData[71]) ? 0 :  $emapData[71]),
	'payment_after_due_date_25_jan' => 	(empty($emapData[72]) ? 0 :  $emapData[72]),
	'dg_cgst_rate' => 	(empty($emapData[73]) ? 00.00 :  $emapData[73]),
	'dg_sgst_rate' => 	(empty($emapData[74]) ? 00.00 :  $emapData[74]),
	'cgst_applicable_on_cam' => 	(empty($emapData[75]) ? 0 :  $emapData[75]),
	'cgst_applicable_on_dg_set' => 	(empty($emapData[76]) ? 0 :  $emapData[76]),
	'cgst_applicable_on_sewer' => 	(empty($emapData[77]) ? 0 :  $emapData[77]),
	'cgst_applicable_on_interest' => (empty($emapData[78]) ? 0 :  $emapData[78]),
	'sgst_applicable_on_cam' => 	(empty($emapData[79]) ? 0 :  $emapData[79]),
	'sgst_applicable_on_dg_set' => (empty($emapData[80]) ? 0 :  $emapData[80]),
	'sgst_applicable_on_sewer' => 	(empty($emapData[81]) ? 0 :  $emapData[81]),
	'sgst_applicable_on_interest' => (empty($emapData[82]) ? 0 :  $emapData[82]),
	'interest' => $emapData[83],
    'cheque_dishonor_charges' => $emapData[84],
    'cheque_dishonor_cgst' => (empty($emapData[85]) ? 000.00 :  $emapData[85]),
    'cheque_dishonor_sgst' => (empty($emapData[86]) ? 000.00 :  $emapData[86]),
    'payment_after_due_date' => (empty($emapData[87]) ? 0 :  $emapData[87])
	);
	

//$pos = strpos($check, 'true');

if($check == 'true')
{
    $error_msg[] = 'Success';
    $resultU = $ModelCall->insert('tbl_billing',$dataU);
}

    $errors = implode(",",$error_msg);
	$dataU['error/success'] = $errors;
	$fp = fopen('php://output', 'w');
	fputcsv($fp, $dataU);
	fclose($fp);

 /*
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);

$ToAddress =  $emapData[10];      // Add a recipient
$Subject = 'New Vender Account Login from '.strip_tags(SITENAME).'!';



$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".DOMAIN."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".DOMAIN."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Please find the login information detail below </span></p>
                        
                    </tr>
					 <tr>
                      <td><table style='border: 1px solid #efeeee;margin: 25px;box-shadow: 0 0 4px 0 #efeeee;padding: 12px 18px 18px 18px;background:#fff;width: 90%;' >

				</table></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."RWAVendor/' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Login your account</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".DOMAIN."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".DOMAIN."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".DOMAIN."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".DOMAIN."cms/terms-of-service/' target='_blank'>Terms</a></td>
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

if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) 
{
	echo 'Yippie, message send via Gmail';
} 
else 
{
	if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false))
	{
		if (!empty($error)) echo $error;
	} 
	else 
	{
		echo 'Yep, the message is send (after doing some hard work)';
	}
}
echo $ToAddress;
echo $From;
echo $fromName;
echo $Subject;
*/
 }      
}}}}
}
if($check == 'true')
{
    header("location:".DOMAIN.AdminDirectory."billing_management.php");
}
else
{
    exit;
    //header("location:".DOMAIN.AdminDirectory."billing_management.php");
    //header("location:".DOMAIN.AdminDirectory."download.php?file=".$filename);
}
}
else
{
header("location:".DOMAIN.AdminDirectory."billing_management.php");
}

}


//billing end























if(($_REQUEST['ActionCall']=="AddCustomerExpert"))
{
   
if($_FILES['customer_excel_sheet_upload']['name']!=''){
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["customer_excel_sheet_upload"]["type"],$allowedFileType))
{
$info = pathinfo($_FILES['customer_excel_sheet_upload']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = rand(0,9999999)."5nirwana_customer_import_example.".$ext; 

$targetPath = 'Customersuploads/'.$newname;
//move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
//$targetPath =  'Customersuploads/17635nirwana_customer_import_example.xlsx';
move_uploaded_file($_FILES['customer_excel_sheet_upload']['tmp_name'], $targetPath);

$Reader = new SpreadsheetReader($targetPath);
$sheetCount = count($Reader->sheets());
echo $sheetCount;
exit;
for($i=0;$i<$sheetCount;$i++)
{
$Reader->ChangeSheet($i);
foreach ($Reader as $emapData)
{
    $user_number=generate_username();
    if($emapData[1]!='FirstName' && $emapData[4]!='Email' && $emapData[4]!=''){
        //print_r($emapData);
    $ModelCall->where("user_number", $ModelCall->utf8_decode_all($emapData[10]));
//$ModelCall->where("website_status ='1'");
//$ModelCall->orderBy("user_id","asc");
$rec_first = $ModelCall->get("Wo_Users");
if(isset($rec_first[0]) && $rec_first[0]>0 && $emapData[10]!="" )
{ 
}
else 
{
$ModelCall->where("email", $ModelCall->utf8_decode_all($emapData[4]));
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
if(isset($rec[0]) && $rec[0]>0)
{ 
   // echo "k1k";
}

else 
{
     // echo "k2k";
    $ModelCall->where("username", $ModelCall->utf8_decode_all($emapData[9]));
//$ModelCall->where("website_status ='1'");
//$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
if(isset($rec[0]) && $rec[0]>0)
{ 
      // echo "k3k";
}

else 
{
     // echo "k4k";
$getFullName2 = $emapData[1].' '.$emapData[3];
echo $emapData[5];
if($emapData[5]!=''){
$GetNewpassword = $emapData[5];
}
else{
  $GetNewpassword= generate_userPass();  
}
if($emapData[9]!=''){
$getFullName1 = $emapData[9];
}
else{
  $getFullName1= generate_userPass();  
}

echo $GetNewpassword;
if($emapData[0]== 'Mr.' || $emapData[0]== 'mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}
if(strcasecmp($emapData[11],'YES')==0)
{
  $admin_aproval = '1';
}
else
{
  $admin_aproval = '0'; 
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$ModelCall->where("id",$_SESSION['ADMIN_CLIENT_LOGINID']);
$rec1 = $ModelCall->get("tbl_client_sub_account");
$ToAddress = $rec1[0]['client_email']; 
$client_name=$rec1[0]['client_name'];// Add a recipient
$Subject = 'New member added || Requires your varification';
$site_url='http://pts.palmterracesselect.com/';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".$site_url."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".$site_url."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$client_name.",</strong> <span style='padding-bottom:4px;display:block'>New member added </span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".$site_url."adminaprroval.php?num=".$user_number."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Approve</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".$site_url."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".$site_url."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
echo $ToAddress;
echo $From;
echo $fromName;
echo $Subject;
// exit;
}
if(strcasecmp($emapData[12],'YES')==0)
{
  $email_aproval = '1';
}
else
{
  $email_aproval = '0'; 
 $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $_REQUEST['client_name'];
$ToAddress = $emapData[4];     // Add a recipient
$Subject = 'Welcome! And confirm your email';
if(defined(SITE_URL)){
    define(SITE_URL,'google.com');
}
$site_url='http://pts.palmterracesselect.com/';
echo $site_url;


$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".$site_url."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".$site_url."nirwana-img/login_bg.png'></a></td>
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
                      <td align='center' valign='middle'><a  href='".$site_url."verifyemail.php?num=".$user_number."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify your email address</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".$site_url."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".$site_url."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".$site_url."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
echo "from";
echo $ToAddress;
echo "<br>";
echo $From;
echo $fromName;
echo $Subject;
//exit;
}

$dataU = array( 
        'user_number'=>$user_number,
	'username' => $getFullName2, 
	'email' => $emapData[4],
	'client_id' => $getClientInfo[0]['id'],
	'password' => $GetNewpassword,
	'first_name' => $emapData[1], 
	'user_title' => $emapData[0], 
	'middle_name' => $emapData[2], 
        'user_name' =>$getFullName1,
	'last_name' => $emapData[3],
	'user_status'=>$emapData[13],
	'gender' => $gender, 
	
	// 'website_status' => '1',
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
	'floor_number' => 2,//$_REQUEST['floor_number'],
	'user_type' => '0',
	'user_resident_type' => '0', 
	'admin_approval' => $admin_aproval,
	'email_verify' => $email_aproval,
	'created_date' => date("F j, Y, g:i a"),
	'created_ip' => $ModelCall->getRealIpAddr(),
	'ip_address' => $ModelCall->getRealIpAddr(),
	'join_date' => $ModelCall->get_today_date());
	
	// print_r($dataU);
     
$resultU = $ModelCall->insert('Wo_Users',$dataU);

$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $getFullName2;

$ToAddress =  $emapData[4];      // Add a recipient
$Subject = 'New Vender Account Login from '.strip_tags(SITENAME).'!';



$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".DOMAIN."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".DOMAIN."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Please find the login information detail below </span></p>
                        
                    </tr>
					 <tr>
                      <td><table style='border: 1px solid #efeeee;margin: 25px;box-shadow: 0 0 4px 0 #efeeee;padding: 12px 18px 18px 18px;background:#fff;width: 90%;' >
  <tr>
    <td height='29'><strong>Login ID :</strong> </td>
    <td>".$getFullName1."</td>
  </tr>
  <tr>
    <td><strong>Password :</strong></td>
    <td>".$GetNewpassword."</td>
  </tr>
</table></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."RWAVendor/' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Login your account</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".DOMAIN."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".DOMAIN."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".DOMAIN."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".DOMAIN."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
echo $ToAddress;
echo $From;
echo $fromName;
echo $Subject;
//exit;

//header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customersuccess");
} }      
}}}
}
}

 


header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customersuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=viruserror");
}

}


if(($_REQUEST['ActionCall']=="AddUpdateads_management"))
{
if(($_REQUEST['ads_management_tilte']!=''))
{
if($_FILES['ads_management_file']['name']!='')
{
$banner_imageName=clean($_FILES['ads_management_file']['name']);
$banner_imageData=uniqid().clean($_FILES['ads_management_file']['name']);
if(move_uploaded_file($_FILES['ads_management_file']['tmp_name'],'../ads_managements/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['ads_management_fileOld'];
$banner_imageName = $_REQUEST['ads_management_file_nameOLD'];
}


$dataU = array(
	'ads_management_tilte' => $_REQUEST['ads_management_tilte'],
	'ads_banner_position' => $_REQUEST['ads_banner_position'],
	'ads_management_url' => $_REQUEST['ads_management_url'],
	'client_id' => $_REQUEST['client_id'],
	'ads_management_file' => $banner_imageData,
	'ads_management_file_name' => $banner_imageName,
	'ads_banner_type' => $_REQUEST['ads_banner_type'],
	'ads_banner_size' => $_REQUEST['ads_banner_size'],
	'google_ads' => $_REQUEST['google_ads'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_ads_management_directory',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_ads_management_directory', $dataU);
}
header("location:".DOMAIN.AdminDirectory."ads_management_management.php?actionResult=ads_managementsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."ads_management_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='Deleteads_management'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_adervitiser_module');
header("location:".DOMAIN.AdminDirectory."ads_management_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='Activateads_management'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_adervitiser_module', $data);
header("location:".DOMAIN.AdminDirectory."ads_management_management.php?actionResult=asuccess");
}

if(($_REQUEST['ActionCall']=="EditCustomerExpert"))
{
$getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'];
if($_REQUEST['user_title']== 'Mr.' || $_REQUEST['user_title']== 'mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}
$dataU = array(
	'user_title' => $_REQUEST['user_title'],
	'first_name' => $_REQUEST['first_name'],
	'gender' => $gender, 
	'middle_name' => $_REQUEST['middle_name'],
	'last_name' => $_REQUEST['last_name'],
	'block_id' => $_REQUEST['block_id'],
	'house_number_id' => $_REQUEST['house_number_id'],
	'floor_number' => $_REQUEST['floor_number'],
	'user_type' => $_REQUEST['user_type'],
	'user_resident_type' => $_REQUEST['user_resident_type'],
	'phone_number' => $_REQUEST['primary_phone_number'],
	'user_phone' => $_REQUEST['primary_phone_number'],
	'secondary_phone_number' => $_REQUEST['secondary_phone_number'],
	'email' => $_REQUEST['primary_email'],
	'user_email' => $_REQUEST['primary_email'],
	'secondary_email' => $_REQUEST['secondary_email']);
	
$ModelCall->where ("user_id", $_REQUEST['user_id']);
$result =  $ModelCall->update ('Wo_Users', $dataU);	
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customerasuccess");
}



/*=========================Add User By Admin==================*/
if(($_POST['ActionCall']=="AddCustomersExpert"))
{
$getFullName = $_REQUEST['first_name'].' '.$_REQUEST['last_name'];
if($_REQUEST['user_title']== 'Mr.' || $_REQUEST['user_title']== 'mr.')
{
  $gender = 'male';
}
else
{
  $gender = 'female'; 
}
$dataI = array(
	'user_title' => $_REQUEST['user_title'],
	'username' => $getFullName, 
	'first_name' => $_REQUEST['first_name'],
	'gender' => $gender, 
	'middle_name' => $_REQUEST['middle_name'],
	'last_name' => $_REQUEST['last_name'],
	'block_id' => $_REQUEST['block_id'],
	'house_number_id' => $_REQUEST['house_number_id'],
	'floor_number' => $_REQUEST['floor_number'],
	'user_type' => $_REQUEST['user_type'],
	'user_resident_type' => $_REQUEST['user_resident_type'],
	'phone_number' => $_REQUEST['primary_phone_number'],
	'secondary_phone_number' => $_REQUEST['secondary_phone_number'],
	'email' => $_REQUEST['primary_email'],
	'user_email' => $_REQUEST['primary_email'],
	'secondary_email' => $_REQUEST['secondary_email'],
	'type' => 'user',
	'admin_approval' => 1,
	'user_status' => 'Active',
	'user_name' => $_REQUEST['first_name'],
	'password' => $_REQUEST['first_name'],
	'email_verify' => 0,
	'client_id' => $getClientInfo[0]['id'],
	'created_date' => date("l d,Y,h:i a"),
	'join_date' => date("m/d/Y"),
	'created_ip' => $_SERVER['REMOTE_ADDR']);
	
$result =  $ModelCall->insert('Wo_Users', $dataI);


header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customeraddsuccess");
exit(0);

/*====================email to admin=======================*/
$getEmail = $_REQUEST['primary_email'];
                 /*$to = "office.nrwa@nirvanacountry.co.in";*/
                 $to = "techlead@myrwa.online";
                        $from = $getEmail;
                        $subject = "New Account is created on Nirvana Country";
                       
                        $message.="<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                          <tbody>
                           
                            <tr>
                              <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi Kushal,</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                                <p>A new account has been added : </p>
                              <p> Details as follows : <br>
                              User Name : ".$_REQUEST['first_name']."<br>
                               Name : ".$_REQUEST['first_name']. " ". $_REQUEST['last_name']. "<br>
                               Email : ".$getEmail."<br>
                               <br></td>
                              </tr>
                            
                            <tr>
                              <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                                NRWA Office</td>
                            </tr>
                            <tr>
                              <td align='center' valign='middle'>&nbsp;</td>
                            </tr>
                         
                          </tbody>
                        </table>";
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From: <'.$from.'>' . "\r\n";
                    $headers .= 'Cc: techlead@myrwa.online' . "\r\n";
                    
                    $ok = mail($to,$subject,$message,$headers);
                  /*===========================================================*/ 
                  
                  /*===============send email verification mail=====================*/
                 // $to = "$getEmail";
                 $to = "techlead@myrwa.online";
                        $from = "office.nrwa@nirvanacountry.co.in";
                        $subject = "Email Verification Mail";
                       
                        $message.="<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                        <tbody>
                  
                    <tr>
                    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$_REQUEST['title']."".$_REQUEST['first_name']." ".$_REQUEST['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registering online. Please click the link below to verify your email.  !</span></p>
                                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks. Once verified, you can start using all of Nirvana online's features to access forms, documents and contacts for your NRWA online.</p>
                                        </p></p>
                                        <p><strong>Thank you for your patience.</strong></p></td>
                                    </tr>
                                   
                                    <tr>
                                      <td align='center' valign='middle'><a  href='".SITE_URL."verifyemail.php?num=".substr($getEmail, 0, strpos($getEmail, '@'))."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify your email address</a> </td>
                                    </tr>
                                    <tr>
                                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Button not working? Paste the following link into your browser: https://www.nirvanacountry.co.in/verifyemail.php?num=".substr($getEmail, 0, strpos($getEmail, '@'))."
                                    <br>
                                      You’re receiving this email because you were enrolled for a new NirvanaCountry account or added a new email address. If this wasn’t you, please ignore this email. If you require any further assistance,<br>
                                        please contact us at <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in</a></td>
                                    </tr>
                                    <tr>
                                      <td align='left' valign='middle'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                                        NRWA Office</td>
                                    </tr>
                                    
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>";
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From: <'.$from.'>' . "\r\n";
                    $headers .= 'Cc: techlead@myrwa.online' . "\r\n";
                    
                    $ok = mail($to,$subject,$message,$headers);
                  /*==================================================================*/
                  
                  
                  
                  
               /* =================send credentials to mail of construction user =======================*/
    $Username11 = $_REQUEST['first_name'];
    $Password11 = $_REQUEST['first_name'];
    $to='techlead@myrwa.online';
   //$to = "$getEmail";
    $from = "Admin";
    $subject = "Login Credentials";
   
    $message.="<html>
    <body>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
                Dear Sir/Madam,
                <br>
                  <p>Below the credentials of your Login.Please Login and submit your Construction Form</p>
                  <p>Username: $Username11</p>
                  <p>Password: $Password11</p>
                  </span></br></br>
                <br><span style='text-align:center'> Warm Regards, <br>";
           $message.= 'Admin';
          $message.="</span>
        </span></p></td></tr></tbody></table>
    </body>
</html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$from.'>' . "\r\n";
$headers .= 'Cc: techlead@myrwa.online' . "\r\n";

$ok = mail($to,$subject,$message,$headers);


header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customeraddsuccess");
}
/*==============================================================*/




if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='BookTicket'))
{
 if($_SESSION['UR_LOGINID']!='') { $user_id = $_SESSION['UR_LOGINID']; } else { $user_id = '1'; } 
$dataU = array(
	'user_id' => $user_id,
	'event_id' => $_REQUEST['eid'],
	'ticket_type' => $_REQUEST['ticket_type'],
	'no_of_tickets_sc' => $_REQUEST['no_of_tickets_sc'],
	'no_of_tickets_ad' => $_REQUEST['no_of_tickets_ad'],
	'no_of_tickets_ks' => $_REQUEST['no_of_tickets_ks'],
	'payment_mode' => $_REQUEST['payment_mode'],
	'total_amount' => $_REQUEST['total_amt']);
	if($user_id != '1')
	{
	    $ModelCall->where ("user_id", $user_id);
	    $ModelCall->where ("event_id", $REQUEST['eid']);
	    $res = $ModelCall->get('tbl_tickets');
	    $check = false;
	    if($res[0]>0)
	    {
	        $check = true;
	    }
	}
	else
	{
	    $check = false;
	}
	if($check)
	{
	    $ModelCall->where ("user_id", $user_id);
        $ModelCall->where ("event_id", $REQUEST['eid']);
        $result =  $ModelCall->update ('tbl_tickets', $dataU);
    }
    else
    {
        $resultU = $ModelCall->insert('tbl_tickets',$dataU);
    }
    
header("location:".DOMAIN."?actionResult=booksuccess");
}


if(($_REQUEST['ActionCall']=="ReplaceCustomerExpert"))
{
if($_FILES['customer_excel_sheet_upload']['name']!='')
{
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["customer_excel_sheet_upload"]["type"],$allowedFileType))
{
$targetPath = 'Customersuploads/'.rand(0,999999).$_FILES['customer_excel_sheet_upload']['name'];
move_uploaded_file($_FILES['customer_excel_sheet_upload']['tmp_name'], $targetPath);
$Reader = new SpreadsheetReader($targetPath);
$sheetCount = count($Reader->sheets());
for($i=0;$i<$sheetCount;$i++)
{
$Reader->ChangeSheet($i);
foreach ($Reader as $emapData)
{
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
}


if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteSubAdmin'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_client_sub_account');
header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=dsuccess");
}


if(($_REQUEST['ActionCall']=="EditUpdateAdminData"))
{
if(($_REQUEST['client_name']!='') && ($_REQUEST['client_email']!='') && ($_REQUEST['client_password']!=''))
{
$dataU = array(
	'client_name' => $_REQUEST['client_name'],
	'client_password' => trim($_REQUEST['client_password']),
	'client_email' => trim($_REQUEST['client_email']),
	'client_mobile' => trim($_REQUEST['client_mobile']),
	'highlight_event' => $_REQUEST['highlight_event'],
	'notice_board' => $_REQUEST['notice_board'],
	'home_slider' => $_REQUEST['home_slider'],
	'blocks_management' => $_REQUEST['blocks_management'],
	'event_management' => $_REQUEST['event_management'],
	'amenities_management' => $_REQUEST['amenities_management'],
	'user_management' => $_REQUEST['user_management'],
	'document_management' => $_REQUEST['document_management'],
	'team_management' => $_REQUEST['team_management'],
	'cms_management' => $_REQUEST['cms_management'],
	'google_ad_management' => $_REQUEST['google_ad_management'],
	'setting_management' => $_REQUEST['setting_management'],
	'advertise_request_management' => $_REQUEST['advertise_request_management'],
	'service_bazaar_management' => $_REQUEST['service_bazaar_management'],
	'vendor_admin_management' => $_REQUEST['vendor_admin_management']);
	
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_client_sub_account', $dataU);

$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $_REQUEST['client_name'];
$ToAddress = $_REQUEST['client_email'];     // Add a recipient
$Subject = 'New Vender Account Login from '.strip_tags(SITENAME).'!';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ><img src='".DOMAIN."nirwana-img/home-logo.png' style='width:30%;'></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ><img src='".DOMAIN."nirwana-img/login_bg.png'></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Please find the login information detail below </span></p>
                        
                    </tr>
					 <tr>
                      <td><table style='border: 1px solid #efeeee;margin: 25px;box-shadow: 0 0 4px 0 #efeeee;padding: 12px 18px 18px 18px;background:#fff;width: 90%;' >
  <tr>
    <td height='29'><strong>Login ID :</strong> </td>
    <td>".trim($_REQUEST['client_email'])."</td>
  </tr>
  <tr>
    <td><strong>Password :</strong></td>
    <td>".trim($_REQUEST['client_password'])."</td>
  </tr>
</table></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."RWAVendor/' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Login your account</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".DOMAIN."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".DOMAIN."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".DOMAIN."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".DOMAIN."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
// echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
// echo 'Yep, the message is send (after doing some hard work)';
 }
}


header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=adminsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=viruserror");
}
}


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
    $ModelCall->where("user_status","DeActivated");
//$ModelCall->orderBy("id","asc");
$rec = $ModelCall->get("Wo_Users");
    
}
if($_REQUEST['mail_notification']==4){
    $ModelCall->where("user_status","Suspended");
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
 }
}
header("location:".DOMAIN.AdminDirectory."send_emails.php?actionResult=adminsuccess");    
    
}


if(($_REQUEST['ActionCall']=="sending_emails_test"))
{
   // print_r($_POST);
    //  $ModelCall->where("admin_approval", 1);
    //  $ModelCall->where("email_verify", 0);
    //  $ModelCall->where("user_status", "Active");
    $ModelCall->where("user_email", "techlead@myrwa.online");
    $ModelCall->orderby("user_id", "desc");
    $rec = $ModelCall->get("Wo_Users");
   
//      echo count($rec);
   print_r($rec);
    account_ready_to_use_mail($rec[0]);
   exit(0);
   foreach($rec as $ressend){
       if(!is_null($ressend['user_email'])){
             email_varify_mail($ressend);
       }
   }
     header("location:".DOMAIN.AdminDirectory."send_emails_test.php?actionResult=adminsuccess");  
    exit(0);
  $from_id=$_REQUEST['from_id'];
  $to_id=$_REQUEST['to_id'];
     for($i=$from_id;$i<=$to_id;$i++){
   echo $i;
    $ModelCall->where("user_email", "techlead@myrwa.online");
    $rec = $ModelCall->get("Wo_Users");
  
   // user_info_mail($rec[0]);
 

  }   
  echo $from_id;
  
    
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
?>
