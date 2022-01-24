<html lang="en">
<head>
    <?php if (isset($_SESSION['login_id'])) {
    } else {
        redirect(BASE_URL . "login");
    } ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">e
    <meta name="description"
          content="Nirvana Country is the prestigious township in Gurgaon. It is a gated community of villas which homes over 1000 families.">
    <meta name="keywords"
          content="Nirvana country, nirvana, township in Gurgaon, apartments in Gurgaon, homes in Gurgaon, residential properties in Gurgaon, houses in Gurgaon, property in Gurgaon, residential society in Gurgaon, best gated community in Gurgaon, top properties in Gurgaon, Unitech nirvana country">
    <meta name="author" content="Kushal">
    <!-- Site title -->
    <title>RWA</title>
    <!-- favicon -->

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>animate.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>line-awesome.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_LIB_PATH; ?>slick/slick.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_LIB_PATH; ?>slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>style.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_CSS_PATH; ?>responsive.css">
    <script src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_JS_PATH . 'jquery-1.11.1.min.js' ?>"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    
    <script>
        $(document).ready(
            function () {
                // alert("dfgd"); exit;
            }
        );


        $(function () {
            $(".datepicker").datepicker();
        });

    </script>


    <style>
        .greyclass {
            background-color: grey;
            color: white;
        }

        input, select {
            border-radius: 5px;
        }

        .table td, .table th {
            padding: 0.20rem;
        }

        .sign_in_sec form input, .sign_in_sec form select {

            color: #fbf9f9
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

        .greyText {
            background-color: #e0dbdb;
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
            color: black;
            position: left;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .myContainer {
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
                justify-content: center;
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
                justify-content: center;
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

        p {
            color: black;
        }

        .inner-img {
            transition: 0.3s;
        }

        .inner-img:hover {
            transform: scale(1.3);
        }
    </style>

    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
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
</head>
<body>
<div class="main" id="divToPrint">
    <div class="container" style="padding: 0px;">
        <div class="sign-in-page" style="padding: 40px 20px;">
            <div class="container" style="padding: 0px;">

                <div class="myContainer">
                    <a href="<?php echo BASE_URL; ?>myBooking" class="btn btn-success"
                       style="float: left;margin: 15px;">
                        View Bookings
                    </a>
                    <div style="float: right;">
                        <a href="<?php echo BASE_URL; ?>logout"
                           onclick="return confirm('Are you sure you want to logout now ?')"
                           class="btn btn-green sign-in-up-btn"
                           style="margin-top: 6px !important; color: green  !important;">
                            Logout
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-sec">
                            <div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-left logo">
                                <a href="index.php"><img
                                            src="https://www.nirvanacountry.co.in/RWAVendor//client_logo/5c4af13edde8dhome-logo.png"/></a>
                            </div>

                            <div class="col-lg-12 order-md-1 order-sm-2 order-2 text-center mt-3 mb-0 mb-md-3 no-pdd">

                                <div class="sn-field-header">
                                    <h4><u>Register for COVID Vaccine</u></h4>

                                </div>

                            </div>
                            <br><br>


                            <div class="sign_in_sec col-md-12 p-0" style="display:block;">
                                <form method="post" id="regForm" enctype="multipart/form-data" action="" >
                                    <li style="color:white;">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-3 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <select name="title" id="title"
                                                                onchange="getGender(document.getElementById('title').value)" required>
                                                            <option value="">Title</option>
                                                            <option value="Mr." <?Php if ($getUser->user_title == 'Mr.') { ?> selected <?php } ?>>
                                                                Mr.
                                                            </option>
                                                            <option value="Mrs." <?Php if ($getUser->user_title == 'Mrs.') { ?> selected <?php } ?>>
                                                                Mrs.
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="fname" id="fname"
                                                               value="<?php echo $getUser->first_name; ?>"
                                                               placeholder="First Name" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="mname" id="mname"
                                                               placeholder="Middle Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="lname" id="lname"
                                                               value="<?php echo $getUser->last_name; ?>"
                                                               placeholder="Last Name" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <select name="block_prime" id="block_prime"
                                                                required>
                                                            <?php
                                                            if (count($user_data) > 0) {
                                                                ?>
                                                                <option value="" disabled>Block</option>
                                                                <option value="1" <?php if ($getUser->block_id == "1") { ?> selected <?php } ?>>
                                                                    AG
                                                                </option>
                                                                <option value="2" <?php if ($getUser->block_id == "2") { ?> selected <?php } ?>>
                                                                    BC
                                                                </option>
                                                                <option value="3" <?php if ($getUser->block_id == "3") { ?> selected <?php } ?>>
                                                                    CC
                                                                </option>
                                                                <option value="4" <?php if ($getUser->block_id == "4") { ?> selected <?php } ?>>
                                                                    DW
                                                                </option>
                                                                <option value="5" <?php if ($getUser->block_id == "5") { ?> selected <?php } ?>>
                                                                    ES
                                                                </option>
                                                                <?php
                                                            } else { ?>
                                                                <option value="" disabled selected>Block</option>
                                                                <option value="1">AG</option>
                                                                <option value="2">BC</option>
                                                                <option value="3">CC</option>
                                                                <option value="4">DW</option>
                                                                <option value="5">ES</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" required
                                                               maxlength="4" name="house_number" id="house_number"
                                                               onkeypress="return isNumberKey(event);"
                                                               value="<?php echo $getUser->house_number_id; ?>"
                                                               placeholder="House #">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <select name="floor_prime" id="floor_prime" required
                                                        >
                                                            <?php
                                                            if (count($user_data) > 0) { ?>
                                                                <!--<option value="Villa" <?php if ($getUser->floor_number == 'Villa') { ?> selected <?php } ?>>Villa</option>-->
                                                                <option value=" ">Villa</option>
                                                                <option value="GF" <?php if ($getUser->floor_number == '1') { ?> selected <?php } ?>>
                                                                    GF
                                                                </option>
                                                                <option value="FF" <?php if ($getUser->floor_number == '2') { ?> selected <?php } ?>>
                                                                    FF
                                                                </option>
                                                                <option value="SF" <?php if ($getUser->floor_number == '3') { ?> selected <?php } ?>>
                                                                    SF
                                                                </option>
                                                                <option value="TF" <?php if ($getUser->floor_number == '4') { ?> selected <?php } ?>>
                                                                    TF
                                                                </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option name="floor_prime" id="floor_prime" value=""
                                                                        disabled selected>Floor
                                                                </option>
                                                                <!--<option value="Villa" >Villa</option>-->
                                                                <option value="NA">Villa</option>
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
                                                <div class="col-md-2 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="age" id="age"
                                                               onkeypress="return isNumberKey(event);" maxlength="3"
                                                               value="<?php echo set_value('age'); ?>"
                                                               placeholder="Age" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td width="30%"><input type="text" name="isd_1"
                                                                                       id="isd_1" placeholder="+91"
                                                                                       maxlength="3" value="+91"
                                                                                       required></td>
                                                                <td width="70%"><input type="text" min="10" required
                                                                                       name="mobile" id="mobile"
                                                                                       value="<?php echo set_value('mobile'); ?>"
                                                                                       oninvalid="this.setCustomValidity('')"
                                                                                       oninput="this.setCustomValidity('')"
                                                                                       onkeypress="return isNumberKey(event);"
                                                                                       maxlength="10"
                                                                                       placeholder="Mobile" value=""
                                                                                       onblur="mobnumber(this.value);">
                                                                </td>

                                                            </tr>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-5 min-des no-pdd">
                                                    <div class="sn-field">
                                                        <input type="email" name="email" id="email"
                                                               value="<?php echo $getUser->user_email; ?>"
                                                               placeholder="Email" required readonly>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-12 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="spcl_category" id="spcl_category"
                                        value="<?php if ($getUser->special_category <> NULL && $getUser->special_category <> '') {
                                                    echo $getUser->special_category;
                                                } ?>"
                                        placeholder="Please state any special reason due to which the vaccination should be prioritised." >
                                    </div>
                                </div>-->


                                            </div>
                                            <!------------ Modification  ------------------------>
                                           <div class="row">

                            <div class="col-md-3 ">
                                <div class="sn-field">
                                    <label>Dose type</label>
                                     <select name="vaccine_type" id="vaccine_type"
                                            class="vaccine_time"
                                            onchange="sel_dosageDiv(this.value)" required>
                                        <option value="">--Dose--</option>
                                         <option value="1">Dose 1</option>
                                         <option value="2">Dose 2</option>
                                           </select>
                                </div>
                            </div>


                            <div id="firstV_div" class="col-md-8"  style="display: none;"> 
                                <div class="col-sm-5" style="margin: unset;" >
                                    <div class="sn-field">
                                        <label>Dose Date</label>
                                        <input type="date" name="vaccine1_date"
                                               id="vaccine1_date" min="2021-05-02" max="2021-05-03"
                                               onchange="get_all_booking(this.value,1);"
                                               max="<?php echo date('Y-m-d'); ?>"
                                               class="datepicker"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="margin: unset;">
                                    <div class="sn-field">
                                        <?php $range = range(strtotime("10:00"), strtotime("16:00"), 15 * 60);  ?>
                                        <label>Dose Time</label>

                                        <select name="vaccine1_time" id="vaccine1_time"
                                                class="vaccine_time"
                                                onchange="time_validation('1');" required>
                                            <option value="">--Time--</option>
                                            <?php foreach ($range as $time) {  ?>
                                                <option value="<?php echo date("g:i: A", $time); ?>"><?php echo date("g:i: A", $time); ?></option>
                                            <?php } ?>
                                             
                                        </select>
                                        <div class="error" style="color:red;"><?php echo form_error('vaccine1_time'); ?></div>
                                    </div>
                                </div>
                                <div id="second_div" style="display: none;">
                                  <div class="col-sm-3">
                                    <div class="sn-field">
                                        
                                        <label>vaccine Took</label> 
                                        <select name="firstVaccine" id="firstVaccine"
                                                class="vaccine_time"  >
                                            <option value="">--Select Vaccine--</option>
                                            <option value="COVAXIN">COVAXIN</option>
                                            <option value="COVISHIELD">COVISHIELD</option>
                                        </select>
                                         
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                                            <!------------ Modification  ------------------------>

                                        </div>
                                    </li>
                                    <p>Dear Residents, </p>

                                    <p>The Urban Public Health Centre (UPHC), Tigra has sought the list and details of
                                        residents above 60 years who are interested for vaccination for COVID-19, as a
                                        part of GOvernment's plan to vaccinate the public who are above 60 years, it
                                        will be started from 1st March, 2021. The details required by UPHC are as here
                                        below. Those who are interested may fill the details, which will be shared with
                                        the UPHC, Tigra. Further, as per their program and plan, they will contact the
                                        persons directly.
                                    </p>

                                    <p>However, please note that the PARWA may neither be able to
                                        expedite nor take any responsibility for the vaccination, its process or it’s
                                        results.</p>

                                    <div class="col-lg-12 no-pdd">
                                        <div class="checky-sec st2">
                                            <div class="fgt-sec">
                                                <label class="check-new-box">
                                                    <input type="checkbox" id="policy_accept" name="policy_accept"
                                                           value="0"  required>
                                                    <span class="checkmark"></span> </label>
                                                <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;">
                                                    Yes, I understand and agree to the <?php echo WEBSITE_TITLE ?> <a
                                                            href="<?php echo BASE_URL; ?>terms_conditions.php"
                                                            target="_blank" style="color: #37a000;">Terms of Use</a>.
                                                </small>
                                            </div>
                                            <!--fgt-sec end-->
                                        </div>
                                    </div>
                                    <p>&nbsp;</p>
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd" style="text-align:center;">
                                            <input type="submit" name="submit" id="submit"
                                                   class="btn btn-green sign-in-up-btn" value="Register" style="    background-color: #37a000;
    color: white !important;">

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
</div>

</body> 
<script>

    $(function () {
        $(".datepicker1").datepicker({minDate: new Date()});
    });
    
    
  
    function get_all_booking(sel_date,idd) {
       

        $.post(
            "<?php echo BASE_URL ?>ajax/timing/get_time_slots_available",
            {
                sel_date: sel_date
            },
            function (response) {


                $("#vaccine"+idd+"_time").html(response);


            }
        );
    }

function sel_dosageDiv(DivID)
{
    if (DivID == 1) {
        $("#firstV_div").show();
        $("#second_div").hide();
    } else {
          $("#firstV_div").show();
        $("#second_div").show();

        
    }
}

</script>
</html>