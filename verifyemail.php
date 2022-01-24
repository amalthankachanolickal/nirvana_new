<?php include('model/class.expert.php');
error_reporting(E_ALL);
include('controller/PHPMailer-master/PHPMailerAutoload.php');
include('RWAVendor/controller/custom_mailer_functions.php');?>

<?php 
if(($_REQUEST['num']!=''))
{
    echo $_REQUEST['num'];
$ModelCall->where("user_name",$_REQUEST['num']);
$ModelCall->where("email_verify","0");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
print_r($rec);
if(count($rec)==1)
{ 
$dataq = array('email_verify' => '1');
$ModelCall->where ("user_id",trim($rec[0]['user_id']));
$result111111 =  $ModelCall->update ('Wo_Users', $dataq);
//admin_approval_pending_mail($rec[0]);
$ModelCall->where ("user_id",trim($rec[0]['user_id']));
$rec = $ModelCall->get("Wo_Users");

account_ready_to_use_mail($rec[0]);
header("location:".SITE_URL."login_signup.php?actionResult=regemailverifysuccess");
}
else 
{
header("location:".SITE_URL."login_signup.php?actionResult=regemailverifyerror");
}
}
?>