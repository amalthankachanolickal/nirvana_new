<?php 
//error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
include("../mailin-lib/send_whatsapp.php");
$otheremails = array();

if($_POST['othermails']!=""){
$otheremails = explode(",", $_POST['othermails']);

     for($i=0; $i<count($otheremails); $i++){
        $otheremailsArray[$i]['email'] = $otheremails[$i];
        $otheremailsArray[$i]['first_name'] = $otheremails[$i];
     }
}else{
//echo "No other emails"; 
}
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}


function sentenceCase($string) { 
    $sentences = preg_split('/([.?!]+)/', $string, -1,PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE); 
    $newString = ''; 
    foreach ($sentences as $key => $sentence) { 
        $newString .= ($key & 1) == 0? 
            ucfirst(strtolower(trim($sentence))) : 
            $sentence.' '; 
    } 
    return trim($newString); 
}

for ($i = 0; $i < count($_FILES['files']['name']); $i++)
{
    if ($_FILES['files']['tmp_name'][$i] != '') {
    
     $banner_imageName=clean($_FILES['files']['name'][$i]);
    $banner_imageData=uniqid().clean($_FILES['files']['name'][$i]);
    if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../documents/'.$banner_imageData)){
      $data[$i] = DOMAIN.AdminDirectory.'/documents/'.$banner_imageData;
    }else{
       // echo "Not Uploaded";
    }
    
    }
}
foreach($data as $arr){
    $datatring1 =  $datatring1. ",". $arr;
}
      
      
$checksel=0; 
$wherelause="";
if($_POST['selectedblockids']!=""){
    $Array1 = json_decode($_POST['selectedblockids'], true);
    if(count($Array1)>0){
    $ModelCall->where("block_id", $Array1, "IN");
    $checksel=1;
      foreach($Array1 as $arr){
       $formstring1 =  $formstring1. ','. $arr ;
      }
    $wherelause = $wherelause." and block_id in (".substr($formstring1, 1).")";
    }
}
if($_POST['selectedMemberTypes']!=""){
    $Array2 = json_decode($_POST['selectedMemberTypes'], true);
     if(count($Array2)>0){
    $ModelCall->where ("user_type",$Array2, "IN");
     $checksel=1;
      foreach($Array2 as $arr){
       $formstring2 =  $formstring2. ','. $arr ;
      }
      
      $wherelause = $wherelause. " and user_type in (".substr($formstring2, 1).")";
     }
    
}
if($_POST['selectedMemberResiding']!=""){
    $Array3 = json_decode($_POST['selectedMemberResiding'], true);
    //echo count($Array3);
    if(count($Array3)>0){
    $ModelCall->where ("user_resident_type", $Array3, "IN");
     $checksel=1;
        foreach($Array3 as $arr){
       $formstring3 =  $formstring3. ','. $arr ;
      }
      $wherelause = $wherelause. " and user_resident_type in (".substr($formstring3, 1).")";
    }
    
}
if($_POST['selectedMemberStatus']!=""){
    $Array4 = json_decode($_POST['selectedMemberStatus'], true);
    if(count($Array4)>0){
    $ModelCall->where ("user_status", $Array4, "IN");
     foreach($Array4 as $arr){
       $formstring4 =  $formstring4. ",'". $arr. "'";
      }
      
      $wherelause = $wherelause. " and user_status in (".substr($formstring4, 1).")";
     $checksel=1;
    }
    
}
if($_POST['userFirstLoggedIn']!="NA"){
    $ModelCall->where ("first_login",$_POST['userFirstLoggedIn']);
       $wherelause = $wherelause. " and first_login =". $_POST['userFirstLoggedIn'] ;
     $checksel=1;
}
if($_POST['emailVerified']!="NA"){
    $ModelCall->where ("email_verify",$_POST['emailVerified']);
     $wherelause = $wherelause. " and email_verify =". $_POST['emailVerified'] ;
     $checksel=1;
}
if($_POST['adminApproved']!="NA"){
    $ModelCall->where ("admin_approval",$_POST['adminApproved']);
    $wherelause = $wherelause. " and admin_approval =". $_POST['adminApproved'] ;
     $checksel=1;
}

if($_POST['covidVaccineRegistered']!="NA"){
    $ModelCall->where ("covid_vaccine",$_POST['covidVaccineRegistered']);
    $wherelause = $wherelause. " and covid_vaccine =". $_POST['covidVaccineRegistered'] ;
     $checksel=1;
}

