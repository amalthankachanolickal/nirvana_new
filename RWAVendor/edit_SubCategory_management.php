<div id="edit_SubCategory<?php echo $getCategoryVal['id'];?>" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h4 class="modal-title">Edit Sub Category</h4>
      </div>
      <div class="modal-body">
        <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateSubCategory">
          <input type="hidden" name="eid" value="<?php echo $getCategoryVal['id'];?>">
          <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
          <div class="row">
          
          <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label">Category Name <span class="text-danger">*</span></label>
                <select class="form-control postcode" name="catgeory_id" id="catgeory_id"  required>
            <option value="">Select Category</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("category_name","asc");
$GetCityList = $ModelCall->get("tbl_category_entry");
if($GetCityList[0]>0){
foreach($GetCityList as $GetCityVal){if(is_array($GetCityVal)){
?>
<option value="<?php echo strip_tags($GetCityVal['id']); ?>" <?php if($getCategoryVal['catgeory_id']==$GetCityVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCityVal['category_name']); ?></option>
            <?php } } } ?>
          </select>
              </div>
            </div>
          
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label">Sub Category Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sub_category_name" id="sub_category_name" required value="<?php echo $getCategoryVal['sub_category_name'];?>" >
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
