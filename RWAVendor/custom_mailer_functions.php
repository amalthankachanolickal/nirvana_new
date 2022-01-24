<?php include("../model/class.expert.php");
include('Email_Configuration_files.php');
function user_info_mail($result){
    $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['first-name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'New Vender Account Login from '.strip_tags(SITENAME).'!';
     
    $Body="<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
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
    <td>".$result['user_name']."</td>
  </tr>
  <tr>
    <td><strong>Password :</strong></td>
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
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you face any issues,<br>
                        Please contact us at <a href='mailto:office.nrwa@gmail.com' target='_blank'>office.nrwa@gmail.com</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Regards,<br>
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
//echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
//echo 'Yep, the message is send (after doing some hard work)';
 }
}
    
}

function email_varify_mail($result){
  
    	$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['first-name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'Welcome! And confirm your email';
    
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
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$result['first_name']." ".$result['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registration !</span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."verifyemail.php?num=".$result['user_name']."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify your email address</a> </td>
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
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Regards,<br>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".DOMAIN."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".SITE_URL."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
if($result['email_verify']==0){
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
    
    
}
function custom_email($result,$a){
    $From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['first-name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
  $Subject = $a['subject'];
    	
    
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
                   
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear  ".$result['user_title']." ".$result['first_name']." ".$result['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 10px 0 47px'>&nbsp; ".$a['content']."</td>
                    </tr>
                    <tr>


</tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      
                      
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Regards,<br>
                        Nirvana Country
                        <br>
                        office.nrwa@nirvanacountry.co.in</td>
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
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>";

return $Body;
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
$getFullName = $result['first-name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'Email Varification Completed';
    
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
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Regards,<br>
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

    
    
if($result['admin_approval']==0){
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
    
    
}


function account_ready_to_use_mail($result){
  
    	$From = WEBSITESUPPORTEMAIL;
$FromName = strip_tags(SITENAME);
$getFullName = $result['first-name']." ".$result['last_name'];

$ToAddress =  $result['email'];  
$Subject = 'Welcome! And confirm your email';
    
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
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Hi ".$result['first_name']." ".$result['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registration !</span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".DOMAIN."verifyemail.php?num=".$result['user_name']."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify your email address</a> </td>
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
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Regards,<br>
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
                      <td align='center' style='padding:15px 0 0 0;border-top:1px solid #ccc'><a href='".DOMAIN."'  style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank'>Home</a> <a href='".SITE_URL."' style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' target='_blank' >Discussion</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/privacy-policy/' target='_blank'>Privacy</a> <a style='color:#4b4b4b;margin:0 10px;text-decoration:none;display:inline-block' href='".SITE_URL."cms/terms-of-service/' target='_blank'>Terms</a></td>
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
if($result['email_verify']==0){
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
    
    
}


?>