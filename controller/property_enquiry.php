<?php
include('../model/class.expert.php');
if(isset($_GET['property_id'])){
    $property_id=$_GET['property_id'];
if(isset($_POST['submit'],$_POST['email'])){
  $data=array(
     
    'property_id'=>$property_id,
    'name'=>$_POST['name'],
    'email'=>$_POST['email'],
    'visit_date' => $_POST['visit_date'],
    'phone'=>"none",
    'message'=>$_POST['msg']
   
   
  );
  
 $ModelCall->insert('property_enquiry',$data);
$ModelCall->where("id",$property_id);
$getPropertyDetail = $ModelCall->get("newbuynsell");
foreach($getPropertyDetail as $property){
    $to=$property['email'];

     $subject = "New Request for your Property";
     $msg = "<h3>Hi there, a new request for your listing has been made by ".$_POST['name']." <a href='".SITE_URL."login_signup.php'><button>Please Login here</button></a> to view the details.</h3>
            <br>
            <b>Requested date for Visiting: ".$_POST['visit_date']."</b>";
    
   // $msg = wordwrap($msg,70);
    $headers = "From: ".$_POST['email']."\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($to, $subject, $msg, $headers);
}
header('location:'.SITE_URL.'index_new.php?actionresult=messagesent');
}
elseif(isset($_POST['submit'],$_POST['phone'])){
  $data=array(
     
    'property_id'=>$property_id,
    'name'=>$_POST['name'],
     'email'=>"none",
    'phone'=>$_POST['phone'],
   
    'message'=>$_POST['msg']
   
   
  );
  
 $ModelCall->insert('property_enquiry',$data);
$ModelCall->where("id",$property_id);
$getPropertyDetail = $ModelCall->get("buynsell");
foreach($getPropertyDetail as $property){
    $to=$property['phone'];
    $from=$_POST['phone'];
    $body=$_POST['msg'];
    send_twilio_text_sms($from, $to, $body);
    
}
header('location:'.SITE_URL.'index_new.php?actionresult=messagesent');
}

}
?>