<?php
//require "../model/config.php";
require "../model/class.expert.php";

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

/*print_r($_POST);*/

date_default_timezone_set("Asia/Kolkata");

$current_date = date('Y-m-d H:i:s');

// $database = new Database();
// $db = $database->connect();

function getBlock($block_id) {
  $block = $block_id;
  if ($block_id == "1") {
    $block = "AG";
  } else if ($block_id == "2") {
    $block = "BC";
  } else if ($block_id == "3") {
    $block = "CC";
  } else if ($block_id == "4") {
    $block = "DW";
  } else if ($block_id == "5") {
    $block = "ES";
  }

  return $block;
}

function getFloor($floor_number) {
  if ($floor_number == "NA") {
    return "";
  }

  return $floor_number;
}



function sendMailAdmin($details, $url) {
	 /*$to = 'iambommanakavya@gmail.com';*/
 $to = 'iambommanakavya@gmail.com,techlead@myrwa.online';
  $subject = 'Plasma Donor Registration Form ';
  
 if (isset($details['user_email']) && $details['user_email'] != '') {
    $from = $details['user_email'];
  }else {
   $from = 'office.nrwa@nirvanacountry.co.in';
  }
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = "<table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            ";

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear Sir,</p>

  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">The new Plasma Donor application have been submitted by, '.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).'</p>
  Kindly review the same by <a href="'.SITE_URL.'Plasma_Form_new.php?uid='.$url.'">clicking here</a>';
  
  $message .= 'Details as Below :
  
  <table>
  
  <tbody>
  <tr>
  <td>Name </td>
  <td>:</td>
  <td>'.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).'</td>
  </tr>
  <tr>
   <td >Blood Group </td>
  <td>:</td>
  <td>'.$details['first_blood_group'].'</td>
  </tr>
    <tr>
   <td >Days Since Tested + ve </td>
  <td>:</td>
  <td>'.$covid_positive_days.'</td>
  </tr>';
  
  if($details["fname_second"] <> NULL || $details["fname_second"] <> ""){
      $message .=
   '<tr>
  <td>Name </td>
  <td>:</td>
  <td>'.$details['title_second'].' '.ucfirst($details['fname_second']).' '.ucfirst($details['mname_second']).' '.ucfirst($details['lname_second']).'</td>
  </tr>
  <tr>
   <td >Blood Group </td>
  <td>:</td>
  <td>'.$details['second_blood_group'].'</td>
  </tr>
    <tr>
   <td width="30px">Days Since Tested + ve </td>
  <td>:</td>
  <td>'.$covid_positive_days.'</td>
  </tr>';
  };
   
   
  if($details["fname_third"] <> NULL || $details["fname_third"] <> ""){
      $message .=
   '<tr>
  <td>Name </td>
  <td>:</td>
  <td>'.$details['title_third'].' '.ucfirst($details['fname_third']).' '.ucfirst($details['mname_third']).' '.ucfirst($details['lname_third']).'</td>
  </tr>
  <tr>
   <td >Blood Group </td>
  <td>:</td>
  <td>'.$details['third_blood_group'].'</td>
  </tr>
    <tr>
   <td >Days Since Tested + ve </td>
  <td>:</td>
  <td>'.$covid_positive_days.'</td>
  </tr>';
  };
  
  
   $message .='<tr>
   <td >Address	</td>
  <td>:</td>
  <td>'.getBlock($details['block_id']).'-'.$details['house_number'].' '.getFloor($details['floor_no']).', Nirvana Country, Gurgaon - 122018</td>
  </tr>
    <tr>
   <td >Mobile Number	</td>
  <td>:</td>
  <td>'.$details['isd_code'].'-'.$details['phone_number'].'</td>
  </tr>
    <tr>
   <td >Email Address	</td>
  <td>:</td>
  <td> '.$details['user_email'].'</td>
  </tr>
  ';
  

  $message .= '</tbody>
  
  </table>';
 
 $message .= ' <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Warm Regards</p>
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
  ';

    $message .= '</span>
        </span></p></td></tr></tbody></table>';
    "CC: kushalbhasin@gmail.com";
  mail($to, $subject, $message, $headers);
}




