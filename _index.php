<?php include('model/class.expert.php');



$ModelCall->where("page_name","aboutus");

$ModelCall->where("client_id", $getClientInfo[0]['id']);

$ModelCall->orderBy("id","desc");

$getAboutUsInfo = $ModelCall->get("tbl_cms_management");



$ModelCall->where("page_name","discussion-forum");

$ModelCall->where("client_id", $getClientInfo[0]['id']);

$ModelCall->orderBy("id","desc");

$getDiscussionInfo = $ModelCall->get("tbl_cms_management");





$indexvalues = $ModelCall->get("tbl_ads_index");

$getAdminInfo = $ModelCall->get("tbl_clients");



$ModelCall->where("ads_banner_size ='728X90'");

$ModelCall->where("ads_banner_position ='Top'");

$ModelCall->where("status",1);

$ModelCall->orderBy("RAND()");

$getBannerShow = $ModelCall->get("tbl_ads_management_directory");





$ModelCall->where("ads_banner_size ='728X90'");

$ModelCall->where("ads_banner_position ='Bottom'");

$ModelCall->where("status",1);

$ModelCall->orderBy("RAND()");

$getBannerShow1 = $ModelCall->get("tbl_ads_management_directory");



$ModelCall->where("status",1);

$getAdvertise = $ModelCall->get("tbl_adervitiser_module");

$i=0;

foreach($getAdvertise as $arrays){

if($arrays['image']!=""){

$images[$i]="https://www.nirvanacountry.co.in/RWAVendor/ads_managements/photos/".$arrays['image'];

if($arrays['contact']!=''){

$url[$i]="tel:".$arrays['contact'];

}

else{

$url[$i]="https://".$arrays['url'];

}





$i++;

}

}





?>

<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- meta -->



<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport"       content="width=device-width, initial-scale=1.0">

<meta name="description"    content="">

<meta name="keywords"       content="">

<meta name="author"         content="">

<!-- Site title -->

<title>Nirvana</title>

<!-- favicon -->

<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico">

<!-- Bootstrap css -->

<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">

<!--Font Awesome css -->

<link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">

<!-- Owl Carousel css -->

<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">

<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">

<!-- Site css -->

<link href="<?php echo SITE_URL;?>assets/css/home-style.css" rel="stylesheet">

<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">

<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">

<link rel="apple-touch-icon" sizes="180x180" href="./pwaise/apple-touch-icon.png">

<link rel="icon" type="image/png" sizes="32x32" href="./pwaise/favicon-32x32.png">

<link rel="icon" type="image/png" sizes="16x16" href="./pwaise/favicon-16x16.png">

<link rel="apple-touch-icon" sizes="57x57" href="./pwaise/apple-icon-57x57.png">

<link rel="apple-touch-icon" sizes="60x60" href="./pwaise/apple-icon-60x60.png">

<link rel="apple-touch-icon" sizes="72x72" href="./pwaise/apple-icon-72x72.png">

<link rel="apple-touch-icon" sizes="76x76" href="./pwaise/apple-icon-76x76.png">

<link rel="apple-touch-icon" sizes="114x114" href="./pwaise/apple-icon-114x114.png">

<link rel="apple-touch-icon" sizes="120x120" href="./pwaise/apple-icon-120x120.png">

<link rel="apple-touch-icon" sizes="144x144" href="./pwaise/apple-icon-144x144.png">

<link rel="apple-touch-icon" sizes="152x152" href="./pwaise/apple-icon-152x152.png">

<link rel="apple-touch-icon" sizes="180x180" href="./pwaise/apple-icon-180x180.png">

<link rel="icon" type="image/png" sizes="192x192"  href="./pwaise/android-icon-192x192.png">

<link rel="icon" type="image/png" sizes="32x32" href="./pwaise/favicon-32x32.png">

<link rel="icon" type="image/png" sizes="96x96" href="./pwaise/favicon-96x96.png">

<link rel="icon" type="image/png" sizes="16x16" href="./pwaise/favicon-16x16.png">

<meta name="msapplication-TileColor" content="#ffffff">

<meta name="msapplication-TileImage" content="./pwaise/ms-icon-144x144.png">

<meta name="theme-color" content="#ffffff">

<link rel="manifest" href="<?php echo SITE_URL;?>/manifest.json">

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

