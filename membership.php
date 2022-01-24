<?php 

include('model/class.expert.php');
$Backtracker = $_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');

$serialid = $ModelCall->rawQuery("SELECT max(id) as maxid FROM `Wo_Membership`");
//print_r($serialid);
$serialno = sprintf('%06d', $serialid[0]['maxid']+1);

//echo "EC = " .$_SESSION['EC'];

$user_data = array();

if (isset($_GET['fid'])) {
	$id = base64_decode($_GET['fid']);
	$ModelCall->where("id", $id);
	$user_data = $ModelCall->get("Wo_Membership");
	if (count($user_data) == 0) {
	 header("Location: ".SITE_URL);
	 exit(0);
	}
} else if ($_SESSION['UR_LOGINID'] != "") {
    $ModelCall->where("user_id", $_SESSION['UR_LOGINID']);
	$data = $ModelCall->get("Wo_Users");
//	print_r($data);
	switch($data[0]['floor_number']){
	    case "1":
       $floor='GF';
        break;
         case "2":
         $floor='FF';
        break;
        case 3:
        $floor='SF';
        break;
          case 4:
        $floor='TF';
        break;
         default:
        $floor='Villa';
        break;
	}
	$ModelCall->where("block_prime", $data[0]['block_id']);
	$ModelCall->where("house_number", $data[0]['house_number_id']);
	$ModelCall->where("floor_prime", $floor);
	$ModelCall->where("approved_status != 'Declined'");
	$user_data = $ModelCall->get("Wo_Membership");
//	print_r($user_data);
  if (count($user_data) == 0) {
    $user_data[0]['userid'] = $_SESSION['UR_LOGINID'] ;
    $user_data[0]['serialno'] = $serialno;
    $user_data[0]['title_1'] = $data[0]['user_title'];
	$user_data[0]['tenant_first_name'] = $data[0]['first_name'];
	$user_data[0]['tenant_last_name'] = $data[0]['last_name'];
	$user_data[0]['block_prime'] = $data[0]['block_id'];
	$user_data[0]['house_number'] = $data[0]['house_number_id'];
	$user_data[0]['floor_prime'] =$floor;
	$user_data[0]['emailid_1'] = $data[0]['user_email'];
	$user_data[0]['mobile'] = $data[0]['phone_number'];
	$user_data[0]['approved_status']=0;
  } else{
      if($user_data[0]['userid']==NULL || $user_data[0]['userid']=="")
         $user_data[0]['userid'] = $_SESSION['UR_LOGINID'] ;
  }
	//print_r($user_data);
//	exit(0);
}


?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Nirvana Country- Form X</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="">

	<meta name="keywords" content="">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/animate.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/line-awesome.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/line-awesome-font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>lib/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>lib/slick/slick-theme.css">

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/style.css"> 

	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/responsive.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<!-- Bootstrap css -->

	<link href="<?= SITE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">

	<!--Font Awesome css -->

	<link href="<?= SITE_URL ?>css/font-awesome.min.css" rel="stylesheet">

	<!-- Owl Carousel css -->

	<link href="<?= SITE_URL ?>assets/css/owl.carousel.min.css" rel="stylesheet">

	<link href="<?= SITE_URL ?>assets/css/owl.transitions.css" rel="stylesheet">

	<!-- Site css -->

	<link href="<?= SITE_URL ?>assets/css/home-style.css" rel="stylesheet">

	<!-- Responsive css -->

	<link href="<?= SITE_URL ?>assets/css/responsive.css" rel="stylesheet">

	<!-- Print  css -->
	<link rel="stylesheet" href="<?= SITE_URL ?>css/print.css" type="text/css" media="print"/>
	
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->

<!--	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->

	

<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>

	<script>

		function validateEmail(emailField) {

			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;



			if (reg.test(emailField.value) == false) {

				alert('Invalid Email Address');

				emailField.value = '';

				return false;

			}



			return true;



		}



	</script>

	<script>

		function mobnumber(inputtxt)

		{

			var mobno = /^\(?([0-9]{5})\)?[-. ]?([0-9]{5})$/;

			if((inputtxt.match(mobno))){

				return true; }

				else {

					alert("The Mobile no entered is invalid");

					return false;

				}

			}


function phonenumber(inputtxt)

{

	var phoneno = /^\(?([0-9]{3,4})\)?[-. ]?([0-9]{6,7})$/;

	if ((inputtxt.value.match(phoneno))) {

		return true;

	} else {

		alert("The landline no entered is invalid, Valid format - (XXXX)-(XXXXXXX)");

		inputtxt.value='';

		return false;

	}

}


	</script>

	<script>

		function validateForm()

		{
		    <?php if ($user_data[0]['approved_status']=='0'){?>
		     if(document.getElementById("proof_of_identity").value==""){
		          alert("Please attach Proof of Identity");
		            document.getElementById("poi_button").focus();
                  return false;
		     }
		     if(document.getElementById("proof_of_address").value==""){
		          alert("Please attach Proof of Address");
		            document.getElementById("poa_button").focus();
                  return false;
		     }
		     if(document.getElementById("ownership_proof").value==""){
		          alert("Please attach ownership Proof");
		            document.getElementById("op_button").focus();
                  return false;
		     }
		     <?php }?>
		    console.log("inside validateform");
		    if(document.getElementById("mode_of_payment_1").value=="Online Payment"){
		         console.log("Online Payment");
		    }else{
		      console.log("reference_number_1 = " + document.getElementById("reference_number_1").value);
		      console.log("payment_date_1 = " + document.getElementById("payment_date_1").value);
		     if(document.getElementById("reference_number_1").value==""){
                                  alert("Please fill in the Cheque/DD/PayOrder#");
                                  document.getElementById("reference_number_1").focus();
                                  return false;
                              }
                               if(document.getElementById("payment_date_1").value==""){
                                  alert("Please fill in the Payment Date");
                                   document.getElementById("payment_date_1").focus();
                                  return false;
                              }
                              
        
		    }
		  // getRecomnderdetails();
          //  document.getElementById("myform").submit();
			return true;

		}

	</script>
<script>
  $( function() {
    $( "#dob" ).datepicker(
        {
         maxDate: "-18Y",
        // dateFormat: 'dd/mm/yy',
         changeYear: true});
         
         $( "#payment_date_1" ).datepicker(
        {
            maxDate: "-1Y",
            maxDate: "+1Y",
         });
         
  } );
  </script>
	<style>

		input, select {
			border-radius: 5px;
		}

		h5 {
			font-size: 14px;
			font-weight: 500;
			padding-left: 0px;
			padding-right: 0px;
		}

		.input-group-btn {

			position: relative;

			font-size: 0;

			white-space: nowrap;

		}



