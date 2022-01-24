<?php include('model/class.expert.php');
include('adminsession_checker.php');
$ModelCall->where("client_id", 2);
$getBlocksManagementInfo = $ModelCall->get("tbl_block_entry");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Send Custom Mail to multiple users</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">
 <script src="https://cdn.tiny.cloud/1/o67chq5xvrqq39bb765xlss4kcz90i2wm7g5898kzue8wzq3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	 <script>
    tinymce.init({
        selector: '#content',
       plugins: 'link image code',
  relative_urls: false,
  convert_urls: false
      });
      
  </script>
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
       <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        <div class="col-md-12">
        <h3 class="page-title">Send Custom mail to multiple users</h3>
          <form  action="<?php echo DOMAIN.AdminDirectory;?>controller/send-mail-actions.php" method="post" enctype="multipart/form-data"  class="form-horizontal"  style="border:1px solid black;padding: 5px 5px;" onSubmit="return ValidateSubmitForm();">
          <input type="hidden" name="ActionCall" value="sending_emails">
            <input type="hidden" name="eid" value="<?php echo $getAdminInfo[0]['id'];?>">

            <input type="hidden" name="selectedblockids" id="selectedblockids" >
            <input type="hidden" name="selectedBlockNames" id="selectedBlockNames" >

            <input type="hidden" name="selectedMemberTypes" id="selectedMemberTypes" >
            <input type="hidden" name="selectedMemberTypesLabels" id="selectedMemberTypesLabels" >

            <input type="hidden" name="selectedMemberResiding" id="selectedMemberResiding" >
            <input type="hidden" name="selectedMemberResidingLabels" id="selectedMemberResidingLabels" >

            <input type="hidden" name="selectedMemberStatus" id="selectedMemberStatus" >
            <input type="hidden" name="selectedMemberStatusLabels" id="selectedMemberStatusLabels" >

                <div class="col-sm-12">
                    <div class="form-group">
                    <label class="control-label">Choose The Filters To Send Mail Notification: <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label  col-sm-3" for="email">Member Status:</label>
                    <div class="col-sm-9">
                    <label class="checkbox-inline"><input type="checkbox" name="memberStatus" value="Active">Active</label>
                    <label class="checkbox-inline"><input type="checkbox" value="DeActivated" name="memberStatus" >DeActivated</label>
                    <label class="checkbox-inline"><input type="checkbox" value="Suspended" name="memberStatus" >Suspended</label>
                    </div>
                </div>
                  <div class="form-group">
                    <label class="control-label  col-sm-3" for="email">Choose Member Type:</label>
                    <div class="col-sm-9">
                    <label class="checkbox-inline" ><input type="checkbox" name="memberType" value="0" >Owners</label>
                    <label class="checkbox-inline"><input type="checkbox" name="memberType"value="1">Tenant</label>
                    <!--<label class="checkbox-inline"><input type="checkbox" name="memberType" value="2">Admin</label>-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="blockid">Choose Block:</label>
                    <div class="col-sm-9">
                    <?php $i=1;
                    if(count($getBlocksManagementInfo)>0){ foreach($getBlocksManagementInfo as $getBlocksVal){ ?>    
                    <label class="checkbox-inline"><input type="checkbox" name="blockid" id="blockid<?php echo ucwords($getBlocksVal['id']);?>" value="<?php echo ucwords($getBlocksVal['id']);?>"/><?php echo ucwords($getBlocksVal['block_name']);?> - <?php echo ucwords($getBlocksVal['block_code']);?></label>
                    <?php }
                        } ?>
                    <label class="checkbox-inline"  style="margin-left: -1px !important;"><input type="checkbox" name="checkall" id="checkall" onClick="check_uncheck_checkbox(this.checked);">Select All</label>
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="control-label  col-sm-3" >Member:</label>
                    <div class="col-sm-9">
                    <label class="checkbox-inline"><input type="checkbox" name="Member" value="0">Residing in the society</label>
                    <label class="checkbox-inline"><input type="checkbox" name="Member" value="1"> Not residing in the society</label>
                  
                    </div>
                </div>
                
                  <div class="form-group">
                    <label class="control-label  col-sm-3" >Type of Property:</label>
                    <div class="col-sm-9">
                    <label class="checkbox-inline"><input type="checkbox" name="prop_type" value="PLOTS">Plots</label>
                    <label class="checkbox-inline"><input type="checkbox" name="prop_type" value="VILLAS">Villas</label>
                    <label class="checkbox-inline"><input type="checkbox" name="prop_type" value="FLATS">Flats</label>
                    </div>
                </div>
                
                  <div class="form-group">
                    <label class="control-label  col-sm-3">Mail To :</label>
                    <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" name="mail_to" value="1">Only Primary Ids </label>
                    <label class="radio-inline"><input type="radio" name="mail_to" value="2">Primary + Secondary Ids</label>
                    <label class="radio-inline"><input type="radio" name="mail_to" value="3">All Ids</label>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="control-label  col-sm-3">User Logged in First Time :</label>
                    <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" name="userFirstLoggedIn" value="NA" checked>NA</label>
                    <label class="radio-inline"><input type="radio" name="userFirstLoggedIn" value="1">Yes</label>
                    <label class="radio-inline"><input type="radio" name="userFirstLoggedIn" value="0">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label  col-sm-3" >Email Verified:</label>
                    <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" name="emailVerified" checked value="NA">NA</label>
                    <label class="radio-inline"><input type="radio" name="emailVerified" value="1">Yes</label>
                    <label class="radio-inline"><input type="radio" name="emailVerified" value="0">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label  col-sm-3" >Admin Approved:</label>
                    <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" name="adminApproved"  checked value="NA">NA</label>
                    <label class="radio-inline"><input type="radio" name="adminApproved" value="1" >Yes</label>
                    <label class="radio-inline"><input type="radio" name="adminApproved" value="0">No</label>
                    </div>
                </div>
               
               <div class="form-group">
                    <label class="control-label  col-sm-3" >Covid vaccine Registered:</label>
                    <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" name="covidVaccineRegistered"  checked value="NA">NA</label>
                    <label class="radio-inline"><input type="radio" name="covidVaccineRegistered" value="1" >Yes</label>
                    <label class="radio-inline"><input type="radio" name="covidVaccineRegistered" value="0">No</label>
                    </div>
                </div>
                
                  <div class="form-group">
                    <label class="control-label  col-sm-3" >Other Groups :</label>
                    <div class="col-sm-9">
                     <div  class="col-sm-3 checkbox-inline"> <input type="checkbox" name="mail_notification[]" value="TestMail">Test Mail Tech</div>
                  <div  class="col-sm-4 checkbox-inline"> <input type="checkbox" name="mail_notification[]"   title="<?php echo $getAdminInfo[0]['client_google_group_mail'];?>" value="Group">Google Group  <a href="settings.php" target="_blank">(View/Edit)</a> </div>
                    <div  class="col-sm-3 checkbox-inline">  <input type="checkbox" name="mail_notification[]" value="CRM"  title="<?php echo $getAdminInfo[0]['office_crm_email'];?>" > CRM <a href="settings.php" target="_blank">(View/Edit)</a>  </div>
                  <div  class="col-sm-3 checkbox-inline"   style="margin-left: -1px !important;"><input type="checkbox" name="mail_notification[]" value="Marketing" > Marketing <a href="settings.php" target="_blank">(View/Edit)</a>  </div>
                  <div  class="col-sm-4 checkbox-inline">   <input type="checkbox" name="mail_notification[]" value="OfficeBearers" > Office Bearers   <a href="team_management.php" target="_blank">(View/Edit )</a> </div>
                  <div  class="col-sm-3 checkbox-inline">  <input type="checkbox" name="mail_notification[]" value="EC"  > EC  <a href="EC_management.php" target="_blank">(View/Edit)</a></div>
                
                  <div  class="col-sm-3 checkbox-inline"   style="margin-left: -1px !important;"><input type="checkbox" name="mail_notification[]" value="Accounts" > Accounts <a href="settings.php" target="_blank">(View/Edit)</a> </div>
                  <div  class="col-sm-3 checkbox-inline"><input type="checkbox" name="mail_notification[]" value="Office" > Office.NRWA <a href="settings.php" target="_blank">(View/Edit)</a> </div>
                 
                  
                    </div>
                </div>
                
                  <div class="form-group">
                    <div class="col-lg-10 no-pdd" id="onlyaplfortenant">
                        <label>Any Other Email id : (use comma to separate more than one emails)<span class="text-danger"></span></label>
                        <input class="form-control" name="othermails" id="othermails" type="email" multiple pattern="^([\w+-.%]+@[\w-.]+\.[A-Za-z]{2,4},*[\W]*)+$" value="" />
                     </div>
                </div>
                
                <!--<div class="form-group">-->
                <!--<label class="control-label  col-sm-3" for="email">Mail Type: <span class="text-danger">*</span></label>-->
                <!--    <div class="col-sm-4">-->
                <!--        <select class="form-control" id="sel2" name="mail_notification1">-->
                <!--            <option value="formate1">User Info</option>-->
                <!--            <option value="formate2">Verify Email ID</option>-->
                <!--            <option value="formate3">Inform Admin Approved</option>-->
                <!--            <option value="formate4">Custom Email</option>-->
                <!--        </select>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="form-group">
                    <div class="col-lg-10 no-pdd" id="onlyaplfortenant">
                        <label>Subject <span class="text-danger"></span></label>
                        <input class="form-control" name="subject" id="subject" required/>
                     </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 no-pdd" id="onlyaplfortenant2">
                     <label class="control-label">Mail Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="5" id="content" name="content" ></textarea>
                    </div>
                </div>
                <div class="form-group" id="onlyaplfortenant3">
                    <div class="col-lg-10 no-pdd" >
                        <label>Add Attachment (if any)  <span class="text-danger"></span></label>
                        <input class="form-control" name='files[]' type='file'  onchange="CheckFileSize(this);" multiple />
                    </div>
                    <div class="col-lg-2 no-pdd" >
                        <button class="btn btn-success btn-sm" type="button" id="add" title='Add new file' style="margin-top:25px;"/>+</button>
                    </div>
                </div>
                <div class="form-group" id="onlyaplfortenant4">
                    <div class="col-lg-10 no-pdd" >
                        <label>Select From Address  <span class="text-danger"></span></label>
                      <select class="form-control" id="selfrom" name="selfrom" onchange="getfromValue();">
                        <option value="<?php echo $getAdminInfo[0]['client_office_email'];?>">Office NRWA - <?php echo $getAdminInfo[0]['client_office_email'];?></option>
                        <option value="<?php echo $getAdminInfo[0]['client_accountant_email'];?>">Accounts - <?php echo $getAdminInfo[0]['client_accountant_email'];?></option>
                        <option value="<?php echo $getAdminInfo[0]['office_crm_email'];?>">CRM - <?php echo $getAdminInfo[0]['office_crm_email'];?></option>
                        <option value="<?php echo $getAdminInfo[0]['client_marketing_mail'];?>">Marketing - <?php echo $getAdminInfo[0]['client_marketing_mail'];?></option>
                        <option value="<?php echo $getAdminInfo[0]['office_ec_update_email'];?>">EC Updates - <?php echo $getAdminInfo[0]['office_ec_update_email'];?></option>
                        <!--<option value="<?php echo $getAdminInfo[0]['office_website_email'];?>">Website Admin - <?php echo $getAdminInfo[0]['office_website_email'];?></option>-->
                      </select>
                    </div>
                   
                </div>   
             </div>
            
            <div class="row">
              <div class="col-sm-12 text-center m-t-20">
                <button type="submit" class="btn btn-primary">Send Email</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php include('message_notification.php'); ?>
  </div>
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
<script>
//     $("#sel2").change(function() {
//   if ($(this).val() == "formate4") {
//     $('#onlyaplfortenant').show();
//     $('#subject').attr('required', '');
//     $('#subject').attr('data-error', 'This field is required.');
//     $('#onlyaplfortenant2').show();
//     $('#tinymice').attr('required', '');
//     $('#tinymice').attr('data-error', 'This field is required.');
//       $('#onlyaplfortenant3').show();
    
