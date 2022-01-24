<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
     
   $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and email_verify=1 and admin_approval=1  limit 1500,300");
   
 // $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and email_verify=1 and admin_approval=1 and user_email='kushalbhasin@gmail.com'");
   
    echo "<pre>". count($getrecUsers);
   // print_r($getrecUsers);
   // exit(0);
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
   

        // Sending Email
        if($rec['email']!='' && $rec['email']!=NULL){
            send_email_new_reminder($rec);
         
        }else{
              echo "Not valid EMAIL <br>";
        }
        
        // sending SMS 
        if($rec['mobile']!='' || $rec['mobile']!=NULL){
        send_sms_for_cam_bill_new($rec);
        }else{
              echo "Not valid PHONE <br>";
        }
        
      
    
  }
  exit(0);
   


    function send_email_new_reminder($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
 //  $toArray= array("nishthagupta@gmail.com"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal","office.nrwa@nirvanacountry.co.in"=>"Office NRWA");
  //$toArray=array("techlead@myrwa.online"=>"Nishtha");
       $toArray= array($rec['email']=>$rec['first_name']);
       print_r($toArray);
       // $bccArray= array("techlead@myrwa.online"=>"Nishtha");
        $data = array( "to" => $toArray,
          //  "bcc" => $bccArray,
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Minutes of EC Meeting, 27th Oct, 2020",
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear Resident, 
            <br><br>
           The minutes from the last Executive Committee meeting have been uploaded to the Nirvana Country website. You can access the same by clicking on the link below. 
            <br><br>
            <a href='https://www.nirvanacountry.co.in/RWAVendor/documents/5faa5a029cd53Minutes-and-Action-items-from-EC-meeting-(ECM-01-20-22)-27Oct20-fnl.pdf' target='_blank'>
            https://www.nirvanacountry.co.in/RWAVendor/documents/5faa5a029cd53Minutes-and-Action-items-from-EC-meeting-(ECM-01-20-22)-27Oct20-fnl.pdf</a>
             <br><br> </span>
      <span style='text-align:center'> Warm Regards, <br><br>
NRWA Office <br>
<a href='https://nirvanacountry.co.in'>www.nirvanacountry.co.in </a> <br></span>
        </span></p></td></tr></tbody></table>",
   
     );

        print_r($mailin->send_email($data));      
    
    }

    function send_sms_for_cam_bill($value){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      
       echo $value['mobile'];
     // $message= 'Dear '.$value['user_title'].' '.$value['first_name'].' '.$value['last_name'].', Nirvana CAM Bill for July is '.$value['payable_amount'].'. Gentle Reminder to Pay your Bill online by clicking here https://bit.ly/3dzZHXx. Due Date - 15th July Rgds NRWA Office *TnCsAply';
$message='Dear Resident, Gentle Reminder for the CAM bill Payments. Pay online by clicking here https://bit.ly/3dzZHXx. Due Date - 31st  July. Ignore, if already paid.  Rgds NRWA Office *TnCsAply';
     echo $message;
    //exit(0);
   $numbers=$value['mobile'];
   //$numbers='9560889608';
  // $numbers='9560889608, 9079247349, 9810490363, 8013333816';
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
    
    
    
    
    function send_sms_for_cam_bill_new($value){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      if($value['first_login']=='1'){
      $message='HI, Your CAM Bill is now available  pay online or to view. Click here  https://bit.ly/3dzZHXx to access the same. NRWA Office.';
      }else{
         $message='Hi, Your CAM Bill is now available pay online or to view. Click here https://bit.ly/3dzZHXx to access the same. User Name: '.$value['user_name'].' Pwd: '.$value['password'].' NRWA Office.';   
      }
      
     echo $value['mobile'];
     echo $message;
    // exit(0);
   $numbers=$value['mobile'];
  // $numbers='9560889608,8130032363';
  // $numbers='9560889608, 9079247349, 9810490363, 8013333816';
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
  
            