<?php
require "../model/config.php";
require "../model/class.expert.php";

$ModelCall->where("end_date", date('Y-m-d'));
$mailingDatas = $ModelCall->get('tbl_self_isolation_data_start');


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



foreach ($mailingDatas as $details) {
$to = $details['user_email'];
 // $to = $details['user_email']. ', iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  $subject = 'Completion of SELF ISOLATION';
  $from = 'office.nrwa@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '
  <p>Dear '.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).',</p>';
  
  $message .= '
    <p>As per the form submitted by you, you will be completing the mandatory 14-day self-quarantine period starting on '.date("dS M y", strtotime($details['app_date'])).' and ending on  '.date("dS M y", strtotime($details['end_date'])).'. </p> 
    <p>To confirm kindly fill and submit the form – <a href="'.SITE_URL.'self_isolation_form.php">click here</a></p>

  <p>Warm Regards</p>
  <p>NRWA Office</p>
  <p><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p></body>
    </html>';

  mail($to, $subject, $message, $headers);
  sendToAdmin($details);

}

echo "<h1>Successfully sended mail to all the users who have completed their isolation period</h1>";

echo "<p>Total User - ".count($mailingDatas)."</p>";



function sendToAdmin($details) {
$to='office.nrwa@nirvanacountry.co.in';
 // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  $subject = 'Completion of SELF ISOLATION';
  $from = 'office.nrwa@nirvanacountry.co.in';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '
  <p>Dear Sir,</p>';
  
  $message .= '
    <p>This is to remind you, that '.$details['title_first'].' '.ucfirst($details['fname_first']).' '.ucfirst($details['mname_first']).' '.ucfirst($details['lname_first']).' of '.getBlock($details['block_id']).''.$details['house_number'].' '.getFloor($details['floor_number']).', has completed the mandatory 14-day self-quarantine period today ('.date('d-m-Y').') and has submitted the Self Isolation Form as enclosed, towards the same.</p>
  <p>Warm Regards</p>
  <p>NRWA Office</p>
  <p><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
    </body>
    </html>';

  mail($to, $subject, $message, $headers);

}

?>