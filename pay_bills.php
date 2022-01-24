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

?>
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "qyj42vVj";
// Merchant Salt as provided by Payu
$SALT = "OwPaosAjUf";

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
   // print_r($_POST);
   // exit(0);
  foreach($_POST as $key => $value) {
    $posted[$key] = $value;
    }
  }

if($posted['billid']!=''){
  $amount=$posted['amt_'.$posted['billid']];
  $udf2=$posted['billid'];
}else if($posted['amount']!='') {
  $amount = $posted['amount'];
  $udf2 = $posted['udf2'];
}else{
  $amount = 0;
  $udf2 = '';
}

if( $amount == 0){
  header("Location: ".SITE_URL."user_news_paper_bill.php");
  exit(0);
}

if($posted['ActionCall']!=''){
  $udf1=$posted['ActionCall'];
}elseif ($posted['udf1']!=''){
  $udf1 = $posted['udf1'];
}else{
  $udf1 ='Website-Direct' ;
}

//echo $amount;

// Merchant product info.
// Populate name, merchantId, description, value, commission parameters as per your code logic; in case of multiple splits pass multiple json objects in paymentParts
$firstSplitArr  = array(
 "name"=>"KushalID",
 "value"=> $amount, 
 "merchantId"=>"6868033", 
 "description"=>"Test Child-Merchants Kushal Account", 
 "commission"=>"0"
);

$paymentPartsArr = array($firstSplitArr);
$finalInputArr = array("paymentParts" => $paymentPartsArr);
$Prod_info = json_encode($finalInputArr);
//var_dump($Prod_info);
 
$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];

}
$hash = '';
// Hash Sequence
//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
                  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
        foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nirvana Country - Pay Bills</title>
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
 <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();

    }
  </script>
</head>


<body onload="submitPayuForm()">
<div class="wrapper">
  <div class="sign-in-page">
    <div class="signin-popup">
      <div class="signin-pop ">
       
           
          <div class="row" >
             <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="login-sec">
<!--           
                  <ul class="sign-control">
                        <div class="col-lg-4 no-pdd">
                         <div class="sn-field"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a>
                         </div>
                        </div>
                    
                      <li><a href="<?php //echo SITE_URL;?>" style="background-color: #37a000;color: #fff;" title="">Back To Home</a></li> --
                      <li> <h3>Bill Payment</h3></li>
                    </ul> -->

                
               <div class="sign_in_sec" style="display:block;padding:15px;border:grey 2px solid;
