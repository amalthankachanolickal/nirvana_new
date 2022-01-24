<?php include('model/class.expert.php');
include('adminsession_checker.php');
$first = 1;
/*-----------Date filter-------------*/
if ($_REQUEST['v_date']) {
    /* if ($first) {
         $where = "where";
         $where = $where . ' `vaccine1_date` = "' . $_REQUEST['v_date'] . '"';
     } else {
         $where = $where . 'and `vaccine1_date` = "' . $_REQUEST['v_date'] . '"';
     }
     $first = 0;*/

    if ($first) {
        $i=0;
        $where = "where (";
        $str_arr = explode (",", $_POST['v_date']);
        foreach ( $str_arr as  $value){


            if($i!=0)
                $where.=" OR";

            $where = $where . ' DATE_FORMAT(vaccine1_date, "%d/%m/%Y") = "' .$value. '"';
            $i++;


        }
         $where .=")";
        // echo $where; exit;
    } else {
        $i=0;
        $where .=" and (";
        $str_arr = explode (",", $_POST['v_date']);
        foreach ($str_arr as $value){
            if($i==0){
                $where = $where . '  DATE_FORMAT(vaccine1_date, "%d/%m/%Y") = "' .$value. '"';
            }else{

                if($i!=0)

                    $where = $where .  'OR DATE_FORMAT(vaccine1_date, "%d/%m/%Y") = "' .$value. '"';
            }

            $i++;
        }
        $where .=")";

    }
    $first = 0;
}
/*--------------Timefilter------------*/
if ($_REQUEST['vaccine1_time']) {
    /*  if ($first) {
          $where = "where";
          $where = $where . ' `vaccine1_time` = "' . $_REQUEST['vaccine1_time'] . '"';
      } else {
          $where = $where . ' and `vaccine1_time` = "' . $_REQUEST['vaccine1_time'] . '"';
      }
      $first = 0;*/


    if ($first) {
        $where = "where";

        foreach ($_POST['vaccine1_time'] as  $value){


            if($i!=0)
                $where.=" OR";

            $where = $where . ' `vaccine1_time` = "' . $value . '"';
            $i++;


        }
        // echo $where; exit;
    } else {
        $i=0;
        $where .=" and (";
        foreach ($_POST['vaccine1_time'] as   $value){
            if($i==0){
                $where = $where . '  `vaccine1_time` = "' . $value . '"';
            }else{

                if($i!=0)

                    $where = $where .  'OR `vaccine1_time` = "' . $value . '"';
            }

            $i++;
        }
        $where .=")";

    }
    $first = 0;


}


if ($_REQUEST['vaccine_type']) {
    if($_REQUEST['vaccine_type']!=0) {
        if ($first) {
            $where = "where";
            $where = $where . ' `vaccine_type` = "' . $_REQUEST['vaccine_type'] . '"';
        } else {
            $where = $where . ' and `vaccine_type` = "' . $_REQUEST['vaccine_type'] . '"';
        }
        $first = 0;
    }
}
if ($_REQUEST['block_id']) {
    if($_REQUEST['block_id']!=0) {
        if ($first) {
            $where = "where";
            $where = $where . ' `block` = "' . $_REQUEST['block_id'] . '"';
        } else {
            $where = $where . ' and `block` = "' . $_REQUEST['block_id'] . '"';
        }
        $first = 0;
    }
}


$getBookingInfo = $ModelCall->rawQuery("SELECT * FROM `covidvaccine_fam1` RIGHT JOIN covid_vaccine_form1 ON covid_vaccine_form1.PKid =covidvaccine_fam1.FKFormID " . $where . " GROUP BY id ORDER BY id DESC");
 // echo "SELECT * FROM `covidvaccine_fam1` RIGHT JOIN covid_vaccine_form1 ON covid_vaccine_form1.PKid =covidvaccine_fam1.FKFormID " . $where . " GROUP BY id ORDER BY id DESC";

