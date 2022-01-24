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
    <title>Document</title>
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
        <div class="container-fluid"style="margin: 0 auto; width:80%;">
        <div style='border-style: solid; border-width: thin;'>
	<div class="row">
	     
                      <div class="col-lg-6 no-pdd">
                         <div class="sn-field"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" width="20%"> </a>
                         </div>
                        </div>
                       
                 
		<div class="col-sm-12" align="center">
		    NIRVANA RESIDENTS WELFARE ASSOCIATION ( REGD)


		</div>
	</div>
		<div class="row">
		<div class="col-sm-12"align="center" >
		    Opp-Nirvana Courtyard, Nirvana Country South City-II, Sector 50, Gurugram – 122018
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12" align="center">
		    Phone :<a href="tel:+0124-4295885"> 0124-4295885</a>,<a href="tel:+0124-2211354"> 0124-2211354</a> E-Mail :<a href="mailto:office.nrwa@gmail.com" target="_top">office.nrwa@gmail.com </a>/ <a href="mailto:nirvanaaccnts01@gmail.com" target="_top">nirvanaaccnts01@gmail.com</a>
		</div>
	</div>
	</div>
	<div style='border-style: solid; border-width: thin;'>
	<div class="row">
		<div class="col-sm-12" align="center">
		    INVOICE FOR CAM, O & M SERVICES and NRWA SUBSCRIPTIONS (Revised)
		</div>
	</div>
	</div>
	<div style='border-style: solid; border-width: thin;'>
	<div class="row">
		<div class="col-sm-3">
		    Invoice No.
		</div>
		<div class="col-sm-3">
		    <?php echo $getBillInfo[0]['bill_number']; ?>
		</div>
		<div class="col-sm-3">
		    Dated
		</div>
		<div class="col-sm-3">
		    <?php echo dateformatchange($getBillInfo[0]['bill_date']); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
		    Unit No.
		</div>
		<div class="col-sm-3">
		    <?php echo "NRI-".$getBillInfo[0]['flat_no']."-".$getBillInfo[0]['floor_num'];?>
		</div>
		<div class="col-sm-3">
		    Area (SQ.YDS.)
		</div>
		<div class="col-sm-3">
		    <?php echo $getBillInfo[0]['bill_area']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
		    Name
		</div>
		<div class="col-sm-3">
		    <?php echo $getBillInfo[0]['member_name']; ?>
		</div>
		<div class="col-sm-3">
		    Resident GST No
</div>
		<div class="col-sm-3">
		    
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
		    Contact No
		</div>
		<div class="col-sm-3">
		    
		</div>
		<div class="col-sm-3">
		    Email
		</div>
		<div class="col-sm-3">
		    <?php echo $rec[0]['email']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
		    Address
		</div>
		<div class="col-sm-6">
		    
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table" border="1">
				<thead>
					<tr>
						<th>
							Billing Cycle Start 
						</th>
						<th>
							Billing Cycle end 
						</th>
							<th>
							Due Date
						</th>
						<th>
							Amount Before Due Date 
						</th>
						<th>
							Amount after Due Date
						</th>
					
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td>
						 <?php echo dateformatchange($getBillInfo[0]['start_period_date']); ?>   
						</td>
						<td>
						 <?php echo dateformatchange($getBillInfo[0]['end_period_date']); ?>   
						</td>
							<td>
						 <?php echo dateformatchange($getBillInfo[0]['display_due_date']); ?>   
						</td>
						<td>
						 <?php echo $getBillInfo[0]['payable_amount']; ?>   
						</td>
							<td>
						 <?php echo $getBillInfo[0]['payable_amount']; ?>   
						</td>
					
					
					</tr>
					
				</tbody>
			</table>
		</div>

	</div>
	
	<!--	<div class="row">
		<div class="col-sm-12">
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
		<div class="col-sm-12">
			<table class="table" border="1">
				<thead>
					<tr>
						<th>
							
                       Maintenance Charges
						</th>
						<th>
							Billed From 
						</th>
					<th>
							Billed To
						</th>
						<th>
						Duration in Months
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td>
							
						</td>
					<td>
						 <?php echo dateformatchange($getBillInfo[0]['start_period_date']); ?>   
						</td>
						<td>
						 <?php echo dateformatchange($getBillInfo[0]['end_period_date']); ?>   
						</td>
						<td>
						    3
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
	
	
			<div class="row">
		<div class="col-sm-12">
			<table class="table" border="1">
				<thead>
					<tr>
						<th>
							
                       S.No
						</th>
						<th>
							Details of heads for charges
						</th>
					<th>
						Unit
						</th>
						<th>
						Rate (INR)
						</th>
							<th>
						Amount (INR)
						</th>
					
					</tr>
				</thead>
				<tbody>
					<tr>
					    <td>
					   	01 
					</td>
					
						<td>
							CAM and O & M Services
						</td>
						<td>
							Sq.yds
						</td>
						<td>
						<?php echo $getBillInfo[0]['bill_area']; ?>
						</td>
						<td>
						  <?php echo $getBillInfo[0]['cam_o_m_services']; ?>
						</td>
					</tr>
					
						<tr><td>
					   	02 
					</td>
					
						<td>
							CGST at 9.0% on CAM and O & M Services
						</td>
						<td>
							Rs
