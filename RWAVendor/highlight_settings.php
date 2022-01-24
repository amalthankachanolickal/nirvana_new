<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>High Light Events</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
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
        <div class="col-md-8 col-md-offset-2">
          <form  action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpateClientWebsiteSetting1">
            <input type="hidden" name="eid" value="<?php echo $getAdminInfo[0]['id'];?>">
            <h3 class="page-title">High Light Events Details</h3>
          
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
             
              
              
              
              
              
              
              
              
              
              
              
              
              
                
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Content <span class="text-danger"></span></label>
                <textarea class="form-control" name="highlight_content" id="highlight_content" cols="5" rows="4"><?php echo $getAdminInfo[0]['highlight_content'];?></textarea>
                </div>
              </div>
               <div class="col-sm-12">
                <div class="form-group">
                  <label>Web link <span class="text-danger"></span></label>
                <textarea class="form-control" name="web_link" id="web_link" cols="5" rows="1"><?php echo $getAdminInfo[0]['content_web_url'];?></textarea>
                </div>
              </div>
            
            
            <div class="row">
             <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>First Image  <span class="text-danger"></span></label>
                  <input class="form-control"  id="first_client_logo" name="first_client_logo" <?php if($getAdminInfo[0]['first_client_logo']==''){?>  <?php } ?>   type="file">
                  <?php if($getAdminInfo[0]['first_client_logo']!=''){?><br> <img src="<?php echo DOMAIN.AdminDirectory;?>client_logo/<?php echo $getAdminInfo[0]['first_client_logo'];?>" style="width:50%;">
                  <input type="hidden" name="first_client_logoOld" value="<?php echo $getAdminInfo[0]['first_client_logo'];?>">
                  <?php } ?>
                  
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Second Image  <span class="text-danger"></span></label>
                  <input class="form-control"  id="second_client_logo" name="second_client_logo" <?php if($getAdminInfo[0]['second_client_logo']==''){?>  <?php } ?>   type="file">
                  <?php if($getAdminInfo[0]['second_client_logo']!=''){?><br> <img src="<?php echo DOMAIN.AdminDirectory;?>client_logo/<?php echo $getAdminInfo[0]['second_client_logo'];?>" style="width:50%;">
                  <input type="hidden" name="second_client_logoOld" value="<?php echo $getAdminInfo[0]['second_client_logo'];?>">
                  <?php } ?>
                  
                </div>
              </div>
              
              
              </div>
            
            <div class="row">
              <div class="col-sm-12 text-center m-t-20">
                <button type="submit" class="btn btn-primary">Save &amp; update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php include('message_notification.php'); ?>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
