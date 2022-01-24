<?php  
error_reporting(E_ALL);
include(dirname(__FILE__) .'/../model/class.expert.php');
    
     $today_date = date("Y-m-d");
    $day=date("D",strtotime($today_date));
    
    echo $day. "<br>";
  
      if($day=='Sat'){
      $getrecUsers = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where start_period_date < CURRENT_DATE() and actual_due_date > CURRENT_DATE() and total_outstanding>0");
    //  echo "<pre>";
    // print_r($getrecUsers);
    //   echo "</pre>";
    //       exit(0);  
          if(count($getrecUsers)>0){
             
              $bill_period = date("M",strtotime($getrecUsers[0]['start_period_date'])). "-". date("M,Y",strtotime($getrecUsers[0]['end_period_date']));
              echo $bill_period. "<br>";
                $Body = "";
                $mailing_sql = "SELECT * FROM `tbl_billing_new` where start_period_date = '".$getrecUsers[0]['start_period_date']."' and total_outstanding>0";  
                $rec = $ModelCall->rawQuery($mailing_sql);
                $dataMail = array(
                                	'current_offset' => 0,
                                	'limit_set' => 200,
                                	'mail_content' =>  $Body,
                                	'mail_subject' => 'Pay your CAM Bills online',
                                	'mail_start_date' => date("Y-m-d"),
                                	'status' =>'tobestarted',
                                	'started_datetime' =>date('Y-m-d H:i:s'),
                                  'count_mail_left'=>count($rec),
                                  'category_mail'=>'Billing Mail',
                                  'mailing_sql'=>$mailing_sql, 
                                  'attachment'=>NULL,
                                );  
                                // print_r($dataMail);
                                // exit(0);
              $result = $ModelCall->insert('batch_mail_cron_file',$dataMail);
            echo "Reminder Mail Set";
                 exit(0);
            
          }else{
              echo "No records Found";
          }
      
      }else{
          echo "Its not Saturday today , So no reminder mails to be sent. ";
      }
      
   // for sending reminder mail for o/s Amounts on due date and 1 day before due date.   
 $getrecUsers1 = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where (actual_due_date = CURRENT_DATE() or actual_due_date =(CURRENT_DATE()+1)) and total_outstanding>0");
 
    if(count($getrecUsers1)>0){
         $bill_period = date("M",strtotime($getrecUsers1[0]['start_period_date'])). "-". date("M,Y",strtotime($getrecUsers1[0]['end_period_date']));
          $bill_period = date("M",strtotime($getrecUsers[0]['start_period_date'])). "-". date("M,Y",strtotime($getrecUsers[0]['end_period_date']));
                $Body = "";
                $mailing_sql = "SELECT * FROM `tbl_billing_new` where start_period_date = '".$getrecUsers1[0]['start_period_date']."' and total_outstanding>0";  
                $rec = $ModelCall->rawQuery($mailing_sql);
                $dataMail = array(
                                	'current_offset' => 0,
                                	'limit_set' => 200,
                                	'mail_content' =>  $Body,
                                	'mail_subject' => 'Pay your CAM Bills online',
                                	'mail_start_date' => date("Y-m-d"),
                                	'status' =>'tobestarted',
                                	'started_datetime' =>date('Y-m-d H:i:s'),
                                  'count_mail_left'=>count($rec),
                                  'category_mail'=>'Billing Mail',
                                  'mailing_sql'=>$mailing_sql, 
                                  'attachment'=>NULL,
                                );  
                                $result = $ModelCall->insert('batch_mail_cron_file',$dataMail);
            echo "Reminder Mail Set";
                 exit(0);
            
             
          }else{
              echo "No records Found";
          }      
      
      
     exit(0);
   


    function send_email_new_reminder($rec, $bill_period){
   //  print_r($rec);
   echo $bill_period;
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
   $toArray= array("techlead@myrwa.online"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal");
    //    $toArray= array("techlead@myrwa.online"=>"Nishtha");
      // $toArray= array($rec['email_new']=>$rec['first_name']);
       print_r($toArray);
       // $bccArray= array("techlead@myrwa.online"=>"Nishtha");
        $data = array( "to" => $toArray,
          //  "bcc" => $bccArray,
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online",
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
             Dear ".$rec['user_title']." ".$rec['first_name']." ".$rec['last_name']."
            <br><br>
           CAM bill for the ". $bill_period. " is available online.
            <br><br>
             <a  href='https://nirvanacountry.co.in/bills.php'>Click here</a> to view & pay the bill with Zero Convenience Fees or charges using Net Banking. 
             You may also pay Credit Cards or by NEFT / cheque.              
            <br><br>
            Visit your <a href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other features. 
                <br><br>
            <a  href='https://nirvanacountry.co.in/bills.php' style='display:inline-block;width:90px;padding:8px 8px;margin-left:260px;text-decoration:none;font-size:13px;font-weight:bold;color:#fff; border-radius: 10px; background:#37A000' target='_blank' align='center'>Pay Now</a>
                   <br><br>  </span>
      <span style='text-align:center'> Warm Regards, <br><br>
NRWA Office <br>
<a href='https://nirvanacountry.co.in'>www.nirvanacountry.co.in </a> <br></span>
        </span></p></td></tr></tbody></table>",
   
     );

        print_r($mailin->send_email($data));      
    
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
   //$numbers=$value['mobile'];
  $numbers='9560889608';
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
  
            