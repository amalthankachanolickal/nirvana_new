<?php 
ini_set('max_execution_time', 300);
error_reporting(E_ALL);
include("../model/class.expert.php"); 
require('../../mailin-lib/Mailin.php');

?>
<?php
function TripCodeGenerate($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars[rand(0, $chars_length)];  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars[rand(0, $chars_length)];  
            if ($r != $string[$i - 1]) $string .= $r;  
         }  
         return $string;
} 
function phpexpertOTPSPONSER($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars[rand(0, $chars_length)];  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars[rand(0, $chars_length)];  
            if ($r != $string[$i - 1]) $string .= $r;  
         }  
         return $string;
} 

function phpexpertOTPSPONSER1($length = 6, $chars = '0987654321')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars[rand(0, $chars_length)];  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars[rand(0, $chars_length)];  
            if ($r != $string[$i - 1]) $string .= $r;  
         }  
         return $string;
}
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
include('PHPMailer-master/PHPMailerAutoload.php');
include('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
include('spreadsheet-reader-master/SpreadsheetReader.php');

include('passwordHash.php');

if(($_REQUEST['ActionCall']=="AddBillingNew")){
    if($_FILES['customer_excel_sheet_upload']['name']!=''){
        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if(in_array($_FILES["customer_excel_sheet_upload"]["type"],$allowedFileType)){
            $info = pathinfo($_FILES['customer_excel_sheet_upload']['name']);
            $ext = $info['extension']; // get the extension of the file
            $newname = rand(0,9999999)."billing_upload_example.".$ext; 
            
            $targetPath = 'billing_uploads/'.$newname;
            move_uploaded_file($_FILES['customer_excel_sheet_upload']['tmp_name'], $targetPath);
            
            $Reader = new SpreadsheetReader($targetPath);
            $sheetCount = count($Reader->sheets());
            
            $check = 'true';
            
            
            $filename = date('Y-m-d')."_errors.csv";         //File Name
            // Create connection 
            	$fp = fopen('php://output', 'w'); 
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
            "60" => "Property Type"
            );
             
             
            //////print_r($headers);
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename='.$filename);
            fputcsv($fp, $headers);
            fclose($fp);
            
            
            for($i=0;$i<$sheetCount;$i++)
            {
                $Reader->ChangeSheet($i);
                
                  foreach ($Reader as $Key => $Row) {
                         //echo $Key.': ';
                         if ($Row) {
                             $allxlsdata[] = $Row;
                         } else {
                            $errors = 'File is Empty';
                             $check = 'false';
                         }
                  }
                  //print_r( $allxlsdata[0]);
                if( $allxlsdata[0][0]== 'Bill Number')  {
                     foreach($headers as $i => $header)
                        {
                            if($allxlsdata[0][$i] != $header)
                            {
                                $errors = 'Format Mismatch, Upload the Data in Correct Headers and Format';
                                $check = 'false';
                            }
                        }
                }   else{
                    $errors = 'Format Mismatch, Upload the Data in Correct Headers and Format';
                      $check = 'false';
                }   
                
                foreach ($Reader as $emapData)
                {
                 
                    if($emapData[0] == 'Bill Number')
                    {
                        foreach($headers as $i => $header)
                        {
                            if($emapData[$i] != $header)
                            {
                                $errors = 'Format Mismatch';
                                $check = 'false';
                            }
                        }
                    }
                    
                    //$user_number=generate_username();
                    if($emapData[0] != 'Bill Number' && $emapData[0] != '')
                	{
                	   // print_r($emapData);
                		$ModelCall->where("bill_number", $emapData[0]);
                		$rec_first = $ModelCall->get("tbl_billing_new");
                		if(isset($rec_first[0]) && $rec_first[0] > 0){
                		   $errors = 'Duplicate Bill Number';
                		   //  print_r($rec_first[0]);
                		    //exit;
                		    $check = 'duplicate';
                		}
                		
                	
                    
                		if( $check == 'false'){
                		  //  echo $errors;
                		  //  exit(0);
                		    
                	        }else{
                        			    
                        	$blckhs=explode('-0',$emapData[7]);
                            $block_code=$blckhs[0];
                            $house_number=$blckhs[1];
                            $house_num=substr($house_number,0,3);
                            $floor_num=substr($house_number,3);
                            if($floor_num==''){
                                $floor =1;
                            }
                            if($floor_num=='GF'){
                                $floor =1;
                            }
                            if($floor_num=='FF'){
                                $floor =2;
                            }
                            if($floor_num=='SF'){
                                $floor =3;
                            }
                              if($floor_num=='TF'){
                                $floor =4;
                            }else{
                                $floor =5; 
                            }
                        
                            $ModelCall->where("block_code",$block_code);
                            $ModelCall->orderBy("id","desc");
                            $getBlockInfo = $ModelCall->get("tbl_block_entry");
                            
                            $getBlockInfoId = $getBlockInfo[0]['id'];
                            $flatNo_bill = $emapData[7];
                            
                        	$rec2 = $ModelCall->rawQuery("select * from Wo_Users  where block_id='$getBlockInfoId' and house_number_id='$house_num' and floor_number='$floor' " );
                        	$rec3 = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='$flatNo_bill' order by bill_date DESC");
                        
                            $billNo_pdf = $emapData[0];
                        	$dataU = array(
                        	'bill_number' => $emapData[0],
                        	'bill_date' => $emapData[1],
                        	'start_period_date' => $emapData[2],
                        	'end_period_date' => (empty($emapData[3]) ? 0 :  $emapData[3]),
                        	'actual_due_date' => 	$emapData[4],
                        	'display_due_date' => 	$emapData[5],
                        	'bill_area' => 	$emapData[6],
                        	'flat_no' => 	(empty($emapData[7]) ? 0 :  $emapData[7]),
                        	'member_name' => 	$emapData[8],
                        	'cam_o_m_services' => 		(empty($emapData[9]) ? 0000.00 :  $emapData[9]),
                        	'diesel_cost' => 	(empty($emapData[10]) ? 0000.00 :  $emapData[10]),
                        	'utility_charge' => 	$emapData[11],
                        	'cgst' => 	$emapData[12],
                        	'sgst' => 	$emapData[13],
                        	'total' => 	$emapData[14],
                        	'taxable_amount' => 	$emapData[15],
                        	'arrears' => 	$emapData[16],
                        	'interest' => 	$emapData[17],
                        	'cgst_interest' => 	$emapData[18],
                        	'sgst_interest' => 	$emapData[19],
                        	'cheque_dishonour_charges'=> 	$emapData[20],
                        	'cgst_cheque_dishonour' => 	$emapData[21],
                        	'sgst_cheque_dishonour' => 	$emapData[22],
                        	'payable_amount' => 	$emapData[23],
                        	'floor_num' => 	$floor,
                        	'amt_paid' => 	$emapData[25],
                        	'total_outstanding' => 	$emapData[26],
                        	'late_fee_charge' => 	$emapData[27],
                        	'pay_after_due' => 	$emapData[28],
                        	'gst_in'=>$emapData[29],
                            'pan_no'=>$emapData[30],
                            'address'=>$emapData[31],
                            
                            'mob_no'=>($emapData[32]!='' && !empty($emapData[32]))?$emapData[32]:$rec2[0]['user_phone'],
                            'email'=>($emapData[33]!=''  && !empty($emapData[33]))?$emapData[33]:$rec2[0]['user_email'],
                            'dg_prev_reading'=>$emapData[34],
                            'dg_current_reading'=>$emapData[35],
                            'dg_consumed_reading'=>$emapData[36],
                            'dg_pre_reading_date'=>$emapData[37],
                            'dg_current_reading_date'=>$emapData[38],
                            'sanc_grid_load'=>$emapData[39],
                            'sanc_dg_load'=>$emapData[40],
                            'cam_unit'=>$emapData[41],
                            'cam_rate'=>$emapData[42],
                            'cam_rebate'=>$emapData[43],
                            'cam_net_rate'=>$emapData[44],
                            
                            'deisel_unit'=>$emapData[45],
                            'deisel_rate'=>$emapData[46],
                            'deisel_rebate'=>$emapData[47],
                            'deisel_net_rate'=>$emapData[48],
                            
                            'utility_unit'=>$emapData[49],
                            'utility_rate'=>$emapData[50],
                            'utility_rebate'=>$emapData[51],
                            'utility_net_rate'=>$emapData[52],
                            
                            'pay_before_due'=>$emapData[53],
                            'total_pre_os_last_month'=>$emapData[54],
                            
                            'pay_to_next_invoice'=>$emapData[55],
                            'last_month_cheque'=>$emapData[56],
                            'last_month_date'=>$emapData[57],
                            'last_month_type'=>$emapData[58],
                            'last_month_amount'=>$emapData[59],
                            'prop_type'=>$emapData[60],	
                            	
                        	);
                    //   echo "<pre>";
                    //     var_dump($dataU);
                    //     echo "</pre>";
                    //     exit;
                        
                        //$pos = strpos($check, 'true');
                        
                            if($check == 'true')
                            {
                                $errors = 'Success';
                                $blckhs=explode('-0',$emapData[7]);
                                $block_code=$blckhs[0];
                                $house_number=$blckhs[1];
                                $ModelCall->where("block_code",$block_code);
                                $ModelCall->orderBy("id","desc");
                                $getBlockInfo = $ModelCall->get("tbl_block_entry");
                                $resultU = $ModelCall->insert('tbl_billing_new',$dataU);
                                //   generate_pdf($dataU);
                                   

                               /*header("Location:".DOMAIN.'generate-cambills-pdf.php?bill_no='.$billNo_pdf) ;*/
                                
                            }
                        /*exit;*/
                           // $errors = implode(",",$error_msg);
                        	$dataU['error/success'] = $errors;
                        	$fp = fopen('php://output', 'w');
                        	fputcsv($fp, $dataU);
                        	fclose($fp);
                        
                         }      
                    }
                    
                }
            }
        }else{
          
        header("Location: ../billing_management_new.php?actionResult=invalidFiletype");
        exit(0);
        }
        if($check == 'true'){
            header("location:".DOMAIN.AdminDirectory."billing_management_new.php?actionResult=Success");
          
         }else{
            // echo $errors;
            header("location:".DOMAIN.AdminDirectory."billing_management_new.php?actionResult=Failed");
           
        }
    } else{
    header("location:".DOMAIN.AdminDirectory."billing_management_new.php?actionResult=AttachError");
    }

}

