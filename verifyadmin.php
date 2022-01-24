<?php include('model/class.expert.php');

include('controller/PHPMailer-master/PHPMailerAutoload.php');
include('RWAVendor/controller/custom_mailer_functions.php');?>
<?php 
if(($_REQUEST['num']!=''))
{
$ModelCall->where("user_name",$_REQUEST['num']);
//$ModelCall->where("website_status ='0'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");
//print_r($rec);
if($ModelCall->count==1)
{ 
$dataq = array('admin_approval' => $_REQUEST['id'],
'owner_approved' => $_REQUEST['id']);
$ModelCall->where ("user_id",trim($rec[0]['user_id']));
$result111111 =  $ModelCall->update ('Wo_Users', $dataq);

if($rec[0]['email_verify']){
//email_varify_mail($rec[0]);
}else{
account_ready_to_use_mail($rec[0]);
}
$_SESSION['message']='Tenant Approved';
header("location:".SITE_URL."housedetails.php");
}
else 
{
 $_SESSION['message']='Tenant Not Approved, Please try again.';
header("location:".SITE_URL."housedetails.php");
}
}
?>