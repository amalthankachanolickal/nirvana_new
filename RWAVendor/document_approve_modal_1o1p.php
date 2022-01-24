<div id="document_approve_modal_1o1p-<?php echo $getDocumentVal['s_no'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Document Details</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/approve_docs_spec.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="eid" value="<?php echo $getDocumentVal['s_no'];?>">
            <input type="hidden" name="doc_type" value="1o1">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>House Number : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?= getBlock($getDocumentVal['Block']) . '-' . $getDocumentVal['House_No'] . $isfloor . getFloor($getDocumentVal['Floor']) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Member Name : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?= ucfirst($getDocumentVal['Member First Name']) .' '. ucfirst($getDocumentVal['Member Middle Name']) .' '. ucfirst($getDocumentVal['Member Last Name']) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Type of document : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    1st Owner 1st ID Proof
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Document File : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <a href="<?= SITE_URL ?><?= $getDocumentVal['Owner1Id1'] ?>" target="_blank">click here</a>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Comment Added by user : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                    <?= $getDocumentVal['Owner1Id1_comment'] ?>
                  </div>
                </div>
                <hr style="border-top: 1px solid #a6a6a6 !important;">                
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Select Action : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  	<select class="form-control" name="action">
                  		<option value="Yes">Approve</option>
                  		<option value="Decline">Decline</option>
                  	</select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding: 7.5px 0px;"><b>Add Comment : </b></div>
                  <div class="col-md-9" style="padding: 7.5px 0px;">
                  	<textarea class="form-control" name="comment" required></textarea>
                  </div>
                </div>
              </div>
              <div class="m-t-20 text-center" style="padding: 7.5px 0px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>