//  for  triggering cam mails and sms
if(($_REQUEST['ActionCall']=="TriggerMailandSMS")){
     $Body = "";
   // print_r($_POST);
   // exit(0);
    if($_POST['trigger_to']=='1'){
        $mailing_sql = "SELECT * FROM `tbl_billing_new` where start_period_date = '".$_POST['start_bill_date']."'";
    }else{
        $mailing_sql = "SELECT * FROM `tbl_billing_new` where start_period_date = '".$_POST['start_bill_date']."' and total_outstanding>0";  
    }
    
    $rec = $ModelCall->rawQuery($mailing_sql);
    
          $dataMail = array(
                'current_offset' => 0,
                'limit_set' => 200,
                'mail_content' =>  $Body,
                'mail_subject' => 'Pay your CAM Bills online',
                'mail_start_date' => date("Y-m-d"),
                'status' =>'tobestarted',
                'started_datetime' =>date('Y-m-d H:i:s'),
                'count_mail_left'=>count($rec),
                'category_mail'=>'Billing Mail',
                'mailing_sql'=>$mailing_sql, 
                'attachment'=>NULL,
            );  
            $result = $ModelCall->insert('batch_mail_cron_file',$dataMail);
            
            $template_id = "123554";
            $template_name = "CAM Bill Message";
            $msg_var = "";
            $dataMessage = array(
            	'current_offset' => 0,
            	'limit_set' => 200,
            	'message_start_date' => date("Y-m-d"),
            	'status' =>'tobestarted',
            	'category_message' => 'Billing Message',
            	'started_datetime' =>date('Y-m-d H:i:s'),
                'count_message_left'=>count($rec),
                'mailing_sql'=>$mailing_sql,
                'msg_id' => $template_id,
                'msg_template' => $template_name,
                'msg_var' => $msg_var,
            );
            $result = $ModelCall->insert('batch_message_cron_file',$dataMessage);
                            // print_r( $result);
                                // exit(0);
          if( $result>0)
            header("location:".DOMAIN.AdminDirectory."send_cam_bills_mailsandsms.php?actionResult=emailsmssuccess");
            else
           header("location:".DOMAIN.AdminDirectory."send_cam_bills_mailsandsms.php?actionResult=someerror");  
            
}

