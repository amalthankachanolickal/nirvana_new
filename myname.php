<?php 
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->where("status",1);	   
$ModelCall->orderBy("id","asc");
$HomeEvents = $ModelCall->get("tbl_events");
if($HomeEvents[0]>0)
{
foreach($HomeEvents as $HomeEventsVal)
{
if(is_array($HomeEventsVal))
{

$getDay = strtotime($HomeEventsVal['event_date']);
$DayDisplay = date('d', $getDay);
?>

   
<div id="event_info_display_<?php echo $HomeEventsVal['id']; ?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Welcome to the Annual Nirvana <?php echo ucwords($HomeEventsVal['event_name']);?> Party!! </h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="BookTicket">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            
            <div class="row">
                <div class="col-sm-6 border border-primary">
                <label class="control-label ">Event Address <span class="text-danger">*</span></label>
                <label class="control-label"><?php echo $HomeEventsVal['event_location'];?> <span class="text-danger border border-primary"></span></label>
                </div>
                <div class="col-sm-6 border border-primary">
                <label class="control-label">Event Date/Time<span class="text-danger"></span></label><br>
                <label class="control-label"><?php echo $HomeEventsVal['event_date'];?>/<?php echo $HomeEventsVal['event_time'];?> <span class="text-danger">*</span></label>
                </div>
            </div>
       
              <div class="row"><br></div>
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Number of tickets (Senior Citizens) <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
              
              <div class="col-sm-3">
                <label class="control-label ">Price <span class="text-danger">*</span></label><br>
                <label class="control-label " id="price1" >1200 <span class="text-danger">*</span></label><br>
                </div>
              
              <div class="col-sm-3">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                  <label class="control-label " id="total1" > <span class="text-danger"></span></label><br>
                </div>
                
                
        
              </div>
              <div class="row">
               <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Number of tickets (Adults) <span class="text-danger">*</span></label>
                    <select class="form-control" id="adult" name="no_of_tickets_sc" required title="Number of tickets" placeholder="Number of tickets ">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              <div class="col-sm-3">
                <label class="control-label " >Price <span class="text-danger">*</span></label><br>
                <label class="control-label" id="p2"><?php echo 1200;?> <span class="text-danger border border-primary"></span></label>
                </div>
              
              <div class="col-sm-3">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                <label class="control-label"id="t2"><?php echo 1200 ;?> <span class="text-danger border border-primary"></span></label>
                </div>
                
                
                
               
           
            
              
            </div>
            
            
            
            
                <div class="row">
               <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Number of tickets (Kids) <span class="text-danger">*</span></label>
                    <select class="form-control" id="child" name="no_of_tickets_ks" required title="Number of tickets" placeholder="Number of tickets ">
<option  value="0" >0 </option>
                <option  value="1" >1 </option>
                <option  value="2" >2 </option>
                <option  value="3" >3 </option>
                <option  value="4" >4 </option>
                <option  value="5" >5 </option>
                <option  value="6" >6 </option>
                <option  value="7" >7 </option>
                <option  value="8" >8 </option>
                <option  value="9" >9 </option>
               
    
  </select>
                </div>
              </div>
              
              
              
              <div class="col-sm-3">
                <label class="control-label ">Price <span class="text-danger">*</span></label><br>
                <label class="control-label" id="p3"><?php echo 1200;?> <span class="text-danger border border-primary"></span></label>
                </div>
              
              <div class="col-sm-3">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                <label class="control-label" id="t3"><?php echo 1200;?> <span class="text-danger border border-primary"></span></label>
                </div>
                
                
                
           
            
              
            </div>
            
            
            
              <div class="row">
                  
            <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Ticket type <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="ticket_type" required title="Ticket type" placeholder="Ticket type ">

               <option  value="Resident" >Resident </option>
                <option  value="Guest">Guest </option>
                <option  value="External">External </option>
    
  </select>
                </div>
                </div>
                  <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Payment mode <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="payment_mode" required title="Payment mode" placeholder="Payment mode " >
<option  value="Cash/Cheque" >Cash/Cheque </option>
                <option  value="Online" >Online </option>
    
  </select>
                </div>
            
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                <label class="control-label"><?php echo 1200;?> <span class="text-danger border border-primary"></span></label>
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
  </div>

    <?php } } } ?>