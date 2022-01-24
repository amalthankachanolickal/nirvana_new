<?php include('model/class.expert.php'); ?>

<?php

$user_data = array();

if (isset($_SESSION['user_data'])) {
  $data = $_SESSION['user_data'];
  array_push($user_data, $data);
} else if (isset($_GET['fid'])) {
  $id = base64_decode($_GET['fid']);
  $ModelCall->where("id", $id);
  $data = $ModelCall->get("tbl_dhc_data");
  if (count($data) == 0) {
    header("Location: dhc_undertaking.php");
  }
  $form_data = array(
    "title" => $data[0]["req_title"],
    "fname" => $data[0]["req_fname"],
    "lname" => $data[0]["req_lname"],
    "emp_as_drop" => $data[0]["req_emp"],
    "res" => $data[0]["req_addr"],
    "user_title" => $data[0]["app_title"],
    "first_name" => $data[0]["app_fname"],
    "last_name" => $data[0]["app_lname"],
    "house_number_id" => $data[0]["app_villa_no"],
    "block_id" => $data[0]["app_block"],
    "floor_number" => $data[0]["floor_number"],
    "isd" => $data[0]["app_isd"],
    "app_phone" => $data[0]["app_phone"],
    "user_email" => $data[0]["user_email"],
    "app_type" => $data[0]["app_type"]
  );
  array_push($user_data, $form_data);
} else {
  $ModelCall->where("user_id", $_SESSION['UR_LOGINID']);
  $user_data = $ModelCall->get("Wo_Users");
}

$ip = $_SERVER['REMOTE_ADDR'];

$ModelCall->where("ip_address", $ip);
$track_data = $ModelCall->get("tbl_form_tracker");

if (count($track_data) > 0) {
  $up_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "view_count" => intval($track_data[0]['view_count']) + 1,
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "DHC_FORM"    
  );
  $ModelCall->where("ip_address", $ip);
  $ModelCall->update("tbl_form_tracker", $up_data);
} else {
  $insert_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "view_count" => "1",
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "DHC_FORM"
  );
  $ModelCall->insert("tbl_form_tracker", $insert_data);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="./images/logo_google_form.png" type="image/png">
    <title>NIRVANA Residents Welfare Association</title>
    <style>

html, body {
    font-family: 'Source Sans Pro', sans-serif;
}
body {
    float: left;
    width: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    color: #545454;
}
p {
    font-size: 14px;
    line-height: 26px;
}
a, a:hover, a:focus, a:active {
    color: inherit;
    outline: none;
    -webkit-text-decoration: none;
    -moz-text-decoration: none;
    -ms-text-decoration: none;
    -o-text-decoration: none;
    text-decoration: none;
}
input:focus, textarea:focus, select:focus, button:focus {
    outline: none;
}

.form-container {
    border: 1px solid black;
    padding: 30px 20px;
}

p.heading {
    font-size: 18px;
    font-weight: bold;
}

.underline {
    text-decoration: underline;
}

.bold {
    font-weight: bold;
}

.action-btn {
    color: #ffffff;
    font-size: 24px;
    padding: 3px 0px;
    font-weight: 800;
    border: 0px;
    border-color: #ffffff;
    outline: none;
    margin: 0px;
    cursor: pointer;
    box-shadow: none;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
}

.myprime {
    color: #828282;
}

.myprime:hover, .myprime:active, .myprime:focus {
    color: #37a000;
    outline: none !important;
    box-shadow: none;
}


.mydanger {
    color: #828282;
}

.mydanger:hover, .mydanger:active, .mydanger:focus {
    color: #dc3545;
    outline: none !important;
    box-shadow: none;
}

p.heading-2 {
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 0px;
}

.logo img {
    max-height: 80px;
    width: auto;
}

.no-margin {
    margin: 0px;
}

.inline-block {
    display: inline-block;
    padding: 0px !important;
}

.width-auto {
    display: inline-block;
    width: auto !important;
}

.dashed-line {
    border-top: 1px dashed black;
}

.btn-danger {
    margin: 0px !important;
    padding: 8px 0px !important;
}

