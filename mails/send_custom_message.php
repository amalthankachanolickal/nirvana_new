<?php 
echo dirname(__FILE__). '<br>';
include(dirname(__FILE__) .'/../model/class.expert.php');
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
require(dirname(__FILE__) .'/../mailin-lib/send_sms.php');

$getmailtobesent = $ModelCall->rawQuery("SELECT * FROM `batch_message_cron_file` where message_start_date =CURRENT_DATE() and category_message='Custom Message' and `status`='ongoing' limit 1");
if(count($getmailtobesent)<1) {
    $getmailtobesent = $ModelCall->rawQuery("SELECT * FROM `batch_message_cron_file` where message_start_date =CURRENT_DATE() and category_message='Custom Message' and `status`='tobestarted' limit 1");
}

echo count($getmailtobesent);
   
if(count($getmailtobesent) ==1){
    if($getmailtobesent[0]['status']=='ongoing')  {
        $query = $getmailtobesent[0]['mailing_sql']. ' LIMIT '. $getmailtobesent[0]['current_offset'] .', 300';
        $startsendingmail =$ModelCall->rawQuery($query);
    }else{
        $startsendingmail =$ModelCall->rawQuery($getmailtobesent[0]['mailing_sql']);
        $query = $getmailtobesent[0]['mailing_sql'];
    }
    
   
    echo "<pre>" . count($startsendingmail);
    $count=0;
    $done=0;
    $mailsentto ="";
    if(count($startsendingmail)<1){
        $ModelCall->where("id", $getmailtobesent[0]['id']);
        $result =  $ModelCall->get('batch_message_cron_file');
        $dataArray = array(
        
        "completed_datetime"=> date('Y-m-d H:i:s'),
        "status"=> 'Completed',
        "count_message_left"=> $result[0]['count_message_left']-$result[0]['count_message_left'],
        
        );
        $ModelCall->where("id", $getmailtobesent[0]['id']);
        $ModelCall->update("batch_message_cron_file", $dataArray);
        echo "Completed" ;
        $done=1; 
        exit(0);
    }
    foreach($startsendingmail as $value){
        $ModelCall->where("id", $getmailtobesent[0]['id']);
        $result =  $ModelCall->get('batch_message_cron_file');

        if($result[0]['count_message_left']==1){
            send_sms($result, $startsendingmail);
            $dataArray = array(
                "current_offset"=> $result[0]['current_offset']+1,
                "completed_datetime"=> date('Y-m-d H:i:s'),
                "status"=> 'Completed',
                "count_message_left"=> $result[0]['count_message_left']-1,
            );
            $ModelCall->where("id", $getmailtobesent[0]['id']);
            $ModelCall->update("batch_message_cron_file", $dataArray);
            echo "Completed" ;
            $done=1;
            break;
        }else{
            send_sms($result, $startsendingmail);
            $count++;
            $mailsentto =$mailsentto ."," . $value['email'];
            
            $dataArray = array(
              "current_offset"=> $result[0]['current_offset']+1,
              "status"=> 'ongoing',
              "count_message_left"=> $result[0]['count_message_left']-1,
            );
            $ModelCall->where("id", $getmailtobesent[0]['id']);
            $ModelCall->update("batch_message_cron_file", $dataArray);
            echo "update Done" ;
        }
    }
    echo "</pre>";
   
    
    
}else{
    Echo "No Message to be sent right now.";
}
  
  
  
  
function send_sms($cronttab, $rec){
    $msg_id = $cronttab[0]["msg_id"];
    $msg_var = $cronttab[0]["msg_var"];
    $phone_no = $rec[0]["phone_number"];
    $name = $rec[0]["first_name"]. " ". $rec[0]["last_name"];
    
    if($msg_id=='123553'){
        $varValStr = $rec['user_name'] . "|" . $rec['password'];
    }else{
        $varValStr = $name . "|" . $msg_var;    
    }
    
    $fields = array(
        "sender_id" => "NRWAOB",
        "message" => $msg_id,
        "variables_values" => $varValStr,
        "route" => "dlt",
        "numbers" => $phone_no,
    );
    echo "<br> Sending SMS (".$msg_id.")  to : " . $name . "( " . $phone_no . " )";
    sendSMS($fields);
}
    

    
    
    ?>