<?php
include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');
$first=1;
/*--------------Block filter------------*/
if($_REQUEST['block']){
if($first){
$where= "where";
$where=$where.' block like "%'.$_REQUEST['block'].'%"';
}
else{
$where=$where.' and block like "%'.$_REQUEST['block'].'%"';
}
$first=0;
}
/*--------------House number filter------------*/
if($_REQUEST['house_no']){
if($first){
$where= "where";
$where=$where.' flat_no like "%'.$_REQUEST['house_no'].'%"';
}
else{
$where=$where.' and flat_no like "%'.$_REQUEST['house_no'].'%"';
}
$first=0;
}
/*--------------Profession------------*/
if($_REQUEST['profession']){
if($first){
$where= "where";
$where=$where.' 1st_owner_professsion like "%'.$_REQUEST['profession'].'%"';
}
else{
$where=$where.' and 1st_owner_professsion like "%'.$_REQUEST['profession'].'%"';
}
$first=0;
}
/*--------------user type------------*/
if($_REQUEST['usertype']){
if($first){
$where= "where";
$where=$where.' ownership_type like "%'.$_REQUEST['usertype'].'%"';
}
else{
$where=$where.' and ownership_type like "%'.$_REQUEST['usertype'].'%"';
}
$first=0;
}
$getMembers = $ModelCall->rawQuery("SELECT * FROM `resident_directory_new`  ".$where." ORDER BY id");

//print_r($ModelCall);
   
if(isset($_SESSION['UR_LOGINID']) && $_SESSION['UR_LOGINID']!=""){
                                                
 $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

    $rec = $ModelCall->get("Wo_Users");
    
}
// Get the data    


?>
<!DOCTYPE html>
<html>
 <head>
<!-- meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"       content="width=device-width, initial-scale=1.0">
<meta name="description"    content="">
<meta name="keywords"       content="">
<meta name="author"         content="">
<!-- Site title -->
<title><?php echo SITENAME?> - Residents Directory</title>
<meta name="keywords" content="Residents Directory"/>
<meta name="description" content="Residents Directory"/>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
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
<style>
table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th.dtr-control:before{
    margin-top:0px !important;
    top:10% !important;
}
    
