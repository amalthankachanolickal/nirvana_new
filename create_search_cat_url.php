<?php
include('model/class.expert.php');
if($_REQUEST['catgeory_id']!='')
{
$ModelCall->where("id", $_REQUEST['catgeory_id']);
$ModelCall->where("status", 1);
$ModelCall->orderBy("category_name","asc");
$GetCategoryList = $ModelCall->get("tbl_category_entry");
$_SESSION['catgeory_id'] = $_REQUEST['catgeory_id'];

if($_SESSION['service_city_id']!='')
{
$ModelCall->where("id", $_SESSION['service_city_id']);
$ModelCall->orderBy("name","asc");
$getCity = $ModelCall->get("cities");
header("location:".SITE_URL."marketplace/".seo_friendly_url_creation_front($getCity[0]['name'])."/".seo_friendly_url_creation_front($GetCategoryList[0]['category_name']));
}
else
{
header("location:".SITE_URL."marketplace/".seo_friendly_url_creation_front($GetCategoryList[0]['category_name']));
}
}
else
{
unset($_SESSION['catgeory_id']);
header("location:".SITE_URL."marketplace/");
}
?>