$rec = array();
if($checksel){
    $ModelCall->where("is_block",0);
 $mailing_sql = "SELECT * FROM `Wo_Users` where admin_approval=1 and email <> '' and email is not null and user_status='Active' ". $wherelause;
 $rec = $ModelCall->rawQuery($mailing_sql);

  if(count($rec)>200){
    $Body = $_POST['content'];
    if($_REQUEST['mailattach']=="No"){
      $dataMail = array(
        'current_offset' => 0,
        'limit_set' => 200,
        'mail_content' =>  $Body,
        'mail_subject' => sentenceCase($_POST['subject']),
        'mail_start_date' => date("Y-m-d"),
        'status' =>'tobestarted',
        'started_datetime' =>date('Y-m-d H:i:s'),
        'count_mail_left'=>count($rec),
        'category_mail'=>'Custom Mail',
        'mailing_sql'=>$mailing_sql,
        'selfrom'=>$_REQUEST['selfrom'],
        );
    }else{
        $dataMail = array(
        'current_offset' => 0,
        'limit_set' => 200,
        'mail_content' =>  $Body,
        'mail_subject' => sentenceCase($_POST['subject']),
        'mail_start_date' => date("Y-m-d"),
        'status' =>'tobestarted',
        'started_datetime' =>date('Y-m-d H:i:s'),
        'count_mail_left'=>count($rec),
        'category_mail'=>'Custom Mail',
        'mailing_sql'=>$mailing_sql,
        'attachment'=>substr($datatring1, 1),
        'selfrom'=>$_REQUEST['selfrom'],
        );  
    }
        $result = $ModelCall->insert('batch_mail_cron_file',$dataMail);
        
        $message = "Custome Mailer Batch Submitted". "----> Mail Subject : ". $dataMail['mail_subject'] . " ----> Total Rec.:" . $dataMail['count_mail_left'];
        $fields = [
        "phoneNumber"=> "". "7231884491",
        "countryCode" => ""."91",
        "traits"=> [
                "var1" => "Custom Emailer  - ALERTS",
                "var2" => "Admin",
                "var3" => preg_replace('/\s+/S', " ", $message),
                "var4" => "SYSTEM ADMIN : myRWA.online ",
                "var10" => "SYSTEM_ALERT",
            ]
        ];  
        sendWhatsAppMsg($fields);
        
        $fields = [
        "phoneNumber"=> "". "7470169440",
        "countryCode" => ""."44",
        "traits"=> [
                "var1" => "Custom Emailer  - ALERTS",
                "var2" => "Admin",
                "var3" => preg_replace('/\s+/S', " ", $message),
                "var4" => "SYSTEM ADMIN : myRWA.online ",
                "var10" => "SYSTEM_ALERT",
            ]
        ];  
        sendWhatsAppMsg($fields);
        
        $fields = [
        "phoneNumber"=> "". "8096773208",
        "countryCode" => ""."91",
        "traits"=> [
                "var1" => "Custom Emailer  - ALERTS",
                "var2" => "Admin",
                "var3" => preg_replace('/\s+/S', " ", $message),
                "var4" => "SYSTEM ADMIN : myRWA.online ",
                "var10" => "SYSTEM_ALERT",
            ]
        ];  
        sendWhatsAppMsg($fields);
        
        $fields = [
        "phoneNumber"=> "". "8593988539",
        "countryCode" => ""."91",
        "traits"=> [
                "var1" => "Custom Emailer  - ALERTS",
                "var2" => "Admin",
                "var3" => preg_replace('/\s+/S', " ", $message),
                "var4" => "SYSTEM ADMIN : myRWA.online ",
                "var10" => "SYSTEM_ALERT",
            ]
        ];  
        sendWhatsAppMsg($fields);
        
        $fields = [
        "phoneNumber"=> "". "9818228905",
        "countryCode" => ""."91",
        "traits"=> [
                "var1" => "Custom Emailer  - ALERTS",
                "var2" => "Admin",
                "var3" => preg_replace('/\s+/S', " ", $message),
                "var4" => "SYSTEM ADMIN : myRWA.online ",
                "var10" => "SYSTEM_ALERT",
            ]
        ];  
        sendWhatsAppMsg($fields);
        
        
        
        
        $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
        $toArray= array("kushalbhasin@gmail.com"=>"Kushal","techlead@myrwa.online"=>"Techlead","iambommanakavya@gmail.com"=>"Kavya","customers@myrwa.online"=>"Arpit","marketing@myrwa.online"=>"Akhil");
        $bccArray= array("kushalbhasin@gmail.com"=>"Kushal");
        $data = array( "to" => $toArray,
            //"replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Custom Email batch Submitted",
            "html" => $message
        );
        print_r($mailin->send_email($data)); 
        
        
    } else {
         foreach($rec as $ressend){
            $From = WEBSITESUPPORTEMAIL;
            $FromName = strip_tags(SITENAME);
            $getFullName = $ressend['first_name']." ".$ressend['last_name'];
            $ToAddress =  $ressend['email'];      // Add a recipient
            custom_email_new($ressend,$_REQUEST,$data);
        }
    }
    
}else {
  //  echo "No Selction done for Members";
}

