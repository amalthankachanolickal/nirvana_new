<div id="edit_noticepost<?php echo $getNoticePostVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Notice</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateNoticePost">
            <input type="hidden" name="eid" value="<?php echo $getNoticePostVal['id'];?>">
             <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Notice Caption <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="notice_title" id="notice_title" required value="<?php echo $getNoticePostVal['notice_title'];?>" >
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Notice File <span class="text-danger">*</span></label>
                  <input class="form-control" name="notice_file" id="notice_file" <?php if($getDocumentVal['notice_file']==''){?> required <?php } ?> type="file">
                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>
                </div>
              </div>
              
               <?php if($getDocumentVal['notice_file']!=''){?>
                <div class="col-sm-12">
                <div class="form-group">
                  <a href="<?php echo DOMAIN.AdminDirectory;?>documents/<?php echo $getDocumentVal['notice_file'];?>" target="_blank"><?php echo $getDocumentVal['document_file_name'];?></a>
                     <input type="hidden" name="notice_fileOld" value="<?php echo $getDocumentVal['notice_file'];?>">
                      <input type="hidden" name="notice_file_nameOLD" value="<?php echo $getDocumentVal['notice_file_name'];?>">
                     </div></div>
                    <?php } ?>
              
              
            
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">About Notice <span class="text-danger"></span></label>
                  <textarea class="form-control" name="notice_content" id="notice_content" cols="7" rows="10"><?php echo $getNoticePostVal['notice_content'];?></textarea>
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