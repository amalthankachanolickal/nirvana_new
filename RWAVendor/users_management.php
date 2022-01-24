<?php include('model/class.expert.php');
include('adminsession_checker.php');
$first=1;
/*-----------user email filter-------------*/
if($_REQUEST['user_email']){
if($first){
$where= "where";
$where=$where.' email like "%'.$_REQUEST['user_email'].'%"';
}
else{
$where=$where.' and email like "%'.$_REQUEST['user_email'].'%"';
}
$first=0;
}
/*--------------user phone filter------------*/
if($_REQUEST['user_phone']){
if($first){
$where= "where";
$where=$where.' user_phone like "%'.$_REQUEST['user_phone'].'%"';
}
else{
$where=$where.' and user_phone like "%'.$_REQUEST['user_phone'].'%"';
}
$first=0;
}
/*--------------Block filter------------*/
if($_REQUEST['block_id']){
if($first){
$where= "where";
$where=$where.' block_id like "%'.$_REQUEST['block_id'].'%"';
}
else{
$where=$where.' and block_id like "%'.$_REQUEST['block_id'].'%"';
}
$first=0;
}
/*--------------House number filter------------*/
if($_REQUEST['house_number_id']){
if($first){
$where= "where";
$where=$where.' house_number_id = "'.$_REQUEST['house_number_id'].'"';
}
else{
$where=$where.' and house_number_id = "'.$_REQUEST['house_number_id'].'"';
}
$first=0;
}
/*--------------House number filter------------*/
if($_REQUEST['floor_number']){
if($first){
$where= "where";
$where=$where.' floor_number like "%'.$_REQUEST['floor_number'].'%"';
}
else{
$where=$where.' and floor_number like "%'.$_REQUEST['floor_number'].'%"';
}
$first=0;
}
/*--------------User status filter------------*/
if($_REQUEST['user_status']){
if($first){
$where= "where";
$where=$where.' user_status like "%'.$_REQUEST['user_status'].'%"';
}
else{
$where=$where.' and user_status like "%'.$_REQUEST['user_status'].'%"';
}
$first=0;
}
/*--------------Admin Approval filter------------*/
if($_REQUEST['admin_approval']!= ""){
if($first){
$where= "where";
$where=$where.' admin_approval like "%'.$_REQUEST['admin_approval'].'%"';
}
else{
$where=$where.' and admin_approval like "%'.$_REQUEST['admin_approval'].'%"';
}
$first=0;
}
/*--------------user type filter------------*/
if($_REQUEST['user_type'] != ""){
    if($first){
    $where= "where";
    $where=$where.' user_type like "%'.$_REQUEST['user_type'].'%"';
    }
    else{
    $where=$where.' and user_type like "%'.$_REQUEST['user_type'].'%"';
    }
$first=0;
}
$getDriverInfo = $ModelCall->rawQuery("SELECT * FROM `Wo_Users`  ".$where." ORDER BY user_id desc limit 200");

//echo "SELECT * FROM `Wo_Users`  ".$where." ORDER BY user_id limit 300";

if($_REQUEST['download_csv']){
$getDriverInfo = $ModelCall->rawQuery("select user_title,first_name,middle_name,last_name,block_id,house_number_id,floor_number,email,user_type,user_resident_type FROM `Wo_Users`  ".$where." ORDER BY user_id");

    $filename = date('Y-m-d')."_all_customers.csv";         //File Name
// Create connection 
	$fp = fopen('php://output', 'w'); 
               $headers  = array('0'=> "Title", 
				'1'=> "First Name", 
				'2'=> "Middle Name",
				'3'=> "Last Name",
				'4'=> "Block Name",
				'5'=> "House Number", 
				'6'=> "Floor Number",
				'7'=> "Email Address",
				'8'=>"Member Type",
				'9'=>"Resident Type");
 
 
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $headers);