.checkbox-container-main {
  display: block;
  position: relative;
  padding-left: 26px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.checkbox-container-main input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.checkmark {
  position: absolute !important;
  top: 0 !important;
  left: 0 !important;
  height: 18px !important;
  width: 18px !important;
  background-color: #eee;
}

.checkbox-container-main:hover input ~ .checkmark {
  background-color: #ccc;
}


.checkbox-container-main input:checked ~ .checkmark {
  background-color: #37a000;
}


.checkbox-container-main:after {
  content: "";
  position: absolute;
  display: none;
}

.checkbox-container-main input:checked ~ .checkmark:after {
  display: block;
}
.checkbox-container-main .checkmark:after {
  left: 6px;
  top: 3px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

		.btn-file {

			position: relative;

			overflow: hidden;

		}



		.input-group-addon,

		.input-group-btn {

			width: 1%;

			white-space: nowrap;

			vertical-align: middle;

		}



		.input-group-addon,

		.input-group-btn,

		.input-group .form-control {

			display: table-cell;

		}



		.btn-file input[type=file] {

			position: absolute;

			top: 0;

			right: 0;

			min-width: 100%;

			min-height: 100%;

			font-size: 100px;

			text-align: right;

			filter: alpha(opacity=0);

			opacity: 0;

			outline: none;

			background: white;

			cursor: inherit;

			display: block;

		}



		#img-upload {

			max-width: 190px;

			max-height: 140px;

		}


		div {

			position: relative;

			overflow: hidden;

		}



		uploadinput {

			position: absolute;

			font-size: 50px;

			opacity: 0;

			right: 0;

			top: 0;

		}



	</style>

	<style>

		button {

			color: #ffffff;

			font-size: 16px;

			background-color: #37a000;

			padding: 8px 27px;

			font-weight: 500;

			cursor: pointer;

			box-shadow: 0px 2px 7px #ddd;

			-webkit-border-radius: 4px;

			-moz-border-radius: 4px;

			-ms-border-radius: 4px;

			-o-border-radius: 4px;

			border-radius: 4px;

		}

		button.up_button {
			background-color: transparent !important;
			color: #337ab7 !important;
			padding: 0px !important;
			box-shadow: none !important;
			outline: none !important;
		}


		.w3-btn,

		.w3-button {

			border: none;

			display: inline-block;

			padding: 8px 16px;

			vertical-align: right;

			overflow: hidden;

			text-decoration: none;

			color: inherit;

			background-color: inherit;

			text-align: center;

			cursor: pointer;

			white-space: nowrap;

			position: right;

		}



		.w3-white,

		.w3-hover-white:hover {

			color: #37a000 !important;

			background-color: #fff !important;

			margin-top: 2px;



		}



		div.sn-field-header {

			text-align: center;

		}



		div.logo-header {

			margin-top: 2px;

			height: auto;



		}



		.icon {

			position: absolute;

			width: 10px;

			height: 100%;

			top: 0;

			right: 0;

		}



		.sign_in_sec form input,

		.sign_in_sec form select {

			padding: 6px 15px 10px 10px;

		}

		.sign_in_sec form input {
			height: auto;
		}


		.select1 {

			color: #b3a7da !important;

			-webkit-appearance: menulist;

			-moz-appearance: menulist;

		}



		input:required:focus {

			border: 1px solid red;

			outline: none;

		}



		row {

			margin-right: -15px;

			margin-left: -15px;

			border-radius: 4px;

			flex-wrap: wrap;

		}

		.no-padd-side {
			padding-left: 0px;
			padding-right: 0px;
		}

		img {

			max-width: 60%;

			height: auto;

			margin-top: -10px;

			padding-top: 7px;

		}



		/* CSS for styling the form */

		.w3-teal,

		.w3-hover-teal:hover {

			color: #fff !important;

			background-color: #37a000 !important;

		}



		.w3-panel {

			margin-top: 16px;

			margin-bottom: 16px;

		}



		.w3-container,

		.w3-panel {

			padding: 0.01rem 16px;

		}



		.w3-round-large {

			border-radius: 15px;

		}



		.sn-field-1 {

			float: left;

			width: 100%;

			margin-top: 36px;

			margin-bottom: 20px;

			position: relative;

		}

		.m-flex {
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			width: 100% !important;
		}

		@media (max-width: 640px) {
			.d-flex.m-flex {
				display: flex !important;
				width: 100%;
			}

			.d-flex {
				display: flex !important;
				width: auto !important;
			}
		}

		@media (max-width: 768px) {
			.sn-field-1 {
				margin-top: 0px;
			}
		}

		.border-1 {

			border: 1px solid black;

		}

		.passport-col {

			display: flex;

			flex-direction: column;

			height: 100%;

		}

		input::placeholder, select::placeholder {
			font-size: 14px !important;
			font-weight: 500 !important;
		}


		.passport-in {

			flex: 10;

			display: flex;

			align-items: center;

			justify-content: center;

		}



		.passport-in h5 {

			font-size: 15px;

			text-align: center;

		}






		.passport-in input {

			display: none;

			flex: 0;

		}



		.passport-in.show h5 {

			display: none;

		}

		label {

			display: inline-block; 

			max-width: 100%;

			color:black;

			position:left;

			margin-bottom: 5px;

			font-weight: 700;

		}

		.myContainer  {
			border: 1px solid #111;
			margin: 0px auto;
			width: 75%;
		}


		.logo img {
			max-height: 80px;
			width: auto;
		}

		.myWidth, .sn-field .myWidth {
			width: 100px;
			position: relative;
			float: left;
			margin-left: 15px;
			margin-right: 15px;
		}

		@media screen and (min-width: 768px) {
			.myimg {
				position: absolute;
				top: 45px;
				left: 0px;
			}

			.myimg a img {
				width: 130px;
				height: auto;
			}

			.imageContainer {
				display: flex;
				align-items: flex-end; 
				justify-content : center;
				height: 180px; 
				margin-left: auto; 
				margin-top: 30px; 
				width: 150px; 
				border: 1px solid #ccc;
				color: #ccc;
				vertical-align: middle; 
				cursor: pointer;
			}

			.imageContainer img {
				width: 100% !important;
				max-width: 100% !important;
				max-height: 100% !important;
				background-size: cover;				
			}
		}

		.myFlexCont {
			display: flex;
			align-items: center;
			margin-top: 0px;
		}

		@media screen and (max-width: 767px) {
			.myimg {
				position: relative;
				margin-top: 20px;
				width: 100%;
			}

			.imageContainer {
				display: flex;
				align-items: flex-end; 
				justify-content : center;
				height: 180px; 
				margin: auto !important; 
				margin-top: 10px;
				margin-bottom: 20px !important;
				width: 150px; 
				border: 1px solid #ccc;
				color: #ccc;
				vertical-align: middle; 
				cursor: pointer;
			}

			.imageContainer img {
				width: 100% !important;
				max-width: 100% !important;
				max-height: 100% !important;
				background-size: cover;				
			}

			.myimg img {
				max-height: 70px;
			}
			.myContainer {
				width: 100%;
			}

			.myWidth {
				width: 90% !important;
			}

			.myWidth.differ {
				width: 160px !important;
			}
		}
		p{
		    color:black;
		}
		

.inner-img {
  transition: 0.3s;
}

.inner-img:hover {
  transform: scale(1.3);
}

	</style>


</head>


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


<style>

	input:required:focus {

		border: 1px solid red;

		outline: none;

	}
	
	/* Centered text */
.centered {
    width: 100%;
    position: absolute;
    bottom: -1px;
    /* left: 10px; */
    color: #fff;
    background-color: #b3b3b3;

</style>

    <body onload="PrefillDecision();">

	<div class="main" id="divToPrint">

		<div class="container" style="padding: 0px;">

			<div class="sign-in-page" style="padding: 40px 20px;">

				<div class="container" style="padding: 0px;">
					<?php
					    if (isset($_GET['success']) && $_GET['success'] == "true") { ?>

					<div class="col-md-1"></div>
					<div class="col-md-10 text-center mb-3" style="padding-left: 20px; padding-right: 20px;">
						<p class="bg-success" style="border-radius: 5px; color: #fff; padding: 10px;"><i class="fa fa-check"></i> Successfully submitted your form.</p>
					</div>
					<?php
					    }
					?>
					
						<?php
					    if (isset($_GET['paymentfailed']) && $_GET['paymentfailed'] == "true") { ?>
					    
					<div class="col-md-1"></div>
					<div class="col-md-10 text-center mb-3" style="padding-left: 20px; padding-right: 20px;">
						<p class="bg-warning" style="border-radius: 5px; color: #fff; padding: 10px;"> Payment Failed !! Please try again after login.</p>
					</div>

					    <?php }?>

					<div class="myContainer">
                                      		<div class="col-lg-12">

<div class="login-sec">

								<div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-left logo">
									<a href="index.php"><img src="./images/logo_google_form.png" /></a>
								</div>       

								<div class="col-lg-12 order-md-1 order-sm-2 order-2 text-center mt-3 mb-0 mb-md-3 no-pdd">

									<div class="sn-field-header">
										<h4>FORM - X</h4>
										<h4><u>Application form for membership of NRWA</u></h4>

									</div>

								</div>

							



                  <div class="sign_in_sec col-md-12 p-0" style="display:block;" >
                      	<form method="post" id="myform" name="myform" enctype="multipart/form-data" action="<?php echo SITE_URL;?>controller/membershipaction.php" onsubmit="return validateForm();">
        
                            	<div class="col-lg-12 no-padd-side">
                            	    <?php if(count($user_data) > 0 && isset($user_data[0]['approved_status']) && $user_data[0]['approved_status']!="0"){?>
                            	    <div class="col-md-3"></div>
                                    <div class="col-md-6" style="text-align:center;background-color: #00B246;color:#FFF; border-radius:5px;">
                                        <?php if ($user_data[0]['approved_status']=='Pending' && $user_data[0]['recc_approved']=='No'){?>
                                	 <h5 style="color: #FFF"> <?php  echo "Current Status : Pending Recommender Approval" ;?></h5>
                                	 <?php } else {?>
                                	 <h5 style="color: #FFF"> <?php  echo "Current Status : " .$user_data[0]['approved_status'];?></h5>
                                	 <?php }?>
                                	</div>
                                	  <div class="col-md-4"></div>
                                    <?php }?>
									<div class="col-lg-9" id="top">

										<h5>To,</h5>
                                        <p>The President/Secretary<br>
										Nirvana Residents Welfare Association
										<br>
										<span style="text-decoration:underline">Gurgaon </span></p>
                                    	<h5><b>Serial No: </b><note style="text-decoration:underline"><?php if(count($user_data) > 0){
                                    	    echo $user_data[0]['serialno'];
                                    	}else {echo $serialno;}?><br/></br></note></h5>
										<h5><b>Subject :</b> <note style="text-decoration:underline">Application for admission as a Member of the NRWA Society. <br/></br></note></h5>

										<h5>Dear Sir,</h5>

										<h5>I wish to apply for admission as a member of NRWA. My brief particular(s) are as under:</br></br>

										</h5>

									</div>
									<div class="col-md-3 col-sm-12 text-center">
									    	<div style="width: 0px; height: 0px;">
                  						<input type="file" name="photograph_user" id="photograph_user" accept="image/*"     
                  						<?php if((count($user_data)> 0) && ($user_data[0]['photograph_user']=='')){?> required <?php }?> >
                  						</div>
										<div class="imageContainer" id="app_1_photo_big_frame" onclick="handlePhoto('photograph_user', 'photo_container_1')">
										    <?php if((count($user_data) > 0) && ($user_data[0]['photograph_user']!="")){?>
										    	<img class="inner-img" src="<?= SITE_URL.$user_data[0]['photograph_user']; ?>"  id="photo_container_1" style="vertical-align: middle;align-self: center;">
										    	<?php } else {?>
											<img class="inner-img" src="<?= SITE_URL ?>images/photo_label.png"  id="photo_container_1" style="vertical-align: middle;align-self: center;">
											<?php }?>
										<div class="centered" id="photograph_user_image_label">Attach Your Photo</div>
									
										</div>

										<!-- <div class="imageContainer hidden" id="app_2_photo_big_frame" onclick="handlePhoto('photograph_user_2', 'photo_container_2')">
											<img src="<?= SITE_URL ?>images/photo_label.png" id="photo_container_2">
											<div class="centered" id="">Attach Your Photo</div>
										</div> -->
											
									</div>

                  				</div>
                  
                  			<input type="hidden" name="ActionCall" value="uploadDocuments">
	                        <input type="hidden" name="userid" value="<?= (count($user_data) > 0) ? $user_data[0]['userid'] : $_SESSION['UR_LOGINID'] ?>">
                  			<input type="hidden" name="serialno" id="serialno" value="<?= (count($user_data) > 0) ? $user_data[0]['serialno'] : $serialno ?>">
	                        <input type="hidden" name="applicationid" id="applicationid" value="<?php echo $user_data[0]['id'];?>">
                             <input type="hidden"  name="txnid" id="txnid"  value="<?php echo (empty($posted['txnid'])) ? substr(md5(mt_rand()), 0, 8)  : $posted['txnid']; ?>"/>

                  			<!-- <input type="hidden" name="ActionCall" value=""> -->

                  			<div class="col-md-12 p-0" id="form_section_1">
                  				<h5 class="pl-4 hidden show_label_hint mb-3"><b>Applicant 1 :</b></h5>
                  				<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                  				<div class="myWidth no-pdd">

                  					<div class="sn-field">

                  						<select id="title_1" name="title_1" required onchange="specifyTitleShow(this, 'tenant_other_title')">

                  							<option value="Mr." <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_1'] == "Mr.") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Mr.</option>

                  							<option value="Mrs."  <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_1'] == "Mrs.") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Mrs.</option>

                  							<option value="Ms."  <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_1'] == "Ms.") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Ms.</option>

                  							<!--<option value="other"  <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_1'] == "other") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Other</option>-->


                  						</select>

                  					</div>

                  				</div>

                  				<div class="myWidth hidden" style="width: 100px;" id="tenant_other_title">

                  					<div class="sn-field" >

                  						<input type="text"  name="tenant_other_title" id="tenant_other_title" placeholder="Specify" value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['tenant_other_title']) : '' ?>">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>

                  				<div class="myWidth" style="width: 165px;">

                  					<div class="sn-field" >

                  						<input type="text" required onkeydown="checklogin();" name="tenant_first_name" id="tenant_first_name" placeholder="Applicant First Name" value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['tenant_first_name']) : '' ?>">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>

                  				<div class="myWidth" style="width: 165px;">

                  					<div class="sn-field" >

                  						<input type="text"  name="tenant_middle_name" id="tenant_middle_name" placeholder="Applicant Middle Name" value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['tenant_middle_name']) : '' ?>">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>

                  				<div class="myWidth" style="width: 165px;">

                  					<div class="sn-field">

                  						<input type="text" required name="tenant_last_name" id="tenant_last_name"  placeholder=" Applicant Last Name" value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['tenant_last_name']) : '' ?>" onblur="PrefillDecision();">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>
                  			</div>

                  			<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                  				<div class="myWidth no-pdd">

                  					<div class="sn-field">

                  						<select id="title_2" required name="title_2" onchange="specifyTitleShow(this, 'father_other_title')">


                  							<option value="Mr." <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_2'] == "Mr.") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Mr.</option>

                  							<option value="Mrs."  <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_2'] == "Mrs.") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Mrs.</option>

                  							<option value="Ms."  <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_2'] == "Ms.") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Ms.</option>

                  							<!--<option value="other"  <?php if (count($user_data) > 0) {
                  								if ($user_data[0]['title_2'] == "other") { ?>
                  									selected
                  									<?php
                  								}
                  							} ?> >Other</option>-->
                  						</select>

                  					</div>

                  				</div>

                  				<div class="myWidth hidden" style="width: 100px;" id="father_other_title">

                  					<div class="sn-field" >

                  						<input type="text" name="father_other_title" id="father_other_title" placeholder="Specify" value="<?= (count($user_data) > 0) ? $user_data[0]['father_other_title'] : '' ?>">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>

                  				<div class="myWidth" style="width: 165px;">

                  					<div class="sn-field">

                  						<input type="text" required value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['father_first_name']) : '' ?>" name="father_first_name"  id="father_first_name"

                  						oninvalid="this.setCustomValidity('')"

                  						oninput="this.setCustomValidity('')" value="" placeholder="Father's First Name">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>

                  				<div class="myWidth" style="width: 165px;">

                  					<div class="sn-field">

                  						<input type="text" value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['father_middle_name']) : '' ?>" name="father_middle_name"  id="father_middle_name"

                  						oninvalid="this.setCustomValidity('')"

                  						oninput="this.setCustomValidity('')" placeholder="Father's Middle Name">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>

                  				<div class="myWidth" style="width: 165px;">

                  					<div class="sn-field">

                  						<input type="text"  onblur="PrefillDecision();"  required name="father_last_name" value="<?= (count($user_data) > 0) ? ucwords($user_data[0]['father_last_name']) : '' ?>" id="father_last_name"

                  						oninvalid="this.setCustomValidity('father_last_name')"

                  						oninput="this.setCustomValidity('')" value="" placeholder="Father's Last Name">

                  						<!-- <i class="la la-user"></i>-->

                  					</div>

                  				</div>
                  			</div>
                  			<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;"> <h5 style="padding-left: 15px;"> Address of the House for which I am applying for membership</h5></div>
                              
                  			<div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                  				<div class="myWidth" style="width: 100px;">
                  					<div class="sn-field">
                  						<select name="block_prime" id="block_prime" onblur="PrefillDecision();" required>
                  						    <?php 
                  						     if(count($user_data) > 0) {
                  						     	?>
                  							<option value="" disabled>Block</option>
                  							<option value="1" <?php if ($user_data[0]['block_prime'] == "1") { ?> selected <?php } ?>>AG</option>
                  							<option value="2" <?php if ($user_data[0]['block_prime'] == "2") { ?> selected <?php } ?>>BC</option>
                  							<option value="3" <?php if ($user_data[0]['block_prime'] == "3") { ?> selected <?php } ?>>CC</option>
                  							<option value="4" <?php if ($user_data[0]['block_prime'] == "4") { ?> selected <?php } ?>>DW</option>
                  							<option value="5" <?php if ($user_data[0]['block_prime'] == "5") { ?> selected <?php } ?>>ES</option>
                  						     	<?php
                  						     } else { ?>
                  							<option  value="" disabled selected>Block</option>
                  							<option value="1">AG</option>
                  							<option value="2">BC</option>
                  							<option value="3">CC</option>
                  							<option value="4">DW</option>
                  							<option value="5">ES</option>
                  						     <?php } ?>
                  						</select>
                  					</div>
                  				</div>
                  				<div class="myWidth" style="width: 100px;">
                  					<div class="sn-field">
                  						<input type="text"  onblur="PrefillDecision();" required maxlength="4" name="house_number" id="house_number"  onkeypress="return isNumberKey(event);"  value="<?= (count($user_data) > 0) ? $user_data[0]['house_number'] : '' ?>"  placeholder="House #">
                  					</div>
                  				</div>
                  				<div class="myWidth" style="width: 100px;">
                  					<div class="sn-field">
                  						<select name="floor_prime" id="floor_prime" required onblur="PrefillDecision();">
                  							<?php 
                  							   if (count($user_data) > 0) { ?>
                  							<!--<option value="Villa" <?php if ($user_data[0]['floor_prime'] == 'Villa') { ?> selected <?php } ?>>Villa</option>-->
                  							<option value="GF" <?php if ($user_data[0]['floor_prime'] == 'GF') { ?> selected <?php } ?>>GF</option>
                  							<option value="FF" <?php if ($user_data[0]['floor_prime'] == 'FF') { ?> selected <?php } ?>>FF</option>
                  							<option value="SF" <?php if ($user_data[0]['floor_prime'] == 'SF') { ?> selected <?php } ?>>SF</option>
                  							<option value="TF" <?php if ($user_data[0]['floor_prime'] == 'TF') { ?> selected <?php } ?>>TF</option>
                  							<?php
                  							   } else {
                  							?>
                  							<option  value="" disabled selected>Floor</option>
                  							<!--<option value="Villa" >Villa</option>-->
                  							<option value="GF">GF</option>
                  							<option value="FF">FF</option>
                  							<option value="SF">SF</option>
                  							<option value="TF">TF</option>
                  						<?php } ?>
                  						</select>
                  					</div>
                  				</div>
                  				Nirvana Country, Gurgaon, 122018
                  			</div>
	<div class="pagebreak"> </div>
                  				<?php if (!isset($_GET['fid'])) { ?>
                  				<div class="col-md-12 mb-4">
                  					<label class="checkbox-container-main" for="filltoo" style="display: inline; font-size: 14px; font-weight: 500; color: #333333;">
                  				My current place of residence (Correspondence Address) is the same as above. 
                  					<input onchange="toggleCorr()" checked type="checkbox" value="" name="filltoo" id="filltoo" style="width: 18px; height: 8px;"> <span class="checkmark"></span></label>
                  				</div>
                  			<?php } ?>

                  			<?php if (isset($_GET['fid']) && ($user_data[0]['address_corres_1'] != '' || $user_data[0]['address_corres_2'] != '' || $user_data[0]['city'] != '' || $user_data[0]['state'] != '' || $user_data[0]['pin'] != '')) { ?>
                  				<div id="corress_address" class=" mt-4 pl-0" style="height: auto; width: 100%; overflow: hidden;">
                  		    <?php } else { ?>
                  				<div id="corress_address" class=" mt-4 pl-0" style="height: 0px; width: 0px; overflow: hidden;">
                  		    <?php } ?>
                  					
                  					<div class="col-lg-12">
                  						<div class="sn-field">
                  							<input type="text" name="address_corres_1" id="address_corres_1" placeholder="Address line 1" value="<?= (count($user_data) > 0) ? $user_data[0]['address_corres_1'] : '' ?>">
                  						</div>
                  					</div>
                  					<div class="col-lg-12">
                  						<div class="sn-field">
                  							<input type="text" name="address_corres_2" id="address_corres_2" placeholder="Address line 2" value="<?= (count($user_data) > 0) ? $user_data[0]['address_corres_2'] : '' ?>">
                  						</div>
                  					</div>
                  					<div class="col-lg-4">
                  						<div class="sn-field">
                  							<input type="text" name="city" id="city" placeholder="City" value="<?= (count($user_data) > 0) ? $user_data[0]['city'] : '' ?>">
                  						</div>
                  					</div>
                  					<div class="col-lg-4">
                  						<div class="sn-field">
                  							<input type="text" name="state"  id="state" placeholder="State" value="<?= (count($user_data) > 0) ? $user_data[0]['state'] : '' ?>">
                  						</div>
                  					</div>
                  					<div class="col-lg-4">
                  						<div class="sn-field">
                  							<input type="text" name="pin"  id="pin" placeholder="Pin" value="<?= (count($user_data) > 0) ? $user_data[0]['pin'] : '' ?>">
                  						</div>
                  					</div>
                  				</div>

                  				<div class="col-lg-4 no-pdd">

                  					<div class="sn-field">
                                        <?php 
                                        $Year =  date("Y") - 18;
                                        $MinDate = date("$Year-m-d");
                                        ?>
                  						<!-- <label>Floor Number <strong style="color:#FF0000;"></strong></label> -->
                  						
                  						<input type="text" onchange="getAge(this.value);"  name="dob" id="dob" value="<?= (isset($user_data[0]['dob'])) ? $user_data[0]['dob'] : '' ?>"
                                        oninvalid="this.setCustomValidity('dob')" oninput="this.setCustomValidity('')" autocomplete="off"	placeholder="Date of Birth (mm/dd/yyyy)" >
                                        
                                    	<!--<input type="text" onfocus="(this.type='date')" onblur="getAge(this.value);(this.type='text');" max="<?php echo $MinDate; ?>" -->
                                    	<!--value="<?= (count($user_data) > 0) ? $user_data[0]['dob'] : '' ?>" name="dob" id="dob"-->
                                     <!--   oninvalid="this.setCustomValidity('dob')" oninput="this.setCustomValidity('')"	placeholder="Date of Birth" required>-->

                  					</div>

                  				</div>

                  				<div class="col-lg-4 no-pdd">

                  					<div class="sn-field">

                  					<input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['occupation'] : '' ?>" name="occupation" id="occupation"

                  						oninvalid="this.setCustomValidity('occupation')" oninput="this.setCustomValidity('')"
                  						placeholder="Occupation">

                  						<!--<i class="la la-user"></i> -->

                  					</div>

                  				</div>

                  				<div class="col-lg-4 no-pdd">

                  					<div class="sn-field">

                  						<input type="email" required value="<?= (count($user_data) > 0) ? $user_data[0]['emailid_1'] : '' ?>" name="emailid_1" id="emailid" onblur="validateEmail(this);"

                  						oninvalid="this.setCustomValidity('emailid_1')"

                  						oninput="this.setCustomValidity('')" placeholder="Email Address">

                  						<!--<i class="la la-envelope" aria-hidden="true"></i> -->

                  					</div>

                  				</div>
                  				<div class="col-lg-12"></div>

                  				<div class="col-lg-6 no-pdd">

                  					<div class="sn-field">

                  						<table>

                  							<tbody>

                  								<tr>

                  									<!-- <td width="5%">+</td> -->

                  									<td width="20%"><input type="text" name="isd_1" id="isd_1" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_1'] : '+91' ?>" placeholder="+91"

                  										maxlength="3" readonly></td>

                  										<td width="80%"> <input type="text"  required name="mobile" id="mobile" value="<?= (count($user_data) > 0) ? $user_data[0]['mobile'] : '' ?>" 	oninvalid="this.setCustomValidity('')"

                  											oninput="this.setCustomValidity('')"  onkeypress="return isNumberKey(event);" 
                  											maxlength="10" placeholder="Mobile" value="" onblur="mobnumber(this.value);" ></td>

                  										</tr>

                  									</tbody>

                  								</table>

                  							</div>

                  						</div>

                  						<div class="col-lg-6 no-pdd">

                  							<div class="sn-field">

                  								<table width="100%">

                  									<tbody>

                  										<tr>

                  											<!-- <td width="5%">+</td> -->
                                                            <td width="20%"><input type="text" name="isd_1" id="isd_landline" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_1'] : '+91' ?>" placeholder="+91"

                  										maxlength="3" readonly></td>
                  											<td width="20%"><input type="text" onkeypress="return isNumberKey(event);" name="isd_2" id="isd_2" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_2'] : '' ?>" placeholder="Std"

                  												maxlength="4">

                  											</td>

                  											<td width="60%"> <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['phone'] : '' ?>" name="phone" id="phone" pattern=".{6,}" oninvalid="this.setCustomValidity('')"

                  												oninput="this.setCustomValidity('')" onkeypress="return isNumberKey(event);"

                  												maxlength="8" placeholder="Landline" value="" ></td>

                  											</tr>

                  										</tbody>

                  									</table>

                  								</div>

                  							</div>
                  						
                  				<div class="pagebreak"> </div>			
                  							<div  class="col-lg-12"> 
                  								<?php if(!isset($_GET['fid'])) { ?>
                                              <hr style="margin-top: 10px; border-color: #bbb;">
                  							  <h5> I am enclosing herewith the following Documents:</h5>
                  							  <div class="table table-responsive d-none d-sm-none d-md-block">
                  							     
                                                   <table class="table table-striped custom-table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th  scope="col" class="text-center" >Document Type</th>
                                                            <th  scope="col" class="text-center" >Document Name </th>
                                                            <th  scope="col" class="text-center">Upload</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <tr>
                                                              <td> Copy of Identity Proof </td>
                                                              
                                                                <td>
                                                                  <div class="myWidth differ" style="width: 140px; display: inline-block; float: left;">
                          									     	<select name="doc_type_poi" onchange="specifyTitleShow(this, 'poi_other_title');fixValues('doc_type_poi','doc_type_poi1');">
                          									     		<option value="Passport" <?php if ($user_data[0]['doc_type_poi'] == 'Passport') { ?> selected <?php } ?>>Passport</option>
                          									     		<option value="Aadhar Card" <?php if ($user_data[0]['doc_type_poi'] == 'Aadhar Card') { ?> selected <?php } ?>>Aadhar Card</option>
                          									     		<option value="Driving Licence" <?php if ($user_data[0]['doc_type_poi'] == 'Driving Licence') { ?> selected <?php } ?>>Driving Licence</option>
                          									     		<option value="Voter ID" <?php if ($user_data[0]['doc_type_poi'] == 'Voter ID') { ?> selected <?php } ?>>Voter ID</option>
                          									     	<option value="other" <?php if ($user_data[0]['doc_type_poi'] == 'other') { ?> selected <?php } ?>>Other</option>
                          									     	</select>
                          									     </div>
                          									        <div class="myWidth <?php if ($user_data[0]['doc_type_poi'] != 'other') { ?>hidden<?php } ?>" style="width: 100px; float: left;" id="poi_other_title">
                                                                       <input type="text" name="poi_other_title" id="poi_other_title" placeholder="Specify" value="<?= (count($user_data) > 0) ? $user_data[0]['poi_other_title'] : '' ?>" 
                                                                       onchange="fixValues('poi_other_title','poi_other_title1');">
                                                                    </div>
                          									    </td>
                                                              <td class="text-center">
                                                                 <?php if((count($user_data) > 0) && ($user_data[0]['proof_of_identity']!='')){?>
                                                                <a href="<?php echo SITE_URL.$user_data[0]['proof_of_identity'];?>" target="_blank"  style="float:left;"> View Current </a>
                                                               <span style="float:left;">&nbsp;OR&nbsp;</span>
                                                                <?php }?>
                          									    <button type="button" id="poi_button" class="mt-0" style="float:left; width: 40px; margin-left: 10px; padding-right: 0px; 
                                                                height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: 
                                                                no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('proof_of_identity', false)"></button>
                                                              	<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" 
                                                              	onclick="openFileExp('proof_of_identity', true)"  style="background-color: #fff; padding: 0px; box-shadow: none;padding-top:7px">
                                                              	    <i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i>
                                                              	</button>
              		                                             <small id="proof_of_identity_label" style="width: 0px; height: 0px; margin-top: 0px;"></small>
                                                                 </td>
                                                          </tr>
                                                          <tr>
                                                              <td> Copy of Address Proof</td>
                                                                <td >
                                                                  <div class="myWidth differ" style="width: 140px; display: inline-block; float: left;">
                          									     	<select name="doc_type_poa"  onchange="specifyTitleShow(this, 'poa_other_title');fixValues('doc_type_poa','doc_type_poa1');">
                          									     		<!--<option value="Passport">Passport</option>-->
                          									     		<!--<option value="Aadhar Card">Aadhar Card</option>-->
                          									     		<!--<option value="Driving Licence">Driving Licence</option>-->
                          									     		<!--<option value="Voter ID">Voter ID</option>-->
                          									     			<option value="Electricity bill" <?php if ($user_data[0]['doc_type_poa'] == 'Electricity bill') { ?> selected <?php } ?>>Electricity bill</option>
                          									     		<option value="Property Tax Challan" <?php if ($user_data[0]['doc_type_poa'] == 'Property Tax Challan') { ?> selected <?php } ?>>Property Tax Challan</option>
                          									     		<option value="Water Bill" <?php if ($user_data[0]['doc_type_poa'] == 'Water Bill') { ?> selected <?php } ?>>Water Bill</option>
                          									     	<option value="other" <?php if ($user_data[0]['doc_type_poa'] == 'other') { ?> selected <?php } ?>>Other</option>
                          									     	</select>
                          									     </div>
                          									       <div class="myWidth <?php if ($user_data[0]['doc_type_poa'] != 'other') { ?>hidden<?php }?>" style="width: 100px; float: left;" id="poa_other_title">
                                                               <input type="text" name="poa_other_title" id="poa_other_title" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['poa_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('poa_other_title','poa_other_title1');">
                                                            </div> 
                          									    </td>
                                                              <td class="text-center">
                                                                  <div style="width: 0px; height: 0px;">
                          										    <input type="file" name="proof_of_address" id="proof_of_address" accept='image/*' 
                          										    <?php if((count($user_data)> 0) && ($user_data[0]['proof_of_address']=='')){?>  <?php }?>  />
                          									    </div>
                          									     <?php if((count($user_data) > 0) && ($user_data[0]['proof_of_address']!='')){?>
                                                                <a href="<?php echo SITE_URL.$user_data[0]['proof_of_address'];?>" target="_blank"  style="float:left;"> View Current </a>
                                                               <span style="float:left;">&nbsp;OR&nbsp;</span>
                                                                <?php }?>
                          									    <button type="button" id="poa_button" class="mt-0" style="float:left; width: 40px; margin-left: 10px; 
                          									    padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); 
                          									    background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" 
                          									    onclick="openFileExp('proof_of_address', false)"></button>
              									                 <button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" 
              									                 onclick="openFileExp('proof_of_address', true)"  style="background-color: #fff; padding: 0px; box-shadow: none;padding-top:7px">
              									                     <i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              									      
              									                  <small id="proof_of_address_label" style="width: 0px; height: 0px; margin-top: 0px;"></small>
                                                                 </td>
                                                          </tr>
                                                          <tr>
                                                              <td> Copy of DOB Proof</td>
                                                                <td>
                                                                  <div class="myWidth differ" style="width: 140px; display: inline-block; float: left;">
                          									     	<select name="doc_type_pdob"  onchange="specifyTitleShow(this, 'pdob_other_title');fixValues('doc_type_pdob','doc_type_pdob1');">
                          									     		<option value="Passport" <?php if ($user_data[0]['doc_type_pdob'] == 'Passport') { ?> selected <?php } ?>>Passport</option>
                          									     		<option value="Aadhar Card" <?php if ($user_data[0]['doc_type_pdob'] == 'Aadhar Card') { ?> selected <?php } ?>>Aadhar Card</option>
                          									     		<option value="Driving Licence" <?php if ($user_data[0]['doc_type_pdob'] == 'Driving Licence') { ?> selected <?php } ?>>Driving Licence</option>
                          									     		<option value="Voter ID" <?php if ($user_data[0]['doc_type_pdob'] == 'Voter ID') { ?> selected <?php } ?>>Voter ID</option>
                          									     	<option value="other" <?php if ($user_data[0]['doc_type_pdob'] == 'other') { ?> selected <?php } ?>>Other</option>
                          									     	</select>
                          									     </div>
                          									     <div class="myWidth <?php if ($user_data[0]['doc_type_pdob'] != 'other') { ?>hidden<?php } ?>" style="width: 100px; float: left;" id="pdob_other_title">
                                                               <input type="text" name="pdob_other_title" id="pdob_other_title" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['pdob_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('pdob_other_title','pdob_other_title1');">
                                                            </div>  
                          									    </td>
                                                              <td class="text-center">
                                                                  <div style="width: 0px; height: 0px;">
                  										         <input type="file" name="proof_of_dob" accept='image/*' id="proof_of_dob" />
                  									                </div>
                  									                  <?php if((count($user_data) > 0) && ($user_data[0]['proof_of_dob']!='')){?>
                                                                <a href="<?php echo SITE_URL.$user_data[0]['proof_of_dob'];?>" target="_blank"  style="float:left;"> View Current </a>
                                                               <span style="float:left;">&nbsp;OR&nbsp;</span>
                                                                <?php }?>
                          									    <button type="button" class="mt-0" style="float:left;  width: 40px; margin-left: 10px; 
                                                     padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); 
                                                     background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" 
                                                     onclick="openFileExp('proof_of_dob', false)"></button>
                                                    	<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" 
                                                    	onclick="openFileExp('proof_of_dob', true)"  style="background-color: #fff; padding: 0px; box-shadow: none;padding-top:7px">
                                                    	    <i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              									     
                                                                  <small id="proof_of_dob_label" style="width: 0px; height: 0px; margin-top: 0px;"></small>
                                                                 </td>
                                                          </tr>
                                                          <tr>
                                                              <td> Copy of Ownership Proof</td>
                                                                <td>
                                                                  <div class="myWidth differ" style="width: 175px; display: inline-block; float: left;">
                          									     	<select name="doc_type_ownership"   onchange="specifyTitleShow(this, 'ownership_other_title');fixValues('doc_type_ownership','doc_type_ownership1');">
                          									     		<option value="ConveyenceDeed"  <?php if ($user_data[0]['doc_type_ownership'] == 'ConveyenceDeed') { ?> selected <?php } ?>>Conveyence Deed</option>
                          									     		<option value="Relinquishment Deed"  <?php if ($user_data[0]['doc_type_ownership'] == 'Relinquishment Deed') { ?> selected <?php } ?>>Relinquishment Deed</option>
                          									     		<option value="Gift Deed"  <?php if ($user_data[0]['doc_type_ownership'] == 'Gift Deed') { ?> selected <?php } ?>>Gift Deed</option>
                          									     			<option value="Mutation Deed"  <?php if ($user_data[0]['doc_type_ownership'] == 'Mutation Deed') { ?> selected <?php } ?>>Mutation Deed</option>
                          									     		<option value="other"  <?php if ($user_data[0]['doc_type_ownership'] == 'other') { ?> selected <?php } ?>>Other</option>
                          									     	
                          									     	</select>
                          									     </div>
                          									     	<div class="myWidth <?php if ($user_data[0]['doc_type_ownership'] != 'other') { ?>hidden<?php }?>" style="width: 100px; float: left;" id="ownership_other_title">
                                                               <input type="text" name="ownership_other_title" id="ownership_other_title" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['ownership_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('ownership_other_title','ownership_other_title1');">
                                                            </div> 
                          									    </td>
                                                              <td class="text-center">
                                                                  <div style="width: 0px; height: 0px;">
                  										            <input type="file" name="ownership_proof" accept='image/*' id="ownership_proof" 
                  										            <?php if((count($user_data)> 0) && ($user_data[0]['ownership_proof']=='')){?>  <?php }?> />
                  									                </div>
                  									                    <?php if((count($user_data) > 0) && ($user_data[0]['ownership_proof']!='')){?>
                                                                <a href="<?php echo SITE_URL.$user_data[0]['ownership_proof'];?>" target="_blank"  style="float:left;"> View Current </a>
                                                               <span style="float:left;">&nbsp;OR&nbsp;</span>

                                                                <?php }?>
                          									     <button type="button" id="op_button" class="mt-0" style="float:left; width: 40px; margin-left: 10px; padding-right: 0px; 
                                                            height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; 
                                                            background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" 
                                                            onclick="openFileExp('ownership_proof', false)"></button>
                                                           	<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" 
                                                           	onclick="openFileExp('ownership_proof', true)" style="background-color: #fff; padding: 0px; box-shadow: none;padding-top:7px">
                                                           	    <i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              									     
                                                                 <small id="ownership_proof_label" style="width: 0px; height: 0px; margin-top: 0px;"></small>
                                                                 </td>
                                                          </tr>
                                                      </tbody>
                  							    </table>
                  							   </div>
                  							     <div style="width: 0px; height: 0px;">
                          										    <input type="file" id="proof_of_identity" name="proof_of_identity" accept='image/*' 
                          										    <?php if((count($user_data)> 0) && ($user_data[0]['proof_of_identity']=='')){?>  <?php }?> />
                          									    </div>
                  							<!--<ul type="i" style="padding-left: 10px;">-->
                  							<!--  	<li class="d-md-none d-lg-none d-xl-none">-->
              										<!--<div style="width: 0px; height: 0px;">-->
              									 <!--   <input type="file" id="proof_of_identity" name="proof_of_identity" accept='image/*' required />-->
              								  <!--      </div>-->
              									    <!-- <div class="d-none d-sm-none d-md-block">
              									     <h5 class="myFlexCont" class> Copy of Identity Proof 
              									     <div class="myWidth differ" style="width: 140px; display: inline-block; float: none;">
              									     	<select name="doc_type_poi" onchange="specifyTitleShow(this, 'poi_other_title')">
              									     		<option value="Passport">Passport</option>
              									     		<option value="Aadhar Card">Aadhar Card</option>
              									     		<option value="Driving Licence">Driving Licence</option>
              									     		<option value="Voter ID">Voter ID</option>
              									     	<option value="other">Other</option>
              									     	</select>
              									     </div>
              									     <div class="myWidth hidden" style="width: 100px; float: none;" id="poi_other_title">
                                                       <input type="text" name="poi_other_title" id="poi_other_title" placeholder="Specify" value="<?= (count($user_data) > 0) ? $user_data[0]['doc_type_other_title'] : '' ?>">
                                                    </div>  
                                                    <button type="button" class="mt-0" style="background-color: red; width: 40px; margin-left: 10px; padding-right: 0px; 
                                                    height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: 
                                                    no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('proof_of_identity', false)"></button>
                                                    <?php if((count($user_data) > 0) && ($user_data[0]['proof_of_identity']!='')){?> Current Uploaded File - <?php echo $user_data[0]['proof_of_identity'];?><?php }?>
              									     
                                                    </h5>
              									    </div>-->
              									    	
              									    <div class="d-md-none d-lg-none d-xl-none">
              									     	<div class="row">
              									     		<div class="col-3">
              									     			<h5>Identity Proof </h5>
              									     		</div>
              									     		<div class="col-5">
              									     			<select name="doc_type_poi1" onchange="specifyTitleShow(this, 'poi_other_title1');fixValues('doc_type_poi1','doc_type_poi');">
		              									     		<option value="Passport" <?php if ($user_data[0]['doc_type_poi'] == 'Passport') { ?> selected <?php } ?>>Passport</option>
                          									     		<option value="Aadhar Card" <?php if ($user_data[0]['doc_type_poi'] == 'Aadhar Card') { ?> selected <?php } ?>>Aadhar Card</option>
                          									     		<option value="Driving Licence" <?php if ($user_data[0]['doc_type_poi'] == 'Driving Licence') { ?> selected <?php } ?>>Driving Licence</option>
                          									     		<option value="Voter ID" <?php if ($user_data[0]['doc_type_poi'] == 'Voter ID') { ?> selected <?php } ?>>Voter ID</option>
                          									     	<option value="other" <?php if ($user_data[0]['doc_type_poi'] == 'other') { ?> selected <?php } ?>>Other</option>
		              									     	</select>
              									     		</div>
              									     		<button type="button" id="poi_button" class="mt-0" style="background-color: red; width: 35px; margin-left: 0px; padding-right: 0px; 
              									     		height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; 
              									     		background-position-x: 50%; box-shadow: none;" onclick="openFileExp('proof_of_identity', false)"></button>
              											<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" onclick="openFileExp('proof_of_identity', true)" 
              											style="background-color: #fff; padding: 0px; box-shadow: none;"><i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              		                                    <div class="col-6 hidden" style="width: 100px;padding-top:10px;" id="poi_other_title1">
                                                               <input type="text" name="poi_other_title1" id="poi_other_title1" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['poi_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('poi_other_title1','poi_other_title');">
                                                            </div>
                                                           
              									     	</div>
              									     	 <p id="proof_of_identity_label1" style="width: 0px; height: 0px; margin-top: 0px;"></p>
              									     </div>
              									     
              									<!--	</li>-->
              									<!--<li class="d-md-none d-lg-none d-xl-none">-->
                  										<!--<div style="width: 0px; height: 0px;">-->
                  										<!--    <input type="file" name="proof_of_address" id="proof_of_address" accept='image/*' required />-->
                  									 <!--   </div>-->
                  									    <!--<div class="d-none d-sm-none d-md-block">
                  									   <h5 class="myFlexCont" class> Copy of Address Proof 
                  									   <div class="myWidth differ" style="width: 140px; display: inline-block; float: none;">
              									     	<select name="doc_type_poa"  onchange="specifyTitleShow(this, 'poa_other_title')">
              									     		<option value="Passport">Passport</option>
              									     		<option value="Aadhar Card">Aadhar Card</option>
              									     		<option value="Driving Licence">Driving Licence</option>
              									     		<option value="Voter ID">Voter ID</option>
              									     	<option value="other">Other</option>
              									     	</select>
              									     </div>	
              									     <div class="myWidth hidden" style="width: 100px; float: none;" id="poa_other_title">
                                                               <input type="text" name="poa_other_title" id="poa_other_title" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['poa_other_title'] : '' ?>" style="height: 40px;">
                                                            </div> 
              									     <button type="button" class="mt-0" style="background-color: red; width: 40px; margin-left: 10px; padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('proof_of_address', false)"></button>
              									     <?php if((count($user_data) > 0) && ($user_data[0]['proof_of_address']!='')){?> Current Uploaded File - <?php echo $user_data[0]['proof_of_address'];?><?php }?>
              									     </h5>
              
              									    </div>-->
              									    <div class="d-md-none d-lg-none d-xl-none">
              									     	<div class="row">
              									     		<div class="col-3">
              									     			<h5> Address Proof</h5>
              									     		</div>
              									     		<div class="col-5">
              									     			<select name="doc_type_poa1"  onchange="specifyTitleShow(this, 'poa_other_title1');fixValues('doc_type_poa1','doc_type_poa');">
		              									     				<option value="Electricity bill" <?php if ($user_data[0]['doc_type_poa'] == 'Electricity bill') { ?> selected <?php } ?>>Electricity bill</option>
                          									     		<option value="Property Tax Challan" <?php if ($user_data[0]['doc_type_poa'] == 'Property Tax Challan') { ?> selected <?php } ?>>Property Tax Challan</option>
                          									     		<option value="Water Bill" <?php if ($user_data[0]['doc_type_poa'] == 'Water Bill') { ?> selected <?php } ?>>Water Bill</option>
                          									     	<option value="other" <?php if ($user_data[0]['doc_type_poa'] == 'other') { ?> selected <?php } ?>>Other</option>
		              									     	</select>
              									     		</div>
              									     		
              									     		<!--<div class="col-12">-->
              									     		<!--	 towards  proof of address -->
              									     		<!--</div>-->
              									     		<button type="button" id="poa_button" class="mt-0" style="background-color: red; width: 35px; margin-left: 0px; padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('proof_of_address', false)"></button>
              											<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" onclick="openFileExp('proof_of_address', true)" style="background-color: #fff; padding: 5px; box-shadow: none;"><i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              									     	<div class="col-5 hidden" style="width: 100px;padding-top:10px;" id="poa_other_title1">
                                                               <input type="text" name="poa_other_title1" id="poa_other_title1" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['poa_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('poa_other_title1','poa_other_title');">
                                                            </div>
              									     	</div>
              									     	  <p id="proof_of_address_label1" style="width: 0px; height: 0px; margin-top: 0px;"></p>
              									     </div>
              									    
              									<!--	</li>-->
              									<!--<li class="d-md-none d-lg-none d-xl-none">-->
              											<!--<div style="width: 0px; height: 0px;">-->
                  							<!--			         <input type="file" name="proof_of_dob" accept='image/*' id="proof_of_dob" />-->
                  							<!--		    </div>-->

                  									    <!--<div class="d-none d-sm-none d-md-block"><h5 class="myFlexCont" class> Copy of Date of Birth Proof  
                  									    <div class="myWidth differ" style="width: 140px; display: inline-block; float: none;">
              									     	<select name="doc_type_pdob"  onchange="specifyTitleShow(this, 'pdob_other_title')">
              									     		<option value="Passport">Passport</option>
              									     		<option value="Aadhar Card">Aadhar Card</option>
              									     		<option value="Driving Licence">Driving Licence</option>
              									     		<option value="Voter ID">Voter ID</option>
              									     	<option value="other">Other</option>
              									     	</select>
              									     </div>	<div class="myWidth hidden" style="width: 100px; float: none;" id="pdob_other_title">
                                                               <input type="text" name="pdob_other_title" id="pdob_other_title" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['pdob_other_title'] : '' ?>" style="height: 40px;">
                                                            </div>  
                                                            
                                                     <button type="button" class="mt-0" style="background-color: red; width: 40px; margin-left: 10px; 
                                                     padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); 
                                                     background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" 
                                                     onclick="openFileExp('proof_of_dob', false)"></button>
                                                      <?php if((count($user_data) > 0) && ($user_data[0]['proof_of_dob']!='')){?> Current Uploaded File - <?php echo $user_data[0]['proof_of_dob'];?><?php }?>
              									    
                                                     </h5>
              									    </div>-->
              									    <div class="d-md-none d-lg-none d-xl-none">
              									     	<div class="row">
              									     		<div class="col-3">
              									     			<h5>DOB Proof</h5>
              									     		</div>
              									     		<div class="col-5">
              									     			<select name="doc_type_pdob1"   onchange="specifyTitleShow(this, 'pdob_other_title1');fixValues('doc_type_pdob1','doc_type_pdob');">
		              									     			<option value="Passport" <?php if ($user_data[0]['doc_type_pdob'] == 'Passport') { ?> selected <?php } ?>>Passport</option>
                          									     		<option value="Aadhar Card" <?php if ($user_data[0]['doc_type_pdob'] == 'Aadhar Card') { ?> selected <?php } ?>>Aadhar Card</option>
                          									     		<option value="Driving Licence" <?php if ($user_data[0]['doc_type_pdob'] == 'Driving Licence') { ?> selected <?php } ?>>Driving Licence</option>
                          									     		<option value="Voter ID" <?php if ($user_data[0]['doc_type_pdob'] == 'Voter ID') { ?> selected <?php } ?>>Voter ID</option>
                          									     	<option value="other" <?php if ($user_data[0]['doc_type_pdob'] == 'other') { ?> selected <?php } ?>>Other</option>
		              									     	</select>
              									     		</div>
              									     		
              									     		<!--<div class="col-12">-->
              									     		<!--	 towards proof of date of birth-->
              									     		<!--</div>-->
              									     		<button type="button" class="mt-0" style="background-color: red; width: 35px; margin-left: 0px; padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('proof_of_dob', false)"></button>
              											<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" onclick="openFileExp('proof_of_dob', true)" style="background-color: #fff; padding: 5px; box-shadow: none;"><i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              									     	<div class="col-6 hidden" style="width: 100px;padding-top:10px;" id="pdob_other_title1">
                                                               <input type="text" name="pdob_other_title1" id="pdob_other_title1" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['pdob_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('pdob_other_title1','pdob_other_title');">
                                                            </div>
              									     	</div>
              									     	 <p id="proof_of_dob_label1" style="width: 0px; height: 0px; margin-top: 0px;"></p>
              									     </div>
              									     
              										<!--</li>-->
              										<!--<li class="d-md-none d-lg-none d-xl-none">-->
              											<!--<div style="width: 0px; height: 0px;">-->
                  							<!--			         <input type="file" name="ownership_proof" accept='image/*' id="ownership_proof" required/>-->
                  							<!--		    </div>-->

                  									   <!-- <div class="d-none d-sm-none d-md-block"><h5 class="myFlexCont" class>Copy of Ownership Proof 
                  									    <div class="myWidth differ" style="width: 175px; display: inline-block; float: none;">
              									     	<select name="doc_type_ownership"   onchange="specifyTitleShow(this, 'ownership_other_title')">
              									     		<option value="ConveyenceDeed">Conveyence Deed</option>
              									     		<option value="other">Other</option>
              									     	
              									     	</select>
              									     </div> 	<div class="myWidth hidden" style="width: 100px; float: none;" id="ownership_other_title">
                                                               <input type="text" name="ownership_other_title" id="ownership_other_title" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['ownership_other_title'] : '' ?>" style="height: 40px;">
                                                            </div> 
                                                            <button type="button" class="mt-0" style="background-color: red; width: 40px; margin-left: 10px; padding-right: 0px; 
                                                            height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; 
                                                            background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" 
                                                            onclick="openFileExp('ownership_proof', false)"></button>
                                                            <?php if((count($user_data) > 0) && ($user_data[0]['ownership_proof']!='')){?> Current Uploaded File - <?php echo $user_data[0]['ownership_proof'];?><?php }?>
              									    
                                                            </h5>
              									    </div>-->
              									    <div class="d-md-none d-lg-none d-xl-none">
              									     	<div class="row">
              									     		<div class="col-3">
              									     			<h5>Ownership Proof</h5>
              									     		</div>
              									     		<div class="col-5">
              									     			<select name="doc_type_ownership1"  onchange="specifyTitleShow(this, 'ownership_other_title1');fixValues('doc_type_ownership1','doc_type_ownership');">
		              									     		<option value="ConveyenceDeed"  <?php if ($user_data[0]['doc_type_ownership'] == 'ConveyenceDeed') { ?> selected <?php } ?>>Conveyence Deed</option>
                          									     		<option value="Relinquishment Deed"  <?php if ($user_data[0]['doc_type_ownership'] == 'Relinquishment Deed') { ?> selected <?php } ?>>Relinquishment Deed</option>
                          									     		<option value="Gift Deed"  <?php if ($user_data[0]['doc_type_ownership'] == 'Gift Deed') { ?> selected <?php } ?>>Gift Deed</option>
                          									     			<option value="Mutation Deed"  <?php if ($user_data[0]['doc_type_ownership'] == 'Mutation Deed') { ?> selected <?php } ?>>Mutation Deed</option>
                          									     		<option value="other"  <?php if ($user_data[0]['doc_type_ownership'] == 'other') { ?> selected <?php } ?>>Other</option>
                          									     	
		              									     	</select>
              									     		</div>
              									     		
              									     		<!--<div class="col-12">-->
              									     		<!--	 towards Ownership Proof-->
              									     		<!--</div>-->
              									     		<button type="button"  id="op_button" class="mt-0" style="background-color: red; width: 35px; margin-left: 0px; padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('ownership_proof', false)"></button>
              											<button type="button" title="Scan File" class="mt-0 ml-3 d-md-none d-lg-none d-xl-none" onclick="openFileExp('ownership_proof', true)" style="background-color: #fff; padding: 5px; box-shadow: none;"><i class="fa fa-camera" style="color: #2f92fe; font-size: 23px;"></i></button>
              									     		<div class="col-6 hidden" style="width: 100px;padding-top:10px;" id="ownership_other_title1">
                                                               <input type="text" name="ownership_other_title1" id="ownership_other_title1" placeholder="Specify"
                                                               value="<?= (count($user_data) > 0) ? $user_data[0]['ownership_other_title'] : '' ?>" style="height: 40px;" onchange="fixValues('ownership_other_title1','ownership_other_title');">
                                                            </div>
              									     	</div>
              									     	 <p id="ownership_proof_label1" style="width: 0px; height: 0px; margin-top: 0px;"></p>
              									     </div>
              									     
              									<!--	</li>-->
              									<!--</ul>	-->
              										<!--<li  style="margin-top: 20px;">-->
              											<select  required name="mode_of_payment_1" id="mode_of_payment_1" 
              											class="mt-3 mt-sm-3 mt-md-0" style="width: 110px;" onchange="displayOnlinePayment(this,'paynow-button1','hidepaynow-button1');">

                  												<option <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['mode_of_payment_1'] == "Cheque") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?> value="Cheque">Cheque</option>

                  												<option value="Demand Draft" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['mode_of_payment_1'] == "Demand Draft") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>DD</option>

                  												<option value="Pay Order" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['mode_of_payment_1'] == "Pay Order") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>PO</option>
                                                        	<option value="NEFT" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['mode_of_payment_1'] == "NEFT") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>NEFT</option>
                  													<option value="IMPS" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['mode_of_payment_1'] == "IMPS") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>IMPS</option>
                  												<option value="Online Payment" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['mode_of_payment_1'] == "Online Payment") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>Online</option>

                  											</select>&nbsp; 
                  											<span id="paynow-button1" class="hidden"> 
                  											<!--for &#837	<input type="text" class="mt-3 mt-sm-3 mt-md-0" name="amount_1" value="500" id="amount_1" -->
                  											<!--		oninvalid="this.setCustomValidity('amount_1')" readonly oninput="this.setCustomValidity('')" -->
                  											<!--		placeholder="&#x20B9" style="width: 100px;" readonly> -->
                  													One time membership fees of Rs.500
                  											    <!--<a href="javascript:void(0);" onclick="makePayment()" style="border-radius:5px" class="btn btn-success">Pay Now</a>-->
                  											    </span>
                  											<span id="hidepaynow-button1">
                  											<input type="text"  value="<?= (count($user_data) > 0) ? $user_data[0]['reference_number_1'] : '' ?>" 
                  											name="reference_number_1" id="reference_number_1" 
                  											placeholder="Cheque/DD/PayOrder#" class="mt-3 mt-sm-3 mt-md-0" style="width: 130px;" > dated 
                  												<input type="text"  name="payment_date_1" id="payment_date_1"
                  												class="mt-3 mt-sm-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['payment_date_1'] : date("Y-m-d") ?>" 
                                                                	placeholder="mm/dd/yyyy" style="width: 150px;" onchange="ValidateDate(this.value);" autocomplete="off">
                  												<!--<input type="text"  onfocus="(this.type='date')" onblur="(this.type='text');ValidateDate(this.value);"  name="payment_date_1" -->
                  												<!--class="mt-3 mt-sm-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['payment_date_1'] : date("Y-m-d") ?>" id="payment_date_1"-->
                              <!--                                  	placeholder="dd/mm/yyyy" style="width: 150px;" min="2015-01-01" max="2020-12-31" >--> 	One time membership fees of Rs.500</span>
                  													<!--<input type="text" class="mt-3 mt-sm-3 mt-md-0" name="amount_1" value="500" id="amount_1" -->
                  													<!--oninvalid="this.setCustomValidity('amount_1')" readonly oninput="this.setCustomValidity('')" -->
                  													<!--placeholder="&#x20B9" style="width: 100px;" readonly> One time membership fees of Rs.500-->
                  					<!--				</li>-->
                    						
              								
              									<h5>(Cheque/DD in favor of Nirvana RWA Maintenance Account OR online transfer to ICICI Bank a/c number 184301000716, IFSC ICIC0001843 )</h5>
                  					</div>
                  								
                  								</div>

                  							<?php } ?>


                  										<div class="col-lg-12">
                  										    <hr style="margin-top: 10px; border-color: #bbb;">
                  										    
                  											<h5>I certify that:</h5>

                  							  <ul type="i" style="padding-left: 30px;">
                  							  	<li style="margin-top: 20px;">I unconditionally subscribe to the aims & objects of the society and contribute towards attainment of the same.</li>
                  							  	<li style="margin-top: 20px;">I will abide by the <a href="https://www.nirvanacountry.co.in/RWAVendor/documents/5dcaa0822b02bBye-laws-2014.pdf" target="_blank" style="color:#147efb">Bye Laws of the Society</a>, as applicable and amended from time to time.</li>
                  							  	<li style="margin-top: 20px;">I have not been convicted of an offence involving moral turpitude involving imprisonment.</li>
                  							  	<!--<li style="margin-top: 20px;">I agree to the <a href="terms_conditions.php" target="_blank" style="color:#147efb">Terms And Condition</a> of website.</li>
                  							 --> </ul>                  		

                  										    <hr style="margin-top: 30px; border-color: #bbb;">

                                                        	<div class="col-lg-12">
                                                        
                                                      <h5></h5>I request you to kindly admit me as a 	
                                                      <select  class="mt-3 mt-sm-3 mt-md-0" name="member_type" id="member_type" required style="width: 170px;border-right:none;border-left:none;border-top:none;"  onblur="PrefillDecision();">

                  												<option <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['member_type'] == "Ordinary") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?> value="Ordinary Member">Ordinary Member</option>

                  												<option value="Demand Draft" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['member_type'] == "Life Member") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>Life Member</option>

                  												<option value="Temporary Member" <?php if (count($user_data) > 0) {
                  													if ($user_data[0]['member_type'] == "Temporary Member") { ?>
                  														selected
                  														<?php
                  													}
                  												} ?>>Temporary Member</option>

                  											
                  											</select>&nbsp;  of the Society. <br><br>
                                                         Thanking you</h5>
                                                             
                                                        </div>
                                                        <div class="col-lg-6" style="text-align:left;">
                                                    	</div> 
                  											<?php if (!isset($_GET['view-mode'])) {?>
                  										<div class="col-lg-6" style="text-align:right;">

                  											<div class="sn-field">
                                                            	<p>Yours faithfully</p>
                                                            	 <h5> 	<div style="width: 0px; height: 0px;">
                  										    <input type="file" name="signature" id="signature" accept="image/*" 
                  										     <?php if((count($user_data)> 0) && ($user_data[0]['signature']=='')){?> required <?php }?> />>
                  									    </div>
                  									     <?php if((count($user_data) > 0) && ($user_data[0]['signature']!="")){?>
        										    	<img  src="<?= SITE_URL.$user_data[0]['signature']; ?>" width="100px">
        										    	<?php } else {?>
                  									    <button type="button" class="mt-0" style="background-color: red; width: 40px; margin-left: 10px; padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('signature', false)" ></button>
                  									<button type="button" title="Scan File" class="mt-0 ml-3 up_button d-md-none d-lg-none d-xl-none" onclick="openFileExp('signature', true)"><i class="fa fa-camera" style="color: #2f92fe; font-size: 24px;"></i></button>
                  								   <?php }?>
                  								    </h5>
                  									<p id="signature_label" style="width: 0px; height: 0px; margin-top: -10px; margin-bottom: 0px !important;"></p>
                  										<h5> Please attach a picture/ image of your ink signatures to submit the form online.</h5>
                  									<h5>(Signature of the Applicant)</h5>
                  										<p>Date: <?= date('jS M, Y') ?></p>
                  												<h5>Place: Gurgaon</h5>
                                                    </div>
                                            	</div>  
                                            	<?php }?>
 		<div class="col-lg-12">
                            <hr style="margin-top: 10px; border-color: #bbb;">
                  			<h5><b>Recommendations of a regular member of the Society (if Provided in the byelaws):</b></h5>
                  			I recommend admission of 
                  				<input type="hidden" name="rec_userid" id="rec_userid" placeholder="Specify"><input type="text" class="mt-3 mt-sm-3 mt-md-0" name="recommend_name" id="recommend_name" readonly  placeholder="Name" style="width: 180px;border-right:none;border-left:none;border-top:none;"> S/o <input type="text" class="mt-3 mt-sm-3 mt-md-0" name="recommend_father_fname" id="recommend_father_fname" placeholder="Father's name"  readonly style="width: 180px;border-right:none;border-left:none;border-top:none;">, aged
	<input type="text" name="age"  id="txtage" pattern="[0-9]{2,2}" class="mt-3 mt-sm-3 mt-md-0" style="width:70px;border-right:none;border-left:none;border-top:none;" onkeypress="return isNumberKey(event);" maxlength="2" placeholder="Age " value="<?= (count($user_data) > 0) ? $user_data[0]['age'] : '' ?>"> years, R/o 
	<input type="text" class="mt-3 mt-sm-3 mt-md-0" name="rec_per_name" id="rec_per_name" style="width: 180px;border-right:none;border-left:none;border-top:none;" placeholder="RWA Name" value="Nirvana Country" >, as 
	<input type="text" class="mt-3 mt-sm-3 mt-md-0" name="member_type_rec" id="member_type_rec"  style="width: 170px;border-right:none;border-left:none;border-top:none;" value=""> of the society.
                  								
                  		<div class="row mt-5">
                  		    		
                  		     	<div class="col-lg-3"><h5> Recommender's Address</h5></div>
                  				<div class="myWidth" style="width: 100px;">
                  					<div class="sn-field">
                  						<select name="block_rec" id="block_rec">
                  						    <?php 
                  						     if(count($user_data) > 0) {
                  						     	?>
                  							<option value="" disabled <?php if (($user_data[0]['block_rec'] == "")|| ($user_data[0]['block_rec'] == NULL)) { ?> selected <?php } ?>>Block</option>
                  							<option value="1" <?php if ($user_data[0]['block_rec'] == "1") { ?> selected <?php } ?>>AG</option>
                  							<option value="2" <?php if ($user_data[0]['block_rec'] == "2") { ?> selected <?php } ?>>BC</option>
                  							<option value="3" <?php if ($user_data[0]['block_rec'] == "3") { ?> selected <?php } ?>>CC</option>
                  							<option value="4" <?php if ($user_data[0]['block_rec'] == "4") { ?> selected <?php } ?>>DW</option>
                  							<option value="5" <?php if ($user_data[0]['block_rec'] == "5") { ?> selected <?php } ?>>ES</option>
                  						     	<?php
                  						     } else { ?>
                  							<option  value="" disabled selected>Block</option>
                  							<option value="1">AG</option>
                  							<option value="2">BC</option>
                  							<option value="3">CC</option>
                  							<option value="4">DW</option>
                  							<option value="5">ES</option>
                  						     <?php } ?>
                  						</select>
                  					</div>
                  				</div>
                  				<div class="myWidth" style="width: 100px;">
                  					<div class="sn-field">
                  						<input type="text" maxlength="4"  onkeypress="return isNumberKey(event);"  
                  						name="house_number_rec" id="house_number_rec" value="<?= (count($user_data) > 0) ? $user_data[0]['house_number_rec'] : '' ?>" placeholder="House #">
                  					</div>
                  				</div>
                  				<div class="myWidth" style="width: 100px;">
                  					<div class="sn-field">
                  						<select name="floor_rec" id="floor_rec">
                  							<?php 
                  							   if (count($user_data) > 0) { ?>
                  							   	<option  value="" disabled selected>Floor</option>
                  							<!--<option value="Villa" <?php if ($user_data[0]['floor_rec'] == 'Villa') { ?> selected <?php } ?>>Villa</option>-->
                  							<option value="GF" <?php if ($user_data[0]['floor_rec'] == 'GF') { ?> selected <?php } ?>>GF</option>
                  							<option value="FF" <?php if ($user_data[0]['floor_rec'] == 'FF') { ?> selected <?php } ?>>FF</option>
                  							<option value="SF" <?php if ($user_data[0]['floor_rec'] == 'SF') { ?> selected <?php } ?>>SF</option>
                  							<option value="TF" <?php if ($user_data[0]['floor_rec'] == 'TF') { ?> selected <?php } ?>>TF</option>
                  							<?php
                  							   } else {
                  							?>
                  							<option  value="" disabled <?php if (($user_data[0]['floor_rec'] == "")|| ($user_data[0]['floor_rec'] == NULL)) { ?> selected <?php } ?>>Floor</option>
                  							<!--<option value="Villa" >Villa</option>-->
                  							<option value="GF">GF</option>
                  							<option value="FF">FF</option>
                  							<option value="SF">SF</option>
                  							<option value="TF">TF</option>
                  						<?php } ?>
                  						</select>
                  					</div>
                  				</div>
                  			
                  			</div>									
	            <div class="row">
                  	<div class="col-lg-3"><h5> Recommender's Name</h5></div>
                  	<div class="col-lg-2">
                  	<div class="sn-field">
                  		<select name="rec_per_title" onchange="specifyTitleShow(this, 'recom_mem_name_opt')">
                  	        <option value="Mr.">Mr.</option>
                  	        <option value="Mrs.">Mrs.</option>
                  	        <option value="Ms.">Ms.</option>
                  	     
                  		</select>
                  	</div>
                    </div>
                    <div class="col-lg-2 hidden" id="recom_mem_name_opt">
                  		<div class="sn-field">
                  			<input type="text" name="rec_per_title_opt" placeholder="Specify">
                  		</div>
                    </div>
                    <div class="col-lg-2">
                  		<div class="sn-field">
                  			<input type="text" name="rec_per_fname" id="rec_per_fname" placeholder="First name" value="<?= (count($user_data) > 0) ? $user_data[0]['rec_per_fname'] : '' ?>">
                  		</div>
                  	</div>
                  	<div class="col-lg-2" style="min-width: 150px;">
                  		<div class="sn-field">
                  			<input type="text" name="rec_per_mname" id="rec_per_mname" placeholder="Middle name" value="<?= (count($user_data) > 0) ? $user_data[0]['rec_per_mname'] : '' ?>" >
                  		</div>
                  	</div>
                  	<div class="col-lg-2">
                  		<div class="sn-field">
                  			<input type="text" name="rec_per_lname" id="rec_per_lname" placeholder="Last name" value="<?= (count($user_data) > 0) ? $user_data[0]['rec_per_lname'] : '' ?>" >
                  		</div>
                  	</div>				      	
                </div>
                <div class="row">
                  	<div class="col-lg-3 pr-0">
                  		<div class="sn-field">
                  			<input type="text" placeholder="Recommender's Email" name="rec_other_emailid" id="rec_other_emailid"   value="<?= (count($user_data) > 0) ? $user_data[0]['rec_other_emailid'] : '' ?>"  onblur="validateEmail(this);">
                  		</div>
                  	</div>

                  	<div class="col-lg-3 pl-3">
                  		<div class="sn-field">
                  			<input type="text" placeholder="Recommender's Mobile" name="rec_other_phone" id="rec_other_phone"   value="<?= (count($user_data) > 0) ? $user_data[0]['rec_other_phone'] : '' ?>"  onkeypress="return isNumberKey(event);" 
                  				maxlength="10" placeholder="Mobile" value="" onblur="mobnumber(this.value);">
                  		</div>
                  	</div>
                  	<!--<div class="col-lg-3 pl-3">-->
                  	<!--	<div class="sn-field">-->
                  	<!--		<input type="text" placeholder="Membership number" name="membership_number"   value="<?= (count($user_data) > 0) ? $user_data[0]['membership_number'] : '' ?>"  >-->
                  	<!--	</div>-->
                  	<!--</div>-->
                </div>
                
                <div class="col-lg-6 p-0" style="text-align:left;">
                	<div class="sn-field">
                		<p>Date: <?= date('jS M, Y') ?></p>
                		<h5>Place: Gurgaon</h5>
                	</div>
                </div> 
                	<?php  // if (isset($_GET['fid']) && isset($_GET['view-mode']) && $_GET['view-mode']=='R' ) {
                  									// if(($user_data[0]['approved_status']=='Pending')|| ($user_data[0]['approved_status']=='Reopened')){?>
                <!--<div class="col-lg-6" style="text-align:right;">-->
	               <!-- <div class="sn-field">-->
                <!--      <h5> 	<div style="width: 0px; height: 0px;">-->
                <!--  	 <input type="file" name="signature_rec" id="signature_rec" accept="image/*">-->
                <!--  	 </div>-->
                <!--  	<button type="button" class="mt-0" style="background-color: red; width: 40px; margin-left: 10px; padding-right: 0px; height: 40px; background: url('<?= SITE_URL ?>images/upload.png'); background-size: contain; background-repeat: no-repeat; background-position-x: 50%; box-shadow: none;" onclick="openFileExp('signature_rec', false)" ></button>-->
                <!--  	<button type="button" title="Scan File" class="mt-0 ml-3 up_button d-md-none d-lg-none d-xl-none" onclick="openFileExp('signature_rec', true)"><i class="fa fa-camera" style="color: #2f92fe; font-size: 24px;"></i></button>-->
                <!--  	 </h5>-->
                <!--  	<p id="signature_rec_label" style="width: 0px; height: 0px; margin-top: -10px; margin-bottom: 0px !important;"></p>-->
                <!--  		<h5> Attach a picture of you ink signatures by clicking here </h5>-->
                <!--  		<h5>(Signature of the Recommendee)</h5>-->
                <!--      </div>-->
                <!-- 	</div>  -->
                 	<?php //} 
                    	//}
                 	?>
                 		<div class="col-lg-12"><span id="spanRecError" style="color:red"></span></div>	
            </div>
            <?php if(!isset($_GET['view-mode'])) { ?>
            <div class="col-lg-12">
                <hr style="margin-top: 10px; border-color: #bbb;">
                <h5><b>Decision of the Governing Body :</b></h5>
                <h5 style="line-height: 32px;"><span id="spanApplicantName"> _______________________ </span> S/o <span id="spanFathersName">_________________________</span> aged <span id="spanAge"><?= (count($user_data) > 0) ? $user_data[0]['age'] : '______' ?></span> years, R/o  <span id="spanROName"> _____________________________</span>, is admitted as <span id="spanMembertype">_____________</span></span> of the Society w.e.f _________________ under membership no.  ___________ vide resolution bearing no. _______________ in the meeting of Governing Body held on ____________ .<br>He may be issued an identity card of the Society & his name may entered in the Register of Members.</h5>
                <div class="col-lg-6 p-0" style="text-align:left;">
                	<div class="sn-field">
                		<p>Dated: __________________ </p>
                		<h5>Place: Gurgaon</h5>
                	</div>
                </div> 
            </div>
            <?php }?>
        </div>
                  							  	<?php if (!isset($_GET['fid']) && (count($user_data)==0)) { ?>
                  							  		<div class="col-md-12 mb-4">
                  					<label class="checkbox-container-main" for="accept" style="display: inline; font-size: 13px; font-weight: 400; color: #333333;">
                  				Yes, I understand and agree to the Nirvana Country <a href="terms_conditions.php" target="_blank" style="color:#147efb">Terms of Use </a>.
                  					<input checked type="checkbox" value="1"  required name="accept" id="accept" style="width: 18px; height: 8px;"> <span class="checkmark"></span></label>
                  				</div>
                  				<div id="autoSave"></div> 
                  				                        
                  										<div class="col-lg-12" style="text-align:center;">
                  											<button type="submit" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"  value="submit">Submit</button>
                  										</div>
                  										<?php } else if (!isset($_GET['fid']) && (count($user_data)>0) && (($user_data[0]['approved_status']=='Sent for Correction') || ($user_data[0]['approved_status']=='0'))) { ?>
                  							  		<div class="col-md-12 mb-4">
                  					<label class="checkbox-container-main" for="accept" style="display: inline; font-size: 13px; font-weight: 400; color: #333333;">
                  				Yes, I understand and agree to the Nirvana Country <a href="terms_conditions.php" target="_blank" style="color:#147efb">Terms of Use </a>.
                  					<input checked type="checkbox" value="1"  required name="accept" id="accept" style="width: 18px; height: 8px;"> <span class="checkmark"></span></label>
                  				</div>
                  				<div id="autoSave"></div> 
                  				                        
                  										<div class="col-lg-12" style="text-align:center;">
                  										     <button type="button" value="Print" onclick="printExternal(<?php echo $user_data[0]['id'];?>);">Print</button>
                                                            	<button type="submit" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"  value="submit" >Submit</button>
                  											
                  										</div>	
                  									<?php }	else if ((isset($_GET['fid']) || (count($user_data)>0))  && !isset($_GET['view-mode']) ) { ?>
                  								      <div class="col-lg-12" style="text-align:center;">
                  										   <button type="button" value="Print" onclick="printExternal(<?php echo $user_data[0]['id'];?>);">Print</button>
                  										    </div>

                  									<?php }	else if (isset($_GET['fid']) && isset($_GET['view-mode']) && $_GET['view-mode']=='R' ) { 
                  									 if(($user_data[0]['approved_status']=='Pending')|| ($user_data[0]['approved_status']=='Reopened')){?>
                  							   <!--     	<div class="col-lg-12" style="text-align:center;">-->
                  								  <!--  <textarea id="comments" name="comments" placeholder="Add Remarks" required></textarea>-->
                  								  <!--  </div>-->
                  										<!--<div class="col-lg-12" style="text-align:center;" id="buttondiv">-->
                  										<!--	<button type="button" onclick="ChangeRecommenderStatus(this);" value="Accept">Approve </button>-->
                  										<!--	<button type="button" onclick="ChangeRecommenderStatus(this);"  value="Reject">Reject </button>-->
                  										<!--</div>-->
                  										<!--<div class="col-lg-12" style="text-align:center;display:none;" id="MessageDiv">-->
                  										<!--        <div class="alert alert-success">-->
                            <!--                                     Thank you ! Your Recommendation Status has been submitted. -->
                            <!--                                    </div>-->
                  										<!--</div>-->
                  										
                  										<!--<div class="col-lg-12" style="text-align:center;display:none;" id="ErrorDiv" >-->
                  										<!--        <div class="alert alert-secondary">-->
                            <!--                                     You are not the Verified Recommender-->
                            <!--                                    </div>-->
                  										<!--</div>-->
                  										<?php }?>
                                            <?php } else if (isset($_GET['fid']) && isset($_GET['view-mode']) && $_GET['view-mode']=='E' && $user_data[0]['approved_status']=='Admin Approved')  {
                                                if(isset($_SESSION['EC']) && $_SESSION['EC']=="1"){?>
                                            	<div class="col-lg-12" style="text-align:center;">
                  								    <textarea id="comments" name="comments" placeholder="Add Remarks" required></textarea>
                  								    </div>
                                            	<div class="col-lg-12" style="text-align:center;" id="buttondiv">
                  												<button type="button" value="Approve" onclick="ChangeECStatus(this);">Approve </button>
                  											<button type="button" value="Decline" onclick="ChangeECStatus(this);">Decline </button>
                  										</div>
                  											<div class="col-lg-12" style="text-align:center;display:none;" id="MessageDiv">
                  										        <div class="alert alert-success">
                                                                 Thank you ! Your Status has been submitted. 
                                                                </div>
                  										</div>
                  											<div class="col-lg-12" style="text-align:center;display:none;" id="ErrorDiv" >
                  										        <div class="alert alert-secondary">
                                                                 You are not the Verified EC Member
                                                                </div>
                  										    </div>
                  									
                                            <?php }
                                            } ?>
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
</div>
     
    </body>
                 
