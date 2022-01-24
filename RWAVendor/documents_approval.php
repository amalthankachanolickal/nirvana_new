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

$getDriverInfo = $ModelCall->rawQuery("SELECT * FROM rwa_membership_status INNER JOIN rwa_membership_documents WHERE rwa_membership_documents.s_no = rwa_membership_status.s_no");
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Document Approvals</title>
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

div.dataTables_wrapper div.dataTables_filter {
  text-align: left;
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
          <h4 class="page-title">Document Approvals</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>

            <table id="member-details" class="table table-striped custom-table">
              <thead>
                <tr>
                  <th>House Number</th>
                  <th>Member Name</th>
                  <th>Document Type</th>
                  <th>Document</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
 <?php 
$TotalIncentiveEarned=0;
$row = 0;
if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){ 
    $isfloor = ($getDocumentVal['Floor']) ? '-' : '';

    if ($getDocumentVal['1st_Owner_1st_ID_Proof'] == '' || $getDocumentVal['1st_Owner_1st_ID_Proof'] == 'Pending') { ?>
       <tr >
          <td><?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?></td>
          <td><?= ucfirst($getDocumentVal['Member First Name']) .' '. ucfirst($getDocumentVal['Member Middle Name']) .' '. ucfirst($getDocumentVal['Member Last Name']) ?></td>
          <td>1st Owner 1st ID Proof</td>
          <td><a href="#" data-toggle="modal" data-target="#document_approve_modal_1o1p-<?php echo $getDocumentVal['s_no'];?>" onclick="changeInitialStatus('<?= $getDocumentVal['s_no']; ?>','1st_Owner_1st_ID_Proof', '1o1p-<?= $getDocumentVal['s_no']; ?>')">Click Here</a></td>
          <td id="1o1p-<?= $getDocumentVal['s_no']; ?>"><?php

             $status_cur = $getDocumentVal['1st_Owner_1st_ID_Proof'];
             if ($status_cur == '') {
              echo 'Unread';
             } else if ($status_cur == 'Yes') {
              echo 'Approved';
             } else if ($status_cur == 'Pending') {
              echo 'Pending Approval';
             } else {
              echo 'Declined';
             }
          ?></td>
        </tr> 
    <?php
        include('document_approve_modal_1o1p.php');
    }
    if ($getDocumentVal['1st_Owner_2nd_ID_Proof'] == '' || $getDocumentVal['1st_Owner_2nd_ID_Proof'] == 'Pending') { ?>
       <tr >
          <td><?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?></td>
          <td><?= ucfirst($getDocumentVal['Member First Name']) .' '. ucfirst($getDocumentVal['Member Middle Name']) .' '. ucfirst($getDocumentVal['Member Last Name']) ?></td>
          <td>1st Owner 2nd ID Proof</td>
          <td><a href="#" data-toggle="modal" data-target="#document_approve_modal_1o2p-<?php echo $getDocumentVal['s_no'];?>" onclick="changeInitialStatus('<?= $getDocumentVal['s_no']; ?>','1st_Owner_2nd_ID_Proof', '1o2p-<?= $getDocumentVal['s_no']; ?>')">Click Here</a></td>
          <td id="1o2p-<?= $getDocumentVal['s_no']; ?>"><?php

             $status_cur = $getDocumentVal['1st_Owner_2nd_ID_Proof'];
             if ($status_cur == '') {
              echo 'Unread';
             } else if ($status_cur == 'Yes') {
              echo 'Approved';
             } else if ($status_cur == 'Pending') {
              echo 'Pending Approval';
             } else {
              echo 'Declined';
             }
          ?></td>
        </tr>
    <?php
        include('document_approve_modal_1o2p.php');
    }

    if ($getDocumentVal['2nd_Owner_1st_ID_Proof'] == '' || $getDocumentVal['2nd_Owner_1st_ID_Proof'] == 'Pending') { ?>
       <tr >
          <td><?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?></td>
          <td><?= ucfirst($getDocumentVal['Member First Name']) .' '. ucfirst($getDocumentVal['Member Middle Name']) .' '. ucfirst($getDocumentVal['Member Last Name']) ?></td>
          <td>2nd Owner 1st ID Proof</td>
          <td><a href="#" data-toggle="modal" data-target="#document_approve_modal_2o1p-<?php echo $getDocumentVal['s_no'];?>" onclick="changeInitialStatus('<?= $getDocumentVal['s_no']; ?>','2nd_Owner_1st_ID_Proof', '2o1p-<?= $getDocumentVal['s_no']; ?>')">Click Here</a></td>
          <td id="2o1p-<?= $getDocumentVal['s_no']; ?>"><?php
          
             $status_cur = $getDocumentVal['2nd_Owner_1st_ID_Proof'];
             if ($status_cur == '') {
              echo 'Unread';
             } else if ($status_cur == 'Yes') {
              echo 'Approved';
             } else if ($status_cur == 'Pending') {
              echo 'Pending Approval';
             } else {
              echo 'Declined';
             }
          ?></td>
        </tr>
    <?php
        include('document_approve_modal_2o1p.php');
    }

    if ($getDocumentVal['2nd_Owner2nd_ID_Proof'] == '' || $getDocumentVal['2nd_Owner2nd_ID_Proof'] == 'Pending') { ?>
       <tr >
          <td><?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?></td>
          <td><?= ucfirst($getDocumentVal['Member First Name']) .' '. ucfirst($getDocumentVal['Member Middle Name']) .' '. ucfirst($getDocumentVal['Member Last Name']) ?></td>
          <td>2nd Owner 2nd ID Proof</td>
          <td><a href="#" data-toggle="modal" data-target="#document_approve_modal_2o2p-<?php echo $getDocumentVal['s_no'];?>" onclick="changeInitialStatus('<?= $getDocumentVal['s_no']; ?>','2nd_Owner2nd_ID_Proof', '2d2p-<?= $getDocumentVal['s_no']; ?>')">Click Here</a></td>
          <td id="2d2p-<?= $getDocumentVal['s_no']; ?>"><?php
          
             $status_cur = $getDocumentVal['2nd_Owner2nd_ID_Proof'];
             if ($status_cur == '') {
              echo 'Unread';
             } else if ($status_cur == 'Yes') {
              echo 'Approved';
             } else if ($status_cur == 'Pending') {
              echo 'Pending Approval';
             } else {
              echo 'Declined';
             }
          ?></td>
        </tr>
    <?php
        include('document_approve_modal_2o2p.php');
    }
    if ($getDocumentVal['Conveyance_Deed'] == '' || $getDocumentVal['Conveyance_Deed'] == 'Pending') { ?>
       <tr >
          <td><?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?></td>
          <td><?= ucfirst($getDocumentVal['Member First Name']) .' '. ucfirst($getDocumentVal['Member Middle Name']) .' '. ucfirst($getDocumentVal['Member Last Name']) ?></td>
          <td>Conveyance Deed</td>
          <td><a href="#" data-toggle="modal" data-target="#document_approve_modal_cd-<?php echo $getDocumentVal['s_no'];?>" onclick="changeInitialStatus('<?= $getDocumentVal['s_no']; ?>', 'Conveyance_Deed', 'cd-<?= $getDocumentVal['s_no']; ?>')">Click Here</a></td>
          <td id="cd-<?= $getDocumentVal['s_no']; ?>"><?php
          
             $status_cur = $getDocumentVal['Conveyance_Deed'];
             if ($status_cur == '') {
              echo 'Unread';
             } else if ($status_cur == 'Yes') {
              echo 'Approved';
             } else if ($status_cur == 'Pending') {
              echo 'Pending Approval';
             } else {
              echo 'Declined';
             }
          ?></td>
        </tr>
    <?php
        include('document_approve_modal_cd.php');
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
  var table = $('#member-details').DataTable();

  $('#member-details_length').parent().removeClass("col-sm-6");
  $('#member-details_length').parent().addClass("col-sm-2");
  $('#member-details_filter').parent().removeClass("col-sm-6");
  $('#member-details_filter').parent().addClass("col-sm-10");

  $('document').ready(() => {
    $('#member-details_length').parent().removeClass("col-sm-6");
    $('#member-details_length').parent().addClass("col-sm-2");
    $('#member-details_filter').parent().removeClass("col-sm-6");
    $('#member-details_filter').parent().addClass("col-sm-10");
  })

  function changeInitialStatus(doc_id, type, elem) { 
    let SendData = {
      "s_no" : doc_id,
      "type" : type
    };

    $.ajax({
      url: 'controller/approve_docs_spec_ajax.php',
      method: 'POST',
      data: SendData,
      success: function(response) {
        document.getElementById(elem).innerText = "Pending Approval";
      }
    })
  }
</script>


</body>
</html>
