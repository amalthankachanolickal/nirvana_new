<?php
include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');



header("location:".SITE_URL.MAINADMIN."documents/docs_cert.jfif");

?>