<script type="text/javascript">


              	function handlePhoto(id, src) {
              		let fileExp = document.getElementById(id);
              		 console.log(fileExp);
              		let source = document.getElementById(src);
              		 console.log(source);
              		 	let sourceorg = document.getElementById(src);
              		
              		fileExp.addEventListener("change", (event) => {
              			source.src = window.URL.createObjectURL(event.target.files[0]);
              			var fileName = event.target.files[0].name;
              			var extFile = fileName.split('.').pop();
                        console.log (extFile);
                         if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
                            //TO DO
                        }else{
                            alert("Only jpg/jpeg and png files are allowed!");
                            source.src="<?= SITE_URL ?>images/photo_label.png";
                            fileExp.value="";
                            return false;
                        }   
              			document.getElementById(`${id}_image_label`).innerHTML = "";
              		});

              		fileExp.click();

              	}

              	function openFileExp(id, option) {
              		let fileExp = document.getElementById(id);
              		let fileLabel = document.getElementById(id + "_label");
                	let fileLabel1 = document.getElementById(id + "_label1");
              		fileExp.addEventListener("change", (event) => {
              			fileLabel.style.width = "100%";
              			fileLabel.style.height = "auto";
              			if (id !== 'signature') {
              			fileLabel1.style.width = "100%";
              			fileLabel1.style.height = "auto";
              			}
              			if (id !== 'signature') {
              				fileLabel.style.marginBottom = "20px";
              			}
              			let tempPath = URL.createObjectURL(event.target.files[0]);
              			 let size =   (event.target.files[0].size / 1024 / 1024).toFixed(2); 
              			 console.log(size);
              	    	var fileName = event.target.files[0].name;
              			var extFile = fileName.split('.').pop();
                        console.log (extFile);
                         if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="pdf"){
                            //TO DO
                        }else{
                            alert("Only jpg/jpeg, pdf and  png files are allowed!");
                            fileExp.value="";
                            return false;
                        }  
                        
                        if(size>5){
                             alert("Max File size allowed is 5MB");
                            fileExp.value="";
                            return false;
                        }
              			fileLabel.innerHTML = `<a href="${tempPath}" target="_blank">${event.target.files[0].name}</a>`;
              				if (id !== 'signature') {
              			fileLabel1.innerHTML = `<a href="${tempPath}" target="_blank">${event.target.files[0].name}</a>`;
              				}
              		});

              		if (option) {
              			fileExp.setAttribute("capture", "user");
              			fileExp.click();
              		} else {
              			fileExp.removeAttribute("capture");
              			fileExp.click();
              		}
              	}

              	function handleFormPage(option) {
              		let first_page_form = document.getElementById("form_section_1");
              		let second_page_form = document.getElementById("form_section_2");
              		let photo_1 = document.getElementById("app_1_photo_big_frame");
              		let photo_2 = document.getElementById("app_2_photo_big_frame");

              		let nextBtn = document.getElementById("next_form_btn");
              		let prevBtn = document.getElementById("prev_form_btn");

              		let toggler = document.getElementById("form_toggler_check");

              		if (option == "prev") {
              			toggler.style.width = "100%";
              			toggler.style.height = "auto";
              			toggler.style.overflow = "hidden";
              			first_page_form.style.width = "100%";
              			first_page_form.style.height = "auto";
              			first_page_form.style.overflow = "hidden";
              			second_page_form.style.width = "0px";
              			second_page_form.style.height = "0px";
              			second_page_form.style.overflow = "hidden";
              			prevBtn.classList.add("hidden");
              			nextBtn.classList.remove("hidden");
              			photo_1.classList.remove("hidden");
              			photo_2.classList.add("hidden");
              			document.getElementById("top").scrollIntoView();
              		} else {
              			toggler.style.width = "0px";
              			toggler.style.height = "0px";
              			toggler.style.overflow = "hidden";
              			first_page_form.style.width = "0px";
              			first_page_form.style.height = "0px";
              			first_page_form.style.overflow = "hidden";
              			second_page_form.style.width = "100%";
              			second_page_form.style.height = "auto";
              			second_page_form.style.overflow = "hidden";
              			prevBtn.classList.remove("hidden");
              			nextBtn.classList.add("hidden");
              			photo_1.classList.add("hidden");
              			photo_2.classList.remove("hidden");
              			document.getElementById("top").scrollIntoView();
              		}
              	}

              	function specifyTitleShow(elem, id) {
	              	let spec = document.getElementById(id);
	              	console.log(spec);
              		if (elem.value === "other") {
              		    console.log(elem.value);
	              		spec.classList.remove('hidden');
              		} else {
              		    console.log("not matched" + elem.value)
	              		spec.classList.add('hidden');
              		}
              	}
              	
              	function fixValues(fromid, toid){
              	    	let fromidField = document.getElementsByName(fromid)[0].value;
              	    	console.log(fromidField)
              	    	let toidField = document.getElementsByName(toid);
              	    	document.getElementsByName(toid)[0].value=fromidField;
              	    		console.log(document.getElementsByName(toid)[0].value);
              	}

              	function toggleFormShow() {
              		let toggler = document.getElementById("add_p");
              		let doc = document.getElementById("action_btn_container");
              		let hints = document.getElementsByClassName("show_label_hint");
              		if (toggler.checked) {
              			doc.classList.remove("hidden");
              			for (let i = 0; i < hints.length; i++) {
              				hints[i].classList.remove("hidden");
              			}
              		} else {
              			doc.classList.add("hidden");
              			for (let i = 0; i < hints.length; i++) {
              				hints[i].classList.add("hidden");
              			}
              		}
              	}

              	function fillData(curr, elem) {
              		let elementNode = document.getElementById(elem);
              		let toggler = document.getElementById("filltoo");
              		if (!toggler.checked) {
              			elementNode.value = curr.value
              		}
              	}

              	function toggleCorr(event) {
              		let toggler = document.getElementById("filltoo");
              		let doc = document.getElementById("corress_address");
              		if (toggler.checked !== true) {
              			doc.style.width = "100%";
              			doc.style.height = "auto";
              		} else {
              			doc.style.width = "0px";
              			doc.style.height = "0px";			
              		}
              	}
              	
              	function displayOnlinePayment(elem, id, hideid) {
	              	let spec = document.getElementById(id);
	              	let spechide = document.getElementById(hideid);
	              	console.log(spec);
              		if (elem.value === "Online Payment") {
              		    console.log(elem.value);
	              		spec.classList.remove('hidden');
	              		spechide.classList.add('hidden');
	              	 	if(hideid=='hidepaynow-button1'){
	              		  document.getElementById("reference_number_1").removeAttribute("required");
                          document.getElementById("payment_date_1").removeAttribute("required");  
	              		 }
	              		 if(hideid=='hidepaynow-button2'){
	              		  document.getElementById("reference_number_2").removeAttribute("required");
                          document.getElementById("payment_date_2").removeAttribute("required");  
	              		 }
              		} else {
              		    console.log("not Selected Online Payment" + elem.value)
	              		spechide.classList.remove('hidden');
	              		spec.classList.add('hidden');
	              			if(hideid=='hidepaynow-button1'){
    	              		  document.getElementById("reference_number_1").setAttribute("required", "");
                              document.getElementById("payment_date_1").setAttribute("required", "");
                              if(document.getElementById("reference_number_1").value=""){
                                  alert("Please fill in the Cheque/DD/PayOrder#");
                              }
                               if(document.getElementById("payment_date_1").value=""){
                                  alert("Please fill in the Payment Date");
                              }
	              		 }
	              		 if(hideid=='hidepaynow-button2'){
	              		  document.getElementById("reference_number_2").setAttribute("required", "");
                          document.getElementById("payment_date_2").setAttribute("required", "");
	              		 }
              		}
              	}
              	
              	function PrefillDecision(){
              	    var title_1= document.getElementById('title_1').value;
              	   var first_name= document.getElementById('tenant_first_name').value;
              	   var middle_name= document.getElementById('tenant_middle_name').value;
              	   var last_name= document.getElementById('tenant_last_name').value;
              	   var title_2= document.getElementById('title_2').value;
              	   var father_first_name= document.getElementById('father_first_name').value;
              	   var father_middle_name= document.getElementById('father_middle_name').value;
              	   var father_last_name= document.getElementById('father_last_name').value;
              	   
              	   var block_prime= document.getElementById('block_prime')[document.getElementById('block_prime').selectedIndex].innerHTML;
              	   var house_number= document.getElementById('house_number').value;
              	   var floor_prime= document.getElementById('floor_prime').value;
              	   
              	   var member_type= document.getElementById('member_type').value;
              	   
              	   document.getElementById('spanApplicantName').innerHTML= toTitleCase(title_1) + " " + toTitleCase(first_name) + " " + toTitleCase(middle_name)+ " " +toTitleCase(last_name);
              	    document.getElementById('recommend_name').value= toTitleCase(title_1) + " " + toTitleCase(first_name) + " " + toTitleCase(middle_name)+ " " + toTitleCase(last_name);
              	     document.getElementById('rec_per_name').value=block_prime + " " + house_number+ " " +floor_prime + ", Nirvana Country";
              	    document.getElementById('spanFathersName').innerHTML=toTitleCase(title_2) + " " + toTitleCase(father_first_name) + " " + toTitleCase(father_middle_name)+ " " +toTitleCase(father_last_name);
              	    document.getElementById('recommend_father_fname').value=toTitleCase(title_2) + " " + toTitleCase(father_first_name) + " " + toTitleCase(father_middle_name)+ " " +toTitleCase(father_last_name);
              	     document.getElementById('spanROName').innerHTML=block_prime + " " + house_number+ " " +floor_prime + "	Nirvana Country, Gurgaon, 122018";
              	    document.getElementById('spanMembertype').innerHTML=member_type;
              	     document.getElementById('member_type_rec').value=member_type;
              	    console.log("block_prime =" + block_prime);
              	    console.log("floor_prime =" + floor_prime);
              	}
              	
              </script>

              <?php
              if (isset($_GET['fid']) || (($user_data[0]['approved_status']!='0') && ($user_data[0]['approved_status']!='Sent for Correction'))) { ?>
              	<script>
              		let inputs = document.getElementsByTagName("input");
              		let selects = document.getElementsByTagName('select');

              		for (let input of inputs) {
              			input.setAttribute("disabled", "true");
              		}

              		for (let select of selects) {
              			select.setAttribute("disabled", "true");
              		}
              	</script>
              	<?php
              }
              ?>
              <script>  
 $(document).ready(function(){  
      function autoSave()  
      {  
           var serialno = $('#serialno').val();  
            var applicationid = $('#applicationid').val();  
           var title_1 = $('#title_1').val();  
           var tenant_other_title = $('#tenant_other_title').val();  
           var tenant_first_name = $('#tenant_first_name').val();  
           var tenant_middle_name = $('#tenant_middle_name').val();  
           var tenant_last_name = $('#tenant_last_name').val();  
           var title_2 = $('#title_2').val(); 
           var father_other_title = $('#father_other_title').val();  
           var father_first_name = $('#father_first_name').val(); 
           var father_middle_name = $('#father_middle_name').val();  
           var father_last_name = $('#father_last_name').val(); 
            var block_prime = $('#block_prime').val(); 
           var house_number = $('#house_number').val();  
           var floor_prime = $('#floor_prime').val(); 
            var emailid = $('#emailid').val();  
           var mobile = $('#mobile').val(); 
           if(applicationid==''){
             if(serialno != '' && tenant_first_name != '' && block_prime!='' && house_number !="" && floor_prime!="")  
             {  
                $.ajax({  
                     url:"<?php echo SITE_URL;?>controller/membershipaction.php",  
                     method:"POST",  
                     data:{'ActionCall':'AutoSave','serialno':serialno, 'applicationid':applicationid, 'title_1':title_1,'tenant_other_title':tenant_other_title,
                     'tenant_first_name':tenant_first_name,'tenant_middle_name':tenant_middle_name,'tenant_last_name':tenant_last_name,'title_2':title_2,'father_other_title':father_other_title,
                     'father_first_name':father_first_name,'father_middle_name':father_middle_name,'father_last_name':father_last_name,'block_prime': block_prime,
                     'house_number':house_number,'floor_prime':floor_prime,'emailid_1':emailid,'mobile':mobile
                         
                     },  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          if(data != '' && data != '0' && !isNaN(data))  
                          {  
                               $('#applicationid').val(data);
                               console.log("Success" + data);
                          }  else{
                              console.log("Data Not Updated" + data);
                          }
                          $('#autoSave').text("Post saving as draft");  
                          setInterval(function(){  
                               $('#autoSave').text('');  
                          }, 5000);  
                     }  
                });  
           }  
           }
      }  
      setInterval(function(){   
           autoSave();   
           }, 10000);
   
 }); 
 

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