table.dataTable thead .sorting, table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc {
    background-image: none;
}

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
  </head>
  <body>
    <!-- Navigation area starts -->
    <?php include(ROOTACCESS."front_header.php");?>
    <!-- Navigation area ends -->
    <div class="clearfix"></div>
    <br><br><br>
    <section class="news-area section-small">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           <div class="container">

         <h1 style="text-decoration: underline;" class="tile-page-h2 text-center">Residents Directory</h1>
        </div>
         <!--============================filter===========================-->
 <form class="" action="directory.php" method="post" enctype="multipart/form-data">
             
            
            <div class="row">
                 <div class="col-sm-1">
                </div>
                <div class="col-sm-2 ">
                <div class="form-group">
                        <select id="block" name="block" class="form-control">
                            <option value="">Block</option>
                            <option value="AG">Aspen Greens</option>
                            <option value="BC">Birch Court</option>
                            <option value="CC">Cedar Crest</option>
                            <option value="DE">Deerwood Estate</option>
                            <option value="ES">E Space</option>
                            
                        </select>
                   
                </div>
              </div>
              <div class="col-sm-2 ">
                <div class="form-group">
                        <input type="number" id="house_no" name="house_no" value="<?php echo $_REQUEST['house_no'];?>" placeholder="House #" class="form-control">
                </div>
              </div>
              <div class="col-sm-2 ">
              <div class="form-group">
                        <select id="usertype" name="usertype" class="form-control">
                            <option value="">User Type</option>
                            <option value="Single Owner">Single Owner</option>
                            <option value="Joint Owner">Joint Owner</option>
                            <option value="Tenant">Tenant</option>
                            <!--<option value="Company">Company</option>-->
                            <!--<option value="HUF">HUF</option>-->
                        </select>
                   
                </div>
                </div>
                <div class="col-sm-2 ">
                <div class="form-group">
                        <input type="text" id="profession" name="profession" value="<?php echo $_REQUEST['profession'];?>" placeholder="Profession" class="form-control">
                </div>
              </div>
                <div class="col-sm-1">
                <label class="control-label"></label>
                <button type="submit" class="btn-sm btn-success" style='height:40px;width:40px;background-color:#37a000;border:1px #37a000;'>
                <i class="fa fa-search"></i>
                </button>
              </div>
              </div>
        
              
              
              
      
              
              
          </form>
    <!--===================================================================-->
   
        <?php

    if ($_REQUEST['actionResult'] == 'sent') { ?>
      <p style="color:#37a000">Mail and Message Successfully Sent.</p>
  <?php
    } ?>
            <div style="overflow-x:auto;">
            <div class="table-responsive" >
          <table style='width:80vw' align ='center' class="table table-striped table-hover display nowrap" id="dataTable">
     
                <caption class="sr-only">Table example</caption>
                
                <thead class="bg-primary">
                  <tr>
                  
                    <th scope="col">Block</th>
                     <th scope="col">House No.</th>
                      <th scope="col">Name </th>
                       <!--<th scope="col" style="nowrap"> Onwer/ Tenant </th>-->
                       <!--<th scope="col" style="nowrap"> Resident/Non Resident </th>-->
                  <th scope="col">Profession </th>
                    <th scope="col"><i  class='fa fa-envelope-o'></i><span>&nbsp;/&nbsp;</span><i class='fa fa-phone'></i></th>
                      
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                  $c=1;
                  foreach($getMembers as $Get_Members){
                  $id=$Get_Members['id']; 
                  
                  ?>
                  
                  <tr>
                    
                      <td style="cursor:pointer" data-toggle="modal" data-target="#info<?php echo $Get_Members['id']?>"><?php echo $Get_Members['block'];?></td>
                      <td style="cursor:pointer" data-toggle="modal" data-target="#info<?php echo $Get_Members['id']?>"><?php echo $Get_Members['flat_no'];?></td>
                      <td style="cursor:pointer" data-toggle="modal" data-target="#info<?php echo $Get_Members['id']?>"><?php  if($_SESSION['UR_LOGINID'] != ''){ 
                      echo $Get_Members['1st_owner_first_name']. " ". $Get_Members['1st_owner_middle_name'].  " ".$Get_Members['1st_owner_last_name']; } 
                      else { echo substr($Get_Members['1st_owner_first_name'],0,2)."XXXXXXXX"; }?></td>
                        <!--<td style="cursor:pointer" data-toggle="modal" data-target="#info<?php echo $Get_Members['id']?>"><?php echo $Get_Members['ownership_type'];?></td>-->
                        <!--<td style="cursor:pointer" data-toggle="modal" data-target="#info<?php echo $Get_Members['id']?>">-->
                        <!--    <?php // if($Get_Members['resident_residing_status'] == 0){ echo "Non Resident"; } else if($Get_Members['resident_residing_status'] == 1){ echo "Resident"; } ?>-->
                        <!--</td>-->
                        <td style="cursor:pointer" data-toggle="modal" data-target="#info<?php echo $Get_Members['id']?>"><?php echo $Get_Members['1st_owner_professsion'];?></td>
                        <td style="cursor:pointer" data-toggle="modal" data-target="#sendmail_n_sms<?php echo $Get_Members['id']?>">
                        <i  style="color:#4267B2;font-size:18px;" class='fa fa-envelope-o'></i><span style="color:#4267B2">&nbsp;/&nbsp;</span><i  style="color:#4267B2;font-size:18px" class='fa fa-phone'></i>
                        </td> 
                        <!-- Contact Member Modal -->
            <div class="modal fade" id="sendmail_n_sms<?php echo $Get_Members['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <center><h4 class="modal-title" id="exampleModalLabel">Send Mail & SMS</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="controller/directory_controller.php">
                          <input type="hidden" value="<?php echo $Get_Members['primary_mobile_number']?>" name="resident_mobile" id="resident_mobile">
                        <input type="hidden" value="<?php echo $Get_Members['primary_email']?>" name="resident_email" id="resident_email">
                        <input type="hidden" value="<?php echo $Get_Members['id']?>" name="resident_member_id" id="resident_member_id">
                        <div class="row">
                            <div class="col-sm-2">
                                <select name="requestor_title" class="form-control"> 
    		                        <option value="Mr." <?php if ($rec[0]['user_title'] == "Mr.") { ?> selected <?php }?>>Mr.</option>
    		                        <option value="Mrs." <?php if ($rec[0]['user_title'] == "Mrs.") { ?> selected <?php }?>>Mrs.</option>
    		                        <option value="Ms." <?php if ($rec[0]['user_title'] == "Ms.") { ?> selected <?php }?>>Ms.</option>
		                        </select>
		                    </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="First Name" value="<?php echo $rec[0]['first_name'] ?>" name="resquestor_fname" id="resquestor_fname" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Middle Name" value="<?php echo $rec[0]['user_name'] ?>" name="resquestor_mname" id="resquestor_mname" >
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $rec[0]['last_name'] ?>" name="resquestor_lname" id="resquestor_lname" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="email" class="form-control" placeholder="Your Email" value="<?php echo $rec[0]['user_email'] ?>" 
                                <?php if($_SESSION['UR_LOGINID']<>''){ ?> readonly <?php } ?>
                                name="resquestor_email" id="resquestor_email" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                <input type="text" class="form-control" minlength="3" maxlength="3" placeholder="Isd"
                                <?php if($_SESSION['UR_LOGINID']<>''){ ?> readonly <?php } ?>
                                value="+91" name="resquestor_isd" id="resquestor_isd" onblur="validateNumber()" required>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" minlength="10" maxlength="10"
                                <?php if($_SESSION['UR_LOGINID']<>''){ ?> readonly <?php } ?>
                                placeholder="Your Mobile" value="<?php echo $rec[0]['phone_number'] ?>" name="resquestor_mobile" id="resquestor_mobile" onblur="validateNumber()" required>
                            </div>
                        </div>
                        <br>
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="3" maxlength="100" placeholder="Type your message here..." name="msg11" id="msg11" required></textarea>
                                <span id="rchars" class="text-right" style="color:red">100</span> <span style="color:red">characters remaining</span>
                            </div>
                        </div>
                          <div class="col-lg-12 no-pdd">       <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox"  name="plasma_check" value="1" checked >
                              <span  class="checkmark" style="top:auto !important"></span> </label>
                               <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;"> 
                               Yes, I understand and agree to the Nirvana Country Terms of Use. <a href="terms_conditions.php" target="_blank">Terms of Use.</a> 
                               </small></div>
                            <!--fgt-sec end-->
                          </div>
                           </div>
                        <br>
                         
                        <center><button type="submit" class="btn" name="request" id="request" style="background-color:#37a000"><b>Send</b></button></center>
                      </form>
                    
                  </div>
                </div>
              </div>
            </div>

                        
                        <!-- Info Modal -->
            <div class="modal fade" id="info<?php echo $Get_Members['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <center><h4 class="modal-title" id="exampleModalLabel">User Info</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                            <?php if($Get_Members['ownership_type'] == 'Single Owner'){ ?>
                            <div class="col-sm-12">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="Fullname" value="<?php echo $Get_Members['1st_owner_first_name']. " ". $Get_Members['1st_owner_middle_name'].  " ".$Get_Members['1st_owner_last_name']; ?>" 
                                name="fullname" id="fullname" readonly>
                            </div>
                            <?php }else{ ?>
                            <div class="col-sm-12">
                                <label>1st Owner FullName</label>
                                <input type="text" class="form-control" placeholder="Fullname" value="<?php echo $Get_Members['1st_owner_first_name']. " ". $Get_Members['1st_owner_middle_name'].  " ".$Get_Members['1st_owner_last_name']; ?>" 
                                name="fullname" id="fullname" readonly>
                            </div>
                            <?php } ?>
                            
                            <?php if($Get_Members['2nd_owner_first_name'] <> '' || $Get_Members['2nd_owner_first_name'] <> NULL){ ?>
                            <div class="col-sm-12">
                                <label>2nd Owner FullName</label>
                                <input type="text" class="form-control" placeholder="Fullname" value="<?php echo $Get_Members['2nd_owner_first_name']. " ". $Get_Members['2nd_owner_middle_name'].  " ".$Get_Members['2nd_owner_last_name']; ?>" 
                                name="fullname" id="fullname" readonly>
                            </div>
                            <?php }?>
                            
                            <?php if($Get_Members['3rd_owner_first_name'] <> '' || $Get_Members['3rd_owner_first_name'] <> NULL){ ?>
                            <div class="col-sm-12">
                                <label>3rd Owner FullName</label>
                                <input type="text" class="form-control" placeholder="Fullname" value="<?php echo $Get_Members['3rd_owner_first_name']. " ". $Get_Members['3rd_owner_middle_name'].  " ".$Get_Members['3rd_owner_last_name']; ?>" 
                                name="fullname" id="fullname" readonly>
                            </div>
                            <?php }?>
                            
                            <?php if($Get_Members['4th_owner_first_name'] <> '' || $Get_Members['4th_owner_first_name'] <> NULL){ ?>
                            <div class="col-sm-12">
                                <label>4th Owner FullName</label>
                                <input type="text" class="form-control" placeholder="Fullname" value="<?php echo $Get_Members['4th_owner_first_name']. " ". $Get_Members['4th_owner_middle_name'].  " ".$Get_Members['4th_owner_last_name']; ?>" 
                                name="fullname" id="fullname" readonly>
                            </div>
                            <?php }?>
                            
                            <?php if($Get_Members['5th_owner_first_name'] <> '' || $Get_Members['5th_owner_first_name'] <> NULL){ ?>
                            <div class="col-sm-12">
                                <label>5th Owner FullName</label>
                                <input type="text" class="form-control" placeholder="Fullname" value="<?php echo $Get_Members['5th_owner_first_name']. " ". $Get_Members['5th_owner_middle_name'].  " ".$Get_Members['5th_owner_last_name']; ?>" 
                                name="fullname" id="fullname" readonly>
                            </div>
                            <?php }?>
                            
                            <div class="col-sm-12">
                                <label>House #</label>
                                <input type="text" class="form-control" placeholder="House #" value="<?php echo $Get_Members['block']. "-". $Get_Members['flat_no'];?>" 
                                name="house_no" id="house_no" readonly>
                            </div>
                            <div class="col-sm-12">
                                <label>User Type</label>
                                <input type="text" class="form-control" placeholder="Usertype" value="<?php echo $Get_Members['ownership_type'];?>" 
                                name="user_type" id="user_type" readonly>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>


                  </tr>
                 <?php }?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   <?php include(ROOTACCESS."Advertisments.php");?>
