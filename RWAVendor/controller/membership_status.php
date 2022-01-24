<?php
require "../model/class.expert.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$ModelCall->where("s_no", $_POST['eid']);
$up_data = $_POST;
unset($up_data['eid']);
$up_data['Member First Name'] = $up_data['Member_First_Name'];
$up_data['Member Middle Name'] = $up_data['Member_Middle_Name'];
$up_data['Member Last Name'] = $up_data['Member_Last_Name'];
unset($up_data['Member_First_Name']);
unset($up_data['Member_Middle_Name']);
unset($up_data['Member_Last_Name']);
$ModelCall->update("rwa_membership_status", $up_data);
header("Location: ../rwa_membership.php?actionResult=updatesuccess");
?>