//  for  triggering cam mails and sms
if(($_REQUEST['ActionCall']=="TriggerPDFGeneration")){
// print_r($_POST);
// exit(0);
          $dataMail = array(
                                	'bill_date' => $_POST['start_bill_date'],
                                	'offset' => 0,
                                	'total' =>  $_POST['total_rec'],
                                	'status' =>'tobestarted',
                                	'added_date' =>date('Y-m-d'),
                                );  
                                $result = $ModelCall->insert('pdf_generation_tracker',$dataMail);
                                // print_r( $result);
                               // exit(0);
          if( $result>0)
            header("location:".DOMAIN.AdminDirectory."trigger-generate-pdf-for-cambills.php?actionResult=pdfgeneratedtrigger");
            else
           header("location:".DOMAIN.AdminDirectory."trigger-generate-pdf-for-cambills.php?actionResult=someerror");  
            
}

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    // if (null !== $fraction && is_numeric($fraction)) {
    //     $string .= $decimal;
    //     $words = array();
    //     foreach (str_split((string) $fraction) as $number) {
    //         $words[] = $dictionary[$number];
    //     }
    //     $string .= implode(' ', $words);
    // }

    return $string;
}

// include autoloader
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

function generate_pdf($dataU){
// reference the Dompdf namespace
$bill_id = $dataU['bill_number'];
//echo $bill_id;
include("../model/class.expert.php"); 
require '../../dompdf/autoload.inc.php';

$unit_num = $dataU['flat_no'];
$ModelCall->where("unit_num",$unit_num);
$ModelCall->orderBy("id","desc");
$getBillLastPaid = $ModelCall->getOne("tbl_bill_payment_details");
print_r($getBillLastPaid);

$path = 'https://nirvanacountry.co.in/nirwana-img/logo-01.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
//print_r($data);
//$base64 = 'data:../image/' . $type . ';base64,' . base64_encode($data);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('isHtml5ParserEnabled', true);
// Load content from html file 
$html='<!DOCTYPE html>
<html lang="en">
    <head><meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nirwana Bill View</title>
    </head>
    <style>
    body {
    color: #000;
   // font-weight: 200;
    width: 100%;
    height: 100%;
    font-size: 11px;
     line-height: 1.6;
    font-family: \'Open Sans\', sans-serif;
    }
    a {
    color: blue;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   // padding: 2px;
  //  line-height: 1.7;
    vertical-align: middle;
  // border: 1px solid ;
    }
    border-vis{
     border: 1px solid;   
    }
    .btn{
    display: inline-block;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 0px;
    transition: 0.3s;
    -moz-transition: 0.3s;
    -webkit-transition: 0.3s;
    color: #fff;
    text-color: #fff;
    border: 1px solid #fff;
    text-transform: capitalize;
    letter-spacing: 1px;
    background-color: #5cb85c;
}
.page-break {
    page-break-after: always;
}
.button::-moz-focus-inner{
  border: 0;
  padding: 0;
}

.button{
  display: inline-block;
  *display: inline;
  zoom: 1;
  padding: 6px 20px;
  margin: 3;
  cursor: pointer;
  border: 1px solid #bbb;
  overflow: visible;
  font: bold 13px arial, helvetica, sans-serif;
  text-decoration: none;
  white-space: nowrap;
  color: #FFF;
  
  background-color: #ddd;
  background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,1)), to(rgba(255,255,255,0)));
  background-image: -webkit-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: -moz-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: -ms-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: -o-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  
  -webkit-transition: background-color .2s ease-out;
  -moz-transition: background-color .2s ease-out;
  -ms-transition: background-color .2s ease-out;
  -o-transition: background-color .2s ease-out;
  transition: background-color .2s ease-out;
  background-clip: padding-box; /* Fix bleeding */
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
  -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
  box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
  text-shadow: 0 1px 0 rgba(255,255,255, .9);
  
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* */

