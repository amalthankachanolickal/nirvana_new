<div id="approve_document" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Approve Document</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateDocument">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                  <label class="control-label">Document Caption <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="document_tilte">
                        <option value="Attendance">Attendance</option>
                         <option value="Compost_plant_performance">Compost plant performance</option>
                          <option value="EC_Documents">EC Documents</option>
                         <option value="EC_Meetings">EC Meetings</option>
                        <option value="Event _Photos">Event Photos</option>
                         <option value="Escalation_matrix">Escalation matrix</option>
                           <option value="Exec_Smry_HSD">Exec Smry + HSD</option>
                        <option value="Financial_reports">Fin Reports</option>
                           <option value="Forms">Forms</option>
                            <option value="GBMs">GBMs</option>
                            <option value="Initiatives">Initiatives</option>
                              <option value="Legal_Cases">Legal Cases</option>
                              <option value="Min_of_Mtgs">Min. of Mtgs.</option>
                                <option value="Monthly_performance_MMR">Monthly performance MMR</option>
                                <option value="Notices">Notices</option>
                                  <option value="Office_Bearer">Office Bearers</option>
                                  <option value="Others">Others</option>
                                  <option value="Other_Key_Achievements">Other Key Achievements</option>
                                  <option value="Processes">Processes</option>
  <option value="Society_Rules">Rule</option>
<option value="Society_Services">Society Services</option>
 <option value="Status_of_MCG_Takeover">Status of MCG Takeover</option>
    
    
  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="mail_notification">
    <option value="None">None</option>
    <option value="All">All</option>
    <option value="Active">Active</option>

    <option value="Deavtived">Deavtived</option>
     <option value="Sussepended">Sussepended</option>
  
    
  </select>
                </div>
              </div>
              
              
              <div class="col-sm-5">
                <div class="form-group">
                  <label class="control-label">Document File <span class="text-danger">*</span></label>
                  <input class="form-control" name="document_file" id="document_file" required type="file">
                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>
                </div>
              </div>
              
           
              
              
            </div>
              <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
      <label for="comment">File Name</label>
     <input class="form-control" name="document_name" id="document_name" required type="text" maxlength="20">
    </div>
    </div>
              <div class="col-sm-6">
            <div class="form-group">
      <label for="comment">Discription</label>
      <textarea class="form-control"  id="comment" name="comment" maxlength="50"></textarea>
    </div>
    </div>
     <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Date <span class="text-danger">*</span></label>
                    <input class="form-control event_date" name="upload_date" id="upload_date" required value="" type="date">
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