<?php include('model/class.expert1.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Login - Admin | NRWA </title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body>
<div class="main-wrapper">
  <div class="account-page">
    <div class="container">
      <h3 class="account-title">Vendor Login</h3>
      <div class="account-box">
        <div class="account-wrapper">
          <div class="account-logo"> <a href="<?php echo DOMAIN.AdminDirectory;?>"><img src="<?php echo DOMAIN;?>/nirwana-img/home-logo.png"  style="margin-top: -20px;" ></a> </div>
         <form action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionLoginCall.php" class="form-element"  method="post" enctype="multipart/form-data">
    <input type="hidden" name="ActionCall" value="AdminloginAccessCall">
            <div class="form-group form-focus">
              <label class="control-label">Email</label>
              <input class="form-control floating" type="email" name="adminemail" id="adminemail" value="" required>
            </div>
            <div class="form-group form-focus">
              <label class="control-label">Password</label>
              <input class="form-control floating" type="password" name="password" id="password" value="" required>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
            </div>
            <!--<div class="text-center"> <a href="forgot-password.html">Forgot your password?</a> </div>-->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
