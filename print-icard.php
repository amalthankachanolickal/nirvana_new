<?php 

include('model/class.expert.php');

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
	$ModelCall->where("id", $fid);
	$user_data = $ModelCall->get("Wo_Membership");
	if (count($user_data) == 0) {
	 echo "No Application found";
	 exit(0);
	}
	
if($user_data[0]['block_prime']==1)
{
    $block="AG";
}
elseif($user_data[0]['block_prime']==2)
{
   $block="BC";
}
elseif($user_data[0]['block_prime']==3)
{
  $block="CC";
}
elseif($user_data[0]['block_prime']==4)
{
    $block="DW";
}
elseif($user_data[0]['block_prime']==5)
{
  $block="ES";
}


if($user_data[0]['block_rec']==0)
{
    $block_rec="";
}
elseif($user_data[0]['block_rec']==1)
{
    $block_rec="AG";
}
elseif($user_data[0]['block_prime']==2)
{
   $block_rec="BC";
}
elseif($user_data[0]['block_prime']==3)
{
  $block_rec="CC";
}
elseif($user_data[0]['block_prime']==4)
{
    $block_rec="DW";
}
elseif($user_data[0]['block_prime']==5)
{
  $block_rec="ES";
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Membership I Card</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style>
@media all{

        html, body {
            margin: 0;
            padding: 0;
        }

        .idCardContainer {
            transform: scale(0.75);
            border: 1px solid #000;
            width: 18cm;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .pl-0 {
            padding-left: 0;
        }

        #idCardModal .modal-body {
            padding: 0;
            padding-top: 10px;
        }
        .idCardLogo {
            padding: 0;
        }
        .idCardLogo img {
            height: 100%;
            max-height: 48px;
            width: auto;
        }
        
        .idCardHeading {
            font-weight: bold;
        }
        
        .underlined {
            text-decoration: underline;
        }
        
        .borderBottomDotted {
            border-bottom: 2px #000 dotted;
        }
        
        .blankField {
            min-width: 150px;
            display: inline-block;
        }
        
        .sideInfo .key {
            display: inline-block;
            width: 20%;
        }
        .sideInfo .value {
            display: inline-block;
            width: 75%;
        }
        
        .sideImg img {
            width: 100%;
           /* height: 150px; */
            border: solid 2px #000;
        }
        
        .lastSection .key {
            display: inline-block;
            width: 30%;
        }
        .lastSection .value {
            display: inline-block;
            width: 65%;
        }
        
        .signImg img {
            margin-top: 20px;
            background-color: #fefefe;
            /*width: 200px; */
            height: 70px;
            border: none;
        }
}
    </style>

</head>
<body>
    

    <div class="container-fluid idCardContainer section-to-print" id="idCardContainer">
        <div class="row">
            <div class="col col-2 col-xs-2 text-center idCardLogo">
                <img src="https://www.nirvanacountry.co.in/RWAVendor//client_logo/5c4af13edde8dhome-logo.png" alt="Logo">
            </div>
            <div class="col col-2 col-xs-8 text-center idCardHeading">
                <div>NIRVANA RESIDANTS WELFARE ASSOCIATION</div>
                <div class="underlined">IDENTITY CARD</div>
            </div>
            <div class="col col-2 col-xs-2">
                <!-- this will be empty -->
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-6 col-md-6 mt-2">
                <span>I Card No:-</span>
                <span class="borderBottomDotted blankField"></span>
            </div>
            <div class="col col-xs-6 col-md-6 mt-2">
                <span>Type of Membership:-</span>
                <span class="borderBottomDotted blankField"><?php echo $user_data[0]['member_type'];?></span>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-10 col-md-10 sideInfo">
                <div class="mt-2">
                    <span class="key">Name</span>
                    <span class="borderBottomDotted blankField value">  <?= ucfirst($user_data[0]['title_1']) .' '. ucfirst($user_data[0]['tenant_first_name']) .' '. ucfirst($user_data[0]['tenant_last_name']) ?></span>
                </div>
                <div class="mt-2">
                    <span class="key">S/o W/o</span>
                    <span class="borderBottomDotted blankField value"> <?= ucfirst($user_data[0]['title_2']) .' '. ucfirst($user_data[0]['father_first_name']) .' '. ucfirst($user_data[0]['father_last_name']) ?></span>
                </div>
                <div class="mt-2">
                    <span class="key">Address</span>
                    <span class="borderBottomDotted blankField value"> <?= $block . '-' . $user_data[0]['house_number'] . $user_data[0]['floor_prime'] ?></span>
                </div>
                <div class="mt-2">
                    <span class="key">Membership No</span>
                    <span class="borderBottomDotted blankField value"><?php echo $user_data[0]['app_membership_no'];?></span>
                </div>
            </div>
            <div class="col col-xs-2 col-md-2 sideImg text-center pl-0">
                <img src="<?php echo SITE_URL.$user_data[0]['photograph_user'];?>" alt="" class="mt-2">
            </div>
        </div>
        <div class="row lastSection">
            <div class="col-xs-6 col-md-6 mt-2">
                <span class="key">Date of Birth</span>
                <span class="borderBottomDotted blankField value"><?php echo date('jS M, Y', strtotime($user_data[0]['dob']));?></span>
            </div>
            <div class="col-xs-6 col-md-6 mt-2">
                <span class="key">Date of Issue</span>
                <span class="borderBottomDotted blankField value"><?= date('jS M, Y') ?></span>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-xs-6 text-center">
                <div class="signImg text-center" style="height: 90px;">
                    
                     <img src="<?php echo SITE_URL.$user_data[0]['signature'];?>" alt="" height="40px" >
                </div>
                <div class="text-center">
                    Holder's Signature
                </div>
            </div>
            <div class="col-xs-6 text-center">
                <div class="signImg text-center" style="height: 90px;">
                 <img src="<?php echo SITE_URL;?>images/stamps-images/office-stamp.jpeg" alt="" height="40px" >
                </div>
                <div class="text-center">
                    Authorised Signatory of the Society
                </div>
            </div>
        </div>
    </div>

</body>
</html>