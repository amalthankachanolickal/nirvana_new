<?php include('model/class.expert1.php'); ?>
<?php
$Email = $_GET["email"];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Reset Password - Admin</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">

</head>
<body>
<div class="main-wrapper">
  <div class="account-page">
    <div class="container">
      <h3 class="account-title">Reset Password</h3>
      <div class="account-box">
        <div class="account-wrapper">
         
            <form action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionResetPassword.php" class="form-element"  method="post" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="Resetpassword" value="ResetPassword">
                    
            <div class="form-group form-focus">
              <label class="control-label">Email</label>
             <input type="email" name="emailid" class="form-control floating" id="emailid" value="<?php echo $Email?>" readonly>
            </div>
            <div class="form-group form-focus">
              <label class="control-label">Password</label>
              <input class="form-control floating" type="password" name="password" minlength="8" maxlength="12" id="password" value="" required>
            </div>
            <div class="form-group form-focus">
              <label class="control-label">Confirm Password</label>
              <input class="form-control floating" type="password" name="re_password" minlength="8" maxlength="12" id="re_password" value="" required>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-primary" type="submit">Reset</button>
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