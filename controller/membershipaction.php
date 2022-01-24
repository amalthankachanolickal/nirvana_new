<?php include("../model/class.expert.php");

// include("mail_functions.php");
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

 
if($_POST['ActionCall']=='uploadDocuments'){
//   print_r($_POST); 
//   echo date('Y-m-d', strtotime( $_POST['dob']));
//   echo date('Y-m-d', strtotime( $_POST['payment_date_1']));
//  exit(0);
  $data = array(
    "serialno" => isset($_POST['serialno']) ? $_POST['serialno'] : '',
    "userid" => isset($_POST['userid']) ? $_POST['userid'] : NULL,
    "title_1" => isset($_POST['title_1']) ? $_POST['title_1'] : '',
    "tenant_other_title" => isset($_POST['tenant_other_title']) ? $_POST['tenant_other_title'] : '',
    "tenant_first_name" => isset($_POST['tenant_first_name']) ? $_POST['tenant_first_name'] : '',
    "tenant_middle_name" => isset($_POST['tenant_middle_name']) ? $_POST['tenant_middle_name'] : '',
    "tenant_last_name" => isset($_POST['tenant_last_name']) ? $_POST['tenant_last_name'] : '',
    "title_2" => isset($_POST['title_2']) ? $_POST['title_2'] : '',
    "father_other_title" => isset($_POST['father_other_title']) ? $_POST['father_other_title'] : '',
    "father_first_name" => isset($_POST['father_first_name']) ? $_POST['father_first_name'] : '',
    "father_middle_name" => isset($_POST['father_middle_name']) ? $_POST['father_middle_name'] : '',
    "father_last_name" => isset($_POST['father_last_name']) ? $_POST['father_last_name'] : '',
    "block_prime" => isset($_POST['block_prime']) ? $_POST['block_prime'] : '',
    "house_number" => isset($_POST['house_number']) ? $_POST['house_number'] : '',
    "floor_prime" => isset($_POST['floor_prime']) ? $_POST['floor_prime'] : '',
    "address_corres_1" => isset($_POST['address_corres_1']) ? $_POST['address_corres_1'] : '',
    "address_corres_2" => isset($_POST['address_corres_2']) ? $_POST['address_corres_2'] : '',
    "city" => isset($_POST['city']) ? $_POST['city'] : '',
    "state" => isset($_POST['state']) ? $_POST['state'] : '',
    "pin" => isset($_POST['pin']) ? $_POST['pin'] : '',
    "dob" => isset($_POST['dob']) ? date('Y-m-d', strtotime( $_POST['dob'])) : '',
    "occupation" => isset($_POST['occupation']) ? $_POST['occupation'] : '',
    "emailid_1" => isset($_POST['emailid_1']) ? $_POST['emailid_1'] : '',
    "isd_1" => isset($_POST['isd_1']) ? $_POST['isd_1'] : '+91',
    "mobile" => isset($_POST['mobile']) ? $_POST['mobile'] : '',
    "isd_2" => isset($_POST['isd_2']) ? $_POST['isd_2'] : '+91', 
    "phone" => isset($_POST['phone']) ? $_POST['phone'] : '',
    "doc_type_poi" => isset($_POST['doc_type_poi']) ? $_POST['doc_type_poi'] : $_POST['doc_type_poi1'] ,
    "doc_type_poa" => isset($_POST['doc_type_poa']) ? $_POST['doc_type_poa'] : $_POST['doc_type_poa1'],
    "doc_type_pdob" => isset($_POST['doc_type_pdob']) ? $_POST['doc_type_pdob'] : $_POST['doc_type_pdob1'],
    "doc_type_ownership" => isset($_POST['doc_type_ownership']) ? $_POST['doc_type_ownership'] : $_POST['doc_type_ownership1'],
     "poi_other_title" => isset($_POST['poi_other_title']) ? $_POST['poi_other_title'] : $_POST['poi_other_title1'],
    "poa_other_title" => isset($_POST['poa_other_title']) ? $_POST['poa_other_title'] :  $_POST['poa_other_title1'],
    "pdob_other_title" => isset($_POST['pdob_other_title']) ? $_POST['pdob_other_title'] : $_POST['pdob_other_title1'],
    "ownership_other_title" => isset($_POST['ownership_other_title']) ? $_POST['ownership_other_title'] : $_POST['ownership_other_title1'],
    "mode_of_payment_1" => isset($_POST['mode_of_payment_1']) ? $_POST['mode_of_payment_1'] : '',
    "reference_number_1" => isset($_POST['reference_number_1']) ? $_POST['reference_number_1'] : '',
    "payment_date_1" => isset($_POST['payment_date_1']) ? date('Y-m-d', strtotime( $_POST['payment_date_1'])) : '',
    "amount_1" => isset($_POST['amount_1']) ? $_POST['amount_1'] : '',
    "mode_of_payment_2" => isset($_POST['mode_of_payment_2']) ? $_POST['mode_of_payment_2'] : '',
    "reference_number_2" => isset($_POST['reference_number_2']) ? $_POST['reference_number_2'] : '',
    "payment_date_2" => isset($_POST['payment_date_2']) ? $_POST['payment_date_2'] : '',
    "amount_2" => isset($_POST['amount_2']) ? $_POST['amount_2'] : '',
    "recommend_name" => isset($_POST['recommend_name']) ? $_POST['recommend_name'] : '',
    "recommend_father_fname" => isset($_POST['recommend_father_fname']) ? $_POST['recommend_father_fname'] : '',
    "age" => isset($_POST['age']) ? $_POST['age'] : '',
    "rec_per_name" => isset($_POST['rec_per_name']) ? $_POST['rec_per_name'] : '',
    "rec_per_title" => isset($_POST['rec_per_title']) ? $_POST['rec_per_title'] : '',
    "rec_per_title_opt" => isset($_POST['rec_per_title_opt']) ? $_POST['rec_per_title_opt'] : '',
    "rec_per_fname" => isset($_POST['rec_per_fname']) ? $_POST['rec_per_fname'] : '',
    "rec_per_mname" => isset($_POST['rec_per_mname']) ? $_POST['rec_per_mname'] : '',
    "rec_per_lname" => isset($_POST['rec_per_lname']) ? $_POST['rec_per_lname'] : '',
    "membership_number" => isset($_POST['membership_number']) ? $_POST['membership_number'] : '',
    "rec_userid" => isset($_POST['rec_userid']) ? $_POST['rec_userid'] : '',
    "block_rec" => isset($_POST['block_rec']) ? $_POST['block_rec'] : '',
    "house_number_rec" => isset($_POST['house_number_rec']) ? $_POST['house_number_rec'] : '',
    "floor_rec" => isset($_POST['floor_rec']) ? $_POST['floor_rec'] : '',
    "rec_other_emailid" => isset($_POST['rec_other_emailid']) ? $_POST['rec_other_emailid'] : '',
    "rec_other_phone" => isset($_POST['rec_other_phone']) ? $_POST['rec_other_phone'] : '',
    "member_type" => isset($_POST['member_type']) ? $_POST['member_type'] : '',
  );

  if ($_FILES['proof_of_identity']['tmp_name'] != '') {
    $cur_dir = getcwd();
    $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    $rel_path = "uploads".DIRECTORY_SEPARATOR;
    $target_rel_file = $rel_path . basename($_FILES["proof_of_identity"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    $temp_file=$_FILES["proof_of_identity"]["name"];
    move_uploaded_file($_FILES["proof_of_identity"]["tmp_name"], $target_file);
    $data['proof_of_identity'] = $target_rel_file;
  }

  if ($_FILES['proof_of_address']['tmp_name'] != '') {
    $cur_dir = getcwd();
    $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    $rel_path = "uploads".DIRECTORY_SEPARATOR;
    $target_rel_file = $rel_path . basename($_FILES["proof_of_address"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    $temp_file=$_FILES["proof_of_address"]["name"];
    move_uploaded_file($_FILES["proof_of_address"]["tmp_name"], $target_file);
    $data['proof_of_address'] = $target_rel_file;
  }

  if ($_FILES['proof_of_dob']['tmp_name'] != '') {
    $cur_dir = getcwd();
    $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    $rel_path = "uploads".DIRECTORY_SEPARATOR;
    $target_rel_file = $rel_path . basename($_FILES["proof_of_dob"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    $temp_file=$_FILES["proof_of_dob"]["name"];
    move_uploaded_file($_FILES["proof_of_dob"]["tmp_name"], $target_file);
    $data['proof_of_dob'] = $target_rel_file;
  }

 if ($_FILES['ownership_proof']['tmp_name'] != '') {
    $cur_dir = getcwd();
    $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    $rel_path = "uploads".DIRECTORY_SEPARATOR;
    $target_rel_file = $rel_path . basename($_FILES["ownership_proof"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    $temp_file=$_FILES["ownership_proof"]["name"];
    move_uploaded_file($_FILES["ownership_proof"]["tmp_name"], $target_file);
    $data['ownership_proof'] = $target_rel_file;
  }


//Stamp Size Photo Size (Dimensions) in Pixels: 236 x 295 pixels
//passport Size Photo Size (Dimensions) in Pixels: 413x531 pixels

  if ($_FILES['photograph_user']['tmp_name'] != '') {
    $cur_dir = getcwd();
    $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    $rel_path = "uploads".DIRECTORY_SEPARATOR;
    $target_rel_file = $rel_path . basename($_FILES["photograph_user"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    $temp_file=$_FILES["photograph_user"]["name"];
    move_uploaded_file($_FILES["photograph_user"]["tmp_name"], $target_file);
    $data['photograph_user'] = $target_rel_file;
  }


  if ($_FILES['signature']['tmp_name'] != '') {
    $cur_dir = getcwd();
    $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    $rel_path = "uploads".DIRECTORY_SEPARATOR;
    $target_rel_file = $rel_path . basename($_FILES["signature"]["name"]);
    $target_file= $root_dir . $target_rel_file;
    $temp_file=$_FILES["signature"]["name"];
    move_uploaded_file($_FILES["signature"]["tmp_name"], $target_file);
    $data['signature'] = $target_rel_file;
  }
  
//   if ($_FILES['signature_rec']['tmp_name'] != '') {
//     $cur_dir = getcwd();
//     $root_dir = $cur_dir . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
//     $rel_path = "uploads".DIRECTORY_SEPARATOR;
//     $target_rel_file = $rel_path . basename($_FILES["signature_rec"]["name"]);
//     $target_file= $root_dir . $target_rel_file;
//     $temp_file=$_FILES["signature_rec"]["name"];
//     move_uploaded_file($_FILES["signature_rec"]["tmp_name"], $target_file);
//     $data['signature_rec'] = $target_rel_file;
//   }


if($_POST['applicationid']==""){
     $data['approved_status']='Pending';
     $data['recc_approved']='Yes';
     $res = $ModelCall->insert('Wo_Membership', $data);
     $insert_id = $ModelCall->getLastInsertId();
}else{
      $ModelCall->where("id", $_POST['applicationid']);
      $rec = $ModelCall->get('Wo_Membership');
      if($rec[0]['approved_status']!='Pending' && $rec[0]['approved_status']!='0'){
          $data['approved_status']='Reopened';
      }else{
          $data['approved_status']='Pending'; 
      }
      
     $ModelCall->where("id", $_POST['applicationid']);
     $res = $ModelCall->update('Wo_Membership', $data);
     $insert_id = $_POST['applicationid'];
}
 //print_r($data);

  if ($res) {
 if($_POST['mode_of_payment_1']=='Online Payment'){
     $paymode=1;
    //  if($_POST['mode_of_payment_1']=='Online Payment' && $_POST['mode_of_payment_2']=='Online Payment'){
    //      $paymode=3;
    //  }else if ($_POST['mode_of_payment_1']=='Online Payment' && $_POST['mode_of_payment_2']!='Online Payment'){
    //      $paymode=1;
    //  }else if ($_POST['mode_of_payment_1']!='Online Payment' && $_POST['mode_of_payment_2']=='Online Payment'){
    //      $paymode=2;
    //  }
     header("location:".SITE_URL."memebership_payment.php?firstname=".$_POST['tenant_first_name']."&lastname=".$_POST['tenant_last_name']."&email=".$_POST['emailid_1']."&phone=".$_POST['mobile']."&udf2=".$insert_id."&udf3=".$paymode);
 }else{
     if($data['approved_status']=='Pending'){
       sendMailUser($data, base64_encode($insert_id));
       // sendMailRecommender($data, base64_encode($insert_id));
       sendMailAdmin($data, base64_encode($insert_id));
     }else{
       sendMailUserReopened($data, base64_encode($insert_id));
       sendMailAdminReopened($data, base64_encode($insert_id)); 
     }
  header("location:".SITE_URL."membership.php?success=true");
 }
  } else {
    print_r($ModelCall->getLastError());
  }
  exit;

}


if($_POST['ActionCall']=='AutoSave'){
  $data = array(
    "serialno" => isset($_POST['serialno']) ? $_POST['serialno'] : '',
    "userid" => isset($_POST['userid']) ? $_POST['userid'] : NULL,
    "title_1" => isset($_POST['title_1']) ? $_POST['title_1'] : '',
    "tenant_other_title" => isset($_POST['tenant_other_title']) ? $_POST['tenant_other_title'] : '',
    "tenant_first_name" => isset($_POST['tenant_first_name']) ? $_POST['tenant_first_name'] : '',
    "tenant_middle_name" => isset($_POST['tenant_middle_name']) ? $_POST['tenant_middle_name'] : '',
    "tenant_last_name" => isset($_POST['tenant_last_name']) ? $_POST['tenant_last_name'] : '',
    "title_2" => isset($_POST['title_2']) ? $_POST['title_2'] : '',
    "father_other_title" => isset($_POST['father_other_title']) ? $_POST['father_other_title'] : '',
    "father_first_name" => isset($_POST['father_first_name']) ? $_POST['father_first_name'] : '',
    "father_middle_name" => isset($_POST['father_middle_name']) ? $_POST['father_middle_name'] : '',
    "father_last_name" => isset($_POST['father_last_name']) ? $_POST['father_last_name'] : '',
    "block_prime" => isset($_POST['block_prime']) ? $_POST['block_prime'] : '',
    "house_number" => isset($_POST['house_number']) ? $_POST['house_number'] : '',
    "floor_prime" => isset($_POST['floor_prime']) ? $_POST['floor_prime'] : '',
    "address_corres_1" => isset($_POST['address_corres_1']) ? $_POST['address_corres_1'] : '',
    "address_corres_2" => isset($_POST['address_corres_2']) ? $_POST['address_corres_2'] : '',
    "city" => isset($_POST['city']) ? $_POST['city'] : '',
    "state" => isset($_POST['state']) ? $_POST['state'] : '',
    "pin" => isset($_POST['pin']) ? $_POST['pin'] : '',
    "dob" => isset($_POST['dob']) ? date('Y-m-d', strtotime( $_POST['dob'])) : '',
    "occupation" => isset($_POST['occupation']) ? $_POST['occupation'] : '',
    "emailid_1" => isset($_POST['emailid_1']) ? $_POST['emailid_1'] : '',
    "isd_1" => isset($_POST['isd_1']) ? $_POST['isd_1'] : '',
    "mobile" => isset($_POST['mobile']) ? $_POST['mobile'] : '',
    "isd_2" => isset($_POST['isd_2']) ? $_POST['isd_2'] : '', 
    "phone" => isset($_POST['phone']) ? $_POST['phone'] : '',
    "doc_type_poi" => isset($_POST['doc_type_poi']) ? $_POST['doc_type_poi'] : '' ,
    "doc_type_poa" => isset($_POST['doc_type_poa']) ? $_POST['doc_type_poa'] :'' ,
    "doc_type_pdob" => isset($_POST['doc_type_pdob']) ? $_POST['doc_type_pdob'] :'' ,
    "doc_type_ownership" => isset($_POST['doc_type_ownership']) ? $_POST['doc_type_ownership'] : '' ,
     "poi_other_title" => isset($_POST['poi_other_title']) ? $_POST['poi_other_title'] : '' ,
    "poa_other_title" => isset($_POST['poa_other_title']) ? $_POST['poa_other_title'] :  '' ,
    "pdob_other_title" => isset($_POST['pdob_other_title']) ? $_POST['pdob_other_title'] : '' ,
    "ownership_other_title" => isset($_POST['ownership_other_title']) ? $_POST['ownership_other_title'] : '' ,
    "mode_of_payment_1" => isset($_POST['mode_of_payment_1']) ? $_POST['mode_of_payment_1'] : '',
    "reference_number_1" => isset($_POST['reference_number_1']) ? $_POST['reference_number_1'] : '',
    "payment_date_1" => isset($_POST['payment_date_1']) ? date('Y-m-d', strtotime( $_POST['payment_date_1'])) : '',
    "amount_1" => isset($_POST['amount_1']) ? $_POST['amount_1'] : '',
    "mode_of_payment_2" => isset($_POST['mode_of_payment_2']) ? $_POST['mode_of_payment_2'] : '',
    "reference_number_2" => isset($_POST['reference_number_2']) ? $_POST['reference_number_2'] : '',
    "payment_date_2" => isset($_POST['payment_date_2']) ? $_POST['payment_date_2'] : '',
    "amount_2" => isset($_POST['amount_2']) ? $_POST['amount_2'] : '',
    "recommend_name" => isset($_POST['recommend_name']) ? $_POST['recommend_name'] : '',
    "recommend_father_fname" => isset($_POST['recommend_father_fname']) ? $_POST['recommend_father_fname'] : '',
    "age" => isset($_POST['age']) ? $_POST['age'] : '',
    "rec_per_name" => isset($_POST['rec_per_name']) ? $_POST['rec_per_name'] : '',
    "rec_per_title" => isset($_POST['rec_per_title']) ? $_POST['rec_per_title'] : '',
    "rec_per_title_opt" => isset($_POST['rec_per_title_opt']) ? $_POST['rec_per_title_opt'] : '',
    "rec_per_fname" => isset($_POST['rec_per_fname']) ? $_POST['rec_per_fname'] : '',
    "rec_per_mname" => isset($_POST['rec_per_mname']) ? $_POST['rec_per_mname'] : '',
    "rec_per_lname" => isset($_POST['rec_per_lname']) ? $_POST['rec_per_lname'] : '',
    "membership_number" => isset($_POST['membership_number']) ? $_POST['membership_number'] : '',
    "rec_userid" => isset($_POST['rec_userid']) ? $_POST['rec_userid'] : '',
    "block_rec" => isset($_POST['block_rec']) ? $_POST['block_rec'] : '',
    "house_number_rec" => isset($_POST['house_number_rec']) ? $_POST['house_number_rec'] : '',
    "floor_rec" => isset($_POST['floor_rec']) ? $_POST['floor_rec'] : '',
    "rec_other_emailid" => isset($_POST['rec_other_emailid']) ? $_POST['rec_other_emailid'] : '',
    "rec_other_phone" => isset($_POST['rec_other_phone']) ? $_POST['rec_other_phone'] : '',
     "member_type" => isset($_POST['member_type']) ? $_POST['member_type'] : '',
  );



if($_POST['applicationid']==""){
     $data['approved_status']='0';
      $data['recc_approved']='Yes';
     $res = $ModelCall->insert('Wo_Membership', $data);
}else{
      $ModelCall->where("id", $_POST['applicationid']);
      $rec = $ModelCall->get('Wo_Membership');
       if($rec[0]['approved_status']!='Pending' && $rec[0]['approved_status']!='0'){
          $data['approved_status']='Reopened';
      }else{
          $data['approved_status']='Pending'; 
      }
      
      $ModelCall->where("id", $_POST['applicationid']);
     $res = $ModelCall->update('Wo_Membership', $data);
}
 //print_r($data);

  if ($res) {
  $insert_id = $ModelCall->getLastInsertId();
  echo $insert_id;
  } else {
    print_r($ModelCall->getLastError());
  }
  exit(0);

}

if($_POST['ActionCall']=='getRecommender'){
    $house_number= $_POST['house_rec'];
     $block_id= $_POST['block_rec'];
     $floor_number= $_POST['floor_rec'];
    	switch( $floor_number){
	    case "GF":
       $floor='1';
        break;
         case "FF":
         $floor='2';
        break;
        case "SF":
        $floor='3';
        break;
          case "TF":
        $floor='4';
        break;
         default:
        $floor='0';
        break;
	}
	  $ModelCall->where("block_id", $block_id);
	  $ModelCall->where("house_number_id", $house_number);
	  $ModelCall->where("floor_number", $floor);
	  $ModelCall->where("user_type", "0");
     $res = $ModelCall->get('Wo_Users');
     
     if( $res){
       echo json_encode($res);
     }else{
        echo "0";
     }
}


if($_POST['ActionCall']=='ChangeStatusRecommender'){
    $id = $_POST['applicationid'];
    
    $data = array();
    $ModelCall->where("id",  $id);
    $rec= $ModelCall->get("Wo_Membership");
    
    if($rec[0]['rec_userid'] != $_POST['rec_userid']) {
        echo "-1";
        exit(0);
    }
    
    $data['recc_approved'] = $_POST['recc_approved'];
    $data['rec_remarks'] = $_POST['rec_remarks'];
    $data['recomm_date'] = date('Y-m-d H:i:s');
    
    $ModelCall->where("id",  $id );
    $result= $ModelCall->update("Wo_Membership", $data);
   
    if($result){
        if($_POST['recc_approved']=='Yes'){
             sendMailAdmin($rec[0], base64_encode($id));
        }
           mailToUserStatus($rec[0], base64_encode($id), $_POST);
     echo $result;
    }else{
     echo $result;
    }
    exit(0);
}


if($_POST['ActionCall']=='ChangeStatusEC'){
    $id = $_POST['applicationid'];
    
    $data = array();
    $ModelCall->where("id",  $id);
    $rec= $ModelCall->get("Wo_Membership");
    

    $data['approved_status'] = $_POST['approved_status'];
    $data['approved_by'] = $_POST['approved_by'];
    $data['ec_approve_date'] = date('Y-m-d H:i:s');
    $data['comments'] = $rec[0]['comments'].  "Comment: ". $_POST['comments']."- Added by EC on ".date('Y-m-d H:i:s')."<br>";
    
    $ModelCall->where("id",  $id );
    $result= $ModelCall->update("Wo_Membership", $data);
   
    if($result){
        if($_POST['approved_status']=='EC Approved'){
              mailToUserOnApprovedEC($rec[0],  $_POST, base64_encode($rec[0]['id']));
              mailToAdminOnApprovedEC($rec[0],  $_POST, base64_encode($rec[0]['id']));
        }else{
              mailToUser($rec[0], $_POST, base64_encode($rec[0]['id']));
        // mailToUserStatus($rec[0], base64_encode($id), $_POST);
        }
     echo $result;
    }else{
     echo $result;
    }
    exit(0);
}



function sendMailAdmin($details, $url) {
  //$to = 'techlead@myrwa.online,kushalbhasin@gmail.com';
 $to = 'office.nrwa@nirvanacountry.co.in';
  $subject = 'NRWA Application Pending Admin Approval';
  $from = 'website.admin@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear Sir/ Madam,</p>';
  
 if($details['title_1']=='other'){
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
   You have received the membership form by '.$details['tenant_other_title'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).'  and the same is pending your approval. </p>';
   }else{
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  You have received the membership form by '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).'  and the same is pending your approval.  </p>';
   }
 $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">You may <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a> to review the same and attached documents and process the same further. </p>';
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Documents submitted with the membership request.  

 </p><ol type="1">';
  if($details['proof_of_identity']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof of Identity - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
  }
   if($details['proof_of_address']!=''){
    $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof of Address - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
   }
    if($details['proof_of_dob']!=''){
  $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof Of Date Of Birth - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
   }
     if($details['ownership_proof']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Ownership Proof - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
    }
    if($details['photograph_user']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Photograph - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
    }
  $message .= '</ol>
      <span style="text-align:center"> Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}

function sendMailAdminReopened($details, $url) {
  $to = 'office.nrwa@nirvanacountry.co.in';
  $subject = 'NRWA Membership Form Submitted';
  $from = 'website.admin@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
   'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear Sir/ Madam,</p>';
  
 if($details['title_1']=='other'){
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
   You have received the revised membership form by '.$details['tenant_other_title'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).'  and the same is pending your review. </p>';
   }else{
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  You have received the revised membership form by '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).'  and the same is pending your review.  </p>';
   }
 $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">You may <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a> to review the same and attached documents and process the same further. </p>';
 if($details['proof_of_identity']!='' || $details['proof_of_address']!='' || $details['proof_of_dob']!='' || $details['ownership_proof']!='' || $details['photograph_user']!=''){
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Documents submitted with the membership request: </p><ol type="1">';
  if($details['proof_of_identity']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof of Identity - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
  }
   if($details['proof_of_address']!=''){
    $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof of Address - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
   }
    if($details['proof_of_dob']!=''){
  $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Proof Of Date Of Birth - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
   }
     if($details['ownership_proof']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Ownership Proof - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
    }
    if($details['photograph_user']!=''){
   $message .= '<li style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Photograph - <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">click here</a></li>';
    }
  $message .= '</ol>';
 } 
       $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"><span style="text-align:center"> Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  </p>';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}

function sendMailRecommender($details, $url) {
   $to = 'techlead@myrwa.online,kushalbhasin@gmail.com';
  //$to = 'techlead@myrwa.online';
  $subject = 'Application for Recommendation-  Membership Application';
  $from = 'website.admin@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
   'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['rec_per_title'].' '.ucfirst($details['rec_per_fname']).' '.ucfirst($details['rec_per_mname']).' '.ucfirst($details['rec_per_lname']).',</p>';
  
 if($details['title_1']=='other'){
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
   NRWA membership form has been submitted by '.$details['tenant_other_title'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).' and has suggested your name for Recommender. Kindly review the application and grant your recommendation. <a href="'.SITE_URL.'membership.php?fid='.$url.'&view-mode=R">click here</a>. </p>';
   }else{
   $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
    NRWA membership form has been submitted by '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_middle_name']).' '.ucfirst($details['tenant_last_name']).' and has suggested your name for Recommender. Kindly review the application and grant your recommendation.  <a href="'.SITE_URL.'membership.php?fid='.$url.'&view-mode=R">click here</a>. </p>';
   }

  $message .= '<span style="text-align:center"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}



function sendMailUser($details, $formID) {
  // $to = 'iamvineettiwari012@gmail.com,arit.p19@imi.edu';
     $to = $details['emailid_1'];
  //if (isset($details['user_email']) && $details['user_email'] != '') {
  //  $to .= ',' . $details['user_email'];
  //}
  $subject = 'NRWA Membership Form Submitted';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
  'X-Mailer: PHP/' . phpversion();


  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_last_name']).',</p>
 
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">We have received your application for the membership of Nirvana Residents\' Welfare Association and thank you for the same. We will review the same and send for the approval of the President/ Secretary.</p>
  
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
  You may visit <a href="'.SITE_URL.'membership.php?fid='.$formID.'">NRWA Online</a>  to view your application, or check its current status. We also keep intimated of its progress via email.
  
  </p> ';
  
  $message .= '<span style="text-align:center">Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>';
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}

function sendMailUserReopened($details, $formID) {
  // $to = 'iamvineettiwari012@gmail.com,arit.p19@imi.edu';
   $to = $details['emailid_1'];
  //if (isset($details['user_email']) && $details['user_email'] != '') {
  //  $to .= ',' . $details['user_email'];
  //}
  $subject = 'NRWA Membership under process';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_last_name']).',</p>
 
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Thank you for resubmitting your application for the membership of 
  Nirvana Residents\' Welfare Association. We have received your revised application and the same will be reviewed by the office for completeness and accuracy of documents submitted. 
  Once done, the office will approve the same and send for the approval of the President/ Secretary.</p>
  
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">
  You may <a href="'.SITE_URL.'membership.php?fid='.$formID.'">click here </a> anytime to see the current status of your application or to view the submitted application and information.
  </p>
  
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">You will be intimated of the progress at each stage and finally, once the ICard is ready.</p>
  ';
  
  $message .= '<span style="text-align:center">Warm Regards, <br><br>
NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>';
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';

  mail($to, $subject, $message, $headers);
}

function mailToUserStatus($details, $url, $form_details) {
  $to = $details['emailid_1'];
  $subject = 'Status Update : Your Membership Form';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body><table style="border-collapse:collapse" width="800" cellspacing="0" cellpadding="0" border="0" align="center">
   <tbody><tr><td style="word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px" valign="top">';


 if(isset($form_details['approved_status'])){
   $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Dear '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_last_name']).',</p>';
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Your Membership Application with serial No.'.$user_details['serialno'].' has been <b>'.$form_details['approved_status'].'</b> with the following comment - <br>'.$form_details['comments'].'. You can see view your membership form - <a href="'.SITE_URL.'membership.php?fid='.$url.'"> here</a>.</p>';
   $message .= '<span style="text-align:center"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';

} else {
    if($form_details['recc_approved']=="Yes"){
        $status="Approved";
    }else{
       $status="Rejected";  
    }
    $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['title_1'].' '.ucfirst($details['tenant_first_name']).' '.ucfirst($details['tenant_last_name']).',</p>';
 $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Your Membership Application with serial No.'.$user_details['serialno'].' has been <b>'.$status.'</b> with the following comment - '.$form_details['rec_remarks'].'. You can see view your membership form - <a href="'.SITE_URL.'membership.php?fid='.$url.'"> here</a>.</p>';
  $message .= '<span style="text-align:center"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
}
  mail($to, $subject, $message, $headers);
}

function mailToUserOnApprovedEC($user_details, $form_details, $url) {
    $to = $user_details['emailid_1'];
// $to ='techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = 'NRWA Membership Approved';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership Application has been been approved NRWA President/ Secretary. The membership number will be allotted to you by NRWA Office soon. You will be intimated on the same.
  <br><br>You will be able to print the Membership Card or save as PDF from the link provided to you on mail.</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  You may visit <a href="'.SITE_URL.'membership.php">NRWA Online</a> to view your application, or check its current status. We also keep intimated of its progress via email. 
   </p>';
  
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}



function mailToAdminOnApprovedEC($user_details, $form_details, $url) {
 $to ='office.nrwa@nirvanacountry.co.in';
  $subject = 'NRWA Membership Approved by NRWA President/ Secretary';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
   'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Dear Sir,</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  The NRWA Membership Application has been been approved NRWA President/ Secretary for '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).'. 
  Kindly process the membership number.</p>';
  
  $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  You may visit <a href="'.SITE_URL.'RWAVendor/membership_application_status.php">NRWA Admin Login</a> to view the application, or check its current status and update the membership Number for the apploication. 
   </p>';
  
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 Website Admin <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}



function mailToUser($user_details, $form_details, $url) {
      $to = $user_details['emailid_1'];
  //$to ='techlead@myrwa.online,kushalbhasin@gmail.com';
  $subject = 'Status Update : Membership Form';
  $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'Bcc: techlead@myrwa.online,kushalbhasin@gmail.com' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: office.nrwa@nirvanacountry.co.in'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Dear '.$user_details['title_1'].' '.ucfirst($user_details['tenant_first_name']).' '.ucfirst($user_details['tenant_last_name']).',</p>';
  
    $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
  Your NRWA Membership Application (# '.$user_details['serialno'].') has been '.$form_details['approved_status'].',  with the following comments -<br>
  '.$form_details['comments'].'.</p>';
  
    $message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify">
    You can visit <a href="'.SITE_URL.'membership.php">Nirvana Online</a> to resubmit the same with the changes.</p>';
   $message .= '<span style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify"> Warm Regards, <br><br>
 NRWA Office <br>
<a href="http://www.nirvanacountry.co.in" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.nirvanacountry.co.in&amp;source=gmail&amp;ust=1594469405341000&amp;usg=AFQjCNHD6CV19XQ5YQ7SYk0-KuKgnYBuLg">www.nirvanacountry.co.in</a> <br></span>
  ';
$message .= '<p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:13px;line-height:24px;text-align:justify">p.s. - This (website.admin) is an automated mail box. For any help, support or queries, please write to
office.nrwa@nirvanacountry.co.in.'.'.</p>';
  $message .= '</body>
  </html>';
  mail($to, $subject, $message, $headers);
}

/**
 * Resize image given a height and width and return raw image data.
 *
 * Note : You can add more supported image formats adding more parameters to the switch statement.
 *
 * @param type $file filepath
 * @param type $w width in px
 * @param type $h height in px
 * @param type $crop Crop or not
 * @return type
 */
function resize_image($file, $w, $h, $crop=false) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    
    //Get file extension
    $exploding = explode(".",$file);
    $ext = end($exploding);
    
    switch($ext){
        case "png":
            $src = imagecreatefrompng($file);
        break;
        case "jpeg":
        case "jpg":
            $src = imagecreatefromjpeg($file);
        break;
        case "gif":
            $src = imagecreatefromgif($file);
        break;
        default:
            $src = imagecreatefromjpeg($file);
        break;
    }
    
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}


?>