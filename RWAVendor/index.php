<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Dashboard - <?php echo SITENAME;?> Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/morris/morris.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
<![endif]-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4FYVP35BT6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4FYVP35BT6');
</script>
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php'); ?>
  <div class="page-wrapper">
 <div class="content container-fluid">
     
<?php if($getAdminSubInfo[0]['user_management']==1){ ?>      
      <?php
if($_REQUEST['first_name']!='')
{
$ModelCall->where("(first_name ='".$ModelCall->utf8_decode_all($_REQUEST['first_name'])."')" );
}
if($_REQUEST['user_email']!='')
{
$ModelCall->where("(email ='".$ModelCall->utf8_decode_all($_REQUEST['user_email'])."')" );
}
if($_REQUEST['user_phone']!='')
{
$ModelCall->where("(user_phone ='".$ModelCall->utf8_decode_all($_REQUEST['user_phone'])."')" );
}
$ModelCall->where("(client_id ='".$ModelCall->utf8_decode_all($getAdminInfo[0]['id'])."')" );
$getDriverInfo = $ModelCall->get("Wo_Users");

} ?>
<?php 
// SELECT count(user_resident_type) FROM `Wo_Users` where block_id=1 and user_resident_type=0

$getBlocks= $ModelCall->rawQuery("SELECT * FROM `tbl_block_entry` where status =1 order by id"); 

// $getOwnersInfo = $ModelCall->rawQuery("SELECT count(user_resident_type) as owners, block_id FROM `Wo_Users` where user_resident_type=0 group by block_id order by block_id");

// $getValidEmailsInfo = $ModelCall->rawQuery("SELECT count(*) as ValidEmails , block_id from Wo_Users where email_valid=1  and user_status='active' group by block_id  order by block_id");
// $getPhoneInfo = $ModelCall->rawQuery("SELECT count(*) as ValidPhone , block_id from Wo_Users where phone_valid=1  and user_status='active' group by block_id  order by block_id");
// $getFirstLogins = $ModelCall->rawQuery("SELECT count(*) as firstlogin , block_id from Wo_Users where first_login=1  and user_status='active' group by block_id  order by block_id");
$getConsentInfo = $ModelCall->rawQuery("select a.block_id ,IFNULL(b.payment_consent, 0) AS payment from (select distinct(block_id) from Wo_Users) AS a left join (SELECT count(*) as payment_consent, block_id from Wo_Users where payment_consent=1 and user_status='active' group by block_id order by block_id) AS b on b.block_id = a.block_id order by block_id");
$getConsentInfoNO = $ModelCall->rawQuery("select a.block_id ,IFNULL(b.payment_consent, 0) AS payment from (select distinct(block_id) from Wo_Users) AS a left join (SELECT count(*) as payment_consent, block_id from Wo_Users where payment_consent=0 and user_status='active' group by block_id order by block_id) AS b on b.block_id = a.block_id order by block_id");
$getConsentInfoNA = $ModelCall->rawQuery("select a.block_id ,IFNULL(b.payment_consent, 0) AS payment from (select distinct(block_id) from Wo_Users) AS a left join (SELECT count(*) as payment_consent, block_id from Wo_Users where payment_consent is NULL and user_status='active' group by block_id order by block_id) AS b on b.block_id = a.block_id order by block_id");
?>

