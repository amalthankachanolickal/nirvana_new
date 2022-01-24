<?php

require "FunctionCall.php";
error_reporting(1);

if($_REQUEST['ActionCall'] == "AddGroceryItemNew") {
$product_file_name = '';
$process_file_name = '';
if($_FILES['process']['name']!='')

{

$process_file_name = uniqid().clean($_FILES['process']['name']);

if(move_uploaded_file($_FILES['process']['tmp_name'],'../documents/grocery/'.$process_file_name)){}

}

if($_FILES['product']['name']!='')

{

$product_file_name = uniqid().clean($_FILES['product']['name']);

if(move_uploaded_file($_FILES['product']['tmp_name'],'../documents/grocery/'.$product_file_name)){}

}

$dataU = array(
  "tied_up_by" => isset($_REQUEST['tied_up_by']) ? $_REQUEST['tied_up_by'] : '',
  "store" => isset($_REQUEST['store']) ? $_REQUEST['store'] : '',
  "whatsapp" => isset($_REQUEST['whatsapp']) ? $_REQUEST['whatsapp'] : '',
  "mobile" => isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] : '',
  "min_order" => isset($_REQUEST['min_order']) ? $_REQUEST['min_order'] : '',
  "delivery_charge" => isset($_REQUEST['delivery_charge']) ? $_REQUEST['delivery_charge'] : '',

  "product_price_list" => $product_file_name,

  "delivery_time" => isset($_REQUEST['delivery_time']) ? $_REQUEST['delivery_time'] : '',
  "process" => $process_file_name,
  "website" => isset($_REQUEST['website']) ? $_REQUEST['website'] :''
);

$resultU = $ModelCall->insert('tbl_grocery_mgmt',$dataU);
if ($resultU) {
header("location:".DOMAIN.AdminDirectory."grocery_management.php?actionResult=documentsuccess");
} else {
	header("Location: ".DOMAIN.AdminDirectory."grocery_management.php");
}

}
else if($_REQUEST['eid']!='' && $_REQUEST['ActionCall']=='DeleteGroceryItem') {
$ModelCall->where ("id", $_REQUEST['eid']);

$result =  $ModelCall->delete('tbl_grocery_mgmt');

header("location:".DOMAIN.AdminDirectory."grocery_management.php?actionResult=dsuccess");

} else {

header("location:".DOMAIN.AdminDirectory."grocery_management.php?actionResult=viruserror");

}