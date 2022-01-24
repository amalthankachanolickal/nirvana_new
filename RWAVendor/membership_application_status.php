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
  if ($floor_number == "Villa" || $floor_number == "") {
    return "Villa";
  }

  return $floor_number;
}



?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Membership Application Management</title>
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
<style>
    .fa-caret-right{
  transition: all .4s ease;
}
.active .fa-caret-right{
  transform: rotate(90deg);
}


.panel-title {
	
		
	
		a {
			text-decoration: none;
	}
}

.active {
	.panel-heading {
		background-color: white;
		border-bottom: 0;
	}
	.panel-body {
		border: 0 !important;
	}
}

table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th.dtr-control:before{
    margin-top:0px !important;
    top:10% !important;
}
    
table.dataTable thead .sorting, table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc {
    background-image: none;
}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
.mt-2 {
    margin-top: 20px;
}
#idCardModal .modal-body {
    padding: 0;
    padding-top: 20px;
}
.idCardLogo {
    padding: 0;
}
.idCardLogo img {
    height: 100%;
    max-height: 48px;
    width: auto;
}

.idCardHeading {
    font-weight: bold;
}

.underlined {
    text-decoration: underline;
}

.borderBottomDotted {
    border-bottom: 2px #000 dotted;
}

.blankField {
    min-width: 200px;
    display: inline-block;
}

.sideInfo .key {
    display: inline-block;
    width: 15%;
}
.sideInfo .value {
    display: inline-block;
    width: 80%;
}

.sideImg img {
    width: 100%;
   /* height: 150px; */
    border: solid 2px #000;
}

.lastSection .key {
    display: inline-block;
    width: 25%;
}
.lastSection .value {
    display: inline-block;
    width: 70%;
}

.signImg img {
    margin-top: 20px;
    background-color: #fefefe;
     /* width: 200px; */
    height: 70px;
}

@media only screen and (max-width: 700px) {
    /* .sideInfo .blankField {
        border: none;
    } */
    .sideInfo .key {
        display: inline-block;
        width: 35%;
    }
    .sideInfo .value {
        display: inline-block;
        width: 60%;
    }
    .signImg img {
        width: 100% !important;
    }
}
</style>

