<?php 
include('../model/class.expert.php');


if( $_REQUEST["stickerid"] ){
    $stickerid = $_REQUEST['stickerid'];
    $car_number = $_REQUEST['car_number'];
    $make_model = $_REQUEST['make_model'];
    $color = $_REQUEST['color'];
    $status = $_REQUEST['status'];
    
    $ModelCall->where("stickerid", $stickerid);
    $tableData = array("stickerid"=>$stickerid, "car_number"=>$car_number,"make_model"=>$make_model, "color"=>$color, "status"=>$status);
     $updateCarsInfo = $ModelCall->update("tbl_car_details", $tableData, 1 );
     if($updateCarsInfo==1){
     echo "1";
     }else echo "0";
 }else{
     echo "No sticker is passed";
 }

?>