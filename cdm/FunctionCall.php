<?php include("../model/class.expert.php"); ?>
<?php
include('map_function_list.php');
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
include('Email_Configuration_files.php');
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


$dataU = array(
	'banner_title' => $_REQUEST['banner_title'],
	'banner_content' => $_REQUEST['banner_content'],
	'client_id' => $_REQUEST['client_id'],
	'banner_image' => $banner_imageData,
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
	'client_logo' => $banner_imageData);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_clients', $dataU);
header("location:".DOMAIN.AdminDirectory."settings.php?actionResult=settingsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."settings.php?actionResult=viruserror");
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
	'client_id' => $_REQUEST['client_id'],
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
$resultU = $ModelCall->insert('tbl_client_sub_account',$dataU);

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
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'>Copyright © 2019  Innovatus Technologies Pvt. Ltd. All rights reserved.</td>
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
}
else
{
header("location:".DOMAIN.AdminDirectory."roles-permissions.php?actionResult=viruserror");
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
$ModelCall->where ("user_id", $_REQUEST['eid']);
$result =  $ModelCall->delete('Wo_Users');
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='ActivateCustomer'))
{
$data = array('website_status' => $_REQUEST['website_status']);
$ModelCall->where ("user_id", $_REQUEST['eid']);
$result =  $ModelCall->update ('Wo_Users', $data);
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=asuccess");
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


if(($_REQUEST['ActionCall']=="AddUpdateDocument"))
{
if(($_REQUEST['document_tilte']!=''))
{
if($_FILES['document_file']['name']!='')
{
$banner_imageName=clean($_FILES['document_file']['name']);
$banner_imageData=uniqid().clean($_FILES['document_file']['name']);
if(move_uploaded_file($_FILES['document_file']['tmp_name'],'../documents/'.$banner_imageData)){}
}
else
{
$banner_imageData=$_REQUEST['document_fileOld'];
$banner_imageName = $_REQUEST['document_file_nameOLD'];
}


$dataU = array(
	'document_tilte' => $_REQUEST['document_tilte'],
	'client_id' => $_REQUEST['client_id'],
	'document_file' => $banner_imageData,
	'document_file_name' => $banner_imageName,
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_document_directory',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_document_directory', $dataU);
}
header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=documentsuccess");
}
else
{
header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=viruserror");
}
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteDocument'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_document_directory');
header("location:".DOMAIN.AdminDirectory."document_management.php?actionResult=dsuccess");
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



if(($_REQUEST['ActionCall']=="AddCustomerExpert"))
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
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
if($rec[0]>0)
{ 
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
$result =  $ModelCall->delete('tbl_ads_management_directory');
header("location:".DOMAIN.AdminDirectory."ads_management_management.php?actionResult=dsuccess");
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='Activateads_management'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_ads_management_directory', $data);
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
	'username' => $getFullName, 
	'first_name' => $_REQUEST['first_name'],
	'gender' => $gender, 
	'middle_name' => $_REQUEST['middle_name'],
	'last_name' => $_REQUEST['last_name'],
	'block_id' => $_REQUEST['block_id'],
	'house_number_id' => $_REQUEST['house_number_id'],
	'floor_number' => $_REQUEST['floor_number'],
	'user_type' => $_REQUEST['user_type'],
	'user_resident_type' => $_REQUEST['user_resident_type']);
	
$ModelCall->where ("user_id", $_REQUEST['user_id']);
$result =  $ModelCall->update ('Wo_Users', $dataU);	
header("location:".DOMAIN.AdminDirectory."users_management.php?actionResult=customerasuccess");
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
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'>Copyright © 2019  Innovatus Technologies Pvt. Ltd. All rights reserved.</td>
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
?>