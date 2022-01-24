<?php include('model/class.expert.php');

if($_SESSION['UR_LOGINID']==''){
        header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=bills_desktop.php");
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

 //   echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."' or flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."GF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==2){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."FF'  order by bill_date DESC");

   // echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."FF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==3){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."SF'  order by bill_date DESC");

    //echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."SF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==4){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."TF'  order by bill_date DESC");

    //echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."TF'  order by bill_date DESC";
}
if($rec[0]['floor_number']==5){
    $getBillInfo = $ModelCall->rawQuery("select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."FF'  order by bill_date DESC");

    //echo "select * from tbl_billing_new  where flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."' or flat_no='".$getBlockInfo[0]['block_code']."-0".$rec[0]['house_number_id']."GF'  order by bill_date DESC";
}



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

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nirwana Bill Payment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-55877669-17');
</script>
<script type = "text/javascript">
var i = 0; 			// Start Point
var k1="<?php echo $indexvalues[0]['first_index']?>";
var k2="<?php echo $indexvalues[0]['secound_index']?>";
var images = <?php echo json_encode($images); ?>;	// Images Array
var url = <?php echo json_encode($url); ?>;
var time = 5000;	// Time Between Switch
	 
// Image List
//images[0] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";
//images[1] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Garima.jpg";

//images[2] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/b84c640c-30da-462b-a0c5-c5dabc0a3d02.jpeg";
//images[3] = "http://pts.palmterracesselect.com/RWAVendor/ads_managements/photos/Screenshot (32).png";



// Change Image
function changeImg(){
    
	document.slide.src = images[k1];
    document.getElementById("image_url").href = url[k1];
    document.slide1.src = images[k2];
    document.getElementById("image_url1").href = url[k2];
	// Check If Index Is Under Max
	if(k1 < images.length - 1){
	  // Add 1 to Index
	  k1++; 
	} else { 
		// Reset Back To O
		k1 = 0;
	}
	if(k2 < images.length - 1){
	  // Add 1 to Index
	  k2++; 
	} else { 
		// Reset Back To O
		k2 = 0;
	}
	// Run function every x seconds
	setTimeout("changeImg()", time);
}

// Run function when page loads
window.onload=changeImg;
    </script>
    
    <style>
    #dataTable tfoot {
  display: table-header-group;
}

mark {
  background: orange;
  color: #000;
}



.dataTables_wrapper .dataTables_paginate .paginate_button {
	padding: 0;
	margin-left: -2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
	background: none;
	border-color: transparent;
}


table.dataTable thead th {
	background-image: none !important;
}


table.dataTable thead th::after {
	font-family: "FontAwesome";
	display: inline-block;
	margin-left: 10px;
	opacity: 0.75;
}
table.dataTable thead th.sorting::after {
	content: "\f0dc";
}
table.dataTable thead th.sorting_asc::after {
	content: "\f0de";
}
table.dataTable thead th.sorting_desc::after {
	content: "\f0dd";
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 13px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 6px 11px;
    margin-left: -2px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    border: 1px solid #37a000;
    background-color: #37a000;
    /* background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc)); */
    /* background: -webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%); */
    background: -moz-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: -ms-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: -o-linear-gradient(top, #37a000 0%, #37a000 100%);
    background: linear-gradient(to bottom, #37a000 0%, #37a000 100%);
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: #37a000 !important;
}
.bg-primary {
    color: #fff;
    background-color: #37a000 !important;
    border: 1px solid #000 !important;
}
table#dataTable{
  border: 1px solid #ddd;
}
input[type="search"] {
    border: none;
    border-bottom: 1px solid #969595;
    outline: none;
}
table#dataTable {
    max-width: 1150px !important;
    border: 1px solid #717171 !important;
    border-radius: 5px;
    overflow: hidden;
}
.dataTables_wrapper{
  width: 1150px;
  margin: 0 auto;
}
table.dataTable {
    border-collapse: inherit;
}
table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 1px solid #717171 !important ;
}


    </style>
