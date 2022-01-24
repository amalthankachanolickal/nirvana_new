<?php include('model/class.expert.php');
include('adminsession_checker.php');

$getLatest = $ModelCall->rawQuery("SELECT max(bill_date) as latest_bill_date FROM `tbl_billing_new`");

$first=0 ;
 $where= "where tbl_bill_payment_details.bill_num is not null ";
if($_REQUEST['bill_number']!='')
{
    
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);
}
if($_REQUEST['bill_date']!='')
{
    $bill_date_string = strtotime($_REQUEST['bill_date']);
    $bill_date_s = date('Y-m-d', $bill_date_string);
    $bill_date_d = date('d/m/Y', $bill_date_string);
    if($first){
        $where= "where";
        $where=$where." bill_date = '".$bill_date_s."'";
    }
    else{
        $where=$where." and bill_date = '".$bill_date_s."'";
    }
     $first=0;
//  }else{
//       $bill_date_string = strtotime($getLatest[0]['latest_bill_date']);
//       $bill_date_s = date('Y-m-d', $bill_date_string);
//       $bill_date_d = date('d/m/Y', $bill_date_string);
//       if($first){
//         $where= "where";
//         $where=$where." bill_date = '".$bill_date_s."'";
//     }
//     else{
//         $where=$where." and bill_date = '".$bill_date_s."'";
//     }
//      $first=0;  
 }


if($_REQUEST['status']!='')
{
if($_REQUEST['status']=='due'){
   
    if($first){
        $where= "where";
        $where=$where." total_outstanding = payable_amount";
    }
    else{
        $where=$where." and total_outstanding = payable_amount";
    }
     $first=0;
}
 if($_REQUEST['status']=='paid'){
   
   if($first){
       $where= "where";
        $where=$where." total_outstanding <= 0";
    }
    else{
        $where=$where." and total_outstanding <=0";
    }
     $first=0;
}  
 if($_REQUEST['status']=='ParPaid'){
   
   if($first){
       $where= "where";
        $where=$where." total_outstanding > 0 and total_outstanding < payable_amount";
    }
    else{
        $where=$where." and total_outstanding > 0 and total_outstanding < payable_amount";
    }
     $first=0;
}
    
}
if($_REQUEST['block_number']){
      if($first){
          $where= "where";
        $where=$where.' flat_no like "%'.$_REQUEST['block_number'].'%"';
    }
    else{
        $where=$where.' and flat_no like "%'.$_REQUEST['block_number'].'%"';
    }
     $first=0;
}
if($_REQUEST['house_number']){
      if($first){
          $where= "where";
        $where=$where.' flat_no like "%'.$_REQUEST['house_number'].'%"';
    }
    else{
        $where=$where.' and flat_no like "%'.$_REQUEST['house_number'].'%"';
    }
     $first=0;
}
if($_REQUEST['psdate']){

     $pay_start_date_string = strtotime($_REQUEST['psdate']);
    $pay_date_s = date('Y-m-d', $pay_start_date_string);
      if($first){
          $where= "where";
        $where=$where." date_received >='".$pay_date_s."'";
    }
    else{
        $where=$where." and date_received >='".$pay_date_s."'";
    }
     $first=0;
}
if($_REQUEST['pedate']){
    $pay_end_date_string = strtotime($_REQUEST['pedate']);
    $pay_date_e = date('Y-m-d', $pay_end_date_string);
      if($first){
          $where= "where";
        $where=$where." date_received <='".$pay_date_e."'";
    }
    else{
        $where=$where." and date_received <='".$pay_date_e."'";
    }
     $first=0;
}
if($_REQUEST['floor_number']){
      if($first){
          $where= "where";
        $where=$where.' floor_num like "%'.$_REQUEST['floor_number'].'%"';
    }
    else{
        $where=$where.' and floor_num like "%'.$_REQUEST['floor_number'].'%"';
    }
     $first=0;
}
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




