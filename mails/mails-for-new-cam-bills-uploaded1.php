<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
     
   $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and  user_type in (0,1) limit 100");
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
    echo  $flat_no. "<br>";
    
    $getrec = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where bill_date='2020-06-25' and flat_no='".$flat_no."' limit 1");
  //  print_r($getrec);
    if(count($getrec)>0){
        $rec['payable_amount']=$getrec[0]['payable_amount'];
        
        //print_r($rec);
        //exit(0);
        // Sending Email
        if($rec['user_email']!='' && $rec['user_status']=='Active' && $rec['email_valid']=='1'){

            send_email_event_successful_transaction($rec);
         
        }else{
              echo "Not valid ";
        }
        
        // sending SMS 
        if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
        send_sms_for_cam_bill($rec);
        }
    exit(0);
    }
   
  }
  exit(0);
   


    function send_email_event_successful_transaction($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
   //$toArray= array("nishthagupta@gmail.com"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal","arit.p19@imi.edu"=>"Arit","shreyhk@gmail.com"=>"Shrey");
    $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
   //    $toArray= array($rec['user_email']=>$rec['first_name']);
    //    $bccArray= array("nishthagupta@gmail.com"=>"Nishtha", $rec['user_email']=>$rec['firstname']);
        $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online-FIRST TIME USERS TEST",
             "attachment" => array("https://therwa.in/bills_view/NRWAQ604102022.pdf"),
          "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",
            <br><br>
              Please find enclosed, your CAM bill for the period 1st July, 20  to 30th Sep, 20. <br><br>
             <a  href='https://nirvanacountry.co.in/bills.php'>Click here</a> to view & pay the bill online using Net Banking or Credit Cards.
                You may also pay your bills using the Society Connect application or NEFT or cheque.<br><br>                 
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
            "subject" => "Pay your CAM Bills online : TESTMAIL",
            "attachment" => array("https://therwa.in/bills_view/NRWAQ604102022.pdf"),
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",
            <br><br>
              Please find enclosed, your CAM bill for the period 1st July, 20  to 30th Sep, 20. <br><br>
             <a  href='https://nirvanacountry.co.in/bills.php'>Click here</a> to view & pay the bill online using Net Banking or Credit Cards.
                You may also pay your bills using the Society Connect application or NEFT or cheque.<br><br>                 
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
      if($rec['first_login']){
        print_r($mailin->send_email($data1));
        } else{
        print_r($mailin->send_email($data));      
       }
    }

    function send_sms_for_cam_bill($value){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value['first_name'].' '.$value['last_name'].', Your CAM Bill due is Rs. '.$value['payable_amount'].'. Click here to pay https://bit.ly/3dzZHXx your CAM Bills using Net Banking or Credit Cards. ZERO Transaction Charges* for Net Banking. You can also see your previous bills history online.';
      if($value['first_login']==0){
      $message= $message.' UserName: '.$value['user_name'].' Password: '.$value['password'];
      }
     $message= $message.' Warm Regards, NRWA Office  www.nirvanacountry.co.in. *TnCs apply.';

     echo $message;
exit(0);
    // $numbers=$value['phone_number'];
     $numbers='9560889608';
  // $numbers='9560889608, 9810490363, 8013333816';
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
  
            