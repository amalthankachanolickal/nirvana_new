<div id="edit_ads_management<?php echo $getads_managementVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Ads Banner</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateads_management">
            <input type="hidden" name="eid" value="<?php echo $getads_managementVal['id'];?>">
             <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
             
             <div class="row">
             
             <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Ad Banner Position <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="ads_banner_position" id="ads_banner_position" required  >
            <option value="">Select</option>
            <option value="Top" <?php if($getads_managementVal['ads_banner_position']=="Top"){?> selected="selected" <?php } ?>>Top</option>
            <option value="Bottom" <?php if($getads_managementVal['ads_banner_position']=="Bottom"){?> selected="selected" <?php } ?>>Bottom</option>
             <option value="Left" <?php if($getads_managementVal['ads_banner_position']=="Left"){?> selected="selected" <?php } ?>>Left</option>
              <option value="Right" <?php if($getads_managementVal['ads_banner_position']=="Right"){?> selected="selected" <?php } ?>>Right</option>
          </select>
                </div>
              </div>
             
            <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Ad Banner Type <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="ads_banner_type" id="ads_banner_type" required  >
            <option value="">Select</option>
            <option value="Image" <?php if($getads_managementVal['ads_banner_type']=="Image"){?> selected="selected" <?php } ?>>Image Type</option>
            <option value="GoogleAd" <?php if($getads_managementVal['ads_banner_type']=="GoogleAd"){?> selected="selected" <?php } ?>>GoogleAd</option>
          </select>
                </div>
              </div>
              
              
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Ad Banner Size <span class="text-danger">*</span></label>
                 <select class="form-control postcode" name="ads_banner_size" id="ads_banner_size" required  >
            <option value="">Select</option>
            <option value="300X300" <?php if($getads_managementVal['ads_banner_size']=="300X300"){?> selected="selected" <?php } ?>>300X300</option>
            <option value="728X90" <?php if($getads_managementVal['ads_banner_size']=="728X90"){?> selected="selected" <?php } ?>>728X90</option>
          </select>
                </div>
              </div>
            
            </div>
             
             
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Ad Banner Caption <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="ads_management_tilte" id="ads_management_tilte" required value="<?php echo $getads_managementVal['ads_management_tilte'];?>" >
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Ad Banner Image (300px X 300px)<span class="text-danger"></span></label>
                  <input class="form-control" name="ads_management_file" id="ads_management_file" <?php if($getads_managementVal['ads_management_file']==''){?> required <?php } ?> type="file">
                    <p><strong style="color:#FF0000;">Only allow .png, .jpg, .gif</strong></p>
                </div>
              </div>
              
               <?php if($getads_managementVal['ads_management_file']!=''){?>
                <div class="col-sm-12">
                <div class="form-group">
                 <img src="<?php echo DOMAIN.AdminDirectory;?>ads_managements/<?php echo $getads_managementVal['ads_management_file'];?>" style="width:300px; height:300px;">
                     <input type="hidden" name="ads_management_fileOld" value="<?php echo $getads_managementVal['ads_management_file'];?>">
                      <input type="hidden" name="ads_management_file_nameOLD" value="<?php echo $getads_managementVal['ads_management_file_name'];?>">
                     </div></div>
                    <?php } ?>
              
              
            
            
              
            </div>
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Ad Banner URL <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="ads_management_url" id="ads_management_url"  value="<?php echo $getads_managementVal['ads_management_url'];?>" >
                </div>
              </div>
              
              
              
            
            </div>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Google Ad<span class="text-danger"></span></label>
                    <textarea class="form-control" name="google_ads" id="google_ads" cols="5" rows="5"><?php echo $getads_managementVal['google_ads'];?></textarea>
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