<?php include('model/class.expert.php');



// $login_required=array('dummy','GBMs','EC_Meetings','Attendance','Monthly_performance_MMR','Compost_plant_performance','Notices','Financial_reports','Initiatives');

// if(array_search(trim($_REQUEST['meid'],' '),$login_required) && $_SESSION['UR_LOGINID']==''){

//         header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker']);

// }



$getNoticeInfo = $ModelCall->get("tbl_covid_mgmt_team");

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

    <title>Covid Team</title>
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

<?php /*?>Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.

Universal Analytics Tracking Code

ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.

Google Analytics Code<?php */?>

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

table.dataTable thead th.sorting::after {

  content: "\f0dc";

}

table.dataTable thead th.sorting_asc::after {

  content: "\f0de";

}

table.dataTable thead th.sorting_desc::after {

  content: "\f0dd";

}

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

    max-width: 1000px !important;

    border: 1px solid #717171 !important;

    border-radius: 5px;

    overflow: hidden;

}

.dataTables_wrapper{

  width: 1000px;

  margin: 0 auto;

}

table.dataTable {

    border-collapse: inherit;

}

table>thead>tr>th {

    vertical-align: bottom;

    border-bottom: 1px solid #717171 !important ;

}





    </style>

</head>

<body>

    <?php include(ROOTACCESS."front_header.php");?>

<!-- Begin Content    -->

<h3 style="text-decoration: underline; margin-top: 120px;" class="tile-page-h2 text-center">Covid Management Team</h3>

<div class="container">

  

    

    <hr/>

    <table class="table table-striped table-hover dt-responsive" id="dataTable">

      <caption class="sr-only">Table example</caption>

      

      <thead class="bg-primary">

        <tr>

      
          <th class="second" scope="col">Name</th>

          <th class="third" scope="col">Block</th>

          <th class="fourth" scope="col">Contact</th>

          <th class="fifth" scope="col">Email</th>

        </tr>

      </thead>

      <tfoot class="hidden">

        <tr>

        

          <th class="second" scope="col">Name</th>

          <th class="third" scope="col">Block</th>

          <th class="fourth" scope="col">Contact</th>

          <th class="fifth" scope="col">Email</th>

        </tr>

      </tfoot>

      <tbody>

          <?php if($getNoticeInfo[0]>0){ foreach($getNoticeInfo as $getNoticeInfoVal){ 

$FindYears = trim($getNoticeInfoVal['created_date']);?> 

        <tr>

        
          <td><?php echo $getNoticeInfoVal['name'];?></td>

          <td><?php echo $getNoticeInfoVal['block'];?></td>

          <?php

if ($_SESSION['UR_LOGINID']==''){ ?>

          <td><a href='<?php echo SITE_URL. "login_signup.php?actionResult=logindocrequired&back_tracker=covid_crisis_mgmt_team.php"?>'>##########</a></td>



<?php

} else {

?>

          <td><a href="tel:<?= $getNoticeInfoVal['contact'] ?>"><?php echo $getNoticeInfoVal['contact'];?></a></td>

        <?php } ?>

          <?php

if ($_SESSION['UR_LOGINID']==''){ ?>

          <td><a href='<?php echo SITE_URL. "login_signup.php?actionResult=logindocrequired&back_tracker=covid_crisis_mgmt_team.php"?>'>###@###.###</a></td>



<?php

} else {

?>

          <td><a href="mailto:<?= $getNoticeInfoVal['email'] ?>"><?php echo $getNoticeInfoVal['email'];?></a></td>

        <?php } ?>

        </tr>

        <?php }}?>

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

 <script src="https://cdn.datatables.net/plug-ins/1.10.20/sorting/absolute.js"></script>

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

    mark: true, // Highlight search terms

    search: {

      caseInsensitive: true

    },

    aLengthMenu: [

      // Show entries incrementally

      [10, 20, 50, -1],

      [10, 20, 50, "All"]

    ],

   // order: [[2, "asc"]],



  	columnDefs: [

        { targets: 1, type: nameType }

    ], // Set State column sorting by default

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



  </script>

</body>

</html>

