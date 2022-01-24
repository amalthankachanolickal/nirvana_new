<?php include('model/class.expert.php');
include('adminsession_checker.php');
?>
 <?php 
$getAdvertismentInfo = $ModelCall->rawQuery("SELECT id, bussiness_name, `image` FROM `tbl_adervitiser_module` where status=1");
//print_r($getAdvertismentInfo);
$from_date = date("Y-m-d",strtotime("-1 month"));
echo $from_date;
$to_date = date("Y-m-d");
echo  $to_date;
//exit(0);

if(($_POST['from_date']) && $_POST['from_date']!==""){
    $from_date = $_POST['from_date'];
}else {
    $from_date = date("Y-m-d",strtotime("-1 month"));
}

if(isset($_POST['to_date']) && $_POST['to_date']!==""){
    $to_date = $_POST['to_date'];
}else {
    $to_date = date("Y-m-d");
}

$getUsers = $ModelCall->rawQuery("SELECT count(ip) as users FROM `tbl_tracker` where date(added_date) between '".$from_date."' and '". $to_date."' ORDER BY `tbl_tracker`.`id` DESC");

$getuniqueUsers = $ModelCall->rawQuery("SELECT count(distinct(ip)) as users FROM `tbl_tracker` where date(added_date) between '".$from_date."' and '". $to_date."' ORDER BY `tbl_tracker`.`id` DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Dashboard - <?php echo SITENAME;?> admin | Php Expert Technologies Pvt. Ltd.</title>
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
                <form class="m-b-30" action="" method="POST" enctype="multipart/form-data">
                <div class="col-sm-4 col-xs-6">
                <div class="form-group form-focus">
                    <label class="control-label">From  Date</label>
                    <input type="date" class="form-control floating" id="from_date" name="from_date" value="<?php echo $from_date;?>" />
                </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                <div class="form-group form-focus">
                    <label class="control-label">to Date</label>
                    <input type="date" class="form-control floating" id="to_date" name="to_date" value="<?php echo $to_date;?>" />
                </div>
                </div>
            
            <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>
            </form>
        </div>
                <div class="col-md-12">
                <div class="panel panel-table panel-primary">
                    <div class="panel-heading">
                        Advertisments Tracking Data : 
                    </div>
                    <div class="panel-body">
            
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                    <th> Advertisment Name/ Title</th>
                                    <th> Image Displayed </th>
                                    <th> No of Visitors </th>
                                    <th> No of Visitors who saw the Ad  </th>
                                    <th> # of Times the Ad was seen </th>
                                    <th> No of Users who clicked the Ad  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total=0; 
                               
                                foreach($getAdvertismentInfo as $value){
                                  
                                    $noseen =0;
                                    $gettrackerInfo = $ModelCall->rawQuery("SELECT id, ads_seen FROM `tbl_tracker` where ads_seen like '%".$value['image']."%' and date(added_date) between '".$from_date."' and '".$to_date."' ORDER BY `tbl_tracker`.`id` DESC");
                                    foreach ($gettrackerInfo as $info) {
                                        $arrayAds = array();
                                        $arrayAds = explode(",",$info['ads_seen'] );
                                        //print_r( $arrayAds);
                                            foreach ($arrayAds as $Ads) {
                                                if (strpos($Ads,$value['image']) !== false) {
                                                $noseen =  $noseen+1;
                                                }
                                            }
                                     }
                                     $getUsersSeenAd = $ModelCall->rawQuery("SELECT count(ip) as users FROM `tbl_tracker` where ads_seen like '%".$value['image']."%' and date(added_date) between '".$from_date."' and '". $to_date."' ORDER BY `tbl_tracker`.`id` DESC");

                                    $getuniqueUsersSeenAd = $ModelCall->rawQuery("SELECT count(distinct(ip)) as users FROM `tbl_tracker` where ads_seen like '%".$value['image']."%' and date(added_date) between '".$from_date."' and '". $to_date."' ORDER BY `tbl_tracker`.`id` DESC");

                                    $getclicksonAd = $ModelCall->rawQuery("SELECT count(*) as clicks  FROM `tbl_tracker` where date(added_date) between '".$from_date."' and '". $to_date."' and action='Click' and clicked_ad  like '%".$value['image']."%' ORDER BY `tbl_tracker`.`id`  ASC");

                                   ?>
                        
                                <tr>
                                    <td> <?php echo $value['bussiness_name'];?></td>
                                    <td> <?php echo $value['image'];?></td>
                                    <td>  Total -<?php echo $getUsers[0]['users'];?> , Unique - <?php echo $getuniqueUsers[0]['users'];?></td>
                                    <td>  Total -<?php echo $getUsersSeenAd[0]['users'];?> , Unique - <?php echo $getuniqueUsersSeenAd[0]['users'];?></td>
                                    <td> <?php echo $noseen;?></td>
                                    <td> <?php echo $getclicksonAd[0]['clicks'];?></td>
                                </tr>
                                <?php 
                                }?>
                              
                                </tbody>
                            </table>
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
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/plugins/raphael/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>

<script>
$(document).ready(function() {
    document.getElementById("from_date").defaultValue = '<?php echo $from_date;?>';
    document.getElementById("to_date").defaultValue = '<?php echo $to_date;?>';
});
</script>
</body>
</html>
