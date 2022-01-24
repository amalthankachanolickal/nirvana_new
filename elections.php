<?php include('model/class.expert.php');
$_REQUEST['back_tracker']=$_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');
$ModelCall->where("show_status",1);
$getInfo = $ModelCall->get("tbl_election_candidates");
//print_r($getInfo);
?>

<!DOCTYPE html>
<html>
<head>
<!-- meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"       content="width=device-width, initial-scale=1.0">
<meta name="description"    content="">
<meta name="keywords"       content="">
<meta name="author"         content="">
<!-- Site title -->
<title><?php echo $getAboutInfo[0]['meta_title']; ?></title>
<meta name="keywords" content="<?php echo $getAboutInfo[0]['meta_keyword']; ?>"/>
<meta name="description" content="<?php echo $getAboutInfo[0]['meta_description']; ?>"/>

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.png">
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<!-- Bootstrap css -->
<!--<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">-->
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
<style>
table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th.dtr-control:before{
    margin-top:0px !important;
    top:10% !important;
}
    
table.dataTable thead .sorting, table.dataTable thead .sorting_asc,table.dataTable thead .sorting_desc {
    background-image: none;
}

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
</head>
<body>
<!-- Navigation area starts -->
<?php include(ROOTACCESS."front_header.php");?>
<!-- Navigation area ends -->
<div class="clearfix"></div>
<!-- Slider area starts -->
<!-- Slider area ends -->
<!-- Home Banner area starts -->
<!-- Home Banner area end -->
<!-- About area starts -->
<br>
<br>
<br>
<section id="about"> 
<!--class="about-area section-big"-->
  <div class="container ">
   
      <!-- About Text -->
      <div class="col-md-12 margin-top-6">
        <div class="">
          <div class="text-center">
            <h3 style="text-decoration: underline; nowrap" class="">NRWA Elections 2020 : Know Your Candidates</h3>
          </div>
         
        </div>
      </div>
   
  </div>
</section>

<div>
    <span id="spanMessage" style="color:green;margin-left: 40%;" ></span>
    <table style='width:60vw' align ='center' class="table table-striped table-hover display nowrap" id="dataTable">
     
      
      <thead class="bg-primary">
        <tr>
          <th scope="col" style="text-align:center;"  data-priority="1">Name</th>
           <th scope="col" style="text-align:center;" data-priority="3">Address</th>
            <!--<th scope="col" style="text-align:center;"><img src="images/photo-camera (1).png" alt="Image" width="25px"></th>-->
          <th scope="col" style="text-align:center;" >Photo</th>
           <th scope="col" style="text-align:center;" >Post</th>
          <!--<th scope="col" style="text-align:center;">Social</th>-->
           <!--<th scope="col" style="text-align:center;" width="90px"><img src="images/email.png" alt="Mail" width="25px"> / <img src="images/phone-call.png" alt="Call" width="20px"></th>   -->
          <th scope="col" style="text-align:center;">Contact</th>
              <th scope="col" style="text-align:center;">Team</th> 
              <!--<th scope="col" style="text-align:center;"><img src="images/like.png" alt="Mail" width="20px"> / <img src="images/dislike.png" alt="Call" width="20px"></th>   -->
              <!--<th scope="col" style="text-align:center;" data-priority="2">Reviews</th>-->
        </tr>
      </thead>

      <tbody>
 <?php foreach($getInfo as $info){ ?>
        <tr>
         <td >  <a href="election_candidate_details.php?id=<?php echo  $info['id'];?>" target="_blank" style="color: black;"><?php echo $info['candidate_name']?></a></td>
          <td>  <a href="election_candidate_details.php?id=<?php echo  $info['id'];?>" target="_blank" style="color: black;"><?php echo $info['address']?></a></td>
          <td  style="text-align:center;"> <a href="election_candidate_details.php?id=<?php echo  $info['id'];?>" target="_blank" style="color: black;"> 
          <?php  if($info['candidate_photo'] <> NULL || $info['candidate_photo'] <> ''){?>   
          <img src="images/<?php echo $info["candidate_photo"]?>" style="height:25px;" alt="Img"><br>
                                    <?php  } else echo "-";?></a></td>
          <td > <a href="election_candidate_details.php?id=<?php echo  $info['id'];?>" target="_blank" style="color: black;"> <?php if($info['post_apply'] <> NULL || $info['post_apply'] <> ''){ echo $info['post_apply']; } else echo "-";?></a></td> 
          <!--<td  style="text-align:center;" target="_blank" style="color: black;"> <?php  if($info['social_media'] <> NULL || $info['social_media'] <> ''){?>-->
          <!--<a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" alt="facebook" width="25px"></a> &nbsp;-->
          <!--<a href="https://www.linkedin.com/" target="_blank"><img src="images/linkedin.png" alt="linkedin" width="25px"></a><?php } else { ?>-->
          <!--- <?php } ?></td>-->
          <td width="50px" style="text-align:center;">  <?php  if($info['contact_email'] <> NULL || $info['contact_email'] <> ''){?>
          <a href="mailto:<?php  echo $info['contact_email'];?>"><img src="images/contact.png" alt="Mail" width="23px"></a> 
          <?php } else {?>
          - 
          <?php }?>
          <!--<a href="tel:9560889608"><img src="images/phone.png" alt="Call" width="20px"></a>--> </td>
          <!--<td  style="text-align:center;"> <?php  if($info['pitch'] <> NULL || $info['pitch'] <> ''){ echo $info['pitch']; } else echo "-";?></td>-->
          <td  style="text-align:center;"> <?php  if($info['teamif_any'] <> NULL || $info['teamif_any'] <> ''){ echo $info['teamif_any']; } else echo "-";?></td>
          <!--<td  style="text-align:center;"> <?php  if($info['living_in_nirvana'] <> NULL || $info['living_in_nirvana'] <> ''){  echo $info['living_in_nirvana']; } else echo "-";?></td>-->
         <!--<td  style="text-align:center;">-->
         <!--    <a href="javascript:void(0);" onclick="LikeClick('<?php echo $info['id'];?>')" -->
         <!--    data-toggle="tooltip" title="Mark your Support for the candidate. One Vote per Owner. Individual preferences will NOT be visible to anyone including the nominees or the Office. The vote will remain CONFIDENTIAL.">-->
         <!--        <img src="images/like (1).png" alt="Like" width="15px"></a>-->
         <!--        <?php $getlikes = $ModelCall->rawQuery("SELECT count(like_vote) as likes FROM `tbl_candidates_votes` where candidateid=".$info['id']." and like_vote =1"); ?>-->
         <!--        (<span id="spanLikeCount<?php echo $info['id'];?>"><?php  echo $getlikes[0]['likes'];?></span>)-->
         <!--    /   <a href="javascript:void(0);" onclick="disLikeClick('<?php echo $info['id'];?>')" -->
         <!--    data-toggle="tooltip" title="Mark your Support for the candidate. One Vote per Owner. Individual preferences will NOT be visible to anyone including the nominees or the Office. The vote will remain CONFIDENTIAL.">-->
         <!--   <img src="images/dislike (1).png" alt="Dislike" width="15px"></a><?php $getdislikes = $ModelCall->rawQuery("SELECT count(dislike) as dislikes FROM `tbl_candidates_votes` where candidateid=".$info['id']." and dislike =1"); ?>-->
         <!--        (<span id="spanDisLikeCount<?php echo $info['id'];?>"><?php  echo $getdislikes[0]['dislikes'];?></span>)</td>-->
        </tr>
<?php }?>
      </tbody>
    </table>


