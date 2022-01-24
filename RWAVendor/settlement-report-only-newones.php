<?php
include_once dirname(__FILE__) .'/model/class.expert.php';
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
error_reporting(1);
$first=0 ;


$getNewRecords = $ModelCall->rawQuery("SELECT * FROM `tbl_transations_payu` where settlement_date=CURRENT_DATE and action_from_website='BillpaperModule'");
if(count($getNewRecords)==0){
    echo "No New payments of settlements";
    exit(0);
}


//exit(0);

$filename = "CAMBill-Setllement-Report-".date('jS-M').".csv";         //File Name
// Create connection 
$fp = fopen(dirname(__FILE__). '/billing_reports/'.$filename, 'w+'); 
$headers  = array(
    "0"   => "House / blck/ floor No.",
    "1"  => "Name",
    "2"  => "Total Bill Amount (including arrears etc)",
    "3"  => "Date of payment",
    "4"  => "Payment Reference #",
    "5"  => "Amount Paid",
    "6"  => "TDR Charged by us",
    "7"  => "Total Amount paid by the User",
    "8"  => "Mode of Payment used",
    "9"  => "Bank Name",
    "10" => "TDR Charged by the PGWA",
    "11"  => "Account to which payment is settled",
    "12"  => "Amount to be settled",
    "13"  => "Total Amount Settled",
    "14" => "Payment Status",
    "15"  => "Date Settled/ paid",
    "16" => "Paid Short by Pay U",
    );
     
    fputcsv($fp, $headers);

    
    $getSettlementData = $ModelCall->rawQuery("SELECT bpay.unit_num as HouseNo, bill.member_name as Name, bill.payable_amount as total_bill, bpay.date_received as date_payment, bpay.pay_ref, bpay.amount_received as amtpaid, ROUND((payu.amount- bpay.amount_received),2) as tdrbyus, payu.amount as totalamountPaid, payu.mode, payu.pg_type as bankName, ROUND(payu.tdr_by_payu,2) as trdbyPayu, ROUND(payu.settlement_amount,2) as settlement_amount, payu.payment_status, payu.settlement_date, ROUND(ROUND((payu.amount- bpay.amount_received),2)-payu.tdr_by_payu,2) as shortbyus FROM `tbl_transations_payu` payu , tbl_bill_payment_details bpay, tbl_billing_new bill where payu.txnid=bpay.pay_ref and bpay.mode='online' and bpay.bill_num = bill.bill_number and payu.settlement_date=CURRENT_DATE order by payu.settlement_date");
    if(count($getSettlementData)>0){
        $total =0;
        for($i=0; $i<count($getSettlementData); $i++){
            $total =  $total + $getSettlementData[$i]['settlement_amount'];
            if($i<count($getSettlementData)-1){
                $dataU = array(
                    "0"   =>  $getSettlementData[$i]['HouseNo'],
                    "1"  =>  $getSettlementData[$i]['Name'],
                    "2"  =>  $getSettlementData[$i]['total_bill'],
                    "3"  =>  $getSettlementData[$i]['date_payment'],
                    "4"  =>  $getSettlementData[$i]['pay_ref'],
                    "5"  =>  $getSettlementData[$i]['amtpaid'],
                    "6"  =>  $getSettlementData[$i]['tdrbyus'],
                    "7"  => $getSettlementData[$i]['totalamountPaid'],
                    "8"  => $getSettlementData[$i]['mode'],
                    "9"  => $getSettlementData[$i]['bankName'],
                    "10" => $getSettlementData[$i]['trdbyPayu'],
                    "11"  => "Nirvana Residents Welfare Association",
                    "12"  => $getSettlementData[$i]['settlement_amount'],
                    "13"  => "",
                    "14" =>  $getSettlementData[$i]['payment_status'],
                    "15"  => $getSettlementData[$i]['settlement_date'],
                    "16" => $getSettlementData[$i]['shortbyus'],
                );
            } else {
                $dataU = array(
                    "0"   =>  $getSettlementData[$i]['HouseNo'],
                    "1"  =>  $getSettlementData[$i]['Name'],
                    "2"  =>  $getSettlementData[$i]['total_bill'],
                    "3"  =>  $getSettlementData[$i]['date_payment'],
                    "4"  =>  $getSettlementData[$i]['pay_ref'],
                    "5"  =>  $getSettlementData[$i]['amtpaid'],
                    "6"  =>  $getSettlementData[$i]['tdrbyus'],
                    "7"  => $getSettlementData[$i]['totalamountPaid'],
                    "8"  => $getSettlementData[$i]['mode'],
                    "9"  => $getSettlementData[$i]['bankName'],
                    "10" => $getSettlementData[$i]['trdbyPayu'],
                    "11"  => "Nirvana Residents Welfare Association",
                    "12"  => $getSettlementData[$i]['settlement_amount'],
                    "13"  => $total,
                    "14" =>  $getSettlementData[$i]['payment_status'],
                    "15"  => $getSettlementData[$i]['settlement_date'],
                    "16" => $getSettlementData[$i]['shortbyus'],
                );   
            }
            fputcsv($fp, $dataU);
        // fwrite($fp, $dataU); 
        }
    }



echo "Done";
fclose($fp);
send_email_report($filename);
exit(0);


function send_email_report($filename){
    
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
      $toArray= array("techlead@myrwa.online"=>"Nishtha","kushalbhasin@gmail.com"=>"Kushal");
    // $toArray= array("office.nrwa@nirvanacountry.co.in"=>"Office NRWA","accounts.nirvana@nimbusharbor.com"=>"Accounts");
    // $ccArray= array("kushalbhasin@gmail.com"=>"Kushal","nishthagupta@gmail.com"=>"Nishtha");
      $attachmentArray = array("https://nirvanacountry.co.in/RWAVendor/billing_reports/".$filename);
      $data = array( "to" => $toArray,
           // "cc" => $ccArray,
          "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
          "subject" => "CAM Bills Settlement Report.",
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
