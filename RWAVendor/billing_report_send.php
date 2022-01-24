<?php //  print getcwd() . "\n";
//echo $_SERVER['DOCUMENT_ROOT']. '<br>';
//echo basename(dirname(__FILE__)). '<br>';
echo dirname(__FILE__). '<br>';
include_once dirname(__FILE__) .'/model/class.expert.php';
//include('adminsession_checker.php');
require(dirname(__FILE__) .'/../mailin-lib/Mailin.php');
error_reporting(1);
$first=0 ;
 $where= "where tbl_bill_payment_details.bill_num is not null  and mode='online' ";

/*if($_REQUEST['member_name']!='')
{
$ModelCall->where("member_name" , $_REQUEST['member_name']);}
if($_REQUEST['received_cheque']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
if($_REQUEST['received_e_payment']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
$ModelCall->where ("id ='1'");*/



$getDriverInfo = $ModelCall->rawQuery("select * from tbl_billing_new left join tbl_bill_payment_details on tbl_bill_payment_details.bill_num=tbl_billing_new.bill_number ".$where." and bill_date='2020-09-29' order by bill_date desc ");


    $filename = date('Y-m-d')."_reports.csv";         //File Name
// Create connection 
	$fp = fopen(dirname(__FILE__).'/billing_reports/'.$filename, 'w+'); 
               
                   $headers  = array(
                "0"   => "Bill Number",
                "1"  => "Bill Date",
"2"  => "Start Period Date",
"3"  => "End Period Date",
"4"  => "Actual Due Date",
"5"  => "Display Due Date",
"6"  => "Bill Area",
"7"  => "Flat No",
"8"  => "Member Name",
"9"  => "CAM and O & M Services",
"10" => "Reimbursement of Diesel Cost for Running DG Sets, at 3.0 KWH /Ltr (3 Months).",
"11" => "Utility Charge (Water +Sewer +Common Electricity (3 Months).",
"12" => "CGST",
"13" => "SGST",
"14" => "Total",
"15" => "Taxable Amount",
"16" => "Arrears",
"17" => "Interest",
"18" => "CGST on Interest",
"19" => "SGST on Interest",
"20" => "Cheque Dishonour Charges",
"21" => "CGST on Cheque Dishonour Charges",
"22" => "SGST on Cheque Dishonour Charges",
"23" => "Payable Amount",
"24" => "Floor Number",
"25" => "Amount Paid",
"26" => "Total Outstanding",
"27" => "Late Fee Charges",
"28" => "Payable After Due Date",

"29" => "GST IN",
"30" => "PAN No",
"31" => "Address",

"32" => "Mobile No.",
"33" => "Email",
"34" => "DG Previous Reading",
"35" => "DG Current Reading ",
"36" => "DG Consumed Reading",
"37" => "DG Previous Reading Date",
"38" => "DG Current Reading Date",
"39" => "Sanc. Grid Load(KW)",
"40" => "Sanc. DG load",
"41" => "Cam Unit",
"42" => "Cam Rate",
"43" => "Cam Rebate",
"44" => "Cam Net Rate",

"45" => "Deisel Unit",
"46" => "Deisel Rate",
"47" => "Deisel Rebate",
"48" => "Deisel Net Rate",

"49" => "Utility Unit",
"50" => "Utility Rate",
"51" => "Utility Rebate",
"52" => "Utility Net Rate",

"53" => "Payable Now Before Due Date",
"54" => "Total Previous Month O/S Till Last Month",

"55" => "Payment Transferred to Next Invoice",
"56" => "Last Month Pay Cheque/DD",
"57" => "Last Month Pay Date",
"58" => "Last Month Pay Type",
"59" => "Last Month Amount",
"60" => "Property Type",

"61"  => "Amount Received",
"62"  => "Date Received",

"63"  => "Mode of Payment",
"64"  => "Transaction Referennce Number",
"65"  => "Admin Confirmed received",
"66"  => "Amount Received Bannk",
);
 
fputcsv($fp, $headers);
//print_r($headers);
//header('Content-type: application/csv');
//header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $headers);
$getDriverInfo = $ModelCall->rawQuery("select bill_number,bill_date,start_period_date,end_period_date,actual_due_date,display_due_date,bill_area,flat_no,member_name,cam_o_m_services,diesel_cost,
utility_charge,cgst,sgst,total,taxable_amount,arrears,interest,cgst_interest,sgst_interest,cheque_dishonour_charges,cgst_cheque_dishonour,sgst_cheque_dishonour,payable_amount,floor_num,
amt_paid,total_outstanding,late_fee_charge,pay_after_due,gst_in,pan_no,address,mob_no,email,dg_prev_reading,dg_current_reading,dg_consumed_reading,dg_pre_reading_date,dg_current_reading_date,
sanc_grid_load,sanc_dg_load,cam_unit,cam_rate,cam_rebate,cam_net_rate,deisel_unit,deisel_rate,deisel_rebate,deisel_net_rate,utility_unit,utility_rate,utility_rebate,utility_net_rate,pay_before_due,
total_pre_os_last_month,pay_to_next_invoice,last_month_cheque,last_month_date,last_month_type,last_month_amount,prop_type,amount_received,date_received,mode,pay_ref,date_received_bank ,
amount_received_bank from tbl_billing_new left join tbl_bill_payment_details on tbl_bill_payment_details.bill_num=tbl_billing_new.bill_number ".$where." and  tbl_billing_new.bill_date='2020-09-29' order by bill_date desc ");

foreach($getDriverInfo as $dataU){
  //  unset($dataU['id']);
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
    // echo "https://nirvanacountry.co.in/RWAVendor/billing_reports/".$filename;
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
      $toArray= array("nishthagupta@gmail.com"=>"Nishtha");
      $attachmentArray = array("https://nirvanacountry.co.in/RWAVendor/billing_reports/".$filename);
      $data = array( "to" => $toArray,
          "from" => array("website.admin@nirvanacountry.co.in", "Nrwa Office"),
          "subject" => "Daily Report Cam Bills Online",
          "attachment" => $attachmentArray,
         "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
    <tbody>
     <tr><td style='padding:15px 15px 15px 55px'>
                        <p> <u>Bill Payments Reports </u>
                        </p> <p>
                        Dear Sir,<br /><br />
                        Please find attached report for CAM bills paid Online through the <a  href='".DOMAIN."'>Nirvana Website</a> till now.
                        </p>
                        </td></tr>
                        <tr>
                        <td align='left' style='padding:15px 15px 15px 55px'>Warm Regards,<br>NRWA Office
                        <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                        <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                      </tr>
                      <tr>
                        <td align='center' valign='middle'>&nbsp;</td>
                      </tr>
                    </tbody>
                  </table>"
);
$send = $mailin->send_email($data);
print_r($send);
}

?>
