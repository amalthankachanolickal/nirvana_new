<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Edit Profile - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
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
             <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-sm-8">
          <h4 class="page-title">Edit Profile</h4>
        </div>
      </div>
      <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="EditUpdateAdmin">
          <input type="hidden" name="eid" value="<?php echo $getAdminSubInfo[0]['id'];?>">
        <div class="card-box">
          <h3 class="card-title">Basic Informations</h3>
          <div class="row">
            <div class="col-md-12">
              <div class="profile-img-wrap"> 
              <?php if($getAdminSubInfo[0]['profile_image']!=''){?>
              <img class="inline-block" src="<?php echo DOMAIN.AdminDirectory;?>client_logo/<?php echo $getAdminSubInfo[0]['profile_image'];?>" alt="user">
               <input type="hidden" name="AdminImageOld" value="<?php echo $getAdminSubInfo[0]['profile_image'];?>">
              <?php } else { ?>
               <img class="inline-block" src="<?php echo DOMAIN.AdminDirectory;?>assets/img/user.jpg" alt="user">
              <?php } ?>
              
                <div class="fileupload btn btn-default"> <span class="btn-text">edit</span>
                  <input class="upload" id="AdminImage" name="AdminImage" type="file">
                </div>
              </div>
              <div class="profile-basic">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Name <span class="text-danger">*</span></label>
                    <input class="form-control" name="adminName" id="adminName" required value="<?php echo $getAdminSubInfo[0]['client_name'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Email <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="adminemail" id="adminemail" required value="<?php echo $getAdminSubInfo[0]['client_email'];?>" type="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Mobile No. <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="adminMobile" id="adminMobile" maxlength="12" required value="<?php echo $getAdminSubInfo[0]['client_mobile'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Password <span class="text-danger">*</span></label>
                    <input class="form-control" name="password" id="password" required value="" type="text">
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="text-center m-t-20">
          <button class="btn btn-primary btn-lg" type="submit">Save &amp; update</button>
        </div>
      </form>
    </div>
     <?php include('message_notification.php'); ?>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