<br>
</div>
<?php include(ROOTACCESS."Advertisments.php");?>
<br>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

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

function LikeClick(id ){
    console.log(id);
    var candidateid = id;  
    var voterid = '<?php echo $_SESSION['UR_LOGINID'];?>'; 
    console.log("voterid" + voterid);
    var likecount=  $('#spanLikeCount'+id).text();
     var dislikecount=  $('#spanDisLikeCount'+id).text();
     $.ajax({  
                     url:"<?php echo SITE_URL;?>controller/electionController.php",  
                     method:"POST",  
                     data:{'ActionCall':'SaveVote',
                     'candidateid':candidateid,
                     'voterid':voterid,
                     'like_vote':1,
                     'dislike':0
                     },  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          if(data != '' && data=="1")  
                          {    
                                 likecount =parseInt(likecount)+1;
                                 $('#spanLikeCount'+id).text(likecount);
                                $('#spanMessage').text("Thankyou ! Your Vote is Submitted");
                             
                          }  else if(data != '' && data=="-1"){
                               $('#spanMessage').text("You had already voted for this Candidate. NO change");
                          }else if(data != '' && data=="2"){
                               likecount =parseInt(likecount)+1;
                               dislikecount = parseInt(dislikecount)-1;
                                $('#spanLikeCount'+id).text(likecount);
                                   $('#spanDisLikeCount'+id).text(dislikecount);
                               $('#spanMessage').text("You had changed yout vote for this candidate.");
                          }else{
                              console.log("Data Not Updated" + data);
                          }
                        
                     }  
                });  
}

function disLikeClick(id){
    console.log(id);
    var candidateid = id;  
    var voterid = '<?php echo $_SESSION['UR_LOGINID'];?>'; 
    console.log("voterid" + voterid);
     var likecount=  $('#spanLikeCount'+id).text();
     var dislikecount=  $('#spanDisLikeCount'+id).text();
     $.ajax({  
                     url:"<?php echo SITE_URL;?>controller/electionController.php",  
                     method:"POST",  
                     data:{'ActionCall':'SaveVote','candidateid':candidateid, 'voterid':voterid,'like_vote':0 ,'dislike':1
                         
                     },  
                     dataType:"text",  
                     success:function(data)  
                     {  
                       if(data != '' && data=="0")  
                          {    
                                 dislikecount =parseInt(dislikecount)+1;
                              $('#spanDisLikeCount'+id).text(dislikecount);
                                $('#spanMessage').text("Thankyou ! Your Vote is Submitted");
                             
                          }  else if(data != '' && data=="-1"){
                               $('#spanMessage').text("You had already voted for this Candidate. NO change");
                          }else if(data != '' && data=="3"){
                               likecount =parseInt(likecount)-1;
                               dislikecount =parseInt(dislikecount)+1;
                                $('#spanLikeCount'+id).text(likecount);
                                   $('#spanDisLikeCount'+id).text(dislikecount);
                               $('#spanMessage').text("You had changed yout vote for this candidate.");
                          }else{
                              console.log("Data Not Updated" + data);
                          }
                        
                     }  
                });  
}

$(document).ready(function(){
        $('.navbar-fixed-top').addClass('nav-active');
    })


</script>



</body>
</html>
