<?php
$ToAddress = $_REQUEST['email'];
$Subject ="Your order confirmation from ".SITENAME."";
$Body="<!DOCTYPE html><html>	<head><meta charset='utf-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<style>
.ii a[href] {
    color: #de730b !important;
    text-decoration: none !important;
}
</style>
</head>
<body>
<table id='m_-6368011182378812314container' align='center' style='width:100%;background:#eceeee;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
  <tbody>
    <tr>
      <td style='padding:10px;'><table align='center' style='width:100%;max-width:640px;font-family:Helvetica,Arial,sans-serif;border-spacing:0'>
          <tbody>
            <tr>
              <td style='height:100px;padding:4px 20px 0;background: #fdfdfd;border-bottom: 4px solid #fa0029;'><a href='' alt='".SITENAME."' target='_blank' > <img src='".SITE_URL.MAINADMIN.WEBSITELOGO."' alt='".SITENAME."' style='height: 80px;' class='CToWUd'> </a> </td>
            </tr>
            <tr>
              <td valign='top' style='padding:20px;color:#2b2c2f;font-size:14px;background:#ffffff'><p style='margin:0'>Thank you ".$_REQUEST['name_customer'].",</p>
                <p>".SITENAME." has received your order for ".$View[0]['Warehouse_Name'].". Your food's about to get cooking. Now sit back, relax and get ready to enjoy.</p>
                <p> Pro Tip: Every time you tell a friend about ".SITENAME.", a unicorn high fives a t-rex in outer space. </p></td>
            </tr>
            <tr>
              <td style='padding:20px;color:#2b2c2f;font-size:15px;font-weight:bold;background:#fffcf3;'><p style='margin-bottom:15px;font-size:15px'><b>QUICK ACTIONS</b></p>
                <table width='100%'>
                  <tr>
                    <td><p style='margin-bottom:15px'> <a style='background-color:#1d92dd;border:2px solid #1a79b6;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:15px;line-height:58px;text-align:center;text-decoration:none;width:300px' href='".SITE_URL."thankyouCheckout.php?resturantGetID=".$View[0]['Business_SerialNo']."&OrderRefID=".$pizza89orderid."' target='_blank'>Check Order Status</a> </p></td>
                    <td><p style='margin-bottom:15px'> <a style='background-color:#cf0707;border:2px solid #a20d0d;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:15px;line-height:58px;text-align:center;text-decoration:none;width:300px' href='".SITE_URL."account/dashboard' target='_blank'>Re-Order</a> </p></td>
                  </tr>
                  <tr>
                    <td><p> <a style='background-color:#ffd200;border:2px solid #e0b800;color:#000000;display:inline-block;font-family:sans-serif;font-size:15px;line-height:58px;text-align:center;text-decoration:none;width:300px' href='' target='_blank'>Track Order on ".SITENAME." App</a> </p></td>
                    <td><p> <a style='background-color:#96cd31;border:2px solid #96cd31;color:#000000;display:inline-block;font-family:sans-serif;font-size:15px;line-height:58px;text-align:center;text-decoration:none;width:300px' href='".SITE_URL."account/dashboard/' target='_blank'>Track Order Issues on ".SITENAME."</a> </p></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td style='padding:20px;color:#2b2c2f;background:#ffffff'><p style='margin:0 0 15px;font-size:15px'> Forgot something? Need to make changes? We got your back. Hit up our 24/7 Live Chat and our support ninjas will take care of you. </p>
                <p style='font-weight:bold'> <a style='background-color:#cf0707;border:2px solid #a20d0d;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:16px;line-height:58px;text-align:center;text-decoration:none;width:300px' href='".SITE_URL."cms/contact-support' target='_blank'>Contact Us</a> </p></td>
            </tr>
            <tr>

              <td style='padding:12px;background:#f7f7f7'><table style='width:100%;padding:6px;background:#ffffff;border:1px solid #d9dbe5;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                  <tbody>
                    <tr>
                      <td style='padding:0'><table style='width:100%;background:#cf0707;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr>
                              <td style='padding:8px 0 8px 6px;color:#ffffff;font-size:15px;font-weight:bold;text-transform:uppercase'>".$_SESSION['orderType']." order</td>
                              <td style='padding:8px 0 8px 6px;color:#ffffff;font-size:14px;text-align:right'>Order ID - ".$pizza89orderid."</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                    <tr>
                      <td style='padding:0'><table style='width:100%;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr>
                              <td style='padding:20px 0 10px;color:#686b6e;font-size:12px;border-bottom:1px solid #d9dbe5'>Scheduled for</td>
                              <td style='padding:20px 0 10px;color:#2b2c2f;font-size:13px;text-align:right;border-bottom:1px solid #d9dbe5'>".$_REQUEST['deliveryDate']." ".$_REQUEST['laterTime']."</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr><tr>
                      <td style='padding:0'><table style='width:100%;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr>
                              <td style='padding:10px 0;color:#686b6e;font-size:12px;border-bottom:1px solid #d9dbe5'>Table Booking Number</td>
                              <td style='padding:10px 0;color:#2b2c2f;font-size:13px;text-align:right;border-bottom:1px solid #d9dbe5'>".$_REQUEST['table_number_assign']."</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr><tr>
                      <td style='padding:0'><table style='width:100%;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr>
                              <td style='padding:10px 0;color:#686b6e;font-size:12px;border-bottom:1px solid #d9dbe5'>Table Booking Request Time</td>
                              <td style='padding:10px 0;color:#2b2c2f;font-size:13px;text-align:right;border-bottom:1px solid #d9dbe5'>".$_REQUEST['Table_Booking_Request_Time']."</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr><tr>
                      <td style='padding:0'><table style='width:100%;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr>
                              <td style='padding:10px 0;color:#686b6e;font-size:12px;border-bottom:1px solid #d9dbe5'>Est. ".$_SESSION['orderType']." time</td>
                              <td style='padding:10px 0;color:#2b2c2f;font-size:13px;text-align:right;border-bottom:1px solid #d9dbe5'>".$_REQUEST['RestaurantNameEstimate']."</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                    <tr>
                      <td style='padding:0'><table style='width:100%;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr>
                              <td style='padding:10px 0;color:#686b6e;font-size:12px;border-bottom:1px solid #d9dbe5'>From</td>
                              <td style='padding:10px 0;color:#2b2c2f;font-size:13px;text-align:right;border-bottom:1px solid #d9dbe5'>".$View[0]['Warehouse_Name']."</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                    <tr style='background:#cf0707;'>
                      <td colspan='2' style='padding:3px 6px;color:#ffffff;font-size:15px;font-weight:bold'>ORDER INFO</td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:0'><table style='width:100%;font-size:13px;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                          <tbody>
                            <tr style='color:#858a8f;font-size:10px;font-weight:bold'>
                              <th colspan='2' style='padding:10px 0 0;text-align:left'>Item</th>
                              <th style='width:25px;padding:10px 0 0;text-align:center'>Qty</th>
                              <th style='width:40px;padding:10px 0 0;text-align:right'>Price</th>
                            </tr>";
