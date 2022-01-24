<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['Module']!='')
{
$ModelCall->where("applied_to", $_REQUEST['Module']);
}else{
$ModelCall->where("applied_to", 'eventsModule');   
}
$ModelCall->where("status", '1');   
//$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","asc");
$getPriceInfo = $ModelCall->get("payment_mode_charges");
/*echo "<pre>";
var_dump($getPriceInfo);
echo "</pre>";
exit;*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Payment Mode Charges - <?php echo SITENAME;?></title>
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
          <h4 class="page-title">Payment Mode Charges Management</h4>
        </div>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> 
        <!-- <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_pricing"><i class="fa fa-plus"></i> Add Pricing table</a> -->
      <!--  <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_news_bills"><i class="fa fa-plus"></i> Upload Newspaper Billing</a> 
          <div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
     <?php if($_SESSION['error']!='') {?> 
          <div class="alert alert-info" align="right" style="display:inline-block; float: right; margin-right:60px;">
              <?php echo $_SESSION['error'];?>
          </div>
          <?php unset($_SESSION['error']); 
        }?>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th><h5>Payment Mode</h5></th>
                  <th><h5>TDR Reduction in -</h5></th>
                  <th><h5>Payu_charges + GST</h5></th>
                  <th><h5>Our Charge</h5></th>
                  <th class="text-right"><h5>Action</h5></th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getPriceInfo)>0){ foreach($getPriceInfo as $getPriceInfoVal){ ?> 
                <tr>
                 <td >
                    <?php echo ucwords($getPriceInfoVal['payment_mode']);?></td>
                <td >
                    <?php echo ucwords($getPriceInfoVal['type']);?></td>
                    <td >
                    <?php echo ucwords($getPriceInfoVal['payu_charges']);?>
                    <?php if($getPriceInfoVal['type']=='PERCENTAGE') echo '%';?> +  <?php echo ucwords($getPriceInfoVal['GST']);?>%</td>
                    <td >
                    <?php echo ucwords($getPriceInfoVal['our_charge']);?><?php if($getPriceInfoVal['type']=='PERCENTAGE') echo '%';?></td>
                   <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_pricing<?php echo $getPriceInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <!-- <li><a href="#" data-toggle="modal" data-target="#delete_pricing<?php //echo $getPriceInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li> -->
                      </ul>
                    </div></td>
                </tr>
                <?php include('edit_tdr_rates.php'); ?>
                <?php // include('delete_pricing.php'); ?>
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
  <?php include('add_pricing.php'); ?>
  
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
