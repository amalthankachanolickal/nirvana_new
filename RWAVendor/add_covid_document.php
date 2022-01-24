<div id="add_document" class="modal custom-modal fade" role="dialog">

    <div class="modal-dialog">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <div class="modal-content modal-lg">

        <div class="modal-header">

          <h4 class="modal-title">Add Covid Document</h4>

        </div>

        <div class="modal-body">

          <form class="m-b-30" action="<?php echo DOMAIN.AdminDirectory;?>controller/FunctionCall.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="ActionCall" value="AddCovidDocument">

            <input type="hidden" name="client_id" value="<?php echo $getAdminInfo[0]['id'];?>" />

            <div class="row">

            <div class="col-sm-6">

                <div class="form-group">

                  <label class="control-label">Document Caption <span class="text-danger">*</span></label>

                    <select class="form-control" id="sel1" name="document_tilte">

                      <option value="Self_Isolation_Form">Self Isolation Form</option>

                      <option value="Government_Directives">Government Directives</option>

                      <option value="Society_Notices">Society Notices</option>

                      <option value="Grocery_Home_Delivery_List">Grocery Home Delivery List</option>

                      <option value="Initiatives_By_The_NRWA">Initiatives By The NRWA</option>

                    </select>

                </div>

              </div>

              <div class="col-sm-6">

                <div class="form-group">

                  <label class="control-label">Document File <span class="text-danger">*</span></label>

                  <input class="form-control" name="document_file" id="document_file" required type="file">

                    <p><strong style="color:#FF0000;">Only allow .doc, .docx, .pdf, .xsl</strong></p>

                </div>

              </div>

              



            <div class="col-sm-12">

                <div class="form-group">

                  <label class="control-label">Send Mail Notification To <span class="text-danger">*</span></label><br>  

                  <div> 

                  <div class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="" checked onclick="return ValidateSelection();" >None </div>

                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Group" onclick="return ValidateSelection();">Google Group   </div>

                  <div  class="col-sm-2">   <input type="checkbox" name="mail_notification[]" value="OfficeBearers" onclick="return ValidateSelection();">Office Bearers   </div>

                  <div  class="col-sm-2">  <input type="checkbox" name="mail_notification[]" value="EC"  onclick="return ValidateSelection();">EC</div>

                  <div  class="col-sm-2">  <input type="checkbox" name="mail_notification[]" value="CRM" onclick="return ValidateSelection();">CRM</div>

                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="Marketing" onclick="return ValidateSelection();">Marketing</div>

                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="Accounts" onclick="return ValidateSelection();">Accounts</div>

                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="Office" onclick="return ValidateSelection();">Office.NRWA</div>

                  <div  class="col-sm-2"><input type="checkbox" name="mail_notification[]" value="animesh.bhardwaj@nimbusharbor.com" onclick="return ValidateSelection();">Animesh</div>

                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Active" onclick="return ValidateSelection();">Active</div>

                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Deactivated" onclick="return ValidateSelection();" >Inactive</div>

                  <div  class="col-sm-2"> <input type="checkbox" name="mail_notification[]" value="Suspended" onclick="return ValidateSelection();">Suspended</div>

                </div>

              </div>

              

            </div>

              <div class="row">

            <div class="col-sm-6">

            <div class="form-group">

      <label for="comment">File Name</label>

     <input class="form-control" name="document_name" id="document_name" required type="text" maxlength="200">

    </div>

    </div>

              <div class="col-sm-6">

            <div class="form-group">

      <label for="comment">Description</label>

      <textarea class="form-control"  id="comment" name="comment" maxlength="250"></textarea>

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



       <div class="col-md-6" id="divBox"  style="display:none">

                  <div class="form-group">

                    <label class="control-label" for="mailattach">Attachment to be added in Mail  -   </label>

                    <input type="radio" id="Yes" name="mailattach" value="Yes">

<label for="Yes">Yes</label>

<input type="radio" id="No" name="mailattach" value="No">

<label for="No">No</label><br>

                  </div>

     </div>      

      

            </div>

            <div class="m-t-20 text-center" id="divBtnPreview"  style="display:none">

              <button type="button" class="btn btn-primary" onclick="PreviewMail()">Preview</button>

            </div>

       <div class="col-md-12" id="previewDiv">

         

          

          </div> 

            <div class="m-t-20 text-center">

              <button type="submit" id="btnsubmit" class="btn btn-primary"  class="btn btn-primary" >Submit</button>

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
   console.log(document_name);
    var document_title= document.getElementById("sel1").value;

    var message =document.getElementById("message").value;

    Body = " <label>Mail Content Preview : </label><div align='center'>Subject Line : New Covid Document " + document_name + " is added on website.<table width='100%' border='1' cellspacing='0' cellpadding='0' style='background:#fff'><tbody><tr><td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p>Dear Residents, </p><p>The  '"+document_name+"' ,  have been added  online under Home Page / Covid Response "+ document_title + ". You may <a href='#' target='_blank'>Click here </a>to view the same.</p>";

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



</script>