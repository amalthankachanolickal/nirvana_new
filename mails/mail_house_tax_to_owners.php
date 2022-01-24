<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
     send_email();
       exit(0);
//   $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_type =0 and (email_valid =1 or email_valid is NULL) limit 1000,200");
   
//  $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_email='kushalbhasin@gmail.com'");
   
   echo "<pre>". count($getrecUsers);
   // print_r($getrecUsers);
    
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
    echo  $flat_no. "-";
    
  
        // Sending Email
        if($rec['user_email']!='' && $rec['user_status']=='Active' && $rec['user_email']!=NULL){

        send_email($rec);
       
          // exit(0);
         
        }else{
              echo "Not valid ";
        }
        
        // sending SMS 
        if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
      //  send_sms($rec);
        }
  //   exit(0);
    
   
  }
  exit(0);
   


    function send_email(){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
 //$toArray= array("nishthagupta@gmail.com"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal");
 $toArray= array('info@houzzndezins.com'=>'',
'pradeep_kc@hotmail.com'=>'',
'ashish@shyamexport-india.com'=>'',
'drkiranchadha@yahoo.com'=>'',
'rajnigrewal125@gmail.com'=>'',
'subhash.garg97@gmail.com'=>'',
'rohit.chawla@rediffmail.com'=>'',
'brijesh.gupta@gmail.com'=>'',
'pushpapabley@gmail.com'=>'',
'kamal.bng@gmail.com'=>'',
'vipingoyal@gmail.com'=>'',
'mohit25july1990@gmail.com'=>'',
'basu.piyali@gmail.com'=>'',
'maneeshhanda@gmail.com'=>'',
'neelvina@gmail.com'=>'',
'nisha0510@gmail.com'=>'',
'pushpapabley@gmail.com'=>'',
'vip.goel@gmail.com'=>'',
'manish_aggarwal_@hotmail.com'=>'',
'annu.kapur91@gmail.com'=>'',
'sanjeet.whiz@gmail.com'=>'',
'rishi.bagga@outlook.com'=>'',
'sanchitsidana1991@gmail.com'=>'',
'gaurav.gupta104@gmail.com'=>'',
'ohlanvijayant@yahoo.com'=>'',
'vijay.landbuild@gmail.com'=>'',
'nain.kanwal@yahoo.com'=>'',
'taneja.rishabh28@yahoo.in'=>'',
'sehradev@yahoo.com'=>'',
'ashwini.sharma0016@gmail.com'=>'',
'iarani@gmail.com'=>'',
'ninamalhotra14@gmail.com'=>'',
'akash.a.sharma@gmail.com'=>'',
'pavitmirdha@gmail.com'=>'',
'deepak@pioneerpublicityindia.com'=>'',
'varunkad@yahoo.com'=>'',
'udhmanish@gmail.com'=>'',
'vbhatia5000@gmail.com'=>'',
'ritusahrawat@yahoo.co.in'=>'',
'param.m129@gmail.com'=>'',
'na@societyconnect.in'=>'',
'kaulnihal@yahoo.com'=>'',
'neetu75@gmail.com'=>'',
'amrinder88@gmail.com'=>''
);
 //    $toArray= array($rec['user_email']=>$rec['first_name']);
     //   $bccArray= array("kushalbhasin@gmail.com"=>"Kushal");
        $data = array( "to" => $toArray,
            "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Property Tax Bill Information",
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:justify'>
            <span>
          Dear Residents,
            <br><br>
          Last date of availing the rebate on your Property Tax Bill is 31st August. 
            <br><br>
          PS : If you have made the payments for the same, you may ignore the following message.  
 <br><br>
 To assist Owners, with the information to pay to  MCG, the NRWA Office has received the House Tax information and the same is updated on your account on your NRWA website. You may login to your account to view the same. 
<br><br>
 You can view the same here, <a href='https://www.nirvanacountry.co.in/house_tax_details_new.php'  target='_blank'>Property Tax information</a>
<ol>Please note the following : 
<li>
This information provides you with the Property ID and other relevant information to assist you to pay your tax and avail the benefit. </li>
<li>This information is as per last updated by the MCG on the 24th July. If there have been any changes to the same, thereafter then this may not represent the same. </li> 
<li>NRWA Office is only assisting owners by providing this information. In case of any discrepancy or updating the same, you will need to contact the MCG directly. Office does not have the access to make changes to the MCG systems. </li> 
<li>Please note that the link for payment will take you to the MCG Platform and you will be paying the same to MCG. NRWA Office does not have any involvement in the payment process.  </li>
</ol>
<b>As per the enclosed circular the MCG Commissioner has offered a rebate for the societies like ours to get a benefit. </b><br>
Not much further on the same are available yet, but we will follow up and try to get the benefit for the society. 
<br><br>
Your Nirvana portal now also has the <a href='https://www.nirvanacountry.co.in/files_download.php?meid=Accounts' target='_blank'>Society Accounts</a> for the past 4 years. You (owners) can login and view the same. 
 <br><br>  </span>
      <span style='text-align:center'> Warm Regards, <br><br>
NRWA Office <br>
www.nirvanacountry.co.in <br></span>
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
  
            