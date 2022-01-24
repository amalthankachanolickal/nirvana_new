<?php include('model/class.expert.php');

$Backtracker = $_SERVER['REQUEST_URI'];
include('CheckCustomerLogin.php');

if($_SESSION['UR_LOGINID']==''){
        header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=bills_mobile.php");
        exit;
}

$ModelCall->where("status",1);
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("document_tilte",$_REQUEST['meid']);
$ModelCall->orderBy("id","desc");
$getNoticeInfo = $ModelCall->get("tbl_document_directory");
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Top'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow = $ModelCall->get("tbl_ads_management_directory");

$ModelCall->where("user_id",$_SESSION['UR_LOGINID']);
$rec = $ModelCall->get("Wo_Users");

 $ModelCall->where("(id ='".$ModelCall->utf8_decode_all($rec[0]['block_id'])."')" );
$ModelCall->orderBy("id","desc");
$getBlockInfo = $ModelCall->get("tbl_block_entry");


$len=strlen($rec[0]['house_number_id']);
	if($len==1){
 $rec[0]['house_number_id']="00".$rec[0]['house_number_id'];
 
 }
 
	if($len==2){
 $rec[0]['house_number_id']="0".$rec[0]['house_number_id'];

 }

if($rec[0]['floor_number']==1){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."' or flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."GF'  order by bill_date DESC");

   // echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."' or flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."GF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==2){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."FF'  order by bill_date DESC");

   // echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."FF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==3){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."SF'  order by bill_date DESC");

  //  echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."SF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==4){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."TF'  order by bill_date DESC");

  //  echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."TF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==5){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."FF'  order by bill_date DESC");

 //   echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."' or flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."GF'  order by bill_date DESC";
}

$value=$getBillInfo['0'];

$ModelCall->where("bill_num",$value['bill_number']);

$ModelCall->orderBy("id","desc");
$getBillInfo = $ModelCall->get("tbl_bill_payment_details");   
$date =$getBillInfo[0]['date_received'];
// echo "<pre>";
// var_dump($getBillInfo);
// echo "</pre>";
// //exit;


$indexvalues = $ModelCall->get("tbl_ads_index");
$ModelCall->where("ads_banner_size ='728X90'");
$ModelCall->where("ads_banner_position ='Bottom'");
$ModelCall->where("status",1);
$ModelCall->orderBy("RAND()");
$getBannerShow1 = $ModelCall->get("tbl_ads_management_directory");
$ModelCall->where("status",1);
$getAdvertise = $ModelCall->get("tbl_adervitiser_module");
$i=0;
foreach($getAdvertise as $arrays){
if($arrays['image']!=""){
$images[$i]="https://www.nirvanacountry.co.in/RWAVendor/ads_managements/photos/".$arrays['image'];
if($arrays['contact']!=''){
$url[$i]="tel:".$arrays['contact'];
}
else{
$url[$i]="https://".$arrays['url'];
}


$i++;
}
}
function dateformatchange($date){
  
    $date=date_create($date);
  
 $date_return=date_format($date,"d M Y");
 
 return $date_return;

}
$ModelCall->where("user_id",$_SESSION['UR_LOGINID']);
$ifSubscribed = $ModelCall->get("tbl_ebill_subscription");


?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Nirwana Bill Payment</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
  <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico"> -->
