<div id="upload_billing" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Upload Bill</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/bills_upload_new_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
           
              
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Select File <span class="text-danger"></span></label>
                  <input class="form-control" name="sheet" id="sheet" required type="file">
                   <br /> <p><strong style="color:#FF0000;"><a href="<?php echo DOMAIN.AdminDirectory;?>billing_upload_format_file.xlsx" class="btn btn-danger rounded" target="_blank" style="margin-right:4px;" ><i class="fa fa-download"></i> Download Format</a></strong></p>
                </div>
              </div>
<!--                    <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="mail_notification">
    <option value="0">None</option>
    <option value="1">All</option>
    <option value="2">Active</option>

    <option value="3">Deavtived</option>
     <option value="4">Sussepended</option>
  <option value="5">Test</option>
    
  </select>
                </div>
              </div> -->

              
            </div>
            
            <div class="m-t-20 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>