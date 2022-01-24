<?php include("../model/class.expert1.php"); ?>
<?php
include('map_function_list.php');
include('PHPMailer-master/PHPMailerAutoload.php');
include('passwordHash.php');
if(($_REQUEST['Forgotpassword']=="ForgotPassword"))
{
        $EmailId = $_POST['forgot_email'];
        $ModelCall->where("client_email", $ModelCall->utf8_decode_all($_REQUEST['forgot_email']));
        $ModelCall->where("status",1);
        $ModelCall->orderBy("id","asc");
        $rec = $ModelCall->get("tbl_client_sub_account");
        if($ModelCall->count==1)
        { 
        $_SESSION['ADMIN_CLIENT_LOGINID']=$rec[0]['id'];
        $to=$EmailId;
        $msg= "Reset Password.";
        $subject="Reset Your Password-".DOMAIN;
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From:NRWA Office <office.nrwa@nirvanacountry.co.in>'."\r\n";
        $ms.="<html></body><div><div>Dear Sir,</div></br></br>";
        
        $ms.="<div style='padding-top:8px;'>You have received this mail, as you have requested to reset your password . <br><br> Please click The following link to reset your password.</div>
        <div style='padding-top:10px;'><a href='".DOMAIN.AdminDirectory."reset_password.php?email=".$EmailId."'>Click Here</a></div>
   
        </body></html>";
        mail($to,$subject,$ms,$headers);
        header("location:".DOMAIN.AdminDirectory."forgot_password.php?actionResult=Success");
        } else{
            
            header("location:".DOMAIN.AdminDirectory."forgot_password.php?actionResult=Failure");
             }

 
}
?>