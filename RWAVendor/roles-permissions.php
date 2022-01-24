<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['eid']!='')
{
$ModelCall->where("id",$_REQUEST['eid']);
$ModelCall->where("login_type",0);
$ModelCall->orderBy("id","desc");
$getAdminInfoEdit = $ModelCall->get("tbl_client_sub_account");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Roles & Permission - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
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
        <div class="col-sm-8">
          <h4 class="page-title">Admin & Permissions</h4>
        </div>
      </div>
      <div class="row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
         <?php if(getAdminInfoEdit[0]['id']!=''){ ?>
          <input type="hidden" name="ActionCall" value="EditUpdateAdminData">
           <input type="hidden" name="eid" value="<?php echo $getAdminInfoEdit[0]['id'];?>">
           <?php } else { ?>
           <input type="hidden" name="ActionCall" value="AddUpdateAdmin">
           <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>">
           <?php } ?>
          <div class="col-sm-12">
            <div class="panel" style="padding: 15px;">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Name <span class="text-danger">*</span></label>
                    <input class="form-control" name="client_name" id="client_name" required value="<?php echo $getAdminInfoEdit[0]['client_name'];?>" type="text">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Email <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="client_email" id="client_email" required value="<?php echo $getAdminInfoEdit[0]['client_email'];?>" type="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Mobile No. <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="client_mobile" id="client_mobile" maxlength="12" required value="<?php echo $getAdminInfoEdit[0]['client_mobile'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Password <span class="text-danger">*</span></label>
                    <input class="form-control" name="client_password" id="client_password" required value="<?php echo $getAdminInfoEdit[0]['client_password'];?>" type="text">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped custom-table">
                <thead>
                  <tr>
                    <th>Menu Permission</th>
                    <th class="text-center">Show</th>
                    <!-- <th class="text-center">Write</th>
                  <th class="text-center">Create</th>
                  <th class="text-center">Delete</th>
                  <th class="text-center">Import</th>
                  <th class="text-center">Export</th>-->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Highlight Event Management</td>
                    <td class="text-center"><input type="checkbox" id="highlight_event" name="highlight_event" value="1" <?php if($getAdminInfoEdit[0]['highlight_event']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Notices Management</td>
                    <td class="text-center"><input type="checkbox" id="notice_board" name="notice_board" value="1" <?php if($getAdminInfoEdit[0]['notice_board']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Home Slider Management</td>
                    <td class="text-center"><input type="checkbox" id="home_slider" name="home_slider" value="1" <?php if($getAdminInfoEdit[0]['home_slider']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Block Management</td>
                    <td class="text-center"><input type="checkbox" id="blocks_management" name="blocks_management" value="1" <?php if($getAdminInfoEdit[0]['blocks_management']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Events Management</td>
                    <td class="text-center"><input type="checkbox" id="event_management" name="event_management" value="1" <?php if($getAdminInfoEdit[0]['event_management']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Amenities Management</td>
                    <td class="text-center"><input type="checkbox" id="amenities_management" name="amenities_management" value="1" <?php if($getAdminInfoEdit[0]['amenities_management']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Bazzar Management</td>
                    <td class="text-center"><input type="checkbox" id="service_bazaar_management" name="service_bazaar_management" value="1" <?php if($getAdminInfoEdit[0]['service_bazaar_management']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>User Management</td>
                    <td class="text-center"><input type="checkbox" id="user_management" name="user_management" value="1" <?php if($getAdminInfoEdit[0]['user_management']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  
                  <tr>
                    <td>Document Management</td>
                    <td class="text-center"><input type="checkbox" id="document_management" name="document_management" value="1" <?php if($getAdminInfoEdit[0]['document_management']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  
                  
                  <tr>
                    <td>Team Management</td>
                    <td class="text-center"><input type="checkbox" id="team_management" name="team_management" value="1" <?php if($getAdminInfoEdit[0]['team_management']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  
                  <tr>
                    <td>CMS Management</td>
                    <td class="text-center"><input type="checkbox" id="cms_management" name="cms_management" value="1" <?php if($getAdminInfoEdit[0]['cms_management']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  
                  <tr>
                    <td>Google Ad Management</td>
                    <td class="text-center"><input type="checkbox" id="google_ad_management" name="google_ad_management" value="1" <?php if($getAdminInfoEdit[0]['google_ad_management']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  
                  <tr>
                    <td>Settings</td>
                    <td class="text-center"><input type="checkbox" id="setting_management" name="setting_management" value="1" <?php if($getAdminInfoEdit[0]['setting_management']==1){?>checked <?php } ?>>
                    </td>
                    <!--<td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  <tr>
                    <td>Vendor Admin Management</td>
                    <td class="text-center"><input type="checkbox" id="vendor_admin_management" name="vendor_admin_management" value="1" <?php if($getAdminInfoEdit[0]['vendor_admin_management']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                  
                  <tr>
                    <td>Advertise Request Management</td>
                    <td class="text-center"><input type="checkbox" id="advertise_request_management" name="advertise_request_management" value="1" <?php if($getAdminInfoEdit[0]['advertise_request_management']==1){?>checked <?php } ?>>
                    </td>
                    <!-- <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>
                  <td class="text-center"><input type="checkbox" id="Vehicle_Management" name="Vehicle_Management" value="1" checked>
                  </td>-->
                  </tr>
                </tbody>
              </table>
              <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary">Save & Update Admin</button>
              </div>
            </div>
          </div>
        </form>
      </div>
<?php
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->where("login_type",0);
$ModelCall->orderBy("id","desc");
$getAdminInfo = $ModelCall->get("tbl_client_sub_account");
?>      
<div class="row">
        <div class="col-xs-8">
          <h4 class="page-title">Sub Vendor Account Management</h4>
        </div>
        
      </div>      
<div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Highlight</th>
                  <th>Notices</th>
                  <th>Slider</th>
                  <th>Blocks</th>
                  <th>Events</th>
                  <th>Amenities</th>
                  <th>Users</th>
                   <th>Document</th>
                    <th>Team</th>
                  <th>Bazzar</th>
                   <th>CMS</th>
                   <th>Google Ad</th>
                   <th>Settings</th>
                   <th>Advertise Request</th>
                   <th>Vendor Admin</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
 <?php if(count($getAdminInfo)>0){ foreach($getAdminInfo as $getAdminInfoVal){?>             
                <tr>
                  <td><?php echo $getAdminInfoVal['client_name'];?><br><?php echo $getAdminInfoVal['client_email'];?><br><?php echo $getAdminInfoVal['client_mobile'];?></td>
                  <td><?php if($getAdminInfoVal['highlight_event']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                  <td><?php if($getAdminInfoVal['notice_board']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                  <td><?php if($getAdminInfoVal['home_slider']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                  
                  <td><?php if($getAdminInfoVal['blocks_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                  <td><?php if($getAdminInfoVal['event_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?>
                  </td>
                  <td><?php if($getAdminInfoVal['amenities_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                  
                   <td><?php if($getAdminInfoVal['user_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                   
                    <td><?php if($getAdminInfoVal['document_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                    
                     <td><?php if($getAdminInfoVal['team_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                     
                       <td><?php if($getAdminInfoVal['service_bazaar_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                     
                       <td><?php if($getAdminInfoVal['cms_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                       
                         <td><?php if($getAdminInfoVal['google_ad_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                         
                           <td><?php if($getAdminInfoVal['setting_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                           
                             <td><?php if($getAdminInfoVal['advertise_request_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                     
                         <td><?php if($getAdminInfoVal['vendor_admin_management']==1){?><i class="fa fa-check" style="color:#008800;" aria-hidden="true"></i><?php } else {?> <i class="fa fa-remove" style="color:#FF0000;" aria-hidden="true"></i><?php } ?></td>
                     
                  
                  <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo DOMAIN.AdminDirectory;?>roles-permissions.php?eid=<?php echo $getAdminInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_admin_confirm<?php echo $getAdminInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
                </tr>
                 <?php
				 include('delete_admin_confirm.php');
				 
				  /*?><?php include('edit_vehicle.php'); ?>
    <?php  ?>
      <?php include('activate_vehicle_confirm.php'); ?>
        <?php include('deactivate_vehicle_confirm.php'); ?><?php */?>
                <?php } } else {?>
                <tr><td colspan="9">There is no data available</td></tr>
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
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