.btn-primary {
    color: #ffffff;
    font-size: 16px;
    background-color: #37a000;
    padding: 8px 0px;
    font-weight: 500;
    border: 0px;
    border-color: #37a000;
    margin: 0px;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
}

.btn-primary:hover, .btn-primary:active {
    background: #37a000;
    border: 0px;
}

.btn-success {
    background: #37a000 !important;
    color: #fff !important;
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


      input[type="text"], input[type="email"] {
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 1px dashed black;
        outline: 0px;
        box-shadow: none;
        padding: 0px;
        margin: 0px;
      }

      input[type="text"]:active, input[type="text"]:focus, input[type="email"]:active, input[type="email"]:focus {
        outline: 0px;
        box-shadow: none;
        border-bottom: 1px dashed black;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
      }

      .hide {
        display: none;
      }

      ol li {
        font-weight:bold;
        margin-top: 10px;
      }
      
      li > p {
        font-weight:normal;
      }

      .mytext {
        width: 100%;
      }

      .dflex {
        display: block;
      }
      @media screen and (min-width: 768px) {
      	.mflex {
      		display: inline-flex;
      	}

      	.mflex > input {
      		max-width: 250px;
      		margin-right: 8px !important;
      	}
      input[type="text"], input[type="email"] {
      	margin-left: 8px !important;
      }


        .form-container {
          position: relative !important;
        }

        #isd {
          max-width: 50px !important;
        }

      .dflex {
        display: flex;
      }

        .mytext {
          width: 230px;
        }

        .myimg {
          position: absolute;
          top: 75px;
          right: 40px;
        }

        .myimg a img {
          width: 100px;
          height: auto;
        }
      }

      @media screen and (max-width: 768px) {
      	p {
      		line-height: 24px;
      	}

      	p label {
      		display: none;
      	}

      	p label#check {
      		display: inline;
      	}

      	.w-auto {
      		min-width: 100%;
      	}

      	.my-check {
      		display: inline;
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
        	margin-left: 8px;
        }

        .myflex > select {
        	max-height: 50px;
        	margin-top: 10px !important;
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

      #isd {
      	max-width: 40px;
      }

      .rat-w {
      	max-width: 50%;
      	margin-left: 8px !important;
      }
      }

    </style>
</head>

