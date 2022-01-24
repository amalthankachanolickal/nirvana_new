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
$getPropertyDetails = $ModelCall->get("newbuynsell");
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
    <title>Document</title>
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
     color: #fff !important;
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
                            <h2>Buy and Sell</h2>
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
                                    
                                    <tr >
                                        <!--<th style="background-color:#0040ff;text-align:center;width:10%" scope="col">Locality</th>-->
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col">B/S</th>
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col">BHK</th>
                                        <th style="background-color:#4267B2;text-align:center;width:12%" scope="col">Type</th>
                                        <th style="background-color:#4267B2;text-align:center;width:12%" scope="col">Area</th>
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col">Price</th>
                                        <th style="background-color:#4267B2;text-align:center;width:10%" scope="col">Block</th>
                                       <!-- <th style="background-color:#0040ff;text-align:center;width:10%" scope="col">Avbl</th>-->
                                        <th style="background-color:#4267B2;text-align:center;width:28%" scope="col">Description</th>
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col"><i class="fa fa-envelope" class="text-white"></i></th>
                                        <th style="background-color:#4267B2;text-align:center;width:8%" scope="col"><i class="fa fa-eye" class="text-white"></i></th>
                                    </tr>
                                </thead>
                                </br>
                                
                                <tbody>
                                    <?php
                                    $c=1;
                                    foreach($getPropertyDetails as $property){
                                    if($property['approved']==1 && ($property['listing_type'] == "sell" || $property['listing_type'] == "buy")){
                                    $id=$property['id'];
                                    
                                    if(strlen($description) >30){
                                        $description = substr($property['description'], 0, 30)."...";
                                    }
                                    
                                    $Approval_Date = $property['approvalDate'];  
                                    $new_approval_Date = date("d-m-Y", strtotime($Approval_Date));  
                                    
                                    if($property['price'] > 0 && $property['price'] < 1000){
                                        $output = $property['price'];
                                    }else if($property['price'] >= 1000 && $property['price'] < 100000){
                                        $Price = $property['price']/1000;
                                        $Price_Decimal = $property['price']%1000;
                                        $output = number_format($Price_Decimal, 2, '.');
                                        $output = "".$Price.$output." K";
                                    }else if($property['price'] >= 100000 && $property['price'] < 10000000){
                                        $Price = $property['price']/100000;
                                        $Price_Decimal = $property['price']%100000;
                                         $output = number_format($Price_Decimal, 2, '.');
                                        $output = "".$Price.$output." L";
                                    }else if($property['price'] >= 10000000 ){
                                        $Price = $property['price']/10000000;
                                        $Price_Decimal = $property['price']%10000000;
                                         $output = number_format($Price_Decimal, 2, '.');
                                        $output = "".$Price.$output." Cr";
                                    }else if($property['price'] == 0){
                                        $output = "-";
                                    }
                                    
                                    
                                    
                                    
                                    if($property['bedroom'] == NULL || $property['bedroom'] == ''){
                                        $Bedrooms = "-";
                                    }else{
                                        $Bedrooms = $property['bedroom']."BHK";
                                    }
                                    
                                    if($property['property_type'] == NULL || $property['property_type'] == ''){
                                        $Propertytype = "-";
                                    }else{
                                        $Propertytype = $property['property_type'];
                                    }
                                    
                                    if($property['area'] == NULL || $property['area'] == ''){
                                        $Property_area = "-";
                                    }else{
                                        $Property_area = $property['area']." ".$property["areaUnit"];
                                    }
                                    
                                    
                                    echo '<tr>';
                                        
                                      
                                        
                                        if($property['listing_type'] != "-"){
                                          echo '<td class="text-left"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details" >'.ucfirst($property['listing_type']).'</a></td>';
                                        }else{
                                          echo '<td class="text-center"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details" >'.ucfirst($property['listing_type']).'</a></td>';
                                         }
                                        
                                        if($Bedrooms != "-"){
                                            echo '<td class="text-right"><a href="view_details.php?id='.$id.'"  data-toggle="tooltip" title="Click for Details">'.$Bedrooms.'</a></td>';
                                        }else{
                                            echo '<td class="text-center"><a href="view_details.php?id='.$id.'"  data-toggle="tooltip" title="Click for Details">'.$Bedrooms.'</a></td>';
                                        }
                                        
                                        if($Propertytype != "-"){
                                            echo '<td class="text-left"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.ucfirst($Propertytype).'</a></td>';
                                        }else{
                                             echo '<td class="text-center"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.ucfirst($Propertytype).'</a></td>';
                                        }
                                        
                                        
                                        if($Property_area != "-"){
                                            echo '<td class="text-right"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.$Property_area.'</a></td>';
                                        }else{
                                             echo '<td class="text-center"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.$Property_area.'</a></td>';
                                        }
                                        
                                        
                                        if($output != "-"){
                                            echo '<td class="text-right"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.$output.'</a></td>';
                                        }else{
                                            echo '<td class="text-center"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.$output.'</a></td>';
                                        }
                                        
                                        echo '<td class="text-left"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details">'.'AG-8090'.'</a></td>
                                       
                                        <td class="text-left"><a href="view_details.php?id='.$id.'"  data-toggle="tooltip" title="Click for Details">'.ucfirst($description).'</a></td>';
                                        if($property['email']!='' && $property['mobile1']!=''){
                                       /* echo '<td class="text-left"><i class="fa fa-phone" style="font-size:24px;color:blue;cursor:pointer" class="clickable-row" onclick=propertyDetailsPhone("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i><i class="fa fa-envelope" style="font-size:20px;margin-left:20px;color:red;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';*/
                                        
                                         echo '<td class="text-left"><i class="fa fa-envelope" style="font-size:20px;margin-left:20px;color:#37a000;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
                                        }
                                        elseif($property['email']!='' && $property['mobile1']==''){
                                        echo '<td class="text-left"><i class="fa fa-envelope" style="font-size:20px;margin-left:45px;color:#37a000;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
                                        }
                                        /*elseif($property['email']=='' && $property['mobile1']!=''){
                                        echo '<td class="text-left"><i class="fa fa-phone" style="font-size:24px;color:blue;cursor:pointer" class="clickable-row" onclick=propertyDetailsPhone("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
                                        }*/
                                        else{
                                        echo '<td>Not Avlbl</td>';
                                        }
                                        echo '<td class="text-right"><a href="view_details.php?id='.$id.'" data-toggle="tooltip" title="Click for Details"><i class="fa fa-eye"></i></a></td>';
                                    echo '</tr>';
                                    }
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
                
                <!--========================================Mobile View==========================================-->
                <div class="row hidden-lg hidden-md">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <br><br><br><br>
                            <h2>Buy and Sell</h2>
                            <!-- <a href="buynsell.php"><button class="btn" style="background-color:#37a000" >Add Property</button></a>-->
                        </div>
                        <?php if(isset($_GET['actionresult'])){?>
                        <p style="color: #e00909;font-size: 15px;">Hey ! Your message has been sent to the owner successfully.</p>
                        <?php } ?>
                        <?php if($_REQUEST['ActionResult']=="listedsuccessfully"){?>
                        <p style="color: #e00909;font-size: 15px;">Hey ! Your property has been listed successfully.</p>
                        <?php } ?>
                        
                       
                                    <?php
                                    $c=1;
                                    foreach($getPropertyDetails as $property){
                                    if($property['approved']==1 && ($property['listing_type'] == "sell" || $property['listing_type'] == "buy")){
                                    $id=$property['id'];
                                    
                                    $description = substr($property['description'], 0, 30);
                                    
                                    $Approval_Date = $property['approvalDate'];  
                                    $new_approval_Date = date("d-m-Y", strtotime($Approval_Date));  
                                    
                                    if($property['price'] > 0 && $property['price'] < 1000){
                                        $output = $property['price'];
                                    }else if($property['price'] >= 1000 && $property['price'] < 100000){
                                        $Price = $property['price']/1000;
                                        $Price_Decimal = $property['price']%1000;
                                        $output = number_format($Price_Decimal, 2, '.');
                                        $output = "".$Price.$output." K";
                                    }else if($property['price'] >= 100000 && $property['price'] < 10000000){
                                        $Price = $property['price']/100000;
                                        $Price_Decimal = $property['price']%100000;
                                         $output = number_format($Price_Decimal, 2, '.');
                                        $output = "".$Price.$output." L";
                                    }else if($property['price'] >= 10000000 ){
                                        $Price = $property['price']/10000000;
                                        $Price_Decimal = $property['price']%10000000;
                                         $output = number_format($Price_Decimal, 2, '.');
                                        $output = "".$Price.$output." Cr";
                                    }else if($property['price'] == 0){
                                        $output = "-";
                                    }
                                    
                                    
                                    
                                    if($property['bedroom'] == NULL || $property['bedroom'] == ''){
                                        $Bedrooms = "-";
                                    }else{
                                        $Bedrooms = $property['bedroom']."BHK";
                                    }
                                    
                                    if($property['property_type'] == NULL || $property['property_type'] == ''){
                                        $Propertytype = "-";
                                    }else{
                                        $Propertytype = $property['property_type'];
                                    }
                                    
                                    if($property['area'] == NULL || $property['area'] == ''){
                                        $Property_area = "-";
                                    }else{
                                        $Property_area = $property['area'];
                                    }
                                    
                                    ?>
                                    
                                    <div class="item">
                              <div class="aminities-block">
                                <div class="card bg-light mb-3">
                                  <div class="card-body">
                                    <div class="row">
                                      
                                      <input type="hidden" value="<?php echo $property['id'];?>" name="house_id" id="house_id">
                                      <div class="col-sm-12">
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <a href="view_details.php?id=<?php echo $id;?>" style="color:black;" ><p><?php echo $property['projectName']."/".$property["locality"]?></p></a>
                                            <a href="view_details.php?id='.$id.'" style="color:black;" ><b><?php echo $property['property_type']?></b></a>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <h6 class="text-muted" >Price</h6>
                                            <a href="view_details.php?id=<?php echo $id;?>" style="color:black;" ><h4> <?php echo $output?></h4></a>
                                          </div>
                                          <div class="col-sm-4">
                                            <h6 class="text-muted" >Area</h6>
                                            <a href="view_details.php?id=<?php echo $id;?>" style="color:black;" ><h4><?php if($property["area"] == NULL || $property["area"] == ''|| $property["area"] == 0){echo "-";}else{ echo $property["area"]." sq. Ft.";}?></h4></a>
                                          </div>
                                          <div class="col-sm-2">
                                            <h6 class="text-muted" >Bedrooms</h6>
                                            <a href="view_details.php?id=<?php echo $id;?>" style="color:black;" ><h4><?php if($property["bedroom"] == NULL || $property["bedroom"] == '' || $property["bedroom"] == ''){ echo "-";}else{ echo $property["bedroom"]."BHK";} ?></h4></a>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-12">
                                              <h6 class="text-muted" >Description</h6>
                                              <?php 
                                              $Description = $property["description"];
                                              ?>
                                            <a href="view_details.php?id=<?php echo $id;?>" style="color:black;" ><p><?php if($Description == NULL || $Description == ''){ echo "-";}else{ echo $description."";}?></p></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <small>Posted on <?php echo $new_approval_Date." by ".$property["propertyLister"];?></small><br>
                                        <b>Posted By: <?php if($property["first_name"] <> '' || $property["first_name"] <> NULL){ echo $property["first_name"];}else{ echo "-";}?></b>
                                    </div>
                                    <div class="col-sm-8 text-right">
                                        <?php
                                      if($property['email']!='' && $property['mobile1']!=''){
                                         echo '<td class="text-left"><i class="fa fa-envelope" style="font-size:20px;margin-left:20px;color:#37a000;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
                                        }
                                        elseif($property['email']!='' && $property['mobile1']==''){
                                        echo '<td class="text-left"><i class="fa fa-envelope" style="font-size:20px;margin-left:45px;color:#37a000;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
                                        }
                                        else{
                                        echo '<td>Not Avlbl</td>';
                                        } ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                                    
                                <?php    
                                    }
                                }
                            ?>  
                            
                            
                    </div>
                </div>
                <!--==============================================================================================-->
                
               
   
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