function getRecomnderdetails(){
//console.log("in");
   var block_rec = $('#block_rec').val(); 
   var house_rec = $('#house_number_rec').val();  
   var floor_rec = $('#floor_rec').val();
   console.log(block_rec);
      console.log(house_rec);
         console.log(floor_rec);
        if(block_rec=="" || house_rec=="" || floor_rec=="" || block_rec==null || house_rec=="undefined" || floor_rec==null){
          document.getElementById('spanRecError').innerHTML="Please Select the Address of the Recommender Correctly";
             $('#block_rec').focus();
             return false; 
        }else{
            document.getElementById('spanRecError').innerHTML="";
           $.ajax({  
                     url:"<?php echo SITE_URL;?>controller/membershipaction.php",  
                     method:"POST",  
                     data:{
                         'ActionCall':'getRecommender',
                         'block_rec': block_rec,
                         'house_rec':house_rec,
                          'floor_rec':floor_rec
                     },  
                     dataType: "json",
                     success:function(data)  
                     {  
                          if(data != '' && data != '0')  
                          {  
                            // console.log(data);
                           //  console.log(JSON.stringify(data));
                              $.each(data, function(idx, topic){
                               $('#rec_per_fname').val(topic.first_name);  
                               $('#rec_per_mname').val(topic.middle_name);  
                               $('#rec_per_lname').val(topic.last_name);  
                               $('#rec_userid').val(topic.user_id); 
                               });
                             
                             
                             
                          }  else{
                              document.getElementById('spanRecError').innerHTML="No Recommender Data found, Please change the house details for a verified member";
                              console.log("Data Not found" + data);
                              $('#rec_per_fname').val("");  
                               $('#rec_per_mname').val("");  
                               $('#rec_per_lname').val("");  
                               $('#rec_userid').val(""); 
                              return false; 
                          }
                        
                         
                     }  
                });   
        }
}

