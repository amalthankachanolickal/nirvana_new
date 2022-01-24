<?php include('../model/class.expert.php');?>
<select class="select1" id="house_number_id" name="house_number_id" required>
<option value="">Select a House Number</option>
<?php 
$ModelCall->where("block_id", $_REQUEST['block_id']);
$ModelCall->where("status", 1);
$ModelCall->orderBy("house_number","asc");
$GetBlockList = $ModelCall->get("tbl_house_number_entry");
if($GetBlockList[0]>0){
foreach($GetBlockList as $GetBlockVal){if(is_array($GetBlockVal)){
?>
<option value="<?php echo strip_tags($GetBlockVal['id']); ?>"><?php echo strip_tags($GetBlockVal['block_name']); ?></option>
<?php } } } else { ?>
<option value="">No House Number Available</option>
<?php } ?>
</select>
