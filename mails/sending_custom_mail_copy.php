<?php 
echo dirname(__FILE__). '<br>';
include(dirname(__FILE__) .'/../model/class.expert.php');
     require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
   
    $getmailtobesent = $ModelCall->rawQuery("SELECT * FROM `batch_mail_cron_file` where id='38'");
    
    // echo "<pre>";
    // print_r($getmailtobesent);
    //   echo "</pre>";
      $value['email']='techlead@myrwa.online';
     // exit(0);
        send_mail($value, $getmailtobesent);
        exit(0);
    if(count($getmailtobesent) ==1){
      if($getmailtobesent[0]['status']=='ongoing')  {
          $query = $getmailtobesent[0]['mailing_sql']. ' LIMIT '. $getmailtobesent[0]['current_offset'] .', 300';
           $startsendingmail =$ModelCall->rawQuery($query);
      }else{
         $startsendingmail =$ModelCall->rawQuery($getmailtobesent[0]['mailing_sql']);
         $query = $getmailtobesent[0]['mailing_sql'];
      }
      echo  $query;
     echo "<pre>" . count($startsendingmail);
   // print_r($startsendingmail);
   //exit(0);
   
    
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
                $done=1; 
              exit(0);
    }
      foreach($startsendingmail as $value){
           
           $ModelCall->where("id", $getmailtobesent[0]['id']);
            $result =  $ModelCall->get('batch_mail_cron_file');
          
            if($result[0]['count_mail_left']==1){
            
             $dataArray = array(
                  "current_offset"=> $result[0]['current_offset']+1,
             "completed_datetime"=> date('Y-m-d H:i:s'),
              "status"=> 'Completed',
               "count_mail_left"=> $result[0]['count_mail_left']-1,
             
              );
              $ModelCall->where("id", $getmailtobesent[0]['id']);
              $ModelCall->update("batch_mail_cron_file", $dataArray);
              echo "Completed" ;
                $done=1;
               break;
            }else{
                 
                send_mail($value, $getmailtobesent);
                $count++;
           $mailsentto =$mailsentto ."," . $value['email'];
              $dataArray = array(
                  "current_offset"=> $result[0]['current_offset']+1,
                  "status"=> 'ongoing',
                  "count_mail_left"=> $result[0]['count_mail_left']-1,
                  );
                  $ModelCall->where("id", $getmailtobesent[0]['id']);
                  $ModelCall->update("batch_mail_cron_file", $dataArray);
              echo "update Done" ;
            }
            //exit(0);
      }
      echo "</pre>";
           batch_out($mailsentto,$getmailtobesent, $count, $done);
    }else{
        Echo "No Mails to be sent right now.";
    }
  
  
  
  
  function send_mail($value, $mailDeatils){
      
      if(isset($value['user_title']) &&  $value['first_name'] && $value['last_name']){
       $getFullName = $value['user_title']." ".$value['first_name']." ".$value['last_name'];
     }else{
        $getFullName = $value['first_name'];  
     }
     // $toArray= array($value['email']=>$value['email']);
      
        $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array('techlead@myrwa.online'=>'Nishtha',"kushalbhasin@gmail.com"=>'Kushal');
    $message= $mailDeatils[0]['mail_content'];
    
    //  if(isset( $mailDeatils[0]['selfrom']) &&  $mailDeatils[0]['selfrom']!=""){
    //      $fromArray=  array($mailDeatils[0]['selfrom'], $mailDeatils[0]['selfrom']);
    //  }else{
    //   $fromArray=  array("office.nrwa@nirvanacountry.co.in", "Office NRWA");
    //  }
     
     
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
     
     
    if($mailDeatils[0]['attachment']=='' || $mailDeatils[0]['attachment']==NULL ){
    $data = array( "to" => $toArray,
        "from" => $fromArray,
        "subject" => $mailDeatils[0]['mail_subject'],
        "html" =>  $message
    );
    }else {
         $attachments =explode(",",$mailDeatils[0]['attachment']);
          $data = array( "to" => $toArray,
        "from" => $fromArray,
        "subject" => $mailDeatils[0]['mail_subject'],
        "html" =>  $message,
        "attachment" =>  $attachments 
        );
    }
    // echo"<pre>";
      //print_r($toArray);
      print_r($data);
    //exit(0);
   print_r($mailin->send_email($data));
   exit(0); 
  }
  
  
    function send_sms_for_cam_bill(){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear Resident , Pay on your Nirvana Country online by clicking here https://bit.ly/3dzZHXx. Rgds NRWA Office *TnCsAply';

     echo $message;

    // $numbers=$value['phone_number'];
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
    
     function batch_out($mailsentto, $mailDeatils, $count, $done){
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    $toArray= array('office.nrwa@nirvanacountry.co.in'=>'Office NRWA');
    $bccArray= array("techlead@myrwa.online"=>"Nishtha", "Kushalbhasin@gmail.com"=>"Kushal");
   if($done==0){
   $message = "<html><p>Dear Sir/Mam , <br><br> Batch Mail have been triggered to - ".$count." Emails.
   <br><br>List of emails it has gone to given Here -  ".$mailsentto ."
    <br><br>Message of the Mail  -  <br><br> ".$mailDeatils[0]['mail_content'] ."
     <br><br>Current Status Of the Bulk Mail -  In progress
   </p>";
   }else {
    $message = "<html><p>Dear Sir/Mam , <br><br> Batch Mail have been triggered to - ".$count." Emails.
   <br><br>List of emails it has gone to given Here -  ".$mailsentto ."
    <br><br>Message of the Mail  -  <br><br> ".$mailDeatils[0]['mail_content'] ."
     <br><br>Current Status Of the Bulk Mail -  Completed.
   </p>";    
   }
  
    if($mailDeatils[0]['attachment']=='' || $mailDeatils[0]['attachment']==NULL ){
    $data = array( "to" => $toArray,
        "bcc" => $bccArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Batch Mail Sent -". $mailDeatils[0]['mail_subject'],
        "html" => $message,
    );
    }else {
        $attachments =explode(",",$mailDeatils[0]['attachment']);
          $data = array( "to" => $toArray,
           "bcc" => $bccArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
        "subject" => "Batch Mail Sent -". $mailDeatils[0]['mail_subject'],
        "html" =>  $message,
        "attachment" => $attachments
        );
    }
    // echo"<pre>";
    //  print_r($toArray);
    //  print_r($data);
   // exit(0);
   print_r($mailin->send_email($data));
   // exit(0); 
  }
    
    
    ?>