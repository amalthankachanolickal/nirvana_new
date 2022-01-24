<div id="add_notice" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h4 class="modal-title">Post Notice</h4>
      </div>
      <div class="modal-body">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateNoticePost">
          <input type="hidden" name="eid" value="">
          <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Notice Caption <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="notice_title" id="notice_title" required value="" >
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Notice Document <span class="text-danger">*</span></label>
                  <input class="form-control" name="notice_file" id="notice_file" required type="file">
                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>
                </div>
              </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label">About Notice <span class="text-danger"></span></label>
                <textarea class="form-control" name="notice_content" id="notice_content" cols="7" rows="10"></textarea>
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
