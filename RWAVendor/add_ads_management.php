<div id="add_ads_management" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Ad Banner</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateads_management">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            
            
            <div class="row">
            
            <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Ad Banner Position <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="ads_banner_position" id="ads_banner_position" required  >
            <option value="">Select</option>
            <option value="Top" selected="selected">Top</option>
            <option value="Bottom">Bottom</option>
             <option value="Left">Left</option>
              <option value="Right">Right</option>
          </select>
                </div>
              </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Ad Banner Type <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="ads_banner_type" id="ads_banner_type" required  >
            <option value="">Select</option>
            <option value="Image" selected="selected">Image Type</option>
            <option value="GoogleAd">Google Ad</option>
          </select>
                </div>
              </div>
              
              
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Ad Banner Size <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="ads_banner_size" id="ads_banner_size" required  >
            <option value="">Select</option>
            <option value="300X300">300X300</option>
            <option value="728X90">728X90</option>
          </select>
                </div>
              </div>
            
            </div>
            
            
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Ad Banner Caption <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="ads_management_tilte" id="ads_management_tilte" required value="" >
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Ad Banner Image (300px X 300px)<span class="text-danger"></span></label>
                  <input class="form-control" name="ads_management_file" id="ads_management_file" required type="file">
                    <p><strong style="color:#FF0000;">Only allow .png, .jpg, .gif</strong></p>
                </div>
              </div>
            
            </div>
            
            
            
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Ad Banner URL <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="ads_management_url" id="ads_management_url"  value="" >
                </div>
              </div>
              
              
              
            
            </div>
            
              <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Google Ad<span class="text-danger"></span></label>
                    <textarea class="form-control" name="google_ads" id="google_ads" cols="5" rows="5"><?php echo $getCMSManagementInfo[0]['google_ads'];?></textarea>
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