<?php
include('model/class.expert.php');

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    // if (null !== $fraction && is_numeric($fraction)) {
    //     $string .= $decimal;
    //     $words = array();
    //     foreach (str_split((string) $fraction) as $number) {
    //         $words[] = $dictionary[$number];
    //     }
    //     $string .= implode(' ', $words);
    // }

    return $string;
}

if(isset($_REQUEST['bill_no'])){
    $bill_id=$_REQUEST['bill_no'];
        
}else {
	$bill_id='';
	echo "Bill No empty";
	exit(0);
}
 
$ModelCall->where("bill_number",$bill_id);
$getBillInfo = $ModelCall->get("tbl_billing_new");


if(count($getBillInfo)==0){
   echo "No Bill Info Found";
	exit(0);
}

if($getBillInfo[0]['sanc_grid_load']==''){
    $getBillInfo[0]['sanc_grid_load']=0;
}
if($getBillInfo[0]['sanc_dg_load']==''){
    $getBillInfo[0]['sanc_dg_load']=0;
}

if($getBillInfo[0]['dg_current_reading_date']=='0000-00-00'){
    $getBillInfo[0]['dg_current_reading_date']="-";
}else{
   $getBillInfo[0]['dg_current_reading_date']= date('d-m-Y', strtotime($getBillInfo[0]['dg_current_reading_date']));
}

if($getBillInfo[0]['dg_pre_reading_date']=='0000-00-00'){
    $getBillInfo[0]['dg_pre_reading_date']="-";
}else{
   $getBillInfo[0]['dg_pre_reading_date']= date('d-m-Y', strtotime($getBillInfo[0]['dg_pre_reading_date']));
}



$unit_num = $getBillInfo[0]['flat_no'];
$ModelCall->where("unit_num",$unit_num);
$ModelCall->orderBy("id","desc");
$getBillLastPaid = $ModelCall->getOne("tbl_bill_payment_details");



// include autoloader
require_once 'dompdf/autoload.inc.php';
$path = 'https://nirvanacountry.co.in/nirwana-img/logo-01.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
//print_r($data);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('isHtml5ParserEnabled', true);
// Load content from html file 
$html='<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nirwana Bill View</title>
    </head>
    <style>
    body {
    color: #000;
   // font-weight: 200;
    width: 100%;
    height: 100%;
    font-size: 11px;
     line-height: 1.6;
    font-family: \'Open Sans\', sans-serif;
    }
    a {
    color: blue;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   // padding: 2px;
  //  line-height: 1.7;
    vertical-align: middle;
  // border: 1px solid ;
    }
    border-vis{
     border: 1px solid;   
    }
    .btn{
    display: inline-block;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 0px;
    transition: 0.3s;
    -moz-transition: 0.3s;
    -webkit-transition: 0.3s;
    color: #fff;
    text-color: #fff;
    border: 1px solid #fff;
    text-transform: capitalize;
    letter-spacing: 1px;
    background-color: #5cb85c;
}
.page-break {
    page-break-after: always;
}
.button::-moz-focus-inner{
  border: 0;
  padding: 0;
}

.button{
  display: inline-block;
  *display: inline;
  zoom: 1;
  padding: 6px 20px;
  margin: 3;
  cursor: pointer;
  border: 1px solid #bbb;
  overflow: visible;
  font: bold 13px arial, helvetica, sans-serif;
  text-decoration: none;
  white-space: nowrap;
  color: #FFF;
  
  background-color: #ddd;
  background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,1)), to(rgba(255,255,255,0)));
  background-image: -webkit-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: -moz-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: -ms-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: -o-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  background-image: linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
  
  -webkit-transition: background-color .2s ease-out;
  -moz-transition: background-color .2s ease-out;
  -ms-transition: background-color .2s ease-out;
  -o-transition: background-color .2s ease-out;
  transition: background-color .2s ease-out;
  background-clip: padding-box; /* Fix bleeding */
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
  -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
  box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
  text-shadow: 0 1px 0 rgba(255,255,255, .9);
  
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* */

