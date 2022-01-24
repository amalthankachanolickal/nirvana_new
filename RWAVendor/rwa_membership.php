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

$getDriverInfo = $ModelCall->get("rwa_membership_status");
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Membership Status</title>
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
    <style>
        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */

  color: white;

}

::-moz-placeholder { /* Firefox 19+ */

  color: white;

}

:-ms-input-placeholder { /* IE 10+ */

  color: white;

}

:-moz-placeholder { /* Firefox 18- */

  color: white;

}
    </style>
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-xs-3">
          <h4 class="page-title">Memebership Status</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
          

         <table class="table table-striped custom-table" id="example">
              <thead>
                <tr>
                  
                  <th>House Number</th>
                  <th>Member Name</th>
                  <th>Member</th>
                  <th>Eligible For Voting</th>
              
                  <th>First Owner Docs Complete</th>
                  <th>Second Owner Docs Complete</th>
                  <th>Authorization letter</th>
                  <th>Remarks</th>
                  <th>Additional Remarks</th>
                  <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                </tr>
              </thead>
              <tbody>
 <?php 
$TotalIncentiveEarned=0;
if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){ 
    $isfloor = ($getDocumentVal['Floor']) ? '-' : '';
?>             
            <tr>
                 <td><?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?></td>
                <td><?= ucfirst($getDocumentVal['Member First Name']) . ucfirst($getDocumentVal['Member Middle Name']) . ucfirst($getDocumentVal['Member Last Name']) ?></td>
                   <td><?= $getDocumentVal['Member'] ?></td>
                    <td><?= $getDocumentVal['Eligible_for_Voting'] ?></td>
                  
                    <td><?= $getDocumentVal['First_Owner_Docs_Complete'] ?></td>
                    <td><?= $getDocumentVal['Second_Owner_Docs_Complete'] ?></td>
                    <td><?= $getDocumentVal['Authorization_Letter'] ?></td>
                    <td><?= $getDocumentVal['Remarks'] ?></td>
                    <td><?= $getDocumentVal['Remarks_2'] ?></td>
                  <td>
                    <div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                       <li><a href="#" data-toggle="modal" data-target="#update-member-<?php echo $getDocumentVal['s_no'];?>"><i class="fa fa-edit m-r-5"></i> Update Status</a></li>
                       <?php if (($getDocumentVal['Conveyance_Deed'] == "No" || is_null($getDocumentVal['Conveyance_Deed'])) || ($getDocumentVal['1st_Owner_1st_ID_Proof'] == "No" || is_null($getDocumentVal['1st_Owner_1st_ID_Proof'])) || ($getDocumentVal['1st_Owner_2nd_ID_Proof'] == "No" || is_null($getDocumentVal['1st_Owner_2nd_ID_Proof'])) || ($getDocumentVal['2nd_Owner_1st_ID_Proof'] == "No" || is_null($getDocumentVal['2nd_Owner_1st_ID_Proof'])) || ($getDocumentVal['2nd_Owner2nd_ID_Proof'] == "No" || is_null($getDocumentVal['2nd_Owner2nd_ID_Proof']))) {?>
                       <li><a href="#" data-toggle="modal" data-target="#upload-member-file-<?php echo $getDocumentVal['s_no'];?>"><i class="fa fa-edit m-r-5"></i> Upload File</a></li>
                     <?php } ?>
                      </ul>
                    </div>
                  </td>
                </tr>
 
 
        <?php include('update_membership_status.php'); ?>


        <?php

        if (($getDocumentVal['Conveyance_Deed'] == "No" || is_null($getDocumentVal['Conveyance_Deed'])) || ($getDocumentVal['1st_Owner_1st_ID_Proof'] == "No" || is_null($getDocumentVal['1st_Owner_1st_ID_Proof'])) || ($getDocumentVal['1st_Owner_2nd_ID_Proof'] == "No" || is_null($getDocumentVal['1st_Owner_2nd_ID_Proof'])) || ($getDocumentVal['2nd_Owner_1st_ID_Proof'] == "No" || is_null($getDocumentVal['2nd_Owner_1st_ID_Proof'])) || ($getDocumentVal['2nd_Owner2nd_ID_Proof'] == "No" || is_null($getDocumentVal['2nd_Owner2nd_ID_Proof']))) {
         include('upload_membership_file.php'); 
          }
         ?>

                <?php } 
            } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
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
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );

  
} );
</script>
</body>
</html>
