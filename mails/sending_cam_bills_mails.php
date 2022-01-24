<?php  
include(dirname(__FILE__) .'/../model/class.expert.php');
     require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
     require(dirname(__FILE__) .'/../mailin-lib/send_sms.php');
   
    $getmailtobesent = $ModelCall->rawQuery("SELECT * FROM `batch_mail_cron_file` where mail_start_date =CURRENT_DATE() and `status`='ongoing' and category_mail='Billing Mail' limit 1");
   
   
   
    
   if(count($getmailtobesent)<1) {
   $getmailtobesent = $ModelCall->rawQuery("SELECT * FROM `batch_mail_cron_file` where mail_start_date =CURRENT_DATE() and `status`='tobestarted' and category_mail='Billing Mail' limit 1");
   }
   
    // echo "<pre>";
    // print_r($getmailtobesent);
    //   echo "</pre>";
      
    if(count($getmailtobesent) ==1){
      if($getmailtobesent[0]['status']=='ongoing')  {
          $query = $getmailtobesent[0]['mailing_sql']. ' LIMIT '. $getmailtobesent[0]['current_offset'] .', 300';
           $startsendingmail =$ModelCall->rawQuery($query);
      }else{
         $startsendingmail =$ModelCall->rawQuery($getmailtobesent[0]['mailing_sql']);
      }
      echo  $query;
     echo "<pre>" . count($startsendingmail);
//     print_r($startsendingmail);
//   exit(0);
 
  $count=0;
  $done=0;
  $mailsentto ="";
  
    if(count($startsendingmail)<1){
         $ModelCall->where("id", $getmailtobesent[0]['id']);
            $result =  $ModelCall->get('batch_mail_cron_file');
             $dataArray = array(
              
             "completed_datetime"=> date('Y-m-d H:i:s'),
              "status"=> 'Completed',
               "count_mail_left"=> $result[0]['count_mail_left']-$result[0]['count_mail_left'],
             
              );
              $ModelCall->where("id", $getmailtobesent[0]['id']);
              $ModelCall->update("batch_mail_cron_file", $dataArray);
              echo "Completed" ;
              exit(0);
    }
     $bill_period = date("M",strtotime($startsendingmail[0]['start_period_date'])). "-". date("M, Y",strtotime($startsendingmail[0]['end_period_date']));
    //   echo $startsendingmail[0]['start_period_date'];
    //      echo $startsendingmail[0]['end_period_date'];
     echo $bill_period;
    // exit(0);
   
      foreach($startsendingmail as $value){
           
           if($value['mob_no'] != ""){
              
               send_sms_for_cam_bill($value);
               
            }
           $ModelCall->where("id", $getmailtobesent[0]['id']);
            $result =  $ModelCall->get('batch_mail_cron_file');
          
               
               $block =substr($value['flat_no'], 0,2);
                if($block=='AG'){
                    $block_id=1;
                }else if($block=='BC'){
                    $block_id=2; 
                }else if($block=='CC'){
                    $block_id=3; 
                }else if($block=='DC' || $block=='DW'){
                    $block_id=4; 
                }else if($block=='ES'){
                    $block_id=5; 
                }
                echo $block ." ". $block_id. "<br>";
                 $houseno =substr($value['flat_no'], 3,4); 
                echo  $houseno;
                $str = ltrim($houseno, '0');
               // echo "SELECT * FROM `Wo_Users` where block_id =".$block_id." and house_number_id=". $str. " and floor_number=".$value['floor_num']. " and user_status='Active'";
                  $getinWoUsers = $ModelCall->rawQuery("SELECT * FROM `Wo_Users` where block_id ='".$block_id."' and house_number_id='". $str. "' and floor_number='".$value['floor_num']. "' and user_status='Active'");
               //  print_r($getinWoUsers);
                  if(count($getinWoUsers)>0){
                      foreach($getinWoUsers as $rec){
                             if($rec['email'] != NULL){
                             send_cam_bill_new($rec, $value['bill_number'], $bill_period);
                                              
                            $count++;
                            $mailsentto =$mailsentto ."," . $rec['email'];
                             }
                      
                              if($rec['phone_number'] != NULL){
                             send_sms_for_cam_bill($rec);
                             }
                             
                             //exit(0);
                      }
                  }
                if(count($getinWoUsers)>0){
                      if($result[0]['count_mail_left']==1){
            
                         $dataArray = array(
                            "current_offset"=> $result[0]['current_offset']+1,
                            "completed_datetime"=> date('Y-m-d H:i:s'),
                            "status"=> 'completed',
                            "count_mail_left"=> $result[0]['count_mail_left']-1,
                         
                          );
                          $ModelCall->where("id", $getmailtobesent[0]['id']);
                          $ModelCall->update("batch_mail_cron_file", $dataArray);
                           echo "Completed" ;
                          $done=1;
                           break;
                      }else {
                          if($getmailtobesent[0]['cron_start_time']==NULL){
                                $dataArray = array(
                                "cron_start_time"=> date('Y-m-d H:i:s'),
                                );
                              $ModelCall->where("id", $getmailtobesent[0]['id']);
                              $ModelCall->update("batch_mail_cron_file", $dataArray);
                            }
                         $dataArray = array(
                          "current_offset"=> $result[0]['current_offset']+1,
                          "status"=> 'ongoing',
                          "count_mail_left"=> $result[0]['count_mail_left']-1,
                          );
                           $ModelCall->where("id", $getmailtobesent[0]['id']);
                          $ModelCall->update("batch_mail_cron_file", $dataArray);
                         echo "update Done" ;
                      }
                         
                }else{
                    continue;
                }
                
                             
                //exit(0);
        }
          
      echo "</pre>";
      batch_out($mailsentto, $getmailtobesent, $count, $done);
        
    }else{
        Echo "No Mails to be sent right now.";
    }
  
  
  
  
  function send_mail($value, $mailDeatils){
    //   print_r($value);
     //  print_r($mailDeatils[0]['attachment']);
        $toArray= array($value['email']=>$value['email']);
        $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    // $toArray= array('techlead@myrwa.online'=>'Nishtha');
   
    
      if(isset($mailDeatils[0]['selfrom']) && $mailDeatils[0]['selfrom']!=""){
         if($mailDeatils[0]['selfrom']=='ec.updates@nirvanacountry.co.in'){
              $fromArray=  array($mailDeatils[0]['selfrom'], "Nirvana EC Updates");
         }else if($mailDeatils[0]['selfrom']=='office.nrwa@nirvanacountry.co.in'){
              $fromArray= array($mailDeatils[0]['selfrom'], "Office NRWA"); 
         }else if($mailDeatils[0]['selfrom']=='accounts@nirvanacountry.co.in'){
              $fromArray=  array($mailDeatils[0]['selfrom'], "Accounts NRWA"); 
         }else if($mailDeatils[0]['selfrom']=='marketing@nirvanacountry.co.in'){
              $fromArray=  array($mailDeatils[0]['selfrom'], "Nirvana Marketing"); 
         }else{
            $fromArray=  array($mailDeatils[0]['selfrom'], "NRWA Updates");  
         }
        
     }else{
      $fromArray=  array("office.nrwa@nirvanacountry.co.in", "Office NRWA");
     }
     
     
    $message= $mailDeatils[0]['mail_content'];
    
    if($mailDeatils[0]['attachment']=='' || $mailDeatils[0]['attachment']==NULL ){
    $data = array( "to" => $toArray,
        "from" => array("info@therwa.mvegex.com", "NRWA Office"),
        "subject" => $mailDeatils[0]['mail_subject'],
        "html" =>  $message
    );
    }else {
          $data = array( "to" => $toArray,
        "from" => array("info@therwa.mvegex.com", "NRWA Office"),
        "subject" => $mailDeatils[0]['mail_subject'],
        "html" =>  $message,
        "attachment" => array($mailDeatils[0]['attachment'])
        );
    }
    // echo"<pre>";
    //  print_r($toArray);
      print_r($data);
   // exit(0);
   print_r($mailin->send_email($data));
   // exit(0); 
  }
  
  
    function send_cam_bill_new($rec, $bill_number, $bill_period){
   //  print_r($rec);
   echo "Bill Number". $bill_number;
   //echo "https://nirvanacountry.co.in/bills_view/".$bill_number.".pdf";
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
 
   //$toArray= array('techlead@myrwa.online'=>'Nishtha', 'kushalbhasin@gmail.com'=>'Kushal');
   if($rec['secondary_email']!=NULL){
       $toArray= array($rec['email']=>$rec['first_name'],$rec['secondary_email']=>$rec['first_name']);
   }else {
        $toArray= array($rec['email']=>$rec['first_name']);
   }
    //    $bccArray= array("nishthagupta@gmail.com"=>"Nishtha");
        $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online",
             "attachment" => array("https://nirvanacountry.co.in/bills_view/".$bill_number.".pdf"),
          "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",
            <br><br>
              Please find enclosed, your CAM bill for the period  ". $bill_period.". <br><br>
             <a  href='https://nirvanacountry.co.in/bills.php'>Click here</a> to view & pay the bill online. Pay using Credit Cards for a reduced TDR* of only 1.1% (*Master & Visa Cards). Or pay through Net Banking
                or NEFT or cheque.<br><br>                 
          Visit your  <a  href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other new features including :
          <ul style='font-family:Helvetica;font-size:16px;line-height:24px;text-align:left' >
          <li><a href='https://www.nirvanacountry.co.in/files_download.php?meid=Forms'>Fill & submit</a> your Forms online. No need to visit office or print paper.</li>
          <li>Find the latest updates in the <a href='https://nirvanacountry.co.in/'>COVID Response</a> Section. </li>
          </ul>
           <a  href='https://nirvanacountry.co.in/bills.php' style='display:inline-block;width:90px;padding:8px 8px;margin-left:260px;text-decoration:none;font-size:13px;font-weight:bold;color:#fff; border-radius: 10px; background:#37A000' target='_blank' align='center' >Pay Now</a>
                   <br><br>
            For ease of access, your User Name and Password is enclosed here:  
            <br>
            User Name : ". $rec['user_name']."<br>
            Password &nbsp;&nbsp;: ". $rec['password']."<br>
         <br>   </span>
      <span style='text-align:center'> Warm Regards, <br><br>
NRWA Office <br>
www.nirvanacountry.co.in <br></span>
        </span></p></td></tr></tbody></table>",
   
     );
            $data1 = array( "to" => $toArray,
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online.",
            "attachment" => array("https://nirvanacountry.co.in/bills_view/".$bill_number.".pdf"),
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",
            <br><br>
              Please find enclosed, your CAM bill for the period  ". $bill_period.". <br><br>
             <a  href='https://nirvanacountry.co.in/bills.php'>Click here</a> to view & pay the bill online. Pay using Credit Cards for a reduced TDR* of only 1.1% (*Master & Visa Cards). Or pay through Net Banking
                or NEFT or cheque.<br><br>                 
          Visit your  <a  href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other new features including :
          <ul style='font-family:Helvetica;font-size:16px;line-height:24px;text-align:left' >
          <li><a href='https://www.nirvanacountry.co.in/files_download.php?meid=Forms'>Fill & submit</a> your Forms online. No need to visit office or print paper.</li>
          <li>Find the latest updates in the <a href='https://nirvanacountry.co.in/'>COVID Response</a> Section. </li>
          </ul>
           <a  href='https://nirvanacountry.co.in/bills.php' style='display:inline-block;width:90px;padding:8px 8px;margin-left:260px;text-decoration:none;font-size:13px;font-weight:bold;color:#fff; border-radius: 10px; background:#37A000' target='_blank' align='center' >Pay Now</a>
                   <br><br>
            </span>
      <span style='text-align:center'> Warm Regards, <br><br>
NRWA Office <br>
www.nirvanacountry.co.in <br></span>
        </span></p></td></tr></tbody></table>",
            
   );
