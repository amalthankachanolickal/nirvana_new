<?php include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];

include('CheckCustomerLogin.php');

 if($_SESSION['UR_LOGINID']!=''){
       if( !isset($_SESSION['user_type']) || $_SESSION['user_type']!=0 ) { 
             header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=house_tax_details_new.php");
       }
    }
$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");  

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

$user_type=$rec[0]['user_type'];

// if($rec[0]['user_type']==0){
    
// }else{
//      header("location:".SITE_URL); 
//      exit(0);
// }

$ModelCall->where("id", $rec[0]['block_id']);
$ModelCall->orderBy("block_name","asc");

$GetBlockList = $ModelCall->get("tbl_block_entry");
//print_r($GetBlockList);

$House_No= sprintf('%04d', $rec[0]['house_number_id']);
//$echo=$House_No;
// echo $GetBlockList[0]['block_code'];
// echo $rec[0]['house_number_id'];
// echo $rec[0]['floor_number'];
$ModelCall->where("block_name", $GetBlockList[0]['block_code']);
$ModelCall->where("house_number",$rec[0]['house_number_id']);
$ModelCall->where("floor",$rec[0]['floor_number']);

$getHouseTaxDetails = $ModelCall->get("tbl_house_tax_details");

if(count($getHouseTaxDetails)==0){
    header("location:".SITE_URL); 
    exit(0);
}
// print_r($getHouseTaxDetails);
// exit(0);
$today=date('Y-m-d');



?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>House Tax Details Page </title>
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico"> -->
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
        html, body {
            margin: 0;
            padding: 0;
        }
        .iFrame {
            width: 100vw;
            /* height: 225vh; */
        }
        .iFrame iframe{
            width: 100%;
            /* min-height: 100%; */
        }
        .iFrame iframe[seamless] {
            display: block;
        }
        .header , .footer {
            min-height: 80px;
            background-color: red;
            text-align: center;
            line-height: 80px;
            font-weight: bold;
            font-size: 1.5em;
            border: 1px solid pink;
            color: white;
        }
       
    </style>
</head>
<body>
  <?php include(ROOTACCESS."front_header.php");?>
  <!-- Begin Content		-->


     <div class="iFrame">
        <iframe id="iFrame" src="house_tax_iframe.php" frameborder="0" onload="iframeLoaded()">
            Something Went Wrong.
        </iframe>
    </div>

      
      <!------ Include the above in your HEAD tag ---------->
      <?php include(ROOTACCESS."Advertisments.php");?>
      <br>

     

    <?php include(ROOTACCESS."HomefooterCall.php");?>
<script type="text/javascript">
  function iframeLoaded() {
      var iFrameID = document.getElementById('iFrame');
      if(iFrameID) {
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = (iFrameID.contentWindow.document.body.scrollHeight + 40) + "px";
      }   
  }
</script>
  </body>
  </html>