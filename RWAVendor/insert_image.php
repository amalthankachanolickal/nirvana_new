
<div id="insert_image" data-backdrop="static" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title">Insert Image</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <!--<form method="post" action="<?php echo DOMAIN.AdminDirectory;?>controller/save_insert_image.php" enctype="multipart/form-data">-->
            <form id="formID" action=""  method="POSTt" enctype="multipart/form-data">

              <input type="hidden" name="ActionCall" value="Addinsertimage">
              
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                   <label class="control-label">Image Caption <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="image_caption_save" id="image_caption_save" required >
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="control-label">Image File Upload <span class="text-danger">*</span></label>
                    <input class="form-control" name="image_save" id="image_save" required value="" type="File">
                  </div>
                </div>
                
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="control-label">Width<span class="text-danger">*</span></label>
                    <input class="form-control" name="Width" id="Width"required value="125" min="125" max="125" type="number">
                  </div>
                </div>
                
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="control-label">Height <span class="text-danger">*</span></label>
                    <input class="form-control" name="Height" id="Height" required value="125" min="125" max="125" type="number">
                  </div>
                </div>
               </div>
              
              <div class="m-t-20 text-center">
                <a href="#" class="btn btn-primary" onClick="saveImageByAjax();"  >Submit</a>
                <!--<button class="btn btn-primary" >Submit</button>-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>