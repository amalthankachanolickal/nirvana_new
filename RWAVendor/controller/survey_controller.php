<?php 

error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
 }

if(($_REQUEST['ActionCall']=="AddUpdateSurveyResultDocument"))
{
if(($_REQUEST['survey_id']!=''))
{
    $ModelCall->where("id",$_REQUEST['survey_id']);
    $recordSurvey=$ModelCall->get('tbl_survey');
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
// $origDate = $_REQUEST['upload_date'];
 
// $date = str_replace('/', '-', $origDate );
// $newDate = date("Y-m-d", strtotime($date));


$dataU = array(
    'survey_id' => $_REQUEST['survey_id'],
	'survey_name' => $recordSurvey[0]['survey_name'],
	'client_id' => $_REQUEST['client_id'],
	'document_file' => $banner_imageData,
	'document_file_name' => $_REQUEST['document_name'],
	'status' => '1',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'description'=>$_REQUEST['comment']);
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_survey_results',$dataU);
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_survey_results', $dataU);
}

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
    
foreach($rec as $ressend){
        
        
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$ToAddress = $ressend['email']; 
//$client_name=$rec1[0]['client_name'];// Add a recipient
$Subject = 'New Survey Result Document added || Requires your verification';
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
    
    
    
}


    header("location:".DOMAIN.AdminDirectory."survey_results_management.php?actionResult=documentsuccess");
    }
    else
    {
    header("location:".DOMAIN.AdminDirectory."survey_results_management.php?actionResult=viruserror");
    }
}

if(($_REQUEST['eid']!='') && ($_REQUEST['ActionCall']=='DeleteDocument'))
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->delete('tbl_survey_results');
header("location:".DOMAIN.AdminDirectory."survey_results_management.php?actionResult=dsuccess");
}


?>