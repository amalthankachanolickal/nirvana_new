
<div id="add_document" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title">Add Document</h4>
        </div>
        <div class="modal-body">
          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ActionCall" value="AddUpdateDocument">
            <input type="hidden" name="eid" value="">
            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                   
                  <label class="control-label">Document Caption <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="document_tilte">
                        <option value="Attendance">Attendance</option>
                         <option value="Accounts">Accounts</option>
                         <option value="Compost_plant_performance">Compost plant performance</option>
                          <option value="EC_Documents">EC Documents</option>
                         <option value="EC_Meetings">EC Meetings</option>
                        <option value="Event _Photos">Event Photos</option>
                         <option value="Escalation_matrix">Escalation matrix</option>
                           <option value="Exec_Smry_HSD">Exec Smry + HSD</option>
                           <option value="Members_Checklist">Members Checklist</option>
                            <option value="Election_Schedule">Election Schedule</option>
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
                                    <option value="Electricity_Bill">Electricity Bills</option>
                                    <option value="Water_Sewer_Bills">Water & Sewer Bills</option>
  </select>
                </div>
              </div>
             
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Document File <span class="text-danger">*</span></label>
                  <input class="form-control" name="document_file" id="document_file" required type="file" onchange="CheckFileSize(this);">
                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>
                </div>
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label><br>  
                  <div> 
                  <div class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="" checked  onclick="return ValidateSelection();">None </div>
                 
                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Group"  onclick="return ValidateSelection();">Google Group   </div>
                  <div  class="col-sm-2">   <input type="checkbox" name="mail_notification[]" value="OfficeBearers"  onclick="return ValidateSelection();"> Office Bearers   </div>
                  <div  class="col-sm-2">  <input type="checkbox" name="mail_notification[]" value="EC"  onclick="return ValidateSelection();"> EC</div>
                  <div  class="col-sm-2">  <input type="checkbox" name="mail_notification[]" value="CRM"  onclick="return ValidateSelection();"> CRM</div>
                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="Marketing"  onclick="return ValidateSelection();"> Marketing</div>
                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="Accounts"  onclick="return ValidateSelection();"> Accounts</div>
                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="Office"  onclick="return ValidateSelection();"> Office.NRWA</div>
                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="animesh.bhardwaj@nimbusharbor.com"  onclick="return ValidateSelection();">Animesh</div>
                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Active"  onclick="return ValidateSelection();"> Active</div>
                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Deactivated"  onclick="return ValidateSelection();"> Inactive</div>
                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Suspended"  onclick="return ValidateSelection();"> Suspended</div>
                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Owners"  onclick="return ValidateSelection();"> Owners</div>
                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Tenants"  onclick="return ValidateSelection();">Tenants</div>
                </div>
              </div>
              
           
              
              
            </div>
              <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
      <label for="comment">File Name</label>
     <input class="form-control" name="document_name" id="document_name" required type="text" maxlength="100">
    </div>
    </div>
              <div class="col-sm-6">
            <div class="form-group">
      <label for="comment">Description</label>
      <textarea class="form-control"  id="comment" name="comment" maxlength="200"></textarea>
    </div>
    </div>
     <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Date <span class="text-danger">*</span></label>
                    <input class="form-control event_date" name="upload_date" id="upload_date" required value="" type="date">
                  </div>
     </div>
     <div class="col-md-6" id="divMessage" style="display:none">
                  <div class="form-group">
                    <label class="control-label" for="message">Message in the Mail </label>
                    <textarea class="form-control"  id="message" name="message" maxlength="200" ></textarea>
                  </div>
     </div>      

       <div class="col-md-6" id="divBox" style="display:none">
                  <div class="form-group">
                    <label class="control-label" for="mailattach">Attachment to be added in Mail  -   </label>
                    <input type="radio" id="Yes" name="mailattach" value="Yes">
