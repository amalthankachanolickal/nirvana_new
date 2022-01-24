<div id="add_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Event</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/event_controller.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateEvent">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Event Name <span class="text-danger">*</span></label>
                    <input class="form-control" name="event_name" id="event_name" required value="" type="text">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Event Date <span class="text-danger">*</span></label>
                    <input class="form-control event_date" name="event_date" id="datepicker1" required value="" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Event Time <span class="text-danger">*</span></label>
                    <input class="form-control floating" name="event_time" id="event_time" required value="" type="text">
                  </div>
                </div>
         
                
    <script>
        $('#datepicker1').datepicker({format: 'dd-mm-yyyy',
            uiLibrary: 'bootstrap'
        });
    </script>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Contact Number <span class="text-danger">*</span></label>
                    <input class="form-control" name="event_contact_number" id="event_contact_number" required value="" type="text">
                  </div>
                </div>
                 <br></br>
               <div class="container">
                        
    <div class="row clearfix">
		<div class="col-md-10 column">
			<table class="table table-bordered table-hover" id="tab_logic_i">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Image
						</th>
					
					
					</tr>
				</thead>
				<tbody>
					<tr id='addri0'>
						<td>
						1
						</td>
						<td>
						 <input class="form-control"  id="event_picr1" name="event_picr1"  required   type="file">
						</td>
					
					
					</tr>
                    <tr id='addri1'></tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row_i" class="btn btn-default pull-left">Add New image</a><a id='delete_row_i' class="pull-left btn btn-default">Remove image</a>
</div>
                
                <div class="col-sm-12">
                <div class="form-group">
                  <label>Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="event_location" id="event_location" cols="3" rows="8"></textarea>
                </div>
              </div>
              
              
            <!--  <div class="col-sm-12">
                <div class="form-group">
                  <label>About Event <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="event_description" id="event_description" cols="5" rows="8"></textarea>
                </div>
              </div> -->
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Terms & Conditions <span class="text-danger">*</span></label>
                <textarea class="form-control" name="event_terms" id="event_terms" cols="5" rows="8"></textarea>
                </div>
              </div>
                
              
              
                
              </div>
              <br></br>
               <div class="container">
                   <label>Add Content To The Event  </label>
    <div class="row clearfix">
		<div class="col-md-10 column">
			<table class="table table-bordered table-hover" id="tab_logic_c">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Section Name
						</th>
						<th class="text-center">
							Content
						</th>
					
					</tr>
				</thead>
				<tbody>
					<tr id='addrc0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='name_c0'  placeholder='Name' class="form-control" value="About Event" />
						</td>
						<td>
						<textarea type="text" name='content0' placeholder='Content' class="form-control" rows="8"/></textarea>
						</td>
					
					</tr>
                    <tr id='addrc1'></tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row_c" class="btn btn-default pull-left">Add New Section</a><a id='delete_row_c' class="pull-left btn btn-default">Remove Section</a>
</div>
 <br></br>
 
               <br></br>
               <div class="container">
                   <label>Inventory Details </label>
    <div class="row clearfix">
		<div class="col-md-10 column">
			<table class="table table-bordered table-hover" id="tab_logic_in">
				<thead>
					<tr >
					
						<th class="text-center">
							Total Availble Tickets
						</th>
						<th class="text-center">
							Tickets Sold by admin
						</th>
							<th class="text-center">
							Offer end date 
						</th>
							<th class="text-center">
							Last date 
						</th>
						</th>
							<th class="text-center">
							Offer tickets limit
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addrin0'>
					
						<td>
						<input type="number" name='ttickets0'  placeholder='Total Availble Tickets' class="form-control"  />
						</td>
						<td>
						<input type="number" name='sold0'  placeholder='Tickets Sold by admin' class="form-control"  value='0'/>
						</td>
						<td>
						<input type="date" name='offerenddate0'  placeholder='Offer end date' class="form-control" />
						</td>
							<td>
						<input type="date" name='lastdate0'  placeholder='Last date' class="form-control" />
						</td>
						<td>
						<input type="number" name='otl0'  placeholder='offer tickets limit' class="form-control" />
						</td>
					
					</tr>
                    <tr id='addrin1'></tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
 <br></br>
 
                                      <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Show Available Tickets </label>
                             <select class="form-control" id="sel1" name="sh_av_tc">
   <option value='0'>No</option>
                              <option  value='1'>Yes</option>
                             
  
    
  </select>
                  </div>
                  </div>
                                    <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Show Sold Tickets </label>
                             <select class="form-control" id="sel1" name="sh_sl_tc">
   <option value='0'>No</option>
                              <option  value='1'>Yes</option>
                             
  
    
  </select>
                  </div>
</div>

</br></br></br>
 
 
             <div class="container">
                   
    <div class="row clearfix">
		<div class="col-md-10 column">
		    <label>Ticket pricing table  </label>
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Category type
						</th>
						<th class="text-center">
							Price
						</th>
						<th class="text-center">
							Offer Price
						</th>
						
						
							<th class="text-center">
							Part of Inventory 
						</th>
					
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='name0'  placeholder='Category type' class="form-control"/>
						</td>
						<td>
						<input type="number" name='price0' placeholder='Price' class="form-control"/>
						</td>
						<td>
						<input type="number" name='oprice0' placeholder='Offer Price' class="form-control"/>
						</td>
						 <td>
						<input type="checkbox" name='pinventory0' placeholder='Totel Tickets' class="form-control"/>
						</td>
					
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row" class="btn btn-default pull-left">Add New Category</a><a id='delete_row' class="pull-left btn btn-default">Delete Category</a>
</div>
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Create Event</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>