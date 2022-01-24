<?php include('model/class.expert.php'); 





if(isset($_POST["submit"])){
    $data = array(
	'user_id' => '1',
	'propertyLister' => $_POST["property_lister"],
	'listing_type' => $_POST["listing_type"],
	'property_type' => $_POST["property_type"],
	'price' => $_POST["price"],
	"city" => $_POST["city"],
	"locality" => $_POST["locality"],
	"projectName" => $_POST["project_name"],
	"houseNo" =>$_POST["house_no"],
	"area" => $_POST["area"],
	"bedroom" => $_POST["bedroom"],
	"description" => $_POST["description"],
	"email" => $_POST["email"],
	"mobile1" => $_POST["mobile"],
	"bedroomImage" => $_POST["img"],
	"approvalDate" => date('d-m-Y'),
	"approved" => '1');
	$result = $ModelCall->insert('newbuynsell',$data);
	header("Location:sampleForm.php?actionResult=Success");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/google_form_add.css">
    <title>NIRVANA Residents Welfare Association</title>
    <style>

    	ul {
    		list-style: none;
    		padding: 0px;
    	}

    	ul li {
    		padding: 0px;
    	}

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

        .min-r-width {
        	max-width: 21%;
        	width: 21%;
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
          width: 70px;
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
    <?php 
    $SuccessAlert = $_GET["actionResult"];
    if($SuccessAlert == "Success"){ ?>
        <script>
            alert("Successfully posted");
        </script>
    <?php
    }
    ?>
</head>

<body>
    <form method="post" >
        <div class="container-fluid">
            <div class="container mt-5 mb-5 form-container" style="max-width: 800px;">
               <div class="row">
                <div class="col-md-1">
                  <a href="/1.php" alt="Click to go to NRWA Home Page."><i class="fa fa-home" style="font-size:50px;color:#37a000"></i></a>
                </div>

                <div class="col-md-11 reduce-bottom-margin-5 text-center mt-3 mb-0 mb-md-3">
                  <p class="text-center heading">Post a Property &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </div>
                </div>
                <br>
                    <ul id="persons-list">
                        <li>
                            <div class="">
                            <div class="row">
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="file" name="img" id="img" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-md-6 myselect no-pdd">
                                	<div class="sn-field">
                                        <select name="property_lister" id="property_lister" required>
                                            <option value="owner">Owner</option>
                                            <option value="tenant">Tenant</option>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="name" id="name" placeholder="Name" required>
                                    </div>
                                </div>-->
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="project_name" id="project_name" placeholder="Project Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="property_type" id="property_type" placeholder="Property Type" required>
                                    </div>
                                </div>
                                 <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="email"  name="email" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="tel"  name="mobile" id="mobile" maxlength="10" placeholder="Mobile" required>
                                    </div>
                                </div>
                                <div class="col-md-6 myselect no-pdd">
                                	<div class="sn-field">
                                        <select name="listing_type" id="listing_type" required>
                                            <option value="buy">Buy</option>
                                            <option value="sell">Sell</option>
                                            <option value="rent">Rent</option>
                                            <option value="Looking for Rent">Looking for Rent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 myselect no-pdd">
                                	<div class="sn-field">
                                        <select name="bedroom" id="bedroom" required>
                                            <option value="1">1BHK</option>
                                            <option value="2">2BHK</option>
                                            <option value="3">3BHK</option>
                                            <option value="4">4BHK</option>
                                            <option value="5">5BHK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 myselect no-pdd">
                                	<div class="sn-field">
                                        <select name="area" id="area" required>
                                            <option value="1000">1000 sq. Ft.</option>
                                            <option value="3240">3240 sq. Ft.</option>
                                            <option value="4000">4000 sq. Ft.</option>
                                            <option value="9000">9000 sq. Ft.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="number"  name="price" id="price" placeholder="Price" required>
                                    </div>
                                </div>
                                 <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="house_no" id="house_no" placeholder="House No" required>
                                    </div>
                                </div>
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="city" id="city" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="col-md-6 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="locality" id="locality" placeholder="Locality" required>
                                    </div>
                                </div>
                                <div class="col-md-12 min-des no-pdd">
                                	<div class="sn-field">
                                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description" rows="5"  required></textarea>
                                    </div>
                                </div>
                               </div>                            
                            </div>
                        </li>
                    </ul>
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <input type="submit" name="submit" value="SUBMIT"  class="btn btn-block btn-success mt-sm-3 mt-3 mt-md-0">
                        </div>
                    </div>

                    <!--<div class="col-md-12 order-md-1 order-sm-2 mt-5 text-center order-2">-->
                    <!--    <p class="heading-2">NIRVANA Residents Welfare Association</p>-->
                    <!--    <p class="sub-head">Opp-Courtyard Mkt, Nirvana Country, Sector 50, Gurgaon - 122018</p>-->
                    <!--</div>-->
            </div>
        </div>
    </form>

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

   
</body>

</html>