function sendMailUser($details,$covid_positive_days,$plasma_donar) {
  /*$to = 'iambommanakavya@gmail.com';*/
  $to = 'iambommanakavya@gmail.com,techlead@myrwa.online';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
  $subject = 'Your Plasma Donor Registration Form Submitted';
  $from = 'office.nrwa@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = "<table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            ";

  $message .= '
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Dear '.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).',</p>
  <p style="margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left">Thank you for agreeing to be a Plasma Donor. Your gesture can save a life. <br><br> The office has received your information as below : </p>';
  
  
  
  $message .= '
  
  <table>
  
  <tbody>
  <tr>
  <td>Name </td>
  <td>:</td>
  <td>'.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).'</td>
  </tr>
  <tr>
   <td >Blood Group </td>
  <td>:</td>
  <td>'.$details['first_blood_group'].'</td>
  </tr>
    <tr>
   <td >Days Since Tested + ve </td>
  <td>:</td>
  <td>'.$covid_positive_days.'</td>
  </tr>';
  
  if($details["fname_second"] <> NULL || $details["fname_second"] <> ""){
      $message .=
   '<tr>
  <td>Name </td>
  <td>:</td>
  <td>'.$details['title_second'].' '.ucfirst($details['fname_second']).' '.ucfirst($details['mname_second']).' '.ucfirst($details['lname_second']).'</td>
  </tr>
  <tr>
   <td >Blood Group </td>
  <td>:</td>
  <td>'.$details['second_blood_group'].'</td>
  </tr>
    <tr>
   <td width="30px">Days Since Tested + ve </td>
  <td>:</td>
  <td>'.$covid_positive_days.'</td>
  </tr>';
  };
   
   
  if($details["fname_third"] <> NULL || $details["fname_third"] <> ""){
      $message .=
   '<tr>
  <td>Name </td>
  <td>:</td>
  <td>'.$details['title_third'].' '.ucfirst($details['fname_third']).' '.ucfirst($details['mname_third']).' '.ucfirst($details['lname_third']).'</td>
  </tr>
  <tr>
   <td >Blood Group </td>
  <td>:</td>
  <td>'.$details['third_blood_group'].'</td>
  </tr>
    <tr>
   <td >Days Since Tested + ve </td>
  <td>:</td>
  <td>'.$covid_positive_days.'</td>
  </tr>';
  };
  
  
   $message .='<tr>
   <td >Address	</td>
  <td>:</td>
  <td>'.getBlock($details['block_id']).'-'.$details['house_number'].' '.getFloor($details['floor_no']).', Nirvana Country, Gurgaon - 122018</td>
  </tr>
    <tr>
   <td >Mobile Number	</td>
  <td>:</td>
  <td>'.$details['isd_code'].'-'.$details['phone_number'].'</td>
  </tr>
    <tr>
   <td >Email Address	</td>
  <td>:</td>
  <td> '.$details['user_email'].'</td>
  </tr>
  ';
  

  $message .= '</tbody>
  
  </table>';
  $message .= '
  <p>The information has been posted online. <a href="http://www.nirvanacountry.co.in/covid-dashboard.php">https://www.nirvanacountry.co.in/covid-dashboard.php</a> <br><br>You may share the same with any one who needs assistance.  

</p>
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
</span></p></td></tr></tbody></table>';

"CC: kushalbhasin@gmail.com";
  mail($to, $subject, $message, $headers);
}

if (isset($_POST['save'])) {
  $ip = $_SERVER['REMOTE_ADDR'];

  $ModelCall->where("ip_address", $ip);
  $track_data = $ModelCall->get("tbl_form_tracker");

if (count($track_data) > 0) {
  $up_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "save_count" => intval($track_data[0]['save_count']) + 1,
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Self_Isolation_Form_Start"    
  );
  $ModelCall->where("ip_address", $ip);
  $ModelCall->update("tbl_form_tracker", $up_data);
} else {
  $insert_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "save_count" => "1",
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Self_Isolation_Form_Start"
  );
  $ModelCall->insert("tbl_form_tracker", $insert_data);
}

  $_SESSION['user_data'] = $_POST;
  header("Location: ../Plasma_Form.php?actionResult=saved");
} else if (isset($_POST['submit'])) {
  $ip = $_SERVER['REMOTE_ADDR'];

$ModelCall->where("ip_address", $ip);
$track_data = $ModelCall->get("tbl_form_tracker");

if (count($track_data) > 0) {
  $up_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "submit_count" => intval($track_data[0]['submit_count']) + 1,
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Self_Isolation_Form_Start"    
  );
  $ModelCall->where("ip_address", $ip);
  $ModelCall->update("tbl_form_tracker", $up_data);
} else {
  $insert_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "submit_count" => "1",
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Self_Isolation_Form_Start"
  );
  $ModelCall->insert("tbl_form_tracker", $insert_data);
}

