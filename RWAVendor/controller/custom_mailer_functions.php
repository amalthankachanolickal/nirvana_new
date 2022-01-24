<?php 
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
include('Email_Configuration_files.php');




function send_email_billing($rec){
    
    
    echo"<pre>";
    print_r($rec);
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['user_email']=>$rec['firstname']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha","charanbajrang21@gmail.com"=>"Bajrang","kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Online Bill Payment Confirmation.",
        "html" => "Dear ".$rec['user_title']." ".$rec['first_name']." ".$rec['last_name'].", 
        <br /> <br />
        Thank your for your payment of Rs.".$dataArray['amount']."
        towards your CAM Bill Dated ".$dataArray['bill_date']." Your Balance Amount Due is Rs ".$dataArray['total_outstanding']." /-
        <br /> <br />
         
        <br /> <br />
        Warn Regards,
        <br />
        Nrwa Office"
        
        
    );
    echo"<pre>";
    print_r($toArray);

    print_r($mailin->send_email($data));
    echo "</pre>";
}


function user_info_mail($result){
    $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'New  Account Details from '.strip_tags(SITENAME).'!';
     
    $Body="<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Congratulations for being enrolled and approved for access to your Nirvana online platform.  Please find the login information details herebelow. </span></p>
                        
                    </tr>
					 <tr>
                      <td><table style='border: 1px solid #efeeee;margin: 25px;box-shadow: 0 0 4px 0 #efeeee;padding: 12px 18px 18px 18px;background:#fff;width: 90%;' >
  <tr>
    <td height='29'>Login ID : </td>
    <td>".$result['user_name']."</td>
  </tr>
  <tr>
    <td>Password :</td>
    <td>".$result['password']."</td>
  </tr>
</table></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."login_signup.php/' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Login your account</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you need any further assistance,<br>
                        please contact us at <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
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
   
    if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailerviagmail($ToAddress, $From, $FromName, $Subject, $message)) {
 if (!empty($error)) echo $error;
 } else {
 echo 'Mail Sent.';
 }
}
// echo $ToAddress;
// echo $From;

}

function email_varify_mail($result){

$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'Verify your Email- Nirvana Country.';
    
    $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff;font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify' >
                  <tbody>
                  
                    <tr>
    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$result['user_title']." ".$result['first_name']." ".$result['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registering online. Please click the link below to verify your email.</span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks. Once verified, you can start using all of Nirvana online's features to access forms, documents and contacts for your NRWA online.</p>
                        </p></p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."verifyemail.php?num=".$result['user_name']."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#37a000;border-radius:5px' target='_blank' >Verify your email address</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Button not working? Paste the following link into your browser: https://www.nirvanacountry.co.in/verifyemail.php?num=".$result['user_name']."
<br>
                      You're receiving this email because you were enrolled for a new NirvanaCountry account or added a new email address. If this wasn't you, please ignore this email. If you require any further assistance,<br>
                        please contact us at <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
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
    if($result['email_verify']==0){
        if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
        //echo 'Mail Sent.';
        } else {
         if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
         if (!empty($error)) echo $error;
         } else {
        //echo 'Mail Sent.';
         }
        }
    }   

    
}


function email_to_admin($result){
 $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName1 = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

$ToAddress =  'kushalbhasin@gmail.com';  
$Subject = 'A new account has been added';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff;font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify' >
                  <tbody>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi Kushal,</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                        <p>A new account has been added </p>
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

    if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}


}