$rec = array();
if(count($_REQUEST['mail_notification'])>0){
   
    $mailing_sql = "";
   //   echo "<br>";
  foreach($_REQUEST['mail_notification'] as $mailoption){
   //  echo $mailoption."<br>";
        if($mailoption==""){
         continue;
         }
         
         
         if($mailoption=="TestMail"){
          $rec[0]['email'] ="techlead@myrwa.online";
              $rec[0]['first_name'] ="nishtha";
        }
        
        
        
        //  echo $mailoption;
        if($mailoption=="OfficeBearers"){
            $mailing_sql = "SELECT team_email as email FROM `tbl_team` where status=1";
         // $ModelCall->where("status","1");
       // $rec = $ModelCall->get("tbl_team");
        $rec = $ModelCall->rawQuery("SELECT team_email as email FROM `tbl_team` where status=1");
       //$rec[0]['email'] ="techlead@myrwa.online";  
        }
    
        if($mailoption=="EC"){
            $mailing_sql = "SELECT Email as  email  FROM `tbl_EC_uses` where status='Current'";
             $rec = $ModelCall->rawQuery("SELECT Email as  email  FROM `tbl_EC_uses` where status='Current'");
        }
    
        if($mailoption=="CRM"){
           $rec[0]['email'] ="crm.nirvana@nimbusharbor.com";
              $rec[0]['first_name'] ="crm";
        }
    
        if($mailoption=="Marketing"){
           $rec[0]['email'] ="nirwana.marketing@gmail.com";
              $rec[0]['first_name'] ="marketing";
        }
    
        if($mailoption=="Accounts"){
          $rec[0]['email'] ="accounts.nirvana@nimbusharbor.com";
              $rec[0]['first_name'] ="Acoounts";
        }
    
        if($mailoption=="Office"){
           $rec[0]['email'] ="office.nrwa@nirvanacountry.co.in";
          $rec[0]['first_name'] ="office";
        }
    
    
    //     if($mailoption=='animesh.bhardwaj@nimbusharbor.com'){
    //      $ModelCall->where("user_email","animesh.bhardwaj@nimbusharbor.com");
    // //$ModelCall->orderBy("id","asc");
    // $rec = $ModelCall->get("Wo_Users");
    //     }
    
    
        if($mailoption=='Group'){
      // $rec[0]['email'] ="nishthagupta@gmail.com";
        // $rec[0]['first_name'] ="nishtha";
        $rec[0]['email'] ="NirvanaResidents@googlegroups.com";
        $rec[0]['first_name'] ="NirvanaResidents";
        }
        
        
    //     print_r(count($rec));
    //   echo "<br>";
        foreach($rec as $ressend){
      
            $From = WEBSITESUPPORTEMAIL;
            $FromName = strip_tags(SITENAME);
            $getFullName = $ressend['first_name']." ".$ressend['last_name'];
        
            $ToAddress =  $ressend['email'];      // Add a recipient
            custom_email_new($ressend,$_REQUEST,$data);
            // if($_REQUEST['mail_notification1']=='formate1'){
        
            // user_info_mail($ressend);
            // }  
        
        
            // if($_REQUEST['mail_notification1']=='formate2'){
        
            // email_varify_mail($ressend);
            // } 
            // if($_REQUEST['mail_notification1']=='formate3'){
        
            // account_ready_to_use_mail($ressend);
            // }
            // if($_REQUEST['mail_notification1']=='formate4'){
            // custom_email_new($ressend,$_REQUEST,$data);
            // } 
        }


    }
    // exit(0);

}

if(count($otheremailsArray)>0){
    foreach($otheremailsArray as $ressend){
       
         custom_email_new($ressend,$_REQUEST,$data);
    }
}
//exit(0);

//header("location:".DOMAIN.AdminDirectory."send-custom-emails.php?actionResult=actionsuccess"); 
?>