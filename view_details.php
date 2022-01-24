<?php
include('model/class.expert.php');


$viewId = $_GET["id"];
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
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- meta -->
        <!--Data table cdn-->
        <!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>  -->
        <!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>   -->
        <!--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
        <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <!--<script>  -->
        <!-- $(document).ready(function(){  -->
        <!--    $('#details').DataTable();-->
        <!-- });-->
        <!--</script>-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"       content="width=device-width, initial-scale=1.0">
        <meta name="description"    content="Nirvana Country is the most prestigious and well-known township in Gurgaon. It is a gated community of villas which homes over 1000 families.">
        <meta name="keywords"       content="Nirvana country, nirvana, township in Gurgaon, apartments in Gurgaon, homes in Gurgaon, residential properties in Gurgaon, houses in Gurgaon, property in Gurgaon, residential society in Gurgaon, best gated community in Gurgaon, top properties in Gurgaon, Unitech nirvana country">
        <meta name="author"         content="Shivam">
        <!-- Site title -->
        <title>Nirvana Country – Gurgaon’s Most Prestigious And Well-Known Township</title>
        <!-- favicon -->
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
        <link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="./pwaise/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./pwaise/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./pwaise/favicon-16x16.png">
        <link rel="apple-touch-icon" sizes="57x57" href="./pwaise/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="./pwaise/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="./pwaise/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="./pwaise/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="./pwaise/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="./pwaise/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="./pwaise/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="./pwaise/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="./pwaise/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="./pwaise/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./pwaise/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="./pwaise/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./pwaise/favicon-16x16.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="./pwaise/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="manifest" href="<?php echo SITE_URL;?>/manifest.json">
        <!-- Responsive css -->
        <link href="<?php echo SITE_URL;?>assets/css/responsive.css" rel="stylesheet">
        <script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
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
        if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('./service-worker.js');
        }
        </script>
        <script data-ad-client="ca-pub-9584597326711955" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-6246358526663438",
        enable_page_level_ads: true
        });
        </script>
        <script type = "text/javascript">
        var i = 0;          // Start Point
        var k1="<?php echo $indexvalues[0]['first_index']?>";
        var k2="<?php echo $indexvalues[0]['secound_index']?>";
        var images = <?php echo json_encode($images); ?>;   // Images Array
        var url = <?php echo json_encode($url); ?>;
        var url_tel = <?php echo json_encode($url_tel); ?>;
        var url_mail = <?php echo json_encode($url_mail); ?>;
        var time = 5000;    // Time Between Switch
        
        // Image List
        //images[0] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";
        //images[1] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Garima.jpg";
        //images[2] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";
        //images[3] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Screenshot (32).png";
        // Change Image
        function changeImg(){
        
        document.slide.src = images[k1];
        document.getElementById("onlyaplfortenant5").style.display = 'none';
        if(url[k1]){
        document.getElementById("click_web").href = url[k1];
        document.getElementById("onlyaplfortenant5").style.display = 'block';
        }
        document.getElementById("onlyaplfortenant6").style.display = 'none';
        if(url_tel[k1]){
        document.getElementById("click_call").href = url_tel[k1];
        document.getElementById("onlyaplfortenant6").style.display = 'block';
        }
        document.getElementById("onlyaplfortenant7").style.display = 'none';
        if(url_mail[k1]){
        document.getElementById("click_mail").href = url_mail[k1];
        document.getElementById("onlyaplfortenant7").style.display = 'block';
        }
        
        document.slide1.src = images[k2];
        document.getElementById("right1").style.display = 'none';
        if(url[k2]){
        document.getElementById("click_web_r").href = url[k2];
        document.getElementById("right1").style.display = 'block';
        }
        document.getElementById("right2").style.display = 'none';
        if(url_tel[k2]){
        document.getElementById("click_call_r").href = url_tel[k2];
        document.getElementById("right2").style.display = 'block';
        }
        document.getElementById("right3").style.display = 'none';
        if(url_mail[k2]){
        document.getElementById("click_mail_r").href = url_mail[k2];
        document.getElementById("right3").style.display = 'block';
        }
        //  document.getElementById("image_url1").href = url[k2];
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
        .foot_div div{
        width: 100%;
        height: 100%;
        }
        </style>
        
        <style type="text/css">
        .section-big {
        padding: 30px 0px;
        }
        </style>
        <style>
        .example1 {
        height: 50px;
        overflow: hidden;
        position: relative;
        }
        .example1 h3 {
        font-size: 20px;
        color: limegreen;
        position: absolute;
        width: 100%;
        height: 100%;
        margin: 0;
        line-height: 50px;
        text-align: center;
        /* Starting position */
        -moz-transform:translateX(100%);
        -webkit-transform:translateX(100%);
        transform:translateX(100%);
        /* Apply animation to this element */
        -moz-animation: example1 15s linear infinite;
        -webkit-animation: example1 15s linear infinite;
        animation: example1 15s linear infinite;
        }
        /* Move it (define the animation) */
        @-moz-keyframes example1 {
        0%   { -moz-transform: translateX(100%); }
        100% { -moz-transform: translateX(-100%); }
        }
        @-webkit-keyframes example1 {
        0%   { -webkit-transform: translateX(100%); }
        100% { -webkit-transform: translateX(-100%); }
        }
        @keyframes example1 {
        0%   {
        -moz-transform: translateX(100%); /* Firefox bug fix */
        -webkit-transform: translateX(100%); /* Firefox bug fix */
        transform: translateX(100%);
        }
        100% {
        -moz-transform: translateX(-100%); /* Firefox bug fix */
        -webkit-transform: translateX(-100%); /* Firefox bug fix */
        transform: translateX(-100%);
        }
        }
        @media (max-width:600px) {
        #image_url1 img{
        display: none;
        }
        }
        tr { border: none; }
        td {
          border-right: solid 1px #D5DBDB ; 
          border-left: solid 1px #D5DBDB ;
        }

        
        input{
        width:100%;
        height:40px;
        
        margin-bottom:15px;
        border-radius:0px;
        }
        .block{
        width:100%;
        height:40px;
        margin-bottom:15px;
        border-radius:0px;
        }
        </style>
    </head>
    <body>
        <!-- Navigation area starts -->
        <?php include(ROOTACCESS."front_header.php");?>
        <!-- Navigation area ends -->
        <div class="clearfix"></div>
        <!--Buy and sell starts-->
        <div class="modal fade bd-example-modal-lg" id="buynsell" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                
                <div class="modal-content property"></div>
                
            </div>
        </div>
        <section class="news-area section-small">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <br><br><br><br>
                            <h2>Buy and Sell</h2>
                            <!-- <a href="buynsell.php"><button class="btn" style="background-color:green" >Add Property</button></a>-->
                        </div>
                        
                        <?php 
                        $ModelCall->where("id",$viewId);
                        $getPropertyDetails = $ModelCall->get("newbuynsell");
                            foreach($getPropertyDetails as $SearchData) { 
                                   $id=$SearchData['id'];
                                    
                                    $Approval_Date = $SearchData['approvalDate'];  
                                    $new_approval_Date = date("d-m-Y", strtotime($Approval_Date));  
                                    
                                    if($SearchData['price'] > 0 && $SearchData['price'] < 1000){
                                        $output = $SearchData['price'];
                                    }else if($SearchData['price'] >= 1000 && $SearchData['price'] < 100000){
                                        $Price = $SearchData['price']/1000;
                                        $Price_Decimal = $SearchData['price']%1000;
                                        $output = substr($Price_Decimal, 0, 0);
                                        $output = "Rs.".$Price.$output." K";
                                    }else if($SearchData['price'] >= 100000 && $SearchData['price'] < 10000000){
                                        $Price = $SearchData['price']/100000;
                                        $Price_Decimal = $SearchData['price']%100000;
                                        $output = substr($Price_Decimal, 0, 0);
                                        $output = "Rs.".$Price.$output." L";
                                    }else if($SearchData['price'] >= 10000000 ){
                                        $Price = $SearchData['price']/10000000;
                                        $Price_Decimal = $SearchData['price']%10000000;
                                        $output = substr($Price_Decimal, 0, 0);
                                        $output = "Rs.".$Price.$output." Cr";
                                    }else if($SearchData['price'] == 0){
                                        $output = "N/A";
                                    }
                                    
                            
                            
                            ?>
                            
                            <div class="col-sm-12">
                            <form method ="post">
                                 <div class="item">
                              <div class="aminities-block">
                                <div class="card bg-light mb-3">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-sm-12 hidden-lg hidden-md">
                                        <img src="images/detailimg.jpeg" style=" all: unset;height:145px;width:258px;border-radius: 10px;" class="img-rounded" alt="Cinque Terre">
                                      </div>
                                      <div class="col-sm-12 hidden-xs hidden-sm">
                                        <img src="images/detailimg.jpeg" style=" all: unset;height:355px;width:1067px;border-radius: 10px;" class="img-rounded" alt="Cinque Terre">
                                      </div>
                                      <input type="hidden" value="<?php echo $SearchData['id'];?>" name="house_id" id="house_id">
                                      <div class="col-sm-12">
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <p><?php echo $SearchData['projectName']."/".$SearchData["locality"]?></p>
                                            <b><?php echo $SearchData['property_type']?></b>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <h6 class="text-muted" >Price</h6>
                                            <h4> <?php echo $output?></h4>
                                          </div>
                                          <div class="col-sm-4">
                                            <h6 class="text-muted" >Area</h6>
                                            <h4><?php if($SearchData["area"] == NULL || $SearchData["area"] == ''|| $SearchData["area"] == 0){echo "N/A";}else{ echo $SearchData["area"]." sq. Ft.";}?></h4>
                                          </div>
                                          <div class="col-sm-2">
                                            <h6 class="text-muted" >Bedrooms</h6>
                                            <h4><?php if($SearchData["bedroom"] == NULL || $SearchData["bedroom"] == '' || $SearchData["bedroom"] == ''){ echo "N/A";}else{ echo $SearchData["bedroom"]."BHK";} ?></h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-12">
                                              <h6 class="text-muted" >Description</h6>
                                              <?php 
                                              $Description = $SearchData["description"];
                                              ?>
                                            <p><?php if($Description == NULL || $Description == ''){ echo "N/A";}else{ echo $SearchData["description"];}?></p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <small>Posted on <?php echo $new_approval_Date." by ".$SearchData["propertyLister"];?></small><br>
                                        <b>Posted By: <?php if($SearchData["first_name"] <> '' || $SearchData["first_name"] <> NULL){ echo $SearchData["first_name"];}else{ echo "N/A";}?></b>
                                    </div>
                                    <div class="col-sm-8 text-right">
                                        <?php
                                      if($SearchData['email']!='' && $SearchData['mobile1']!=''){
                                         echo '<td class="text-left"><i class="fa fa-envelope" style="font-size:20px;margin-left:20px;color:green;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
                                        }
                                        elseif($SearchData['email']!='' && $SearchData['mobile1']==''){
                                        echo '<td class="text-left"><i class="fa fa-envelope" style="font-size:20px;margin-left:45px;color:green;cursor:pointer" class="clickable-row" onclick=propertyDetailsEmail("'.$id.'")  data-toggle="modal" data-target="#buynsell"></i></td>';
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
                            </form>
                           
                          </div>
                            <?php }
                            ?>
                        
                    
                    </div>
                </div>
            </div>
        </section>
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
        <!--Buy and sell end-->
        <?php if($getBannerShow1[0]['google_ads']!='' || $getBannerShow1[0]['image']!=''){ echo test;?>
        <section id="about" class="banner-area section-big">
            <div class="container">
                <div class="row">
                    <div class="" style="text-align:center;">
                        <?php if($getBannerShow1[0]['ads_banner_type']=="Image"){?>
                        <a href="<?php echo $getBannerShow1[0]['ads_management_url'];?>" >  <img src="https://nirvanacountry.co.in/RWAVendor/ads_managements/f1104404-7071-45f0-a10c-66cc587c2bee.jpeg" style="width:728px; height:90px;"></a>
                        <?php } ?>
                        <?php if($getBannerShow1[0]['ads_banner_type']=="GoogleAd"){?>
                        <?php echo $getBannerShow1[0]['google_ads'];?>
                        <?php } ?>
                    </div>
                </div></div></section>
                <?php } ?>
                <div class="row"></div>
                <!-- Aminities area ends -->
                <!-- Footer starts-->
                <?php include(ROOTACCESS."HomefooterCall.php");?>
                <?php
                if($_SESSION['UR_LOGINID']!=''){
                $dataU =array(
                'user_id'=> $_SESSION['UR_LOGINID'] ,
                'page_name'=> 'index.php'
                );
                }
                else{
                $dataU =array(
                'user_id'=> '999',
                'page_name'=> 'index.php'
                );
                }
                $resultU= $ModelCall->insert('user_analytics',$dataU);
                ?>
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
                <script type="text/javascript">
                // A $( document ).ready() block.
                $( document ).ready(function() {
                // if (document.cookie.indexOf('visited=true') == -1){
                // load the overlay
                //$('#videoPopup').modal({show:true});
                
                /* var year = 1000*60*60*24*365;
                var expires = new Date((new Date()).valueOf() + year);
                document.cookie = "visited=true;expires=" + expires.toUTCString();*/
                //}
                });
                // hall of fame starts
                function chooseFile() {
                document.getElementById("fame_image").click();
                }
                document.querySelector('#custom_btn').addEventListener("click", chooseFile);
                
                $(document).ready(function(){
                $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById("custom_text").innerHTML='The file "' + fileName +  '" has been selected.';
                });
                });
                document.querySelector('#submit').addEventListener("click", function(){
                if ($('#fame_image').get(0).files.length === 0) {
                alert("Please select an Image");
                return;
                }
                });
                
                </script>
            </body>
        </html>