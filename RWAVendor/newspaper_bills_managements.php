<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['bill_no']!='')
{
$ModelCall->where("bill_no", $_REQUEST['bill_no']);
}

//$ModelCall->where("client_id", $getAdminInfo[0]['id']);

$getNewsInfo = $ModelCall->get("tbl_newspaper_bill");
/*echo "<pre>";
var_dump($getNewsInfo);
echo "</pre>";
exit;*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Newspapers - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
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
        <div class="col-sm-4 col-xs-3">
          <h4 class="page-title">Newspaper Bills Management</h4>
        </div>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> 
     <!--   <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_newspaper"><i class="fa fa-plus"></i> Add Newspaper</a> -->
        <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_news_bills"><i class="fa fa-plus"></i> Upload Newspaper Billing</a> 
          <!--<div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>newspaper_management.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Bill No</label>
            <input type="text" class="form-control floating" id="bill_no" name="bill_no" value="<?php echo $_REQUEST['name'];?>" />
          </div>
        </div>
  
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th><h5>Bill No</h5></th>
                  <th><h5>Total Bill</h5></th>
                  <th><h5>Amount Paid</h5></th>
                  <th><h5>Date Paid</h5></th>
                <!--  <th>Quantity</th>
                  <th><h5>Status</h5></th>-->
                  <th ><h5>PGway Status</h5></th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getNewsInfo)>0){ foreach($getNewsInfo as $getNewsInfoVal){ ?> 
                <tr>
                <td >
                    <h2><?php echo ucwords($getNewsInfoVal['bill_no']);?></h2></td>
                  <td><?php echo $getNewsInfoVal['total_bill_amt'];?></td>
                  <td><?php echo $getNewsInfoVal['amt_paid'];?><?php echo $getNewsInfoVal['event_time'];?></td>
                   <td><?php echo $getNewsInfoVal['date_paid'];?></td>
                  
                 <td> <?php if($getNewsInfoVal['PGway_status']=="success"){?> <a href="#" data-toggle="modal" data-target="#<?php echo $getNewsInfoVal['id'];?>" class="btn btn-success">Paid</a><?php } 
                                else { ?> <a href="#" data-toggle="modal" data-target="#<?php echo $getNewsInfoVal['id'];?>" class="btn btn-danger">Due</a> <?php } ?> </td> 

                 <!--  <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_news<?php echo $getNewsInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_news<?php echo $getNewsInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td> -->
                </tr>
                <?php include('edit_news.php'); ?>
    <?php include('delete_news.php'); ?>
      <?php include('activate_event_confirm.php'); ?>
        <?php include('deactivate_event_confirm.php'); ?>
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
  <?php include('add_newspaper.php'); ?>
  <?php include('upload_news_bills.php'); ?>
  
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
/*$(document).ready(function () {	
	$(".event_date").datepicker({dateFormat: 'dd-mm-yy',minDate:'0d' });
	
});*/


</script>

<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
