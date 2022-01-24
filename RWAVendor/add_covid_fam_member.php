<div id="add_covid_fam" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/UpdateCovidVaccineUser.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddCovidVaccineUser">
            <input type="hidden" name="eid" value="<?php echo $_GET['user_id'];?>">
            <input type="hidden" name="client_id" value="" />
            <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Title <span class="text-danger">*</span></label>
                  <select name="title" id="title" onchange="getGender(document.getElementById('title').value)" class="form-control">
                    <option value="">Title</option>
                    <option value="Mr." >Mr.</option>
                    <option value="Miss." >Miss.</option>
                    <option value="Mrs." >Mrs.</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">First Name <span class="text-danger">*</span></label>
                  <input type="text"  name="fname" id="fname"  placeholder="First Name" class="form-control" required>
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
                  <input type="text"  name="lname" id="lname"  placeholder="Last Name" class="form-control" required>
                </div>
              </div>
              
              
            </div>
             
            
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Dob <span class="text-danger">*</span></label>
                  <input type="text" name="dob" id="dob"  class="form-control" onchange="calculateAge(document.getElementById('dob').value)" onfocus="this.type='date'" max="<?php echo date('Y-m-d') ?>" min="<?php echo date('1900-01-01') ?>" step="1" placeholder="Date of Birth" required>
                </div>
              </div>
              <!--<div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Age <span class="text-danger">*</span></label>
                  <input type="number"  name="age" id="age"  placeholder="Age" class="form-control" required>				
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Gender<span class="text-danger">*</span></label>
                  <input type="text"  name="gender" id="gender"  placeholder="Gender" class="form-control" readonly required>					
                </div>
              </div>-->
            </div>
            
            <div class="m-t-20 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    
    function calculateAge(dateString) { // birthday is a date
    
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    /*alert(age);*/
    
    //display the calculated age
    if(dateString = document.getElementById('dob').value){
        document.getElementById("age").value = age;
    }
    if(dateString = document.getElementById('dob_1').value){
        document.getElementById("age_1").value = age;
    }
    if(dateString = document.getElementById('dob_2').value){
        document.getElementById("age_2").value = age;
    }
    if(dateString = document.getElementById('dob_3').value){
        document.getElementById("age_3").value = age;
    }
    if(dateString = document.getElementById('dob_4').value){
        document.getElementById("age_4").value = age;
    }
    if(dateString = document.getElementById('dob_5').value){
        document.getElementById("age_5").value = age;
    }
    
}

    var dateControl = document.querySelector('input[type="date"]');
    dateControl.addEventListener("focus", function(){
      // You can add validation on value
      if( this.min && !this.value ){
        this.value = this.min;
      }
    });
    
    function getGender(title) { // birthday is a date
    var gender;
    if(title == 'Mrs.'){
        gender = "Female";
    }else if(title == 'Miss.'){
        gender = "Female";
    }else if(title == 'Mr.'){
        gender = "Male";
    }
   
</script>
   