.button.green{
  background-color: #37A000;
  border-color: #37A000;
}

.button.green:hover{
  background-color: #62c462;
}

.button.green:active{
  background: #37A000;
}

/* */

</style>
<body>
    <div class="container-fluid" style="margin: 0 auto; width:96%;">
    <br><br>
        <div style="border-style: solid; border-width: thin;">
	        <div class="row" >
	         <!--   <div class="col-lg-6 no-pdd">
                     <div class="sn-field">
                        <a href="https://therwa.in/"><img src="<?php echo $base64?>" width="150"> </a>
                     </div>
                </div>-->
                <div class="col-md-12" style="text-align: center; font-size:18px">
		      <u>   NIRVANA RESIDENTS WELFARE ASSOCIATION (REGD)</u>
	            </div>
	        </div>
		    <div class="row">
		        <div class="col-md-12"  style="text-align: center;font-size:14px">
		        Opp-Nirvana Courtyard, Nirvana Country, South City-II, Sector 50, Gurugram – 122018
		        </div>
	        </div>
	        <div class="row">
		        <div class="col-md-12"  style="text-align: center;">
		         Phone : 0124-4295885, 0124-2211354 E-Mail : <a href="mailto:office.nrwa@nirvanacountry.co.in" target="_top">office.nrwa@nirvanacountry.co.in</a>
		        <br> <br>
		        </div>
	        </div>
	    </div>
	<div>
	<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12" style="text-align: center;">
		    INVOICE FOR CAM, O & M SERVICES and NRWA SUBSCRIPTIONS<br>
	
		</div>
	</div>