$total='';
$ModelCall->where("sysIP", $_SERVER['REMOTE_ADDR']);
$ModelCall->where("cartAdddate", date('Y-m-d'));	
$ModelCall->where("hotel_id", $_REQUEST['hotel_id']);	
//$ModelCall->where("sessoionId", session_id());
$ModelCall->orderBy("cartId","ASC");
$recrt = $ModelCall->get("cartNew");	
if($recrt[0]>0){
$subTotal=0;
foreach($recrt as $val){
if(is_array($val)){

$ModelCall->where("id",$val['itemId']);	
$ModelCall->orderBy("id","ASC");
$itmDt = $ModelCall->get("tbl_food_menu");

if($val['MenuSize']!=0){
$ModelCall->where("id",$val['MenuSize']);	
$ModelCall->orderBy("id","ASC");
$MenuSizeData = $ModelCall->get("tbl_food_menuSize");
if($MenuSizeData[0]['Food_NameSize']!=''){
	$sizeName='('.$MenuSizeData[0]['Food_NameSize'].')';
}
}			

					$ItemTota=$val['price']*$val['quqntity'];
						$ItemTota=$ItemTota+$ExtraSizePrice;
						$subTotal+=($ItemTota);
					
$Body .="<tr><td colspan='2' style='padding:10px 0;text-align:left;border-bottom:1px dotted #d9dbe5;vertical-align:top'><b style='color:#2b2c2f;font-size:15px'>".$itmDt[0]['Food_Name']." ".$sizeName."</b>";
							  if($val['instructions']!=''){
                                $Body .="<p style='margin:10px 0 0;color:#9b9e9f'><b>Instructions: </b>".$val['instructions']."</p>";
								}
								$Body .="</td>
<td style='padding:10px 0 10px 7px;color:#60636a;text-align:center;border-bottom:1px dotted #d9dbe5;vertical-align:top'>".$val['quqntity']."</td>
                              <td style='padding:10px 0 10px 7px;color:#60636a;text-align:right;border-bottom:1px dotted #d9dbe5;vertical-align:top'>".CURRENCY." ".number_format($ItemTota,2)."</td>
                            </tr>";
}

}
}
$subTotal=$subTotalDeals+$subTotal+$subTotalQuickDeal;
$subTotalDisplay=$subTotal;
$MinimumOrderCharg=$ModelCall->checkminimumcharge($_SESSION['postcodeSearch'],$_REQUEST['resid']);
$DeliveryCharg=$ModelCall->checkdeliverycharge($_SESSION['postcodeSearch'],$_REQUEST['resid']);
if($_SESSION['disCupnType']=='pr')
{
$CouponDiscountValue=$subTotal*$_SESSION['disCupnPrice']/100;	
}
else
{
$CouponDiscountValue=$_SESSION['disCupnPrice'];	
}