<!-- Bootstrap css -->
<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
<!--Font Awesome css -->
<link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">
<!-- Owl Carousel css -->
<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">
<!-- Site css -->
<link href="<?php echo SITE_URL;?>assets/css/home-style.css" rel="stylesheet">
<!-- Responsive css -->
<link href="<?php echo SITE_URL;?>assets/css/responsive.css" rel="stylesheet">
</head>
<body>
 <?php include(ROOTACCESS."front_header.php");  
 $margin=20;?>
      <?php if(empty($ifSubscribed) && ($_SESSION['UR_LOGINID']!='') ){
      $mirgin=-10;?>
<form method="post" name="subcribeForm" action="<?php echo SITE_URL;?>/ebill_controller.php" onSubmit="return validateform();">
     <div class="checky-sec st2" style="margin: 10%;  margin-top: 20%;">
    <div class="fgt-sec">
      <label class="check-new-box">
      <input type="checkbox" id="subscribe_accept" name="subscribe_accept" value="1" required>
      <span class="checkmark"></span> </label>
      <small style="font-size: 16px;width: 100%;line-height: 25px;font-weight: 500;">Click to accept to enrol for digital bills and stop paper bills. Get digital copy
of your bills online and in your email. TnCs Apply. <a  target="_blank" href='<?php echo SITE_URL;?>/TNC_newspaper.php'> <strong style="color:#008000;">E-Bills Subscribtion</strong></a>.</small>
    </div>
  </div>
  <div class="btn-group" style="margin: 10%;  margin-top: -10%;" >
    
    <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' >Subscribe</button>
  </div>

</form>
<?php }?>
<div class="container">
  

    
<div class="card text-center" style="width: 80%; margin: 10%;  margin-top: <?php echo $mirgin;?>%;">
    <br><br>
    <h3>Cam Bills</h3>
    
  <ul class="list-group list-group-flush">
     <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank">  <li class="list-group-item">Bill Date: <?php echo dateformatchange($value['bill_date']);?></li></a>
     <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"><li class="list-group-item">Bill Amount: <?php echo ucwords($value['payable_amount']);?></li></a>
  
  <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"> <li class="list-group-item">Amount Paid: <?php echo ucwords($value['amt_paid']);?></li></a>
   <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"><li class="list-group-item">Date Paid: <?php echo dateformatchange($date);?></li></a>
    <a  data-toggle="modal" data-target="#amountbreakup<?php echo $value['id'];?> " title='click to see breakup' target="_blank"> <li class="list-group-item">Balance Due : <?php echo ucwords($value['total_outstanding']);?></li></a>
 <?php include('amount_breakup.php');?>
  <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"> <li class="list-group-item">Due Date: <?php echo dateformatchange($value['display_due_date']);?> </li></a>
  <li class="list-group-item"><form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>RWAVendor/controller/bill_payment_controller.php" target="_blank" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="BillpaperModule">
                     <input type="hidden" name="billid" id="billid" value="">
                    <input type="hidden" name="bill_no" id="bill_no" value="<?php echo $value['bill_number']; ?>">
                     <input type="hidden" name="amt_<?php echo $value['bill_number'];?>" value="<?php echo $value['total_outstanding'];?>">
                        <?php if($value['total_outstanding']>0){?> <button  class="btn btn-success" name  ='paynow' type="submit" value='<?php echo $value['bill_number']; ?>' onclick="assignValues('<?php echo $value['bill_number'];?>');"  style='border-radius: 10px;' >pay now</button><?php }?> 
<?php if($value['total_outstanding']<=0){echo "Status: Paid"; }?>
</form>
<a href="<?php echo SITE_URL;?>bills_desktop.php" target="_blank"><button  class="btn btn-success" style='border-radius: 10px;' >View Old Bills</button></a>
</li>
                    
  
 
  </ul>
  
  
  
  
  
</div>
  
</div>
  
    <br> <br> 
<!------ Include the above in your HEAD tag ---------->
<?php include(ROOTACCESS."advertisement_mobile.php");?>
<br>

 <?php include(ROOTACCESS."HomefooterCall.php");?>
  <script>
      
$('.n_bought').on('change',calculate);
$('.sub_type').on('change',calculate);
var total_amt=0;
 function calculate(e){
	var row = $(this).parents('tr');
	var whose;
	var sub = $(row).find('.sub_type').val();
	var b = $(row).find('.n_bought').val();

/*	if(sub == 'Daily'){
		whose = '.n_price';
	}*/
	
/*	if(sub == 'Annual'){*/
		whose = '.n_discounted';
/*	}*/
	var price = $(row).find(whose).text();

	if(parseInt(b) == NaN){
		b = 0;
	}
	if(parseInt(price) == NaN){
		price = 0;
	}
	

	var amt = b*price;
	console.log(amt);
	$(row).find('.n_amt').text(amt);
	total_amt=parseInt(amt)+parseInt(total_amt);
	$(".final_p").text(total_amt);
}

function assignValues(billid){
  //alert (billid);
$("#billid").val(billid);

}
  </script>
</body>
</html>
