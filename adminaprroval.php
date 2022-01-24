<?php include('model/class.expert.php');

include('controller/PHPMailer-master/PHPMailerAutoload.php');
include('RWAVendor/controller/custom_mailer_functions.php');
?>
<?php 
if(($_REQUEST['num']!=''))
{
$ModelCall->where("user_number",$_REQUEST['num']);
//$ModelCall->where("website_status ='0'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
if($ModelCall->count==1)
{ 
$dataq = array('admin_approval' => '1');
$ModelCall->where ("user_id",trim($rec[0]['user_id']));
$result111111 =  $ModelCall->update ('Wo_Users', $dataq);
email_varify_mail($rec[0]);
account_ready_to_use_mail($rec[0]);
header("location:".SITE_URL."account/login/adminapprovesuccess/");
}
else 
{
header("location:".SITE_URL."account/login/regemailverifyerror/");
}
}
?>