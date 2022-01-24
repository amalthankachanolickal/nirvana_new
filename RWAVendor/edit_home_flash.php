<div id="edit_flashbanner<?php echo $getHomeFlashVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Home Flash Banner</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateHomeFlashBanner">
            <input type="hidden" name="eid" value="<?php echo $getHomeFlashVal['id'];?>">
             <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Banner Caption <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="banner_title" id="banner_title"  value="<?php echo $getHomeFlashVal['banner_title'];?>" >
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Banner Image <span class="text-danger"></span></label>
                  <input class="form-control" name="banner_image" id="banner_image" <?php if($getHomeFlashVal['banner_image']==''){?> required <?php } ?> type="file">
                    <p><strong style="color:#FF0000;">Only allow .jpg, .png </strong></p>
                </div>
              </div>
              
               <?php if($getHomeFlashVal['banner_image']!=''){?>
                <div class="col-sm-12">
                <div class="form-group">
                   <img src="<?php echo DOMAIN.AdminDirectory;?>homesliders/<?php echo $getHomeFlashVal['banner_image'];?>" style="width:300px; height:300px;">
                     <input type="hidden" name="banner_imageOld" value="<?php echo $getHomeFlashVal['banner_image'];?>">
                     </div></div>
                    <?php } ?>
              
              
            
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Small Content <span class="text-danger"></span></label>
                  <textarea class="form-control" name="banner_content" id="banner_content" cols="5" rows="8"><?php echo $getHomeFlashVal['banner_content'];?></textarea>
                </div>
              </div>
              
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Button Text <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="button_text" id="button_text"  value="<?php echo $getHomeFlashVal['button_text'];?>" >
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Link <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="link" id="link"  value="<?php echo $getHomeFlashVal['link'];?>" >
                </div>
              </div>
              
              <div class="col-sm-2">
                <div class="form-group">
                  <label class="control-label">New Window <span class="text-danger"></span></label>
                  <input type="checkbox" class="form-control" name="window_type" id="window_type" <?=($getHomeFlashVal['window_type']== 1) ? "checked='checked'":''?> >
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