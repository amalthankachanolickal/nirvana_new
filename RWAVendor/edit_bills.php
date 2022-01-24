<div id="edit_bills<?php echo $getCustomerInfoVal['id'];?>" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Edit Bills</h4>
        </div>
        <div class="modal-body">
          <div class="m-b-30">
            <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="EditBills">
            <input type="hidden" name="eid" value="<?php echo $getCustomerInfoVal['id'];?>">
          <!--  <input type="hidden" name="eid" value="<?php echo $_REQUEST['eid'];?>">-->
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
             <input type="hidden" name="bill_num" value="<?php echo $getCustomerInfoVal['bill_number'];?>">
              <div class="row">
                  
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Bill Number<span class="text-danger">*</span></label>
                    <input class="form-control" name="bill_number" id="bill_number" required value="<?php echo $getCustomerInfoVal['bill_number'];?>" type="text">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Bill Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="bill_date" id="bill_date" required value="<?php echo date($getCustomerInfoVal['bill_date']);?>" type="date">
                  </div>
                </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Start Period Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="start_period_date" id="start_period_date" required value="<?php echo date($getCustomerInfoVal['start_period_date']);?>" type="date">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">End Period Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="end_period_date" id="end_period_date" required value="<?php echo date($getCustomerInfoVal['end_period_date']);?>" type="date">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Actual Due Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="actual_due_date" id="actual_due_date" required value="<?php echo date($getCustomerInfoVal['actual_due_date']);?>" type="date">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Display Due Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="display_due_date" id="display_due_date" required value="<?php echo date($getCustomerInfoVal['display_due_date']);?>" type="date">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Bill Area<span class="text-danger">*</span></label>
                    <input class="form-control" name="bill_area" id="bill_area" required value="<?php echo $getCustomerInfoVal['bill_area'];?>" type="text">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Flat No<span class="text-danger">*</span></label>
                    <input class="form-control" name="flat_no" id="flat_no" required value="<?php echo $getCustomerInfoVal['flat_no'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Member Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="member_name" id="member_name" required value="<?php echo $getCustomerInfoVal['member_name'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">CAM and O & M Services<span class="text-danger">*</span></label>
                    <input class="form-control" name="cam_o_m_services" id="cam_o_m_services" required value="<?php echo $getCustomerInfoVal['cam_o_m_services'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Reimbursement of Diesel Cost for Running DG Sets, at 3.0 KWH /Ltr (3 Months)<span class="text-danger">*</span></label>
                    <input class="form-control" name="diesel_cost" id="diesel_cost" required value="<?php echo $getCustomerInfoVal['diesel_cost'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Utility Charge (Water +Sewer +Common Electricity (3 Months).Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="utility_charge" id="utility_charge" required value="<?php echo $getCustomerInfoVal['utility_charge'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Total<span class="text-danger">*</span></label>
                    <input class="form-control" name="total" id="total" required value="<?php echo $getCustomerInfoVal['total'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Taxable Amount<span class="text-danger">*</span></label>
                    <input class="form-control" name="taxable_amount" id="taxable_amount" required value="<?php echo $getCustomerInfoVal['taxable_amount'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Arrears<span class="text-danger">*</span></label>
                    <input class="form-control" name="arrears" id="arrears" required value="<?php echo $getCustomerInfoVal['arrears'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Interest<span class="text-danger">*</span></label>
                    <input class="form-control" name="interest" id="interest" required value="<?php echo $getCustomerInfoVal['interest'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Cheque Dishonour Charges<span class="text-danger">*</span></label>
                    <input class="form-control" name="cheque_dishonour_charges" id="cheque_dishonour_charges" required value="<?php echo $getCustomerInfoVal['cheque_dishonour_charges'];?>" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">CGST on Cheque Dishonour Charges<span class="text-danger">*</span></label>
                    <input class="form-control" name="cgst_cheque_dishonour" id="cgst_cheque_dishonour" required value="<?php echo $getCustomerInfoVal['start_period_date'];?>" type="text">
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> SGST on Cheque Dishonour Charges<span class="text-danger">*</span></label>
                    <input class="form-control" name="sgst_cheque_dishonour" id="sgst_cheque_dishonour" required value="<?php echo $getCustomerInfoVal['sgst_cheque_dishonour'];?>" type="text">
                  </div>
                </div>
             
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Payable Amount <span class="text-danger">*</span></label>
                    <input class="form-control" name="payable_amount" id="payable_amount" required value="<?php echo $getCustomerInfoVal['payable_amount'];?>" type="text">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Amount Paid<span class="text-danger">*</span></label>
                    <input class="form-control" name="amt_paid" id="amt_paid" required value="<?php echo $getCustomerInfoVal['amt_paid'];?>" type="text">
                  </div>
                </div>
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Balance Due <span class="text-danger">*</span></label>
                    <input class="form-control" name="total_outstanding" id="total_outstanding" required value="<?php echo $getCustomerInfoVal['total_outstanding'];?>" type="text">
                  </div>
                </div>
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Late Fee Charges<span class="text-danger">*</span></label>
                    <input class="form-control" name="late_fee_charge" id="late_fee_charge" required value="<?php echo $getCustomerInfoVal['late_fee_charge'];?>" type="text">
                  </div>
                </div>
                
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Payable After Due Date<span class="text-danger">*</span></label>
                    <input class="form-control" name="pay_after_due" id="pay_after_due" required value="<?php echo $getCustomerInfoVal['pay_after_due'];?>" type="text">
                  </div>
                </div>
               <div class="modal-header">
          <h4 class="modal-title">Payment details</h4>
          <?php
          $ModelCall->where ("bill_num", $getCustomerInfoVal['bill_number']);
$value =  $ModelCall->get ('tbl_bill_payment_details');
          ?>
        </div>
    <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Mode of Pay<span class="text-danger">*</span></label>
                    <input class="form-control" name="mode" id="late_fee_charge" required value="<?php echo $value[0]['mode'];?>" type="text">
                  </div>
                </div>
                
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Date Paid<span class="text-danger">*</span></label>
                    <input class="form-control" name="date_paid" id="pay_after_due" required value="<?php echo $value[0]['date'];?>" type="date">
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Amount<span class="text-danger">*</span></label>
                    <input class="form-control" name="amount" id="pay_after_due" required value="<?php echo $value[0]['amount'];?>" type="text">
                  </div>
                </div>
                
              </div>
              <div class="m-t-20 text-center">
                <button class="btn btn-primary">Edit Bills</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>