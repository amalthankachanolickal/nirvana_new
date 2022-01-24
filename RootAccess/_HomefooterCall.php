<?php
$ModelCall->where("page_name","contribute");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSContributeInfo = $ModelCall->get("tbl_cms_management");


$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");
?>
<footer class="footer-area section-small" id="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="foter-logo-block"> <img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" style="background: #fff;padding: 4px;
    border-radius: 2px;width: 25%;">
          <h3><?php echo $getClientInfo[0]['client_company_name'];
		 
		  
		  ?></h3>
          <ul class="footer-ul-upper">
            <li><a href="https://www.google.com/maps/dir//<?php echo  str_replace(' ', '+', $getClientInfo[0]['client_address']); ?>/@28.4175004,77.0625661,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x390d227a6f58c4e7:0x9c607994294c1139!2m2!1d77.0658004!2d28.4173826"  data-toggle="tooltip" title="Click here to find directions to Nirvana." target="_blank"><i class="fa fa-map-marker"></i><?php echo $getClientInfo[0]['client_address'];?></a></li>
            <!-- <li><a href=""><i class="fa fa-arrows" aria-hidden="true"></i> C378+QG Gurugram, Haryana, India</a></li>-->
            <li style="color:#fff;"><i class="fa fa-clock-o" aria-hidden="true"></i> Office Timings : <?php echo $getClientInfo[0]['client_office_timings'];?></li>
            <li><a href="mailto:<?php echo $getClientInfo[0]['client_support_email'];?>"><i class="fa fa-envelope"></i> <?php echo $getClientInfo[0]['client_support_email'];?></a></li>
            <li style="color:#fff;">Off #(Click here to call)<a href="tel:<?php echo $getClientInfo[0]['client_phone'];?>"><i class="fa fa-phone"></i> <?php echo $getClientInfo[0]['client_phone'];?></a></li>
            <li style="color:#fff;">Maint # (Click here to call)<a href="tel:<?php echo $getClientInfo[0]['client_mobile'];?>"><i class="fa fa-phone"></i> <?php echo $getClientInfo[0]['client_mobile'];?></a></li>
          </ul>
        </div>
      </div>
<?php
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("order_position","asc");
$getTeamInfo = $ModelCall->get("tbl_team");
 ?>     
      <div class="col-md-3">
        <div class="foter-logo-block-2">
          <h3>Office Bearers (Click to Email)</h3>
          <div class="bearder-names">
<?php foreach($getTeamInfo as $getTeamInfoVal){ ?>         
            <p><a href="mailto:<?php echo $getTeamInfoVal['team_email'];?>"><strong><?php echo $getTeamInfoVal['team_destination'];?></strong> : <?php echo $getTeamInfoVal['team_name'];?></a></p>
<?php } ?>   

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <!--<div class="foter-logo-block-2">
   <h3>Get In Touch</h3>
   <div class="footer-social">
                               <a href=""><i class="fa fa-whatsapp"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                 <a href=""><i class="fa fa-twitter"></i></a>
                                 <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-youtube-play"></i></a>
                              
                            
                        </div>
   </div>-->
      </div>
    </div>
  </div>
  <div class="row" style="margin-right:0; margin-left:0;">
    <div class="col-md-12" style="padding:0;">
      <div class="foter-logo-block text-center">
        <hr style="border-top: 2px solid #4b4b4b;">
        <ul class="footer-ul">
          <li><a href="<?php echo SITE_URL;?>"> Home</a></li>
          <li><a href="<?php echo SITE_URL;?>terms_conditions.php" target="_blank">Terms of Use</a></li>
          <li><a href="<?php echo SITE_URL;?>privacy.php" target="_blank">Privacy Policy</a></li>
            <li><a href="<?php echo SITE_URL;?>cookies-privacy.php" target="_blank">Cookies Policy</a></li>
          <li><a href="<?php echo SITE_URL;?>advertisement.php" target="_blank">Advertise with us</a></li>
          <!--<li><a href="">Contribution Guidelines</a></li>
                              <li><a href="">Society Rules</a></li>
                              <li><a href="">Press</a></li>
                              <li><a href="">Advertise</a></li>
                              <li><a href="">Careers</a></li>-->
        </ul>
        <!--<hr style="border-top: 2px solid #4b4b4b;">-->
      </div>
    </div>
  </div>
</footer>
<!-- Footer ends -->
<div class="clearfix"></div>
<!-- copyright area starts -->
<footer class="copyright-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <div class="copyright-text"> 
        <p>Copyright &copy; 2019<a href="http://innovatuslimited.com/" target="_blank" style="color:#37a000;"> Innovatus </a> All rights reserved.</p>
          <!--<p><?php echo $getClientInfo[0]['client_copy_right'];?></p>-->
        </div>
      </div>
      <a class="smooth_scroll" href="#slider" id="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a> </div>
  </div>
</footer>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contribute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
      <div class="modal-body">
        <?php echo $getCMSContributeInfo[0]['content_data'];?>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="advertise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advertise with us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center"><?php echo $getCMSAdvertiseInfo[0]['content_data'];?></p>
      </div>
    </div>
  </div>
</div>
<div id="videoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo" width="560" height="400" src="//www.youtube.com/embed/FhQJxpvXE_c" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

<?php if($_SESSION['UR_LOGINID']!=''){?>
<script type="text/javascript">function add_chatinline(){var hccid=70940255;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script> 
<?php }?>
<?php include(ROOTACCESS."tracker.php");?>
<!-- Latest jQuery -->
<!-- <script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script> -->
<script type="text/javascript">
  var start = new Date();
  var ad_clicked ='';
  var adsvisible ='';
// A $( document ).ready() block.
$( document ).ready(function() {
  var start = new Date();
  
  $(window).unload(function() {
      var end = new Date();
      alert(ad_clicked);
      $.ajax({ 
        type: "POST",
        url: "services/track_time_spent.php",
        data: {'timeSpent': end - start,
          'userid' : '<?php echo $_SESSION['UR_LOGINID'];?>',
          'page_url' : '<?php echo $this_page;?>',
          'ip' : '<?php echo $ip;?>',
          'ads_seen': adsvisible,
          'clicked_ad':ad_clicked, 
          },
        
        async: false,
        success: function(data, textStatus, jqXHR)
          {
            console.log(data);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            console.log(errorThrown);
          }
      })
   });
}); 

</script>