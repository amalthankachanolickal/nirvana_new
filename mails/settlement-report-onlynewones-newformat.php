<?php //  print getcwd() . "\n";
//echo $_SERVER['DOCUMENT_ROOT']. '<br>';
//echo basename(dirname(__FILE__)). '<br>';
//echo dirname(__FILE__). '<br>';
include_once dirname(__FILE__) .'/../model/class.expert.php';
//include('adminsession_checker.php');
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
error_reporting(1);
$first=0 ;

$date =date('Y-m-d');
//$date = '2021-01-21';

$getNewRecords = $ModelCall->rawQuery("SELECT * FROM `tbl_transations_payu` where settlement_date='".$date."' and action_from_website='BillpaperModule'");
if(count($getNewRecords)==0){
    echo "No New payments of settlements";
    exit(0);
}


//exit(0);
//$filename = "CAMBill-Setllement-Report-new-21-Jan.csv";
$filename = "CAMBill-Setllement-Report-new".date('jS-M').".csv";         //File Name
// Create connection 
$fp = fopen(dirname(__FILE__). '/billing_reports/'.$filename, 'w+'); 
$headers  = array(
    "0"   => "House / blck/ floor No.",
    "1"  => "Name",
    "2"  => "Total Bill Amount (including arrears etc)",
    "3"  => "Date of payment",
    "4"  => "Amount Paid",
    "5"  => "Amount to be settled",
    "6"  => "Amt Credited to the Ac",
    "7" => "Payment Status",
    "8"  => "Date Settled/ paid",
    "9" => "Pay Fm",
    );
     
    fputcsv($fp, $headers);

    $total =0;
    $sumOverOriginalAmount =0;
    $totalamt_paid =0;

    $gettotaldata = $ModelCall->rawQuery("SELECT sum(bpay.amount_received) as totalamtpaid, sum(ROUND(payu.settlement_amount,2)) as total_settlement_amount, payu.settlement_date 
    FROM `tbl_transations_payu` payu , tbl_bill_payment_details bpay where payu.txnid=bpay.pay_ref and bpay.mode='online' and payu.settlement_date='".$date."'");

    $getSettlementData = $ModelCall->rawQuery("SELECT bpay.unit_num as HouseNo, bill.member_name as Name, bill.payable_amount as total_bill, bpay.date_received as date_payment, 
    bpay.pay_ref, bpay.amount_received as amtpaid, ROUND((payu.amount- bpay.amount_received),2) as tdrbyus, payu.amount as totalamountPaid, payu.mode, payu.pg_type as bankName, 
    ROUND(payu.tdr_by_payu,2) as trdbyPayu, ROUND(payu.settlement_amount,2) as settlement_amount, payu.payment_status, payu.settlement_date, 
    ROUND(ROUND((payu.amount- bpay.amount_received),2)-payu.tdr_by_payu,2) as shortbyus FROM `tbl_transations_payu` payu , tbl_bill_payment_details bpay, 
    tbl_billing_new bill where payu.txnid=bpay.pay_ref and bpay.mode='online' and bpay.bill_num = bill.bill_number and payu.settlement_date='".$date."'");

    $getSettlementDataLesspaid = $ModelCall->rawQuery("SELECT bpay.unit_num as HouseNo, bill.member_name as Name, bill.payable_amount as total_bill, bpay.date_received as date_payment, 
    bpay.pay_ref, bpay.amount_received as amtpaid, ROUND((payu.amount- bpay.amount_received),2) as tdrbyus, payu.amount as totalamountPaid, payu.mode, 
    payu.pg_type as bankName, ROUND(payu.tdr_by_payu,2) as trdbyPayu, ROUND(payu.settlement_amount,2) as settlement_amount, payu.payment_status, payu.settlement_date, 
    ROUND(ROUND((payu.amount- bpay.amount_received),2)-payu.tdr_by_payu,2) as shortbyus FROM `tbl_transations_payu` payu , tbl_bill_payment_details bpay, 
    tbl_billing_new bill where payu.txnid=bpay.pay_ref and bpay.mode='online' and bpay.bill_num = bill.bill_number and payu.settlement_date='".$date."' and 
    ROUND(ROUND((payu.amount- bpay.amount_received),2)-payu.tdr_by_payu,2) < 0");


    if(count($getSettlementData)>0){
       
        for($i=0; $i<count($getSettlementData); $i++){
           
          //  $total =  $total + $getSettlementData[$i]['settlement_amount'];
          //  $totalamt_paid =  $totalamt_paid + $getSettlementData[$i]['amount_received'];
            if($i<count($getSettlementData)-1){
                if( $getSettlementData[$i]['shortbyus']>0){
                    $sumOverOriginalAmount = $sumOverOriginalAmount+$getSettlementData[$i]['shortbyus'];
                 $dataU = array(
                    "0"   =>  $getSettlementData[$i]['HouseNo'],
                    "1"  =>  $getSettlementData[$i]['Name'],
                    "2"  =>  $getSettlementData[$i]['total_bill'],
                    "3"  =>  $getSettlementData[$i]['date_payment'],
                    //"4"  =>  $getSettlementData[$i]['pay_ref'],
                    "4"  =>  $getSettlementData[$i]['amtpaid'],
                    // "6"  =>  $getSettlementData[$i]['tdrbyus'],
                    // "7"  => $getSettlementData[$i]['totalamountPaid'],
                    // "8"  => $getSettlementData[$i]['mode'],
                    // "9"  => $getSettlementData[$i]['bankName'],
                    // "10" => $getSettlementData[$i]['trdbyPayu'],
                    // "11"  => "Nirvana Residents Welfare Association",
                    "5"  => $getSettlementData[$i]['amtpaid'],
                    "6"  => $gettotaldata[0]['total_settlement_amount'],
                    "7" =>  $getSettlementData[$i]['payment_status'],
                    "8"  => $getSettlementData[$i]['settlement_date'],
                    "9" => 'Pay U',
                );

                } else {

                    $dataU = array(
                        "0"   =>  $getSettlementData[$i]['HouseNo'],
                        "1"  =>  $getSettlementData[$i]['Name'],
                        "2"  =>  $getSettlementData[$i]['total_bill'],
                        "3"  =>  $getSettlementData[$i]['date_payment'],
                        //"4"  =>  $getSettlementData[$i]['pay_ref'],
                        "4"  =>  $getSettlementData[$i]['amtpaid'],
                        // "6"  =>  $getSettlementData[$i]['tdrbyus'],
                        // "7"  => $getSettlementData[$i]['totalamountPaid'],
                        // "8"  => $getSettlementData[$i]['mode'],
                        // "9"  => $getSettlementData[$i]['bankName'],
                        // "10" => $getSettlementData[$i]['trdbyPayu'],
                        // "11"  => "Nirvana Residents Welfare Association",
                        "5"  => $getSettlementData[$i]['settlement_amount'],
                        "6"  =>  $gettotaldata[0]['total_settlement_amount'],
                        "7" =>  $getSettlementData[$i]['payment_status'],
                        "8"  => $getSettlementData[$i]['settlement_date'],
                        "9" => 'Pay U',
                    );
                }
            } else {
                $dataU = array(
                    "0"   =>  $getSettlementData[$i]['HouseNo'],
                    "1"  =>  $getSettlementData[$i]['Name'],
                    "2"  =>  $getSettlementData[$i]['total_bill'],
                    "3"  =>  $getSettlementData[$i]['date_payment'],
                    // "4"  =>  $getSettlementData[$i]['pay_ref'],
                    "4"  =>  $getSettlementData[$i]['amtpaid'],
                    // "6"  =>  $getSettlementData[$i]['tdrbyus'],
                    // "7"  => $getSettlementData[$i]['totalamountPaid'],
                    // "8"  => $getSettlementData[$i]['mode'],
                    // "9"  => $getSettlementData[$i]['bankName'],
                    // "10" => $getSettlementData[$i]['trdbyPayu'],
                    // "11"  => "Nirvana Residents Welfare Association",
                    "5"  => $getSettlementData[$i]['settlement_amount'],
                    "6"  =>  $gettotaldata[0]['total_settlement_amount'],
                    "7" =>  $getSettlementData[$i]['payment_status'],
                    "8"  => $getSettlementData[$i]['settlement_date'],
                    "9" => 'Pay U',
                );   
            }
            fputcsv($fp, $dataU);
        // fwrite($fp, $dataU); 
        }
        if((count($getSettlementDataLesspaid)>0) && ($sumOverOriginalAmount>0)){
            $dataU = array(
                "0"   =>  $getSettlementDataLesspaid[0]['HouseNo'],
                "1"  =>  $getSettlementDataLesspaid[0]['Name'],
                "2"  =>  $getSettlementDataLesspaid[0]['total_bill'],
                "3"  =>  $getSettlementDataLesspaid[0]['date_payment'],
                //"4"  =>  $getSettlementData[$i]['pay_ref'],
                "4"  =>  '',
                // "6"  =>  $getSettlementData[$i]['tdrbyus'],
                // "7"  => $getSettlementData[$i]['totalamountPaid'],
                // "8"  => $getSettlementData[$i]['mode'],
                // "9"  => $getSettlementData[$i]['bankName'],
                // "10" => $getSettlementData[$i]['trdbyPayu'],
                // "11"  => "Nirvana Residents Welfare Association",
                "5"  => $sumOverOriginalAmount,
                "6"  => '',
                "7" =>  $getSettlementDataLesspaid[0]['payment_status'],
                "8"  => $getSettlementDataLesspaid[0]['settlement_date'],
                "9" => 'PayU',
            );
            fputcsv($fp, $dataU);  
        }
        $dataU = array(
            "0"   => '',
            "1"  =>  '',
            "2"  => '',
            "3"  => '',
            // "4"  =>  $getSettlementData[$i]['pay_ref'],
            "4"  =>   $gettotaldata[0]['totalamtpaid'],
            // "6"  =>  $getSettlementData[$i]['tdrbyus'],
            // "7"  => $getSettlementData[$i]['totalamountPaid'],
            // "8"  => $getSettlementData[$i]['mode'],
            // "9"  => $getSettlementData[$i]['bankName'],
            // "10" => $getSettlementData[$i]['trdbyPayu'],
            // "11"  => "Nirvana Residents Welfare Association",
            "5"  =>  $gettotaldata[0]['total_settlement_amount'],
            "6"  => '',
            "7" =>  '',
            "8"  =>'',
            "9" => '',
        ); 
        fputcsv($fp, $dataU);  

    }
    $dataU = array(
        "0"   => '',
        "1"  =>  '',
        "2"  => '',
        "3"  => '',
        "4"  =>  '',
        "5"  =>  '',
        "6"  => '',
        "7" =>  '',
        "8"  =>'',
        "9" => '',
    ); 
    fputcsv($fp, $dataU);  
  
//  if(count($getSettlementDataLesspaid)>0){
//     $gettotaldatabal = $ModelCall->rawQuery("SELECT  sum(ROUND(ROUND((payu.amount- bpay.amount_received),2)-payu.tdr_by_payu,2)) as amountoverdue, payu.settlement_date FROM `tbl_transations_payu` payu , tbl_bill_payment_details bpay where payu.txnid=bpay.pay_ref and bpay.mode='online' and payu.settlement_date=CURRENT_DATE() and ROUND(ROUND((payu.amount- bpay.amount_received),2)-payu.tdr_by_payu,2) < 0");

//     $TobepaidbyShweta = $gettotaldatabal[0]['amountoverdue']+$sumOverOriginalAmount;
//     $balanceamt=0;
//     if(abs($getSettlementDataLesspaid[0]['shortbyus']-$sumOverOriginalAmount)>0){
//         $balanceamt= abs($getSettlementDataLesspaid[0]['shortbyus'])-$sumOverOriginalAmount;

//       //  $TotalPayfromShweta = $TotalPayfromShweta+abs($balanceamt);

//         $dataU = array(
//             "0"   =>  $getSettlementDataLesspaid[0]['HouseNo'],
//             "1"  =>  $getSettlementDataLesspaid[0]['Name'],
//             "2"  =>  $getSettlementDataLesspaid[0]['total_bill'],
//             "3"  =>  $getSettlementDataLesspaid[0]['date_payment'],
//             //"4"  =>  $getSettlementData[$i]['pay_ref'],
//             "4"  =>   $getSettlementDataLesspaid[0]['amtpaid'],
//             // "6"  =>  $getSettlementData[$i]['tdrbyus'],
//             // "7"  => $getSettlementData[$i]['totalamountPaid'],
//             // "8"  => $getSettlementData[$i]['mode'],
//             // "9"  => $getSettlementData[$i]['bankName'],
//             // "10" => $getSettlementData[$i]['trdbyPayu'],
//             // "11"  => "Nirvana Residents Welfare Association",
//             "5"  =>  $balanceamt,
//             "6"  =>abs($TobepaidbyShweta),
//             "7" =>  $getSettlementDataLesspaid[0]['payment_status'],
//             "8"  =>  date('Y-m-d',  strtotime($getSettlementDataLesspaid[0]['settlement_date'] . ' +1 day')),
//             "9" => 'Shweta',
//         );
//         fputcsv($fp, $dataU);  
//     }

//     for($i=1; $i<count($getSettlementDataLesspaid); $i++){
//       //  $TotalPayfromShweta = $TotalPayfromShweta+abs($getSettlementDataLesspaid[0]['shortbyus']);

//         $dataU = array(
//             "0"   =>  $getSettlementDataLesspaid[$i]['HouseNo'],
//             "1"  =>  $getSettlementDataLesspaid[$i]['Name'],
//             "2"  =>  $getSettlementDataLesspaid[$i]['total_bill'],
//             "3"  =>  $getSettlementDataLesspaid[$i]['date_payment'],
//             //"4"  =>  $getSettlementData[$i]['pay_ref'],
//             "4"  =>  $getSettlementDataLesspaid[$i]['amtpaid'],
//             // "6"  =>  $getSettlementData[$i]['tdrbyus'],
//             // "7"  => $getSettlementData[$i]['totalamountPaid'],
//             // "8"  => $getSettlementData[$i]['mode'],
//             // "9"  => $getSettlementData[$i]['bankName'],
//             // "10" => $getSettlementData[$i]['trdbyPayu'],
//             // "11"  => "Nirvana Residents Welfare Association",
//             "5"  =>  abs($getSettlementDataLesspaid[$i]['shortbyus']),
//             "6"  => abs($TobepaidbyShweta),
//             "7" =>  $getSettlementDataLesspaid[$i]['payment_status'],
//             "8"  =>  date('Y-m-d',  strtotime($getSettlementDataLesspaid[$i]['settlement_date'] . ' +1 day')),
//             "9" => 'Shweta',
//         );
//         fputcsv($fp, $dataU);  
//     }
//  }
//  $dataU = array(
//     "0"   => '',
//     "1"  =>  '',
//     "2"  => '',
//     "3"  => '',
//     "4"  =>  '',
//     "5"  =>  '',
//     "6"  => '',
//     "7" =>  '',
//     "8"  =>'',
//     "9" => '',
// ); 
// fputcsv($fp, $dataU);  
// $dataU = array(
//     "0"   => '',
//     "1"  =>  '',
//     "2"  => '',
//     "3"  => '',
//     "4"  =>  '',
//     "5"  =>  abs($TobepaidbyShweta),
//     "6"  => '',
//     "7" =>  '',
//     "8"  =>'',
//     "9" => '',
// ); 
// fputcsv($fp, $dataU);   
// $dataU = array(
//     "0"   => '',
//     "1"  =>  '',
//     "2"  => '',
//     "3"  => '',
//     "4"  =>  '',
//     "5"  =>  '',
//     "6"  => '',
//     "7" =>  '',
//     "8"  =>'',
//     "9" => '',
// ); 
// fputcsv($fp, $dataU);  

// $dataU = array(
//     "0"   => '',
//     "1"  =>  '',
//     "2"  => '',
//     "3"  => '',
//     "4"  =>  $gettotaldata[0]['totalamtpaid'],
//     "5"  =>  $gettotaldata[0]['totalamtpaid'],
//     "6"  => '',
//     "7" =>  '',
//     "8"  =>'',
//     "9" => '',
// ); 
//fputcsv($fp, $dataU);  
echo "Done";
fclose($fp);
send_email_report($filename);
exit(0);


function send_email_report($filename){
    
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
     // $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
    $toArray= array("techlead@myrwa.online"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");
    // $toArray= array("office.nrwa@nirvanacountry.co.in"=>"Office NRWA","accounts.nirvana@nimbusharbor.com"=>"Accounts");
    // $toArray= array("kushalbhasin@gmail.com"=>"Kushal","nishthagupta@gmail.com"=>"Nishtha");
      $attachmentArray = array("https://nirvanacountry.co.in/mails/billing_reports/".$filename);
      $data = array( "to" => $toArray,
           // "cc" => $ccArray,
          "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
          "subject" => "CAM Bills Settlement New Report.",
          "attachment" => $attachmentArray,
         "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
    <tbody>
     <tr><td style='padding:15px 15px 15px 55px'>
                        <p> <u> CAM Bills Settlement Report. </u>
                        </p> <p>
                        Dear Sir,<br><br>
                        Please find attached report for CAM bills paid Online and their settlement status through the <a  href='".DOMAIN."'>Nirvana Website</a> till now.
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