<script>

if ('serviceWorker' in navigator) {

  navigator.serviceWorker.register('./service-worker.js');

}



</script>

<script data-ad-client="ca-pub-6246358526663438" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>



<script type = "text/javascript">

var i = 0; 			// Start Point

//var k1="<?php echo $indexvalues[0]['first_index']?>";



var images = <?php echo json_encode($images); ?>;	// Images Array

var k1=getRandomArbitrary(0, images.length-1);

var url = <?php echo json_encode($url); ?>;

var time = 5000;	// Time Between Switch

	var adsvisible ='';

// Image List

//images[0] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";

//images[1] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Garima.jpg";



//images[2] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";

//images[3] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Screenshot (32).png";



function getRandomArbitrary(min, max) {

  //alert(Math.floor(Math.random() * (max - min + 1)) + min);

  return Math.floor(Math.random() * (max - min + 1)) + min;

}




// Change Image

function changeImg(){

    

	document.slide.src = images[k1];

  adsvisible = adsvisible + images[k1] + ',';

    document.getElementById("image_url").href = url[k1];

    k1= getRandomArbitrary(0, images.length -1);

	// Run function every x seconds

	setTimeout("changeImg()", time);

}



// Run function when page loads

window.onload=changeImg;

    </script>



    





    

<style type="text/css">

.section-big {

    padding: 30px 0px;

}

</style>

<style>

.example1 {

 height: 50px;	

 overflow: hidden;

 position: relative;

}







.example1 h3 {

 font-size: 20px;

 color: limegreen;

 position: absolute;

 width: 100%;

 height: 100%;

 margin: 0;

 line-height: 50px;

 text-align: center;

 /* Starting position */

 -moz-transform:translateX(100%);

 -webkit-transform:translateX(100%);	

 transform:translateX(100%);

 /* Apply animation to this element */	

 -moz-animation: example1 15s linear infinite;

 -webkit-animation: example1 15s linear infinite;

 animation: example1 15s linear infinite;

}

/* Move it (define the animation) */

@-moz-keyframes example1 {

 0%   { -moz-transform: translateX(100%); }

 100% { -moz-transform: translateX(-100%); }

}

@-webkit-keyframes example1 {

 0%   { -webkit-transform: translateX(100%); }

 100% { -webkit-transform: translateX(-100%); }

}

@keyframes example1 {

 0%   { 

 -moz-transform: translateX(100%); /* Firefox bug fix */

 -webkit-transform: translateX(100%); /* Firefox bug fix */

 transform: translateX(100%); 		

 }

 100% { 

 -moz-transform: translateX(-100%); /* Firefox bug fix */

 -webkit-transform: translateX(-100%); /* Firefox bug fix */

 transform: translateX(-100%); 

 }

}



@media (max-width:600px) {

  #image_url1 img{

    display: none;

  }

}

</style>





</head>

<body>

<!-- Navigation area starts -->

<?php include(ROOTACCESS."front_header.php");?>

<!-- Navigation area ends -->

<div class="clearfix"></div>

<!-- Slider area starts -->

<section id="slider">

  <div id="carousel-example-generic" class="carousel slide carousel-fade">

    <div class="carousel-inner" role="listbox">

    

<?php 

$tabactivateMe=1; 

$ModelCall->where("client_id", $getClientInfo[0]['id']);

$ModelCall->where("status",1);	   

$ModelCall->orderBy("id","desc");

$HomeSliderBanner = $ModelCall->get("tbl_home_flash_banner");

if($HomeSliderBanner[0]>0){

foreach($HomeSliderBanner as $HomeSliderBannerVal)

{

if(is_array($HomeSliderBannerVal)){

?>

<div class="item <?php if($tabactivateMe==1){?> active <?php } ?>"> <img src="<?php echo SITE_URL.MAINADMIN;?>homesliders/<?php echo $HomeSliderBannerVal['banner_image'];?>" class="slide-img" alt="">

        <div class="carousel-caption">

          <div class="intro-text">

            <div class="title clearfix">

              <h3><?php echo ucwords($HomeSliderBannerVal['banner_title']);?></h3>

              <p><?php echo ucwords($HomeSliderBannerVal['banner_content']);?></p>

            </div>

            <!-- <a href="" class="" style=""><img src="nirwana-img/vedio-btn.png"></a>-->

          </div>

        </div>

      </div>

      

      <?php 

$tabactivateMe++;

} } } ?>  

      <!-- Item 1 -->

      

      <!-- Item 2 -->

      

      <!-- Item 3 -->

      

      <a class="left welcome-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i></a> <a class="right welcome-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right"></i></a> </div>

    <!-- End Wrapper for slides-->

  </div>

  

  <div id="wrapper">

			<div class="adBar">

				&nbsp;

			</div>

		</div>

	

