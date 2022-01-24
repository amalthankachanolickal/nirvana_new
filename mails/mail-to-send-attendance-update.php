<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $getrec = $ModelCall->rawQuery("SELECT email, first_name, last_name, user_name, password, user_status, phone_number, phone_valid, email_valid, first_login FROM `Wo_Users` w  where w.user_status='Active' and w.email_valid=1 limit 300");
    echo "<pre>". count($getrec);
   // print_r($getrec);
   // exit(0);

    foreach($getrec as $value){
   
   $toArray= array($value['email']=>$value['first_name']);
  
   // $toArray= array('nishthagupta@gmail.com'=>'Nishtha');
    $message= 'Dear Residents,
    <br><br>
    EC Members Attendance From 2018 till Feb’2020 is uploaded on the <a href="https://www.nirvanacountry.co.in/"  target="_blank">website</a> and you may <a href="https://www.nirvanacountry.co.in//files_download.php?meid=Attendance" target="_blank">click here</a> and view the same.';
    if ($value['first_login']==0){
    $message= $message. '<br><br>Since you have never logged in before, your access details to view other sections as well are enclosed here below.<br>
     Username - '.$value['user_name']. 
    '<br> Password - '.$value['password'];
    }
    $message= $message. '<br>
    <br>
    Regards <br>
    NRWA Office<br>
    <a href="https://www.nirvanacountry.co.in/"  target="_blank">www.nirvanacountry.co.in</a><br>
    <a href="mailto:office.nrwa@nirvanacountry.co.in">office.nrwa@nirvanacountry.co.in</a><br>
    Office# : +911244 295885
    ';
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "EC Attendance Details till Feb'2020",
        "html" =>  $message
    );
    echo"<pre>";
    print_r($toArray);
    //print_r($message);
     print_r($mailin->send_email($data));
    // echo "</pre>";
    }

    ?>