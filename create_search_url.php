<?php
include('model/class.expert.php');
if($_REQUEST['service_state_id']!='' || $_REQUEST['service_city_id']!='')
{
$_SESSION['service_state_id'] = $_REQUEST['service_state_id'];
$_SESSION['service_city_id'] = $_REQUEST['service_city_id'];

if($_SESSION['catgeory_id']!='')
{
$ModelCall->where("id", $_REQUEST['service_city_id']);
$ModelCall->orderBy("name","asc");
$getCity = $ModelCall->get("cities");

$ModelCall->where("id", $_SESSION['catgeory_id']);
$ModelCall->where("status", 1);
$ModelCall->orderBy("category_name","asc");
$GetCategoryList = $ModelCall->get("tbl_category_entry");
header("location:".SITE_URL."marketplace/".seo_friendly_url_creation_front($getCity[0]['name'])."/".seo_friendly_url_creation_front($GetCategoryList[0]['category_name']));
}
else
{
$ModelCall->where("id", $_REQUEST['service_city_id']);
$ModelCall->orderBy("name","asc");
$getCity = $ModelCall->get("cities");
header("location:".SITE_URL."marketplace/".seo_friendly_url_creation_front($getCity[0]['name']));
}
}
else
{
unset($_SESSION['service_state_id']);
unset($_SESSION['service_city_id']);
header("location:".SITE_URL."marketplace/");
}
?>