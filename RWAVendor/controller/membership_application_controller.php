<?php
require "../model/class.expert.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");

function getBlockId($block) {
  $b = '';
  if ($block == "AG") {
    $b = "1";
  } else if ($block_id == "BC") {
    $b = "2";
  } else if ($block_id == "CC") {
    $b = "3";
  } else if ($block_id == "DW") {
    $b = "4";
  } else if ($block_id == "ES") {
    $b = "5";
  }

  return $b;
}

function getHouseNumber($house) {
	$house = intval($house);
	return strval($house);
}

$actionCall = $_POST['actionCall'];

if($actionCall=='ChangeStatus'){
    $data = array();
    $ModelCall->where("serialno", $_POST['eid']);
    $rec= $ModelCall->get("Wo_Membership");
    
    $data['serialno'] = $_POST['eid'];
    $data['approved_status'] = $_POST['approved_status'];
    $data['comments'] = $rec[0]['comments'].  "Comment: ". $_POST['comment']."- Added by Admin on ".date('Y-m-d H:i:s')."<br>";
    $data['approved_by'] = $_POST['approved_by'];
    
    if( $_POST['approved_status'] == 'Admin Approved'){
    $data['approve_date'] = date('Y-m-d H:i:s');
    } 
     if( $_POST['approved_status'] == 'EC Approved'){
     $data['ec_approve_date'] = date('Y-m-d H:i:s');
     $data['approved_onbehalf'] =$_POST['approved_onbehalf'];
     $data['approved_designation'] = $_POST['approved_designation'];
    } 
    
    $ModelCall->where("serialno", $_POST['eid']);
   $result= $ModelCall->update("Wo_Membership", $data);
    if($result){
        if($data['approved_status'] == 'Admin Approved'){
           mailToUserOnApproved($rec[0],  $_POST, base64_encode($rec[0]['id']));
           sendMailEC($rec[0],base64_encode($rec[0]['id']));
        } elseif($data['approved_status'] == 'Sent for Correction'){
           mailToUserForCorrection($rec[0],  $_POST, base64_encode($rec[0]['id']));
        } elseif($data['approved_status'] == 'EC Approved'){
           mailToUserOnApprovedEC($rec[0],  $_POST, base64_encode($rec[0]['id']));
        }
        else{
            mailToUser($rec[0], $_POST, base64_encode($rec[0]['id']));
        }
      header("Location: ../membership_application_status.php?actionResult=updatesuccess");
    }else{
       header("Location: ../membership_application_status.php?actionResult=updatesuccess");
    }
    exit(0);
}


if($actionCall=='AddMembershipNo'){
    $data = array();
    $ModelCall->where("serialno", $_POST['eid']);
    $rec= $ModelCall->get("Wo_Membership");
    
    $data['app_membership_no'] = $_POST['app_membership_no'];
    $data['approved_by'] = $_POST['approved_by'];
    $data['approved_status'] = "ICard Issued";
    
    $ModelCall->where("serialno", $_POST['eid']);
   $result= $ModelCall->update("Wo_Membership", $data);
    if($result){
    
            mailToUserOnICard($rec[0], $_POST, $rec[0]['id']);
      
      header("Location: ../membership_application_status.php?actionResult=updatesuccess");
    }else{
       header("Location: ../membership_application_status.php?actionResult=updatesuccess");
    }
    exit(0);
}



// mailToUser($user_data[0], $data);

// header("Location: ../documents_approval.php?actionResult=updatesuccess");

