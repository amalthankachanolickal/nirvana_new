<?php include('model/class.expert.php');


if(isset($_REQUEST['bill_no'])){
    $bill_id=$_REQUEST['bill_no'];
    
        
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

$ModelCall->where("bill_number",$bill_id);
$getBillInfo = $ModelCall->get("tbl_billing_new");

// echo "<pre>";
// var_dump($getNewsBillInfo);
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
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nirwana Bill View</title>
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
    max-width: 1000px !important;
    border: 1px solid #717171 !important;
    border-radius: 5px;
    overflow: hidden;
}
.dataTables_wrapper{
  width: 1000px;
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
        <div class="container-fluid"style="margin:auto; width:80%;  ">
        <div  >
	<div class="row" >
	     
                      <div class="col-lg-6 no-pdd">
                         <div class="sn-field"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" width="20%"> </a>
                         </div>
                        </div>
                       
                 
		<div class="col-md-12" align="center">
		    NIRVANA RESIDENTS WELFARE ASSOCIATION (REGD)


		</div>
	</div>
		<div class="row">
		<div class="col-md-12"align="center" >
		    Opp-Nirvana Courtyard, Nirvana Country South City-II, Sector 50, Gurugram – 122018
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" align="center">
		    Phone :<a href="tel:+9191244295885">+9191244295885</a> E-Mail :<a href="mailto:office.nrwa@nirvanacountry.co.in" target="_top">office.nrwa@nirvanacountry.co.in</a>/ 
		    <a href="mailto:office.nrwa@gmail.com" target="_top">office.nrwa@gmail.com</a>
		</div>
	</div>
	</div>
	<div>
	<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12" align="center">
		    INVOICE FOR CAM, O & M SERVICES and NRWA SUBSCRIPTIONS
		</div>
	</div>
	</div>
	<div >
<!--	<div class="row">
		<div class="col-md-3">
		    Invoice No.
		</div>
		<div class="col-md-3">
		    <?php echo $getBillInfo[0]['bill_number']; ?>
		</div>
		<div class="col-md-3">
		    Dated
		</div>
		<div class="col-md-3">
		    <?php echo dateformatchange($getBillInfo[0]['bill_date']); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		    Unit No.
		</div>
		<div class="col-md-3">
		    <?php echo "NRI-".$getBillInfo[0]['flat_no']."-".$getBillInfo[0]['floor_num'];?>
		</div>
		<div class="col-md-3">
		    Area (SQ.YDS.)
		</div>
		<div class="col-md-3">
		    <?php echo $getBillInfo[0]['bill_area']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		    Name
		</div>
		<div class="col-md-3">
		    <?php echo $getBillInfo[0]['member_name']; ?>
		</div>
		<div class="col-md-3">
		    Resident GST No
</div>
		<div class="col-md-3">
		    
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		    Contact No
		</div>
		<div class="col-md-3">
		    
		</div>
		<div class="col-md-3">
		    Email
		</div>
		<div class="col-md-3">
		    <?php echo $rec[0]['email']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		    Address
		</div>
		<div class="col-md-6">
		    
		</div>
	</div>
	</div> -->
		<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" style="border: none;">
			<tbody>
					<tr>
						
						<td>
						 GSTIN   
						</td>
						<td>
						<?php echo $getBillInfo[0]['gst_in']; ?>    
						</td>
							<td>
						INVOICE DATE  
						</td>
						<td>
						  <?php echo dateformatchange($getBillInfo[0]['bill_date']); ?>     
						</td>
						
					
					
					</tr>
					
					<tr>
						
						<td>
						  PAN No.   
						</td>
						<td>
					<?php echo $getBillInfo[0]['pan_no']; ?>     
						</td>
							<td>
						INVOICE NO.  
						</td>
						<td>
						 <?php echo $getBillInfo[0]['bill_number']; ?>   
						</td>
						
					
					
					</tr>
					
					<tr>
						
						<td>
						  REVERSE CHARGE   
						</td>
						<td>
						- NA 
						</td>
							<td>
						DUE DATE  
						</td>
						<td>
						 <?php echo dateformatchange($getBillInfo[0]['display_due_date']); ?>  
						</td>
						
					
					
					</tr>
					
							<tr>
						
						<td>
						   
						</td>
						<td>
						
						</td>
							<td>
						PAYMENT AFTER DUE DATE
						</td>
						<td>
						 <?php echo $getBillInfo[0]['pay_after_due']; ?>   
						</td>
						
					
					
					</tr>
					
				</tbody>
			</table>
		</div>

	</div>
	<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" style="border: none;">
			<tbody>
					<tr>
						
						<td>
						 INVOICE TO    
						</td>
						<td>
						<?php echo $getBillInfo[0]['member_name']; ?>    
						</td>
					
						
					
					
					</tr>
					
					<tr>
						
						<td>
						  UNIT NO.   
						</td>
						<td>
					<?php echo $getBillInfo[0]['flat_no']; ?>     
						</td>
						</tr>
						<tr>
							<td>
					ADDRESS 
						</td>
						<td>
						 <?php echo $getBillInfo[0]['address']; ?>   
						</td>
						
					
					
					</tr>
					
					<tr>
						
						<td>
						   AREA SQ. YDS   
						</td>
						<td>
						 <?php echo $getBillInfo[0]['bill_area']; ?>  
						</td>
						</tr>
						<tr>
							<td>
					 MOBILE NO. : 
						</td>
						<td>
						 <?php echo $getBillInfo[0]['mob_no']; ?>  
						</td>
						
					
					
					</tr>
					
							<tr>
					
							<td>
						 E-MAIL :
						</td>
						<td>
						 <?php echo $getBillInfo[0]['email']; ?>   
						</td>
						
					
					
					</tr>
					
				</tbody>
			</table>
		</div>

	</div>
	
		<div class="row">
		<div class="col-md-12">
			<table class="table" border="1">
		
				<tbody>
					<tr>
						
						<td colspan="6" align="center">
			Bill Period : <?php echo dateformatchange($getBillInfo[0]['start_period_date']); ?> TO <?php echo dateformatchange($getBillInfo[0]['end_period_date']); ?>
						</td>
			
					
				</tr>
					<tr>
						
						<td colspan="2" align="center">
DG Prev. Readings: <?php echo $getBillInfo[0]['dg_prev_reading']; ?>   						</td>
				
					<td colspan="2" align="center">
						DG Current Readings:  <?php echo $getBillInfo[0]['dg_current_reading']; ?>   
						</td>
			<td colspan="2" align="center">
					DG Consumed Readings : 	<?php echo $getBillInfo[0]['dg_consumed_reading']; ?>   
						</td>
				</tr>
					<tr>
						
							<td colspan="3" align="center">
						Prev. Readings DATE: <?php echo $getBillInfo[0]['dg_pre_reading_date']; ?>   
						</td>
						<td colspan="3" align="center">
						Current Readings DATE:  <?php echo $getBillInfo[0]['dg_current_reading_date']; ?>   
						</td>
	
				</tr>
						<tr>
						
						<td colspan="3" align="center">
						 Sanc. Grid LOAD(KW): <?php echo $getBillInfo[0]['sanc_grid_load']; ?>   
						</td>
					<td colspan="3" align="center">
					      Sanc. DG LOAD :  <?php echo $getBillInfo[0]['sanc_dg_load']; ?>   
						</td>
						
					
					
					
					</tr>
					
				</tbody>
			</table>
		</div>

	</div>
	
	
	
	

	
	<!--	<div class="row">
		<div class="col-md-12">
			<table class="table" border="1">
				<thead>
					<tr>
						<th>
							
                       DG Power Reading  Dates
						</th>
						<th>
							Previous Readin(01/04/2012)
						</th>
					<th>
							Current Reading (01/04/2012)
						</th>
						<th>
						DG Power Consumption, KW
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td>
							Readings
						</td>
						<td>
							3000
						</td>
						<td>
							1000
						</td>
						<td>
						    33
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div> -->

	
	
			<div class="row">
		<div class="col-md-12">
			<table class="table" border="1">
				<thead>
					<tr>
					
						<th>
							Description of Services
						</th>
					<th>
						Unit
						</th>
						<th>
						Rate (INR)
						</th>
						<th>
						Rebate
						</th>
						<th>
					 Net Rate
						</th>
							<th>
						Amount (INR)
						</th>
					
					</tr>
				</thead>
				<tbody>
					<tr>
					   
					
						<td>
							CAM and O & M Services
						</td>
						<td style="text-align:right">
							<?php echo number_format((float)$getBillInfo[0]['cam_unit'], 2);
							 ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['cam_rate'], 2);
							 ?>
						<?php // echo $getBillInfo[0]['cam_rate']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['cam_rebate'], 2);
							 ?>
						  <?php //echo $getBillInfo[0]['cam_rebate']; ?>
						</td>
							<td style="text-align:right">
							<?php echo number_format((float)$getBillInfo[0]['cam_net_rate'], 2);
							 ?>
						<?php //echo $getBillInfo[0]['cam_net_rate']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['cam_o_m_services'], 2);
							 ?>
						  <?php // echo $getBillInfo[0]['cam_o_m_services']; ?>
						</td>
					</tr>
					
						<tr>
					
						<td>
						Reimbursement of Diesel Cost for Running DG Sets, at 3.0 KWH /Ltr (3 Months).
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['deisel_unit'], 2);
							 ?>
							<?php // echo $getBillInfo[0]['deisel_unit ']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['deisel_rate'], 2);
							 ?>
						<?php // echo $getBillInfo[0]['deisel_rate']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['deisel_rebate'], 2);
							 ?>
						  <?php // echo $getBillInfo[0]['deisel_rebate']; ?>
						</td>
							<td style="text-align:right">
							<?php echo number_format((float)$getBillInfo[0]['deisel_net_rate'], 2);
							 ?>
						<?php // echo $getBillInfo[0]['deisel_net_rate']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['diesel_cost'], 2);
							 ?>
						  <?php // echo $getBillInfo[0]['diesel_cost']; ?>
						</td>
					</tr>
					
						<tr>
					
						<td>
					Utility Charge (Water +Sewer +Common Electricity (3 Months).
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['utility_unit'], 2);
							 ?>
							<?php //echo $getBillInfo[0]['utility_unit ']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['utility_rate'], 2);
							 ?>
						<?php //echo $getBillInfo[0]['utility_rate']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['utility_rebate'], 2);
							 ?>
						  <?php //echo $getBillInfo[0]['utility_rebate']; ?>
						</td>
							<td style="text-align:right">
							<?php echo number_format((float)$getBillInfo[0]['utility_net_rate'], 2);
							 ?>
						<?php //echo $getBillInfo[0]['utility_net_rate']; ?>
						</td>
						<td style="text-align:right">
						<?php echo number_format((float)$getBillInfo[0]['utility_charge'], 2);
							 ?>
						  <?php //echo $getBillInfo[0]['utility_charge']; ?>
						</td>
					</tr>
					
						<tr>
						    
						    <td colspan="5">
						         CGST @9%
						    </td>
						    <td colspan="1" style="text-align:right">
						        <?php echo(number_format((float)$getBillInfo[0]['cgst'], 2)); ?>
						    </td>
					</tr>
					<tr>
						    
						    <td colspan="5">
						         SGST @9%
						    </td>
						    <td colspan="1" style="text-align:right">
							<?php echo(number_format((float)$getBillInfo[0]['sgst'], 2));  ?>
						    </td>
					</tr>
					
					
					
						<tr>
						    
						    <td colspan="5">
						         Payable Now Before Due Date
						    </td>
						    <td colspan="1" style="text-align:right">
						        <?php echo (number_format((float)$getBillInfo[0]['total'], 2)); ?>
						    </td>
					</tr>
						<tr>
						    
						    <td colspan="5">
						          Total Prev. O/s till Last Month<span style="color:red">*</span>
						    </td>
						    <td colspan="1" style="text-align:right">
 <?php echo (number_format((float)$getBillInfo[0]['total_pre_os_last_month'], 2)); ?>
 </td>
					</tr>
					<tr>
						    
						    <td colspan="5">
						           Surcharges for Late Payment
						    </td>
						    <td colspan="1" style="text-align:right">
 <?php echo (number_format((float)$getBillInfo[0]['interest'], 2)); ?>
 </td>
					</tr>
						<tr>
						    
						    <td colspan="4">
						          Payment Due, If not Paid by Due Date, To be transferred to next invoice
						    </td>
	<td colspan="1">
	<form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>RWAVendor/controller/bill_payment_controller.php" target="_blank" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="BillpaperModule">
                    <input type="hidden" name="bill_no" id="bill_no" value="<?php echo $getBillInfo[0]['bill_number']; ?>">
                     <input type="hidden" name="amt_<?php echo $getBillInfo[0]['bill_number'];?>" value="<?php echo $getBillInfo[0]['total_outstanding'];?>">
                       <?php if($getBillInfo[0]['total_outstanding']>0){?> <button  class="btn btn-success" name  ='paynow' type="submit" value='<?php echo $getBillInfo[0]['bill_number']; ?>' onclick="assignValues('<?php echo $getBillInfo[0]['bill_number'];?>');"  style='border-radius: 10px;' >pay now</button><?php }?> 
