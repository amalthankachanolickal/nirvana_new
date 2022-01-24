<?php 
include('geolocation.php');
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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-18"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'UA-55877669-18');

  


</script>



  <style>
        * {
            font-family:sans-serif;
        }

        .d-none {
            display: none !important;
        }

        a.disabled {
        pointer-events: none;
        cursor: default;
        }

        .navbar-nav>li>.dropdown-toggle::after{
            display: none;
        }

        .dropdown-submenu {
            position: relative;
        }

        .navbar-nav>li>.dropdown-menu {
            padding-right: 10px !important;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px 6px;
            border-radius: 0 6px 6px 6px;
          /*  width: 150%; */
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #cccccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #555;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -2000%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }

        /* * li {
            border-bottom: 1px solid #fefefe;
        } */

        * li a:hover {
            color: #37a000 !important;
        }

        * li a.text-secondary:hover {
            /* color: #fff !important; */
            background-color: #fff;
            color: #747474 !important;
        }

        header nav {
            padding: 10px 0 !important;
            background-color: #fff !important;
        }

        header nav * {
            color: #333333 !important;
            /*font-weight: bold !important;*/
            font-family: "Open Sans";
        }

        .navbar-collapse {
            background-color: #f8f8f8;
        }

        * .text-secondary {
            color: #747474 !important;
        }

        .full-width-dropdown {
            width: 110vw;
            min-height: 100px;
            left: -70vw;
            top: 50px;
            background-color: #e7e7e7;
        }
        
        .notification-list li a {
            border-bottom: 1px #ccc solid;
        }


        @media only screen and (max-width: 767px) {
            /* small screens */
            .d-sm-none {
                display: none !important;
            }
            
            .navbar-nav {
                margin-top: 0 !important;
            }
            
            .dropdown-submenu>.dropdown-menu {
                padding-left: 10px;
            }

            header .navbar-nav {
              /* width: 100% !important; */
              /* padding-left: 8px; */
              margin-left: 0px;
              max-width: 100%;
            }
            
            header .navbar-nav li {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            header .navbar-nav li a {
                margin-top: 0 !important;
                /*padding-left: 20px;*/
                border-bottom: 1px solid #ccc;
                padding-top: 6px;
                padding-bottom: 6px;
                padding-left: 8px;
            }
            
            .notification-list li a {
                padding-left:20px;
            }
            
        }

        @media only screen and (min-width: 767px) {
            /* big screens */
            .d-md-none {
                display: none !important;
            }
            
            .navbar-collapse {
                background-color: #fff;
            }
            .dropdown:hover > .dropdown-menu {
                /* for hover thing */
                display: block;
                margin-top: 0; 
                /* // remove the gap so it doesn't close */
            }
            .dropdown:hover .dropdown-menu li a {
                padding-top: 6px;
                padding-bottom: 6px;
            }

            header .navbar-nav li a {
              padding-left: 6px;
              padding-right: 6px;
              margin-top: 0 !important;
            }

            header .navbar-nav ul li a {
              margin-top: 0;
            }
            
            header .sign-in-up-btn {
                margin-right: 8px;
            }
            
            .dropdown-submenu>.dropdown-menu {
                min-width:fit-content;
                max-width:fit-content;
                padding-right:5px;
            }
        }
        
        .btn {
            border-radius: 4px;
            padding-top: 6px !important;
            padding-bottom: 6px !important;
        }

        .btn-green {
            background-color: #37a000;
            color: #fff !important;
        }

        .btn-green:hover {
            background-color: #4f08c6 !important;
          
            color: #ffffff !important;
            color: white !important;
        }
        
        /*.hover-text-white:hover {*/
        /*    color: #fff !important;*/
        /*}*/

        html, body {
          overflow-x: hidden;
          width: 100vw;
        }
        
        header .navbar-collapse {
            max-height: 400px !important;
        }
        
        /*.menu-hr {*/
        /*    margin-top: 0;*/
        /*    margin-bottom: 0;*/
        /*    padding-top: 0;*/
        /*    padding-bottom: 0;*/
        /*    height: 1px;*/
        /*    background-color: #;*/
        /*    border: none;*/
        /*}*/

.adword {
    padding-bottom:10px;
    
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
if($Avatar_link == NULL || $Avatar_link == ''){
$Notification_Count++;
$Avatar_Count = $Notification_Count;
}
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

<header>
    <nav class="navbar navbar-default navbar-fixed-top" style="padding-bottom: 0 !important;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1"
                    aria-expanded="false" style="border: none;"> <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background: #37a000;"></span>
                    <span class="icon-bar" style="background: #37a000;"></span>
                    <span class="icon-bar" style="background: #37a000;"></span>
                </button>
                <a class="navbar-brand" href="<?php echo SITE_URL;?>"  style="margin-top: 6px; padding: 0;">
                    <img alt="Brand"  src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" style="height: 100%; width: auto; padding: 4px;">
                </a>
                
                <a href="<?php echo SITE_URL; ?>help-folder/Nirwana%20to%20Home%20Screen.mp4" title="Click here to know how to Add to your mobile Home Screen and access at ease." target="_blank" style="padding: 6px; float:right;" class="d-md-none navbar-right">
                    <img src="<?= SITE_URL ?>images/tablet.png" alt="tablet" style="max-height: 40px; padding: 2px;">
                </a>
                   <?php if($_SESSION['UR_LOGINID']!=''){?>
                <div class="dropdown d-md-none" style="float: right; padding-top: 12px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o" style="font-size:26px"></i>
                    </a>
                    <ul class="dropdown-menu full-width-dropdown notification-list">
                        
                        	<?php if($Notification_Count == 0){?>
    								<li>
                                        <a href="#" style="text-align: center;" disabled>
                                            <i class="fa fa-envelope-o" style="font-size: 40px"></i>
                                            <br>
                                            No New Notifications
                                        </a>
                                     </li>
								<?php } else { ?>
								        	<?php if(($MobileNumber == NULL || $MobileNumber == '') && $MobileNumber_Count <= 3){?>
        								  <li><a href="<?php echo SITE_URL;?>user_profile.php">Update Mobile</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Approval_Status == 1 && $First_Login == 1 && $Admin_Approval == 1 && $Approval_Count <= 3){?>
        								  <li><a href="<?php echo SITE_URL;?>index.php?approvalstatus=seen">Approved by Admin/Owner</a></li>
        								  	<?php } ?>
        								  		<?php if($Tenant == 1 &&  $Tenant_Count <=3){?>
        								  <li><a href="<?php echo SITE_URL;?>housedetails.php?tenantstatus=seen">Tenant Added</a></li>
        								  	<?php } ?>
        								  		<?php if($New_Surveys_Publish == 1 && $New_Surveys_Approve == 1 && $New_Surveys_Count <= 3){ ?>
        								  <li><a href="<?php echo SITE_URL;?>survey_forms.php?meid=new_surveys&status=seen">Surveys</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Covid_Society_Notices == 1 && $Covid_Society_Notices_Count <= 3){ ?>
        							 	  <li><a href="<?php echo SITE_URL;?>covid_files_download.php?meid=Society_Notices&status=seen">Society Nocites</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Covid_Government_Directives == 1 && $Covid_Government_Directives_Count <= 3){ ?>
											
        								  <li><a href="<?php echo SITE_URL;?>covid_files_download.php?meid=Government_Directives&status=seen">Government Directives</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Document_Form == 1 && $Document_Form_Count <= 3){ ?>
        								  <li><a href="<?php echo SITE_URL;?>files_download.php?meid=Forms&status=seen">Documents</a></li>
        								  	<?php } ?>
								<?php } ?>
                            
                            
                        <!--<li>-->
                        <!--    <a href="#" style="text-align: center;" disabled>-->
                        <!--        <i class="fa fa-envelope-o" style="font-size: 40px"></i><br>-->
                        <!--        No New Notifications-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!-- submenu end -->
                    </ul>
                </div>
                    <?php }?>
            </div>

            <!-- menu items start -->
            <div id="navbar1" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right"> <!-- add navbar-right -->
                    <li>
                        <a href="<?php echo SITE_URL;?>about_us.php">About Us</a>
                    </li>
<!--<hr class="menu-hr">-->
                    <!-- myRWA -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform: none !important;">myRWA</a>
                        <ul class="dropdown-menu">
                               <li>
                                        <a href="<?php echo SITE_URL;?>directory.php" >Residents Directory</a>
                                    </li>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Elections</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo SITE_URL;?>/files_download.php?meid=Election_Schedule">Schedule</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>/elections.php">Know your Candidates</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>/uploads/Nomination of candidate.pdf" target="_blank">Election Candidates PDF</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->
                            
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Membership Status</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a  href="<?php echo SITE_URL;?>your-membership-details.php">Your Membership</a>
                                    </li>
                                    <li class="dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                              <a href="<?php echo SITE_URL;?>member_status.php?status=Yes">Members List </a>
                                            </li>
                                            
                                            <li>
                                              <a href="<?php echo SITE_URL;?>member_status.php?status=Docs Pending" >Pending Members' List</a>
                                            </li>
                                            <li>
                                                 <a href="<?php echo SITE_URL;?>member_status.php?status=N/A" >Non-Membership List</a>
                                            </li>
                                            <!-- submenu end -->
                                        </ul>
                                    </li>
                                    <li>
                                        <a  href="<?php echo SITE_URL;?>your-membership-details.php">Update your Membership</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>membership.php" >RWA Membership Form</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->
                            <?php if($_SESSION['UR_LOGINID']!=''){?>
                            
                                    <?php if( !isset($_SESSION['user_type']) || $_SESSION['user_type']==0 ) { 
                            
                                    if(count($getmemberChecklist)>0){?>
                                        <li>
                                             <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getmemberChecklist['document_file'];?>" target="_blank">Members Checklist</a>
                                        </li>
                                    
                            
                                     <?php }
                            
                                      }?>
                            
                              <?php }?>
                                  <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts</a>
                                <ul class="dropdown-menu">
                                    <li>
                                      <a href="<?php echo SITE_URL;?>/files_download.php?meid=Accounts">NRWA Balance Sheets</a>
                                      <a href="<?php echo SITE_URL;?>/files_download.php?meid=Electricity_Bill">NRWA Electricity Bills</a>
                                      <a href="<?php echo SITE_URL;?>/files_download.php?meid=Water_And_Sewer_Bills">NRWA Water & Sewer Bills</a>
                                    </li>
                                    
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            
                             
                               <?php  if(count($getContactlist)>0){?>
                            <li>
                                <a  href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getContactlist['document_file'];?>" target="_blank">Important Contacts</a>
                            </li>
                            <?php }?>
                            <li>
                                <a href="#videoModal" data-toggle="modal">myRWA Video Clip</a>
                            </li>
                            <?php if( !isset($_SESSION['user_type']) || $_SESSION['user_type']==0 ) { ?>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Meetings</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo SITE_URL;?>files_download.php?meid=GBMs" >GBMs</a>
                                    </li>
                                    
                                    <li>
                                        <a  href="<?php echo SITE_URL;?>files_download.php?meid=EC_Meetings" >EC Meetings</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>files_download.php?meid=Attendance" >Attendance</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <?php  }?>
                            <!-- dropdown menu end -->

                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports</a>
                                <ul class="dropdown-menu">
                                    <li>
                                         <a href="<?php echo SITE_URL;?>files_download.php?meid=Exec_Smry_HSD" >Exec Smry + HSD</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                           
                            <!-- dropdown menu end -->
                             <?php if($_SESSION['EC'] && $_SESSION['EC']==1){ ?>
                            <li>
                               <a href="<?php echo SITE_URL;?>files_download.php?meid=EC_Documents" >EC Documents</a>
                            </li>
                            <?php }?>
                            
                            
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Communication Channels</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo SITE_URL;?>uploads/Nirvana_Residents_Google_Group.pages" target="_blank">Nirvana Residents Google Group</a>
                                        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules&status=seen">Nirvana Residents Google Group</a>-->
                                        
                                    </li>
                                    
                                    <li>
                                        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules&status=seen">Nirvana Residents GG Policy</a>-->
                                        <a href="<?php echo SITE_URL;?>uploads/Nirvana_Residents_GG_Email_Policy.docx" target="_blank" >Nirvana Residents GG Policy</a>
                                    </li>
                                    
                                    <li>
                                        <a  href="<?php echo SITE_URL;?>googleForm.php" >GG Online Form</a>
                                    </li>
                                   
                                </ul>
                            </li>
                            
                            
                            
                            <li>
                                 <a href="<?php echo SITE_URL;?>doc_cert.php" target="_blank">Docs & Certificates</a>
                            </li>
                            <li>
                                 <a href="<?php echo SITE_URL;?>#about">Contact Us</a>
                            </li>
                        </ul>
                        <!-- item end -->
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules&status=seen">Society Rules</a>
                    </li>
                    <!-- Services -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo SITE_URL;?>medical-services.php" >Medical Services</a>
                            </li>

                            <li>
                               <a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Services">Society Services</a>
                            </li>
                            
                            <li>
                               <a href="<?php echo SITE_URL;?>domestic_services.php">Domestic Help Info</a>
                            </li>
                              
                            
                             <?php  if(count($getEscalation_matrix)>0){?>
                            <li>
                                 <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getEscalation_matrix['document_file'];?>" target="_blank">Escalation Matrix</a>
                            </li>
                             <?php }?>
                            <li>
                               <a href="<?php echo SITE_URL;?>files_download.php?meid=Monthly_performance_MMR">Monthly Performance MMR</a>
                            </li>

                            <li>
                                 <a href="<?php echo SITE_URL;?>survey_forms.php?meid=new_surveys&status=seen">Surveys</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>survey_results.php">Survey Result</a>
                            </li>
                            <!-- dropdown menu end -->
                        </ul>
                        <!-- item end -->
                    </li>

                    <!-- Documents -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documents</a>
                        <ul class="dropdown-menu">
                             
                            
                            
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forms</a>
                                <ul class="dropdown-menu">
                                   <!-- <li>
                                        <a href="<?php echo SITE_URL;?>CovidVaccineForm.php" target="_blank">COVID Vaccination</a>
                                    </li>-->
                                    <li>
                                        <a href="<?php echo SITE_URL;?>dhc_undertaking.php">DHC Undertaking</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo SITE_URL;?>googleForm.php">Google Group Joining</a>
                                    </li>
                                    <!--<li>
                                        <a href="<?php echo SITE_URL;?>Plasma_Form.php">Plasma Donor Form</a>
                                    </li>-->

                                    <!--<li>-->
                                    <!--    <a href="<?php echo SITE_URL;?>self_isolation_form_start.php">Self Isolation Start Declaration</a>-->
                                    <!--</li>-->
                            <!--
                                    <li>
                                        <a href="<?php echo SITE_URL;?>self_isolation_form.php">Self Isolation End Declaration</a>
                                    </li>-->

                                    <li>
                                        <a href="<?php echo SITE_URL;?>tenant_checkout_form.php">Tennants Checkout Forms</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>membership.php" >RWA Membership Form</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo SITE_URL;?>files_download.php?meid=Forms">Other Forms</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->

                            <!--<li>-->
                            <!--    <a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules&status=seen">Society Rules</a>-->
                            <!--</li>-->

                            <!--<li class="dropdown dropdown-submenu">-->
                            <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Processes</a>-->
                            <!--    <ul class="dropdown-menu">-->
                            <!--        <li>-->
                            <!--            <a href="<?php echo SITE_URL;?>files_download.php?meid=Byelaws&status=seen" >RWA By-Laws</a>-->
                            <!--        </li>-->

                            <!--        <li>-->
                            <!--            <a  href="<?php echo SITE_URL;?>files_download.php?meid=Guidelines&status=seen" >Construction Guidelines</a>-->
                            <!--        </li>-->
                                    <!-- submenu end -->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!-- dropdown menu end -->
                        </ul>
                        <!-- item end -->
                    </li>

                    <!-- Initiatives -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Initiatives</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">HT/LT Repairs</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Car Stickers</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Construction Ban Implemented</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Trees Washed with STP Water</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">No Crackers in Diwali</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Society Connect Application Launched</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">RWA Launched</a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Initiatives">Other Key Achievements</a>
                            </li>
                            <!-- dropdown menu end -->
                        </ul>
                        <!-- item end -->
                    </li>

                    <!-- Bills -->
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bills</a>
                        <ul class="dropdown-menu">
                           <!-- <li>
                                <a href="<?php echo SITE_URL;?>bills.php">Cam Bills</a>
                            </li>-->
                            
                             <li class="dropdown dropdown-submenu ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">NRWA Ac Details for Online Bill Payment</a>
                                <ul class="dropdown-menu">
                                   
                                    <li>
                                        <a href="<?php echo SITE_URL;?>bills.php" target="_blank">
                        				Nirvana RWA Maintenance A/c</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>bills.php" target="_blank">
                        				Account No. 184301000717</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>bills.php" target="_blank">
                        				IFSC Code ICIC0001843</a>
                                    </li>

                                   
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->

                            <li class="dropdown dropdown-submenu">
                               <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unreconcciled Rcpt</a>-->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo SITE_URL;?>UnRecon-converted.pdf" target="_blank">Download PDF</a>
                                    </li>

                                    <li>
                                        <a  href="<?php echo SITE_URL;?>UnRecon.xlsx" target="_blank">Download Excel</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->

                            <li>
                                <a  href="https://epayment.dhbvn.org.in/" target="_blank">DHBVN</a>
                            </li>

                            <li>
                                <a href="https://www.mcg.gov.in/HouseTax.aspx" target="_blank">Property Tax - MCG Site</a>
                            </li>
                              <li>
                                <a href="<?php echo SITE_URL;?>house_tax_details_new.php">Property Tax Details</a>
                            </li>

                            <li class="dropdown dropdown-submenu">
                                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Newspaper</a>-->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo SITE_URL;?>newspaper.php?meid=Newspapers">Annual Subscription</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo SITE_URL;?>user_newspaper.php">Subscribed Newspapers</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo SITE_URL;?>user_news_paper_bill.php">Newspaper Bills</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->
                        </ul>
                        <!-- item end -->
                    </li>

                    <!-- Covid Response -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Covid Response</a>
                        <ul class="dropdown-menu">
                          <!--<li>
                                        <a href="<?php echo SITE_URL;?>Plasma_Form.php">Plasma Donor Form</a>
                                    </li>
                            <li>
                                        <a href="<?php echo SITE_URL;?>covid-dashboard.php">Plasma Donor List</a>
                            </li>-->
                            <li class="dropdown dropdown-submenu">
                               <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Self Isolation Form</a>-->
                                <ul class="dropdown-menu">
                                     <!--<li>
                                        <a href="<?php echo SITE_URL;?>Plasma_Form.php">Plasma Donor Form</a>
                                    </li>-->
                                    <li>
                                        <a href="<?php echo SITE_URL;?>self_isolation_form_start.php" >Self Isolation Start Declaration</a>
                                    </li>

                                    <li>
                                        <a  href="<?php echo SITE_URL;?>self_isolation_form.php" >Self Isolation End Declaration</a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->
                            <li class="dropdown">
                                <a href="<?php echo SITE_URL;?>files_download.php?meid=Covid_Videos" >COVID Videos</a>
                            </li>
                            <li>
                                        <a href="<?php echo SITE_URL;?>cov_protocol1.php">COVID Protocols</a>
                            </li>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Covid Trackers</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="https://www.mygov.in/aarogya-setu-app/?app=aarogya&target=browser" target="_blank">GOI App</a>
                                    </li>

                                    <li>
                                        <a  href="https://www.mygov.in/covid-19/" target="_blank">GOI Website</a>
                                    </li>

                                    <li>
                                        <a href="https://t.me/MyGovCoronaNewsdesk" target="_blank">GOI Telegram Channel</a>
                                    </li>

                                    <li>
                                        <a href="https://www.ft.com/coronavirus-latest" target="_blank">FT's Global Tracker</a>
                                    </li>

                                    <li>
                                        <a disabled class="text-secondary" style="font-size: 0.85em">
                                            Please note that this is public information,<br>
                                            put here for access of residents.<br>
                                            NRWA Does not verify or endorse any application,<br>
                                            website or data from these links
                                        </a>
                                    </li>
                                    <!-- submenu end -->
                                </ul>
                            </li>
                            <!-- dropdown menu end -->

                            <li>
                                <a href="<?php echo SITE_URL;?>dhc_undertaking.php">DHC Undertaking</a>
                            </li>

                            <!--<li>-->
                            <!--    <a href="<?php echo SITE_URL;?>covid-dashboard.php">NRWA Dashboard</a>-->
                            <!--</li>-->

                            

                            <li>
                                <a href="<?php echo SITE_URL; ?>covid_crisis_mgmt_team.php">
                                    Crisis Mgmt Team
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL; ?>covid_files_download.php?meid=Government_Directives&status=seen">
                                    Govt Directives
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL; ?>grocery_list.php?meid=Grocery_list&status=seen">
                                    Grocery Home Delivery Vendors
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo SITE_URL; ?>covid_files_download.php?meid=Society_Notices&status=seen">
                                    Society Notices
                                </a>
                            </li>
                        <?php  if(count($getovidInitiative)>0){?>
                            <li>
                                <a href="<?php echo SITE_URL.MAINADMIN;?>documents/covid/<?php echo $getovidInitiative['document_file'];?>" target="_blank">
                                    Initiatives by The NRWA
                                </a>
                            </li>
                          <?php }?>
                        </ul>
                        <!-- item end -->
                    </li>

                    <!-- Tablet Icon -->
                    <li style="padding: 0;" class="d-sm-none">
                      <a href="<?php echo SITE_URL; ?>help-folder/Nirwana%20to%20Home%20Screen.mp4" target="_blank" style="padding: 6px;">
                            <img src="<?php echo SITE_URL; ?>/images/tablet.png" alt="tablet" style="max-height: 36px;">
                        </a>
                    </li>

                    <!-- Web Site Benefit -->
                    <li class="d-sm-none">
                        <a href="<?php echo SITE_URL; ?>help-folder/5dce57cb73ab4Nirvana-Country-Features.pdf" target="_blank">
                            Web Site Benefits
                        </a>
                    </li>
                        <?php if($_SESSION['UR_LOGINID']!=''){?>
                    <!-- Hi Nishtha Gupta -->
                    <li class="dropdown d-sm-none">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo $_SESSION['UR_LOGINNAME'];?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a  href="<?php echo SITE_URL;?>user_profile.php" >User Details</a>
                            </li>

                            <li>
                                <a  href="<?php echo SITE_URL;?>housedetails.php" >House Details</a>
                            </li>
                            <!-- submenu end -->
                        </ul>  
                    </li>
                    
                    <!-- Notifications -->
                    <li class="dropdown d-sm-none">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-right: 10px;">
                            <i class="fa fa-bell-o" style="font-size:20px"></i>
                        </a>
                        <ul class="dropdown-menu notification-list">
                            	<?php if($Notification_Count == 0){?>
    								<li>
                                        <a href="#" style="text-align: center;">
                                            <i class="fa fa-envelope-o" style="font-size: 40px"></i>
                                            <br>
                                            No New Notifications
                                        </a>
                                     </li>
								<?php } else { ?>
								        	<?php if(($MobileNumber == NULL || $MobileNumber == '') && $MobileNumber_Count <= 3){?>
        								  <li><a href="<?php echo SITE_URL;?>user_profile.php">Update Mobile</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Approval_Status == 1 && $First_Login == 1 && $Admin_Approval == 1 && $Approval_Count <= 3){?>
        								  <li><a href="<?php echo SITE_URL;?>index.php?approvalstatus=seen">Approved by Admin/Owner</a></li>
        								  	<?php } ?>
        								  		<?php if($Tenant == 1 &&  $Tenant_Count <=3){?>
        								  <li><a href="<?php echo SITE_URL;?>housedetails.php?tenantstatus=seen">Tenant Added</a></li>
        								  	<?php } ?>
        								  		<?php if($New_Surveys_Publish == 1 && $New_Surveys_Approve == 1 && $New_Surveys_Count <= 3){ ?>
        								  <li><a href="<?php echo SITE_URL;?>survey_forms.php?meid=new_surveys&status=seen">Surveys</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Covid_Society_Notices == 1 && $Covid_Society_Notices_Count <= 3){ ?>
        							 	  <li><a href="<?php echo SITE_URL;?>covid_files_download.php?meid=Society_Notices&status=seen">Society Nocites</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Covid_Government_Directives == 1 && $Covid_Government_Directives_Count <= 3){ ?>
											
        								  <li><a href="<?php echo SITE_URL;?>covid_files_download.php?meid=Government_Directives&status=seen">Government Directives</a></li>
        								  	<?php } ?>
        								  		<?php 	if($Document_Form == 1 && $Document_Form_Count <= 3){ ?>
        								  <li><a href="<?php echo SITE_URL;?>files_download.php?meid=Forms&status=seen">Documents</a></li>
        								  	<?php } ?>
								<?php } ?>
                            
                            <!-- submenu end -->
                        </ul>  
                    </li>
                      <li>
                        <a href="<?php echo SITE_URL;?>logout.php"  onclick="return confirm('Are you sure you want to logout now ?')" class="btn btn-green sign-in-up-btn" style="margin-top: 6px !important;  color:white !important;">
                            Logout
                        </a>
                    </li>
                    <?php } else {?>
                    <!-- Logout Signin Signup Button -->
                    <li>
                        <a  href="<?php echo SITE_URL;?>login_signup_back.php" class="btn btn-green sign-in-up-btn" style="margin-top: 6px !important; color:white !important;">
                            Sign In / Sign Up
                        </a>
                    </li>
                    <?php }?>
                    <!-- main list ending -->
                </ul>
            </div>
            <!-- menu items end -->
            
        </div>
    </nav>
</header>

