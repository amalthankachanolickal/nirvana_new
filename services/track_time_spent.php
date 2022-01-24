<?php 
include('../model/class.expert.php');
//echo "In service";
//print_r($_REQUEST);
//exit(0);

if( $_POST["timeSpent"] ){
    $page_url = $_POST['page_url'];
    $ip = $_POST['ip'];
    $timeSpent = $_POST['timeSpent'];
    $clicked_ad = $_POST['clicked_ad'];
    if($clicked_ad !=''){
        $action='Click';
    }else{
        $action='View';
    }
    $ModelCall->where("page_url", $page_url);
    $ModelCall->where("ip", $ip);
    $ModelCall->orderby("id", "desc");
    $rec=  $ModelCall->getOne("tbl_tracker");

    $tableData = array("timeSpent" => $_POST['timeSpent'],
    "ads_seen"=>$_POST['ads_seen'],
    'action' => $action,
    'clicked_ad'=>  $rec[0]['clicked_ad'].','. $clicked_ad,
    );

    $ModelCall->where("page_url", $page_url);
    $ModelCall->where("ip", $ip);
    $ModelCall->orderby("id", "desc");
    $updateInfo = $ModelCall->update("tbl_tracker", $tableData, 1 );
     if($updateInfo==1){
     echo "1";
     }else echo "0";
 }else{
     echo "No  data is passed";
 }

?>