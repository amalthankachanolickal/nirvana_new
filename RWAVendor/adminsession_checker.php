<?php
if($_SESSION['ADMIN_CLIENT_LOGINID']!='')
{
$ModelCall->where("id", $_SESSION['ADMIN_CLIENT_LOGINID']);
$ModelCall->orderBy("id","asc");
$getAdminSubInfo = $ModelCall->get("tbl_client_sub_account");

$ModelCall->where("id", $getAdminSubInfo[0]['client_id']);
$ModelCall->orderBy("id","asc");
$getAdminInfo = $ModelCall->get("tbl_clients");

}
if($getAdminInfo[0]['id']=="")
{
header("location:".DOMAIN.AdminDirectory."login.php");
}
?>