<?php

require "../model/config.php";

require "../model/class.expert.php";



// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);



//print_r($_POST);



date_default_timezone_set("Asia/Kolkata");



$current_date = date('Y-m-d H:i:s');



$database = new Database();

$db = $database->connect();



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







function sendMailAdmin($details) {

	 $to = 'office.nrwa@nirvanacountry.co.in';

 // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';

 $subject = 'App: Self Isolation Form';
  //$from = 'iamvineettiwari013@gmail.com';

if (isset($details['user_email']) && $details['user_email'] != '') {
    $from= $details['user_email'];
  }else{
  $from = 'website.admin@nirvanacountry.co.in';
  }
  $headers  = 'MIME-Version: 1.0' . "\r\n";

  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  $headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();



  $message = '<html><body>';



  $message .= '
  <p>Dear Sir,</p><p> New application has been recieved for self isolation form and the details as follow : </p>';
  

  $message .= '

    <p>Name of Applicants : </p>

    <ol type="1">';



    if (isset($details['fname_first']) && $details['fname_first'] != '') {
      $message .= '<li>'.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).'</li>';
    }



    if (isset($details['fname_second']) && $details['fname_second'] != '') {
      $message .= '<li>'.$details['title_second'].' '.ucfirst($details['fname_second']).' '.ucfirst($details['mname_second']).' '.ucfirst($details['lname_second']).'</li>';
    }

    if (isset($details['fname_third']) && $details['fname_third'] != '') {
      $message .= '<li>'.$details['title_third'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_third']).' '.ucfirst($details['lname_third']).'</li>';
    }



  $message .= '</ol>

  ';



  $message .= '<p>Address : '.getBlock($details['block_id']).'-'.$details['house_number'].' '.getFloor($details['floor_number']).'</p>

  <p>Mobile Number : '.$details['isd_code'].'-'.$details['phone_number'].'</p>

  <p>Email Address : '.$details['user_email'].'</p>
  <p>Travelled from : '.$details['place'].'</p>
  <p>Registered with 104 : '.$details['reg_status_one'].'</p>
  <p>Date of return from foreign country / contact with COVID-19 affected person : '.$details['return_date'].'</p>

  <p>'.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).' have completed mandatory home quarantine period of 14 days on <b>'.date('d-m-Y', strtotime($details['app_date'])).'</b> and have not developed any symptoms of COVID 19such as fever, cough, sore throat, shortness of breath etc during this period,nor have I/Wecome in contact with any COVID 19 affected person during this period.<p>

  <p>Therefore, it is requested to remove the “COVID 19-HOME UNDER QUARANTINE” notice displayed at my house by Municipal Corporation, Gurugram.</p>

  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
  ';

    $message .= '</body>
    </html>';

  mail($to, $subject, $message, $headers);

}




