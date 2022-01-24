<?php
/*print_r($_FILES);
exit;*/
error_reporting(1);

include("../model/class.expert.php"); 
include("custom_mailer_functions.php");

?>
<?php
function TripCodeGenerate($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
} 
function phpexpertOTPSPONSER($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
} 

function phpexpertOTPSPONSER1($length = 6, $chars = '0987654321')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
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

if(($_REQUEST['ActionCall']=="NewUploader"))
{
if($_FILES['customer_excel_sheet_upload']['name']!=''){
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["customer_excel_sheet_upload"]["type"],$allowedFileType))
{
$info = pathinfo($_FILES['customer_excel_sheet_upload']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = rand(0,9999999)."new_billing_upload_example.".$ext; 

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
                "1"  => "Unit Number",
"2"  => "Billing Period Start Date",
"3"  => "Amount Reversed",
"4"  => "Date Reversed",
"5"  => "Amount Received",
"6"  => "Date Received",
"7"  => "Mode Of Pay",
"8"  => "Payment Ref. No.",
"9"  => "Amount Received in Bank ",
"10"  => "Date Received in Bank ",
);
 
 
//print_r($headers);
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $headers);
fclose($fp);


for($i=0;$i<$sheetCount;$i++)
{
$Reader->ChangeSheet($i);
$j=0;

foreach ($Reader as $emapData)
{
    if($j==0){
        $j++;
        continue;
    }
    if($emapData[0] == 'Bill Number')
    {
        foreach($headers as $i => $header)
        {
            if($emapData[$i] != $header)
            {
                $error_msg[] = 'Format Mismatch';
                $check = 'false';
            }
        }
    }
    //$user_number=generate_username();
    if($emapData[0] != 'Bill Number' && $emapData[0] != '')
	{
		//print_r($emapData);
		$ModelCall->where("bill_num", $emapData[0]);
		$rec_first = $ModelCall->get("tbl_bill_payment_details");
		if(isset($rec_first[0]) && $rec_first[0] > 0){
		    $error_msg[] = 'Duplicate Bill Number';
		  //  $check = 'false';
		}
		
		if(false){}
		else 
		{
			/*$ModelCall->where("email", $ModelCall->utf8_decode_all($emapData[10]));
			$ModelCall->orderBy("user_id","asc");
			$rec = $ModelCall->get("Wo_Users");*/
			if(false){}
			//if(!isset($rec[0]) && $rec[0] <= 0){}
			else 
			{
					
	$dataU = array(
	'bill_num' => $emapData[0],
	'unit_num' => $emapData[1],
	'bill_start_date' => $emapData[2],
	'amount_reversed' => $emapData[3],
	'date_reversed' => $emapData[4],
	'amount_received' => $emapData[5],
	'date_received' => $emapData[6],
	'mode' => $emapData[7],
	'pay_ref' => $emapData[8],
	'amount_received_bank' => $emapData[9],
	'date_received_bank' => $emapData[10],
	);
/*	echo "<pre>";
var_dump($dataU);
echo "</pre>";
exit;*/

//$pos = strpos($check, 'true');

if($check == 'true')
{
    $error_msg[] = 'Success';
    $ModelCall->where("bill_number",$emapData[0]);
$rec = $ModelCall->get("tbl_billing_new");
$amt_paid=$rec[0]['amt_paid'];
$total_outstanding=$rec[0]['total_outstanding'];
$datau=array(
    'amt_paid'=>$amt_paid+$emapData[5],
    'total_outstanding'=>$total_outstanding-$emapData[5],
    );
$ModelCall->where("bill_number",$emapData[0]);
$rec_bl = $ModelCall->update("tbl_billing_new",$datau);  
    $resultU = $ModelCall->insert('tbl_bill_payment_details',$dataU);
}
    $errors = implode(",",$error_msg);
	$dataU['error/success'] = $errors;
	$fp = fopen('php://output', 'w');
	fputcsv($fp, $dataU);
	fclose($fp);

 }      
}}}}
}
if($check == 'true')
{
    header("location:".DOMAIN.AdminDirectory."billing_management.php");
}
else
{
    exit;
    //header("location:".DOMAIN.AdminDirectory."billing_management.php");
    //header("location:".DOMAIN.AdminDirectory."download.php?file=".$filename);
}
}
else
{
header("location:".DOMAIN.AdminDirectory."billing_management.php");
}

}
