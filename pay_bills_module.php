<?php include('model/class.expert.php'); 
include('CheckCustomerLogin.php');

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

//exit(0);
?>
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "qyj42vVj";
// Merchant Salt as provided by Payu
$SALT = "OwPaosAjUf";


// Merchant key here as provided by Payu TEST CREDS
//$MERCHANT_KEY = "BC50nb";
// Merchant Salt as provided by Payu for testing 
//$SALT = "Bwxo1cPe";

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
 
  foreach($_POST as $key => $value) {
    $posted[$key] = $value;
    }
   // print_r($_POST);
  //  exit(0);
  }

if($_SESSION['event_ticket']['bill_no']!=''){
  $udf2=$_SESSION['event_ticket']['bill_no'];
}elseif ($posted['udf2']!=''){
  $udf2 = $posted['udf2'];
}else{
  $udf2 ="";
}

if($_SESSION['event_ticket']['amount']!='') {
  $amount = $_SESSION['event_ticket']['amount'];
}elseif($posted['amount']!=''){
  $amount =$posted['amount'];
}else{
  $amount =0;
}


/*if( $amount == 0){
  header("Location: ".SITE_URL);
  exit(0);
}
*/
if($_SESSION['event_ticket']['ActionCall']!=''){
  $udf1=$_SESSION['event_ticket']['ActionCall'];
}elseif ($posted['udf1']!=''){
  $udf1 = $posted['udf1'];
}else{
  $udf1 ='Website-Direct' ;
}

// for gettig dynamic values for TDR charges
$ModelCall->where("applied_to",'BillsModule');
$ModelCall->where("status","1");
$ModelCall->groupBy("mode");
$ModelCall->orderBy("id","asc");
$PayDetails = $ModelCall->get("payment_mode_charges");


$ModelCall->where("id",$_SESSION['event_ticket']['eid']);
$ModelCall->where("status",1);
$EventDetails = $ModelCall->get("tbl_events");
unset($_SESSION['event_ticket']);
// echo "<pre>";
// print_r($EventDetails);
// echo "Bill Id ". $udf2;
// echo "Amount Passed ".$amount;
// echo "Action Call ". $udf1;

// Merchant product info.
// Populate name, merchantId, description, value, commission parameters as per your code logic; in case of multiple splits pass multiple json objects in paymentParts
$firstSplitArr  = array(
 "name"=>"KushalID",
 "value"=> $amount, 
 "merchantId"=>"6868033", 
 "description"=>"Test Child-Merchants Kushal Account", 
 "commission"=>"0"
);

// TEST Product ARRAY 
// $firstSplitArr  = array(
//   "name"=>"splitID1", 
//   "value"=> (float)$amount, 
//   "merchantId"=>"4825050",
//   "description"=>"test description1", 
//   "commission"=>"0"
// );


$paymentPartsArr = array($firstSplitArr);
$finalInputArr = array("paymentParts" => $paymentPartsArr);
$Prod_info = json_encode($finalInputArr);
// var_dump($Prod_info);
 
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
   // echo "<br /> enforce_paymethod ". $posted['enforce_paymethod'];
//     $mode= $posted['mode'];
//     $charge= $posted['tdrcharges'];
//     $gst= $posted['gst'];
//   //  echo  $mode;
//   // echo $charge;
//      if($posted['mode']=="CC" || $posted['mode']=="UPI"){
//       // echo "in 1";
//       $posted['amount'] =(float)$posted['amount']+(float)($charge/100)*$posted['amount'] + (float)($charge/100)*($gst/100)*$posted['amount'];
//       } elseif ($posted['mode']=="NB"){
//     //  echo "in 2";
//      // $posted['amount'] = (float)$posted['amount']+ (float)$charge +(float)($gst/100)*$charge ;
//       $posted['amount'] = (float)$posted['amount'];
//       } elseif ($posted['mode']=="DC"){
//     //  echo "in 3";
//       if($posted['amount']<=2000){
//       //  echo "in 4";
//       $posted['amount'] = (float)$posted['amount']+(float)($charge/100)*$posted['amount']+(float)($gst/100)*($charge/100)*$posted['amount']; 
//       } else {
//       //  echo "in 5";
//         $posted['amount'] = (float)$posted['amount']+(float)(.0102)*$posted['amount']+(float)(0.18)*(.0102)*$posted['amount'];    
//       }
//      }
     //echo  "<br />".$posted['amount'];
     
    //  $firstSplitArr  = array(
    // "name"=>"KushalID",
    // "value"=>(float)$posted['amount'], 
    // "merchantId"=>"6868033", 
    // "description"=>"Test Child-Merchants Kushal Account", 
    // "commission"=>"0"
    // );
    // $posted['enforce_paymethod']=$mode;

    $firstSplitArr  = array(
      "name"=>"	Nirvana Residents Welfare Association", 
      "value"=> (float)$posted['amount'], 
      "merchantId"=>"6889301",
      "description"=>"Nirvana Residents Welfare Association", 
      "commission"=>"0"
    );

    // $firstSplitArr  = array(
    //   "name"=>"splitID1", 
    //   "value"=> (float)$posted['amount'], 
    //   "merchantId"=>"4825050",
    //   "description"=>"test description1", 
    //   "commission"=>"0"
    // );

     $paymentPartsArr = array($firstSplitArr);
     $finalInputArr = array("paymentParts" => $paymentPartsArr);
     $Prod_info = json_encode($finalInputArr);
     $posted['productinfo'] = $Prod_info;
    // $posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    // var_dump( $posted['productinfo']);
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
        foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    //  echo  "<br />". $hash;
    //  echo  "<pre>";
    //  print_r($posted);
  // exit(0);
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
//   print_r($_POST);
//  exit(0);
  $action = $PAYU_BASE_URL . '/_payment';
}



