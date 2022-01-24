<div id="edit_pricing<?php echo $getPriceInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Pricing Table</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/event_ticket_Controller.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="EditTRDRates">
            <input type="hidden" name="eid" value="<?php echo $getPriceInfoVal['id'];?>">
          <!--  <input type="hidden" name="eid" value="<?php echo $_REQUEST['eid'];?>">-->
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Payment Mode <span class="text-danger">*</span></label>
                    <input class="form-control" name="payment_mode" id="payment_mode" required value="<?php echo $getPriceInfoVal['payment_mode'];?>" type="text" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Our Rates<span class="text-danger">*</span></label>
                    <input class="form-control" name="our_charge" id="our_charge" required value="<?php echo $getPriceInfoVal['our_charge'];?>" type="text">
                  </div>
                </div>
                
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>