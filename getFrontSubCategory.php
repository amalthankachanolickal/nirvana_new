<?php include('model/class.expert.php');?>
<select class="form-control postcode" name="catgeory_sub_id" id="catgeory_sub_id"  >
<option value="">Select Sub Category</option>
<?php 
$ModelCall->where("status", 1);
$ModelCall->where("catgeory_id", $_REQUEST['catgeory_id']);
$ModelCall->orderBy("sub_category_name","asc");
$GetSubCategoryList = $ModelCall->get("tbl_sub_category_entry");
if($GetSubCategoryList[0]>0){
foreach($GetSubCategoryList as $GetSubCatVal){if(is_array($GetSubCatVal)){
?>
<option value="<?php echo strip_tags($GetSubCatVal['id']); ?>" <?php if($getEventInfo[0]['catgeory_sub_id']==$GetSubCatVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetSubCatVal['sub_category_name']); ?></option>
            <?php } } } ?>
          </select>