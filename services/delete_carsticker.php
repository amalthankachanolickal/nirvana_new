<?php 
include('../model/class.expert.php');


if( $_REQUEST["stickerid"] ){
   $stickerid = $_REQUEST['stickerid'];
   $ModelCall->where("stickerid", $stickerid);
   $tableData = array("stickerid"=>$stickerid, "status"=>-1);
    $updateCarsInfo = $ModelCall->update("tbl_car_details", $tableData, 1 );
    if($updateCarsInfo==1){
    echo "1";
    }else echo "0";
}else{
    echo "No sticker is passed";
}

?>