<?php 

include('model/class.expert.php');

 




?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- meta -->
<!--Data table cdn-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>  -->
<!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>   -->
<!--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                <!--<script>  -->
                <!-- $(document).ready(function(){  -->
                <!-- 	$('#details').DataTable();-->
                <!-- });-->
                <!--</script>-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"    content="Nirvana Country is the most prestigious and well-known township in Gurgaon. It is a gated community of villas which homes over 1000 families.">
<meta name="keywords"       content="Nirvana country, nirvana, township in Gurgaon, apartments in Gurgaon, homes in Gurgaon, residential properties in Gurgaon, houses in Gurgaon, property in Gurgaon, residential society in Gurgaon, best gated community in Gurgaon, top properties in Gurgaon, Unitech nirvana country">
<meta name="author"         content="Shivam">
<!-- Site title -->
<title>Nirvana Country – Gurgaon’s Most Prestigious And Well-Known Township</title>
<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico">
<link rel="manifest" href="<?php echo SITE_URL; ?>manifest.json">
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
<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
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

<script data-ad-client="ca-pub-9584597326711955" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6246358526663438",
    enable_page_level_ads: true
  });
</script>
<script type = "text/javascript">
var i = 0; 			// Start Point
var k1="<?php echo $indexvalues[0]['first_index']?>";
var k2="<?php echo $indexvalues[0]['secound_index']?>";
var images = <?php echo json_encode($images); ?>;	// Images Array
var url = <?php echo json_encode($url); ?>;
var url_tel = <?php echo json_encode($url_tel); ?>;
var url_mail = <?php echo json_encode($url_mail); ?>;
var time = 5000;	// Time Between Switch
	 

// Run function when page loads
window.onload=changeImg;
    </script>
    
<style>
.foot_div div{
 width: 100%;
 height: 100%;
}



</style>
    
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

<style>
  .covid-not {
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: fixed;
  bottom: 0px;
  right: 80px;
  background-color: white;
  height: auto;
  z-index: 999999;
  padding: 5px;
  border: 1px solid #f1f1f1;
}

.not-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2px 5px;
  margin-bottom: 10px;
}


.not-header h4 {
  padding: 0px;
  margin: 0px;
}

.not-header button {
  width: 25px;
  margin-left: 15px;
  border: 0px;
  box-shadow: none;
  outline: none;
  background-color: red;
  color: white;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
}

.not-data {
  display: flex;
  justify-content: space-between;
  padding: 2px 5px;
}

.sources {
	display: flex;
	justify-content: center;
	align-items: center;
	color: gray;
	font-size: 12px;
}

.sources a {
	color: gray;
	font-size: 12px;
}

</style>
<?php
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$res = $ModelCall->get("Wo_Users");
$Notification_Count = 0;

foreach($res as $resValue){
$Avatar_link = $resValue['profile_pics'];
$MobileNumber = $resValue['phone_number'];
$Document_Form = $resValue['notification_form'];
$Document_Societyrules = $resValue['notification_society'];
$Document_RWA_Byelaws = $resValue['notification_byelaws'];
$Document_Contruction_Guideline = $resValue['notification_guidelines'];
$Document_Notices = $resValue['notification_notices'];
$Event_Notification = $resValue['notification_eventstatus'];
$Covid_Society_Notices = $resValue['notification_soc_notices'];
$Covid_Government_Directives = $resValue['notification_govt_dir'];
$Covid_Grocery_Home_Delivery_List = $resValue['notification_delivery_list'];
$New_Surveys_Publish = $resValue['notification_surveys_publish'];
$New_Surveys_Approve = $resValue['notification_surveys_approve'];
$Tenant = $resValue['notification_tenant'];

$Approval_Status = $resValue['notification_approval'];
$First_Login = $resValue['first_login'];
$Admin_Approval = $resvalue['admin_approval'];

}
$Avatar_Count = 0;
if($Avatar_link == NULL || $Avatar_link == ''){
$Notification_Count++;
$Avatar_Count = $Notification_Count;
}

if($MobileNumber == NULL || $MobileNumber == ''){
$Notification_Count++;
$MobileNumber_Count = $Notification_Count;
}

if($Approval_Status = 1 && $First_Login = 1 && $Admin_Approval = 1){
$Notification_Count++;
$Approval_Count = $Notification_Count;
}

