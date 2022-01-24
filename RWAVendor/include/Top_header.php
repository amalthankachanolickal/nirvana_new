<?php $_SESSION['current_page'] = $_SERVER['REQUEST_URI']; ?>
<div class="header">
  <div class="header-left"> <a href="index.php" class="logo"> <img src="<?php echo DOMAIN.AdminDirectory;?>client_logo/<?php echo $getAdminInfo[0]['client_logo'];?>" width="" height="" alt="" style="margin-top: -7px; width:100px;"> </a> </div>
 <!-- <div class="page-title-box pull-left">
    <h3><?php echo $getAdminInfo[0]['client_company_name'];?></h3>
  </div>-->
  <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
  <ul class="nav navbar-nav navbar-right user-menu pull-right">
<?php /*?>    <li class="dropdown hidden-xs"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-purple pull-right">0</span></a>
      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header"> <span>Notifications</span> </div>
        <div class="drop-scroll">
          <ul class="media-list">
            <li class="media notification-message"> <a href="activities.php">
              <div class="media-left"> <span class="avatar"> <img alt="John Doe" src="<?php echo DOMAIN.AdminDirectory;?>assets/img/user.jpg" class="img-responsive img-circle"> </span> </div>
              <div class="media-body">
                <p class="m-0 noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                <p class="m-0"><span class="notification-time">4 mins ago</span></p>
              </div>
              </a> </li>
            <li class="media notification-message"> <a href="activities.php">
              <div class="media-left"> <span class="avatar">V</span> </div>
              <div class="media-body">
                <p class="m-0 noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                <p class="m-0"><span class="notification-time">6 mins ago</span></p>
              </div>
              </a> </li>
            <li class="media notification-message"> <a href="activities.php">
              <div class="media-left"> <span class="avatar">L</span> </div>
              <div class="media-body">
                <p class="m-0 noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                <p class="m-0"><span class="notification-time">8 mins ago</span></p>
              </div>
              </a> </li>
            <li class="media notification-message"> <a href="activities.php">
              <div class="media-left"> <span class="avatar">G</span> </div>
              <div class="media-body">
                <p class="m-0 noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                <p class="m-0"><span class="notification-time">12 mins ago</span></p>
              </div>
              </a> </li>
            <li class="media notification-message"> <a href="activities.php">
              <div class="media-left"> <span class="avatar">V</span> </div>
              <div class="media-body">
                <p class="m-0 noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                <p class="m-0"><span class="notification-time">2 days ago</span></p>
              </div>
              </a> </li>
          </ul>
        </div>
        <div class="topnav-dropdown-footer"> <a href="activities.php">View all Notifications</a> </div>
      </div>
    </li><?php */?>
    <!--<li class="dropdown hidden-xs"> <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span class="badge bg-purple pull-right">8</span></a> </li>-->
    <li class="dropdown"> <a href="profile.php" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin"> <span class="user-img">
    
    <?php if($getAdminSubInfo[0]['profile_image']!=''){?>
              <img class="img-circle" src="<?php echo DOMAIN.AdminDirectory;?>client_logo/<?php echo $getAdminSubInfo[0]['profile_image'];?>" width="40" alt="Admin">
              <?php } else { ?>
               <img class="img-circle" src="<?php echo DOMAIN.AdminDirectory;?>assets/img/user.jpg" width="40" alt="Admin"> 
              <?php } ?>
   
    
    
    <span class="status online"></span></span> <span><?php echo $getAdminSubInfo[0]['client_name'];?></span> <i class="caret"></i> </a>
      <ul class="dropdown-menu">
         <li><a href="<?php echo DOMAIN.AdminDirectory;?>edit-profile.php">My Profile</a></li>
      <li><a href="<?php echo DOMAIN.AdminDirectory;?>change-password.php">Change Password</a></li>
      <li><a href="<?php echo DOMAIN.AdminDirectory;?>logout.php">Logout</a></li>
      </ul>
    </li>
  </ul>
  <div class="dropdown mobile-user-menu pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <ul class="dropdown-menu pull-right">
      <li><a href="<?php echo DOMAIN.AdminDirectory;?>edit-profile.php">My Profile</a></li>
      <li><a href="<?php echo DOMAIN.AdminDirectory;?>change-password.php">Change Password</a></li>
      <li><a href="<?php echo DOMAIN.AdminDirectory;?>logout.php">Logout</a></li>
    </ul>
  </div>
</div>
