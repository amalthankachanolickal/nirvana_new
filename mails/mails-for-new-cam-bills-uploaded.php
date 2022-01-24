<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
     
  $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_type in (0,1) limit 1500,100");
   
 //  $getrecUsers = $ModelCall->rawQuery("SELECT * FROM  `Wo_Users` u  where user_status='Active' and admin_approval=1 and user_email='kushalbhasin@gmail.com'");
   
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
             if($rec['floor_number']==5)
            {
                $floor="Fourth Floor";
            }
   
    $House_No= sprintf('%04d', $rec['house_number_id']);
    $flat_no =  $block."-".$House_No.$floor;
    echo  $flat_no. "<br>";
     $flat_no1 =  $block."-".$House_No.'GF';
  //    echo  $flat_no1. "<br>";
    if($floor==""){
    $getrec = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where bill_date='2020-09-29' and (flat_no='".$flat_no."' or flat_no ='". $flat_no1."') limit 1");
    }else {
    $getrec = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where bill_date='2020-09-29' and flat_no='".$flat_no."' limit 1");   
    }
  // print_r($getrec);
  //  exit(0);
    if(count($getrec)>0){

      // $getrec = $ModelCall->rawQuery("update `tbl_billing_new` set mob_no='".$rec['phone_number']."', email='".$rec['user_email']."' where bill_date='2020-06-26' and flat_no='".$flat_no."' limit 1");
      
      $rec['bill_number']=$getrec[0]['bill_number'];
       $rec['payable_amount']=$getrec[0]['payable_amount'];
        
       // print_r($rec);
      // exit(0);
        // Sending Email
        if($rec['user_email']!='' && $rec['user_status']=='Active' && $rec['user_email']!=NULL){

         // send_email_with_bill_customised($rec);
           send_generic_mail($rec);
         
        }else{
              echo "Not valid ";
        }
        
        // sending SMS 
        if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
        send_sms_for_cam_bill($rec);
        }
      // exit(0);
    }
   
  }
  exit(0);
   

    function send_generic_mail($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
  
       $toArray= array($rec['user_email']=>$rec['first_name']);
       //  $bccArray= array("techlead@myrwa.online"=>"Nishtha");
      
        $data = array( "to" => $toArray,
              "from" => array("website.admin@nirvanacountry.co.in", "NRWA Office"),
                "subject" => "Your NRWA CAM Bill Sep 2020.",
               // "bcc" =>$bccArray,
            //   "attachment" => array("https://nirvanacountry.co.in/bills_view/".$rec['bill_number'].".pdf"),
          "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",
            <br><br>
             CAM bill for the Q3 period 20_21 has been updated online on the webiste.  <br><br>
             <a  href='https://nirvanacountry.co.in/bills_desktop.php'>Click here</a> to view & pay the bill online using Net Banking or Credit Cards.
                You may also pay your bills using the Society Connect application or NEFT or cheque.<br><br>                 
          Visit your  <a  href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other new features including :
          <ul style='font-family:Helvetica;font-size:16px;line-height:24px;text-align:left' >
          <li><a href='https://www.nirvanacountry.co.in/membership.php'>Fill & submit</a> your membership form online. No need to visit office or print paper.</li>
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
            $data1 =array( "to" => $toArray,
              "from" => array("website.admin@nirvanacountry.co.in", "NRWA Office"),
             "subject" => "Your NRWA CAM Bill Sep 2020.",
               // "bcc" =>$bccArray,
            // "attachment" => array("https://nirvanacountry.co.in/bills_view/".$rec['bill_number'].".pdf"),
            "html" => " <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
             Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",
            <br><br>
             CAM bill for the Q3 period 20_21 has been updated online on the webiste.  <br><br>
             <a  href='https://nirvanacountry.co.in/bills_desktop.php'>Click here</a> to view & pay the bill online using Net Banking or Credit Cards.
                You may also pay your bills using the Society Connect application or NEFT or cheque.<br><br>                 
          Visit your  <a  href='https://nirvanacountry.co.in'>Nirvana Country</a> online and also find a host of other new features including :
          <ul style='font-family:Helvetica;font-size:16px;line-height:24px;text-align:left' >
        <li><a href='https://www.nirvanacountry.co.in/membership.php'>Fill & submit</a> your membership form online. No need to visit office or print paper.</li>
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
      if($rec['first_login']==1){
        print_r($mailin->send_email($data1));
        } else{
        print_r($mailin->send_email($data));      
       }
    }



    function send_email_with_bill_customised($rec){
   //  print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
   //$toArray= array("nishthagupta@gmail.com"=>"Nishtha", "kushalbhasin@gmail.com"=>"Kushal","arit.p19@imi.edu"=>"Arit","shreyhk@gmail.com"=>"Shrey");
    //$toArray= array("nishthagupta@gmail.com"=>"Nishtha");
       $toArray= array($rec['user_email']=>$rec['first_name']);
    //    $bccArray= array("nishthagupta@gmail.com"=>"Nishtha");
        $data = array( "to" => $toArray,
        "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
            "subject" => "Pay your CAM Bills online",
             "attachment" => array("https://nirvanacountry.co.in/bills_view/".$rec['bill_number'].".pdf"),
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
           <li><a href='https://www.nirvanacountry.co.in/membership.php'>Fill & submit</a> your membership form online. No need to visit office or print paper.</li>
          <li>Find the latest updates in the <a href='https://nirvanacountry.co.in/'>COVID Response</a> Section. </li>
          </ul>
           <a  href='https://nirvanacountry.co.in/bills.php' style='display:inline-block;width:90px;padding:8px 8px;margin-left:260px;
           text-decoration:none;font-size:13px;font-weight:bold;color:#fff; text-align:center;border-radius: 10px; background:#37A000' target='_blank' align='center' >Pay Now</a>
                   <br><br>
            For ease of access, your User Name and Password is enclosed here:  
            <br>
            User Name : ". $rec['user_name']."<br>
            Password &nbsp;&nbsp;: ". $rec['password']."<br>
         <br>   </span>
      <span style='text-align:center'> Warm Regards, <br><br>
Website Admin <br>
www.nirvanacountry.co.in <br></span>
        </span></p></td></tr></tbody></table>",
   
     );
            $data1 = array( "to" => $toArray,
             "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
            "subject" => "Pay your CAM Bills online.",
            "attachment" => array("https://nirvanacountry.co.in/bills_view/".$rec['bill_number'].".pdf"),
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
          <li><a href='https://www.nirvanacountry.co.in/membership.php'>Fill & submit</a> your membership form online. No need to visit office or print paper.</li>
          <li>Find the latest updates in the <a href='https://nirvanacountry.co.in/'>COVID Response</a> Section. </li>
          </ul>
           <a  href='https://nirvanacountry.co.in/bills.php' style='display:inline-block;width:90px;padding:8px 8px;margin-left:260px;text-decoration:none;font-size:13px;
           font-weight:bold;color:#fff; border-radius: 10px; background:#37A000; text-align:center' target='_blank' align='center'>Pay Now</a>
                   <br><br>
            </span>
      <span style='text-align:center'> Warm Regards, <br><br>
Website Admin <br>
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
      $message= 'Dear '.$value['user_title'].' '.$value['first_name'].' '.$value['last_name'].', Nirvana CAM Bill for Q3 20_21 is '.$value['payable_amount'].'. Pay on your Nirvana Country online by clicking here https://bit.ly/3dzZHXx. Rgds NRWA Office *TnCsAply';

     echo $message;
//exit(0);
    $numbers=$value['phone_number'];
     //$numbers='9560889608';
  // $numbers='9560889608,8130032363';
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
  
            