if($_REQUEST['download_csv']){
    $filename = date('Y-m-d')."_payment_reports.csv";         //File Name
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
"60" => "Property Type",

"61"  => "Amount Received",
"62"  => "Date Received",

"63"  => "Mode of Payment",
"64"  => "Transaction Referennce Number",
"65"  => "Admin Confirmed received",
"66"  => "Amount Received Bannk",
);
 
  
//print_r($headers);
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $headers);
$getDriverInfo = $ModelCall->rawQuery("select bill_number,bill_date,start_period_date,end_period_date,actual_due_date,display_due_date,bill_area,flat_no,member_name,cam_o_m_services,diesel_cost,utility_charge,cgst,sgst,total,taxable_amount,arrears,interest,cgst_interest,sgst_interest,cheque_dishonour_charges,cgst_cheque_dishonour,sgst_cheque_dishonour,payable_amount,floor_num,amt_paid,total_outstanding,late_fee_charge,pay_after_due,gst_in,pan_no,address,mob_no,email,dg_prev_reading,dg_current_reading,dg_consumed_reading,dg_pre_reading_date,dg_current_reading_date,sanc_grid_load,sanc_dg_load,cam_unit,cam_rate,cam_rebate,cam_net_rate,deisel_unit,deisel_rate,deisel_rebate,deisel_net_rate,utility_unit,utility_rate,utility_rebate,utility_net_rate,pay_before_due,total_pre_os_last_month,pay_to_next_invoice,last_month_cheque,last_month_date,last_month_type,last_month_amount,prop_type
 ,amount_received,date_received,mode,pay_ref,date_received_bank ,amount_received_bank from tbl_billing_new left join tbl_bill_payment_details on tbl_bill_payment_details.bill_num=tbl_billing_new.bill_number ".$where." order by bill_date desc limit 30");

foreach($getDriverInfo as $dataU){
    unset($dataU['id']);
    fputcsv($fp, $dataU);
}

if (fclose($fp)) {
  exit();
} 

}
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
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Billing Payment Report</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
      <script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
      <script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */

  color: white;

}

::-moz-placeholder { /* Firefox 19+ */

  color: white;

}

:-ms-input-placeholder { /* IE 10+ */

  color: white;

}

:-moz-placeholder { /* Firefox 18- */

  color: white;

}

/*===========to hide show 10 entries============*/
div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal;
    text-align: left;
    white-space: nowrap;
    display: none;
