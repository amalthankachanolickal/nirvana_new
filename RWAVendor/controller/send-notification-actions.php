<?php 
//error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
include("../mailin-lib/send_sms.php");




$checksel=0; 
$wherelause="";



if($_POST['selectedblockids']!=""){
    $Array1 = json_decode($_POST['selectedblockids'], true);
    if(count($Array1)>0){
    $ModelCall->where("block_id", $Array1, "IN");
    $checksel=1;
   // print_r($Array1);
     
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




if($_POST["submitAction"]=="downloadExcel"){
    //echo "In Download Excel";
    
    //$sql = "SELECT * FROM `Wo_Users` where is_block=0  ". $wherelause;
    $sql = "SELECT * FROM `Wo_Users` where 1  ". $wherelause;
    //echo $sql;
    $result = $ModelCall->rawQuery($sql);
    
    $getBlockInfo = $ModelCall->get("tbl_block_entry");
    
    $filename = date('Y-m-d')."_Receiver.csv";         //File Name
    
	$fp = fopen('php://output', 'w'); 
               $headers  = array(
				'0'=> "Name", 
				'1'=> "Block Name",
				'2'=> "House Number", 
				'3'=> "Floor Number",
				'4'=> "Email Address",
				'5'=> "Sec. Email Address",
				'6'=>"Phone Number",
				'7'=> "Alt. Phone Number",
				'8'=> "Status",
				'9'=> "Admin Approved",
				'10'=> "Email Verified",
				'11'=> "Member Type",
				'12'=> "Resident",
				'13'=> "First Login",
				'14'=> "Covid vaccine Registered");
     
     
    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename='.$filename);
    fputcsv($fp, $headers);
    
    $admin_appr  = $row['admin_approval']=="1"?"YES":"NO";
    $email_verify  = $row['email_verify']=="1"?"YES":"NO";
    $user_resident_type  = $row['user_resident_type']=="1"?"Non Resident":"Resident";
    $user_type  = $row['user_type']=="1"?"Tenant":"Landlord";
    $first_login  = $row['first_login']=="1"?"YES":"NO";
    $covid_reg  = $row['covid_vaccine']=="1"?"YES":"NO";
    
    
    foreach($result as $row){
        $user_arr  = array(
            'first_name'=>$row['first_name']." " . $row['last_name'] ,
            'block_name'=>ucwords($getBlockInfo[0]['block_name']).'-'.ucwords($getBlockInfo[0]['block_code']),
            'house_number_id'=>$row['house_number_id'],
            'floor_number'=>$row['floor_number'],
            'email'=>$row['user_email'],
            'sec_email'=>$row['email'],
            'phone'=>$row['phone_number'],
            'alt_phone'=>$row['user_phone'],
            'user_status'=>$row['user_status'],
            'admin_approval'=>$admin_appr,
            'email_verify'=>$email_verify,
            'user_type'=>$user_type,
            'user_resident_type'=>$user_resident_type,
            'first_login'=>$first_login,
            'covid_reg'=>$covid_reg,
            
            
        );
        fputcsv($fp, $user_arr);					   
    }
    
    if (fclose($fp)) {
    	exit();
    }
}

if($_POST["submitAction"]=="sendNotifi"){
    if($_POST['com_type']=="email"){
        if($_POST['othermails']!=""){
            $otheremails = explode(",", $_POST['othermails']);
            for($i=0; $i<count($otheremails); $i++){
                $otheremailsArray[$i]['email'] = $otheremails[$i];
                $otheremailsArray[$i]['first_name'] = $otheremails[$i];
            }
        }else{
        //echo "No other emails"; 
        }
    
        for ($i = 0; $i < count($_FILES['files']['name']); $i++){
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
        
        //Mail Code here
        $rec = array();
        if($checksel){
            //$ModelCall->where("is_block",0);
            $rec = $ModelCall->get("Wo_Users");
            //$mailing_sql = "SELECT * FROM `Wo_Users` where is_block=0 and email is not null ". $wherelause;
            $mailing_sql = "SELECT * FROM `Wo_Users` where  and email is not null ". $wherelause;
         
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
            } else {
                 foreach($rec as $ressend){
                    print_r($ressend);
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
            foreach($_REQUEST['mail_notification'] as $mailoption){
                
                if($mailoption==""){
                    continue;
                }
                 
                if($mailoption=="TestMail"){
                    $rec[0]['email'] ="techlead@myrwa.online";
                    $rec[0]['first_name'] ="nishtha";
                }
                
                if($mailoption=="OfficeBearers"){
                    $mailing_sql = "SELECT team_email as email FROM `tbl_team` where status=1";
                    $rec = $ModelCall->rawQuery("SELECT team_email as email FROM `tbl_team` where status=1");
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
            
                if($mailoption=='Group'){
                   $rec[0]['email'] ="NirvanaResidents@googlegroups.com";
                   $rec[0]['first_name'] ="NirvanaResidents";
                }
                
                foreach($rec as $ressend){
                    $From = WEBSITESUPPORTEMAIL;
                    $FromName = strip_tags(SITENAME);
                    $getFullName = $ressend['first_name']." ".$ressend['last_name'];
                    $ToAddress =  $ressend['email'];     
                    custom_email_new($ressend,$_REQUEST,$data);
                }
            }
        }
        if(count($otheremailsArray)>0){
            foreach($otheremailsArray as $ressend){
               
                 custom_email_new($ressend,$_REQUEST,$data);
            }
        }
    }
    if($_POST['com_type']=="sms"){
    
        $template = explode("_",$_POST["template"]);
        $template_id = $template[0];
        
        $no_of_par = $template[1];
        $msg_var = "";
        for ($x = 1; $x <= $no_of_par; $x++) {
            $ele = $template_id . "_" . $x;
            $msg_var .= $_POST[$ele] . "|";
        }
            
        if($_POST['otherphone']!=""){
            $otherphone = explode(",", $_POST['otherphone']);
            for($i=0; $i<count($otherphone); $i++){
                $recNumber = $otherphone[$i];
                $recName = "Dear Sir/Madam ";
                
                $varValStr = $recName . "|";
                $fields = array(
                    "sender_id" => "NRWAOB",
                    "message" => $template_id,
                    "variables_values" => $varValStr,
                    "route" => "dlt",
                    "numbers" => $recNumber,
                );
                sendSMS($fields);
            }
        }else{
        //echo "No other phone"; 
        }
        //print_r($otherphoneArray);
        
        $template_name = $_POST['template'];
        $rec = array();
        if($checksel){
            //$ModelCall->where("is_block",0);
            $rec = $ModelCall->get("Wo_Users");
            //$mailing_sql = "SELECT * FROM `Wo_Users` where admin_approval=1 and is_block=0 and phone_number is not null  ". $wherelause;
            //$mailing_sql = "SELECT * FROM `Wo_Users` where is_block=0  ". $wherelause;
            $mailing_sql = "SELECT * FROM `Wo_Users` where phone_number is not null  ". $wherelause;
            if(count($rec)>0 && count($rec)!=1){
                foreach($rec as $m_rec){
                    $recName = $m_rec['first_name']." ".$m_rec['last_name'];
                    $recNumber = $m_rec['phone_number'];
                    
                    
                    if($template_id=='123553'){
                        $varValStr = $m_rec['user_name'] . "|" . $m_rec['password'];
                    }
                    
                    
                    for ($x = 1; $x <= $no_of_par; $x++) {
                        $ele = $template_id . "_" . $x;
                        $varValStr .= $_POST[$ele] . "|";
                    }
                    
                    $fields = array(
                        "sender_id" => "NRWAOB",
                        "message" => $template_id,
                        "variables_values" => $varValStr,
                        "route" => "dlt",
                        "numbers" => $recNumber,
                    );
                    sendSMS($fields);
                }    
            }
            else{
                ///create a batch
                
                 $dataMessage = array(
                    	'current_offset' => 0,
                    	'limit_set' => 200,
                    	'message_start_date' => date("Y-m-d"),
                    	'status' =>'tobestarted',
                    	'category_message' => 'Custom Message',
                    	'started_datetime' =>date('Y-m-d H:i:s'),
                        'count_message_left'=>count($rec),
                        'mailing_sql'=>$mailing_sql,
                        'msg_id' => $template_id,
                        'msg_template' => $template_name,
                        'msg_var' => $msg_var,
                        
                );
                $result = $ModelCall->insert('batch_message_cron_file',$dataMessage);
                echo "Inserted";
            }
        }else {
          //echo "No Selction done for Members";
        }
    }
}












header("location:".DOMAIN.AdminDirectory."send-custom-notification.php?actionResult=actionsuccess"); 

?>