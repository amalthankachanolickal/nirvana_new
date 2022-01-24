<div id="membership_status_change_popup_<?php echo $getDocumentVal['serialno'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Application Details :</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/membership_application_controller.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm('<?php echo $getDocumentVal['serialno'];?>');">
            <input type="hidden" name="eid" value="<?php echo $getDocumentVal['serialno'];?>">
            <input type="hidden" name="actionCall" value="ChangeStatus">
             <input type="hidden" name="approved_by" value="<?php echo $getAdminInfo[0]['id'];?>" />
            
              <div class="col-md-12">
                  <?php if($getDocumentVal['photograph_user'] <> '' && $getDocumentVal['photograph_user'] <> NULL){ ?>
                <div class="row">
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                     <a href="<?=DOMAIN.'/'.$getDocumentVal['photograph_user'];?>"  target="_blank"> <img src="<?=DOMAIN.'/'.$getDocumentVal['photograph_user'] ?>" width="150px;" style="vertical-align: middle;align-self: center;"></a>
                 </div>
                </div>  
                <?php } ?>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>House Number : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Member Name : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                 <?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?> </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Email : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                 <?= $getDocumentVal['emailid_1'] ?> </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Mobile : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                 <?= $getDocumentVal['isd_1'].' '.$getDocumentVal['mobile'] ?> </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Address : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?php
                    $Address = $getDocumentVal['address_corres_1'];
                    if($getDocumentVal['address_corres_2'] <> '' && $getDocumentVal['address_corres_2'] <> NULL){
                       $Address .=  ', '.$getDocumentVal['address_corres_2'];
                    }
                    if($getDocumentVal['city'] <> '' && $getDocumentVal['city'] <> NULL){
                      $Address .=  ', '.$getDocumentVal['city'];
                    }
                    if($getDocumentVal['state'] <> '' && $getDocumentVal['state'] <> NULL){
                       $Address .=  ', '.$getDocumentVal['state']; 
                    }
                    if($getDocumentVal['pin'] <> '' && $getDocumentVal['pin'] <> NULL){
                        $Address .=  ', '.$getDocumentVal['pin']; 
                    }
                    echo $Address;
                    ?>
                 </div>
                </div>
                
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Documents Submitted : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                     
                   <div class="col-3" style="float:left; width:200px"> Proof Of Identity :</div> <div class="col-3" style="float:left;width:100px"><?php if ($getDocumentVal['proof_of_identity']!='') {?> 
                   <a href="<?= SITE_URL ?><?= $getDocumentVal['proof_of_identity'] ?>"  target="_blank">Submitted</a><?php } else {?>
                   Not Submitted 
                   <?php } ?></div>
                    <br><div class="col-3" style="float:left; width:200px">
                      Proof Of Address : </div> <div class="col-3" style="float:left;width:100px"><?php if ($getDocumentVal['proof_of_address']!='') {?> 
                   <a href="<?= SITE_URL ?><?= $getDocumentVal['proof_of_address'] ?>" target="_blank">Submitted</a><?php } else {?>
                   Not Submitted 
                   <?php } ?></div>
                   <br> <div class="col-3" style="float:left; width:200px">
                    Proof Of D.O.B : </div> <div class="col-3" style="float:left;width:100px"><?php if ($getDocumentVal['proof_of_dob']!='') {?> 
                   <a href="<?= SITE_URL ?><?= $getDocumentVal['proof_of_dob'] ?>" target="_blank">Submitted</a><?php } else {?>
                   Not Submitted 
                   <?php } ?></div>
                   <br>  <div class="col-3" style="float:left; width:200px">
                    Proof Of Ownership : </div> <div class="col-3" style="float:left;width:100px"><?php if ($getDocumentVal['ownership_proof']!='') {?> 
                   <a href="<?= SITE_URL ?><?= $getDocumentVal['ownership_proof'] ?>" target="_blank">Submitted</a><?php } else {?>
                   Not Submitted 
                   <?php } ?></div>
                   <br>  
                   <div class="col-3" style="float:left; width:200px">
                    Photograph : </div> <div class="col-3" style="float:left;width:100px"><?php if ($getDocumentVal['photograph_user']!='') {?> 
                   <a href="<?= SITE_URL ?><?= $getDocumentVal['photograph_user'] ?>"  target="_blank">Submitted</a><?php } else {?>
                   Not Submitted 
                   <?php } ?> </div>
                
                
                  </div>
                </div> 
                <br>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Payment Details : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?php if($getDocumentVal['mode_of_payment_1'] <> '' && $getDocumentVal['mode_of_payment_1'] <> NULL){ ?>      
                  <div class="col-3" style="float:left; width:200px"> Payment Mode 1 : </div> <div class="col-3" style="float:left;width:100px"><?php echo $getDocumentVal['mode_of_payment_1'] ?></div>
                   <br>
                  <div class="col-3" style="float:left; width:200px"> Reference No : </div> <div class="col-3" style="float:left;width:100px"><?php echo $getDocumentVal['reference_number_1'] ?></div>
                   <br>
                 <div class="col-3" style="float:left; width:200px">  Payment Date : </div> <div class="col-3" style="float:left;width:100px"><?php echo $getDocumentVal['payment_date_1'] ?></div>
                   <br>
                  <div class="col-3" style="float:left; width:200px">    Amount : </div> <div class="col-3" style="float:left;width:100px">500</div>
                   <!--<br>-->
                   <!--Payment Mode 2 : <?php echo $getDocumentVal['mode_of_payment_2'] ?>-->
                   <!--<br>-->
                   <!--Reference No : <?php echo $getDocumentVal['reference_number_2'] ?>-->
                   <!--<br>-->
                   <!--Payment Date : <?php echo $getDocumentVal['payment_date_2'] ?>-->
                   <!--<br>-->
                   <!--Amount : <?php echo $getDocumentVal['amount_2'] ?>-->
                   
                   <?php } ?>
                   <br>
                      
                  </div>
                </div> 
                
                
                
                 <?php if ($getDocumentVal['comments']!='') {?> 
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Prev Comments By Admin  or User : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?= $getDocumentVal['comments'] ?>
                  </div>
                </div>
                
                <hr style="border-top: 1px solid #a6a6a6 !important;">   
                <?php }?>
                 <?php if($getDocumentVal['approved_status']=='Approved'){?> 
                 Application Status : Secretary Approved. Completed.
                 <?php }else {?>
                 <?php
                if( ($getDocumentVal['approved_status'] == 'Pending' || $getDocumentVal['approved_status'] == 'Reopened') && $getDocumentVal['recc_approved'] == 'Yes'){ ?>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Select Action : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  	<select class="form-control" name="approved_status" id="approved_status<?php echo $getDocumentVal['serialno'];?>">
                  	    <option value="Pending" <?php if($getDocumentVal['approved_status']=='Pending'){?> Selected<?php } ?>>Pending Approval</option>
                  		<option value="Admin Approved" <?php if($getDocumentVal['approved_status']=='Admin Approved'){?> Selected<?php } ?>>Approve</option>
                  		<!--<option value="EC Approved" <?php if($getDocumentVal['approved_status']=='EC Approved'){?> Selected<?php } ?>>EC Approve</option>-->
                  		<option value="Sent for Correction" <?php if($getDocumentVal['approved_status']=='Sent for Correction'){?> Selected<?php } ?>>Send for Correction</option>
                  		<option value="Declined" <?php if($getDocumentVal['approved_status']=='Declined'){?> Selected<?php } ?>>Decline</option>
                  	</select>
                  </div>
                </div>
                <?php } ?>
                 <?php  if($getDocumentVal['approved_status'] == 'Admin Approved' && $getDocumentVal['recc_approved'] == 'Yes'){ ?>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Select Action : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  	<select class="form-control" name="approved_status" id="approved_status<?php echo $getDocumentVal['serialno'];?>">
                        <option value="EC Approved" <?php if($getDocumentVal['approved_status']=='EC Approved'){?> Selected<?php } ?>>EC Approve</option>
                  		<option value="Sent for Correction" <?php if($getDocumentVal['approved_status']=='Sent for Correction'){?> Selected<?php } ?>>Send for Correction</option>
                  		<option value="Declined" <?php if($getDocumentVal['approved_status']=='Declined'){?> Selected<?php } ?>>Decline</option>
                  	</select>
                  </div>
                </div>
                
                  <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Approving on Behalf of  : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  
                        <input type="text"  name="approved_onbehalf" id="approved_onbehalf<?php echo $getDocumentVal['serialno'];?>" value="" required>
                  
                  </div>
                </div>
                
                  <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Select Designation : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  	<select class="form-control" name="approved_designation" id="approved_designation<?php echo $getDocumentVal['serialno'];?>" required>
                  	     <option value="">Select</option>
                        <option value="President">President</option>
                  		<option value="VicePresident">Vice President</option>
                  		<option value="Secretary">Secretary</option>
                  	</select>
                  </div>
                </div>
                
                <?php } ?>
                
                <?php }?>
                <?php
                if( ($getDocumentVal['approved_status'] == 'Pending' || $getDocumentVal['approved_status'] == 'Reopened' || $getDocumentVal['approved_status'] == 'Admin Approved') && $getDocumentVal['recc_approved'] == 'Yes'){ ?>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Add Comment : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  	<textarea class="form-control" name="comment"  id="comment<?php echo $getDocumentVal['serialno'];?>"></textarea>
                  </div>
                </div>
                <?php } ?>
              </div>
              <?php if( ($getDocumentVal['approved_status'] == 'Pending' || $getDocumentVal['approved_status'] == 'Reopened' || $getDocumentVal['approved_status'] == 'Admin Approved') && $getDocumentVal['recc_approved'] == 'Yes'){ ?>
              <div class="m-t-20 text-center" style="padding: 7.5px 0px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>