/*==============================================*/

    </style>
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-xs-3">
          <h4 class="page-title">Payment Management</h4>
        </div>
        <div class="col-xs-9 text-right m-b-30"> 
        
        
            <!--<a href="<?php echo DOMAIN.AdminDirectory;?>billing_upload_format_file.xlsx" class="btn btn-danger rounded" target="_blank" style="margin-right:4px;" ><i class="fa fa-download"></i> Download Format</a>  
            -->
            <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_billing"><i class="fa fa-plus"></i> Upload Payments</a> 
            
        
          <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
      <div class="row ">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>billing_upload_records_k.php" method="post" enctype="multipart/form-data">
        
       
                          <div class="col-sm-2">
                <div class="form-group">
                 <!-- <label class="control-label">Block<span class="text-danger">*</span></label>-->
                    <select class="form-control" id="block_number" name="block_number">
                        <option value='' >Block</option>
                        <option value="AG">AG</option>
                        <option value="BC">BC</option>
                        <option value="CC">CC</option>
                    
                        <option value="DW">DW</option>
                         <option value="ES">ES</option>
                      
                        
                      </select>
                </div>
              </div>
                          <div class="col-md-2">
                  <div class="form-group">
                    <!--<label class="control-label">House Number <span class="text-danger">*</span></label>-->
                    <input class="form-control" name="house_number" pattern="[0-9]{0-4}" placeholder="Enter your 3 Digit House No" title="Three Digit House No"  value="<?php echo $_REQUEST['house_number'];?>" type="text" maxlength="3">
                  </div>

              </div>
               <div class="col-sm-2">
                <div class="form-group">
                  <!--<label class="control-label">Floor<span class="text-danger">*</span></label>-->
                    <select class="form-control" id="floor_number" name="floor_number">
                            <option value=''>Floor</option>
                            <option value='1'>Ground Floor</option>
                            <option  value='2'>First Floor</option>
                            <option value='3'>Second Floor</option>
                            <option value='4'>Third Floor</option>
                            <option value='5'>Fourth Floor</option>
                     </select>
                </div>
              </div>
                <div class="col-sm-2">
                <div class="form-group">
                 <!-- <label class="control-label">Status<span class="text-danger">*</span></label>-->
                    <select class="form-control" id="status" name="status">
                            <option  value=''>Status</option>
                              <option  value='due'>Due</option>
                              <option value='ParPaid'>Partilally Paid</option>
                              <option value='paid'>Paid</option>
                    </select>
                </div>
              </div>
        <div class="col-sm-2">
          <div class="form-group ">
            <!--<label class="control-label">Bill date</label>-->
            <input type="text" id="bill_date" name="bill_date" onfocus="this.type='date'" placeholder="Bill Date" value="<?php echo $bill_date_s;?>" class="form-control floating" />
          </div>
        </div>
     
        <div class="col-sm-2">
          <div class="form-group ">
            <!--<label class="control-label">Pay.Start date</label>-->
            <input type="text" id="psdate" name="psdate" onfocus="this.type='date'" placeholder="Pay Start Date" value="<?php echo $_REQUEST['psdate'];?>"  class="form-control floating" />
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group ">
            <!--<label class="control-label">Pay. End date</label>-->
            <input type="text" id="pedate" name="pedate" onfocus="this.type='date'" placeholder="Pay End Date" value="<?php echo $_REQUEST['pedate'];?>" class="form-control floating" />
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group ">
              <!--<label class="control-label">&nbsp;</label>-->
            <button type="submit"  class="btn btn-success btn-block"> <span class="glyphicon glyphicon-search"></span> </button>
          </div>
        </div>
        <div class="col-sm-1">
          <div class="form-group ">
              <!--<label class="control-label">&nbsp;</label>-->
            <button type="submit" name='download_csv' value ='1' class="btn btn-success btn-block">  <i class="fa fa-download"></i>  </button>
          </div>
        </div>
       
        </form>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
         <?php if($_REQUEST['fileErrorO'] != '') { ?>
          <div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Some fields were missing. Click the link to open file : <a href="<?php echo $_REQUEST['fileErrorO']; ?>" target="_blank">Click here</a> </div>
         <?php
         }?>
         <?php if($_REQUEST['actionResult'] == 'formaterror') { ?>
          <div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Please upload correct file format. </div>
         <?php
         }?>
          <div class="table-responsive">
          

            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  
                 <!-- <th>Unit no#</th> -->
                  <th>Unit No.</th>
                 <!-- <th>Start Date</th>
                  <th>End Date</th>
                  <th>Due Date</th>
                  
                  <th>Bill Area</th>-->
                  
                  <th>Amt Due</th>
                  <th>Amt Received</th>
                 <!-- <th>CAM Ser.</th>
                  <th>Diesel Cost</th>
                  <th>Utility Charge</th>
                
                  
                  <th>Total*</th>
                  <th>Taxable Amount</th>
                  <th>Arrears</th>
                  <th>Interest*</th>
                  <th>CDC</th>-->
                  <th>Date Received</th>
                   <th>Mode of Payment</th>
                   <th>Transaction Ref #</th>
                  <th>Admin Confirmed</th>
                
                  <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                </tr>
              </thead>
              <tbody>
 <?php 
$TotalIncentiveEarned=0;


$getDriverInfo = $ModelCall->rawQuery("select *,tbl_bill_payment_details.id as payment_id from tbl_billing_new left join tbl_bill_payment_details on tbl_bill_payment_details.bill_num=tbl_billing_new.bill_number ".$where." order by bill_date desc limit 30");

