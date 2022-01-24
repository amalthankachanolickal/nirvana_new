<?php include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");  
include('CheckCustomerLogin.php');
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

$ModelCall->where("id", $rec[0]['block_id']);
$ModelCall->orderBy("block_name","asc");
$user_type=$rec[0]['user_type'];
$GetBlockList = $ModelCall->get("tbl_block_entry");
//print_r($GetBlockList);

$House_No= sprintf('%04d', $rec[0]['house_number_id']);
//$echo=$House_No;
$ModelCall->where("Block", $GetBlockList[0]['block_code']);
$ModelCall->where("House_No",$House_No);
$getDetalilsowner = $ModelCall->get("rwa_membership_status");

$unit_no = $GetBlockList[0]['block_code'].'-'.$House_No;
$ModelCall->where("flat_no",$unit_no);
$ModelCall->orderBy("id","desc");
$getCamOutstanding = $ModelCall->getOne("tbl_billing_new");
//print_r($getCamOutstanding);
//exit(0);
$today=date('Y-m-d');

if($rec[0]['floor_number']==1)
{
    $floor="Ground Floor";
}
if($rec[0]['floor_number']==2)
{
    $floor="First Floor";
}
if($rec[0]['floor_number']==3)
{
    $floor="Secound Floor";
}
if($rec[0]['floor_number']==4)
{
    $floor="Third Floor";
}
if($rec[0]['floor_number']==5)
{
    $floor="Forth Floor";
}


?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Membership </title>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
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
    #dataTable tfoot {
  display: table-header-group;
}

mark {
  background: orange;
  color: #000;
}


