<?php include('model/class.expert.php');

include 'model/config.php';

$dbs = new Database();

$db = $dbs->connect();



$ModelCall->orderBy("orderid","asc");

$getNoticeInfo = $ModelCall->get("tbl_grocery_mgmt");

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

    <title>Grocery Home Delivery List</title>

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

var i = 0;      // Start Point

var k1="<?php echo $indexvalues[0]['first_index']?>";

var k2="<?php echo $indexvalues[0]['secound_index']?>";

var images = <?php echo json_encode($images); ?>; // Images Array

var url = <?php echo json_encode($url); ?>;

var time = 5000;  // Time Between Switch

   

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

       #dataTable tfoot {

  display: table-header-group;

}



mark {

  background: orange;

  color: #000;

}





.text-right-i {

  text-align: right !important;

}





.dataTables_wrapper .dataTables_paginate .paginate_button {

  padding: 0;

  margin-left: -2px;

}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {

  background: none;

  border-color: transparent;

}





table.dataTable thead th {

  background-image: none !important;

}





table.dataTable thead th::after {

  font-family: "FontAwesome";

  display: inline-block;

  margin-left: 10px;

  opacity: 0.75;

}

/*table.dataTable thead th.sorting::after {

  content: "\f0dc";

}

table.dataTable thead th.sorting_asc::after {

  content: "\f0de";

}

table.dataTable thead th.sorting_desc::after {

  content: "\f0dd";

}*/

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {

    padding: 13px;

}

.dataTables_wrapper .dataTables_paginate .paginate_button {

    padding: 6px 11px;

    margin-left: -2px;

}

.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {

    color: #fff !important;

    border: 1px solid #37a000;

    background-color: #37a000;

    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc)); */

    /* background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%); */

    background: -moz-linear-gradient(top, #37a000 0%, #37a000 100%);

    background: -ms-linear-gradient(top, #37a000 0%, #37a000 100%);

    background: -o-linear-gradient(top, #37a000 0%, #37a000 100%);

    background: linear-gradient(to bottom, #37a000 0%, #37a000 100%);

}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {

    color: #37a000 !important;

}

.bg-primary {

    color: #fff;

    background-color: #37a000 !important;

    border: 1px solid #000 !important;

}

table#dataTable{

  border: 1px solid #ddd;

}

input[type="search"] {

    border: none;

    border-bottom: 1px solid #969595;

    outline: none;

}

table#dataTable {

    max-width: 100% !important;

    border: 1px solid #717171 !important;

    border-radius: 5px;

    overflow: hidden;

}

.dataTables_wrapper{

  width: 98%;

  margin: 0 auto;

}

table.dataTable {

    border-collapse: inherit;

}

table>thead>tr>th {

    vertical-align: bottom;

    border-bottom: 1px solid #717171 !important ;

}



table#dataTable tr td{

  vertical-align: middle;

  padding: 0px auto !important;

}



