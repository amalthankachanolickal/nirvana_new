<?php
include("../model/class.expert.php"); 
require('../../mailin-lib/Mailin.php');

if (isset($_POST['username'])) {
$usernames= $_POST['username'];

print_r($usernames);

foreach($usernames as $user){
        $ModelCall->where("client_email", $user);
        $getInfo = $ModelCall->getOne("tbl_client_sub_account");
        if($getInfo){
          send_email_user_info($getInfo);
        }else{
            echo "No User Found";
        }
}
header("Location: ".DOMAIN.AdminDirectory."sendAdminData.php");
}

function send_email_user_info($result){
  //  print_r($getInfo);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
      $toArray= array($result['client_email']=>$result['client_name']);
       $getFullName = $result['client_name'];
    //   echo   $getFullName;
     // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
      $message= 'Dear '. $getFullName.',
      <br><br>
      Please find below the access details to the  <a href="https://www.nirvanacountry.co.in/"  target="_blank">website</a>.';
     
      $message= $message. '<br>
       Username - '.$result['client_email']. 
      '<br> Password - '.$result['client_password'];
      
      $message= $message. '<br>
      <br>
      Regards <br>
      NRWA Office<br>
      <a href="https://www.nirvanacountry.co.in/"  target="_blank">www.nirvanacountry.co.in</a><br>
      <a href="mailto:office.nrwa@nirvanacountry.co.in">office.nrwa@nirvanacountry.co.in</a><br>
      Office# : +911244 295885
      ';
    // echo $message;

          $data = array( "to" => $toArray,
          "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
          "subject" => "Your Account Details : Nirvana Country ",
         "html" => $message,
      );
     
   if($mailin->send_email($data)){
       $_SESSION['mail_sent']="Mail Sent Successfully.";
     
   }else{
    $_SESSION['mail_sent']="Mail Not Sent! Try Again.";
      
   }
   
  }
?>