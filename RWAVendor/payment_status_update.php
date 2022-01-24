<style>
   input[type=text]:disabled {
  background: white;
  border:0;
}
.img {
    outline: 1px solid orange;
}
</style>
<div id="update-user-status<?php echo $getCustomerInfoVal['user_id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title">Bill Payment</h4>
        </div>
                <div class="modal-body">
             
       <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="UpdatePaymnetStatus">
           
            <input type="hidden" name="eid" value="<?php echo $getCustomerInfoVal['user_id'];?>">
          <div class="modal-body card-box">
          
            <div class="row">                  <div class="col-sm-6">
                <div class="form-group"><label class="control-label">Bill Amount <span class="text-danger">*</span></label>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group"><input id="a2"  disabled type="text"   value="<?php echo ucwords($getCustomerInfoVal['total_outstanding']);?>"   />
                <input name="bill_amount"  hidden type="text"   value="<?php echo ucwords($getCustomerInfoVal['total_outstanding']);?>"   />
                </div>
                </div>
</div>
         <div class="row">                  <div class="col-sm-6">
                <div class="form-group"><label class="control-label">Cash <span class="text-danger">*</span></label>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group"><input id="a3"   type="text" name='received_cash' value="0" onblur="calculate()"  />
                </div>
                </div>
</div>
         <div class="row">                  <div class="col-sm-6">
                <div class="form-group"><label class="control-label">Caque <span class="text-danger">*</span></label>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group"><input id="a4"   type="text"  value="0" name='received_cheque' onblur="calculate()" />
                </div>
                </div>
</div>
         <div class="row">                  <div class="col-sm-6">
                <div class="form-group"><label class="control-label">Online <span class="text-danger">*</span></label>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group"><input id="a5"   type="text"  value="0" name='received_e_payment' onblur="calculate()"  />
                </div>
                </div>
</div>
  <div class="row">                  <div class="col-sm-6">
                <div class="form-group"><label class="control-label">Reversal <span class="text-danger">*</span></label>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group"><input id="a7"   type="text"  value="0" name='received_e_payment' onblur="calculate()"  />
                </div>
                </div>
</div>

 <div class="row">                  <div class="col-sm-6">
                <div class="form-group"><label class="control-label">Total Outstanding<span class="text-danger">*</span></label>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="form-group"><input id="a6"  disabled type="text" name='total_outstanding'  value=""  onblur="calculate()" />
                </div>
                </div>
</div>
                     
            <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-success" name="user_status" value="Active">Pay</button>
                
            </div>
          </div>
        </form>
        
        
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
    var v4=0;
    var v5=0;
    

    var minutes = document.getElementById('a2').value; 
     v1= parseInt(minutes);

    var minutes2 = document.getElementById('a3').value; 
   v2=parseInt(minutes2);
 
    var minutes3 = document.getElementById('a4').value; 
    v3=parseInt(minutes3);
    var minutes3 = document.getElementById('a5').value; 
    v4=parseInt(minutes3);
    var minutes4 = document.getElementById('a7').value; 
    v6=parseInt(minutes4);
    if(v2==""){
        v2=0;
    }
    if(v3==""){
        v3=0;
    }
    if(v4==""){
        v4=0;
    }
    if(v6==""){
        v6=0;
    }
    v5=parseInt(v1)-parseInt(v2)-parseInt(v3)-parseInt(v4)-parseInt(v6);
   document.getElementById('a6').value=parseInt(v5); 
    
     
    
   }
</script>