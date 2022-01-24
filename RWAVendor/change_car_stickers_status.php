<div id="car_sticker_status<?php echo $getcarsticker['stickerid'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title">Status</h4>
        </div>
       <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/functionCarStickers.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="carStickerForm">
             <input type="hidden" name="status" value="1">
             <input type="hidden" name="user_id" value="<?php echo $getcarsticker['user_id'];?>">
            <input type="hidden" name="stickerid" value="<?php echo $getcarsticker['stickerid'];?>">
          <div class="modal-body card-box">
            <p>Are you sure want to approve this? Please check the form thoroughly, because it can not be edited further.</p>
            <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-success">Approve</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