if($subTotal!='' && $_REQUEST['orderType']=='Delivery'){

		 if($View[0]['delivery_percentage']==1){
			 $DeliveryChargeAdd=($subTotalDisplay*$DeliveryCharg)/100;
			 $DeliveryFeesDisplay="%";
			 }
			 else
			 {
			  $DeliveryChargeAdd=$DeliveryCharg;
			  $DeliveryFeesDisplay=CURRENCY;
			  }

$subTotal=$subTotalOffer+$subTotalDisplay;
}
else
{
$subTotal=$subTotalOffer+$subTotalDisplay;
}

 $DiscountValueGet=$ModelCall->offerDiscountAppliedPrice($_REQUEST['resid'],$subTotalDisplay,$_SESSION['orderType']);
 $DiscountExplod=explode("_",$DiscountValueGet);

if($DiscountExplod[1]!='' && $DiscountExplod[3]==$_SESSION['orderType']){
 $offerDisc1=$DiscountExplod[2];
 $discountValue=$DiscountExplod[1];
}
else
{
$discountValue =0;
} 

 
if($subTotalDisplay!='' && $subTotal>$discountValue){$grandTotal=$subTotalDisplay-$discountValue; }
if($subTotalDisplay!='' && $subTotal>$minOrderMin){ $minOrderMin=$subTotalDisplay-$MinimumOrderCharg; }
							
                           $Body .=" <tr>
                              <td colspan='4' style='padding:11px 0'><table style='width:100%;color:#60636a;font-size:13px;text-align:right;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                                  <tbody>
                                    <tr>
                                      <td style='padding:2px 0'>Subtotal</td>
                                      <td style='padding:2px 0'>".CURRENCY." ".number_format($subTotalDisplay,2)."</td>
                                    </tr>";
									if($DeliveryChargeAdd!=''){
									if($_REQUEST['orderType']!='Pickup'){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Delivery Charge</td>
                                      <td style='padding:2px 0'>".CURRENCY." ".number_format($DeliveryChargeAdd,2)."</td>
                                    </tr>";
									} }
									if($_SESSION['extraTipAmount']!=''){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Tip Amount</td>
                                      <td style='padding:2px 0'>".CURRENCY." ".number_format($_SESSION['extraTipAmount'],2)."</td>
                                    </tr>";
									}
								if($View[0]['restaurant_serviceFees']!='' && $View[0]['restaurant_serviceFees']!=0){
								if($View[0]['serviceCharge_percentage']==1)
								{
                               $ServiceFees=($subTotalDisplay*$View[0]['restaurant_serviceFees'])/100;
                               $ServiceFeesDisplay="%";
                               }
                               else
                               {
                                $ServiceFees=$View[0]['restaurant_serviceFees'];
                                $ServiceFeesDisplay=CURRENCY;
                                }
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Service Fee (".number_format($View[0]['restaurant_serviceFees'],2).")</td>
                                      <td style='padding:2px 0'>".$ServiceFeesDisplay." ".number_format($ServiceFees,2)."</td>
                                    </tr>";
								} 
								
								if($View[0]['packaging_charges']!='' && $View[0]['packaging_charges']!=0){
								if($View[0]['packagingchargesType']==1)
								{
                               $PackageFees=($subTotalDisplay*$View[0]['packaging_charges'])/100;
                               $PackageFeesDisplay="%";
                               }
                               else
                               {
                                $PackageFees=$View[0]['packaging_charges'];
                                $PackageFeesDisplay=CURRENCY;
                                }
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Packing Fee (".number_format($View[0]['packaging_charges'],2).")</td>
                                      <td style='padding:2px 0'>".$PackageFeesDisplay." ".number_format($PackageFees,2)."</td>
                                    </tr>";
								} 
								
								
									if($View[0]['shop_saleTaxPercentage']!='' && $View[0]['shop_saleTaxPercentage']!=0){
									$SaleTax=($subTotalDisplay*$View[0]['shop_saleTaxPercentage'])/100;
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Sale Tax (".$View[0]['shop_saleTaxPercentage']."%)</td>
                                      <td style='padding:2px 0'>".CURRENCY." ".number_format($SaleTax,2)."</td>
                                    </tr>";
									}
									
									if($View[0]['shop_serviceVat']!='' && $View[0]['shop_serviceVat']!=0){
									$VatTax=($subTotalDisplay*$View[0]['shop_serviceVat'])/100;
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Vat Tax (".$View[0]['shop_serviceVat']."%)</td>
                                      <td style='padding:2px 0'>".CURRENCY." ".number_format($VatTax,2)."</td>
                                    </tr>";
									}
									
									if($_REQUEST['GiftCardPay']!=''){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Pay by Giftcard </td>
                                      <td style='padding:2px 0'>- ".CURRENCY." ".number_format($_REQUEST['GiftCardPay'],2)."</td>
                                    </tr>";
									}
									
									if($_REQUEST['WalletPay']!=''){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Pay by Wallet </td>
                                      <td style='padding:2px 0'>- ".CURRENCY." ".number_format($_REQUEST['WalletPay'],2)."</td>
                                    </tr>";
									}
									
									if($discountValue!=''){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Discount </td>
                                      <td style='padding:2px 0'>- ".CURRENCY." ".number_format($discountValue,2)."</td>
                                    </tr>";
									}
									
									if($_SESSION['disCupn']!=''){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Coupon Code (".$_SESSION['disCupn'].") </td>
                                      <td style='padding:2px 0'>- ".CURRENCY." ".number_format($CouponDiscountValue,2)."</td>
                                    </tr>";
									}
									
									if($_SESSION['loyptamount']!=''){
                                    $Body .="<tr>
                                      <td style='padding:2px 0'>Regard Points Redeem</td>
                                      <td style='padding:2px 0'>- ".CURRENCY." ".number_format($_SESSION['loyptamount'],2)."</td>
                                    </tr>";
									}
									
                                    $Body .="<tr>
                                      <td colspan='2' style='height:10px'></td>
                                    </tr>
                                    <tr>
                                      <td style='padding:2px 0'>Total</td>
                                      <td style='padding:2px 0'>".CURRENCY." ".number_format($grandTotal+$_SESSION['extraTipAmount']-$CouponDiscountValue-$WebCouponDiscountValue-$_SESSION['loyptamount']+$SaleTax+$ServiceFees+$VatTax+$PackageFees+$DeliveryChargeAdd,2)."</td>
                                    </tr>
                                    <tr>
                                      <td style='padding:2px 0'> Paying with <strong>".$_REQUEST['method']."</strong> </td>
                                      <td style='padding:2px 0'></td>
                                    </tr>
                                    <tr>
                                      <td colspan='2' style='height:10px'></td>
                                    </tr>
                                   
                                    <tr>
                                      <td class='m_-6368011182378812314left m_-6368011182378812314cashcoupon'></td>
                                      <td style='padding:2px 0'></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table>
                </td>
            </tr>
            <tr>
              <td style='padding:13px 20px 25px;background:#f7f7f7'><table style='width:100%;color:#2b2c2f;font-size:15px;border-spacing:0;font-family:Helvetica,Arial,sans-serif'>
                  <tbody>
                    <tr>
                      <td colspan='2' style='padding:0;font-weight:bold;border-bottom:1px solid #686b6e'>Delicious food from</td>
                    </tr>
                    <tr>
                      <td style='padding:20px 0 15px;width:64%'>".$View[0]['Warehouse_Name']."</td>
                      <td style='padding:20px 0 15px;font-size:14px;text-align:right'><a href='tel:".$View[0]['Toll_Free_No']."' style='color:#2b2c2f;text-decoration:none' target='_blank'>".$View[0]['Toll_Free_No']."</a> </td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:0 0 25px;color:#686b6e;font-size:14px'> ".$View[0]['Warehouse_Address']." </td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:0;font-weight:bold;border-bottom:1px solid #686b6e'>Your info</td>
                    </tr>
                    <tr>
                      <td style='padding:20px 0 15px;width:64%'>".$_REQUEST['name_customer']."</td>
                      <td style='padding:20px 0 15px;font-size:14px;text-align:right'><a style='color:#2b2c2f;text-decoration:none'>".$_REQUEST['phone']."</a> </td>
                    </tr>
                    <tr> </tr>
                    <tr>
                      <td colspan='2' style='padding:0'>".$_REQUEST['SpecialInstruction']."</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td style='padding:10px 12px 20px;background:#ffffff;font-size:15px'><p style='margin:0'> Your friends in food, <br>
                  <a href='' style='color:#42acf0;font-weight:bold;text-decoration:none' target='_blank'>".SITENAME." - The Food Delivery App</a> </p></td>
            </tr>
            <tr>
              <td style='padding:10px 20px 6px;background:#1d1d1d'><a href='' title='Facebook' style='margin:0 16px 0 0;text-decoration:none' target='_blank'> <img src='".SITE_URL."EmailImage/fb.png' height='30' width='31' style='height:30px;width:31px;border:none' class='CToWUd'> </a> <a  title='Twitter' style='margin:0 16px 0 0;text-decoration:none' target='_blank'> <img src='".SITE_URL."EmailImage/tw.png' height='30' width='31' style='height:30px;width:31px;border:none' class='CToWUd'> </a> <a title='Youtube' style='margin:0 16px 0 0;text-decoration:none' target='_blank'> <img src='".SITE_URL."EmailImage/yu.png' height='30' width='31' style='height:30px;width:31px;border:none' class='CToWUd'> </a></td>
            </tr>
            <tr>
              <td style='padding:25px 20px;color:#7a7b7b;font-size:14px;background:#313131'><p style='margin:0px;color:white;font-weight:bold;border-bottom:1px solid #adadad'> FAQ - Food appropriate questions </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>Did my order go through?</p>
                <p style='text-align:justify'> This is an order confirmation email, so yes. Your order is on its way to the restaurant, and definitely not lost in cyberspace. Check above for a link that lets you track your order status in real time as it comes to you. Remember, no one from  ".SITENAME." will ever call you to ask for any payment information, such as credit card number. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>How do I check the status of my order?</p>
                <p style='text-align:justify'> ".SITENAME." live chat reps are standing by to check the status of your order anytime, day or night - literally! You can also reach us by email or phone 24/7. We'll tell you the latest order status given to us by the restaurant. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>Who will deliver my order? Elves?</p>
                <p style='text-align:justify'> In most cases, one of the restaurant's delivery drivers will deliver your order. Keep in mind, some restaurants don't have their own drivers and use a third-party delivery service, which could take longer. Sorry, no elves. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>Where can I find a receipt for my order?</p>
                <p style='text-align:justify'> After logging into your ".SITENAME." account, click on the 'Past Orders' tab. You can then view all your previous orders and final receipts. Any changes that were made to your order will be reflected here. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>When will I receive my order?</p>
                <p style='text-align:justify'> Your estimated delivery time is included above, plus a link that lets you track your order status in real time as it comes to you. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>The estimated delivery time shows '30 - 45 min'. What's the holdup?</p>
                <p style='text-align:justify'> The restaurant estimates your delivery time based on the number of drivers they have and the delivery territories they set up in our system. Keep in mind, there could be delays due to heavy traffic, bad weather, hamster parades, Hoverboard sightings, or an alien invasion. Excluding unforeseeable conditions like these, we promise your food will arrive as soon as possible. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>I just received my order, and there are items missing. What should I do?</p>
                <p style='text-align:justify'> Blast! There's nothing more upsetting than expecting to see potstickers and not seeing potstickers. Contact us, and we'll right this wrong before you can say 'More soy sauce, please.' You can reach us anytime by live chat, email, or phone - 24 hours a day, every day. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>How does the Coupon Code work?</p>
                <p style='text-align:justify'> You'll need to order from a restaurant that accepts CashCoupons, (there's over 35,000 of them nationwide), and pay with a credit card. You have to be a ".SITENAME." member and can only use the coupon. The coupon can only be applied on orders over ".CURRENCY."10 and the coupon value will be applied when you complete the order. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>Why does the receipt that came with my food show the wrong total after I used my CashCoupon?</p>
                <p style='text-align:justify'> The receipt that comes with your food is the same receipt that ".SITENAME." uses to communicate the cost of your order to the restaurant. ".SITENAME." covered the free stuff, but we still need to let the restaurant know it's paid for. The order receipt on the confirmation page and the email receipt from ".SITENAME." shows the correct price you were charged. Still confused? Check your credit card statement or feel free to contact us. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>My order was cancelled. What happens to the CashCoupon / Coupon Code I used?</p>
                <p style='text-align:justify'> Don't sweat it! We will credit the full amount of the CashCoupon / Coupon Code you used back to your account - and you will be able to use it on your next order. </p>
                <p style='margin:25px 0 15px;color:#adadad;font-weight:bold'>I already placed my order, but I need to add more items or special instructions.</p>
                <p style='margin:0 0 15px;color:#adadad;font-weight:bold'>How do I change my order from delivery to pick up? And vice versa?</p>
                <p style='margin:0 0 15px;color:#adadad;font-weight:bold'>I selected to pay by cash, but now I want to use my credit card. How can I change that?</p>
                <p style='margin:0 0 15px;color:#adadad;font-weight:bold'>I need to cancel my order. How do I do that?</p>
                <p style='text-align:justify'> If you ever need to make a change to your order, just tell us and we'll take care of it. You can reach us anytime by live chat, email, or phone - 24 hours a day, every day. If needed, we will personally contact the restaurant and make sure that all changes are made to your order. </p></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>";

if (smtpmailer($ToAddress, $From, $FromName, $Subject, $Body)) {
// echo 'Yippie, message send via Gmail';
} else {
 if (!smtpmailer($ToAddress, $From, $FromName, $Subject, $Body, false)) {
 if (!empty($error)) echo $error;
 } else {
// echo 'Yep, the message is send (after doing some hard work)';
 }
}

?>