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
    function confirmPass() {
        var pass = document.getElementById("user_pass").value
        var confPass = document.getElementById("cuser_pass").value
        if(pass != confPass) {
            alert('Wrong confirm password !');
			document.getElementById("cuser_pass").value="";
        }
    }
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
.sign_in_sec form input, .sign_in_sec form select
{
padding: 0 15px 0 10px;
}
.select1 {
	color:#b3a7da !important;
	-webkit-appearance: menulist;
	-moz-appearance: menulist;
}

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
                 <li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li>
                  <li><a href="<?php echo SITE_URL;?>signup.php" style="background-color: #37a000;color: #fff;" title="">Register</a></li>
                </ul>
                
               <div class="sign_in_sec" style="display:block;">
                    <h3>Create Your Account</h3>
                        <?php if($_REQUEST['actionResult']=="regerror"){?><p style="color: #e00909;font-size: 15px;">Sorry ! This user name is already taken, please chose another user name  </p><?php } ?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>CreateaccountAccessCallFuct" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="FirstRegistration">
                      <div class="row">
                      <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                      <label> Title <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required>
                              <option value="">Select </option>
                                <option value="Mr.">Mr. </option>
                                  <option value="Mrs.">Mrs. </option>
                                    <option value="Miss.">Miss. </option>
                            </select>
                           <!-- <i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-4 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label> First Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="first_name" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" required value="" placeholder="First Name">
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                        
                        
                        <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                          <label> Middle Name <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="middle_name" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')"  value="" placeholder="Middle Name">
                           <!-- <i class="la la-user"></i>--> </div>
                        </div>
                        
                        <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                            <label> Last Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="last_name" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" required value="" placeholder="Last Name">
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Block Name <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="block_id" id="block_id" oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  required>
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
                        <div class="col-lg-6 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label>House Number <strong style="color:#FF0000;">*</strong></label>
                           <input type="text" name="house_number_id" id="house_number_id" oninvalid="this.setCustomValidity('Enter House Number')"  oninput="this.setCustomValidity('')" required onKeyPress="return isNumberKey(event);" maxlength="3"  value="" placeholder="Enter House Number">
                            <!--<select class="select1" id="house_number_id" name="house_number_id" required>
                              <option value="">Select a House Number</option>
                             
                            </select>-->
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                           <label>Floor Number <strong style="color:#FF0000;">*</strong></label>
                          
                           <select class="select1" name ='floor_number' id='floor_number' required>
                            
                              <option value='1'>Ground Floor</option>
                              <option  value='2'>First Floor</option>
                              <option value='3'>Second Floor</option>
                              <option value='4'>Third Floor</option>
                              <option value='5'>Fourth Floor</option>
                            </select>
                            <!--<i class="la la-building-o"></i> --></div>
                        </div>
                         <div class="col-lg-8 no-pdd">
                          <div class="sn-field">
                            <label> User Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="user_name" id="user_name"  required value="" minlenth='8' placeholder="User Name">
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Email Address <strong style="color:#FF0000;">*</strong></label>
                            <input type="email" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Email Address">
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Password <strong style="color:#FF0000;">*</strong></label>
                            <input type="password" name="user_pass" id="user_pass"    oninvalid="this.setCustomValidity('Enter Password')"  oninput="this.setCustomValidity('')" title="Only alphanumeric characters and spaces are valid in this field"  required placeholder="Password">
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Confirm Password <strong style="color:#FF0000;">*</strong></label>
                            <input type="password" name="cuser_pass"   id="cuser_pass" oninvalid="this.setCustomValidity('Enter Confirm Password')"  oninput="this.setCustomValidity('')"  title="Only alphanumeric characters and spaces are valid in this field"onBlur="confirmPass()"  required  placeholder="Repeat Password">
                           <!-- <i class="la la-lock"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Member Type <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="user_type" id="user_type" oninvalid="this.setCustomValidity('Select Member Type')"  oninput="this.setCustomValidity('')" required>
                              <option value="">Select Member Type</option>
                              <option value="0" >Landlord</option>
                              <option value="1">Tenant</option>
                            </select>
                            <!--<i class="la la-user"></i> --></div>
                        </div>
                        
                        <div class="col-lg-8 no-pdd" id="onlyaplfortenant">
                          <div class="sn-field">
                            <label> Owner Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="owner_name" id="owner_name"  required value="" minlenth='8' placeholder="Owner Name">
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                       <div class="col-lg-12 no-pdd"id="onlyaplfortenant2">
                          <div class="sn-field">
                           <label>Owner Address <strong style="color:#FF0000;">*</strong></label>
                            <input type="email" name="owner_email" id="owner_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Owner Email Address">
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd"id="onlyaplfortenant3">
                          <div class="sn-field">
                           <label>Owner Mobile Number <strong style="color:#FF0000;">*</strong></label>
                           <div class="input-group-addon">+91
                            <input type="tel" name="owner_mobile" id="owner_mobile"   required placeholder="Owner Mobile  Number" title="+91">
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div></div>
                        </div>
                        
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Resident Type <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" id="user_resident_type" name="user_resident_type" oninvalid="this.setCustomValidity('Select Resident Type')"  oninput="this.setCustomValidity('')" required>
                              <option value="" selected>Select Resident Type</option>
                              <option value="0">Residing in the society</option>
                              <option value="1">Non Resident</option>
                            </select>
                           <!-- <i class="la la-building-o"></i> --></div>
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
                        <div class="col-lg-12 no-pdd">
                          <button type="submit" value="submit">Register</button>
                        </div>
                      </div>
                    </form>
                  </div>
               
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


$("#user_type").change(function() {
  if ($(this).val() == "1") {
    $('#onlyaplfortenant').show();
    $('#owner_name').attr('required', '');
    $('#owner_name').attr('data-error', 'This field is required.');
    $('#onlyaplfortenant2').show();
    $('#owner_email').attr('required', '');
    $('#owner_email').attr('data-error', 'This field is required.');
    $('#onlyaplfortenant3').show();
    $('#owner_mobile').attr('required', '');
    $('#owner_mobile').attr('data-error', 'This field is required.');
  } else {
    $('#onlyaplfortenant').hide();
    $('#owner_name').removeAttr('required');
    $('#owner_name').removeAttr('data-error');
    $('#onlyaplfortenant2').hide();
    $('#owner_email').removeAttr('required');
    $('#owner_email').removeAttr('data-error');
    $('#onlyaplfortenant3').hide();
    $('#owner_mobile').removeAttr('required');
    $('#owner_mobile').removeAttr('data-error');
  }
});
$("#user_type").trigger("change");



</script>