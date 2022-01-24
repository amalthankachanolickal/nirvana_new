<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
    // send_email();
     //  exit(0);
  $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_type =0 and (email_valid =1 or email_valid is NULL) limit 600,500");
   
 //$getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_email='kushalbhasin@gmail.com'");
   
   echo "<pre>". count($getrecUsers);
   // print_r($getrecUsers);
     $totalmails=0;
  foreach($getrecUsers as $rec){
        switch ($rec['block_id']) {
          case 1:
              $block="AG";
              break;
          case 2:
              $block="BC";
              break;
          case 3:
              $block="CC";
              break;
          case 4:
              $block="DW";
              break;
          case 5:
              $block="ES";
              break;
        }   
      
        if($rec['floor_number']==1)
            {
                $floor="";
            }
            if($rec['floor_number']==2)
            {
                $floor="FF";
            }
            if($rec['floor_number']==3)
            {
                $floor="SF";
            }
            if($rec['floor_number']==4)
            {
                $floor="TF";
            }
   
    $House_No= sprintf('%04d', $rec['house_number_id']);
    $flat_no =  $block."-".$House_No.$floor;
   // echo  $flat_no. "-";
    
    $getMembershipStatus = $ModelCall->rawQuery("SELECT * FROM `tbl_temp_membership` where houseno ='".$flat_no."'");
    print_r( $getMembershipStatus);
        if(count($getMembershipStatus)==0){
            $totalmails= $totalmails+1;
            send_email($rec);
        }
  
        // Sending Email
        // if($rec['user_email']!='' && $rec['user_status']=='Active' && $rec['user_email']!=NULL){

        // send_email($rec);
       
        //   // exit(0);
         
        // }else{
        //       echo "Not valid ";
        // }
        
        // sending SMS 
       // if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
      //  send_sms($rec);
       // }
  //   exit(0);
    
  
  }
   echo "Total Mails :".  $totalmails;
  exit(0);
   


    function send_email($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
     //  $toArray= array("techlead@myrwa.online"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal");
//$toArray= array("techlead@myrwa.online"=>"Nishtha");
   $toArray= array($rec['user_email']=>$rec['first_name']);
    //    $bccArray= array("kushalbhasin@gmail.com"=>"Kushal");
        $data = array( "to" => $toArray,
            "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Digital NRWA Membership Form",
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify'>
            <span>
          Dear". $rec['title']. " ".$rec['first_name']. " ".$rec['last_name']. ",
            <br><br>
       Now submit the NRWA Membership Form online through Mobile or Computer by <a href='https://www.nirvanacountry.co.in/membership.php'>clicking here</a>  
       No need to take prints or photocopies OR travel to  the Office to collect/ submit the same. 
   <br><br>
 Steps :
<ol><li>Login to <a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in</a></li> 

<li><a href='https://www.nirvanacountry.co.in/membership.php' target='_blank'>View your current membership status</a> Home Page/ myRWA/ Membership Status/ RWA Membership Form</li>
<li> If not a member, yet, then you can fill & submit the your <a href='https://www.nirvanacountry.co.in/membership.php'>Form X</a> online. 
    <ul>   
    <li>You should attach your documents and photo online, within the form.</li>
   <li>You can pay the Membership Fees online, or share the information of payment through any other mode.</li>
 <li> You should scan your signatures from your sign on paper and attach the same. </li>
</ul></li>
<li> If all your above steps are complete, the form will be processed online by the Office and you will be intimated of the progress via mail. Once the process is complete your Membership Card will be generated and you will again be intimated of the same.

              <ul>   
    <li>In case of any discrepancy in documents or further information required, the office will call you or send the form for correction and you will get an email intimation of the same.

 .</li>
</ul></li>
</ol>
If you are already a member or have submitted your form recently, then you may ignore the above.
<br><br>
PS : You can  change your login details by click the Forgot User Name or Forgot Password on the sign in page. In case of any assistance you may write to us at website.admin@nirvanacountry.co.in.
<br><br>
<span style='text-align:center'> Warm Regards, <br><br>
NRWA Office <br>
<a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in</a> <br></span>
</span></p></td></tr></tbody></table>",
   
     );

        print_r($mailin->send_email($data));      
    
    }

    function send_sms($value){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
   $message='Elections forNRWA is announced for 20th Sep For Schdl & Memb.List visit https://www.nirvanacountry.co.in/files_download.php?meid=Election_Schedule Rgds NRWAOffc';
     echo $message;
//exit(0);
   $numbers=$value['phone_number'];
  $numbers='9560889608,8130032363';
 
     // set post fields
     $post = [
      'sender' => $SENDER,
      'smstype' => $smstype,
      'numbers'   => $numbers,
      'apikey' => $apikey,
      'message' => $message
    ];

      $ch = curl_init('http://sms.pearlsms.com/public/sms/send');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      // execute!
      $response = curl_exec($ch);

      // close the connection, release resources used
      curl_close($ch);

      // do anything you want with your response
      var_dump($response);
    }

    ?>
  
            