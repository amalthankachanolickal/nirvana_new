<div id="add_newspaper" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Newspaper</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateNews">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="id" value="<?php echo $getNewsInfo[0]['id'];?>" />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Newspaper Name <span class="text-danger">*</span></label>
                    <input class="form-control" name="name" id="name" required value="" type="text">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">E-paper URL <span class="text-danger">*</span></label>
                    <input class="form-control" name="e_paper" id="e_paper" required value="" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Language <span class="text-danger">*</span></label>
                    <input class="form-control" name="language" id="language" required value="" type="text">
                  </div>
                </div>
                
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Format <span class="text-danger">*</span></label>
                    <input class="form-control" name="format" id="format" required value="" type="text">
                  </div>
                </div>
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Price <span class="text-danger">*</span></label>
                    <input class="form-control" name="price" id="price" required value="" type="text">
                  </div>
                </div>
                
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Annual Cost <span class="text-danger">*</span></label>
                    <input class="form-control" name="annual_cost" id="annual_cost" required value="" type="text">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Discount Offer <span class="text-danger">*</span></label>
                    <input class="form-control" name="discount_offer" id="discount_offer" required value="" type="text">
                  </div>
                </div>
                
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Weekday Rates <span class="text-danger">*</span></label>
                    <input class="form-control" name="weekday_rates" id="weekday_rates" required value="" type="text">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Weekend Rates <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="Weekend_rates" id="Weekend_rates" required value="" type="text">
                  </div>
                </div>
                
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Delivery Charges <span class="text-danger">*</span></label>
                    <input class="form-control" name="Delivery_charges" id="Delivery_charges" required value="" type="text">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Subscription <span class="text-danger">*</span></label>
                    <input class="form-control" name="annual" id="annual" required value="" type="text">
                  </div>
                </div>
                
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Quantity <span class="text-danger">*</span></label>
                    <input class="form-control" name="bought" id="bought" required value="" type="text">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                     <label>Newspaper Logo  <span class="text-danger">*</span></label>
                  <input class="form-control"  id="image" name="image"  required   type="file">
                  </div>
                </div>
              
                
              </div>
              
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Submit Newspaper</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>