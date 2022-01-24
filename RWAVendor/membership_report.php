<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Membership Report - <?php echo SITENAME;?> Dashboard</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/morris/morris.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php'); ?>
  <div class="page-wrapper">
 <div class="content container-fluid">
 
<?php 
 $getNoofHouses = $ModelCall->rawQuery("SELECT count(distinct(concat(block_id, house_number_id, floor_number))) as houses, block_id FROM `Wo_Users` where house_number_id <900  and user_status='Active' and user_type=0  group by block_id order by block_id");

// $getValidEmailsInfo = $ModelCall->rawQuery("SELECT count(*) as ValidEmails , block_id from Wo_Users where email_valid=1  and user_status='active' group by block_id  order by block_id");
// $getPhoneInfo = $ModelCall->rawQuery("SELECT count(*) as ValidPhone , block_id from Wo_Users where phone_valid=1  and user_status='active' group by block_id  order by block_id");
// $getFirstLogins = $ModelCall->rawQuery("SELECT count(*) as firstlogin , block_id from Wo_Users where first_login=1  and user_status='active' group by block_id  order by block_id");
?>

<div class="row">
        <div class="col-md-8">
          <div class="panel panel-table panel-primary">
            <div class="panel-heading" style="text-align: center;">
            Membership Report
            </div>
            <div class="panel-body">
      
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
              <thead >
                <tr style="font-size:bold">
                  <th style="text-align: left;"><b>  </th>
                  <th style="text-align: center;"><b>AG</th>
                  <th style="text-align: center;"> <b> BC  </th>
                  <th style="text-align: center;"><b> CC  </th>
                  <th style="text-align: center;"> <b> DW  </th>
                  <th style="text-align: center;"> <b>ES   </th>
                  <th style="text-align: center;"> <b> Total  </th>
                 
                </tr>
              </thead>
              <tbody>
            
              <tr>
                <td># of Houses</td>
                <td style="text-align: center;"><?php echo $getNoofHouses[0]['houses'];?></td>
                <td style="text-align: center;"><?php echo $getNoofHouses[1]['houses'];?></td>
                
                <td style="text-align: center;"><?php echo $getNoofHouses[2]['houses'];?></td>
                <td style="text-align: center;"><?php echo $getNoofHouses[3]['houses'];?></td>
               
                <td style="text-align: center;"><?php echo $getNoofHouses[4]['houses'];?></td>
                <td style="text-align: center;"><?php echo  $total = $getNoofHouses[0]['houses']+ $getNoofHouses[1]['houses']+$getNoofHouses[2]['houses']+$getNoofHouses[3]['houses']+$getNoofHouses[4]['houses'];?></td>

              </tr>
              <?php 
              $getAGMembers = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'AG%' and membership_status='Member'");
               $getBCMembers = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'BC%' and membership_status='Member'");
                $getCCMembers = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'CC%' and membership_status='Member'");
                 $getDCMembers = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'DC%' and membership_status='Member'");
                  $getESMembers = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'ES%' and membership_status='Member'");
?>
                 <tr>
                <td>Members</td>
                <td style="text-align: center;"><?php echo $getAGMembers[0]['members'];?></td>
                <td style="text-align: center;"><?php echo $getBCMembers[0]['members'];?></td>
                
                <td style="text-align: center;"><?php echo $getCCMembers[0]['members'];?></td>
                <td style="text-align: center;"><?php echo $getDCMembers[0]['members'];?></td>
               
                <td style="text-align: center;"><?php echo $getESMembers[0]['members'];?></td>
                <td style="text-align: center;"><?php echo $totalmembers = $getAGMembers[0]['members']+$getBCMembers[0]['members']+$getCCMembers[0]['members']+$getDCMembers[0]['members']+$getESMembers[0]['members'];?></td>

              </tr>
              <?php 
              $getAGWIP = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'AG%' and membership_status='Pending Approval'");
               $getBCWIP = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'BC%' and membership_status='Pending Approval'");
                $getCCWIP = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'CC%' and membership_status='Pending Approval'");
                 $getDCWIP = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'DC%' and membership_status='Pending Approval'");
                  $getESWIP = $ModelCall->rawQuery("SELECT count(houseno) as members FROM `tbl_temp_membership` where houseno like 'ES%' and membership_status='Pending Approval'");
