<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['eid']!='')
{
$ModelCall->where("id", $_REQUEST['eid']);
$ModelCall->orderBy("id","desc");
$getEventInfo = $ModelCall->get("tbl_service_bazzar");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Add Service</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-8 col-md-offset-2">
          <form  action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpateServiceListing">
            <input type="hidden" name="eid" value="<?php echo $getEventInfo[0]['id'];?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <h3 class="page-title">Service Details</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Category <span class="text-danger">*</span></label>
                  <select class="form-control postcode" name="catgeory_id" id="catgeory_id" onChange="getSubcategory(this.value)" required  >
            <option value="">Select Category</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("category_name","asc");
$GetCategoryList = $ModelCall->get("tbl_category_entry");
if($GetCategoryList[0]>0){
foreach($GetCategoryList as $GetCatVal){if(is_array($GetCatVal)){
?>
<option value="<?php echo strip_tags($GetCatVal['id']); ?>" <?php if($getEventInfo[0]['catgeory_id']==$GetCatVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCatVal['category_name']); ?></option>
            <?php } } } ?>
          </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Sub Category <span class="text-danger"></span></label>
                <select class="form-control postcode" name="catgeory_sub_id" id="catgeory_sub_id"  >
            <option value="">Select Sub Category</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->where("catgeory_id", $getEventInfo[0]['catgeory_id']);
$ModelCall->orderBy("sub_category_name","asc");
$GetSubCategoryList = $ModelCall->get("tbl_sub_category_entry");
if($GetSubCategoryList[0]>0){
foreach($GetSubCategoryList as $GetSubCatVal){if(is_array($GetSubCatVal)){
?>
<option value="<?php echo strip_tags($GetSubCatVal['id']); ?>" <?php if($getEventInfo[0]['catgeory_sub_id']==$GetSubCatVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetSubCatVal['sub_category_name']); ?></option>
            <?php } } } ?>
          </select>
                </div>
              </div>
            </div>
            
            
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>State <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="service_state_id" onChange="getCities(this.value)" id="service_state_id" required  >
            <option value="">Select State</option>
<?php 
$ModelCall->where("status", 0);
$ModelCall->where("country_id", 101);
$ModelCall->orderBy("name","asc");
$GetStateList = $ModelCall->get("states");
if($GetStateList[0]>0){
foreach($GetStateList as $GetStateVal){if(is_array($GetStateVal)){
?>
<option value="<?php echo strip_tags($GetStateVal['id']); ?>" <?php if($getEventInfo[0]['service_state_id']==$GetStateVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetStateVal['name']); ?></option>
            <?php } } } ?>
          </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>City <span class="text-danger">*</span></label>
              <select class="form-control postcode" name="service_city_id" id="service_city_id" required  >
            <option value="">Select City</option>
<?php 
$ModelCall->where("state_id", $getEventInfo[0]['service_state_id']);
$ModelCall->where("status", 0);
$ModelCall->orderBy("name","asc");
$GetCityList = $ModelCall->get("cities");
if($GetCityList[0]>0){
foreach($GetCityList as $GetCityVal){if(is_array($GetCityVal)){
?>
<option value="<?php echo strip_tags($GetCityVal['id']); ?>" <?php if($getEventInfo[0]['service_city_id']==$GetCityVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCityVal['name']); ?></option>
            <?php } } } ?>
          </select>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Service Title <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" value="<?php echo $getEventInfo[0]['service_name'];?>" id="service_name" name="service_name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Service Area/Localty <span class="text-danger">*</span></label>
                  <input class="form-control " value="<?php echo $getEventInfo[0]['service_locality'];?>" id="service_locality" name="service_locality" required type="text">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Address <span class="text-danger">*</span></label>
                  <input class="form-control " value="<?php echo $getEventInfo[0]['service_address'];?>" id="service_address" name="service_address" required type="text">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Zipcode <span class="text-danger">*</span></label>
                 <input class="form-control " value="<?php echo $getEventInfo[0]['service_zipcode'];?>" id="service_zipcode" name="service_zipcode" required type="text">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Rating <span class="text-danger">*</span></label>
              <select class="form-control postcode" name="rating" id="rating" required  >
            <option value="">Select</option>
             <option value="1" <?php if($getEventInfo[0]['rating']==1){?> selected <?php } ?>>*</option>
              <option value="2" <?php if($getEventInfo[0]['rating']==2){?> selected <?php } ?>>**</option>
               <option value="3" <?php if($getEventInfo[0]['rating']==3){?> selected <?php } ?>>***</option>
                <option value="4" <?php if($getEventInfo[0]['rating']==4){?> selected <?php } ?>>****</option>
                 <option value="5" <?php if($getEventInfo[0]['rating']==5){?> selected <?php } ?>>*****</option>
          </select>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Contact Person Name <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getEventInfo[0]['service_contact_name'];?>" id="service_contact_name" name="service_contact_name" required type="text">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Email Address <span class="text-danger"></span></label>
                   <input class="form-control" value="<?php echo $getEventInfo[0]['service_contact_email'];?>" id="service_contact_email" name="service_contact_email"  type="email">
              </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Phone Number <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getEventInfo[0]['service_contact_phone'];?>" id="service_contact_phone" name="service_contact_phone"  type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Mobile No. <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getEventInfo[0]['service_contact_mobile'];?>" id="service_contact_mobile" name="service_contact_mobile" required type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Website <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getEventInfo[0]['service_contact_website'];?>" id="service_contact_website" name="service_contact_website"  type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Opening Days <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getEventInfo[0]['service_opening_days'];?>" id="service_opening_days" name="service_opening_days" required type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Opening Timings <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getEventInfo[0]['service_opening_times'];?>" id="service_opening_times" name="service_opening_times" required type="text">
                </div>
              </div>
            </div>
            
            <div class="row">
             
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Logo  <span class="text-danger">*</span></label>
                  <input class="form-control"  id="service_pic" name="service_pic" <?php if($getEventInfo[0]['service_pic']==''){?> required <?php } ?>   type="file">
                  <?php if($getEventInfo[0]['service_pic']!=''){?><br> <img src="<?php echo DOMAIN.AdminDirectory;?>events/photo/<?php echo $getEventInfo[0]['service_pic'];?>" style="width:50%;">
                  <input type="hidden" name="service_picOld" value="<?php echo $getEventInfo[0]['service_pic'];?>">
                  <?php } ?>
                  
                </div>
              </div>
              
              
              </div>
             <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label>Discription <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="about_service"  id="about_service" cols="5" rows="8"><?php echo $getEventInfo[0]['about_service'];?></textarea>
                </div>
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-sm-12 text-center m-t-20">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php include('message_notification.php'); ?>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
<script type="text/javascript">
function getCities(str)
{
//alert(str);
   if(str=="")
      alert("Please select any state");
	else
     var ajx;  // The variable that makes Ajax possible!
	
	if(window.XMLHttpRequest)
	ajx=new XMLHttpRequest();
	ajx.onreadystatechange = function()
	{

		if(ajx.readyState == 4)
		{
		//alert(ajx.responseText);	
                document.getElementById("service_city_id").innerHTML= ajx.responseText;
		}
	}
	ajx.open("GET", "<?php echo DOMAIN.AdminDirectory;?>getCity.php?service_state_id="+str);
	ajx.send(); 

}

</script>
<script type="text/javascript">
function getSubcategory(str)
{
   if(str=="")
      alert("Please select any category");
	else
     var ajx;  // The variable that makes Ajax possible!
	
	if(window.XMLHttpRequest)
	ajx=new XMLHttpRequest();
	ajx.onreadystatechange = function()
	{

		if(ajx.readyState == 4)
		{
		//alert(ajx.responseText);	
                document.getElementById("catgeory_sub_id").innerHTML= ajx.responseText;
		}
	}
	ajx.open("GET", "<?php echo DOMAIN.AdminDirectory;?>getSubCategory.php?catgeory_id="+str);
	ajx.send(); 

}

</script>
