<?php include('model/class.expert.php');
setlocale(LC_MONETARY, 'en_IN');
$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");  

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));

$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("Wo_Users");

$user_type=$rec[0]['user_type'];

$ModelCall->where("id", $rec[0]['block_id']);
$ModelCall->orderBy("block_name","asc");

$GetBlockList = $ModelCall->get("tbl_block_entry");
//print_r($GetBlockList);

$House_No= sprintf('%04d', $rec[0]['house_number_id']);
//$echo=$House_No;
// echo $GetBlockList[0]['block_code'];
// echo $rec[0]['house_number_id'];
// echo $rec[0]['floor_number'];
$ModelCall->where("block_name", $GetBlockList[0]['block_code']);
$ModelCall->where("house_number",$rec[0]['house_number_id']);
$ModelCall->where("floor",$rec[0]['floor_number']);

$getHouseTaxDetails = $ModelCall->get("tbl_house_tax_details");

// print_r($getHouseTaxDetails);
// exit(0);
$today=date('Y-m-d');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Tax Iframe</title>
    <link rel="stylesheet" href="assests/css/stylesheet.css">
</head>
<body>
<div class="container-fluid" id="container">
<div class="container" id="containerContent">
<div class="heading">
    <h1>MCG Property Tax - Details as on 24th July, 2020</h1>
</div>

<div class="row addressSection infoSection mt-4 borderGreen">
    <div class="col-6 col-lg-3 infoWrapper">
        <div class="key">
            Property ID
        </div>
        <div class="value">
            <?php echo $getHouseTaxDetails[0]['unique_property_id'];?>
        </div>
    </div>
    <div class="col-6 col-lg-3 infoWrapper">
        <div class="key">
            Owner Name
        </div>
        <div class="value">
          <?php echo $getHouseTaxDetails[0]['owner_name']; ?>
        </div>
    </div>
    <div class="col-6 col-lg-3 infoWrapper">
        <div class="key">
            Phone Number
        </div>
        <div class="value">
   <?php echo $getHouseTaxDetails[0]['mobile_no'];?>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 infoWrapper">
        <div class="key">
            Address
        </div>
        <div class="value">
           <?php echo $getHouseTaxDetails[0]['postal_add']; ?>
        </div>
    </div>
</div>

<div class="row addressSection infoSection mt-2 borderGrey">
    <div class="col-6 col-lg-3 infoWrapper order-1 order-lg-1">
        <div class="key">
            Location Name
        </div>
        <div class="value">
           <?php echo $getHouseTaxDetails[0]['loc_name'];?>
        </div>
    </div>
    <div class="col-4 col-lg-2 infoWrapper order-3 order-lg-2">
        <div class="key">
            Plot Area
        </div>
        <div class="value">
            <?php echo $getHouseTaxDetails[0]['total_plot_area'];?>
        </div>
    </div>
    <div class="col-4 col-lg-2 infoWrapper order-4 order-lg-3">
        <div class="key">
            Ward
        </div>
        <div class="value">
           <?php echo $getHouseTaxDetails[0]['ward'];?>
        </div>
    </div>
    <div class="col-4 col-lg-2 infoWrapper order-5 order-lg-4">
        <div class="key">
            Zone
        </div>
        <div class="value">
           <?php echo $getHouseTaxDetails[0]['zone'];?>
        </div>
    </div>
    <div class="col-6 col-lg-3 infoWrapper order-2 order-lg-5">
        <div class="key">
            Property Category
        </div>
        <div class="value">
           <?php echo $getHouseTaxDetails[0]['property_category'];?>
        </div>
    </div>
</div>


<div class="row billInfoSection infoSection mt-2 borderGrey justify-content-between">
      <div class="col-3 infoWrapper">
          </div>
    <div class="col-3 infoWrapper" style="align:right;">
        <div class="key">
            Bill Number
        </div>
        <div class="value">
           <?php echo $getHouseTaxDetails[0]['bill_number'];?>
        </div>
    </div>
    <div class="col-3 infoWrapper">
        <div class="key">
            Bill Year
        </div>
        <div class="value">
         <?php echo $getHouseTaxDetails[0]['bill_year'];?>
        </div>
    </div>
       <div class="col-3 infoWrapper">
          </div>
</div>