</div>
<div>
    <div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" style="border: none; font-size:11px" width="100%">
			<tbody>
					<tr>
						<td style="padding-left:5px"><b> GSTIN : </b></td>
						<td>'. $dataU['gst_in'].'</td>
						<td NOWRAP style="padding-left:5px">INVOICE DATE : </td>
						<td> '.date('d-m-Y',strtotime($dataU['bill_date'])).' </td>
					</tr>
					<tr>
						<td style="padding-left:5px"> PAN NO :  </td>
						<td> '. $dataU['pan_no'].' </td>
						<td style="padding-left:5px">INVOICE NO :  </td>
						<td> '. $dataU['bill_number'].' </td>
					</tr>
					<tr>
						<td style="padding-left:5px">  REVERSE CHARGE :   </td>
						<td>- NA  </td>
						<td style="padding-left:5px"> <b>DUE DATE :</b>  </td>
						<td> <b>'. date('d-m-Y',strtotime($dataU['display_due_date'])).'</b>	</td>
					</tr>
				
				</tbody>
			</table>
		</div>
	</div>
	<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" style="border: none;" width="100%">
			<tbody>
					<tr>
						<td style="padding-left:5px"  width="130px"> INVOICE TO :   </td>
						<td> '. $dataU['member_name'].'    </td>
						<td rowspan="6" width="150px" style="border-left: 2px solid; padding-left:25px; vertical-align:middle;">  <a href="https://therwa.in/"><img src="/home/nirvanac/therwa.in/nirwana-img/logo-01.jpg" width="120" alt="Ctrl Click"> </a></td>
					</tr>
					
					<tr>
						<td style="padding-left:5px"> UNIT NO :   </td>
						<td> '. str_replace("DW","DC",$dataU['flat_no']).'    </td>
					</tr>
					<tr>
						<td style="padding-left:5px"> ADDRESS :</td>
						<td> Nirvana Country, Sec 50, Gurugram 122018</td>
					</tr>
					
					<tr>
						<td style="padding-left:5px">   AREA SQ. YDS :  </td>
						<td>	'. $dataU['bill_area'].' 	</td>
                    </tr>
                    
					<tr>
						<td style="padding-left:5px"> MOBILE NO. : 	</td>
						<td> '. $dataU['mob_no'].' </td>
                    </tr>
                    
					<tr>
					    <td style="padding-left:5px"> E-MAIL :	</td>
						<td> '. $dataU['email'].' 	</td>
					</tr>
					
				</tbody>
			</table>
		</div>
    </div>

	<div class="row"  style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" width="100%" cellpadding=0 cellspacing=0>
		    	<tbody>
					<tr>
						<td colspan="6" style="text-align:center;border: 2px solid;"><b> Bill Period : '.  date('d-m-Y', strtotime($dataU['start_period_date'])).' To '.  date('d-m-Y',strtotime($dataU['end_period_date'])).' </b> 
							
					</td>
			        </tr>
					<tr>
						<td colspan="2" style="text-align: center;border: 2px solid;"> DG Prev. Readings: '. $dataU['dg_prev_reading'].'   </td>
				        <td colspan="2" style="text-align: center;border: 2px solid;"> DG Current Readings:  '. $dataU['dg_current_reading'].'   </td>
                         <td colspan="2" style="text-align: center;border: 2px solid;"> DG Consumed Readings : '. $dataU['dg_consumed_reading'].' 	   </td>
				    </tr>
					<tr style="text-align: center;border: 2px solid;">
						<td colspan="3" style="text-align: center;border: 2px solid;">Prev. Readings Date: '. date('d-m-Y', strtotime($dataU['dg_pre_reading_date'])).'   </td>
						<td colspan="3" style="text-align: center;border: 2px solid;">Current Readings Date:  '.date('d-m-Y', strtotime($dataU['dg_current_reading_date'])).'   </td>
				    </tr>
					<tr style="text-align: center;border: 2px solid;">
						<td colspan="3" style="text-align: center;border: 2px solid;"> Sanc. Grid Load(KW):  '. $dataU['sanc_grid_load'].' KW  </td>
					    <td colspan="3" style="text-align: center;border: 2px solid;">Sanc. DG Load :   '. $dataU['sanc_dg_load'].' KVA  </td>
					</tr>
					
				</tbody>
			</table>
		</div>
    </div>

	<div class="row">
		<div class="col-md-12">
			<table class="table" cellpadding=0 cellspacing=0  style="border-style: solid; border-width: thin;" width="100%">
				<thead>
					<tr>
					    <th style="text-align: center;border: 2px solid;">Description Of Services <br></th>
					    <th style="text-align: center;border: 2px solid;">Units  <br> </th>
						<th style="text-align: center;border: 2px solid;">Rate  <br> </th>
						<th style="text-align: center;border: 2px solid;">Rebate  <br> </th>
						<th style="text-align: center;border: 2px solid;">Net Rate  <br> </th>
						<th style="text-align: center;border: 2px solid;">Amount <br> Payable (INR)</th>
					
					</tr>
				</thead>
				<tbody>
					<tr>
					   <td style="border: 2px solid; padding-left:5px">CAM And O & M Services</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($dataU['cam_unit'],2).'  </td>
						<td  style="text-align: center; border: 2px solid;"> '. number_format($dataU['cam_rate'],2).'  </td>
						<td  style="text-align: center; border: 2px solid;"> '. number_format($dataU['cam_rebate'],2).'  </td>
						<td  style="text-align: center; border: 2px solid;"> '. number_format($dataU['cam_net_rate'],2).'  </td>
						<td  style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($dataU['cam_o_m_services'],2).'	</td>
					</tr>
					<tr>
					    <td style="border: 2px solid; padding-left:5px">
						Reimbursement of Diesel Cost For Running DG Sets, At 3.0 KWH /Ltr (3 Months).
						</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($dataU['deisel_unit'],2).'</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($dataU['deisel_rate'],2).'</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($dataU['deisel_rebate'],2).'</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($dataU['deisel_net_rate'],2).' </td>
						<td style="text-align: right; border: 2px solid;  padding-right:5px;">  '. number_format($dataU['diesel_cost'],2).'</td>
					</tr>
					
					<tr>
					    <td style="border: 2px solid; padding-left:5px">Utility Charge (Water +Sewer +Common Electricity (3 Months).</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($dataU['utility_unit'],2).'</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($dataU['utility_rate'],2).'</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($dataU['utility_rebate'],2).'</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($dataU['utility_net_rate'],2).'</td>
						<td style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($dataU['utility_charge'],2).'</td>
					</tr>
					
					<tr>
                        <td colspan="5" style="border: 2px solid; padding-left:5px"> CGST @9% </td> 
                        <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;">  '. number_format($dataU['cgst'],2).'</td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px">  SGST @9% </td>
						<td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;">  '. number_format($dataU['sgst'],2).'	 </td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px"><b> Payable Now Before Due Date </b></td>
						 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"><b><a  href="https://therwa.in/bills.php" target="_blank">  '. number_format($dataU['payable_amount'],2).'</a></b></td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px">   Total Prev. O/s Till Last Month </td>
						<td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;">'. number_format($dataU['total_pre_os_last_month'],2).'</td>
					</tr>
					<tr> 
						<td colspan="5" style="border: 2px solid; padding-left:5px"> Surcharges For Late Payment</td>
						 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($dataU['interest'],2).' </td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px"><b>Payment Due, If Not Paid By Due Date, To Be Transferred To Next Invoice </b>  </td>
				
						 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"><a  href="https://nirvanacountry.co.in/bills.php" target="_blank"> '. number_format($dataU['payable_amount'],2).'</a></td>
					</tr>
					<tr>
					<td colspan="5" style="border: 2px solid; padding-left:5px"><b>PAYMENT AFTER DUE DATE ('. date('d-m-Y',strtotime($dataU['display_due_date'])).') </b>  </td>
			
					 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"><b> '. number_format($dataU['pay_after_due'],2).'</b></td>
					</tr>
					<tr>
					    <td colspan="5" style="border: 2px solid; padding-left:5px">
					   <b> Amount In Words: Rupees '. ucwords(convert_number_to_words($dataU['payable_amount'])).' Only</b>
					    </td>
					      <td colspan="1" style="text-align: center; border: 2px solid; padding-right:5px;">
					  <a  class="green button"  href="https://therwa.in/bills.php"  target="_blank">Pay Now</a>
					  
                         </td>
					</tr>
				
                    </tbody>
                </table>
              	</div>
    </div>
    <div class="row">
		<div class="col-md-12">
                <table class="table"  style="border-style: solid; border-width: thin; line-height:1.5" width="100%">
					<tr>
					    <td colspan="6">
					        1) Cheque has to be made in favour of <b>NIRVANA RWA MAINTENANCE A/C</b>
					    </td>
					</tr>
					
						<tr>
					    <td colspan="6">
					       2) <a  href="https://therwa.in/bills.php" target="_blank">For NEFT/IMPS  : <b>Name : Nirvana RWA Maintenance A/C </b> <br>
					       Account no. 184301000717, IFSC Code ICIC0001843 </a>
					    </td>
					</tr>
				
					<tr>
					    <td colspan="6">
				<b>	 NOTE : PLEASE SHARE YOUR NEFT/IMPS DETAILS ON OUR EMAIL :<a href="mailto:office.nrwa@nirvanacountry.co.in" target="_blank">office.nrwa@nirvanacountry.co.in</a> , OR</b>
					    </td>
					</tr>
					<tr>
					    <td colspan="6">
				<b>	  FILL YOUR HOUSE NO. IN THE REMARKS DURING MAKING ONLINE PAYMENT.</b>
					    </td>
					</tr>
				
			</table>
		</div>
    </div>
    <br>
    Last Month Payment Details
    <br><br>
	<div class="row">
		<div class="col-md-12">
			<table class="table"  style="border-style: solid; border-width: thin;" width="100%" cellpadding=0 cellspacing=0>
					<tbody>
					<tr>
                        <td style="text-align: center;border: 2px solid;" width="400px">Name</td>
                        <td  style="text-align: center;border: 2px solid;">'. $dataU['member_name'].'</td>
                        <td  style="text-align: center;border: 2px solid;">Flat No: </td>
                        <td  style="text-align: center;border: 2px solid;">'. str_replace("DW","DC",$dataU['flat_no']).'  	</td>
                        
				    </tr>
				    <tr style="background-color:#CCCCCC">
                        <td style="text-align: center;border: 2px solid;">Cheque/DD No.:</td>
                        <td  style="text-align: center;border: 2px solid;">Dated</td>
                        <td  style="text-align: center;border: 2px solid;">Type </td>
                        <td  style="text-align: center;border: 2px solid;">Amount	</td>
                        
				    </tr>';
				    
				    if(count($getBillLastPaid)>0){
				
			
					$html= $html.'<tr>
						<td style="text-align: center;border: 2px solid;">'. substr($getBillLastPaid['pay_ref'],0,50).' </td>
						<td style="text-align: center;border: 2px solid;">'. date('d-m-Y', strtotime($getBillLastPaid['date_received'])).' </td>
						<td style="text-align: center;border: 2px solid;">'. $getBillLastPaid['payment_mode'].' 	</td>
						<td style="text-align: center;border: 2px solid;"> '. number_format($getBillLastPaid['amount_received'],2).' </td>
					</tr>';
					}else{
					  	$html= $html.'<tr>
						<td style="text-align: center;border: 2px solid;">-</td>
						<td style="text-align: center;border: 2px solid;">-</td>
						<td style="text-align: center;border: 2px solid;">-	</td>
						<td style="text-align: center;border: 2px solid;">-</td>
					</tr>';  
					};
					 $html= $html.'<tr style="background-color:#CCCCCC">
                        <td colspan=4 style="text-align: center;border: 2px solid;">NIRVANA RESIDENTS WELFARE ASSOCIATION (REGD), <br> Opp-Nirvana Courtyard, Nirvana Country, South City-II, Sector 50, Gurugram –
