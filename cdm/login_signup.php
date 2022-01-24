<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");

?>
<?php if($_SESSION['UR_LOGINID']!=''){ header("location:".SITE_URL."feed/");} else { }?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nirvana Country</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/responsive.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
<script>
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
			emailField.value ='';
            return false;
        }

        return true;

}

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
 (adsbygoogle = window.adsbygoogle || []).push({
   google_ad_client: "ca-pub-6246358526663438",
   enable_page_level_ads: true
 });
</script>
<script type="text/javascript">
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
{
return false;
}
return true;
}
function alpha(e) {
var k;
document.all ? k = e.keyCode : k = e.which;
return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
}
</script>
<script type="text/javascript">
function validateform()
{
var captcha_response = grecaptcha.getResponse();
if(captcha_response.length == 0)
{
 alert('Please select captcha');
return false;
}
else
{
return true;
}
}
</script>
</head>
<style>
input:required:focus {
 border: 1px solid red;
 outline: none;
}
</style>
<body class="sign-in">
<div class="wrapper">
  <div class="sign-in-page">
    <div class="signin-popup">
      <div class="signin-pop ">
        <div class="border-left">
          <div class="row" style="margin: 0;">
            <div class="col-lg-6">
              <div class="cmp-info text-center">
                <div class="cm-logo col-lg-12"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a></div>
                <!--cm-logo end-->
                <div class="clearfix"></div>
                <div class="sign-info-content col-lg-12">
                  <h3 class="sign-h3">Welcome to Nirvana Country</h3>
                  <p class="sign-p"><?php echo $getDiscussionInfo[0]['content_data']; ?></p>
                </div>
                <div class="col-lg-12"> <img src="<?php echo SITE_URL;?>nirwana-img/login_bg.png" alt="" class="sign-bottom-img"> </div>
              </div>
              <!--cmp-info end-->
            </div>
            <div class="col-lg-6">
              <div class="login-sec">
                <?php if($_REQUEST['actionResult']=="regsuccess"){?>
                <h3>Thank you! And confirm your email</h3>
                <div class="col-lg-12"> <img src="<?php echo SITE_URL;?>nirwana-img/email_confirmation.png" alt="" class="sign-bottom-img" style="margin-bottom: 30px;"> </div>
                <p>Please check your email inbox/spam to verify your email address</p>
                <p>We need to verify the  information with the membership records. Due to initial set up the process may take us a few days. We will intimate you of the once the sign up is approved by the email provided to us, latest within 2 weeks.</p>
                <p><strong>Thank you for your patience. </strong></p>
                <p><a href="<?php echo SITE_URL;?>" class="log" id="navbar-sign-in" style="border-radius: 3px;background: #37a000;
    padding: 9px 15px;color: #ffffff;margin-top: 6px;">Back to Home</a></p>
                <?php }  else {?>
                <ul class="sign-control">
                  <li><a href="<?php echo SITE_URL;?>login_signup.php" title="" style="background-color: #37a000;color: #fff;">Sign in</a></li>
                  <li><a href="<?php echo SITE_URL;?>signup.php" title="">Register</a></li>
                </ul>
                <div class="sign_in_sec" style="display:block;">
                  <h3>Login Your Account</h3>
                  <?php if($_REQUEST['actionResult']=="regerror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This user name is already taken, please chose another user name  !</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="regemailverifysuccess"){?>
                  <p style="color: #37a000;font-size: 15px;">Your Email has been successfully verified</p>
                  <?php } ?>
                   <?php if($_REQUEST['actionResult']=="adminapprovesuccess"){?>
                  <p style="color: #37a000;font-size: 15px;">Approved Successfully</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passwordsent"){?>
                  <p style="color: #37a000;font-size: 15px;">Reset password link has been successfully sent your registered email address</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passworderror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This Email is not already regsitered with us, please provide another email!</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="regemailverifyerror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This Account is already verified with us</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="loginerror"){?>
                  <p style="color: #e00909;font-size: 15px;"> Your account is pending approval from the Admin team. Due to the initial set up, the process may take us a few days.</p>
                  
                  <p style="color: #e00909;font-size: 15px;">We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                  
                  
                  <?php } ?>
                  
                  <?php if($_REQUEST['actionResult']=="invalidloginerror"){?>
                  <p style="color: #e00909;font-size: 15px;">Invalid User Name and Password. Please note that your User Name maybe different from your email ID.</p><p font-size: 15px;"> Click here to retrieve your  <a href="<?php echo SITE_URL;?>account/create/" title="" style="text-decoration: underline;">User Name</a>to your email box or click here to   <a href="#" data-toggle="modal" data-target="#forgotPassword" title=""  style="text-decoration: underline;">change your password</a>
or click here to <a href="<?php echo SITE_URL;?>account/create/" title="" style="text-decoration: underline;">register your account</a>.</p>
                                    
                  
                  <?php } ?>
                  
                  
                  
                  
                  
                   <?php if($_REQUEST['actionResult']=="passchangedsuccess"){?>
                  <p style="color: #37a000;font-size: 15px;">Password has been successfully changed</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passchangederror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This Customer is not already regsitered with us!</p>
                  <?php } ?>
                  
                  <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/SocietyAction.php" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="AccessYaarPerform">
                    <div class="row">
                      <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                          <label>User Name <strong style="color:#FF0000;">*</strong></label>
                          <input type="text" name="user_email" id="user_email" value="" required  title="Enter Email Address" placeholder="Enter User Name ">
                          <!-- <i class="la la-user"></i>-->
                        </div>
                        <!--sn-field end-->
                      </div>
                      <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                          <label>Password <strong style="color:#FF0000;">*</strong></label>
                          <input type="password" name="user_pass_login" id="user_pass_login" value=""  oninvalid="this.setCustomValidity('Enter Password')"  oninput="this.setCustomValidity('')" required title="Enter Password" placeholder="Enter Password">
                          <!--<i class="la la-lock"></i>-->
                        </div>
                      </div>
               <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                         
                         
                         </div>
                      </div>
                      <div class="col-lg-12 no-pdd">
                          <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="policy_accept" name="policy_accept" value="1" required>
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;">Yes, I understand and agree to the Nirvana Country <a  href="<?php echo SITE_URL;?>cms/terms-of-service/" target="_blank" style="color: #37a000;">Terms of Use</a>.</small> </div>
                            <!--fgt-sec end-->
                          </div>
                        </div>
                        <div class="col-lg-4 no-pdd">
                      </div>
                      <div class="col-lg-4 no-pdd">
                        <button type="submit" class="" value="submit">Sign in</button>
                      </div>
                      <div class="col-lg-4 no-pdd">
                      </div>
                      <div class="col-lg-4 no-pdd">
                      </div>
                       <div class="col-lg-4 no-pdd">
                       
                          <a href="#" data-toggle="modal" data-target="#forgotPassword" title="" style="color:Blue";>Forgot Password?</a> </div>
                      </div>
                      <div class="col-lg-4 no-pdd">
                      </div>
                    </div>
                  </form>
                  <!--login-resources end-->
                </div>
                <!--sign_in_sec end-->
                <?php } ?>
              </div>
              <!--login-sec end-->
            </div>
          </div>
        </div>
      </div>
      <!--signin-pop end-->
    </div>
    <!--signin-popup end-->
    <div class="footy-sec">
      <div class="container">
        <ul style="margin-top:0;">
          <!--  <li><a href="" title="" data-toggle="modal" data-target="#exampleModal">Help Center</a></li>-->
          <li><a  href="<?php echo SITE_URL;?>cms/terms-of-service/" title="">Terms of Use</a></li>
          <!--<li><a href="#" title="">Community Guidelines</a></li>-->
          <li><a href="<?php echo SITE_URL;?>cms/privacy-policy/" title="">Privacy Policy</a></li>
          <!--<li><a href="#" title="">Career</a></li>-->
          <!--<li><a href="#" title="">Forum</a></li>-->
          <!--<li><a href="#" title="">Language</a></li>-->
          <li><a href="<?php echo SITE_URL;?>cms/cookies-policy/" title="">Cookies Policy</a></li>
          <li><a href="<?php echo SITE_URL;?>advertisement.php">Advertise with us</a></li>
        </ul>
        <p>Copyright &copy; 2019<a href="http://innovatuslimited.com/" target="_blank" style="color:#37a000;"> Innovatus Technologies Pvt. Ltd.</a> All rights reserved.</p>
      </div>
    </div>
    <!--footy-sec end-->
  </div>
  <!--sign-in-page end-->
