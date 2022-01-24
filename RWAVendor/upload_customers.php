<div id="upload_customers" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Upload Customers</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <input type="hidden" name="ActionCall" value="AddCustomerExpert">
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Banner Caption <span class="text-danger"></span></label>
                  <select class="form-control" name="block_id" id="block_id" oninvalid="this.setCustomValidity('Select a Block Name')"  oninput="this.setCustomValidity('')"  required>
                              <option value="">Select a Block Name</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("block_name","asc");
$GetBlockList = $ModelCall->get("tbl_block_entry");
if($GetBlockList[0]>0){
foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
?>
<option value="<?php echo strip_tags($GetBlockVal['id']); ?>"><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
            <?php } } } ?>
                            </select>
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Select File <span class="text-danger"></span></label>
                  <input class="form-control" name="customer_excel_sheet_upload" id="customer_excel_sheet_upload" required type="file">
                   <br /> <p><strong style="color:#FF0000;"><a href="<?php echo DOMAIN.AdminDirectory;?>nirwana_customer_import_format.xlsx" class="btn btn-danger rounded" target="_blank" style="margin-right:4px;" ><i class="fa fa-download"></i> Download Format</a></strong></p>
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