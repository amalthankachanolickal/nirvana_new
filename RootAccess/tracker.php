<?php
$this_page = $_SERVER["PHP_SELF"];
$ip = $_SERVER["REMOTE_ADDR"];

$dataAdd = array(
	'userid' => $_SESSION['UR_LOGINID'],
	'page_url' => $this_page,
	'action' => 'View',
	'ip' => $ip, 
    'time_visited' => time()
);
// print_r($dataAdd);
$rec= $ModelCall->insert("tbl_tracker",$dataAdd);
?>