<?php include('model/class.expert.php');
include('adminsession_checker.php');
$where = '1=1';
$getDriverInfo = $ModelCall->rawQuery("SELECT * FROM `tbl_self_isolation_data_start` where 1 = 1 AND  ".$where." ORDER BY id DESC");

if($_REQUEST['download_csv']){
$getDriverInfo = $ModelCall->rawQuery("select user_title,first_name,middle_name,last_name,block_id,house_number_id,floor_number,email,user_type,user_resident_type FROM `Wo_Users`  ".$where." ORDER BY user_id limit 100");

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
    <title>Plasma Donors List - <?php echo SITENAME;?> admin</title>
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
              <h4 class="page-title">Plasma Donors List</h4>
            </div>
            <div class="col-xs-9 text-right m-b-30">
              
              
              <!--<a href="#" class="btn btn-success rounded pull-right" data-toggle="modal" data-target="#add_customers"><i class="fa fa-plus"></i> Add Donor</a>-->
              
            </div>
          </div>
          <div class="row filter-row">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>plasma_donation_listing.php" method="post" enctype="multipart/form-data">
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <input type="text" id="user_email" name="user_email" placeholder="Enter Email" value="<?php echo $_REQUEST['user_email'];?>" class="form-control" />
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <input type="text" id="user_phone" name="user_phone" placeholder="Mobile" value="<?php echo $_REQUEST['user_phone'];?>" class="form-control" />
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <select id="block_id" name="block_id" value="<?php echo $_REQUEST['block_id'];?>" class="form-control">
                    <option disabled selected>Block Id</option>
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
                  <input type="text" id="house_number_id" name="house_number_id" value="<?php echo $_REQUEST['house_number_id'];?>" placeholder="House #" class="form-control" />
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <select id="floor_number" name="floor_number" value="<?php echo $_REQUEST['floor_number'];?>" class="form-control">
                    <option disabled selected>Floor Number</option>
                    <option value="1">GF</option>
                    <option value="2">FF</option>
                    <option value="3">SF</option>
                    <option value="4">TF</option>
                  </select>
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <select name="bloodgroup" class="form-control" required>
                        <option disabled selected>Blood Group</option>
                        <option value="O+" >O+</option>
                        <option value="O-" >O-</option>
                        <option value="A+" >A+</option>
                        <option value="A-" >A-</option>
                        <option value="B+" >B+</option>
                        <option value="B-" >B-</option>
                        <option value="AB+" >AB+</option>
                        <option value="AB-" >AB-</option>
                    </select> 
                </div>
              </div>
              
              <div class="col-sm-2 col-xs-2">
                <div class="form-group">
                  <select name="is_plasma_donor" class="form-control" required>
                        <option disabled selected>Is Plasma Donor</option>
                        <option value="Yes" >Yes</option>
                        <option value="No" >No</option>
                        
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
              
            
          </form>
       </div>
          <div class="row">
            <div class="col-md-12">
              <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
              <div class="table-responsive">
                
                <table class="table table-striped custom-table datatable">
                  <thead>
                    <tr>
                        <th>Name</th>
                      <th>House #</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Blood Group</th>
                      <th >Date of Positive Covid Test</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    
                    if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getCustomerInfoVal){
                    $ModelCall->where("(id ='".$ModelCall->utf8_decode_all($getCustomerInfoVal['block_id'])."')" );
                    $ModelCall->orderBy("id","desc");
                    $getBlockInfo = $ModelCall->get("tbl_block_entry");
                    ?>
                    <tr>
                      <td >
                        <?php echo ucwords($getCustomerInfoVal['title_first']);?> <?php echo ucwords($getCustomerInfoVal['fname_first']);?> <?php echo ucwords($getCustomerInfoVal['mname_first']);?> <?php echo ucwords($getCustomerInfoVal['lname_first']);?></td>
                        <td> <?php echo ucwords($getBlockInfo[0]['block_code']);?>/<?php echo ucwords($getCustomerInfoVal['house_number']);?>/<?php echo ucwords($getCustomerInfoVal['floor_no']);?></td>
                        <td><?php echo ucwords($getCustomerInfoVal['user_email']);?></td>
                        <td><?php echo ucwords($getCustomerInfoVal['phone_number']);?></td>
                        <td><?php echo ucwords($getCustomerInfoVal['first_age']);?></td>
                        <td><?php echo ucwords($getCustomerInfoVal['first_gender']);?></td>
                        <td class="text-center"><?php echo ucwords($getCustomerInfoVal['first_blood_group']);?></td>
                        <td><?php echo ucwords($getCustomerInfoVal['positive_covid_test']);?></td>
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