</section>

<section>

  <div class="metest" style="display: inline; width:fit-content;

   ">

          <div class="row">

        <marquee  scrollamount="13" scrolldelay="1" behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">

            <?php if($getAdminInfo[0]['content_web_url']){?><a href="<?php echo $getAdminInfo[0]['content_web_url']?>"> <?php }?>

        <h3 style="font-size: 20px; color: limegreen;"><?php echo $getAdminInfo[0]['highlight_content']?> </h3>

    </marquee>

   </div>

</section>

<!-- Slider area ends -->

<!-- Home Banner area starts -->





<?php /*?><?php if($getClientInfo[0]['highlight_content']!=''){ ?>

<section id="about" class="banner-area section-big">

  <div class="container">

    <div class="row">

      <div class="about-services clearfix">

      <?php if($getClientInfo[0]['first_client_logo']!=''){ ?>

        <div class="col-md-3" style="padding:0;"> <img src="<?php echo SITE_URL.MAINADMIN;?>client_logo/<?php echo $getClientInfo[0]['first_client_logo'];?>"> </div>

        <?php } ?>

        <div class="col-md-6 text-center">

         

          <div class="mark-title"><?php echo $getClientInfo[0]['highlight_content']; ?></div> 

               </div>

         <?php if($getClientInfo[0]['second_client_logo']!=''){ ?>      

        <div class="col-md-3" style="padding:0;"> <img src="<?php echo SITE_URL.MAINADMIN;?>client_logo/<?php echo $getClientInfo[0]['second_client_logo'];?>"> </div>

        <?php } ?>

      </div>

    </div>

  </div>

</section>

<?php } ?><?php */?>

<!-- Home Banner area end -->

<!-- About area starts 

<section id="about" class="about-area section-big" style='padding: 30px 0;'>

  <div class="container">

    <div class="row">

      <!-- About Text 

      <div class="col-md-12">

        <div class="about-text">

          <div class="section-title text-center">

            <h2 class="">About Us<br>

             <!-- <img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png"></h2>

          </div>

          <h4 class="">Summary</h4> 

          

          <?php echo substr($getAboutUsInfo[0]['content_data'],0,258); ?>

          <div class="collapse" id="viewdetails">

          <?php echo substr($getAboutUsInfo[0]['content_data'],258,3000); ?>

          </div>

          <p class="text-center"> <a class="btn btn-active" data-toggle="collapse" data-target="#viewdetails">Know more <i class="fa fa-angle-right" aria-hidden="true"></i></a> </p>

        </div>

      </div>

    </div>

  </div>

</section>

<section id="service" class="service-area section-big">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="section-title text-center">

          <h2 class="">COMMUNITY <span>FORUM</span><!--<img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png"></h2>

        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-md-6">

        <div class="about-text">

           <?php echo $getDiscussionInfo[0]['content_data']; ?>

          <p class="text-left"> 

   <?php if($_SESSION['UR_LOGINID']!=''){?>  

  <a href="<?php echo SITE_URL;?>feed/" class="btn btn-active">Start Discussion <i class="fa fa-angle-right" aria-hidden="true"></i></a>

  <?php } else {?>

   <a href="<?php echo SITE_URL;?>account/create/" class="btn btn-active">Start Discussion <i class="fa fa-angle-right" aria-hidden="true"></i></a>

  <?php } ?> 

          </p>

         <!-- <p style="margin-top:60px;"><img src="https://www.justfoodz.com/images/no-banner-728x90s.jpg" style="width:728px; height:90px;"></p>

        </div>

      </div>

      <div class="col-md-6">

        <div class="cumminty-left-section"> <img src="<?php echo SITE_URL;?>nirwana-img/cummunity-img.png"> </div>

      </div>

    </div>

  </div>

</section>

