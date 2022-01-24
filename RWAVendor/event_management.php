<?php include('model/class.expert.php');
include('adminsession_checker.php');
if($_REQUEST['event_name']!='')
{
$ModelCall->where("event_name", $_REQUEST['event_name']);
}
if($_REQUEST['event_date']!='')
{
$ModelCall->where("event_date", $_REQUEST['event_date']);
}
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getEventInfo = $ModelCall->get("tbl_events");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Events - <?php echo SITENAME;?> Admin</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
		<![endif]-->
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="<?php echo DOMAIN.AdminDirectory;?>image/image-uploader.min.css">
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>image/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>image/image-uploader.min.js"></script>
<script>
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Category type' class='form-control input-md'  /> </td><td><input  name='price"+i+"' type='number' placeholder='Price'  class='form-control input-md'></td><td><input  name='oprice"+i+"' type='number' placeholder='Offer Price''  class='form-control input-md'></td><td><input  name='pinventory"+i+"' type='checkbox' placeholder='Part of Inventory''  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });
	 

});
     $(document).ready(function(){
      var i=1;
     $("#add_row_c").click(function(){
      $('#addrc'+i).html("<td>"+ (i+1) +"</td><td><input name='name_c"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><textarea  name='content"+i+"' type='text' placeholder='Content'  class='form-control input-md' rows='8'></textarea></td>");

      $('#tab_logic_c').append('<tr id="addrc'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row_c").click(function(){
    	 if(i>1){
		 $("#addrc"+(i-1)).html('');
		 i--;
		 }
	 });
	 

});

  $(document).ready(function(){
      var i=1;
     $("#add_row_i").click(function(){
      $('#addri'+i).html("<td>"+ (i+1) +"</td><td><input class='form-control'  id='event_picr"+(i+1)+"' name='event_picr"+(i+1)+"'  required   type='file'></td>");

      $('#tab_logic_i').append('<tr id="addri'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row_i").click(function(){
    	 if(i>1){
		 $("#addri"+(i-1)).html('');
		 i--;
		 }
	 });
	 

});
</script>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "mirror_field",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
</script>        
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-sm-4 col-xs-3">
          <h4 class="page-title">Events Management</h4>
        </div>
        <?php if($_SESSION['error']!='') {?> 
          <div class="alert  alert-info alert-dismissible" align="right" style="display:inline-block; float: right; margin-right:60px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $_SESSION['error'];?>
          </div>
          <?php unset($_SESSION['error']); 
        }?>
        <?php if( $_SESSION['result']){?>
          <div class="alert alert-success  alert-dismissible" align="center" style="display: block;margin-top: 7%;width: 80%;margin-left: 10%;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $_SESSION['result'];?> </div>
        <?php unset($_SESSION['result']);
      } ?>
        <div class="col-sm-8 col-xs-9 text-right m-b-20"> <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
          <!--<div class="view-icons"> <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
     <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>event_management.php" method="get" enctype="multipart/form-data">
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Event Name</label>
            <input type="text" class="form-control floating" id="event_name" name="event_name" value="<?php echo $_REQUEST['event_name'];?>" />
          </div>
        </div>
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
            <label class="control-label">Event Date</label>
            <input type="text" class="form-control floating" id="event_date" name="event_date" value="<?php echo $_REQUEST['event_date'];?>" />
          </div>
        </div>
        
        
        
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
        </form>
      </div>
      <div class="row">
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable" data-order='[[ 3, "desc" ]]'>
              <thead>
                <tr>
                  <th>Event Name</th>
                  <th>Event Address</th>
                  <th>Event Date/Time</th>
                  <th>Created</th>
                  <th>IP</th>
                  <th>Status</th>
                   <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
<?php if(count($getEventInfo)>0){ foreach($getEventInfo as $getEventInfoVal){ ?> 
                <tr>
                <td >
                  <a href="" class="avatar" style="text-align:center;">
                <?php if($getEventInfoVal['event_pic']!=''){ ?> <img class="avatar" src="<?php echo DOMAIN.AdminDirectory;?>events/photo/<?php echo $getEventInfoVal['event_pic'];?>"> <?php } else { ?>
                <?php echo substr($getEventInfoVal['event_name'],0,1);?>
                        <?php } ?>
                 </a> <h2><?php echo ucwords($getEventInfoVal['event_name']);?></h2></td>
                  <td><?php echo $getEventInfoVal['event_location'];?></td>
                  <td><?php echo $getEventInfoVal['event_date'];?>/<?php echo $getEventInfoVal['event_time'];?></td>
                   <td><?php echo $getEventInfoVal['created_date'];?></td>
                    <td><?php echo $getEventInfoVal['created_ip'];?></td>
                   <td> <?php if($getEventInfoVal['status']==1){?> <a href="#" data-toggle="modal" data-target="#deactivate_event<?php echo $getEventInfoVal['id'];?>" class="btn btn-success">Active</a><?php } else { ?> <a href="#" data-toggle="modal" data-target="#activate_event<?php echo $getEventInfoVal['id'];?>" class="btn btn-danger">Inactive</a> <?php } ?> </td>

                   <td class="text-right"><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#edit_event<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#sell_admin<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-ticket" aria-hidden="true"></i>Sell Tickets</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#delete_event<?php echo $getEventInfoVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                      </ul>
                    </div></td>
                </tr>
                <?php include('edit_event.php'); ?>
                <?php include('sell_tickets_admin.php'); ?>
    <?php include('delete_event_confirm.php'); ?>
      <?php include('activate_event_confirm.php'); ?>
        <?php include('deactivate_event_confirm.php'); ?>
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
  <?php include('add_event.php'); ?>
  
  
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(document).ready(function () {	
	$(".event_date").datepicker({dateFormat: 'dd-mm-yy',minDate:'0d' });
  $(".event_date").datepicker({dateFormat: 'dd-mm-yy',minDate:'0d' });
  	
});


</script>

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
