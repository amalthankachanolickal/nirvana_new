<div id="update-member-<?php echo $getDocumentVal['s_no'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Member details</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/membership_status.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="eid" value="<?php echo $getDocumentVal['s_no'];?>">
              <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Member First Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="Member First Name" value="<?php echo $getDocumentVal['Member First Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Member Middle Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="Member Middle Name" value="<?php echo $getDocumentVal['Member Middle Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Member Last Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="Member Last Name" value="<?php echo $getDocumentVal['Member Last Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">1st Owner First Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="1st_Owner_First_Name" value="<?php echo $getDocumentVal['1st_Owner_First_Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">1st Owner Middle Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="1st_Owner_Middle_Name" value="<?php echo $getDocumentVal['1st_Owner_Middle_Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">1st Owner Last Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="1st_Owner_Last_Name" value="<?php echo $getDocumentVal['1st_Owner_Last_Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">2nd Owner First Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="2nd_Owner_First_Name" value="<?php echo $getDocumentVal['2nd_Owner_First_Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">2nd Owner Middle Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="2nd_Owner_Middle_Name" value="<?php echo $getDocumentVal['2nd_Owner_Middle_Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">2nd Owner Last Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="2nd_Owner_Last_Name" value="<?php echo $getDocumentVal['2nd_Owner_Last_Name'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Member<span class="text-danger">*</span></label>
                    <select name="Member" class="form-control">
                      <option value="N/A" <?php if ($getDocumentVal['Member'] == "N/A") { ?> selected <?php } ?>>N/A</option>
                      <option value="Docs Pending" <?php if ($getDocumentVal['Member'] == "Docs Pending") { ?> selected <?php } ?>>Docs Pending</option>
                      <option value="Yes" <?php if ($getDocumentVal['Member'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Eligible For Voting<span class="text-danger">*</span></label>
                    <select name="Eligible_for_Voting" class="form-control">
                      <option value="Yes" <?php if ($getDocumentVal['Eligible_for_Voting'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                      <option value="No" <?php if ($getDocumentVal['Eligible_for_Voting'] == "No") { ?> selected <?php } ?>>No</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">CAM Dues 15th Jan <span class="text-danger">*</span></label>
                    <input class="form-control" name="CAM_Dues_15th_Jan" value="<?php echo $getDocumentVal['CAM_Dues_15th_Jan'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">CAM Dues 10th Feb <span class="text-danger">*</span></label>
                    <input class="form-control" name="CAM_Dues_10th_Feb" value="<?php echo $getDocumentVal['CAM_Dues_10th_Feb'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">CAM Dues XXXX <span class="text-danger">*</span></label>
                    <input class="form-control" name="CAM_Dues_XXXX" value="<?php echo $getDocumentVal['CAM_Dues_XXXX'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Remarks<span class="text-danger">*</span></label>
                    <input class="form-control" name="Remarks" value="<?php echo $getDocumentVal['Remarks'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Additional Remarks <span class="text-danger">*</span></label>
                    <input class="form-control" name="Remarks_2" value="<?php echo $getDocumentVal['Remarks_2'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">First Owner Docs Complete<span class="text-danger">*</span></label>
                    <select name="First_Owner_Docs_Complete" class="form-control">
                      <option value="Yes" <?php if ($getDocumentVal['First_Owner_Docs_Complete'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                      <option value="No" <?php if ($getDocumentVal['First_Owner_Docs_Complete'] == "No") { ?> selected <?php } ?>>No</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Second Owner Docs Complete<span class="text-danger">*</span></label>
                    <select name="Second_Owner_Docs_Complete" class="form-control">
                      <option value="Yes" <?php if ($getDocumentVal['Second_Owner_Docs_Complete'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                      <option value="No" <?php if ($getDocumentVal['Second_Owner_Docs_Complete'] == "No") { ?> selected <?php } ?>>No</option>
                    </select>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Authorization Letter<span class="text-danger">*</span></label>
                    <select name="Authorization_Letter" class="form-control">
                      <option value="Yes" <?php if ($getDocumentVal['Authorization_Letter'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                      <option value="No" <?php if ($getDocumentVal['Authorization_Letter'] == "No") { ?> selected <?php } ?>>No</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Form 10<span class="text-danger">*</span></label>
                    <select name="Form-10" class="form-control">
                      <option value="Yes" <?php if ($getDocumentVal['Form-10'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                      <option value="No" <?php if ($getDocumentVal['Form-10'] == "No") { ?> selected <?php } ?>>No</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>