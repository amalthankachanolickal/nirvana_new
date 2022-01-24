<style type="text/css">
#display-error
{
	width: 400px;
    border: 1px solid rgb(211, 0, 0);
    padding: 5px;
    margin-bottom: 20px !important;
    border-radius: 1px;
    margin: 0 auto;
    font-family: Arial;
    font-size: 11px;
    text-transform: uppercase;
    background-color: rgb(211, 0, 0);
    color: #fff;
    text-align: center;
}

.imgcalling
{
	float: left; 
}

#display-success
{
	width: 400px;
	border: 1px solid #D8D8D8;
	padding: 10px;
	margin:0 auto;
	border-radius: 5px;
	font-family: Arial;
	font-size: 11px;
	text-transform: uppercase;
	background-color: #048c04;
    color: #ffffff;
	text-align: center;
	margin-bottom:20px !important;
}

#display-success img
{
	position: relative;
	bottom: -3px;
}
</style>

<?php if($_REQUEST['actionResult']=='updatesuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Status updated successfully.</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='invalidFiletype') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" />Only upload Excel Files, Not Valid File Type </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='viruserror') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Please fill all required field. </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='drivererror') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Duplicate Driver entry are not allowed. </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='driversuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Driver has been successfully saved</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='documentsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Document has been successfully uploaded</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='doctoraddsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Doctor data has been successfully uploaded</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='doctorupsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Doctor data has been successfully updated</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='someerror') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Something went wrong !</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='documentupdatesuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Document has been successfully updated</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='tripassign') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Trip has been successfully assigned to selected driver</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='tripnocomplete') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Selected driver did not completed previous trip yet </div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='asuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Status has been successfully changed</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='rsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Status has been successfully changed</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='emailsmssuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Email and SMS successfully Sent</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='pdfgenerated') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> PDF genereted successfully</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='pdfgeneratedtrigger') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> PDF generatio Started  successfully, it will take some time to complete. You will be updated via email.</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='customerasuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Successfully Saved Changes</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='customeraddsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Successfully User Added</div>
<?php } ?>



<?php if($_REQUEST['actionResult']=='vehicleassignPending') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Please assign vehicle to selected driver </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='dsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Selected Record has been successfully deleted</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='tripsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Trip has been successfully added/updated</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='settingsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Company Information has been successfully updated</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='clientsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Client has been successfully added/updated</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='expensesuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Expense has been successfully added/updated</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='profilesuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Profile has been successfully updated</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='driversalarysuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Salary has been successfully paid</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='driversalaryerror') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> You have already paid selected month salary </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='AttachError') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> Please attach a file to upload. </div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='banksuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Bank Information has been successfully added</div>
<?php } ?>


<?php if($_REQUEST['actionResult']=='bankerror') { ?>
<div id="display-error"> <img src="<?php echo DOMAIN.AdminDirectory;?>error.png" class="imgcalling"  alt="Error" /> This Bank Information already added </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='invoicesuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" />Invoice has been successfully added</div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='carsubmitsussess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Submited successfully </div>
<?php } ?>

<?php if($_REQUEST['actionResult']=='carstickersussess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Car Sticker Number Added Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='nouserec') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />No User found with given house number and email </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='moreoneuserec') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />More than one  User found with given house number and email </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='ecsuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />User Added Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='categorysuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Category Added Successfully</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='subcategorysuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Subcategory Added Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='subadminsuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Subadmin Added Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='allotadminsuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Subadmin Alloted Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='removecategorysuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Category Removed Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='removesubcategorysuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Subcategory removed Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='removesubadminsuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Subadmin removed Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='resolvedsuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Complaint resolved Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='emailaddsuccess') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Email Added Successfully </div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='emailtwoalreadyexists') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Email Two already exists in Google group</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='emailthreealreadyexists') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Email Three already exists in Google group</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='emailonealreadyexists') { ?>
<div id="display-success"> <img src="correct.png" class="imgcalling"   />Email One already exists in Google group</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='categoryalreadyexists') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Category Already Exists</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='subcategoryalreadyexists') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" />Subcategory Already Exists</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='subadminalreadyexists') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Subadmin Already Exists</div>
<?php } ?>
<?php if($_REQUEST['actionResult']=='actionsuccess') { ?>
<div id="display-success"> <img src="<?php echo DOMAIN.AdminDirectory;?>correct.png" class="imgcalling"  alt="Success" /> Action Performed Sucessfully.</div>
<?php } ?>
