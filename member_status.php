<?php
include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');
$Backtracker = "member_status.php";
$Status = $_GET['status'];

if($Status == "Yes"){
      if($_SESSION['UR_LOGINID']!=''){
       if( !isset($_SESSION['user_type']) && $_SESSION['user_type']!=0 ) { 
            header("location:".SITE_URL);
       }
    }
    $ModelCall->where("Member",$Status);
    $ModelCall->orderBy("Block","asc");
    $getMembers = $ModelCall->get("rwa_membership_status");
     
    
    // if($_SESSION['UR_LOGINID'] == ''){
    //     $ModelCall->where("Member",$Status);
    //     $ModelCall->orderBy("Block","asc");
    //     $getMembers = $ModelCall->get("rwa_membership_status");
   
    // }else{
     
    //     $ModelCall->where("Member",$Status);
    //     $ModelCall->orderBy("Block","asc");
    //     $getMembers = $ModelCall->get("rwa_membership_status");
    // }
    
}else if($Status == "No" || $Status == "Docs Pending"){

    if($_SESSION['UR_LOGINID'] != ''){
        $ModelCall->where("Member",$Status);
        $ModelCall->orderBy("Block","asc");
        $getMembers = $ModelCall->get("rwa_membership_status");
    }else{
        header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$Backtracker."?status=".$Status);
    }
}else if($Status == "N/A"){
    if($_SESSION['UR_LOGINID'] != ''){
        $ModelCall->where("Member",$Status);
        $ModelCall->orderBy("Block","asc");
        $getMembers = $ModelCall->get("rwa_membership_status");
    }else{
        header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$Backtracker."?status=".$Status);
    }
    
}

$ModelCall->where("user_id",$user_id);

$ModelCall->orderBy("user_id","asc");

$rec = $ModelCall->get("Wo_Users");