function ChangeRecommenderStatus(elem){
console.log($(elem).val());
var recc_approved="No";
var rec_userid = "<?php echo $_SESSION['UR_LOGINID'];?>";
var backtracker = "<?php echo $Backtracker;?>";

if(rec_userid==""){
          var go_to_url =  "<?php echo SITE_URL;?>login_signup.php?back_tracker="+backtracker;
           document.location.href = go_to_url;
           return false;
}
  var valbtn  = $(elem).val(); 
  if(valbtn=='Accept'){
      recc_approved="Yes";
  } else {
       recc_approved="No";
  }
   var comments =  $.trim($("#comments").val()); 
   //var signature_rec =  $.trim($("#signature_rec").val()); 
  // signature_rec
//   if(signature_rec==""){
//     alert("Add Your Signature");  
//      return false;
//   }
   
   if(comments==""){
    alert("Add Your Reamrks");  
     return false;
   }
   
  
   
    var applicationid = $('#applicationid').val();
   
       if(rec_userid==""){
          var go_to_url =  "<?php echo SITE_URL;?>login_signup.php?back_tracker="+backtracker;
           document.location.href = go_to_url;
           return false;
       } else {
           $.ajax({  
                     url:"<?php echo SITE_URL;?>controller/membershipaction.php",  
                     method:"POST",  
                     data:{
                         'ActionCall':'ChangeStatusRecommender',
                         'applicationid': applicationid,
                         'recc_approved':recc_approved,
                         'rec_remarks':comments,
                         'rec_userid':rec_userid
                     },  
                     dataType: "text",
                     success:function(data)  
                     {  
                       if(data=="1"){
                           $("#buttondiv").hide();
                           $("#MessageDiv").show();
                             $("#ErrorDiv").hide();
                       }else if(data=="-1"){
                            $("#buttondiv").hide();
                           $("#ErrorDiv").show();
                         // alert("You are not the Verified Recommender.");  
                         return false;  
                       }
                     }  
                }); 
       }
      
}

