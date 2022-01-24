<?php 

include('model/class.expert.php');

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
	$ModelCall->where("id", $fid);
	$user_data = $ModelCall->get("Wo_Membership");
// 	if (count($user_data) == 0) {
// //	 echo "No Application found";
// 	// exit(0);
// 	}
	
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
    <title>Print Membership Form</title>
	<link href="<?= SITE_URL ?>assets/css/printstyle.css" rel="stylesheet">
    <!--<link rel="stylesheet" media="all" href="style.css">-->
</head>
<body>
    
<div class="container">
    <div>
        <img class="logo-image" src="./images/logo_google_form.png" alt="Nirwana">
    </div>
    <div class="text-center form-heading" style="margin-top: -60px;">
        FORM - X
    </div>
    <div class="text-center form-heading">
        <u>
            Application form for membership of NRWA
        </u>
    </div>

    <!--<div class="text-center form-status-wrapper d-none">-->
    <!--    <span class="bg-green text-light rounded form-status">-->
    <!--        Current Status : Admin Approved-->
    <!--    </span>-->
    <!--</div>-->

    <div class="section">
        <div class="w-70 text-left pt-4">
            <div class="small-lght">
                To,
            </div>
            <div>
                The President/Secretary <br>
                Nirvana Residents Welfare Association
            </div>
            <div>
                <u>Gurgaon</u>
            </div>

            <div class="mt-2">
                <span class="text-bold">Serial No : </span>
                <u><?php echo $user_data[0]['serialno'];?></u>
            </div>

            <div class="mt-2">
                <span class="text-bold">Subject : </span>
                <u>Application for admission as a Member of the NRWA Society. </u>
            </div>
        </div>
        <div class="w-30 text-right">
            <img src="<?= SITE_URL.$user_data[0]['photograph_user']; ?>" class="user-image" alt="">
        </div>
    </div>

    <div class="section pt-2">
        <div class="pt-2">
            Dear Sir,

        </div>
        <div>
            I wish to apply for admission as a member of NRWA. My brief particular(s) are as under:
        </div>

        <div>
            <div class="input-group d-block pt-2">
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['title_1'];?>" size="5" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo ucwords($user_data[0]['tenant_first_name']);?>" size="15" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo ucwords($user_data[0]['tenant_middle_name']);?>" size="20" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php ucwords($user_data[0]['tenant_last_name']) ;?>" size="20" disabled/>
                </div>
            </div>
            <div class="input-group d-block pt-2">
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['title_2'];?>" size="5" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo ucwords($user_data[0]['father_first_name']);?>" size="15" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo ucwords($user_data[0]['father_middle_name']);?>" size="20" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo ucwords($user_data[0]['father_last_name']);?>" size="20" disabled/>
                </div>
            </div>
        </div>
    </div>

    <div class="section pt-2">
        <div>
            Address of the House for which I am applying for membership
        </div>
        <div class="input-group pt-2">
            <div class="d-inline input-wrapper">
                <input type="text" value="<?php echo $block;?>" size="5" disabled/>
            </div>
            <div class="d-inline input-wrapper">
                <input type="text" value="<?php echo $user_data[0]['house_number'];?>" size="5" disabled/>
            </div>
            <div class="d-inline input-wrapper">
                <input type="text" value="<?php echo $user_data[0]['floor_prime'];?>" size="5" disabled/>
            </div>
            <div class="d-inline input-wrapper">
                Nirvana Country, Gurgaon, 122018
            </div>
        </div>
    </div>
	<?php if ($user_data[0]['address_corres_1']=="") { ?>
    <div class="section checkbox-wrapper">
        <span class="checkbox">✓</span>
        <span>My current Place of residence (Correspondance Address) is same as above.</span>
    </div>
<?php } else {?>
    <div class="section checkbox-wrapper">
        <span class="checkbox checkbox-grey">&nbsp;&nbsp;&nbsp;</span>
        <span>My current Place of residence (Correspondance Address) is same as above.</span>
    </div>
    
    <div class="section pt-0">
        <div>
            <div class="input-group d-block pt-2">
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['address_corres_1'];?>" size="75" disabled/>
                </div>
            </div>
            <div class="input-group d-block pt-2">
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['address_corres_2'];?>" size="75" disabled/>
                </div>
            </div>
        </div>
        <div>
            <div class="input-group d-block pt-2">
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['city'];?>" size="20" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['state'];?>" size="20" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['pin'];?>" size="25" disabled/>
                </div>
            </div>

        </div>
    </div>
<?php }?>
    <div class="section pt-2">
        <div class="input-group">
            <div class="d-inline input-wrapper">
                <input type="text" value="<?php echo $user_data[0]['dob'];?>" size="20" disabled/>
            </div>
            <div class="d-inline input-wrapper">
                <input type="text" value="<?php echo $user_data[0]['occupation'];?>" size="20" disabled/>
            </div>
            <div class="d-inline input-wrapper">
                <input type="text" value="<?php echo $user_data[0]['emailid_1'];?>" size="25" disabled/>
            </div>
        </div>
    </div>

    <div class="section">
        <div>
            <div class="w-40 d-inline">
                <div class="input-group">
                    <div class="d-inline input-wrapper p-0">
                        <input type="text" value="+91" size="5" disabled/>
                    </div>
                    <div class="d-inline input-wrapper p-0">
                        <input type="text" value="<?php echo $user_data[0]['mobile'];?>" size="20" disabled/>
                    </div>
                </div>
            </div>
            <div class="w-50 d-inline">
                <div class="input-group">
                    <div class="d-inline input-wrapper p-0">
                        <input type="text" value="+91" size="5" disabled/>
                    </div>
                    <div class="d-inline input-wrapper p-0">
                        <input type="text" value="<?php echo $user_data[0]['isd_2'];?>" size="5" disabled/>
                    </div>
                    <div class="d-inline input-wrapper p-0">
                        <input type="text" value="<?php echo $user_data[0]['phone'];?>" size="20" disabled/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>


    <div class="section d-block pt-2">
        <hr>
        <div>
            I am enclosing herewith the following Documents:
        </div>
        <div class="table-wrapper pt-2">
            <table>
                <thead>
                    <tr>
                        <th>Document Type</th>
                        <th>Document Name</th>
                        <th>Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Copy of Identity Proof</td>
                        <?php if ($user_data[0]['doc_type_poi'] == 'other') { ?>
                          <td><input type="text" value="<?php echo $user_data[0]['poi_other_title'];?>" size="20" disabled/></td>
                        <?php } else {?>
                        <td><input type="text" value="<?php echo $user_data[0]['doc_type_poi'];?>" size="20" disabled/></td>
                        <?php }?>
                        <td class="text-center"><span class="text-blue"><a href="<?php echo SITE_URL.$user_data[0]['proof_of_identity'];?>" target="_blank" >View Current</a></span></td>
                    </tr>

                    <tr>
                        <td>Copy of Address Proof</td>
                         <?php if ($user_data[0]['doc_type_poa'] == 'other') { ?>
                          <td><input type="text" value="<?php echo $user_data[0]['poa_other_title'];?>" size="20" disabled/></td>
                        <?php } else {?>
                        <td><input type="text" value="<?php echo $user_data[0]['doc_type_poa'];?>" size="20" disabled/></td>
                        <?php }?>
                        <td class="text-center"><span class="text-blue"> <a href="<?php echo SITE_URL.$user_data[0]['proof_of_identity'];?>" target="_blank">View Current</a></span></td>
                    </tr>

                    <tr>
                        <td>Copy of Date of Birth Proof</td>
                         <?php if ($user_data[0]['doc_type_pdob'] == 'other') { ?>
                          <td><input type="text" value="<?php echo $user_data[0]['pdob_other_title'];?>" size="20" disabled/></td>
                        <?php } else {?>
                        <td><input type="text" value="<?php echo $user_data[0]['doc_type_pdob'];?>" size="20" disabled/></td>
                        <?php }?>
                        <td class="text-center"><span class="text-blue"><a href="<?php echo SITE_URL.$user_data[0]['proof_of_dob'];?>" target="_blank" >View Current</a></span></td>
                    </tr>

                    <tr>
                        <td>Copy of Ownership Proof</td>
                        <?php if ($user_data[0]['doc_type_ownership'] == 'other') { ?>
                          <td><input type="text" value="<?php echo $user_data[0]['ownership_other_title'];?>" size="20" disabled/></td>
                        <?php } else {?>
                        <td><input type="text" value="<?php echo $user_data[0]['doc_type_ownership'];?>" size="20" disabled/></td>
                        <?php }?>
                        <td class="text-center"><span class="text-blue"> <a href="<?php echo SITE_URL.$user_data[0]['ownership_proof'];?>" target="_blank"> View Current</a></span> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div class="section">
        <ul>
            <li class="input-wrapper-list">
                <input type="text" value="<?php echo $user_data[0]['mode_of_payment_1'];?>" size="10" disabled/>
                <input type="text" value="<?php echo $user_data[0]['reference_number_1'];?>" size="20" disabled/>
                dated
                <input type="text" value="<?php echo $user_data[0]['payment_date_1'];?>" size="20" disabled/>
                One time membership fees of Rs.500
            </li>
        </ul>
    </div>

    <hr>

    <div class="section">
        <div class="">
            I certify that:
        </div>
        <div>
            <ul class="my-0">
                <li class="pt-2">
                    I unconditionally subscribe to the aims & objects of the society and contribute towards attainment of the same.
                </li>
                <li class="pt-2">
                    I will abide by the <span class="text-blue">Bye Laws of the Society</span>, as applicable and amended from time to time.
                </li>
                <li class="pt-2">
                    I have not been convicted of an offence involving moral turpitude involving imprisonment.
                </li>
            </ul>
        </div>
    </div>

    <div class="section">
        <div class="input-wrapper-list">
            I request you to kindly admit me as a
            <input type="text" value="<?php echo $user_data[0]['member_type'];?>" size="20" disabled/>
            of the Society.
        </div>
        <div class="pt-4">
            Thanking you
        </div>
        <div class="text-right text-md">
            Yours faithfully,
        </div>
        <div class="thankyou-image text-right pt-2">
            <img src="<?= SITE_URL.$user_data[0]['signature']; ?>" alt="Signature">
        </div>
        <div class="text-right text-md d-none">
            Please attach a picture/ image of your ink signatures<br>to submit the form online.
        </div>
        <div class="pt-2 text-right">
            Date:  <?= date('jS M, Y') ?>
        </div>

        <div class="pt-2 text-right">
            Place: Gurgaon
        </div>
    </div>

    <hr>



    <div class="section recommend-section">
        <div class="text-bold">
            Recommendations of a regular member of the Society (if Provided in the byelaws):
        </div>
        <div class="pt-4">
            I recommend admission of
            <u><?php echo $user_data[0]['recommend_name'];?></u>
            S/o
            <u><?php echo $user_data[0]['recommend_father_fname'];?></u>,
            aged
            <u><?php echo $user_data[0]['age'];?></u>
            years, R/o
            <u><?php echo $user_data[0]['rec_per_name'];?>, Gurgaon, 122018</u>,
            as
            <u><?php echo $user_data[0]['member_type'];?></u>
            of the society.
        </div>

        <div class="pt-2">
            <div class="input-group">
                <div class="d-inline input-wrapper">
                    Recommender's Address
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $block_rec;?>" size="5" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['house_number_rec'];?>" size="5" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['floor_rec'];?>" size="5" disabled/>
                </div>
            </div>
        </div>

        <div class="pt-2">
            <div class="input-group">
                <div class="d-inline input-wrapper">
                    Recommender's Name
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['rec_per_title'];?>" size="5" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['rec_per_fname'];?>" size="10" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['rec_per_mname'];?>" size="10" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['rec_per_lname'];?>" size="10" disabled/>
                </div>
            </div>
        </div>

        <div class="pt-2">
            <div class="input-group">
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['rec_other_emailid'];?>" size="25" disabled/>
                </div>
                <div class="d-inline input-wrapper">
                    <input type="text" value="<?php echo $user_data[0]['rec_other_phone'];?>" size="25" disabled/>
                </div>
            </div>
        </div>

        <div class="mt-2 pt-2">
            Date: <?= date('jS M, Y') ?>
        </div>

        <div class="pt-2">
            Place: Gurgaon
        </div>
        
    </div>

    <hr>

    <div class="section">
        <div class="text-bold">
            Decision of the Governing Body :
        </div>
        <div class="pt-2 text-more-lineheight">
          <?php echo $user_data[0]['recommend_name'];?> S/o <?php echo $user_data[0]['recommend_father_fname'];?> aged <?php echo $user_data[0]['age'];?> years,
            R/o <?php echo $user_data[0]['rec_per_name'];?>, Gurgaon, 122018,
            is admitted as <?php echo $user_data[0]['member_type'];?> of the Society w.e.f <input type="text" class="border-black" value="" size="10" disabled> under
            membership no. <input type="text" class="border-black" value="" size="10" disabled> vide resolution bearing no. <input type="text" class="border-black" value="" size="10" disabled> in the meeting of Governing Body held on <input type="text" class="border-black" value="" size="10" disabled>.
        </div>

        <div class="pt-2">
            He may be issued an identity card of the Society & his name may entered in the Register of Members.
        </div>

        <div class="pt-2">
            Dated: <input type="text" class="border-black" value="" size="10" disabled>
        </div>

        <div class="pt-2">
            Place: Gurgaon
        </div>
    </div>


    <!-- container end -->
</div>

</body>
</html>