<div id="sell_admin<?php echo $getEventInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Sell Tickets </h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/sell_event_tickets_controller.php" method="post" enctype="multipart/form-data"  onSubmit="return checkTickets();">
      
            <input type="hidden" name="eid" value="<?php echo $getEventInfoVal['id'];?>">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
              <div class="row">
               
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Email <span class="text-danger">*</span></label>
                    <input class="form-control" name="Email" id="Email" required value="" type="Email" required>
                  </div>
</div>
                     <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Block<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="block_number">
    <option value="1">AG</option>
    <option value="2">BC</option>
    <option value="3">CC</option>

    <option value="4">DW</option>
     <option value="5">ES</option>
  
    
  </select>
                </div>
              </div>
                          <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">House Number <span class="text-danger">*</span></label>
                    <input class="form-control" name="house_number" pattern="[0-9]{0-3}" placeholder="Enter your 3 Digit House No" title="Three Digit House No" required value="" type="text" maxlength="3">
                  </div>

              </div>
               <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Floor<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="Floor_nubmer">
   <option value='1'>Ground Floor</option>
                              <option  value='2'>First Floor</option>
                              <option value='3'>Second Floor</option>
                              <option value='4'>Third Floor</option>
                              <option value='5'>Fourth Floor</option>
  
    
  </select>
                </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Ticket Type </label>
                   </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Quantity </label>
                   </div>
              </div>
              <?php 
              $ModelCall->where("eid",$getEventInfoVal['id']);
              $geteventtInfo = $ModelCall->get("tbl_events_tickets");
              foreach($geteventtInfo as $ttype){ ?>
                             <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label"><?php echo $ttype['category']; ?></label>
                               </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                  <input class="form-control" name="tt<?php echo$ttype['id']; ?>" id="tt<?php echo$ttype['id']; ?>"  value="0" type="number" onchange="getValuethis(this)" >
                                </div>
              </div>
              <?php }?>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Mobile Number </label>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <input class="form-control" name="phone" id="phone"  type="number" >
                </div>
              </div>     
              
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">	Date Sold  </label>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <input class="form-control date_sold" name="datesold" required type="date"
                  placeholder="YYYY-MM-DD" required />
           
                </div>
              </div>     
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">	Total Amount  </label>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <input class="form-control" name="amount" id="amount"  value="0" type="number" >
                 
                </div>
              </div>     
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">	Mode of Payment  </label>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <input class="form-control" name="mode" id="mode"  value="" >
                 
                </div>
              </div>   
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Payment Details   </label>
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <input class="form-control" name="payment" id="payment"  value="" >
                 
                </div>
              </div>   
              </div>
              
              </div>
              
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Record</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
               
  <script>
  var  ticketQty=0;

  

        function checkTickets(){
         if(ticketQty<1){
           alert("Please select at leat one of tickets from the category");
          return false;
         }else{
          return;
         }
        }
        
        function getValuethis(inputbox){
         if($(inputbox).val()!=0){
          ticketQty=ticketQty+$(inputbox).val();
         }
        }
    </script>