<?php include('model/class.expert.php');

$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];

/*if($_SESSION['UR_LOGINID']==''){

        header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$_REQUEST['back_tracker']);

}*/


if(isset($_SESSION['UR_LOGINID']) && $_SESSION['UR_LOGINID']!=""){
                                                
 $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

    $rec = $ModelCall->get("Wo_Users");
    
}
// Get the data 

/*-----------blood group filter-------------*/
if($_REQUEST['bloodgroup']){
$where='first_blood_group like "%'.$_REQUEST['bloodgroup'].'%"';
}
else{
$where= '1=1';
}
$getNoticeInfo = $ModelCall->rawQuery("SELECT *
                                        FROM `tbl_self_isolation_data_start`
                                        WHERE is_plasma_donar = 1
                                        	AND ".$where."
                                        	AND (
                                        		DATEDIFF(CURDATE(), negative_covid_test) > 90
                                        		OR DATEDIFF(CURDATE(), negative_covid_test) < 200
                                        		)
                                        ORDER BY id DESC");

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



<?php
if(isset($_POST['sendBulkMail'])){
   $StringArray = $_POST;
   header("location:".SITE_URL."?actionResult=carsubmitsussess:string=$StringArray");
   print_r($StringArray);
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo SITENAME?> - Covid Response - Dashboard</title>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
-->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
    <style>

/*    #dataTable tfoot {*/

/*  display: table-header-group;*/

/*}*/



/*mark {*/

/*  background: orange;*/

/*  color: #000;*/

/*}*/







/*.dataTables_wrapper .dataTables_paginate .paginate_button {*/

/*	padding: 0;*/

/*	margin-left: -2px;*/

/*}*/

/*.dataTables_wrapper .dataTables_paginate .paginate_button:hover {*/

/*	background: none;*/

/*	border-color: transparent;*/

/*}*/





/*table.dataTable thead th {*/

/*	background-image: none !important;*/

/*}*/





/*table.dataTable thead th::after {*/

/*	font-family: "FontAwesome";*/

/*	display: inline-block;*/

/*	margin-left: 10px;*/

/*	opacity: 0;*/

/*}*/

/*table.dataTable thead th.sorting::after {*/

/*	content: "\f0dc";*/

/*}*/

/*table.dataTable thead th.sorting_asc::after {*/

/*	content: "\f0de";*/

/*}*/

/*table.dataTable thead th.sorting_desc::after {*/

/*	content: "\f0dd";*/

/*}*/

/*.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {*/

/*    padding: 13px;*/

/*}*/

/*.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter {*/
/*    float: none;*/
/*    text-align: center;*/
/*    display: none;*/
/*}*/
/*.dataTables_wrapper .dataTables_paginate .paginate_button {*/

/*    padding: 6px 11px;*/

/*    margin-left: -2px;*/

/*}*/

/*.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {*/

/*    color: #fff !important;*/

/*    border: 1px solid #37a000;*/

/*    background-color: #37a000;*/

    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc)); */

    /* background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%); */

/*    background: -moz-linear-gradient(top, #37a000 0%, #37a000 100%);*/

/*    background: -ms-linear-gradient(top, #37a000 0%, #37a000 100%);*/

/*    background: -o-linear-gradient(top, #37a000 0%, #37a000 100%);*/

/*    background: linear-gradient(to bottom, #37a000 0%, #37a000 100%);*/

/*}*/

/*.dataTables_wrapper .dataTables_paginate .paginate_button:hover {*/

/*    color: #37a000 !important;*/

/*}*/

/*.bg-primary {*/

/*    color: #fff;*/

/*    background-color: #37a000 !important;*/

/*    border: 1px solid #000 !important;*/

/*}*/

/*table#dataTable{*/

/*  border: 1px solid #ddd;*/

/*}*/

/*input[type="search"] {*/

/*    border: none;*/

/*    border-bottom: 1px solid #969595;*/

/*    outline: none;*/

/*}*/

/*table#dataTable {*/

/*    max-width: 1000px !important;*/

/*    border: 1px solid #717171 !important;*/

/*    border-radius: 5px;*/

/*    overflow: hidden;*/

/*}*/

/*.dataTables_wrapper{*/

/*  width: 1000px;*/

/*  margin: 0 auto;*/

/*}*/

/*table.dataTable {*/

/*    border-collapse: inherit;*/

/*}*/

/*table>thead>tr>th {*/

/*    vertical-align: bottom;*/

/*    border-bottom: 1px solid #717171 !important ;*/

/*}*/





    </style>

</head>

<body>

    <?php include(ROOTACCESS."front_header.php");?>

<!-- Begin Content		-->


