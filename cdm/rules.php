<?php include('model/class.expert.php');
$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte",'RULES');
$ModelCall->orderBy("id","desc");
$getNoticeInfo = $ModelCall->get("tbl_document_directory");
//include('CheckCustomerLogin.php');
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Top'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow = $ModelCall->get("tbl_ads_management_directory");


$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Bottom'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow1 = $ModelCall->get("tbl_ads_management_directory");
?>
<!DOCTYPE html>
<html>
<head>
<!-- meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"       content="width=device-width, initial-scale=1.0">
<meta name="description"    content="">
<meta name="keywords"       content="">
<meta name="author"         content="">
<!-- Site title -->
<title>Document</title>
<meta name="keywords" content="<?php echo $getAboutInfo[0]['meta_keyword']; ?>"/>
<meta name="description" content="<?php echo $getAboutInfo[0]['meta_description']; ?>"/>

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.png">
<!-- Bootstrap css -->
<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
<!--Font Awesome css -->
<link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">
<!-- Owl Carousel css -->
<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">
<!-- Site css -->
<link href="<?php echo SITE_URL;?>assets/css/home-style.css" rel="stylesheet">
<!-- Responsive css -->
<link href="<?php echo SITE_URL;?>assets/css/responsive.css" rel="stylesheet">
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>



</head>
<body>
<!-- Navigation area starts -->
<?php include(ROOTACCESS."front_header.php");?>
<!-- Navigation area ends -->
<div class="clearfix"></div>
<!-- Slider area starts -->

<!-- Slider area ends -->
<!-- Home Banner area starts -->

<!-- Home Banner area end -->
<!-- About area starts -->
<br><br><br>

<section id="about" class="about-area section-big">

  <div class="container">
<div class="row">
     <div class="col-md-12" style="text-align:center;">
         <h1>Rules</h1>
         </div>
    
       <div class="col-md-3"></div>
         
        <div class="col-md-6" style="align:center;">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
          <div class="table-responsive">
          

            <table class="table table-striped custom-table datatable ">
             
              <thead>
                
                <tr>
                  <th ><i class="fa fa-download" align="center"></i></th>
                  <th align="left">Name</th>
                  <th align="left">Description</th>
                  
                  </tr>
              </thead>
              <tbody>
<?php if($getNoticeInfo[0]>0){ foreach($getNoticeInfo as $getNoticeInfoVal){ 
$FindYears = trim($getNoticeInfoVal['created_date']);?>             
                <tr>
                  <td align="center"><p>  <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>" target="_blank"> <i class="fa fa-download"></i></a></p> </td>

                
                  <td><a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>"><?php echo $getNoticeInfoVal['document_file_name'];?></a> </td>
                 
                  <td>
                  <a href="<?php echo SITE_URL.MAINADMIN;?>documents/<?php echo $getNoticeInfoVal['document_file'];?>"> <?php echo $getNoticeInfoVal['description'];?></a> 
	
                  </td>
                  
               
  </tr>
  <?php }?>
   </tbody> 
</table>

				
    <?php include('delete_customers_confirm.php'); ?>
 <?php include('user_status_update.php'); ?>
                <?php include('admin_approval_rejection.php');
                ?>
      <?php include('activate_customers_confirm.php'); ?>
        <?php include('deactivate_customers_confirm.php'); ?>
        <?php include('edit_customers.php'); ?>
                <?php  } else {?>
                <tr><td colspan="7">There is no data available</td></tr>
                <?php } ?>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3"></div>
        
      </div>
      <div class="row"><div class="col-md-3"></div>
          <div class="col-md-3">
         <?php if($getBannerShow1[0]['ads_banner_type']=="Image"){?>
    <a href="<?php echo $getBannerShow1[0]['ads_management_url'];?>" target="_blank">  <img src="https://nirvanacountry.co.in/RWAVendor/ads_managements/<?php echo $getBannerShow1[0]['ads_management_file'];?>"class="img-responsive inline-block" alt="Responsive image" style="width:900px; height:90px;"></a>
     <?php } ?>
         
         </div>
         <div class="col-md-3">
         <?php if($getBannerShow1[0]['ads_banner_type']=="Image"){?>
    <a href="<?php echo $getBannerShow1[0]['ads_management_url'];?>" target="_blank">  <img src="https://nirvanacountry.co.in/RWAVendor/ads_managements/<?php echo $getBannerShow1[0]['ads_management_file'];?>"class="img-responsive inline-block" alt="Responsive image" style="width:900px; height:90px;"></a>
     <?php } ?>
         
         </div>
         <div class="col-md-3"></div></div>
  </div>
</section>


<!-- Footer starts-->
<?php include(ROOTACCESS."HomefooterCall.php");?>

<!-- copyright area ends -->
<!-- Latest jQuery -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>
<!-- Owl Carousel js -->
<script src="<?php echo SITE_URL;?>assets/js/owl.carousel.min.js"></script>
<!-- Mixitup js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.mixitup.js"></script>
<!-- Magnific popup js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- Waypoint js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.waypoints.min.js"></script>
<!-- Ajax Mailchimp js -->
<script src="<?php echo SITE_URL;?>assets/js/jquery.ajaxchimp.min.js"></script>
<!-- Main js-->
<script src="<?php echo SITE_URL;?>assets/js/main_script.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>
