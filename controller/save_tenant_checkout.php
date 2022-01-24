<?php
require "../model/config.php";
require "../model/class.expert.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

print_r($_POST);

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



function sendMailAdmin($details, $url) {
$to="office.nrwa@nirvanacountry.co.in";
  //$to = 'iamvineettiwari012@gmail.com, arit.p19@imi.edu';
  // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  $subject = 'Tenant Checkout Request';
   if (isset($details['user_email']) && $details['user_email'] != '') {
     $from=$details['user_emal'];
  }else{
    $from = 'website.admin@nirvanacountry.co.in';
  }
  

 // $from = 'iamvineettiwari013@gmail.com';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '
  <p>Dear Sir,</p>

  <p>This is to inform you, that '.$details['title_one'].' '.ucfirst($details['fname_one']).' '.ucfirst($details['mname_one']).' '.ucfirst($details['lname_one']).' of  '.getBlock($details['block_id']).' '.$details['house_number'].' '.getFloor($details['floor_number']).', Nirvana Country, Gurgaon - 122018, has / have submitted the <a href="'.SITE_URL.'tenant_checkout_form.php?fid='.$url.'">Checkout Form</a> initmating you of their moving out from Nirvana.</p>

  <p>To approve the request <a href="'.SITE_URL.'tenant_checkout_form_approve.php?fid='.$url.'">Click Here</a>.<p>

  
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
  ';

    $message .= '</body>
    </html>';

  mail($to, $subject, $message, $headers);
}




function sendMailUser($details, $outstandings) {
  //$to = 'iamvineettiwari012@gmail.com, arit.p19@imi.edu';
  // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to = $details['user_email'];
  }else{
    $to = 'office.nrwa@nirvanacountry.co.in';
  }
  $subject = 'Your Tenant Checkout Request Is Submitted';
   $from = 'website.admin@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '
  <p>Dear '.$details['title_one'].' '.ucfirst($details['fname_one']).' '.ucfirst($details['mname_one']).' '.ucfirst($details['lname_one']).',</p>
  <p>The office has recieved your application as below and same is being processed.</p>';
  
  $message .= '
    <p>Name of Applicants : </p>
    <ol type="1">';

    if (isset($details['fname_one']) && $details['fname_one'] != '') {
      $message .= '<li>'.$details['title_one'].' '.ucfirst($details['fname_one']).' '.ucfirst($details['mname_one']).' '.ucfirst($details['lname_one']).'</li>';
    }

    if (isset($details['fname_second']) && $details['fname_second'] != '') {
      $message .= '<li>'.$details['title_second'].' '.ucfirst($details['fname_second']).' '.ucfirst($details['mname_second']).' '.ucfirst($details['lname_second']).'</li>';
    }

    if (isset($details['fname_third']) && $details['fname_third'] != '') {
      $message .= '<li>'.$details['title_third'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_third']).' '.ucfirst($details['lname_third']).'</li>';
    }

  $message .= '</ol>
  ';

  $message .= '<p>Address : '.getBlock($details['block_id']).'-'.$details['house_number'].' '.getFloor($details['floor_no']).', Nirvana Country, Gurgaon - 122018</p>
  <p>Mobile Number : '.$details['isd_code'].'-'.$details['phone_number'].'</p>
  <p>Email Address : '.$details['user_email'].'</p>
  <p>Outing date : '.date("d-m-Y", strtotime($details['move_out_date'])).'</p>
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
     <td><p><a href="'.SITE_URL.'bills.php">Click to pay</a></p></td>
  </tr>
  </table>';
}

    $message .= '
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
    </body>
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
    "form_name" => "Tenant_Checkout_Form"    
  );
  $ModelCall->where("ip_address", $ip);
  $ModelCall->update("tbl_form_tracker", $up_data);
} else {
  $insert_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "save_count" => "1",
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Tenant_Checkout_Form"
  );
  $ModelCall->insert("tbl_form_tracker", $insert_data);
}

  $_SESSION['user_data'] = $_POST;
  header("Location: ../tenant_checkout_form.php?actionResult=saved");
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
    "form_name" => "Tenant_Checkout_Form"    
  );
  $ModelCall->where("ip_address", $ip);
  $ModelCall->update("tbl_form_tracker", $up_data);
} else {
  $insert_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "submit_count" => "1",
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Tenant_Checkout_Form"
  );
  $ModelCall->insert("tbl_form_tracker", $insert_data);
}

  $insert_data = $_POST;
  unset($insert_data['submit']);

  $ModelCall->insert("tbl_tenant_checkout", $insert_data);
  $insert_id = $ModelCall->getInsertId();

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

  $floor_no_in = getFloor($insert_data['floor_number']);

  sendMailUser($insert_data, $outstanding_data);
  sendMailAdmin($insert_data, base64_encode($insert_id));
  unset($_SESSION['user_data']);
  header("Location: ../tenant_checkout_form.php?actionResult=sent");
}
?>