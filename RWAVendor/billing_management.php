<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['bill_number']!='')
{
    
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);
}
if($_REQUEST['billing_date']!='')
{
    $date=date_create($_REQUEST['billing_date']);
  $_REQUEST['billing_date']=date_format($date,"d/m/Y");
 
$ModelCall->where("billing_date" , $_REQUEST['billing_date']);}


if($_REQUEST['flat_no']!='')
{
$ModelCall->where("flat_no" , $_REQUEST['flat_no']);}


if($_REQUEST['member_name']!='')
{
$ModelCall->where("member_name" , $_REQUEST['member_name']);}
if($_REQUEST['received_cheque']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
if($_REQUEST['received_e_payment']!='')
{
$ModelCall->where("bill_number" , $_REQUEST['bill_number']);}
/*$ModelCall->where ("id ='1'");*/



$getDriverInfo = $ModelCall->get("tbl_billing");
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
          <h4 class="page-title">Billing Management</h4>
        </div>
        <div class="col-xs-9 text-right m-b-30"> 
        
        
            <a href="<?php echo DOMAIN.AdminDirectory;?>billing_upload_sample.xlsx" class="btn btn-danger rounded" target="_blank" style="margin-right:4px;" ><i class="fa fa-download"></i> Download Format</a>   <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_billing"><i class="fa fa-plus"></i> Upload Billing</a> 
        
        
          <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
      <div class="row ">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>billing_management.php" method="post" enctype="multipart/form-data">
        
       
         <div class="col-md-3">
          <div class="form-group form-focus">
                <label class="control-label">Bill Number </label>
            <input type="text" class="form-control floating" id="bill_number" name="bill_number" />
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="form-group form-focus">
            <label class="control-label">Bill Date</label>
            <input type="date" id="billing_date" name="billing_date" class="form-control floating" />
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="form-group form-focus">
            <label class="control-label">Start Date</label>
            <input type="date" id="received_e_payment" name="received_e_payment" value="<?php echo $_REQUEST['received_e_payment'];?>" class="form-control floating" />
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group form-focus">
            <label class="control-label">Flat</label>
            <input type="text" id="flat_no" name="flat_no"  class="form-control floating" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group form-focus">
            <label class="control-label">Member Name</label>
            <input type="text" id="member_name" name="member_name" class="form-control floating" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group form-focus">
            <label class="control-label">Arrears</label>
            <input type="text" id="received_e_payment" name="received_e_payment" value="<?php echo $_REQUEST['received_e_payment'];?>" class="form-control floating" />
          </div>
        </div>
        
        <div class="col-md-1"> <button type="submit"  class="btn btn-success btn-block"> <span class="glyphicon glyphicon-search"></span> </button> </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
          

            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  
                  <th>Unit #</th>
                  <th>Unit Type</th>
                  <th>Billing Date</th>
                  <th>Bill Amount</th>
                  <th>Amount Paid</th>
                  <th>Amount Due</th>
                  <th>Due Date</th>
                  <th>Status</th>
                  
                  <th>E Bill</th>
                  <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                </tr>
              </thead>
              <tbody>
 <?php 
$TotalIncentiveEarned=0;
if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getCustomerInfoVal){ 

$ModelCall->where("(block_name ='".$ModelCall->utf8_decode_all($getCustomerInfoVal['block_name'])."')" );
$ModelCall->orderBy("id","desc");
$getBlockInfo = $ModelCall->get("tbl_block_entry");


?>             
                <tr>
                 <td >
                  <h2><?php echo "NRI-".$getBlockInfo[0]['block_code']."-".$getCustomerInfoVal['flat_no'];?></h2></td>
                   <td >
                        
                  <h2><?php echo "Flats";?></h2></td>
                    <td >
                  <h2><?php echo ucwords($getCustomerInfoVal['billing_date']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['current_total_bill_amount']);?></h2></td>
                  <td> <h2><?php echo ucwords($getCustomerInfoVal['current_total_bill_amount']-$getCustomerInfoVal['total_outstanding']);?></h2></td>
                   <td> <h2><?php echo ucwords($getCustomerInfoVal['total_outstanding']);?></h2></td>
                 <td> <h2><?php echo ucwords($getCustomerInfoVal['due_date']);?></h2></td>
                 
                   <td> <?php if($getCustomerInfoVal['total_outstanding']>0){?> <a href="#" data-toggle="modal" data-target="#update-user-status<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-danger">Due</a><?php }?> 
<?php if($getCustomerInfoVal['total_outstanding']==0){echo "Paid"; }?>
    </td>
              <td> <h2><?php echo "Yes";?></h2></td>    
    <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                      
                      <li><a href="#" data-toggle="modal" data-target="#edit_customers<?php echo $getCustomerInfoVal['id'];?>"><i class="fa fa-edit m-r-5"></i> Edit</a></li>
                      
                        <li><a href="#" data-toggle="modal" data-target="#delete_customers<?php echo $getCustomerInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
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
 
   <?php include('upload_billing.php'); ?>
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
