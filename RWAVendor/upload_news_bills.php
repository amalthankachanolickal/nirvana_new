<div id="upload_news_bills" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Upload Newspaper Bills</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/news_paper_upload_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <input type="hidden" name="ActionCall" value="UploadNewsBills">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Select File <span class="text-danger"></span></label>
                  <input class="form-control" name="newspaper_excel_sheet_upload" id="newspaper_excel_sheet_upload" required type="file">
                   <br> <p><strong style="color:#FF0000;"><a href="<?php echo DOMAIN.AdminDirectory;?>newspaper_bills_import_format.xlsx" class="btn btn-danger rounded" target="_blank" style="margin-right:4px;" >
                       <i class="fa fa-download"></i> Download Format</a></strong></p>
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