if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getCustomerInfoVal){ 

?>             
                <tr>
              <!--   <td >
                  <h2><?php echo "NRI-".$getCustomerInfoVal['flat_no']."-".$getCustomerInfoVal['floor_num'];?></h2></td>-->
                 <!--   <td >
                        
                 <h2><?php echo "Flats";?></h2></td> 
                    <td >
                  <h2><?php echo dateformatchange($getCustomerInfoVal['bill_date']);?></h2></td>
                  
              <td> <h2><?php echo dateformatchange($getCustomerInfoVal['start_period_date']);?></h2></td>
                  <td> <h2><?php echo dateformatchange($getCustomerInfoVal['end_period_date']);?></h2></td>
                   <td> <h2><?php echo dateformatchange($getCustomerInfoVal['actual_due_date']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['bill_area']);?></h2></td>-->
                 
                <td> <h2><?php echo ucwords("NRI-".$getCustomerInfoVal['flat_no']."-".$getCustomerInfoVal['floor_num']);?></h2></td>
                
                <td> <h2><?php echo ucwords($getCustomerInfoVal['payable_amount']);?></h2></td>
                 <!-- <td> <h2><?php echo ucwords($getCustomerInfoVal['diesel_cost']);?></h2></td>
                   <td> <h2><?php echo ucwords($getCustomerInfoVal['utility_charge']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['total']);?></h2></td>
  <td> <h2><?php echo ucwords($getCustomerInfoVal['taxable_amount']);?></h2></td>
                   <td> <h2><?php echo ucwords($getCustomerInfoVal['arrears']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['interest']+$getCustomerInfoVal['cgst_interest']+$getCustomerInfoVal['sgst_interest']);?></h2></td>
                  <td> <h2><?php echo ucwords($getCustomerInfoVal['cheque_dishonour_charges ']+$getCustomerInfoVal['cgst_cheque_dishonour']+$getCustomerInfoVal['sgst_cheque_dishonour']);?></h2></td>-->
                  
                  
                   <td> <h2><?php echo ucwords($getCustomerInfoVal['amt_paid']);?></h2></td> 
                   <td> <h2><?php  if($getCustomerInfoVal['date_received']){echo dateformatchange($getCustomerInfoVal['date_received']);}?></h2></td>
                   <td> <h2><?php echo ucwords($getCustomerInfoVal['mode']);?></h2></td>
                   <td> <h2><?php echo substr(ucwords($getCustomerInfoVal['pay_ref']),0,15);?></h2></td>
                  <td> <h2><?php echo 'Yes';?></h2></td>
                     <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                      
                      <li><a href="#" data-toggle="modal" data-target="#edit_bills<?php echo $getCustomerInfoVal['id'];?>"><i class="fa fa-edit m-r-5"></i> Edit</a></li>
                       <!--<li><a href="#" data-toggle="modal" data-target="#update-user-status1<?php echo $getCustomerInfoVal['id'];?>"><i class="fa fa-edit m-r-5"></i> Update Payment</a></li>
                       --> <li><a href="#" data-toggle="modal" data-target="#delete_payment<?php echo $getCustomerInfoVal['payment_id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
               
  </tr>
 <?php include('edit_bills.php'); ?>
<?php include('add_payment.php'); ?>
         
    <?php include('delete_payment.php'); ?>
 <?php include('payment_status_update.php'); ?>
               
         
                <?php } } else {?>
                <tr><td colspan="7">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
          
          </div>
        </div>
      </div>
    </div>
    <?php include('message_notification.php'); ?>
  </div>
 
   <?php include('upload_new_billing.php'); ?>
   <?php include('new_uploader.php'); ?>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>

<script>
    $( document ).ready(function() {
    console.log( "ready!" );
    <?php if(isset($_REQUEST['block_number'])){?>
    $('#block_number').val('<?php echo $_REQUEST['block_number'];?>');
    
     <?php } ?>
     
     <?php if(isset($_REQUEST['floor_number'])){?>
    $('#floor_number').val('<?php echo $_REQUEST['floor_number'];?>');
    
     <?php } ?>
     
     <?php if(isset($_REQUEST['status'])){?>
    $('#status').val('<?php echo $_REQUEST['status'];?>');
    
     <?php } ?>
});
</script>

</body>
</html>
