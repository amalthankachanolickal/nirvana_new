<?php include('model/class.expert.php');
include('adminsession_checker.php');
//$ModelCall->where("client_id", $getAdminInfo[0]['id']);
//$ModelCall->orderBy("id","desc");
$getAmenitiesManagementInfo = $ModelCall->get("tbl_survey");
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Survey Forms Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/addform.css">
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
          <h4 class="page-title">Survey Forms Management</h4>
        </div>
        <div class="col-xs-8 text-right m-b-30"> <a href="#" class="btn btn-primary pull-right rounded" data-toggle="modal" data-target="#add_survey_form"><i class="fa fa-plus"></i> Add Survey Form</a>
          <!--<div class="view-icons"> <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> <a href="employees-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> </div>-->
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Form Name</th>
                  <th>Author</th>
                    <th>Created Date</th>
                    <th>Expiry Date</th>
                    <th>Publish</th>
                  <th class="text-right">Action</th>
                  
                </tr>
              </thead>
              <tbody>
 <?php 
if(count($getAmenitiesManagementInfo)>0){ foreach($getAmenitiesManagementInfo as $getAmenitiesVal){ ?>             
                <tr>
                <td><a target="_blank" href="<?php echo DOMAIN ?>surveys.php?url=<?php echo ucwords($getAmenitiesVal['survey_name']);?>"><?php echo ucwords($getAmenitiesVal['survey_name']);?></a></td>
                
                   <td><?php echo ucwords($getAmenitiesVal['author']);?></td>
                   <td><?php echo ucwords($getAmenitiesVal['start_date']);?></td>
                   <td><?php echo ucwords($getAmenitiesVal['exp_date']);?></td>
                   <td> <?php if($getAmenitiesVal['is_published']=='Yes'){?> <!--a href="#" data-toggle="modal" data-target="#deactivate_amenities<?php echo $getAmenitiesVal['id'];?>" class="btn btn-success">Approved</a--> <div class="btn btn-success">Published</div><?php } else { ?> <a href="#" data-toggle="modal" data-target="#approve_survey<?php echo $getAmenitiesVal['id'];?>" class="btn btn-danger">Publish</a> <?php } ?> </td>
                  <td class="text-right">
                    <table width="100%">
                      <tr>
                        <td> <?php if($getAmenitiesVal['status']=='Approved'){?><a href="#" data-toggle="modal" data-target="#approve_survey<?php echo $getAmenitiesVal['id'];?>" class="btn btn-success">Approved</a> <?php } else { ?> <a href="#" data-toggle="modal" data-target="#approve_survey<?php echo $getAmenitiesVal['id'];?>" class="btn btn-danger">Pending</a> <?php } ?> </td>

                        <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                          <ul class="dropdown-menu pull-right">
                                            <li onclick="showEditQues($(this).next().text(),$(this).next().next().text());"><a href="#" data-toggle="modal" data-target="#edit_survey"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li style="display:none;"><?php echo ucwords($getAmenitiesVal['survey_name']);?></li>
                                            <li style="display:none;"><?php echo $getAmenitiesVal['id'];?></li>
                          <li onclick="csv_download($(this).prev().prev().text());"><a href="#"><i class="fa fa-download m-r-5"></i> Download</a></li>

                                            <li><a href="#" data-toggle="modal" data-target="#delete_survey<?php echo $getAmenitiesVal['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                          </ul>
                                        </div></td>
                      </tr>
                    </table>
                </td>
                
                </tr>
    <?php include('delete_survey_form_confirm.php'); ?>
      <?php include('approve_survey_forms_management.php'); ?>
                 <?php include('edit_survey_forms_management.php'); ?>
                <?php } } else {?>
                <tr><td colspan="7">There is no data available</td></tr>
                <?php } ?>
                
              </tbody-->
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php include('message_notification.php'); ?>
  </div>
  <?php include('add_survey_form.php'); ?>


</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>

<link rel="stylesheet" href="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.css">
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.js"></script>


<script src="<?php echo DOMAIN.AdminDirectory;?>assets/addform.js"></script>
<!--script src="<?php echo DOMAIN.AdminDirectory;?>assets/editform.js"></script-->
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/edit.js"></script>
<script>
$(function(){
$("#exp").datepicker({
  dateFormat: "yy-mm-dd",minDate:'0d'
});
$("#start").datepicker({
  dateFormat: "yy-mm-dd",minDate:'0d'
});
$(".eexp").datepicker({
  dateFormat: "yy-mm-dd",minDate:'0d'
});
$(".estart").datepicker({
  dateFormat: "yy-mm-dd",minDate:'0d'
});

});
var ADMIN_URL='<?php echo DOMAIN ?>RWAVendor/';
function csv_download(x){
 $.get(ADMIN_URL+"controller/getforms.php?response="+x, function(data){
	 var fileName = "Responses_"+x;
var uri = 'data:text/csv;charset=utf-8,' + escape(data);
var link = document.createElement("a");    
    link.href = uri;link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    });

}
</script>
<script>
function checkheading(){
var head=$('#heading').val();
$.get(ADMIN_URL+"controller/checkif.php?name="+head, function(data){
	 if(data=='yes'){
alert('A survey form with exactly same name '+head+' already exist. Please try with another name');
$('#heading').val('');
}
});
}
</script>
  <script src="<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace( 'desc',
{
 width:"800",
 height:"400",
 toolbar :
      [
        
        ['Source'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
        
        ['Styles','Format'],['FontSize'],
        ['Bold','Italic','Strike'],
        ['NumberedList','BulletedList','/','Outdent','Indent','Blockquote'],
        ['Link','Unlink','Anchor'],
        ['Maximize','-','About']
        
      ],

filebrowserBrowseUrl : '<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);</script>
</body>
</html>
