<div id="add_approve_comment_<?= $getDocumentVal['id'] . '_' . $frm ?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Comment</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/forms_approve.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="fid" value="<?= $getDocumentVal['id'] ?>">
            <input type="hidden" name="ftype" value="<?= $frm ?>">
            <input type="hidden" name="act" value="approve">
            <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Reason for approval <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="comment"></textarea>
                </div>
              </div>
            </div>
            <div class="m-t-20 text-center">
              <button type="submit" class="btn btn-primary">Approve</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>