function ChangeECStatus(elem){
console.log($(elem).val());
var approved_status="";
var userid = "<?php echo $_SESSION['UR_LOGINID'];?>";
var backtracker = "<?php echo $Backtracker;?>";

 if(userid==""){
        var go_to_url =  "<?php echo SITE_URL;?>login_signup.php?back_tracker="+backtracker;
           document.location.href = go_to_url;
           return false;
       }
       
  var valbtn  = $(elem).val(); 
  if(valbtn=='Approve'){
      approved_status="EC Approved";
  } else {
       approved_status="Rejected";
  }
   var comments =  $.trim($("#comments").val()); 
   if(comments==""){
    alert("Add Your Reamrks");  
     return false;
   }
    var applicationid = $('#applicationid').val();
   
       if(userid==""){
        var go_to_url =  "<?php echo SITE_URL;?>login_signup.php?back_tracker="+backtracker;
           document.location.href = go_to_url;
           return false;
       } else {
           $.ajax({  
                     url:"<?php echo SITE_URL;?>controller/membershipaction.php",  
                     method:"POST",  
                     data:{
                         'ActionCall':'ChangeStatusEC',
                         'applicationid': applicationid,
                         'approved_status':approved_status,
                         'approved_by':userid,
                         'comments':comments
                     },  
                     dataType: "text",
                     success:function(data)  
                     {  
                       if(data=="1"){
                           $("#buttondiv").hide();
                             $("#MessageDiv").show();
                       }
                     }  
                }); 
       }
      
}