<body>
    <form method="post" action="controller/save_dhc_undertaking.php" name="google-form" id="google-form" onsubmit="return validateNumber()">
        <div class="container" style="max-width: 1000px;">
            <div class="container mt-5 mb-5 form-container">
                <div class="row">
                    <div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-right logo">
                        <a href="index.php"><img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" /></a>
                    </div>
                </div>
                <p class="text-center heading">NIRVANA Residents Welfare Association</p>
                <br>
                <p class="mt-3 no-margin">To,</p>
                <p class="no-margin">The President / Secretary</p>
                <p class="no-margin">NRWA</p>

                <div class="col-md-12 reduce-bottom-margin-5 text-center mt-3 mb-0 mb-md-3">
                  <p class="bold head-matter">Undertaking for entry of domestic help</p>
                </div>
                <br>
                <p style="line-height: 30px;">I/We resident <select onchange="changeOtype(this, 'd-rtype')" name="app_type">
                  <?php
                     if(count($user_data) > 0) { ?>                     
                      <option value="Owner" <?php if ($user_data[0]['app_type'] == "Owner"){ ?> selected <?php }?>>Owner</option>
                      <option value="Tenant" <?php if ($user_data[0]['app_type'] == "Tenant"){ ?> selected <?php }?>>Tenant</option>
                    <?php
                     } else { ?>
                      <option value="Owner">Owner</option>
                      <option value="Tenant">Tenant</option>
                  <?php
                     }
                  ?>
                </select>  of 
                <select name="block_id" onchange="changeOtype(this, 'd-bid')">
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
                                    <option disabled selected>Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                              </select> 
                              <input type="text" onkeyup="changeChar(this, 'd-hnid')" name="house_number_id" value="<?= (count($user_data) > 0) ? $user_data[0]['house_number_id'] : '' ?>" class="mytext fl-w inline-block" maxlength="4" placeholder="Villa"> 

                              <select name="floor_number"  onchange="changeOtype(this, 'd-fn')"><?php
                                  if (count($user_data) > 0) { ?>
                                      <option value="NA" <?php if ($user_data[0]['floor_number'] == "NA"){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_number'] == "GF"){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_number'] == "FF"){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_number'] == "SF"){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_number'] == "TF"){ ?> selected <?php }?>>TF</option>
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
                              </select> have verified the above detailed as required by estate office. Kindly allow our Domestic Help , namely, &nbsp; <select name="title">                    
                                <?php
                                  if (count($user_data) > 0) { ?>
                                    <option value="Mr." <?php if ($user_data[0]['title'] == "Mr.") { ?> selected <?php }?>>Mr.</option>
                                    <option value="Mrs." <?php if ($user_data[0]['title'] == "Mrs.") { ?> selected <?php }?>>Mrs.</option>
                                    <option value="Ms." <?php if ($user_data[0]['title'] == "Ms.") { ?> selected <?php }?>>Ms.</option>
                                  <?php
                                  } else { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                <?php
                                  }
                                ?>
                  </select>
                  <input type="text" class="mytext n-w inline-block" value="<?= (count($user_data) > 0) ? $user_data[0]['fname'] :'' ?>" name="fname" placeholder="First Name">
                  <input type="text" class="mytext n-w inline-block" value="<?= (count($user_data) > 0) ? $user_data[0]['lname'] :'' ?>" name="lname" placeholder="Last Name">, employed as 
                  <select name="emp_as_drop" onchange="validateEmp(this)">
                    <?php
                      if (count($user_data) > 0) { ?>
                    <option value="housemaid" <?php if ($user_data[0]['emp_as_drop'] == "housemaid") {?> selected <?php } ?>>House Maid</option>
                    <option value="gardener" <?php if ($user_data[0]['emp_as_drop'] == "gardener") {?> selected <?php } ?>>Gardener</option>
                    <option value="other" <?php if ($user_data[0]['emp_as_drop'] == "other") {?> selected <?php } ?>>Other</option>
                    <?php
                      } else { ?>
                    <option selected disabled>Choose employed as</option>
                    <option value="housemaid">House Maid</option>
                    <option value="gardener">Gardener</option>
                    <option value="other">Other</option>
                    <?php
                      }
                    ?>
                  </select>
                <?php
                   if (count($user_data) > 0 && $user_data[0]['emp_as_drop'] == "other") { ?>
                    <input type="text" id="empas" value="<?= $user_data[0]['empas'] ?>" name="empas" placeholder="Please specify">
                <?php
                   } else { ?>
                <input type="text" id="empas" class="hide" value="" name="empas" placeholder="Please specify">
                <?php
                   }
                ?> , residing at
                <input type="text" class="mytext rat-w inline-block" value="<?= (count($user_data) > 0) ? $user_data[0]['res'] :'' ?>" name="res" placeholder="Residing at"> . 
                  <br>
              </p>
              <p>We also understand our own responsibilities as enumerated below:</p>
                <div class="col-md-12 mt-3">
                  <ol type="number" class="mt-2">
                    <li> <p class="mylink">I will ensure that <b>(s) he has <a href="https://www.mygov.in/aarogya-setu-app/" target="_blank">Aarogya Setu App</a> installed on her/his smartphone</b>. I also understand that my domestic help will not be allowed in <b>if the status  on Aragoya Setu app is not Green or the App is not working</b>.</p></li>
                    <li> <p>I will explain all personal hygiene related aspects to domestic help and constantly remind her/him.</p></li>
                    <li> <p><b>If the domestic help is part time</b> - The domestic help will stay within our house premises between <b>7:30 AM and 6.30 PM</b>. domestic help will not be sent out to get any deliveries, walking the dog, occupy any common area or to any neighbours’ house.</p></li>
                    <li> <p>I will ensure that domestic help is wearing mask all the time while at work in our house and while (s)he is outdoors.</p></li>
                    <li> <p>We will ensure that domestic help washes her/his hands before entering and before leaving our house.</p></li>
                    <li> <p>I will download the society connect App and will inform the same to NRWA office. The maid servant data will be linked to my account. This will help me in  getting the information about entry and exit of the maid. If there is too much gap between the time she leaves and exit  at the gate I will inform the same to NRWA office for necessary action.</p></li>
                  </ol>
                </div>
    <p><br>I also understand that violation of society laid out rules may lead cessation of DH pass for two weeks.</p>
    <p>Situation being dynamic, the guidelines may change depending on government directions to which the residents/applicants will adhere.</p>
    <p>The above information related to domestic help’s particulars is as told us by the domestic help and verified by us.</p>
    <p></p> <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p><label>Resident’s Name : </label><span class="myflex">
                              <select name="user_title">
                                <?php
                                  if (count($user_data) > 0) { ?>
                                    <option value="Mr." <?php if ($user_data[0]['user_title'] == "Mr.") { ?> selected <?php } ?>>Mr.</option>
                                    <option value="Mrs." <?php if ($user_data[0]['user_title'] == "Mrs.") { ?> selected <?php } ?>>Mrs.</option>
                                    <option value="Ms." <?php if ($user_data[0]['user_title'] == "Ms.") { ?> selected <?php } ?>>Ms.</option>
                                <?php
                                  } else { ?>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                <?php
                                  }
                                ?>
                              </select>
                              <input type="text" name="first_name" value="<?= (count($user_data) > 0 ) ? $user_data[0]['first_name'] :'' ?>" class="col-12 col-sm-12 mytext ml-md-3 mt-sm-3 mt-3 mt-md-0" placeholder="First Name">
                              <input type="text" name="last_name" value="<?= (count($user_data) > 0 ) ? $user_data[0]['last_name'] :'' ?>" class="col-12 col-sm-12 mytext ml-md-3 mt-sm-3 mt-3 mt-md-0" placeholder="Last Name">
                          </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 dflex">
                          <p><label>Resident Type : </label> <select disabled id="d-rtype" name="app_type" class="w-auto">
                  <?php
                     if(count($user_data) > 0) { ?>
                      <option value="Owner" <?php if ($user_data[0]['app_type'] == "Owner") { ?> selected <?php } ?>>Owner</option>
                      <option value="Tenant" <?php if ($user_data[0]['app_type'] == "Tenant") { ?> selected <?php } ?>>Tenant</option>
                  <?php
                     } else { ?>
                      <option value="Owner">Owner</option>
                      <option value="Tenant">Tenant</option>
                  <?php
                     }
                  ?>
                </select> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                            <p>                            	
                            <label>Resident's Address : </label>
                            	<span class="myflex mflex">
                              <select name="block_id" id="d-bid" disabled>
                                <?php
                                  if (count($user_data) > 0) {
                                    $block = $user_data[0]['block_id'];?>
                                    <option disabled>Block</option>
                                    <option value="1" <?php if ($block == "1"){ ?> selected <?php }?>>AG</option>
                                    <option value="2" <?php if ($block == "2"){ ?>selected<?php }?>>BC</option>
                                    <option value="3" <?php if ($block == "3"){ ?>selected<?php }?>>CC</option>
                                    <option value="4" <?php if ($block == "4"){ ?>selected<?php }?>>DW</option>
                                    <option value="5" <?php if ($block == "5"){ ?>selected<?php }?>>ES</option>
                                <?php                                      
                                    } else {?>
                                    <option disabled selected>Block</option>
                                    <option value="1">AG</option>
                                    <option value="2">BC</option>
                                    <option value="3">CC</option>
                                    <option value="4">DW</option>
                                    <option value="5">ES</option>
                            
                                <?php
                                  }
                                ?>
                              </select> 
                              <input type="text" id="d-hnid" disabled name="house_number_id" value="<?= (count($user_data) > 0) ? $user_data[0]['house_number_id'] : '' ?>" class="mytext inline-block ml-md-3 mt-sm-3 mt-3 mt-md-0 mr-sm-1 mr-1 mr-md-0" placeholder="Villa">
                            <select name="floor_number" id="d-fn" disabled><?php
                                  if (count($user_data) > 0) { ?>
                                      <option value="NA" <?php if ($user_data[0]['floor_number'] == "NA"){ ?> selected <?php }?>>N/A</option>
                                      <option value="GF" <?php if ($user_data[0]['floor_number'] == "GF"){ ?> selected <?php }?>>GF</option>
                                      <option value="FF" <?php if ($user_data[0]['floor_number'] == "FF"){ ?> selected <?php }?>>FF</option>
                                      <option value="SF" <?php if ($user_data[0]['floor_number'] == "SF"){ ?> selected <?php }?>>SF</option>
                                      <option value="TF" <?php if ($user_data[0]['floor_number'] == "TF"){ ?> selected <?php }?>>TF</option>
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
                          </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                            <p class="mt-2 mt-sm-2 mt-md-0">
                            	<label>Contact : </label>
                            	<span class="mflex myflex"> <input type="text" class="mytext col-12 col-sm-12 inline-block ml-md-3" id="isd" value="<?= (count($user_data) > 0) ? $user_data[0]['isd'] : '+91' ?>" placeholder="ISD" name="isd"><input type="text" placeholder="Phone Number" class="mytext col-12 col-sm-12 inline-block ml-md-3" value="<?= (count($user_data) > 0) ? $user_data[0]['app_phone'] : '' ?>" name="app_phone" id="app_phone"><input type="email" value="<?= (count($user_data) > 0) ? $user_data[0]['user_email'] : '' ?>" placeholder="Email Address" class="mytext col-12 col-sm-12 inline-block ml-md-3" name="user_email"></span></p>
                      </div>
                    </div>
    <p>
      <input type="checkbox" name="confirmation" class="my-check <?php if (isset($_GET['fid'])) { echo 'hide'; }?>" id="confirmation" required>
      <label id="check" for="confirmation"> Yes, I understand and agree to this undertaking and the <a href="terms_conditions.php">Terms of Use</a>.</label>
    </p>
    <p>This document will not need a physical signature. if submitted online or through email.</p>
                    <div class="dflex" style="align-items: center; justify-content: center;">
                        <div class="col-md-3 <?php if (isset($_GET['fid'])) { echo 'hide'; }?>">
                            <input type="submit" class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0" name="submit" value="SUBMIT">
                        </div>
                        <div class="col-md-3 <?php if (isset($_GET['fid'])) { echo 'hide'; }?>">
                            <input type="submit" name="save" class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0" value="SAVE">
                        </div>
                        <div class="col-md-3">
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
    <script src="<?php echo SITE_URL;?>/js/print.js"></script>
    <?php

    if ($_REQUEST['actionResult'] == 'saved') { ?>
      <script type="text/javascript">
        alert("Successfully saved data !");
      </script>
  <?php
    } else if ($_REQUEST['actionResult'] == "sent") { ?>
      <script>
        $('.modal').modal('show');
      </script>
  <?php 
    }
  ?>
    <script>
      function validateNumber(){

        var Number = document.getElementById('app_phone').value;
        var IndNum = /^[0]?[789]\d{9}$/;

        if(IndNum.test(Number)){
          return true;
        } else{
          alert("Please enter valid mobile number.");
        }

        return false;
      }
    </script>
    <script>
      function validateEmp(elem) {
        let selectedValue = elem.options[elem.selectedIndex].value;
        let otherOption = document.getElementById('empas');
        if (selectedValue === "other") {
          otherOption.classList.remove("hide");
        } else {
          otherOption.classList.add("hide");
        }
      }

      function changeOtype(elem, id) {
      	let index = elem.selectedIndex;
      	let dotype = document.getElementById(id);
      	dotype.selectedIndex = index;
      } 

      function changeChar(elem, id) {
      	let val = elem.value;
      	let chid = document.getElementById(id);
      	chid.value = val;
      }
    </script>
</body>

</html>