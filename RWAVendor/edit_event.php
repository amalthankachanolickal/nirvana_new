<div id="edit_event<?php echo $getEventInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Event</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/event_controller.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateEvent">
            <input type="hidden" name="eid" value="<?php echo $getEventInfoVal['id'];?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Event Name <span class="text-danger">*</span></label>
                    <input class="form-control" name="event_name" id="event_name" required value="<?php echo $getEventInfoVal['event_name'];?>" type="text">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Event Date <span class="text-danger">*</span></label>
                    <input class="form-control event_date" name="event_date"  required value="<?php echo date_format(date_create($getEventInfoVal['event_date']),'Y-m-d'); ?>" type="date">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Event Time <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="event_time" id="event_time" required value="<?php echo $getEventInfoVal['event_time'];?>" type="text">
                  </div>
                </div>
                
                
    <script>
        $('#datepicker').datepicker({format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap'
        });
    </script>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Contact Number <span class="text-danger">*</span></label>
                    <input class="form-control" name="event_contact_number" id="event_contact_number" required value="<?php echo $getEventInfoVal['event_contact_number'];?>" type="text">
                  </div>
                </div>
                
               <!-- <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Event Image  <span class="text-danger">*</span></label>
                  <input class="form-control"  id="event_pic" name="event_pic"  <?php if($getEventInfoVal['event_pic']==''){?> required <?php } ?>  type="file">
          
                </div>
              </div> -->
              
              
               <?php if($getEventInfoVal['event_pic']!=''){?>
                <div class="col-sm-12">
                <div class="form-group">
                   <img src="<?php echo DOMAIN.AdminDirectory;?>events/photo/<?php echo $getEventInfoVal['event_pic'];?>" style="width:100px; height:100px;">
                     <input type="hidden" name="event_picOld" value="<?php echo $getEventInfoVal['event_pic'];?>">
                     </div></div>
                    <?php } ?>
                
                <div class="col-sm-12">
                <div class="form-group">
                  <label>Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="event_location" id="event_location" cols="3" rows="8"><?php echo $getEventInfoVal['event_location'];?></textarea>
                </div>
              </div>
              
              
            <!--  <div class="col-sm-12">
                <div class="form-group">
                  <label>About Event <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="event_description" id="event_description" cols="5" rows="8"><?php echo $getEventInfoVal['event_description'];?></textarea>
                </div>
              </div> -->
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Terms & Conditions <span class="text-danger">*</span></label>
                <textarea class="form-control" name="event_terms" id="event_terms" cols="5" rows="8"><?php echo $getEventInfoVal['event_terms'];?></textarea>
                </div>
              </div>
     		
     		
     					    <?php 
					    $ModelCall->where("eid",$getEventInfoVal['id']);

$HomeEventssection = $ModelCall->get("tbl_event_sections");
   $i=0;
foreach($HomeEventssection as $sections){
 
?>
 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Section <span class="text-danger">*</span></label>
                    <input class="form-control" name="namec<?php echo $i; ?>" id="event_name" required value="<?php echo $sections['section'];?>" type="text">
                    <input class="form-control"  name="row_section<?php echo $sections['id'];?>" id="event_name" required value="<?php echo $i; ?>" type="hidden">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Content <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="content<?php echo $i; ?>" id="event_terms" cols="5" rows="8" value="<?php echo $sections['content'];?>"><?php echo $sections['content'];?></textarea>
                  </div>
                </div>

<?php $i++;}?>
					    <?php 
					    $ModelCall->where("eid",$getEventInfoVal['id']);

$HomeEventsinventory = $ModelCall->get("tbl_event_ticket_inventory");
$i=0;

    
?>

 <div class="col-md-3">
                  <div class="form-group">
                     <label class="control-label">Total Availble Tickets <span class="text-danger">*</span></label>
						<input type="number" name='ttickets0'  placeholder='Total Availble Tickets' class="form-control" value="<?php echo $HomeEventsinventory[0]['total_tickets']; ?>"  />
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label class="control-label">Tickets Sold by admin <span class="text-danger">*</span></label>
						<input type="number" name='sold0'  placeholder='Tickets Sold by admin' class="form-control" value="<?php echo $HomeEventsinventory[0]['sold_by_admin']; ?>" />
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Offer end date <span class="text-danger">*</span></label>
						<input type="date" name='offerenddate0'  placeholder='Offer end date' class="form-control" value="<?php echo date_format(date_create($HomeEventsinventory[0]['offerenddate']),'Y-m-d'); ?>" />
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Last date <span class="text-danger">*</span></label>
	<input type="date" name='lastdate0'  placeholder='Last date' class="form-control" value="<?php echo date_format(date_create($HomeEventsinventory[0]['lastdate']),'Y-m-d'); ?>" />                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Offer tickets limit  <span class="text-danger">*</span></label>
						<input type="number" name='otl0'  placeholder='offer tickets limit' class="form-control" value="<?php echo $HomeEventsinventory[0]['otl']; ?>" />
                  </div>
                </div>


				 
                                      <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Show Available Tickets </label>
                             <select class="form-control" id="sel1" name="sh_av_tc">
   <option value='0' <?php if($HomeEventsinventory[0]['show_available']==0){ echo "selected";} ?>>No</option>
                              <option  value='1' <?php if($HomeEventsinventory[0]['show_available']==1){ echo "selected";} ?>>Yes</option>
                             
  
    
  </select>
                  </div>
                  </div>
                                    <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Show Sold Tickets </label>
                             <select class="form-control" id="sel1" name="sh_sl_tc">
   <option value='0'<?php if($HomeEventsinventory[0]['show_sold']==0){ echo "selected";} ?>>No</option>
                              <option  value='1' <?php if($HomeEventsinventory[0]['show_sold']==1){ echo "selected";} ?>>Yes</option>
                             
  
    
  </select>
                  </div>
</div>		

						
						

   
 					    <?php 
					    $ModelCall->where("eid",$getEventInfoVal['id']);

$HomeEventsticket = $ModelCall->get("tbl_events_tickets");
$i=0;
foreach($HomeEventsticket as $ticket){
    
?>
 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Category type <span class="text-danger">*</span></label>
                    <input class="form-control" name="name<?php echo $i; ?>" id="event_name" required value="<?php echo $ticket['category'];?>" type="text">
                    <input class="form-control" name="row_ticket<?php echo $ticket['id'];?>" id="event_name" required value="<?php echo $i; ?>" type="hidden">
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Price <span class="text-danger">*</span></label>
                    <input class="form-control" name="price<?php echo $i; ?>" id="event_name" required value="<?php echo $ticket['price'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Offer Price <span class="text-danger">*</span></label>
                    <input class="form-control" name="oprice<?php echo $i; ?>" id="event_name" required value="<?php echo $ticket['discounted_price'];?>" type="text">
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label">Part of Inventory  <span class="text-danger">*</span></label>
                    <input class="form-control" name="pinventory<?php echo $i; ?>" id="event_name"  <?php if($ticket['pinventory']){ ?>checked<?php }?> type="checkbox">
                  </div>
                </div>
               

<?php $i++;}?>
                
              </div>
              <br></br>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary">Update Event</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>