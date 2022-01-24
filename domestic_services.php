<?php
include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');


$ModelCall->where("status", 1);
$getDomesticService = $ModelCall->get("domestic_services_mini_listing");

if(isset($_SESSION['UR_LOGINID']) && $_SESSION['UR_LOGINID']!=""){
                                                
 $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

    $rec = $ModelCall->get("Wo_Users");
    
    
    $ModelCall->where("id", $rec[0]['block_id']);
    $ModelCall->orderBy("block_name","asc");
    $GetBlockList = $ModelCall->get("tbl_block_entry");
    
    $House_No= sprintf('%04d', $rec[0]['house_number_id']);
}
   
   
if(isset($_POST["sendemail"])){
    
    $Row_Name = $_POST["row_name"];
    $Row_Category = $_POST['row_category'];
   /* $Row_Gender = $_POST["row_gender"];*/
   
    $msg = $_POST['msg'];
    
    $User_Id = $_POST["user_id"];
    
    /*if($Row_Gender == 'M'){
        $Gender = 'Man';
    }elseif($Row_Gender == 'F'){
        $Gender = 'Woman';
    }*/
    
    
    /*===============check for existing===========*/
    $ModelCall->where("status", 1);
    $ModelCall->where("name", $Row_Name);
    $ModelCall->where("category", $Row_Category);
    $getServiceProviderName = $ModelCall->get("domestic_services_mini_listing");
    $count = count($getServiceProviderName);
    
    
    if($count > 0){
        foreach($getServiceProviderName as $ServiceProviderName){
            $Row_Id = $ServiceProviderName["id"];
        }
    }else{
        
        $dataI = array(
            'name' => $Row_Name,
            'status' => 1,
            'summary' => $msg,
            'category' => $Row_Category,
            'created_datetime' => date("d-m-Y h:i:s"),
            'created_by' => $User_Id
            );
            
       $Insert = $ModelCall->insert('domestic_services_mini_listing',$dataI); 
       $getMaxId = $ModelCall->rawQuery("SELECT max(id) as max_user_id FROM domestic_services_mini_listing");
                
                
                foreach($getMaxId as $MaxId){
                    $Row_Id = $MaxId['max_user_id'];
                }
                
    }
    /*=================================================*/
    
    
    $rating_1 = $_POST["1-star"];
    $rating_2 = $_POST["2-star"];
    $rating_3 = $_POST["3-star"];
    $rating_4 = $_POST["4-star"];
    $rating_5 = $_POST["5-star"];
    
    $rating = max($rating_1,$rating_2,$rating_3,$rating_4,$rating_5);
    
   
       
//   $to = "bommanakavya1997@gmail.com";
    $to = "kushalbhasin@gmail.com,office.nrwa@nirvanacountry.co.in";
    $from = $_POST["email"];  
    $from_name = $_POST["name"];
    $subject = "Domestic Help ".$from_name." Caution Message" ;
    
    $mobile = $_POST["mob"];
    $BlockNo = $_POST["block"];

    
    
    
    $message.="<html>
    <body>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
                Dear sir,
                <br><br>
                  Please note that the person named $Row_Name has been found guilty of unethical behaviour while working in Nirvana. 
                  Thus he should not to be given entry in Nirvana premises for any reason. He may not enter the premises on the authority of any staff member or guard.
                All resident are cautioned against employing him due to this. We suggest that proper background verification be done before any staff employment.

                  <p>$msg</p>  
            </span>
          <span style='text-align:center'> Warm Regards, <br><br>
            $from_name <br>
            $mobile <br>
            $BlockNo<br>
          </span>
        </span></p></td></tr></tbody></table>
    </body>
</html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$from.'>' . "\r\n";
$headers .= 'Cc: website.admin@nirvanacountry.co.in' . "\r\n";

$ok = mail($to,$subject,$message,$headers);

$dataU = array(
    'user_id'=> $User_Id,
    'dom_id'=> $Row_Id,
    'feedback' => $msg,
    'rating' => $rating
	);

$resultU = $ModelCall->insert('domestic_services_mini_listing_feedbacks',$dataU);
header("Location:domestic_services.php?actionResult=sent");
exit(0);
 
}
?>


