<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

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

$ModelCall->where("block_id", $rec[0]['block_id']);
$ModelCall->where("house_number_id", $rec[0]['house_number_id']);
$ModelCall->where("floor_number", $rec[0]['floor_number']);
$ModelCall->where("user_type", '1');
$tanent = $ModelCall->get("Wo_Users");


$ModelCall->where("block_id", $rec[0]['block_id']);
$ModelCall->where("house_number_id", $rec[0]['house_number_id']);
$ModelCall->where("floor_number", $rec[0]['floor_number']);
$ModelCall->where("user_type", '0');
$owner = $ModelCall->get("Wo_Users");

if($user_type==0){
$ModelCall->where("block_id", $rec[0]['block_id']);
$ModelCall->where("house_number_id", $rec[0]['house_number_id']);
$ModelCall->where("floor_number", $rec[0]['floor_number']);
$ModelCall->where("user_type", '3');
$family = $ModelCall->get("Wo_Users");
}
if($user_type==1){
$ModelCall->where("block_id", $rec[0]['block_id']);
$ModelCall->where("house_number_id", $rec[0]['house_number_id']);
$ModelCall->where("floor_number", $rec[0]['floor_number']);
$ModelCall->where("user_type", '4');

$family = $ModelCall->get("Wo_Users");

}
$today=date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nirvana House Details </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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



.dataTables_wrapper .dataTables_paginate .paginate_button {
	padding: 0;
	margin-left: -2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
	background: none;
	border-color: transparent;
}


table.dataTable thead th {
	background-image: none !important;
}


table.dataTable thead th::after {
	font-family: "FontAwesome";
	display: inline-block;
	margin-left: 10px;
	opacity: 0.75;
}
table.dataTable thead th.sorting::after {
	content: "\f0dc";
}
table.dataTable thead th.sorting_asc::after {
	content: "\f0de";
}
table.dataTable thead th.sorting_desc::after {
	content: "\f0dd";
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 13px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 6px 11px;
    margin-left: -2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    border: 1px solid #37a000;
    background-color: #37a000;
    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc)); */
    /* background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%); */
    background: -moz-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: -ms-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: -o-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: linear-gradient(to bottom, #37a000 0%, #37a000 100%);
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: #37a000 !important;
}
.bg-primary {
    color: #fff;
    background-color: #37a000 !important;
    border: 1px solid #000 !important;
}
table#dataTable{
  border: 1px solid #ddd;
}
input[type="search"] {
    border: none;
    border-bottom: 1px solid #969595;
    outline: none;
}
table#dataTable {
    max-width: 1150px !important;
    border: 1px solid #717171 !important;
    border-radius: 5px;
    overflow: hidden;
}
.dataTables_wrapper{
  width: 1150px;
  margin: 0 auto;
}
table.dataTable {
    border-collapse: inherit;
}
table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 1px solid #717171 !important ;
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

<h3 style="text-decoration: underline; " class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo "Newspaper";?></h3>

