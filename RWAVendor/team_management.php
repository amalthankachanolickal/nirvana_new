<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['team_name']!='')
{
$ModelCall->where("team_name", $_REQUEST['team_name']);
}
if($_REQUEST['team_email']!='')
{
$ModelCall->where("team_email", $_REQUEST['team_email']);
}
if($_REQUEST['team_mobile_no']!='')
{
$ModelCall->where("team_mobile_no", $_REQUEST['team_mobile_no']);
}
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getEventInfo = $ModelCall->get("tbl_team");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Teams - <?php echo SITENAME;?> admin</title>
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
          <h4 class="page-title">Team Management</h4>
        </div>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_team"><i class="fa fa-plus"></i> Add Team</a>
          <!--<div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>team_management.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Name</label>
            <input type="text" class="form-control floating" id="team_name" name="team_name" value="<?php echo $_REQUEST['team_name'];?>" />
          </div>
        </div>
        
        
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Email</label>
            <input type="text" class="form-control floating" id="team_email" name="team_email" value="<?php echo $_REQUEST['team_email'];?>" />
          </div>
        </div>
        
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Mobile No.</label>
            <input type="text" class="form-control floating" id="team_mobile_no" name="team_mobile_no" value="<?php echo $_REQUEST['team_mobile_no'];?>" />
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Created</th>
                  <th>IP</th>
                  <th>Status</th>
                   <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getEventInfo)>0){ foreach($getEventInfo as $getEventInfoVal){ ?> 
                <tr>
                <td >
                  
                  <a href="" class="avatar" style="text-align:center;">
				  <?php if($getEventInfoVal['team_pic']!=''){ ?> <img class="avatar" src="<?php echo DOMAIN.AdminDirectory;?>events/photo/<?php echo $getEventInfoVal['team_pic'];?>"> <?php } else { ?>
				  <?php echo substr($getEventInfoVal['team_name'],0,1);?>
                  <?php } ?>
                  </a>
                    <h2><?php echo ucwords($getEventInfoVal['team_name']);?> (<?php echo ucwords($getEventInfoVal['team_destination']);?>) </h2></td>
                  <td><?php echo $getEventInfoVal['team_email'];?></td>
                  <td><?php echo $getEventInfoVal['team_mobile_no'];?></td>
                   <td><?php echo $getEventInfoVal['created_date'];?></td>
                    <td><?php echo $getEventInfoVal['created_ip'];?></td>
                   <td> <?php if($getEventInfoVal['status']==1){?> <a href="#" data-toggle="modal" data-target="#deactivate_team<?php echo $getEventInfoVal['id'];?>" class="btn btn-success">Active</a><?php } else { ?> <a href="#" data-toggle="modal" data-target="#activate_team<?php echo $getEventInfoVal['id'];?>" class="btn btn-danger">Inactive</a> <?php } ?> </td>

                   <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_team<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_team<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
                </tr>
                <?php include('edit_team.php'); ?>
    <?php include('delete_team_confirm.php'); ?>
      <?php include('activate_team_confirm.php'); ?>
        <?php include('deactivate_team_confirm.php'); ?>
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
  <?php include('add_team.php'); ?>
  
  
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
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
