<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
     
   $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_type =0 limit 1500,300");
   
 //  $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_email='kushalbhasin@gmail.com'");
   
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
   
    $House_No= sprintf('%04d', $rec['house_number_id']);
    $flat_no =  $block."-".$House_No.$floor;
    echo  $flat_no. "-";
    
    $getrec = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where bill_date ='2020-09-29' and total_outstanding >0 and flat_no='".$flat_no."' limit 1");
   // print_r($getrec);
    if(count($getrec)>0){
         echo " Record there <br>";
      // $getrec = $ModelCall->rawQuery("update `tbl_billing_new` set mob_no='".$rec['phone_number']."', email='".$rec['user_email']."' where bill_date='2020-06-26' and flat_no='".$flat_no."' limit 1");
        $rec['email_new']=$getrec[0]['email'];
         $rec['bill_number']=$getrec[0]['bill_number'];
         $rec['payable_amount']=$getrec[0]['payable_amount'];
         $rec['mobile']=$getrec[0]['mobile'];
    //   print_r($rec);
       //exit(0);
        // Sending Email
        if($rec['email_new']!='' && $rec['email_new']!=NULL){
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
        
      
    } else{
       echo "No Record <br>";
    }
 //  exit(0);
  }
  exit(0);
   


    function send_email_new_reminder($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
  // $toArray= array("nishthagupta@gmail.com"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal");
 // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
       $toArray= array($rec['email_new']=>$rec['first_name']);
       print_r($toArray);
       // $bccArray= array("techlead@myrwa.online"=>"Nishtha");
        $data = array( "to" => $toArray,
          //  "bcc" => $bccArray,
            "from" => array("website.admin@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online",
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
             Dear ".$rec['user_title']." ".$rec['first_name']." ".$rec['last_name']."
            <br><br>
           CAM bill for the Oct - Dec '20 is available online.
            <br><br>
             <a  href='https://nirvanacountry.co.in/bills.php'>Click here</a> to view & pay the bill with Zero Convenience Fees or charges using Net Banking. 
             You may also pay Credit Cards or by NEFT / cheque.              
            <br><br>
            Visit your <a href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other features. 
                <br><br>
            <a  href='https://nirvanacountry.co.in/bills.php' style='display:inline-block;width:90px;padding:8px 8px;margin-left:260px;text-decoration:none;font-size:13px;font-weight:bold;color:#fff; border-radius: 10px; background:#37A000' target='_blank' align='center' >Pay Now</a>
                   <br><br>  </span>
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
  
            