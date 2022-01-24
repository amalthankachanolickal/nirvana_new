<?php 
include(ROOTACCESS."getlocation.php");
include('../model/class.expert.php');
// get the member checklist latest
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte","Members_Checklist");
$ModelCall->orderBy("id","desc");
$getmemberChecklist = $ModelCall->getOne("tbl_document_directory");
// get the contact list latest
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte","Office_Bearer");
$ModelCall->orderBy("id","desc");
$getContactlist = $ModelCall->getOne("tbl_document_directory");
// get the escalation Matrix
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte","Escalation_matrix");
$ModelCall->orderBy("id","desc");
$getEscalation_matrix = $ModelCall->getOne("tbl_document_directory");
// get the covid Initiative document
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_title","Initiatives_By_The_NRWA");
$ModelCall->orderBy("id","desc");
$getovidInitiative = $ModelCall->getOne("tbl_covid_document");
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script> 
  if ('serviceWorker' in navigator) {    
  console.log("Will the service worker register?");    
  navigator.serviceWorker.register('service-worker.js').then(function(reg) {
      console.log("Yes, it did.");
  }).catch(function(err) { 
      console.log("No it didn't. This happened:", err); 
    });
 }

window.addEventListener('appinstalled', (evt) => {
   let xhr = new XMLHttpRequest();

   xhr.open("POST", "countA2H.php", true);
   xhr.send();

   xhr.onreadystatechange = () => {
    if (this.readyState == 4 && this.status == 200) {
     console.log("updated the counter"); 
    }
   }
});
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-18"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-55877669-18');
  
  
  function myFunction1() {
  var x = document.getElementById("div1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 function myFunction2() {
  var x = document.getElementById("div2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunctionForms() {
  var x = document.getElementById("divForms");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

 function myFunction3() {
  var x = document.getElementById("div3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 function myFunction4() {
  var x = document.getElementById("div4");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 function myFunction14() {
  var x = document.getElementById("div14");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 function myFunction15() {
  var x = document.getElementById("div15");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 function myFunction10() {
  var x = document.getElementById("div10");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction11() {
  var x = document.getElementById("div11");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}



function myFunctionMembership() {

  var x = document.getElementById("divMem");

  if (x.style.display === "none") {

    x.style.display = "block";

  } else {

    x.style.display = "none";

  }

}

function myFunctionElection() {

  var x = document.getElementById("divElec");

  if (x.style.display === "none") {

    x.style.display = "block";

  } else {

    x.style.display = "none";

  }

}

function myFunctionList() {

  var x = document.getElementById("DivList");

  if (x.style.display === "none") {

    x.style.display = "block";

  } else {

    x.style.display = "none";

  }

}


</script>

<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  right: 100%;
  margin-top: -1px;
}

.menu-area {
	padding-right: 10px;
	padding-left: 0px;
}

.menu-area li a {
	padding: 6px 8px !important;
}
  .menu-area div.show-on-small {
    display: none !important;
  }


@media only screen and (min-width: 768px) {
	.navbar-header {
		max-width: 18%;
	}
	.my-nav {
  	max-width: 100%;
  	display: flex;
  	align-items: center;
  }
}


@media only screen and (max-width: 768px) {
  .my-nav {
  	max-width: 60%;
  	display: flex;
  	align-items: center;
  }
  .menu-area li.nav-item.hide-on-small {
    display: none !important;
  }
  .menu-area ul.show-on-small {
    display: inline-block !important;
  }

  .menu-area div.show-on-small {
    display: flex !important;
    justify-content: flex-end;
    align-items: center;
    padding: 10px 0px 0px 0px;
    text-align: center;
    align-self: flex-end;
  }

  .menu-area div.show-on-small a {
    color: black;
    margin: 0px 10px;
  }
}

.badge-notify{
   background:red;
   position:relative;
   top: -40px;
   left: 19px;
}

</style>

<!--=======================Tenant Status==========================-->
<!--0=Seen 1=Unseen-->
<?php
$ApprovalStatus= $_GET['approvalstatus'];
if($ApprovalStatus == "seen"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_approval' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
?>


<!--=======================Tenant Status==========================-->
<!--0=Seen 1=Unseen-->
<?php
$TenantStatus= $_GET['tenantstatus'];
if($TenantStatus == "seen"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_tenant' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
?>

<?php
$Status= $_GET['status'];
$Meid = $_GET['meid'];


/*==============================New Surveys============================================*/
if($Status == "seen" && $Meid == "new_surveys"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_surveys_publish' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}

if($ModelCall->count==1)
{
$dataU = array(
	'notification_surveys_approve' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}

/*==========================================================================*/

if($Status == "seen" && $Meid == "Government_Directives"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_govt_dir' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}


if($Status == "seen" && $Meid == "Society_Notices"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_soc_notices' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}

if($Status == "seen" && $Meid == "Grocery_list"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_delivery_list' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}



if($Status == "seen" && $Meid == "Forms"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_form' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
if($Status == "seen" && $Meid == "Society_Rules"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_society' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
if($Status == "seen" && $Meid == "Byelaws"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_byelaws' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
if($Status == "seen" && $Meid == "Guidelines"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_guidelines' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
if($Status == "seen" && $Meid == "Notices"){
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

if($ModelCall->count==1)
{
$dataU = array(
	'notification_notices' => 0,
	);
	
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$result =  $ModelCall->update ('Wo_Users', $dataU);
}
}
?>




<?php
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
$ModelCall->orderBy("user_id","asc");
$res = $ModelCall->get("Wo_Users");
$Notification_Count = 0;

foreach($res as $resValue){

/*=====================Tenant Notification================*/
$Owner_Email = $resValue['email'];
$Owner_Floor_Number = $resValue['floor_number'];
$Owner_House_Number = $resValue['house_number_id'];
$Owner_Block_id = $resValue['block_id'];


$ModelCall->where("owner_email", $Owner_Email);
$ModelCall->where("floor_number", $Owner_Floor_Number);
$ModelCall->where("house_number_id", $Owner_House_Number);
$ModelCall->where("block_id", $Owner_Block_id);
$ModelCall->orderBy("user_id","asc");
$result = $ModelCall->get("Wo_Users");

foreach($result as $resultValue){
$Tenant_Name = $resultValue['email'];
if($ModelCall->count==1){
    
    }
}
/*====================================================*/





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
$Admin_Approval = $resValue['admin_approval'];
}
$Avatar_Count = 0;
//if($Avatar_link == NULL || $Avatar_link == ''){
//$Notification_Count++;
//$Avatar_Count = $Notification_Count;
//}
if($MobileNumber == NULL || $MobileNumber == ''){
$Notification_Count++;
$MobileNumber_Count = $Notification_Count;
}

if($Approval_Status == 1 && $First_Login == 1 && $Admin_Approval == 1){
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


<div class="menu-area navbar-fixed-top">
  <div class="container-fluid" style="">
    <div class="row">
      <!-- Navigation starts -->
      <div class="col-md-12">
        <div class="mainmenu">
          <div class="navbar navbar-nobg">
            <div class="navbar-header"> 
            	<a class="navbar-brand my-nav" href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" alt=""></a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <div class="show-on-small">
            <a href="<?php echo SITE_URL; ?>help-folder/Nirwana%20to%20Home%20Screen.mp4" title="Click here to know how to Add to your mobile Home Screen and access at ease." target="_blank"><img src="<?= SITE_URL ?>images/tablet.png" alt="save" style="max-height: 35px;"></a> 
        </div>
            </div>
            <div class="navbar-collapse collapse">
              <nav>
                <ul class="nav navbar-nav navbar-right header-menu">
                  <!-- <li class="active"><a class="smooth_scroll" href="">Home</a></li>-->
                    <li class="nav-item dropdown">
                      <a  href="<?php echo SITE_URL;?>about_us.php" >About Us</a>
                    
                    </li>
     <li class="nav-item dropdown">
                     
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"  style="text-transform:none !important">myRWA</a>
 <div class="dropdown-menu dropdown-menu-left" style="width:300px">

  <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunctionElection()" >Elections</a><br>   
  
      <div id="divElec" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
       <a href="<?php echo SITE_URL;?>/files_download.php?meid=Election_Schedule">Schedule</a><br>
       <a href="<?php echo SITE_URL;?>assets/nomination-form.pdf"  target="_blank">Nomination Form</a><br>
          <a href="<?php echo SITE_URL;?>/elections.php">Know Your Candidates</a><br>
              <a href="<?php echo SITE_URL;?>/uploads/Nomination of candidate.pdf" target="_blank">Election Candidates PDF </a><br>
        </div>
 <!--     <div class="dropdown-menu dropdown-menu-left" style="width:300px">-->
          <?php // if($_SESSION['UR_LOGINID']!=''){?>
        <?php // if( !isset($_SESSION['user_type']) || $_SESSION['user_type']==0 ) { ?>
 <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=Election_Schedule">Election Schedule</a><br>-->
 <!--<a href="<?php echo SITE_URL;?>assets/nomination-form.pdf"  target="_blank">Nomination Form</a><br>-->
       <?php // }
        //  } ?>
          
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunctionMembership()" >Membership Status</a><br>   

      <div id="divMem" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >

        <a href="<?php echo SITE_URL;?>your-membership-details.php" target="<?php if (isset($_SESSION['UR_LOGINID'])) { ?> _blank <?php } ?>">Your Membership </a><br> 

	<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" onclick="myFunctionList()" >Members</a><br>  
 	<div id="DivList" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >

        <a href="<?php echo SITE_URL;?>member_status.php?status=Yes" target="<?php if (isset($_SESSION['UR_LOGINID'])) { ?> _blank <?php } ?>">Members List </a><br> 

        <a href="<?php echo SITE_URL;?>member_status.php?status=Docs Pending" target="<?php if (isset($_SESSION['UR_LOGINID'])) { ?> _blank <?php } ?>">Pending Members' List</a><br> 

      <!--   <a href="<?php echo SITE_URL;?>member_status.php?status=N/A" target="<?php if (isset($_SESSION['UR_LOGINID'])) { ?> _blank <?php } ?>">Non-Membership List</a><br> 
       ..--></div>

       <a href="<?php echo SITE_URL;?>your-membership-details.php" target="<?php if (isset($_SESSION['UR_LOGINID'])) { ?> _blank <?php } ?>"> Update your Membership</a><br> 
         <a href="<?php echo SITE_URL;?>membership.php" target="_blank"> RWA Membership Form</a><br> 
        </div>



      <?php if($_SESSION['UR_LOGINID']!=''){?>
        <?php if( isset($_SESSION['user_type']) &&  $_SESSION['user_type']==0 ) { 
        if(count($getmemberChecklist)>0){?>
          <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getmemberChecklist['document_file'];?>" target="_blank">Members Checklist</a><br>
        
         <?php }?>
           <a href="<?php echo SITE_URL;?>/files_download.php?meid=Accounts" target="_blank">Accounts</a><br>
          <?php }?>
  <?php }?>
  <?php  if(count($getContactlist)>0){?>
 <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getContactlist['document_file'];?>" target="_blank">Important Contacts</a><br> 
  <?php }?>
       <!-- <a href="https://www.youtube.com/watch?v=FhQJxpvXE_c" target="_blank">Nirvana Video Clip</a> -->
       <a href="#videoModal" data-toggle="modal">Nirvana Video Clip</a><br>
        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=">Surveys</a><br> -->
        <?php // if( isset($_SESSION['user_type']) && $_SESSION['user_type']==0 ) { ?>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Status_of_MCG_Takeover">MCG T/Over</a><br>
      <div>
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction1()" >Meetings</a>   
        <div id="div1" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          <a href="<?php echo SITE_URL;?>files_download.php?meid=GBMs">GBMs</a><br> 
            <a href="<?php echo SITE_URL;?>files_download.php?meid=EC_Meetings">EC Meetings</a><br> 
          <a href="<?php echo SITE_URL;?>files_download.php?meid=Attendance">Attendance</a><br> 
        </div>
      </div>
 <?php // }?>
       <div >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction10()" >Reports</a>   
       <div id="div10" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Exec_Smry_HSD"> Exec Smry + HSD</a>
      </div>
   </div> 
        <?php
       
if($_SESSION['EC'] && $_SESSION['EC']==1){
?>
<a href="<?php echo SITE_URL;?>files_download.php?meid=EC_Documents">EC Documents</a><br>
<?php }?>
 <a href="<?php echo SITE_URL;?>#about">Contact Us</a><br> 
       
 <font color="white">______________________________</font>
      </div>
    </li>
          <!--   <li class="nav-item dropdown">
                     
      <a class="nav-link dropdown-toggle" href="<?php echo SITE_URL;?>about_us.php" id="navbardrop" data-toggle="dropdown">Reports</a>
      <div class="dropdown-menu dropdown-menu-left" >
          
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Exec_Smry_HSD"> Exec Smry + HSD</a><br>

  
      
         

       
   
      </div>
    </li> -->
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Services</a>
      <div class="dropdown-menu dropdown-menu-left">
        <a href="<?php echo SITE_URL;?>medical-services.php">Medical Services</a><br>
          <a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Services">Society Services</a><br>
      <?php  if(count($getEscalation_matrix)>0){?>
        <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getEscalation_matrix['document_file'];?>" target="_blank">Escalation matrix</a><br>
      <?php }?>
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Monthly_performance_MMR">Monthly performance MMR</a><br>
            <a href="<?php echo SITE_URL;?>survey_forms.php">Surveys</a><br>
            <a href="<?php echo SITE_URL;?>survey_results.php">Survey Results</a><br>
     <!--  <a href="<?php echo SITE_URL;?>files_download.php?meid=Compost_plant_performance">Compost plant performance</a><br> -->
        <font color="white">______________________________________________________</font><br>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" >Documents</a>
      <div class="dropdown-menu dropdown-menu-left">
      <div>
      <a  class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunctionForms()" >Forms</a><br>
      <div id="divForms" class="dropdown-submenu" style="margin-left: 20px; display: none;" >
       <a href="<?php echo SITE_URL;?>membership.php" target="_blank"> RWA Membership Form</a><br> 
        <a href="<?php echo SITE_URL;?>dhc_undertaking.php" target="_blank">DHC Undertaking</a><br>
	      <a href="<?php echo SITE_URL;?>googleForm.php" target="_blank" >Google Group Joining </a> <br>
	   <a href="<?php echo SITE_URL;?>self_isolation_form_start.php">Self Isolation Start Declaration</a><br>

	  <a href="<?php echo SITE_URL;?>self_isolation_form.php" target="_blank">Self Isolation End Declaration</a><br>
    <a href="<?php echo SITE_URL;?>tenant_checkout_form.php" target="_blank"> Tenants Checkout Form</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Forms" target="_blank"> Other Forms</a><br>
      </div>
      </div>
      <!-- <a href="<?php echo SITE_URL;?>dhc_undertaking.php" target="_blank">DHC Undertaking</a><br> -->
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules">Society Rules</a><br>
       
      <div >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction2()" >Processes</a>   
       <div id="div2" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">NRWA byelaws</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes"> Construction guidelines</a><br>
      </div>
   </div>
      
      <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=Event _Photos">Event_Photos</a><br>  -->
     <a href="<?php echo SITE_URL;?>files_download.php?meid=Notices">Notices</a><br>
     
    <!--    <div >
      <!--    <a href="<?php echo SITE_URL;?>files_download.php?meid=Financial_reports">Financial reports</a><br> 
      
       <div >
       <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction3()" >Others</a>   
      
      
      
      <div id="div3" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          
      <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=Legal_Cases">Legal Cases</a><br>
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Status_of_MCG_Takeover">Status of MCG Takeover</a><br> 
     <font color="white">______________________________________________________</font><br>
      
   
      </div>
   </div>-->
   <font color="white">______________________________________________________</font><br>
      </div>
    </li>
   
                
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Initiatives</a>
      <div class="dropdown-menu dropdown-menu-left">
          
        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=">Surveys</a><br> -->
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Achievements</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Website RoadMap</a><br>
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">HT/LT Repairs</a><br>
      <!--  <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">DG Repairs</a><br> -->
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Car Stickers</a><br>
     <!--   <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">DH passing thru QRcode based pass</a><br> -->
   <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Construction ban implemented</a><br>
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Trees washed with STP water</a><br>
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">No crackers in diwali</a><br>
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Society Connect Application launched</a><br>
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Nirvana Website Launched</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Other Key Achievements</a><br>
        <font color="white">______________________________________________________</font><br>
      </div>
    </li>
     
    
    <li class="nav-item dropdown">
                     
         <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Bills</a>
      <div class="dropdown-menu dropdown-menu-left">
          <a href="<?php echo SITE_URL;?>bills.php" target="_blank">Cam Bills</a><br>
          
   <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction14()" >Unreconcciled Rcpts</a>   
      
      <div id="div14" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          
      <a href="<?php echo SITE_URL;?>UnRecon-converted.pdf" target="_blank">Download Pdf</a><br> 
        <a href="<?php echo SITE_URL;?>UnRecon.xlsx" target="_blank" >Download Excel</a><br> 
      </div></br>
        <a href="https://epayment.dhbvn.org.in/" target="_blank">DHBVN</a><br>
       <a href="https://www.mcg.gov.in/HouseTax.aspx" target="_blank">Property Tax - MCG Site</a><br>
        <?php  // if( isset($_SESSION['user_type']) &&  $_SESSION['user_type']==0 ) { ?>
         <a href="<?php echo SITE_URL;?>house_tax_details_new.php" target="_blank">Property Tax Details</a><br>
      <?php // }?>

      <div >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction4()" >Newspaper</a>   
      
      
      
      <div id="div4" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          
      <a href="<?php echo SITE_URL;?>newspaper.php?meid=Newspapers">Annual Subscription</a><br> 
        <a href="<?php echo SITE_URL;?>user_newspaper.php">Subscribed Newspapers</a><br> 
         <a href="<?php echo SITE_URL;?>user_news_paper_bill.php">Newspaper Bills</a><br> 
      
      
  
      </div>
   </div>
      
         
   
       
   <font color="white">______________________________________________________</font><br>
      </div>
    </li>
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Covid Response</a>
      <div class="dropdown-menu dropdown-menu-right">
      	<a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction15()" >Covid Trackers</a>   
      	<div id="div15" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
            <a href="https://www.mygov.in/aarogya-setu-app/?app=aarogya&target=browser" target="_blank">GOI App</a><br> 
            <a href="https://www.mygov.in/covid-19/" target="_blank" >GOI Website</a><br>
            <a href="https://t.me/MyGovCoronaNewsdesk" target="_blank" >GOI Telegram Channel</a><br>
            <a href="https://www.ft.com/coronavirus-latest" target="_blank" >FT's Global Tracker</a><br>  
            <p>Please note that this is public information, put here for access of residents. NRWA Does not verify or endorse any application, website or data from these links</p>
        </div></br>
        <a href="<?php echo SITE_URL;?>dhc_undertaking.php" target="_blank">DHC Undertaking</a><br>
        <a class="dropdown-item" href="<?php echo SITE_URL;?>covid-dashboard.php">NRWA Dashboard</a> <br>
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction11()">Self Isolation Form</a> 
        <div id="div11" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
	  <a href="<?php echo SITE_URL;?>self_isolation_form_start.php"  target="_blank">Self Isolation Start Declaration</a><br>
	 <a href="<?php echo SITE_URL;?>self_isolation_form.php"  target="_blank">Self Isolation End Declaration</a><br>
<!--	 <a href="<?php echo SITE_URL;?>RWAVendor/documents/covid/self_declaration_covid_19.pdf" target="_blank">PDF</a><br> 
            <a href="<?php echo SITE_URL;?>RWAVendor/documents/covid/self declaration covid 19 (2).docx" target="_blank">WORD</a><br> -->
           </div>
          <br>
        <a class="dropdown-item" href="<?php echo SITE_URL; ?>covid_crisis_mgmt_team.php">Crisis Mgmt Team </a> <br>
        <a class="dropdown-item" href="<?php echo SITE_URL; ?>covid_files_download.php?meid=Government_Directives">Govt Directives</a> <br>
        <a class="dropdown-item" href="<?php echo SITE_URL; ?>grocery_list.php">Grocery Home Delivery Vendors</a> <br>
        <a class="dropdown-item" href="<?php echo SITE_URL; ?>covid_files_download.php?meid=Society_Notices">Society Notices</a> <br>
        <?php  if(count($getovidInitiative)>0){?>
 <a href="<?php echo SITE_URL.MAINADMIN;?>documents/covid/<?php echo $getovidInitiative['document_file'];?>" target="_blank">Initiatives by the NRWA</a> <br>
        <?php }?>
   <font color="white">______________________________________________________</font><br>

      </div>
    </li>
    <li class="nav-item text-center hide-on-small">
        <a href="<?php echo SITE_URL; ?>help-folder/Nirwana%20to%20Home%20Screen.mp4" title="Click here to know how to Add to your mobile Home Screen and access at ease." target="_blank"><img src="<?= SITE_URL ?>images/tablet.png" alt="save"></a> 
    </li>
    <li class="nav-item text-left text-sm-center text-md-center">
        <a href="<?php echo SITE_URL; ?>help-folder/5dce57cb73ab4Nirvana-Country-Features.pdf" target="_blank" title="Click here to see the features and benefits of this portal." style="font-size: 12px; line-height: 12px;">Web Site <br> Benefits</a> 
    </li>
    
    
    
                  <!-- <li><a class="smooth_scroll" href="">Media</a></li>
                                        <li><a class="smooth_scroll" href="">Services</a></li>
                                        <li><a class="smooth_scroll" href="">Discussions</a></li>-->
                  <?php if($_SESSION['UR_LOGINID']!=''){?>
                <!--  <li><a href="<?php echo SITE_URL;?>user_profile.php" class="log" id="navbar-sign-in">Hi <?php echo $_SESSION['UR_LOGINNAME'];?></a></li> -->
                  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Hi <?php echo $_SESSION['UR_LOGINNAME'];?></a>
      <div class="dropdown-menu dropdown-menu-left">
          
        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=">Surveys</a><br> -->
      <a href="<?php echo SITE_URL;?>user_profile.php">User Details</a><br>
        <a href="<?php echo SITE_URL;?>housedetails.php">House Details</a><br>
     
       <!-- <font color="white">_______________________________________</font><br> -->
     
     <!--  <a href="<?php echo SITE_URL;?>files_download.php?meid=Compost_plant_performance">Compost plant performance</a><br> -->
        <font color="white">_________________________</font><br>
      </div>
    </li>
    <li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="" id="navbardrop_notification" data-toggle="dropdown">
												<i class="fa fa-bell" style="font-size:20px">&nbsp;&nbsp;&nbsp;</i>
											</a>
											<?php
											if($Notification_Count == 0){
											
											}else{ ?>
											<span class="badge badge-notify"><?php echo $Notification_Count; ?></span>
											<?php }
											?>
											<?php 
											$Count_Notifications = 3;
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
											<div class="dropdown-menu dropdown-menu-right" style="font-size:11px !important,padding-top:0px">
											    
												<div class="card" style="font-size:11px !important,padding-top:0px">
												    <?php
												    if($Notification_Count <> 0){ ?>
												    <div class="card-header" align="center">
                                                    <a href="#">New Notifications</a>
                                                    </div>
                                                    <?php }else{ ?>
                                                    <div class="card-header">
                                                    <a href="#">No New Notifications</a>
                                                    </div>
                                                    <?php
                                                    } ?>
                                                    
                                                    
                                                  <?php
                                                  if($Notification_Count == 0){ 
                                                  }else{
                                                  ?>
                                                  <ul class="list-group list-group-flush">
                                                     <?php
                                                     //if(($Avatar_link == NULL || $Avatar_link == '') && $Avatar_Count <= 3){ ?>
                                                       	<!-- <li class="list-group-item"> <i aria-hidden="true" class="fa fa-user"></i><a href="<?php echo SITE_URL;?>user_profile.php">Update Avatar</a></li>-->
                                                    <?php   // }
												
												if(($MobileNumber == NULL || $MobileNumber == '')&& $MobileNumber_Count <= 3){?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-phone"></i><a href="<?php echo SITE_URL;?>user_profile.php">Update Mobile</a></li>
												
												<?php }
												
												if($Approval_Status == 1 && $First_Login == 1 && $Admin_Approval == 1 && $Approval_Count <= 3){
												?>
											
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-check"></i><a href="<?php echo SITE_URL;?>index.php?approvalstatus=seen">Approved by Admin/Owner</a></li>
												
												<?php }
												
												if($Tenant == 1 &&  $Tenant_Count <=3){?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-male"></i><a href="<?php echo SITE_URL;?>housedetails.php?tenantstatus=seen">Tenant</a></li>
												
												<?php }
												
												
												if($New_Surveys_Publish == 1 && $New_Surveys_Approve == 1 && $New_Surveys_Count <= 3){ ?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-bar-chart"></i><a href="<?php echo SITE_URL;?>survey_forms.php?meid=new_surveys&status=seen">Surveys</a></li>
												
												<?php }
												
												if($Covid_Society_Notices == 1 && $Covid_Society_Notices_Count <= 3){ ?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>covid_files_download.php?meid=Society_Notices&status=seen">Society Nocites</a></li>
												
												<?php }
												
												
												if($Covid_Government_Directives == 1 && $Covid_Government_Directives_Count <= 3){ ?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>covid_files_download.php?meid=Government_Directives&status=seen">Government Directives</a></li>
												
												<?php }
												
												if($Covid_Grocery_Home_Delivery_List == 1 && $Covid_Grocery_Home_Delivery_List_Count <= 3){ ?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>grocery_list.php?meid=Grocery_list&status=seen">Grocery Home Delivery List</a></li>
												
												<?php }
												
												if($Document_Form == 1 && $Document_Form_Count <= 3){ ?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>files_download.php?meid=Forms&status=seen">Forms</a></li>
												
												<?php }
												if($Document_Societyrules == 1 && $Document_Societyrules_Count <= 3){?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules&status=seen">Society Rules</a></li>
												
												<?php }
												if($Document_RWA_Byelaws == 1 && $Document_RWA_Byelaws_Count <= 3){?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>files_download.php?meid=Byelaws&status=seen">RWA Byelaws</a></li>
												
												<?php }
												if($Document_Contruction_Guideline == 1 && $Document_Contruction_Guideline_Count <= 3){ ?>
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>files_download.php?meid=Guidelines&status=seen">Construction Guidelines</a></li>
												
												<?php }
												if($Document_Notices == 1 && $Document_Notices_Count <= 3){ ?>
												
												<li class="list-group-item">
												    <i aria-hidden="true" class="fa fa-folder-open"></i><a href="<?php echo SITE_URL;?>files_download.php?meid=Notices&status=seen">Notices</a></li>
												
												<?php }
												if($Event_Notification == 1 && $Event_Notification_Count <=3){  ?>
												    <li class="list-group-item">
												        <i aria-hidden="true" class="fa fa-folder-open"></i><a href="event.php?eventstatus=seen&eid=<?php echo $HomeEventsVal['id'];?>"><?php echo $HomeEventsVal['event_name'];?></a></li>
												<?php }
												
												
												?>
												<li >&nbsp;&nbsp;</li>
                                                    
                                                  </ul>
                                                  <?php } ?>
                                                  
                                                  <?php
                                                  if($Notification_Count <> 0){ ?>
                                                  <div class="footer text-center">
                                                      <a href="<?php echo SITE_URL;?>notification.php">See all notifications &nbsp;<i class="fa fa-angle-double-right" style="font-size:18px"></i></a>
                                                  </div>
                                                  <?php } ?>
                                                </div>
												
												
											
												
												<font color="white">______________________________________________________</font><br>
											</div>
										</li>	


                  <li><a href="<?php echo SITE_URL;?>logout.php" class="log" onclick="return confirm('Are you sure you want to logout now ?')" id="navbar-sign-in">Logout</a></li>
                  <?php } else { ?>
                  <li><a href="<?php echo SITE_URL;?>login_signup.php" class="log" id="navbar-sign-in">Sign In / Sign Up</a></li>
                  <?php } ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Navigation ends -->
    </div>
  </div>
</div>
