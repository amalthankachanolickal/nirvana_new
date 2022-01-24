<?php include('model/class.expert.php');
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getNoticeInfo = $ModelCall->get("tbl_notice_post");
//include('CheckCustomerLogin.php');
?>
<!DOCTYPE html>
<html>
<head>
<!-- meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"       content="width=device-width, initial-scale=1.0">
<meta name="description"    content="">
<meta name="keywords"       content="">
<meta name="author"         content="">
<!-- Site title -->
<title>Notice Board</title>
<meta name="keywords" content="<?php echo $getAboutInfo[0]['meta_keyword']; ?>"/>
<meta name="description" content="<?php echo $getAboutInfo[0]['meta_description']; ?>"/>

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.png">
<!-- Bootstrap css -->
<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
<!--Font Awesome css -->
<link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">
<!-- Owl Carousel css -->
<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">
<!-- Site css -->
<link href="<?php echo SITE_URL;?>assets/css/home-style.css" rel="stylesheet">
<!-- Responsive css -->
<link href="<?php echo SITE_URL;?>assets/css/responsive.css" rel="stylesheet">
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>



</head>
<body>
<!-- Navigation area starts -->
<?php include(ROOTACCESS."front_header.php");?>
<!-- Navigation area ends -->
<div class="clearfix"></div>
<!-- Slider area starts -->

<!-- Slider area ends -->
<!-- Home Banner area starts -->

<!-- Home Banner area end -->
<!-- About area starts -->
<br><br><br>
<section id="about" class="about-area section-big">
  <div class="container">
    <div class="row">
      <!-- About Text -->
      <div class="col-md-12">
        <div class="about-text">
          <div class="section-title text-center">
            <h2 class="">Services<br>
              <img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png"></h2>
          </div>
        <div class="notice">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php if($getNoticeInfo[0]>0){ foreach($getNoticeInfo as $getNoticeInfoVal){ 
$FindYears = trim($getNoticeInfoVal['created_date']);
$GetYears = date("Y", strtotime($FindYears));

$FindMonth = trim($getNoticeInfoVal['created_date']);
$GetMonths = date("M", strtotime($FindMonth));


$FindDay = trim($getNoticeInfoVal['created_date']);
$GetDay = date("d", strtotime($FindDay));


?>
<div class="notice-wrap">
<div class="event_date">
<div class="event-date-wrap">
<p><?php echo $GetDay;?></p>
<span><?php echo $GetMonths;?> <?php echo $GetYears;?></span>
</div>
</div>
<div class="date-description">
<h3><?php echo ucwords($getNoticeInfoVal['notice_title']);?></h3>
<p><?php echo ucwords($getNoticeInfoVal['notice_content']);?> <?php if($getNoticeInfoVal['notice_file']!=''){?><a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['notice_file'];?>" target="_blank"> <i class="fa fa-download"></i> Download</a> <?php } ?></p>
</div>
</div>
<?php } } else {?>
<p>There is no any notice posted yet</p>
<?php } ?>












</div>
</div>
</div>
</div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer starts-->
<?php include(ROOTACCESS."HomefooterCall.php");?>

<!-- copyright area ends -->
<!-- Latest jQuery -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>
<!-- Owl Carousel js -->
<script src="<?php echo SITE_URL;?>assets/js/owl.carousel.min.js"></script>
<!-- Mixitup js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.mixitup.js"></script>
<!-- Magnific popup js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- Waypoint js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.waypoints.min.js"></script>
<!-- Ajax Mailchimp js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.ajaxchimp.min.js"></script>
<!-- Main js-->
<script src="<?php echo SITE_URL;?>assets/js/main_script.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>
