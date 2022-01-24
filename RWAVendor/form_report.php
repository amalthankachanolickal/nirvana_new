<?php include('model/class.expert.php');
include 'model/config.php';
include('adminsession_checker.php');

$dbs = new Database();
$db = $dbs->connect();

$sql = "SELECT form_name, SUM(view_count) as total_view, SUM(save_count) as total_save, SUM(submit_count) as total_submit FROM tbl_form_tracker";

if (isset($_POST['search'])) {
  $sql .= " WHERE form_name LIKE '%".$_POST['form_name']."%'";

  if (!empty($_POST['start_date'])) {
    $sql .= " AND DATE(reg_date) >= '".date('Y-m-d', strtotime($_POST['start_date']))."'";
  }

  if (!empty($_POST['end_date'])) {
    $sql .=  "AND DATE(reg_date) <= '".date('Y-m-d', strtotime($_POST['end_date']))."'";
  }
}

$query = mysqli_query($db, $sql);

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Customers Management</title>
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
          <h4 class="page-title">Form Report</h4>
        </div>
      </div>
      <div class="row ">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>form_report.php" method="post" enctype="multipart/form-data">
        
       
                          <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Form name</label>
                    <select class="form-control" id="form_name" name="form_name">
                        <option value='' selected disabled>Select Form</option>
                        <option value="DHC_FORM">DHC FORM</option>
                    </select>
                </div>
              </div>


               <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Start Date</label>
                  <input type="date" class="form-control" name="start_date">
                </div>
              </div>
                <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">End Date</label>
                  <input type="date" class="form-control" name="end_date">
                </div>
              </div>
     
        <div class="col-md-1"> <label class="control-label"></label><button type="submit" name="search"  class="btn btn-success btn-block"> <span class="glyphicon glyphicon-search"></span> </button> </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
          

            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Form Name</th>
                  <th>Total View</th>
                  <th>Total Saved</th>
                  <th>Total Submitted</th>
                  <th>Known Submissions</th>
                  <th>Unknown Submissions</th>
                </tr>
              </thead>
              <tbody>  
                <?php
                if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
                  if (!empty($data['form_name'])) {
                 ?>
                    <tr>
                      <td><?= $data['form_name'] ?></td>
                      <td><?= $data['total_view'] ?></td>
                      <td><?= $data['total_save'] ?></td>
                      <td><?= $data['total_submit'] ?></td>
                      <?php
                         $q2 = mysqli_query($db, "SELECT COUNT(id) FROM tbl_form_tracker WHERE user_id = '0'");
                         $d2 = mysqli_fetch_array($q2);
                      ?>
                      <td><?= $d2[0] ?></td>
                      <?php
                         $q2 = mysqli_query($db, "SELECT COUNT(id) FROM tbl_form_tracker WHERE user_id > '0'");
                         $d2 = mysqli_fetch_array($q2);
                      ?>
                      <td><?= $d2[0] ?></td>
                    </tr>
                <?php }
                  }
                }
                ?>
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



</body>
</html>
