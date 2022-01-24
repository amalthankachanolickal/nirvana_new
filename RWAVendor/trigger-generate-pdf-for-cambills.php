<?php include('model/class.expert.php');
include('adminsession_checker.php');


$getLatest = $ModelCall->rawQuery("SELECT distinct(start_period_date) as latest_bill_date, count(bill_number) as totalbills, end_period_date, actual_due_date FROM `tbl_billing_new` group by start_period_date order by latest_bill_date desc limit 1");
// echo "<pre>";
// print_r($getLatest);

  function dateformatchange($date){
  
    $date=date_create($date);
  
 $date_return=date_format($date,"d M Y");
 
 return $date_return;

}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Trigger CAM Bills Communication</title>
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

/*====================hiding show 10 entries==================*/
div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal;
    text-align: left;
    white-space: nowrap;
    display: none;
/*=================================================================*/
		</style>
</head>
<body>
    <div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-xs-6">
          <h4 class="page-title">Trigger CAM Bills Communication.</h4>
        </div>
        
      </div>
     <form class="m-b-30" name="theForm" action="<?php echo DOMAIN.AdminDirectory;?>controller/bills_upload_Controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <input type="hidden" name="ActionCall" value="TriggerPDFGeneration">
            <input type="hidden" name="start_bill_date" id="start_bill_date" value="">
             <input type="hidden" name="total_rec" id="total_rec" value="">
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table" id="example">
              <thead>
                <tr>
                  <th>Bill Start Date</th>
                  <th>Bill End Date</th>
                  <th>Due Date</th>
                  <th>Total Bills Uploaded</th>
                   <th>Send Mail & SMS </th>
                </tr>
              </thead>
              <tbody>
 <?php 

if(count($getLatest)>0){ 
    foreach($getLatest as $getCustomerInfoVal){ 
 ?>             
                        <tr>
                        <td> <?php echo dateformatchange($getCustomerInfoVal['latest_bill_date']);?></td>
                         <td> <?php echo dateformatchange($getCustomerInfoVal['end_period_date']);?></td>
                          <td> <?php echo dateformatchange($getCustomerInfoVal['actual_due_date']);?></td>
                        <td> <?php echo $getCustomerInfoVal['totalbills'];?>
                            </td>
                         
                             <td> <a href="#"  onclick="SelectedOption('<?php echo $getCustomerInfoVal['latest_bill_date'];?>', '<?php echo $getCustomerInfoVal['totalbills'];?>', 1)" 
                             class="btn btn-primary rounded">Generate Bills PDF</a>
                            </td>
               
  </tr>

<?php } 
               } else {?>
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
   $( document ).ready(function() {
  console.log( "ready!" );
  $('#example').dataTable({
     "order": [[ 0, "desc" ]], //or asc 
    "columnDefs" : [{"targets":0, "type":"date"}],
    });
   });
   
   function SelectedOption(start_bill_date, total){
    // alert(start_bill_date);
    // alert(checkoption);
    $("#start_bill_date").val(start_bill_date);
      $("#total_rec").val(total);
   //  $("#trigger_to").val(checkoption);
    document.theForm.submit();
}

</script>
</body>
</html>
