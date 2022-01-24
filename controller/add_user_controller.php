<?php include("../model/class.expert.php");
//include("../RWAVendor/controller/custom_mailer_functions.php");
require('../mailin-lib/Mailin.php');
?>
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
function clean($string) {
  $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
  //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

include('PHPMailer-master/PHPMailerAutoload.php');

include('passwordHash.php');

 $data=array(
    'block_id'=>$_REQUEST['block_id'],
    'house_number_id'=>$_REQUEST['house_number_id'],
    'floor_num'=>$_REQUEST['floor_num'],
    'user_type'=>$_REQUEST['user_type'],
    'user_resident_type'=>$_REQUEST['user_resident_type'],
    'user_email'=>$_REQUEST['user_email'],
    'user_title'=>$_REQUEST['user_title'],
    'first_name'=>$_REQUEST['first_name'],
    'middle_name'=>$_REQUEST['middle_name'],
    'last_name'=>$_REQUEST['last_name'],
    'owner_id'=>$_SESSION['UR_LOGINID']
  );
  $ModelCall->insert('tbl_new_user_added',$data);
  $rec2 = $ModelCall->rawQuery("select * from tbl_new_user_added order by id desc limit 1");
  print_r($rec2);
$id=$rec2[0]['id'];
     
    send_email_user_info($data,$id);


  header("location:".SITE_URL);
  
  function send_email_user_info($rec,$id){
  print_r($rec);
    
    
 //   ////print_r($dataArray);
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array($rec['user_email']=>$rec['firstname']);
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Now you can pay your CAM Bills online",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
            </tr>
            <tr>
              <td>
              <table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
<tr>
    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['user_title']."".$rec['first_name']." ".$rec['last_name'].",</strong> <span style='padding-bottom:4px;display:block'>Your owner has added your account </span></p>
                       
                        </td>
                    </tr>
   
                    <td style='padding:15px 15px 15px 55px'>
                    <a  href='http://therwa.in/signup_owner_aproved.php?id=".$id."' style='display:inline-block;padding:12px 20px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff;background:#0badf2' target='_blank' >Create account </a> </td>
                    </tr>
            
              
                    <tr>
                      <td align='left' valign='middle' style='padding:15px 15px 15px 55px'>Warm Regards,<br>NRWA Office
                      <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                      <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
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
