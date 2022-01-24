<div id="edit_EC<?php echo $getECInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit EC</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateEC">
            <input type="hidden" name="eid" value="<?php echo $getECInfoVal['id'];?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
               <div class="row">
               
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Email <span class="text-danger">*</span></label>
                    <input class="form-control EC_date" name="Email" id="Email" required value="<?php echo $getECInfoVal['Email'];?>" type="Email" disabled >
                  </div>
 </div>
                             <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Designation <span class="text-danger"></span></label>
                    <input class="form-control" name="designation" id="designation"  value="" type="text" >
                  </div>
</div>
                     <!--<div class="col-sm-4">
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
                    <input class="form-control EC_date" name="house_number" id="house_number" required value="<?php echo $getECInfoVal['house_number_id'];?>" type="text">
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
              </div>-->
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">start date <span class="text-danger">*</span></label>
                    <input class="form-control floating ecenddate" name="start_date" required value="<?php echo $getECInfoVal['start_date'];?>" type="text" >
                  </div>
                </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">end date <span class="text-danger">*</span></label>
                    <input class="form-control floating ecenddate" name="end_date"  value="<?php echo $getECInfoVal['end_date'];?>" type="text">
                  </div>
                </div>
                
       
              </div>
              
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Update EC</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>