</div>
<!--theme-layout end-->
<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="<?php echo SITE_URL;?>js/forscript.js"></script>-->
</body>
</html>
<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPassword">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 ">
            <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>CreateaccountAccessCallFuct">
              <input type="hidden" name="ActionCall" value="ForgotPasswordResponse">
              <div class="row">
                <div class="col-lg-12 no-pdd">
                  <div class="sn-field">
                    <input type="email" name="user_email" id="user_email" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Please Enter valid email" onBlur="validateEmail(this);" style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                    <i class="la la-envelope" aria-hidden="true"></i></div>
                </div>
                <div class="col-lg-12 no-pdd" style="text-align:center;">
                  <button type="submit" value="submit" style="color: #ffffff; font-size: 16px; background-color: #37a000;
    padding: 8px 27px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>
<div class="modal fade" id="advertise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advertise with us </h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center"><?php echo $getCMSAdvertiseInfo[0]['content_data'];?></p>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Help Center</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center" style="font-size:17px;">Email to<span style="color:#000099;">Corporate@innovatuslimited.com</span></p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">function add_chatinline(){var hccid=70940255;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
<script type="text/javascript">
function getBlockHouseNo(str)
{
   if(str=="")
      alert("Please select any block");
	else
     var ajx;  // The variable that makes Ajax possible!
	
	if(window.XMLHttpRequest)
	ajx=new XMLHttpRequest();
	ajx.onreadystatechange = function()
	{

		if(ajx.readyState == 4)
		{
		//alert(ajx.responseText);	
                document.getElementById("house_number_id").innerHTML= ajx.responseText;
		}
	}
	ajx.open("GET", "<?php echo SITE_URL;?>ajax-lib/getBlockHouseNumber.php?block_id="+str);
	ajx.send(); 

}

</script>
