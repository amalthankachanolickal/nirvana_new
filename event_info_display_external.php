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
<style>
   input[type=text]:disabled {
  background: white;
  border:0;
}
.img {
    outline: 1px solid orange;
}
</style>
   
<div id="event_info_display_external_<?php echo $HomeEventsVal['id']; ?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Welcome to the Annual Nirvana <?php echo ucwords($HomeEventsVal['event_name']);?> Party!! </h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="RWAVendor/controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="BookTicket">
            <input type="hidden" name="eid" value="<?php echo $HomeEventsVal['id']; ?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            
            <div class="row well">
                <div class="col-sm-6 border border-primary">
                <label class="control-label ">Event Address <span class="text-danger">*</span></label><br/>
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
     <div class="form-group">
                <label class="control-label ">Price <span class="text-danger">*</span></label><br>
                <input id="a2"  disabled type="text"  value="<?php echo $HomeEventsVal['price_of_ticket_before_sc'];?>"   />
                <!-- <label class="control-label" id="a2"> </label> -->
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
              
              <div class="col-sm-3">
                  <div class="form-group">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                <input id="a3" disabled type="text" name="total_amt_sc" />
               <!-- <label class="control-label"  id="a3" name="total_amt_sc" value="" /> -->
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                </div>
                
                
        
              </div>
              <div class="row">
               <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Number of tickets (Adults) <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="no_of_tickets_ad" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
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
                <input id="a4"  disabled type="text"  value="<?php echo $HomeEventsVal['price_of_ticket_before_ad'];?>"   />
                <!--<label class="control-label" id="a2"> <span class="text-danger border border-primary"></span></label> -->
                </div>
              
              <div class="col-sm-3">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                <input id="a5" disabled type="text" name="total_amt_ad" />
               <!-- <label class="control-label" id="a3"><span class="text-danger border border-primary"></span></label> -->
                </div>
                
                
                
               
           
            
              
            </div>
            
            
            
            
                <div class="row">
               <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Number of tickets (Kids) <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel3" name="no_of_tickets_ks" required title="Number of tickets" placeholder="Number of tickets " onblur="calculate()">
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
                <input id="a6"  disabled type="text"  value="<?php echo $HomeEventsVal['price_of_ticket_before_kd'];?>"   />
                <!--<label class="control-label" id="a2"><span class="text-danger border border-primary"></span></label> -->
                </div>
              
              <div class="col-sm-3">
                <label class="control-label ">Total <span class="text-danger">*</span></label><br>
                <input id="a7" disabled type="text" name="total_amt_kd" />
               <!-- <label class="control-label" id="a3"> <span class="text-danger border border-primary"></span></label> -->
                </div>
                
                
                
           
            
              
            </div>
            
            
            
              <div class="row">
                  
            <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Ticket type <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="ticket_type" required title="Ticket type" placeholder="Ticket type ">
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
                <label class="control-label "> <span class="text-danger">*</span></label><br>
                <input id="a8" disabled type="text" name="total_amt"  />
                </div>
            
            </div>
            
            <?php
            $ModelCall->where("event_id",$HomeEventsVal['id']);
            $totalTickets = $ModelCall->get("tbl_tickets");
            $counter = 0;
            if($totalTickets[0]>0)
            {
                foreach($totalTickets as $totalTicket)
                {   
                    if(is_array($totalTicket))
                    {
                        $counter = $counter + $totalTicket['no_of_tickets_sc'] + $totalTicket['no_of_tickets_ad'];
                    }
                }
            }
            ?>

            <div class="row">
                  
            
            
            <div class="col-sm-3">
                <label class="control-label ">Sold: <?php echo $counter; ?> </label>
             
            </div>
            <div class="col-sm-3">
                <label class="control-label " id="remaining" value="<?php echo ($HomeEventsVal['no_of_tickets'] - $counter); ?>">Remaining: <?php echo ($HomeEventsVal['no_of_tickets'] - $counter); ?></label>
            </div>
            <div class="col-sm-3">
                  <input id="a9" disabled type="text" name="total_amt"  />
            </div>
            <div class="col-sm-3"></div>
            </div>
            <div class="col-lg-12 no-pdd">
                          <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="policy_accept" name="policy_accept" value="1" required>
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;">Yes, I understand and agree to the Nirvana Country <a  href="<?php echo SITE_URL;?>cms/terms-of-service/" target="_blank" style="color: #37a000;">Terms of Use</a>.</small> </div>
                            <!--fgt-sec end-->
                          </div>
                        </div>

        <div class="m-t-20 text-center">
                                     <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
</div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <br>
       
                
            </div>
          </form>
          
          </div>
           <div class="row ">
                  
            <div class="col-sm-6 well">
<img src="<?php echo SITE_URL.MAINADMIN;?>events/photo/<?php echo $HomeEventsVal['event_pic'];?>" alt="">

        </div>
        <div class="col-sm-5">
<div class="row well">
     <label class="control-label ">About the Event<span class="text-danger">*</span></label><br/>
                <label class="control-label"><?php echo $HomeEventsVal['event_description'];?> <span class="text-danger border border-primary"></span></label>
               
    </div>
  
    <div class="row well">
     <label class="control-label ">TnC <span class="text-danger">*</span></label><br/>
                <label class="control-label "><?php echo $HomeEventsVal['event_terms'];?> <span class="text-danger border border-primary"></span></label>
               
    </div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <script>
calculate = function()
{
    var v1=0;
    var v2=0;
    var v3=0;
  var ek = document.getElementById('sel1').value;
    var minutes = document.getElementById('a2').value; 
     v1= parseInt(ek)*parseInt(minutes);
  var ek2 = document.getElementById('sel2').value;
    var minutes2 = document.getElementById('a4').value; 
   v2=parseInt(ek2)*parseInt(minutes2);
      var ek3 = document.getElementById('sel3').value;
    var minutes3 = document.getElementById('a6').value; 
    v3=parseInt(ek3)*parseInt(minutes3);
    document.getElementById('a7').value =v3;
    document.getElementById('a3').value=v1;
     document.getElementById('a5').value =v2
     /*document.getElementById('a8').value=v1+v2+v3;
     var rim = document.getElementById('remaining').value;
     if(rim<0){
        document.getElementById('a9').value="No ticket left" ;
     }*/
   }
</script>
    <?php } } } ?>