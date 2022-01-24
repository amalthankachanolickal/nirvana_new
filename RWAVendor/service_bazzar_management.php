<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['catgeory_id']!='')
{
$ModelCall->where("catgeory_id", $_REQUEST['catgeory_id']);
}
if($_REQUEST['service_state_id']!='')
{
$ModelCall->where("service_state_id", $_REQUEST['service_state_id']);
}
if($_REQUEST['service_city_id']!='')
{
$ModelCall->where("service_city_id", $_REQUEST['service_city_id']);
}
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getEventInfo = $ModelCall->get("tbl_service_bazzar");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Service Listing - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
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
        <div class="col-sm-4 col-xs-3">
          <h4 class="page-title">Service Listing Management</h4>
        </div>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> <a href="<?php echo DOMAIN.AdminDirectory;?>add_service_listing.php" class="btn btn-primary rounded pull-right" ><i class="fa fa-plus"></i> Add Service Listing</a>
          <!--<div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>service_bazzar_management.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Category</label>
             <select class="form-control postcode" name="catgeory_id" id="catgeory_id"  >
            <option value="">Select Category</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("category_name","asc");
$GetCategoryList = $ModelCall->get("tbl_category_entry");
if($GetCategoryList[0]>0){
foreach($GetCategoryList as $GetCatVal){if(is_array($GetCatVal)){
?>
<option value="<?php echo strip_tags($GetCatVal['id']); ?>" <?php if($_REQUEST['catgeory_id']==$GetCatVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCatVal['category_name']); ?></option>
            <?php } } } ?>
          </select>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">State</label>
            <select class="form-control postcode" name="service_state_id" id="service_state_id"  onChange="getCities(this.value)"  >
            <option value="">Select State</option>
<?php 
$ModelCall->where("status", 0);
$ModelCall->where("country_id", 101);
$ModelCall->orderBy("name","asc");
$GetStateList = $ModelCall->get("states");
if($GetStateList[0]>0){
foreach($GetStateList as $GetStateVal){if(is_array($GetStateVal)){
?>
<option value="<?php echo strip_tags($GetStateVal['id']); ?>" <?php if($_REQUEST['service_state_id']==$GetStateVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetStateVal['name']); ?></option>
            <?php } } } ?>
          </select>
          </div>
        </div>
        
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">City</label>
            <select class="form-control postcode" name="service_city_id" id="service_city_id"  >
            <option value="">Select City</option>
<?php 
$ModelCall->where("state_id", $_REQUEST['service_state_id']);
$ModelCall->where("status", 0);
$ModelCall->orderBy("name","asc");
$GetCityList = $ModelCall->get("cities");
if($GetCityList[0]>0){
foreach($GetCityList as $GetCityVal){if(is_array($GetCityVal)){
?>
<option value="<?php echo strip_tags($GetCityVal['id']); ?>" <?php if($_REQUEST['service_city_id']==$GetCityVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCityVal['name']); ?></option>
            <?php } } } ?>
          </select>
          </div>
        </div>
        
        
        
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
        </form>
      </div>
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                 <th>Service Name</th>
                  <th>Catgeory</th>
                  <th>Service Address</th>
                  <th>Contact Info</th>
                  <th>Created</th>
                  <th>Status</th>
                   <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getEventInfo)>0){ foreach($getEventInfo as $getEventInfoVal){

$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($getEventInfoVal['catgeory_id'])."')" );
$ModelCall->orderBy("id","asc");
$getMainCategory = $ModelCall->get("tbl_category_entry");
 ?> 
                <tr>
                <td >
                  
                  <a href="" class="avatar" style="text-align:center;">
				  <?php if($getEventInfoVal['service_pic']!=''){ ?> <img class="avatar" src="<?php echo DOMAIN.AdminDirectory;?>events/photo/<?php echo $getEventInfoVal['service_pic'];?>"> <?php } else { ?>
				  <?php echo substr($getEventInfoVal['service_name'],0,1);?>
                  <?php } ?>
                  </a>
                    <h2><?php echo ucwords($getEventInfoVal['service_name']);?></h2></td>
                     <td><?php echo ucwords($getMainCategory[0]['category_name']);?></td>
                  <td><?php echo $getEventInfoVal['service_address'];?></td>
                  <td><?php echo $getEventInfoVal['service_contact_name'];?><br><?php echo $getEventInfoVal['service_contact_mobile'];?><br><?php echo $getEventInfoVal['service_contact_email'];?><br><?php echo $getEventInfoVal['service_contact_website'];?></td>
                   <td><?php echo $getEventInfoVal['created_date'];?></td>

                   <td> <?php if($getEventInfoVal['status']==1){?> <a href="#" data-toggle="modal" data-target="#deactivate_service_listing<?php echo $getEventInfoVal['id'];?>" class="btn btn-success">Active</a><?php } else { ?> <a href="#" data-toggle="modal" data-target="#activate_service_listing<?php echo $getEventInfoVal['id'];?>" class="btn btn-danger">Inactive</a> <?php } ?> </td>

                   <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo DOMAIN.AdminDirectory;?>add_service_listing.php?eid=<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_service_listing<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
                </tr>
    <?php include('delete_service_listing_confirm.php'); ?>
      <?php include('activate_service_listing_confirm.php'); ?>
        <?php include('deactivate_service_listing_confirm.php'); ?>
                <?php } } else {?>
                <tr><td colspan="7">There is no data available</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
     <?php include('message_notification.php'); ?>
  </div>
  
  
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
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