122018:</td>
                   
                        
				    </tr>
				</tbody>
			</table>
		</div>
	</div>
<div  style="text-align: center; font-size:14px"><br><br><b>Powered by <a  onclick="javascript:windows.open(\'https://nirvanacountry.co.in\',\'_blank\');">www.nirvanacountry.co.in</a> <br>
This is an electronically generated document, hence does not require signature</b></div>
	<br> <h3   style="text-align: center;">Important Terms & Conditions</h3>
		<div class="row">
		<div class="col-md-12">
				<table class="table"  style="border-style: solid; border-width: thin;" width="100%" cellpadding=0 cellspacing=0>
				<tr><td colspan="2"  style="text-align: center;border: 2px solid;padding-left:2px"><h3>NIRVANA RESIDENTS WELFARE ASSOCIATION</h3> <br>
<b>IMPORTANT TERMS AND CONDITIONS<br>(To be read with Invoice / Bills dated '.date('d-m-Y',strtotime($dataU['bill_date'])).')</b></td>
</tr>
<tr><td style="text-align:center;border: 2px solid;">1</td><td style="text-align:left;border: 2px solid;padding-left:2px"> For more than two quarter overdue accounts-some or all services will be withdrawn as per approved process.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">2</td><td style="text-align:left;border: 2px solid;padding-left:2px">Change / Modification of CAM charges for Villas which have made floors and rented them out were proposed as below
which was adopted and passed by the members in GBM Held on 14th Nov, 2018. 1 floor rented out – 1.5 times Villa CAM rate + utility rate for each floor as per applicable rates. 2 floors rented out – 2 times Villa CAM rate + Utility rate for each floor Example – villa with one floor rented out cam
would be
• Rs. 14 time sq. yard of villa + Rs. 4 Utility charge and Rs. 7 times sq. yard + Rs. 4 utility charge.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">3</td><td style="text-align:left;border: 2px solid;padding-left:2px">This invoice is to be considered as final notice for all Due / Overdue Invoices / Payments.