.button.green{
  background-color: #37A000;
  border-color: #37A000;
}

.button.green:hover{
  background-color: #62c462;
}

.button.green:active{
  background: #37A000;
}

/* */

</style>
<body>
    <div class="container-fluid" style="margin: 0 auto; width:96%;">
    <br><br>
        <div style="border-style: solid; border-width: thin;">
	        <div class="row" >
	         <!--   <div class="col-lg-6 no-pdd">
                     <div class="sn-field">
                        <a href="https://nirvanacountry.co.in/"><img src="<?php echo $base64?>" width="150"> </a>
                     </div>
                </div>-->
                <div class="col-md-12" style="text-align: center; font-size:18px">
		      <u>   NIRVANA RESIDENTS WELFARE ASSOCIATION (REGD)</u>
	            </div>
	        </div>
		    <div class="row">
		        <div class="col-md-12"  style="text-align: center;font-size:14px">
		        Opp-Nirvana Courtyard, Nirvana Country, South City-II, Sector 50, Gurugram – 122018
		        </div>
	        </div>
	        <div class="row">
		        <div class="col-md-12"  style="text-align: center;">
		         Phone : 0124-4295885, 0124-2211354 E-Mail : <a href="mailto:office.nrwa@nirvanacountry.co.in" target="_top">office.nrwa@nirvanacountry.co.in</a>
		        <br> <br>
		        </div>
	        </div>
	    </div>
	<div>
	<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12" style="text-align: center;">
		    INVOICE FOR CAM, O & M SERVICES and NRWA SUBSCRIPTIONS<br>
	
		</div>
	</div>
