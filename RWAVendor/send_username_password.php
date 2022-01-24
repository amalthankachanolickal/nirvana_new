<?php include('model/class.expert.php');

include('adminsession_checker.php');

$getblocks = $ModelCall->get("tbl_block_entry");



if($_POST['block_id']!='')

{

$ModelCall->where("(block_id ='".$ModelCall->utf8_decode_all($_POST['block_id'])."')" );

}

if($_POST['house_number_id']!='')

{

$ModelCall->where("(house_number_id ='".$ModelCall->utf8_decode_all($_POST['house_number_id'])."')" );

}

if($_POST['floor_number']!='')

{

$ModelCall->where("(floor_number ='".$ModelCall->utf8_decode_all($_POST['floor_number'])."')" );

}



// }else{

//   $ModelCall->where("admin_approval","0");

// }



$ModelCall->where("(client_id ='".$ModelCall->utf8_decode_all($getAdminInfo[0]['id'])."')" );


$ModelCall->where("user_status","Active");

$ModelCall->orderBy("user_id","desc");

$getDriverInfo = $ModelCall->get("Wo_Users",100);



?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">

<title>Customers Management - <?php echo SITENAME;?> admin </title>

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

</head>

<body>

<div class="main-wrapper">

  <?php include(includes.'Top_header.php');?>

  <?php include(includes.'side_bar.php');?>

  <div class="page-wrapper">

    <div class="content container-fluid">

      <div class="row">

        <div class="col-xs-3">

          <h4 class="page-title"> Send Username and Password</h4>

        </div>

       

      </div>

      <div class="row filter-row">

        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>send_username_password.php" method="POST" enctype="multipart/form-data">

        

        <div class="col-sm-3 col-xs-6">

          <div class="form-group form-focus">

            <label class="control-label">Block</label>

            <select class="form-control floating" id="block_id" name="block_id">

            <option value=""></option>

            <?php foreach($getblocks as $block){?>

              <option value="<?php echo $block['id'];?>"><?php echo $block['block_name'];?></option>

            <?php }?>

            

           </select>

           </div>

        </div>



        <div class="col-sm-3 col-xs-6">

          <div class="form-group form-focus">

            <label class="control-label">House #</label>

            <input type="text" class="form-control floating" id="house_number_id" name="house_number_id" value="<?php echo $_POST['first_name'];?>" />

          </div>

        </div>

        

        <div class="col-sm-3 col-xs-6">

          <div class="form-group form-focus">

            <label class="control-label">Floor Number</label>

            <select class="form-control floating" id="floor_number" name="floor_number">

            <option value=""></option>

            <option value="1">Ground Floor</option>

              <option value="2">First Floor</option>

              <option value="3">Second Floor</option>

              <option value="4">Third Floor</option>

              <option value="5">Fourth Floor</option>

            </select>

          </div>

        </div>

        

         <div class="col-sm-3 col-xs-6"> <button type="submit"  class="btn btn-success btn-block"> Search </button> </div>

        </form>

      </div>

      <div class="row">

<?php if( $_SESSION['mail_sent']!=""){?>

      <div class="alert alert-success alert-dismissible">

  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  <?php echo $_SESSION['mail_sent']; unset($_SESSION['mail_sent']);?>

</div>

<?php }?>



        <div class="col-md-12">

       

         <form class="m-b-30" id="formID" name="formID" action="<?php echo DOMAIN.AdminDirectory;?>controller/send_username_service.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

          <div class="table-responsive">

             <table class="table table-striped custom-table" id="example">

              <thead>

                <tr>

                <th>Select</th>

                  <th>Name</th>

                  <th>Unit No.</th>

                  <th>User Name</th>

                  <th>Password</th>

                 

                  <th>Type</th>

                <th>Status</th>

                  <th>Created</th>

                 <th >Admin Actions</th>

                  <th >Email Varified</th>

                </tr>

              </thead>

              <tbody>

 <?php 

$TotalIncentiveEarned=0;