<div class="row">
        <div class="col-md-12">
          <div class="panel panel-table panel-primary">
            <div class="panel-heading" style="text-align: center;">
            Block Wise Summary 
            </div>
            <div class="panel-body">
      
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
              <thead >
                <tr style="font-size:bold">
                  <th style="text-align: left;"><b> Blocks </b></th>
                  <th style="text-align: right;"><b> # Tenants  </b></th>
                  <th style="text-align: right;"> <b>#  Owners  </b></th>
                  <th style="text-align: right;"><b> Total  </b></th>
                  <th style="text-align: right;"> <b>Valid Email IDs </b> </th>
                  <th style="text-align: right;"> <b>First Logins till date  </b> </th>
                  <th style="text-align: right;"> <b>EC Logins  </b></th>
                 
                </tr>
              </thead>
              <tbody>
              <?php   
              $owners=0;
              $tenants=0;
              $total=0;
              $firstlogins=0;
              $eclogins=0;
              $validemails=0;

               foreach($getBlocks as $block){ 
                // get owners count 
                $getOwners = $ModelCall->rawQuery("SELECT count(distinct(concat(block_id, house_number_id, floor_number))) as owners, block_id FROM `Wo_Users` where user_type=0 and user_status='Active' and block_id=".$block['id']." and  house_number_id <900 order by block_id");
                $owners= $owners+$getOwners[0]['owners'];
// get tenates count 
                $getTenant = $ModelCall->rawQuery("SELECT count(distinct(concat(block_id, house_number_id, floor_number))) as tenants, block_id FROM `Wo_Users` where user_type=1 and user_status='Active' and block_id=".$block['id']." and  house_number_id <900  order by block_id");
                $tenants = $tenants+$getTenant[0]['tenants'];
// get total block count 
                $getBlockInfo = $ModelCall->rawQuery("SELECT  count(distinct(concat(block_id, house_number_id, floor_number))) as total, block_id FROM `Wo_Users` where  block_id=".$block['id']." and user_status='Active' and  house_number_id <900  group by block_id order by block_id");
                $total = $total +$getBlockInfo[0]['total'];
// Get Wrong emails count 
                $getValidEmails = $ModelCall->rawQuery("SELECT count(*) as ValidEmails , block_id from Wo_Users where email_valid=1  and block_id=".$block['id']."  and user_status='Active' and  house_number_id <900 group by block_id  order by block_id");
                $validemails= $validemails+ $getValidEmails[0]['ValidEmails'];
// first logins 
                $getFirstLogins = $ModelCall->rawQuery("SELECT count(*) as firstlogin , block_id from Wo_Users where first_login=1  and block_id=".$block['id']."  and user_status='Active' and  house_number_id <900  group by block_id  order by block_id");
                $firstlogins = $firstlogins+  $getFirstLogins[0]['firstlogin'];
// Ec logins
                $getECLogins = $ModelCall->rawQuery("SELECT count(u.user_id )as eclogins FROM `Wo_Users` u , `tbl_EC_uses` ec where u.user_id = ec.user_id and ec.status='Current' and first_login=1 and  block_id=".$block['id']);
                $eclogins = $eclogins+$getECLogins[0]['eclogins'];
                ?>
                
              <tr>
                <td><?php echo $block['block_code'];?></td>
                <td style="text-align: right;"><?php echo $getTenant[0]['tenants'];?></td>
                <td style="text-align: right;"><?php echo $getOwners[0]['owners'];?></td>
                
                <td style="text-align: right;"><?php echo $getBlockInfo[0]['total'];?></td>
                <td style="text-align: right;"><?php echo $getValidEmails[0]['ValidEmails'];?></td>
               
                <td style="text-align: right;"><?php echo $getFirstLogins[0]['firstlogin'];?></td>
                <td style="text-align: right;"><?php echo $getECLogins[0]['eclogins'];?></td>

              </tr>
              <?php }?>
              <tr  class="info" style="font-weight: bolder !important;">
                <td> <b>Grand Total : </b> </td>
                <td style="text-align: right;"><b><?php echo $tenants?></b></td>
                <td style="text-align: right;"><b><?php echo $owners?></b></td>
              
                <td style="text-align: right;"><b><?php echo $total;?></b></td>
                <td style="text-align: right;"><b><?php echo $validemails;?></b></td>
                <td style="text-align: right;"><b><?php echo  $firstlogins;?></b></td>
                <td style="text-align: right;"><b><?php echo $eclogins;?></b></td>

              </tr>
              </tbody>
              </table>
              </div>
            </div> 
          </div>
          </div>
         <div class="col-md-12">
          <div class="panel panel-table panel-primary">
            <div class="panel-heading" style="text-align: center;">
           Users Data Summary on Website Services : 
            </div>
            <div class="panel-body" >
      
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                <thead >
                <tr style="font-size:bold">
                  <th> <b>Blocks </b> </th>
                  <th style="text-align: right;"> <b># Owners  </b></th>
                  <th style="text-align: right;"><b> Blocked/Suspended Users </b> </th>
                  <th style="text-align: right;"><b> NewsPaper Consent No  </b></th>
                  <th style="text-align: right;"> <b>NewsPaper Consent Yes  </b></th>
                  <th style="text-align: right;"><b> Newpaper Bill Paid Online  </b></th>
                  <th style="text-align: right;"> <b>CAM Bill Paid Online  </b></th>
                 </tr>
              </thead>
              <tbody>
              <?php  $owners=0;
              $suspended=0;
              $consentno=0;
              $consentyes=0;
              $newpaperonline=0;
              $camonline=0;
               foreach($getBlocks as $block){
                  // get owners count 
                $getOwners = $ModelCall->rawQuery("SELECT count(distinct(concat(block_id, house_number_id, floor_number))) as owners, block_id FROM `Wo_Users` where user_type=0 and block_id=".$block['id']."  and  house_number_id <900 order by block_id");
                $owners = $owners+  $getOwners[0]['owners'];
                // Suspended users
                $getsuspended = $ModelCall->rawQuery("SELECT count(user_id) as suspended, block_id FROM `Wo_Users` where user_status='Suspended' and block_id=".$block['id']." and  house_number_id <900 order by block_id");
                $suspended = $suspended+ $getsuspended[0]['suspended'];
                 // payment consent no  users
                 $getconsentno = $ModelCall->rawQuery("SELECT count(user_id) as pay, block_id FROM `Wo_Users` where payment_consent=0 and block_id=".$block['id']." and  house_number_id <900  order by block_id");
                 $consentno =  $consentno+$getconsentno[0]['pay'];
                  //  payment consent Yes  users
                $getconsentyes = $ModelCall->rawQuery("SELECT count(user_id) as pay, block_id FROM `Wo_Users` where payment_consent=1 and block_id=".$block['id']." and  house_number_id <900  order by block_id");
                $consentyes =  $consentyes+$getconsentyes[0]['pay'];
  //  Newspaper bill paid online users
                $getPaidNewpaper = $ModelCall->rawQuery("SELECT count(distinct(flat_no)) as billonline FROM `tbl_newspaper_bill` where block_number=".$block['id']." and amt_paid!='' ");
                $newpaperonline =  $newpaperonline+$getPaidNewpaper[0]['billonline'];

       //  CAM bill paid online users
                $getPaidCAM = $ModelCall->rawQuery("SELECT count(distinct(unit_num)) as billpaid FROM `tbl_bill_payment_details` where mode='online' and unit_num like '".$block['block_code']."%'");
                $camonline =  $camonline+$getPaidCAM[0]['billpaid'];

                 ?>
               <tr>
                <td><?php echo $block['block_code'];?></td>
                <td style="text-align: right;"><?php echo $getOwners[0]['owners'];?></td>
                <td style="text-align: right;"><?php echo $getsuspended[0]['suspended'];?></td>
                <td style="text-align: right;"><?php echo $getconsentno[0]['pay'];?></td>
                <td style="text-align: right;"><?php echo $getconsentyes[0]['pay'];?></td>
                <td style="text-align: right;"><?php echo $getPaidNewpaper[0]['billonline'];?></td>
                <td style="text-align: right;"><?php echo $getPaidCAM[0]['billpaid'];?></td>
              </tr>
              <?php }?>
              <tr  class="info" style="font-weight: bolder !important;">
                <td nowrap><b> Grand Total: </b></td>
                <td style="text-align: right;"><b><?php echo $owners;?> </b></td>
                <td style="text-align: right;"><b><?php echo $suspended;?> </b></td>
                <td style="text-align: right;"><b><?php echo $consentno;?> </b></td>
                <td style="text-align: right;"><b><?php echo $consentyes;?> </b></td>
                <td style="text-align: right;"><b><?php echo $newpaperonline;?> </b></td>
                <td style="text-align: right;"><b><?php echo  $camonline;?> </b></td>
                </tr>
              </tbody>
              </table>
              </div>
            </div> 
          </div>
        </div>

        <div class="col-md-12">
          <div class="panel panel-table panel-primary">
            <div class="panel-heading" style="text-align: center;">
            EC Users : 
            </div>
            <div class="panel-body">
      
              <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                <thead >
                <tr style="font-size:bold">
                  <th><b> First Name</b> </th>
                  <th> <b>Last Name </b></th>
                  <th style="text-align: right;"><b> First Login </b></th>
                  <th style="text-align: right;"> <b>House # </b></th>
                  <th style="text-align: right;"> <b>Block </b></th>
                 </tr>
              </thead>
              <tbody>
              <?php 
              $ECLogins=0;
              $getECLogins = $ModelCall->rawQuery("SELECT u.first_name, u.last_name, u.first_login, u.house_number_id , u.block_id, b.block_code FROM `Wo_Users` u , `tbl_EC_uses` ec, tbl_block_entry b where u.user_id = ec.user_id and ec.status='Current' and u.block_id = b.id");
              foreach($getECLogins as $getEC){ 
                $ECLogins =   $ECLogins +  $getEC['first_login'];
                 ?>
               <tr>
                <td><?php echo $getEC['first_name'];?></td>
                <td><?php echo $getEC['last_name'];?></td>
                <td style="text-align: right;"><?php echo $getEC['first_login'];?></td>
                <td style="text-align: right;"><?php echo $getEC['house_number_id'];?></td>
                <td style="text-align: right;"><?php echo $getEC['block_code'];?></td>
              
              </tr>
              <?php }?>
              <b>  <tr  class="info" style="font-weight: bolder !important;">
                <td><b>Grand Total :</b></td>
                <td></td>
                <td style="text-align: right;"><b><?php echo $ECLogins;?></b></td>
                <td></td>
                <td></td>
                </tr> </b>
              </tbody>
              </table>
              </div>
            </div> 
          </div>
        </div>

        </div>
    </div>
  </div>
