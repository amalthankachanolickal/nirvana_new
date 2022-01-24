<div id="edit_covid_user<?php echo $covidvaccine['id'] ?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/UpdateCovidVaccineUser.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="UpdateCovidVaccineUser">
            <input type="hidden" name="eid" value="<?php echo $covidvaccine['id'];?>">
            <input type="hidden" name="client_id" value="" />
            <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Title <span class="text-danger">*</span></label>
                  <select name="title" id="title" onchange="getGender(document.getElementById('title').value)" class="form-control">
                    <option value="">Title</option>
                    <option value="Mr." <?Php if($covidvaccine["title"] == 'Mr.'){ ?> selected <?php } ?>>Mr.</option>
                    <option value="Miss." <?Php if($covidvaccine["title"] == 'Miss.'){ ?> selected <?php } ?>>Miss.</option>
                    <option value="Mrs." <?Php if($covidvaccine["title"] == 'Mrs.'){ ?> selected <?php } ?>>Mrs.</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">First Name <span class="text-danger">*</span></label>
                  <input type="text"  name="fname" id="fname" value="<?php echo $covidvaccine["fname"];?>" placeholder="First Name" class="form-control" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Middle Name <span class="text-danger"></span></label>
                  <input type="text"  name="mname" id="mname"  placeholder="Middle Name" class="form-control">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Last Name <span class="text-danger">*</span></label>
                  <input type="text"  name="lname" id="lname" value="<?php echo $covidvaccine["lname"];?>" placeholder="Last Name" class="form-control" required>
                </div>
              </div>
              
              
            </div>
             <div class="row">
            
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Block <span class="text-danger"></span></label>
                  <select name="block_prime" id="block_prime" onblur="PrefillDecision();" class="form-control" required>
                  						    <?php 
                  						     if(count($covidvaccine) > 0) {
                  						     	?>
                  							<option value="" disabled>Block</option>
                  							<option value="1" <?php if ($covidvaccine['block'] == "1") { ?> selected <?php } ?>>AG</option>
                  							<option value="2" <?php if ($covidvaccine['block'] == "2") { ?> selected <?php } ?>>BC</option>
                  							<option value="3" <?php if ($covidvaccine['block'] == "3") { ?> selected <?php } ?>>CC</option>
                  							<option value="4" <?php if ($covidvaccine['block'] == "4") { ?> selected <?php } ?>>DW</option>
                  							<option value="5" <?php if ($covidvaccine['block'] == "5") { ?> selected <?php } ?>>ES</option>
                  						     	<?php
                  						     } else { ?>
                  							<option  value="" disabled selected>Block</option>
                  							<option value="1">AG</option>
                  							<option value="2">BC</option>
                  							<option value="3">CC</option>
                  							<option value="4">DW</option>
                  							<option value="5">ES</option>
                  						     <?php } ?>
                  						</select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">House No <span class="text-danger">*</span></label>
                  <input type="text"  onblur="PrefillDecision();" required maxlength="4" class="form-control" name="house_number" id="house_number"  onkeypress="return isNumberKey(event);"  value="<?= (count($covidvaccine) > 0) ? $covidvaccine['house'] : '' ?>"  placeholder="House #">
                  					
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Floor<span class="text-danger">*</span></label>
                  <select name="floor_prime" id="floor_prime" required onblur="PrefillDecision();" class="form-control">
                  							<?php 
                  							   if (count($covidvaccine) > 0) { ?>
                  							<!--<option value="Villa" <?php if ($covidvaccine['floor'] == 'Villa') { ?> selected <?php } ?>>Villa</option>-->
                  							<option value=" ">N/A</option>
                  							<option value="GF" <?php if ($covidvaccine['floor'] == 'GF') { ?> selected <?php } ?>>GF</option>
                  							<option value="FF" <?php if ($covidvaccine['floor'] == 'FF') { ?> selected <?php } ?>>FF</option>
                  							<option value="SF" <?php if ($covidvaccine['floor'] == 'SF') { ?> selected <?php } ?>>SF</option>
                  							<option value="TF" <?php if ($covidvaccine['floor'] == 'TF') { ?> selected <?php } ?>>TF</option>
                  							<?php
                  							   } else {
                  							?>
                  							<option name="floor_prime" id="floor_prime"  value="" disabled selected>Floor</option>
                  							<!--<option value="Villa" >Villa</option>-->
                  							<option value="NA">N/A</option>
                  							<option value="GF">GF</option>
                  							<option value="FF">FF</option>
                  							<option value="SF">SF</option>
                  							<option value="TF">TF</option>
                  						<?php } ?>
                  						</select>					
                </div>
              </div>
              
              
            </div>
             <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Address <span class="text-danger">*</span></label>
                  <input type="text"  name="address" id="address" value="Nirvana Country, Sector 50" placeholder="Address" class="form-control" required>					
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">City <span class="text-danger">*</span></label>
                  <input type="text"  name="city" id="city" value="Gurgaon" placeholder="City" class="form-control"  required>				
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Pincode <span class="text-danger">*</span></label>
                  <input type="text" onkeypress="return isNumberKey(event);" maxlength="5" value="122018" class="form-control"   name="pincode" id="pincode" placeholder="Pin Code" required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Dob <span class="text-danger">*</span></label>
                  <input type="text" name="dob" id="dob" value="<?php echo $covidvaccine['dob']; ?>" class="form-control" onchange="calculateAge(document.getElementById('dob').value)" onfocus="this.type='date'" max="<?php echo date('Y-m-d') ?>" min="<?php echo date('1900-01-01') ?>" step="1" placeholder="Date of Birth" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Age <span class="text-danger">*</span></label>
                  <input type="number"  name="age" id="age" value="<?php echo $covidvaccine['age']; ?>" placeholder="Age" class="form-control" required>				
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Gender<span class="text-danger">*</span></label>
                  <input type="text"  name="gender" id="gender" value="Female" placeholder="Gender" class="form-control" readonly required>					
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Dob <span class="text-danger">*</span></label>
                  <table>
                                            <tbody>
                                                <tr>
                  								    <td width="30%"><input type="text" class="form-control" name="isd_1" id="isd_1"  placeholder="+91"
                                                        maxlength="3" value="+91" required></td>
                                                    <td width="70%"> <input type="text" class="form-control" required name="mobile" id="mobile" value="<?php echo $covidvaccine['mobile']; ?>"
                                                    oninvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"  onkeypress="return isNumberKey(event);" 
                  											maxlength="10" placeholder="Mobile" value="" onblur="mobnumber(this.value);" ></td>

                  										</tr>

                  									</tbody>

                  								</table></div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Gender<span class="text-danger">*</span></label>
                  <input type="email"  name="email" id="email" value="<?php echo $covidvaccine['email']; ?>" class="form-control" placeholder="Email" required readonly>
                                    				
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