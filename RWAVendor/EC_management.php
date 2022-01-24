<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['status']!='')
{
$ModelCall->where("status", $_REQUEST['status']);
}
else{
 $ModelCall->where("status", 'Current');   
}
if($_REQUEST['start_date']!='')
{
$ModelCall->where("start_date", $_REQUEST['start_date']);
}
if($_REQUEST['Email']!='')
{
$ModelCall->where("Email", $_REQUEST['Email']);
}
if($_REQUEST['Unit_no']!='')
{
$ModelCall->where("Unit_no", $_REQUEST['Unit_no']);
}
if($_REQUEST['end_date']!='')
{
$ModelCall->where("end_date", $_REQUEST['end_date']);
}

$getECInfo = $ModelCall->get("tbl_EC_uses");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>ECs - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
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
          <h4 class="page-title">ECs Management</h4>
        </div>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_EC"><i class="fa fa-plus"></i> Add EC</a>
          <!--<div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>EC_management.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Email</label>
            <input type="text" class="form-control floating" id="EC_name" name="Email" value="" />
          </div>
        </div>
         
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Start Date</label>
            <input type="text" class="form-control floating EC_date" name="start_date" value="" />
          </div>
        </div>
        <div class="col-sm-3 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">End Date</label>
            <input type="text" class="form-control floating EC_date" name="end_date" value="" />
          </div>
        </div>
         <div class="col-sm-2 col-xs-6">
          <div class="form-group form-focus">
                  <label class="control-label">Status<span class="text-danger"></span></label>
                    <select class="form-control" id="status" name="status">
                         <option value=''></option>
   <option value='Current'>Current</option>
                              <option  value='Former'>Former</option>
                            
  
    
  </select>
                </div>
              </div>
        
        
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
        </form>
      </div>
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                     <th>Name</th>
                  <th>Email</th>
                  <th>Unit No</th>
                 <th>Designation</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>status</th>
                 
                   <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getECInfo)>0){ foreach($getECInfo as $getECInfoVal){ ?> 
                <tr>
             
                  <td><?php echo $getECInfoVal['name']?></td>
                  <td><?php echo $getECInfoVal['Email'];?></td>
                  <td><?php echo $getECInfoVal['Unit_no'];?></td>
                  <td><?php echo $getECInfoVal['designation'];?></td>
                   <td><?php echo $getECInfoVal['start_date'];?></td>
                   <td><?php echo $getECInfoVal['end_date'];?></td>
                    <td><?php echo $getECInfoVal['status'];?></td>

                   <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_EC<?php echo $getECInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                       
                      </ul>
                    </div></td>
                </tr>
                <?php include('edit_EC.php'); ?>
    <?php include('delete_EC_confirm.php'); ?>
      <?php include('activate_EC_confirm.php'); ?>
        <?php include('deactivate_EC_confirm.php'); ?>
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
  <?php include('add_EC.php'); ?>
  
  
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>

<link rel="stylesheet" href="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.css">
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.js"></script>
<script>
var myDate=new Date();
  var date =('0'+ myDate.getDate()).slice(-2) + '-' + ('0'+ myDate.getMonth()+12).slice(-2) + '-' + myDate.getFullYear();

$(".ecstartdate").val(date);
	$(".ecstartdate").datepicker({
	    dateFormat: 'yy-mm-dd'
	    
	});
	
$(".ecenddate").datepicker({
  dateFormat: "yy-mm-dd",defaultDate: new Date()
});
$(".EC_date").datepicker({
  dateFormat: "yy-mm-dd"
});

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