function checklogin(){
    var userid = "<?php echo $_SESSION['UR_LOGINID'];?>";
    var backtracker = "<?php echo $Backtracker;?>";
     if(userid==""){
         alert("Please Login to continue.");
        var go_to_url =  "<?php echo SITE_URL;?>login_signup.php?back_tracker="+backtracker;
           document.location.href = go_to_url;
           return false;
       }
}

function ValidateDate(dateString) 
{
     console.log(dateString);
    //     var res = dateString.split("/");
    //  var newdateString = res[1]+"/"+res[0]+"/"+res[2];
    var today = new Date();
    var birthDate = new Date(dateString);
    var year =  birthDate.getFullYear();
    console.log(year);
    if(year != today.getFullYear()){
         alert("Please enter valid Payment Date");
         $('#payment_date_1').val(""); 
       return;
    }
}

function getAge(dateString) 
{
    // alert(dateString);
    //  var res = dateString.split("/");
    //  var newdateString = res[1]+"/"+res[0]+"/"+res[2];
    var today = new Date();
    var birthDate = new Date(dateString);
   //  alert(birthDate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
   // return age;
   if( age<18 || age>99){
       alert("Please enter valid date of Birth");
         $('#dob').val(""); 
        return;
   }
   if(isNaN(age)){
          alert("Please enter valid date of Birth");
         $('#dob').val(""); 
        return; 
   }
   
    console.log(age);
    $('#txtage').val(age);  
    $('#spanAge').text(age);  
}

    function toTitleCase(str) {
        return str.replace(
            /\w\S*/g,
            function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
        );
    }
    
    function printExternal(id) {
        console.log(id)
        var url ='<?php echo SITE_URL;?>form-x-print.php?fid='+id;
    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');

    printWindow.addEventListener('load', function() {
        if (Boolean(printWindow.chrome)) {
            printWindow.print();
            setTimeout(function(){
                printWindow.close();
            }, 500);
        } else {
            printWindow.print();
            printWindow.close();
        }
    }, true);
}

 </script>
</html>