<!-- About area ends -->



<?php 

$ModelCall->where("client_id", $getClientInfo[0]['id']);

$ModelCall->where("status",1);	   

$ModelCall->orderBy("id","desc");

$HomeEvents = $ModelCall->get("tbl_events");

if($HomeEvents[0]>0){ ?>

<!-- Events area starts -->

<?php if($_REQUEST['actionResult']!='') { include('RWAVendor/messageDisplay.php'); }?>

<section id="team" class="team-area section-big">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="section-title text-center">

          <h2>EVENTS<br>

           <!-- <img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png">--></h2>

        </div>

      </div>

    </div>

    <div class="row">

      <div class="team-slide">

    <?php 

foreach($HomeEvents as $HomeEventsVal)

{

if(is_array($HomeEventsVal)){

$ModelCall->where("eid",$HomeEventsVal['id']);

$getimage = $ModelCall->get("tbl_event_photo");

$getDay = strtotime($HomeEventsVal['event_date']);

$DayDisplay = date('d', $getDay);

?>   

        <div class="team-member">

          <div class="member-image"> 

         <?php if($_SESSION['UR_LOGINID']!='')

         { ?>

             <a href="event.php?eid=<?php echo $HomeEventsVal['id'];?>">

             <?php } 

             else

             { ?>

             <a href="event.php?eid=<?php echo $HomeEventsVal['id'];?>">

             <?php }

             ?>

             

             <img src="<?php echo SITE_URL.MAINADMIN;?>events/photo/<?php echo $getimage[0]['image'];?>" alt=""></a> </div>

          <div class="single-news">

            <div class="news-image">

              <div class="news-date">

                <p><?php echo ucwords($DayDisplay);?><span style="display:block;"><?php echo substr($HomeEventsVal['event_month'],0,3);?></span></p>

              </div>

            </div>

            <div class="news-content">

             <?php if($_SESSION['UR_LOGINID']!='')

                { ?>

            <a href="event.php?eid=<?php echo $HomeEventsVal['id'];?>" >

            <?php } 

             else

             { ?>

              <a href="event.php?eid=<?php echo $HomeEventsVal['id'];?>" >

             <?php }

             ?>

              <h3 class="subtitle"><?php echo ucwords($HomeEventsVal['event_name']);?></h3>

              </a>

              <p class="news-meta text-muted" style="margin-bottom:0;"> <span><i class="fa fa-calendar"></i> <?php echo ucwords($HomeEventsVal['event_time']);?> </span> </p>

            </div>

          </div>

        </div>

        

 <?php } } ?>       

        

        

      </div>

    </div>

  </div>

</section>

<!-- Events area ends -->

<?php } ?>





<?php if($_REQUEST['actionResult'] == 'paymentSuccessful') { ?>  <?php



echo '<script type="text/javascript">



          window.onload = function () { alert("Payment is Successful!!"); }



</script>';



sleep(1);



header("location: ".SITE_URL);



?> <?php } ?>









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

<!-- AMENITIES area starts -->

<?php 

$ModelCall->where("client_id", $getClientInfo[0]['id']);

$ModelCall->where("status",1);	   

$ModelCall->orderBy("id","asc");

$HomeAmenities = $ModelCall->get("tbl_amenities");