//  } else {
//     $('#onlyaplfortenant').hide();
//     $('#subject').removeAttr('required');
//     $('#subject').removeAttr('data-error');
//     $('#onlyaplfortenant2').hide();
//     $('#tinymice').removeAttr('required');
//     $('#tinymice').removeAttr('data-error');
//       $('#onlyaplfortenant3').hide();
   
//   }
// });
// $("#sel2").trigger("change"); 

function ValidateSubmitForm(){
    
      if (tinymce.EditorManager.get('content').getContent() === '') {
            alert('Mail Content can not be empty.');
            return false;
        }
    
    //return false;
    
    var selectedBLocks = new Array();
    var selectedBLocksLabels = new Array();
    
    var selectedOthers = new Array();
    var selectedOthersLabels = new Array();
    
      $('input[name="mail_notification[]"]:checked').each(function() {
            selectedOthers.push(this.value);
            selectedOthersLabels.push($(this).parent().text());
        });
        
       // alert(selectedOthers);
    
        $('input[name="blockid"]:checked').each(function() {
            selectedBLocks.push(this.value);
            selectedBLocksLabels.push($(this).parent().text());
        });

  
    var selectedMemTypes = new Array();
    var selectedMemberTypesLabels = new Array();
        $('input[name="memberType"]:checked').each(function() {
            selectedMemTypes.push(this.value);
            selectedMemberTypesLabels.push($(this).parent().text());
        });
        
        
   // alert(selectedMemberTypesLabels);
//   if(selectedMemTypes.length==0){
//       alert("Please select at least one Member Type."); 
//       window.scrollTo(0, 0);

//       return false;
//   }

    var selectedMembers = new Array();
    var selectedMemberLabels = new Array();
        $('input[name="Member"]:checked').each(function() {
            selectedMembers.push(this.value);
            selectedMemberLabels.push($(this).parent().text());
        });

//  if(selectedMembers.length==0){
//       alert("Please select at least one of the option  Residing /Not Residing."); 
//       window.scrollTo(0, 0);

//       return false;
//   }

    var selectedMemStatus = new Array();
    var selectedMemStatusLabels = new Array();
        $('input[name="memberStatus"]:checked').each(function() {
            selectedMemStatus.push(this.value);
            selectedMemStatusLabels.push($(this).parent().text());
        });

// if(selectedMemStatus.length==0){
//       alert("Please select at least one Member Status."); 
//       window.scrollTo(0, 0);

//       return false;
//   }

 if(selectedMemStatus.length==0 && selectedOthers.length==0){
      alert("Please select at least One Member Status or any one from Other Group"); 
      window.scrollTo(0, 0);

      return false;
   }
   

   $("#selectedblockids").val(JSON.stringify(selectedBLocks));
   $("#selectedMemberTypes").val(JSON.stringify(selectedMemTypes));
   $("#selectedMemberResiding").val(JSON.stringify(selectedMembers));
   $("#selectedMemberStatus").val(JSON.stringify(selectedMemStatus));

    $("#selectedBlockNames").val(JSON.stringify(selectedBLocksLabels));
   $("#selectedMemberTypesLabels").val(JSON.stringify(selectedMemberTypesLabels));
   $("#selectedMemberResidingLabels").val(JSON.stringify(selectedMemberLabels));
   $("#selectedMemberStatusLabels").val(JSON.stringify(selectedMemStatusLabels));

   return true;
}



