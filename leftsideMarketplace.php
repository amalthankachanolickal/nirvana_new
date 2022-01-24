<div class="col-lg-3 col-md-12">
  <div class="sidebar-right">
    <!-- Advanced search start -->
    <div class="widget-3 advanced-search">
      <div class="card-header">
        <h3 class="sidebar-title">Search By Location</h3>
      </div>
      <form method="get" action="<?php echo SITE_URL;?>create_search_url.php"  class="card">
        <div class="form-group">
          <select class="select1 search-fields form-control"  name="service_state_id" onChange="getCities(this.value)" id="service_state_id">
            <option value="">Select State</option>
<?php 
$ModelCall->where("status", 0);
$ModelCall->where("country_id", 101);
$ModelCall->orderBy("name","asc");
$GetStateList = $ModelCall->get("states");
if($GetStateList[0]>0){
foreach($GetStateList as $GetStateVal){if(is_array($GetStateVal)){
?>
<option value="<?php echo strip_tags($GetStateVal['id']); ?>" <?php if($_SESSION['service_state_id']==$GetStateVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetStateVal['name']); ?></option>
            <?php } } } ?>
          </select>
         
        </div>
        <div class="form-group">
          <select class="select1 search-fields form-control" name="service_city_id" id="service_city_id">
            <option value="">Select City</option>
<?php 
$ModelCall->where("state_id", $_SESSION['service_state_id']);
$ModelCall->where("status", 0);
$ModelCall->orderBy("name","asc");
$GetCityList = $ModelCall->get("cities");
if($GetCityList[0]>0){
foreach($GetCityList as $GetCityVal){if(is_array($GetCityVal)){
?>
<option value="<?php echo strip_tags($GetCityVal['id']); ?>" <?php if($_SESSION['service_city_id']==$GetCityVal['id']){?> selected <?php } ?>><?php echo strip_tags($GetCityVal['name']); ?></option>
            <?php } } } ?>
          </select>
        </div>
          <br>
      <div class="form-group mb-0">
        <button class="search-button" type="submit">Search</button>
      </div>
      </form>
    </div>
  </div>
  <div class="sidebar-right">
    <div  class="widget-3 ">
      <div class="card-header">
        <h3 class="sidebar-title">Search By Category</h3>
      </div>
<?php 
$ModelCall->where("status", 1);
$ModelCall->orderBy("category_name","asc");
$GetCategoryList = $ModelCall->get("tbl_category_entry");
if($GetCategoryList[0]>0){
foreach($GetCategoryList as $GetCatVal){if(is_array($GetCatVal)){
?>
      <div class="checkbox checkbox-theme checkbox-circle">
        <input id="catgeory_id<?php echo strip_tags($GetCatVal['id']); ?>"  name="catgeory_id" <?php if($_SESSION['catgeory_id']==$GetCatVal['id']){?> checked="checked" onclick="window.location.href='<?php echo SITE_URL;?>create_search_cat_url.php'" <?php } else {?> onclick="window.location.href='<?php echo SITE_URL;?>create_search_cat_url.php?catgeory_id=<?php echo strip_tags($GetCatVal['id']); ?>'" <?php } ?> value="<?php echo strip_tags($GetCatVal['id']); ?>" type="checkbox">
        <label for="catgeory_id<?php echo strip_tags($GetCatVal['id']); ?>"> <?php echo strip_tags(ucwords($GetCatVal['category_name'])); ?> </label>
      </div>
 <?php } } } ?>     
      
      
      <!--<br>
      <div class="form-group mb-0">
        <button class="search-button">Search</button>
      </div>-->
    </div>
  </div>
</div>
