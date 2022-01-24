<?php
require "../model/class.expert.php";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);


date_default_timezone_set("Asia/Kolkata");

$current_date = date('Y-m-d H:i:s');

if (isset($_POST['fid']) && isset($_POST['ftype']) && isset($_POST['act'])) {

  if ($_POST['ftype'] == 'f-tenant') {

    $id = $_POST['fid'];
    $ModelCall->where("id", $id);
    $data = $ModelCall->get("tbl_tenant_checkout");

    if (count($data) > 0) {

      if ($_POST['act'] == "approve") {
        $ModelCall->where("id", $id);
        $updata = array(
          "approved_status" => 1
        );

        $ModelCall->update("tbl_tenant_checkout", $updata);

        if (sendMailUserTenant($data[0])) {
          header("Location: ..approve_forms.php?actionResult=asuccess");
        } else {
          header("Location: ../approve_forms.php?actionResult=someerror");
        }
      } else {
        $ModelCall->where("id", $id);
        $ModelCall->delete("tbl_tenant_checkout");

        if (sendMailUserTenantDecline($data[0])) {
          header("Location: ..approve_forms.php?actionResult=asuccess");
        } else {
          header("Location: ../approve_forms.php?actionResult=someerror");
        }
      }

    } else {
        header("Location: ../approve_forms.php?actionResult=someerror");
    }

  } else if ($_POST['ftype'] == 'f-google') {

    $id = $_POST['fid'];
    $ModelCall->where("frm_id", $id);
    $data = $ModelCall->get("tbl_google_form");
    if (count($data) > 0) {

      if ($_POST['act'] == "approve") {
        $ModelCall->where("frm_id", $id);
        $updata = array(
          "approved_status" => 1
        );

        $ModelCall->update("tbl_google_form", $updata);

        if (sendMailUserGoogle($data[0])) {
          header("Location: ../approve_forms.php?actionResult=asuccess");
        } else {
          header("Location: ../approve_forms.php?actionResult=someerror");
        }
      } else {
        $ModelCall->where("frm_id", $id);

        $ModelCall->delete("tbl_google_form");

        if (sendMailUserGoogleDecline($data[0])) {
          header("Location: ../approve_forms.php?actionResult=asuccess");
        } else {
          header("Location: ../approve_forms.php?actionResult=someerror");
        }
      }
    } else {
        header("Location: ../approve_forms.php?actionResult=someerror");
    }

  } else {
    header("Location: ../approve_forms.php?actionResult=someerror");    
  }
} else {
  header("Location: ../approve_forms.php?actionResult=someerror");
}


function sendMailUserGoogle($details) {
  $to = 'iamvineettiwari012@gmail.com, arit.p19@imi.edu';
  // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
  $subject = 'App: Email inclusion in google group';
  $from = 'iamvineettiwari013@gmail.com';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '<p>Dear '.$details['user_title_one'].' '.ucfirst($details['first_name_one']).' '.ucfirst($details['mid_name_one']).' '.ucfirst($details['last_name_one']).',</p>
  <p>Your application for inclusion of email to Nirvana Google Group has been processed.</p>';


    $message .= '
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
    </body>
    </html>';

  return mail($to, $subject, $message, $headers);
}

function sendMailUserTenant($details) {
  $to = 'iamvineettiwari012@gmail.com, arit.p19@imi.edu';
  // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
  $subject = 'App: Checkout Request';
  $from = 'iamvineettiwari013@gmail.com';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '<p>Dear '.$details['title_one'].' '.ucfirst($details['fname_one']).' '.ucfirst($details['mname_one']).' '.ucfirst($details['lname_one']).',</p>
  <p>Your application for outing has been processed and approved for '.date('d-m-Y', strtotime($details['move_out_date'])).'.</p>';


    $message .= '
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
    </body>
    </html>';

  return mail($to, $subject, $message, $headers);
}


function sendMailUserGoogleDecline($details) {
  $to = 'iamvineettiwari012@gmail.com, arit.p19@imi.edu';
  // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
  $subject = 'App: Email inclusion in google group';
  $from = 'iamvineettiwari013@gmail.com';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '<p>Dear '.$details['user_title_one'].' '.ucfirst($details['first_name_one']).' '.ucfirst($details['mid_name_one']).' '.ucfirst($details['last_name_one']).',</p>
  <p>Your application for inclusion of email to Nirvana Google Group has been declined.</p>';


    $message .= '
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
    </body>
    </html>';

  return mail($to, $subject, $message, $headers);
}

function sendMailUserTenantDecline($details) {
  $to = 'iamvineettiwari012@gmail.com, arit.p19@imi.edu';
  // $to = 'iamvineettiwari012@gmail.com, nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu, anshulsukheja@gmail.com';
  if (isset($details['user_email']) && $details['user_email'] != '') {
    $to .= ',' . $details['user_email'];
  }
  $subject = 'App: Checkout Request';
  $from = 'iamvineettiwari013@gmail.com';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= '<p>Dear '.$details['title_one'].' '.ucfirst($details['fname_one']).' '.ucfirst($details['mname_one']).' '.ucfirst($details['lname_one']).',</p>
  <p>Your application for outing on '.date('d-m-Y', strtotime($details['move_out_date'])).' has been declined.</p>';


    $message .= '
  <p>Warm Regards</p>
  <p style="line-height: -5px; margin-top: 5px;">NRWA Office<br><a href="http://www.nirvanacountry.co.in/">www.nirvanacountry.co.in</a></p>
    </body>
    </html>';

  return mail($to, $subject, $message, $headers);
}
?>