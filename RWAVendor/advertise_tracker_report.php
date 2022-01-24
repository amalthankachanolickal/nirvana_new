<?php include('model/class.expert.php');
include('adminsession_checker.php');
//print_r($_POST);
if(!empty($_POST)){
    $ModelCall->where("status", "1");
    $ModelCall->where("id",$_POST['adv_name']);
    $getad = $ModelCall->get("tbl_adervitiser_module");
  //  print_r($getad);
}
$ModelCall->where("status", "1");
$ModelCall->orderBy("id","desc");
$getads_managementInfo = $ModelCall->get("tbl_adervitiser_module");
//print_r($getads_managementInfo);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Dashboard - <?php echo SITENAME;?> admin </title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/morris/morris.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
<!--[if lt IE 9]>
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php'); ?>
  <div class="page-wrapper">
 <div class="content container-fluid">
 
 <div class="row filter-row">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>advertise_tracker_report.php" method="POST" enctype="multipart/form-data">
        <div class="col-sm-4 col-xs-6">
          <div class="form-group form-focus">
             <select class="form-control" name="adv_name" id="adv_name">
             <option value="">Select Advertisment</option>
             <?php if(count($getads_managementInfo)>0){ foreach($getads_managementInfo as $getads_managementVal){ ?>   
                <option value="<?php echo$getads_managementVal['id'];?>"><?php echo ucwords($getads_managementVal['bussiness_name']);?></option>
             <?php }
             }?>
            </select>
          </div>
        </div>
       
        <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Get Report </button> </div>
        </form>
      </div>
 
      <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #bc4e9c;
    background: -webkit-linear-gradient(to right, #f80759, #bc4e9c);
    background: linear-gradient(to right, #f80759, #bc4e9c);"> <span class="dash-widget-icon" style="background:#fff;"><i class="fa fa-truck" aria-hidden="true" style="color:#f80759;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
            <h3><?php echo number_format($GetTotalIncentive,2);?></h3>
              <span># Pages is their ads listed </span> </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: linear-gradient(to right, #FFAF7B, #D76D77);"> <span class="dash-widget-icon" style="background:#fff;"><i class="fa fa-users" aria-hidden="true" style="color:#D76D77;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
            <h3><?php echo number_format($GetTotalIncentive,2);?></h3>
              <span>Unique visitors to the site.</span> </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #56ab2f;
    background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);
    background: linear-gradient(to right, #a8e063, #56ab2f);"> <span class="dash-widget-icon " style="background:#fff;"><i class="fa fa-inr" aria-hidden="true" style="color:#93be52;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
              <h3><?php echo number_format($GetTotalIncentive,2);?></h3>
              <span>Total Visits on the Site</span> </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #FDC830;
    background: -webkit-linear-gradient(to right, #F37335, #FDC830);
    background: linear-gradient(to right, #F37335, #FDC830);"> <span class="dash-widget-icon " style="background:#fff;"><i class="fa fa-slideshare" style="color:#ffb64d;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
            <h3><?php echo number_format($GetTotalIncentive,2);?></h3>
              <span> How many times (in total) did people see their Ad</span> </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #ED213A;
    background: -webkit-linear-gradient(to right, #93291E, #ED213A);
    background: linear-gradient(to right, #93291E, #ED213A);"> <span class="dash-widget-icon" style="background:#fff;"><i class="fa fa-map-o" style=" color:#93291E;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
            <h3><?php echo number_format($GetTotalIncentive,2);?></h3>
              <span>Total clicks on their ad </span> </div>
          </div>
        </div>
        
        
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #D1913C; 
background: -webkit-linear-gradient(to right, #FFD194, #D1913C);
background: linear-gradient(to right, #FFD194, #D1913C);
"> <span class="dash-widget-icon" style="background:#fff;"><i class="fa fa-map-signs" style=" color:#D1913C;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
            <h3><?php echo number_format($GetTotalIncentive,2);?></h3>
              <span>Unique clicks on their ad </span> </div>
          </div>
        </div>
        
<!--         
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #16A085;
background: -webkit-linear-gradient(to right, #F4D03F, #16A085); 
background: linear-gradient(to right, #F4D03F, #16A085);
"> <span class="dash-widget-icon" style="background:#fff;"><i class="fa fa-file-word-o" style=" color:#16A085;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
              <h3><?php // echo $GetTotalTripsRuning;?></h3>
              <span>Total Invoices</span> </div>
          </div>
        </div>
        
        
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #ec008c;
    background: -webkit-linear-gradient(to right, #fc6767, #ec008c);
    background: linear-gradient(to right, #fc6767, #ec008c);"> <span class="dash-widget-icon" style="background:#fff;"><i class="fa fa-user-circle-o" style=" color:#ec008c;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
              <h3><?php // echo $GetTotalTripsRuning;?></h3>
              <span>Total Clients</span> </div>
          </div>
        </div>
        
        
        
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="dash-widget clearfix card-box" style="background: #00B4DB;
    background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
    background: linear-gradient(to right, #0083B0, #00B4DB);"> <span class="dash-widget-icon " style="background:#fff;"><i class="fa fa-money" aria-hidden="true" style="color:#0083B0;"></i></span>
            <div class="dash-widget-info" style="color:#fff;">
              <h3><?php // echo number_format($GetTotalExpense,2);?></h3>
              <span>Total Expense</span> </div>
          </div>
        </div>
      </div> -->
     <!-- <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-sm-6 text-center">
           
              <div class="card-box" style="height:450px;">
               <div class="panel-heading">
              <h3 class="panel-title">Trips Area Chart</h3>
            </div>
                <div id="area-chart" style="height:390px;" ></div>
              </div>
            </div>
            
            <div class="col-sm-6 text-center">
           
              <div class="card-box" style="height:450px;">
               <div class="panel-heading">
              <h3 class="panel-title">Vehicle Area Chart</h3>
            </div>
                <div id="area-chart1" style="height:390px;" ></div>
              </div>
            </div>
            
            
          </div>
        </div>-->
      </div> 

    <?php include('message_notification.php'); ?>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
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
