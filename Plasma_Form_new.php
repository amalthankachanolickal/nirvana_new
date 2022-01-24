<?php 

/*header("Location: https://www.nirvanacountry.co.in/Plasma_Form.php");
exit(0);*/
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include('model/class.expert.php');

$get_id = $_GET['uid'];

$getUserData = $ModelCall->rawQuery("SELECT * FROM covid_case_details WHERE id = '$get_id' ");
$House_number = $getUserData[0]['House No.'];

$Block_fromget = substr($House_number,0,2);
$House_fromget = ltrim(substr($House_number,3,6), '0');;


if ($Block_fromget == "AG") {
    $Block_fromget = 1;
  } else if ($Block_fromget == "BC") {
    $Block_fromget = 2;
  } else if ($Block_fromget == "CC") {
    $Block_fromget = 3;
  } else if ($Block_fromget == "BW") {
    $Block_fromget = 4;
  } else if ($Block_fromget == ES) {
    $Block_fromget = 5;
  }

$get_BaseUserData = $ModelCall->rawQuery("SELECT * FROM Wo_Users WHERE block_id = '$Block_fromget' AND house_number_id = '$House_fromget' ");






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
    <title><?php echo SITENAME?>|| COVID Declaration cum PLASMA Donation Form.</title>
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
    <form method="post" action="controller/plasma_form_new_ctrl.php?id=<?php echo $get_id ?>" name="google-form" id="google-form" onsubmit="return validateForm()">
        <div class="container" style="max-width: 800px;">
            <div class="container mt-5 mb-5 form-container">
                <p class="text-center heading">NIRVANA Residents Welfare Association</p>
                <div class="row">
                    <div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-right logo">
                        <a href="index.php"><img src="./images/logo_google_form.png" /></a>
                    </div>
                <div class="col-md-12 reduce-bottom-margin-5 order-md-1 order-sm-2 order-2 text-center mt-3 mb-0 mb-md-3">
                  <h5 class="bold head-matter" style="text-decoration:underline;">COVID Declaration cum PLASMA Donation Form</h5>
                  <!--<p style="margin-top: -10px;" class="mysub">(To be filled upon moving in to Nirvana, before completing 14 days quarantine period)</p>-->
                </div>
                </div>
                <br>
                <div id="personContainer">
                    
                <div class="row">
                    <div class="col-md-6 no-pdd">
            		<div class="sn-field">
            		<select name="bloodgroup" class="select1" required>
                        <option value=''>Blood Group</option>
                            <option value="O +ve" <?php if ($getUserData[0]['bloodgroup'] == "O +ve") { ?> selected <?php }?>>O +ve</option>
                            <option value="O -ve" <?php if ($getUserData[0]['bloodgroup'] == "O -ve") { ?> selected <?php }?>>O -ve</option>
                            <option value="A +ve" <?php if ($getUserData[0]['bloodgroup'] == "A +ve") { ?> selected <?php }?>>A +ve</option>
                            <option value="A -ve" <?php if ($getUserData[0]['bloodgroup'] == "A -ve") { ?> selected <?php }?>>A -ve</option>
                            <option value="B +ve" <?php if ($getUserData[0]['bloodgroup'] == "B +ve") { ?> selected <?php }?>>B +ve</option>
                            <option value="B -ve" <?php if ($getUserData[0]['bloodgroup'] == "B -ve") { ?> selected <?php }?>>B -ve</option>
                            <option value="AB +ve" <?php if ($getUserData[0]['bloodgroup'] == "AB +ve") { ?> selected <?php }?>>AB +ve</option>
                            <option value="AB -ve" <?php if ($getUserData[0]['bloodgroup'] == "AB -ve") { ?> selected <?php }?>>AB -ve</option>
                        
                    </select> 
                    </div>         		
            	</div>
                </div>    
                
                <div class="col-lg-12 no-pdd">
                          <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="plasma_donar" name="plasma_donar" value="1" checked >
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;">Yes, I am available as a Plasma Donor.</small> <br>
                            <!--fgt-sec end-->
                          </div>
                        </div>
                </div>
                
                     <div class="col-lg-12 no-pdd">       <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="plasma_check" name="plasma_check" value="1" checked >
                              <span  class="checkmark" style="top:auto !important"></span> </label>
                               <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;"> 
                               Yes, I understand and agree to the Nirvana Country Terms of Use. <a href="terms_conditions.php" target="_blank">Terms of Use.</a> 
                               </small></div>
                            <!--fgt-sec end-->
                          </div>
                           </div>
                           
                         <div class="row">
                        <p>&nbsp;</p>
                    </div>  
                    
                    
                    <center> <div  style="align-items: center; justify-content: center;">
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0" name="submit" value="SUBMIT">
                            
                        </div>
                    </div></center>
                    <div class="row">
                     
                        <div class="col-sm-12">
                            Your information with the office is as follows. In case of any change, you may email us on  <a href="mailto: office.nrwa@nirvanacountry.co.in">office.nrwa@nirvanacountry.co.in </a> 
                         <br>
                        </div>
                        <div class="col-sm-4">
                          <p>&nbsp;</p>  
                        </div>
                    </div>

                	<div class="row">
                		<div class="myselect no-pdd">
                			<div class="sn-field">
                			<select name="title_one" class="select1" readonly > 
		                        <option value="Mr." <?php if ($get_BaseUserData[0]['user_title'] == "Mr.") { ?> selected <?php }?>>Mr.</option>
		                        <option value="Mrs." <?php if ($get_BaseUserData[0]['user_title'] == "Mrs.") { ?> selected <?php }?>>Mrs.</option>
		                        <option value="Ms." <?php if ($get_BaseUserData[0]['user_title'] == "Ms.") { ?> selected <?php }?>>Ms.</option>
		                    </select>
		                    </div>
                		</div>
                		<div class="col-md-2 min-des no-pdd">
                			<div class="sn-field">
                			<input type="text" value="<?php echo $get_BaseUserData[0]['first_name'] ?>" name="fname_one" placeholder="First Name" readonly>
                		</div>
                		</div>
                		<div class="col-md-2 min-des no-pdd">
                			<div class="sn-field">
                			    <input type="text"  name="mname_one" value="<?php echo $get_BaseUserData[0]['middle_name'] ?>" placeholder="Middle Name" readonly>
                		    </div>
                		</div>
                		<div class="col-md-2 min-des no-pdd">
                			<div class="sn-field">
                			    <input type="text" value="<?php echo $get_BaseUserData[0]['last_name'] ?>" name="lname_one" placeholder="Last Name" readonly>
                	     	</div>
                		</div>
                		
                	</div>
                	 <div class="row">         			
            	
            	<div class="col-md-2 no-pdd">
            		<div class="sn-field">
            		<input type="number"  placeholder="Age" id="age" value="<?php echo 25?>" name="age" min="18" max="60" readonly>
            		</div>       		
            	</div>
            	
            	<div class="col-md-3 no-pdd">
            		<div class="sn-field">
            		<select name="gender" class="select1" >
                        <option disabled selected>Gender</option>
                        <option value="Male" <?php if ($get_BaseUserData[0]['gender'] == "male") { ?> selected <?php }?>>Male</option>
                        <option value="Female" <?php if ($get_BaseUserData[0]['gender'] == "female") { ?> selected <?php }?>>Female</option>
                        <option value="Other" <?php if ($get_BaseUserData[0]['gender'] == "other") { ?> selected <?php }?>>Other</option>
                    </select> 
                    </div>           		
            	</div>
            	
            	<!--<div class="col-md-1 col-sm-8 col-8 offset-sm-2 offset-2 offset-md-0 no-pdd mb-3">
                			<button type="button" id="add_first_btn" onclick="manageUI('add', this, 'second')" class="btn action-btn myprime col-md-12 mybtn">+</button>                			
                		</div>-->
           
                
            
            	<div class="myselect-2 no-pdd col-md-2 no-pdd">
            		<div class="sn-field">
	                <select name="block_id" id="d-bid" class="select1" >
	                        <?php
	                          if (count($get_BaseUserData[0]['block_id']) > 0) {
	                            $block = $get_BaseUserData[0]['block_id'];?>
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
            		<input oninput="vallength(this, 4)" type = "text" id="d-hnid" name="house_number" value="<?php echo $get_BaseUserData[0]['house_number_id']?>" placeholder="House #" >
            	    </div>
            	</div>
            	<div class="myselect d-fn no-pdd col-md-2 no-pdd">
            		<div class="sn-field">
            		<select name="floor_number" id="d-fn"><?php
                          if (count($get_BaseUserData[0]['house_number_id']) > 0) { ?>
                                <option >Floor</option>
                              <option value="NA" >N/A</option>
                              <option value="GF" <?php if ($get_BaseUserData[0]['floor_number'] == "1"){ ?> selected <?php }?>>GF</option>
                              <option value="FF" <?php if ($get_BaseUserData[0]['floor_number'] == "2"){ ?> selected <?php }?>>FF</option>
                              <option value="SF" <?php if ($get_BaseUserData[0]['floor_number'] == "3"){ ?> selected <?php }?>>SF</option>
                              <option value="TF" <?php if ($get_BaseUserData[0]['floor_number'] == "4"){ ?> selected <?php }?>>TF</option>
                          <?php
                          } else { ?>
                              <option >Floor</option>
                              <option value="NA" >N/A</option>
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
            	<!--<div class="col-md-3 no-pdd">            		
                  <input type="text" id="country" class="" name="place"  placeholder="City travelled from" >
            	</div>-->
            

            <div class="row">         			
            	<div class="isd no-pdd">
            		<div class="sn-field">
            		<input type="text" id="isd" value="<?php echo  '+91' ?>" placeholder="ISD" name="isd" style="width: 100%;" readonly>   
            		</div>         		
            	</div>
            	<div class="phone no-pdd col-md-4">
            		<div class="sn-field">
            		<input type="text"  maxlength="10" placeholder="Phone Number" value="<?php echo $getUserData[0]['mobile'];?>" id="app_phone" name="app_phone" readonly >         
            		</div>   		
            	</div>
            	<div class="col-md-6 no-pdd">
            		<div class="sn-field">
            		<input type="email" value="<?php echo $getUserData[0]['email'];?>" placeholder="Email Address" id="user_email" name="user_email" readonly >
            		</div>       		
            	</div>
            	
            </div>
           
            <div class="row">         			
            	
            	<div class="col-md-6 no-pdd">
            		<div class="sn-field">
            		    <label>Date of positive COVID Test*</label>
            		<input type="text"   id="date_of_positive_covid_test"  name="date_of_positive_covid_test" value="<?php echo $getUserData[0]['Quarantine Start date'];?>"  readonly>
            		</div>       		
            	</div>
            	</div>
            <div class="row">         		
            	<div class="col-md-6 no-pdd">
            		<div class="sn-field">
            		    <label>If you have subsequently tested negative, what was the date of negative report?</label>
            		<input type="text"   id="date_of_negative_covid_test" name="date_of_negative_covid_test" value="<?php echo $getUserData[0]['Quarantine End date'];?>"  readonly >
            		</div>       		
            	</div>
            	
            </div>
            
                
                 <b>Your contribution may help save a life!</b>
                 
                 
<p>
This platform only enables needy patients to reach out to potential donors. Platform does not vet any information provided by the either party, 
including their contact information. Contact information will be hidden until, you give your consent for the same to be shared. Both parties must 
do their own due diligence before sharing their contact information or initiating any further actions.
</p>  <p>
The donations must be done strictly as per the government/ medical guidelines. Common guidelines, for your easy reference, are shared below. 
However, you must verify the accurate and recent facts on your own, before taking any steps.</p>
               
                    <b>You can donate plasma if:</b>
                    <p>1. You were tested positive for COVID-19</p>
                    <p>2. You have fully recovered and are free of symptoms for 14 days</p>
                    <p>3. You are between 18-60 years old</p>
                    <br>
                    <b>You cannot donate plasma if:</b>
                    <p>1. Your weight is less than 50 kg</p>
                    <p>2. You have ever been pregnant</p>
                    <p>3. You are diabetic on insulin</p>
                    <p>4. Your Blood Pressure is more than 140 and diastolic less than 60 or more than 90</p>
                    <p>5. You have uncontrolled diabetes or hypertension with change in medication in last 28 days</p>
                    <p>6. You are a Cancer Survivor</p>
                    <p>7. You have chronic kidney/heart/lung or liver disease.</p>   
            <!--<p>Date of return from outside Gurgaon / Contact with effected person : 
                <span class="col-md-3 inline-block no-pdd">
                  <input type="date" class="" id="return_date" name="ret_date" value="<?= (count($user_data) > 0) ? $user_data[0]['ret_date'] : '' ?>" placeholder="Date of return / contact" onchange="autoFillStartDate()" >
                </span>
            </p>-->

              <!--<p>I hereby declare that I/We have started mandatory quarantine period of 14 days on
                <span class="col-md-3 mt-1 inline-block no-pdd">
                  <input type="date" name="start_date"  id="start_date" value="<?= (count($user_data) > 0) ? $user_data[0]['start_date'] : '' ?>" placeholder="Date" onchange="fillCompDate()" >
              </span> and home quarantine on <span class="col-md-3 mt-1  inline-block no-pdd">
                  <input type="date" name="app_date" value="<?= (count($user_data) > 0) ? $user_data[0]['app_date'] : '' ?>" placeholder="Date" >
              </span> and my quarantine period will finish on
                <span class="col-md-3 mt-1 inline-block no-pdd">
                  <input type="date" id="comp_date" name="end_date" value="<?= (count($user_data) > 0) ? $user_data[0]['end_date'] : '' ?>" placeholder="Date" >
              </span></p>-->
               <!-- <p>This document will not need a physical signature. if submitted online or through email.</p>-->
                   
              
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
                      <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['fname_second'] :'' ?>" name="fname_second" placeholder="First Name" >
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
                    
                    <div class="col-md-3 no-pdd">
            		<div class="sn-field">
            		<input type="number"  placeholder="Age" id="age_second" name="age_second" min="18" max="60" >
            		</div>       		
            	</div>
            	<div class="col-md-4 no-pdd">
            		<div class="sn-field">
            		<select name="gender_second" class="select1" >
                        <option disabled selected>Gender</option>
                        <option value="Male" >Male</option>
                        <option value="Female" >Female</option>
                        <option value="Other" >Other</option>
                    </select> 
                    </div>           		
            	</div>
            	<div class="col-md-3 no-pdd">
            		<div class="sn-field">
            		<select name="bloodgroup_second" class="select1" >
                        <option>Blood Group</option>
                            <option value="O +ve">O +ve</option>
                            <option value="O -ve">O -ve</option>
                            <option value="A +ve">A +ve</option>
                            <option value="A -ve">A -ve</option>
                            <option value="B +ve">B +ve</option>
                            <option value="B -ve">B -ve</option>
                            <option value="AB +ve">AB +ve</option>
                            <option value="AB -ve">AB -ve</option>
                        <option value="Don't Know" >Don't Know</option>
                    </select> 
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
                      <input type="text" value="<?= (count($user_data) > 0) ? $user_data[0]['fname_third'] :'' ?>" name="fname_third" placeholder="First Name" >
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
                     <div class="col-md-3 no-pdd">
            		<div class="sn-field">
            		<input type="number"  placeholder="Age" id="age_thrd" name="age_thrd" min="18" max="60" >
            		</div>       		
            	</div>
            	<div class="col-md-4 no-pdd">
            		<div class="sn-field">
            		<select name="gender_thrd" class="select1" >
                        <option disabled selected>Gender</option>
                        <option value="Male" >Male</option>
                        <option value="Female" >Female</option>
                        <option value="Other" >Other</option>
                    </select> 
                    </div>           		
            	</div>
            	<div class="col-md-4 no-pdd">
            		<div class="sn-field">
            		<select name="bloodgroup_thrd" class="select1" >
                        <option>Blood Group</option>
                            <option value="O +ve">O +ve</option>
                            <option value="O -ve">O -ve</option>
                            <option value="A +ve">A +ve</option>
                            <option value="A -ve">A -ve</option>
                            <option value="B +ve">B +ve</option>
                            <option value="B -ve">B -ve</option>
                            <option value="AB +ve">AB +ve</option>
                            <option value="AB -ve">AB -ve</option>
                        <option value="Don't Know" >Don't Know</option>
                    </select> 
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