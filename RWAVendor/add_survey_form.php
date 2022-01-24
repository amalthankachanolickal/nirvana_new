<div id="add_survey_form" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add New Survey Form</h4>
        </div>
        <div class="modal-body">
          <!--form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data"-->
          <!--input type="hidden" name="ActionCall" value="AddUpdateAmenities"-->
            <!--input type="hidden" name="eid" value=""-->
            <!--input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" /-->
<div id="content">
            <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Form Heading <span class="text-danger">*</span></label>
                  <input type="text" class="form-control"  id="heading" onchange="checkheading()" required value="" >
                </div>

              
	<div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Starts On:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control event_date"  id="start" required value="" >
                </div>
              </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Expires On:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control event_date"  id="exp" required value="" >
              </div></div>
            <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Description:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control"  id="desc" required value="" >
              </div></div>
             <div id="questions">
	</div>
              <!--div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Amenities Image <span class="text-danger">*</span></label>
                  <input class="form-control" name="amenities_image" id="amenities_image" required type="file">
                    <p><strong style="color:#FF0000;">Only allow .jpg, .png </strong></p>
                </div>
              </div-->

              
            </div>
            <div class="btn btn-primary" id="add">Add a new Question</div>
            <div class="m-t-20 text-center">
              <div class="btn btn-primary" id="submit">Submit</div>
            </div>                            </div></div>
        </div>
      </div>
    </div>
  </div>

