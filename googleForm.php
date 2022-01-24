<?php include('model/class.expert.php'); ?>

<?php

$user_data = array();

if (isset($_SESSION['user_data'])) {
	array_push($user_data, $_SESSION['user_data']);
} else if (isset($_SESSION['UR_LOGINID'])) {
	$ModelCall->where("user_id", $_SESSION['UR_LOGINID']);
	$user_data = $ModelCall->get("Wo_Users");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/google_form_add.css">
    <title>NIRVANA Residents Welfare Association</title>
    <style>

        
body {
    color: #333;
    font-weight: 400;
    width: 100%;
    height: 100%;
    font-size: 15px;
    line-height: 1.6;
    font-family: 'Open Sans', sans-serif;
}

select option {
  font-size: 15px;
  font-weight: 400;
  font-family: 'Open Sans', sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-weight: 600;
    color: #333;
}

.text-success {
  color: #37a000 !important
}

.subtitle {
    font-size: 18px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

a {
    text-decoration: none;
    transition: all 0.3s;
    -webkit-transition: all 0.3s;
}

a:hover {
    color:#37a000;
    text-decoration: none;
}

a:focus {
    outline: none;
    text-decoration: none;
}

.mylink a {
    color: black;
    text-decoration: underline;
}

.mylink a:hover {
    color: black;
}

        .hide {
            display: none;
        }

        .sec-add-btn{
        	margin-top: -6px;
        }
        form ul {
            padding: 0px;
        }

        form ul li {
            list-style: none;
        }

        form ul li .detail-form-container {
            padding: 0px;
        }


      @media screen and (min-width: 768px) {
        .mflex {
            display: inline-flex;
        }

        .form-container {
            position: relative;
        }

        .myimg {
          position: absolute;
          top: 35px;
          right: 25px;
        }

        .myimg a img {
          width: 100px;
          height: auto;
        }

        .mar-left-md {
            margin-left: 56px;
        }
      }

      .mac {
      	max-width: 19.5% !important;
      }

      @media screen and (max-width: 768px) {
        p {
            line-height: 24px;
        }
        .w-auto {
            min-width: 100%;
        }

        .my-check {
            display: inline;
        }

        .mac {
        	min-width: 100% !important;
        }

        .reduce-bottom-margin-5 {
            margin-bottom: -15px !important;
        }

        .dflex select {
          width: 100%;
        }

        .myimg img {
            max-height: 50px;
        }

        .myflex {
            display: flex;
            max-width: 100%;
            align-items: center;
            margin-top: -8px !important;
        }

        .myflex > input {
            flex: 1;
        }

        .myflex > select {
            max-height: 50px;
            margin-top: 10px !important;
        }

        .sec-add-btn {
        	margin-top: 10px;
        }

      p.heading {
        font-size: 14px;
      }

      p.head-matter {
        font-size: 12px;
      }

      .fl-w {
        max-width: 40px;
      }

      .n-w {
        max-width: 36%;
        margin-left: 8px !important;
      }
      }

    </style>
</head>

<body>
    <form method="post" action="controller/save_google_form.php" name="google-form" id="google-form">
        <div class="container-fluid">
            <div class="container mt-5 mb-5 form-container" style="max-width: 900px;">
                <p class="text-center heading">NIRVANA Residents Welfare Association</p>
                <div class="row">
                    <div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-right logo">
                        <a href="index.php"><img src="./images/logo_google_form.png" /></a>
                    </div>
                </div>

                <div class="col-md-12 reduce-bottom-margin-5 text-center mt-3 mb-0 mb-md-3">
                  <p class="bold head-matter underline">Application for Inclusion of Email ID(s) in the Nirvana Residents Google Group</p>
                </div>
                <br>
                <p class="mt-3 no-margin">To,</p>
                <p>NRWA, Nirwana Country, Gurgaon
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <p>Date : <span class="bold underline"><?= date('d-m-Y') ?></span></p>
                        </div>
                    </div>
                    <p>Please include the following Email ID in theNirvana Residents Google Group</p>
                    <ul id="persons-list">
                        <li>
                            <div class="col-md-12 detail-form-container">
                            <p>Person details to be added -</p>
                            <div class="row">
                                <div class="col-md-3">
                                <select class="form-control mt-sm-3 mt-3 mt-md-0" name="user_title_one" required>
                                <?php if (count($user_data) > 0) { ?>
                                    <option value="Mr." <?php if ($user_data[0]['user_title_one'] == "Mr.") { ?> selected <?php } ?>>Mr.</option>
                                    <option value="Mrs." <?php if ($user_data[0]['user_title_one'] == "Mrs.") { ?> selected <?php } ?>>Mrs.</option>
                                    <option value="Ms." <?php if ($user_data[0]['user_title_one'] == "Ms.") { ?> selected <?php } ?>>Ms.</option>
                                <?php
                                    } else {?>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                <?php 
                                    }
                                ?>
                                </select>  
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['first_name_one'] : '' ?>" name="first_name_one" placeholder="First Name" required>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['mid_name_one'] : '' ?>" name="mid_name_one" placeholder="Middle Name" >
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0"  value="<?= (count($user_data) > 0) ? $user_data[0]['last_name_one'] : '' ?>" name="last_name_one" placeholder="Last Name"> 
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="email_one" value="<?= (count($user_data) > 0) ? $user_data[0]['email_one'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Email Address" required>                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <input type="text" name="isd_one" id="isd-1" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_one'] : '+91' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="ISD code" required>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <input type="text" name="mobile_one" id="mobile-1" value="<?= (count($user_data) > 0) ? $user_data[0]['mobile_one'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Mobile Number" required>
                                </div>
                            </div> 

                            <div class="row">
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="block_one" required>
                            			<?php
                                  if (count($user_data) > 0) {
                                    $block = $user_data[0]['block_one'];?>
                                    <option <?php if ($block == '') {?> selected <?php }?> disabled>Choose Block</option>
                                    <option value="1" <?php if ($block == "1"){ ?> selected <?php }?>>AG</option>
                                    <option value="2" <?php if ($block == "2"){ ?>selected<?php }?>>BC</option>
                                    <option value="3" <?php if ($block == "3"){ ?>selected<?php }?>>CC</option>
                                    <option value="4" <?php if ($block == "4"){ ?>selected<?php }?>>DW</option>
                                    <option value="5" <?php if ($block == "5"){ ?>selected<?php }?>>ES</option>
                                <?php                                      
                                    } else {?>
                                    <option disabled selected>Choose Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            	<div class="col-md-4">
                            		<input type="text" class="form-control mt-sm-3 mt-3 mt-md-3" name="house_no_one" value="<?= (count($user_data) > 0) ? $user_data[0]['house_no_one'] : '' ?>" placeholder="House Number" required>
                            	</div>
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="floor_one" required>
                            			<?php
                                  if (count($user_data) > 0) { ?>
                                      <option disabled <?php if ($user_data[0]['floor_two'] == ""){ ?> selected <?php }?>>Floor, If applicable</option>
                                      <option value="NA" <?php if ($user_data[0]['floor_one'] == "NA"){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_one'] == "GF"){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_one'] == "FF"){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_one'] == "SF"){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_one'] == "TF"){ ?> selected <?php }?>>TF</option>
                                  <?php
                                  } else { ?>
                                      <option disabled selected>Floor, If applicable</option>
                                      <option value="NA">N/A</option>
                                      <option value="GF">GF</option>
                                      <option value="FF">FF</option>
                                      <option value="SF">SF</option>
                                      <option value="TF">TF</option>
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            </div>
                            <div class="row">
                                <div class="col-md-8"> 
                                	<p class="mt-sm-3 mt-3 mt-md-3">Relationship with owner : <select class="form-control col-md-7 ml-md-4 inline-block" id="user_relation_one" name="user_relation_one" required>
                                <?php if (count($user_data) > 0) { ?>
                                        <option value="Owner" <?php if ($user_data[0]['user_relation_one'] == "Owner") { ?> selected <?php } ?>>Owner</option>
                                        <option value="Owner's spouse" <?php if ($user_data[0]['user_relation_one'] == "Owner's spouse") { ?> selected <?php } ?>>Owner's spouse</option>
                                        <option value="Owner's children" <?php if ($user_data[0]['user_relation_one'] == "Owner's children") { ?> selected <?php } ?>>Owner's children</option>
                                        <option value="Tenant" <?php if ($user_data[0]['user_relation_one'] == "Tenant") { ?> selected <?php } ?>>Tenant</option>
                                        <option value="Tenant's spouse" <?php if ($user_data[0]['user_relation_one'] == "Tenant's spouse") { ?> selected <?php } ?>>Tenant's spouse</option>
                                        <option value="Tenant's children" <?php if ($user_data[0]['user_relation_one'] == "Tenant's children") { ?> selected <?php } ?>>Tenant's children</option>
                                        <option value="Other" <?php if ($user_data[0]['user_relation_one'] == "Other") { ?> selected <?php } ?>>Other</option>
                                <?php
                                    } else {?>
                                        <option value="Owner">Owner</option>
                                        <option value="Owner's spouse">Owner's spouse</option>
                                        <option value="Owner's children">Owner's children</option>
                                        <option value="Tenant">Tenant</option>
                                        <option value="Tenant's spouse">Tenant's spouse</option>
                                        <option value="Tenant's children">Tenant's children</option>
                                        <option value="Other">Other</option>
                                <?php 
                                    }
                                ?>
                                </select> </p>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <button onclick="addAnotherPerson(this, 'two')" id="add_person_btn_one" type="button" class="btn btn-primary col-md-12 mt-sm-1 mt-1">Add Another Person</button>
                            </div>
                        </div>
                        </div>
                        </li>
                    </ul>
                    <div class="row rented_occu">
                        <div class="col-md-12 mt-3">
                            <p>Property Owner : <select class="form-control col-md-1 inline-block ml-md-1 mt-sm-3 mt-3 mt-md-0" name="po-title">
                            	<?php
                            	    if (count($user_data) > 0 && isset($user_data[0]['po-title'])) { 
                            	    	if ($user_data[0]['po-title'] == "Mr.") { ?>
                                    <option value="Mr." selected>Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                            	    	<?php
                            	    	} else if ($user_data[0]['po-title'] == "Mrs.") { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs." selected>Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                            	    	<?php
                            	    	} else if ($user_data[0]['po-title'] == "Ms.") { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms." selected>Ms.</option>
                            	    	<?php
                            	    	}
                            	    } else { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                            	<?php
                            	    }
                            	?>
                                </select><input type="text" value="<?= (count($user_data) > 0 && isset($user_data[0]['po-fname'])) ? $user_data[0]['po-fname'] : '' ?>" class="form-control col-md-3 inline-block ml-md-1 mt-sm-3 mt-3 mt-md-0" name="po-fname" placeholder="First Name" ><input type="text" value="<?= (count($user_data) > 0 && isset($user_data[0]['po-fname'])) ? $user_data[0]['po-mname'] : '' ?>" class="form-control col-md-3 inline-block ml-md-1 mt-sm-3 mt-3 mt-md-0" name="po-mname" placeholder="Middle Name"><input type="text" value="<?= (count($user_data) > 0 && isset($user_data[0]['po-lname'])) ? $user_data[0]['po-lname'] : '' ?>"  class="form-control inline-block col-md-3 ml-md-1 mt-sm-3 mt-3 mt-md-0" name="po-lname" placeholder="Last Name"></p>
                        </div>
                    </div>
                    <div class="row rented_occu">
                        <div class="col-md-12 mt-3">
                            <p>If Self Occupied / Rented :
                                <span class="custom-control custom-radio ml-3 mt-3 mt-sm-3 mt-md-0 col-12 col-sm-6 col-md-2 custom-control-inline">
                                	<?php
                                	    if (count($user_data) > 0 && isset($user_data[0]['occup-status']) && $user_data[0]['occup-status'] == 'self')  { ?>
                                    <input type="radio" id="self" name="occup-status" class="custom-control-input" checked value="self" >
                                	    <?php
                                	    } else { ?>
                                    <input type="radio" id="self" name="occup-status" class="custom-control-input" value="self" >
                                	<?php
                                	    }
                                	?>
                                    <label class="custom-control-label" for="self">Self Occupied</label>
                                </span>
                                <span class="custom-control ml-3 mt-3 mt-sm-3 mt-md-0 col-12 col-sm-6 col-md-2 custom-radio custom-control-inline">
                                	<?php
                                	    if (count($user_data) > 0 && isset($user_data[0]['occup-status']) && $user_data[0]['occup-status'] == 'leased')  { ?>
                                    <input type="radio" id="leased" name="occup-status" class="custom-control-input" checked value="rented">
                                	    <?php
                                	    } else { ?>
                                    <input type="radio" id="leased" name="occup-status" class="custom-control-input" value="rented" >
                                	<?php
                                	    }
                                	?>
                                    <label class="custom-control-label" for="leased">Rented</label>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-md-3 mt-3 mac pr-md-0">
                            <p class="mt-md-2">Subscription Status : </p>
                        </div>
                        <div class="col-md-6">
                        	<input type="text" value="<?= (count($user_data) > 0 && isset($user_data[0]['sub-status'])) ? $user_data[0]['sub-status'] : '' ?>" class="form-control mt-md-3" name="sub-status" placeholder="Enter Subscription Status">
                        </div>
                    </div>
                    <p class="mt-3 d-none">Recommended By :</p>
                    <div class="col-md-12 d-none" style="padding: 0px;">
                        	<div class="row">
                        		<div class="col-md-3">
                        			<select class="form-control mt-md-0" name="user_title">
                            	<?php
                            	    if (count($user_data) > 0 && isset($user_data[0]['user_title'])) { 
                            	    	if ($user_data[0]['user_title'] == "Mr.") { ?>
                                    <option value="Mr." selected>Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                            	    	<?php
                            	    	} else if ($user_data[0]['user_title'] == "Mrs.") { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs." selected>Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                            	    	<?php
                            	    	} else if ($user_data[0]['user_title'] == "Ms.") { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms." selected>Ms.</option>
                            	    	<?php
                            	    	}
                            	    } else { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                            	<?php
                            	    }
                            	?>
                                </select>
                        		</div>
                        		<div class="col-md-3">
                        			<input type="text" value="<?= (count($user_data) > 0  && isset($user_data[0]['first_name'])) ? $user_data[0]['first_name'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-0" name="first_name" placeholder="First Name">
                        		</div>
                        		<div class="col-md-3">
                        			<input type="text" value="<?= (count($user_data) > 0  && isset($user_data[0]['mid_name'])) ? $user_data[0]['mid_name'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-0" name="mid_name" placeholder="Middle Name">
                        		</div>
                        		<div class="col-md-3">
                        			<input type="text" value="<?= (count($user_data) > 0  && isset($user_data[0]['last_name'])) ? $user_data[0]['last_name'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-0" name="last_name" placeholder="Last Name">
                        		</div>
                        	</div>
                    </div>
                    <div class="col-md-12 rented_occu" style="padding: 0px;">
                    	<div class="row">
                         <div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="block_id" >
                            			<?php
                                  if (count($user_data) > 0) {
                                    $block = $user_data[0]['block_id'];?>
                                    <option disabled>Choose Block</option>
                                    <option value="1" <?php if ($block == "1"){ ?> selected <?php }?>>AG</option>
                                    <option value="2" <?php if ($block == "2"){ ?>selected<?php }?>>BC</option>
                                    <option value="3" <?php if ($block == "3"){ ?>selected<?php }?>>CC</option>
                                    <option value="4" <?php if ($block == "4"){ ?>selected<?php }?>>DW</option>
                                    <option value="5" <?php if ($block == "5"){ ?>selected<?php }?>>ES</option>
                                <?php                                      
                                    } else {?>
                                    <option disabled selected>Choose Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            	<div class="col-md-4">
                            		<input type="text" class="form-control mt-sm-3 mt-3 mt-md-3" name="house_number_id" value="<?= (count($user_data) > 0) ? $user_data[0]['house_number_id']: '' ?>" placeholder="House Number" >
                            	</div>
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="floor_number" >
                            			<?php
                                  if (count($user_data) > 0) { ?>
                                      <option value="NA" <?php if ($user_data[0]['floor_number'] == "NA" || $user_data[0]['floor_number'] == '-1'){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_number'] == "GF" || $user_data[0]['floor_number'] == '0'){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_number'] == "FF" || $user_data[0]['floor_number'] == '1'){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_number'] == "SF" || $user_data[0]['floor_number'] == '2'){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_number'] == "TF" || $user_data[0]['floor_number'] == '3'){ ?> selected <?php }?>>TF</option>
                                  <?php
                                  } else { ?>
                                      <option disabled selected>Floor, If applicable</option>
                                      <option value="NA">N/A</option>
                                      <option value="GF">GF</option>
                                      <option value="FF">FF</option>
                                      <option value="SF">SF</option>
                                      <option value="TF">TF</option>
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            </div>
                            </div>
                    <div class="row d-none">
                        <div class="col-md-12">
                            <input type="text"  value="<?= (count($user_data) > 0  && isset($user_data[0]['r-status-2'])) ? $user_data[0]['r-status-2'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" name="r-status-2" placeholder="Enter Status">
                        </div>
                    </div>
                    <p class="mt-4 mb-4">Confirmation by Applicant:</p>
                    <div class="custom-control custom-checkbox">
                    	<?php
                    	    if (count($user_data) > 0 && isset($user_data[0]['confirmation'])) { ?>
                        <input type="checkbox" class="custom-control-input" name="confirmation" id="confirmation" checked required>
                    	    <?php
                    	    } else { ?>
                        <input type="checkbox" class="custom-control-input" name="confirmation" id="confirmation" required>
                    	<?php
                    	    }
                    	?>
                        <label class="custom-control-label" for="confirmation">
                            I undertake to abide by the NRWA bye laws, rules and regulations and 
                            
                            <a style="color:#337ab7;font-size: 12px;" href="<?php echo SITE_URL;?>uploads/Nirvana_Residents_GG_Email_Policy.docx" target="_blank" >Nirvana Residents GG Policy</a>
                            
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <p>Signature of applicant not needed if submitted digitally. </p> 
                            <!--<p>Signature recommending person not needed if submitted digitally</p>-->
                        </div>
                    </div>
                    <div class="mt-2 mb-2 dashed-line col-md-12"></div>
                    <p class="mt-3">To Group Admin :</p>
                    <p>Dear Sir -Please include the Email ID(s) in the NIRVANA RESIDENTS GOOGLE GROUP.</p>

                    <div class="row">
                    	<div class="col-md-4">
                    		<input type="submit" name="submit" value="SUBMIT"  class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0">
                    	</div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0" name="save" value="SAVE">
                        </div>
                        <div class="col-md-4">
                            <input type="button" id="print-button" class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0" value="PRINT">
                        </div>
                    </div>

                    <div class="col-md-12 order-md-1 order-sm-2 mt-5 text-center order-2">
                        <p class="heading-2">NIRVANA Residents Welfare Association</p>
                        <p class="sub-head">Opp-Courtyard Mkt, Nirvana Country, Sector 50, Gurgaon - 122018</p>
                    </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="sentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
           if (isset($_SESSION['due_error'])) { ?>
        <h6 class="text-success">Thank you. Your form has been submitted to the office for further action.</h6>
        <p>We would like to remind you to complete the following due from your end.</p>

        <table class="table">
          <thead class="thead-dark">
            <th>Due Name</th>
            <th>Due Date</th>
            <th>Due Amount</th>
            <th>Action</th>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $_SESSION['due_error']['due_name']?></td>
              <td><?php echo $_SESSION['due_error']['due_date']?></td>
              <td><?php echo $_SESSION['due_error']['total_due']?></td>
              <td><a href="bills.php" class="btn btn-success">Pay</a></td>
            </tr>
          </tbody>
        </table>

        <?php
            } else { ?>
        
        <h6 class="text-success">Thank you. Your form has been submitted to the office for further action. You will be intimated of the same shortly.</h6>
      <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        const openHiddenField = (elem, id) => {
            document.getElementById(`${id}`).classList.remove('hide');
            elem.classList.add('hide');
        }
    </script>
    <?php

    if ($_REQUEST['actionResult'] == 'saved') { ?>
      <script type="text/javascript">
        alert("Successfully saved data !");
      </script>
  <?php
    } else if ($_REQUEST['actionResult'] == "submitted") { ?>
      <script>
        $('.modal').modal('show');
      </script>
  <?php 
    }
  ?>
    <script>
    	
    	function addAnotherPerson(elem, noOfPerson) {
    		let lastButtonId = elem.id;
    		if (noOfPerson === "three") {
    			document.getElementById('remove_person_btn_two').classList.add('hide');
    		}
    		let addButton =  (noOfPerson == 'two') ?
                        	`<div class="row">
                            <div class="col-md-4 offset-md-4">
                                <button onclick="addAnotherPerson(this, 'three')" id="add_person_btn_${noOfPerson}" type="button" class="btn btn-primary col-md-12 mt-sm-1 mt-1">Add Another Person</button>
                            </div>
                        </div>` : ``;
    		elem.classList.add('hide');
    		let personsList = document.getElementById('persons-list');
    		let childElement = document.createElement("li");
    		childElement.id = noOfPerson;
    		childElement.innerHTML = `<div class="col-md-12 detail-form-container">
                            <p>Person details to be added -</p>
                            <div class="row">
                                <div class="col-md-3">
                                <select class="form-control mt-sm-3 mt-3 mt-md-0" name="user_title_${noOfPerson}" required>
                                <?php if (count($user_data) > 0) { ?>
                                    <option value="Mr." <?php if ($user_data[0]['user_title_'.$curr_per.''] == "Mr.") { ?> selected <?php } ?>>Mr.</option>
                                    <option value="Mrs." <?php if ($user_data[0]['user_title_'.$curr_per.''] == "Mrs.") { ?> selected <?php } ?>>Mrs.</option>
                                    <option value="Ms." <?php if ($user_data[0]['user_title_'.$curr_per.''] == "Ms.") { ?> selected <?php } ?>>Ms.</option>
                                <?php
                                    } else {?>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                <?php 
                                    }
                                ?>
                                </select>  
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['first_name_'.$curr_per.''] : '' ?>" name="first_name_${noOfPerson}" placeholder="First Name" required>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['mid_name_'.$curr_per.''] : '' ?>" name="mid_name_${noOfPerson}" placeholder="Middle Name">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0"  value="<?= (count($user_data) > 0) ? $user_data[0]['last_name_'.$curr_per.''] : '' ?>" name="last_name_${noOfPerson}" placeholder="Last Name"> 
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="email_${noOfPerson}" value="<?= (count($user_data) > 0) ? $user_data[0]['email_'.$curr_per.''] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Email Address" required>                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <input type="text" name="isd_${noOfPerson}" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_'.$curr_per.''] : '+91' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="ISD code" required>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <input type="text" name="mobile_${noOfPerson}" value="<?= (count($user_data) > 0) ? $user_data[0]['mobile_'.$curr_per.''] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Mobile Number" required>
                                </div>
                            </div>  
                            <div class="row">
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="block_${noOfPerson}" required>
                            			<?php
                                  if (count($user_data) > 0) {
                                    $block = $user_data[0]['block_'.$curr_per.''];?>
                                    <option <?php if ($block == '') {?> selected <?php }?>disabled>Choose Block</option>
                                    <option value="1" <?php if ($block == "1"){ ?> selected <?php }?>>AG</option>
                                    <option value="2" <?php if ($block == "2"){ ?>selected<?php }?>>BC</option>
                                    <option value="3" <?php if ($block == "3"){ ?>selected<?php }?>>CC</option>
                                    <option value="4" <?php if ($block == "4"){ ?>selected<?php }?>>DW</option>
                                    <option value="5" <?php if ($block == "5"){ ?>selected<?php }?>>ES</option>
                                <?php                                      
                                    } else {?>
                                    <option disabled selected>Choose Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            	<div class="col-md-4">
                            		<input type="text" class="form-control mt-sm-3 mt-3 mt-md-3" value="<?= (count($user_data) > 0) ? $user_data[0]['house_no_'.$curr_per.''] : '' ?>" name="house_no_${noOfPerson}" placeholder="House Number" required>
                            	</div>
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="floor_${noOfPerson}" required>
                            			<?php
                                  if (count($user_data) > 0) { ?>
                                      <option disabled <?php if ($user_data[0]['floor_'.$curr_per.''] == ""){ ?> selected <?php }?>>Floor, If applicable</option>
                                      <option value="NA" <?php if ($user_data[0]['floor_'.$curr_per.''] == "NA"){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_'.$curr_per.''] == "GF"){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_'.$curr_per.''] == "FF"){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_'.$curr_per.''] == "SF"){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_'.$curr_per.''] == "TF"){ ?> selected <?php }?>>TF</option>
                                  <?php
                                  } else { ?>
                                      <option disabled selected>Floor, If applicable</option>
                                      <option value="NA">N/A</option>
                                      <option value="GF">GF</option>
                                      <option value="FF">FF</option>
                                      <option value="SF">SF</option>
                                      <option value="TF">TF</option>
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            </div>
                            <div class="row">
                                <div class="col-md-8"> 
                                	<p class="mt-sm-3 mt-3 mt-md-3">Relationship with owner : <select class="form-control col-md-7 ml-md-4 inline-block" name="user_relation_${noOfPerson}" required>
                                <?php if (count($user_data) > 0) { ?>
                                        <option value="Owner" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Owner") { ?> selected <?php } ?>>Owner</option>
                                        <option value="Owner's spouse" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Owner's spouse") { ?> selected <?php } ?>>Owner's spouse</option>
                                        <option value="Owner's children" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Owner's children") { ?> selected <?php } ?>>Owner's children</option>
                                        <option value="Tenant" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Tenant") { ?> selected <?php } ?>>Tenant</option>
                                        <option value="Tenant's spouse" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Tenant's spouse") { ?> selected <?php } ?>>Tenant's spouse</option>
                                        <option value="Tenant's children" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Tenant's children") { ?> selected <?php } ?>>Tenant's children</option>
                                        <option value="Other" <?php if ($user_data[0]['user_relation_'.$curr_per.''] == "Other") { ?> selected <?php } ?>>Other</option>
                                <?php
                                    } else {?>
                                        <option value="Owner">Owner</option>
                                        <option value="Owner's spouse">Owner's spouse</option>
                                        <option value="Owner's children">Owner's children</option>
                                        <option value="Tenant">Tenant</option>
                                        <option value="Tenant's spouse">Tenant's spouse</option>
                                        <option value="Tenant's children">Tenant's children</option>
                                        <option value="Other">Other</option>
                                <?php 
                                    }
                                ?>
                                </select> </p>
                                </div>
                        </div>` + addButton +`

                        <div class="row">                        
                                <div class="col-md-4 offset-md-4">
                                	<button onclick="removePerson('${lastButtonId}', '${noOfPerson}')" id="remove_person_btn_${noOfPerson}" type="button" class="btn btn-danger col-md-12 mt-sm-1 mt-1">Remove Person</button>
                                </div>
                        </div>
                        </div>`;
    		personsList.appendChild(childElement);
    	}

    	function removePerson(lastButtonID, noOfPerson) {
    		document.getElementById(lastButtonID).classList.remove('hide');
    		if (noOfPerson === "three") {
    			document.getElementById('remove_person_btn_two').classList.remove('hide');
    		}
    		let personsList = document.getElementById('persons-list');
    		personsList.removeChild(document.getElementById(noOfPerson));
    	}

    	function addShowPersonTwo() {
    		let lastButtonId = 'add_person_btn_one';
    		let addButton = `<div class="row">
                            <div class="col-md-4 offset-md-4">
                                <button onclick="addAnotherPerson(this, 'three')" id="add_person_btn_two" type="button" class="btn btn-primary col-md-12 mt-sm-1 mt-1">Add Another Person</button>
                            </div>
                        </div>`;
    		document.getElementById(lastButtonId).classList.add('hide');
    		let personsList = document.getElementById('persons-list');
    		let childElement = document.createElement("li");
    		childElement.id = "two";
    		childElement.innerHTML = `<div class="col-md-12 detail-form-container">
                            <p>Person details to be added -</p>
                            <div class="row">
                                <div class="col-md-3">
                                <select class="form-control mt-sm-3 mt-3 mt-md-0" name="user_title_two" required>
                                <?php if (count($user_data) > 0) { ?>
                                    <option value="Mr." <?php if ($user_data[0]['user_title_two'] == "Mr.") { ?> selected <?php } ?>>Mr.</option>
                                    <option value="Mrs." <?php if ($user_data[0]['user_title_two'] == "Mrs.") { ?> selected <?php } ?>>Mrs.</option>
                                    <option value="Ms." <?php if ($user_data[0]['user_title_two'] == "Ms.") { ?> selected <?php } ?>>Ms.</option>
                                <?php
                                    } else {?>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                <?php 
                                    }
                                ?>
                                </select>  
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['first_name_two'] : '' ?>" name="first_name_two" placeholder="First Name" required>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['mid_name_two'] : '' ?>" name="mid_name_two" placeholder="Middle Name">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0"  value="<?= (count($user_data) > 0) ? $user_data[0]['last_name_two'] : '' ?>" name="last_name_two" placeholder="Last Name"> 
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="email_two" value="<?= (count($user_data) > 0) ? $user_data[0]['email_two'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Email Address" required>                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <input type="text" name="isd_two" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_two'] : '+91' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="ISD code" required>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <input type="text" name="mobile_two" value="<?= (count($user_data) > 0) ? $user_data[0]['mobile_two'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Mobile Number" required>
                                </div>
                            </div>  
                            <div class="row">
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="block_two" required>
                            			<?php
                                  if (count($user_data) > 0) {
                                    $block = $user_data[0]['block_two'];?>
                                    <option <?php if ($block == '') {?> selected <?php }?>disabled>Choose Block</option>
                                    <option value="1" <?php if ($block == "1"){ ?> selected <?php }?>>AG</option>
                                    <option value="2" <?php if ($block == "2"){ ?>selected<?php }?>>BC</option>
                                    <option value="3" <?php if ($block == "3"){ ?>selected<?php }?>>CC</option>
                                    <option value="4" <?php if ($block == "4"){ ?>selected<?php }?>>DW</option>
                                    <option value="5" <?php if ($block == "5"){ ?>selected<?php }?>>ES</option>
                                <?php                                      
                                    } else {?>
                                    <option disabled selected>Choose Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            	<div class="col-md-4">
                            		<input type="text" class="form-control mt-sm-3 mt-3 mt-md-3" value="<?= (count($user_data) > 0) ? $user_data[0]['house_no_two'] : '' ?>" name="house_no_two" placeholder="House Number" required>
                            	</div>
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="floor_two" required>
                            			<?php
                                  if (count($user_data) > 0) { ?>
                                      <option disabled <?php if ($user_data[0]['floor_two'] == ""){ ?> selected <?php }?>>Floor, If applicable</option>
                                      <option value="NA" <?php if ($user_data[0]['floor_two'] == "NA"){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_two'] == "GF"){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_two'] == "FF"){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_two'] == "SF"){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_two'] == "TF"){ ?> selected <?php }?>>TF</option>
                                  <?php
                                  } else { ?>
                                      <option disabled selected>Floor, If applicable</option>
                                      <option value="NA">N/A</option>
                                      <option value="GF">GF</option>
                                      <option value="FF">FF</option>
                                      <option value="SF">SF</option>
                                      <option value="TF">TF</option>
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            </div>
                            <div class="row">
                                <div class="col-md-8"> 
                                	<p class="mt-sm-3 mt-3 mt-md-3">Relationship with owner : <select class="form-control col-md-7 ml-md-4 inline-block" name="user_relation_two" required>
                                <?php if (count($user_data) > 0) { ?>
                                        <option value="Owner" <?php if ($user_data[0]['user_relation_two'] == "Owner") { ?> selected <?php } ?>>Owner</option>
                                        <option value="Owner's spouse" <?php if ($user_data[0]['user_relation_two'] == "Owner's spouse") { ?> selected <?php } ?>>Owner's spouse</option>
                                        <option value="Owner's children" <?php if ($user_data[0]['user_relation_two'] == "Owner's children") { ?> selected <?php } ?>>Owner's children</option>
                                        <option value="Tenant" <?php if ($user_data[0]['user_relation_two'] == "Tenant") { ?> selected <?php } ?>>Tenant</option>
                                        <option value="Tenant's spouse" <?php if ($user_data[0]['user_relation_two'] == "Tenant's spouse") { ?> selected <?php } ?>>Tenant's spouse</option>
                                        <option value="Tenant's children" <?php if ($user_data[0]['user_relation_two'] == "Tenant's children") { ?> selected <?php } ?>>Tenant's children</option>
                                        <option value="Other" <?php if ($user_data[0]['user_relation_two'] == "Other") { ?> selected <?php } ?>>Other</option>
                                <?php
                                    } else {?>
                                        <option value="Owner">Owner</option>
                                        <option value="Owner's spouse">Owner's spouse</option>
                                        <option value="Owner's children">Owner's children</option>
                                        <option value="Tenant">Tenant</option>
                                        <option value="Tenant's spouse">Tenant's spouse</option>
                                        <option value="Tenant's children">Tenant's children</option>
                                        <option value="Other">Other</option>
                                <?php 
                                    }
                                ?>
                                </select> </p>
                                </div>
                        </div>` + addButton +`

                        <div class="row">                        
                                <div class="col-md-4 offset-md-4">
                                	<button onclick="removePerson('${lastButtonId}', 'two')" id="remove_person_btn_two" type="button" class="btn btn-danger col-md-12 mt-sm-1 mt-1">Remove Person</button>
                                </div>
                        </div>
                        </div>`;
    		personsList.appendChild(childElement);
    	}

    	function addShowPersonThree() {
    		let lastButtonId = 'add_person_btn_two';
    		let addButton = ``;
    		document.getElementById(lastButtonId).classList.add('hide');
    		document.getElementById("remove_person_btn_two").classList.add('hide');
    		let personsList = document.getElementById('persons-list');
    		let childElement = document.createElement("li");
    		childElement.id = "three";
    		childElement.innerHTML = `<div class="col-md-12 detail-form-container">
                            <p>Person details to be added -</p>
                            <div class="row">
                                <div class="col-md-3">
                                <select class="form-control mt-sm-3 mt-3 mt-md-0" name="user_title_three" required>
                                <?php if (count($user_data) > 0) { ?>
                                    <option value="Mr." <?php if ($user_data[0]['user_title_three'] == "Mr.") { ?> selected <?php } ?>>Mr.</option>
                                    <option value="Mrs." <?php if ($user_data[0]['user_title_three'] == "Mrs.") { ?> selected <?php } ?>>Mrs.</option>
                                    <option value="Ms." <?php if ($user_data[0]['user_title_three'] == "Ms.") { ?> selected <?php } ?>>Ms.</option>
                                <?php
                                    } else {?>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                <?php 
                                    }
                                ?>
                                </select>  
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['first_name_three'] : '' ?>" name="first_name_three" placeholder="First Name" required>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0" value="<?= (count($user_data) > 0) ? $user_data[0]['mid_name_three'] : '' ?>" name="mid_name_three" placeholder="Middle Name">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control mt-sm-3 mt-3 mt-md-0"  value="<?= (count($user_data) > 0) ? $user_data[0]['last_name_three'] : '' ?>" name="last_name_three" placeholder="Last Name"> 
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="email_three" value="<?= (count($user_data) > 0) ? $user_data[0]['email_three'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Email Address" required>                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <input type="text" name="isd_three" value="<?= (count($user_data) > 0) ? $user_data[0]['isd_three'] : '+91' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="ISD code" required>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <input type="text" name="mobile_three" value="<?= (count($user_data) > 0) ? $user_data[0]['mobile_three'] : '' ?>" class="form-control mt-sm-3 mt-3 mt-md-3" placeholder="Mobile Number" required>
                                </div>
                            </div>  
                            <div class="row">
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="block_three" required>
                            			<?php
                                  if (count($user_data) > 0) {
                                    $block = $user_data[0]['block_three'];?>
                                    <option <?php if ($block == '') {?> selected <?php }?>disabled>Choose Block</option>
                                    <option value="1" <?php if ($block == "1"){ ?> selected <?php }?>>AG</option>
                                    <option value="2" <?php if ($block == "2"){ ?>selected<?php }?>>BC</option>
                                    <option value="3" <?php if ($block == "3"){ ?>selected<?php }?>>CC</option>
                                    <option value="4" <?php if ($block == "4"){ ?>selected<?php }?>>DW</option>
                                    <option value="5" <?php if ($block == "5"){ ?>selected<?php }?>>ES</option>
                                <?php                                      
                                    } else {?>
                                    <option disabled selected>Choose Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            	<div class="col-md-4">
                            		<input type="text" class="form-control mt-sm-3 mt-3 mt-md-3" value="<?= (count($user_data) > 0) ? $user_data[0]['house_no_three'] : '' ?>" name="house_no_three" placeholder="House Number" required>
                            	</div>
                            	<div class="col-md-4">
                            		<select class="form-control mt-sm-3 mt-3 mt-md-3" name="floor_three" required>
                            			<?php
                                  if (count($user_data) > 0) { ?>
                                      <option disabled <?php if ($user_data[0]['floor_three'] == ""){ ?> selected <?php }?>>Floor, If applicable</option>
                                      <option value="NA" <?php if ($user_data[0]['floor_three'] == "NA"){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_three'] == "GF"){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_three'] == "FF"){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_three'] == "SF"){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_three'] == "TF"){ ?> selected <?php }?>>TF</option>
                                  <?php
                                  } else { ?>
                                      <option disabled selected>Floor, If applicable</option>
                                      <option value="NA">N/A</option>
                                      <option value="GF">GF</option>
                                      <option value="FF">FF</option>
                                      <option value="SF">SF</option>
                                      <option value="TF">TF</option>
                                <?php
                                  }
                                ?>
                            		</select>
                            	</div>
                            </div>
                            <div class="row">
                                <div class="col-md-8"> 
                                	<p class="mt-sm-3 mt-3 mt-md-3">Relationship with owner : <select class="form-control col-md-7 ml-md-4 inline-block" name="user_relation_three" required>
                                <?php if (count($user_data) > 0) { ?>
                                        <option value="Owner" <?php if ($user_data[0]['user_relation_three'] == "Owner") { ?> selected <?php } ?>>Owner</option>
                                        <option value="Owner's spouse" <?php if ($user_data[0]['user_relation_three'] == "Owner's spouse") { ?> selected <?php } ?>>Owner's spouse</option>
                                        <option value="Owner's children" <?php if ($user_data[0]['user_relation_three'] == "Owner's children") { ?> selected <?php } ?>>Owner's children</option>
                                        <option value="Tenant" <?php if ($user_data[0]['user_relation_three'] == "Tenant") { ?> selected <?php } ?>>Tenant</option>
                                        <option value="Tenant's spouse" <?php if ($user_data[0]['user_relation_three'] == "Tenant's spouse") { ?> selected <?php } ?>>Tenant's spouse</option>
                                        <option value="Tenant's children" <?php if ($user_data[0]['user_relation_three'] == "Tenant's children") { ?> selected <?php } ?>>Tenant's children</option>
                                        <option value="Other" <?php if ($user_data[0]['user_relation_three'] == "Other") { ?> selected <?php } ?>>Other</option>
                                <?php
                                    } else {?>
                                        <option value="Owner">Owner</option>
                                        <option value="Owner's spouse">Owner's spouse</option>
                                        <option value="Owner's children">Owner's children</option>
                                        <option value="Tenant">Tenant</option>
                                        <option value="Tenant's spouse">Tenant's spouse</option>
                                        <option value="Tenant's children">Tenant's children</option>
                                        <option value="Other">Other</option>
                                <?php 
                                    }
                                ?>
                                </select> </p>
                                </div>
                        </div>` + addButton +`

                        <div class="row">                        
                                <div class="col-md-4 offset-md-4">
                                	<button onclick="removePerson('${lastButtonId}', 'three')" id="remove_person_btn_three" type="button" class="btn btn-danger col-md-12 mt-sm-1 mt-1">Remove Person</button>
                                </div>
                        </div>
                        </div>`;
    		personsList.appendChild(childElement);
    	}
    </script>

    <?php 

        if (count($user_data) > 0) {
        	if (isset($user_data[0]['first_name_two'])) {
        		?>
        		<script>I will always use Parliamentary Language.
        			addShowPersonTwo();
        		</script>
    <?php
        	}

        	if (isset($user_data[0]['first_name_three'])) { ?>
        		<script>
        			addShowPersonThree();
        		</script>
    <?php

        	}
        }

    ?>
    <script src="./js/print.js"></script>
    <script>
    
    $( document ).ready(function() {
         $('#user_relation_one').on('change', function() {
          if(this.value=="Owner"){
              $(".rented_occu").hide();
          }else{
              $(".rented_occu").show();
          }
        });
        $(".rented_occu").hide();
    });
   
    
    </script>
    
    
</body>

</html>