<?php include('model/class.expert.php');


$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
$login_required=array('dummy','GBMs','EC_Meetings', 'EC_Documents', 'Attendance', 'Monthly_performance_MMR','Compost_plant_performance','Notices','Financial_reports','Initiatives','Members_Checklist','Status_of_MCG_Takeover','Accounts','Byelaws');
//,'Election_Schedule'
if(array_search(trim($_REQUEST['meid'],' '),$login_required) && $_SESSION['UR_LOGINID']==''){
        header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker']);
}

if($_REQUEST['meid']=="Accounts" || $_REQUEST['meid']=="Status_of_MCG_Takeover" || $_REQUEST['meid']=="GBMs"  || $_REQUEST['meid']=="Byelaws" || $_REQUEST['meid']=="EC_Meetings" || $_REQUEST['meid']=="Attendance"  ){
    if($_SESSION['UR_LOGINID']!=''){
       if( !isset($_SESSION['user_type']) && $_SESSION['user_type']!=0 ) { 
            header("location:".SITE_URL);
       }
    }
}

if($_REQUEST['meid']=="EC_Documents"){
     if($_SESSION['UR_LOGINID']!=''){
       if( !isset($_SESSION['EC']) && $_SESSION['EC']==0 ) { 
            header("location:".SITE_URL);
       }
    }
}

$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte",$_REQUEST['meid']);
$ModelCall->orderBy("created_date","desc");
$getNoticeInfo = $ModelCall->get("tbl_document_directory");
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Top'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow = $ModelCall->get("tbl_ads_management_directory");

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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documents </title>
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
var k1="<?php echo $indexvalues[0]['first_index']?>";
var k2="<?php echo $indexvalues[0]['secound_index']?>";
var images = <?php echo json_encode($images); ?>;	// Images Array
var url = <?php echo json_encode($url); ?>;
var time = 5000;	// Time Between Switch
	 
// Image List
//images[0] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";
//images[1] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Garima.jpg";

//images[2] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";
//images[3] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Screenshot (32).png";



// Change Image
function changeImg(){
    
	document.slide.src = images[k1];
    document.getElementById("image_url").href = url[k1];
    document.slide1.src = images[k2];
    document.getElementById("image_url1").href = url[k2];
	// Check If Index Is Under Max
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

// Run function when page loads
window.onload=changeImg;
    </script>
    
    <style>
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
    <br><br><br><br>
<!-- Begin Content		-->
<?php 
    if(0){
?>
<h1 style="text-decoration: underline;" class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];

$string = str_replace ("_", " ", $string);
echo $string; } ?></h1>
<div class="container">
<h1 style="text-decoration: underline;" class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo $string;?></h1>   
    
    <hr/>
    <table class="table table-striped table-hover dt-responsive display" id="dataTable">
      <caption class="sr-only">Table example</caption>
      
      <thead class="bg-primary">
        <tr>
            <th class="first" scope="col" data-priority="1"><span class="fa fa-download" aria-hidden="true">&#160;</span></th>
          <th class="second" scope="col">Date</th>
          <th class="third" scope="col">Name</th>
          <th class="fourth" scope="col">Description</th>
        </tr>
      </thead>
      <tfoot class="hidden">
        <tr>
            <th scope="col"><span class="fa fa-download" aria-hidden="true">&#160;</span></th>
          <th scope="col">Date</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
        </tr>
      </tfoot>
      <tbody>
          <?php if($getNoticeInfo[0]>0 && ($_SESSION['user_type'] == 0)){ foreach($getNoticeInfo as $getNoticeInfoVal){ 
$FindYears = trim($getNoticeInfoVal['created_date']);

$word = "mp4";

 
if(strpos($getNoticeInfoVal['document_file'], $word) !== false){
    ?>
    <tr>
          <td><a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank" download> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td><?php echo date("d M Y", strtotime( $getNoticeInfoVal['created_date']));?></td>
           <td><a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank" download><?php echo $getNoticeInfoVal['document_file_name'];?></a> </td>
                <td>
                  <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank" > <?php echo $getNoticeInfoVal['description'];?></a> 
	
                  </td>
                  
        </tr>
    <?php
} else{
    ?>
    <tr>
          <td><a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank" download> <span class="fa fa-download" aria-hidden="true">&#160;</span></a></td>
          <td><?php echo date("d M Y", strtotime( $getNoticeInfoVal['created_date']));?></td>
           <td><a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank"><?php echo $getNoticeInfoVal['document_file_name'];?></a> </td>
                 
                 <td>
                  <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank"> <?php echo $getNoticeInfoVal['description'];?></a> 
	              </td>
                  
        </tr>
    <?php
}
?> 
        
        <?php }}?>
      </tbody>
    </table>
  </div>
  <!-- Modal-->
          <div class="container">
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-4 text-center adword">
        <a href="" target="_blank" name=image_url id=image_url>
         <img name="slide" width="400" height="200" />
         </a>
         </div>
          <div class="col-md-4 text-center adword">
        <a href="" target="_blank" name=image_url1 id=image_url1>
         <img name="slide1" width="400" height="200" />
         </a>
         <div class="col-md-2"></div>
         </div>
      
    </div>
 </div>
 <?php include(ROOTACCESS."HomefooterCall.php");?>
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
	//	order: [[1, "desc"]] // Set State column sorting by default
		 
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

    $(document).ready(function(){
        $('.navbar-fixed-top').addClass('nav-active');
    })

  </script>
</body>
</html>