if($Tenant == 1){
$Notification_Count++;
$Tenant_Count = $Notification_Count;
}
if($New_Surveys_Publish == 1 && $New_Surveys_Approve == 1){
$Notification_Count++;
$New_Surveys_Count = $Notification_Count;
}
if($Covid_Society_Notices == 1){
$Notification_Count++;
$Covid_Society_Notices_Count = $Notification_Count;
}
if($Covid_Government_Directives == 1){
$Notification_Count++;
$Covid_Government_Directives_Count = $Notification_Count;
}
if($Covid_Grocery_Home_Delivery_List == 1){
$Notification_Count++;
$Covid_Grocery_Home_Delivery_List_Count = $Notification_Count;
}
if($Document_Form == 1){
$Notification_Count++;
$Document_Form_Count = $Notification_Count;
}
if($Document_Societyrules == 1){
$Notification_Count++;
$Document_Societyrules_Count = $Notification_Count;
}
if($Document_RWA_Byelaws == 1){
$Notification_Count++;
$Document_RWA_Byelaws_Count = $Notification_Count;
}
if($Document_Contruction_Guideline == 1){
$Notification_Count++;
$Document_Contruction_Guideline_Count = $Notification_Count;
}
if($Event_Notification == 1){
$Notification_Count++;
$Event_Notification_Count = $Notification_Count;
echo $Event_Notification_Count;
}
if($Document_Notices == 1){
$Notification_Count++;
$Document_Notices_Count = $Notification_Count;
}
?>

<!--======================Event Notification==============-->
											<?php 
                                            $ModelCall->where("client_id", $getClientInfo[0]['id']);
                                            $ModelCall->where("status",1);	   
                                            $ModelCall->orderBy("id","asc");
                                            $HomeEvents = $ModelCall->get("tbl_events");
                                            if($HomeEvents[0]>0){ 
                                                foreach($HomeEvents as $HomeEventsVal)
                                                    {
                                                        if(is_array($HomeEventsVal)){
                                                                $ModelCall->where("eid",$HomeEventsVal['id']);
                                                                $getimage = $ModelCall->get("tbl_event_photo");
                                                                $getDay = strtotime($HomeEventsVal['event_date']);
                                                                $DayDisplay = date('d', $getDay);
                                                        }
                                                    }
                                                }
                                            ?>   
											<!--==========================================================-->





</head>
<body>

<div class="covid-not" id="covid">
  <div class="not-header">
    <h4>Covid-19 (INDIA) </h4>
    <button id="not-action" onclick="closeCovid()">X</button>
  </div>
  <div class="not-data">
    <span><strong>Cases :</strong></span><span id="cases"> loading...</span>
  </div>
  <div class="not-data">
    <span><strong>Deaths :</strong></span><span id="deaths"> loading...</span>
  </div>
  <div class="not-data">
    <span><strong>Cured :</strong></span><span id="cured"> loading...</span>
  </div>
  <div class="sources">
  	* <a href="https://www.covid19india.org/" target="_blank">https://www.covid19india.org/</a>
  </div>
</div>
<!-- Navigation area starts -->
<?php include(ROOTACCESS."front_header.php");?>
<!-- Navigation area ends -->
<div class="clearfix"></div>