.likers a, .like-contain-lg a {

  color: black;

}







      .header-cont {

        display: flex;

        align-items: center;

        padding: 15px;

        border-radius: 8px;

        background-color: #37a000;

        color: #fff;

      }



      .social-active {

        color: #37a000 !important;

      }



      .data-cont {

        display: flex;

        align-items: center;

        padding: 15px;

        border: 2px solid #37a000;

        margin: 10px auto;

        border-radius: 8px;

      }



      .data-cont div {        

        white-space: pre-wrap;      

        white-space: -moz-pre-wrap;

        white-space: -pre-wrap;   

        white-space: -o-pre-wrap; 

        word-wrap: break-word;

      }



      .right-border {

        border-right: 1px solid #fff;

      }



      .right-border-dark {

        border-right: 1px solid #37a000;

      }



      .text-bold {

        font-weight: bold;

      }



      .header-border {

        height: 1.5px;

        background-color: #37a000;

        margin: 25px auto 15px auto;

      }



      .my-btn {

        padding: 2px 15px;

        border: 2px solid #1f9cd8;

        color: #1f9cd8;

        border-radius: 8px;

      }



      .mobile-data {

        display: none;

      }



      .mobile-head {

        display: flex;

        border-bottom: 1px solid #37a000;

        padding: 5px 0px;

        justify-content: space-between;

      }



      .mobile-cont {

        padding: 0px;

      }



      .mobile-cont p, .mobile-head p {        

        white-space: pre-wrap;      

        white-space: -moz-pre-wrap; 

        white-space: -pre-wrap;     

        white-space: -o-pre-wrap;

        word-wrap: break-word;

      }



      @media screen and (max-width: 768px) {

        .header-cont, .data-cont, .header-border {

          display: none;

        }



        .mobile-cont-header {

          display: flex;

          align-items: center;

          justify-content: space-between;

          font-size: 12px;

          border-bottom: 1px solid #37a000;

        }



        .mobile-cont-header p.store-name {

          max-width: 33%;

        }



        p.store-name a {

          color: #000;

          font-weight: bold;

        }



        .like-contain-lg {

          display: flex;

          align-items: center;

          font-size: 14px;

          padding: 0px;

          margin-top: -10px;

        }

        .like-contain-lg a {

          margin-left: 5px;

        }



        .mobile-cont-contain {

          display: flex;

          align-items: center;

          justify-content: space-between;

          padding: 5px 0px;

        }



        .mobile-data {

          display: flex;

          flex-direction: column;

          justify-content: center;

          padding: 15px;

          border: 2px solid #37a000;

          border-radius: 8px;

          font-size: 12px;

          margin: 15px auto 7.5px auto;

        }

        .hide-on-small { 

          display: none;

        }

        .dataTables_wrapper {

          display: none;

        }

      }

    </style>

</head>

<body>

    <?php include(ROOTACCESS."front_header.php");?>

<!-- Begin Content    -->

<h3 style="text-decoration: underline; margin-top: 100px;" class="tile-page-h2 text-center">Grocery Home Delivery List</h3>