function custom_email_new($result,$a, $datafiles){
     $toArray= array($result['email']=>$result['email']);
     if(isset($result['user_title']) &&  $result['first_name'] && $result['last_name']){
       $getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];
     }else{
        $getFullName = $result['first_name'];  
     }
     if(isset($a['selfrom']) && $a['selfrom']!=""){
         if($a['selfrom']=='ec.updates@nirvanacountry.co.in'){
              $fromArray=  array($a['selfrom'], "Nirvana EC Updates");
         }else if($a['selfrom']=='office.nrwa@nirvanacountry.co.in'){
              $fromArray= array($a['selfrom'], "Office NRWA"); 
         }else if($a['selfrom']=='accounts@nirvanacountry.co.in'){
              $fromArray=  array($a['selfrom'], "Accounts NRWA"); 
         }else if($a['selfrom']=='marketing@nirvanacountry.co.in'){
              $fromArray=  array($a['selfrom'], "Nirvana Marketing"); 
         }else{
            $fromArray=  array($a['selfrom'], "NRWA Updates");  
         }
        
     }else{
      $fromArray=  array("office.nrwa@nirvanacountry.co.in", "Office NRWA");
     }
     //print_r($fromArray);
    //  exit(0);
       $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
        if(count($datafiles)<1){
        $data = array( "to" => $toArray,
           // "cc" => array($a['selfrom']=>$a['selfrom']),
            "from" => $fromArray,
            "subject" =>  $a['subject'],
            "html" => $a['content'],
          );
         }else {
         $data = array( "to" => $toArray,
          //  "cc" => array($a['selfrom']=>$a['selfrom']),
            "from" =>$fromArray,
            "subject" =>  $a['subject'],
            "html" => $a['content'],
            "attachment" => $datafiles
          );    
        }
   // print_r($data);
//print_r($mailin->send_email($data));
  $mailin->send_email($data);
}

function custom_email($result,$a, $data){
    $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
  $Subject = $a['subject'];
    	
    
    $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                   
                    
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 10px 0 47px'>&nbsp; ".$a['content']."</td>
                    </tr>
                    
                  </tbody>
                </table>";

      if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}
    
    
}


function admin_approval_pending_mail($result){
  
    	$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'Email Verification Completed';
    
    $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff;font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify' >
                  <tbody>
                    
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registering online. Please click the link below to verify your email.  !</span></p>
                      <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                      <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks. Once verified, you can start using all of Nirvana online's features to access forms, documents and contacts for your NRWA online.</p>
                      </p></p>
                      <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>
                    </br>  You’re receiving this email because you were enrolled for a new NirvanaCountry account or added a new email address. If this wasn’t you, please ignore this email. If you require any further assistance,<br>
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
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>";

    
    
    if($result['admin_approval']==0){
        if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
    //echo 'Yippie, message send via Gmail';
        } else {
             if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
                 if (!empty($error)) echo $error;
             } else {
            echo 'Mail Sent.';
             }
        }
    }   
        
    
}


function account_ready_to_use_mail($result){
//   print_r($result);
//   exit(0);
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName =$result['user_title']." ".$result['first_name']." ".$result['last_name'];
$ToAddress =  $result['email'];  
$Subject = 'Welcome To Nirvana Country';
    
    $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff;font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify'>
                  <tbody>
                    
                    <tr>
                      <td>
                      <p>
                      Dear ".$getFullName.", <br><br> 
                      Thank you for registration !<br><br>
                       Congratulations! Your account is now ready to use. Please 
                     <a href='".DOMAIN."login_signup.php/' target='_blank' > click here </a> to visit the website and access your account.</p>
                            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify'>
                          Login Id&nbsp;&nbsp;&nbsp;&nbsp;: ". $result['user_name']."<br>
                          Password&nbsp;&nbsp;&nbsp;: ". $result['password']."
                          </p>
                    </tr>
                  
                    <tr>
                    <td>
                      You're receiving this email because you were enrolled for a new Nirvana Country account or added a new email address. If this wasn't you, please ignore this email. 
                      If you require any further assistance,please contact us at <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Warm Regards,<br>
                        NRWA Office<br>
                        <a href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>";
                // print_r($Body);
                // exit(0);
if($result['email_verify']==1 && $result['admin_approval']==1){
        if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
    //echo 'Yippie, message send via Gmail';
        } else {
         if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
             if (!empty($error)) echo $error;
             } else {
            //echo 'Yep, the message is send (after doing some hard work)';
             }
    }
}   