<?php
if(isset($_POST['commentmail'])){
    $toId = $_POST['to_userid'];
    $fromId = $_SESSION['UR_LOGINID'];
    $comment = $_POST['comment'];
    
    $getToEmail = $ModelCall->rawQuery("SELECT user_email as email FROM Wo_Users WHERE user_id = '$toId' ");
                
                
                foreach($getToEmail as $ToEmail){
                    $toEmail = $ToEmail['email'];
                }
                
    $getServiceProderInfo = $ModelCall->rawQuery("SELECT user_email as email FROM Wo_Users WHERE user_id = '$toId' ");
                
                
                foreach($getServiceProderInfo as $ServiceProderInfo){
                    if($ServiceProderInfo['gender'] == 'M' ){
                        $serviceProviderName = "Mr. ".$ServiceProderInfo['name'];
                    }else{
                        $serviceProviderName = "Ms. ".$ServiceProderInfo['name'];
                    }
                    
                }
                
            
            $to = $toEmail;
            /*$to = "iambommanakavya@gmail.com";*/
            $from = 'website.admin@nirvanacountry.co.in';  
            
            $subject = "Query re your feedback of $serviceProviderName" ;
            
            $message.="<html>
            <body>
                <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
                    style='border-collapse:collapse;'>
                    <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
                    <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
                    <span>
                        Dear Sir,
                        <br><br>
                         Please find Comments for your feedback
        
                        <p>$comment.</p>  
                    </span>
                  <span style='text-align:center'> Warm Regards, <br><br>
                   NRWA Office<br>
                  </span>
                </span></p></td></tr></tbody></table>
            </body>
        </html>";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <'.$from.'>' . "\r\n";
        $headers .= 'Bcc: nishthagupta@gmail.com' . "\r\n";
        
        $ok = mail($to,$subject,$message,$headers);
        
$dataC = array(
    'from_id'=> $fromId,
    'to_id'=> $toId,
    'comments' => $comment
	);

$resultU = $ModelCall->insert('domestic_services_mini_listing_comments',$dataC);
header("Location:domestic_services.php?actionResult=sent");
exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Banned From Nirvana Society</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>-->
    
    
    <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
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

<style>
table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th.dtr-control:before{
    margin-top:0px !important;
    top:10% !important;
}
    
table.dataTable thead .sorting, table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc {
    background-image: none;
}
/*==========changing checkbox to star============*/
/*.star {
    visibility:hidden;
    font-size:40px;
    cursor:pointer;
    color:Orange;
}
.star:before {
   content: "\2606";
   position: absolute;
   visibility:visible;
}
.star:checked:before {
   content: "\2605";
   position: absolute;
}*/

    </style>
    
</head>
<body>
  <?php include(ROOTACCESS."front_header.php");?>
<!-- Begin Content    -->
<div class="container">
   <div class="clearfix"></div>
       
   
    <!--=====================Domestic Services Desktop view==========================================-->
            <div class="row">
                <!--<div class="row hidden-xs hidden-sm">-->
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <br><br><br><br>
                            <h3>Staff Banned From Nirvana Society</h3>
                            <!-- <a href="buynsell.php"><button class="btn" style="background-color:#37a000" >Add Property</button></a>-->
                        </div>
                        <?php
                        if($_SESSION['UR_LOGINID'] <> ''){ ?> 
                        <div class="row text-right">
                            <a  href="#" style="text-decoration:none"  data-toggle="modal" data-target="#email_popup"><img src="images/contact.png" alt="Mail" width="30px">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                        <?php } ?>
                            
                         <hr/>
                        <center>
                            <?php 
                            if($_REQUEST["actionResult"] == 'sent'){ ?>
                                <p style="color:green;">Mail successfully sent</p>
                            <?php
                            }
                            ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dt-responsive" id="dataTable" style="width: 100%" >
                                <caption class="sr-only">Table example</caption>
                                
                                <thead>
                                    
                                   
                                       <tr>
                                        <th  scope="col" class="text-center">Category</th>
                                        <th  scope="col" class="text-center">Name </th>
                                        <th  scope="col" class="text-center">M/F</th>
                                        <th  scope="col" class="text-center">Photo</th>
                                        <th  scope="col" class="text-center">Summary</th>
                                        <th  scope="col" class="text-center">Identity Card No. </th>
                                          <!--<th  scope="col" class="text-center">Give F/b.</th>-->
                                            <th  scope="col" class="text-center">Details.</th>
                                        <!--<th style="text-align:center;" scope="col" class="text-center"><i class="fa fa-envelope" class="text-white"></i></th>-->
                                        <!--<th style="text-align:center;" scope="col" class="text-center"><i class="fa fa-eye" class="text-white"></i></th>-->
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    foreach($getDomesticService as $services){ 
                                    
                                    $description = $services["summary"];
                                    if(strlen($description) >55){
                                        $description = substr($description, 0, 55)."...";
                                       
                                    /*if($services["id_card"] == 'Aadhar'){
                                        $Id = "A - ".$services["id_number"];
                                    }*/
                                        
                              
                                    }
                                    ?>
                                    <tr>
                                        <td><a href="#" style="color:black;" target="_blank" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" data-toggle="tooltip" title="Click for Details"><?php echo $services["category"]?></a></td>
                                        <td><a href="#" style="color:black;" target="_blank" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" data-toggle="tooltip" title="Click for Details"><?php echo $services["name"]?></a></td>
                                        <td  class="text-center"><a href="#" style="color:black;" target="_blank" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" data-toggle="tooltip" title="Click for Details"><?php if($services["gender"] == NULL || $services["gender"] == ''){ echo '-'; }else{ echo $services["gender"]; } ?></a></td>
                                        <td class="text-center">
                                            <a href="#" style="color:black;" target="_blank" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" data-toggle="tooltip" title="Click for Details">
                                                <?php if($services["photo"] == NULL || $services["photo"] == '') {
                                                 echo '-';
                                                } else{ ?>
                                                <img src="<?php echo $services["photo"]?>" width="80px;" height="70px" style="overflow-y:hidden" class="rounded-circle" alt="Cinque Terre" > 
                                                <?php } ?>
                                            </a>
                                        </td>
                                        <td><a href="#" style="color:black;" target="_blank" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" data-toggle="tooltip" title="Click for Details"><?php echo $description?></a></td>
                                        <td class="text-center"><a href="#" style="color:black;" target="_blank" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" data-toggle="tooltip" title="Click for Details"><?php if($services["id_number"] == NULL || $services["id_number"] == ''){ echo '-'; }else{ echo "A - ".$services["id_number"]; } ?></a></td>
                                        <!--<td  class="text-center"><a  href="#"  data-toggle="modal" data-target="#email_popup<?php echo $services["id"] ?>"><img src="images/contact.png" alt="Mail" width="23px"></a>
                                        
                                        </td>-->
                                        <td class="text-center"><i class="fa fa-eye" data-toggle="modal" data-target="#view_details_popup<?php echo $services["id"] ?>" style="cursor: pointer" data-toggle="tooltip" title="Click for Details"> </i></td>
                                        <!-- Modal -->
                                        <!--===================================View Details Pop Up=============================================-->
                                        <div class="modal fade" id="view_details_popup<?php echo $services["id"] ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLongTitle">Details</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                                <div class="modal-body">
                                                    <div class="row text-left">
                                                      <div class="col-sm-3">
                                                          <?php
                                                          if($services["photo"] == NULL || $services["photo"] == ''){ ?>
                                                              <img src="images/photo_label.png" style=" all: unset;height:180px;width:130px;" class="img-responsive" alt="Img">  
                                                          <?php }else{ ?>
                                                            <img src="<?php echo $services["photo"]?>" style=" all: unset;height:180px;width:130px;" class="img-responsive" alt="Img">   
                                                          <?php } ?>
                                                        
                                                      </div>
                                                      <div class="col-sm-9">
                                                          <div class="row">
                                                              <div class="col-sm-12">
                                                                  <b>Category:</b>&nbsp;&nbsp;<?php echo $services["category"]?><br>
                                                                  <b>Name:</b>&nbsp;&nbsp;<?php echo $services["name"]?><br>
                                                                  <b>Gender:</b>&nbsp;&nbsp;<?php if($services["gender"] == NULL || $services["gender"] == ''){ echo '-'; }else{ echo $services["gender"]; } ?><br>
                                                                  <b>ID Proof:</b>&nbsp;&nbsp;<?php if($services["id_number"] == NULL || $services["id_number"] == ''){ echo '-'; }else{ echo "A - ".$services["id_number"]; } ?><br>
                                                                  <b>Summary:</b>
                                                                  <p style="text-align:justify;"><?php if($services["summary"] == NULL || $services["summary"] == ''){ echo '-'; }else{ echo $services["summary"]; } ?></p><br>
                                                              </div>
                                                              
                                                          </div>
                                                          </div>
                                                          
                                                              <div class="col-sm-12">
                                                                  <hr>
                                                                  <b>Feedbacks:</b><br><br>
                                                                  <?php 
                                                                  $ModelCall->where("dom_id", $services["id"]);
                                                                  $getDomesticServiceDetails = $ModelCall->get("domestic_services_mini_listing_feedbacks");
                                                                  $c = 0;
                                                                  $Rating = 0;
                                                                  foreach($getDomesticServiceDetails as $servicesDetails){ 
                                                                      $Rating += $servicesDetails["rating"];
                                                                        $c++;  
                                                                    ?>
                                                                    <p>
                                                                        <?php 
                                                                        $ModelCall->where("user_id", $servicesDetails["dom_id"]);

                                                                        $rec = $ModelCall->get("Wo_Users");
                                                                        
                                                                        
                                                                        $ModelCall->where("id", $rec[0]['block_id']);
                                                                        $ModelCall->orderBy("block_name","asc");
                                                                        $GetBlockList1 = $ModelCall->get("tbl_block_entry");
                                                                        
                                                                        $House_No= $GetBlockList1[0]['block_code']."-****";
                                                                        
                                                                      ?>
                                                                        
                                                                        
                                                                    </p>
                                                                    <p><?php echo $c.".   ".$House_No." - ".$servicesDetails["feedback"] ?> </p>
                                                                    <p class="text-right" ><a  href="#"   data-toggle="modal" data-target="#comment_popup<?php echo $servicesDetails["dom_id"] ?>"><img src="images/contact.png" alt="Mail" width="20px">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                                    <p>
                                                                        <!--===============comment modal==============-->
                                                                        <div class="modal fade" id="comment_popup<?php echo $servicesDetails["dom_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                          <div class="modal-dialog modal-dialog-centered" role="document" style="width:95%">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Write your Comments & Send Email</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                  <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                              </div>
                                                                              <form method="post">
                                                                                <div class="modal-body">
                                                                                  <input type="hidden" value="<?php echo $servicesDetails["dom_id"] ?>" name="to_userid" id="to_userid">
                                                                                  <div class="form-group">
                                                                                    <textarea name="comment" id="comment" maxlength="160" rows="4" class="form-control" placeholder="Type your comment here..." required></textarea>
                                                                                </div>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <center>
                                                                                    <!--<button type="button" style="background: danger;" class="btn custom_btn" data-dismiss="modal" aria-label="Close">
                                                                                      Close
                                                                                    </button>-->
                                                                                    <button type="submit" name="commentmail" id="commentmail" class="btn custom_btn" style="background: #37a000;" >Send</button></center>
                                                                              </div>
                                                                              </form>
                                                                              
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                        <!--==============================================-->
                                                                    <hr>
                                                                   <?php 
                                                                  }
                                                                  ?>
                                                                  <hr>
                                                                  <b>Rating: <?php echo ceil($Rating/$c) ?></b>
                                                              </div>
                                                              
                                                          </div>
                                                      </div>
                                                    </div> 
                                                </div>
                                                 
                                            </div>
                                          </div>
                                        </div>
                                        <!--===================================================================================================-->
                                        
                                        
                                        
                                        
                                        <!--=================================================Send Email===========================================================-->
<div class="modal fade" id="email_popup"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Give Feedback</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post" autocomplete="off">
    <?php   
    if($_SESSION['UR_LOGINID'] == ''){ ?> 
         <div class="modal-body">
             <input type="hidden" name="row_id" id="row_id<?php echo $services["id"]?>" value="<?php echo $services["id"]?>" class="form-control"  required>
             <input type="hidden" name="row_name" id="row_name<?php echo $services["id"]?>" value="<?php echo $services["name"]?>" class="form-control"  required>
             <input type="hidden" name="row_gender" id="row_gender<?php echo $services["id"]?>" value="<?php echo $services["gender"]?>" class="form-control"  required>
            
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your email..." required>
            </div>
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Please enter name..." required>
            </div>
            <div class="form-group">
                <input type="tel" pattern="[0-9]{10,10}" minlength="10" maxlength="10" name="mob" id="mob" class="form-control" placeholder="Mobile" required>
            </div>
            <div class="form-group">
                <input type="text" name="block" id="block" class="form-control" placeholder="House No" required>
            </div>
            <div class="form-group">
                <textarea name="msg" id="msg" maxlength="160" rows="3" class="form-control" placeholder="Type Feedback here..." required></textarea>
            </div>
            
            <!--<div class="form-group">-->
    
            <!--    <input type="checkbox" value="1" class="star" name="1-star" id="1-star<?php echo $services["id"]?>" checked onmouseover="if (!this.checked) { this.checked = true; } ">&nbsp;&nbsp;-->
            <!--    <input type="checkbox" value="2" class="star" name="2-star" id="2-star<?php echo $services["id"]?>" checked onmouseover="if (!this.checked) { this.checked = true; } " >&nbsp;&nbsp;-->
            <!--    <input type="checkbox" value="3" class="star" name="3-star" id="3-star<?php echo $services["id"]?>" onmouseover="if (!this.checked) { this.checked = true; } ">&nbsp;&nbsp;-->
            <!--    <input type="checkbox" value="4" class="star" name="4-star" id="4-star<?php echo $services["id"]?>" onmouseover="if (!this.checked) { this.checked = true; } ">&nbsp;&nbsp;-->
            <!--    <input type="checkbox" value="5" class="star" name="5-star" id="5-star<?php echo $services["id"]?>" onmouseover="if (!this.checked) { this.checked = true; } ">&nbsp;&nbsp;-->
            <!--</div>-->
           
      </div>
         
         <?php
    }else{ 
 
    ?>
        <div class="modal-body">
            
            
            <!--<input type="hidden" name="row_id" id="row_id" value="<?php echo $services["id"]?>" class="form-control"  required>
            <input type="hidden" name="row_name" id="row_name" value="<?php echo $services["name"]?>" class="form-control"  required>
            <input type="hidden" name="row_gender" id="row_gender" value="<?php echo $services["gender"]?>" class="form-control"  required>-->
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['UR_LOGINID'];?>" class="form-control"  required>
            
            <div class="form-group">
                <input type="text" name="row_name" id="row_name" class="form-control" placeholder="Service Provider Name" list="s_name"  required >
                <datalist id="s_name">
                    <?php
                    $getexistDomesticService = $ModelCall->rawQuery("SELECT DISTINCT(name) as name FROM domestic_services_mini_listing WHERE status = 1");
                    foreach($getexistDomesticService as $existDomesticService){ ?>
                        <option><?php echo  $existDomesticService['name']?></option>
                    <?php } ?>
                </datalist>
            </div>
            
            <div class="form-group">
                <input type="text" name="row_category" id="row_category" class="form-control" placeholder="Category" list="s_category"  required >
                <datalist id="s_category">
                    <?php 
                    $getexistDomesticService1 = $ModelCall->rawQuery("SELECT DISTINCT(category) as category FROM domestic_services_mini_listing WHERE status = 1");
                    foreach($getexistDomesticService1 as $existDomesticService1){ ?>
                        <option><?php echo  $existDomesticService1['category']?></option>
                    <?php } ?>
                </datalist>
            </div>
             
            <div class="form-group">
                <input type="hidden" name="email" id="email<?php echo $services["id"]?>" class="form-control"  value="<?php echo $rec[0]['user_email'];?>" readonly>
            </div>
            <div class="form-group">
                <input type="hidden" name="name" id="name<?php echo $services["id"]?>" class="form-control" value="<?php echo $rec[0]['first_name']. " ".$rec[0]['last_name'] ;?>" readonly>
            </div>
            <div class="form-group">
                <input type="hidden" pattern="[0-9]{10,10}" minlength="10" maxlength="10" value="<?php echo $rec[0]['phone_number']?>" name="mob" id="mob<?php echo $services["id"]?>" class="form-control" placeholder="Mobile" readonly>
            </div>
            <div class="form-group">
                <input type="hidden" name="block" id="block<?php echo $services["id"]?>" class="form-control"  value="<?php echo $GetBlockList[0]['block_code'].'-'.$House_No;?>" placeholder="House No" readonly>
            </div>
            <div class="form-group">
                <textarea name="msg" maxlength="160" id="msg<?php echo $services["id"]?>" rows="4" class="form-control" placeholder="Type your comment here..." required></textarea>
            </div>
            
            
            <div class="form-group text-left">
                <lable>Rating:      </lable>
            <input type="radio" value="1" class="star" name="star" id="1-star<?php echo $services["id"]?>" checked> 1&nbsp;&nbsp;
            <input type="radio" value="2" class="star" name="star" id="2-star<?php echo $services["id"]?>"   >   2&nbsp;&nbsp;
            <input type="radio" value="3" class="star" name="star" id="3-star<?php echo $services["id"]?>" > 3&nbsp;&nbsp;
            <input type="radio" value="4" class="star" name="star" id="4-star<?php echo $services["id"]?>" > 4&nbsp;&nbsp;
            <input type="radio" value="5" class="star" name="star" id="5-star<?php echo $services["id"]?>" > 5&nbsp;&nbsp;
            </div>
      </div> 
    
    <?php
    }
    ?>
        
      <div class="modal-footer">
        <?php
        if($_SESSION['UR_LOGINID'] == ''){ ?>
            <center><button type="submit" name="sendemail" id="sendemail<?php echo $services["id"]?>" class="btn custom_btn" style="background: #37a000;" disabled>Send</button>
            <p>Please <a href="login_signup.php?actionResult=logindocrequired&back_tracker=<?php echo $Backtracker ?>">Login</a> to give Feedback.</p></center>
        <?php }else{ ?>
        <center><button type="submit" name="sendemail" id="sendemail<?php echo $services["id"]?>" class="btn custom_btn" style="background: #37a000;" >Send</button></center>
        <?php } ?>
      </div>
      </form>
    </div>
  </div>
</div>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        </center>
                    </div>
                </div>
    <!--===========================================================================================-->
    
<br>
</div>
<?php include(ROOTACCESS."Advertisments.php");?>
<br>
<!-- Footer starts-->
<?php include(ROOTACCESS."HomefooterCall.php");?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
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
  
  $(document).ready(function() {
    
    var table = $('#dataTable').DataTable( {
        sDom: 'lrtip',
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        "targets": 'no-sort',
//"bSort": false,
"order": [],
"bPaginate": false,
 "bLengthChange": false,
  "bFilter": true,
    "bInfo": false,
    } );
} );
//     const $doc = $(document);
// let $dataTable = $("#dataTable");
// let $dropdownInput = $("select.form-control");
// let $state = $("#state");
// let $category = $("#category");
// let $clear = $("#clear");
// let $keyup = $.Event("keyup", { keyCode: 13 });

// //Ready function
// $doc.ready(function() {
//   // Start DataTable
//   $dataTable.DataTable({
//     mark: true, // Highlight search terms
//     search: {
//       caseInsensitive: true
//     },
//     aLengthMenu: [
//       // Show entries incrementally
//       [10, 20, 50, -1],
//       [10, 20, 50, "All"]
//     ],
//     order: [[1, "asc"]] // Set State column sorting by default
//   });

  

  
  
//   // Remove BS small modifier
//   $('select[name="dataTable_length"]').removeClass('input-sm');
//   $('#dataTable_filter input').removeClass('input-sm');

//   /*
//   * ADD INDIVIDUAL COLUMN SEARCH
//   */
  
//   // Add a hidden text input to each footer cell
//   $("#dataTable tfoot th").each(function() {
//     var $title = $(this).text().trim();
//     $(this).html('<div class="form-group"><label>Search ' + $title + ':<br/><input class="form-control" id="search' + $title + '" type="hidden"/></label></div>');
//   });
//   // Apply the search functionality to hidden inputs
//   $dataTable
//     .DataTable()
//     .columns()
//     .every(function() {
//       var $that = this;
//       $("input", this.footer()).on("keyup change", function() {
//         if ($that.search() !== this.value) {
//           $that.search(this.value, false, true, false).draw(); // strict search
//         }
//       });
//     });
// });

  </script>
   <script>
                 /*$(document).ready(function(){
                   $('[data-toggle="tooltip"]').tooltip();   
                 });*/
                </script>
                
               
                
                
</body>
</html>
