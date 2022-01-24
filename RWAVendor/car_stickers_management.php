<?php include('model/class.expert.php');
include('adminsession_checker.php');

$getcarstickersData = $ModelCall->get("tbl_car_details");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Car stickers Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/addform.css">
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
        <div class="col-xs-4">
          <h4 class="page-title">Car stickers Management</h4>
        </div>
       
      </div>
      
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                <th>Name</th>
                <th>User Name</th>
                <th>Unit NO</th>
                <th>Car No </th>
                <th>Car Make / Model </th>
                <th>Color </th>
                <th>Sticker Number </th>
                <th>Created Date</th>
                <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
<?php 
if(count($getcarstickersData)>0){ 
  foreach($getcarstickersData as $getcarsticker){ 
    
    $ModelCall->where("user_id", $getcarsticker['user_id']);
    $rec = $ModelCall->get("Wo_Users");
    ?>             
                <tr>
                <td><?php echo ucwords($rec[0]['first_name']);?> <?php echo ucwords($rec[0]['middle_name']);?> <?php echo ucwords($rec[0]['last_name']);?></td>
                <td><?php echo $rec[0]['user_name'];?></td>
                <td><?php echo ucwords($getcarsticker['unit_no']);?></td>
                <td><?php echo ucwords($getcarsticker['car_number']);?></td>
                <td><?php echo ucwords($getcarsticker['make_model']);?></td>
                <td><?php echo ucwords($getcarsticker['color']);?></td>
                <td><?php echo ucwords($getcarsticker['sticker_number']);?></td>
                <td><?php echo ucwords($getcarsticker['added_date']);?></td>
                <td class="text-right">
                  <table width="100%">
                      <tr>
                        <td> <?php if($getcarsticker['status']==1){?> <div class="btn btn-success">Approved</div><?php } else if($getcarsticker['status']==-1){?> Deleted <?php } else { ?> <a href="#" data-toggle="modal" data-target="#car_sticker_status<?php echo $getcarsticker['stickerid'];?>" class="btn btn-danger">Pending</a> <?php } ?> </td>

                        <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                          <ul class="dropdown-menu pull-right">
                                            <li onclick="showEditQues($(this).next().text(),$(this).next().next().text());"><a href="#" data-toggle="modal" data-target="#car_sticker_no<?php echo $getcarsticker['stickerid'];?>"><i class="fa fa-pencil m-r-5"></i> Add Sticker Number</a></li>
                                          </ul>
                                        </div></td>
                      </tr>
                  </table>
                </td>
                </tr>
                 <?php include('change_car_stickers_status.php'); ?>
                 <?php include('add_car_sticker_no.php'); ?>
    <?php }
  } else {?>
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
  <?php //include('add_survey_form.php'); ?>


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

<link rel="stylesheet" href="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.css">
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.js"></script>

<script src="<?php echo DOMAIN.AdminDirectory;?>assets/addform.js"></script>
<!--script src="<?php echo DOMAIN.AdminDirectory;?>assets/editform.js"></script-->
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/edit.js"></script>
<script>
$(function(){
$("#exp").datepicker({
  dateFormat: "yy-mm-dd"
});
$("#start").datepicker({
  dateFormat: "yy-mm-dd"
});
$(".eexp").datepicker({
  dateFormat: "yy-mm-dd"
});
$(".estart").datepicker({
  dateFormat: "yy-mm-dd"
});

});
</script>
 
</body>
</html>