if($HomeAmenities[0]>0){ ?>

<section class="news-area section-small">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="section-title text-center">

          <h2>AMENITIES <span>At a Glance</span><!--<img src="<?php echo SITE_URL;?>nirwana-img/divide-img.png">--></h2>

        </div>

      </div>

    </div>

    <!-- client carousel -->

    <div class="owl-client">

 <?php 

foreach($HomeAmenities as $HomeAmenitiesVal)

{

if(is_array($HomeAmenitiesVal)){

?>   

      <!-- item 1 -->

      <div class="item text-center">

        <div class="aminities-block"> <!-- <a href=""> -->

          <div class="aminities-image"> <img src="<?php echo SITE_URL.MAINADMIN;?>amenities_image/<?php echo $HomeAmenitiesVal['amenities_image'];?>" alt=""> </div>

          <div class="aminities-content">

            <h3 class="subtitle"><?php echo ucwords($HomeAmenitiesVal['amenities_title']);?></h3>

          </div>

       <!--   </a>  --></div>

      </div>

      

      <!-- item 2 -->

    <?php } } ?>  

   

      

    </div>

    <!-- / client carousel -->

  </div>

</section>

<div class="col-md-12">

     <div class="item text-center">

          <p><h4 style="color: green;">You may click the advertisement to call/ email or visit the advertiser's website.</h4></p>

    </div>

    </div>

    <br> <br> 

 <div class="container">

     <div class="row">

         <div class="col-md-6 text-center">

        <a href="" target="_blank" onclick="trackClick(this)" name=image_url id=image_url>

         <img name="slide" width="400" height="200" />

         </a>

         </div>

          <div class="col-md-6 text-center">

        <!-- <a href="" target="_blank" name=image_url1 id=image_url1>

         <img name="slide1" width="400" height="200" />

         </a> -->

         <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

 NewAdUnit 

<ins class="adsbygoogle"

     style="display:inline-block;width:400px;height:200px"

     data-ad-client="ca-pub-9584597326711955"

     data-ad-slot="3536547800"></ins>

<script>

     (adsbygoogle = window.adsbygoogle || []).push({});

</script> -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<!-- Display NCOIN HomePg -->

<ins class="adsbygoogle"

     style="display:inline-block;width:400px;height:200px"

     data-ad-client="ca-pub-6246358526663438"

     data-ad-slot="4427343056"></ins>

<script>

     (adsbygoogle = window.adsbygoogle || []).push({});

</script>

         </div>

      

    </div>

 </div>

    

    

    

         

         

<?php } ?>

 <section id="about" class="banner-area section-big">

  <div class="container">

    <div class="row">

     <div class="" style="text-align:center;">

    

    </div>

    </div></div></section>



<?php if($getBannerShow1[0]['google_ads']!='' || $getBannerShow1[0]['image']!=''){ echo test;?>



<section id="about" class="banner-area section-big">

  <div class="container">

    <div class="row">

     <div class="" style="text-align:center;">

     <?php if($getBannerShow1[0]['ads_banner_type']=="Image"){?>

    <a href="<?php echo $getBannerShow1[0]['ads_management_url'];?>" target="_blank">  <img src="https://nirvanacountry.co.in/RWAVendor/ads_managements/f1104404-7071-45f0-a10c-66cc587c2bee.jpeg" style="width:728px; height:90px;"></a>

     <?php } ?>

      <?php if($getBannerShow1[0]['ads_banner_type']=="GoogleAd"){?>

    <?php echo $getBannerShow1[0]['google_ads'];?>

     <?php } ?>

    </div>

    </div></div></section>

<?php } ?>



<div class="row"></div>

<!-- Aminities area ends -->

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

  var start = new Date();

  var ad_clicked ='';

// A $( document ).ready() block.

$( document ).ready(function() {

  var start = new Date();

  

  $(window).unload(function() {

      var end = new Date();

      alert(ad_clicked);

      $.ajax({ 

        type: "POST",

        url: "services/track_time_spent.php",

        data: {'timeSpent': end - start,

          'userid' : '<?php echo $_SESSION['UR_LOGINID'];?>',

          'page_url' : '<?php echo $this_page;?>',

          'ip' : '<?php echo $ip;?>',

          'ads_seen': adsvisible,

          'clicked_ad':ad_clicked, 

          },

        

        async: false,

        success: function(data, textStatus, jqXHR)

          {

            console.log(data);

          },

          error: function (jqXHR, textStatus, errorThrown)

          {

            console.log(errorThrown);

          }

      })

   });

}); 



function trackClick(element){

 ad_clicked = element.href;

 ad_clicked = ad_clicked + ", " + document.slide.src



var end = new Date();

      $.ajax({ 

        type: "POST",

        url: "services/track_clicks.php",

        data: {'timeSpent': end - start,

          'userid' : '<?php echo $_SESSION['UR_LOGINID'];?>',

          'page_url' : '<?php echo $this_page;?>',

          'ip' : '<?php echo $ip;?>',

          'ads_seen': adsvisible,

          'clicked_ad':ad_clicked, 

          },

        

        async: false,

        success: function(data, textStatus, jqXHR)

          {

            console.log(data);

          },

          error: function (jqXHR, textStatus, errorThrown)

          {

            console.log(errorThrown);

          }

      });

}

</script>

</body>

</html>

