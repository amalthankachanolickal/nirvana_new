 <div class="form-group">
    <div class="col-lg-10 no-pdd" id="onlyaplfortenant">
        <label>Any Other Email id : (use comma to separate more than one emails)<span class="text-danger"></span></label>
        <input class="form-control" name="othermails" id="othermails" type="email" multiple pattern="^([\w+-.%]+@[\w-.]+\.[A-Za-z]{2,4},*[\W]*)+$" value="" />
     </div>
    </div>
    <!--<div class="form-group">-->
    <!--<label class="control-label  col-sm-3" for="email">Mail Type: <span class="text-danger">*</span></label>-->
    <!--    <div class="col-sm-4">-->
    <!--        <select class="form-control" id="sel2" name="mail_notification1">-->
    <!--            <option value="formate1">User Info</option>-->
    <!--            <option value="formate2">Verify Email ID</option>-->
    <!--            <option value="formate3">Inform Admin Approved</option>-->
    <!--            <option value="formate4">Custom Email</option>-->
    <!--        </select>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="form-group">
        <div class="col-lg-10 no-pdd" id="onlyaplfortenant">
            <label>Subject <span class="text-danger"></span></label>
            <input class="form-control" name="subject" id="subject" />
         </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 no-pdd" id="onlyaplfortenant2">
         <label class="col-lg-12  control-label">Mail Content <span class="text-danger">*</span>
                  <a href="#" class="btn btn-primary rounded pull-right" id="recent_images_btn" style="margin-top:0px;" ><i class="fa fa-image"  ></i> Recent Image</a>
                  <a href="#" class="btn btn-primary rounded pull-right"  style="margin-top:0px;" id="upload_insert_image"><i class="fa fa-image"></i> Insert Image</a><br>
</label>
                <br><br><br><textarea class="col-lg-10 form-control" rows="5" id="content" name="content"></textarea>
        </div>
        
  </div>
   
    <div class="form-group" id="onlyaplfortenant3">
        <div class="col-lg-11 no-pdd" >
            <label>Add Attachment (if any)  <span class="text-danger"></span></label>
            <input class="form-control" name='files[]' type='file'  onchange="CheckFileSize(this);" multiple />
        </div>
        <div class="col-lg-1 no-pdd" >
            <button class="btn btn-success btn-sm" type="button" id="add" title='Add new file' style="margin-top:25px;"/>+</button>
        </div>
    </div>
    <div class="form-group" id="onlyaplfortenant4">
        <div class="col-lg-10 no-pdd" >
            <label>Select From Address  <span class="text-danger"></span></label>
          <select class="form-control" id="selfrom" name="selfrom" onchange="getfromValue();">
            <option value="<?php echo $getAdminInfo[0]['client_office_email'];?>">Office NRWA - <?php echo $getAdminInfo[0]['client_office_email'];?></option>
            <option value="<?php echo $getAdminInfo[0]['client_accountant_email'];?>">Accounts - <?php echo $getAdminInfo[0]['client_accountant_email'];?></option>
            <option value="<?php echo $getAdminInfo[0]['office_crm_email'];?>">CRM - <?php echo $getAdminInfo[0]['office_crm_email'];?></option>
            <option value="<?php echo $getAdminInfo[0]['client_marketing_mail'];?>">Marketing - <?php echo $getAdminInfo[0]['client_marketing_mail'];?></option>
            <option value="<?php echo $getAdminInfo[0]['office_ec_update_email'];?>">EC Updates - <?php echo $getAdminInfo[0]['office_ec_update_email'];?></option>
            <!--<option value="<?php echo $getAdminInfo[0]['office_website_email'];?>">Website Admin - <?php echo $getAdminInfo[0]['office_website_email'];?></option>-->
          </select>
         
        </div>
       </div> 
       
       <script>
           $("#recent_images_btn").click(function(){
                $.ajax({url: "getRecentMailImagesAjax.php", success: function(result){
                    $("#recent_images_modal").modal("show");
                    $("#recent_img_table").html(result);
                }});
            });
            
            //function copyURL(imgID){
               // var img_id = "#img_" + imgID;
              //  var url = $(img_id).attr("src");
              //
                //var dummy = document.createElement("input");
                //dummy.style.display = 'none';
                //document.body.appendChild(dummy);
            
            //    dummy.setAttribute("id", "dummy_id");
            //    document.getElementById("dummy_id").value=url;
            //    dummy.select();
            //    document.execCommand("copy");
             //   document.body.removeChild(dummy);
               // alert(url);
            //}
            
            function tryit(imgID,imgWidth,imgHeight){
                var img_id = "#img_" + imgID;
                 
                var url = $(img_id).attr("src");
                var img = document.createElement('img');
                img.height = imgWidth;
                img.width = imgHeight;
                img.src = url;
               
                var iframe = $('#content_ifr');
                var editorContent = $('#tinymce[id="tinymce"]', iframe.contents()).html();
                $('#tinymce[id="tinymce"]', iframe.contents()).append(img);
                console.log(editorContent);
               $("#recent_images_modal").modal("hide");
            }
       </script>
       
       <script>
           $("#upload_insert_image").click(function(){
                $.ajax({url: "insert_image.php", success: function(result){
                    $("#insert_image").modal("show");
                   // $("#recent_img_table").html(result);
                }});
            });
            function saveImageByAjax(){
          
          var form = document.getElementById("formID");
          let formData = new FormData(form);
          //formData.append('image_save', $('#formID').files[0]);
          
          console.log(formData);
          $.ajax({
              url:"controller/saveAjax.php",
              type:"POST",
              data:formData,
              enctype:'multipart/form-data',
              processData: false,
			  contentType: false,
			  success: function(response) {				
				 $("#insert_image").modal("hide");
				 var iframe = $('#content_ifr');
                 var editorContent = $('#tinymce[id="tinymce"]', iframe.contents()).html();
                 $('#tinymce[id="tinymce"]', iframe.contents()).append(response);
				
			},
			error: function(error) {
				
			}
          });
          
      }
</script>  
       
         
    