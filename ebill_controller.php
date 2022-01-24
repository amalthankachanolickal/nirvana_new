<?php include('model/class.expert.php');

include('controller/PHPMailer-master/PHPMailerAutoload.php');
//include('RWAVendor/controller/custom_mailer_functions.php');?>
<?php 


$dataq = array('user_id' => $_SESSION['UR_LOGINID'],
'value'=>'1',
'date'=> date("Y-m-d"));

$result111111 =  $ModelCall->insert ('tbl_ebill_subscription', $dataq);

header("location:".SITE_URL."bills.php");


?>