</head>
<body>
    <?php include(ROOTACCESS."front_header.php");?>
<!-- Begin Content		-->

<h3 style="text-decoration: underline; " class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo "Newspaper";?></h3>
<div class="container">
<h3 style="text-decoration: underline;" class="tile-page-h2 text-center"><?php $string = $_REQUEST['meid'];
$string = str_replace ("_", " ", $string);
echo "Bills Dashboard" ;?></h3>   
    <!-- <div align="right" style="margin-right: 150px;">
    
         <button type="submit" class="btn btn-default " style="background-color: green;">
          <span class="glyphicon glyphicon-shopping-cart"></span> <span class='final_p'>  </span>
        </button>
       </div> -->
     <?php if(empty($ifSubscribed) && ($_SESSION['UR_LOGINID']!='') ){?>
<form method="post" name="subcribeForm" action="<?php echo SITE_URL;?>ebill_controller.php" onSubmit="return validateform();">
     <div class="checky-sec st2">
    <div class="fgt-sec">
      <label class="check-new-box">
      <input type="checkbox" id="subscribe_accept" name="subscribe_accept" value="1" required>
      <span class="checkmark"></span> </label>
      <small style="font-size: 16px;width: 100%;line-height: 25px;font-weight: 500;">Click to accept to enrol for digital bills and stop paper bills. Get digital copy
of your bills online and in your email. TnCs Apply. <a  target="_blank" href='<?php echo SITE_URL;?>/TNC_newspaper.php'> <strong style="color:#008000;">E-Bills Subscribtion</strong></a>.</small>
    </div>
  </div>
  <div class="btn-group" >
    
    <button type="submit" class="btn btn-success btn-sm" style='border-radius: 10px;' >Subscribe</button>
  </div>

</form>
<?php }?>
       
       <?php if($_REQUEST['actionResult']=="regsuccess"){?>
        <div class="alert alert-success">
          <span  id="divError">Thank you! Your Bill is paid successfully</span>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
       
       <?php } else if($_REQUEST['actionResult']=="regfail") {?>
        <div class="alert alert-danger">
          <span  id="divError">Payment not complete, Some error while sumitting your details.Try Again Later</span>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
       <?php }?>
       <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>RWAVendor/controller/bill_payment_controller.php" target="_blank" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="BillpaperModule">
                    <input type="hidden" name="billid" id="billid" value="">
    
    <hr/>
    
    <table class="table table-striped table-hover dt-responsive" id="dataTable">
      <caption class="sr-only">Table example</caption>
      
      <thead class="bg-primary">
        <tr>
         
          
          <th>Bill Date</th>
                  <th>Bill Amt.</th>
                 
                  <th>Amt Paid</th>
                  <th>Date Paid</th>
                  
                 
                 <th>Balance Due</th>
                  <th>Due Date</th>
                 
                  
                  
                    <th>Status</th>   
        </tr>
      </thead>
      <tfoot class="hidden">
         <tr>
            <th class="first" scope="col"><span class="fa fa-Billpaper-o" aria-hidden="true">&#160;</span></th>
      
 <th>Bill Date</th>
                  <th>Bill Amt.</th>
                 
                  <th>Amt Paid</th>
                  <th>Date Paid</th>
                  
                 
                 <th>Balance Due</th>
                  <th>Due Date</th>
                 
                  
                  
                    <th>Status</th>   
                    
        </tr>
      </tfoot>
      <tbody>
          
        <tr>
           <?php
          $i=0;
           foreach($getBillInfo as $value)
           
           
           {
               $i=$i+1;
            $ModelCall->where("bill_num",$value['bill_number']);

$ModelCall->orderBy("id","desc");
$getBillInfo = $ModelCall->get("tbl_bill_payment_details");   
$date =$getBillInfo[0]['date_received']

         ?>
          <!-- <td><?php echo $value['id'];?></td> -->
           
           
           
   
          <input type="hidden" name="bill_no" value="<?php echo $value['bill_number'];?>"></td>
            <td >
                 <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"> <?php echo dateformatchange($value['bill_date']);?></td></a>
                 <td align="right"> <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"><?php echo number_format($value['payable_amount'],2);?></td></a>
                  <td align="right"><a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank"> 
                  <?php if($value['bill_date'] < '2019-08-01') echo ""; 
else echo number_format($value['amt_paid'],2);?>
                  </td></a>
        <td> <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>"  target="_blank"> <?php if($date){echo dateformatchange($date);}?></td></a>
                
                   <td align="right"> <a  data-toggle="modal" data-target="#amountbreakup<?php echo $value['id'];?> " title='click to see breakup'>
<?php
if($value['bill_date'] < '2019-08-01') echo ""; 
else
  echo number_format($value['total_outstanding'],2);
  ?>
</a></td>
<?php include('amount_breakup.php');?>
                 <td> <a href="<?php echo SITE_URL;?>bills_view.php?bill_no=<?php echo $value['bill_number'];?>" target="_blank" > <?php echo dateformatchange($value['display_due_date']);?></td>
                 
           
     
         
                <input type="hidden" name="amt_<?php echo $value['bill_number'];?>" value="<?php echo $value['total_outstanding'];?>"></td>
                      <td> <?php if($i==1){if($value['total_outstanding']>0){?> <button  class="btn btn-success" name  ='paynow' type="submit" value='<?php echo $value['bill_number'];?>' onclick="assignValues('<?php echo $value['bill_number'];?>');"  style='border-radius: 10px; margin-top: -7%; margin-bottom: -7%;' >pay now</button><?php }?> 
<?php if($value['total_outstanding']<=0){echo "Paid"; }}
else{ $first_bill =0;echo "Expired";}?>
    </td>

        </tr>
        <?php  }?>
      </tbody>
    </table>
     
    </form>
