<?php include('model/class.expert.php');
include('adminsession_checker.php');
$user_id = $_GET['user_id'];
//$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$sno=1;
//$ModelCall->where("assigned_to_id", $getAdminInfo[0]['id']);
?>
<!DOCTYPE html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
		<title>Covid Vaccine List</title>
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
		.info{
		border: solid;
		padding: 10px 20px 10px;
		border-radius: 10px;
		margin: 0px 10px 10px;
		border-color: white;
		box-shadow: inset 4px -2px 20px 0px #647372f5;
		background-color: #fff;
		font-weight:700;
		font-size:20px;
		color: #7b6900;
		}
		</style>
	</head>
	<body>
		<div class="main-wrapper">
			<?php include(includes.'Top_header.php');?>
			<?php include(includes.'side_bar.php');?>
			<div class="page-wrapper">
				<div class="content container-fluid">
					<form method="post">
						<div class="row">
							<div class="col-xs-4">
								<h4 class="page-title">Family Members</h4>
								
							</div>
							<div class="col-xs-8 text-right m-b-30"> 
                                <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_covid_fam"><i class="fa fa-plus"></i> Add Family Member</a> 
                            </div>
							<div class="row">
								<div class="col-sm-12">
								    <center><?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?></center>
									<div class="card">
										<ul class="list-group list-group-flush">
											<?php
											$ModelCall->where(user_id, $user_id);
											$getCovidVaccineInfo = $ModelCall->get("covidvaccine_fam");
											$c=1;
											foreach($getCovidVaccineInfo as $covidvaccine){ ?>
											<li class="list-group-item">
												
												<div class="row">
													<h4>&nbsp;&nbsp;Member <?php echo $c; ?></h4>
												</div>
												<div class="row">
													<div class="col-sm-3">
														<div class="form-group">
															<label class="control-label">Title <span class="text-danger">*</span></label>
															<select name="title" id="title" onchange="getGender(document.getElementById('title').value)" class="form-control" readonly>
																<option value="">Title</option>
																<option value="Mr." <?Php if($covidvaccine["title"] == 'Mr.'){ ?> selected <?php } ?>>Mr.</option>
																<option value="Miss." <?Php if($covidvaccine["title"] == 'Miss.'){ ?> selected <?php } ?>>Miss.</option>
																<option value="Mrs." <?Php if($covidvaccine["title"] == 'Mrs.'){ ?> selected <?php } ?>>Mrs.</option>
															</select>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label class="control-label">First Name <span class="text-danger">*</span></label>
															<input type="text"  name="fname" id="fname" value="<?php echo $covidvaccine["fname"];?>" placeholder="First Name" class="form-control" readonly required>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label class="control-label">Middle Name <span class="text-danger"></span></label>
															<input type="text"  name="mname" id="mname"  placeholder="Middle Name" readonly class="form-control">
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label class="control-label">Last Name <span class="text-danger">*</span></label>
															<input type="text"  name="lname" id="lname" value="<?php echo $covidvaccine["lname"];?>" placeholder="Last Name" class="form-control" readonly required>
														</div>
													</div>
													
													
												</div>
												
												
												
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label class="control-label">Dob <span class="text-danger">*</span></label>
															<input type="text" name="dob" id="dob" value="<?php echo $covidvaccine['dob']; ?>" class="form-control"
															onchange="calculateAge(document.getElementById('dob').value)" onfocus="this.type='date'" max="<?php echo date('Y-m-d') ?>"
															min="<?php echo date('1900-01-01') ?>" step="1" placeholder="Date of Birth" readonly required>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label class="control-label">Age <span class="text-danger">*</span></label>
															<input type="number"  name="age" id="age" value="<?php echo $covidvaccine['age']; ?>" placeholder="Age" class="form-control" readonly required>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label class="control-label">Gender<span class="text-danger">*</span></label>
															<input type="text"  name="gender" id="gender" value="Female" placeholder="Gender" class="form-control" readonly required>
														</div>
													</div>
												</div>
												
												
												
											</li>
											<?php
											$c++;
											} ?>
										</ul>
									</div>
								</div>
							</div>
							
						</div>
					</form>
					
					<?php include('message_notification.php'); ?>
				</div>
				<?php include('add_covid_fam_member.php'); ?>
				
			</div>
			<div class="sidebar-overlay" data-reff="#sidebar"></div>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
			<link rel="stylesheet" href="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.css">
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/jquery-ui.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
			<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
			<script>
			
			
			</script>
		</body>
	</html>