<?php include('model/class.expert.php');?>
<?php 
session_start();
unset($_SESSION['UR_LOGINID']);
unset($_SESSION['UR_LOGINNAME']);
unset($_SESSION['user_id']);
unset($_SESSION['user_type']);
//unset($_SESSION['hash_id']);
header('location:'.SITE_URL);
?>