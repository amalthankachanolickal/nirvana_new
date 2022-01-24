<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management"); 
$ModelCall->where("id",$_REQUEST['eid']);

$eventsinfo = $ModelCall->get("tbl_events"); 

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

   input[type=text]:disabled {
  background: white;
  border:0;
}
.img {
    outline: 1px solid orange;
}

</style>

<body class="sign-in">
<div class="wrapper">
  <div class="sign-in-page">
    <div class="signin-popup">
      <div class="signin-pop ">
        <div class="border-left">
          <div class="row" style="margin: 0;">
              <?php $text= SITE_URL.MAINADMIN."events/photo/".$eventsinfo[0]['event_pic']; 
              
              ?>
            <div class="col-lg-6" style="">
<img src="<?php echo $text;?>" class="rounded" alt=""> 
             
            </div>
            <div class="col-lg-6">
              <div class="login-sec">
                        <div class="cmp-info text-center">
                <div class="cm-logo col-lg-12"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a></div>
                <!--cm-logo end-->
                <div class="clearfix"></div>
                <div class="sign-info-content col-lg-12">
                  <h3 class="sign-h3">Welcome to Nirvana Country</h3>
                  <p class="sign-p"><?php echo $getDiscussionInfo[0]['content_data']; ?></p>
                </div>
              </div>
               <?php if($_REQUEST['actionResult']=="regsuccess"){?>
                 
               <h3>Thank you! And confirm your email</h3>
                <div class="col-lg-12"> <img src="<?php echo SITE_URL;?>nirwana-img/email_confirmation.png" alt="" class="sign-bottom-img" style="margin-bottom: 30px;"> </div>
               <p>Please check your email inbox/spam to verify your email address</p>
			   <p>We need to verify the  information with the membership records. Due to initial set up the process may take us a few days. We will intimate you of the once the sign up is approved by the email provided to us, latest within 2 weeks.</p>
                        <p><strong>Thank you for your patience. </strong></p>
                        <p><a href="<?php echo SITE_URL;?>" class="log" id="navbar-sign-in" style="border-radius: 3px;background: #37a000;
    padding: 9px 15px;color: #ffffff;margin-top: 6px;">Back to Home</a></p>
			   <?php }  else {?>
            
                
               <div class="sign_in_sec"  <?php if($eventsinfo[0]['type_of_event']!="ticketing"){ echo 'style="display: none;"';} else{echo 'style="display: block;"';}?>>
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>CreateaccountAccessCallFuct" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="FirstRegistration">
                          <div class="row">
                <div class="col-sm-6 ">
                      <div class="form-group">
                <i class="fa fa-map-marker fa-4x" aria-hidden="true"></i>
                <label class="control-label"><?php echo $eventsinfo[0]['event_location'];?></label>
                </div>
                </div>
                <div class="col-sm-6  ">
                    <div class="form-group">
<i class="fa fa-calendar fa-4x"></i>
                
                <label class="control-label"><h4><?php echo $eventsinfo[0]['event_time'];?><br> <?php echo $eventsinfo[0]['event_date'];?></h4></label>
                </div>
                </div>
            </div>
                     <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                
              </div></div>
              <div class="col-sm-2">
                <div class="form-group">
 <i class="fa fa-ticket" aria-hidden="true"></i>
                </div>
              </div>
              
              
 <div class="col-sm-3">
     <div class="form-group">
                <label class="control-label ">Price <span class="text-danger"></span></label><br>
                
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                <label class="control-label ">Total <span class="text-danger"></span></label><br>
              
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              
              </div>
                       <div class="row" <?php if($eventsinfo[0]['name_cat_1']==""){ echo 'style="display: none;"';}?>>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label"><?php echo $eventsinfo[0]['name_cat_1'];?> <span class="text-danger">*</span></label>
     
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  
                    <select class="form-control" id="sel1" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
 <div class="col-sm-3">
     <div class="form-group">
               
                <input id="a2"  disabled type="text"  value="<?php echo $eventsinfo[0]['price_of_ticket_before_cat_1'];?>"   />
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                
                <input id="a3" disabled type="text" name="total_amt_sc" />
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              </div>
                        <div class="row" <?php if($eventsinfo[0]['name_cat_2']==""){ echo 'style="display: none;"';}?>>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label"><?php echo $eventsinfo[0]['name_cat_2'];?> <span class="text-danger">*</span></label>
     
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  
                    <select class="form-control" id="sel2" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
 <div class="col-sm-3">
     <div class="form-group">
               
                <input id="a4"  disabled type="text"  value="<?php echo $eventsinfo[0]['price_of_ticket_before_cat_2'];?>"   />
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                
                <input id="a5" disabled type="text" name="total_amt_sc" />
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              </div>
                        <div class="row" <?php if($eventsinfo[0]['name_cat_3']==""){ echo 'style="display: none;"';}?>>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label"><?php echo $eventsinfo[0]['name_cat_3'];?> <span class="text-danger">*</span></label>
     
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  
                    <select class="form-control" id="sel3" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
 <div class="col-sm-3">
     <div class="form-group">
               
                <input id="a6"  disabled type="text"  value="<?php echo $eventsinfo[0]['price_of_ticket_before_cat_3'];?>"   />
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                
                <input id="a7" disabled type="text" name="total_amt_sc"  value=""/>
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              </div>
                        <div class="row" <?php if($eventsinfo[0]['name_cat_4']==""){ echo 'style="display: none;"';}?>>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label"><?php echo $eventsinfo[0]['name_cat_4'];?> <span class="text-danger">*</span></label>
     
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  
                    <select class="form-control" id="sel4" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
 <div class="col-sm-3">
     <div class="form-group">
               
                <input id="a8"  disabled type="text"  value="<?php echo $eventsinfo[0]['price_of_ticket_before_cat_4'];?>"   />
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                
                <input id="a9" disabled type="text" name="total_amt_sc" />
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              </div>
                        <div class="row" <?php if($eventsinfo[0]['name_cat_5']==""){ echo 'style="display: none;"';}?>>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label"><?php echo $eventsinfo[0]['name_cat_5'];?> <span class="text-danger">*</span></label>
     
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  
                    <select class="form-control" id="sel5" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
 <div class="col-sm-3">
     <div class="form-group">
               
                <input id="a10"  disabled type="text"  value="<?php echo $eventsinfo[0]['price_of_ticket_before_cat_5'];?>"   />
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                
                <input id="a11" disabled type="text" name="total_amt_sc" />
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              </div>
              
            
              
              
              
               <div class="row">
                  
            <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Ticket type <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel77" name="ticket_type" required title="Ticket type" placeholder="Ticket type ">
                <option  value="External">External </option>
    
  </select>
                </div>
                </div>
                  <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Payment mode <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel44" name="payment_mode" required title="Payment mode" placeholder="Payment mode " >
<option  value="Cash/Cheque" >Cash/Cheque </option>
                <option  value="Online" >Online </option>
    
  </select>
                </div>
            
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                
                <input id="a13" disabled type="text" name="total_amt"  />
                
                
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
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary">Pay Now</button>
              </div>
         </form>
                  </div>
               
                <?php } ?>
              </div>
              <!--login-sec end-->
                          <div class="row ">
                  
      
        <div class="col-sm-12 ">
