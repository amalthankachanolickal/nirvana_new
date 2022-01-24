<?php include('config.php');

$from_date_error="";
$end_date_error="";
$message="";

 $sql = "SELECT id, from_date, end_date FROM tbl_vaccination_settings WHERE id = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = 1;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                
                    mysqli_stmt_bind_result($stmt, $id, $from_date, $end_date);
                    if(mysqli_stmt_fetch($stmt)){
                         $f_date=$from_date;
                          $end=$end_date;  
                
        }
        
    }
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($con);
}
                            
if($_SERVER["REQUEST_METHOD"] == "POST") {

// Check if username is empty
    if (empty(trim($_POST["frm_date"]))) {
        $from_date_error = "Please enter From date.";
    } else {
        $frm_date = date('Y-m-d', strtotime($_POST["frm_date"]));
    }

    if (empty(trim($_POST["end_date"]))) {
        $end_date_error = "Please enter End date.";
    } else {
        $end_date = date('Y-m-d', strtotime($_POST["end_date"]));
    }
    if(empty($end_date_error) && empty($from_date_error))
    {
        $sql = "UPDATE tbl_vaccination_settings SET from_date='$frm_date', end_date='$end_date' WHERE id=1;";
        $con->query($sql);
        $message="Updated Successfully";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
    <title>Vaccination Management - RWA</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>

    <![endif]-->
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
<div class="main-wrapper">
    <?php include('Top_header.php');?>
    <?php include('side_bar.php');?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xs-4">Vaccination Settings</h4>
                </div>
                <!--<div class="col-xs-8 text-right m-b-30"> <a href="#" class="btn btn-primary pull-right rounded" data-toggle="modal" data-target="#add_Blocks"><i class="fa fa-plus"></i> Add Block</a>
                    </div>-->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center;color: green;"> <?php echo $message; ?></p>
                    <form class="m-b-30" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ActionCall" value="AddUpdateBlocks">
                        <input type="hidden" name="eid" value="">
                        <input type="hidden" name="client_id" value="2">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">From date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="frm_date" id="frm_date" min="<?php echo date('d-m-Y');?>"  value="<?php echo $f_date;?>" >
                                    <span class="error"><?php echo $from_date_error; ?></span>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" required="" value="<?php echo $end; ?>">
                                    <span class="error"><?php echo $end_date_error; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