<p>
    Please note that payments before 2019 are still in the process of being updated and the table may not reflect them accurately. However your current bill captures your total outstanding till date and you may use the same to pay your bill. 
 </p>
  </div>

  <!-- Modal-->
  
    <br> <br> 
<!------ Include the above in your HEAD tag ---------->
<?php include(ROOTACCESS."Advertisments.php");?>
<br>
</div>
 <?php include(ROOTACCESS."HomefooterCall.php");?>
  <script>  
    const $doc = $(document);
let $dataTable = $("#dataTable");
let $dropdownInput = $("select.form-control");
let $state = $("#state");
let $category = $("#category");
let $clear = $("#clear");
let $keyup = $.Event("keyup", { keyCode: 13 });

//Ready function
$doc.ready(function() {
	// Start DataTable
	$dataTable.DataTable({
		mark: true, // Highlight search terms
		search: {
			caseInsensitive: true
		},
		aLengthMenu: [
			// Show entries incrementally
			[20, 30, 50, -1],
			[20, 30, 50, "All"]
		],
		order: [[0, "asc"]] // Set State column sorting by default
	});

	

	
	
	// Remove BS small modifier
	$('select[name="dataTable_length"]').removeClass('input-sm');
	$('#dataTable_filter input').removeClass('input-sm');

	/*
	 * ADD INDIVIDUAL COLUMN SEARCH
	*/
	
	// Add a hidden text input to each footer cell
	$("#dataTable tfoot th").each(function() {
		var $title = $(this).text().trim();
		$(this).html('<div class="form-group" height: 50px; width: 10%;><label>Search ' + $title + ':<br/><input class="form-control" id="search' + $title + '" type="hidden"/></label></div>');
	});
	// Apply the search functionality to hidden inputs
	$dataTable
		.DataTable()
		.columns()
		.every(function() {
			var $that = this;
			$("input", this.footer()).on("keyup change", function() {
				if ($that.search() !== this.value) {
					$that.search(this.value, false, true, false).draw(); // strict search
				}
			});
		});
});

  </script>
  
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
