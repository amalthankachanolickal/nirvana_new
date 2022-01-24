<?php 
  function send_email_user_info($rec,$id){
 
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
      $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
      "bcc" => $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
         "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Your Account Info: Nirvana Country.",
       "html" => " <table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody><tr>
                    <td style='padding:15px 15px 15px 55px'>
                    <a  href='".SITE_URL."user_profile_added.php?id=".$id."' style=' display:inline-block;padding:12px 10px 100px;margin-left:150px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff; border-radius: 20px; background:#0badf2' target='_blank' align='center' >Pay Now</a>
                   </td>
                   </tr>
              
                    <tr>
                      <td align='left' valign='middle' style='padding:15px 15px 15px 55px'>Warm Regards,<br>Website Admin
                      <br><a  href='mailto:website.admin@nirvanacountry.co.in'>website.admin@nirvanacountry.co.in</a>
                      <br><a  href='".SITE_URL."'>www.nirvanacountry.co.in</a></td>
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
                  </tbody>
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
</table>"
        
        
    );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);
   //   var_dump($var);  
   
  //  ////echo "</pre>";
}

function send_email_billing($rec){
    
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
      $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
            "bcc" =>$bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
       "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Now you can pay your CAM Bills online",
       "html" => "Dear ".$rec['user_title']." ".$rec['first_name']." ".$rec['last_name'].", 
        <br /> <br />
        Thank your for your payment of Rs.".$dataArray['amount']."
        towards your CAM Bill Dated ".$dataArray['bill_date']." Your Balance Amount Due is Rs ".$dataArray['total_outstanding']." /-
        <br /> <br />
         
        <br /> <br />
        Warn Regards,
        <br />
        Website Admin"
        
        
    );
    // echo"<pre>";
    // print_r($toArray);

    print_r($mailin->send_email($data));
    echo "</pre>";
}


function user_info_mail($rec){
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
     $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
    "bcc" =>  $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
         "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Account Info - Nirvana Country",
       "html" =>"<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ></a></td>
                    </tr>
                    <tr>
    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Congratulations for being enrolled and approved for access to your Nirvana online platform.  Please find the login information details herebelow. </span></p>
                        
                    </tr>
					 <tr>
                      <td><table style='border: 1px solid #efeeee;margin: 25px;box-shadow: 0 0 4px 0 #efeeee;padding: 12px 18px 18px 18px;background:#fff;width: 90%;' >
  <tr>
    <td height='29'><strong>Login ID :</strong> </td>
    <td>".$rec['user_name']."</td>
  </tr>
  <tr>
    <td><strong>Password :</strong></td>
    <td>".$rec['password']."</td>
  </tr>
</table></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".SITE_URL."login_signup.php/' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Login your account</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>,<br>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'><br>
                        Please click here to see the benefits of your webportal https://www.nirvanacountry.co.in/files_download.php?meid=Processes</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'><br>
                       >
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>In case you need any further assistance,<br>
                        please contact us at <a href='mailto:website.admin@nirvanacountry.co.in' target='_blank'>website.admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        Website Admin</td>
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
</table>"
   
      );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);

}