function mailToUser($user_details, $form_details, $url) {
  //$to ='techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com';
   $to = $user_details['emailid_1'];
  $subject = 'Status Update : Membership Form';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
     'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
    $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership Application (# '.$user_details['serialno'].') has been '.$form_details['approved_status'].',  with the following comments -<br>
  '.$form_details['comment'].'.</p>';
  
    $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
    You can visit <a href="'.SITE_URL.'membership.php">Nirvana Online</a> to resubmit the same with the changes.</p>';
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}


function mailToUserOnApproved($user_details, $form_details, $url) {
 // $to ='techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com';
  $to = $user_details['emailid_1'];
  $subject = 'NRWA Membership Approved';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership Application has been been reviewed by the Office & sent to the NRWA President/ Secretary for their approval.</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  You may visit <a href="'.SITE_URL.'membership.php">NRWA Online</a> to view your application, or check its current status. We also keep intimated of its progress via email.</p>';
  
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}

function mailToUserForCorrection($user_details, $form_details, $url) {
 // $to ='techlead@myrwa.online,marketing@myrwa.online,kushalbhasin@gmail.com';
   $to = $user_details['emailid_1'];
  $subject = 'Status Update : Membership Form';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership Application (# '.$user_details['serialno'].') has been returned for correction at your end,  with the following comments -<br>
  '.$form_details['comment'].'.</p>';
  
    $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">You can visit <a href="'.SITE_URL.'membership.php">Nirvana Online</a> to resubmit the same with the changes.</p>';
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}



function sendMailEC($details, $url) {
    $to ='office.nrwa@nirvanacountry.co.in,celine.geo@gmail.com,vardadw73@gmail.com';
   $subject = 'NRWA Application Pending your Approval';
   $from = 'website.admin@nirvanacountry.co.in';

   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
   $headers .= 'From: '.$from."\r\n".
   'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
   'X-Mailer: PHP/' . phpversion();

   $message = '<html><body><table style="border-collapse:collapse"
width="800" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody><tr><td
style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px
18px 9px" valign="top">';

   $message .= '
   <p style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear
Sir/Madam,</p>';

  if($details['title_1']=='other'){
    $message .= '<p style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
    NRWA membership form has been submitted by
'.$details['tenant_other_title'].'
'.ucfirst($details['tenant_first_name']).'
'.ucfirst($details['tenant_middle_name']).'
'.ucfirst($details['tenant_last_name']).' and has been approved by
Admin. Kindly review the application and grant your approval. <a
href="'.SITE_URL.'membership.php?fid='.$url.'&view-mode=E">click
here</a>. </p>';
    }else{
    $message .= '<p style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
     NRWA membership form has been submitted by '.$details['title_1'].'
'.ucfirst($details['tenant_first_name']).'
'.ucfirst($details['tenant_middle_name']).'
'.ucfirst($details['tenant_last_name']).'  and has been approved by
Admin. Kindly review the application and grant your approval.  <a
href="'.SITE_URL.'membership.php?fid='.$url.'&view-mode=E">click
here</a>. </p>';
    }

   $message .= '<p style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Also
find the attached documents for the same - </p>
   <ol type="1">';
   if($details['proof_of_identity']!=''){
    $message .= '<li style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Proof
of Identity - <a
href="'.SITE_URL.''.$details['proof_of_identity'].'">click
here</a></li>';
   }
    if($details['proof_of_address']!=''){
     $message .= '<li style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Proof
of Address - <a
href="'.SITE_URL.''.$details['proof_of_address'].'">click
here</a></li>';
    }
     if($details['proof_of_dob']!=''){
   $message .= '<li style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Proof
Of Date Of Birth - <a
href="'.SITE_URL.''.$details['proof_of_dob'].'">click here</a></li>';
    }
  if($details['ownership_proof']!=''){
    $message .= '<li style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Ownership Proof
- <a href="'.SITE_URL.''.$details['ownership_proof'].'">click
here</a></li>';
     }
     if($details['photograph_user']!=''){
    $message .= '<li style="margin:10px
0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Photograph
- <a href="'.SITE_URL.''.$details['photograph_user'].'">click
here</a></li>';
     }
   $message .= '</ol>
<br>
       <span style="text-align:center"> Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank"
data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a>
<br></span>
   ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
   $message .= '</body>
   </html>';

   mail($to, $subject, $message, $headers);
}


function mailToUserOnApprovedEC($user_details, $form_details, $url) {
     $to = $user_details['emailid_1'];
  //$to ='techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = 'NRWA Membership Approved';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership Application has been been approved NRWA President/ Secretary. The membership number will be allotted to you by NRWA Office soon. You will be intimated on the same.
  <br><br>You will be able to print the Membership Card or save as PDF from the link provided to you on mail.</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  You may visit <a href="'.SITE_URL.'membership.php">NRWA Online</a> to view your application, or check its current status. We also keep intimated of its progress via email. 
   </p>';
  
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}


function mailToUserOnICard($user_details, $form_details, $url) {
     $to = $user_details['emailid_1'];
//  $to ='techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = 'NRWA Membership ID Card Issued';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership # has been assigned by NRWA Office. Your Membership # is - '.$form_details['app_membership_no'].'
  </p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Kindly  may visit <a href="'.SITE_URL.'membership.php">NRWA Online</a> to view your application, or check its current status. You can <a href="'.SITE_URL.'print-icard.php?fid='.$url.'">click here</a>  to print your ICARD. 
  
  
   </p>';
  
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}


?>