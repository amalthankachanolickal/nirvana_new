<?php 

error_reporting(1);
include("../model/class.expert.php"); 



if(($_REQUEST['ActionCall']=='UpdateCovidVaccineUser'))
{
    
    $data = array(
    /*'user_id' => $_POST["client_id"],*/
	'title' => $_POST["title"],
	'fname' => $_POST["fname"],
	'mname' => $_POST["mname"],
	'lname' => $_POST["lname"],
	'dob' => $_POST["dob"],
	"age" => $_POST["age"],
	"gender" => $_POST["gender"],/*
	"document_type" => $_POST["document_type"],
	"document_path" =>$filename,
	"document_number" => $_POST["document_no"],*/
	"isd" => $_POST["isd_1"],
	"mobile" => $_POST["mobile"],
	"email" => $_POST["email"],
	"house" => $_POST["house_number"],
	"block" => $_POST["block_prime"],
	"floor" => $_POST["floor_prime"],
	"city" => $_POST["city"],
	"pincode" => $_POST["pincode"],
	"address" => $_POST["address"],
	"status" => 1,
	/*"special_category" => $_POST["spcl_category"],*/
	/*"created_by" => $_SESSION['UR_LOGINID'],*/
	"updated_by" => $_SESSION['UR_LOGINID']);
$ModelCall->where ("id", $_REQUEST['eid']);
$result =  $ModelCall->update('covid_vaccine_form',$data);


header("location:".DOMAIN.AdminDirectory."covid_vaccine_list.php?actionResult=success");
}

if(($_REQUEST['ActionCall']=='AddCovidVaccineUser'))
{
    if($_POST["title"] == 'Mrs.'){
        $Gender = 'Female';
    }else if($_POST["title"] == 'Mr.'){
        $Gender = 'Male';
    }else if($_POST["title"] == 'Miss.'){
        $Gender = 'Female';
    }
    
    $Age = date_diff(date_create($_POST["dob"]), date_create('today'))->y;
  
    $data = array(
    'user_id' => $_POST["eid"],
	'title' => $_POST["title"],
	'fname' => $_POST["fname"],
	'mname' => $_POST["mname"],
	'lname' => $_POST["lname"],
	'dob' => $_POST["dob"],
	"age" => $Age,
	"gender" => $Gender,
	"created_by" => $_SESSION['UR_LOGINID']);
$result =  $ModelCall->insert('covidvaccine_fam',$data);


header("location:".DOMAIN.AdminDirectory."covid_list_family_details.php?user_id=".$_POST['eid']."&actionResult=success");
}


?>