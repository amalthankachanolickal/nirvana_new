<?php include('model/class.expert.php');?>
<select class="form-control postcode" name="service_city_id" id="service_city_id"   >
  <option value="">Select City</option>
  <?php 
$ModelCall->where("state_id", $_REQUEST['service_state_id']);
$ModelCall->where("status", 0);
$ModelCall->orderBy("name","asc");
$GetCityList = $ModelCall->get("cities");
if($GetCityList[0]>0){
foreach($GetCityList as $GetCityVal){if(is_array($GetCityVal)){
?>
  <option value="<?php echo strip_tags($GetCityVal['id']); ?>" <?php if($getEventInfo[0]['service_city_id']==$GetCityVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCityVal['name']); ?></option>
  <?php } } } ?>
</select>
