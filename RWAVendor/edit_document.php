<div id="edit_document<?php echo $getDocumentVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Document</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateDocument">
            <input type="hidden" name="eid" value="<?php echo $getDocumentVal['id'];?>">
             <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Document Caption <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="document_tilte" id="document_tilte<?php echo $getAdminInfo[0]['id'];?>" required value="<?php echo $getDocumentVal['document_tilte'];?>" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="comment">File Name</label>
                <input class="form-control" name="document_name" id="document_name<?php echo $getAdminInfo[0]['id'];?>"  value="<?php echo $getDocumentVal['document_file_name'];?>" required type="text" maxlength="100">
                </div>
              </div>
             <div class="col-sm-6">
              <div class="form-group">
              <label for="comment">Description</label>
              <textarea class="form-control"  id="comment<?php echo $getAdminInfo[0]['id'];?>" name="comment" maxlength="200"> <?php echo $getDocumentVal['description'];?></textarea>
              </div>
            </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Document File <span class="text-danger">*</span></label>
                  <input class="form-control" name="document_file" id="document_file<?php echo $getAdminInfo[0]['id'];?>" <?php if($getDocumentVal['document_file']==''){?> required <?php } ?> type="file">
                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>
                </div>
              </div>
          
               <?php if($getDocumentVal['document_file']!=''){?>
                <div class="col-sm-12">
                    <div class="form-group">
                    <a href="<?php echo DOMAIN.AdminDirectory;?>documents/<?php echo $getDocumentVal['document_file'];?>" target="_blank"><?php echo $getDocumentVal['document_file_name'];?></a>
                      <input type="hidden" name="document_fileOld" value="<?php echo $getDocumentVal['document_file'];?>">
                        <input type="hidden" name="document_file_nameOLD" value="<?php echo $getDocumentVal['document_file_name'];?>">
                     </div>
                </div>
                <?php } ?>
                   
           </div> 
            
            <div class="m-t-20 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>