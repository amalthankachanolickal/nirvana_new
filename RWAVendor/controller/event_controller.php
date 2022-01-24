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

if(($_REQUEST['ActionCall']=="AddUpdateEvent"))
{
   
if(($_REQUEST['event_name']!='') && ($_REQUEST['event_date']!='') && ($_REQUEST['event_location']!='') && ($_REQUEST['event_time']!=''))
{
   // echo 'me';
/*if($_FILES['event_pic']['name']!='')
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
}*/

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
//	'event_pic' => $banner_imageData,
	'event_poster' => $banner_imageData1,
	'sending_invitation_to' => $_REQUEST['sending_invitation_to'],
	'sending_invitation_date' => $_REQUEST['sending_invitation_date'],
	'type_of_event' => $_REQUEST['type_of_event'],
/*	'no_of_tickets' => $_REQUEST['no_of_tickets'],
	'price_of_ticket' => $_REQUEST['price_of_ticket'],*/
	'email_sent' => '0',
	'status' => '0',
	'created_ip' => $ModelCall->getRealIpAddr(),
	'created_date' => $ModelCall->get_today_date());
if($_REQUEST['eid']=="")
{	
$resultU = $ModelCall->insert('tbl_events',$dataU);

$ModelCall->orderBy("id","desc");
$getEventInfo = $ModelCall->get("tbl_events");
$sold_admiin=0;
if(isset($_REQUEST['sold0'])){
    $sold_admiin=$_REQUEST['sold0'];
}
if($getEventInfo[0]['event_name']==$_REQUEST['event_name']){
     $dataUin = array(
'eid'=>$getEventInfo[0]['id'],
 
'offer_date'=>$_REQUEST['offerenddate0'],
'total_tickets'=>$_REQUEST['ttickets0'],
'sold_by_admin'=>$sold_admiin,
'lastdate'=>$_REQUEST['lastdate0'],
'otl'=>$_REQUEST['otl0'],
'show_available'=>$_REQUEST['sh_av_tc'],
'show_sold'=>$_REQUEST['sh_sl_tc'],
'available_tickets'=>$_REQUEST['ttickets0']-$_REQUEST['sold0']
);
// echo "\n";
// echo $dataUin;
// echo "\n";
$resultU = $ModelCall->insert('tbl_event_ticket_inventory',$dataUin);
$i++;
 
    
}





$i=0;
// echo $getEventInfo[0]['event_name'];
// echo "next";
// echo $_REQUEST['event_name'];
if($getEventInfo[0]['event_name']==$_REQUEST['event_name']){
while($_REQUEST['name_c'.$i]){
    $dataU1 = array(
'eid'=>$getEventInfo[0]['id'],
'section'=>$_REQUEST['name_c'.$i],
'content'=>$_REQUEST['content'.$i]

);
//echo $dataU;
$resultU = $ModelCall->insert('tbl_event_sections',$dataU1);
$i++;
}
$i=0;

$i=0;
//print_r($_REQUEST);
while($_REQUEST['name'.$i]){
    $dataU2 = array(
'eid'=>$getEventInfo[0]['id'],
'price'=>$_REQUEST['price'.$i],
'discounted_price'=>$_REQUEST['oprice'.$i],
'category'=>$_REQUEST['name'.$i],
'pinventory'=>isset($_REQUEST['pinventory'.$i])?1:0,
//'sold_by_admin'=>$_REQUEST['sold'.$i],

);
//print_r($dataU2);
$resultU = $ModelCall->insert('tbl_events_tickets',$dataU2);
//echo $i;
$i++;
}

$i=1;


  while($_FILES['event_picr'.$i]['name']){
      if($_FILES['event_picr'.$i]['name']!='')
  {
  $banner_imageData=uniqid().clean($_FILES['event_picr'.$i]['name']);
  if(move_uploaded_file($_FILES['event_picr'.$i]['tmp_name'],'../events/photo/'.$banner_imageData)){
      $dataU3 = array(
  'eid'=>$getEventInfo[0]['id'],
  'image'=>$banner_imageData
  );
  //echo $dataU3;
  $resultU = $ModelCall->insert('tbl_event_photo',$dataU3);
  $i++;
  }

      
  }
    
}
$i=0;

}
}
else
{
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update ('tbl_events', $dataU);
//echo "me";
$sold_admiin=0;
if(isset($_REQUEST['sold0'])){
    $sold_admiin=$_REQUEST['sold0'];
}
     $dataUin = array(

 
'offer_date'=>$_REQUEST['offerenddate0'],
'total_tickets'=>$_REQUEST['ttickets0'],
'sold_by_admin'=>$sold_admiin,
'otl'=>$_REQUEST['otl0'],
'lastdate'=>$_REQUEST['lastdate0'],
'show_available'=>$_REQUEST['sh_av_tc'],
'show_sold'=>$_REQUEST['sh_sl_tc'],
'available_tickets'=>$_REQUEST['ttickets0']-$_REQUEST['sold0']
);
//echo $dataUin;
$ModelCall->where ("eid", $_REQUEST['eid']);
$resultU = $ModelCall->update('tbl_event_ticket_inventory',$dataUin);




$ModelCall->where ("eid", $_REQUEST['eid']);
$sections =  $ModelCall->get('tbl_event_sections');
//print_r($sections);
foreach($sections as $section){
   if(isset($_REQUEST['row_section'.$section['id']])){
   //print_r($_REQUEST['row_section'.$section['id']]);
   if(isset($_REQUEST['namec'.$_REQUEST['row_section'.$section['id']]])){
    $dataU1 = array(

'section'=>$_REQUEST['namec'.$_REQUEST['row_section'.$section['id']]],
'content'=>$_REQUEST['content'.$_REQUEST['row_section'.$section['id']]]

);
// echo "<br>";
// echo $section['id'];
// print_r($dataU1);
// echo "br";
$ModelCall->where ("id", $section['id']);
$resultU = $ModelCall->update('tbl_event_sections',$dataU1);

}
   }
}
$ModelCall->where ("eid", $_REQUEST['eid']);
$tickets =  $ModelCall->get('tbl_events_tickets');
//print_r($tickets);
foreach($tickets as $ticket){
   if(isset($_REQUEST['row_ticket'.$ticket['id']])){
 //print_r($_REQUEST['row_ticket'.$ticket['id']]);
   if(isset($_REQUEST['name'.$_REQUEST['row_ticket'.$ticket['id']]])){
    $dataU2 = array(

'price'=>$_REQUEST['price'.$_REQUEST['row_ticket'.$ticket['id']]],
'discounted_price'=>$_REQUEST['oprice'.$_REQUEST['row_ticket'.$ticket['id']]],
'category'=>$_REQUEST['name'.$_REQUEST['row_ticket'.$ticket['id']]],
'pinventory'=>isset($_REQUEST['pinventory'.$_REQUEST['row_ticket'.$ticket['id']]])?1:0

);
$ModelCall->where ("id", $ticket['id']);
// echo $ticket['id'];
// print_r($dataU2);
$resultU = $ModelCall->update('tbl_events_tickets',$dataU2);

}
   }
}

header("location:".DOMAIN.AdminDirectory."event_management.php?actionResult=flashsuccess");
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

?>