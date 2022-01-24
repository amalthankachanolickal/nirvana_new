<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");  
include('CheckCustomerLogin.php');
$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");


if(isset($_REQUEST['avatar_upload'])){
if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){
   
    if($_SESSION['UR_LOGINID'])
    {
    
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg",  "png" => "image/png");
$filename = time() . '_' . $_FILES["avatar"]["name"];
$filetype = $_FILES["avatar"]["type"];
$filesize = $_FILES["avatar"]["size"];

// Verify file extension
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

// Verify file size - 5MB maximum
$maxsize = 5 * 1024 * 1024;
if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

// Verify MYME type of the file
if(in_array($filetype, $allowed)){
// Check whether file exists before uploading it
if(file_exists("images/" . $filename)){
echo $filename . " is already exists.";
} else{

    $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
    $ModelCall->orderBy("user_id","asc");
    $rec = $ModelCall->get("Wo_Users"); 
    
    if($ModelCall->count==1)
    { 
        $dataU = array( 
    	'profile_pics' => $filename,
    	);
    	
    $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
    $result =  $ModelCall->update ('Wo_Users', $dataU);
    
    move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/" . $filename); ?>

<div class="alert alert-success" style="z-index: 999999">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong>Successfully Added.
</div>
<?php
    
    header("location:".SITE_URL."");
    }
else { ?>
<div class="alert alert-danger" style="z-index: 999999">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Failure!</strong>Failed to Add.
</div>
<?php
}
}
} else{
echo "Error: There was a problem uploading your file. Please try again.";
}
    }
    else
    {
    header("location:".SITE_URL."");
    }
}	
}

?>

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
        var pass = document.getElementById("new_pass").value
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
       
           
          <div class="row" >
             <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="login-sec">
          
                  <ul class="sign-control">
                        <div class="col-lg-4 no-pdd">
                         <div class="sn-field">
                    <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" alt=""> </a>
                       </div>
                       </div>
                     <!--<li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> -->
                     
                      <li><a href="<?php echo SITE_URL;?>" style="background-color: #37a000;color: #fff;" title="">Back To Home</a></li>
                    </ul>

                
               <div class="sign_in_sec" style="display:block;">
                    <h3>Update Account Details</h3>
                     <?php if($_REQUEST['actionResult']=="regerror"){?><p style="color: #e00909;font-size: 15px;">Sorry ! This user name is already taken, please chose another user name  </p><?php } ?>
                      <?php if($_REQUEST['actionResult']=="passnomtch"){?><p style="color: #e00909;font-size: 15px;">Old password given is wrong. </p><?php } ?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/SocietyAction.php" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="UpdateDetails">
                      <div class="row">
                          <?php
                            $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
                            $ModelCall->orderBy("user_id","asc");
                            $res = $ModelCall->get("Wo_Users"); 
                            
                            foreach($res as $resValue){
                                $Avatar_link = $resValue['profile_pics'];
                                $Mobile = $resValue['phone_number'];
                            }
                          ?>
                          
                          <?php
                          if($Avatar_link == NULL || $Avatar_link == ''){ ?>
                              <div class="col-lg-12 no-pdd">
                                  <div class="sn-field">
                                      <!-- Button trigger modal -->
                                    <center>
                                        <img src="https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png"
                                        style="height:100px;width:100px;" class="rounded-circle" alt="Cinque Terre">
                                        </br>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#avatarModal">
                                        Upload Avathar
                                        </button></center>
                                    </div>
                                </div>
                          <?php } else{ ?>
                               <div class="col-lg-12 no-pdd">
                                  <div class="sn-field">
                                      <!-- Button trigger modal -->
                                    <center>
                                        <img src="images/<?php echo  $Avatar_link ?>" style="height:100px;width:100px;" class="rounded-circle" alt="Cinque Terre">
                                        </br>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#avatarModal">
                                        Change Avathar
                                        </button></center>
                                    </div>
                                </div>
                          <?php }
                          ?>
                          
                        
                        
                      <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                              
                      <label> Title <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required>
                              <option value="">Select </option>
                                <option value="Mr." <?php if($rec[0]['user_title']=='Mr.'){echo "selected";} ?>>Mr. </option>
                                  <option value="Mrs." <?php if($rec[0]['user_title']=='Mrs.'){echo "selected";} ?>  >Mrs. </option>
                                    <option value="Miss." <?php if($rec[0]['user_title']=='Miss.'){echo "selected";} ?>  >Miss. </option>
                            </select>
                           <!-- <i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-3 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label> First Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="first_name" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" required  placeholder="First Name" value="<?php echo $rec[0]['first_name']; ?>">
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                        
                        
                        <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                          <label> Middle Name <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="middle_name" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')"  placeholder="Middle Name" value="<?php echo $rec[0]['middle_name']; ?>">
                           <!-- <i class="la la-user"></i>--> </div>
                        </div>
                        
                        <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                            <label> Last Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="last_name" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" required placeholder="Last Name" value="<?php echo $rec[0]['last_name']; ?>">
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                        <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                           <label> Block Name <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="block_id" id="block_id" oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  required disabled>
                              <option value="">Select a Block Name</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("block_name","asc");
