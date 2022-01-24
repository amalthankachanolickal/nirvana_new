<div id="add_EC" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add EC </h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateEC">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
              <div class="row">
               
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Email <span class="text-danger">*</span></label>
                    <input class="form-control" name="Email" id="Email" required value="" type="Email" required>
                  </div>
</div>
                     <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Block<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="block_number">
    <option value="1">AG</option>
    <option value="2">BC</option>
    <option value="3">CC</option>

    <option value="4">DW</option>
     <option value="5">ES</option>
  
    
  </select>
                </div>
              </div>
                          <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">House Number <span class="text-danger">*</span></label>
                    <input class="form-control" name="house_number" pattern="[0-9]{0-3}" placeholder="Enter your 3 Digit House No" title="Three Digit House No" required value="" type="text" maxlength="3">
                  </div>

              </div>
               <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Floor<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="Floor_nubmer">
   <option value='1'>Ground Floor</option>
                              <option  value='2'>First Floor</option>
                              <option value='3'>Second Floor</option>
                              <option value='4'>Third Floor</option>
                              <option value='5'>Fourth Floor</option>
  
    
  </select>
                </div>
              </div>
                                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Designation <span class="text-danger"></span></label>
                    <input class="form-control" name="designation" id="designation"  value="" type="text" >
                  </div>
</div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">start date <span class="text-danger">*</span></label>
                    <input class="form-control floating ecstartdate" name="start_date" id="start_tim" required value="" type="text">
                  </div>
                </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">end date <span class="text-danger">*</span></label>
                    <input class="form-control floating ecenddate" name="end_date" id="end_tim"  value="" type="text">
                  </div>
                </div>
                
       
              </div>
              
              
              
                
              </div>
              
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Create EC</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>