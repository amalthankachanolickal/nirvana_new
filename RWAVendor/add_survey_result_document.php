<div id="add_document" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Survey Result Document</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/survey_controller.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateSurveyResultDocument">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Choose Survey <span class="text-danger">*</span></label>
                    <select class="form-control" id="survey_id" name="survey_id">
                     <?php if($forms[0]>0){ foreach($forms as $form){ ?>
                        <option value="<?php echo $form['id'];?>"><?php echo $form['survey_name'];?></option>
                     <?php }}?>
                    </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="mail_notification">
    <option value="None">None</option>
    <option value="All">All</option>
    <option value="Active">Active</option>
    <option value="Deavtived">Deavtived</option>
    <option value="Sussepended">Sussepended</option>
    <option value="animesh.bhardwaj@nimbusharbor.com">Animesh Bhardwaj</option>
  </select>
                </div>
              </div>
              
              
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Document File <span class="text-danger">*</span></label>
                  <input class="form-control" name="document_file" id="document_file" required type="file">
                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>
                </div>
              </div>     
            </div>
              <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
      <label for="comment">File Name</label>
     <input class="form-control" name="document_name" id="document_name" required type="text" maxlength="20">
    </div>
    </div>
              <div class="col-sm-6">
            <div class="form-group">
      <label for="comment">Discription</label>
      <textarea class="form-control"  id="comment" name="comment" maxlength="50"></textarea>
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