<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
      
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $getrec = $ModelCall->rawQuery("SELECT email, first_name, last_name, username, password, user_status, phone_number, phone_valid, first_login, b.bill_no, b.month_name, b.flat_no, b.total_bill_amt FROM `Wo_Users` w, tbl_newspaper_bill b  where w.user_status='Active' and w.email_valid=1 and w.payment_consent =1 and w.block_id = b.block_number and w.house_number_id = b.house_number and b.month_name='2020MAR'and b.amt_paid=''");
    echo "<pre>". count($getrec);
   // print_r($getrec);
   // exit(0);
   $getrec = array(
    array(
       "membename" => "S Varadarajan",
        "Flatno"=>"DW-0073",
        "email"=>"rajan.sv@gmail.com",
        "balance"=>"1396",
    ),
    array(
        "membename" => "Monika Sharma",
         "Flatno"=>"DW-0093",
         "email"=>"pkamalsharma@yahoo.com",
         "balance"=>"584",
     ),
     array(
        "membename" => "K Murali",
         "Flatno"=>"DW-0011",
         "email"=>"kuppmur28@outlook.com",
         "balance"=>"220",
     ),
     array(
        "membename" => "Deepak Bahl",
         "Flatno"=>"DW-0236",
         "email"=>"gujralgaurav@gmail.com",
         "balance"=>"182",
     ),
     array(
        "membename" => "Raj Kumar Sharma",
         "Flatno"=>"BC-0011",
         "email"=>"raj877@gmail.com",
         "balance"=>"269",
     ),
     array(
        "membename" => "Rohin Kumar Dhawann",
         "Flatno"=>"DW-0162",
         "email"=>"Rohin Kumar Dhawan",
         "balance"=>"72171" ,
     ),
     array(
        "membename" => "Megha Aggarwal",
         "Flatno"=>"CC-0133",
         "email"=>"megha.9@gmail.com",
         "balance"=>"124530",
     ),
);

    foreach($getrec as $value){
     print_r( $value);
    
    //    $toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal","arit.p19@imi.edu"=>"Arit");
    $toArray= array($value['email']=>$value['membename']);
    $message= 'Dear '.  $value['membename'].'<br><br>Thank you for making timely payment of your CAM Charges. However your bill still has a balance due of Rs. '.$value['balance'].'/-  We request you to kindly pay for the balance due here through <a href="https://www.nirvanacountry.co.in/bills.php" target="_blank">online payment</a> or otherwise as you may choose.<br>Regards,<br>NRWA Office<br>  <a href="https://www.nirvanacountry.co.in" target="_blank">www.nirvanacountry.co.in</a><br>
        ';
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Pay Your CAM Bill Balance Due Now.",
        "html" =>  $message
    );
    echo"<pre>";
   echo $message;
   //exit(0);
    print_r($message);
     print_r($mailin->send_email($data));
     echo "</pre>";
    // exit(0);
    }
    ?>