<?php include('model/class.expert.php');
include('adminsession_checker.php');
$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSManagementInfo = $ModelCall->get("tbl_cms_management");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>CMS Management - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
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
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-xs-8">
          <h4 class="page-title">CMS Management - Advertise</h4>
        </div>
        
      </div>
      
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateCMSManagementAdvertise">
            <input type="hidden" name="eid" value="<?php echo $getCMSManagementInfo[0]['id'];?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
             <input type="hidden" name="page_name" value="advertise" />
            <div class="row">
            
               <div class="col-sm-12">
                <div class="form-group">
                  <label>Content <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="content_data"  id="content_data" cols="5" rows="8"><?php echo $getCMSManagementInfo[0]['content_data'];?></textarea>
                </div>
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Meta Title <span class="text-danger"></span></label>
                <textarea class="form-control" name="meta_title" id="meta_title" cols="5" rows="2"><?php echo $getCMSManagementInfo[0]['meta_title'];?></textarea>
                </div>
              </div>
              
              
               <div class="col-sm-12">
                <div class="form-group">
                  <label>Meta Keyword <span class="text-danger"></span></label>
                    <textarea class="form-control" name="meta_keyword" id="meta_keyword" cols="5" rows="4"><?php echo $getCMSManagementInfo[0]['meta_keyword'];?></textarea>
                </div>
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Meta Discription <span class="text-danger"></span></label>
                <textarea class="form-control" name="meta_description" id="meta_description" cols="5" rows="4"><?php echo $getCMSManagementInfo[0]['meta_description'];?></textarea>
                </div>
              </div>
              
              
              
            </div>
            
            <div class="m-t-20 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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

<script src="<?php echo DOMAIN.AdminDirectory;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace( 'content_data',
{
width:"1080",
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
