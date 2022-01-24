<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['mail_subject']!='')
{
$ModelCall->where("mail_subject","%".$_REQUEST['mail_subject']."%",'like');
}
if($_REQUEST['mail_start_date']!='')
{
$ModelCall->where("mail_start_date", $_REQUEST['mail_start_date']);
}

if($_REQUEST['status']!='')
{
$ModelCall->where("status", $_REQUEST['status']);
}

//$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->where("category_mail","Custom Mail");
$ModelCall->orderBy("id","desc");

$getNewsInfo = $ModelCall->get("batch_mail_cron_file");
/*echo "<pre>";
var_dump($getNewsInfo);
echo "</pre>";
exit;*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Custom Mail Report - <?php echo SITENAME;?> Admin</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
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
        <div class="col-sm-4 col-xs-3">
          <h4 class="page-title">Custom Mail Report</h4>
        </div>
       
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>mails_report.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-3 col-xs-3">
          <div class="form-group form-focus">
            <label class="control-label">Mail Subject</label>
            <input type="text" class="form-control floating" id="mail_subject" name="mail_subject" value="<?php echo $_REQUEST['mail_subject'];?>" />
          </div>
        </div>
        <div class="col-sm-3 col-xs-3">
          <div class="form-group form-focus">
            <label class="control-label">Mail Status </label>
           
              <select id="status" name="status" value="<?php echo $_REQUEST['status'];?>" class="form-control">
                    <!--<option value="" default disabled hidden></option>-->
                    <option value="">Choose Status</option>
                    <option value="Completed">Completed</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="tobestarted">To Be Started</option>
               
                  </select>
          </div>
        </div>
         <div class="col-sm-3 col-xs-3">
          <div class="form-group form-focus">
            <label class="control-label">Mail Sent Date </label>
            <input type="date" class="form-control floating" id="mail_start_date" name="mail_start_date" value="<?php echo $_REQUEST['mail_start_date'];?>" />
          </div>
        </div>
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
        </form>
      </div>
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable" width="90%">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Mail Subject</th>
                  <!--<th><h5>Mail Content</h5></th>-->
                   <th>Mail Sent Date</th>
                  <th>Status</th>
                  <th>Total Mails</th>
                  <th>Mails Left to Sent</th>
                  <th stle>Attachments (if Any)</th>
                  <th>Sent From Mailid</th>
                
                </tr>
              </thead>
              <tbody>
<?php 
$c=0;
if(count($getNewsInfo)>0){ foreach($getNewsInfo as $getNewsInfoVal){
$c++;
?> 
                <tr>
                    <td><?php echo $c ?></td>
                <td >
                    <h2  width="20%" ><?php echo ucwords($getNewsInfoVal['mail_subject']);?></h2></td>
                  <!--<td><?php // echo $getNewsInfoVal['mail_content'];?></td>-->
                     <td style="white-space: nowrap;"><?php echo $getNewsInfoVal['mail_start_date'];?></td>
                  <td width="20%"><?php echo $getNewsInfoVal['status'];?></td>
                   <td><?php if($getNewsInfoVal['Completed']) echo $getNewsInfoVal['current_offset']; else 
                   echo abs($getNewsInfoVal['current_offset']+ $getNewsInfoVal['count_mail_left']);?></td>
            <td width="20%"><?php echo $getNewsInfoVal['count_mail_left'];?></td>
             <td width="20%"><?php echo $getNewsInfoVal['attachment'];?></td>
                <td width="20%"><?php echo $getNewsInfoVal['selfrom'];?></td>
                </tr>
                <?php } } else {?>
                <tr><td colspan="7">There is no data available</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
/*$(document).ready(function () {	
	$(".event_date").datepicker({dateFormat: 'dd-mm-yy',minDate:'0d' });
	
});*/


</script>

<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
