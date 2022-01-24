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



			if (reg.test(emailField.value) == false) {

				alert('Invalid Email Address');

				emailField.value = '';

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
        <script type="text/javascript">
    var subcategory = {
            Food: ["","Restaurants", "AllGrocery", "OtherFood"],
            Clothes: ["","Designer", "RetailLabels", "CustomFit"],
			Other: ["","Others"]
        }

        var NewSubcategory={           
                Restaurants :['','Others','Others','Others'],
                AllGrocery :['','Others','Others','Others'],
                OtherFood : ['','Others','Others','Others'],
                Designer : ['','Others','Others','Others'],
                RetailLabels : ['','Others','Others','Others'],
                CustomFit : ['','Others','Others','Others'],
				Others: ['','Others']
    }

        function makeSubmenu(value) {
            if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategory[value]) {
                    citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
                }
                document.getElementById("categorySelect").innerHTML = citiesOptions;
            }
        }

        function makeSub2menu(value1) {
            if (value1.length == 0) document.getElementById("categorySubSelect").innerHTML = "<option></option>";
            else {
                var citiesOptions1 = "";
                for (categoryId1 in NewSubcategory[value1]) {
                    citiesOptions1 += "<option>" + NewSubcategory[value1][categoryId1] + "</option>";
                }
                document.getElementById("categorySubSelect").innerHTML = citiesOptions1;
            }
        }
		
        function displaySelected() {
            var country = document.getElementById("category").value;
            var city = document.getElementById("categorySelect").value;
			var test = document.getElementById("categorySubSelect").value;
            alert(country + "\n" + city + "\n" + test);
        }

        function resetSelection() {
            document.getElementById("category").selectedIndex = 0;
            document.getElementById("categorySelect").selectedIndex = 0;
			document.getElementById("categorySubSelect").selectedIndex = 0;
        }
    </script>
        <script type="text/javascript">
       /* function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 1) {
            alert('File size exceeds 2 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
    }*/
    </script>
     <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
                var uploadField = document.getElementById("file");
                console.log(uploadField);
                
                uploadField.onchange = function () {
                    console.log(this.files);
                    
                    if (this.files[0].size > 1024000) {
                       alert("Image Size Should Be Less Than 1 MB");
                        this.value = "";
                    };
        }
    })
        
        </script>
</head>
<style>
.sign_in_sec form input{}, .sign_in_sec form select
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
        
          <div class="row" style="margin: 0;">
              
<!--        <div class="col-lg-6">  
              <div class="cmp-info text-center">
                <div class="cm-logo col-lg-12"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a></div>
                <!--cm-logo end-->
<!--            <div class="clearfix"></div>
                <div class="sign-info-content col-lg-12">
                  <h3 class="sign-h3">Welcome to Nirvana Country</h3>
                  <p class="sign-p"><?php echo $getDiscussionInfo[0]['content_data']; ?></p>
                </div>
                <div class="col-lg-12"> <img src="<?php echo SITE_URL;?>nirwana-img/login_bg.png" alt="" class="sign-bottom-img"> </div>
              </div>
              <!--cmp-info end-->
