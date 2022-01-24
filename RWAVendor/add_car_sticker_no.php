<div id="car_sticker_no<?php echo $getcarsticker['stickerid'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title">Add Sticker Number</h4>
        </div>
        <?php if ($getcarsticker['status']==1){?>
       <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/functionCarStickers.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="addCarSticker">
          <input type="hidden" name="stickerid" value="<?php echo $getcarsticker['stickerid'];?>">
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Car Number<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="car_number" id="car_number" required value="<?php echo $getcarsticker['car_number'];?>" readonly disabled >
                </div>
              </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Sticker Number<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="sticker_number" id="sticker_number" value="<?php echo $getcarsticker['sticker_number'];?>" >
                </div>
            </div>  
        <div class="row">
            <div class="col-sm-6">
                <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                 </div>
             </div>
       </div>  
        </form>
        <?php } else {?>
        <h3>You cannot add the sticker number without approving it.</h3>
            <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a></div>
        <?php }?>
      </div>
    </div>
  </div>