<!-- bill contents -->
<div class="row billContentSection infoSection mt-2 border-0">
    <!-- left col -->
    <div class="col-12 col-md-6 billContentCol p-1">
        <div class="billContent borderGrey">
            <div class="row billContentRow">
                <div class="col-8 key">
                    Property Tax upto 2016-17
                </div>
                <div class="col-4 value text-right">
                    <?php echo  number_format($getHouseTaxDetails[0]['propertytax_arrearupto2016_17'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Property Tax upto 2017-18 to 2019-20
                </div>
                <div class="col-4 value text-right">
                 <?php echo  number_format($getHouseTaxDetails[0]['propertytax_arrearupto2017_18to2019_20'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Total Property Tax
                </div>
                <div class="col-4 value text-right">
                    <?php echo  number_format($getHouseTaxDetails[0]['total_arrear_propertytax'],2);?>
                </div>
            </div>
          
            <div class="row billContentRow">
                <div class="col-8 key">
                    Arrear Fire Tax upto 2019-20
                </div>
                <div class="col-4 value text-right">
                   <?php echo  number_format($getHouseTaxDetails[0]['arrear_firetax_upto2019_20'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Interest 2019-20
                </div>
                <div class="col-4 value text-right">
                    <?php echo  number_format($getHouseTaxDetails[0]['interset19_20'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Interest 2020-21
                </div>
                <div class="col-4 value text-right">
                   <?php echo  number_format($getHouseTaxDetails[0]['interest_20_21'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Property Tax 2020-21
                </div>
                <div class="col-4 value text-right">
                   <?php echo  number_format($getHouseTaxDetails[0]['propertytax2021'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Fire Tax 2020-21
                </div>
                <div class="col-4 value text-right">
              <?php echo  number_format($getHouseTaxDetails[0]['firetax2021'],2);?>
                </div>
            </div>
        </div>
    </div>

    <!-- right col -->
    <div class="col-12 col-md-6 billContentCol p-1">
        <div class="billContent borderGrey">
            <div class="row billContentRow">
                <div class="col-8 key">
                    25% Rebate
                </div>
                <div class="col-4 value text-right">
                  <?php echo  number_format($getHouseTaxDetails[0]['twentyfive_percent_rebate'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    5% Rebate
                </div>
                <div class="col-4 value text-right">
                    <?php echo  number_format($getHouseTaxDetails[0]['five_percent_rebate'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    10% Good Tax Payer Rebate
                </div>
                <div class="col-4 value text-right">
                <?php echo  number_format($getHouseTaxDetails[0]['ten_percent_goodtaxpayer'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    10% Rebate
                </div>
                <div class="col-4 value text-right">
                   <?php echo  number_format($getHouseTaxDetails[0]['ten_percent_rebate'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Interest Waiver
                </div>
                <div class="col-4 value text-right">
                  <?php echo  number_format($getHouseTaxDetails[0]['interest_waiver'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Exempt Amount
                </div>
                <div class="col-4 value text-right">
                   <?php echo  number_format($getHouseTaxDetails[0]['exempt_amount'],2);?>
                </div>
            </div>
            <div class="row billContentRow">
                <div class="col-8 key">
                    Exempt Remarks
                </div>
                <div class="col-4 value text-right">
                    <?php echo $getHouseTaxDetails[0]['exemption_remark'];?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row billTotalContentSection infoSection mt-2 border-0 justify-content-center">
    <div class="col-12 col-md-6 billTotalContentElement infoSection borderGreen">
        <div class="row billContentRow font-weight-bold">
            <div class="col-8 key">
                Bill Amount
            </div>
            <div class="col-4 value text-right">
                <?php echo  number_format($getHouseTaxDetails[0]['bill_amount'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-8 key">
                Penalty Amount
            </div>
            <div class="col-4 value text-right">
             <?php echo  number_format($getHouseTaxDetails[0]['penalty_amount'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-8 key">
                Payable Amount till 31 March 20201
            </div>
            <div class="col-4 value text-right">
               <?php echo  number_format($getHouseTaxDetails[0]['payable_amount_till_31mar21'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-8 key">
                Payment Amount with AutoDebit
            </div>
            <div class="col-4 value text-right">
                <?php echo  number_format($getHouseTaxDetails[0]['payable_amount_with_autodebit'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-8 key">
                Payment Amount without AutoDebit
            </div>
            <div class="col-4 value text-right">
              <?php echo number_format($getHouseTaxDetails[0]['payable_amount_without_autodebit'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-8 key">
                Payment Amount till 31 August
            </div>
            <div class="col-4 value text-right">
              <?php echo number_format($getHouseTaxDetails[0]['payable_amount_till_31aug'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-8 key">
                Paymemt AMount till 31 March 2021
            </div>
            <div class="col-4 value text-right">
              <?php echo number_format($getHouseTaxDetails[0]['payable_amount_till_31mar21'],2);?>
            </div>
        </div>
        <div class="row billContentRow">
            <div class="col-12 key">
                <a href="https://www.mcg.gov.in/HouseTax.aspx" target="_blank" style="float: right;">Click to pay to MCG</a>
            </div>
          
        </div>
    </div>
</div>

<div style="align:center"></div> 

<!-- container ends bellow -->
</div>
<!-- container fluid ends bellow -->
</div>






<!-- bootstrap things -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- custom script -->
<!-- <script src="index.js"></script> -->


</body>
</html>