<!--        </div> -->
<div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="login-sec">
          
               <?php if($_REQUEST['actionResult']=="regsuccess"){?>
                 
                        
			   <?php }  else {?>
                    <ul class="sign-control">
                        <div class="col-lg-4 no-pdd">
                         <div class="sn-field">
                    <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a>
                       </div>
                       </div>
                     <!--<li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> -->
                     
                      <li><a href="<?php echo SITE_URL;?>" style="background-color: #37a000;color: #fff;" title="">Back To Home</a></li>
                    </ul>
                
               <div class="sign_in_sec" style="display:block;">
                    <h3>Post Your Advertisement Here</h3>
                     
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>RWAVendor/controller/FunctionCall.php" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="AdvertiseWIthUs">
                      <div class="row">
                      <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                      <label> Category <strong style="color:#FF0000;">*</strong></label>
                       
                            <select id="category" size="1" onchange="makeSubmenu(this.value)" name="category">
<option value="" disabled selected>Choose Category</option>
<option>Food</option>
<option>Clothes</option>
<option>Other</option>
</select>
    <select id="categorySelect" size="1" onchange="makeSub2menu(this.value)" name="sub_category">
<option value="" disabled selected>Choose SubCategory</option>
<option></option>
</select>
    <select id="categorySubSelect" size="1" name="sub_sub_category">
<option value="" disabled selected>Choose SubSubcategory </option>
<option></option>

</select>
<input type="text" name="other_category"  placeholder="Enter Description If Others Category Selected">
                           <!-- <label> Area<strong style="color:#FF0000;">*</strong></label>
                            <select  
                              <option value="">Select</option>
                                <option value="Mr.">1 </option>
                                  <option value="Mrs.">2 </option>
                                    <option value="Miss.">3 </option>
                            </select>-->
                            <div class="row">
                                <div class="col-lg-12 no-pdd">
                                     <div class="sn-field">
                           <!-- <i class="la la-user"></i> --></div>
                      <!--  <label> Business Name <strong style="color:#FF0000;"></strong></label> -->
                        <input type="text" name="bussiness_name"  placeholder="Enter the Business Name">
                           </div>
                           
                           
                                <div class="col-lg-3 no-pdd">
                                     <div class="sn-field">
                           <!-- <i class="la la-user"></i> -->
                        <label> Title <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="title">
                              <option value="Select">Select </option>
                                <option value="Mr.">Mr. </option>
                                  <option value="Mrs.">Mrs. </option>
                                    <option value="Miss.">Miss. </option>
                            </select></div></div>
                        <div class="col-lg-3 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label> First Name <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="first_name" id="first_name">
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                        
                        
                        <div class="col-lg-3 no-pdd">   
                          <div class="sn-field">
                          <label> Middle Name <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="middle_name" id="middle_name"  >
                           <!-- <i class="la la-user"></i>--> </div>
                        </div>
                        
                        <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                            <label> Last Name <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="last_name" id="last_name" >
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                

                    
                         <div class="col-lg-12 no-pdd">
                         
                        <div class="sn-field">
                           <div class="input-group-addon">+91
                          <!--  <input type="tel" name="contact" id="contact"  maxlength="10" required placeholder="Mobile 1" title="+91">
                             <input type="tel" name="contact" id="contact"  maxlength="10"  placeholder="Mobile 2" title="+91">
                            <input type="tel" name="contact" id="contact"  maxlength="10"  placeholder="Mobile 3" title="+91"> -->
                            <input type="tel" name="contact1" id="contact1" maxlength="10" required placeholder="Mobile 1 10 Digits"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <input type="tel" name="contact2" id="contact2" maxlength="10"  placeholder="Mobile 2 10 Digits"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           <!-- <input type="tel" name="contact3" id="contact3" maxlength="10"  placeholder="Mobile 3"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            -->
                            </div>
                            </div>
                         </div>
                        <!-- <div class="col-lg-12 no-pdd">
                         <label>Landline Number <strong style="color:#FF0000;"></strong></label>
                        <div class="sn-field">
                            <input type="tel" name="landline_isd" id="landline_isd" maxlength="2" placeholder="ISD Code">
                              <input type="tel" name="landline_std" id="landline_std" maxlength="4" placeholder="STD Code">
                                <input type="tel" name="landline_number" id="landline_number" maxlength="6"placeholder="6 Digit Number">
                            </div>
                         </div>-->
                         <div class="col-lg-12 no-pdd">
                                <div class="sn-field">
                                    <label>Landline Number: <strong style="color:#FF0000;"></strong></label>
                                 </div>
                          </div>
                         <div class="col-lg-4 no-pdd">
                        <!-- <label>ISD Code <strong style="color:#FF0000;"></strong></label>-->
                        <div class="sn-field">
                           <!-- <input type="tel" name="landline_isd" id="landline_isd" maxlength="2" >
                             <input type="tel" name="landline_isd" id="landline_isd" maxlength="2" >
                             <input type="tel" name="landline_isd" id="landline_isd" maxlength="2" >-->
                             <input type="tel" name="landline_isd1" id="landline_isd1" maxlength="2" placeholder="ISD Code" value="+91" class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                             <input type="tel" name="landline_isd2" id="landline_isd2" maxlength="2" placeholder="ISD Code" value="+91" class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <!-- <input type="tel" name="landline_isd3" id="landline_isd3" maxlength="2"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            -->
                            </div>
                         </div>
                         <div class="col-lg-4 no-pdd">
                        <!-- <label>STD Code <strong style="color:#FF0000;"></strong></label>-->
                        <div class="sn-field">
                         <!--   <input type="tel" name="landline_std" id="landline_std" maxlength="4" >
                             <input type="tel" name="landline_std" id="landline_std" maxlength="4" >
                             <input type="tel" name="landline_std" id="landline_std" maxlength="4" >-->
                             <input type="tel" name="landline_std1" id="landline_std1" maxlength="4"  placeholder="STD Code" class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <input type="tel" name="landline_std2" id="landline_std2" maxlength="4"  placeholder="STD Code"class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <!--<input type="tel" name="landline_std3" id="landline_std3" maxlength="4"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            -->
                            </div>
                         </div>
                         <div class="col-lg-4 no-pdd">
                       <!--  <label>6 Digit Number <strong style="color:#FF0000;"></strong></label>-->
                        <div class="sn-field">
                          <!--  <input type="tel" name="landline_number" id="landline_number" maxlength="6" >
                             <input type="tel" name="landline_number" id="landline_number" maxlength="6" >
                              <input type="tel" name="landline_number" id="landline_number" maxlength="6" > -->
                              <input type="tel" name="landline_number1" id="landline_number1" maxlength="6" placeholder="6 Digit No."  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                             <input type="tel" name="landline_number2" id="landline_number2" maxlength="6" placeholder="6 Digit No." class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                             <!--<input type="tel" name="landline_number3" id="landline_number3" maxlength="6"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           -->
                            </div>
                         </div>
                         
                        <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                         <!--  <label> Email Address <strong style="color:#FF0000;">*</strong></label> -->
                            <input type="email" name="email" id="email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  required placeholder="Email 1">
                          
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                        <div class="col-lg-4 no-pdd">
                            <div class="sn-field">
                                <input type="email" name="email2" id="email2"  placeholder="Email 2">
                            </div>
                        </div>
                        
                        <div class="col-lg-4 no-pdd">
                            <div class="sn-field">
                                <input type="email" name="email3" id="email3"  placeholder="Email 3">
                                </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Address <strong style="color:#FF0000;">*</strong></label>
               
                          <input type="text" name="address_1"  id="address_1"  placeholder="Address Line 1">
                          <input type="text" name="address_2"  id="address_2" placeholder="Address Line 2">
                        <!-- <input type="tel" name="pin_code" id="pin_code" maxlength="6" placeholder="Pincode"> -->
                        <input type="tel" name="pin_code" id="pin_code" maxlength="6"  placeholder="Pincode"class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div> 
                        </div> 
                        
                           <div class="col-lg-12 no-pdd">
                         <!-- <div class="sn-field">
                           <label>Contact Number <strong style="color:#FF0000;">*</strong></label>
               
                          <input type="text" name="contact"   maxlength="13" value="+91">
                        </div> -->
                        <div class="sn-field">
                            <p>If you would like the customers to click your Ad to call you,  enter the number here:</p>
                         <!--  <label>Mobile Number <strong style="color:#FF0000;">*</strong></label> -->
                           <div class="input-group-addon">+91
                           <!-- <input type="tel" name="contact" id="contact"  maxlength="10" required placeholder="Mobile Number" title="+91">-->
                            <input type="text" name="contact" id="contact" maxlength="10"  placeholder="Mobile Number"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           
                            
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div></div>
                         </div>
                         
                        <div class="col-lg-12 no-pdd">	
                          <div class="sn-field">
                              <p>OR, If you’d  like the customers to click your Ad to visit your webpage, enter here:</p>
                       <!--    <label> Website Link <strong style="color:#FF0000;">  </strong></label> -->
               
                          <input type="text" name="web_link"  placeholder="Enter Your Website Link">
                        </div> 
                        
                        </div> 
                    <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                          <label>Upload Your Advertisement Image <strong style="color:#FF0000;"></strong></label>
                         <!--  <input type="file"  id="image" name="image" accept="image/*"> -->
                           <input type="file" id="file" name="image" accept="image/*" placeholder="File size should be less than 0.5 MB">
                        <!-- <input type="file" class="image" id="image" name="image" accept="image/*" onchange="ValidateSize(this)" type="file"> -->
                        </div>
                         <div class="sn-field">
                         <!-- <label>Text for your Advertisement <strong style="color:#FF0000;"></strong></label> -->
                         <p>In case you do not have an Ad image, please enter the Text to be displayed in your Ad here:</p>
                           <input type="text" name="text_advertisement" placeholder="Enter Text for your Advertisement ">
                        
                        </div>
                        </div>
                    <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <div>
                   <p> Please make the payment for the ad as per the plan selected by you.  Make a transfer to the following bank account: 
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                   
                   Account Number: 50200036109352
                    IFSC Code: HDFC0001721. Account Name: Innovatus Technologies Private Remarks - Your Business Name Limited. Kindly add the payment Details here.  </p>
                   </div>  
                   </div>
                   </div>
                     <!--   <div class="col-lg-12 no-pdd">

                        <div class="sn-field">
                          <label>Payment Details <strong style="color:#FF0000;"></strong></label>
                           <input type="tel" name="pay_details" id="pay_details" maxlength="5" placeholder="Amount(₹)">
                           <input type="date" name="pay_date">
                           <input type="text" name="pay_mode" placeholder="Mode (E transfer/Cheque/ Cash/ Others)">
                           <input type="text" name="pay_ref" placeholder="Transaction Reference Number">
                           </div>
                           </div>-->
                           <div class="col-lg-12 no-pdd">
                                <div class="sn-field">
                                    <label>Payment Details: <strong style="color:#FF0000;"></strong></label>
                                 </div>
                          </div>
                           <div class="col-lg-6 no-pdd">
                                 <div class="sn-field">
                     <!-- <input type="tel" name="pay_details" id="pay_details" maxlength="5" placeholder="Amount(₹)">-->
                        <input type="tel" name="pay_amount" id="pay_amount" maxlength="5"  required placeholder="Amount(₹)"  class="calculator-input" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                </div>
                           </div>
                           <div class="col-lg-6 no-pdd">
                                 <div class="sn-field">
                                     <input type="date" name="pay_date">
                                </div>
                           </div>
                           <div class="col-lg-6 no-pdd">
                                 <div class="sn-field">
                                     
                            <select class="select" name="pay_mode">
                              <option value="Select">Select </option>
                                <option value="E Transfer">E Transfer </option>
                                  <option value="Cheque">Cheque </option>
                                    <option value="Cash">Cash </option>
                                    <option value="Others">Others </option>
                            </select>
                                   <!--  <input type="text" name="pay_mode" placeholder="Mode (E transfer/Cheque/ Cash/ Others)">-->
                                </div>
                           </div>
                           <div class="col-lg-6 no-pdd">
                                 <div class="sn-field">
                                       <input type="text" name="pay_ref" placeholder="Transaction Reference No.">
                                </div>
                           </div>
                           
                         <!--  <div class="checkbox">
                           	 <label>
                                    <input type="checkbox" name="checkbox" value="check" id="agree"/>
                                	I have read and agree to the <a href='http://pts.palmterracesselect.com/TnC.php'> <strong style="color:#008000;">Terms and Conditions</strong></a>
                            </label>
                             </div>-->
                             <div class="col-lg-12 no-pdd">
                          <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="policy_accept" name="policy_accept" value="1" required>
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 16px;width: 100%;line-height: 25px;font-weight: 500;">Yes, I understand and agree to the Advertisement <a  href='<?php echo SITE_URL;?>TnC.php'> <strong style="color:#008000;">Terms and Conditions</a>.</small>
                          </div>
                          </div>
                        
                           <div class="sn-field">
                          <button type="submit" value="submit">Submit Advertisement</button>
                        </div>
                      
                   </div>
                           <div>
                               <p>
 In case of any clarifications  please write to us at <a href="mailto:Nirvana.Marketing@nirvanacountry.co.in?Subject=Advertisement%20Request" <strong style="color:#008000;" target="_top">Nirvana.Marketing@nirvanacountry.co.in</a> 
 or SMS us on <a href="tel:919811915561" <strong style="color:#008000;" target="_top"> +919810490363.</a>
 (This number is for SMS only. We will call you back within 2 working days).</p>
      </div>
                    </form>
                  </div>
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
          <li><a href="<?php echo SITE_URL;?>terms_conditions.php" target="_blank">Terms of Use</a></li>
          <li><a href="<?php echo SITE_URL;?>privacy.php" target="_blank">Privacy Policy</a></li>
            <li><a href="<?php echo SITE_URL;?>cookies-privacy.php" target="_blank">Cookies Policy</a></li>
          <li><a href="<?php echo SITE_URL;?>advertisement.php" target="_blank">Advertise with us</a></li>
        </ul>
        <p>Copyright &copy; 2019<a href="http://innovatuslimited.com/" target="_blank" style="color:#37a000;"> Innovatus</a> All rights reserved.</p>
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
<!--<script type="text/javascript">function add_chatinline(){var hccid=70940255;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script> -->
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