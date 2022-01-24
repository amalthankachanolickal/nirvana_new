<div id="edit_customers<?php echo $getCustomerInfoVal['user_id'];?>" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h4 class="modal-title">Edit Customers</h4>
      </div>
      <div class="modal-body">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?php echo $getCustomerInfoVal['user_id'];?>" />
          <input type="hidden" name="ActionCall" value="EditCustomerExpert">
          <div class="row">
               <div class="col-lg-12 no-pdd pr-4px" style="">
              <div class="sn-field">
                <label>User Name <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="user_name" class="form-control" id="user_name" oninvalid="this.setCustomValidity('Enter User Name')"  oninput="this.setCustomValidity('')" required value="<?php echo $getCustomerInfoVal['user_name'];?>" placeholder="User Name">
               
              </div>
            </div>
            
            <div class="col-lg-3 no-pdd">
              <div class="sn-field">
                <label> Title <strong style="color:#FF0000;">*</strong></label>
                <select class="form-control" name="user_title" id="user_title" oninvalid="this.setCustomValidity('Select a Title')"  oninput="this.setCustomValidity('')"  required>
                  <option value="">Select </option>
                  <option value="Mr." <?php if($getCustomerInfoVal['user_title']=="Mr."){?> selected="selected" <?php } ?>>Mr. </option>
                  <option value="Mrs." <?php if($getCustomerInfoVal['user_title']=="Mrs."){?> selected="selected" <?php } ?>>Mrs. </option>
                  <option value="Miss." <?php if($getCustomerInfoVal['user_title']=="Miss."){?> selected="selected" <?php } ?>>Miss. </option>
                </select>
              
              </div>
            </div>
            <div class="col-lg-3 no-pdd pr-4px" style="">
              <div class="sn-field">
                <label> First Name <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="first_name" class="form-control" id="first_name" oninvalid="this.setCustomValidity('Enter First Name')"  oninput="this.setCustomValidity('')" required value="<?php echo $getCustomerInfoVal['first_name'];?>" placeholder="First Name">
               
              </div>
            </div>
            <div class="col-lg-3 no-pdd">
              <div class="sn-field">
                <label> Middle Name <strong style="color:#FF0000;"></strong></label>
                <input type="text" name="middle_name" class="form-control" id="middle_name" oninvalid="this.setCustomValidity('Enter Middle Name')"  oninput="this.setCustomValidity('')"  value="<?php echo $getCustomerInfoVal['middle_name'];?>" placeholder="Middle Name">
                <!-- <i class="la la-user"></i>-->
              </div>
            </div>
            <div class="col-lg-3 no-pdd">
              <div class="sn-field">
                <label> Last Name <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="last_name" class="form-control" id="last_name" oninvalid="this.setCustomValidity('Enter Last Name')"  oninput="this.setCustomValidity('')" required value="<?php echo $getCustomerInfoVal['last_name'];?>" placeholder="Last Name">
               
              </div>
            </div>
            <div class="col-lg-12 no-pdd">
              <div class="sn-field">
                <label> Block Name <strong style="color:#FF0000;">*</strong></label>
                <select class="form-control" name="block_id" id="block_id" readonly oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  required>
                  <option value="">Select a Block Name</option>
                  <?php 
                    $ModelCall->where("status", 1);
                    $ModelCall->where("client_id", 2);
                    $ModelCall->orderBy("block_name","asc");
                    $GetBlockList = $ModelCall->get("tbl_block_entry");
                    if($GetBlockList[0]>0){
                    foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
                    ?>
                  <option value="<?php echo strip_tags($GetBlockVal['id']); ?>"  <?php if($getCustomerInfoVal['block_id']==$GetBlockVal['id']){?> selected="selected" <?php } ?>><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
                  <?php } } } ?>
                </select>
             
              </div>
            </div>
            <div class="col-lg-6 no-pdd pr-4px" style="">
              <div class="sn-field">
                <label>House Number <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="house_number_id" class="form-control" id="house_number_id" oninvalid="this.setCustomValidity('Enter House Number')"  oninput="this.setCustomValidity('')" required onKeyPress="return isNumberKey(event);" maxlength="3"  value="<?php echo $getCustomerInfoVal['house_number_id'];?>" placeholder="Enter House Number" readonly>
                
              </div>
            </div>
            <div class="col-lg-6 no-pdd">
              <div class="sn-field">
                <label>Floor Number <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="floor_number" class="form-control" id="floor_number" required readonly  value="<?php echo $getCustomerInfoVal['floor_number'];?>" placeholder="Enter Floor Number">
               
              </div>
            </div>
            <!--<div class="col-lg-12 no-pdd">
              <div class="sn-field">
                <label>Email Address <strong style="color:#FF0000;">*</strong></label>
                <input type="email" name="user_email" id="user_email" onBlur="validateEmail(this);" oninvalid="this.setCustomValidity('Please Enter valid email')"  oninput="this.setCustomValidity('')" required placeholder="Email Address">
               
              </div>
            </div>-->
            <div class="col-lg-12 no-pdd">
              <div class="sn-field">
                <label> Member Type <strong style="color:#FF0000;">*</strong></label>
                <select class="form-control" name="user_type" id="user_type" oninvalid="this.setCustomValidity('Select Member Type')"  oninput="this.setCustomValidity('')" required>
                  <option value="">Select Member Type</option>
                  <option value="0" <?php if($getCustomerInfoVal['user_type']=="0"){?> selected="selected" <?php } ?>>Landlord</option>
                  <option value="1" <?php if($getCustomerInfoVal['user_type']=="1"){?> selected="selected" <?php } ?>>Tenant</option>
                </select>
              
              </div>
            </div>
            <div class="col-lg-12 no-pdd">
              <div class="sn-field">
                <label> Resident Type <strong style="color:#FF0000;">*</strong></label>
                <select class="form-control" id="user_resident_type" name="user_resident_type" oninvalid="this.setCustomValidity('Select Resident Type')"  oninput="this.setCustomValidity('')" required>
                  <option value="" selected>Select Resident Type</option>
                  <option value="0" <?php if($getCustomerInfoVal['user_resident_type']=="0"){?> selected="selected" <?php } ?>>Residing in the society</option>
                  <option value="1" <?php if($getCustomerInfoVal['user_resident_type']=="1"){?> selected="selected" <?php } ?>>Non Resident</option>
                </select>
               
              </div>
            </div>
              <div class="col-lg-6 no-pdd">
              <div class="sn-field">
                <label>Primary Phone Number <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="primary_phone_number" class="form-control" id="primary_phone_number" oninvalid="this.setCustomValidity('Enter Phone Number')"  oninput="this.setCustomValidity('')"  value="<?php echo $getCustomerInfoVal['phone_number'];?>" placeholder="Primary Phone Number">
               
              </div>
            </div>
              <div class="col-lg-6 no-pdd">
              <div class="sn-field">
                <label> Secondary Phone Number </label>
                <input type="text" name="secondary_phone_number" class="form-control" id="secondary_phone_number" oninvalid="this.setCustomValidity('Enter Secondary Phone Number')"  oninput="this.setCustomValidity('')"  value="<?php echo $getCustomerInfoVal['secondary_phone_number'];?>" placeholder="Secondary Phone Number">
               
              </div>
            </div>
              <div class="col-lg-6 no-pdd">
              <div class="sn-field">
                <label>Primary Email <strong style="color:#FF0000;">*</strong></label>
                <input type="text" name="primary_email" class="form-control" id="primary_email" oninvalid="this.setCustomValidity('Enter Email')"  oninput="this.setCustomValidity('')" required value="<?php echo $getCustomerInfoVal['email'];?>" placeholder="Primary Email">
               
              </div>
            </div>
              <div class="col-lg-6 no-pdd">
              <div class="sn-field">
                <label> Secondary Email </label>
                <input type="text" name="secondary_email" class="form-control" id="secondary_email" oninvalid="this.setCustomValidity('Enter Secondary Email')"  oninput="this.setCustomValidity('')"  value="<?php echo $getCustomerInfoVal['secondary_email'];?>" placeholder="Secondary Email">
               
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