?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Nirvana Country - Pay Bills</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/responsive.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
<style>
.sign_in_sec h3:before {
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	width: 60% !important;
	height: 3px;
	background-color: #14921d;
  text-align:center;
}

</style>
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
            <div class="col-lg-7">
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

                
<div class="form-group" style="display:block;padding:15px;border:grey 2px solid;
margin:20x;!important ">
               <div class="row">
                      <div class="col-lg-6 no-pdd">
                         <div class="sn-field"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" width="40%"> </a>
                         </div>
                        </div>
                        <div class="col-lg-6 no-pdd"> <h3>Payment Details </h3>  </div>
                  </div>
                    <?php if($formError) { ?>
                        <span style="color:red">Please fill all mandatory fields.</span>
                        <br/>
                        <br/>
                    <?php } ?>
                    
                        <span style="color:red;display:none" id="errorterms"> <br/>
                        <br/></span>
                        
                    <form action="<?php echo $action; ?>" method="post" name="payuForm">
                        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                        <input type="hidden" name="productinfo" value="<?php echo htmlspecialchars($Prod_info); ?>" />
                        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                        <input type="hidden"  name="surl" value="<?php echo SITE_URL;?>response_payu_bill_module.php"/>
                        <input type="hidden"  name="furl" value="<?php echo SITE_URL;?>response_payu_bill_module.php"/>
                        <input type="hidden"  name="service_provider" value="payu_paisa"/>
                        <input type="hidden"  name="udf1" value="<?php echo $udf1;?>"/>
                        <input type="hidden"  name="udf2" value="<?php echo $udf2;?>"/>
                       <!--<input type="hidden"  name="enforce_paymethod" id="enforce_paymethod"  value=""/> -->
                       <!-- <input type="hidden"  name="udf3" id="udf3"/>  -->
                       <input type="hidden"  name="tdrcharges" id="tdrcharges"/> 
                       <input type="hidden"  name="gst" id="gst"/> 
                       <!-- <input type="hidden"  name="udf4" id="udf4"/>  -->
                        <input type="hidden"  name="udf5" id="originalamount"  value="<?php echo $amount;?>"/> 
                       <input type="hidden" name="billno" id="billno" value="<?php echo $EventDetails[0]['event_name']; ?>"   readonly disabled/>
                       <input type="hidden" name="month_name" id="month_name" value="<?php echo $EventDetails[0]['event_date']; ?>, <?php echo $EventDetails[0]['event_time']; ?>" readonly disabled/>
                       <input type="hidden" name="firstname" id="firstname" value="<?php echo $rec[0]['first_name']; ?>" readonly/>
                       <input type="hidden" name="lastname" id="lastname" value="<?php echo $rec[0]['last_name']; ?>" readonly/>
                       <input type="hidden" name="email" id="email" value="<?php echo $rec[0]['email']; ?>" readonly/>
                       <div class="row form-group">
                          <div class="col-lg-6 no-pdd">
                          <label> Name :</label> <?php echo $rec[0]['title']. " " . $rec[0]['first_name'] . " " . $rec[0]['last_name']; ?>
                          </div>
                          <div class="col-lg-6 no-pdd">
                          <label>Email id : </label><?php echo $rec[0]['email']; ?>
                          </div>

                          <div class="col-lg-2 no-pdd"><input type="text" name="isd1" id="isd1" value="+91" placeholder="+91" maxlength="3"  style="padding:0 5px 0 5px;"  class="form-control"  readonly>
                          </div>
                          <div class="col-lg-10 no-pdd">
                          <input type="text" name="phone" id="phone" oninput="this.setCustomValidity('')"  onKeyPress="return isNumberKey(event);" maxlength="10"  placeholder="Mobile Number" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" onblur="phonenumber(this.value);" class="form-control" required>
                          </div>

                          <div class="col-lg-12 no-pdd form-group">
                          <div class="sn-field ">
                          <?php if(!$posted['amount']){ ?> <label>  Amount  <strong style="color:#FF0000;">*</strong></label><?php }else{?>
                           <label>  Total Payable Amount  <strong style="color:#FF0000;">*</strong></label><?php }?>
                           <input name="amount" id="amount" onchange="selectchangeamount()" value="<?php echo (empty($posted['amount'])) ? $amount : $posted['amount']  ?>" class="form-control"  required  />
                           <!-- <i class="la la-lock"></i>--> </div>
                        </div>
                      
                        
                        <div class="col-lg-12 no-pdd form-group">
                           <div class="checky-sec st2">
                            <div class="fgt-sec ">
                              <label class="check-new-box">
                              <input type="checkbox" class="form-check-input"  id="policy_accept" name="policy_accept" value="1" >
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 16px;width: 96%;line-height: 25px;font-weight: 500;">Yes, I understand and agree to the <a href="<?php echo SITE_URL;?>tnc_bills.html" data-target="#myModal" role="button" data-toggle="modal" style="color: #37a000;">Bill Payment Terms and Conditions </a>.</small> </div>
                            <!--fgt-sec end-->
                          </div>
                        </div>
                       
                        <div class="col-lg-3 no-pdd form-group text-cente">
                        <?php if(!$hash) { ?>
                          
                           <!-- <td>&nbsp;</td>
                                <td><input type="submit" value="Submit" class="btn" style="background-color: #37a000;color:white! important; padding:0! important;" onclick="return check_accept_terms()"/></td> -->

    <button type="submit" class="btn btn-success" onclick="return check_accept_terms()">Submit</button>

                         <?php } ?>
                       
                        </div>
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
     
    <!-- Event Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Event Terms and Conditions </h4>
                </div>
                <div class="modal-body">
                    <p>Loading...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Event modal -->

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

   $( document ).ready(function() {
        console.log( "document loaded" );
        <?php if($posted['mode']){?>
          $("#mode").val("<?php echo $posted['mode'];?>");
        <?php } else{?>
          $("#mode").val('CC');
        <?php }?>
       // selectPaymentMode();

    });
 

