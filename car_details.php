<?php include('model/class.expert.php');



$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Top'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow = $ModelCall->get("tbl_ads_management_directory");

$ModelCall->where("unit_no",$_SESSION['unit_no']);
$getCarsInfo = $ModelCall->get("tbl_car_details");

// echo "<pre>";
// var_dump($getCarsInfo);
// echo "</pre>";
// //exit;


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
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico"> -->
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
<!-- Begin Content		-->
<h3 style="text-decoration: underline; " class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo $string;?></h3>
<div class="container">
<h3 style="text-decoration: underline;" class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo $string;?></h3>   
    
    <hr/>

    <div class="alert alert-danger alert-dismissible fade">
     <span  id="divError">A problem has been occurred while submitting your data.</span>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>

    <table class="table table-striped table-hover dt-responsive" id="dataTable" style="padding-top:25px">
      <caption class="sr-only">Table example</caption>     
      <thead class="bg-primary">
        <tr>
          <th class="second" scope="col">Car Numer</th>
          <th class="third" scope="col">Make/Model</th>
           <th class="sixth" scope="col">Color</th>
           <th class="eleventh" scope="col">Sticker Number</th>
           <th class="eleventh" scope="col">Status </th>
           <th class="eleventh" scope="col">Actions</th>
        </tr>
      </thead>
      <!-- <tfoot class="hidden">
     <tr>
            
          <th class="second" scope="col">Car Numer</th>
          <th class="third" scope="col">Make/Model</th>
           <th class="sixth" scope="col">Color</th>
           <th class="eleventh" scope="col">Sticker Number</th>
         <th class="eleventh" scope="col">Actions</th>
                        
        </tr>
      </tfoot> -->
      <tbody>
      <?php $i=0; foreach($getCarsInfo as $value){ 
         if( $value['status']=="-1" ){
           $rowClass="grey";
          } else if ( $value['status']=="1"){
            $rowClass="green";
           }else{
            $rowClass="black";
           }?>
         <tr  style="color: <?php echo  $rowClass;?>;<?php if($rowClass=="grey"){?>background: lightgray;<?php }?>" 
         <?php if($rowClass=="grey"){?>
          disabled="disabled"
         <?php }?>
          >
          <td><?php echo $value['car_number'];?>
          <input type="text" id="<?php echo 'car_number_'.$i;?>" name="<?php echo 'car_number_'.$i;?>" value="<?php echo $value['car_number'];?>" class="hidefirst"></td>
           
           <td><?php echo $value['make_model'];?>
           <input type="text" id="<?php echo 'make_model_'.$i;?>" name="<?php echo 'make_model_'.$i;?>make_model" value="<?php echo $value['make_model'];?>" class="hidefirst"></td>
           
           <td><?php echo $value['color'];?>
           <input type="text" id="<?php echo 'color_'.$i;?>" name="<?php echo 'color_'.$i;?>" value="<?php echo $value['color'];?>" class="hidefirst"></td>

           <td class="n_discounted"><?php echo $value['sticker_number'];?></td>

           <td><?php if( $value['status']=="-1" ){
            echo "Deleted";
           } else if ( $value['status']=="1"){
            echo "Approved";
           }else{
            echo "Pending Approval";
           }
             ?> </td>

           <td><?php if($rowClass=="grey"){?>
           &nbsp;
           <?php }else {?>
           <i class="fa fa-pencil-square" aria-hidden="true"></i>
          <i class="fa fa-minus-square" aria-hidden="true"></i>
          <input type="hidden" value="<?php echo $value['stickerid'];?>"/>
           <?php }?></td>
         
           <!-- <td class="n_discounted"> <i class="fa fa-minus-square" aria-hidden="true"></i> <input type ="button" class="fa fa-pencil-square" value="Edit" onclick="EditRow(<?php //echo $i;?>);"><input type ="button" value="Delete" onclick="DeleteRow(<?php// echo $i;?>);"></td> -->
        </tr>
        <?php $i++; } ?>
      </tbody>
    </table>
  </div>
  <!-- Modal-->
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
 <?php include(ROOTACCESS."HomefooterCall.php");?>
  <script>  
//     const $doc = $(document);
// let $dataTable = $("#dataTable");
// let $dropdownInput = $("select.form-control");
// let $state = $("#state");
// let $category = $("#category");
// let $clear = $("#clear");
// let $keyup = $.Event("keyup", { keyCode: 13 });

//Ready function
$(document).ready(function() {
  var table;
  table = $('#dataTable').DataTable({"searching": false});
  
	$('.hidefirst').hide();

   $("#dataTable").on("mousedown", "td .fa.fa-minus-square", function(e) {
      //  table.row($(this).closest("tr")).remove().draw();
      var $row = $(this).closest("tr").off("mousedown");
      var val = $row.find("td:last").find("input").val();
      console.log(val);
        $.ajax({
            url : "<?php echo SITE_URL;?>/services/delete_carsticker.php",
            type: "POST",
            data : {"stickerid":val},
            success: function(data){
             // alert(data);
              if(data==1){
                $row.css('color', 'grey');
                $row.css('background', 'lightgray');
                $row.find("td:nth-last-child(2)").html("Deleted");
                $row.find("td:last").html("");
              }else if(data==0){
                $("#divError").html("Something has gone wrong, Try again!!!");
                $(".alert").removeClass("fade");
                $(".alert").addClass("show");

              }else{
                $("#divError").html("No Car Sticker Row Selected.");
                $(".alert").removeClass("fade");
                $(".alert").addClass("show");

              }
          }
      });
      

    });
  $("#dataTable").on('mousedown.edit', "i.fa.fa-pencil-square", function(e) {

    $(this).removeClass().addClass("fa fa-floppy-o");
    var $row = $(this).closest("tr").off("mousedown");
    var $tds = $row.find("td").not(':nth-last-child(3)').not(':nth-last-child(2)').not(':last');

    $.each($tds, function(i, el) {
      var txt = $(this).text();
      $(this).html("").append("<input type='text' value=\""+txt+"\">");
    });

  });


  $("#dataTable").on('mousedown', "input", function(e) {
  e.stopPropagation();
  });

    $("#dataTable").on('mousedown.save', "i.fa.fa-floppy-o", function(e) {
        
        $(this).removeClass().addClass("fa fa-pencil-square");
        var $row = $(this).closest("tr");
        var $tds = $row.find("td").not(':nth-last-child(3)').not(':nth-last-child(2)').not(':last');
        var val = $row.find("td:last").find("input").val();
        var dataformed = [];
        $.each($tds, function(i, el) {
          var txt = $(this).find("input").val();
          dataformed.push(txt);
          $(this).html(txt);
        });
        console.log(dataformed);
       // return;
       var datapassed = {"stickerid":val,
       "car_number": dataformed[0],
       "make_model": dataformed[1],
       "color": dataformed[2],
       "status": 0
       }
         $.ajax({
            url : "<?php echo SITE_URL;?>/services/edit_carstickers.php",
            type: "POST",
            data : datapassed,
            success: function(data){
             // alert(data);
              if(data==1){
                $("#divError").html("The Card Sticker has been edited, succesfully.");
                $(".alert").removeClass("fade");
                $(".alert").addClass("show");

              }else{
                $("#divError").html("Details not edited. Please try after sometime.");
                $(".alert").removeClass("fade");
                $(".alert").addClass("show");
              }
          }
      });

    });

});

  </script>
  
</body>
</html>
