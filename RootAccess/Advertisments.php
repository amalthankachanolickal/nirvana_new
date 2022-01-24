<?php 
$this_page = $_SERVER["PHP_SELF"];
$ip = $_SERVER["REMOTE_ADDR"];

$indexvalues = $ModelCall->get("tbl_ads_index");
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
<!-- Owl Carousel css -->
<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">

<script type = "text/javascript">
var i = 0; 			// Start Point
var k1="<?php echo $indexvalues[0]['first_index']?>";
var k2="<?php echo $indexvalues[0]['secound_index']?>";
var images = <?php echo json_encode($images); ?>;	// Images Array
var url = <?php echo json_encode($url); ?>;
var time = 5000;	// Time Between Switch
var adsvisible ='';
console.log("total ads " + images.length);
function getRandomArbitrary(min, max) {
  //alert(Math.floor(Math.random() * (max - min + 1)) + min);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

k1= getRandomArbitrary(0, images.length -1);
k2= getRandomArbitrary(0, images.length -1);

console.log("Start image" + k1);
// Change Image
function changeImg(){
  console.log("Next image" + k1);
	document.slide.src = images[k1];
  document.slide1.src = images[k2];
  adsvisible = adsvisible + images[k1] + ',';
    document.getElementById("image_url").href = url[k1];
    document.getElementById("image_url1").href = url[k2];
    //document.slide1.src = images[k2];
    //document.getElementById("image_url1").href = url[k2];
	// Check If Index Is Under Max
 // k1= getRandomArbitrary(0, images.length -1);
	if(k1 < images.length - 1){
	  // Add 1 to Index
	  k1++; 
	} else { 
		// Reset Back To O
		k1 = 0;
	}

  if(k2 < images.length - 1){
	  // Add 1 to Index
	  k2++; 
	} else { 
		// Reset Back To O
		k2 = 0;
	}

	// Run function every x seconds
	setTimeout("changeImg()", time);
}
window.onload=changeImg;
</script>
    <div class="clearfix"></div>  
    <div class="col-md-12">
     <div class="item text-center">
         
    <p><h4 style="color: green;">You may click the advertisement to call/ email or visit the advertiser's website.</h4></p>
    </div>
    </div>
    <br> <br> 
 <div class="container">
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-4 text-center adword">
        <a href="" target="_blank" onclick="trackClick(this)" name=image_url id=image_url>
         <img name="slide" width="400" height="200" />
         </a>
         </div>
          <div class="col-md-4 text-center adword">
          <a href="" target="_blank" onclick="trackClick(this)" name="image_url1" id=image_url1>
         <img name="slide1" width="400" height="200" />
         </a>
          <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- NewAdUnit -->
         <!--  <ins class="adsbygoogle"
              style="display:inline-block;width:400px;height:200px"
              data-ad-client="ca-pub-9584597326711955"
              data-ad-slot="3536547800"></ins>
          <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script> -->
         <div class="col-md-2"></div>
         </div>
      
    </div>
 </div>

 <script type="text/javascript">
  var start = new Date();
  var ad_clicked ='';


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