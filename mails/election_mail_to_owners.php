<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
     
   $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_type =0 and (email_valid =1 or email_valid is NULL) limit 1000,500");
   
 // $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1  and user_type in (0,1) and phone_number is not null");
   
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
       
        //   exit(0);
         
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
   


    function send_email($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
// $toArray= array("nishthagupta@gmail.com"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal");
 // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
      $toArray= array($rec['user_email']=>$rec['first_name']);
     //   $bccArray= array("kushalbhasin@gmail.com"=>"Kushal");
        $data = array( "to" => $toArray,
            "replyto" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Election of the Governing Body of the NRWA ",
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
          Dear Residents,
            <br><br>
           Greetings.
            <br><br>
           It is informed to you that Mr. Mahadev Sharma, the Returning Officer for NRWA election, was appointed by District Registrar, vide memo no DR/DIC/GGM/79 Dated 15th Jan 2020 and extension granted vide memo no. DR/DIC/GGM/829 dated 29th May 2020.     <br><br>
The Returning Officer has announced the schedule for conducting elections of the NRWA executive committee and office bearers. 
 <br><br>
 You can view the same here,<br>
  <a  href='https://www.nirvanacountry.co.in/RWAVendor/documents/5f1ededf35ee3Election-Schedule-2020-1.pdf' target='_blank'>Election Schedule</a>
 <br>
 <a  href='https://www.nirvanacountry.co.in/RWAVendor/documents/5f1edec1a016dSigned-Member-List_compressed.pdf' target='_blank'>Membership List</a>
<br> <br>These have also been published in the Notice board of NRWA Office and on the Google Group. 
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
  
            