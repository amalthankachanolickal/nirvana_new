<?php include('model/class.expert.php');
$ModelCall->where("page_name","aboutus");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getAboutInfo = $ModelCall->get("tbl_cms_management");
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
<title><?php echo $getAboutInfo[0]['meta_title']; ?></title>
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

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
 (adsbygoogle = window.adsbygoogle || []).push({
   google_ad_client: "ca-pub-6246358526663438",
   enable_page_level_ads: true
 });
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
<br>
<br>
<br>
<section id="about" class="about-area section-big">
  <div class="container">
    <div class="row">
      <!-- About Text -->
      <div class="col-md-12">
        <div class="about-text">
          <div class="section-title text-center">
            <h2 class="">About US<br>
              <img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png"></h2>
          </div>
           <?php echo $getAboutInfo[0]['content_data']; ?>
           
           
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Events area ends -->
<!-- Home Banner area starts -->
<!--<section id="about" class="banner-area section-big">
        <div class="container">
    <div class="row">
    <div class="col-md-6">
                <div class="about-services">
<img src="nirwana-img/home-1.png">
                </div>
                </div>
                <div class="col-md-6">
                <div class="about-services">
<img src="nirwana-img/home-1.png">
                </div>
                </div>
            </div>
    </div>
    </section>-->
<!-- Home Banner area end -->
<!-- Footer starts-->
<?php include(ROOTACCESS."HomefooterCall.php");?>

<div id="videoPopup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="margin-top: 0px !important;">&times;</button>
        <h4 class="modal-title" style="text-align: center;" >Welcome <?php echo $getClientInfo[0]['client_company_name'];?></h4>
      </div>
      <div class="modal-body" style="padding:0px;">
        <div class="row">
          <div class="col-lg-12">
          <iframe width="100%" height="350" src="<?php echo $getClientInfo[0]['client_youtube_embed_url'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
        
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
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
<script type="text/javascript">
// A $( document ).ready() block.
$( document ).ready(function() {
  if (document.cookie.indexOf('visited=true') == -1)
  {
    // load the overlay
    $('#videoPopup').modal({show:true});
    
    var year = 1000*60*60*24*365;
    var expires = new Date((new Date()).valueOf() + year);
    document.cookie = "visited=true;expires=" + expires.toUTCString();

  }
}); 


</script>
</body>
</html>
