<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Payments - HRMS admin</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
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
        <div class="col-sm-8">
          <h4 class="page-title">Payments</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable m-b-0">
              <thead>
                <tr>
                  <th>Invoice ID</th>
                  <th>Client</th>
                  <th>Payment Type</th>
                  <th>Paid Date</th>
                  <th>Paid Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="invoice-view.php">#INV-0001</a></td>
                  <td><h2><a href="#">Global Technologies</a></h2></td>
                  <td>Paypal</td>
                  <td>8 Aug 2017</td>
                  <td>$500</td>
                </tr>
                <tr>
                  <td><a href="invoice-view.php">#INV-0002</a></td>
                  <td><h2><a href="#">Delta Infotech</a></h2></td>
                  <td>Paypal</td>
                  <td>8 Aug 2017</td>
                  <td>$500</td>
                </tr>
                <tr>
                  <td><a href="invoice-view.php">#INV-0003</a></td>
                  <td><h2><a href="#">Cream Inc</a></h2></td>
                  <td>Paypal</td>
                  <td>8 Aug 2017</td>
                  <td>$500</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="notification-box">
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
    </div>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
