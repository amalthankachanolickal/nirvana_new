<?php  include('model/class.expert.php');
      require('mailin-lib/Mailin.php');
   
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $getrec = $ModelCall->rawQuery("SELECT email, first_name, last_name, username, password, user_status, phone_number, phone_valid, first_login, b.bill_no, b.month_name, b.flat_no, b.total_bill_amt FROM `Wo_Users` w, tbl_newspaper_bill b  where w.user_status='Active' and w.email_valid=1 and w.payment_consent =1 and w.block_id = b.block_number and w.house_number_id = b.house_number and b.month_name='2020MAR'and b.amt_paid=''");
    echo "<pre>". count($getrec);
   // print_r($getrec);
   // exit(0);

    foreach($getrec as $value){
     

    $toArray= array($value['email']=>$value['first_name']);
    $message= 'Dear '.$value['first_name'].' '.$value['last_name'].',
    <br>  
    Your March Newspaper Bill is uploaded on the website. Please click here to pay the bill now. https://bit.ly/2MJjwjI
    <br>
    For terms of reference for the same you may click https://bit.ly/2PhKQGa 
    <br>
    Regards
    NRWA Office<br>';
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Pay Your March Newspaper Bill Now.",
        "html" =>  $message
    );
    echo"<pre>";
    print_r($toArray);
    print_r($message);
     print_r($mailin->send_email($data));
     echo "</pre>";
    }
    ?>