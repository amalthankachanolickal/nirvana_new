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

@media only screen and (max-width: 768px) {
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
</style>
<div class="menu-area navbar-fixed-top">
  <div class="container-fluid" style="">
    <div class="row">
      <!-- Navigation starts -->
      <div class="col-md-12">
        <div class="mainmenu">
          <div class="navbar navbar-nobg">
            <div class="navbar-header"> <a class="navbar-brand" href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" alt=""></a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <div class="show-on-small">
        <a href="http://therwa.in//help-folder/Nirwana%20to%20Home%20Screen.mp4" title="Click here to know how to Add to your mobile Home Screen and access at ease." target="_blank"><i class="fa fa-mobile" style="font-size: 32px; line-height: 26px;"></i></a> 
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
                     
      <a class="nav-link dropdown-toggle" href="<?php echo SITE_URL;?>about_us.php" id="navbardrop" data-toggle="dropdown">NRWA</a>
      <div class="dropdown-menu dropdown-menu-left" style="width:200px">
      <?php if($_SESSION['UR_LOGINID']!=''){?>
        <?php if( !isset($_SESSION['user_type']) || $_SESSION['user_type']==0 ) { 
        if(count($getmemberChecklist)>0){?>
          <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getmemberChecklist['document_file'];?>" target="_blank">Members Checklist</a><br>
         <?php }
          }?>
  <?php }?>
  <?php  if(count($getContactlist)>0){?>
 <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getContactlist['document_file'];?>" target="_blank">Important Contacts</a><br> 
  <?php }?>
       <!-- <a href="https://www.youtube.com/watch?v=FhQJxpvXE_c" target="_blank">Nirvana Video Clip</a> -->
       <a href="#videoModal" data-toggle="modal">Nirvana Video Clip</a>
        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=">Surveys</a><br> -->
        <?php if( !isset($_SESSION['user_type']) || $_SESSION['user_type']==0 ) { ?>
      <div>
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction1()" >Meetings</a>   
        <div id="div1" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          <a href="<?php echo SITE_URL;?>files_download.php?meid=GBMs">GBMs</a><br> 
            <a href="<?php echo SITE_URL;?>files_download.php?meid=EC_Meetings">EC Meetings</a><br> 
          <a href="<?php echo SITE_URL;?>files_download.php?meid=Attendance">Attendance</a><br> 
        </div>
      </div>
 <?php  }?>
       <div >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction10()" >Reports</a>   
       <div id="div10" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Exec_Smry_HSD"> Exec Smry + HSD</a><br>
      <font color="white">_____________________________________________________________</font>
      </div>
   </div> 
        <?php
       
if($_SESSION['EC'] && $_SESSION['EC']==1)

{
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
  
                  <?php if($_SESSION['UR_LOGINID']!=''){?>
              
                   
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
      <div id="divForms" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
        <a href="<?php echo SITE_URL;?>dhc_undertaking.php">DHC Undertaking</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Forms"> Other Forms</a><br>
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
   
                  <?php } else {?>
                 
          
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
     <font color="white">______________________________________________________</font><br>
      </div>
    </li>
                    
                        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Documents</a>
      <div class="dropdown-menu dropdown-menu-left">
      <div>
      <a  class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunctionForms()" >Forms</a><br>
      <div id="divForms" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
        <a href="<?php echo SITE_URL;?>dhc_undertaking.php">DHC Undertaking</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Forms"> Other Forms</a><br>
      </div>
      </div>
      <!-- <a href="<?php echo SITE_URL;?>dhc_undertaking.php" target="_blank">DHC Undertaking</a><br> -->
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Society_Rules">Society Rules</a><br>
      <div >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction2()" >Processes</a>   
      
      
      
      <div id="div2" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">NRWA byelaws</a><br>
     <!--  <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">Security Process</a><br>
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">HK Process</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">HOR Process</a><br>
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">Tech Process</a><br>
        <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes">WSOS</a><br>
    <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes"> DH Process -> Domestic Help Process </a><br>
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes"> labour Process</a><br> -->
       <a href="<?php echo SITE_URL;?>files_download.php?meid=Processes"> Construction guidelines</a><br>
  <font color="white">______________________________________________________</font><br>
      </div>
   </div>
      
  <!--    <a href="<?php echo SITE_URL;?>files_download.php?meid=Event_Photos">Event Photos <?php echo "        ";?> </a><br> -->
     <a href="<?php echo SITE_URL;?>files_download.php?meid=Notices">Notices</a><br>

   <!--    <a href="<?php echo SITE_URL;?>files_download.php?meid=Financial_reports">Financial reports</a><br>
      
       <div >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction3()" >Others</a>   
      
      
      
      <div id="div3" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          
      <!-- <a href="<?php echo SITE_URL;?>files_download.php?meid=Legal_Cases">Legal Cases</a><br>
      <a href="<?php echo SITE_URL;?>files_download.php?meid=Status_of_MCG_Takeover">Status of MCG Takeover</a><br>
     <font color="white">______________________________________________________</font><br>
      
  
      </div>
   </div> -->
   <font color="white">______________________________________________________</font><br>
      </div>
    </li>
                  <?php } ?>
                
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
        <!--   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Chat Forum</a>
      <div class="dropdown-menu dropdown-menu-left">
          
        <!--<a href="<?php echo SITE_URL;?>files_download.php?meid=">Surveys</a><br> -->
    <!--  <a href="">Coming Soon</a>
      </div>
    </li> -->
      
    
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
       <a href="https://online.ulbharyana.gov.in/eforms/PropertyTax.aspx" target="_blank">House Tax</a><br>
      

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
            <a href="https://www.ft.com/coronavirus-latest" target="_blank" >FT's Global Tracker</a><br>  
            <p>Please note that this is public information, put here for access of residents. NRWA Does not verify or endorse any application, website or data from these links</p>
        </div></br>
        <a href="<?php echo SITE_URL;?>dhc_undertaking.php" target="_blank">DHC Undertaking</a><br>
        <a class="dropdown-item" href="<?php echo SITE_URL;?>covid-dashboard.php">NRWA Dashboard</a> <br>
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown" onclick="myFunction11()">Self Isolation Form</a> 
        <div id="div11" class="dropdown-submenu" style="margin-left: 20px; display: none;"  >
          <a href="<?php echo SITE_URL;?>RWAVendor/documents/covid/self_declaration_covid_19.pdf" target="_blank">PDF</a><br> 
            <a href="<?php echo SITE_URL;?>RWAVendor/documents/covid/self declaration covid 19 (2).docx" target="_blank">WORD</a><br> 
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
        <a href="<?php echo SITE_URL; ?>help-folder/Nirwana%20to%20Home%20Screen.mp4" title="Click here to know how to Add to your mobile Home Screen and access at ease." target="_blank"><i class="fa fa-mobile" style="font-size: 32px; line-height: 26px;"></i></a> 
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
