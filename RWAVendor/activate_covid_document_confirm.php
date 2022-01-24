<div id="activate_document<?php echo $getDocumentVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title">Status</h4>
        </div>
       <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="ActivateCovidDocument">
             <input type="hidden" name="status" value="1">
            <input type="hidden" name="eid" value="<?php echo $getDocumentVal['id'];?>">
          <div class="modal-body card-box">
            <p>Are you sure want to activate this?</p>
            <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-success">Activate</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>