<div class="container margin-top-6">
<div class="row">
<?php if(isset($_SESSION['message']) && $_SESSION['message']!=''){?>
<div  class="col-lg-12 no-pdd" style="margin-top: 10px;">
<div class="alert alert-warning alert-dismissible show" role="alert">
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
    <div class="col-sm-4">
 <div class="panel-group">
    <!-- <div align="right" style="margin-right: 150px;">
    
         <button type="submit" class="btn btn-default " style="background-color: green;">
          <span class="glyphicon glyphicon-shopping-cart"></span> <span class='final_p'>  </span>
        </button>
       </div> -->
       
<?php

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
    </div>
    <div class="col-sm-4"> <div class="panel-group">

 <div class="panel panel-success"  style="margin-top: 10px;">
      <div class="panel-heading">Primary Owner</div>
       <div class="panel-body">
       <div  class="col-lg-2 no-pdd"> Name</div>
    <div  class="col-lg-10 no-pdd"><?php echo $owner[0]['first_name'].' '. $owner[0]['last_name']; ?></div>
     <div  class="col-lg-2 no-pdd"> Email</div>
     <div  class="col-lg-10 no-pdd"><?php echo $owner[0]['email']; ?></div>
      <div  class="col-lg-2 no-pdd"> Phone</div>
           <div  class="col-lg-10 no-pdd"><?php echo $owner[0]['phone_number']; ?></div>
           </div>
            <div class='row'>
                <div  class="col-lg-1 no-pdd"> </div>
           <?php if($user_type==0){?>
           <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' data-toggle="modal" data-target="#myModalemail" >Add Email</button>
           
           <div class="modal fade modal-lg-12" id="myModalemail" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Email</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/add_email_controller.php" onSubmit="return validateform();" id="nameformem">
                    <input type="hidden" name="user_id" value="<?php echo $tanent[0]['user_id'] ?>">
                    <div class="container">
                      <div class="row">
                      
</div>

  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
  <label for="pwd">Email Address</label>
                            <input type="email" class="form-control" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')"   placeholder="Email Address" required>
</div>

</div>
</div>


</div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameformem" value="Submit">ADD</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
           <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' data-toggle="modal" data-target="#myModalmobile" >Add Mobile</button>
           <div class="modal fade modal-lg-12" id="myModalmobile" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Mobile</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/add_mobile_controller.php" onSubmit="return validateform();" id="nameformmob">
                    <input type="hidden" name="user_id" value="<?php echo $tanent[0]['user_id'] ?>">
                    <div class="container">
                      <div class="row">
                      
</div>

  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
  <label for="pwd">Mobile Number(10 digits only)</label>
                            <input type="number" class="form-control" name="mobile_num" id="mobile_num"   placeholder="Mobile Number"  onblur="phonenumber(this.value);"   required >
</div>

</div>
</div>


</div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameformmob" value="Submit">ADD</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
           <?php }?>
           </div>
    </div>
    </div></div>
    <div class="col-sm-4"><div class="panel-group">
    <!-- <div align="right" style="margin-right: 150px;">
    
         <button type="submit" class="btn btn-default " style="background-color: green;">
          <span class="glyphicon glyphicon-shopping-cart"></span> <span class='final_p'>  </span>
        </button>
       </div> -->
       


 <div class="panel panel-success"  style="margin-top: 10px;">
      <div class="panel-heading">Primary Tenant</div>
       <div class="panel-body">
           
           <?php if(isset($tanent[0]['user_id'])){?>
           <?php if($tanent[0]['admin_approval']<=0){?>
            <p>No Tenant  found</p>
           <?php }?>
       <div  class="col-lg-2 no-pdd"> Name</div>
    <div  class="col-lg-10 no-pdd"><?php echo $tanent[0]['first_name'].' '. $tanent[0]['last_name']; ?></div>
     <div  class="col-lg-2 no-pdd"> Email</div>
<div  class="col-lg-10 no-pdd"><?php echo $tanent[0]['email']; ?></div>
      <div  class="col-lg-2 no-pdd"> Phone</div>
            <div  class="col-lg-10 no-pdd"><?php echo $tanent[0]['phone_number']; ?></div>
         <div class ='row'>_</div>
            <div class='row'>
                
           <?php if($tanent[0]['admin_approval']<=0 || is_null($tanent[0]['owner_approved'])){?>
           <a href="verifyadmin.php?num=<?php echo $tanent[0]['user_name'];?>&id=1"> <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' data-toggle="modal" data-target="#myModal" >Approve</button></a>
             <button type="submit" class="btn btn-danger btn-sm" style='border-radius: 10px;' data-toggle="modal" data-target="#myModal" >Reject</button>
           
           <?php }?>
            <?php if($tanent[0]['admin_approval']==1){?>
              
           <?php if($user_type==1){?>
          <div  class="col-lg-4 no-pdd"> 
           <button type="submit" class="btn btn-success btn-xs" style='border-radius: 10px;' data-toggle="modal" data-target="#myModalemail" >Add Email</button>
           </div>
           <div class="modal fade modal-lg-12" id="myModalemail" role="dialog">
        <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
 <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Email</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/add_email_controller.php" onSubmit="return validateform();" id="nameformem">
                    <input type="hidden" name="user_id" value="<?php echo $tanent[0]['user_id'] ?>">
                    <div class="container">
                      <div class="row"></div>

  <div class="row"><div class="col-md-1"></div>
    <div class="col-md-4">
    <div class="form-group">
      <label for="pwd">Email Address</label>
                                <input type="email" class="form-control" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')"   placeholder="Email Address" required >
    </div>

    </div>
  </div>


</div>
</form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameformem" value="Submit">ADD</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div  class="col-lg-4 no-pdd"><button type="submit" class="btn btn-success btn-xs" style='border-radius: 10px;' data-toggle="modal" data-target="#myModalmobile" >Add Mobile</button></div>
           <div class="modal fade modal-lg-12" id="myModalmobile" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Mobile</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/add_mobile_controller.php" onSubmit="return validateform();" id="nameformmob">
                    <input type="hidden" name="user_id" value="<?php echo $tanent[0]['user_id'] ?>">
                    <div class="container">
                      <div class="row">
                      
</div>

  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
  <label for="pwd">Mobile Number(10 digits only)</label>
                            <input type="number" class="form-control" name="mobile_num" id="mobile_num"   placeholder="Mobile Number" onblur="phonenumber(this.value);"   required>
</div>

</div>
</div>


</div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameformmob" value="Submit">ADD</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
           <?php }?>
           <div  class="col-lg-4 no-pdd">  <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' data-toggle="modal" data-target="#myModaledit" >Update</button>
           </div>
            <div class="modal fade modal-lg-12" id="myModaledit" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Tenant</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/signup_owner_aproved_edit.php" onSubmit="return validateform();" id="nameform">
                    <input type="hidden" name="user_id" value="<?php echo $tanent[0]['user_id'] ?>">
                    <div class="container">
                      <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                          <div class="form-group">
  <label for="sel4">Title</label>
  <select class="form-control" id="sel4"name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required>
                              <option value="">Select </option>
                                <option value="Mr." <?php if($tanent[0]['user_title']=="Mr."){echo "selected";} ?> >Mr. </option>
                                  <option value="Mrs." <?php if($tanent[0]['user_title']=="Mrs."){echo "selected";} ?>  >Mrs. </option>
                                    <option value="Miss." <?php if($tanentrec[0]['user_title']=="Miss."){echo "selected";} ?>  >Miss. </option>
                            </select>
</div>
</div>
                          <div class="col-md-2">
                          <div class="form-group">
  <label for="usr">First Name:</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" readonly value="<?php echo $tanent[0]['first_name'] ?>"  placeholder="First Name">
</div>
</div>
  <div class="col-md-2">
<div class="form-group">
  <label for="pwd">Middle Name:</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')" readonly value="<?php echo $tanent[0]['middle_name'] ?>"  placeholder="Middle Name" >
</div>
</div>
<div class="col-md-2">
<div class="form-group">
  <label for="pwd">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" readonly value="<?php echo $tanent[0]['last_name'] ?>"  placeholder="Last Name" >
</div>
</div>
</div>

  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
  <label for="pwd">Email Address</label>
                            <input type="email" class="form-control" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" readonly value="<?php echo $tanent[0]['email'] ?>" placeholder="Email Address" >
</div>

</div>
</div>
  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-3">
<div class="form-group">
    <?php
    $ModelCall->where("user_id",$tanent[0]['user_id'] );
    $tanancy = $ModelCall->get("tbl_tanancy_dates");
  //  echo $tanent[0]['user_id'];
    ?>
  <label for="pwd">Start Tenancy</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"  value="<?php echo $tanancy[0]['start_date'] ?>" >
</div>

</div>
      <div class="col-md-1"></div>
<div class="col-md-3">
<div class="form-group">
  <label for="pwd">End Tenancy</label>
                            <input type="date" class="form-control" name="end_date" id="end_date"  value="<?php echo $tanancy[0]['end_date'] ?>"  min="<?php echo $today;?>">
</div>

</div>
</div>

 <div class="col-md-1"></div>

</div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameform" value="Submit">Update</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
           
           <?php }?>
           
           
          <?php }else{ ?>
         <p>No tanet found</p>
         <div class="btn-group" >
    
  <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' data-toggle="modal" data-target="#myModal" >Add Tanent</button>
  </div>
  
  
  
  <div class="modal fade modal-lg-12" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Tanent</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/signup_owner_aproved.php" onSubmit="return validateform();" id="nameform">
                    <input type="hidden" name="ActionCall" value="UpdateDetails">
                    <div class="container">
                      <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                          <div class="form-group">
  <label for="sel5">Title</label>
  <select class="form-control" id="sel5" name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required>
                              <option value="">Select </option>
                                <option value="Mr." >Mr. </option>
                                  <option value="Mrs."  >Mrs. </option>
                                    <option value="Miss."  >Miss. </option>
                            </select>
</div>
</div>
                          <div class="col-md-2">
                          <div class="form-group">
  <label for="usr">First Name:</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" required  placeholder="First Name">
</div>
</div>
  <div class="col-md-2">
<div class="form-group">
  <label for="pwd">Middle Name:</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')"  placeholder="Middle Name" >
</div>
</div>
<div class="col-md-2">
<div class="form-group">
  <label for="pwd">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" required placeholder="Last Name" >
</div>
</div>
</div>

  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
  <label for="pwd">Email Address</label>
                            <input type="email" class="form-control" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Email Address" >
</div>

</div>
</div>
  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-3">
<div class="form-group">
  <label for="pwd">Start Tanancy</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"  >
</div>

</div>
      <div class="col-md-1"></div>
<div class="col-md-3">
<div class="form-group">
  <label for="pwd">End Tanancy</label>
                            <input type="date" class="form-control" name="end_date" id="end_date"  min="<?php echo $today;?>" >
</div>

</div>
</div>

 <div class="col-md-1"></div>

</div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameform" value="Submit">Add</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
  
           <?php }?>
           </div>
           </div>
    </div>
    </div></div>
    <div class="text-right mb-3">
    <a href="#" class="btn btn-success" style='border-radius: 10px;' style='border-radius: 10px;' data-toggle="modal" data-target="#myModalfamily" >Add New Family Mamber</a>
    
</div>
 <div class="modal fade modal-lg-12" id="myModalfamily" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add  Family Mamber</h4>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/signup_owner_aproved_family.php" onSubmit="return validateform();" id="nameform1">
                    <input type="hidden" name="ActionCall" value="UpdateDetails">
                    <div class="container">
                      <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                          <div class="form-group">
  <label for="sel2">Title</label>
  <select class="form-control" id="sel2"name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required>
                              <option value="">Select </option>
                                <option value="Mr." >Mr. </option>
                                  <option value="Mrs."  >Mrs. </option>
                                    <option value="Miss."  >Miss. </option>
                            </select>
</div>
</div>
                          <div class="col-md-2">
                          <div class="form-group">
  <label for="usr">First Name:</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" required  placeholder="First Name">
</div>
</div>
  <div class="col-md-2">
<div class="form-group">
  <label for="pwd">Middle Name:</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')"  placeholder="Middle Name" >
</div>
</div>
<div class="col-md-2">
<div class="form-group">
  <label for="pwd">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" required placeholder="Last Name" >
</div>
</div>
</div>

  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
  <label for="pwd">Email Address</label>
                            <input type="email" class="form-control" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Email Address" >
</div>

</div>
</div>


  <div class="row">
      <div class="col-md-1"></div>
<div class="col-md-4">
<div class="form-group">
 <label id="sel3" > Resident Type <strong style="color:#FF0000;">*</strong></label>
  <select class="form-control" id="sel3"  name="user_resident_type" oninvalid="this.setCustomValidity('Select Resident Type')"  oninput="this.setCustomValidity('')" required>
                              <option value="" >Select Resident Type</option>
                              <option value="0" <?php if($rec[0]['user_resident_type']==0){echo "selected";} ?> >Residing in the society</option>
                              <option value="1" <?php if($rec[0]['user_resident_type']==1){echo "selected";} ?>>Non Resident</option>
                            </select>
                            </div>

</div>
</div>

 <div class="col-md-1"></div>

</div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn btn-success" form="nameform1" value="Submit">Add</button>
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <h3 style="text-decoration: underline; " class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo "Family Members";?></h3>


    <table class="table table-striped table-hover dt-responsive" id="dataTable">
      <caption class="sr-only">Table example</caption>
      
      <thead class="bg-primary">
        <tr>
         
          
          <th>Name</th>
               
                 
                  <th>Email</th>
                  <th>Status</th>
                  
                 
                    
        </tr>
      </thead>
      <tfoot class="hidden">
         <tr>
            <th class="first" scope="col"><span class="fa fa-Billpaper-o" aria-hidden="true">&#160;</span></th>
     
          <th>Name</th>
               
                 
                  <th>Email</th>
                  <th>Status</th> 
                    
        </tr>
      </tfoot>
      <tbody>
          
        <tr>
           <?php
          $i=0;
           foreach($family as $value)
           
           
           {
              if($value['admin_approval']==0 || $value['admin_approval']==1)
{
         ?>
          <!-- <td><?php echo $value['id'];?></td> -->
           
           
           
            <td ><?php echo $value['first_name'].' '. $value['last_name']; ?></td>
                 <td > <?php echo $value['email'];?></td>
           
                      <td> <?php if($value['admin_approval']==0){?> <a href="verifyadmin.php?num=<?php echo $value['user_name'];?>&id=1"><button  class="btn btn-success" name  ='paynow' type="submit" value='<?php echo $value['bill_number'];?>' onclick="assignValues('<?php echo $value['bill_number'];?>');"  style='border-radius: 10px;' >Approve</button> </a> <a href="verifyadmin.php?num=<?php echo $value['user_name'];?>&id=-1"><button  class="btn btn-danger" name  ='paynow' type="submit" value='<?php echo $value['bill_number'];?>' onclick="assignValues('<?php echo $value['bill_number'];?>');"  style='border-radius: 10px; ' >Reject</button></a><?php }?> 
<?php if($value['admin_approval']==1){?>
<a href="verifyadmin.php?num=<?php echo $value['user_name'];?>&id=-2"><button  class="btn btn-danger" name  ='paynow' type="submit" value='<?php echo $value['bill_number'];?>' onclick="assignValues('<?php echo $value['bill_number'];?>');"  style='border-radius: 10px; ' >Remove</button></a>
<?php }
?>
    </td>

        </tr>
        <?php }  }?>
      </tbody>
    </table>
 </div>
</div>
 <?php if($_REQUEST['actionResult']=="regsuccess"){?>
        <div class="alert alert-success">
          <span  id="divError">Thank you! Your Bill is paid successfully</span>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
       
       <?php } else if($_REQUEST['actionResult']=="regfail") {?>
        <div class="alert alert-danger">
          <span  id="divError">Payment not complete, Some error while sumitting your details.Try Again Later</span>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
       <?php }?>
       
  </div>

  <!-- Modal-->
  
    <br> <br> 
<!------ Include the above in your HEAD tag ---------->
<?php include(ROOTACCESS."Advertisments.php");?>
<br>
</div>
 <?php include(ROOTACCESS."HomefooterCall.php");?>
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
			[20, 30, 50, -1],
			[20, 30, 50, "All"]
		],
		order: [[0, "asc"]] // Set State column sorting by default
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
		$(this).html('<div class="form-group" height: 50px; width: 10%;><label>Search ' + $title + ':<br/><input class="form-control" id="search' + $title + '" type="hidden"/></label></div>');
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
</script>
</body>
</html>