<div class="container-fluid">



    <hr/>

    <table class="table table-striped table-hover dt-responsive text-center hide-on-small" id="dataTable">

      <caption class="sr-only">Table example</caption>

      

      <thead class="bg-primary">

                <tr>

                  <th class="first text-center" scope="col">Tied Up By</th>

                  <th class="second text-center" scope="col">Store</th>

                  <th class="third text-right-i" scope="col">Contact Number</th>

                  <th class="fourth text-right-i" scope="col">Min Order</th>

                  <th class="fifth text-right-i" scope="col">Delivery Charge</th>

                  <th class="sixth text-center" scope="col">Product List</th>

                  <th class="seventh text-center" scope="col">Delivery Time</th>

                  <th class="eighth text-center" scope="col">Process</th>

                  <th class="nineth text-center" scope="col">Website</th>

                  <th class="tenth text-center" scope="col">Reviews</th>

                </tr>

      </thead>

      <tfoot class="hidden">

                <tr>

                  <th class="first text-center" scope="col">Tied Up By</th>

                  <th class="second text-center" scope="col">Store</th>

                  <th class="third text-right-i" scope="col">Contact Number</th>

                  <th class="fourth text-right-i" scope="col">Min Order</th>

                  <th class="fifth text-right-i" scope="col">Delivery Charge</th>

                  <th class="sixth text-center" scope="col">Product List</th>

                  <th class="seventh text-center" scope="col">Delivery Time</th>

                  <th class="eighth text-center" scope="col">Process</th>

                  <th class="nineth text-center" scope="col">Website</th>

                  <th class="tenth text-center" scope="col">Reviews</th>

                </tr>

      </tfoot>

      <tbody>

     <?php if($getNoticeInfo[0]>0){ foreach($getNoticeInfo as $getNoticeInfoVal){ 

?> 

   <tr>

                <td style="text-align: left;"><?php echo ucwords($getNoticeInfoVal['tied_up_by']);?></td>

                <td  style="text-align: left;"><?php echo ucwords($getNoticeInfoVal['store']);?></td>

                <td class="text-right-i">

                  <?php

                  if(($getNoticeInfoVal['mobile']=='')|| ($getNoticeInfoVal['mobile']=='-') ){

                   echo "-" ;

                  }

                   elseif ( (substr($getNoticeInfoVal['mobile'], 0, 3)!== "+91")) { ?>

                  <a href="tel:+91-<?= $getNoticeInfoVal['mobile'] ?>">+91-<?php echo $getNoticeInfoVal['mobile'];?></a>

                  <?php

                    } else { ?>

                  <a href="tel:<?= $getNoticeInfoVal['mobile'] ?>"><?php echo $getNoticeInfoVal['mobile'];?></a>

                  <?php

                    }

                  ?></td>

                <td class="text-right-i"><?php if ($getNoticeInfoVal['min_order'] > 0) { ?>&#8377; <?php echo ucwords($getNoticeInfoVal['min_order']);?>.00 <?php } else echo $getNoticeInfoVal['min_order']; ?></td>

                <td class="text-right-i"><?php if ($getNoticeInfoVal['delivery_charge'] > 0) { ?>&#8377; <?php echo ucwords($getNoticeInfoVal['delivery_charge']);?>.00<?php } else echo $getNoticeInfoVal['delivery_charge']; ?></td>

                <td><?php if ($getNoticeInfoVal['product_price_list'] != '') { ?><a href="<?php echo SITE_URL; ?>RWAVendor/documents/grocery/<?php echo $getNoticeInfoVal['product_price_list']; ?>" target="_blank"><i class="fa fa-list"></i></a><?php } ?></td>

                <td><?php echo ucwords($getNoticeInfoVal['delivery_time']);?></td>

                <td><?php if ($getNoticeInfoVal['process'] != '') { ?><a href="<?php echo SITE_URL; ?>RWAVendor/documents/grocery/<?php echo $getNoticeInfoVal['process']; ?>" target="_blank"><i class="fa fa-cog"></i></a> <?php } ?> </td>

                <td><a href="<?php echo ucwords($getNoticeInfoVal['website']);?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>

</a></td>

                <td>

                  <table width="90%" style="background-color: inherit; margin: 0px auto;">

                    <?php

                      $sql = mysqli_query($db, "SELECT id FROM tbl_grocery_review WHERE like_count = '1' AND groc_id = '".$getNoticeInfoVal['id']."'");

                      $likes = mysqli_num_rows($sql);



                      $sql = mysqli_query($db, "SELECT id FROM tbl_grocery_review WHERE unlike_count = '1' AND groc_id = '".$getNoticeInfoVal['id']."'");

                      $unlikes = mysqli_num_rows($sql);



                      $user_data = mysqli_query($db, "SELECT like_count, unlike_count FROM tbl_grocery_review WHERE groc_id = '".$getNoticeInfoVal['id']."' AND user_id = '".$_SESSION['UR_LOGINID']."'");

                      $user_like_data = mysqli_fetch_assoc($user_data);

                    ?>

                    <tr>

                      <td class="text-center likers"><a href="javascript:void(0);" id="like-<?= $getNoticeInfoVal['id']?>" onclick="likeHandle('<?= $getNoticeInfoVal['id']?>', 'up')" <?php if ($user_like_data['like_count'] == '1') { ?> class="social-active" <?php } ?>><i class="fa fa-thumbs-up"></i> <span id="like-<?= $getNoticeInfoVal['id']?>-count"><?= $likes ?></span></a></td>

                      <td class="text-center likers"><a href="javascript:void(0);" id="unlike-<?= $getNoticeInfoVal['id']?>" onclick="likeHandle('<?= $getNoticeInfoVal['id']?>', 'down')" <?php if ($user_like_data['unlike_count'] == '1') { ?> class="social-active" <?php } ?>><i class="fa fa-thumbs-down"></i> <span id="unlike-<?= $getNoticeInfoVal['id']?>-count"><?= $unlikes ?></span></a></td>

                    </tr>

                  </table>

                </td>

        </tr>



    <div class="mobile-data col-md-12">   

      <div class="mobile-cont col-md-12">

        <div class="mobile-cont-header">

        <p class="store-name"><a href="tel:<?= (substr($getNoticeInfoVal['mobile'], 0, 3) != "+91") ? '+91-' : ''?><?= $getNoticeInfoVal['mobile'] ?>"><?php echo ucwords($getNoticeInfoVal['store']);?></a></p> 

        <div class="like-contain-lg col-5">

          <?php

            $sql = mysqli_query($db, "SELECT id FROM tbl_grocery_review WHERE like_count = '1' AND groc_id = '".$getNoticeInfoVal['id']."'");

            $likes = mysqli_num_rows($sql);

            $sql = mysqli_query($db, "SELECT id FROM tbl_grocery_review WHERE unlike_count = '1' AND groc_id = '".$getNoticeInfoVal['id']."'");

            $unlikes = mysqli_num_rows($sql);

            $user_data = mysqli_query($db, "SELECT like_count, unlike_count FROM tbl_grocery_review WHERE groc_id = '".$getNoticeInfoVal['id']."' AND user_id = '".$_SESSION['UR_LOGINID']."'");

            $user_like_data = mysqli_fetch_assoc($user_data);

          ?>

          <a href="javascript:void(0);" id="like-mobile-<?= $getNoticeInfoVal['id']?>" onclick="likeHandle('<?= $getNoticeInfoVal['id']?>', 'up')" <?php if ($user_like_data['like_count'] == '1') { ?> class="social-active" <?php } ?>><i class="fa fa-thumbs-up"></i> <span id="like-mobile-<?= $getNoticeInfoVal['id']?>-count"><?= $likes ?></span></a>

          <a href="javascript:void(0);" id="unlike-mobile-<?= $getNoticeInfoVal['id']?>" onclick="likeHandle('<?= $getNoticeInfoVal['id']?>', 'down')" <?php if ($user_like_data['unlike_count'] == '1') { ?> class="social-active" <?php } ?>><i class="fa fa-thumbs-down"></i> <span id="unlike-mobile-<?= $getNoticeInfoVal['id']?>-count"><?= $unlikes ?></span></a>

        </div>          

        <p class="col-5"><a href="tel:<?= (substr($getNoticeInfoVal['mobile'], 0, 3) != "+91" && ($getNoticeInfoVal['mobile']!="") && ($getNoticeInfoVal['mobile']!="-"))  ? '+91-' : ''?><?= $getNoticeInfoVal['mobile'] ?>"><?= (substr($getNoticeInfoVal['mobile'], 0, 3) != "+91" && ($getNoticeInfoVal['mobile']!="") && ($getNoticeInfoVal['mobile']!="-"))  ? '+91-' : ''?><?php echo $getNoticeInfoVal['mobile'];?></a></p>       

        </div>

        <div class="mobile-cont-contain">

          <p><span class="text-bold">Min Order : </span><?php if ($getNoticeInfoVal['min_order'] > 0) { ?>&#8377; <?php echo ucwords($getNoticeInfoVal['min_order']);?>.00 <?php } else echo $getNoticeInfoVal['min_order']; ?></p>

          <p><span class="text-bold">Process : </span><?php if ($getNoticeInfoVal['process'] != '') { ?><a href="<?php echo SITE_URL; ?>RWAVendor/documents/grocery/<?php echo $getNoticeInfoVal['process']; ?>" target="_blank"><i class="fa fa-cog"></i></a> <?php } ?></p>          

        </div>

        <div class="mobile-cont-contain">

          <p><span class="text-bold">Delivery Charge : </span><?php if ($getNoticeInfoVal['delivery_charge'] > 0) { ?>&#8377; <?php echo ucwords($getNoticeInfoVal['delivery_charge']);?>.00 <?php } else echo $getNoticeInfoVal['delivery_charge']; ?></p>

          <p><span class="text-bold">Product List : </span><?php if ($getNoticeInfoVal['product_price_list'] != '') { ?><a href="<?php echo SITE_URL; ?>RWAVendor/documents/grocery/<?php echo $getNoticeInfoVal['product_price_list']; ?>" target="_blank"><i class="fa fa-list"></i></a><?php } ?></p>

        </div>

        <div class="mobile-cont-contain">

          <p><span class="text-bold">Delivery Time : </span><?php echo ucwords($getNoticeInfoVal['delivery_time']);?></p>

        

          <p><span class="text-bold">Website : </span><a href="<?php echo $getNoticeInfoVal['website'];?>" target="_blank"><i class="fa fa-globe"></i></a></p>

        </div>

      </div>

    </div>

  <?php } } ?>

      </tbody>

    </table>

  </div>

  <!-- Modal-->

          <div class="container">

     <div class="row">

         <div class="col-md-2"></div>

         <div class="col-md-4 text-center adword">

        <a href="" target="_blank" name=image_url id=image_url>

         <img name="slide" width="400" height="200" />

         </a>

         </div>

          <div class="col-md-4 text-center adword">

        <a href="" target="_blank" name=image_url1 id=image_url1>

         <img name="slide1" width="400" height="200" />

         </a>

         <div class="col-md-2"></div>

         </div>

      

    </div>

 </div>

 <?php include(ROOTACCESS."HomefooterCall.php");?>

  <script>  

    const $doc = $(document);

let $dataTable = $("#dataTable");

let $dropdownInput = $("select.form-control");

let $state = $("#state");

let $category = $("#category");

let $clear = $("#clear");

let $keyup = $.Event("keyup", { keyCode: 13 });



//Ready function

$doc.ready(function() {

  // Start DataTable

  $dataTable.DataTable({
   bSort: false,
    mark: true, // Highlight search terms

    search: {

      caseInsensitive: true

    },

 columnDefs: [
    { orderable: false, targets: '_all' }
],

    aLengthMenu: [

      // Show entries incrementally

      [10, 20, 50, -1],

      [10, 20, 50, "All"]

    ],

  
  });



  



  

  

  // Remove BS small modifier

  $('select[name="dataTable_length"]').removeClass('input-sm');

  $('#dataTable_filter input').removeClass('input-sm');



  /*

   * ADD INDIVIDUAL COLUMN SEARCH

  */

  

  // Add a hidden text input to each footer cell

  $("#dataTable tfoot th").each(function() {

    var $title = $(this).text().trim();

    $(this).html('<div class="form-group"><label>Search ' + $title + ':<br/><input class="form-control" id="search' + $title + '" type="hidden"/></label></div>');

  });

  // Apply the search functionality to hidden inputs

  $dataTable

    .DataTable()

    .columns()

    .every(function() {

      var $that = this;

      $("input", this.footer()).on("keyup change", function() {

        if ($that.search() !== this.value) {

          $that.search(this.value, false, true, false).draw(); // strict search

        }

      });

    });

});



const likeHandle = (id, elem) => {

  if (elem == 'up') {

    $(`#like-${id}`).addClass("social-active");

    $(`#unlike-${id}`).removeClass("social-active");

    $(`#like-mobile-${id}`).addClass("social-active");

    $(`#unlike-mobile-${id}`).removeClass("social-active");

    let likeData = {

      pid : id,

      req : 'like'

    }

    $.ajax({

      url: 'controller/manageLike.php',

      method: 'POST',

      data: likeData,

      success: (response) => {

        if (response == 'login_error') {

          alert("Please login to like or unlike the post !");

          $(`#like-${id}`).removeClass("social-active");

          $(`#like-mobile-${id}`).removeClass("social-active");

        } else {

          $(`#like-${id}-count`).html(response.like);

          $(`#unlike-${id}-count`).html(response.unlike);

          $(`#like-mobile-${id}-count`).html(response.like);

          $(`#unlike-mobile-${id}-count`).html(response.unlike);

        }

      }

    });

  } else {

    $(`#like-${id}`).removeClass("social-active");

    $(`#unlike-${id}`).addClass("social-active");

    $(`#like-mobile-${id}`).removeClass("social-active");

    $(`#unlike-mobile-${id}`).addClass("social-active");

    let likeData = {

      pid : id,

      req : 'unlike'

    }

    $.ajax({

      url: 'controller/manageLike.php',

      method: 'POST',

      data: likeData,

      success: (response) => {

        if (response == 'login_error') {

          alert("Please login to like or unlike the post !");

          $(`#unlike-${id}`).removeClass("social-active");

          $(`#unlike-mobile-${id}`).removeClass("social-active");

        } else {          

          $(`#like-${id}-count`).html(response.like);

          $(`#unlike-${id}-count`).html(response.unlike);

          $(`#like-mobile-${id}-count`).html(response.like);

          $(`#unlike-mobile-${id}-count`).html(response.unlike);

        }

      }

    });

  }

  return false;

}



  </script>

</body>

</html>

