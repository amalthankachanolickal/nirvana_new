<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
        <title>Forgot Password - HRMS admin </title>
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
					<h3 class="account-title">Management Login</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.php"><img src="<?php echo DOMAIN.AdminDirectory;?>assets/img/logo2.png" alt="Php Expert Technologies Pvt. Ltd."></a>
							</div>
							<form>
								<div class="form-group form-focus">
									<label class="control-label">Username or Email</label>
									<input class="form-control floating" type="text">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit">Reset Password</button>
								</div>
								<div class="text-center">
									<a href="login.php">Back to Login</a>
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