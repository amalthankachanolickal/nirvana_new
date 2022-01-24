<?php 
error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");

///////////////////////////// Edit Car Stcker Status  ////////////////////////////////////////////////////////////
if(($_REQUEST['stickerid']!='') && ($_REQUEST['ActionCall']=='carStickerForm'))
{
$data = array('status' => $_REQUEST['status']);
$ModelCall->where("user_id", $_REQUEST['user_id']);
$rec = $ModelCall->get("Wo_Users");
//print_r($rec);
$ModelCall->where ("stickerid", $_REQUEST['stickerid']);
$result =  $ModelCall->update ('tbl_car_details', $data);
send_car_sticker_approved($rec);
header("location:".DOMAIN.AdminDirectory."car_stickers_management.php?actionResult=asuccess");
}
////////////////////////////////////////////////////////////////////////////////////////////////////
if(($_REQUEST['stickerid']!='') && ($_REQUEST['ActionCall']=='addCarSticker'))
{
$data = array('sticker_number' => $_REQUEST['sticker_number']);
$ModelCall->where ("stickerid", $_REQUEST['stickerid']);
$result =  $ModelCall->update ('tbl_car_details', $data);
header("location:".DOMAIN.AdminDirectory."car_stickers_management.php?actionResult=carstickersussess");
}
?>