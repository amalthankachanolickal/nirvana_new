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
          <input type="hidden" name="ActionCall" value="sending_emails">
            <input type="hidden" name="eid" value="<?php echo $getAdminInfo[0]['id'];?>">
               <h3 class="page-title">Send mail to multiple users</h3>
                <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="mail_notification">
    <option value="0">None</option>
    <option value="1">All</option>
    <option value="2">Active</option>

    <option value="3">Deavtived</option>
     <option value="4">Sussepended</option>
  
    
  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Mail Type <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="mail_notification1">
    <option value="formate1">User Info</option>
    <option value="formate2">Verify Email ID</option>
    <option value="formate3">Inform Admin Approved</option>
    <option value="formate4">Custom Email</option>

  
    
  </select>
                </div>
              </div>
      <div class="col-lg-12 no-pdd" id="onlyaplfortenant">
                <div class="form-group">
                  <label>Subject <span class="text-danger"></span></label>
                <input class="form-control" name="subject" id="subject" ></input>
                </div>
              </div>
               
              <div class="col-lg-12 no-pdd" id="onlyaplfortenant2">
                <div class="form-group">
                  <label class="control-label">Mail Content <span class="text-danger">*</span></label>
                       <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                </div>
              </div>
            
            
            <div class="row">
            <div class="col-lg-12 no-pdd" id="onlyaplfortenant3">
                <div class="form-group">
                  <label>Attechment  <span class="text-danger"></span></label>
                  <input class="form-control"  id="first_client_logo" name="first_client_logo" <?php if($getAdminInfo[0]['first_client_logo']==''){?>  <?php } ?>   type="file">
                
                  
                </div>
              </div>
             </div>
            
            <div class="row">
              <div class="col-sm-12 text-center m-t-20">
                <button type="submit" class="btn btn-primary">Send Email</button>
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
<script>
    $("#sel2").change(function() {
  if ($(this).val() == "formate4") {
    $('#onlyaplfortenant').show();
    $('#subject').attr('required', '');
    $('#subject').attr('data-error', 'This field is required.');
    $('#onlyaplfortenant2').show();
    $('#content').attr('required', '');
    $('#content').attr('data-error', 'This field is required.');
      $('#onlyaplfortenant3').show();
    $('#content').attr('required', '');
    $('#content').attr('data-error', 'This field is required.');

  } 
  else {
    $('#onlyaplfortenant').hide();
    $('#subject').removeAttr('required');
    $('#subject').removeAttr('data-error');
    $('#onlyaplfortenant2').hide();
    $('#content').removeAttr('required');
    $('#content').removeAttr('data-error');
       $('#onlyaplfortenant3').hide();
    $('#content').removeAttr('required');
    $('#content').removeAttr('data-error');

  }

  

});
$("#sel2").trigger("change");
    
</script>
</body>



</html>

