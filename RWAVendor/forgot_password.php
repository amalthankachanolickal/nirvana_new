<?php include('model/class.expert1.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Forgot Password - Admin</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">

</head>
<body>
<div class="main-wrapper">
  <div class="account-page">
    <div class="container">
      <h3 class="account-title">Forgot Password</h3>
      <div class="account-box">
        <div class="account-wrapper">
          <?php if($_REQUEST['actionResult']=="Success"){?>
                 <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Please check your emailid, Link has been sent to reset your password.
                    </div>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="Failure"){?>
                  <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a >
                    <strong>Sorry!</strong>This Email id  does not exist in our system.
                    </div>
                  <?php } ?>
            <form action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionForgotPassword.php" class="form-element"  method="post" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="Forgotpassword" value="ForgotPassword">
            <div class="form-group form-focus">
              <label class="control-label">Email</label>
              <input class="form-control floating" type="email" name="forgot_email" id="forgot_email" value="" required>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-primary" type="submit">Send Link</button>
            </div>
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