<?php if($getBillInfo[0]['total_outstanding']<=0){echo "Paid"; }?>
                    </form>
 </td>
						    <td colspan="1" style="text-align:right">
 <?php //echo (number_format((float)$getBillInfo[0]['pay_to_next_invoice'], 2));
 echo (number_format((float)$getBillInfo[0]['total_outstanding'], 2)); ?>
 </td>
					</tr>
					<tr>
					    <td colspan="6">
					        1) Cheque has to make in favor of NIRVANA RWA MAINTENENCE A/C
					    </td>
					</tr>
						<tr>
					    <td colspan="6">
					       2) For NEFT/IMPS : Name : Nirvana RWA Maintenence A/C Account no. 184301000717, IFSC Code ICIC0001843
					    </td>
					</tr>
					<tr>
					    <td colspan="6">
					 NOTE : PLEASE SHARE YOUR NEFT/IMPS DETAILS ON OUR EMAIL :office.nrwa@nirvanacountry.co.in , OR
					    </td>
					</tr>
					<tr>
					    <td colspan="6">
					    FILL YOUR HOUSE NO. IN THE REMARKS DURING MAKING ONLINE PAYMENT.
					    </td>
					</tr>
				
			</table>
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table" border="1">
				<thead>
					<tr>
						<th>
							
                       Cheque in favour of
						</th>
								<th>
				Bank
						</th>
							<th>
				Account No.
						</th>
					<th>
							PAN
						</th>
						<th>
					GST Regn. No.
						</th>
				
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td>
							Nirvana RWA Maintenance A/C
						</td>
						<td>
							ICICI Bank Ltd.
						</td>
						<td>
							184301000717
						</td>
						<td>
						    AABAN0141M
						</td>
						<td>
						  06AABAN0141M1ZT
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
					
					
				</tbody>
			</table>
		</div>
		
	</div>
	
</div>
<?php include(ROOTACCESS."Advertisments.php");?>
    </body>
</html>