foreach($getDriverInfo as $row)
{ 
$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($row['block_id'])."')" );
$ModelCall->orderBy("id","desc");
$getBlockInfo = $ModelCall->get("tbl_block_entry");

if($row['user_type']==0)
{
$user_type = "Landlord";
}
if($row['user_type']==1)
{
$user_type ="Tenant";
}

if($row['user_resident_type']==0)
{
$user_resident_type = "Residing in the society";
}
if($row['user_resident_type']==1)
{
$user_resident_type ="Non Resident";
}

$user_arr  = array(
'user_title'=>$row['user_title'],
'first_name'=>$row['first_name'],
'middle_name'=>$row['middle_name'],
'last_name'=>$row['last_name'],
'block_name'=>ucwords($getBlockInfo[0]['block_name']).'-'.ucwords($getBlockInfo[0]['block_code']),
'house_number_id'=>$row['house_number_id'],
'floor_number'=>$row['floor_number'],
'email'=>$row['email'],
'user_type'=>$user_type ,  
'user_resident_type'=>$user_resident_type);  
//	print_r($user_arr);
//	die();
			        fputcsv($fp, $user_arr);					   
} 
	
if (fclose($fp)) {
	exit();
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
    <title>Customers Management - <?php echo SITENAME;?> admin</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
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
            <div class="col-xs-3">
              <h4 class="page-title">Customers Management</h4>
            </div>
            <div class="col-xs-9 text-right m-b-30">
              
              
             <!-- <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#upload_customers"><i class="fa fa-plus"></i> Upload Customer</a>
              
              <a href="#" class="btn btn-success rounded pull-right" data-toggle="modal" data-target="#replace_customers"><i class="fa fa-plus"></i> Replace Existing Customer</a>
              -->
              <a href="#" class="btn btn-success rounded pull-right" data-toggle="modal" data-target="#add_customers"><i class="fa fa-plus"></i> Add Member</a>
              
            </div>
          </div>
          <div class="row filter-row">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>users_management.php" method="post" enctype="multipart/form-data">
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <label class="control-label">Email Address</label>
                  <input type="text" id="user_email" name="user_email" placeholder="Enter Email" value="<?php echo $_REQUEST['user_email'];?>" class="form-control" />
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <label class="control-label">Mobile Number</label>
                  <input type="text" id="user_phone" name="user_phone" placeholder="Mobile" value="<?php echo $_REQUEST['user_phone'];?>" class="form-control" />
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <label class="control-label">Block Id</label>
                  <select id="block_id" name="block_id" value="<?php echo $_REQUEST['block_id'];?>" class="form-control">
                    <!--<option value="" default disabled hidden></option>-->
                    <option value=""></option>
                    <option value="1">Aspen Greens</option>
                    <option value="2">Birch Court</option>
                    <option value="3">Cedar Crest</option>
                    <option value="4">Deerwood Estate</option>
                    <option value="5">E Space</option>
                  </select>
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <label class="control-label">House Number</label>
                  <input type="text" id="house_number_id" name="house_number_id" value="<?php echo $_REQUEST['house_number_id'];?>" placeholder="House #" class="form-control" />
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <label class="control-label">Floor Number</label>
                  <select id="floor_number" name="floor_number" value="<?php echo $_REQUEST['floor_number'];?>" class="form-control">
                    <!--<option value="" default disabled hidden></option>-->
                    <option value="0"></option>
                    <option value="1">GF</option>
                    <option value="2">FF</option>
                    <option value="3">SF</option>
                    <option value="4">TF</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row filter-row">
              <div class="col-sm-2 col-xs-6">
                <div class="form-group">
                  <label class="control-label">User Status</label>
                  <select id="user_status" name="user_status" value="<?php echo $_REQUEST['user_status'];?>" class="form-control">
                    <!--<option value="" default disabled hidden></option>-->
                    <option value="">None</option>
                    <option value="Active">Active</option>
                    <option value="Deactivated">Deactivated</option>
                    <option value="Suspended">Suspended</option>
                    <option value="Deleted">Deleted</option>
                  </select>
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-6">
                <div class="form-group">
                  <label class="control-label">Admin Status</label>
                  <select id="admin_approval" name="admin_approval" class="form-control">
                    <!--<option value="" default disabled hidden></option>-->
                    <option value="">None</option>
                    <option value="0">Pending Approval</option>
                    <option value="1">Approved</option>
                    <option value="-1">Rejected</option>
                  </select>
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-6">
                <div class="form-group">
                  <label class="control-label">User Type</label>
                  <select id="user_type" name="user_type"  class="form-control">
                    <!--<option value="" default disabled hidden></option>-->
                    <option value="" >None</option>
                    <option value="0">Owners</option>
                    <option value="1">Tenant</option>
                    <option value="2">Joint Owners</option>
                  </select>
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-6">
                <label class="control-label"></label>
                <button type="submit" class="btn-sm btn-success" style='height:40px;width:40px'>
                <i class="fa fa-search"></i>
                </button>
                
                <button type="submit" name='download_csv' value ='1' style='height:40px;width:40px' class="btn-sm btn-success">  <i class="fa fa-download"></i></button>
                
                <!--<div class="col-md-1">  <label class="control-label">&nbsp;<br></label><button type="submit" name='download_csv' value ='1' class="btn btn-success btn-block">  <i class="fa fa-download"></i></button> </div>
       -->
              </div>
              
            </div>
          </form>
          <!--</div>-->
          <div class="row">
            <div class="col-md-12">
              <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
              <div class="table-responsive">
                
                <table class="table table-striped custom-table" id="example">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>User Name</th>
                      <th>Unite No.</th>
                      <th>Type</th>
                      
                      <th>Status</th>
                      <th>Created</th>
                      
                      <th >Admin Status</th>
                      <th >Email Verified</th>
                      <th >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    
                    $TotalIncentiveEarned=0;
                    if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getCustomerInfoVal){
                    $ModelCall->where("(id ='".$ModelCall->utf8_decode_all($getCustomerInfoVal['block_id'])."')" );
                    $ModelCall->orderBy("id","desc");
                    $getBlockInfo = $ModelCall->get("tbl_block_entry");
                    ?>
                    <tr>
                      <td >
                        
                        <!--<a href="" class="avatar" style="text-align:center;">-->
                        <!--  <?php if($getCustomerInfoVal['profile_pics']!=''){ ?> <img class="avatar" src="<?php echo DOMAIN.AdminDirectory;?>customers/photo/<?php echo $getCustomerInfoVal['profile_pics'];?>"> <?php } else { ?>-->
                        <!--  <?php echo substr($getCustomerInfoVal['first_name'],0,1);?>-->
                        <!--  <?php } ?>-->
                        <!--</a>-->
                        <h2><a href=""><?php echo ucwords($getCustomerInfoVal['user_title']);?> <?php echo ucwords($getCustomerInfoVal['first_name']);?> <?php echo ucwords($getCustomerInfoVal['middle_name']);?> <?php echo ucwords($getCustomerInfoVal['last_name']);?> </a><br><?php echo ucwords($getCustomerInfoVal['email']);?></h2></td>
                        
                        <td><?php echo ucwords($getCustomerInfoVal['user_name']);?></td>
                        <td> <?php echo ucwords($getBlockInfo[0]['block_code']);?>/<?php echo ucwords($getCustomerInfoVal['house_number_id']);?>/<?php echo ucwords($getCustomerInfoVal['floor_number']);?></td>
                        
                        <td>
                          <?php if($getCustomerInfoVal['user_type']==0){ ?> Landlord <?php }?> <?php if($getCustomerInfoVal['user_type']==1){ ?> Tenant <?php }?> <?php if($getCustomerInfoVal['user_resident_type']==0){ ?> (Residing in the society) <?php }?> <?php if($getCustomerInfoVal['user_resident_type']==1){ ?> (Non Resident) <?php }?>
                          
                        </td>
                        
                        
                        <td> <?php if(strcasecmp($getCustomerInfoVal['user_status'],'Active')==0){?> <a href="#" data-toggle="modal" data-target="#update-user-status<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-success">Active</a><?php }?>
                        <?php if(strcasecmp($getCustomerInfoVal['user_status'],'DeActivated')==0){?> <a href="#" data-toggle="modal" data-target="#update-user-status<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-danger">DeActivated</a><?php }?>
                        <?php if(strcasecmp($getCustomerInfoVal['user_status'],'Suspended')==0){?> <a href="#" data-toggle="modal" data-target="#update-user-status<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-warning ">Suspended</a><?php }?>
                        
                        </td><td><?php echo ucwords($getCustomerInfoVal['created_date']);?></td>
                        
                        
                        
                        <td> <?php if($getCustomerInfoVal['admin_approval']=='1'){?> <a href="#" data-toggle="modal" data-target="#deactivate_customers<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-success">Approved</a><?php }?>
                        <?php if($getCustomerInfoVal['admin_approval']=='-1'){?> <a href="#" data-toggle="modal" data-target="#activate_customers<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-danger">Rejected</a><?php }?>
                        <?php if($getCustomerInfoVal['admin_approval']=='0'){?> <a href="#" data-toggle="modal" data-target="#approve_customers<?php echo $getCustomerInfoVal['user_id'];?>" class="btn btn-warning">Approve</a><?php }?>
                        
                      </td>
                      <td> <?php if($getCustomerInfoVal['email_verify']==1){?> Yes<?php }?>
                        
                        <?php if($getCustomerInfoVal['email_verify']==0){?> NO <?php }?>
                        
                      </td>
                      <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        
                        <li><a href="#" data-toggle="modal" data-target="#edit_customers<?php echo $getCustomerInfoVal['user_id'];?>"><i class="fa fa-edit m-r-5"></i> Edit</a></li>
                        
                        <li><a href="#" data-toggle="modal" data-target="#delete_customers<?php echo $getCustomerInfoVal['user_id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
                    
                    
                  </tr>
                  <?php include('delete_customers_confirm.php'); ?>
                  <?php include('user_status_update.php'); ?>
                  <?php include('admin_approval_rejection.php');
                  ?>
                  <?php include('activate_customers_confirm.php'); ?>
                  <?php include('deactivate_customers_confirm.php'); ?>
                  <?php include('edit_customers.php'); ?>
                  <?php include('add_customers.php'); ?>
                  
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
    
    <?php include('upload_customers.php'); ?>
  </div>
  <div class="sidebar-overlay" data-reff="#sidebar"></div>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
  <script>
  $( document ).ready(function() {
  console.log( "ready!" );
  $('#example').dataTable({
     "order": [[ 5, "desc" ]], //or asc 
    "columnDefs" : [{"targets":5, "type":"date"}],
    }); 
    
  <?php if(isset($_REQUEST['block_id'])){?>
  $('#block_id').val('<?php echo $_REQUEST['block_id'];?>');
  
  <?php } ?>
  
  <?php if(isset($_REQUEST['floor_number'])){?>
  $('#floor_number').val('<?php echo $_REQUEST['floor_number'];?>');
  
  <?php } ?>
  
  <?php if(isset($_REQUEST['admin_approval'])){?>
  $('#admin_approval').val('<?php echo $_REQUEST['admin_approval'];?>');
  
  <?php } ?>
  
  <?php if(isset($_REQUEST['user_type'])){?>
  $('#user_type').val('<?php echo $_REQUEST['user_type'];?>');
  
  <?php } ?>
  
  <?php if(isset($_REQUEST['user_status'])){?>
  $('#user_status').val('<?php echo $_REQUEST['user_status'];?>');
  
  <?php } ?>
  
  
  });
  </script>
</body>
</html>