<?php
require "../model/class.expert.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$s_no = $_POST['eid'];
$block = $_POST['block'];
$houseno = $_POST['house'];

$update_status = array();
$data=array();



$ModelCall->where("block_id", $block);
$ModelCall->where("house_number_id", $houseno);
$rec = $ModelCall->get("Wo_Users");

$user_id = count($rec > 0) ? $rec[0]['user_id'] : "";


$rel_path = "../../membership_documents_uploads/";
$root_dir = "";

if(isset($_FILES['Owner1Id1'])){
$target_rel_file = $rel_path . $houseno.'Owner1Id1'.basename($_FILES["Owner1Id1"]["name"]);
$target_file= $root_dir . $target_rel_file;

$temp_file=$_FILES["Owner1Id1"]["name"];
move_uploaded_file($_FILES["Owner1Id1"]["tmp_name"], $target_file);
$Owner1Id1 = $target_rel_file;
$data['Owner1Id1'] = $Owner1Id1 ?? "";
$update_status['1st_Owner_1st_ID_Proof'] = 'Yes';
}else{
    $Owner1Id1='';  
}

if(isset($_FILES['Owner1Id2'])){
    $target_rel_file = $rel_path . $houseno.'Owner1Id2'.basename($_FILES["Owner1Id2"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["Owner1Id2"]["name"];
    move_uploaded_file($_FILES["Owner1Id2"]["tmp_name"], $target_file);
    $Owner1Id2 = $target_rel_file;
	$data['Owner1Id2'] = $Owner1Id2 ?? "";    
	$update_status['1st_Owner_2nd_ID_Proof'] = 'Yes';
}else{
    $Owner1Id2='';  
}

if(isset($_FILES['Owner2Id1'])){
    $target_rel_file = $rel_path . $houseno.'Owner2Id1'.basename($_FILES["Owner2Id1"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["Owner2Id1"]["name"];
    move_uploaded_file($_FILES["Owner2Id1"]["tmp_name"], $target_file);
    $Owner2Id1 = $target_rel_file;
	$data['Owner2Id1'] = $Owner2Id1 ?? "";    
	$update_status['2nd_Owner_1st_ID_Proof'] = 'Yes';
}else{
    $Owner2Id1='';  
}


if(isset($_FILES['Owner2Id2'])){
    $target_rel_file = $rel_path . $houseno.'Owner2Id2'.basename($_FILES["Owner2Id2"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["Owner2Id2"]["name"];
    move_uploaded_file($_FILES["Owner2Id2"]["tmp_name"], $target_file);
    $Owner2Id2 = $target_rel_file;
	$data['Owner2Id2'] = $Owner2Id2 ?? "";  
	$update_status['2nd_Owner2nd_ID_Proof'] = 'Yes';  
	echo "yes";
}else{
    $Owner2Id2='';  
}


if(isset($_FILES['ConveyanceDeed'])){
    $target_rel_file = $rel_path . $houseno.'ConveyanceDeed'.basename($_FILES["ConveyanceDeed"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["ConveyanceDeed"]["name"];
    move_uploaded_file($_FILES["ConveyanceDeed"]["tmp_name"], $target_file);
    $ConveyanceDeed = $target_rel_file;
	$data['ConveyanceDeed'] = $ConveyanceDeed ?? "";  
	$update_status['Conveyance_Deed'] = 'Yes';  
}else{
    $ConveyanceDeed='';  
}


$data['houseno'] = $block . '-'. $houseno;
$data['user_id'] = $user_id;

$res = $ModelCall->insert('rwa_membership_documents',$data);

$ModelCall->where("s_no", $s_no);
$ModelCall->update("rwa_membership_status", $update_status);
header("location: ../rwa_membership.php?actionResult=updatesuccess");
exit;

?>