<label for="Yes">Yes</label>
<input type="radio" id="No" name="mailattach" value="No">
<label for="No">No</label><br>
                  </div>
     </div>      
      
            </div>
            <div class="m-t-20 text-center" id="divBtnPreview" style="display:none">
              <button type="button" class="btn btn-primary" onclick="PreviewMail()">Preview</button>
            </div>

            <div class="col-md-12" id="previewDiv">
         
          
          </div> 

          <br><br>
            <div class="m-t-20 text-center">
              <button type="submit" id="btnsubmit" class="btn btn-primary" >Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
  function PreviewMail(){
    var Body='';
    var site_url="<?php echo DOMAIN;?>";
    var document_name= document.getElementById("document_name").value;
    var document_title= document.getElementById("sel1").value;
    var message =document.getElementById("message").value;
    Body = " <label>Mail Content Preview : </label><div align='center'>Subject Line : New Document " + document_name + " is added on website.<table width='100%' border='1' cellspacing='0' cellpadding='0' style='background:#fff'><tbody><tr><td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>Dear Residents, </p><p>The  '"+document_name+"' ,  have been added  online under Home Page / NRWA / "+ document_title + ". You may <a href='#' target='_blank'>Click here </a>to view the same.</p>";
    if(message!=""){
      Body = Body +"<p>"+message + "</p>";
    }
    Body = Body +" For any queries or suggestions, feel free to contact <a href='mailto:office.nrwa@nirvanacountry.co.in' target='_blank'>office.nrwa@nirvanacountry.co.in</a><br><br>Best Regards<br>NRWA Office.<br><a href='"+ site_url + "'> www.nirvanacountry.co.in</a><br><br> Visit <a href='"+ site_url + "'>www.nirvanacountry.co.in</a> for latest COVID Updates, all NRWA related information, forms, documents, rules, meeting minutes and a host of other features and information.<br></td></tr></tbody></table></div>";
    document.getElementById("previewDiv").innerHTML=Body;
    document.getElementById("btnsubmit").style.display = 'inline';
}

function ValidateSelection()  
{  
    var checkboxes = document.getElementsByName("mail_notification[]");  
    var numberOfCheckedItems = 0;  
    var noncheck = 0;
    for(var i = 0; i < checkboxes.length; i++)  
    {  
        if(checkboxes[i].checked)  {
            numberOfCheckedItems++;  
           // alert(checkboxes[i].value);
           if(checkboxes[i].value!==""){
            noncheck=1;
            // document.getElementById("divMessage").style.visibility = 'visible';
            // document.getElementById("divBtnPreview").style.visibility = 'visible';
           }

        }
            // if(checkboxes[i].value==""){
            //   noncheck=1;
            // }
           
    }  
   // alert(numberOfCheckedItems);
   if(noncheck ==1){
    document.getElementById("divMessage").style.display =  'block';
    document.getElementById("divBtnPreview").style.display =  'block';
    document.getElementById("divBox").style.display =  'block';
    document.getElementById("btnsubmit").style.display = 'none';
    } else {
      document.getElementById("divMessage").style.display = 'none';
    document.getElementById("divBtnPreview").style.display = 'none'; 
    document.getElementById("divBox").style.display = 'none';
    document.getElementById("btnsubmit").style.display = 'inline';
    } 
   // return false;  
} 

 function CheckFileSize(target){
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','txt','csv','pdf','doc','docx','xls','xlsx','ppt','tif'];
        console.log(target.files[0].name);
        var filename= target.files[0].name;
        
          if ($.inArray(filename.split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
             	target.value = '';
            	return false;
        }
        
       
       if (target.files && target.files[0]) {
        console.log(target.files[0].size);
      /*Maximum allowed size in bytes
        2MB Example
        Change first operand(multiplier) for your needs*/
      const maxAllowedSize = 100 * 1024 * 1024;
      if (target.files[0].size > maxAllowedSize) {
      	// Here you can ask your users to load correct file
       	target.value = '';
       	alert("Max File size allowed is 100MB");
       	return false;
      }
  }
   }

</script>