if ($_REQUEST['download_csv']) {
    $getBookingInfo = $ModelCall->rawQuery("select * FROM `covidvaccine_fam1`  " . $where . " ORDER BY id");

    $filename = date('Y-m-d') . "_all_bookings.csv";         //File Name
// Create connection
    $fp = fopen('php://output', 'w');
    $headers  = array('0'=> "Full Name",
        '1'=> "Middle Name",
        '2'=> "Last Name",
        '3'=> "Mobile No",
        '4'=> "Email",
        '5'=> "DOB",
        '6'=> "Gender",
        '7'=> "Vaccine Date",
        '8'=> "Vaccine Time",
        '9'=> "Vaccine Type",
        '10'=> "First vaccine date",
        '11'=> "Block",
        '12'=> "House",
        '13'=> "Floor",
        '14'=> "Created Time",
        '15'=> "Registered By",
        /*'16'=> "Reference ID",
        '17'=> "Remark",*/
        '16'=> "Transaction Amount",
        '17'=> "Transaction ID",
        '18'=> "Transaction Source",
        '19'=> "Transaction Date",
        '20'=> "Mobile No used for transction",
        '21'=> "Status",);


    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename=' . $filename);
    fputcsv($fp, $headers);

    foreach ($getBookingInfo as $row1) {

        $d="select * FROM `covid_vaccine_form1` INNER JOIN covidvaccine_fam1 ON covid_vaccine_form1.PKid =covidvaccine_fam1.FKFormID  where covid_vaccine_form1.user_id=".$row1['user_id']." AND covidvaccine_fam1.updated_by=1";
        $getBookingInfo1 = $ModelCall->rawQuery($d);
        foreach($getBookingInfo1 as $c){
            $r=$c['fname'];
            $blockID=$c['block'];
$house=$c['house']; 
$floor=$c['floor'];
            if($blockID ==1)
            {
                $b="AG";
            }elseif($blockID ==2)
            {
                $b="BC";
            }elseif($blockID ==3)
            {
                $b="CC";
            }elseif($blockID ==4)
            {
                $b="DW";
            }elseif($blockID ==5)
            {
                $b="ES";
            }else{
                $b="Nil";
            }
        }
        if($row1['deleteFlag'] ==0)
        {
            $st="Live";
        }else{
            $st="Cancelled";
        }
        if($row1['transDate']!="")
        {
            $trans_date=date('d-m-Y', strtotime($row1['transDate']));
        }else{
            $trans_date="Nil";
        }
        $user_arr  = array(
            'Full Name'=>$row1['fname'],
            'Middle Name'=>$row1['mname'],
            'Last Name'=>$row1['lname'],
            'Mobile'=>$row1['mobile_no'],
             'EmailID'=>$row1['emailID'],
            'DOB'=>$row1['DOB'],
            'Gender'=>$row1['gender'],
            'vaccine date'=>date('d-m-Y', strtotime($row1['vaccine1_date'])),
            'vaccine time'=>$row1['vaccine1_time'],
            'vaccine No'=>$row1['vaccine_type'],
            'First vaccine'=>$row1['firstVaccine'],
             'Block'=>$b,
             'House'=>$house,
             'Floor'=>$floor,
              'Created Time'=>date("d-m-Y g:i a", strtotime($row1['updated_date'])),
            'created_by'=>$r, 
           /* 'Reference Id'=>$row1['referenceID'],
           'Remark'=>$row1['remark'],*/
           'transAmt'=>$row1['transAmt'],
           'transID'=>$row1['transID'],
           'tranSource'=>$row1['tranSource'],
           'tranDate'=>$trans_date,
           'transMob'=>$row1['transMob'],
            'Status'=>$st,);
//	print_r($user_arr);
//	die();
        fputcsv($fp, $user_arr);
    }
    if (fclose($fp)) {
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN . AdminDirectory; ?>assets/img/favicon.png">
    <title>Customers Management - <?php echo SITENAME; ?> admin</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN . AdminDirectory; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN . AdminDirectory; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo DOMAIN . AdminDirectory; ?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN . AdminDirectory; ?>assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo DOMAIN . AdminDirectory; ?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN . AdminDirectory; ?>assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="main-wrapper">
    <?php include(includes . 'Top_header.php'); ?>
    <?php include(includes . 'side_bar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xs-3">
                    <h4 class="page-title">Booking Management</h4>
                </div>
            </div>



            <div class="row filter-row">
                <form class="m-b-30" action="<?php echo DOMAIN . AdminDirectory; ?>vaccination_bookings.php" method="post"
                      enctype="multipart/form-data"><!--
 <div class="datepicker" data-date-format="mm/dd/yyyy"></div>-->
                    <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label class="control-label">Date</label>

                            <input type="text" id="v_date" name="v_date" placeholder="Select Date"
                                   value="<?php echo $_POST['v_date']; ?>" class="datepicker form-control col-md-6"  />
                        </div>
                    </div>

                    <div class="col-sm-2 col-xs-2">
                        <div class="form-group">
                            <label class="control-label">Time</label>
                            <select name="vaccine1_time[]" id="vaccine1_time"
                                    class="form-control" value="<?php echo $_POST['vaccine1_time']; ?>" multiple>
                                <?php $range = range(strtotime("10:00"), strtotime("16:00"), 15 * 60);  ?>

                                <option value="0">-- All --</option>
                                <?php foreach ($range as $time) {  ?>
                                    <option value="<?php echo date("g:i: A", $time); ?>" <?php if($_POST['vaccine1_time'] == date("g:i: A", $time)){ echo "selected"; }?> ><?php echo date("g:i: A", $time); ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-2">
                        <div class="form-group">
                            <label class="control-label">Dose</label>
                            <select name="vaccine_type" id="vaccine_type"
                                    class="form-control" value="<?php echo $_POST['vaccine_type']; ?>">

                                <option value='0' <?php if($_POST['vaccine_type'] =="0"){ echo "selected"; } ?>> All </option>
                                <option value='1' <?php if($_POST['vaccine_type'] =="1"){ echo "selected"; } ?>> Dose 1 </option>
                                <option value='2' <?php if($_POST['vaccine_type'] =="2"){ echo "selected"; } ?>> Dose 2 </option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-2 col-xs-2">
                        <div class="form-group">
                            <label class="control-label">Block</label>
                            <select class="form-control" name="block_id" id="block_id" value="<?php echo $_POST['block_id']; ?>"  oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  >
                                <option value='0' <?php if($_POST['block_id'] =="0"){ echo "selected"; } ?>> All </option>
                                <option value="1"  <?php if($_POST['block_id'] =="1"){ echo "selected"; } ?>>AG</option>
                                <option value="2" <?php if($_POST['block_id'] =="2"){ echo "selected"; } ?>>BC</option>
                                <option value="3" <?php if($_POST['block_id'] =="3"){ echo "selected"; } ?>>CC</option>
                                <option value="4" <?php if($_POST['block_id'] =="4"){ echo "selected"; } ?>>DW</option>
                                <option value="5" <?php if($_POST['block_id'] =="5"){ echo "selected"; } ?>>ES</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6" style="padding-top: 21px;">
                        <label class="control-label"> </label>
                        <button type="submit" class="btn-sm btn-success" style='height:40px;width:40px'>
                            <i class="fa fa-search"></i>
                        </button>

                        <button type="submit" name='download_csv' value ='1' style='height:40px;width:40px' class="btn-sm btn-success">  <i class="fa fa-download"></i></button>

                        <!--<div class="col-md-1">  <label class="control-label">&nbsp;<br></label><button type="submit" name='download_csv' value ='1' class="btn btn-success btn-block">  <i class="fa fa-download"></i></button> </div>
               -->
                    </div>
            </div>

            </form>
            <!--</div>-->
            <div class="row">
                <div class="col-md-12">
                    <?php if ($_REQUEST['actionResult'] != '') {
                        include('messageDisplay.php');
                    } ?>
                    <div class="table-responsive">

                        <table class="table table-striped custom-table" id="example">
                            <thead>
                            <tr>
                                <th><b> Name </b></th>
                                <th><b>Date</b></th>
                                <th><b>Time</b></th>
                                <th><b> Dose </b></th>
                                <th><b> Mobile </b></th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php



                            if (count($getBookingInfo) > 0) {
                                foreach ($getBookingInfo as $b) {
                                    $ModelCall->where("(user_id ='".$b['user_id']."')" );
                                    $ModelCall->orderBy("user_id","desc");
                                    $getUserInfo = $ModelCall->get("Wo_Users");
                                    ?>
                                    <tr id="row_">
                                        <td><?php echo $b["fname"]; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($b["vaccine1_date"])); ?></td>
                                        <td><?php echo $b["vaccine1_time"]; ?></td>
                                        <td> Dose:<?php echo $b["vaccine_type"]; ?>
                                            <span><?php if($b["vaccine_type"]==2){ echo $b["firstVaccine"];} ?> </span>
                                        </td>
                                        <td> <?php echo $b["mobile_no"]; ?></td>
                                        <td> <?php echo $getUserInfo[0]['user_name']; ?></td>
                                        <td> <?php if($b["deleteFlag"] ==0){ echo "Live"; }else{ echo "Cancelled"; } ?></td>
                                        <!--  <td>
                                            <div class="dropdown"><a href="#" class="action-icon dropdown-toggle"
                                                                     data-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu pull-right">

                                                    <li><a href="#" data-toggle="modal"
                                                           data-target="#view_booking<?php echo $b['id']; ?>"><i
                                                                    class="fa fa-edit m-r-5"></i> View</a></li>
                                                    <li><a href="#" data-toggle="modal"
                                                           data-target="#edit_booking<?php echo $b['id']; ?>"><i
                                                                    class="fa fa-edit m-r-5"></i> Print</a></li>
                                                    <li><a href="#" data-toggle="modal"
                                                           data-target="#delete_booking<?php echo $b['id']; ?>"><i
                                                                    class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>-->
                                        <td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu pull-right">

                                                    <li><a href="#" data-toggle="modal" data-target="#edit_customers<?php echo $getCustomerInfoVal['user_id'];?>"><i class="fa fa-edit m-r-5"></i> Edit</a></li>

                                                    <li><a href="#" data-toggle="modal" data-target="#delete_customers<?php echo $getCustomerInfoVal['user_id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                                </ul>
                                            </div></td>
                                    </tr>

                                    <?php include('view_booking.php'); ?>
                                    <?php include('delete_booking_confirm.php'); ?>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">There is no data available</td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <?php include('message_notification.php'); ?>
    </div>


</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/moment.min.js"></script>
<script type="text/javascript"
        src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN . AdminDirectory; ?>assets/js/app.js"></script>
<script>
    $(document).ready(function () {
        console.log("ready!");
        $('#example').dataTable({
            "order": [[5, "desc"]], //or asc
            "columnDefs": [{"targets": 5, "type": "date"}],
        });

        <?php if(isset($_REQUEST['block_id'])){?>
        $('#block_id').val('<?php echo $_REQUEST['block_id'];?>');

        <?php } ?>


        <?php if(isset($_REQUEST['user_type'])){?>
        $('#user_type').val('<?php echo $_REQUEST['user_type'];?>');

        <?php } ?>

        <?php if(isset($_REQUEST['vaccine_type'])){?>
        $('#vaccine_type').val('<?php echo $_REQUEST['vaccine_type'];?>');

        <?php } ?>

        <?php if(isset($_REQUEST['v_date'])){?>
        $('#v_date').val('<?php echo $_REQUEST['v_date'];?>');

        <?php } ?>
        <?php if(isset($_REQUEST['vaccine1_time'])){?>
        $('#vaccine1_time').val('<?php echo $_REQUEST['vaccine1_time'];?>');

        <?php } ?>




    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>

    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            multidate: true,
            clearBtn: true,
            todayHighlight: true
        });

        $('.datepicker').on('changeDate', function(evt) {
            console.log(evt.date);
        });

        $('.btn').on('click', function() {
            var the_date = $('.datepicker:first').datepicker('getDates');
            console.log(the_date);
        });
    });
</script>

</body>
</html>