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
<div id="event_info_display_external_<?php echo $HomeEventsVal['id']; ?>" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title"><center> Welcome to the Annual Nirvana <?php echo ucwords($HomeEventsVal['event_name']);?> Party!! </center></h4>
        </div>
        <div class="modal-body">
           <form class="m-b-30" action="RWAVendor/controller/FunctionCall.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ActionCall" value="BookTicket">
            <input type="hidden" name="eid" value="<?php echo $HomeEventsVal['id']; ?>">
          
              <table class="table table-striped custom-table datatable" style="height:150">
                  <thead>'
                <tr>
                  <th>Event Address</th>
                  <th></th>
                  <th>Event Date/Time</th>
                </tr>
              </thead>
              <tboby>
                  <tr>
                      <td><?php echo $HomeEventsVal['event_location'];?> </td>
                      <td></td>
                      <td><?php echo $HomeEventsVal['event_date'];?>/<?php echo $HomeEventsVal['event_time'];?> </td>
                  </tr>
                  </tbody>
              </table>
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
            <label style="padding-right:250px">Ticket type<strong style="color:#FF0000;">*</strong></label>
            <select name="ticket_type" id="ticket_type" required title="Ticket type" placeholder="Ticket type " style="padding-right:150px">
                <option value=""> </option>
                <option  value="External" >External </option>
                </select>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                   <label style="padding-right:150px">Number of tickets (Senior Citizens)</label>
             <select name="no_of_tickets_sc" id="no_of_tickets_sc" title="Number of tickets" placeholder="Number of tickets " style="padding-right:150px">
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
              </div>
              <div class="row">
               <div class="col-sm-4">
                <div class="form-group">
                  <label style="padding-right:200px">Number of tickets (Adults)</label>
            <select name="no_of_tickets_ad" id="no_of_tickets_ad" title="Number of tickets" placeholder="Number of tickets " style="padding-right:150px">
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
              <div class="col-sm-4">
                <div class="form-group">
                   <label style="padding-right:250px">Number of tickets (Kids)</label>
            <select name="no_of_tickets_ks" id="no_of_tickets_ks" title="Number of tickets" placeholder="Number of tickets " style="padding-right:150px">
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
                <div class="col-lg-12 no-pdd" style="padding-right:20px">
            <div class="form-group">
            <label style="padding-right:150px">Payment mode<strong style="color:#FF0000;">*</strong></label>
            <select name="payment_mode" id="payment_mode" required title="Payment mode" placeholder="Payment mode " style="padding-right:150px">
                <option value=""> </option>
                <option  value="Cash/Cheque" >Cash/Cheque </option>
                <option  value="Online" >Online </option>
                </select>
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
  
    <?php } } } ?>