<section class="news-area section-small">
    <div class="container">
        <div class="row">
            <br><br><br><br>
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Notifications</h2>
                </div>
                <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive" id="dataTable">
       
          
          <thead class="bg-primary">
            <tr>
                 <th scope="col">S.No</th>
                <th scope="col">Description</th>
                <th scope="col">Link</th>
            </tr>
          </thead>
        
          <tbody>
              <tr>
                  
                  <?php
                    if($Notification_Count == 0){
                     echo   "No New Notifications Found";
                    }
                  ?>
              </tr>
              <tr>
                  
                <?php
                    if($Avatar_link == NULL || $Avatar_link == ''){?>
                        <td><?php echo $Avatar_Count ?></td>
                        <td>Update Avatar</td>
                        <td><a href="<?php echo SITE_URL;?>user_profile.php">Update Avatar</a></td>
				<?php } ?>
              </tr>
              
              <tr>
                  
                <?php
                    if($MobileNumber == NULL || $MobileNumber == ''){?>
                        <td><?php echo $MobileNumber_Count ?></td>
                        <td>User Profile</td>
                        <td><a href="<?php echo SITE_URL;?>user_profile.php">Update Mobile</a></td>
				<?php } ?>
              </tr>
              
              <tr> 
                <?php
                    if($Approval_Status == 1 && $First_Login == 1 && $Admin_Approval == 1){?>
                        <td><?php echo $Approval_Count ?></td>
                        <td>Status</td>
                        <td><a href="<?php echo SITE_URL;?>index.php?approvalstatus=seen">Approved by Admin/Owner</a></td>
				<?php } ?>
              </tr>
              
               <tr>
                  
                <?php
                    if($Tenant == 1){?>
                        <td><?php echo $Tenant_Count ?></td>
                        <td>Tenant</td>
                        <td><a href="<?php echo SITE_URL;?>housedetails.php?tenantstatus=seen">House Details</a></td>
				<?php } ?>
              </tr>
              <tr> 
                <?php
                    if($New_Surveys_Publish == 1 && $New_Surveys_Approve == 1){?>
                        <td><?php echo $New_Surveys_Count ?></td>
                        <td>Survey Form</td>
                        <td><a href="<?php echo SITE_URL; ?>survey_forms.php?meid=new_surveys&status=seen">Form</a></td>
				<?php } ?>
              </tr>
              
              <tr> 
                <?php
                    if($Covid_Society_Notices == 1){?>
                        <td><?php echo $Covid_Society_Notices_Count ?></td>
                        <td>Covid Document</td>
                        <td><a href="<?php echo SITE_URL; ?>covid_files_download.php?meid=Society_Notices&status=seen">Society Notice</a></td>
				<?php } ?>
              </tr>
              
               <tr> 
                <?php
                    if($Covid_Government_Directives == 1){?>
                        <td><?php echo $Covid_Government_Directives_Count ?></td>
                        <td>Covid Document</td>
                        <td><a href="<?php echo SITE_URL; ?>covid_files_download.php?meid=Government_Directives&status=seen">Government Directives</a></td>
				<?php } ?>
              </tr>
              
              <tr> 
                <?php
                    if($Covid_Grocery_Home_Delivery_List == 1){?>
                        <td><?php echo $Covid_Grocery_Home_Delivery_List_Count ?></td>
                        <td>Covid Document</td>
                        <td><a href="<?php echo SITE_URL; ?>grocery_list.php?meid=Grocery_list&status=seen">Grocery List</a></td>
				<?php } ?>
              </tr>
              
              <tr>
                  
                <?php
                    if($Document_Form == 1){?>
                        <td><?php echo $Document_Form_Count ?></td>
                        <td>Document</td>
                        <td><a href="<?php echo SITE_URL;?>files_download.php?meid=Forms&status=seen">Forms</a></td>
					<?php } ?>
              </tr>
              <tr>
                  
                <?php
                    if($Document_Societyrules == 1){?>
                        <td><?php echo $Document_Societyrules_Count ?></td>
                        <td>Document</td>
                        <td><a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules&status=seen">Society Rules</a></td>
					<?php } ?>
              </tr>
              <tr>
                  
                <?php
                    if($Document_RWA_Byelaws == 1){?>
                        <td><?php echo $Document_RWA_Byelaws_Count ?></td>
                        <td>Document</td>
                        <td><a href="<?php echo SITE_URL;?>files_download.php?meid=Byelaws&status=seen">RWA Byelaws</a></td>
					<?php } ?>
              </tr>
              <tr>
                  
                <?php
                    if($Document_Contruction_Guideline == 1){?>
                        <td><?php echo $Document_Contruction_Guideline_Count ?></td>
                        <td>Document</td>
                        <td><a href="<?php echo SITE_URL;?>files_download.php?meid=Guidelines&status=seen">Construction Guidelines</a></td>
					<?php } ?>
              </tr>
              
              <tr>
                  
                <?php
                    if($Event_Notification == 1){?>
                        <td><?php echo $Event_Notification_Count ?></td>
                        <td>Event</td>
                        <td><a href="event.php?eventstatus=seen&eid=<?php echo $HomeEventsVal['id'];?>"><?php echo $HomeEventsVal['event_name'];?></a></td>
					<?php } ?>
              </tr>
              <tr>
                  
                <?php
                    if($Document_Notices == 1){?>
                        <td><?php echo $Document_Notices_Count ?></td>
                        <td>Document</td>
                        <td><a href="<?php echo SITE_URL;?>files_download.php?meid=Notices&status=seen">Notices</a></td>
					<?php } ?>
              </tr>
              
             
            
          </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Buy and sell end-->


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

<?php 
if($_SESSION['UR_LOGINID']!=''){
    $dataU =array(
       'user_id'=> $_SESSION['UR_LOGINID'] ,
       'page_name'=> 'index.php'
        );
}        
        else{
             $dataU =array(
            'user_id'=> '999',
       'page_name'=> 'index.php'
       );
        }
   $resultU= $ModelCall->insert('user_analytics',$dataU);

?>


<!-- copyright area ends -->
<!-- Latest jQuery -->
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
 // if (document.cookie.indexOf('visited=true') == -1){
    // load the overlay
    //$('#videoPopup').modal({show:true});
    
   /* var year = 1000*60*60*24*365;
    var expires = new Date((new Date()).valueOf() + year);
    document.cookie = "visited=true;expires=" + expires.toUTCString();*/

  //}
}); 


</script>

<script>
  
  const getCovidData = () => {
    $.ajax({
      url: 'https://api.rootnet.in/covid19-in/stats/latest',
      method: 'GET',
      dataType: 'json',
      success: (response) => {
        $("#cases").html(response.data.summary.total);
        $("#deaths").html(response.data.summary.deaths);
        $("#cured").html(response.data.summary.discharged);
      }
    })
  }
  getCovidData();
  setInterval(getCovidData, 60000);

</script>
<script>
  const closeCovid = () => {
    $("#covid").hide();
  }
</script>


</body>
</html>
