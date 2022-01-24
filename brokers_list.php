<?php
include('model/class.expert.php');
$ModelCall->where("page_name","aboutus");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getAboutUsInfo = $ModelCall->get("tbl_cms_management");
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");
$indexvalues = $ModelCall->get("tbl_ads_index");
$getAdminInfo = $ModelCall->get("tbl_clients");
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Top'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow = $ModelCall->get("tbl_ads_management_directory");
$getBrokersList = $ModelCall->get("buynsell_brokers");
$ModelCall->where("status",1);
$ModelCall->orderBy("id","asc");
$getBlockName= $ModelCall->get("tbl_block_entry");
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
$images[$i]= SITE_URL."/RWAVendor/ads_managements/photos/".$arrays['image'];
if($arrays['contact']!=''){
$url_tel[$i]="tel:".$arrays['contact'];
}
if($arrays['url']!=''){
$url[$i]="https://".$arrays['url'];
}
if($arrays['email']!=''){
$url_mail[$i]="mailto:".$arrays['email'];
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
    <title>Brokers List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
     color: #fff !important;
}


table.dataTable thead th::after {
  font-family: "FontAwesome";
  display: inline-block;
  margin-left: 10px;
  opacity: 0.75;
}
/*table.dataTable thead th.sorting::after {*/
/*  content: "\f0dc";*/
/*}*/
/*table.dataTable thead th.sorting_asc::after {*/
/*  content: "\f0de";*/
/*}*/
/*table.dataTable thead th.sorting_desc::after {*/
/*  content: "\f0dd";*/
/*}*/
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   /* padding: 13px;*/
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



      .header-cont {
        display: flex;
        align-items: center;
        padding: 15px;
        border-radius: 8px;
        background-color: #37a000;
        color: #fff;
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

        .mobile-data {
          display: flex;
          flex-direction: column;
          justify-content: center;
          padding: 15px;
          border: 2px solid #37a000;
          border-radius: 8px;
          margin: 15px auto 7.5px auto;
        }
        .hide-on-small { 
        	display: none;
        }
        .dataTables_wrapper {
        	display: none;
        }
      }
        table td {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
}
        a{
            color:black;
        }
    



    </style>
    
</head>
<body>
    <?php include(ROOTACCESS."front_header.php");?>
