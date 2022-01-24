<div id="approve_customers<?php echo $getCustomerInfoVal['user_id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title">Customer Status</h4>
        </div>
       <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="ActivateCustomer">
             
            <input type="hidden" name="eid" value="<?php echo $getCustomerInfoVal['user_id'];?>">
          <div class="modal-body card-box">
            <p>To Approve the customer Please click on approve.</p>
            <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-success" name="website_status" value="1">Approve</button>
              <button type="submit" class="btn btn-danger" name="website_status" value="-1">Reject</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>