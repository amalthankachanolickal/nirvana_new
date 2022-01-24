<div id="add_item" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Grocery Item</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/function_call_2.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddGroceryItemNew">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Tied up by <span class="text-danger">*</span></label>
                  <input class="form-control" name="tied_up_by" id="tied_up_by" type="text">
                </div>
              </div>
<!--               <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="mail_notification">
    <option value="None">None</option>
    <option value="All">All</option>
    <option value="Active">Active</option>

    <option value="Deavtived">Deavtived</option>
     <option value="Sussepended">Sussepended</option>
  
    
  </select>
                </div>
              </div> -->
              
              
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Store <span class="text-danger">*</span></label>
                  <input class="form-control" name="store" id="store" type="text">
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Whatsapp Number <span class="text-danger">*</span></label>
                  <input class="form-control" name="whatsapp" id="whatsapp" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Mobile Number <span class="text-danger">*</span></label>
                  <input class="form-control" name="mobile" id="mobile" type="text">
                </div>
              </div>           
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Min Order</label>
                  <input class="form-control" name="min_order" id="min_order"type="text">
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Delivery Charge</span></label>
                  <input class="form-control" name="delivery_charge" id="delivery_charge" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Product And Price List</label>
                  <input class="form-control" name="product" id="product" type="file">
                </div>
              </div>           
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Delivery Time</label>
                  <input class="form-control" name="delivery_time" id="delivery_time" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Process</label>
                  <input class="form-control" name="process" id="process" type="file">
                </div>
              </div>           
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Website</label>
                  <input class="form-control" name="website" id="website" type="text">
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