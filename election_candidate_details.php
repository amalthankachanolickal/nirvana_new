<?php include('model/class.expert.php');
$id= $_GET["id"];
$ModelCall->where("show_status",1);
if($id)
$ModelCall->where("id",$id);
else 
$ModelCall->where("id",1);
$info = $ModelCall->getOne("tbl_election_candidates");
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
</head>
<body>
<!-- Navigation area starts -->
<?php include(ROOTACCESS."front_header.php");?>
<!-- Navigation area ends -->
<div class="clearfix"></div>

<section id="about"> 
<!--class="about-area section-big"-->
  <div class="container">
    <div class="row">
      <!-- About Text -->
      <div class="col-md-12">
        <div class="about-text">
          <div class="section-title text-center">
            <h3 style="text-decoration: underline;" class="">Candidate's Details Page<br>
</h3>
          </div>
         
        </div>
      </div>
    </div>
  </div>

<div>
 </section>   
   <div class="row">
        <div class="col-sm-12" style="text-align: justify;">
              <h2 style="text-decoration: underline; text-align:center" class="">Candidate's Details Page<br>
</h2>
           <div class="item" tyle="padding-left: 20px;">
                              <div class="aminities-block" style="border:1px solid black;">
                                <div class="card bg-light mb-3">
                                 <div class="card-header" align="center"> 
                                             <?php  if($info['candidate_photo'] <> NULL || $info['candidate_photo'] <> ''){?>
                                        <img src="images/<?php echo $info["candidate_photo"]?>" style="height:100px;padding-left:20px;padding-top:10px;border: 2px solid #d2cbcb;padding: 1px;border-radius: 20px;" class="img-responsive" alt="Img">
                                           <?php } else {?>
                                              <img src="images/default.jpg" style="height:100px;padding-left:20px;padding-top:10px;border: 2px solid #d2cbcb;padding: 1px;border-radius: 20px;" class="img-responsive" alt="Img">
                                              <?php }?>  <b>Name:</b>&nbsp;&nbsp;<?php echo $info['candidate_name']?></b>
          <!--                                    <br>  <?php  if($info['social_media'] <> NULL || $info['social_media'] <> ''){?>-->
          <!--<a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" alt="facebook" width="25px"></a>-->
          <!-- &nbsp;-->
          <!--<a href="https://www.linkedin.com/" target="_blank"><img src="images/linkedin.png" alt="linkedin" width="25px"></a><?php }?>-->
          
          <!--</a> &nbsp;<a href="mailto:nishthagupta@gmail.com"><img src="images/contact.png" alt="Mail" width="23px"></a>-->
          </div> 
                                  <div class="card-body">
                                        <div class="row text-left">
                                       <div class="row">
                                        <div class="col-sm-12">
                                         <div class="col-sm-4">

                                               <b  width="100px">Post Applied:</b>&nbsp;&nbsp;<?php if($info['post_apply'] <> NULL || $info['post_apply'] <> ''){ echo $info['post_apply']; } else echo "-";?><br>
                                                 
                                                  <b width="100px">Address:</b>&nbsp;&nbsp;<?php echo $info["address"]?><br>
                                                  <b width="100px">Living Since:</b>&nbsp;&nbsp;<?php  if($info['living_in_nirvana'] <> NULL || $info['living_in_nirvana'] <> ''){  echo $info['living_in_nirvana']; } else echo "-";?><br>
                                                  <b width="100px">My family:</b>
                                            <br>
                                            <?php if($info['My_family'] <> NULL || $info['My_family'] <> '')  echo $info["My_family"]; else echo "-";?>
                                           
                                        </div>
                                         <div class="col-sm-4">
                                       
                                         
                                              <b>What I do:</b>
                                                  <br>
                                                  <?php  if($info['what_id_do'] <> NULL || $info['what_id_do'] <> ''){ 
                                                   echo $info["what_id_do"];}
                                                   else {
                                                   echo "-";
                                                   } ?><br>
                                                  </div>
                                         <div class="col-sm-4"  style="text-align: justify;">     <b>Past Participation :</b>
                                                  <br>
                                                  <?php if($info['Past_participation'] <> NULL || $info['Past_participation'] <> '')  echo $info["Past_participation"]; else echo "-";?>
                                              </div>
                                        </div></div>
                                          <div class="row">
                                        <div class="col-sm-12">
                                               
                                               <div class="col-sm-4"  style="text-align: justify;">
                                              <b>Strengths:</b>
                                                  <br>
                                                  <?php if($info['Strengths'] <> NULL || $info['Strengths'] <> '')  echo $info["Strengths"]; else echo "-";?><br>
                                                  </div>
                                          <div class="col-sm-4"  style="text-align: justify;">
                                            <b>Other Interests:</b>
                                            <br>
                                            <?php echo $info["Other_interests"]?>
                                        </div>
                                        <div class="col-sm-4"  style="text-align: justify;"> <b>Other than homosapiens, what I like
most about our
beautiful planet  :</b><br>
                                                  <?php echo $info["beautiful_planet"]?>
                                              </div>
                                        </div>
                                        </div>
                                                
                                              
        <!--              <div class="col-sm-12"> <br><b> Key Issues identified by you; Your views and proposed resolution of the same      </b>          </div>            <br> -->
        <!--                                         <div class="col-sm-4"> <b>-->
        <!--                                             </b>-->
        <!--                                       <div class="col-sm-12"> <b>MCG Takeover </b>-->
        <!--                                          <br>-->
        <!--                                          <?php echo $info["mcg_takeover"]?>-->
        <!--                                      </div>-->
        <!--                                  </div>-->
        <!--                                    <div class="col-sm-4"> <b>-->
        <!--                                             </b>-->
        <!--                                       <div class="col-sm-12"> <b>Key areas of functioning: </b>-->
        <!--                                          <br>-->
        <!--                                          <?php echo $info["key_functioning"]?>-->
        <!--                                      </div>-->
        <!--                                  </div>-->
        <!--                                    <div class="col-sm-4"> <b>-->
        <!--                                             </b>-->
        <!--                                       <div class="col-sm-12"> <b>Key initiatives </b>-->
        <!--                                          <br>-->
        <!--                                          <?php echo $info["key_initiatives"]?>-->
        <!--                                      </div>-->
        <!--                                  </div>-->
        <!--</div>-->
   

</div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

</script>



</body>
</html>
