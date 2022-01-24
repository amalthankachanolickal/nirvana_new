<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","terms-conditions-ad");
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
    
            <div class="col-lg-12">
              <div class="login-sec">
          
               <?php if($_REQUEST['actionResult']=="regsuccess"){?>
                 
                        
			   <?php }  else {?>
              <ul class="sign-control">
                 <!--<li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> -->
                  <li><a href="<?php echo SITE_URL;?>" style="background-color: #37a000;color: #fff;" title="">Back To Home</a></li>
                </ul>
                
               <div class="sign_in_sec" style="display:block;">
                    
                       
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>CreateaccountAccessCallFuct" onSubmit="return validateform();">
                   
                      <div class="row">
                      <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                              
                            <!--  <p><strong>Terms and Conditions</strong></p>-->

<p>
<h4>
News Paper Bills & Subscriptions Terms & Conditions </h4>
<ol>
<li>	Online monthly newspaper bill payment is a pilot and available to AG and BC residents. It will be extended to other blocks in the coming months. These blocks were selected for roll out only based on the Vendor’s capability.</li> 
<li>	The online payment is only available for monthly subscription and not for annual subscriptions. </li> 
<li>	You are offered discount of Transaction Charges for online payment. The ZERO transaction charge is applicable for payments though Credit Cards as well as Net banking. </li> 
<li>	This  is a limited period offer only for payments until 31st December, 2019. This maybe withdrawn or extended in future.  </li> 

<li>	The bill amounts and applicable rates are as per your Newspaper Vendor.</li> 
<li>	The system only provides for full payment of the Bill Amount. In case you find a mismatch in the bill you may contact the vendor directly. </li> 
<li>	If you have already paid the bill shown online you may ignore the same. Payment status for the same will be updated fortnightly basis the inputs from the Vendor. </li> 
<li> For any changes or clarifications on the same you may contact them directly.</li> 
</ol>
<p>
<strong>Vendor Name : Ajay : +91 84474 78485 </strong></p>

<h4> Subscriptions </h4>
<ul>
<li> 	To make an annual subscription you may express your interest here and the vendor to contact you to complete the subscription.  </li>
<li> 	The special annual price is only available on newspapers listed online. This includes most commonly obtained newspapers but not all. </li>
<li> 	This offer is made by the newspaper vendor. This platform does not govern the price, discount or any other terms of the contract or the offer.  </li>
<li> 	The contract for delivery of newspaper is between yourself and the newspaper vendor/ publisher. The platform is only bringing the offer to its residents and is not responsible for the payment/ delivery of the newspaper or any other issue that you may have with the newspaper or the newspaper vendor. </li>
<li> 	This offer is currently available to select blocks due to initial tie ups. We may soon extend the same to other blocks once available.</li>
<li> 	Annual cost listed is the approximate annual cost if you subscribe to the newspaper monthly and the amount is as per the guidance of the vendor. The actual costs may differ as per the respective prices of the newspaper. </li>
<li> 	Offer Details of the Annual Subscription e.g for a Times of India, provided by the vendor <br/>
 	Annual Price 			   -    865/- (2 newspapers 5 days a week)<br/>
	Delivery Fees @ 30 per month  -    360/- <br/>
 	Total 				   - 1,225/-<br/>
 	Price Offer 			   - 1,193/- (1 Newspaper 7 days a week)</li>
 	<li>All subscriptions booked online until 10th of the current month will be applicable from the next month. All subscriptions booked for after that date will be applicable from the month after that. E.g. all subscriptions paid for until midnight of 10th of Feb will be applicable from 1st of March until the 28th Feb/ 29th Feb of the following. All subscriptions booked on 11th of March will start from the following 1st April. </li>
<li> 	Offer is only available only on monthly basis. </li>
<li> 	The vendor offers you to stop the subscription any time by intimating them by the 10th of the previous month, and they shall refund the balance amount to you. Or to change the newspapers during your subscription from amongst those in the offer, by intimating the vendor. </li>
<li> 	The vendor offers you the option to change the newspaper choice from amongst those listed above once a month by intimating the vendor in advance by the 10th of the previous month, or as per the terms he may communicate for the same. </li>
<li> 	Annual Subscriptions can be availed by giving a cheque in favor of Times of India to the vendor. </li>
<li> 	You can issue only 1 cheque from one account for 1 newspaper so in case you would like to subscribe to 2 newspapers, you will need to provide 2 cheques from different accounts. </li>
<li> 	To make an annual subscription you may enroll your interest here. We will, within 48 hours  pass on the same to the vendor to contact you regarding the same and provide the full Terms and Conditions for the same.  </li>
<li> 	This offer is made by the newspaper vendor this platform is not overseeing the price, discount or any other terms of the contract or the offer.  </li>
<li> 	The special annual offer is only available on the newspapers listed in the section. </li>
<li> 	The newspaper vendor offers you the option to change the newspaper choice from amongst those listed above once a month by intimating the vendor in advance as per the terms he may communicate for the same. Any changes in your choice of newspaper during this is not governed or managed by the platform. </li>
<li> 	This offer is currently available to select blocks due to initial tie ups. We may soon extend the same to other blocks once available. </li>
<li> 	Annual cost here is the only an approximate annual cost of your monthly subscription as per the guidance of the vendor. The actual costs may differ as per the respective prices of the newspaper. </li>
<li> 	By availing this offer you allow the platform to collect the required bills from the vendor and provide with the same. The information remains confidential and is bound by the confidentiality clause of the platform. </li>
</ul>
</p>
          
                  </div>
               </div> 
                <?php } ?>
              </div>
              <!--login-sec end-->
              <ul class="sign-control">
                 <!--<li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> -->
                  <li><a href="<?php echo SITE_URL;?>" style="background-color: #37a000;color: #fff;" title="">Back To Home</a></li>
                </ul>
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

</script>