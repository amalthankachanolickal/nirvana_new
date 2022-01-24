<?php 



include("../model/class.expert.php");
include("../mailin-lib/Mailin.php");

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);



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

	$to= 'office.nrwa@nirvanacountry.co.in';

  //$to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';

  $subject = 'Application for Inclusion of Email ID in the Nirvana Residents Google Group';

  $from = $details['user_email'];

  $headers  = 'MIME-Version: 1.0' . "\r\n";

  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  $headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();



  $message = '<html><body>';



  $message .= '

  <p>Dear Adminstrator,</p><p> New application has been recieved for inclusion of email id(s) in the Nirvana Residents Google Group and the details as follow : </p>

  <p>To,</p>

    <p>The Nirvana Residents Welfare Association</p>

    <p>Date: '.date('d-m-Y').' </p>

    <p>Please include the following Email ID(s) in the Nirvana Residents Google Group </p>';



  $message .= '<ol type="1">';

  $message .= '<li>

    <p>Person details : </p>

    <p>Name - '.$details['user_title_one'].' '.$details['first_name_one'].' '.$details['mid_name_one'].' '.$details['last_name_one'].'</p>

    <p>Email - '.$details['email_one'].'</p>

    <p>Mobile - '.$details['isd_one'].'-'.$details['mobile_one'].'</p>

    <p>Address - '.getBlock($details['block_one']).'-'.$details['house_no_one'].'-'.getFloor($details['floor_one']).'</p>

    <p>Relation with owner - '.$details['user_relation_one'].'</p>

  </li>';



  if (isset($details['first_name_two'])) {

    $message .= '<li>

    <p>Person details : </p>

    <p>Name - '.$details['user_title_two'].' '.$details['first_name_two'].' '.$details['mid_name_one'].' '.$details['last_name_two'].'</p>

    <p>Email - '.$details['email_two'].'</p>

    <p>Mobile - '.$details['isd_two'].'-'.$details['mobile_two'].'</p>

    <p>Address - '.getBlock($details['block_two']).'-'.$details['house_no_two'].'-'.getFloor($details['floor_two']).'</p>

    <p>Relation with owner - '.$details['user_relation_two'].'</p>

  </li>';

  }

  if (isset($details['first_name_three'])) {

    $message .= '<li>

    <p>Person details : </p>

    <p>Name - '.$details['user_title_three'].' '.$details['first_name_three'].' '.$details['mid_name_three'].' '.$details['last_name_three'].'</p>

    <p>Email - '.$details['email_three'].'</p>

    <p>Mobile - '.$details['isd_three'].'-'.$details['mobile_three'].'</p>

    <p>Address - '.getBlock($details['block_three']).'-'.$details['house_no_three'].'-'.getFloor($details['floor_three']).'</p>

    <p>Relation with owner - '.$details['user_relation_three'].'</p>

  </li>';

  }

  $message .= '</ol>';



  $message .= '

    <p>Name of the Property Owner : '.$details['po-title'].' '.$details['po-fname'].' '.$details['po-mname'].' '.$details['po-lname'].'</p>

    <p>If Self Occupied / Rented : '.$details['occup-status'].'</p>

    <p>Subscription Status: '.$details['sub-status'].'</p>

    <p>Recommended By: '.$details['user_title'].' '.$details['first_name'].' '.$details['mid_name'].' '.$details['last_name'].', '.getBlock($details['block_id']).'-'.$details['house_number_id'].'-'.getFloor($details['floor_number']).'</p>

    <p>Status: '.$details['r-status-2'].'</p>

    <p>Confirmation by Applicant: </p>

    <p>I undertake to abide by the Bye Laws and rules and regulations of NIRVANA COUNTRY RESIDENTS WELFARE ASSOCIATION, </p>

    <ol type="1">

      <li>I will always use Parliamentary Language. </li>

      <li>I will be respectful and concerned about the feelings of other users of the Group. </li>

      <li>I will participate in debates with Free and Open mind and with knowledge of the subject. </li>

      <li>I will not indulge in targeting any person or group of persons.</li>

      <li>I will not be partial in my writings but will express my views truthfully and based on facts.</li>

    </ol>

    <p>Regards</p>

    <p>'.$details['user_title'].' '.$details['first_name'].' '.$details['mid_name'].' '.$details['last_name'].'</p>

    </body>

    </html>';




  mail($to, $subject, $message, $headers);
}