?>
                 <tr>
                <td>WIP </td>
                <td style="text-align: center;"><?php echo $getAGWIP[0]['members'];?></td>
                <td style="text-align: center;"><?php echo $getBCWIP[0]['members'];?></td>
                
                <td style="text-align: center;"><?php echo $getCCWIP[0]['members'];?></td>
                <td style="text-align: center;"><?php echo $getDCWIP[0]['members'];?></td>
               
                <td style="text-align: center;"><?php echo $getESWIP[0]['members'];?></td>
                <td style="text-align: center;"><?php echo $totalwip = $getAGWIP[0]['members']+$getBCWIP[0]['members']+$getCCWIP[0]['members']+ $getDCWIP[0]['members']+$getESWIP[0]['members'];?></td>

              </tr>
            
              <tr >
                <td> No Application Received </td>
                <td style="text-align: center;"><?php echo $getNoofHouses[0]['houses']-( $getAGMembers[0]['members']+ $getAGWIP[0]['members'])?></td>
                <td style="text-align: center;"><?php echo $getNoofHouses[1]['houses']-( $getBCMembers[0]['members']+ $getBCWIP[0]['members'])?></td>
              
                <td style="text-align: center;"><?php echo $getNoofHouses[2]['houses']-( $getCCMembers[0]['members']+ $getCCWIP[0]['members'])?></td>
                <td style="text-align: center;"><?php echo $getNoofHouses[3]['houses']-( $getDCMembers[0]['members']+ $getDCWIP[0]['members'])?></td>
                <td style="text-align: center;"><?php echo $getNoofHouses[4]['houses']-( $getESMembers[0]['members']+ $getESWIP[0]['members'])?></td>
                <td style="text-align: center;"><?php echo $total-($totalmembers+$totalwip);?></td>

              </tr>
              </tbody>
              </table>
              </div>
            </div> 
          </div>
          </div>
      <div class="col-md-4">
          <div class="panel panel-table panel-primary">
            <div class="panel-heading" style="text-align: center;">
            WIP Report - Online Form Submission
            </div>
            <div class="panel-body">
      
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
              <thead >
                <tr style="font-size:bold">
                  <th style="text-align: center;"><b> Status </th>
                  <th style="text-align: center;"><b>Total</th>
               
                </tr>
              </thead>
              <tbody>
             <?php 
              $getPending = $ModelCall->rawQuery("SELECT count(*) as pending FROM `Wo_Membership` where approved_status='Pending' or approved_status='Reopened'");
               $getSentforCorrection = $ModelCall->rawQuery("SELECT count(*) as pending FROM `Wo_Membership` where approved_status='Sent for Correction'");
                $getECApproval = $ModelCall->rawQuery("SELECT count(*) as pending FROM `Wo_Membership` where approved_status='Admin Approved'");
                 $getPendingIDCards = $ModelCall->rawQuery("SELECT count(*) as pending FROM `Wo_Membership` where approved_status='EC Approved'");
                 
?>
              
              <tr>
                <td>Pending Correction </td>
                <td><?php echo $getSentforCorrection[0]['pending'];?></td>
                

              </tr>
              
                 <tr>
                <td>Pending Admin Approval </td>
                <td ><?php echo $getPending[0]['pending'];?></td>

              </tr>
              
                 <tr>
                <td>Pending Secy Approval  </td>
                <td><?php echo  $getECApproval[0]['pending'];?></td>
               
              </tr>
            
              <tr >
                <td> Pending Cards Issue  </td>
                <td ><?php echo  $getPendingIDCards[0]['pending'];?></td>
              
              </tr>
              </tbody>
              </table>
              </div>
            </div> 
          </div>
          </div>

        </div>
    </div>
  </div>
</div>


<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/raphael/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>

</body>
</html>