function email_varify_mail($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
      $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
    "bcc" =>$bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
      "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Email Verification Mail",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                  
                    <tr>
    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['user_title']."".$rec['first_name']." ".$rec['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registering online. Please click the link below to verify your email.  !</span></p>
                        <p>We also need to verify the information with the membership records and your account is pending approval for the same. Due to the initial set up, the process may take us a few days.</p>
                        <p>We will intimate you of the same by email, once the account is approved, latest within 2 weeks. Once verified, you can start using all of Nirvana online's features to access forms, documents and contacts for your NRWA online.</p>
                        </p></p>
                        <p><strong>Thank you for your patience.</strong></p></td>
                    </tr>
                   
                    <tr>
                      <td align='center' valign='middle'><a  href='".SITE_URL."verifyemail.php?num=".$rec['user_name']."' style='display: inline-block; padding: 12px 20px; text-decoration: none; font-size: 14px; color: #fff; background: #37a000; border-radius: 5px' target='_blank' >Verify your email address</a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Button not working? Paste the following link into your browser: https://www.nirvanacountry.co.in/verifyemail.php?num=".$rec['user_name']."
<br>
                      You’re receiving this email because you were enrolled for a new NirvanaCountry account or added a new email address. If this wasn’t you, please ignore this email. If you require any further assistance,<br>
                        please contact us at <a href='mailto:website.admin@nirvanacountry.co.in' target='_blank'>website.admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                    
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>"   );
      
    

  $var= $mailin->send_email($data);   
   print_r($data);
     var_dump($var);  
   //  exit;

    
}


function email_to_admin($rec){
     switch ($rec['block_id']) {
          case 1:
              $block="AG";
              break;
          case 2:
              $block="BC";
              break;
          case 3:
              $block="CC";
              break;
          case 4:
              $block="DW";
              break;
          case 5:
              $block="ES";
              break;
        }   
      
        if($rec['floor_number']==1)
            {
                $floor="GF";
            }
            if($rec['floor_number']==2)
            {
                $floor="FF";
            }
            if($rec['floor_number']==3)
            {
                $floor="SF";
            }
            if($rec['floor_number']==4)
            {
                $floor="TF";
            }
             if($rec['floor_number']==5)
            {
                $floor="Fourth F";
            }
            
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    $toArray= array("office.nrwa@nirvavacountry.co.in"=>"NRWA Office");
    $data = array( "to" => $toArray,
     "bcc" => $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
        "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "New Account is created on Nirvana Country",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                   
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>
                     Hi,
                      <span style='padding-bottom:4px;display:block'>A New Registration has been done on the website. Kindly verify and approve the access on to the website. !</span></p>
                        <p>A New Account has been added : </p>
                      <p> Details as follows : <br>
                       User Name : ".$rec['user_name']."<br>
                       Name : ".$rec['first_name']. " ". $rec['last_name']. "<br>
                       Email : ".$rec['user_email']."<br>
                       Hosue No : ".$block. "-". $rec['house_number_id'].$floor. "<br>
                       <br>
                       <a href='".SITE_URL."RWAVendor/users_management.php'>click here</a> to review the same and process the same further. <br><br>
                       </td>
                      </tr>
                    
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                 
  </tbody>
</table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);

}

function custom_email($rec,$a){
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
      "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "New Mail from Nirvana Country",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                   
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear  ".$rec['user_title']." ".$rec['first_name']." ".$rec['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>
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
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        Website Admin
                        <br>
                        website.admin@nirvanacountry.co.in</td>
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
</table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);
    
}


function admin_approval_pending_mail($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
     $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
    "bcc"=> $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
       "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Admin Approval Pending",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
  
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['first_name'].",</strong>
                      <span style='padding-bottom:4px;display:block'>Thank you for registering online. Please click the link below to verify your email.  !</span></p>
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
                        please contact us at <a href='mailto:website.admin@nirvanacountry.co.in' target='_blank'>website.admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);
    
    
}


function account_ready_to_use_mail($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
    "bcc" =>  $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
        "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Your account is now ready to use.",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$getFullName.",</strong> <span style='padding-bottom:4px;display:block'>Thank you for registration !</span></p>
                        <p>Congratulations. Your account is now ready to use. Please <a  href='".SITE_URL."login_signup.php/' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >click here </a> to visit the website and access your account.</p>
                        
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
                        Website Admin</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);
}   


function user_info_update_mail($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
       "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "You have updated your User Profile",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                 
                    <tr>
                      <td><p> Dear ".$rec['user_title']."".$rec['first_name']." ".$rec['last_name'].",<br><span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
                        <p>You have updated your User Profile. Please login to check your new details..</p></td>
                    </tr>
                  
                    <tr>
                     <td align='left'>
                      You’re receiving this email because you were enrolled for a new NirvanaCountry account or added a new email address. If this wasn’t you, please ignore this email. If you require any further assistance,<br>
                        please contact us at <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);

  
}

function pass_reset_mail($rec){
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
                     "bcc" => $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
        "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Password Reset Mail.",
       "html" => "<table width='630' align='center' border='0' cellspacing='0' cellpadding='0'>
                     <tr>
                          <td colspan='3' align='left'>Dear ".$rec['user_title']."".$rec['first_name']." ".$rec['last_name'].",</td>
                          </tr><tr>
                         <td><p>Reset your password.<br><br>
                           This email has been sent in response to a request to have your password reset. If you requested a password reset, click the button below. </p></td>
                        </tr>
                       
                        <tr>
                          <td><table bgcolor='#77be53' align='center' cellpadding='0' cellspacing='0' style='font-family: Arial, sans-serif; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; height: 40px'>
                              <tr>
                                <td align='center' style='padding: 10px 20px; margin: 0; font-family: Arial,Helvetica,sans-serif; font-size: 16px; line-height: 1em'><a href='".SITE_URL."AccountResetPassword.php?uid=".session_id().session_id()."&userid=".base64_encode($rec['user_id'])."&verifycode=".$GetNewpassword."&utm_campaign=verify_user&utm_medium=email&utm_source=oridle&utm_content=html&uniqid=".$getSerialNumber."&account_email_verify=0' style='font-size: 14px; font-weight: bold; color: white; text-decoration: none; padding: 10px 0' target='_blank' rel='noreferrer'> Reset Password </a></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td colspan='3' height='40'></td>
                        </tr>
                        <tr>
                          <td   colspan='3' >If you didn't make this request, please ignore this email. If you have any questions or comments regarding the login process, please email us at <a href='mailto:admin@nirvanacountry.co.in' style='color: #0070bf; font-weight: normal' onclick='return rcmail.command('compose','website.admin@nirvanacountry.co.in',this)' rel='noreferrer'>admin@nirvanacountry.co.in</a>.</td>
                        </tr>
                      
                 <tr>
                      <td  colspan='3' >Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                 
                  <tr>
                    <td colspan='2' height='80'></td>
                  </tr>
                </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);

  
}

