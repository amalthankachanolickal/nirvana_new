<div id="upload-member-file-<?php echo $getDocumentVal['s_no'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Upload Files</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/membership_file_upload.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="eid" value="<?php echo $getDocumentVal['s_no'];?>">
            <input type="hidden" name="block" value="<?php echo $getDocumentVal['Block'];?>">
            <input type="hidden" name="house" value="<?php echo $getDocumentVal['House_No'];?>">
              <div class="row">
                <?php if ($getDocumentVal['Conveyance_Deed'] == 'No' || is_null($getDocumentVal['Conveyance_Deed'])) { ?>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Conveyance Deed<span class="text-danger">*</span></label>
                    <input class="form-control" name="ConveyanceDeed" type="file">
                  </div>
                </div>
              <?php } ?>             
              <?php if ($getDocumentVal['1st_Owner_1st_ID_Proof'] == 'No' || is_null($getDocumentVal['1st_Owner_1st_ID_Proof'])) { ?> 
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">1st Owner 1st ID Proof<span class="text-danger">*</span></label>
                    <input class="form-control" name="Owner1Id1" type="file">
                  </div>
                </div>
              <? } ?>
              <?php if ($getDocumentVal['1st_Owner_2nd_ID_Proof'] == 'No' || is_null($getDocumentVal['1st_Owner_2nd_ID_Proof'])) { ?> 
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">1st Owner 2nd ID Proof<span class="text-danger">*</span></label>
                    <input class="form-control" name="Owner1Id2" type="file">
                  </div>
                </div>
              <?php } ?>
              <?php if ($getDocumentVal['2nd_Owner_1st_ID_Proof'] == 'No' || is_null($getDocumentVal['2nd_Owner_1st_ID_Proof'])) { ?> 
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">2nd Owner 1st ID Proof<span class="text-danger">*</span></label>
                    <input class="form-control" name="Owner2Id1" type="file">
                  </div>
                </div>
              <?php } ?>
              <?php if ($getDocumentVal['2nd_Owner2nd_ID_Proof'] == 'No' || is_null($getDocumentVal['2nd_Owner2nd_ID_Proof'])) { ?> 
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">2nd Owner 2nd ID Proof<span class="text-danger">*</span></label>
                    <input class="form-control" name="Owner2Id2" type="file">
                  </div>
                </div>
              <?php } ?>
              </div>
              <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary">Upload Files</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>