$('#myModal').on('hidden.bs.modal', function () {
  $(this).removeData('bs.modal');
});

function phonenumber(inputtxt)
{
  var phoneno = /^\(?([0-9]{5})\)?[-. ]?([0-9]{5})$/;
  if((inputtxt.match(phoneno))){
    $("#errorterms").hide();
      return true; }
      else {
        $("#errorterms").text('The Mobile no entered is invalid');
        $("#errorterms").show();
       window.scrollTo(0, 100);
      //  alert("The Mobile no entered is invalid");
        return false;
        }
}

function selectPaymentMode(){
  //alert($("#mode").val());
  var mode= $("#mode option:selected").val();
  var charge = $("#mode option:selected").attr("data-charge");
  var gst = $("#mode option:selected").attr("data-gst");
  var typecal = $("#mode option:selected").attr("data-type");

  console.log("charge" + charge);
  console.log("gst" + gst);
  console.log("typecal" + typecal);

  var amount= $("#amount").val();
  if(mode==""){
    alert("Please select the Payment Mode");
    return false;
  }else{
    if(mode=="CC" && typecal=='PERCENTAGE'){
     charges = (charge/100)*parseFloat(amount) + (charge/100)*(gst/100)*parseFloat(amount);
    } else if(mode=="DC" && typecal=='PERCENTAGE'){
      if(amount<=2000){
        charges =(charge/100)*parseFloat(amount)+(charge/100)*(gst/100)*parseFloat(amount); 
       }else{
        charges = (.0102)*parseFloat(amount)+(0.18)*(.0102)*parseFloat(amount);    
       }
    }else if (mode=="NB" && typecal=='FLAT'){
     // charges =parseFloat(charge)+parseFloat((gst/100)*charge);
     charges=0;
    }else if(mode=="UPI" && typecal=='PERCENTAGE'){
      charges = (charge/100)*parseFloat(amount) + (charge/100)*(gst/100)*parseFloat(amount);
    }

    $("#charges").val(charges.toFixed(2));
    $("#tdrcharges").val(charge);
    $("#gst").val(gst);
     totalamount = parseFloat(amount)+ parseFloat(charges);
     $("#totalAmount").val(totalamount.toFixed(2));
    $("#enforce_paymethod").val(mode);
    // $("#udf3").val(charge);
    // $("#udf4").val(gst);
    //alert(mode);
  }
  
}

function selectchangeamount(){
 

  var amount= $("#amount").val();
 
     
     $("#originalamount").val(amount);
       //selectPaymentMode();

  
}

function check_accept_terms(){
  var isChecked = $("#policy_accept").is(":checked");
            if (isChecked) {
                //alert("CheckBox checked.");
                $("#errorterms").hide();
                return true;
            } else {
              $("#errorterms").text('Please check the Events Terms and Conditions.');
               $("#errorterms").show();
               window.scrollTo(0, 100);
               return false;
            }
            
}
</script>
</body>
</html>