</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-3">
              <h4 class="page-title">Membership Application Status</h4>
            </div>
            <!--<div class="col-xs-9 text-right m-b-30">-->
            <!--<a href="#" class="btn btn-success rounded pull-right" data-toggle="modal" data-target="#add_member"><i class="fa fa-plus"></i> Add Member</a>-->
             
            <!--</div>-->
          </div>    
        <div class="panel-group" id="accordion">
  
  <div class="panel panel-default active">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <i class="fa fa-caret-right"></i> Pending Admin Approval
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
					   <div class="row">
       
      </div>
      <div class="row">
        <div class="col-md-12">

            <table id="member-details-2" class="table table-striped custom-table">
              <thead>
                <tr>
                  <th  class="text-center">Appl #</th>
                  <th  class="text-center">House #</th>
                  <th  class="text-center">Applicant's Name</th>
                  <th  class="text-center">Email ID</th>
                   <th  class="text-center">Contact No</th>
                  <th  class="text-center">Status</th>
                  <th  class="text-center"><i class="fa fa-edit"></i></th>
                   <th  class="text-center"><i class="fa fa-print"></i></th>
                </tr>
              </thead>
              <tbody>
         <?php 
        $getDriverInfo = $ModelCall->rawQuery("SELECT * FROM Wo_Membership where (approved_status='Pending' OR approved_status='Reopened') AND recc_approved = 'Yes' order by id Desc");
        $TotalIncentiveEarned=0;
        $row = 0;
        if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){  ?>
       <tr >
           <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" style="cursor:pointer"><?=$getDocumentVal['serialno'];?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" style="cursor:pointer"><?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" style="cursor:pointer"><?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" style="cursor:pointer"><?=$getDocumentVal['emailid_1'];?></td>
           <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" style="cursor:pointer"><?=$getDocumentVal['isd_1'];?>-<?=$getDocumentVal['mobile'];?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" style="cursor:pointer"><?php echo $getDocumentVal['approved_status']; ?></td>
          <td id="1o1p-<?= $getDocumentVal['serialno']; ?>" class="text-center" style="cursor:pointer"><?php
                $status_cur = $getDocumentVal['approved_status']; ?>
            <i class="fa fa-edit" data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"></i>
           
            </td>
            <td>  <i class="fa fa-print" onclick="printExternal(<?php echo $getDocumentVal['id'];?>);"></i></td>
        </tr> 
    <?php
        include('membership_status_change_popup.php');
    } } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <i class="fa fa-caret-right"></i> Pending President/Secretary(Office Bearers) Approval
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
					   <div class="row">
       
      </div>
      <div class="row">
        <div class="col-md-12">
            <table id="member-details-3" class="table table-striped custom-table">
              <thead>
                <tr>
                 <th  class="text-center">Appl #</th>
                  <th  class="text-center">House #</th>
                  <th  class="text-center">Applicant's Name</th>
                  <th  class="text-center">Email ID</th>
                   <th  class="text-center">Contact No</th>
                  <th  class="text-center">Status</th>
                  <th  class="text-center"><i class="fa fa-edit"></i></th>
                     <th  class="text-center"><i class="fa fa-print"></i></th>
                </tr>
              </thead>
              <tbody>
         <?php 
        $getDriverInfo = $ModelCall->rawQuery("SELECT * FROM Wo_Membership where approved_status='Admin Approved' AND recc_approved = 'Yes' order by id Desc");
        $TotalIncentiveEarned=0;
        $row = 0;
        if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){  ?>
       <tr >
           <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['serialno'];?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?></td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['emailid_1'];?> </td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['mobile'];?></td>
        
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?php echo $getDocumentVal['approved_status']; ?></td>
          <td id="1o1p-<?= $getDocumentVal['serialno']; ?>" class="text-center" style="cursor:pointer"><?php
                $status_cur = $getDocumentVal['approved_status']; ?>
            <i class="fa fa-edit" data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"></i>
            </td>
              <td>  <i class="fa fa-print" onclick="printExternal(<?php echo $getDocumentVal['id'];?>);"></i></td>
        </tr> 
    <?php
        include('membership_status_change_popup.php');
    } } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
        </div>
      </div></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          <i class="fa fa-caret-right"></i> Pending ID Cards
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
					   <div class="row">
       
      </div>
      <div class="row">
        <div class="col-md-12">

            <table id="member-details-4" class="table table-striped custom-table">
              <thead>
                <tr>
                 <th  class="text-center">Appl #</th>
                  <th  class="text-center">House #</th>
                  <th  class="text-center">Applicant's Name</th>
                  <th  class="text-center">Email ID</th>
                   <th  class="text-center">Contact No</th>
                  <th  class="text-center">Status</th>
                  <th  class="text-center">Add Membership #</th>
                     <th  class="text-center"><i class="fa fa-print"></i></th>
                </tr>
              </thead>
              <tbody>
         <?php 
        $getDriverInfo = $ModelCall->rawQuery("SELECT * FROM Wo_Membership where approved_status='EC Approved' AND recc_approved = 'Yes' order by id Desc");
        $TotalIncentiveEarned=0;
        $row = 0;
        if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){  
        ?>
       
       <tr >
           <td data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"><?=$getDocumentVal['serialno'];?></td>
          <td data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"><?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></td>
          <td data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"><?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?></td>
         <td data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['emailid_1'];?> </td>
          <td data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['mobile'];?></td>  
          <td data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"><?php echo $getDocumentVal['approved_status']; ?></td>
          <td id="1o1p-<?= $getDocumentVal['serialno']; ?>" class="text-center" style="cursor:pointer"><?php
                $status_cur = $getDocumentVal['approved_status']; ?>
            <i class="fa fa-edit" data-toggle="modal" data-target="#add_membership_no<?php echo $getDocumentVal['serialno'];?>"></i>
            </td>
              <td>  <i class="fa fa-print" onclick="printExternal(<?php echo $getDocumentVal['id'];?>);"></i></td>
        </tr> 
    
    <?php
    include('add_membership_no.php');
        include('membership_status_change_popup.php');
     } } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
        </div>
      </div></div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
          <i class="fa fa-caret-right"></i> ID Cards Issued
        </a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body">
					   <div class="row">
       
      </div>
      <div class="row">
        <div class="col-md-12">

            <table id="member-details-4" class="table table-striped custom-table">
              <thead>
                <tr>
                 <th  class="text-center">Appl #</th>
                  <th  class="text-center">House #</th>
                  <th  class="text-center">Applicant's Name</th>
                  <th  class="text-center">Email ID</th>
                   <th  class="text-center">Contact No</th>
                  <th  class="text-center">Status</th>
                  <th  class="text-center">Membership #</th>
                     <th  class="text-center"><i class="fa fa-print"></i></th>
                </tr>
              </thead>
              <tbody>
         <?php 
        $getDriverInfo = $ModelCall->rawQuery("SELECT * FROM Wo_Membership where approved_status='ICard Issued' order by id Desc");
        $TotalIncentiveEarned=0;
        $row = 0;
        if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){  
        ?>
       
       <tr >
           <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"><?=$getDocumentVal['serialno'];?></td>
          <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"><?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></td>
          <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"><?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?></td>
         <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['emailid_1'];?> </td>
          <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['mobile'];?></td>  
          <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"><?php echo $getDocumentVal['approved_status']; ?></td>
           <td data-toggle="modal" data-target="#idCardModal<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['app_membership_no'];?></td> 
         <td>  <i class="fa fa-print" onclick="printExternal(<?php echo $getDocumentVal['id'];?>);"></i></td>
        </tr> 
    
    <?php
   
        include('membership_id_card_popup.php');
     } } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
        </div>
      </div></div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
          <i class="fa fa-caret-right"></i> Sent For Correction
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
					   <div class="row">
       
      </div>
      <div class="row">
        <div class="col-md-12">

            <table id="member-details-5" class="table table-striped custom-table">
              <thead>
                <tr>
               <th  class="text-center">Appl #</th>
                  <th  class="text-center">House #</th>
                  <th  class="text-center">Applicant's Name</th>
                  <th  class="text-center">Email ID</th>
                   <th  class="text-center">Contact No</th>
                  <th  class="text-center">Status</th>
                  <th  class="text-center"><i class="fa fa-edit"></i></th>
                     <th  class="text-center"><i class="fa fa-print"></i></th>
                </tr>
              </thead>
              <tbody>
         <?php 
        $getDriverInfo = $ModelCall->rawQuery("SELECT * FROM Wo_Membership where approved_status='Sent For Correction' AND recc_approved = 'Yes' order by id Desc");
        $TotalIncentiveEarned=0;
        $row = 0;
        if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){  ?>
       <tr >
           <td  data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['serialno'];?></td>
          <td  data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></td>
          <td  data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?></td>
      <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['emailid_1'];?> </td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['mobile'];?></td>  
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"><?php echo $getDocumentVal['approved_status']; ?></td>
         
          <td id="1o1p-<?= $getDocumentVal['serialno']; ?>" class="text-center" style="cursor:pointer"><?php
                $status_cur = $getDocumentVal['approved_status']; ?>
            <i class="fa fa-edit" data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"></i>
            </td>
              <td>  <i class="fa fa-print" onclick="printExternal(<?php echo $getDocumentVal['id'];?>);"></i></td>
        </tr> 
    <?php
        include('membership_status_change_popup.php');
    } } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
        </div>
      </div></div>
    </div>
  </div>
  
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
          <i class="fa fa-caret-right"></i> Rejected Applications
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
		
      <div class="row">
        <div class="col-md-12">
            <table id="member-details-6" class="table table-striped custom-table">
              <thead>
                <tr>
                  <th  class="text-center">Appl #</th>
                  <th  class="text-center">House #</th>
                  <th  class="text-center">Applicant's Name</th>
                  <th  class="text-center">Email ID</th>
                   <th  class="text-center">Contact No</th>
                  <th  class="text-center">Status</th>
                  <th  class="text-center"><i class="fa fa-edit"></i></th>
                     <th  class="text-center"><i class="fa fa-print"></i></th>
                </tr>
              </thead>
              <tbody>
         <?php 
        $getDriverInfo = $ModelCall->rawQuery("SELECT * FROM Wo_Membership where approved_status='Declined'");
        $TotalIncentiveEarned=0;
        $row = 0;
        if(count($getDriverInfo)>0){ foreach($getDriverInfo as $getDocumentVal){  ?>
       <tr >
           <td><?=$getDocumentVal['serialno'];?></td>
          <td><?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></td>
          <td><?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?></td>
         <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['emailid_1'];?> </td>
          <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"  style="cursor:pointer"><?=$getDocumentVal['mobile'];?></td>  <td data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"><?php echo $getDocumentVal['approved_status']; ?></td>
         
          <td><?php echo $getDocumentVal['approved_status']; ?></td>
          <td id="1o1p-<?= $getDocumentVal['serialno']; ?>" class="text-center" style="cursor:pointer"><?php
                $status_cur = $getDocumentVal['approved_status']; ?>
            <i class="fa fa-edit" data-toggle="modal" data-target="#membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>"></i>
            </td>
              <td>  <i class="fa fa-print" onclick="printExternal(<?php echo $getDocumentVal['id'];?>);"></i></td>
        </tr> 
    <?php
        include('membership_status_change_popup.php');
    } } else {?>
                <tr><td colspan="19">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
        </div>
      </div></div>
    </div>
  </div>
  
</div>
</div>
<?php include('add_member.php'); ?>
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
//   var table1 = $('#member-details-1').DataTable({
//       "order": [ 1, "desc" ]});
  var table2 = $('#member-details-2').DataTable({
      "order": [ 1, "desc" ]});
  var table3 = $('#member-details-3').DataTable({
      "order": [ 1, "desc" ]});
  var table4 = $('#member-details-4').DataTable({
      "order": [ 1, "desc" ]});
  var table5 = $('#member-details-5').DataTable({
      "order": [ 1, "desc" ]});
  var table6 = $('#member-details-6').DataTable({
      "order": [ 1, "desc" ]});

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
<script>
    /**
 
 */
(function() {
  
  $(".panel").on("show.bs.collapse hide.bs.collapse", function(e) {
    if (e.type=='show'){
      $(this).addClass('active');
    }else{
      $(this).removeClass('active');
    }
  });  

}).call(this);


function validateForm(id){
    //alert(id);
     // return false;
    let statussel=  $('#approved_status'+id).val();
     let comment=  $.trim($('#comment'+id).val());
    if(statussel=='Sent for Correction' || statussel=='Declined'){
        if(comment==""){
            alert("Please Enter Comments");
            return false;
        }
    }
    return;
}

function printExternal(id) {
        console.log(id)
        var url ='<?php echo DOMAIN;?>form-x-print.php?fid='+id;
    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');

    printWindow.addEventListener('load', function() {
        if (Boolean(printWindow.chrome)) {
            printWindow.print();
            setTimeout(function(){
                printWindow.close();
            }, 500);
        } else {
            printWindow.print();
            printWindow.close();
        }
    }, true);
}
 
 function printIDCARD(id) {
        console.log(id)
        var url ='<?php echo DOMAIN;?>print-icard.php?fid='+id;
    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');

    printWindow.addEventListener('load', function() {
        if (Boolean(printWindow.chrome)) {
            printWindow.print();
            setTimeout(function(){
                printWindow.close();
            }, 500);
        } else {
            printWindow.print();
            printWindow.close();
        }
    }, true);
}

</script>



</body>
</html>
