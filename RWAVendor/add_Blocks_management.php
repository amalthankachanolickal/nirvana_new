<div id="add_Blocks" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Block</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateBlocks">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Block Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="block_name" id="block_name" required value="" >
                </div>
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Block Code <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="block_code" id="block_code" required value="" >
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