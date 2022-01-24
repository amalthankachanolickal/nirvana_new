<?php include('model/class.expert.php');

$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
// if($_SESSION['UR_LOGINID']==''){
//   header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker']);
// }
// //$login_required=array('dummy','GBMs','EC_Meetings','Attendance','Monthly_performance_MMR','Compost_plant_performance','Notices','Financial_reports','Initiatives');
//if(array_search(trim($_REQUEST['meid'],' '),$login_required) && $_SESSION['UR_LOGINID']==''){
  //      header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker']);
//}
$ModelCall->where("status",'Approved');
$ModelCall->where("is_published",'Yes');
$forms=$ModelCall->get('tbl_survey');

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
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nirvana Country : Survey </title>
    
     <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
     
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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
<!-- Responsive css -->
<link href="<?php echo SITE_URL;?>assets/css/responsive.css" rel="stylesheet">


<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet">
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
<script data-ad-client="ca-pub-9584597326711955" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>
<script type = "text/javascript">
var i = 0; 			// Start Point
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

console.log("Start image" + k1);
// Change Image
function changeImg(){
  console.log("Next image" + k1);
	document.slide.src = images[k1];
  adsvisible = adsvisible + images[k1] + ',';
    document.getElementById("image_url").href = url[k1];
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
	// Run function every x seconds
	setTimeout("changeImg()", time);
}
window.onload=changeImg;
</script>
    <style>
    #dataTable tfoot {
  display: table-header-group;
}

  table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th.dtr-control:before{
    margin-top:0px !important;
    top:10% !important;
}
    
table.dataTable thead .sorting, table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc {
    background-image: none;
}
    </style>
</head>
<body>
    <?php include(ROOTACCESS."front_header.php");?>
<!-- Begin Content		-->
<h1>Surveys</h1>
<div class="container">
<h1 style="text-decoration: underline;" class="tile-page-h2 text-center">Surveys</h1>   
    <hr/>
    <table class="table table-striped table-hover dt-responsive display" id="dataTable">
      <caption class="sr-only">Surveys</caption>
      
      <thead class="bg-primary">
        <tr>
            <!--th class="first" scope="col"><span class="fa fa-download" aria-hidden="true">&#160;</span></th-->
          <th width="20%" scope="col">Survey Name</th>
          <th width="60%" scope="col">Description</th>
              <!--<th width="20%" scope="col">Expiry Date</th>-->

        </tr>
      </thead>
      <!--<tfoot class="hidden">-->
      <!--  <tr>-->
      <!--      <th scope="col"><span class="fa fa-download" aria-hidden="true">&#160;</span></th>-->
      <!--    <th scope="col">Survey Name</th>-->
      <!--    <th scope="col">Description</th>-->
      <!--    <th scope="col">Expiry Date</th>-->
      <!--  </tr>-->
      <!--</tfoot>-->
      <tbody>
          <?php if($forms[0]>0){ foreach($forms as $form){ 
//$FindYears = trim($getNoticeInfoVal['created_date']);?> 
        <tr>
          <td><a href="<?php echo SITE_URL.'surveys.php?url='.$form['survey_name'];?>" target="_blank"><?php echo $form['survey_name'];?></a></td>
          <td><?php echo $form['brief_desc'];?></td>
          <!--  <td><?php echo $form['exp_date'];?></td>-->

        </tr>
        <?php }}?>
      </tbody>
    </table>
  </div>
  <!-- Modal-->
 <!------ Include the above in your HEAD tag ---------->
 <?php // include(ROOTACCESS."ads-include.php");?>
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
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Survey_ad_unit -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9584597326711955"
     data-ad-slot="5683206710"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
         <div class="col-md-2"></div>
         </div>
      
    </div>
 </div>
<br>   
 </div>
 <?php include(ROOTACCESS."HomefooterCall.php");?>
 <!-- copyright area ends -->
<!-- Latest jQuery -->
<!--<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>-->
<!-- Bootstrap js-->
<!--<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <script>  
    const $doc = $(document);
let $dataTable = $("#dataTable");
let $dropdownInput = $("select.form-control");
let $state = $("#state");
let $category = $("#category");
let $clear = $("#clear");
let $keyup = $.Event("keyup", { keyCode: 13 });

//Ready function
$doc.ready(function() {
	// Start DataTable
	$dataTable.DataTable({
		mark: true, // Highlight search terms
		search: {
			caseInsensitive: true
		},
		aLengthMenu: [
			// Show entries incrementally
			[10, 20, 50, -1],
			[10, 20, 50, "All"]
		],
		 responsive: true,
		order: [[1, "asc"]] // Set State column sorting by default
	});

	

	
	
	// Remove BS small modifier
	$('select[name="dataTable_length"]').removeClass('input-sm');
	$('#dataTable_filter input').removeClass('input-sm');

	/*
	 * ADD INDIVIDUAL COLUMN SEARCH
	*/
	
	// Add a hidden text input to each footer cell
	$("#dataTable tfoot th").each(function() {
		var $title = $(this).text().trim();
		$(this).html('<div class="form-group"><label>Search ' + $title + ':<br/><input class="form-control" id="search' + $title + '" type="hidden"/></label></div>');
	});
	// Apply the search functionality to hidden inputs
	$dataTable
		.DataTable()
		.columns()
		.every(function() {
			var $that = this;
			$("input", this.footer()).on("keyup change", function() {
				if ($that.search() !== this.value) {
					$that.search(this.value, false, true, false).draw(); // strict search
				}
			});
		});
});

  </script>
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
</body>
</html>