</div>


<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/raphael/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
<script>
				var data = [
			  { y: '2018', a: 2,  b: 2, c: 1},
			  { y: '2019', a: 0,  b: 0, c: 0},			],
			config = {
			  data: data,
			  xkey: 'y',
			  ykeys: ['a', 'b', 'c'],
			  labels: ['Total Trips', 'Total Running Trips' , 'Total Completed Trips'],
			  fillOpacity: 0.6,
			  hideHover: 'auto',
			  behaveLikeLine: true,
			  resize: true,
			  pointFillColors:['#ffffff'],
			  pointStrokeColors: ['black'],
				gridLineColor: '#eef0f2',
			  lineColors:['gray','orange','green']
		  };
		config.element = 'area-chart';
		Morris.Area(config);
		</script>
        
        
        
        
        
        
        <script>
				var data = [
			  { y: '2018', a: 3,  b: 0},
			  { y: '2019', a: 0,  b: 0},
			],
			config = {
			  data: data,
			  xkey: 'y',
			  ykeys: ['a', 'b'],
			  labels: ['Total Active Vehicle', 'Total Inactive Vehicle'],
			  fillOpacity: 0.6,
			  hideHover: 'auto',
			  behaveLikeLine: true,
			  resize: true,
			  pointFillColors:['#ffffff'],
			  pointStrokeColors: ['black'],
				gridLineColor: '#eef0f2',
			  lineColors:['gray','orange']
		  };
		config.element = 'area-chart1';
		Morris.Area(config);
	
		</script>
</body>
</html>
