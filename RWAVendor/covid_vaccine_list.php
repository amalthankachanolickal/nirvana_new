<?php include('model/class.expert.php');
include('adminsession_checker.php');
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
								<h4 class="page-title">Covid Vaccine Registers List</h4>
							</div>
							
							<div class="row">
							</div>
							<div class="row">
								<div class="col-md-12">
									<?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
									<div class="table-responsive">
										
										<table class="table table-striped custom-table datatable">
											<thead>
												<tr>
													
													<th>Name</th>
													<th>Email</th>
													<th>Mobile</th>
													<th>Age</th>
												<!--	<th>Gender</th>-->
													<!--<th>Special Category</th>-->
													<th>Document #</th>
												<!--	<th>Document</th>-->
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php
												$getCovidVaccineInfo = $ModelCall->get("covid_vaccine_form");
												$c=1;
												foreach($getCovidVaccineInfo as $covidvaccine){ ?>
												<tr>
													<td><?php echo $covidvaccine["title"]." ".$covidvaccine["fname"]." ".$covidvaccine["mname"]." ".$covidvaccine["lname"]?></td>
													<td><?php echo $covidvaccine["email"]?></td>
													<td><?php echo $covidvaccine["mobile"]?></td>
													<td><?php echo $covidvaccine["age"]?></td>
												<!--	<td><?php echo $covidvaccine["gender"]?></td>-->
													<!--<td><?php echo $covidvaccine["special_category"]?></td>-->
													<td><?php echo $covidvaccine["document_number"]?></td>
												<!--	<td><a href="../covid_vaccine_docs/<?php echo $covidvaccine["document_path"] ?>" target="_blank">click here</a></td>
												-->	<td><div class="dropdown"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" data-toggle="modal" data-target="#edit_covid_user<?php echo $covidvaccine['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
													    <li><a href="covid_list_family_details.php?user_id=<?php echo $covidvaccine['user_id'];?>" ><i class="fa fa-eye m-r-5"></i> View Details</a></li>
												    </ul>
												</div></td>
											</tr>
											<?php
											$c++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</form>
				
				<?php include('message_notification.php'); ?>
			</div>
			<?php include('edit_covid_vaccine_user.php'); ?>
			
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