</td>
						<td>
						
						</td>
						<td>
						<?php echo .09*$getBillInfo[0]['cam_o_m_services']; ?>
						</td>
					</tr>
					
						<tr><td>
					   	03 
					</td>
					
						<td>
						SGST  at 9.0% on CAM and O & M Services
						</td>
						<td>
							Rs
						</td>
						<td>
						
						</td>
						<td>
						 <?php echo .09*$getBillInfo[0]['cam_o_m_services']; ?>
						</td>
					</tr>
					
						<tr><td>
					   	04 
					</td>
					
						<td>
						Reimbursement of Diesel Cost for Running DG Sets, at 3.0 KWH /Ltr (3 Months).
						</td>
						<td>
						KWH
						</td>
						<td>
					
						</td>
						<td>
						 <?php echo $getBillInfo[0]['diesel_cost']; ?>
						</td>
					</tr>
					
						<tr><td>
					   	05
					</td>
					
						<td>
							CGST at 9.0% on  Diesel Cost
						</td>
						<td>
						
						</td>
						<td>
						
						</td>
						<td>
						   <?php echo .09*$getBillInfo[0]['diesel_cost']; ?>
						</td>
					</tr>
					
						<tr><td>
					   	06
					</td>
					
						<td>
							SGST at 9.0%  on  Diesel Cost
						</td>
						<td>
						
						</td>
						<td>
						
						</td>
						<td>
						  <?php echo .09*$getBillInfo[0]['diesel_cost']; ?>
						</td>
					</tr>
					
					
						<tr><td>
					   	07
					</td>
					
						<td>
							Reimbursement of Sewer Charges (Huda) for Oct to Dec-17      
						</td>
						<td>
							Sq.yds
						</td>
						<td>
					<?php echo $getBillInfo[0]['bill_area']; ?>
						</td>
						<td>
						  <?php echo $getBillInfo[0]['utility_charge']; ?>
						</td>
					</tr>
					
						<tr><td>
					   	08
					</td>
					
						<td>
								
Total Bill Amount for this quarter
						</td>
						<td>
					
						</td>
						<td>
						
								</td>
						<td>
						    	<?php echo $getBillInfo[0]['total']; ?>


						</td>
					</tr>
					
					
							<tr><td>
					   	09
					</td>
					
						<td>
								
Total Previous Outstanding till Sep -2017
						</td>
						<td>
					
						</td>
						<td>
						
								</td>
						<td>
						 <?php echo $getBillInfo[0]['total']; ?>


						</td>
					</tr>
						
							<tr><td>
					   	10  
					</td>
					
						<td>
								
	
TOTAL PAYABLE NOW before Due Date
						</td>
						<td>
					
						</td>
						<td>
						
								</td>
						<td>
						  <?php echo $getBillInfo[0]['total']; ?>


						</td>
					</tr>
						
							<tr><td>
					   	11
					</td>
					
						<td>
								
Surcharge for Late Payment
						</td>
						<td>
					
						</td>
						<td>
						
								</td>
						<td>
423

						</td>
					</tr>
						
							<tr><td>
					   	12
					</td>
					
						<td>
								
Payment due, if not paid by Due Date, TO BE TRANSFERRED TO NEXT Invoice
						</td>
						<td>
					Payment due, if not paid by Due Date, TO BE TRANSFERRED TO NEXT Invoice
				<br>	
						</td>
						<td>
						<form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>RWAVendor/controller/bill_payment_controller.php" target="_blank" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="BillpaperModule">
                    <input type="hidden" name="bill_no" id="bill_no" value="<?php echo $getBillInfo[0]['bill_number']; ?>">
                     <input type="hidden" name="amt_<?php echo $getBillInfo[0]['bill_number'];?>" value="<?php echo $getBillInfo[0]['total_outstanding'];?>">
                       <?php if($getBillInfo[0]['total_outstanding']>0){?> <button  class="btn btn-success" name  ='paynow' type="submit" value='1' onclick="assignValues('<?php echo $getBillInfo[0]['bill_number'];?>');"  style='border-radius: 10px;' >pay now</button><?php }?> 
<?php if($getBillInfo[0]['total_outstanding']==0){echo "Paid"; }?>
                    </form>
								</td>
						<td>
						  <?php echo $getBillInfo[0]['total']; ?>


						</td>
					</tr>
					</tbody>
			</table>
		</div>

	</div>

								<div class="row">
		<div class="col-sm-12">
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