</div>
<div>
    <div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" style="border: none; font-size:11px" width="100%">
			<tbody>
					<tr>
						<td style="padding-left:5px"><b> GSTIN : </b></td>
						<td>'. $getBillInfo[0]['gst_in'].'</td>
						<td NOWRAP style="padding-left:5px">INVOICE DATE : </td>
						<td> '.date('d-m-Y',strtotime($getBillInfo[0]['bill_date'])).' </td>
					</tr>
					<tr>
						<td style="padding-left:5px"> PAN NO :  </td>
						<td> '. $getBillInfo[0]['pan_no'].' </td>
						<td style="padding-left:5px">INVOICE NO :  </td>
						<td> '. $getBillInfo[0]['bill_number'].' </td>
					</tr>
					<tr>
						<td style="padding-left:5px">  REVERSE CHARGE :   </td>
						<td>- NA  </td>
						<td style="padding-left:5px"> <b>DUE DATE :</b>  </td>
						<td> <b>'. date('d-m-Y',strtotime($getBillInfo[0]['display_due_date'])).'</b>	</td>
					</tr>
				
				</tbody>
			</table>
		</div>
	</div>
	<div class="row" style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" style="border: none;" width="100%">
			<tbody>
					<tr>
						<td style="padding-left:5px"  width="130px"> INVOICE TO :   </td>
						<td> '. $getBillInfo[0]['member_name'].'    </td>
						<td rowspan="6" width="150px" style="border-left: 2px solid; padding-left:25px; vertical-align:middle;">  <a href="https://nirvanacountry.co.in/"><img src="/home2/innovzzy//public_html/nirvanacountry.co.in/nirwana-img/logo-01.png" width="120" alt="Ctrl Click"> </a></td>
					</tr>
					
					<tr>
						<td style="padding-left:5px"> UNIT NO :   </td>
						<td> '. str_replace("DW","DC",$getBillInfo[0]['flat_no']).'    </td>
					</tr>
					<tr>
						<td style="padding-left:5px"> ADDRESS :</td>
						<td> Nirvana Country, Sec 50, Gurugram 122018</td>
					</tr>
					
					<tr>
						<td style="padding-left:5px">   AREA SQ. YDS :  </td>
						<td>	'. $getBillInfo[0]['bill_area'].' 	</td>
                    </tr>
                    
					<tr>
						<td style="padding-left:5px"> MOBILE NO. : 	</td>
						<td> '. $getBillInfo[0]['mob_no'].' </td>
                    </tr>
                    
					<tr>
					    <td style="padding-left:5px"> E-MAIL :	</td>
						<td> '. $getBillInfo[0]['email'].' 	</td>
					</tr>
					
				</tbody>
			</table>
		</div>
    </div>

	<div class="row"  style="border-style: solid; border-width: thin;">
		<div class="col-md-12">
			<table class="table" width="100%" cellpadding=0 cellspacing=0>
		    	<tbody>
					<tr>
						<td colspan="6" style="text-align:center;border: 2px solid;"><b> Bill Period : '.  date('d-m-Y', strtotime($getBillInfo[0]['start_period_date'])).' To '.  date('d-m-Y',strtotime($getBillInfo[0]['end_period_date'])).' </b> 
							
					</td>
			        </tr>
					<tr>
						<td colspan="2" style="text-align: center;border: 2px solid;"> DG Prev. Readings: '. $getBillInfo[0]['dg_prev_reading'].'   </td>
				        <td colspan="2" style="text-align: center;border: 2px solid;"> DG Current Readings:  '. $getBillInfo[0]['dg_current_reading'].'   </td>
                         <td colspan="2" style="text-align: center;border: 2px solid;"> DG Consumed Readings : '. $getBillInfo[0]['dg_consumed_reading'].' 	   </td>
				    </tr>
					<tr style="text-align: center;border: 2px solid;">
						<td colspan="3" style="text-align: center;border: 2px solid;">Prev. Readings Date: '.$getBillInfo[0]['dg_pre_reading_date'].'   </td>
						<td colspan="3" style="text-align: center;border: 2px solid;">Current Readings Date:  '.$getBillInfo[0]['dg_current_reading_date'].'   </td>
				    </tr>
					<tr style="text-align: center;border: 2px solid;">
						<td colspan="3" style="text-align: center;border: 2px solid;"> Sanc. Grid Load(KW):  '. $getBillInfo[0]['sanc_grid_load'].' KW  </td>
					    <td colspan="3" style="text-align: center;border: 2px solid;">Sanc. DG Load :   '. $getBillInfo[0]['sanc_dg_load'].' KVA  </td>
					</tr>
					
				</tbody>
			</table>
		</div>
    </div>

	<div class="row">
		<div class="col-md-12">
			<table class="table" cellpadding=0 cellspacing=0  style="border-style: solid; border-width: thin;" width="100%">
				<thead>
					<tr>
					    <th style="text-align: center;border: 2px solid;">Description Of Services <br></th>
					    <th style="text-align: center;border: 2px solid;">Units  <br> </th>
						<th style="text-align: center;border: 2px solid;">Rate  <br> </th>
						<th style="text-align: center;border: 2px solid;">Rebate  <br> </th>
						<th style="text-align: center;border: 2px solid;">Net Rate  <br> </th>
						<th style="text-align: center;border: 2px solid;">Amount <br> Payable (INR)</th>
					
					</tr>
				</thead>
				<tbody>
					<tr>
					   <td style="border: 2px solid; padding-left:5px">CAM And O & M Services</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['cam_unit'],2).'  </td>
						<td  style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['cam_rate'],2).'  </td>
						<td  style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['cam_rebate'],2).'  </td>
						<td  style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['cam_net_rate'],2).'  </td>
						<td  style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($getBillInfo[0]['cam_o_m_services'],2).'	</td>
					</tr>
					<tr>
					    <td style="border: 2px solid; padding-left:5px">
						Reimbursement of Diesel Cost For Running DG Sets, At 3.0 KWH /Ltr (3 Months).
						</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['deisel_unit'],2).'</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['deisel_rate'],2).'</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['deisel_rebate'],2).'</td>
						<td style="text-align: center; border: 2px solid;"> '. number_format($getBillInfo[0]['deisel_net_rate'],2).' </td>
						<td style="text-align: right; border: 2px solid;  padding-right:5px;">  '. number_format($getBillInfo[0]['diesel_cost'],2).'</td>
					</tr>
					
					<tr>
					    <td style="border: 2px solid; padding-left:5px">Utility Charge (Water +Sewer +Common Electricity (3 Months).</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($getBillInfo[0]['utility_unit'],2).'</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($getBillInfo[0]['utility_rate'],2).'</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($getBillInfo[0]['utility_rebate'],2).'</td>
						<td style="text-align: center; border: 2px solid;">  '. number_format($getBillInfo[0]['utility_net_rate'],2).'</td>
						<td style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($getBillInfo[0]['utility_charge'],2).'</td>
					</tr>
					
					<tr>
                        <td colspan="5" style="border: 2px solid; padding-left:5px"> CGST @9% </td> 
                        <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;">  '. number_format($getBillInfo[0]['cgst'],2).'</td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px">  SGST @9% </td>
						<td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;">  '. number_format($getBillInfo[0]['sgst'],2).'	 </td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px"><b> Payable Now Before Due Date </b></td>
						 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($getBillInfo[0]['total'],2).'</td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px">   Total Prev. O/s Till Last Month </td>
						<td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;">'. number_format($getBillInfo[0]['arrears'],2).'</td>
					</tr>
					<tr> 
						<td colspan="5" style="border: 2px solid; padding-left:5px"> Surcharges For Late Payment</td>
						 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"> '. number_format($getBillInfo[0]['interest'],2).' </td>
					</tr>
					<tr>
						<td colspan="5" style="border: 2px solid; padding-left:5px"><b>Payment Due, If Not Paid By Due Date, To Be Transferred To Next Invoice </b>  </td>
				
						 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"><a  href="https://nirvanacountry.co.in/bills.php" target="_blank"> '. number_format($getBillInfo[0]['payable_amount'],2).'</a></td>
					</tr>
					<tr>
					<td colspan="5" style="border: 2px solid; padding-left:5px"><b>PAYMENT AFTER DUE DATE ('. date('d-m-Y',strtotime($getBillInfo[0]['display_due_date'])).') </b>  </td>
			
					 <td colspan="1" style="text-align: right; border: 2px solid;  padding-right:5px;"><b> '. number_format($getBillInfo[0]['pay_after_due'],2).'</b></td>
					</tr>
					<tr>
					    <td colspan="5" style="border: 2px solid; padding-left:5px">
					   <b> Amount In Words: Rupees '. ucwords(convert_number_to_words($getBillInfo[0]['payable_amount'])).' Only</b>
					    </td>
					      <td colspan="1" style="text-align: center; border: 2px solid; padding-right:5px;">';
					      if($getBillInfo[0]['total_outstanding'] > 0){
					 $html=$html.' <a  class="green button"  href="https://nirvanacountry.co.in/bills.php"  target="_blank">Pay Now</a>';
					      }
					  
                        $html=$html.' </td>
					</tr>
				
                    </tbody>
                </table>
              	</div>
    </div>
    <div class="row">
		<div class="col-md-12">
                <table class="table"  style="border-style: solid; border-width: thin; line-height:1.5" width="100%">
					<tr>
					    <td colspan="6">
					        1) Cheque has to be made in favour of <b>NIRVANA RWA MAINTENANCE A/C</b>
					    </td>
					</tr>
					
						<tr>
					    <td colspan="6">
					       2) <a  href="https://nirvanacountry.co.in/bills.php" target="_blank">For NEFT/IMPS  : Name : Nirvana RWA Maintenance A/C  <br>
					       Account no. 184301000717, IFSC Code ICIC0001843 </a>
					    </td>
					</tr>
				
					<tr>
					    <td colspan="6">
					 NOTE : PLEASE SHARE YOUR NEFT/IMPS DETAILS ON OUR EMAIL :<a href="mailto:office.nrwa@nirvanacountry.co.in" target="_blank">office.nrwa@nirvanacountry.co.in</a> , OR
					    </td>
					</tr>
					<tr>
					    <td colspan="6">
				<b>	  FILL YOUR HOUSE NO. IN THE REMARKS DURING MAKING ONLINE PAYMENT.</b>
					    </td>
					</tr>
				
			</table>
		</div>
    </div>
    <br>
    Last Month Payment Details
    <br><br>
	<div class="row">
		<div class="col-md-12">
			<table class="table"  style="border-style: solid; border-width: thin;" width="100%" cellpadding=0 cellspacing=0>
					<tbody>
					<tr>
                        <td style="text-align: center;border: 2px solid;" width="400px">Name</td>
                        <td  style="text-align: center;border: 2px solid;">'. $getBillInfo[0]['member_name'].'</td>
                        <td  style="text-align: center;border: 2px solid;">Flat No: </td>
                        <td  style="text-align: center;border: 2px solid;">'. str_replace("DW","DC",$getBillInfo[0]['flat_no']).'  	</td>
                        
				    </tr>
				    <tr style="background-color:#CCCCCC">
                        <td style="text-align: center;border: 2px solid;">Cheque/DD No.:</td>
                        <td  style="text-align: center;border: 2px solid;">Dated</td>
                        <td  style="text-align: center;border: 2px solid;">Type </td>
                        <td  style="text-align: center;border: 2px solid;">Amount	</td>
                        
				    </tr>';
				    
				    if(count($getBillLastPaid)>0){
				
			
					$html= $html.'<tr>
						<td style="text-align: center;border: 2px solid;">'. substr($getBillLastPaid['pay_ref'],0,50).' </td>
						<td style="text-align: center;border: 2px solid;">'. date('d-m-Y', strtotime($getBillLastPaid['date_received'])).' </td>
						<td style="text-align: center;border: 2px solid;">'. $getBillLastPaid['payment_mode'].' 	</td>
						<td style="text-align: center;border: 2px solid;"> '. number_format($getBillLastPaid['amount_received'],2).' </td>
					</tr>';
					}else{
					  	$html= $html.'<tr>
						<td style="text-align: center;border: 2px solid;">-</td>
						<td style="text-align: center;border: 2px solid;">-</td>
						<td style="text-align: center;border: 2px solid;">-	</td>
						<td style="text-align: center;border: 2px solid;">-</td>
					</tr>';  
					};
					 $html= $html.'<tr style="background-color:#CCCCCC">
                        <td colspan=4 style="text-align: center;border: 2px solid;">NIRVANA RESIDENTS WELFARE ASSOCIATION (REGD), <br> Opp-Nirvana Courtyard, Nirvana Country, South City-II, Sector 50, Gurugram –
