<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['newspaper_name']!='')
{
$ModelCall->where("newspaper_name", $_REQUEST['newspaper_name']);
}
if($_REQUEST['newspaper_language']!='')
{
$ModelCall->where("newspaper_language", $_REQUEST['newspaper_language']);
}
//$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getNewsInfo = $ModelCall->get("tbl_newspaper_module");
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
<title>Newspapers - <?php echo SITENAME;?> Admin</title>
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
          <h4 class="page-title">Newspaper Management</h4>
        </div>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> 
        <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_newspaper"><i class="fa fa-plus"></i> Add Newspaper</a>
      <!--  <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_news_bills"><i class="fa fa-plus"></i> Upload Newspaper Billing</a> 
          <div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>newspaper_management.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Newspaper Name</label>
            <input type="text" class="form-control floating" id="name" name="name" value="<?php echo $_REQUEST['name'];?>" />
          </div>
        </div>
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Newspaper language</label>
            <input type="text" class="form-control floating" id="language" name="language" value="<?php echo $_REQUEST['language'];?>" />
          </div>
        </div>
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
        </form>
      </div>
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th><h5>Newspaper Name</h5></th>
                  <th><h5>Newspaper Language</h5></th>
                  <th><h5>Annual Cost</h5></th>
                  <th><h5>Discount Offer</h5></th>
                <!--  <th>Quantity</th>
                  <th><h5>Status</h5></th>-->
                  <th class="text-right"><h5>Action</h5></th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getNewsInfo)>0){ foreach($getNewsInfo as $getNewsInfoVal){ ?> 
                <tr>
                <td >
                    <h2><?php echo ucwords($getNewsInfoVal['name']);?></h2></td>
                  <td><?php echo $getNewsInfoVal['language'];?></td>
                  <td><?php echo $getNewsInfoVal['annual_cost'];?>/<?php echo $getNewsInfoVal['event_time'];?></td>
                   <td><?php echo $getNewsInfoVal['discount_offer'];?></td>
                   <!-- <td><?php echo $getNewsInfoVal['bought'];?></td>-->
                 <!--  <td> <?php if($getNewsInfoVal['status']==1){?> <a href="#" data-toggle="modal" data-target="#deactivate_event<?php echo $getNewsInfoVal['id'];?>" class="btn btn-success">Active</a><?php } 
                                else { ?> <a href="#" data-toggle="modal" data-target="#activate_event<?php echo $getNewsInfoVal['id'];?>" class="btn btn-danger">Inactive</a> <?php } ?> </td> -->

                   <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_news<?php echo $getNewsInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_news<?php echo $getNewsInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
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
