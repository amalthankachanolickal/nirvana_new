<?php include("../model/class.expert1.php"); ?>
<?php
include('map_function_list.php');
include('PHPMailer-master/PHPMailerAutoload.php');
include('passwordHash.php');
if(($_REQUEST['ActionCall']=="AdminloginAccessCall"))
{
 if(!isset($_COOKIE["cookie_admin_name"])){
    $ModelCall->where("client_email", $ModelCall->utf8_decode_all($_REQUEST['adminemail']));
    $ModelCall->where("client_password", $ModelCall->utf8_decode_all($_REQUEST['password']));
    $ModelCall->where("status",1);
    $ModelCall->orderBy("id","asc");
    $rec = $ModelCall->get("tbl_client_sub_account");
    if($ModelCall->count==1)
    { 
        $_SESSION['ADMIN_CLIENT_LOGINID']=$rec[0]['id'];
         /*====================Start Save in Cookie==================*/
        $cookie_name = "cookie_admin_name";
        $cookie_pass = "cookie_admin_pass";
        if(isset($_POST["remember"])){
            $cookie_username = $_REQUEST["adminemail"];
            $cookie_password = $_REQUEST["password"];
            setcookie($cookie_name, $cookie_username, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_pass, $cookie_password, time() + (86400 * 30), "/"); // 86400 = 1 day
        }else{
            setcookie($cookie_name, '', time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_pass, '', time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        /*====================End Save in Cookie==================*/
        
        header("location:".DOMAIN.AdminDirectory."index.php?actionResult=loginsuccess");
    } else {
    header("location:".DOMAIN.AdminDirectory."login.php?actionResult=loginerror");
    }
}elseif(isset($_COOKIE["cookie_admin_name"])){
        $ModelCall->where("client_email", $ModelCall->utf8_decode_all($_REQUEST['adminemail']));
        $ModelCall->where("client_password", $ModelCall->utf8_decode_all($_REQUEST['password']));
        $ModelCall->where("status",1);
        $ModelCall->orderBy("id","asc");
        $rec = $ModelCall->get("tbl_client_sub_account");
        if($ModelCall->count==1)
        { 
        $_SESSION['ADMIN_CLIENT_LOGINID']=$rec[0]['id'];
        
        
         /*====================Start Save in Cookie==================*/
        $cookie_name = "cookie_admin_name";
        $cookie_pass = "cookie_admin_pass";
        if(isset($_POST["remember"])){
            $cookie_username = $_REQUEST["adminemail"];
            $cookie_password = $_REQUEST["password"];
            setcookie($cookie_name, $cookie_username, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_pass, $cookie_password, time() + (86400 * 30), "/"); // 86400 = 1 day
        }else{
            setcookie($cookie_name, '', time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_pass, '', time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        /*====================End Save in Cookie==================*/
        
        
        header("location:".DOMAIN.AdminDirectory."index.php?actionResult=loginsuccess");
        }
        else 
        {
        header("location:".DOMAIN.AdminDirectory."login.php?actionResult=loginerror");
        }
        
    }else {
     header("location:".DOMAIN.AdminDirectory."login.php?actionResult=loginerror");
    }
}
if(($_POST['ActionCall']=="PasswordChange")){
    $ModelCall->where("client_email", $ModelCall->utf8_decode_all($_POST['adminemail']));
    $ModelCall->where("client_password", $ModelCall->utf8_decode_all($_POST['oldpassword']));
    $ModelCall->where("status",1);
    $rec = $ModelCall->get("tbl_client_sub_account");
    if($ModelCall->count==1)
    { 
      $newpassword = $_POST['newpassword'];
      $confirmpassword = $_POST['confirmpassword'];
      if($newpassword!= $confirmpassword){
          $_SESSION['error'] = "The New Password and Confirm Password don't match";
        header("location:".DOMAIN.AdminDirectory."change-password.php");
      }else{
        $dataU = array(
            'client_password' => $_POST['newpassword']
            );
        $ModelCall->where("client_email", $ModelCall->utf8_decode_all($_POST['adminemail']));  
        $recupdate = $ModelCall->update("tbl_client_sub_account", $dataU);
        if($recupdate){
            $_SESSION['Message'] = "Password  updated Successfully.";
        }else{
            $_SESSION['error'] = "Password not updated. Try Again";
        }
      }
      header("location:".DOMAIN.AdminDirectory."change-password.php");
      exit(0);
    }
    else 
    {
    $_SESSION['error'] = "No Record Found."; 
    header("location:".DOMAIN.AdminDirectory."change-password.php");
    }
}
?>