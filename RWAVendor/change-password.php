<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Change Password</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
		<![endif]-->
    <script type="text/javascript">
    function confirmPass() {
        var pass = document.getElementById("newpassword").value
        var confPass = document.getElementById("confirmpassword").value
        if(pass != confPass) {
            alert('Wrong confirm password !');
		  	document.getElementById("confirmpassword").value="";
        return false;
        }else{
          document.form1.submit();
        }
    }
    </script>
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h4 class="page-title">Change Password</h4>
          <form action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionLoginCall.php" class="form-element" name="form1" method="post" enctype="multipart/form-data">
           <input type="hidden" name="adminemail" value="<?php echo $getAdminSubInfo[0]['client_email'];?>">
           <input type="hidden" name="ActionCall" value="PasswordChange">
           <?php if(isset($_SESSION['error']) && $_SESSION['error']!=""){?>
                <p style="color:red"><?php echo $_SESSION['error'];?> </p>
        
           <?php  unset($_SESSION['error']); }?>
           <?php if(isset($_SESSION['Message']) && $_SESSION['Message']!=""){?>
                <p style="color:green"><?php echo $_SESSION['Message'];?> </p>
        
           <?php  unset($_SESSION['Message']); }?>
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Old password</label>
                  <input type="password"  name="oldpassword" id="oldpassword"  class="form-control"  required/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                  <label>New password</label>
                  <input type="password"  name="newpassword"  id="newpassword" class="form-control" required/>
                </div>
              </div>
              <div class="col-xs-12  col-sm-6">
                <div class="form-group">
                  <label>Confirm password</label>
                  <input type="password"  name="confirmpassword"  id="confirmpassword" class="form-control" required/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-center m-t-20">
                <button type="button" class="btn btn-primary" onclick="confirmPass();">Update Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- <div class="notification-box">
      <div class="msg-sidebar notifications msg-noti">
        <div class="topnav-dropdown-header"> <span>Messages</span> </div>
        <div class="drop-scroll msg-list-scroll">
          <ul class="list-box">
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">R</span> </div>
                <div class="list-body"> <span class="message-author">Richard Miles </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item new-message">
                <div class="list-left"> <span class="avatar">J</span> </div>
                <div class="list-body"> <span class="message-author">John Doe</span> <span class="message-time">1 Aug</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">T</span> </div>
                <div class="list-body"> <span class="message-author"> Tarah Shropshire </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">M</span> </div>
                <div class="list-body"> <span class="message-author">Mike Litorus</span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">C</span> </div>
                <div class="list-body"> <span class="message-author"> Catherine Manseau </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">D</span> </div>
                <div class="list-body"> <span class="message-author"> Domenic Houston </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">B</span> </div>
                <div class="list-body"> <span class="message-author"> Buster Wigton </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">R</span> </div>
                <div class="list-body"> <span class="message-author"> Rolland Webber </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">C</span> </div>
                <div class="list-body"> <span class="message-author"> Claire Mapes </span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">M</span> </div>
                <div class="list-body"> <span class="message-author">Melita Faucher</span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">J</span> </div>
                <div class="list-body"> <span class="message-author">Jeffery Lalor</span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">L</span> </div>
                <div class="list-body"> <span class="message-author">Loren Gatlin</span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
            <li> <a href="chat.php">
              <div class="list-item">
                <div class="list-left"> <span class="avatar">T</span> </div>
                <div class="list-body"> <span class="message-author">Tarah Shropshire</span> <span class="message-time">12:28 AM</span>
                  <div class="clearfix"></div>
                  <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span> </div>
              </div>
              </a> </li>
          </ul>
        </div>
        <div class="topnav-dropdown-footer"> <a href="chat.php">See all messages</a> </div>
      </div>
    </div> -->
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
