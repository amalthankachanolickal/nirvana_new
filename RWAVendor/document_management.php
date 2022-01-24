<?php include('model/class.expert.php');
include('adminsession_checker.php');
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDocumentInfo = $ModelCall->get("tbl_document_directory", 230);
//echo 1;

//echo filesize("nirvana.allrwas.com/RWAVendor/documents/5c5169db98a0bEC-MoM-200119.pdf"); 

//print_r(imagecreatefromstring("documents/5c5169db98a0bEC-MoM-200119.pdf"));
//print_r($image);
//echo filesize($image);

//exit; 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Document Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!-- <link rel="stylesheet" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-multiselect.css" type="text/css"/> -->
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
          <h4 class="page-title">Document Management</h4>
        </div>
        <div class="col-xs-8 text-right m-b-30"> <a href="#" class="btn btn-primary pull-right rounded" data-toggle="modal" data-target="#add_document"><i class="fa fa-plus"></i> Add Document</a>
          <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table" id="example">
              <thead>
                <tr>
                  <th>Document Name</th>
                  <th>Document File</th>
                  <th>Description</th>
                  <th>Created</th>
                  <th>IP</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
 <?php 
if(count($getDocumentInfo)>0){ foreach($getDocumentInfo as $getDocumentVal){ ?>             
                <tr>
                <td><?php echo ucwords($getDocumentVal['document_tilte']);?></td>
                 <td><a href="<?php echo DOMAIN.AdminDirectory;?>documents/<?php echo $getDocumentVal['document_file'];?>" target="_blank"><?php echo $getDocumentVal['document_file_name'];?></a></td>
                 <td><?php $small = substr($getDocumentVal['description'], 0, 20); echo $small . "..."?></td>
                   <td><?php echo ucwords($getDocumentVal['created_date']);?></td>
                    <td><?php echo ucwords($getDocumentVal['created_ip']);?></td>
                  
                  <td class="text-right">
				  
				  <table width="100%">
  <tr>
    <td> <?php if($getDocumentVal['status']==1){?> <a href="#" data-toggle="modal" data-target="#deactivate_document<?php echo $getDocumentVal['id'];?>" class="btn btn-success">Active</a><?php } else { ?> <a href="#" data-toggle="modal" data-target="#activate_document<?php echo $getDocumentVal['id'];?>" class="btn btn-danger">Inactive</a> <?php } ?> </td>
    <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_document<?php echo $getDocumentVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_document<?php echo $getDocumentVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
  </tr>
</table>

				 </td>
                </tr>
                 <?php include('edit_document.php'); ?>
    <?php include('delete_document_confirm.php'); ?>
      <?php include('activate_document_confirm.php'); ?>
        <?php include('deactivate_document_confirm.php'); ?>
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
<!-- <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-multiselect.js"></script> -->
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );

  
} );
</script>
</body>
</html>
