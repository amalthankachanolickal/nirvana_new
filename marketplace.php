<?php include('model/class.expert.php');
if($_SESSION['service_state_id']!='')
{
$ModelCall->where("service_state_id", $_SESSION['service_state_id']);
}
if($_SESSION['service_city_id']!='')
{
$ModelCall->where("service_city_id", $_SESSION['service_city_id']);
}
if($_SESSION['catgeory_id']!='')
{
$ModelCall->where("catgeory_id", $_SESSION['catgeory_id']);
}
$ModelCall->where("status","1");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getMarketPlaceInfo = $ModelCall->get("tbl_service_bazzar");
include('CheckCustomerLogin.php');
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
<title>Marketplace</title>
<meta name="keywords" content="<?php echo $getAboutInfo[0]['meta_keyword']; ?>"/>
<meta name="description" content="<?php echo $getAboutInfo[0]['meta_description']; ?>"/>

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.png">
<!-- Bootstrap css -->
<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo SITE_URL;?>css/flaticon.css" rel="stylesheet">
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
            <h2 class="">Marketplace<br>
              <img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png"></h2>
          </div>
        
        <div class="listing-section content-area">
    <div class="container">
        <div class="row">
        <?php include('leftsideMarketplace.php'); ?>
        <?php include('marketplace_listing.php'); ?>    
            
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
<script type="text/javascript">
function getCities(str)
{
//alert(str);
   if(str=="")
      alert("Please select any state");
	else
     var ajx;  // The variable that makes Ajax possible!
	
	if(window.XMLHttpRequest)
	ajx=new XMLHttpRequest();
	ajx.onreadystatechange = function()
	{

		if(ajx.readyState == 4)
		{
		//alert(ajx.responseText);	
                document.getElementById("service_city_id").innerHTML= ajx.responseText;
		}
	}
	ajx.open("GET", "<?php echo SITE_URL;?>getFrontCity.php?service_state_id="+str);
	ajx.send(); 

}

</script>
<script type="text/javascript">
function getSubcategory(str)
{
   if(str=="")
      alert("Please select any category");
	else
     var ajx;  // The variable that makes Ajax possible!
	
	if(window.XMLHttpRequest)
	ajx=new XMLHttpRequest();
	ajx.onreadystatechange = function()
	{

		if(ajx.readyState == 4)
		{
		//alert(ajx.responseText);	
                document.getElementById("catgeory_sub_id").innerHTML= ajx.responseText;
		}
	}
	ajx.open("GET", "<?php echo SITE_URL;?>getFrontSubCategory.php?catgeory_id="+str);
	ajx.send(); 

}

</script>

</body>
</html>


