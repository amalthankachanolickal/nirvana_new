<?php include("../model/class.expert1.php"); ?>
<?php
include('map_function_list.php');
include('PHPMailer-master/PHPMailerAutoload.php');
include('passwordHash.php');
if(($_REQUEST['Resetpassword']=="ResetPassword"))
{       
    $New_Password = $_POST["password"];
    $C_Password = $_POST["re_password"];
    $password = array(
	'client_password' => $_REQUEST['password']);
    $Email = $_POST["emailid"];
    if($New_Password == $C_Password){
        $ModelCall->where("client_email", $Email);
        $result = $ModelCall->update("tbl_client_sub_account",$password);
       /* echo "Hi";*/
        if($ModelCall->count==1)
        { 
            /*echo "Hi";*/
        $_SESSION['ADMIN_CLIENT_LOGINID']=$rec[0]['id'];
        header("location:".DOMAIN.AdminDirectory."login.php?");
        }
        else 
        {
        header("location:".DOMAIN.AdminDirectory."reset_password.php?actionResult=Error");
        }
    }
        
} 
?>