if(count($getDriverInfo)>0){ 

foreach($getDriverInfo as $getCustomerInfoVal){ 

$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($getCustomerInfoVal['block_id'])."')" );

$ModelCall->orderBy("id","desc");

$getBlockInfo = $ModelCall->get("tbl_block_entry");



?>             

                <tr>

                <td><input type="checkbox" id="username" name="username[]" value="<?php echo $getCustomerInfoVal['user_name'];?>"></td>

                  <td>

                  

                  <a href="" class="avatar" style="text-align:center;">

				  <?php if($getCustomerInfoVal['profile_pics']!=''){ ?> <img class="avatar" src="<?php echo DOMAIN.AdminDirectory;?>customers/photo/<?php echo $getCustomerInfoVal['profile_pics'];?>"> <?php } else { ?>

				  <?php echo substr($getCustomerInfoVal['first_name'],0,1);?>

                  <?php } ?>

                  </a>

                    <h2><a href=""><?php echo ucwords($getCustomerInfoVal['user_title']);?> <?php echo ucwords($getCustomerInfoVal['first_name']);?> <?php echo ucwords($getCustomerInfoVal['middle_name']);?> <?php echo ucwords($getCustomerInfoVal['last_name']);?> </a><br><?php echo ucwords($getCustomerInfoVal['email']);?></h2></td>

                    <td> <?php echo ucwords($getBlockInfo[0]['block_code']);?>/<?php echo ucwords($getCustomerInfoVal['house_number_id']);?>/<?php echo ucwords($getCustomerInfoVal['floor_number']);?></td>

                

            <td><?php echo ucwords($getCustomerInfoVal['user_name']);?></td>

            <td><?php echo ucwords($getCustomerInfoVal['password']);?></td>

     <td>

                   <?php if($getCustomerInfoVal['user_type']==0){ ?> Landlord <?php }?> <?php if($getCustomerInfoVal['user_type']==1){ ?> Tenant <?php }?> <?php if($getCustomerInfoVal['user_resident_type']==0){ ?> (Residing in the society) <?php }?> <?php if($getCustomerInfoVal['user_resident_type']==1){ ?> (Non Resident) <?php }?>

	

                  </td>

              <td><?php echo ucwords($getCustomerInfoVal['user_status']);?></td>

              <td><?php echo ucwords($getCustomerInfoVal['created_date']);?></td>

     <td> <?php if($getCustomerInfoVal['admin_approval']==1){?> Approved<?php }?> 

    <?php if($getCustomerInfoVal['admin_approval']==-1){?> Rejected <?php }?>

    <?php if($getCustomerInfoVal['admin_approval']==0){?> Pending Approval<?php }?>

    

    </td>

    <td> <?php if($getCustomerInfoVal['email_verify']==1){?> Yes<?php }?> 

    

    <?php if($getCustomerInfoVal['email_verify']==0){?> NO <?php }?>

    

    </td>

   

   </tr>

                <?php } 

              } else {?>

                <tr><td colspan="7">There is no data available</td></tr>

                <?php } ?>

                

              </tbody>

            </table>

            <div class="col-md-6">  
            <button type="submit" id="btnSend"  class="btn btn-success btn-block">Send By Email & SMS </button></div>

          </div>

        </div>

      </div>

    </div>

    <?php include('message_notification.php'); ?>

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

<script>

$( document ).ready(function() {

$('#example').dataTable({searching: false

}); 

<?php if($_POST['block_id']!='')

{?>

$('#block_id').val('<?php echo $_POST['block_id'];?>');

<?php } else {?> 

  $('#block_id').val(''); 

  <?php } ?>

  <?php if($_POST['house_number_id']!='')

  {?>

  $('#house_number_id').val('<?php echo $_POST['house_number_id'];?>');

  <?php } else {?> 

    $('#house_number_id').val(''); 

    <?php } ?>



  <?php if($_POST['floor_number']!='')

{?>

$('#floor_number').val('<?php echo $_POST['floor_number'];?>');

<?php } else {?> 

  $('#floor_number').val(''); 

  <?php } ?>

  

 });



 function validateForm(){

  if ($("#formID input:checkbox:checked").length > 0)

{

    return true;

}

else

{

   // none is checked

   alert("Please select the user and then proceed.");

   return false;

}

 }

</script>

</body>

</html>

