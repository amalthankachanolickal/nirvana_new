<?php include('model/class.expert.php');
include('adminsession_checker.php');
function getBlock($block_id) {
  $block = $block_id;
  if ($block_id == "1") {
    $block = "AG";
  } else if ($block_id == "2") {
    $block = "BC";
  } else if ($block_id == "3") {
    $block = "CC";
  } else if ($block_id == "4") {
    $block = "DW";
  } else if ($block_id == "5") {
    $block = "ES";
  }

  return $block;
}

function getFloor($floor_number) {
  if ($floor_number == "NA") {
    return "";
  }

  return $floor_number;
}

if (isset($_POST['search'])) {
	if ($_POST['form_type'] == "google_form") {
		$getDocumentInfo_google = $ModelCall->get("tbl_google_form");
		$getDocumentInfo_tenant = array();
	} else {
		$getDocumentInfo_google = array();
		$getDocumentInfo_tenant = $ModelCall->get("tbl_tenant_checkout");
	}
} else {
	$getDocumentInfo_google = $ModelCall->get("tbl_google_form");
	$getDocumentInfo_tenant = $ModelCall->get("tbl_tenant_checkout");	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Form Approval Request</title>
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
        <div class="col-xs-4">
          <h4 class="page-title">Form Approval Request</h4>
        </div>
      </div>
      <div class="row ">
        <form class="m-b-30" action="approve_forms.php" method="post" enctype="multipart/form-data">
		<div class="col-sm-3">
			<div class="form-group">
				<label class="control-label">Form Type : <span class="text-danger">*</span></label>
				<select class="form-control" name="form_type" required="">
				<option selected disabled></option>
				<option value="google_form">Google Group Form</option>
				<option value="tenant_checkout_form">Tenant Checkout Form</option>
				</select>
			</div>
		</div>
		<div class="col-md-1">
			<label class="control-label"></label>
			<label class="control-label"></label>
			<button type="submit" name="search" class="btn btn-success btn-block">
				<span class="glyphicon glyphicon-search"></span>
			</button> 
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
                  <th>Type of Form</th>
                  <th>House Number</th>
                  <th>Applicant Name</th>
                  <th>Status</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
 <?php 
if (count($getDocumentInfo_google) + count($getDocumentInfo_tenant) > 0) {
if(count($getDocumentInfo_google)>0){ 
	foreach($getDocumentInfo_google as $getDocumentVal){ ?>             
                <tr>
                <td><?= ucfirst($getDocumentVal['form_name']) ?></td>
                 <td><?= getBlock($getDocumentVal['block_applicants']) . '-' . $getDocumentVal['house_number_applicants'] . '-' . getFloor($getDocumentVal['floor_number_applicants']) ?></td>
                   <td><?= ucfirst($getDocumentVal['user_title_one']) . ' ' . ucfirst($getDocumentVal['first_name_one']) . ' ' . ucfirst($getDocumentVal['mid_name_one']) . ' ' . ucfirst($getDocumentVal['last_name_one']) ?></td>
                    <td><?= ($getDocumentVal['approved_status'] == "0") ? 'Pending Approval' : 'Approved' ?></td>

                  	<?php if($getDocumentVal['approved_status']== "0"){?>      
                      <td class="text-right"><a href="controller/forms_approve.php?fid=<?= $getDocumentVal['frm_id'] ?>&ftype=f-google&act=approve" class="btn btn-success">Approve</a>
                      </td>
                      <td class="text-right"><a href="controller/forms_approve.php?fid=<?= $getDocumentVal['frm_id'] ?>&ftype=f-google&act=decline" class="btn btn-danger">Decline</a>
                      </td>
                    <?php } else { ?>
                    <td colspan="2" class="text-center"> No action </td> <?php } ?>
                </tr>
                <?php } 
            }
if(count($getDocumentInfo_tenant)>0){ 
	foreach($getDocumentInfo_tenant as $getDocumentVal){ ?>             
                <tr>
                <td><?= ucfirst($getDocumentVal['form_name']) ?></td>
                 <td><?= getBlock($getDocumentVal['block_id']) . '-' . $getDocumentVal['house_number'] . '-' . getFloor($getDocumentVal['floor_number']) ?></td>
                   <td><?= ucfirst($getDocumentVal['title_one']) . ' ' . ucfirst($getDocumentVal['fname_one']) . ' ' . ucfirst($getDocumentVal['mname_one']) . ' ' . ucfirst($getDocumentVal['lname_one']) ?></td>
                    <td><?= ($getDocumentVal['approved_status'] == "0") ? 'Pending Approval' : 'Approved' ?></td>

                  <?php if($getDocumentVal['approved_status']== "0"){?>      
                      <td class="text-right"><a href="controller/forms_approve.php?fid=<?= $getDocumentVal['id'] ?>&ftype=f-tenant&act=approve" class="btn btn-success">Approve</a>
                      </td>
                      <td class="text-right"><a href="controller/forms_approve.php?fid=<?= $getDocumentVal['id'] ?>&ftype=f-tenant&act=decline" class="btn btn-danger">Decline</a>
                      </td>
                    <?php } else { ?>
                    <td colspan="2" class="text-center"> No action </td> <?php } ?>
                </tr>
                <?php } 
            }            
        } else { ?>
        	<tr>
        		<td colspan="5" class="text-center">No Data available</td>
        	</tr>
        <?php
        } ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php include('message_notification.php'); ?>
  </div>
  <?php include('add_document.php'); ?>
 
  
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