122018:</td>
                   
                        
				    </tr>
				</tbody>
			</table>
		</div>
	</div>
<div  style="text-align: center; font-size:14px"><br><br><b>Powered by <a  onclick="javascript:windows.open(\'https://nirvanacountry.co.in\',\'_blank\');">www.nirvanacountry.co.in</a> <br>
This is an electronically generated document, hence does not require signature</b></div>
	<br> <h3   style="text-align: center;">Important Terms & Conditions</h3>
		<div class="row">
		<div class="col-md-12">
				<table class="table"  style="border-style: solid; border-width: thin;" width="100%" cellpadding=0 cellspacing=0>
				<tr><td colspan="2"  style="text-align: center;border: 2px solid;padding-left:2px"><h3>NIRVANA RESIDENTS WELFARE ASSOCIATION</h3> <br>
<b>IMPORTANT TERMS AND CONDITIONS<br>(To be read with Invoice / Bills dated '.date('d-m-Y',strtotime($getBillInfo[0]['bill_date'])).')</b></td>
</tr>
<tr><td style="text-align:center;border: 2px solid;">1</td><td style="text-align:left;border: 2px solid;padding-left:2px"> For more than two quarter overdue accounts-some or all services will be withdrawn as per approved process.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">2</td><td style="text-align:left;border: 2px solid;padding-left:2px">Change / Modification of CAM charges for Villas which have made floors and rented them out were proposed as below
which was adopted and passed by the members in GBM Held on 14th Nov, 2018. 1 floor rented out – 1.5 times Villa CAM rate + utility rate for each floor as per applicable rates. 2 floors rented out – 2 times Villa CAM rate + Utility rate for each floor Example – villa with one floor rented out cam
would be
• Rs. 14 time sq. yard of villa + Rs. 4 Utility charge and Rs. 7 times sq. yard + Rs. 4 utility charge.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">3</td><td style="text-align:left;border: 2px solid;padding-left:2px">This invoice is to be considered as final notice for all Due / Overdue Invoices / Payments.

