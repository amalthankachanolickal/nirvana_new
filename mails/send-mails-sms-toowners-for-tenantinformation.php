<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
  
    $getrec = $ModelCall->rawQuery("SELECT * FROM `Wo_Users`  where user_type=1");
    echo "<pre>". count($getrec);
    foreach($getrec as $rec){
     // print_r($rec);
      $getrecOwner = $ModelCall->rawQuery("SELECT * FROM `Wo_Users`  where user_type=0 and block_id=". $rec['block_id']." and house_number_id =".$rec['house_number_id']. " and floor_number=".$rec['floor_number']);

      if(count($getrecOwner)>0){
        echo "Owner Found";
       // print_r($getrecOwner);
        // if($getrecOwner[0]['phone_number']!='' || $getrecOwner[0]['phone_number']!=NULL){
        //   send_sms_to_owners($getrecOwner, $rec);
        // }
      if($getrecOwner[0]['user_email']!='' && $getrecOwner[0]['user_status']=='Active' && $getrecOwner[0]['email_valid']=='1'){
      send_email_event_successful_transaction($getrecOwner,$rec);
      }

     
      } else {
        echo "No Owner";
      } 

    // exit(0);

  // $toArray= array($value['email']=>$value['first_name']);
      // if($getrecOwner[0]['user_email']!='' && $rec['user_status']=='Active' && $rec['email_valid']=='1'){
      // send_email_event_successful_transaction($rec);
      // }

      // if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
      //   send_sms_for_cam_bill($rec);
      // }
   
    }
    
    function send_email_event_successful_transaction($value, $valuetenant){
     // print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
       $toArray= array($value[0]['user_email']=>$value[0]['first_name']);
       $message = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
       <tbody>
         <tr>
           <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
               <tbody>
                 <tr>
                   <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
                 </tr>
                 <tr>
                   <td>
                   <table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                       <tbody  style='background:#fff'>
                         <tr>
                           <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                         </tr>
                         <tr>
                           <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ></a></td>
                         </tr>
                         <tr>
                           <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>Dear ".$value[0]['first_name']."  ".$value[0]['last_name'].",
                         <br><br>
                         We hope you have enjoyed exploring your Nirvana web portal <a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in</a>  and are getting benefits from the online information available anywhere, anytime on your mobile. 
                           <br><br>
                           You can also conveniently use it from your mobile by saving the link on your Mobile Home Screen. Thus you will get the convinience like that of an App, yet, without a need to download the App or sacrifice storage space. Click here to see how <a href='https://www.nirvanacountry.co.in/files_download.php?meid=Processes' target='_blank'>https://www.nirvanacountry.co.in/files_download.php?meid=Processes</a>
                            
                           <br><br>";
                           if($value[0]['first_login']==0){
                          $message = $message ."
                           Your access details for the same are as here below
                           <br><br>
                           Access details :  <a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in</a>
                           <br>Username :".$value[0]['user_name']."
                           <br>Password :".$value[0]['password']."<br><br>";
                           };
                           $message = $message .
                           "We are pleased to share with you, that now, your tenants can also  access the Nirvana portal (select sections). You and your tenants can view and pay CAM Bills and pay the newspaper vendor, online. 
                           <br><br>
                           We have the following details of your tenant and would be providing them access basis the same. Would request you to check and confirm the same. 
                           <br><br>
                           Name :  ".$valuetenant['first_name']." ".$valuetenant['last_name']."
                           <br>Email :  ".$valuetenant['email']."
                           <br>Mobile Number  :  ".$valuetenant['phone_number']."
                           <br><br>
                           This message is only for the residents or members of  Nirvana Country. If you are not the intended recipient of the email or if any of the above information needs a change, then please let us know by SMS or WhatsApp on +918130032363 or email at  <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in.</a><br>
Regards<br><br> NRWA Office</td>
                         </tr>
                         
               </tbody>
             </table></td>
         </tr>
       </tbody>
     </table>";
   //  $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
  //   $toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal","arit.p19@imi.edu"=>"Arit");
        $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Nirvana Online Update.",
           "html" => $message,
     );
     print_r($toArray);
       print_r($mailin->send_email($data));
     
    }

    function send_sms_to_owners($value, $valuetenant){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value[0]['first_name'].' '.$value[0]['last_name'].',  We have the tenant details for your house as '.$valuetenant['user_title'].' '.$valuetenant['first_name'].'  '.$valuetenant['last_name'].', '.$valuetenant['phone_number'].', '.$valuetenant['email'].'. Basis the same, they are being given access to the Nirvana website https://bit.ly/3cbbslN . If any of these details are incorrect or if you are not the intended recipient of this message, then please let us know by SMS or WhatsApp on  +918130032363 or at  office.nrwa@nirvanacountry.co.in. Rgds NRWA Office';
    //   if($value['first_login']==0){
    //   $message= $message.' UserName: '.$value['user_name'].' Password: '.$value['password'];
    //   }
    //  $message= $message.' Warm Regards, NRWA Office  www.nirvanacountry.co.in. *TnCs apply.';

     echo $message;

     $numbers=$value[0]['phone_number'];
    // $numbers='9560889608,9810490363,9871349731,8013333816';
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