<div class="container">
<div style="padding-top:80px"></div>
<h3 style="text-decoration: underline;" class="tile-page-h2 text-center">Plasma Donors List</h3>   

    

    <hr/>
    
    
        <?php

    if ($_REQUEST['actionResult'] == 'sent') { ?>
      <p style="color:#37a000">Mail and Message Successfully Sent.</p>
  <?php
    } ?>
    <div style="overflow-x:hidden;">
        <!--============================filter===========================-->
        <div class="row">
            <form class="" action="covid-dashboard.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-2">
                <div class="form-group"  style="float: left;">
                        <select id="bloodgroup" name="bloodgroup" value="<?php echo $_REQUEST['bloodgroup'];?>" class="form-control">
                            <!--<option value="" default disabled hidden></option>-->
                            <option>Blood Group</option>
                             <option value="">All</option>
                            <option value="O +ve">O +ve</option>
                            <option value="O -ve">O -ve</option>
                            <option value="A +ve">A +ve</option>
                            <option value="A -ve">A -ve</option>
                            <option value="B +ve">B +ve</option>
                            <option value="B -ve">B -ve</option>
                            <option value="AB +ve">AB +ve</option>
                            <option value="AB -ve">AB -ve</option>
                          </select>
                   
                </div>
              </div>
             <div class="col-sm-2">
                <label class="control-label"></label>
                <button type="submit" class="btn-sm btn-success" style='height:40px;width:40px;background-color:#37a000;border:1px #37a000;'>
                <i class="fa fa-search"></i>
                </button>
              </div>
              
                
            </form>
         
              <div class="col-sm-4">
             </div>
              
               <!--<div class="col-sm-2">
                <label class="control-label"></label>
                <button type="button" class="btn-sm btn-success" onclick="SendMailFunction()" style="background-color:#37a000;border:1px #37a000;'" data-toggle="modal" data-target="#donar_mod">
               Send SMS & Email
                </button>
              </div>-->
              
              
         </div>      
         
    <!--===================================================================-->
   
    <form id="formID" name="formID" method = "post">
        
        <div class="row">
            <div class="col-sm-8">
                
            </div>
            <div class="col-sm-2">
                <label class="control-label"></label>
                <button type="submit"  class="btn-sm btn-success" id="sendBulkMail" name="sendBulkMail"   style="background-color:#37a000;border:1px #37a000;'" >
               Send SMS & Email
                </button>
              </div>
              
              
              <div class="col-sm-2 ">
                <a href="<?php echo SITE_URL ?>Plasma_Form.php">Like to Donate</a>
              </div>
        </div>
        
        
        
      <table class="table table-striped table-hover dt-responsive display" id="dataTable">
      <thead class="bg-primary" style="font-size: 16px;">

      <tr>
          <!--============send mail to multiple donars================== -->   
          <th style="text-align:center" ><input type="checkbox" name="all_donars" id="all_donars" ></th>
          <!--========================================================== -->  
          
        <th style="text-align:center" >BldGrp</th>
        
        
        <th style="text-align:center" class="not-mobile">Days Since COVID +ve</th>
        <th  style="text-align:center">House #</th>
        <th style="text-align:center" class="not-mobile">Remarks</th>
       </tr>

      </thead>

      

      <tbody>

          <?php if($getNoticeInfo >0){ 
              $c = 0;
              foreach($getNoticeInfo as $getNoticeInfoVal){ 
                  $c++;
            $start = strtotime($getNoticeInfoVal['positive_covid_test']);
            $end = strtotime(date("d M Y"));

            $covid_days = ceil(abs($end - $start) / 86400);
             // echo $covid_days;
          // if($covid_days > 28 && $covid_days <120){
           ?> 
      
        <tr  >
        <!--============send mail to multiple donars================== -->   
        <td style="text-align:center" ><input type="checkbox" name="specific_donar_<?php echo $c?>" id="specific_donars_<?php echo $getNoticeInfoVal['id']?>" value="<?php echo $getNoticeInfoVal['id']?>"></td>
       <!-- =========================================================-->

         <td class="text-center" >
              <?php 
              echo $getNoticeInfoVal['first_blood_group']
              ?>
            </td>
        
        
          <td class="text-center" ><?php
          
          echo $covid_days ?>
          
          </td>
          <td class="text-center" ><?php
          $block_id = $getNoticeInfoVal['block_id'];
          if ($block_id == "1") {
            $block = "AG";
          } else if ($block_id == "2") {
            $block = "BC";
          } else if ($block_id == "3") {
            $block = "CC";
          } else if ($block_id == "4") {
            $block = "DW";
          } else if ($block_id == "5") {
            $block = "ES";
          }
          echo $block."XXX";?></td>

          <td>-</td>

            

          
          
         
        </tr>

        <?php }
        }
     // }?>

      </tbody>

    </table>
    
    
    </form>
    </div>
  </div>

  <br><br>

 

          <div class="container">

     <div class="row">

         <div class="col-md-2"></div>

         <div class="col-md-4 text-center">

        <a href="" target="_blank" name=image_url id=image_url>

         <img name="slide" width="400" height="200" />

         </a>

         </div>

          <div class="col-md-4 text-center">

        <a href="" target="_blank" name=image_url1 id=image_url1>

         <img name="slide1" width="400" height="200" />

         </a>

         <div class="col-md-2"></div>

         </div>

      

    </div>

 </div>



 <br><br>

 <?php include(ROOTACCESS."HomefooterCall.php");?>
 <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
 <!-- <script>  

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
 responsive: true,
//   columns: [
//         { responsivePriority: 6 },
//         { responsivePriority: 5 },
//         { responsivePriority: 4 },
//         { responsivePriority: 3 },
//         { responsivePriority: 2 },
//         { responsivePriority: 1 }
//     ],
 sDom: 'lrtip',
 "bPaginate": false,
		order: [[1, "desc"]] // Set State column sorting by default

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



  </script>-->
  
  <script>
  function validateNumber(){

        var Number = document.getElementById('resquestor_mobile').value;
        var IndNum = /^\d{10}$/;

        if(IndNum.test(Number)){
          return true;
        } else{
          alert("Please enter valid mobile number.");
        }

        return false;
      }
  
      var maxLength = 100;
$('textarea').keyup(function() {
  var textlen = maxLength - $(this).val().length;
  $('#rchars').text(textlen);
});



function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
  </script>
 <!-- ====================send mail to multiple donars=============================-->
  <script>
$(document).ready(function() {
    $('#all_donars').click(function() {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function() {
        this.checked = checked;
    });
    })
});


 
/*$(document).ready(function(){
  $("#sendBulkMail").click(function(){
    if ($("#formID input:checkbox:checked").length <= 0)
    {
     alert("Please select the alteast one Donar.");
    return false;
    }
  });
});*/
</script>

</script>
<!--=============================================================================-->

</body>

</html>



 