</td></tr>
<tr><td style="text-align:center;border: 2px solid;">4</td><td style="text-align:left;border: 2px solid;padding-left:2px">Full payment by Cheque / DD / Bank transfer only. All outstanding dues will attract surcharge and late fees as applicable.
Post dated cheques bearing date after Due date submitted will be treated as late Payments. Cash will not be accepted
against payments.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">5</td><td style="text-align:left;border: 2px solid;padding-left:2px">For online payment : To pay by NEFT/RTGS transfer to Nirvana RWA Maintenance account , Bank name : ICICI Bank , A/C no.
184301000717, IFSC code : ICIC0001843. Please write property number & contact details in remarks cell. You may also make
payment through <a href="https://therwa.in" >nirvanacountry.co.in</a> website .
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">6</td><td style="text-align:left;border: 2px solid;padding-left:2px">Upon non-realization / dis-honour of a cheque / DD for any reason, Rs. 400/- additional shall be chargeable towards bank
charges and handling costs. If the Bill is actually finally cleared after due date, surcharge and Late Payment fee as applicable will
also have to be paid.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">7</td><td style="text-align:left;border: 2px solid;padding-left:2px">Payment of this invoice is not a proof of ownership / title to the property occupied.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">8</td><td style="text-align:left;border: 2px solid;padding-left:2px">Timely Payment by you against your outstanding dues will help us pay the vendors in time to extract best services for
improvement of living conditions in NIRVANA.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">9</td><td style="text-align:left;border: 2px solid;padding-left:2px">In case of Sale, Renting or Moving Out by Landlord / Tenant – Please obtain an NOC from the NRWA Office. The NOC will
be available 7 days after the application and clearing of all dues of NRWA and an NOC from the Landlord. All are
requested to ensure that last minute Panic or humanitarian situation is not created.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">10</td><td style="text-align:left;border: 2px solid;padding-left:2px">Police Registration is mandatory in case of Tenants, Domestic Helps, Drivers, workers on an application by the Owners,
as required by Police Administration. A Copy is to be provided to NRWA for Records and necessary action.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">11</td><td style="text-align:left;border: 2px solid;;padding-left:2px">Use of Piped Water for Washing Cars, Roads or Driveways is prohibited as per the Directions of the Haryana Government and
District Administration in Gurugram. NRWA will take all appropriate measures to enforce the Rules of the Govt and the directions
of the District Administration. NRWA will impose Fines and Penalties on such residences and assist the administration in
prosecuting the defaulters.

</td></tr>
				</table>
		</div>
		</div>
</div>
</div>	
<div class="clearfix"></div>  
</body>
</html>';

$dompdf->loadHtml($html); 



$filename= $bill_id.".pdf";

$dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $output = $dompdf->output();
    //file_put_contents('../../bills_view/'.$filename, $output);
 $dompdf->stream("cambill-".$bill_id, array("Attachment" => 1));  
}


