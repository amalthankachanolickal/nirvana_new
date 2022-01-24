<?php 
include('../model/class.expert.php');
//echo "In service";
//print_r($_REQUEST);
//exit(0);

if( $_POST["page_url"] ){
    $page_url = $_POST['page_url'];
    $ip = $_POST['ip'];
    $clicked_ad = $_POST['clicked_ad'];
    $timeSpent = $_POST['timeSpent'];

    $dataAdd = array(
        
        'page_url' => $page_url,
        'action' => 'Click',
        'clicked_ad'=> $clicked_ad,
        'ip' => $ip, 
        'userid' => $_SESSION['UR_LOGINID'],
        'time_visited' => time(),
        'timeSpent'=>$timeSpent,
        'ads_seen'=>$_POST['ads_seen'],
    );
    // print_r($dataAdd);
    $rec= $ModelCall->insert("tbl_tracker",$dataAdd);
    if($rec){
        echo "1";
    }else echo "0";
 }else{
     echo "No  data is passed";
 }

?>