<?php include('model/class.expert.php');

$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
if($_SESSION['UR_LOGINID']==''){
 //  $check=0;
 //  $url = SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker'];
   header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker']);
}else{
  $check=1;
}
// $ModelCall->where("status",1);
// $ModelCall->where("client_id", $getClientInfo[0]['id']);
// $ModelCall->orderBy("id","desc");
// $getNoticeInfo = $ModelCall->get("tbl_document_directory");
//include('CheckCustomerLogin.php');
$ModelCall->where('survey_name',$_REQUEST['url']);
$s=$ModelCall->get('tbl_survey');
$exp=$s[0]['exp_date'];
$today=date('Y-m-d');
//if($exp<$today){
//echo "This Form Link is expired";
//exit;
//}else {
 // echo "1";
  //exit(0);
//}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- meta -->
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"       content="width=device-width, initial-scale=1.0">
<meta name="description"    content="">
<meta name="keywords"       content="">
<meta name="author"         content="">
<!-- Site title -->
<title>Survey Forms</title>
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
<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/style.css">
<script src="assets/action.js?n=1"></script>
<link rel="icon" href="./logo.png">
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
<div class="clearfix"></div>
<!-- Slider area starts -->
<!-- Slider area ends -->
<!-- Home Banner area starts -->
<!-- Home Banner area end -->
<!-- About area starts -->
<br>
<br>
<br>
<!--section id="about" class="about-area section-big">
  <div class="container">
    <div class="row">
      <!-- About Text ->
      <div class="col-md-12">
        <div class="about-text">
          <div class="section-title text-center">
            <h2 class="" style="text-decoration: underline;">Surveys<br>
              </h2>
          
      </div>
    </div>
  </div>
</section-->
<?php 
$ModelCall->where('user_id',$_SESSION['UR_LOGINID']);
$dets=$ModelCall->get(Wo_Users);
$block=$dets[0]['block_id'];
$floor=$dets[0]['floor_number'];
$house_no=$dets[0]['house_number_id'];
if($_REQUEST['url']){
    $tabl='form_response'.$_REQUEST['url'];
    $f=$ModelCall->rawQuery("SHOW TABLES LIKE '".$tabl."'");
    if(count($f)>0){
     // echo "1 in";
    $ModelCall->where('HouseNo',$house_no);
    $ModelCall->where("BlockNo",$block);
    $ModelCall->where('FloorNo',$floor);
    $present=$ModelCall->get($tabl);
      if(count($present)>0){
          echo '<center><div class="alert alert-info col-md-4" style="margin: 5% 35%;"><h3>You have already filled this form</h3></div></center>';
          exit;
      }
    }
}
?>
<div id="body">
<div id="content" style="font-family:inherit; width:98%!important;">
<span id="heading" style="text-decoration: underline !important; text-align:center">
<h1 class="tile-page-h2 text-center"></h1></span>
<div id="desc"></div>
<div id="form" style="padding-left:20px;margin-left:20px;">
</div>
<!--div class="quest" style="line-height:0px">Suggestions</div><br><textarea rows="4" cols="50" id="suggest"></textarea-->
<table id="usrdetails"><tr><td><input type="hidden" name="name" id="in" value="<?php echo $_SESSION['UR_LOGINNAME'] ?>"></td></tr>
<tr><td><input type="hidden" name="HNo" id="hno" value="<?php echo $house_no; ?>" ></td></tr>
<tr><td><input type="hidden" name="HNo" id="floor" value="<?php echo $floor; ?>" ></td></tr>
<tr><td><input type="hidden" name="block" id="block" value="<?php echo $block; ?>" ></td></tr>
</table>
<div class="done" align="center" style="margin-left:40%;">Submit</div>
</div>
</div>
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
// A $( document ).ready() block.
function CheckLoggedin(){
    console.log( "ready!" );
    // var check ='<?php // echo $check;?>';
    // var url ='<?php // echo $url;?>';
    // if(check=='0'){
    //   setTimeout(function(){
    //      window.location.href=url; // Put url to redirect
    //   }, 3000);
    // }else{
    //   return false;
    // }
  }
</script>
</body>
</html>