function check_uncheck_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="blockid"]').each(function() { 
			this.checked = true; 
		});
	} else {
		$('input[name="blockid"]').each(function() {
			this.checked = false;
		});
	}
}

// Append/Add new row
   $('#onlyaplfortenant3').on('click', "#add", function(e) {
	$('#onlyaplfortenant3').append('<div class="col-lg-10 no-pdd" ><label> Next File : <span class="text-danger"></span></label><input class="form-control" name="files[]" type="file" multiple /></div><div class="col-lg-2 no-pdd" ><button type="button"  class="btn btn-danger btn-sm" id="delete" title="Delete file" style="margin-top: 25px;">-</button>');
	e.preventDefault();
   });
			
   // Delete row
   $('#onlyaplfortenant3').on('click', "#delete", function(e) {
	if (!confirm("Are you sure you want to delete this file?"))
	return false;
	$(this).parent('div').remove();
	$("#onlyaplfortenant3").contents().last().remove();
	console.log( $(this).prev().prev());
	 $(this).prev().remove();
	e.preventDefault();
   });
   
   function CheckFileSize(target){
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','txt','csv','pdf','doc','docx','xls','xlsx','ppt','tif'];
        console.log(target.files[0].name);
        var filename= target.files[0].name;
        
          if ($.inArray(filename.split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
             	target.value = '';
            	return false;
        }
        
       
       if (target.files && target.files[0]) {
        console.log(target.files[0].size);
      /*Maximum allowed size in bytes
        2MB Example
        Change first operand(multiplier) for your needs*/
      const maxAllowedSize = 2 * 1024 * 1024;
      if (target.files[0].size > maxAllowedSize) {
      	// Here you can ask your users to load correct file
       	target.value = '';
       	alert("Max File size allowed is 2MB");
       	return false;
      }
  }
   }
   
   function getfromValue(){
       
       console.log( $('#selfrom').val());
   }
</script>
</body>
</html>