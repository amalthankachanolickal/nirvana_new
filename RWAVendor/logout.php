<?php include('model/class.expert.php');?>
<?php 
session_start();
unset($_SESSION['ADMIN_LOGINID']);
header('location:'.DOMAIN.AdminDirectory.'login.php');
?>