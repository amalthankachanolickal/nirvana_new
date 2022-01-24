<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-18"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-55877669-18');
</script>
<div class="menu-area navbar-fixed-top">
  <div class="container">
    <div class="row">
      <!-- Navigation starts -->
      <div class="col-md-12">
        <div class="mainmenu">
          <div class="navbar navbar-nobg">
            <div class="navbar-header"> <a class="navbar-brand" href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" alt=""></a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse">
              <nav>
                <ul class="nav navbar-nav navbar-right header-menu">
                  <!-- <li class="active"><a class="smooth_scroll" href="">Home</a></li>-->
                  <li> <a href="<?php echo SITE_URL;?>cms/about-company/" >About Us</a> </li>
                  <?php if($_SESSION['UR_LOGINID']!=''){?>
                  <li><a href="<?php echo SITE_URL;?>">Bills</a></li>
                   <li> <a href="<?php echo SITE_URL;?>notice-board/" >Services</a> </li>
                    <li> <a href="<?php echo SITE_URL;?>document/" >Documents</a> </li>
                  <?php } else {?>
                  <li> <a href="<?php echo SITE_URL;?>account/login/">Bills</a></li>
                    <li> <a href="<?php echo SITE_URL;?>account/login/" >Services</a> </li>
                    <li> <a href="<?php echo SITE_URL;?>account/login/" >Documents</a> </li>
                  <?php } ?>
                 
                  <li><a class="smooth_scroll" href="#contact-us">Contact Us</a></li>
                  <!-- <li><a class="smooth_scroll" href="">Media</a></li>
                                        <li><a class="smooth_scroll" href="">Services</a></li>
                                        <li><a class="smooth_scroll" href="">Discussions</a></li>-->
                  <?php if($_SESSION['UR_LOGINID']!=''){?>
                  <li><a href="<?php echo SITE_URL;?>feed/timeline&u=<?php echo $_SESSION['UR_LOGINNAME'];?>" class="log" id="navbar-sign-in">Hi <?php echo $_SESSION['UR_LOGINNAME'];?></a></li>
                  <li><a href="<?php echo SITE_URL;?>logout.php" class="log" onclick="return confirm('Are you sure you want to logout now ?')" id="navbar-sign-in">Logout</a></li>
                  <?php } else { ?>
                  <li><a href="<?php echo SITE_URL;?>account/login/" class="log" id="navbar-sign-in">Sign In / Sign Up</a></li>
                  <?php } ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Navigation ends -->
    </div>
  </div>
</div>
