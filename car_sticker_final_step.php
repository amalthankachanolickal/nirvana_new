<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");  
//include('CheckCustomerLogin.php');

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['TEMP_LOGINID']));

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("temp_car_stickers");
//print_r($rec);
$user_name=$ModelCall->utf8_decode_all($rec[0]['first_name']).' '.$ModelCall->utf8_decode_all($rec[0]['last_name']);

    

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
<SCRIPT language="javascript">
		function addRow(tableID) {
            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
           // alert(rowCount);
           if(rowCount>3){
               alert("Maximum of three cars allowed. ");
               return;
           }
             var row = table.insertRow(rowCount);
             var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.name="car_number[]";
			cell1.appendChild(element1);

			var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
			element2.type = "text";
			element2.name = "make_model[]";
			cell2.appendChild(element2);  

			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
			element3.type = "text";
			element3.name = "color[]";
			cell3.appendChild(element3);  

            var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
			element4.type = "text";
			element4.name = "sticker_number[]";
			cell4.appendChild(element4);  

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
<form method="POST" enctype="multipart/form-data" action="save.php" id="myForm">
	<input type="hidden" name="img_val" id="img_val" value="" />
</form>   
<div class="wrapper" id="target">
  <div class="sign-in-page">
       
    <div class="signin-popup">
      <div class="signin-pop ">
       
           
          <div class="row" >
             <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="login-sec">
                  
                  <?php if(isset($_SESSION['UR_LOGINNAME'])){ if($_SESSION['UR_LOGINNAME']!=$user_name || $_SESSION['unit_no']!=$rec[0]['user_id']){?>
                  <p style="color: #e00909;font-size: 15px;">TThere is mismatch in provided details and user profile. You can edit the form by clicking on Edit</p>
                  <?php }} ?>
              <div class="col-lg-12 no-pdd">
                   <div class="sn-field">
                    <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt="" width="150px"> </a>
                    <h3>Application for Car Stickers </h3>
                    </div>
                     </div>
                     <!-- <div class="col-lg-8 no-pdd">
                   <div class="sn-field">
                   <h3>Application for Car Stickers </h3>
                    </div>
                     </div> -->
<!--           
                  <ul class="sign-control">
                        <div class="col-lg-4 no-pdd">
                         <div class="sn-field">
                    <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a>
                       </div>
                       </div>
                     <li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> 
                     
                      <li><h3>Application for Car Stickers </h3></li>
                    </ul> -->

                
               <div class="sign_in_sec" style="display:block;">
                    
                     <?php if($_REQUEST['actionResult']=="regerror"){?><p style="color: #e00909;font-size: 15px;">Sorry ! This user name is already taken, please chose another user name  </p><?php } ?>
                      <?php if($_REQUEST['actionResult']=="passnomtch"){?><p style="color: #e00909;font-size: 15px;">Old password given is wrong. </p><?php } ?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/SocietyAction.php" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="car_sticker_digital">
                      <div class="row">
                            <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                      <label> Title <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required disabled>
                              <option value="" <?php if($rec[0]['user_title']==""){echo "selected";} ?>>Select </option>
                                <option value="Mr." <?php if($rec[0]['user_title']=="Mr."){echo "selected";} ?>>Mr. </option>
                                  <option value="Mrs." <?php if($rec[0]['user_title']=="Mrs."){echo "selected";} ?>>Mrs. </option>
                                    <option value="Miss." <?php if($rec[0]['user_title']=="Miss."){echo "selected";} ?>>Miss. </option>
                            </select>
                           <!-- <i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-3 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label> First Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="first_name" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" required value="<?php echo $rec[0]['first_name']; ?>" placeholder="First Name" disabled>
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                        
                        
                        <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                          <label> Middle Name <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="middle_name" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')"  value="<?php echo $rec[0]['middle_name']; ?>" placeholder="Middle Name" disabled>
                           <!-- <i class="la la-user"></i>--> </div>
                        </div>
                        
                        <div class="col-lg-3 no-pdd">
                          <div class="sn-field">
                            <label> Last Name <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="last_name" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" required value="<?php echo $rec[0]['last_name']; ?>" placeholder="Last Name" disabled>
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                      
                                     <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                           <label> Block Name <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="block_id" id="block_id" oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  disabled>
                              <option value="">Select a Block Name</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("block_name","asc");
$GetBlockList = $ModelCall->get("tbl_block_entry");
if($GetBlockList[0]>0){
foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
?>
<option value="<?php echo strip_tags($GetBlockVal['id']); ?>"<?php if($rec[0]['block_id']==strip_tags($GetBlockVal['id'])){echo "selected";} ?>><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
            <?php } } } ?>
                            </select>
                            <!--<i class="la la-map-marker"></i>--> </div>
                        </div>
                        <div class="col-lg-4 no-pdd pr-4px" style="" id ='onlyaplfortenant6'>
                          <div class="sn-field">
                           <label>House Number <strong style="color:#FF0000;">*</strong></label>
                           <input type="text" name="house_number_id" id="house_number_id" oninvalid="this.setCustomValidity('Enter House Number')"  oninput="this.setCustomValidity('')" disabled onKeyPress="return isNumberKey(event);" maxlength="3"  value="<?php echo $rec[0]['house_number_id']; ?>" placeholder="Enter House Number">
                            <!--<select class="select1" id="house_number_id" name="house_number_id" required>`
                              <option value="">Select a House Number</option>
                             
                            </select>-->
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                        <div class="col-lg-4 no-pdd" id ='onlyaplfortenant7'>
                          <div class="sn-field">
                           <label>Floor Number <strong style="color:#FF0000;"></strong></label>
                          
                           <select class="select1" name ='floor_number' id='floor_number' disabled>
                            
                              <option value='1'<?php if($rec[0]['floor_number']==1){echo "selected";} ?>>Ground Floor</option>
                              <option  value='2' <?php if($rec[0]['floor_number']==2){echo "selected";} ?>>First Floor</option>
                              <option value='3' <?php if($rec[0]['floor_number']==3){echo "selected";} ?>>Second Floor</option>
                              <option value='4' <?php if($rec[0]['floor_number']==4){echo "selected";} ?>>Third Floor</option>
                              <option value='5 <?php if($rec[0]['floor_number']==5){echo "selected";} ?>'>Fourth Floor</option>
                            </select>
                            <!--<i class="la la-building-o"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Member Type <strong style="color:#FF0000;">*</strong></label>
                            <select class="select1" name="owner_tenant" id="owner_tenant" oninvalid="this.setCustomValidity('Select Member Type')"  oninput="this.setCustomValidity('')" disabled >
                              <option value="">Select Member Type</option>
                              <option value="0" <?php if($rec[0]['owner_tenant']==0){echo "selected";} ?>>Landlord</option>
                              <option value="1" <?php if($rec[0]['owner_tenant']==1){echo "selected";} ?> >Tenant</option>
                            </select>
                            <!--<i class="la la-user"></i> --></div>
                        </div>
                             <div class="col-lg-12 no-pdd">
                                
                          <div class="sn-field">
                            <label> Mobile  <strong style="color:#FF0000;"></strong></label>
                           </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <table><tr>
                            <!-- <td width="5%">+</td> -->
                            <td  width="10%"><input type="text" value="+91" readonly></td>
                            <td width="90%">  <input type="text" name="mobile" id="mobile"      oninput="this.setCustomValidity('')"  onKeyPress="return isNumberKey(event);"   placeholder="mobile" value="<?php echo $rec[0]['mobile']; ?>" disabled>
                         </td>
                            </tr></table> </div>
                        </div>
                        
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Email Address <strong style="color:#FF0000;">*</strong></label>
                            <input type="email" name="email_id" id="email_id" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" disabled placeholder="Email Address" value="<?php echo $rec[0]['email_id']; ?>" >
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                         <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                            <label> Landline <strong style="color:#FF0000;"></strong></label>
                            <input type="text" name="landline_user" id="landline_user"  onKeyPress="return isNumberKey(event);"   minlenth='8' placeholder="Landline" value="<?php echo $rec[0]['landline_user']; ?>"disabled>
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                        <!-- <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                            <label> Extension:  <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="cxtension1" id="extension1"   minlenth='8' placeholder="Extension" value="<?php // echo $rec[0]['cxtension1']; ?>" disabled>
                            <i class="la la-user"></i> </div>
                        </div>
                   
                    -->
                       
                         
                      <!--  <div class="col-lg-12 no-pdd">
                        <b>Please provide the following details if  Resident is not the owner: </b>
                        </div> -->
                        <div class="col-lg-12 no-pdd" id="onlyaplfortenant">
                          <div class="sn-field">
                           <label> Owner Name  <strong style="color:#FF0000;">*</strong></label>
                            <input type="text" name="owner_name" id="owner_name" oninvalid="this.setCustomValidity('Enter Owner Name')"  oninput="this.setCustomValidity('')"   placeholder="Owner Name" value="<?php echo $rec[0]['owner_name']; ?>" disabled>
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd" id="onlyaplfortenant2">
                          <div class="sn-field">
                           <label> Owner Address  <strong style="color:#FF0000;">*</strong></label>
                            <textarea type="text" name="owner_address" id="owner_address" oninvalid="this.setCustomValidity('Enter Owner Name')"  oninput="this.setCustomValidity('')"   placeholder="Owner Address " value="<?php echo $rec[0]['owner_address']; ?>" disabled></textarea>
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd" id ='onlyaplfortenant4'>
                          <div class="sn-field">
                          
                           <label> Mobile  <strong style="color:#FF0000;"></strong></label>
                           
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>

                        <div class="col-lg-12 no-pdd" id ='onlyaplfortenant4'>
                          <div class="sn-field">
                          <table><tr>
                            <!-- <td width="5%">+</td> -->
                            <td  width="10%"><input type="text" value="+91" readonly></td>
                            <td width="90%"> <input type="text" name="owner_mobile" id="owner_mobile"      oninput="this.setCustomValidity('')"  onKeyPress="return isNumberKey(event);"   placeholder="Mobile" value="<?php echo $rec[0]['owner_mobile']; ?>" disabled></td>
                            </tr></table>
                            <!-- <label> Mobile  <strong style="color:#FF0000;"></strong></label> -->
                              
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>

                        <div class="col-lg-12 no-pdd" id ='onlyaplfortenant5'>
                          <div class="sn-field">
                           <label>Email Address <strong style="color:#FF0000;">*</strong></label>
                            <input type="email" name="owner_email_id" id="owner_email_id" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" placeholder="Email Address" value="<?php echo $rec[0]['owner_email_id']; ?>" disabled >
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                        <div class="col-lg-12 no-pdd" id="onlyaplfortenant3">
                          <div class="sn-field">
                           <label> Landline  <strong style="color:#FF0000;"></strong></label>
                           <input type="text" name="owner_landline" id="owner_landline"      oninput="this.setCustomValidity('')"  onKeyPress="return isNumberKey(event);"   placeholder="Mobile" value="<?php echo $rec[0]['owner_landline']; ?>" disabled>
                          <!--  <i class="la la-user"></i> --></div>
                        </div>

                        
                         <div class="col-lg-12 no-pdd">
                      
                        </div>
                        <div class="col-lg-12 no-pdd">
                            <table id="tblcarmodels">
                                <tr><th>Car Number</th>
                                <th>Make/Model </th>
                                <th>Colour </th>
                                <!-- <th>Sticker Number </th> -->
                                <th>&nbsp;</th>
                              </tr>
                                <tr><td> <input type="text" name="car_number" id="car_number" oninvalid="this.setCustomValidity('Enter Car Number')"  oninput="this.setCustomValidity('')" required  placeholder="Car Number" value="<?php echo $rec[0]['car_number']; ?>" disabled></td>
                                <td> <input type="text" name="make_model" id="make_model" oninvalid="this.setCustomValidity('Enter Make/Model')"  oninput="this.setCustomValidity('')" required  placeholder="Make/Model" value="<?php echo $rec[0]['make_model']; ?>" disabled> </td>
                                <td> <input type="text" name="color" id="color" oninvalid="this.setCustomValidity('Enter Color')"  oninput="this.setCustomValidity('')" required  placeholder="Color" value="<?php echo $rec[0]['color']; ?>" disabled> </td>
                               </tr>
                               <?php if ($rec[0]['car_number_1'] && $rec[0]['car_number_1']<> ""){?>
                                <tr><td> <input type="text" name="car_number" id="car_number" oninvalid="this.setCustomValidity('Enter Car Number')"  oninput="this.setCustomValidity('')" required  placeholder="Car Number" value="<?php echo $rec[0]['car_number_1']; ?>" disabled></td>
                                  <td> <input type="text" name="make_model" id="make_model" oninvalid="this.setCustomValidity('Enter Make/Model')"  oninput="this.setCustomValidity('')" required  placeholder="Make/Model" value="<?php echo $rec[0]['make_model_1']; ?>" disabled> </td>
                                  <td> <input type="text" name="color" id="color" oninvalid="this.setCustomValidity('Enter Color')"  oninput="this.setCustomValidity('')" required  placeholder="Color" value="<?php echo $rec[0]['color_1']; ?>" disabled> </td>
                                </tr>
                              <?php }?>
                              <?php if ($rec[0]['car_number_2'] && $rec[0]['car_number_2']<> ""){?>
                                <tr><td> <input type="text" name="car_number" id="car_number" oninvalid="this.setCustomValidity('Enter Car Number')"  oninput="this.setCustomValidity('')" required  placeholder="Car Number" value="<?php echo $rec[0]['car_number_2']; ?>" disabled></td>
                                  <td> <input type="text" name="make_model" id="make_model" oninvalid="this.setCustomValidity('Enter Make/Model')"  oninput="this.setCustomValidity('')" required  placeholder="Make/Model" value="<?php echo $rec[0]['make_model_2']; ?>" disabled> </td>
                                  <td> <input type="text" name="color" id="color" oninvalid="this.setCustomValidity('Enter Color')"  oninput="this.setCustomValidity('')" required  placeholder="Color" value="<?php echo $rec[0]['color_2']; ?>" disabled> </td>
                                </tr>
                              <?php }?>
                            </table>
                           
                        </div> 
                        <div class="col-lg-12 no-pdd">
                      
                        </div>
                        
                     

                 
                      </div>
                    </form>
                         <div class="col-lg-12 no-pdd" style="text-align:center;">
                         <a href="car_stickers.php"><button style="color: #ffffff; font-size: 16px; background-color: #37a000;
    padding: 8px 27px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;">Edit</button></a>
                 <button style="color: #ffffff; font-size: 16px; background-color: #37a000;
    padding: 8px 27px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;"  onClick="javascript:window.print()">Print</button>
      <a href="examplepdf.php"><button style="color: #ffffff; font-size: 16px; background-color: #37a000;
    padding: 8px 27px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;"  >Download</button>
    <a href="controller/car_stickers_controller.php"> <button style="color: #ffffff; font-size: 16px; background-color: #37a000;
    padding: 8px 27px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;">Submit</button></a> 
                </div>
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
$("#owner_tenant").change(function() {
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
    $('#onlyaplfortenant4').show();
    $('#user_resident_type').removeAttr('required');
    $('#user_resident_type').removeAttr('data-error');
    $('#onlyaplfortenant5').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant6').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant7').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
  } 
  else if($(this).val() == "0") {
    $('#onlyaplfortenant').hide();
    $('#owner_name').removeAttr('required');
    $('#owner_name').removeAttr('data-error');
    $('#onlyaplfortenant2').hide();
    $('#owner_email').removeAttr('required');
    $('#owner_email').removeAttr('data-error');
    $('#onlyaplfortenant3').hide();
    $('#owner_mobile').removeAttr('required');
    $('#owner_mobile').removeAttr('data-error');
    $('#onlyaplfortenant4').hide();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant5').hide();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant6').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant7').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
  }
    else if($(this).val() == "") {
    $('#onlyaplfortenant').hide();
    $('#owner_name').removeAttr('required');
    $('#owner_name').removeAttr('data-error');
    $('#onlyaplfortenant2').hide();
    $('#owner_email').removeAttr('required');
    $('#owner_email').removeAttr('data-error');
    $('#onlyaplfortenant3').hide();
    $('#owner_mobile').removeAttr('required');
    $('#owner_mobile').removeAttr('data-error');
    $('#onlyaplfortenant4').hide();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant5').hide();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant6').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
    $('#onlyaplfortenant7').show();
    $('#user_resident_type').removeAttr('required', '');
    $('#user_resident_type').removeAttr('data-error', 'This field is required.');
  }
  
   else if($(this).val() == "2") {
    $('#onlyaplfortenant').hide();
    $('#owner_name').removeAttr('required');
    $('#owner_name').removeAttr('data-error');
    $('#onlyaplfortenant2').hide();
    $('#owner_email').removeAttr('required');
    $('#owner_email').removeAttr('data-error');
    $('#onlyaplfortenant3').hide();
    $('#owner_mobile').removeAttr('required');
    $('#owner_mobile').removeAttr('data-error');
    $('#onlyaplfortenant5').hide();
    $('#block_id').removeAttr('required');
    $('#block_id').removeAttr('data-error');
    $('#onlyaplfortenant6').hide();
    $('#house_number_id').removeAttr('required');
    $('#house_number_id').removeAttr('data-error');
    $('#onlyaplfortenant7').hide();
    $('#floor_number').removeAttr('required');
    $('#floor_number').removeAttr('data-error');
    $('#onlyaplfortenant4').hide();
    $('#user_resident_type').removeAttr('required');
    $('#user_resident_type').removeAttr('data-error');
  }
});
$("#owner_tenant").trigger("change");



/* 
$(document).ready(function(){
 $('.btn-addrow').click(function(){
  
   $('#tblcarmodels').append('<tr><td> <input type="text" name="car_number" id="car_number" oninvalid="this.setCustomValidity('Enter Car Number')"  oninput="this.setCustomValidity('')" required  placeholder="Car Number" value=""></td><td> <input type="text" name="make_model" id="make_model" oninvalid="this.setCustomValidity('Enter Make/Model')"  oninput="this.setCustomValidity('')" required  placeholder="Make/Model" value=""> </td> <td> <input type="text" name="color" id="color" oninvalid="this.setCustomValidity('Enter Color')"  oninput="this.setCustomValidity('')" required  placeholder="Color" value=""> </td><td> <input type="text" name="sticker_number" id="sticker_number" oninvalid="this.setCustomValidity('Enter Sticker Number')"  oninput="this.setCustomValidity('')" required  placeholder="Sticker Number" value=""> </td><td>&nbsp</td></tr>');
 });
}); */
</script>