$GetBlockList = $ModelCall->get("tbl_block_entry");
if($GetBlockList[0]>0){
foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
?>
<option value="<?php echo strip_tags($GetBlockVal['id']); ?>" <?php if($rec[0]['block_id']==strip_tags($GetBlockVal['id'])){echo "selected";} ?> ><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
            <?php } } } ?>
                            </select>
                            <!--<i class="la la-map-marker"></i>--> </div>
                        </div>
                        <div class="col-lg-4 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label>House Number <strong style="color:#FF0000;">*</strong></label>
                           <input type="text" name="house_number_id" id="house_number_id" oninvalid="this.setCustomValidity('Enter House Number')"  oninput="this.setCustomValidity('')" required onKeyPress="return isNumberKey(event);" maxlength="3"   placeholder="Enter House Number" value="<?php echo $rec[0]['house_number_id']; ?>" disabled>
                            <!--<select class="select1" id="house_number_id" name="house_number_id" required>
                              <option value="">Select a House Number</option>
                             
                            </select>-->
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                        <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                           <label>Floor Number <strong style="color:#FF0000;"></strong></label>
                          <input type="text" name="floor_number" id="floor_number"   placeholder="Enter Floor Number" value="<?php echo $rec[0]['floor_number']; ?>" disabled>
                           <!-- <select class="select1">
                              <option>Select a Floor Number</option>
                              <option>First Floor</option>
                              <option>Second Floor</option>
                              <option>Third Floor</option>
                              <option>Fourth Floor</option>
                            </select>-->
                            <!--<i class="la la-building-o"></i> --></div>
                        </div>
                         <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                            <label> User Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="user_name" id="user_name"  required  minlenth='8' placeholder="User Name" value="<?php echo $rec[0]['user_name']; ?>">
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                               <label>Mobile Number <strong style="color:#FF0000;">*</strong></label>
                            <input type="tel"   pattern="[6789][0-9]{9}" maxlength="13" title="Please enter valid mobile number, Example: 9999999999" value="<?php echo $Mobile;?>"
                            name="mob" id="mob" placeholder="Mobile Number" required >
                            </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Email Address <strong style="color:#FF0000;">*</strong></label>
                            <input type="email" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Email Address" value="<?php echo $rec[0]['email']; ?>" disabled>
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Old Password <strong style="color:#FF0000;">*</strong></label>
                            <input type="password" name="old_pass" id="old_pass"      oninput="this.setCustomValidity('')" title="Only alphanumeric characters and spaces are valid in this field"   placeholder="Password" value="<?php echo $rec[0]['password']; ?>">
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>New Password </label>
                            <input type="text" name="new_pass"   id="new_pass"   oninput="this.setCustomValidity('')"  title="Only alphanumeric characters and spaces are valid in this field" onBlur="confirmPass()"    placeholder="New Password" value="">
                           <!-- <i class="la la-lock"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Confirm New Password</label>
                            <input type="password" name="cuser_pass"   id="cuser_pass" oninvalid="this.setCustomValidity('Enter Confirm Password')"  oninput="this.setCustomValidity('')"  title="Only alphanumeric characters and spaces are valid in this field" onBlur="confirmPass()"    placeholder="Repeat New Password">
                           <!-- <i class="la la-lock"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Member Type <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="user_type" id="user_type" oninvalid="this.setCustomValidity('Select Member Type')"  oninput="this.setCustomValidity('')" required disabled>
                              <option value="">Select Member Type</option>
                              <option value="0" <?php if($rec[0]['user_type']==0){echo "selected";} ?>>Landlord</option>
                              <option value="1" <?php if($rec[0]['user_type']==1){echo "selected";} ?> >Tenant</option>
                            </select>
                            <!--<i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Resident Type <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" id="user_resident_type" name="user_resident_type" oninvalid="this.setCustomValidity('Select Resident Type')"  oninput="this.setCustomValidity('')" required>
                              <option value="" >Select Resident Type</option>
                              <option value="0" <?php if($rec[0]['user_resident_type']==0){echo "selected";} ?> >Residing in the society</option>
                              <option value="1" <?php if($rec[0]['user_resident_type']==1){echo "selected";} ?>>Non Resident</option>
                            </select>
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                          <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <label> Your Profession <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="working" id="working"  required  minlenth='8' placeholder="Working As" value="<?php echo $rec[0]['working']; ?>">
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                       <!-- <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                          <div class="g-recaptcha" id="rcaptcha" data-sitekey="6LdIf6YUAAAAAMG4oIQvhv9qEvFxdSAZgacQCQhN"></div>
                           <span id="captcha" style="margin-left:100px;color:red" />
                           </div>
                      </div>-->
                        
                        <div class="col-lg-12 no-pdd">
                        
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <button type="submit" value="submit">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
               
                
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
           <li><a href="" data-toggle="modal" data-target="#advertise">Advertise with us</a></li>
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

<!-- Avatar Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
     
           <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                     <form method = "post" enctype="multipart/form-data">
	                <input type="file" id="avatar" name="avatar" class="form-control">  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="avatar_upload" name="avatar_upload" class="btn btn-success">Upload</button>
              </div>
              </form>
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