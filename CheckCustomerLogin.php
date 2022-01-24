<?php if($_SESSION['UR_LOGINID']!='')
{
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->where("admin_approval ='1'");
$ModelCall->where("email_verify ='1'");
$ModelCall->orderBy("user_id","asc");
$GetCustomerInfoObj = $ModelCall->get("Wo_Users");
$GetCustomerInfo=$GetCustomerInfoObj[0];
//header("location:".SITE_URL.$_SERVER['REQUEST_URI']);
}
else
{
    if($_REQUEST['back_tracker']){
header("location:".SITE_URL."login_signup.php?back_tracker=".$_REQUEST['back_tracker']);
}
else{
header("location:".SITE_URL."login_signup.php?back_tracker=".substr($_SERVER['REQUEST_URI'], 1)); 
}
}
?>