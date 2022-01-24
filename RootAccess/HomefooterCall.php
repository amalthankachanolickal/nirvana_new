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


<?php
if(isset($_POST["sendemail"])){
    $From_email = $_POST["from_email"];
    $From_name = $_POST["user_name"];
    $Subject = $_POST["subject"];
    $Message = $_POST["msg"];
    $To_mail = 'office.nrwa@nirvanacountry.co.in';
    
        $to=$To_mail;
        $msg= "Service Mail";
        $subject=$Subject;
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From:'.$From_name.'<'.$From_email.'>'."\r\n";
        $ms.="<html></body><div><div>Hi,</div></br></br>";
        
        $ms.="<div style='padding-top:8px;'>$Message</div>
        <br>
        <p>Thanks and Regards,</p>
        <b>$From_name</b>
        </body></html>";
        mail($to,$subject,$ms,$headers);
     
        ?>
                    <div class="alert alert-success" style="position: absolute;top: 0;z-index:999999">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thank you !</strong> Your Message has been successfully sent.
                    </div>
                    
            <?php  
            header("location:".SITE_URL);
}
?>
<footer class="footer-area seindex.phpll" id="contact-us">
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
            <!--<li style="color:#fff;">Maint # (Click here to call)<a href="tel:<?php echo $getClientInfo[0]['client_mobile'];?>"><i class="fa fa-phone"></i> -->
            <!--<?php // echo $getClientInfo[0]['client_mobile'];?></a></li>-->
             <li style="color:#fff;">Helpdesk Executive -<a href="tel:8448441407"><i class="fa fa-phone"></i> 
           8448441407 (9 AM - 6 PM)</a></li>
           <li style="color:#fff;">Technical Shift Cell -<a href="tel:8448720068"><i class="fa fa-phone"></i> 
           8448720068 (9 AM - 6 PM)</a></li>
          </ul>
        </div>
      </div>
<?php
// $ModelCall->where("client_id", $getClientInfo[0]['id']);
// $ModelCall->where("team_destination", $getClientInfo[0]['id']);
//  || $getTeamInfoVal['team_destination']!=""
// $ModelCall->orderBy("order_position","asc");
$getTeamInfo = $ModelCall->rawQuery("select * from tbl_team where team_destination <> 'Jt. Secretary' and team_destination <> 'Vice President' order by order_position");
 ?>     
      <div class="col-md-3">
        <div class="foter-logo-block-2">
          <h3>Office Bearers (Click to Email)</h3>
          <div class="bearder-names">
<?php foreach($getTeamInfo as $getTeamInfoVal){ 
            ?>         
            <p><a href="#" data-toggle="modal" data-target="#send_email"><strong><?php echo $getTeamInfoVal['team_destination'];?></strong> : <?php echo $getTeamInfoVal['team_name'];?></a></p>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size:30px !important;margin-top:-10px !important">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo" width="98%" height="400px" src="//www.youtube.com/embed/FhQJxpvXE_c" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
<!--=================================================Send Email===========================================================-->
<div class="modal fade" id="send_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post" autocomplete="off">
    <?php   
    if($_SESSION['UR_LOGINID'] == ''){ ?> 
         <div class="modal-body">
            <!--<div class="form-group">
                <label for="to_mail">To:</label>
                <input type="email" name="to_email" id="to_mail" class="form-control" value="office.nrwa@nirvanacoutnry.co.in" readonly>
            </div>-->
            <div class="form-group">
                <label for="from_mail">From:</label>
                <input type="email" name="from_email" id="from_mail" class="form-control" placeholder="Please enter your email..." required>
            </div>
            <div class="form-group">
                <label for="user_name">Name:</label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Please enter name..." required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject..." required>
            </div>
            <div class="form-group">
                <label for="msg">Message:</label>
                <textarea name="msg" id="msg" rows="4" class="form-control" placeholder="Type here..." required></textarea>
            </div>
      </div>
         
         <?php
    }else{ 
    $Session_ID = $_SESSION['UR_LOGINID'];
    $ModelCall->where("user_id",$Session_ID);
    $EmailID = $ModelCall->get("Wo_Users");
 /*   echo $EmailID["user_email"];*/
    foreach($EmailID as $EmailValue)
{
if(is_array($EmailValue)){
    $Email_id = $EmailValue['user_email'];
    $User_name = $EmailValue['user_name'];
    }

}
    ?>
        <div class="modal-body">
<!--            <div class="form-group">
                <label for="to_mail">To:</label>
                <input type="email" name="to_email" id="to_mail" class="form-control" value="office.nrwa@nirvanacoutnry.co.in" readonly>
            </div>-->
            <div class="form-group">
                <label for="from_mail">From:</label>
                <input type="email" name="from_email" id="from_mail" class="form-control"  value="<?php echo $Email_id;?>" readonly>
            </div>
            <div class="form-group">
                <label for="user_name">Name:</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $User_name;?>" readonly>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject..." required>
            </div>
            <div class="form-group">
                <label for="msg">Message:</label>
                <textarea name="msg" id="msg" rows="4" class="form-control" placeholder="Type here..." required></textarea>
            </div>
      </div> 
    
    <?php
    }
    
    ?>
           
     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="sendemail" id="sendemail" class="btn btn-success">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php if($_SESSION['UR_LOGINID']!=''){?>
<script type="text/javascript">function add_chatinline(){var hccid=70940255;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script> 
<?php }?>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    <script>
        // code reference from - https://jsfiddle.net/kyptq1q0/2/
        // stackoverflow answer - https://stackoverflow.com/questions/32606431/multilevel-dropdown-in-bootstrap-3-3-5/32606957
        (function ($) {
            $(document).ready(function () {
                $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).parent().siblings().removeClass('open');
                    $(this).parent().toggleClass('open');
                });
            });
        })(jQuery);
        $(document).on('click',function(){
            $('#navbar1').collapse('hide');
        });
        // $('#navbarToggle').on('click', function() {
        //     $('#navbar1').toggleClass('hide');
        //     console.log('kjsbikfvbefbveo');
        // });
        
          $('.dropdown').hover(function(){ 
      $('.dropdown-toggle', this).trigger('click'); 
     $('ul.dropdown-menu li.dropdown-submenu').removeClass('open');
     }); 
     
     <?php
        
        if($current_page !="Home"){
     ?>
         $(document).ready(function(){
            $('.navbar-fixed-top').addClass('nav-active');
        })
    <?php 
        }
    ?>
    </script>
    
<?php include(ROOTACCESS."tracker.php");?>
<!-- Latest jQuery -->
 <!--<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script> -->
<script type="text/javascript">
  var start = new Date();
  var ad_clicked ='';
  var adsvisible ='';
// A $( document ).ready() block.
$( document ).ready(function() {
  var start = new Date();
  
  $(window).unload(function() {
      var end = new Date();
     // alert(ad_clicked);
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