<br>
    
    <!-- Footer starts-->
    <?php include(ROOTACCESS."HomefooterCall.php");?>
    <!-- copyright area ends -->
    <!-- Latest jQuery -->
    <!--<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>-->
    <!-- Bootstrap js-->
    <!--<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>-->
    <!-- DataTable js-->
     <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>


<script>


$(document).ready(function() {
    
    var table = $('#dataTable').DataTable( {
        sDom: 'lrtip',
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        "targets": 'no-sort',
//"bSort": false,
"order": [],
"bPaginate": true,
 "bLengthChange": false,
  "bFilter": true,
    "bInfo": true,
    } );
} );

function openMessageBox(emailid){
    <?php  if($_SESSION['UR_LOGINID'] == ''){?>
         window.location = "login_signup.php?actionResult=logindocrequired&back_tracker=directory.php";
    <?php }else{ ?>
     $('#comment_popup').modal('show');
    <?php }?>
}

function openSMSBox(phoneno){
    alert(phoneno);
}
</script>
<script>
    <?php if(isset($_REQUEST['block'])){?>
  $('#block').val('<?php echo $_REQUEST['block'];?>');
  
  <?php } ?>
   <?php if(isset($_REQUEST['usertype'])){?>
  $('#usertype').val('<?php echo $_REQUEST['usertype'];?>');
  
  <?php } ?>
  
   var maxLength = 100;
$('textarea').keyup(function() {
  var textlen = maxLength - $(this).val().length;
  $('#rchars').text(textlen);
});

$(document).ready(function(){
        $('.navbar-fixed-top').addClass('nav-active');
    })


</script>

  </body>
</html>