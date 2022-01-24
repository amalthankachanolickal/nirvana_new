<?php include('model/class.expert.php');
include('adminsession_checker.php');
//$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getads_managementInfo = $ModelCall->get("tbl_adervitiser_module");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Advertise Banner Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6246358526663438",
    enable_page_level_ads: true
  });
</script>

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
        <div class="col-xs-4">
          <h4 class="page-title">Advertise Emailer Management</h4>
        </div>
        <div class="col-xs-8 text-right m-b-30"> <a href="#" class="btn btn-primary pull-right rounded" data-toggle="modal" data-target="#add_ads_management"><i class="fa fa-plus"></i> Add Advertise Banner</a>
          <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
    <!--   <form method="post" enctype="multipart/form-data" action="controller/FunctionCall.php" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="IndexValues">
                    <div class="row">
                      <div class="col-lg-4 no-pdd">
                        <div class="sn-field">
                          <label>First Index <strong style="color:#FF0000;">*</strong></label>
                          <input type="text" name="first_index" id="first_index" value="" required  placeholder="First Index ">
                          
                        </div>
                       
                      </div>
                      <div class="col-lg-4 no-pdd">
                        <div class="sn-field">
                          <label>Secound Index <strong style="color:#FF0000;">*</strong></label>
                          <input type="text" name="secound_index" id="secound_index" value=""   required placeholder="Secound Index">
                      
                        </div>
                      </div>
                  <div class="col-lg-1 no-pdd"> <button type="submit"  class="btn btn-success btn-block"> Save </button> </div>

                  </form>-->
      
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Ad Name</th>
                   
                  <th>Emailer Image</th>
                   <th>Emailer Text</th>
                 <!-- <th>Created</th>
                  <th>IP</th>-->
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
 <?php 
if(count($getads_managementInfo)>0){ foreach($getads_managementInfo as $getads_managementVal){ ?>             
                <tr>
                    <?php if($getads_managementVal['category']!="" && $getads_managementVal['ad_type']==1){?>
                <td><?php echo ucwords($getads_managementVal['category']);?>/<?php echo ucwords($getads_managementVal['sub_category']);?>/<?php echo ucwords($getads_managementVal['sub_sub_category']);?></td><?php }else{?>
                     <td><?php echo ucwords($getads_managementVal['	other_category']);?></td><?php }?>
               
                 <td>
                 <?php if($getads_managementVal['emailer_image']!=""){?>
                 <img src="<?php echo DOMAIN.AdminDirectory;?>ads_managements/photos/<?php echo $getads_managementVal['emailer_image'];?>" style="width:400px; height:200px;">
                 <?php } ?>
                  <?php if($getads_managementVal['emailer_text']!=""){?>
                 <?php echo $getads_managementVal['emailer_text'];?>
                 <?php } ?>
                 </td>
                <!--   <td><?php echo ucwords($getads_managementVal['created_date']);?></td>
                    <td><?php echo ucwords($getads_managementVal['created_ip']);?></td>
                  -->
                  <td class="text-right">
				  
				  <table width="100%">
  <tr>
    <td> <?php if($getads_managementVal['status']==1 && $getads_managementVal['ad_type']==1){?> <a href="#" data-toggle="modal" data-target="#deactivate_ads_management<?php echo $getads_managementVal['id'];?>" class="btn btn-success">Active</a><?php } else { ?> <a href="#" data-toggle="modal" data-target="#activate_ads_management<?php echo $getads_managementVal['id'];?>" class="btn btn-danger">Inactive</a> <?php } ?> </td>
    <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_ads_management<?php echo $getads_managementVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_ads_management<?php echo $getads_managementVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
  </tr>
</table>

				 </td>
                </tr>
                 <?php include('edit_ads_management.php'); ?>
    <?php include('delete_ads_management_confirm.php'); ?>
      <?php include('activate_ads_management_confirm.php'); ?>
        <?php include('deactivate_ads_management_confirm.php'); ?>
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
  <?php include('add_ads_management.php'); ?>
 
  
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
</body>
</html>
