<?php

require "../model/config.php";

require "../model/class.expert.php";



// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);



date_default_timezone_set("Asia/Kolkata");



$current_date = date('Y-m-d H:i:s');



$database = new Database();

$db = $database->connect();



function sendMail($to, $details, $cc = array(), $user_data = array(), $outstandings = array(), $urlId) {

  $block = "";



  $emp_as = $details['req_emp'];



  if ($emp_as == "housemaid") {

    $emp_as = "House Maid";

  } else if ($emp_as == "gardener") {

    $emp_as = "Gardener";

  }



  if ($details['app_block'] == "1") {

    $block = "AG";

  } else if ($details['app_block'] == "2") {

    $block = "BC";

  } else if ($details['app_block'] == "3") {

    $block = "CC";

  } else if ($details['app_block'] == "4") {

    $block = "DW";

  } else if ($details['app_block'] == "5") {

    $block = "ES";

  }



   $to = 'office.nrwa@nirvanacountry.co.in';

  $floor_string = "";

  if ($details['floor_number'] != 'NA') {

    $floor_string = $details['floor_number'];

  }





  $to = $to .','.$details['user_email'];



  $subject = 'REQ: Undertaking  For Domestic Help';

  $from = 'website.admin@nirvanacountry.co.in';

  $headers  = 'MIME-Version: 1.0' . "\r\n";

  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  $headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();



  $cc_string = implode(", ", $cc);



  if (count($cc) > 0) {

    $headers .= 'Cc: '.$cc_string.' \r\n';

  }



  $message = '<html>
<body><p><b>Dear '.$details['app_title'].' '.$details['app_fname'].' '.$details['app_lname'].'</b>,</p>
<p>
The office has recieved your application as below and same is being processed. You can view the submitted from online by <a href="'.SITE_URL.'dhc_undertaking.php?fid='.$urlId.'">clicking here</a>.
</p>';

if (count($user_data) > 0) {
  $message .= '<p>Your access details are as here below :</p><p>Username - '.$user_data['username'].'</p><p>Password - '.$user_data['password'].'</p>';
}







if (count($outstandings) > 0) {

  $message .= '<p>We would like to remind you to complete the following due from your end.</p>';

  $message .= '<table>

  <tr>

     <th>Due Name</th>

     <th>Due Date</th>

     <th>Due Amount</th>

     <th>Pay</th>

  </tr>

  <tr>

     <td>'.$outstandings['due_name'].'</td>

     <td>'.$outstandings['due_date'].'</td>

     <td>'.$outstandings['total_due'].'</td>

     <td><a href="<?php echo SITE_URL;?>bills.php">Click to pay</a></td>

  </tr>

  </table>';

}



$message .= '<h4>Application Recieved : </h4>



<p>To</p>

<p>The President / Secretary</p>

<p>NRWA</p>



<p><center><b>Undertaking for entry of domestic help</b></center></p>



<p>I/We resident(s) of '.$details['app_type'].' '.$block.' '.$details['app_villa_no'].' '.$floor_string.'</b>, have verified the above detailed as required by estate office. Kindly allow our Domestic Help , namely, <b>'.$details['req_title'].' '.$details['req_fname'].' '.$details['req_lname'].'</b> , employed as <b>'.$emp_as.'</b> residing at <b>'.$details['req_addr'].'</b> .We also understand our own responsibilities as enumerated below:

  <ol type="number">

    <li> <p>I will ensure that <b>(s) he has Arogya Setu App installed on her/his smartphone</b>. I also understand that my domestic help will not be allowed in <b>if the status  on Aragoya Setu app is not Green or the App is not working</b>.</p></li>

    <li> <p>I will explain all personal hygiene related aspects to domestic help and constantly remind her/him.</p></li>

    <li> <p><b>If the domestic help is part time</b> - The domestic help will stay within our house premises between <b>7:30 AM and 6.30 PM</b>. domestic help will not be sent out to get any deliveries, walking the dog, occupy any common area or to any neighbour\'s house.</p></li>

    <li> <p>I will ensure that domestic help is wearing mask all the time while at work in our house and while (s)he is outdoors.</p></li>

    <li> <p>We will ensure that domestic help washes her/his hands before entering and before leaving our house.</p></li>

    <li> <p>I will download the society connect App and will inform the same to NRWA office. The maid servant data will be linked to my account. This will help me in  getting the information about entry and exit of the maid. If there is too much gap between the time she leaves and exit  at the gate I will inform the same to NRWA office for necessary action.</p></li>

    </ol>

<p>I also understand that violation of society laid out rules may lead cessation of DH pass for two weeks.</p>

<p>Situation being dynamic, the guidelines may change depending on government directions to which the residents/applicants will adhere.</p>

<p>The above information related to domestic help\'s particulars is as told us by the domestic help and verified by us.</p>

<p>Resident\'s Name - '.$details['app_title'].' '.$details['app_fname'].' '.$details['app_lname'].', '.$details['app_type'].' '.$block.'-'.$details['app_villa_no'].'</p>

<p>Phone Number - '.$details['app_isd'].'-'.$details['app_phone'].'</p>

<p>Email ID - '.$details['user_email'].'</p>

</body>

</html>';

  mail($to, $subject, $message, $headers);

}



