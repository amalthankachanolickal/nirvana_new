<?php

include("../model/class.expert.php"); 


if (($_REQUEST['ActionCall'] == 'AddCovidDocument')) {

	$data_to_insert = array(
		"title" => $_REQUEST['title'],
		"fname" => $_REQUEST['fname'],
		"lname" => $_REQUEST['lname'],
		"block" => $_REQUEST['block'],
		"house" => $_REQUEST['house'],
		"floor" => $_REQUEST['floor'],
		"category" => $_REQUEST['cat'],
		"subcategory" => $_REQUEST['sub-cat'],
		"mobile_primary" => $_REQUEST['mobile_1'],
		"mobile_secondary" => $_REQUEST['mobile_2'],
		"email" => $_REQUEST['email']
	);

	$ModelCall->insert("tbl_doctor_list", $data_to_insert);
	header("Location: ../doctors_management.php?actionResult=doctoraddsuccess");
} else if ($_REQUEST['ActionCall'] == "EditDoctor") {
	$data_to_update = array(
		"title" => $_REQUEST['title'],
		"fname" => $_REQUEST['fname'],
		"lname" => $_REQUEST['lname'],
		"block" => $_REQUEST['block'],
		"house" => $_REQUEST['house'],
		"floor" => $_REQUEST['floor'],
		"category" => $_REQUEST['cat'],
		"subcategory" => $_REQUEST['sub-cat'],
		"mobile_primary" => $_REQUEST['mobile_1'],
		"mobile_secondary" => $_REQUEST['mobile_2'],
		"email" => $_REQUEST['email']
	);

	$ModelCall->where("id", $_REQUEST['id']);
	$ModelCall->update("tbl_doctor_list", $data_to_update);
	header("Location: ../doctors_management.php?actionResult=doctorupsuccess");
} else if ($_REQUEST['ActionCall'] == "deletedoctor") {
	$ModelCall->where("id", $_REQUEST['id']);
	$ModelCall->delete("tbl_doctor_list");
	header("Location: ../doctors_management.php?actionResult=dsuccess");
}
?>