  <div class="modal fade" id="amountbreakup<?php echo $value['id'];?>"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <ul class="list-group list-group-flush">
              <?php
                $ModelCall->where("bill_num",$value['bill_number']);
                $rec = $ModelCall->get("tbl_bill_payment_details");
              ?>
    <li class="list-group-item">Bill Amount: <?php echo ucwords($value['payable_amount']);?></li>
    <?php foreach($rec as $value1){?>
  <li class="list-group-item">Amount paid by: <?php echo $value1['mode'];?> : <?php echo $value1['amount_received'];?> </li> 
 <li class="list-group-item">Date paid: <?php echo $value1['date_received'];?></li> 
 <?php }?>
  <li class="list-group-item">Due Amount: <?php echo ucwords($value['total_outstanding']);?></li>
  <li class="list-group-item">Due Date: <?php echo dateformatchange($value['due_date']);?> </li>
  <?php if(($value['total_outstanding']>0) && ($value['bill_date']==$max_bill_date))  {?>
  <li class="list-group-item">	<form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>RWAVendor/controller/bill_payment_controller.php" target="_blank" onSubmit="return validateform();">
                    <input type="hidden" name="ActionCall" value="BillpaperModule">
                    <input type="hidden" name="bill_no" id="bill_no" value="<?php echo $value['bill_number']; ?>">
                     <input type="hidden" name="amt_<?php echo $value['bill_number'];?>" value="<?php echo $value['total_outstanding'];?>">
                       <?php if($value['total_outstanding']>0){?> <button  class="btn btn-success" name  ='paynow' type="submit" value='1' onclick="assignValues('<?php echo $value['bill_number'];?>');"  style='border-radius: 10px;' >pay now</button><?php }?> 
<?php if($value['total_outstanding']==0){echo "Paid"; }?>
                    </form></li>
                    <?php }?>
  </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>