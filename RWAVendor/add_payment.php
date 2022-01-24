<div id="update-user-status1<?php echo $getCustomerInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Bills</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="Addpayment">
            <input type="hidden" name="eid" value="<?php echo $getCustomerInfoVal['id'];?>">
            <input type="hidden" name="bill_num" value="<?php echo $getCustomerInfoVal['bill_number'];?>">
          <!--  <input type="hidden" name="eid" value="<?php echo $_REQUEST['eid'];?>">-->
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
              <div class="row">
                  
               
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Balance Due <span class="text-danger">*</span></label>
                    <input class="form-control" name="total_outstanding" id="total_outstanding" required value="<?php echo $getCustomerInfoVal['total_outstanding'];?>" type="text">
                  </div>
                </div>
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Amount<span class="text-danger">*</span></label>
                    <input class="form-control" name="amount" id="late_fee_charge" required value="" type="text">
                  </div>
                </div>
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="date_paid" id="pay_after_due" required value="" type="date">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">mode of payment<span class="text-danger">*</span></label>
                    <input class="form-control" name="mode" id="pay_after_due" required value="" type="text">
                  </div>
                </div>
              </div>
              
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Add Payment</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>