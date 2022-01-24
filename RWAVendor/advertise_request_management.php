<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['request_name']!='')
{
$ModelCall->where("(request_name ='".$ModelCall->utf8_decode_all($_REQUEST['request_name'])."')" );
}
if($_REQUEST['request_email']!='')
{
$ModelCall->where("(request_email ='".$ModelCall->utf8_decode_all($_REQUEST['request_email'])."')" );
}
if($_REQUEST['request_mobile']!='')
{
$ModelCall->where("(request_mobile ='".$ModelCall->utf8_decode_all($_REQUEST['request_mobile'])."')" );
}
$ModelCall->where("(client_id ='".$ModelCall->utf8_decode_all($getAdminInfo[0]['id'])."')" );
$ModelCall->orderBy("id","desc");
$getDriverInfo = $ModelCall->get("tbl_advertise_request");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Advertise Request Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
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
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-xs-8">
          <h4 class="page-title">Advertise Request Management</h4>
        </div>
        <div class="col-xs-4 text-right m-b-30">         <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
      <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>advertise_request_management.php" method="get" enctype="multipart/form-data">
        
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Name</label>
            <input type="text" class="form-control floating" id="request_name" name="request_name" value="<?php echo $_REQUEST['request_name'];?>" />
          </div>
        </div>
        
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Email Address</label>
            <input type="text" id="request_email" name="request_email" value="<?php echo $_REQUEST['request_email'];?>" class="form-control floating" />
          </div>
        </div>
        
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Mobile Number</label>
            <input type="text" id="request_mobile" name="request_mobile" value="<?php echo $_REQUEST['request_mobile'];?>" class="form-control floating" />
          </div>
        </div>
        
        
        
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Name/Email</th>
                  <th>Mobile</th>
                  <th>Attachment</th>
                  <th>Start - End</th>
                  <th>Created</th>
                  <th>IP</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
 <?php 
if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getCustomerInfoVal){ 

?>             
                <tr>
                  
                  <td><?php echo ucwords($getBlockInfo[0]['request_name']);?><br><?php echo ucwords($getCustomerInfoVal['request_email']);?></td>
                 
                 <td><?php echo ucwords($getCustomerInfoVal['request_mobile']);?></td>
                 <td><a href="<?php echo DOMAIN.AdminDirectory;?>documents/<?php echo $getCustomerInfoVal['request_attachment'];?>" target="_blank"><?php echo $getDocumentVal['request_attachment_name'];?></a></td>
                   <td><?php echo ucwords($getCustomerInfoVal['request_start_date']);?> - <?php echo ucwords($getCustomerInfoVal['request_end_date']);?></td>
                  
                   <td><?php echo ucwords($getCustomerInfoVal['created_date']);?></td>
                    <td><?php echo ucwords($getCustomerInfoVal['created_ip']);?></td>
                  <td class="text-right">
				  
				  <table width="100%">
  <tr>
   
    <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#delete_advertise_request_confirm<?php echo $getCustomerInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
  </tr>
</table>

				 </td>
                </tr>
                <tr><td colspan="6"><?php echo ucwords($getCustomerInfoVal['request_message']);?></td></tr>
    <?php include('delete_advertise_request_confirm.php'); ?>
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
