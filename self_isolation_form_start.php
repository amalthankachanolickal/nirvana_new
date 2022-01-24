<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include('model/class.expert.php');
?>

<?php

$user_data = array();

if (isset($_SESSION['user_data'])) {
  
  $data = $_SESSION['user_data'];
  array_push($user_data, $data);

} else if (isset($_GET['fid'])) {

  $id = base64_decode($_GET['fid']);
  $ModelCall->where("id", $id);
  $data = $ModelCall->get("tbl_self_isolation_data_start");

  if (count($data) == 0) {
    header("Location: index.php");
  }

  $user_datas = array();

  $user_datas['floor_number'] = $data[0]['floor_no'];
  $user_datas['isd'] = $data[0]['isd_code'];
  $user_datas['app_phone'] = $data[0]['phone_number'];
  $user_datas['ret_date'] = $data[0]['return_date'];
  $user_datas['user_email'] = $data[0]['user_email'];
  $user_datas['app_date'] = $data[0]['app_date'];
  $user_datas['place'] = $data[0]['place'];
  $user_datas['reg_status_one'] = $data[0]['reg_status_one'];
  $user_datas['end_date'] = $data[0]['end_date'];
  $user_datas['house_number'] = $data[0]['house_number'];
  $user_datas['block_id'] = $data[0]['block_id'];
  $user_datas['title_one'] = $data[0]['title_first'];
  $user_datas['fname_one'] = $data[0]['fname_first'];
  $user_datas['mname_one'] = $data[0]['mname_first'];
  $user_datas['lname_one'] = $data[0]['lname_first'];
  if (strlen($data[0]['fname_second']) > 0) {
    $user_datas['title_second'] = $data[0]['title_second'];
    $user_datas['fname_second'] = $data[0]['fname_second'];
    $user_datas['mname_second'] = $data[0]['mname_second'];
    $user_datas['lname_second'] = $data[0]['lname_second'];
  }

  if (strlen($data[0]['fname_third']) > 0) {
    $user_datas['title_third'] = $data[0]['title_third'];
    $user_datas['fname_third'] = $data[0]['fname_third'];
    $user_datas['mname_third'] = $data[0]['mname_third'];
    $user_datas['lname_third'] = $data[0]['lname_third'];    
  }

  array_push($user_data, $user_datas);

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
    "form_name" => "Self_Isolation_Form"    
  );
  $ModelCall->where("ip_address", $ip);
  $ModelCall->update("tbl_form_tracker", $up_data);
} else {
  $insert_data = array(
    "user_id" => (isset($_SESSION['UR_LOGINID'])) ? $_SESSION['UR_LOGINID'] : '0',
    "ip_address" => $ip,
    "view_count" => "1",
    "reg_date" => date('y-m-d H:i:s'),
    "form_name" => "Self_Isolation_Form"
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
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/google_form_add.css">
    <link rel="icon" href="./images/logo_google_form.png" type="image/png">
    <title>NIRVANA Residents Welfare Association</title>
    <style>

    	.myselect {
    		width: 120px;
    		position: relative;
    		padding-left: 15px;
    		padding-right: 15px;
    	}

    	.isd {
    		width: 90px;
    		position: relative;
    		padding-left: 15px;
    		padding-right: 15px;
    	}

    	.myselect-2 {
    		width: 120px;
    		position: relative;
    		padding-left: 15px;
    		padding-right: 15px;
    	}

    	.phone {
    		width: 180px;
    		position: relative;
    		padding-left: 15px;
    		padding-right: 15px;
    	}

    	.hide {
    		display: none;
    	}

      @media screen and (min-width: 768px) {
        .form-container {
          position: relative !important;
        }

      .dflex {
        display: flex;
      }

        .max-230 {
          width: 230px;
        }

        .myimg {
          position: absolute;
          top: 40px;
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

        .isd {
        	width: 28%;
        	margin-top: 20px;
        }

        .phone {
        	width: 72%;
        	margin-top: 20px;
        }

        p.mysub {
        	font-size: 14px;
        }

        .myselect, .myselect-2 {
        	width: 100%;
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
        .myflex > select {
          max-height: 50px;
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
      .rat-w {
        max-width: 50%;
        margin-left: 8px !important;
      }
      }

    </style>
</head>

<body>
    <form method="post" action="controller/save_isolation_form_start.php" name="google-form" id="google-form" onsubmit="return validateForm()">
        <div class="container" style="max-width: 800px;">
            <div class="container mt-5 mb-5 form-container">
                <p class="text-center heading">NIRVANA Residents Welfare Association</p>
                <div class="row">
                    <div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-right logo">
                        <a href="index.php"><img src="./images/logo_google_form.png" /></a>
                    </div>
                <div class="col-md-12 reduce-bottom-margin-5 order-md-1 order-sm-2 order-2 text-center mt-3 mb-0 mb-md-3">
                  <p class="bold head-matter">Self Declaration By Home Quarantined Person</p>
                  <p style="margin-top: -10px;" class="mysub">(To be filled upon moving in to Nirvana, before completing 14 days quarantine period)</p>
                </div>
                </div>
                <br>
                <div id="personContainer">

                	<div class="row">
                		<div class="myselect no-pdd">
                			<div class="sn-field">
                			<select name="title_one" class="select1">                    
		                        <?php
		                        if (count($user_data) > 0) { ?>
		                            <option value="Mr." <?php if ($user_data[0]['title_one'] == "Mr.") { ?> selected <?php }?>>Mr.</option>
		                            <option value="Mrs." <?php if ($user_data[0]['title_one'] == "Mrs.") { ?> selected <?php }?>>Mrs.</option>
		                            <option value="Ms." <?php if ($user_data[0]['title_one'] == "Ms.") { ?> selected <?php }?>>Ms.</option>
		                        <?php
		                        } else { ?>
		                            <option value="Mr.">Mr.</option>
		                            <option value="Mrs.">Mrs.</option>
		                            <option value="Ms.">Ms.</option>
		                        <?php
		                          }
		                        ?>
		                    </select>
		                    </div>
                		</div>
                		<div class="col-md-2 min-des no-pdd">
                			<div class="sn-field">
                			<input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['fname_one'] :'' ?>" name="fname_one" placeholder="First Name" required>
                		</div>
                		</div>
                		<div class="col-md-2 min-des no-pdd">
                			<div class="sn-field">
                			    <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['mname_one'] :'' ?>" name="mname_one" placeholder="Middle Name">
                		    </div>
                		</div>
                		<div class="col-md-2 min-des no-pdd">
                			<div class="sn-field">
                			    <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['lname_one'] :'' ?>" name="lname_one" placeholder="Last Name">
                	     	</div>
                		</div>
                		<div class="col-md-1 col-sm-8 col-8 offset-sm-2 offset-2 offset-md-0 no-pdd mb-3">
                			<button type="button" id="add_first_btn" onclick="manageUI('add', this, 'second')" class="btn action-btn myprime col-md-12 mybtn">+</button>                			
                		</div>
                	</div>
                </div>
              
            <div class="row">
            	<div class="myselect-2 no-pdd">
            		<div class="sn-field">
	                <select name="block_id" id="d-bid" class="select1" required>
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
	                </div>            		
            	</div>
            	<div class="col-md-2 no-pdd">
            		<div class="sn-field">
            		<input oninput="vallength(this, 4)" type = "text" id="d-hnid" name="house_number" value="<?= (count($user_data) > 0) ? $user_data[0]['house_number'] : '' ?>" placeholder="House #" required>
            	    </div>
            	</div>
            	<div class="myselect d-fn no-pdd">
            		<div class="sn-field">
            		<select name="floor_number" id="d-fn"><?php
                          if (count($user_data) > 0) { ?>
                              <option value="NA" <?php if ($user_data[0]['floor_number'] == "NA"){ ?> selected <?php }?>>N/A</option>
                              <option value="GF" <?php if ($user_data[0]['floor_number'] == "GF"){ ?> selected <?php }?>>GF</option>
                              <option value="FF" <?php if ($user_data[0]['floor_number'] == "FF"){ ?> selected <?php }?>>FF</option>
                              <option value="SF" <?php if ($user_data[0]['floor_number'] == "SF"){ ?> selected <?php }?>>SF</option>
                              <option value="TF" <?php if ($user_data[0]['floor_number'] == "TF"){ ?> selected <?php }?>>TF</option>
                          <?php
                          } else { ?>
                              <option disabled>Floor, If applicable</option>
                              <option value="NA" selected>N/A</option>
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
            	<div class="col-md-3 no-pdd">            		
                  <input type="text" id="country" class="" name="place" value="<?= (count($user_data) > 0) ? $user_data[0]['place'] : '' ?>" placeholder="City travelled from" required>
            	</div>
            </div>

            <div class="row">         			
            	<div class="isd no-pdd">
            		<div class="sn-field">
            		<input type="text" id="isd" value="<?= (count($user_data) > 0) ? $user_data[0]['isd'] : '+91' ?>" placeholder="ISD" name="isd" style="width: 100%;" required>   
            		</div>         		
            	</div>
            	<div class="phone no-pdd">
            		<div class="sn-field">
            		<input type="text" oninput="vallength(this, 10)" maxlength="10" placeholder="Phone Number" value="<?= (count($user_data) > 0) ? $user_data[0]['app_phone'] : '' ?>" id="app_phone" name="app_phone" onblur="validateNumber()" required>         
            		</div>   		
            	</div>
            	<div class="col-md-3 no-pdd">
            		<div class="sn-field">
            		<input type="email" value="<?= (count($user_data) > 0) ? $user_data[0]['user_email'] : '' ?>" placeholder="Email Address" id="user_email" name="user_email" onblur="validateEmail()">
            		</div>       		
            	</div>
            	<div class="col-md-4 no-pdd">
            		<div class="sn-field">
            		<select name="reg_status_one" class="select1" required>
                        <option disabled selected>Registered with 104</option>
                        <option value="Yes" <?php if (count($user_data) > 0) { if ($user_data[0]['reg_status_one'] == "Yes") { ?> selected <?php } }?>>Yes</option>
                        <option value="No" <?php if (count($user_data) > 0) { if ($user_data[0]['reg_status_one'] == "No") { ?> selected <?php } }?>>No</option>
                    </select> 
                    </div>           		
            	</div>
            </div>
            <p>Date of return from outside Gurgaon / Contact with effected person : 
                <span class="col-md-3 inline-block no-pdd">
                  <input type="date" class="" id="return_date" name="ret_date" value="<?= (count($user_data) > 0) ? $user_data[0]['ret_date'] : '' ?>" placeholder="Date of return / contact" onchange="autoFillStartDate()" required>
                </span>
            </p>
            <div class="row">
            </div>

              <p>I hereby declare that I/We have started mandatory quarantine period of 14 days on
                <span class="col-md-3 mt-1 inline-block no-pdd">
                  <input type="date" name="start_date"  id="start_date" value="<?= (count($user_data) > 0) ? $user_data[0]['start_date'] : '' ?>" placeholder="Date" onchange="fillCompDate()" required>
              </span> and home quarantine on <span class="col-md-3 mt-1  inline-block no-pdd">
                  <input type="date" name="app_date" value="<?= (count($user_data) > 0) ? $user_data[0]['app_date'] : '' ?>" placeholder="Date" required>
              </span> and my quarantine period will finish on
                <span class="col-md-3 mt-1 inline-block no-pdd">
                  <input type="date" id="comp_date" name="end_date" value="<?= (count($user_data) > 0) ? $user_data[0]['end_date'] : '' ?>" placeholder="Date" required>
              </span></p>
    <p>This document will not need a physical signature. if submitted online or through email.</p>
                    <div class="dflex" style="align-items: center; justify-content: center;">
                        <div class="col-md-3 <?php if (isset($_GET['fid'])) { echo 'hide'; }?>">
                            <input type="submit" class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0" name="submit" value="SUBMIT">
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
        <h6 class="text-center">Thank you. Your form has been submitted to the office for further action.</h6>
        <p class="text-center">We would like to remind you to complete the following due from your end.</p>

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
            unset($_SESSION['due_error']);
            } else { ?>
        
        <h6 class="text-center">Thank you. Your form has been submitted to the office for further action. You will be intimated of the same shortly.</h6>
      <?php } ?>
      </div>
      <div class="modal-footer">
        <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary col-md-4" data-dismiss="modal">Close</button>          
        </div>
      </div>
    </div>
  </div>
</div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo SITE_URL;?>/js/print.js"></script>
    <script>


        

      if (window.screen.width < 764) {
        document.getElementById('add_first_btn').innerHTML = "Add Person";
        document.getElementById('add_sec_btn').innerHTML = "Add Person";
        document.getElementById('remove_sec_btn').innerHTML = "Remove Person";
        document.getElementById('remove_third_btn').innerHTML = "Remove Person";
      }

      function autoFillStartDate() {
      	let fourteen = new Date(document.getElementById("return_date").value);
        let year = fourteen.getFullYear();
        let month = fix(fourteen.getMonth() + 1);
        let date = fix(fourteen.getDate());        
      	document.getElementById("start_date").value = year+"-"+month+"-"+date;
      	fillCompDate();
      }

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

      function onBlurCheck() {
        validateReturnDate();
      }



      function vallength(elem, len)  {
      	if (isInt(elem.value) && elem.value.length <= len) {
      		elem.value = elem.value;
      	} else {
      	elem.value = elem.value.substring(0, elem.value.length - 1);
      }
      }
      function isInt(value) {
         return !isNaN(value) && 
         parseInt(Number(value)) == value && 
         !isNaN(parseInt(value, 10));
       }


      function validateReturnDate() {
        let today = new Date(document.getElementById('start_date').value);
        let retDate = new Date(document.getElementById('ret_date').value);

        let difference = today.getTime() - retDate.getTime();
        let totalDays = difference / (1000 * 3600 * 24);

        if (totalDays < 14) {
          alert("Return date and submission date must vary for at least 14 days");
          return false;
        }

        return true;
      }

      function fillCompDate() {
      	let startDate = new Date(document.getElementById("start_date").value);
      	let endDateCont = document.getElementById("comp_date");
        let fourteen = new Date(startDate.getTime() + ((1000 * 3600 * 24)*14));
        let year = fourteen.getFullYear();
        let month = fix(fourteen.getMonth() + 1);
        let date = fix(fourteen.getDate());        
        endDateCont.value = year+'-'+month+'-'+date;
        endDateCont.min = year+'-'+month+'-'+date;
      }

      function fix(dateIn) {
        if (dateIn < 10) {
          return "0"+dateIn;
        }
        return dateIn;
      }


      function validateForm() {
        return validateNumber() && validateReturnDate();
      }

      function validateEmail(){
        let email = document.getElementById('user_email').value;
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(email) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

      }
    </script>

    <script>
      const sec_data = `
                    <div class="myselect no-pdd">
                      <div class="sn-field">
                      <select name="title_second" class="select1">                    
                            <?php
                            if (count($user_data) > 0) { ?>
                                <option value="Mr." <?php if ($user_data[0]['title_second'] == "Mr.") { ?> selected <?php }?>>Mr.</option>
                                <option value="Mrs." <?php if ($user_data[0]['title_second'] == "Mrs.") { ?> selected <?php }?>>Mrs.</option>
                                <option value="Ms." <?php if ($user_data[0]['title_second'] == "Ms.") { ?> selected <?php }?>>Ms.</option>
                            <?php
                            } else { ?>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            <?php
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2 min-des no-pdd">
                      <div class="sn-field">
                      <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['fname_second'] :'' ?>" name="fname_second" placeholder="First Name" required>
                    </div>
                    </div>
                    <div class="col-md-2 min-des no-pdd">
                      <div class="sn-field">
                          <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['mname_second'] :'' ?>" name="mname_second" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="col-md-2 min-des no-pdd">
                      <div class="sn-field">
                          <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['lname_second'] :'' ?>" name="lname_second" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-8 col-8 offset-sm-2 offset-2 offset-md-0 no-pdd mb-3">
                                <button type="button" id="remove_sec_btn" onclick="manageUI('remove', this, 'second')" class="btn action-btn mydanger col-md-12 mybtn">-</button>
                            </div>
                            <div class="col-md-6 col-sm-8 col-8 offset-sm-2 offset-2 offset-md-0 no-pdd mb-3">
                                <button type="button" id="add_sec_btn" onclick="manageUI('add', this, 'third')" class="btn action-btn myprime col-md-12 mybtn">+</button>
                            </div>
                        </div>
                    </div>`;

      const third_data = `
                    <div class="myselect no-pdd">
                      <div class="sn-field">
                      <select name="title_third" class="select1">                    
                            <?php
                            if (count($user_data) > 0) { ?>
                                <option value="Mr." <?php if ($user_data[0]['title_third'] == "Mr.") { ?> selected <?php }?>>Mr.</option>
                                <option value="Mrs." <?php if ($user_data[0]['title_third'] == "Mrs.") { ?> selected <?php }?>>Mrs.</option>
                                <option value="Ms." <?php if ($user_data[0]['title_third'] == "Ms.") { ?> selected <?php }?>>Ms.</option>
                            <?php
                            } else { ?>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            <?php
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2 min-des no-pdd">
                      <div class="sn-field">
                      <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['fname_third'] :'' ?>" name="fname_third" placeholder="First Name" required>
                    </div>
                    </div>
                    <div class="col-md-2 min-des no-pdd">
                      <div class="sn-field">
                          <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['mname_third'] :'' ?>" name="mname_third" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="col-md-2 min-des no-pdd">
                      <div class="sn-field">
                          <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['lname_third'] :'' ?>" name="lname_third" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-8 col-8 offset-sm-2 offset-2 offset-md-0 no-pdd mb-3">
                                <button type="button" id="remove_third_btn" onclick="manageUI('remove', this, 'third')" class="btn action-btn mydanger col-md-12 mybtn">-</button>
                    </div>`;
      
      const manageUI = (operation, elem, nextElem) => {
        const parentContainer = document.getElementById('personContainer');
        let pcont = document.createElement('div');
        pcont.classList.add('row');
        switch (operation) {
          case "add" :
              if (nextElem == "second") {
                elem.classList.add("hide");
                pcont.innerHTML = sec_data;
                    pcont.id = "second_person";
                parentContainer.appendChild(pcont);
              } else {
                document.getElementById("remove_sec_btn").classList.add("hide");
                elem.classList.add("hide");
                pcont.innerHTML = third_data;
                pcont.id = "third_person";
                parentContainer.appendChild(pcont);
              }
              break;
          case "remove" :
              if (nextElem == 'third') {
                parentContainer.removeChild(document.getElementById("third_person"));
                document.getElementById('add_sec_btn').classList.remove("hide");
                document.getElementById("remove_sec_btn").classList.remove("hide");
              } else {
                parentContainer.removeChild(document.getElementById("second_person"));
                document.getElementById("add_first_btn").classList.remove("hide");
              }
              break;
        }

        

      if (window.screen.width < 764) {
        document.getElementById('add_first_btn').innerHTML = "Add Person";
        document.getElementById('add_sec_btn').innerHTML = "Add Person";
        document.getElementById('remove_sec_btn').innerHTML = "Remove Person";
        document.getElementById('remove_third_btn').innerHTML = "Remove Person";
      }

      }
    </script>

     <?php 

        if (count($user_data) > 0) {
        	if (isset($user_data[0]['fname_second'])) {
        		?>
        		<script>
        			manageUI('add', document.getElementById('add_first_btn'), "second");
        		</script>
    <?php
        	}

        	if (isset($user_data[0]['fname_third'])) { ?>
        		<script>
        			manageUI('add', document.getElementById('add_sec_btn'), "third");
        		</script>
    <?php

        	}
        }

    ?>

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

  <?php
     if (isset($_GET['fid'])) { ?>
      <script>
        let buttons = document.getElementsByTagName('button');
        for (let i = 0; i < buttons.length; i++) {
          buttons[i].classList.add('hide');
        }
        let inputs = document.getElementsByTagName('input');
        for (let i = 0; i < inputs.length; i++) {
          inputs[i].setAttribute("readonly", "true");
        }
        let selects = document.getElementsByTagName('select');
        for (let i = 0; i < selects.length; i++) {
          selects[i].setAttribute("disabled", "true");
        }
      </script>
  <?php
     }
  ?>
</body>

</html>