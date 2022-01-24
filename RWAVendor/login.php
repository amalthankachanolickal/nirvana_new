<?php

include('model/class.expert1.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Login - Admin</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--[if lt IE 9]>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
		<![endif]-->
<style>
     .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: 17px;
  position: relative;
  z-index: 2;
}

 </style>
</head>
<body>
<div class="main-wrapper">
  <div class="account-page">
    <div class="container">
      <h3 class="account-title">RWA Login</h3>
      <div class="account-box">
        <div class="account-wrapper">
          
         <form action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionLoginCall.php" class="form-element"  method="post" enctype="multipart/form-data">
    <input type="hidden" name="ActionCall" value="AdminloginAccessCall">
            <div class="form-group form-focus">
              <label class="control-label">Email</label>
              <input class="form-control floating" type="email" name="adminemail" id="adminemail" value="<?php  if(isset($_COOKIE["cookie_admin_name"])) {echo $_COOKIE["cookie_admin_name"];} ?>" required>
            </div>
            <div class="form-group form-focus">
              <label class="control-label">Password</label>
              <input class="form-control floating" type="password" name="password" id="password" value="<?php  if(isset($_COOKIE["cookie_admin_pass"])) {echo $_COOKIE["cookie_admin_pass"];} ?>" required>
              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["cookie_admin_name"])) { ?> checked <?php } ?> />
		        <label class="text-muted"> &nbsp;&nbsp;Remember me</label>
            </div>
            <div class="form-group">
              <input type="checkbox" checked="checked" required><lable class="text-muted">
                  &nbsp;&nbsp;Yes, I understand and agree to the Nirvana Country <a href="https://www.nirvanacountry.co.in/terms_conditions.php" target="_blank" style="color:Blue" >Terms of Use</a>.
                  </label>
            </div>
            
            <div class="form-group text-center">
              <button class="btn btn-primary" type="submit" id="signin_admin_click">Login</button>
            </div>
            <div class="text-center"> <a href="forgot_password.php" target="_blank" style="color:Blue">Forgot your password?</a> </div>
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


<script>
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>



<!--<?php if(isset($_COOKIE["cookie_admin_name"])) { ?>
<script>
    var button=document.getElementById("signin_admin_click");
    setInterval(function(){ 
        button.click();
     }, 2000);
    
</script>

<?php
}
?>
-->

</body>
</html>