// Box shadow helper
@mixin BoxShadowHelper($level: 1){
  @if $level == 1 {
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
  }
  @if $level == 2 {
    box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
  }
}
a {transition: .25s all;}
.card {
  overflow: hidden;
  @include BoxShadowHelper(1);
  transition: .25s box-shadow;
  &:focus,
  &:hover {@include BoxShadowHelper(2);}
}
.card-inverse .card-img-overlay {
  background-color: rgba(#333,.85);
  border-color: rgba(#333,.85);
}

    </style>
</head>
<body>
    <?php include(ROOTACCESS."front_header.php");?>
<!-- Begin Content		-->


<div class="container margin-top-6">

<h3 style="text-decoration: underline; " class="tile-page-h2 text-center">Your Membership</h3>
<hr>

<div class="row">
<?php if(isset($_SESSION['message']) && $_SESSION['message']!=''){?>
<div  class="col-lg-12 no-pdd"  style="margin-top: 10px; padding-left:300px; padding-right:300px;">
<div class="alert alert-info alert-dismissible show" role="alert" style=" text-align: center;">
  <?php echo $_SESSION['message']; 
  unset($_SESSION['message']);?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
<?php }?>
</div>
<div class="row">
    <!-- <div class="col-sm-4">
    <div class="panel-group">
    <div class="panel panel-success" style="margin-top: 10px;">
        
            <div class="panel-heading">House Details</div>
                <div class="panel-body">
                        <div  class="col-lg-5 no-pdd">Block Name</div>
                        <div  class="col-lg-6 no-pdd"><?php echo $GetBlockList[0]['block_name']; ?></div>
                        <div  class="col-lg-6 no-pdd">House No.</div>
                        <div  class="col-lg-6 no-pdd"><?php echo $rec[0]['house_number_id']; ?></div>
                        <div  class="col-lg-6 no-pdd">Floor</div>
                        <div  class="col-lg-6 no-pdd"><?php echo $floor; ?></div>
                </div>
        </div>
    </div>
    </div> -->

    <div class="col-md-12" style="margin-top: 10px; padding-left:20%; padding-right:20%;"> 
        <div class="panel-group">
            <div class="panel panel-success" style="margin-top: 10px;background">
     
                <div class="panel-heading" align="center" style=" background-color: #37a000;"> 
                <h4 style="color:white;"> <?php echo $rec[0]['house_number_id']; ?> <?php echo $GetBlockList[0]['block_name']; ?> <?php // echo $floor; ?></h4></div>
                <div class="panel-body">
              
                    <div  class="col-lg-5 no-pdd">First Owner: </div>
                    <div  class="col-lg-6 no-pdd"><?php echo $getDetalilsowner[0]['1st_Owner_First_Name']. " ".$getDetalilsowner[0]['1st_Owner_Middle_Name'] ." ".$getDetalilsowner[0]['1st_Owner_Last_Name'] ; ?></div>
                    <div  class="col-lg-5 no-pdd"> Second Owner :</div>
                    <div  class="col-lg-6 no-pdd"><?php if ($getDetalilsowner[0]['2nd_Owner_First_Name']=="") echo "-"; else echo $getDetalilsowner[0]['2nd_Owner_First_Name']. " ".$getDetalilsowner[0]['2nd_Owner_Middle_Name'] ." ".$getDetalilsowner[0]['2nd_Owner_Last_Name'] ; ?></div>
                    <!-- <div  class="col-lg-6 no-pdd">House No.</div>
                    <div  class="col-lg-6 no-pdd"><?php echo $rec[0]['house_number_id']; ?></div>
                    <div  class="col-lg-6 no-pdd">Floor</div>
                    <div  class="col-lg-6 no-pdd"><?php echo $floor; ?></div> -->
                 </div>
            </div>
        </div>
        </div>
    <!-- <div class="col-sm-4"> 
        <div class="panel-group">
            <div class="panel panel-success" style="margin-top: 10px;">
     
                <div class="panel-heading">Second Owner Details</div>
                <div class="panel-body">
                <div  class="col-lg-5 no-pdd"> Name</div>
                    <div  class="col-lg-6 no-pdd"><?php echo $getDetalilsowner[0]['2nd_Owner_First_Name']. " ".$getDetalilsowner[0]['2nd_Owner_Middle_Name'] ." ".$getDetalilsowner[0]['2nd_Owner_Last_Name'] ; ?></div>
                    <!-- <div  class="col-lg-6 no-pdd">House No.</div>
                    <div  class="col-lg-6 no-pdd"><?php echo $rec[0]['house_number_id']; ?></div>
                    <div  class="col-lg-6 no-pdd">Floor</div>
                    <div  class="col-lg-6 no-pdd"><?php echo $floor; ?></div> 
                </div>
            </div>
        </div>
    </div> -->

</div>
<h4 style="text-decoration: underline; text-align:center"> Your Membership Details : </h4>
<form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/add_documents_for_membership.php" onSubmit="return validateform();" id="nameform1">
 <table class="table table-striped table-hover dt-responsive" id="dataTable"  style=" width: 78%;align-self: center;" align="center">
 <input type="hidden" name="houseno" value="<?php echo $GetBlockList[0]['block_code'].'-'.$House_No;?>">
 <input type="hidden" name="postedBy" value="<?php echo $rec[0]['user_id'];?>">
      <tbody>
          
        <tr>
        <td>Membership Status : </td>
        <td><?php if($getDetalilsowner[0]['Member']=='Yes') echo "Completed"; else $getDetalilsowner[0]['Member'];?></td>
        <td>&nbsp;</td>
        </tr>

        <tr>
        <!--<td>Cam Dues : </td>-->
       <!--<td> <!--Amount - <?php echo $getDetalilsowner[0]['CAM_Dues_15th_Jan'];?>, as on 15th Jan 2020 <br>-->
        <!--   Amount - <?php echo $getDetalilsowner[0]['CAM_Dues_10th_Feb'];?>, as on 10th Feb 2020 <br>-->
        <!--Amount --> <?php //echo $getCamOutstanding['total_outstanding'];?>  
        <?php //echo date('jS M, Y',strtotime($getCamOutstanding['bill_date']));
        ?> <?php // echo date_format($getCamOutstanding['bill_date'],"Y/m/d H:i:s");;?>

       <!-- </td>-->
        
        <td>
<?php if($getDetalilsowner[0]['CAM_Dues_15th_Jan']>0 || $getDetalilsowner[0]['CAM_Dues_10th_Feb']>0 || ($getCamOutstanding['total_outstanding'])>0 ){?><a href="bills.php"  class="btn btn-success" target="_blank" style='border-radius: 10px;'>Pay Now</a><?php }?></td>
        </tr>

        <tr>
        <td>1st Owner ID_Proof 1: <br> 
            1st Owner ID_Proof 2: <br> </td>
        <td><?php if($getDetalilsowner[0]['1st_Owner_1st_ID_Proof']=="Yes" || $getDetalilsowner[0]['Member']=="Yes"){
          echo 'Available';
        }else {
          echo 'Pending';
        }?><br>
        <?php
        if($getDetalilsowner[0]['2nd_Owner_First_Name']==""){
           echo "NA" ;
         }else {
            if($getDetalilsowner[0]['1st_Owner_2nd_ID_Proof']=="Yes"  || $getDetalilsowner[0]['Member']=="Yes"){
              echo 'Available';
            }else {
              echo 'Pending';
            }
        }?>
        </td>
        <td><?php if($getDetalilsowner[0]['1st_Owner_1st_ID_Proof']=="No" || is_null($getDetalilsowner[0]['1st_Owner_1st_ID_Proof'])){?> <div  class="btn btn-success" onclick="getOwner1Id1()" style='border-radius: 10px;'>Click to upload!</div>
          <!-- this is your file input tag, so i hide it!-->
          <div style='height: 0px;width:0px; overflow:hidden;'><input id="Owner1Id1" name="Owner1Id1" type="file" value="upload Id 1"/></div>
          <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
          <?php }?><br>
          <?php  if($getDetalilsowner[0]['2nd_Owner_First_Name']==""){
           echo "" ;
         }else { 
         if($getDetalilsowner[0]['1st_Owner_2nd_ID_Proof']=="No" || is_null($getDetalilsowner[0]['1st_Owner_2nd_ID_Proof'])){?> <div  class="btn btn-success" onclick="getOwner1Id2()" style='border-radius: 10px;'>Click to upload!</div>
          <!-- this is your file input tag, so i hide it!-->
          <div style='height: 0px;width:0px; overflow:hidden;'><input  id="Owner1Id2" name="Owner1Id2"  type="file" value="upload Id 2"/></div>
          <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
          <?php }
          }?> 
          </td>
        
        </tr>

        <tr>
        <td>2nd Owner ID_Proof 1:<br>
            2nd Owner ID_Proof 2:<br>  </td>
        <td>
        <?php if($getDetalilsowner[0]['2nd_Owner_1st_ID_Proof']=="Yes"  || $getDetalilsowner[0]['Member']=="Yes"){
          echo 'Available';
        }else {
          echo 'Pending';
        }?><br>
        <?php if($getDetalilsowner[0]['2nd_Owner_First_Name']==""){
           echo "NA" ;
         }else { if($getDetalilsowner[0]['2nd_Owner2nd_ID_Proof']=="Yes"  || $getDetalilsowner[0]['Member']=="Yes"){
          echo 'Available';
        }else {
          echo 'Pending';
        }
        }?>
        </td>
        <td><?php if($getDetalilsowner[0]['2nd_Owner_1st_ID_Proof']=="No" || is_null($getDetalilsowner[0]['2nd_Owner_1st_ID_Proof'])){?> <div  class="btn btn-success" onclick="getOwner2Id1()" style='border-radius: 10px;'>Click to upload!</div>
          <!-- this is your file input tag, so i hide it!-->
          <div style='height: 0px;width:0px; overflow:hidden;'><input id="Owner2Id1" name="Owner2Id1" type="file" value="upload Id 1"/></div>
          <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
          <?php }?><br>
          <?php if($getDetalilsowner[0]['2nd_Owner_First_Name']==""){
           echo "" ;
         }else { if($getDetalilsowner[0]['2nd_Owner2nd_ID_Proof']=="No" || is_null($getDetalilsowner[0]['2nd_Owner2nd_ID_Proof'])){?> <div  class="btn btn-success" onclick="getOwner2Id2()" style='border-radius: 10px;'>Click to upload!</div>
          <!-- this is your file input tag, so i hide it!-->
          <div style='height: 0px;width:0px; overflow:hidden;'><input  id="Owner2Id2" name="Owner2Id2"  type="file" value="upload Id 2"/></div>
          <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
          <?php }
          }?> 
          </td>
        </tr>

        <tr>
        <td>Conveyance Deed: </td>
        <td>
        <?php if($getDetalilsowner[0]['Conveyance_Deed']=="Yes"  || $getDetalilsowner[0]['Member']=="Yes"){
          echo 'Available';
        }else {
          echo 'Pending';
        }?>
        </td>
        <td>
        <?php if($getDetalilsowner[0]['Conveyance_Deed']=="No" || is_null($getDetalilsowner[0]['Conveyance_Deed'])){?> <div  class="btn btn-success" onclick="getConveyanceDeed()" style='border-radius: 10px;'>Click to upload!</div>
          <!-- this is your file input tag, so i hide it!-->
          <div style='height: 0px;width:0px; overflow:hidden;'><input  id="ConveyanceDeed" name="ConveyanceDeed"  type="file" value="upload Conveyance Deed"/></div>
          <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
          <?php }?> 
          </td>
        </tr>
        
        <tr>
        <td>Form X: </td>
        <td><?php if($getDetalilsowner[0]['Form-10']=="Yes"  || $getDetalilsowner[0]['Member']=="Yes"){
          echo 'Available';
        }else {
          echo 'Pending';
        }?></td>
      <td>  <?php if($getDetalilsowner[0]['Form-10']=="No" || is_null($getDetalilsowner[0]['Form-10'])){?>
        <a href="membership.php"  class="btn btn-success" target="_blank" style='border-radius: 10px;background-color: #37a000;'>Apply Now</a>
        <?php }?></td>
        </tr>

      </tbody>
    </table>
    <div style="align:center;text-align:center">
    <button type="submit"  class="btn btn-success" form="nameform1" value="Submit"  style='border-radius: 10px;background-color: #37a000;'>Update</button>
    <!--<button type="button"  class="btn btn-success" value="Objection"  style='border-radius: 10px;' data-toggle="modal" data-target="#confirmbox">Raise Objection</button> -->
    </div>  
    </form>
    <br> <br> 
<!------ Include the above in your HEAD tag ---------->
<?php include(ROOTACCESS."Advertisments.php");?>
<br>
<!--<div class="modal fade" id="confirmbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--                      <div class="modal-dialog" role="document">-->
<!--                        <div class="modal-content">-->
<!--                          <div class="modal-header">-->
<!--                              <br>-->
<!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                              <span aria-hidden="true">&times;</span>-->
<!--                            </button>-->
<!--                          </div>-->
<!--                          <div class="modal-body">-->
<!--                            Do you want to raise an objection on your membership?-->
<!--                          </div>-->
<!--                          <div class="modal-footer ">-->
<!--                              <div class="text-center">-->
<!--                                  <button type="button" class="btn custom_btn" style="background-color:red" data-dismiss="modal">No</button>-->
<!--                                <button type="button" class="btn custom_btn" style="background-color:green" data-dismiss="modal" data-toggle="modal" data-target="#raiseObjection">Yes</button>-->
       
<!--                              </div>-->
                                
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
                  
<!--</div>-->
    <!--Raise Objection Modal -->
    <!--<div class="modal fade" id="raiseObjection" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
    <!--                  <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--                      <form method="post" action="<?php echo SITE_URL;?>controller/raise_objection_for_membership.php" onSubmit="return validateform();" id="nameform2">-->
                          
    <!--                          <div class="modal-content">-->
    <!--                              <div class="modal-header">-->
    <!--                                <h3 class="modal-title text-center" id="exampleModalLongTitle">Update Membership Info/Status</h3>-->
    <!--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                                  <span aria-hidden="true">&times;</span>-->
    <!--                                </button>-->
    <!--                              </div>-->
    <!--                              <div class="modal-body">-->
    <!--                              <input type="hidden" name="houseno" value="<?php echo $GetBlockList[0]['block_code'].'-'.$House_No;?>">-->
    <!--                               <input type="hidden" name="postedBy" value="<?php echo $rec[0]['user_id'];?>">  -->
    <!--                               <input type="hidden" name="owner_name" value="<?php echo $getDetalilsowner[0]['1st_Owner_First_Name']. " ".$getDetalilsowner[0]['1st_Owner_Middle_Name'] ." ".$getDetalilsowner[0]['1st_Owner_Last_Name'] ; ?> "> -->
                                   
    <!--                                <div class="row">-->
    <!--                                    <div class="col-sm-12">-->
    <!--                                        <div class="form-group">-->
    <!--                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="row">-->
    <!--                                    <div class="col-sm-12">-->
    <!--                                        <div class="form-group">-->
    <!--                                            <textarea class="form-control" name="msg" id="msg" rows="5" required></textarea>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                              </div>-->
    <!--                              <div class="modal-footer">-->
                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
    <!--                                <button type="submit" name="raise" id="raise" onclick="alert('Successfully sent!!!')" class="btn custom_btn" style="background-color:green">Submit</button>-->
    <!--                              </div>-->
    <!--                            </div>-->
                               
    <!--                      </form>-->
                        
    <!--                  </div>-->
    <!--                </div>-->

 <?php include(ROOTACCESS."HomefooterCall.php");?>

<SCRIPT language="javascript">
function phonenumber(inputtxt)
{
  var phoneno = /^\(?([0-9]{5})\)?[-. ]?([0-9]{5})$/;
  if((inputtxt.match(phoneno))){
      return true; }
      else {
        alert("The Mobile no entered is invalid");
        return false;
        }
}

function getOwner1Id1(){
     document.getElementById("Owner1Id1").click();
}
function getOwner1Id2(){
     document.getElementById("Owner1Id2").click();
}
function getOwner2Id1(){
     document.getElementById("Owner2Id1").click();
}
function getOwner2Id2(){
     document.getElementById("Owner2Id2").click();
}
function getConveyanceDeed(){
     document.getElementById("ConveyanceDeed").click();
}

$("input[type='file']").change(function (e) {
    var $this = $(this);
    $this.next().html('<div>'+$this.val().split('\\').pop()+'</div>');
});

$(document).ready(function(){
        $('.navbar-fixed-top').addClass('nav-active');
    })

</script>
</body>
</html>