function sendMailUser($details, $outstandings) {

   $to = 'office.nrwa@nirvanacountry.co.in';

 // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
 if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
   $subject = 'App: Self Isolation Form';
  $from = 'website.admin@nirvanacountry.co.in';

  $headers  = 'MIME-Version: 1.0' . "\r\n";

  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  $headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();



  $message = '<html><body>';



  $message .= '
  <p>Dear '.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).',</p>
  <p>The office has recieved your application as below and same is being processed.</p>';

  

  $message .= '

    <p>Name of Applicants : </p>

    <ol type="1">';



    if (isset($details['fname_first']) && $details['fname_first'] != '') {
      $message .= '<li>'.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).'</li>';
    }

    if (isset($details['fname_second']) && $details['fname_second'] != '') {
      $message .= '<li>'.$details['title_second'].' '.ucfirst($details['fname_second']).' '.ucfirst($details['mname_second']).' '.ucfirst($details['lname_second']).'</li>';
    }

    if (isset($details['fname_third']) && $details['fname_third'] != '') {
      $message .= '<li>'.$details['title_third'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_third']).' '.ucfirst($details['lname_third']).'</li>';
    }



  $message .= '</ol>

  ';



  $message .= '<p>Address : '.getBlock($details['block_id']).'-'.$details['house_number'].' '.getFloor($details['floor_number']).'</p>

  <p>Mobile Number : '.$details['isd_code'].'-'.$details['phone_number'].'</p>

  <p>Email Address : '.$details['user_email'].'</p>
  <p>Travelled from : '.$details['place'].'</p>
  <p>Registered with 104 : '.$details['reg_status_one'].'</p>
  <p>Date of return from foreign country / contact with COVID-19 affected person : '.$details['return_date'].'</p>

  <p>I/We have completed mandatory home quarantine period of 14 days on <b>'.date('d-m-Y', strtotime($details['app_date'])).'</b> and have not developed any symptoms of COVID 19such as fever, cough, sore throat, shortness of breath etc during this period,nor have I/Wecome in contact with any COVID 19 affected person during this period.<p>

  <p>Therefore, it is requested to remove the “COVID 19-HOME UNDER QUARANTINE” notice displayed at my house by Municipal Corporation, Gurugram.</p>
  ';



if (count($outstandings) > 0) {

  $message .= '<p>Also, we would like to remind you to complete the following due from your end.</p>';

  $message .= '<table>

  <tr>

     <th>Due Name</th>

     <th>Due Date</th>

     <th>Due Amount</th>

     <th>Pay</th>

  </tr>

  <tr>

     <td><p>'.$outstandings['due_name'].'</p></td>

     <td><p>'.$outstandings['due_date'].'</p></td>

     <td><p>'.$outstandings['total_due'].'</p></td>

     <td><p><a href="http://therwa.mvegex.com/bills.php">Click to pay</a></p></td>

  </tr>

  </table>';

}

    $message .= '
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p></body>
    </html>';



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

    "form_name" => "Self_Isolation_Form"    

  );

  $ModelCall->where("ip_address", $ip);

  $ModelCall->update("tbl_form_tracker", $up_data);

} else {

  $insert_data = array(

    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',

    "ip_address" => $ip,

    "save_count" => "1",

    "reg_date" => date('y-m-d H:i:s'),

    "form_name" => "Self_Isolation_Form"

  );

  $ModelCall->insert("tbl_form_tracker", $insert_data);

}



  $_SESSION['user_data'] = $_POST;

  header("Location: ../self_isolation_form.php?actionResult=saved");

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

    "form_name" => "Self_Isolation_Form"    

  );

  $ModelCall->where("ip_address", $ip);

  $ModelCall->update("tbl_form_tracker", $up_data);

} else {

  $insert_data = array(

    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',

    "ip_address" => $ip,

    "submit_count" => "1",

    "reg_date" => date('y-m-d H:i:s'),

    "form_name" => "Self_Isolation_Form"

  );

  $ModelCall->insert("tbl_form_tracker", $insert_data);

}



  $insert_data_new = array(

    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '',

    "ip_address" => $ip,
    "title_first" => isset($_POST['title_one']) ? $_POST['title_one'] : '',
    "fname_first" => isset($_POST['fname_one']) ? $_POST['fname_one'] : '',
    "mname_first" => isset($_POST['mname_one']) ? $_POST['mname_one'] : '',
    "lname_first" => isset($_POST['lname_one']) ? $_POST['lname_one'] : '',
    "title_second" => isset($_POST['title_second']) ? $_POST['title_second'] : '',
    "fname_second" => isset($_POST['fname_second']) ? $_POST['fname_second'] : '',
    "mname_second" => isset($_POST['mname_second']) ? $_POST['mname_second'] : '',
    "lname_second" => isset($_POST['lname_second']) ? $_POST['lname_second'] : '',
    "title_third" => isset($_POST['title_third']) ? $_POST['title_third'] : '',
    "fname_third" => isset($_POST['fname_third']) ? $_POST['fname_third'] : '',
    "mname_third" => isset($_POST['mname_third']) ? $_POST['mname_third'] : '',
    "lname_third" => isset($_POST['lname_third']) ? $_POST['lname_third'] : '',
    "block_id" => $_POST['block_id'],

    "house_number" => $_POST['house_number'],

    "floor_no" => $_POST['floor_number'],

    "isd_code" => $_POST['isd'],

    "phone_number" => $_POST['app_phone'],

    "return_date" => $_POST['ret_date'],

    "app_date" => $_POST['tod_date'],

    "user_email" => $_POST['user_email'],
    "reg_date" => $current_date,
    "reg_status_one" => $_POST['reg_status_one'],
    "place" => $_POST['place']
  );

  $ModelCall->insert("tbl_self_isolation_data", $insert_data_new);

  $block = getBlock($insert_data_new['block_id']);

  $house_number = $insert_data_new['house_number'];

  if (strlen($insert_data_new['house_number']) == "1") {
    $house_number = '000'.$insert_data_new['house_number'];
  } else if (strlen($insert_data_new['house_number']) == "2") {
    $house_number = '00'.$insert_data_new['house_number'];
  } else if (strlen($insert_data_new['house_number']) == "3") {
    $house_number = '0'.$insert_data_new['house_number'];
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

  sendMailUser($insert_data_new, $outstanding_data);

  sendMailAdmin($insert_data_new);

  unset($_SESSION['user_data']);

  header("Location: ../self_isolation_form.php?actionResult=sent");

}

?>