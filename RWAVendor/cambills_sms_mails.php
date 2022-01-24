<?php  include('model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
    $getEmail = $_GET['email'];
     $getFlatNo= $_GET['flat_no'];
     
    $arr = explode("-", $getFlatNo, 2);
    $BlockId = $arr[0];
    $HouseNumberId = $arr[1];
    $HouseNumberId = sprintf('%d',$HouseNumberId);
    
     
    if($BlockId == 'AG'){
        $BlockId = 1;
    }else if($BlockId == 'BC'){
        $BlockId = 2;
    }else if($BlockId == 'CC'){
        $BlockId = 3;
    }else if($BlockId == 'DW'){
        $BlockId = 4;
    }else if($BlockId == 'ES'){
        $BlockId = 5;
    }
    
     $getrecUsers = $ModelCall->rawQuery("SELECT * FROM `Wo_Users` where block_id = '$BlockId' AND house_number_id = '$HouseNumberId' ");
      //print_r($getrecUsers);
     $getrec = $ModelCall->rawQuery("SELECT * FROM `tbl_billing_new` where flat_no='".$getFlatNo."' order by bill_date desc limit 1");
      //print_r($getrec);
        if(count($getrec)>0){
             $bill_number = $getrec[0]['bill_number'];
             $bill_period = date("M",strtotime($getrec[0]['start_period_date'])). "-". date("M, Y",strtotime($getrec[0]['end_period_date']));
            
            send_cam_bill_new($getrec[0], $bill_number, $bill_period);
            
            if($getrec[0]['mob_no'] != NULL){
                 send_sms_for_cam_bill($getrec[0]);
           }
        }    
       

  header("location:".DOMAIN.AdminDirectory."billing_management_new.php?actionResult=emailsmssuccess");
   

 function send_cam_bill_new($rec, $bill_number, $bill_period){
   //  print_r($rec);
  // echo "Bill Number". $bill_number;
   //echo "https://nirvanacountry.co.in/bills_view/".$bill_number.".pdf";
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
 
 //  $toArray= array('techlead@myrwa.online'=>'Nishtha', 'kushalbhasin@gmail.com'=>'Kushal');
     $toArray= array($rec['email']=>$rec['first_name']);
  
        //$bccArray= array("nishthagupta@gmail.com"=>"Nishtha");
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
//
      if($rec['first_login']){
        print_r($mailin->send_email($data1));
        } else{
        print_r($mailin->send_email($data));      
       }
       //exit(0);
    }
    

   function send_sms_for_cam_bill($value){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear Resident , Pay on your Nirvana Country online by clicking here https://bit.ly/3dzZHXx. Rgds NRWA Office *TnCsAply';

     echo $message;

     $numbers=$value['mob_no'];
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
    

    ?>
  
            