function username_reset_mail($rec){
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
     $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    $data = array( "to" => $toArray,
      "bcc" => $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
      "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Reset User Name Request",
       "html" => "<table width='630' align='center' border='0' cellspacing='0' cellpadding='0'>
                     <tr>
                          <td colspan='3' align='left'>Dear ".$rec['user_title']."".$rec['first_name']." ".$rec['last_name'].",</td>
                          </tr><tr>
                         <td><p>Reset your User Name.<br><br>
                              This email has been sent in response to a request to have your User Name reset. If you requested a User Name reset, click the button below.</p></td>
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
                          <td   colspan='3' >If you didn't make this request, please ignore this email. If you have any questions or comments regarding the login process, please email us at <a href='mailto:admin@nirvanacountry.co.in' style='color: #0070bf; font-weight: normal' onclick='return rcmail.command('compose','website.admin@nirvanacountry.co.in',this)' rel='noreferrer'>admin@nirvanacountry.co.in</a>.</td>
                        </tr>
                      
                 <tr>
                      <td  colspan='3' >Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                 
                  <tr>
                    <td colspan='2' height='80'></td>
                  </tr>
                </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);

  
}

function user_reset_mail($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
      $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
     "bcc" => $bccArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
      "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Reset User Mail Request",
       "html" =>"<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>
                        Dear ".$rec['user_title']." ".$getFullName1.",<br>
                      <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
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
                        Website Admin</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);
  
}


function send_car_sticker_approved($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
  //  $toArray= array($rec['email']=>$rec['first_name']);
    $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
         "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Car Stikcer Application.",
       "html" =>"<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
<tbody>

                <tr>
                  <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec[0]['user_title']." ".$getFullName1.",</strong> <span style='padding-bottom:4px;display:block'>User profile updated !</span></p>
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
                    Website Admin</td>
                </tr>
                
              </tbody>
            </table>"   );
      
    

   $var= $mailin->send_email($data);   
   print_r($data);


}

function send_advertisement_approved($rec){
  
   $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['email']=>$rec['first_name']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
         "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Your advertisement have been approved",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
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
                  <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$Client[0]['user_title']." ".$getFullInfo.",</strong> <span style='padding-bottom:4px;display:block'>Advertise Approved !</span></p>
                    <p> Your advertisement have been approved. The Ad details are verified  and here is the Link you can check your advertisement.</p>
                     </tr>
                
                <tr>
                  <td height='30' align='center' valign='middle'>&nbsp;</td>
                </tr>
                <tr>
                <td align='left' valign='middle' style='padding:0px 15px 0 55px'><td align='left' valign='middle' style='padding:0px 15px 0 55px'>
                You’re receiving this email because you have submitted your Advertisement at Nirvana Country website. If this wasn’t you, please ignore this email. If you require any further assistance,<br>
                  please contact us at <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in</a></td>
                 
                </tr>
                <tr>
                  <td align='left' valign='middle'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                    Website Admin</td>
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
</table>"   );
      
    

   $var= $mailin->send_email($data);   
  // print_r($data);


}
function send_email_owner_approval($rec,$recowner){
  print_r($rec);
    
    
 //   ////print_r($dataArray);
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($recowner['email']=>$recowner['first_name']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
        "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Tenants have registered under your House No, Need your Approval.",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    
                    <tr>
    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$recowner['user_title']."".$recowner['first_name']." ".$recowner['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>A new tanent account needs you verification</span></p>
                        <p>Name='".$rec['first_name'].' '.$rec['last_name']."'</p>
                        <p>Email='".$rec['email']."'</p>
                        </p></p>
                        </td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  href='".SITE_URL."verifyadmin.php?num=".$rec['user_name']."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Verify Tanent </a> </td>
                    </tr>
                    <tr>
                      <td height='30' align='center' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Button not working? Paste the following link into your browser: https://www.nirvanacountry.co.in/verifyemail.php?num=".$rec['user_name']."
<br>
                      You’re receiving this email because you were enrolled for a new NirvanaCountry account or added a new email address. If this wasn’t you, please ignore this email. If you require any further assistance,<br>
                        please contact us at <a href='mailto:admin@nirvanacountry.co.in' target='_blank'>admin@nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:0px 15px 0 55px'>Warm Regards,<br>
                        Website Admin</td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>"   );
      
    
      
    

   $var= $mailin->send_email($data);   
   print_r($data);
     var_dump($var);  
   
   
  //  ////echo "</pre>";
}



?>
