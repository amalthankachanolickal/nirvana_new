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
<?php if($_SESSION['UR_LOGINID']!=''){ header("location:".SITE_URL);} else { }?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
<link rel="manifest" href="./manifest.json">
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/service-worker.js');
}
</script>
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

const togglePass = (elem) => {
  let pass = document.getElementById(elem);
  let toggler = document.getElementById(`show-btn`);
    if (pass.type === "password") {
        pass.type = "text";
        toggler.innerHTML = "Hide";
    } else {
        pass.type = "password";
        toggler.innerHTML = "Show";
    }
}
</script>
</head>
<style>
input:required:focus {
 border: 1px solid red;
 outline: none;
}


.password-wrap {
  position: relative;
  padding-right: 50px !important;
}

.show-btn {
  display: inline-block;
  position: absolute;
  right: 0px;
  font-size: 16px;
  padding: 9.5px;
  color: #aaa;
  cursor: pointer;
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
                   <?php if($_REQUEST['actionResult']=="userdsent"){?>
                  <p style="color: #37a000;font-size: 15px;">Reset Username link has been successfully sent your registered email address</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passworemail"){?>
                  <p style="color: #e00909;font-size: 15px;">This email id is not registered with us. Please <a href="<?php echo SITE_URL;?>signup.php" title="" style="text-decoration: underline;" >click here to register</a> or contact Admin@nirvanacountry.co.in to check your details.</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passworblock"){?>
                  <p style="color: #e00909;font-size: 15px;">This house is not registered with us. Please <a href="<?php echo SITE_URL;?>signup.php" title="" style="text-decoration: underline;">click here to register</a> or contact Admin@nirvanacountry.co.in to check your details.</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="loginblockalready"){?>
                  <p style="color: #e00909;font-size: 15px;">This house number is already registered. We currently allow only 1 Owner and 1 Tenant per house. Please contact the Admin for any updation in your Ownership or Tenancy.</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passworderror"){?>
                  <p style="color: #e00909;font-size: 15px;">This Email ID is not registered for the mentioned Block+House No. Please contact Admin@Nirvanacountry.co.in to make changes.</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passworvarifyemail"){?>
                  <p style="color: #e00909;font-size: 15px;">Your email ID is pending verification. Please check your mail to verify your email address. </p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passworvarifyadmin"){?>
                  <p style="color: #e00909;font-size: 15px;">Your Ac is pending Admin Approval. We will email you once the same is approved. </p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="regemailverifyerror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This Account is already verified with us</p>
                  <?php } ?>
                   <?php if($_REQUEST['actionResult']=="nocheckbox"){?>
                  <p style="color: #e00909;font-size: 15px;">Please accept terms and conditions</p>
                  <?php } ?>
                  
                  <?php if($_REQUEST['actionResult']=="logindocrequired"){?>
                  <p style="color: #e00909;font-size: 15px;">Please login before viewing this section </p>
                  <?php } ?>
                  
                  <?php if($_REQUEST['actionResult']=="loginrequiredsubmit"){?>
                  <p style="color: #e00909;font-size: 15px;">You need to login to submit the form </p>
                  <?php } ?>
                  
                  
                  <?php if($_REQUEST['actionResult']=="loginerror"){?>
                  <p style="color: #e00909;font-size: 15px;"> Your account is pending approval from the Admin team. Due to the initial set up, the process may take us a few days.</p>
                  
                  <p style="color: #e00909;font-size: 15px;">We will intimate you of the same by email, once the account is approved, latest within 2 weeks.</p>
                  
                  
                  <?php } ?>
                  
                  <?php if($_REQUEST['actionResult']=="invalidloginerror"){?>
                  <p style="color: #e00909;font-size: 15px;">Invalid User Name and Password. Please note that your User Name maybe different from your email ID.</p><p font-size: 15px;"> Click here to retrieve your  <a href="#" data-toggle="modal" data-target="#forgotusername" title=""  style="text-decoration: underline;">User Name</a> to your email box or click here to   <a href="#" data-toggle="modal" data-target="#forgotPassword" title=""  style="text-decoration: underline;">change your password</a>
or click here to <a href="<?php echo SITE_URL;?>account/create/" title="" style="text-decoration: underline;">register your account</a>.</p>
                                    
                  
                  <?php } ?>
                  
                  
                  
                  
                  
                   <?php if($_REQUEST['actionResult']=="passchangedsuccess"){?>
                  <p style="color: #37a000;font-size: 15px;">Password has been successfully changed</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="passchangederror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This Customer is not already regsitered with us!</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="userchangedsuccess"){?>
                  <p style="color: #37a000;font-size: 15px;">User Name has been successfully changed</p>
                  <?php } ?>
                  <?php if($_REQUEST['actionResult']=="userchangederror"){?>
                  <p style="color: #e00909;font-size: 15px;">Sorry ! This Customer is not already regsitered with us!</p>
                  <?php } ?>
                  
                  <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/SocietyAction.php" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="AccessYaarPerform">
                    <?php if(isset($_REQUEST['back_tracker'])){?>
                    <input type="hidden" name="back_tracker" value="<?php echo $_REQUEST['back_tracker']; ?>">
                    <?php }?>
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
                          <input  type="password" name="user_pass_login" id="user_pass_login" value=""  oninvalid="this.setCustomValidity('Enter Password')"  oninput="this.setCustomValidity('')" required title="Enter Password" placeholder="Enter Password">
                            <div class="show-btn" id="show-btn" onclick="togglePass('user_pass_login')">Show</div>
                          <!--<i class="la la-lock"></i>-->
                        </div>
                      </div>
            <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                          <div class="g-recaptcha" id="rcaptcha" data-sitekey="6LdIf6YUAAAAAMG4oIQvhv9qEvFxdSAZgacQCQhN"></div>
                           <span id="captcha" style="margin-left:100px;color:red" />
                           </div>
                      </div>
                      <div class="col-lg-12 no-pdd">
                          <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="policy_accept" name="policy_accept" value="1" >
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;">Yes, I understand and agree to the Nirvana Country <a  href="<?php echo SITE_URL;?>terms_conditions.php" target="_blank" style="color: #37a000;">Terms of Use</a>.</small> </div>
                            <!--fgt-sec end-->
                          </div>
                        </div>
                        <div class="col-lg-4 no-pdd">
                      </div>
                      <div class="col-lg-4 no-pdd" id="btn1">
                        <button type="submit" class="" value="submit" >Sign in</button>
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
          <li><a href="<?php echo SITE_URL;?>terms_conditions.php" target="_blank">Terms of Use</a></li>
          <!--<li><a href="#" title="">Community Guidelines</a></li>-->
            <li><a href="<?php echo SITE_URL;?>privacy.php" target="_blank">Privacy Policy</a></li>
          <!--<li><a href="#" title="">Career</a></li>-->
          <!--<li><a href="#" title="">Forum</a></li>-->
          <!--<li><a href="#" title="">Language</a></li>-->
           <li><a href="<?php echo SITE_URL;?>cookies-privacy.php" target="_blank">Cookies Policy</a></li>
           <li><a href="<?php echo SITE_URL;?>advertisement.php" target="_blank">Advertise with us</a></li>
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
  <div class="modal-dialog" role="document" style="margin: 130px auto; width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPassword">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 ">
            <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/SocietyAction.php">
              <input type="hidden" name="ActionCall" value="ForgotPasswordResponse">
              <div class="row">
                <div class="col-lg-12 no-pdd">
                  <div class="sn-field">
                    <input type="email" name="user_email" id="user_email" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Please Enter valid email" onBlur="validateEmail(this);" style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                    <i class="la la-envelope" aria-hidden="true"></i></div>
                </div>
                <div class="col-lg-4 no-pdd" id ='onlyaplfortenant5'>
                          <div class="sn-field">
                           <label> Block Name <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="block_id" id="block_id" oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  required style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                              <option value="">Select a Block Name</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("block_name","asc");
$GetBlockList = $ModelCall->get("tbl_block_entry");
if($GetBlockList[0]>0){
foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
?>
<option value="<?php echo strip_tags($GetBlockVal['id']); ?>"><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
            <?php } } } ?>
                            </select>
                            <!--<i class="la la-map-marker"></i>--> </div>
                        </div>
                        <div class="col-lg-4 no-pdd pr-4px" style="" id ='onlyaplfortenant6'>
                          <div class="sn-field">
                           <label>House Number <strong style="color:#FF0000;">*</strong></label>
                           <input type="text" name="house_number_id" id="house_number_id" oninvalid="this.setCustomValidity('Enter House Number')"  oninput="this.setCustomValidity('')" required onKeyPress="return isNumberKey(event);" maxlength="3"  value="" placeholder="Enter House Number" style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                            <!--<select class="select1" id="house_number_id" name="house_number_id" required>`
                              <option value="">Select a House Number</option>
                             
                            </select>-->
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                            <div class="col-lg-4 no-pdd" id ='onlyaplfortenant5'>
                          <div class="sn-field">
                               <label>Floor Number <strong style="color:#FF0000;">*</strong></label>
                          
                           <select class="select1" name ='floor_number' id='floor_number' required style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                            
                              <option value='1'>Ground Floor</option>
                              <option  value='2'>First Floor</option>
                              <option value='3'>Second Floor</option>
                              <option value='4'>Third Floor</option>
                              <option value='5'>Fourth Floor</option>
                            </select>
                            <!--<i class="la la-map-marker"></i>--> </div>
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
<div class="modal fade" id="forgotusername" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPassword">Forgot User Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 ">
            <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/SocietyAction.php">
              <input type="hidden" name="ActionCall" value="ForgotUserNameResponce">
              <div class="row">
                <div class="col-lg-12 no-pdd">
                  <div class="sn-field">
                    <input type="email" name="user_email" id="user_email" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Please Enter valid email" onBlur="validateEmail(this);" style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                    <i class="la la-envelope" aria-hidden="true"></i></div>
                    
                </div>
                <div class="col-lg-4 no-pdd" id ='onlyaplfortenant5'>
                          <div class="sn-field">
                           <label> Block Name <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="block_id" id="block_id" oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  required style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                              <option value="">Select a Block Name</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("block_name","asc");
$GetBlockList = $ModelCall->get("tbl_block_entry");
if($GetBlockList[0]>0){
foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
?>
<option value="<?php echo strip_tags($GetBlockVal['id']); ?>"><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
            <?php } } } ?>
                            </select>
                            <!--<i class="la la-map-marker"></i>--> </div>
                        </div>
                        <div class="col-lg-4 no-pdd pr-4px" style="" id ='onlyaplfortenant6'>
                          <div class="sn-field">
                           <label>House Number <strong style="color:#FF0000;">*</strong></label>
                           <input type="text" name="house_number_id" id="house_number_id" oninvalid="this.setCustomValidity('Enter House Number')"  oninput="this.setCustomValidity('')" required onKeyPress="return isNumberKey(event);" maxlength="3"  value="" placeholder="Enter House Number" style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                            <!--<select class="select1" id="house_number_id" name="house_number_id" required>`
                              <option value="">Select a House Number</option>
                             
                            </select>-->
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                            <div class="col-lg-4 no-pdd" id ='onlyaplfortenant5'>
                          <div class="sn-field">
                               <label>Floor Number <strong style="color:#FF0000;">*</strong></label>
                          
                           <select class="select1" name ='floor_number' id='floor_number' required style="    width: 100%;
    padding: 0 15px 0 40px; color: #8c8b8b !important; font-size: 15px;border: 1px solid #d3d7de;height: 46px;">
                            
                              <option value='1'>Ground Floor</option>
                              <option  value='2'>First Floor</option>
                              <option value='3'>Second Floor</option>
                              <option value='4'>Third Floor</option>
                              <option value='5'>Fourth Floor</option>
                            </select>
                            <!--<i class="la la-map-marker"></i>--> </div>
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
<!--<script type="text/javascript">function add_chatinline(){var hccid=70940255;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script> -->
<script src="./pulak.js">
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