function user_info_update_mail($result){
  
    	$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName1 = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'Changes to your user profile';
$Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                  
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$getFullName1.",</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                        <pYou have updated your User Profile. Please login to check your new details..</p>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                 
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                     <td align='left' valign='middle' style='padding:0px 15px 0 55px'><td align='left' valign='middle' style='padding:0px 15px 0 55px'>
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
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>";

    if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}

  
}

function pass_reset_mail($result){
  
    	$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName1 = $result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
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
                          <td colspan='3' align='left'><p style='color: #404040; font-size: 16px; line-height: 20px; padding: 0; margin: 0'>Dear ".$result['user_title']." <strong>".$getFullName."</strong>,</td>
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
                          <td align='center'><p style='color: #777; font-size: 14px; line-height: 20px; padding: 0; margin: 0'> If you didn't make this request, please ignore this email. If you have any questions or comments regarding the login process, please email us at <a href='mailto:admin@nirvanacountry.co.in' style='color: #0070bf; font-weight: normal' onclick='return rcmail.command('compose','office.nrwa@nirvanacountry.co.in',this)' rel='noreferrer'>admin@nirvanacountry.co.in</a>. </p></td>
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
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
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
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}

  
}
function user_reset_mail($result){
  
    	$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName1 = $result['first_name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
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
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$result['user_title']." ".$getFullName1.",</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                        <pYou have updated your User Profile. Please login to check your new details..</p>
                        <p>In case you haven't requested for these changes then kindly change your password. </p>
                                         </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                 
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                    <td align='left' valign='middle' style='padding:0px 15px 0 55px'><td align='left' valign='middle' style='padding:0px 15px 0 55px'>
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
                
                </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
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
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}

  
}


function send_car_sticker_approved($result){
  
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName1 = $result[0]['first_name']." ".$result[0]['last_name'];
$ToAddress = 'nishthagupta@gmail.com';  
//$ToAddress =  $result['email'];  
$Subject = 'Your Car Stickers Details have been Approved.';
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
                  <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$result[0]['user_title']." ".$getFullName1.",</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                    <p> You car sticker application have been approved. The Car details are verified  and we will be issuing the your stickers in a weeks time.</p>
                     </tr>
                
                <tr>
                  <td height='30' align='center' valign='middle'>&nbsp;</td>
                </tr>
                <tr>
                <td align='left' valign='middle' style='padding:0px 15px 0 55px'><td align='left' valign='middle' style='padding:0px 15px 0 55px'>
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
                
              </tbody>
            </table></td>
        </tr>
        <tr>
          <td height='30'>&nbsp;</td>
        </tr>
        <tr>
          <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
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


}

function newspaper_bill_function($result,$amt,$name){
  echo "me";
$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
//$getFullName1 = $result[0]['first_name']." ".$result[0]['last_name'];
$ToAddress = $result;  
//$ToAddress =  $result['email'];  
$Subject = 'Newspaper bill pay online NRWA.';
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
                  <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$name.",</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                    <p> Thanks for enrolling for for Newspaper Bill Payment Online. You can now pay your Nov.  bill of Rs. ".$amt."/- online with zero Trxn charge on </p>
                    <p>https://www.nirvanacountry.co.in/user_news_paper_bill.php . *TnCsApply</p>
                     </tr>
                
                <tr>
                  <td height='30' align='center' valign='middle'>&nbsp;</td>
                </tr>
              
                <tr>
                  <td align='left' valign='middle'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                    NRWA Office</td>
                </tr>
                
              </tbody>
            </table></td>
        </tr>
        <tr>
          <td height='30'>&nbsp;</td>
        </tr>
        <tr>
          <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table></td>
</tr>
</tbody>
</table>";
echo ".e";
  if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
  echo 'Yippie, message send via Gmail';
  } else {
  if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
  if (!empty($error)) echo $error;
  } else {
  echo 'Yep, the message is send (after doing some hard work)';
  }
  }


}

}


?>