<!-- Begin Content    -->
<div class="container">
   <div class="clearfix"></div>
        <!--Buy and sell starts-->
        <div class="modal fade bd-example-modal-lg" id="buynsell" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                
                <div class="modal-content property"></div>
                
            </div>
        </div>
   
  <!--===================================Desktop view===============================-->
                <div class="row hidden-xs hidden-sm">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <br><br><br><br>
                            <h2>Real Estate Agents</h2>
                            <!-- <a href="buynsell.php"><button class="btn" style="background-color:#37a000" >Add Property</button></a>-->
                        </div>
                         <hr/>
                        <?php if(isset($_GET['actionresult'])){?>
                        <p style="color: #e00909;font-size: 15px;">Hey ! Your message has been sent to the owner successfully.</p>
                        <?php } ?>
                        <?php if($_REQUEST['ActionResult']=="listedsuccessfully"){?>
                        <p style="color: #e00909;font-size: 15px;">Hey ! Your property has been listed successfully.</p>
                        <?php } ?>
                        <center>
                        <div class="table-responsive" >
                            <table class="table table-striped table-hover dt-responsive hide-on-small" id="dataTable" style="width: 100%">
                                <caption class="sr-only">Table example</caption>
                                <thead >
                                    <tr>
                                        <th style="background-color:#4267B2;text-align:center;" scope="col">Name</th>
                                        <th style="background-color:#4267B2;text-align:center;" scope="col">City</th>
                                        <th style="background-color:#4267B2;text-align:center;" scope="col">Broker Name</th>
                                        <th style="background-color:#4267B2;text-align:center;" scope="col">Designation</th>
                                        <th style="background-color:#4267B2;text-align:center;" scope="col"><i class="fa fa-phone" class="text-white"></i></th>
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col"><i class="fa fa-envelope" class="text-white"></th>
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col"><i class="fa fa-eye" class="text-white"></i></th>
                                    </tr>
                                </thead>
                                </br>
                                
                                <tbody>
                                    <?php
                                    $c=1;
                                    foreach($getBrokersList as $brokersList){ 
                                    $id = $brokersList["id"];
                                    ?>
                                            <tr>
                                               <td><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><?php echo $brokersList["name"]; ?></a></td>
                                               <td><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><?php echo $brokersList["city"]; ?></a></td>
                                               <?php 
                                               if($brokersList["middle_name"] <> NULL || $brokersList["middle_name"] <> ''){
                                                   $Brokername = $brokersList["first_name"]." ".$brokersList["middle_name"]." ".$brokersList["last_name"];
                                               }elseif($brokersList["middle_name"] == NULL || $brokersList["middle_name"] == ''){
                                                  $Brokername = $brokersList["first_name"]." ".$brokersList["last_name"];
                                               }else{
                                                   $Brokername = " ";
                                               }
                                                ?>
                                                
                                                <?php 
                                                if($Brokername <> " "){ ?>
                                                    <td><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><?php echo $Brokername?></td></a>
                                                <?php }else{ ?>
                                                    <td class="text-center"><?php echo "-"; ?></td>
                                                <?php }
                                                ?>
                                                
                                                
                                                <?php 
                                                if($brokersList["designation"] <> NULL || $brokersList["designation"] <> ''){ ?>
                                                   <td><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><?php echo $brokersList["designation"]; ?></a></td>
                                                
                                                <?php }else{ ?>
                                                    <td class="text-center"><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><?php echo "-"; ?></a></td>
                                                <?php    
                                                }
                                                ?>
                                               <?php 
                                               $contactnumbers = '';
                                               
                                               if($brokersList["mobile_1"] <> NULL || $brokersList["mobile_1"] <> ''){
                                                   $contactnumbers = "+".$brokersList["isd_code"].$brokersList["mobile_1"];
                                               }elseif($brokersList["mobile_2"] <> NULL || $brokersList["mobile_2"] <> ''){
                                                   $contactnumbers = "+".$brokersList["isd_code"].$brokersList["mobile_2"];
                                               }elseif($brokersList["land_line"] <> NULL || $brokersList["land_line"] <> ''){
                                                   $contactnumbers = $brokersList["std_code"]."-".$brokersList["land_line"];
                                               }else{
                                                   $contactnumbers = "-";
                                               }
                                               ?>
                                               
                                               <td class="text-center"><a href="tel:<?php echo $contactnumbers?>">
                                              <?php echo $contactnumbers; ?></a></td>
                                               
                                               
                                               <td class="text-center" ><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><?php 
                                               if($brokersList["email"] <> NULL || $brokersList["email"] <> ''){
                                              /* echo $brokersList["email"]; */
                                               ?>
                                                  <a href="email:<?php echo $brokersList["email"] ?>"><i style="font-size:20px;color:#37a000" class="fa fa-envelope"></i></a>  
                                                <?php
                                               }else{
                                                   echo "-";
                                               }
                                              ?></a></td>
                                              <td><a href="broker_details.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="Click for Details"><i class="fa fa-eye" class="text-white"></i></a></td>
                                            </tr>
                                   <?php
                                    $c++;
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        </center>
                    </div>
                </div>
                <!--=================================================================================-->
                
             
   
  </div>
  <!-- Modal-->
          <div class="container">
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-4 mt-4 text-center">
        <a href="" target="_blank" name=image_url id=image_url>
         <img name="slide" width="400" height="200" />
         </a>
         </div>
          <div class="col-md-4 mt-4 text-center">
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
    mark: true, // Highlight search terms
    search: {
      caseInsensitive: true
    },
    aLengthMenu: [
      // Show entries incrementally
      [10, 20, 50, -1],
      [10, 20, 50, "All"]
    ],
    order: [[1, "asc"]] // Set State column sorting by default
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
    <script>
        function propertyDetailsPhone(property_id){
        $('.property').html('<div id="loading" style="" ></div>');
        var id=property_id;
        $.ajax({
        url:"property_details.php",
        method:"POST",
        data:{id:id},
        success:function(data){
        $('.property').html(data);
        }
        });
        
        
        return;
        }
        function propertyDetailsEmail(property_id){
        $('.property').html('<div id="loading" style="" ></div>');
        var id=property_id;
        $.ajax({
        url:"property_details_email.php",
        method:"POST",
        data:{id:id},
        success:function(data){
        $('.property').html(data);
        }
        });
        
        
        return;
        }
        </script>
  <script>
                $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();   
                });
                </script>
</body>
</html>