function send_email_event_successful_transaction($rec){
  ////print_r($rec);
    
    
 //   ////print_r($dataArray);
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
    /*$toArray= array($rec['user_email']=>$rec['firstname']);*/
    $toArray= array("iambommanakavya@gmail.com"=>"Kavya");
    $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Now you can pay your CAM Bills online",
       "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
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
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ></a></td>
                    </tr>
                    <tr>
                      <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",</strong> <span style='padding-bottom:4px;display:block'><a href='".DOMAIN."bills.php'>Click here </a> to  view & pay your CAM Bills online on <a href='".DOMAIN."'>Nirvana online </a> using Net Banking or Credit Cards.</span></p>
                      <ul style='text-align:justify'>
                        <li>ZERO Transaction Charges* for Net Banking and low charges for Credit Cards and Debit Cards</li>
                        <li>NIL Convenience Fees </li>
                        <li>You can also see your previous bills history online. </li>
                    </ul></td>
                    </tr>
                    <tr><td style='padding:5px 15px 5px 55px' align='left'>For ease of access your User Name and password is enclosed here </td>
                    </tr>
                    <tr>
                      <td style='padding:5px 15px 5px 55px' align='left'>Username:". $rec['user_name']."</td>
                    </tr>
                    <tr>
                      <td style='padding:5px 15px 5px 55px' align='left' valign='middle'>Password :".$rec['password']." </td>
                      
                    </tr><tr>
                    <td style='padding:15px 15px 15px 55px'>
                    <a  href='".DOMAIN."bills.php' style=' display:inline-block;padding:12px 10px 100px;margin-left:150px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff; border-radius: 20px; background:#0badf2' target='_blank' align='center' >Pay Now</a>
                   </td>
                   </tr>
                   <tr><td style='padding:15px 15px 15px 55px'>
                      <p> <u>Unreconciled Payments</u>
                      </p><p>
                      Please also note that the some past receipts are not yet posted to the User Accounts due to insufficient information. Click Here to view the same. If these payments have been made by you then kindly click on the same to email us on office.nrwa@nirvanacountry.co.in the following details
                      </p>
                      <ul style='text-align:justify'>
                      a) Your Block Name, House Numbers Floor Number <br>
                      b) Excerpt of Your Bank Statement with Transaction Ref Number. <br>
                      c) Date of Payment  <br>
                      </ul>
                      <br>
                      Basis the same, we will update your account and intimate you of the same. 
                      <br>
                      </td></tr>
                    <tr>
                      <td align='left' valign='middle' style='padding:15px 15px 15px 55px'>Warm Regards,<br>NRWA Office
                      <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                      <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td height='30'>&nbsp;</td>
            </tr>
            <tr>
              <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                 
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>"
        
        
    );
        $data1 = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "Nrwa Office"),
        "subject" => "Now you can pay your CAM Bills online",
        "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
  <tbody>
    <tr>
      <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
          <tbody>
            <tr>
              <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
            </tr>
            <tr>
              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                  <tbody>
                    <tr>
                      <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ></a></td>
                    </tr>
                    <tr>
                    <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",</strong> <span style='padding-bottom:4px;display:block'><a href='".DOMAIN."bills.php'>Click here </a> to  view & pay your CAM Bills online on <a href='".DOMAIN."'>Nirvana online </a> using Net Banking or Credit Cards.</span></p>
                    <ul style='text-align:justify'>
                      <li>ZERO Transaction Charges* for Net Banking and low charges for Credit Cards and Debit Cards</li>
                      <li>NIL Convenience Fees </li>
                      <li>You can also see your previous bills history online. </li>
                  </ul></td>
                    </tr>
                    </tr>
                    <tr>
                    <td style='padding:15px 15px 15px 55px'>
                    <a  href='".DOMAIN."bills.php' style=' display:inline-block;padding:12px 10px;margin-left:150px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff; border-radius: 20px; background:#0badf2' target='_blank' >Pay Now</a>
                   </td>
                   </tr>
                   <tr><td style='padding:15px 15px 15px 55px'>
                      <p> <u>Unreconciled Payments</u>
                      </p><p>
                      Please also note that the some past receipts are not yet posted to the User Accounts due to insufficient information. Click Here to view the same. If these payments have been made by you then kindly click on the same to email us on office.nrwa@nirvanacountry.co.in the following details
                      </p>
                      <ul>
                      a) Your Block Name, House Numbers Floor Number <br>
                      b) Excerpt of Your Bank Statement with Transaction Ref Number. <br>
                      c) Date of Payment  <br>
                      </ul>
                      <br>
                      Basis the same, we will update your account and intimate you of the same. 
                      <br>
                      </td></tr>
                    <tr>
                    <td align='left' valign='middle' style='padding:15px 15px 15px 55px'>Warm Regards,<br>NRWA Office
                    <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                    <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                    </tr>
                    <tr>
                      <td align='center' valign='middle'>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>"
        
        
    );
    
    if($rec['first_login']){
   // ////echo"<pre>";
  ////print_r($toArray);
    $mailin->send_email($data1);
    }
    else{
    $mailin->send_email($data);      
        
    }////print_r();
  //  ////echo "</pre>";
}