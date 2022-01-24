<div id="edit_team<?php echo $getEventInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h4 class="modal-title">Edit Team</h4>
      </div>
      <div class="modal-body">
        <div class="m-b-30">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ActionCall" value="AddUpdateTeam">
            <input type="hidden" name="eid" value="<?php echo ucwords($getEventInfoVal['id']);?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Name <span class="text-danger">*</span></label>
                  <input class="form-control" name="team_name" id="team_name" required value="<?php echo $getEventInfoVal['team_name'];?>" type="text">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Designation <span class="text-danger">*</span></label>
                  <input class="form-control" name="team_destination" id="team_destination" required value="<?php echo $getEventInfoVal['team_destination'];?>" type="text">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Display Position <span class="text-danger"></span></label>
                  <input class="form-control" name="order_position" id="order_position"  value="<?php echo ucwords($getEventInfoVal['order_position']);?>" type="number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Email Address <span class="text-danger"></span></label>
                  <input class="form-control" name="team_email" id="team_email"  value="<?php echo $getEventInfoVal['team_email'];?>" type="text">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Contact Number <span class="text-danger"></span></label>
                  <input class="form-control" name="team_mobile_no" id="team_mobile_no"  value="<?php echo ucwords($getEventInfoVal['team_mobile_no']);?>" type="text">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Team Image <span class="text-danger"></span></label>
                  <input class="form-control"  id="team_pic" name="team_pic"  <?php if($getEventInfoVal['team_pic']==''){?>  <?php } ?>   type="file">
                </div>
              </div>
               <?php if($getEventInfoVal['team_pic']!=''){?>
                <div class="col-sm-12">
                <div class="form-group">
  <img src="<?php echo DOMAIN.AdminDirectory;?>events/photo/<?php echo $getEventInfoVal['team_pic'];?>" style="width:100px; height:100px;">
                     <input type="hidden" name="team_picOld" value="<?php echo $getEventInfoVal['team_pic'];?>">
                     </div></div>
             <?php } ?>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Address <span class="text-danger"></span></label>
                  <textarea class="form-control" name="team_address" id="team_address" cols="3" rows="8"><?php echo $getEventInfoVal['team_address'];?></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>About Team <span class="text-danger"></span></label>
                  <textarea class="form-control" name="team_description" id="team_description" cols="5" rows="8"><?php echo $getEventInfoVal['team_description'];?></textarea>
                </div>
              </div>
            </div>
            <div class="m-t-20 text-center">
              <button class="btn btn-primary">Update Team</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
