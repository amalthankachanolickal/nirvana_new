<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
  
    $getrec = $ModelCall->rawQuery("SELECT * FROM `Wo_Users`  where user_type=1");
    echo "<pre>". count($getrec);
    foreach($getrec as $rec){
   //   print_r($rec);

      switch($rec['block_id']){
        Case 1: 
        $block= "AG";
        break;

       Case 2: 
       $block= "BC";
       break;

        Case 3: 
        $block= "CC";
        break;

        Case 4: 
        $block= "DW";
        break;
        
        Case 5: 
        $block= "ES";
        break;

      }

      
     switch($rec['floor_number']){

      Case 1: 
      $floor= "GF";
      break;

      Case 2: 
     $floor= "FF";
     break;

      Case 3: 
      $floor= "SF";
      break;

      Case 4: 
      $floor= "TF";
      break;
      
  } 

      $house_number = str_pad($rec['house_number_id'], 4, '0', STR_PAD_LEFT);
        $flat_no =  $block."-".$house_number;
        echo $flat_no;
        $getcamBill = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where bill_date='2020-03-25'  and flat_no='". $flat_no."' and total_outstanding>0");
      //print_r($getcamBill);

   // if(count($getcamBill)>0){
      // if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
      //       send_sms_to_tenants($rec,$getcamBill);
      //     }

          if($rec['email']!='' && $rec['user_status']=='Active'){
          send_email_tenants($rec, $getcamBill,  $block, $house_number, $floor);
          }
          // exit(0);
       // }
     
     

   
    }
    
    function send_email_tenants($value, $getcamBill, $block, $house_number, $floor){

     
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
       $toArray= array($value['email']=>$value['first_name']);
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
                           <td style='padding:15px 15px 15px 55px' align='left' valign='middle'>
                           <p>
                           Dear ".$value['first_name']."  ".$value['last_name'].",
                            <br><br>
                          
We are pleased to share with you, your access to the Nirvana web portal  <a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in.</a> The portal offers you many features for convenience and access to all key information online, anywhere, anytime at your finger tips. 
<br><br>            
You can also use it conveniently from your mobile, and get further ease, by saving it on your mobile Home Screen. Thus, you will get the convenience like that of an App, yet, without a need to download the App or sacrifice storage space. Click here to see how https://www.nirvanacountry.co.in/files_download.php?meid=Processes . 
                            <br><br>
                            Your access details are 
                           <br><br>
                           Access details : <a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in</a>
                           <br>Username : ".$value['user_name']."
                           <br>Password  :".$value['password']."
                           <br><br> In the interest of safety and security, you will be required to change the default password upon your first log in to the portal.  <br><br> ";
                           if($getcamBill[0]['total_outstanding']>0){
                            $message = $message ."
                           Your CAM Bill o/s is ".$getcamBill[0]['total_outstanding']."/-. You can <a  href='https://www.nirvanacountry.co.in/bills.php' target='_blank'>click here </a>to pay the same and pay for your Newspaper Bills online with 0 Txn Chgs for NetBanking.";
                           };
                            $message = $message ."You can also access all forms online and a host of other information online. The portal has a host of other features for the residents and which you can explore here <a href='https://www.nirvanacountry.co.in/files_download.php?meid=Processes' target='_blank'>https://www.nirvanacountry.co.in/files_download.php?meid=Processes</a>
                            <br><br>
                           This message is for the residents of " .$block."-". $house_number."," .$floor.", Nirvana Country. If you are not the intended recipient of this message, then please let us know by SMS or WhatsApp on +918130032363 or email us at <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a> . 
                           <br><br>
                           
                           Warm Regards,
                           <br><br>
                           NRWA Office.<br>
                           <a href='https://www.nirvanacountry.co.in' target='_blank'>www.nirvanacountry.co.in</a><br>
                           </p></td>
                         </tr>
                         
               </tbody>
             </table></td>
         </tr>
       </tbody>
     </table>";
   // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
   //  $toArray= array("nishthagupta@gmail.com"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal","arit.p19@imi.edu"=>"Arit");
        $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Welcome to Nirvana Online.",
           "html" => $message,
     );
     print_r($toArray);
       print_r($mailin->send_email($data));
     
    }

    function send_sms_to_tenants($value,$getcamBill){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value['first_name'].' '.$value['last_name'].', 

      You can now access the Nirvana website https://bit.ly/3cbbslN and your access details are 
      Username :  '.$value['user_name'].'    
      Password : '.$value['password'].' 
      Click here to access :  https://bit.ly/3cbbslN';
      if($getcamBill[0]['total_outstanding']>0){
        $message=$message.'<br>You can pay here  https://bit.ly/3dzZHXx your o/s CAM Bill '.$getcamBill[0]['total_outstanding'].'/-. with 0 Txn Chgs for NetBnkg.';
      }
        $message=$message.' This message is for the residents of Nirvana Country. If you are not the intended recipient of this message, then please let us know by SMS/ WhatsApp on  +918130032363 or at office.nrwa@nirvanacountry.co.in . 
      
      Regards, NRWA Office.';
    //   if($value['first_login']==0){
    //   $message= $message.' UserName: '.$value['user_name'].' Password: '.$value['password'];
    //   }
    //  $message= $message.' Warm Regards, NRWA Office  www.nirvanacountry.co.in. *TnCs apply.';

     echo $message;
 // exit(0);
     $numbers=$value[0]['phone_number'];
  //  $numbers='9560889608,9810490363,9871349731,8013333816';
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