if(isset($_POST["raise"])){
    $User_id = $_POST["user_id"];
    $For_house_no = $_POST["for_house_no"];
    $By_house_no = $_POST["by_house_no"];
    $For_owner_name = $_POST["for_owner_name"];
    $By_owner_name = $_POST["by_owner_name"];
    $Subject = $_POST["subject"];
    $Message = $_POST["msg"];
    $Current_date = date('Y-m-d');
    $Ip_address = $_SERVER['REMOTE_ADDR'];
    $From_email =$rec[0]['email'];
    $To_mail = 'office.nrwa@nirvanacountry.co.in';
    
    $sql = "INSERT INTO rwa_membership_msg (user_id, for_house_no, for_owner_name, by_house_no, by_owner_name, msg, subject, ip_address, created_date)
    VALUES ('$User_id', '$For_house_no', '$For_owner_name', '$By_house_no', '$By_owner_name', '$Message', '$Subject', '$Ip_address', '$Current_date')";
   
        $to=$To_mail;
        //$msg= "Service Mail";
        $subject="Concern Raised for".$For_owner_name." by ".$By_owner_name;
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From:'.$By_owner_name.'<'.$From_email.'>'."\r\n";
        $headers .= 'Cc: nishthagupta@gmail.com' . "\r\n";
        $ms.="<html></body><div><div>Dear Sir,</div></br></br>";
        $ms.="<div>
                $By_owner_name of $By_house_no has raised an objection for membership status of $For_owner_name, of $For_house_no
              </div>";
        $ms.="<div>Below are the Comments mentioned:</div>";
        $ms.="<div><b>$Subject</b></div></br>";
        $ms.="<div style='padding-top:8px;'>$Message</div>
        <br>
        <p>Warm regards</p>
        <p>NRWA Office</p> 
        <a href='www.nirvavacountry.co.in' target='_blank'>www.nirvavacountry.co.in</a>
        </body></html>";
        mail($to,$subject,$ms,$headers);
   
    header("location:".SITE_URL."member_status.php?status=Yes&msgstatus=success");
  
}
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!--<script>  -->
    <!-- $(document).ready(function(){  -->
    <!--  $('#details').DataTable();-->
    <!-- });-->
    <!--</script>-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"       content="width=device-width, initial-scale=1.0">
    <meta name="description"    content="Nirvana Country is the most prestigious and well-known township in Gurgaon. It is a gated community of villas which homes over 1000 families.">
    <meta name="keywords"       content="Nirvana country, nirvana, township in Gurgaon, apartments in Gurgaon, homes in Gurgaon, residential properties in Gurgaon, houses in Gurgaon, property in Gurgaon, residential society in Gurgaon, best gated community in Gurgaon, top properties in Gurgaon, Unitech nirvana country">
    <meta name="author"         content="Shivam">
    <!-- Site title -->
    <title>Nirvana Country – Gurgaon’s  Prestigious  Township</title>
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
    var i = 0;      // Start Point
    var k1="<?php echo $indexvalues[0]['first_index']?>";
    var k2="<?php echo $indexvalues[0]['secound_index']?>";
    var images = <?php echo json_encode($images); ?>; // Images Array
    var url = <?php echo json_encode($url); ?>;
    var url_tel = <?php echo json_encode($url_tel); ?>;
    var url_mail = <?php echo json_encode($url_mail); ?>;
    var time = 5000;  // Time Between Switch
    
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
    /* @media (max-width:600px) {
    #image_url1 img{
    display: none;
    }
    }*/
    
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
    <!-- Navigation area starts -->
    <?php include(ROOTACCESS."front_header.php");?>
    <!-- Navigation area ends -->
    <div class="clearfix"></div>
    <br><br><br>
    <section class="news-area section-small">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title text-center">
            <?php if($Status == "Yes") {?>
            <h3>Members</h3>
            <?php } elseif($Status == "N/A"){?>
              <h3>Non-Members List</h3>
            <?php }else{?>
              <h3>Pending Members List</h3>
            <?php } ?>
            </div>
            
            <div class="table-responsive" align="center">
              <table class="table table-striped table-hover dt-responsive" id="dataTable" style="width:60% !important;">
                <caption class="sr-only">Table example</caption>
                
             <thead class="bg-primary">
                  <tr>
                    <th class="first" scope="col"><i class="fa fa-ticket" aria-hidden="true"></i></th>
                    <th scope="col" width="200px">House No.</th>
                    <th scope="col" width="200px">Member Name</th>
                    <th scope="col" width="200px">Membership Status</th>
                    <!--<th scope="col">Action</th>-->
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                  $c=1;
                  foreach($getMembers as $Get_Members){
                  $id=$Get_Members['s_no']; 
                  
                  ?>
                  
                  <tr>
                      <td><?php echo $c;?></td>
                      <td><?php echo $Get_Members['Block']."-".$Get_Members['House_No']." ".$Get_Members['Floor'];?></td>
                      <td><?php echo $Get_Members['Member First Name']. " " . $Get_Members['Member Middle Name']." " .$Get_Members['Member Last Name'];?></td>
                      <td><?php echo $Get_Members['Member'];?></td>
                   <!--<?php // if($_SESSION['UR_LOGINID'] == ''){?>-->
                   <!-- <td>    <button type="button" class="btn custom_btn" style="background-color:green;color:white" onclick="goBackToLogin();">-->
                   <!--       Raise Objection-->
                   <!--     </button> </td>-->
                   <!--   <?php // } else { ?>-->
                   <!--   <td>-->
                   <!--     <button type="button" class="btn custom_btn" style="background-color:green;color:white" data-toggle="modal" data-target="#confirmbox<?php echo $id;?>">-->
                   <!--       Raise Objection-->
                   <!--     </button>-->
                   <!--   </td>-->
                   <!--   <?php // }?>-->
                  </tr>
                  <div class="modal fade" id="confirmbox<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                              <br>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Do you want to raise an objection on status of this member
                          </div>
                          <div class="modal-footer ">
                              <div class="text-center">
                                  <button type="button" class="btn custom_btn" style="background-color:red" data-dismiss="modal">No</button>
                                <button type="button" class="btn custom_btn" style="background-color:green" data-dismiss="modal" data-toggle="modal" data-target="#raiseObjection<?php echo $id;?>">Yes</button>
       
                              </div>
                                
                          </div>
                        </div>
                      </div>
                    </div>
                  
                  
                  <!--Raise Objection Modal -->
                    <div class="modal fade" id="raiseObjection<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <form method="post">
                               <?php if($_SESSION['UR_LOGINID']!=''){
                                   $Session_id = $_SESSION['UR_LOGINID'];
                                   
                                   
                                   $ModelCall->where("user_id", $Session_id);
                                    $ModelCall->orderBy("user_id","asc");
                                    $ByMember = $ModelCall->get("Wo_Users");
                                   
                                   $ModelCall->where("id", $ByMember[0]['block_id']);
                                    $ModelCall->orderBy("block_name","asc");
                                    $user_type=$ByMember[0]['user_type'];
                                    $GetBlockList = $ModelCall->get("tbl_block_entry");
                                    //print_r($GetBlockList);
                                    $House_No= sprintf('%04d', $ByMember[0]['house_number_id']);
                                   
                                   
                                   
                                    
                                   
                                   
                                   /* $ModelCall->where("user_id",$Session_id);
                                    $ByMember = $ModelCall->get("Wo_Users");   */
                                   
                               ?>
                               <?php
                               foreach($ByMember as $By_Member){
                               echo $By_Member["House_No"];
                               ?>
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLongTitle">Update Membership Info/Status</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <input type="hidden" name="user_id" id="user_id" value="<?php echo $id?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="for_house_no" id="for_house_no" value="<?php echo $Get_Members['Block']."-".$Get_Members['House_No']." ".$Get_Members['Floor'];;?>" placeholder="For House No." required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <?php if($_SESSION['UR_LOGINID']!=''){ ?>
                                                <input type="text" class="form-control" name="by_house_no" id="by_house_no" value="<?php echo $GetBlockList[0]['block_code'].'-'.$House_No;?>" placeholder="By House No." required readonly>
                                                <?php }else{ ?>
                                                <input type="text" class="form-control" name="by_house_no" id="by_house_no"  placeholder="By House No." required>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="for_owner_name" id="for_owner_name" value="<?php echo $Get_Members['Member First Name'];?>" placeholder="Owner's Name" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <?php if($_SESSION['UR_LOGINID']!=''){ ?>
                                                    <input type="text" class="form-control" name="by_owner_name" id="by_owner_name" value="<?php echo $By_Member["first_name"];?>" placeholder="Owner's Name" required readonly>
                                                    <?php }else{ ?>
                                                    <input type="text" class="form-control" name="by_owner_name" id="by_owner_name"  placeholder="Owner's Name" required>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="msg" id="msg" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                                    <button type="submit" name="raise" id="raise"  class="btn custom_btn" style="background-color:green">Submit</button>
                                  </div>
                                </div>
                                <?php } ?>
                                <?php }else{ ?>
                                
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLongTitle">Update Membership Info/Status</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <input type="hidden" name="user_id" id="user_id" value="<?php echo $id?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="for_house_no" id="for_house_no" value="<?php echo $Get_Members['Block']."-".$Get_Members['House_No']." ".$Get_Members['Floor'];?>" placeholder="For House No." required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <?php if($_SESSION['UR_LOGINID']!=''){ ?>
                                                <input type="text" class="form-control" name="by_house_no" id="by_house_no" value="<?php echo $GetBlockList[0]['block_code'].'-'.$House_No;?>" placeholder="By House No." required readonly>
                                                <?php }else{ ?>
                                                <input type="text" class="form-control" name="by_house_no" id="by_house_no"  placeholder="By House No." required>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="for_owner_name" id="for_owner_name" value="<?php echo $Get_Members['Member First Name'];?>" placeholder="Owner's Name" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <?php if($_SESSION['UR_LOGINID']!=''){ ?>
                                                    <input type="text" class="form-control" name="by_owner_name" id="by_owner_name" value="<?php echo $By_Member["first_name"];?>" placeholder="Owner's Name" required readonly>
                                                    <?php }else{ ?>
                                                    <input type="text" class="form-control" name="by_owner_name" id="by_owner_name"  placeholder="Owner's Name" required>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="msg" id="msg" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                                    <button type="submit" name="raise" id="raise" class="btn custom_btn" style="background-color:green">Submit</button>
                                  </div>
                                </div>
                                
                                <?php } ?>
                          </form>
                        
                      </div>
                    </div>
                  
                 
                  <?
                  $c++;
                  }
                  ?>
                  
                </tbody>
              </table>
            </div>
            
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

      function goBackToLogin(){
      window.location.href = '<?php echo SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$Backtracker."?status=".$Status;?>';
      return false;
    }

    $(document).ready(function(){
        $('.navbar-fixed-top').addClass('nav-active');
    })

    </script>
    
        <?php 
        $Url_Status = $_GET["msgstatus"];
        if($Url_Status == "success"){ ?>
            <script>
                alert("Successfully sent!"); 
            </script>
        <?php }
        ?>
    
    <!--Buy and sell end-->
    
    <!-- Footer starts-->
    <?php include(ROOTACCESS."HomefooterCall.php");?>
    <!-- copyright area ends -->
    <!-- Latest jQuery -->
    <!--<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>-->
    <!-- Bootstrap js-->
    <!--<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>-->
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
  </body>
</html>