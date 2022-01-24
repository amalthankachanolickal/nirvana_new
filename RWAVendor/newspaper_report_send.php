<?php //  print getcwd() . "\n";
//echo $_SERVER['DOCUMENT_ROOT']. '<br>';
//echo basename(dirname(__FILE__)). '<br>';
//echo dirname(__FILE__). '<br>';
include_once dirname(__FILE__) .'/model/class.expert.php';
//include('adminsession_checker.php');
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
error_reporting(1);
$first=0 ;
$getcurrDate = $ModelCall->rawQuery("SELECT CURRENT_DATE()");
print_r($getcurrDate);
//exit(0);
$getNewsInfo = $ModelCall->rawQuery("SELECT * FROM `tbl_newspaper_bill` where date_paid is not null and 
date(date_paid) =CURRENT_DATE() ORDER BY `date_paid` DESC");
//print_r($getNewsInfo);
if(count($getNewsInfo)<1){
  echo "No new Payments , Not to send Mail report";
  exit(0);
} else {
  echo "Send the Mail report";
}
$getDriverInfo = $ModelCall->rawQuery("SELECT b.bill_no,b.month_name, CONCAT(w.first_name, ' ', w.last_name) as member_name, b.block_number, b.house_number, b.floor, b.total_bill_amt, b.amt_paid, b.date_paid, b.PGway_status, b.bill_details  FROM `tbl_newspaper_bill` b left join  Wo_Users w on w.block_id= b.block_number and w.house_number_id=b.house_number  where b.amt_paid>0 and date_paid is not null and date(date_paid) =CURRENT_DATE() ORDER BY `date_paid` DESC, block_number , house_number_id");

$filename = date('Y-m-d')."newspaper_reports.csv";         //File Name
// Create connection 
	$fp = fopen(dirname(__FILE__). '/newspaper_reports/'.$filename, 'w+'); 
               
                   $headers  = array(
                "0"   => "Bill Number",
                "1"  => "Bill Month",
"2"  => "Member Name",
"3"  => "Block No",
"4"  => "House Number",
"5"  => "Floor",
"6"  => "Bill Amount",
"7"  => "Amount Paid",
"8"  => "Date Paid",
"9"  => "Payment Gateway Status",
"10" => "Mode",
);
 
fputcsv($fp, $headers);


foreach($getDriverInfo as $dataU){
  //  unset($dataU['id']);
  if($dataU['block_number']==1){
    $dataU['block_number']='AG';
  }else if ($dataU['block_number']==2){
    $dataU['block_number']='BC';
  }else if ($dataU['block_number']==3){
    $dataU['block_number']='CC';
  }else if ($dataU['block_number']==4){
    $dataU['block_number']='DC';
  }else if ($dataU['block_number']==5){
    $dataU['block_number']='ES';
  }
    fputcsv($fp, $dataU);
   // fwrite($fp, $dataU); 
}
//file_put_contents('/public_html/nirvanacountry.co.in/RWAVendor/billing_reports/'.$filename);
echo "Done";
fclose($fp);
send_email_report($filename);
exit(0);

function dateformatchange($date){
  
    $date=date_create($date);
  
 $date_return=date_format($date,"d M Y");
 
 return $date_return;

}
function dateformatchange2($date){
  
    $date=date_create($date);
  
 $date_return=date_format($date,"d M Y");
 
 return $date_return;

}

function send_email_report($filename){
    
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
       $toArray= array("techlead@myrwa.online"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");
     // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
      $attachmentArray = array("https://nirvanacountry.co.in/RWAVendor/newspaper_reports/".$filename);
      $data = array( "to" => $toArray,
          "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
          "subject" => "Daily Newspaper Bills Paid Online Report",
          "attachment" => $attachmentArray,
         "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
    <tbody>
     <tr><td style='padding:15px 15px 15px 55px'>
                        <p> <u> Newspaper Bills Paid Online Report </u>
                        </p> <p>
                        Dear Sir,<br><br>
                        Please find attached report for CAM bills paid Online through the <a  href='".DOMAIN."'>Nirvana Website</a> till now.
                        </p>
                        </td></tr>
                        <tr>
                        <td align='left' style='padding:15px 15px 15px 55px'>Warm Regards,<br>NRWA Office
                        <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                        <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                      </tr>
                      
                    </tbody>
                  </table>"
);
$send = $mailin->send_email($data);
print_r($send);
}

?>
