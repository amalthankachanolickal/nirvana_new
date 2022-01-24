<?php 

error_reporting(1);

include("../model/class.expert.php"); 

require('../mailin-lib/Mailin.php');
require('../mailin-lib/send_sms.php');

//print_r($_POST['username']);

$usernames= $_POST['username'];

//echo count($usernames);



foreach($usernames as $user){

        $ModelCall->where("user_name",$user);

        $getInfo = $ModelCall->getOne("Wo_Users");

        if($getInfo){
        
        
       // exit(0);
         send_email_user_info($getInfo);
         send_sms_users_info($getInfo);
        
        }else{

            echo "No User Found";

        }

}

header("location:".DOMAIN.AdminDirectory."send_username_password.php");  

exit(0);


function send_sms_users_info($result){
    $getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];
    $usename = $result['user_name'];
    $password = $result['password'];
    
    $getFullName = substr($getFullName,0,60);
    if(strlen($getFullName)>30){
        $var1 = substr($getFullName,0,30);
        $var2 = substr($getFullName,31,60);
    }else{
        $var1 = $getFullName;
        $var2 = "%20";
    }
    
    $usename = substr($usename,0,60);
    if(strlen($usename)>30){
        $var3 = substr($usename,0,30);
        $var4 = substr($usename,31,60);
    }else{
        $var3 = substr($usename,0,30);
        $var4 = "%20";
    }
    $var5 = "%20";
    $var6 = "%20";
   
    $password = substr($password,0,60);
    if(strlen($password)>30){
        $var7 = substr($password,0,30);
        $var8 = substr($password,31,60);
    }else{
        $var7 = substr($password,0,30);
        $var8 = "%20";
    }
    $var9 = "%20";
    $var10 = "%20";
    
    $varValStr = $var1 . "|" . $var2 . "|" . $var3 . "|" . $var4 . "|" . $var5 . "|" . $var6 . "|" . $var7 . "|" . $var8 . "|" . $var9 . "|" . $var10;
    //$varValStr = "gghg||gg||||hhhh||||";
    echo $varValStr . "<br>";
    $fields = array(
        "sender_id" => "MYRWAS",
        "message" => "125841",
        "variables_values" => $varValStr,
        "route" => "dlt",
        "numbers" => $result["phone_number"],
    );
    //print_r($fields);
    sendSMS($fields);
}


function send_email_user_info($result){

   // print_r($result);

      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");

    $toArray= array($result['email']=>$result['first_name']);
    // $toArray= array("techlead@myrwa.online"=>"Nishtha");

       $getFullName = $result['user_title']." ".$result['first_name']." ".$result['last_name'];

    //   echo   $getFullName;

      $bcc= array("office.nrwa@nirvanacountry.co.in"=>"Office NRWA");

      $message= 'Dear '. $getFullName.',

      <br><br>

      Please find below the access details to the  <a href="https://www.nirvanacountry.co.in/"  target="_blank">website</a>.';

     

      $message= $message. '<br>

       Username - '.$result['user_name']. 

      '<br> Password - '.$result['password'];

      

      $message= $message. '<br>

      <br>

      Regards <br>

      Website Admin<br>

      <a href="https://www.nirvanacountry.co.in/"  target="_blank">www.nirvanacountry.co.in</a><br>

      <a href="mailto:website.admin@nirvanacountry.co.in">website.admin@nirvanacountry.co.in</a><br>

      Office# : +911244 295885

      ';

  //   echo $message;



     $data = array( "to" => $toArray,
		"bcc" => $bcc,
        "from" => array("website.admin@nirvanacountry.co.in", "Nrwa Office"),
        "replyto" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Your Account Details : Nirvana Country ",
        "html" => $message,

      );
 // print_r($data);
  //   print_r($mailin->send_email($data));

   if($mailin->send_email($data)){

       $_SESSION['mail_sent']="Mail Sent Successfully.";

     

   }else{

    $_SESSION['mail_sent']="Mail Not Sent! Try Again.";

      

   }

   

  }

?>