//exit(0);
      if($rec['first_login']=='1'){
        print_r($mailin->send_email($data1));
        } else{
        print_r($mailin->send_email($data));      
       }
    }
    
    
    function send_sms_for_cam_bill($value){
        $msg_id = "123554";
        $fields = array(
        "sender_id" => "NRWAOB",
        "message" => $msg_id,
        "variables_values" => "",
        "route" => "dlt",
        "numbers" => $value['mob_no'],
        );
        
        sendSMS($fields);
    }
    
//     function send_sms_for_cam_bill($value){
//       $SENDER ='NRWAOB';
//       $smstype='TRANS';
//       $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
//       $message= 'Dear Resident , Pay on your Nirvana Country online by clicking here https://bit.ly/3dzZHXx. Rgds NRWA Office *TnCsAply';

//      echo $message;

//      $numbers=$value['phone_number'];
//      //$numbers='9560889608';
//   // $numbers='9560889608, 9079247349, 9810490363, 8013333816';
//      // set post fields
//      $post = [
//       'sender' => $SENDER,
//       'smstype' => $smstype,
//       'numbers'   => $numbers,
//       'apikey' => $apikey,
//       'message' => $message
//     ];

//       $ch = curl_init('http://sms.pearlsms.com/public/sms/send');
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//       curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

