<?php //  print getcwd() . "\n";
//echo $_SERVER['DOCUMENT_ROOT']. '<br>';
//echo basename(dirname(__FILE__)). '<br>';
//echo dirname(__FILE__). '<br>';
include_once dirname(__FILE__) .'/../model/class.expert.php';
//include('adminsession_checker.php');
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
error_reporting(1);
$first=0 ;


$getNewRecords = $ModelCall->rawQuery("SELECT * FROM `Wo_Users` where admin_approval=0 and user_status='Active' and user_email IS NOT NULL order by join_date desc");
if(count($getNewRecords)==0){
    echo "No New payments of settlements";
    exit(0);
}

else {
     echo "Records will Show";
  //  exit(0);
    send_email_report($getNewRecords);
    
    
    
}



function send_email_report($getNewRecords){
    
    $table="";
      foreach($getNewRecords as $rec){
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
     $full_name =  $rec['first_name']." ".$rec['middle_name']. " ".$rec['last_name'];
         $table.=  "<tr ><td style='align:center'>". $flat_no ."</td><td style='align:center'>". $full_name ."</td><td style='align:center'>". $rec['created_date']."</td></tr>";
       }
  //    echo $table;
   //   exit(0);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
      $toArray= array("office.nrwa@nirvanacountry.co.in"=>"Office NRWA");
    $bccArray= array("techlead@myrwa.online"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");
    // $toArray= array("office.nrwa@nirvanacountry.co.in"=>"Office NRWA","accounts.nirvana@nimbusharbor.com"=>"Accounts");
    // $toArray= array("kushalbhasin@gmail.com"=>"Kushal","nishthagupta@gmail.com"=>"Nishtha");
      $data = array( "to" => $toArray,
           "bcc" => $bccArray,
          "from" => array("website.admin@nirvanacountry.co.in", "Website Admin"),
          "subject" => "UnResponded Enrolment Requests.",
         "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
    <tbody>
     <tr><td style='padding:15px 15px 15px 55px'>
                         <p>
                        Dear Sir,<br><br>
                        There are ".count($getNewRecords)." Enrolment Requests as follows Pending Office Approval. <br><br>
                        <table width='100%' border='1' cellspacing='2' cellpadding='2' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
                        <thead>
                        <tr>
                        <th>House No.</th>
                        <th>Name</th>
                        <th>Date Received. </th>
                        </tr>
                        </thead>
                            <tbody>".
                           $table
                            ."</tbody>
                        </table>
                        <br><br>
                        <a  href='".DOMAIN."RWAVendor/login.php'>Click Here </a> to verify and approve the same.
                        </p>
                        </td></tr>
                        <tr>
                        <td align='left' style='padding:15px 15px 15px 55px'>Warm Regards,<br> Website Admin
                        <br><a  href='mailto:website.admin@nirvanacountry.co.in'>website.admin@nirvanacountry.co.in</a>
                        <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                      </tr>
                      
                    </tbody>
                  </table>"
);
$send = $mailin->send_email($data);
print_r($send);
}

?>