/*=================================setting post data to variables=============================*/
$user_id_data = (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : NULL;
    $ip_address_data= $ip;
    $title_first_data = (isset($_POST['title_one'])) ? $_POST['title_one'] : NULL;
    $fname_first_data = (isset($_POST['fname_one'])) ? $_POST['fname_one'] : NULL;
    $mname_first_data = (isset($_POST['mname_one'])) ? $_POST['mname_one'] : NULL;
    $lname_first_data = (isset($_POST['lname_one'])) ? $_POST['lname_one'] : NULL;
    $title_second_data = (isset($_POST['title_second'])) ? $_POST['title_second'] : NULL;
    $fname_second_data = (isset($_POST['fname_second'])) ? $_POST['fname_second'] : NULL;
    $mname_second_data = (isset($_POST['mname_second'])) ? $_POST['mname_second'] : NULL;
    $lname_second_data = (isset($_POST['lname_second'])) ? $_POST['lname_second'] : NULL;
    $title_third_data = (isset($_POST['title_third'])) ? $_POST['title_third'] : NULL;
    $fname_third_data = (isset($_POST['fname_third'])) ? $_POST['fname_third'] : NULL;
    $mname_third_data = (isset($_POST['mname_third'])) ? $_POST['mname_third'] : NULL;
    $lname_third_data = (isset($_POST['lname_third'])) ? $_POST['lname_third'] : NULL;
    
    
    $first_age_data = (isset($_POST['age'])) ? $_POST['age'] : NULL;
    $second_age_data = (isset($_POST['age_second'])) ? $_POST['age_second'] : NULL;
    $third_age_data = (isset($_POST['age_thrd'])) ? $_POST['age_thrd'] : NULL;
    
    $first_gender_data = (isset($_POST['gender'])) ? $_POST['gender'] : NULL;
    $second_gender_data = (isset($_POST['gender_second'])) ? $_POST['gender_second'] : NULL;
    $third_gender_data = (isset($_POST['gender_thrd'])) ? $_POST['gender_thrd'] : NULL;
    
    $first_blood_group_data = (isset($_POST['bloodgroup'])) ? $_POST['bloodgroup'] : NULL;
    $second_blood_group_data = (isset($_POST['bloodgroup_second'])) ? $_POST['bloodgroup_second'] : NULL;
    $third_blood_group_data = (isset($_POST['bloodgroup_thrd'])) ? $_POST['bloodgroup_thrd'] : NULL;
    
    
    $positive_covid_test_data_d = strtotime($_POST['date_of_positive_covid_test']);
    
    $positive_covid_test_data = date('Y-m-d', $positive_covid_test_data_d); 
    
    $negative_covid_test_data_d = strtotime($_POST['date_of_negative_covid_test']);
    
    $negative_covid_test_data = date('Y-m-d', $negative_covid_test_data_d); 
   
    
   
    
    $block_id_data = (isset($_POST['block_id'])) ? $_POST['block_id'] : NULL;
    $house_number_data = (isset($_POST['house_number'])) ? $_POST['house_number'] : NULL;
    $floor_no_data = (isset($_POST['floor_number'])) ? $_POST['floor_number'] : NULL;
    $isd_code_data = (isset($_POST['isd'])) ? $_POST['isd'] : NULL;
    $phone_number_data = (isset($_POST['app_phone'])) ? $_POST['app_phone'] : NULL;
    $return_date_data = (isset($_POST['ret_date'])) ? $_POST['ret_date'] : NULL;
    $user_email_data = (isset($_POST['user_email'])) ? $_POST['user_email'] : NULL;
    $reg_date_data = $current_date;
    $app_date_data = (isset($_POST['app_date'])) ? $_POST['app_date'] : NULL;
    $start_date_data = (isset($_POST['start_date'])) ? $_POST['start_date'] : NULL;
    $place_data = (isset($_POST['place'])) ? $_POST['place'] : NULL;
    $reg_status_one_data= (isset($_POST['reg_status_one'])) ? $_POST['reg_status_one'] : NULL;
    $end_date_data = (isset($_POST['end_date'])) ? $_POST['end_date'] : NULL;
/*=============================================================================================*/

  $insert_data1 = array(
    "user_id" => $user_id_data,
    "ip_address" => $ip_address_data,
    "title_first" => $title_first_data,
    "fname_first" => $fname_first_data,
    "mname_first" => $mname_first_data,
    "lname_first" => $lname_first_data,
    "title_second" => $title_second_data,
    "fname_second" => $fname_second_data,
    "mname_second" => $mname_second_data,
    "lname_second" => $lname_second_data,
    "title_third" => $title_third_data,
    "fname_third" => $fname_third_data,
    "mname_third" => $mname_third_data,
    "lname_third" => $lname_third_data,
    
    
    "first_age" => $first_age_data,
    "second_age" => $second_age_data,
    "third_age" => $third_age_data,
    
    "first_gender" => $first_gender_data,
    "second_gender" => $second_gender_data,
    "third_gender" => $third_gender_data,
    
    "first_blood_group" => $first_blood_group_data,
    "second_blood_group" => $second_blood_group_data,
    "third_blood_group" => $third_blood_group_data,
    
    "positive_covid_test" => $positive_covid_test_data,
    "negative_covid_test" => $negative_covid_test_data,
    
    
    "block_id" => $block_id_data,
    "house_number" => $house_number_data,
    "floor_no" => $floor_no_data,
    "isd_code" => $isd_code_data,
    "phone_number" => $phone_number_data,
    "return_date" => $return_date_data,
    "user_email" => $user_email_data,
    "reg_date" => $reg_date_data,
    "app_date" => $app_date_data,
    "start_date" => $start_date_data,
    "place" => $place_data,
    "reg_status_one" => $reg_status_one_data,
    "end_date" => $reg_status_one_data,
    "is_plasma_donar" => (isset($_POST['plasma_donar'])) ? $_POST['plasma_donar'] : NULL
  );


    
  $ModelCall->insert("tbl_self_isolation_data_start", $insert_data1);
  
  $update_data = array(
      'is_plasma_donar' => (isset($_POST['plasma_donar'])) ? $_POST['plasma_donar'] : NULL,
      'bloodgroup' => $first_blood_group_data
      );
  $get_id = $_GET['id'];
  $ModelCall->where("id", $get_id);
  $ModelCall->update("covid_case_details", $update_data);
 // print_r($insert_data1);
//  print_r($ModelCall);
 // exit;
  //$insert_id = $ModelCall->getInsertId();
  
  $getMaxId = $ModelCall->rawQuery("SELECT max(id) as last_inserted_id FROM tbl_self_isolation_data_start ");
        foreach($getMaxId as $MaxId){
             $insert_id = $MaxId['last_inserted_id'];
        }

  $block = getBlock($insert_data['block_id']);

  $house_number = $insert_data['house_number'];

  if (strlen($insert_data['house_number']) == "1") {
    $house_number = '000'.$insert_data['house_number'];
  } else if (strlen($insert_data['house_number']) == "2") {
    $house_number = '00'.$insert_data['house_number'];
  } else if (strlen($insert_data['house_number']) == "3") {
    $house_number = '0'.$insert_data['house_number'];
  }

  $flat_number = $block . '-' . $house_number;
  $ModelCall->where("flat_no", $flat_number);
  $ModelCall->orderBy("actual_due_date", "DESC");
  $out_data = $ModelCall->get("tbl_billing_new");

  $outstanding_data = array();

  if($out_data[0]['total_outstanding'] > 0) {
    $outstanding_data['total_due'] = $out_data[0]['total_outstanding'];
    $outstanding_data['due_date'] = $out_data[0]['actual_due_date'];
    $outstanding_data['due_name'] = "CAM O/s";

    $_SESSION['due_error'] = $outstanding_data;
  }

  $floor_no_in = getFloor($insert_data['floor_no']);

  $itaq_data = array(
    "villa_number" => getBlock($insert_data['block_id']) . ' ' . $insert_data['house_number'] . ' ' . getFloor($insert_data['floor_no']),
    "quar_start_date" => date("d M y", strtotime($insert_data['app_date'])),
    "quar_end_date" => date("d M y", strtotime($insert_data['end_date'])),
    "remarks" => (strlen($insert_data['place']) > 0) ? 'Travelled from ' . $insert_data['place'] : ''
  );

  $ModelCall->insert('itaq_details', $itaq_data);

    $start = strtotime($insert_data1['positive_covid_test']);
          $end = strtotime(date("d M Y"));

            $covid_positive_days = ceil(abs($end - $start) / 86400);
            
            if($insert_data1['is_plasma_donar'] == 1){
                $plasma_donar = 'yes';
            }else{
                $plasma_donar = 'no';
            }
         
  sendMailUser($insert_data1,$covid_positive_days,$plasma_donar);
  sendMailAdmin($insert_data1, $insert_id);
  unset($_SESSION['user_data']);
  header("Location: ../Plasma_Form_new.php?uid=$get_id&actionResult=sent");
}
?>