<?php include("../model/class.expert.php");
// include("mail_functions.php");
require('../mailin-lib/Mailin.php');
?>
<?php
//echo "<pre>";

//print_r($_POST);
//print_r($_FILES);

$houseno = $_POST["houseno"];
$user_id = $_POST["postedBy"];

$ModelCall->where("user_id",$user_id);
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if(($houseno=='') || ($user_id=='')){
    $_SESSION['message']="Not Valid Data Passed";
    header("location:".SITE_URL."your-membership-details.php");
    exit;
}

$cur_dir = getcwd();
$root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
$rel_path = "membership_documents_uploads".DIRECTORY_SEPARATOR;

if($_FILES["Owner1Id1"]["size"]>0){
$target_rel_file = $rel_path . $houseno.'Owner1Id1'.basename($_FILES["Owner1Id1"]["name"]);
$target_file= $root_dir . $target_rel_file;

$temp_file=$_FILES["Owner1Id1"]["name"];
move_uploaded_file($_FILES["Owner1Id1"]["tmp_name"], $target_file);
$Owner1Id1 = $target_rel_file;

}else{
    $Owner1Id1='';  
}

if($_FILES["Owner1Id2"]["size"]>0){
    $target_rel_file = $rel_path . $houseno.'Owner1Id2'.basename($_FILES["Owner1Id2"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["Owner1Id2"]["name"];
    move_uploaded_file($_FILES["Owner1Id2"]["tmp_name"], $target_file);
    $Owner1Id2 = $target_rel_file;
    
}else{
    $Owner1Id2='';  
}

if($_FILES["Owner2Id1"]["size"]>0){
    $target_rel_file = $rel_path . $houseno.'Owner2Id1'.basename($_FILES["Owner2Id1"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["Owner2Id1"]["name"];
    move_uploaded_file($_FILES["Owner2Id1"]["tmp_name"], $target_file);
    $Owner2Id1 = $target_rel_file;
    
}else{
    $Owner2Id1='';  
}


if($_FILES["Owner2Id2"]["size"]>0){
    $target_rel_file = $rel_path . $houseno.'Owner2Id2'.basename($_FILES["Owner2Id2"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["Owner2Id2"]["name"];
    move_uploaded_file($_FILES["Owner2Id2"]["tmp_name"], $target_file);
    $Owner2Id2 = $target_rel_file;
    
}else{
    $Owner2Id2='';  
}


if($_FILES["ConveyanceDeed"]["size"]>0){
    $target_rel_file = $rel_path . $houseno.'ConveyanceDeed'.basename($_FILES["ConveyanceDeed"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    
    $temp_file=$_FILES["ConveyanceDeed"]["name"];
    move_uploaded_file($_FILES["ConveyanceDeed"]["tmp_name"], $target_file);
    $ConveyanceDeed = $target_rel_file;
    
}else{
    $ConveyanceDeed='';  
}

if(($Owner1Id1=='') && ($Owner1Id2=='') && ($Owner2Id1=='') && ($Owner2Id2=='') && ( $ConveyanceDeed=="")){
    $_SESSION['message']="Your documents are updated. You may write to <a href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in </a> in case of any changes.";
    header("location:".SITE_URL."your-membership-details.php");
    exit;
}


$data=array(

	'houseno'=>$_POST['houseno'],
	'user_id'=> $user_id,
	'Owner1Id1'=>$Owner1Id1,
	'Owner1Id2'=>$Owner1Id2,
	'Owner2Id1'=>$Owner2Id1,
	'Owner2Id2'=>$Owner2Id2,
	'ConveyanceDeed'=>$ConveyanceDeed
);

// echo json_encode($data);
$res = $ModelCall->insert('rwa_membership_documents',$data);
$_SESSION['message']="Your Documents have been successfully Submitted. The documents will be reviewed by the office and status will be changed soon. Thank You!";
send_mail_to_admin($data, $rec);
send_mail_to_user($data, $rec);
header("location:".SITE_URL."your-membership-details.php");
exit;


function send_mail_to_admin($data, $rec){
     $From = $rec[0]['email'];
     $FromName = ucfirst(strtolower($rec[0]['first_name'])). " " . ucfirst(strtolower($rec[0]['last_name']));
     $ToAddress = 'office.nrwa@nirvanacountry.co.in';
    // $ToAddress = 'nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu';
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $headers .= 'From: '.$From."\r\n".
       'Reply-To: '.$From."\r\n" .
       'X-Mailer: PHP/' . phpversion();

    
      //$client_name=$rec1[0]['client_name'];// Add a recipient
      $Subject = 'New Membership Document(s) have been submitted by'. ucfirst(strtolower($rec[0]['first_name'])). " " . ucfirst(strtolower($rec[0]['last_name'])). ' for membership approval';
      $site_url=DOMAIN;
      $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
      <tbody>
     
        <tr>
          <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>  Dear Sir, </p>
            The Following documents have been submitted by ". ucfirst(strtolower($rec[0]['first_name'])). " " . ucfirst(strtolower($rec[0]['last_name'])). " of ".$data['houseno']. " You may <a href='#' target='_blank'>Click here </a>to review the same.";
    
       if($data['Owner1Id1']!==""){
        $Body = $Body ." Ist Owner Id Proof 1: <a  href='".SITE_URL.$data['Owner1Id1']."'>Click here to View</a> <br>";
       }       
       if($data['Owner1Id2']!==""){
        $Body = $Body ." Ist Owner Id Proof 2: <a  href='".SITE_URL.$data['Owner1Id2']."'>Click here to View</a><br>";
       }      
       if($data['Owner2Id1']!==""){
        $Body = $Body ." 2nd Owner Id Proof 1: <a  href='".SITE_URL.$data['Owner2Id1']."'>Click here to View</a><br>";
       }      
       if($data['Owner2Id2']!==""){
        $Body = $Body ." 2nd Owner Id Proof 2: <a  href='".SITE_URL.$data['Owner2Id2']."'>Click here to View</a><br>";
       }      
       if($data['ConveyanceDeed']!==""){
        $Body = $Body ." Conveyance Deed: <a  href='".SITE_URL.$data['ConveyanceDeed']."'>Click here to View</a> <br>";
       }            
          $Body = $Body ."
          For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>
          <br><br>
          Best Regards<br>
          NRWA Office.<br>
        <a href='".SITE_URL."'> www.nirvanacountry.co.in</a><br><br>
      
        </td>
        </tr>
    
        <tr>
          <td align='center' valign='middle'>&nbsp;</td>
        </tr>
       
      </tbody>
    </table>";
    mail($ToAddress,  $Subject, $Body, $headers);
 
}



function send_mail_to_user($data, $rec){
    $From = 'office.nrwa@nirvanacountry.co.in';
    $FromName = 'NRWA Office';
    $ToAddress = $rec[0]['email'];
   // $ToAddress = 'nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$From."\r\n".
      'Reply-To: '.$From."\r\n" .
      'X-Mailer: PHP/' . phpversion();

   
     //$client_name=$rec1[0]['client_name'];// Add a recipient
     $Subject = 'Your Membership Document(s) have been submitted for membership approval to Office.';
     $site_url=DOMAIN;
     $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
     <tbody>
    
       <tr>
         <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>  Dear ". ucfirst(strtolower($rec[0]['first_name'])). " " . ucfirst(strtolower($rec[0]['last_name'])). " , </p>
           The following documents have been submitted by you for house- ".$data['houseno']. " for membership approval. You will get the notification soon by office after reviewing the same. ";
   
      if($data['Owner1Id1']!==""){
       $Body = $Body ." Ist Owner Id Proof 1: <a  href='".SITE_URL.$data['Owner1Id1']."'>Click here to View</a> <br>";
      }       
      if($data['Owner1Id2']!==""){
       $Body = $Body ." Ist Owner Id Proof 2: <a  href='".SITE_URL.$data['Owner1Id2']."'>Click here to View</a><br>";
      }      
      if($data['Owner2Id1']!==""){
       $Body = $Body ." 2nd Owner Id Proof 1: <a  href='".SITE_URL.$data['Owner2Id1']."'>Click here to View</a><br>";
      }      
      if($data['Owner2Id2']!==""){
       $Body = $Body ." 2nd Owner Id Proof 2: <a  href='".SITE_URL.$data['Owner2Id2']."'>Click here to View</a><br>";
      }      
      if($data['ConveyanceDeed']!==""){
       $Body = $Body ." Conveyance Deed: <a  href='".SITE_URL.$data['ConveyanceDeed']."'>Click here to View</a> <br>";
      }            
         $Body = $Body ."
         For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>
         <br><br>
         Best Regards<br>
         NRWA Office.<br>
       <a href='".SITE_URL."'> www.nirvanacountry.co.in</a><br><br>
     
       </td>
       </tr>
   
       <tr>
         <td align='center' valign='middle'>&nbsp;</td>
       </tr>
      
     </tbody>
   </table>";
   mail($ToAddress,  $Subject, $Body, $headers);

}

?>