//       // execute!
//       $response = curl_exec($ch);

//       // close the connection, release resources used
//       curl_close($ch);

//       // do anything you want with your response
//       var_dump($response);
//     }
    
    
     function batch_out($mailsentto, $mailDeatils, $count, $done){
    //   print_r($value);
     //  print_r($mailDeatils[0]['attachment']);
     // $toArray= array($value['email']=>$value['email']);
        $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
  // $toArray= array('techlead@myrwa.online'=>'Nishtha');
  $toArray= array('office.nrwa@nirvanacountry.co.in'=>'Office NRWA');
   $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
   if($done==0){
   $message = "<html><p>Dear Sir/Mam , <br><br> Batch Mail have been triggered to - ".$count." Emails.
   <br><br>List of emails it has gone to given Here -  ".$mailsentto ."
   
     <br><br>Current Status Of the Bulk Mail -  In progress
   </p>";
   }else {
    $message = "<html><p>Dear Sir/Mam , <br><br> Batch Mail have been triggered to - ".$count." Emails.
   <br><br>List of emails it has gone to given Here -  ".$mailsentto ."
  
     <br><br>Current Status Of the Bulk Mail -  Completed.
   </p>";    
   }
  
  
    $data = array( "to" => $toArray,
     "bcc" => $bccArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Batch Mail Sent -". $mailDeatils[0]['mail_subject'],
        "html" => $message,
    );
   
    // echo"<pre>";
    //  print_r($toArray);
      print_r($data);
   // exit(0);
   print_r($mailin->send_email($data));
   // exit(0); 
  }
    ?>