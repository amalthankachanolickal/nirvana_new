<?php  include('model/class.expert.php');
      require('mailin-lib/Mailin.php');
   
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    // $ModelCall->where("user_status",'Active');
    // $ModelCall->where("email_valid",'1');
    // $getrec = $ModelCall->get('Wo_Users');
    $getrec = $ModelCall->rawQuery("SELECT email, first_name, last_name FROM `Wo_Users` where user_status='Active' and email_valid=1 and email is not NULL and user_id >819 limit 300,100");
  
    echo "<pre>". count($getrec);
    // print_r($getrec);
    // exit(0);

    foreach($getrec as $value){
     
     //   $toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");
    $toArray= array($value['email']=>$value['first_name']);
    $message= 'Dear '.$value['first_name'].' '.$value['last_name'].',
    <br>  <br> 
The NRWA Elections are scheduled for the 5th April, 2020.
<br>  <br> 
All steps to the election, due dates and the member list are now available online on the Nirvana web portal. You may click the link here below to access the same under Documents/ Notices.
<br>  <br> 
https://www.nirvanacountry.co.in/
<br>  <br> 
In case you need your user name or password you may click the Forgot UserName/ Forgot Password links to get the same on your registered email IDs. Or you may write to the office on office.nrwa@nirvanacountry.co.in for the same.
<br>  <br> 
Warm Regards,
<br> 
NRWA Office';
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Elections Schedule & Member List",
        "html" =>  $message
    );
    echo"<pre>";
    print_r($toArray);
    //print_r($message);
     print_r($mailin->send_email($data));
     echo "</pre>";
    }
    ?>