<?php include('model/class.expert.php');
include('adminsession_checker.php');
 $ModelCall->delete("tbl_society_structure");
$getDriverInfo = $ModelCall->get("Wo_Users");
foreach($getDriverInfo as $getCustomerInfoVal){
    if($getCustomerInfoVal['block_id']!="" && $getCustomerInfoVal['house_number_id']!=""){
        
        $ModelCall->where("id",$getCustomerInfoVal['block_id']);

$rec = $ModelCall->get("tbl_block_entry");
if(isset($rec[0])){
    
    $block=$rec[0]['block_code'];
    $blockname=$rec[0]['block_name'];
  
if($getCustomerInfoVal['floor_number']==""){
    $unit_number="NIR-".$block."-".$getCustomerInfoVal['house_number_id'];
    
}
else{
       $unit_number="NIR-".$block."-".$getCustomerInfoVal['house_number_id']."-".$getCustomerInfoVal['floor_number'];
 
}
$dataU = array(
	'unit_number' =>  $unit_number,
	'society' => "Nirwana",
	'block' => $rec[0]['block_name'],
	'house_no' => $getCustomerInfoVal['house_number_id'],
	'floor' => $getCustomerInfoVal['floor_number'],
	'type'=>'2',
	'owner'=>$getCustomerInfoVal['username'],
	'owner_email'=>$getCustomerInfoVal['email']);

$resultU = $ModelCall->insert('tbl_society_structure',$dataU);

}       
    }
    
}
if($_REQUEST['bill_number']!='')
{
    
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);
}
if($_REQUEST['Society_date']!='')
{
    $date=date_create($_REQUEST['Society_date']);
  $_REQUEST['Society_date']=date_format($date,"d/m/Y");
  
$ModelCall->where("Society_date" , $_REQUEST['Society_date']);}
if($_REQUEST['received_e_payment']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
if($_REQUEST['received_cash']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
if($_REQUEST['received_cheque']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
if($_REQUEST['received_e_payment']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
/*$ModelCall->where ("id ='1'");*/


$getDriverInfo = $ModelCall->get("tbl_society_structure");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Customers Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
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
          <h4 class="page-title">Society Management</h4>
        </div>
        <div class="col-xs-9 text-right m-b-30"> 
        <?php if(count($getDriverInfo)>0){ ?>
        <a href="<?php echo DOMAIN.AdminDirectory;?>download_all_customers.php" target="_blank" class="btn btn-info rounded"  style="margin-right:4px;" ><i class="fa fa-download"></i> Download Customers</a>
        <?php } ?>
        
            <a href="<?php echo DOMAIN.AdminDirectory;?>nirwana_customer_import_example.xls" class="btn btn-danger rounded" target="_blank" style="margin-right:4px;" ><i class="fa fa-download"></i> Download Format</a>   <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_Society"><i class="fa fa-plus"></i> Upload Society</a> 
        
         <a href="#" class="btn btn-success rounded pull-right" data-toggle="modal" data-target="#replace_customers"><i class="fa fa-plus"></i> Replace Existing Customer</a>
        
          <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
          

            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  
                  <th>Unit #</th>
                  <th>Type</th>
                  <th>Society</th>
                  <th>House</th>
                  <th>Block</th>
                  <th>Floor</th>
                  <th>Owner</th>
                  <th>Owner Email</th>
                  
                
               
                </tr>
              </thead>
              <tbody>
 <?php 
$TotalIncentiveEarned=0;
if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getCustomerInfoVal){ 

$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($getCustomerInfoVal['block_id'])."')" );
$ModelCall->orderBy("id","desc");
$getBlockInfo = $ModelCall->get("tbl_block_entry");

?>             
                <tr>
                 <td >
                  <h2><?php echo ucwords($getCustomerInfoVal['unit_number']);?></h2></td>
                   <td >
                        
                  <h2><?php echo ucwords($getCustomerInfoVal['type']);?></h2></td>
                    <td >
                  <h2><?php echo ucwords($getCustomerInfoVal['society']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['house_no']);?></h2></td>
                  <td> <h2><?php echo ucwords($getCustomerInfoVal['block']);?></h2></td>
                  <td> <h2><?php echo ucwords($getCustomerInfoVal['floor']);?></h2></td>
                   <td> <h2><?php echo ucwords($getCustomerInfoVal['owner']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['owner_email']);?></h2></td>
          
   
  </tr>
 

				 
    <?php include('delete_customers_confirm.php'); ?>
 <?php include('payment_status_update.php'); ?>
                <?php include('admin_approval_rejection.php');
                ?>
      <?php include('activate_customers_confirm.php'); ?>
        <?php include('deactivate_customers_confirm.php'); ?>
        <?php include('edit_customers.php'); ?>
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
 
   <?php include('upload_Society.php'); ?>
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



</body>
</html>