<div class="row well border border-primary">
     <label class="control-label ">About the Event<span class="text-danger">*</span></label><br/>
                <label class="control-label"><?php echo $eventsinfo[0]['event_description'];?></label>
               
    </div>
  
    <div class="row well border border-primary">
     <label class="control-label ">TnC <span class="text-danger">*</span></label><br/>
                <label class="control-label "><?php echo $eventsinfo[0]['event_terms'];?> </label>
               
    </div>
    
        </div>
        </div>
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
calculate = function()
{
    var v1=0;
    var v2=0;
    var v3=0;
    var v4=0;
    var v5=0;
    var v6=0;
     var v7=0;
    var v8=0;
    var v9=0;
    var v10=0;
  var ek = document.getElementById('sel1').value;
    var minutes = document.getElementById('a2').value; 
     v1= parseInt(ek)*parseInt(minutes);
  var ek2 = document.getElementById('sel2').value;
    var minutes2 = document.getElementById('a4').value; 
   v2=parseInt(ek2)*parseInt(minutes2);
      var ek3 = document.getElementById('sel3').value;
    var minutes3 = document.getElementById('a6').value; 
    v3=parseInt(ek3)*parseInt(minutes3);
    
    
    var ek4 = document.getElementById('sel4').value;
    var minutes4 = document.getElementById('a8').value; 
     v4= parseInt(ek4)*parseInt(minutes4);
  var ek5 = document.getElementById('sel5').value;
    var minutes5 = document.getElementById('a10').value; 
   v5=parseInt(ek5)*parseInt(minutes5);
     v6=v1;
     document.getElementById('a13').value=(v1+v2+v3+v4+v5);
          document.getElementById('a3').value=v1;
               document.getElementById('a5').value=v2;

     document.getElementById('a7').value=v3;

     document.getElementById('a9').value=v4;

     document.getElementById('a11').value=v5;


    
  
     /*document.getElementById('a8').value=v1+v2+v3;
     var rim = document.getElementById('remaining').value;
     if(rim<0){
        document.getElementById('a9').value="No ticket left" ;
     }*/
   }




</script>