margin:20x;!important ">
               <div class="row">
                      <div class="col-lg-6 no-pdd">
                         <div class="sn-field"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" width="40%"> </a>
                         </div>
                        </div>
                        <div class="col-lg-6 no-pdd"> <h3>Bill Payment</h3>  </div>
                  </div>
                    <?php if($formError) { ?>
                        <span style="color:red">Please fill all mandatory fields.</span>
                        <br/>
                        <br/>
                    <?php } ?>
                    <form action="<?php echo $action; ?>" method="post" name="payuForm">
                        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                        <input type="hidden" name="productinfo" value="<?php echo htmlspecialchars($Prod_info); ?>" />
                        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                        <input type="hidden"  name="surl" value="<?php echo SITE_URL;?>/response-payu.php"/>
                        <input type="hidden"  name="furl" value="<?php echo SITE_URL;?>/response-payu.php"/>
                        <input type="hidden"  name="service_provider" value="payu_paisa"/>
                        <input type="hidden"  name="udf1" value="<?php echo $udf1;?>"/>
                        <input type="hidden"  name="udf2" value="<?php echo $udf2;?>"/>
                        <input type="hidden"  name="txnid" id="txnid"  value="<?php echo (empty($posted['txnid'])) ? substr(md5(mt_rand()), 0, 8)  : $posted['txnid']; ?>"/>
                      <div class="row">

                       <div class="col-lg-6 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label> Bill No  <strong style="color:#FF0000;">*</strong></label>
                           <input name="billno" id="billno" value="<?php echo $posted['billid']; ?>"   readonly disabled/>
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                         
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                            <label> Bill Period <strong style="color:#FF0000;">*</strong></label>
                            <input name="month_name" id="month_name" value="<?php echo $posted['month_name']; ?>" readonly disabled/>
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                       
                         

                      <!-- <div class="col-lg-4 no-pdd">
                          <div class="sn-field">
                             <label> TxnId: <strong style="color:#FF0000;">*</strong></label>
                             <input name="txnid" id="txnid" value="<?php // echo (empty($posted['txnid'])) ? substr(md5(mt_rand()), 0, 8)  : $posted['txnid']; ?>" required readonly/>
                            <i class="la la-user"></i></div>
                        </div> -->
                        <div class="col-lg-6 no-pdd pr-4px" style="">
                          <div class="sn-field">
                           <label> First Name <strong style="color:#FF0000;">*</strong></label>
                           <input name="firstname" id="firstname" value="<?php echo $rec[0]['first_name']; ?>" required  readonly/>
                          <!--  <i class="la la-user"></i> --></div>
                        </div>
                         
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                            <label> Last Name <strong style="color:#FF0000;">*</strong></label>
                            <input name="lastname" id="lastname" value="<?php echo $rec[0]['last_name']; ?>" required />
                            <!--<i class="la la-user"></i>--> </div>
                        </div>
                       
                         
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                           <!-- <label>Email Address <strong style="color:#FF0000;">*</strong></label> -->
                            <input type="email" name="email" id="email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Email Address" value="<?php echo $rec[0]['email']; ?>" readonly>
                            <!--<i class="la la-envelope" aria-hidden="true"></i> --></div>
                        </div>
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                            <table><tr>
                            <!-- <td width="5%">+</td> -->
                            <td width="15%"><input type="text" name="isd1" id="isd1" value="+91" placeholder="+91" maxlength="3"  style="padding:0 5px 0 5px;" readonly></td>
                            <td> <input type="text" name="phone" id="phone" oninput="this.setCustomValidity('')"  onKeyPress="return isNumberKey(event);" maxlength="10"  placeholder="Mobile Number" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" onblur="phonenumber(this.value);"  style="padding:0 5px 0 5px;"></td>
                            <td><strong style="color:#FF0000;">*</strong></td>
                            </tr></table>
                            <!-- <label> Mobile  <strong style="color:#FF0000;"></strong></label> -->
                           
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>
                        
                       

                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label> Amount <strong style="color:#FF0000;">*</strong></label>
                           <input name="amount" value="<?php echo (empty($posted['amount'])) ? $amount : $posted['amount'] ?>" readonly/>
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                           <label>Address : </label>
                           <input name="address1" value="<?php echo (empty($posted['address1'])) ?  $rec[0]['address'] : $posted['address1']; ?>" />
                           <!-- <i class="la la-lock"></i> --></div>
                        </div>
                       
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                           <label> City: </label>
                           <input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
                            <!--<i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                           <label> State : </label>
                           <input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                        
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                           <label> Country: </label>
                           <input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
                            <!--<i class="la la-user"></i> --></div>
                        </div>
                        <div class="col-lg-6 no-pdd">
                          <div class="sn-field">
                           <label> Zipcode : </label>
                           <input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
                           <!-- <i class="la la-building-o"></i> --></div>
                        </div>
                        
                        
                        <div class="col-lg-12 no-pdd">
                           <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="policy_accept" name="policy_accept" value="1" required >
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 16px;width: 96%;line-height: 25px;font-weight: 500;">Yes, I understand and agree to the <a  target="_blank" href='<?php echo SITE_URL;?>/TNC_newspaper.php'> <strong style="color:#008000;">Newspapers Terms and Conditions</a>.</small> </div>
                            <!--fgt-sec end-->
                          </div>
                        </div>
                        </div>
                        <div class="col-lg-3 no-pdd">
                        <?php if(!$hash) { ?>
                           <td>&nbsp;</td>
                                <td><input type="submit" value="Submit" class="btn" style="background-color: #37a000;color:white! important; padding:0! important;" /></td>

                         <?php } ?>
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
          <li><a href="<?php echo SITE_URL;?>terms_conditions.php" target="_blank">Terms of Use</a></li>
          <!--<li><a href="#" title="">Community Guidelines</a></li>-->
            <li><a href="<?php echo SITE_URL;?>privacy.php" target="_blank">Privacy Policy</a></li>
          <!--<li><a href="#" title="">Career</a></li>-->
          <!--<li><a href="#" title="">Forum</a></li>-->
          <!--<li><a href="#" title="">Language</a></li>-->
           <li><a href="<?php echo SITE_URL;?>cookies-privacy.php" target="_blank">Cookies Policy</a></li>
           <li><a href="<?php echo SITE_URL;?>advertisement.php" target="_blank">Advertise with us</a></li>
        </ul>
        <p>Copyright &copy; 2019<a href="http://innovatuslimited.com/" target="_blank" style="color:#37a000;"> Innovatus </a> All rights reserved.</p>
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

<SCRIPT language="javascript">
function phonenumber(inputtxt)
{
  var phoneno = /^\(?([0-9]{5})\)?[-. ]?([0-9]{5})$/;
  if((inputtxt.match(phoneno))){
      return true; }
      else {
        alert("The Mobile no entered is invalid");
        return false;
        }
}
</script>
</body>
</html>
