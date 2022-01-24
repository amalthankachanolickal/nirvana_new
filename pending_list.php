<?php include('model/class.expert.php');

$getNoticeInfo = $ModelCall->rawQuery("SELECT * FROM `covid_case_details` ORDER BY id DESC");





$ModelCall->where("ads_banner_size ='728X90'");

$ModelCall->where("ads_banner_position ='Top'");

$ModelCall->where("status",1);

$ModelCall->orderBy("RAND()");

$getBannerShow = $ModelCall->get("tbl_ads_management_directory");



$indexvalues = $ModelCall->get("tbl_ads_index");

$ModelCall->where("ads_banner_size ='728X90'");

$ModelCall->where("ads_banner_position ='Bottom'");

$ModelCall->where("status",1);

$ModelCall->orderBy("RAND()");

$getBannerShow1 = $ModelCall->get("tbl_ads_management_directory");

$ModelCall->where("status",1);

$getAdvertise = $ModelCall->get("tbl_adervitiser_module");

$i=0;

foreach($getAdvertise as $arrays){

if($arrays['image']!=""){

$images[$i]="https://www.nirvanacountry.co.in/RWAVendor/ads_managements/photos/".$arrays['image'];

if($arrays['contact']!=''){

$url[$i]="tel:".$arrays['contact'];

}

else{

$url[$i]="https://".$arrays['url'];

}





$i++;

}

}

?>





<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo SITENAME?> - Covid List - Dashboard</title>
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico">

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

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet">


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

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

  gtag('config', 'UA-55877669-17');

</script>

<script type = "text/javascript">

var i = 0; 			// Start Point

var k1="<?php echo $indexvalues[0]['first_index']?>";

var k2="<?php echo $indexvalues[0]['secound_index']?>";

var images = <?php echo json_encode($images); ?>;	// Images Array

var url = <?php echo json_encode($url); ?>;

var time = 5000;	// Time Between Switch

	 

// Image List

//images[0] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";

//images[1] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Garima.jpg";



//images[2] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";

//images[3] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Screenshot (32).png";



// Change Image

function changeImg(){

    

	document.slide.src = images[k1];

    document.getElementById("image_url").href = url[k1];

    document.slide1.src = images[k2];

    document.getElementById("image_url1").href = url[k2];

	// Check If Index Is Under Max

	if(k1 < images.length - 1){

	  // Add 1 to Index

	  k1++; 

	} else { 

		// Reset Back To O

		k1 = 0;

	}

	if(k2 < images.length - 1){

	  // Add 1 to Index

	  k2++; 

	} else { 

		// Reset Back To O

		k2 = 0;

	}

	// Run function every x seconds

	setTimeout("changeImg()", time);

}



// Run function when page loads

window.onload=changeImg;

    </script>

    
 <style>  
    
 table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th.dtr-control:before{
    margin-top:0px !important;
    top:10% !important;
}
    
table.dataTable thead .sorting, table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc {
    background-image: none;
}
   </style> 
 
</head>

<body>

    <?php include(ROOTACCESS."front_header.php");?>

<!-- Begin Content		-->


<div class="container">
<div style="padding-top:80px"></div>
<h3 style="text-decoration: underline;" class="tile-page-h2 text-center">Pending Plasma Donors List</h3>   

    

    <hr/>
    
    
        <?php

    if ($_REQUEST['actionResult'] == 'sent') { ?>
      <p style="color:#37a000">Mail and Message Successfully Sent.</p>
  <?php
    } ?>
    <div style="overflow-x:hidden;">
      
    
   <table class="table table-striped table-hover dt-responsive display" id="dataTable">
      <thead class="bg-primary" style="font-size: 16px;">

      <tr>
        <th style="text-align:center" data-priority="1">Blood Group</th>
        <th style="text-align:center" data-priority="2">
            <i  class='fa fa-envelope-o'></i><span>&nbsp;/&nbsp;</span><i class='fa fa-phone'></i>
        </th>
        <th  style="text-align:center">Plasma Donar</th>
        <th  style="text-align:center">House No</th>
        <th style="text-align:center">Mail/SMS sent</th>
       </tr>
      </thead>

      

      <tbody>

          <?php if($getNoticeInfo[0]>0){ foreach($getNoticeInfo as $getNoticeInfoVal){ 
              
              
              
          ?>
      
        <tr>

         <td class="text-center">
              <?php 
              if($getNoticeInfoVal['bloodgroup'] == NULL || $getNoticeInfoVal['bloodgroup'] == ''){
                  echo 'N/A';
              } else{
                  echo $getNoticeInfoVal['bloodgroup'];
              }
              ?>
            </td>
        
        
        <td class="text-center" style="cursor:pointer" >
            <a href="controller/pending_list_cotroller.php?id=<?php echo $getNoticeInfoVal['id']?>&house_no=<?php echo $getNoticeInfoVal['House No.']; ?>">
          <i  style="color:#4267B2;font-size:18px;" class='fa fa-envelope-o'></i>
          <span style="color:#4267B2">&nbsp;/&nbsp;</span><i  style="color:#4267B2;font-size:18px" class='fa fa-phone'></i>
          </a>
          </td>
          
          <td class="text-center">
              <?php 
              if($getNoticeInfoVal['is_plasma_donar'] == NULL || $getNoticeInfoVal['is_plasma_donar'] == ''){
                  echo 'N/A';
              } else{
                  echo $getNoticeInfoVal['is_plasma_donar'];
              }
              ?>
            </td>
            
            
        
            
            <td class="text-center">
              <?php 
              if($getNoticeInfoVal['House No.'] == NULL || $getNoticeInfoVal['House No.'] == ''){
                  echo 'N/A';
              } else{
                  echo $getNoticeInfoVal['House No.'];
              }
              ?>
            </td>
            
            
                <td class="text-center">
              <?php 
              if($getNoticeInfoVal['is_mail_sent'] == NULL || $getNoticeInfoVal['is_mail_sent'] == ''){
                  echo 'N/A';
              } else{
                  echo $getNoticeInfoVal['is_mail_sent'];
              }
              ?>
            </td>
          
         
          
          
       
        </tr>

        <?php 
        }
        }?>

      </tbody>

    </table>
    </div>
  </div>

 

 <?php include(ROOTACCESS."HomefooterCall.php");?>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  

</body>

</html>