function sendMailUser($details, $outstandings) {

$to=$details['email_one'];
// $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';

  $subject = 'Application for Inclusion of Email ID in the Nirvana Residents Google Group';

  $from = 'office.nrwa@nirvanacountry.co.in';

  $headers  = 'MIME-Version: 1.0' . "\r\n";

  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  $headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();



  $message = '<html><body>';



  $message .= '

  <p>Dear '.$details['po-title'].' '.$details['first_name_one'].' '.$details['mid_name_one'].' '.$details['last_name_one'].', </p>

  <p>The office has recieved your application as below and same is being processed.</p><p>To,</p>

    <p>The Nirvana Residents Welfare Association</p>

    <p>Date: '.date('d-m-Y').' </p>

    <p>Please include the following Email ID(s) in the Nirvana Residents Google Group </p>';



  $message .= '<ol type="1">';

  $message .= '<li>

    <p>Person details : </p>

    <p>Name - '.$details['user_title_one'].' '.$details['first_name_one'].' '.$details['mid_name_one'].' '.$details['last_name_one'].'</p>

    <p>Email - '.$details['email_one'].'</p>

    <p>Mobile - '.$details['isd_one'].'-'.$details['mobile_one'].'</p>

    <p>Address - '.getBlock($details['block_one']).'-'.$details['house_no_one'].'-'.getFloor($details['floor_one']).'</p>

    <p>Relation with owner - '.$details['user_relation_one'].'</p>

  </li>';



  if (isset($details['first_name_two'])) {

    $message .= '<li>

    <p>Person details : </p>

    <p>Name - '.$details['user_title_two'].' '.$details['first_name_two'].' '.$details['mid_name_one'].' '.$details['last_name_two'].'</p>

    <p>Email - '.$details['email_two'].'</p>

    <p>Mobile - '.$details['isd_two'].'-'.$details['mobile_two'].'</p>

    <p>Address - '.getBlock($details['block_two']).'-'.$details['house_no_two'].'-'.getFloor($details['floor_two']).'</p>

    <p>Relation with owner - '.$details['user_relation_two'].'</p>

  </li>';

  }

  if (isset($details['first_name_three'])) {

    $message .= '<li>

    <p>Person details : </p>

    <p>Name - '.$details['user_title_three'].' '.$details['first_name_three'].' '.$details['mid_name_three'].' '.$details['last_name_three'].'</p>

    <p>Email - '.$details['email_three'].'</p>

    <p>Mobile - '.$details['isd_three'].'-'.$details['mobile_three'].'</p>

    <p>Address - '.getBlock($details['block_three']).'-'.$details['house_no_three'].'-'.getFloor($details['floor_three']).'</p>

    <p>Relation with owner - '.$details['user_relation_three'].'</p>

  </li>';

  }

  $message .= '</ol>';



  $message .= '

    <p>Name of the Property Owner : '.$details['po-title'].' '.$details['po-fname'].' '.$details['po-mname'].' '.$details['po-lname'].'</p>

    <p>If Self Occupied / Rented : '.$details['occup-status'].'</p>

    <p>Subscription Status: '.$details['sub-status'].'</p>

    <p>Recommended By: '.$details['user_title_one'].' '.$details['first_name_one'].' '.$details['mid_name_one'].' '.$details['last_name_one'].', '.getBlock($details['block_id']).'-'.$details['house_number_id'].'-'.getFloor($details['floor_number']).'</p>

    <p>Status: '.$details['r-status-2'].'</p>

    <p>Confirmation by Applicant: </p>

    <p>I undertake to abide by the Bye Laws and rules and regulations of NIRVANA COUNTRY RESIDENTS WELFARE ASSOCIATION, </p>

    

    <p>Regards</p>

    <p>'.$details['user_title_one'].' '.$details['first_name_one'].' '.$details['mid_name_one'].' '.$details['last_name_one'].'</p><p>Any Changes suggested in the emailid , please contact us directly at <a href="mailto:office.nrwa@nirvanacountry.co.in">office.nrwa@nirvanacountry.co.in</a></p>';



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



    $message .= '</body>

    </html>';


    echo $message;
    
     $toArray = array($to=>$details['user_title_one'].' '.$details['first_name_one'].' '.$details['mid_name_one'].' '.$details['last_name_one']);
     $bccArray= array("techlead@myrwa.online"=>"Shishir");//, "Kushalbhasin@gmail.com"=>"Kushal");
$ccArray= array("office.nrwa@nirvanacountry.co.in"=>"NRWA Office");
  $data = array( 
        "to" => $toArray,
        "bcc" => $bccArray,
        "cc" => $ccArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => $subject,
        "html" => $message
    );
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
   $var= $mailin->send_email($data); 
   print_r($var);

    
  //print_r(mail($to, $subject, $message, $headers));
    echo "Sent";
}



if (isset($_POST['save'])) {

    $_SESSION['user_data'] = $_POST;

    print_r($_POST);

    header("Location: ../googleForm.php?actionResult=saved");

} else if (isset($_POST['submit'])) {



    $insert_data = $_POST;



    unset($insert_data['confirmation']);

    unset($insert_data['submit']);



    $insert_data['user_ip'] = $_SERVER['REMOTE_ADDR'];

    $insert_data['reg_date'] = date('Y-m-d H:i:s');



    $ModelCall->insert("tbl_google_form", $insert_data);

    unset($_SESSION['user_data']);



  //  $insert_id = base64_encode($ModelCall->getInsertId());



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

    $ModelCall->where("block_id", $insert_data['block_id']);

    $ModelCall->where("house_number_id", $insert_data['house_number_id']);



    $out_data = $ModelCall->get("Wo_Users");

    



  $block = getBlock($insert_data['block_id']);



  $house_number = $insert_data['house_number_id'];



  if (strlen($insert_data['house_number_id']) == "1") {

    $house_number = '000'.$insert_data['house_number_id'];

  } else if (strlen($insert_data['house_number_id']) == "2") {

    $house_number = '00'.$insert_data['house_number_id'];

  } else if (strlen($insert_data['house_number_id']) == "3") {

    $house_number = '0'.$insert_data['house_number_id'];

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



  sendMailUser($insert_data, $outstanding_data);

  //sendMailAdmin($insert_data);

  header("Location: ../googleForm.php?actionResult=submitted");

}


// <ol type="1">

//       <li>I will always use Parliamentary Language. </li>

//       <li>I will be respectful and concerned about the feelings of other users of the Group. </li>

//       <li>I will participate in debates with Free and Open mind and with knowledge of the subject. </li>

//       <li>I will not indulge in targeting any person or group of persons.</li>

//       <li>I will not be partial in my writings but will express my views truthfully and based on facts.</li>

//     </ol>