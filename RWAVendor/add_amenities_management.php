<div id="add_amenities" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Amenities</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateAmenities">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Amenities Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="amenities_title" id="amenities_title" required value="" >
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Amenities Image <span class="text-danger">*</span></label>
                  <input class="form-control" name="amenities_image" id="amenities_image" required type="file">
                    <p><strong style="color:#FF0000;">Only allow .jpg, .png </strong></p>
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