</td></tr>
<tr><td style="text-align:center;border: 2px solid;">4</td><td style="text-align:left;border: 2px solid;padding-left:2px">Full payment by Cheque / DD / Bank transfer only. All outstanding dues will attract surcharge and late fees as applicable.
Post dated cheques bearing date after Due date submitted will be treated as late Payments. Cash will not be accepted
against payments.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">5</td><td style="text-align:left;border: 2px solid;padding-left:2px">For online payment : To pay by NEFT/RTGS transfer to Nirvana RWA Maintenance account , Bank name : ICICI Bank , A/C no.
184301000717, IFSC code : ICIC0001843. Please write property number & contact details in remarks cell. You may also make
payment through <a href="https://nirvanacountry.co.in" >nirvanacountry.co.in</a> website .
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">6</td><td style="text-align:left;border: 2px solid;padding-left:2px">Upon non-realization / dis-honour of a cheque / DD for any reason, Rs. 400/- additional shall be chargeable towards bank
charges and handling costs. If the Bill is actually finally cleared after due date, surcharge and Late Payment fee as applicable will
also have to be paid.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">7</td><td style="text-align:left;border: 2px solid;padding-left:2px">Payment of this invoice is not a proof of ownership / title to the property occupied.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">8</td><td style="text-align:left;border: 2px solid;padding-left:2px">Timely Payment by you against your outstanding dues will help us pay the vendors in time to extract best services for
improvement of living conditions in NIRVANA.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">9</td><td style="text-align:left;border: 2px solid;padding-left:2px">In case of Sale, Renting or Moving Out by Landlord / Tenant – Please obtain an NOC from the NRWA Office. The NOC will
be available 7 days after the application and clearing of all dues of NRWA and an NOC from the Landlord. All are
requested to ensure that last minute Panic or humanitarian situation is not created.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">10</td><td style="text-align:left;border: 2px solid;padding-left:2px">Police Registration is mandatory in case of Tenants, Domestic Helps, Drivers, workers on an application by the Owners,
as required by Police Administration. A Copy is to be provided to NRWA for Records and necessary action.
</td></tr>
<tr><td style="text-align:center;border: 2px solid;">11</td><td style="text-align:left;border: 2px solid;;padding-left:2px">Use of Piped Water for Washing Cars, Roads or Driveways is prohibited as per the Directions of the Haryana Government and
District Administration in Gurugram. NRWA will take all appropriate measures to enforce the Rules of the Govt and the directions
of the District Administration. NRWA will impose Fines and Penalties on such residences and assist the administration in
prosecuting the defaulters.

</td></tr>
				</table>
		</div>
		</div>
</div>
</div>	
<div class="clearfix"></div>  
</body>
</html>';
//$html = file_get_contents("https://nirvanacountry.co.in/bills_view.php?bill_no=NRWAQ400381920"); 
$dompdf->loadHtml($html); 

// for custom html
//$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'Potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("cambill-".$bill_id, array("Attachment" => 0));


// $filename= $bill_id.".pdf";
// $filepath ="/home/nirvanac/nirvanacountry.co.in/bills_view/".$filename;
// $output = $dompdf->output();
// file_put_contents($filepath, $output);
//echo "done";
?>