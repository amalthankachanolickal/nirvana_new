<?php 
include('../model/class.expert.php');
if( $_SESSION['UR_LOGINID']==''){
    header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired");
}
//print_r($_POST);
//print_r($_SESSION);
//exit(0);
if( $_POST['subscribe_accept']==1 ){
 $housedetails=  explode("-",$_SESSION['unit_no']);

   $tableData = array("user_id"=>$_SESSION['UR_LOGINID'], 
   "block_id"=>$housedetails[1],
   "house_number_id"=>$housedetails[2],
   "floor_id"=>$housedetails[3],
   "newspaper_bill"=> $_POST['subscribe_accept']
);
    $updateInfo = $ModelCall->insert("tbl_online_payment_access", $tableData, 1 );
    if($updateInfo==1){
    echo "1";
    }
   else echo "0";
}else{
    echo "No acceptance of payment bills online was passed";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>