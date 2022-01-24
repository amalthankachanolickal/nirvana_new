<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Settings</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
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
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-8 col-md-offset-2">
          <form  action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpateClientWebsiteSetting">
            <input type="hidden" name="eid" value="<?php echo $getAdminInfo[0]['id'];?>">
            <h3 class="page-title">Company Details</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Company Name <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" value="<?php echo $getAdminInfo[0]['client_company_name'];?>" id="client_company_name" name="client_company_name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Contact Person <span class="text-danger">*</span></label>
                  <input class="form-control " value="<?php echo $getAdminInfo[0]['client_name'];?>" id="client_name" name="client_name" required type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Address <span class="text-danger">*</span></label>
                  <input class="form-control " value="<?php echo $getAdminInfo[0]['client_address'];?>" id="client_address" name="client_address" required type="text">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>Country <span class="text-danger">*</span></label>
                 <input class="form-control " value="<?php echo $getAdminInfo[0]['client_country'];?>" id="client_country" name="client_country" required type="text">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>City <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_city'];?>" id="client_city" name="client_city" required type="text">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>State/Province <span class="text-danger">*</span></label>
                   <input class="form-control" value="<?php echo $getAdminInfo[0]['client_state'];?>" id="client_state" name="client_state" required type="text">
              </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>Postal Code <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_zipcode'];?>" id="client_zipcode" name="client_zipcode" required type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Login Email <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_email'];?>" id="client_email" name="client_email" required type="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Office Number <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_phone'];?>" id="client_phone" name="client_phone" required type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Maintenance Number <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_mobile'];?>" id="client_mobile" name="client_mobile" required type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Fax <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_fax_number'];?>" id="client_fax_number" name="client_fax_number" required type="text">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>GST Number <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_gst_number'];?>" id="client_gst_number" name="client_gst_number" required type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Company Registration No. <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_company_number'];?>" id="client_company_number" name="client_company_number" required type="text">
                </div>
              </div>
              <?php /*?><div class="col-sm-6">
                <div class="form-group">
                  <label>GST Tax(%) <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['GST_Tax'];?>" id="GST_Tax" name="GST_Tax" required type="text">
                </div>
              </div><?php */?>
            </div>
            
            
            
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Support Email Address <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_support_email'];?>" id="client_support_email" name="client_support_email" required type="text">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Accountant Email Address <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_accountant_email'];?>" id="client_accountant_email" name="client_accountant_email"  type="text">
                </div>
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Office Email Address <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_office_email'];?>" id="client_office_email" name="client_office_email" required type="text">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Info Email Address <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_info_email'];?>" id="client_info_email" name="client_info_email"  type="text">
                </div>
              </div>
            </div>
            
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Office CRM Address <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['office_crm_email'];?>" id="office_crm_email" name="office_crm_email" required type="text">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Office Marketing Address <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_marketing_mail'];?>" id="client_marketing_mail" name="client_marketing_mail"  type="text">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Office EC Updates Address <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['office_ec_update_email'];?>" id="office_ec_update_email" name="office_ec_update_email"  type="text">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Residents Google Group Address <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_google_group_mail'];?>" id="client_google_group_mail" name="client_google_group_mail"  type="text">
                </div>
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Website Url <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_website_url'];?>" id="client_website_url" name="client_website_url" required type="text">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Instagram Link <span class="text-danger"></span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_instagram_url'];?>" id="client_instagram_url" name="client_instagram_url"  type="text">
                </div>
              </div>
            </div>
            
             
              
              
              <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Facebook Link </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_facebook_url'];?>" id="client_facebook_url" name="client_facebook_url"   type="text">
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Twitter Link </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_twitter_url'];?>" id="client_twitter_url" name="client_twitter_url"  type="text">
                </div>
              </div>
              
              </div>
              
              <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Google Plus Link </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_google_url'];?>" id="client_google_url" name="client_google_url"   type="text">
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Youtube Link </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_youtube_url'];?>" id="client_youtube_url" name="client_youtube_url"  type="text">
                </div>
              </div>
              
              </div>
              
              
              
              
              
              <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Google Play Store  </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_google_play_store'];?>" id="client_google_play_store" name="client_google_play_store"   type="text">
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Apple Store  </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_apple_store'];?>" id="client_apple_store" name="client_apple_store"  type="text">
                </div>
              </div>
              
              </div>
              
              
                <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Office Timings  </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_office_timings'];?>" id="client_office_timings" name="client_office_timings"   type="text">
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Youtube Video Embeded URL  </label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_youtube_embed_url'];?>" id="client_youtube_embed_url" name="client_youtube_embed_url"  type="text">
                </div>
              </div>
              
              </div>
              
              
            
            
            <div class="row">
             <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Copy Right  <span class="text-danger">*</span></label>
                  <input class="form-control" value="<?php echo $getAdminInfo[0]['client_copy_right'];?>" required id="client_copy_right" name="client_copy_right"   type="text">
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Logo  <span class="text-danger">*</span></label>
                  <input class="form-control"  id="client_logo" name="client_logo" <?php if($getAdminInfo[0]['client_logo']==''){?> required <?php } ?>   type="file">
                  <?php if($getAdminInfo[0]['client_logo']!=''){?><br> <img src="<?php echo DOMAIN.AdminDirectory;?>client_logo/<?php echo $getAdminInfo[0]['client_logo'];?>" style="width:50%;">
                  <input type="hidden" name="client_logoOld" value="<?php echo $getAdminInfo[0]['client_logo'];?>">
                  <?php } ?>
                  
                </div>
              </div>
              
              
              </div>
            
            <div class="row">
              <div class="col-sm-12 text-center m-t-20">
                <button type="submit" class="btn btn-primary">Save &amp; update</button>
              </div>
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
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