if (isset($_POST['save'])) {

  $_SESSION['user_data'] = $_POST;

  header("Location: ../dhc_undertaking.php?actionResult=saved");

} else if (isset($_POST['submit'])) {

  print_r($_POST);

  $employee = $_POST['emp_as_drop'];



  if ($_POST['emp_as_drop'] == "other") {

    $employee = $_POST['empas'];

  }



  $insert_data = array(

    "user_id" => isset($_SESSION['UR_LOGINID']) ? $_SESSION['UR_LOGINID'] : '',

    "req_title" => $_POST['title'],

    "req_fname" => $_POST['fname'],

    "req_lname" => $_POST['lname'],

    "req_emp" => $employee,

    "req_addr" => $_POST['res'],

    "app_title" => $_POST['user_title'],

    "app_fname" => $_POST['first_name'],

    "app_lname" => $_POST['last_name'] ,

    "app_villa_no" => $_POST['house_number_id'],

    "app_block" => $_POST['block_id'],

    "floor_number" => $_POST['floor_number'],

    "app_isd" => $_POST['isd'],

    "app_phone" => $_POST['app_phone'],

    "user_email" => $_POST['user_email'],

    "app_type" => $_POST['app_type'],

    "reg_date" => $current_date

  );



  $ModelCall->insert("tbl_dhc_data", $insert_data);

  unset($_SESSION['user_data']);
  $insert_id = base64_encode($ModelCall->getInsertId());


  $floor_number = "";



  if ($insert_data["floor_number"] == "GF") {

    $floor_number = "0";

  } else if ($insert_data['floor_number'] == "FF") {

    $floor_number = "1";

  } else if ($insert_data['floor_number'] == "SF") {

    $floor_number = "2";

  } else if ($insert_data['floor_number'] == "TF") {

    $floor_number = "3";

  }



  $ModelCall->where("floor_number", $floor_number);

  $ModelCall->where("block_id", $insert_data['app_block']);

  $ModelCall->where("house_number_id", $insert_data['app_villa_no']);



  $out_data = $ModelCall->get("Wo_Users");



  $prime_email = $out_data[0]['user_email'];

  $user_data = array();

  $cc = array();

  if ($out_data[0]['first_login'] == "0") {

    $user_data["username"] = $out_data[0]['user_name'];

    $user_data["password"] = $out_data[0]['password'];

  }



  if ($insert_data['user_email'] != $out_data[0]['user_email']) {

    array_push($cc, $out_data[0]['user_email']);

  }



  $up_data = array(

    "user_email" => $insert_data['user_email'],

    "phone_number" => $insert_data['app_phone']

  );

    

  $ModelCall->where("user_id", $out_data[0]['user_id']);

  $ModelCall->update("Wo_Users", $up_data);



  $block = "";



  if ($insert_data['app_block'] == "1") {

    $block = "AG";

  } else if ($insert_data['app_block'] == "2") {

    $block = "BC";

  } else if ($insert_data['app_block'] == "3") {

    $block = "CC";

  } else if ($insert_data['app_block'] == "4") {

    $block = "DW";

  } else if ($insert_data['app_block'] == "5") {

    $block = "ES";

  }



  $house_number = $insert_data['app_villa_no'];



  if (strlen($insert_data['app_villa_no']) == "1") {

    $house_number = '000'.$insert_data['app_villa_no'];

  } else if (strlen($insert_data['app_villa_no']) == "2") {

    $house_number = '00'.$insert_data['app_villa_no'];

  } else if (strlen($insert_data['app_villa_no']) == "3") {

    $house_number = '0'.$insert_data['app_villa_no'];

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





  sendMail("office.nrwa@nirvanacountry.co.in", $insert_data, $cc, $user_data, $outstanding_data);

  header("Location: ../dhc_undertaking.php?actionResult=sent");

}

?>