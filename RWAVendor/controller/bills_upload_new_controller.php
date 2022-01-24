<?php
// Report all PHP errors
error_reporting(E_ALL);

//print_r($_FILES);
//exit(0);

include("../model/class.expert.php"); 
include "SimpleXLSX.php";

function getMode($ref_no) {
	if (strpos($ref_no, 'NEFT') !== false) {
		return "NEFT";
	} else if (strpos($ref_no, 'IMPS') !== false) {
		return "IMPS";
	} else if (strpos($ref_no, 'INFT') !== false) {
		return "IMPS";
	} else if (strpos($ref_no, 'CLG') !== false) {
		return "Cheque";
	} else if (strpos($ref_no, 'TRF') !== false) {
		return "Cheque";
	} else if (strpos($ref_no, 'UPI') !== false) {
		return "UPI";
	}  else if (strpos($ref_no, 'CASH') !== false) {
		return "CASH";
	} 
	return "Bank Receipt";
}

function getFlatRefactor($flat_no) {
	if (startsWith($flat_no, "DC")) {
		$flat_arr = explode("-", $flat_no);
		$flat_arr[0] = "DW";
		$refact_flat = implode("-", $flat_arr);
		return $refact_flat;
	}
	return $flat_no;
}

function startsWith ($string, $match) { 
    $len = strlen($match); 
    return (substr($string, 0, $len) === $match); 
} 

if($_FILES['sheet']['name']!=''){
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["sheet"]["type"],$allowedFileType))
{
  $or_f = "";
  if ( $xlsx = SimpleXLSX::parse($_FILES['sheet']['tmp_name']) ) {
    $dim = $xlsx->dimension();
    $cols = $dim[0];
    $error_data = array();
    $format_error = false;
    $total_amount= 0;
    $total_rows= 0;
    $error_rows=0;
    foreach ( $xlsx->rows() as $k => $r ) {
      if ($k == 0) {
      	if (count($r) == 4 && $r[0] == "DATE" && $r[1] == "HOUSE NO." && $r[2] == "PARTICULAR" && $r[3] == "AMOUNT") {
      		continue;
      	} else {
      		$format_error = true;
      		break;
      	}
      }
        $total_rows= $total_rows+1;
      if ($format_error == false) {
	      $flat_no = getFlatRefactor($r[1]);
	      $date_recieved = $r[0];
	      $ref_no = $r[2];
	      $amount = $r[3];
      //  echo "$date_recieved";
        
	      $ModelCall->where("flat_no", $flat_no);
	      $ModelCall->where("bill_date",  $date_recieved, "<=");
	      $ModelCall->orderBy("bill_date", "desc");
	      $bill_table_data = $ModelCall->get("tbl_billing_new", 1);

	      if ($ModelCall->count == 1) { 
	        $bill_number = $bill_table_data[0]['bill_number'];
	        $bill_date = $bill_table_data[0]['bill_date'];
	        $orig_outstanding = $bill_table_data[0]['total_outstanding'];
	        $prev_paid = $bill_table_data[0]['amt_paid'];
	        $mode = getMode($ref_no);

	        $data_payment = array(
	          "bill_num" => $bill_number,
	          "unit_num" => $flat_no,
	          "bill_start_date" => $bill_date,
	          "amount_reversed" => "0",
	          "date_reversed" => "0000-00-00",
	          "amount_received" => $amount,
	          "date_received" => $date_recieved,
	          "mode" => 'Bank Receipt',
	          "pay_ref" => $ref_no,
	          "amount_received_bank" => $amount,
	          "date_received_bank" => $date_recieved,
	          "source" => 'NRWA Office',
	          "payment_mode" => $mode,
	        );

	        if ($ModelCall->insert("tbl_bill_payment_details", $data_payment)) {
        	       $data_payment_success = array(
        	          "bill_num" => $bill_number,
        	          "unit_num" => $flat_no,
        	          "bill_start_date" => $bill_date,
        	          "amount_reversed" => "0",
        	          "date_reversed" => "0000-00-00",
        	          "amount_received" => $amount,
        	          "date_received" => $date_recieved,
        	          "mode" => 'Bank Receipt',
        	          "pay_ref" => $ref_no,
        	          "amount_received_bank" => $amount,
        	          "date_received_bank" => $date_recieved,
        	          "source" => 'NRWA Office',
        	          "payment_mode" => $mode,
        	           "error" => "No error, Record updated",
        	        );
	             
	             array_push($error_data,  $data_payment_success);
              $total_amount=  $total_amount+$amount;
	          $new_outstanding_amount = $orig_outstanding - $amount;
	          $up_data = array(
	            "total_outstanding" => $new_outstanding_amount,
	            "amt_paid" => floatval($amount) + floatval($prev_paid)
	          );
	          $ModelCall->where("bill_number", $bill_number);
	          $ModelCall->update("tbl_billing_new", $up_data);
	        }
	      } else {
	           $data_payment_error = array(
	          "bill_num" => NULL,
	          "unit_num" => $flat_no,
	          "bill_start_date" => $bill_date,
	          "amount_reversed" => "0",
	          "date_reversed" => "0000-00-00",
	          "amount_received" => $amount,
	          "date_received" => $date_recieved,
	          "mode" => 'Bank Receipt',
	          "pay_ref" => $ref_no,
	          "amount_received_bank" => $amount,
	          "date_received_bank" => $date_recieved,
	          "source" => 'NRWA Office',
	          "payment_mode" => $mode,
	          "error" => "Error Uploding- No Matched Record of Bill or House No."
	        );
	        array_push($error_data,  $data_payment_error);
	         $error_rows=$error_rows+1;
	      }
      }
    }

    if ($format_error == true) {
        header("Location: ../billing_upload_records.php?actionResult=formaterror");
        exit;
    }
    if (count($error_data) > 0) {    

    $filename = '../documents/bill_error/'."Bill_Payment_file_".date('y-m-d')."_errors.csv";
    $or_f ="Bill_Payment_file_".date('y-m-d') ."_errors.csv";
    $fp = fopen($filename, 'w'); 
    $headers = array(
      "0" => "bill_num",
      "1" => "unit_num",
      "2" => "bill_start_date",
      "3" => "amount_reversed",
      "4" => "date_reversed",
      "5" => "amount_received",
      "6" => "date_received",
      "7" => "mode",
      "8"=>"pay_ref",
      "9"=>"amount_received_bank",
      "10"=>"date_received_bank",
      "11"=>"source",
      "12"=>"payment_mode",
      "13"=>"error/status"
    );
    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename='.$filename);
    fputcsv($fp, $headers);
    foreach ($error_data as $error) {
      fputcsv($fp, $error);
    }
    fwrite($fp, "\r\n");
    fputcsv($fp,  array('Total Rows:',$total_rows,'Error Rows:',$error_rows,'Total Uploaded Amount',$total_amount));
    
    if (fclose($fp)) {
    }
    }
  } else {
    echo SimpleXLSX::parseError();
  }

if ($or_f != "") {
header("Location: ../billing_upload_records.php?actionResult=documentsuccess&fileErrorO=https://www.nirvanacountry.co.in/RWAVendor/documents/bill_error/$or_f");
} else {
header("Location: ../billing_upload_records.php?actionResult=documentsuccess");
}
}
} else {
  header("Location: ../billing_upload_records.php?actionResult=viruserror");
}
?>