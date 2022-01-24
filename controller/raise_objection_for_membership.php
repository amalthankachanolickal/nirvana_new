<?php include("../model/class.expert.php");

// include("mail_functions.php");

require('../mailin-lib/Mailin.php');

?>

<?php

// echo "<pre>";



// print_r($_POST);



// exit(0);

$user_id = $_POST["postedBy"];



$ModelCall->where("user_id",$user_id);

$ModelCall->orderBy("user_id","asc");

$rec = $ModelCall->get("Wo_Users");



$For_house_no = $_POST["houseno"];

$By_house_no = $_POST["houseno"];

$For_owner_name = $_POST["owner_name"];

$By_owner_name = $_POST["owner_name"];

$Subject = $_POST["subject"];

$Message = $_POST["msg"];

$Current_date = date('Y-m-d');

$Ip_address = $_SERVER['REMOTE_ADDR'];







if(($By_house_no=='') || ($user_id=='') || ($For_owner_name=='')){

    $_SESSION['message']="Not Valid Data Passed";

    header("location:".SITE_URL."your-membership-details.php");

    exit;

}



$data=array(



	'user_id'=> $user_id,

	'for_house_no'=> $For_house_no,

	'for_owner_name'=>$For_owner_name,

	'by_house_no'=>$By_house_no,

	'by_owner_name'=>$By_owner_name,

	'msg'=>$Message,

    'subject'=>$Subject,

    'ip_address'=>$Ip_address,

    'created_date'=>$Current_date

);



// echo json_encode($data);

$res = $ModelCall->insert('rwa_membership_msg',$data);

$_SESSION['message']="Your concern has been successfully Submitted to office.";

send_mail_to_admin($data, $rec);

send_mail_to_user($data, $rec);

header("location:".SITE_URL."your-membership-details.php");

exit;





function send_mail_to_admin($data, $rec){

     $From =$rec[0]['email'];

     $FromName = $data['by_owner_name'];

     $ToAddress = 'office.nrwa@nirvanacountry.co.in';

     //$ToAddress = 'nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu';

     $headers  = 'MIME-Version: 1.0' . "\r\n";

     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     $headers .= 'From: '.$From."\r\n".

       'Reply-To: '.$From."\r\n" .

       'X-Mailer: PHP/' . phpversion();



    

      //$client_name=$rec1[0]['client_name'];// Add a recipient

      $Subject = 'Concerned Raised on Memberip Status by-'.$data['by_house_no'];

     

      $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>

      <tbody>

     

        <tr>

          <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>  Dear Sir, </p>

          <p>".$data['by_owner_name']." of ".$data['by_house_no']." has raised an objection for  his/her membership status</p>";

    

        

          $Body = $Body ."Below are the Comments mentioned:<br>Title : ".$data['subject']. "<br>

          ".$data['msg']. "<p>

          For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>

          <br><br>

          Best Regards<br>

          NRWA Office.<br>

        <a href='".SITE_URL."'> www.nirvanacountry.co.in</a></p>

      

        </td>

        </tr>

    

        <tr>

          <td align='center' valign='middle'>&nbsp;</td>

        </tr>

       

      </tbody>

    </table>";

    mail($ToAddress,  $Subject, $Body, $headers);

 

}







function send_mail_to_user($data, $rec){

    $From = 'office.nrwa@nirvanacountry.co.in';

    $FromName = 'NRWA Office';

    $ToAddress = $rec[0]['email'];

   // $ToAddress = 'nishthagupta@gmail.com, kushalbhasin@gmail.com, arit.p19@imi.edu';

    $headers  = 'MIME-Version: 1.0' . "\r\n";

    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $headers .= 'From: '.$From."\r\n".

      'Reply-To: '.$From."\r\n" .

      'X-Mailer: PHP/' . phpversion();



   

      $Subject = 'Your Concerned Raised on Memberip Status is Submitted';

     

      $Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>

      <tbody>

     

        <tr>

          <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>  Dear ". $rec[0]['first_name']. " " .$rec[0]['last_name']. " </p>

          <p> Thank You ! Your Concern about your membershp has been raised successfully.We wil get back to you soon.</p>";

  

          $Body = $Body ."Below are the Comments mentioned:<br>Title : ".$data['subject']. "<br>

          ".$data['msg']. "<p>

          For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a>

          <br><br>

          Best Regards<br>

          NRWA Office.<br>

        <a href='".SITE_URL."'> www.nirvanacountry.co.in</a></p>

      

        </td>

        </tr>

    

        <tr>

          <td align='center' valign='middle'>&nbsp;</td>

        </tr>

       

      </tbody>

    </table>";

   mail($ToAddress,  $Subject, $Body, $headers);



}



?>