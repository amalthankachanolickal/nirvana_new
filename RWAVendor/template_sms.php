    <style>
        .no-border{
            border:none;
            margin-left:5px;
            margin-right:5px;
            text-align:center;
            margin-top:5px;
        }
        
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
            color: #555;
            cursor: default;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
        }
    </style>
    
    
    <script>
    $( document ).ready(function() {
       $('#template').on('change', function() {
          var templateIDDiv = "#" + this.value;
          $(".tempateDivs").hide();
          $(templateIDDiv).show();
          console.log(templateIDDiv);
        });
        $("#var_cnt").html("Reamining Characters: 30");
        $("#var_1").keyup(function(){
            var cnt = this.value.length;
            $("#var_cnt").html("Reamining Characters:" + (30-cnt));
        });
        
        
        $("#template > option").each(function() {
            if(this.value!=""){
                var cntEle = "#" + this.value + "_cnt";
                var cntClass = "." + this.value ;
                $(cntClass).keypress(function(){
                    var cnt = 0;
                    $(cntClass).each(function(index,element) {
                        cnt += element.value.length;
                    });
                    $(cntEle).html(700-cnt);
                });
            }
        });
    });
    </script>
    

    
    <div class="form-group d-none">
        <div class="col-lg-10 no-pdd" id="onlyaplfortenant">
            <label>Any Other Phone numbers: (use comma to separate more than one phone numbers)<span class="text-danger"></span></label>
            <input class="form-control" name="otherphone" id="otherphone" type="phone"  value="" />
         </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 no-pdd" id="onlyaplfortenant">
            <label>Select SMS Template <span class="text-danger"></span></label>
            <select name="template" id="template" class="form-control">
                <option selected disableb value="">Select Template</option>
                <option value="123554_0">CAM Bill Notification</option>
                <option value="123553_0">CAM Bill Notification with Credentials</option>
                <!--<option value="1207162079783744352_6">Ads Click SMS</option>-->
            </select>
         </div>
    </div>
   
    
    
    <div class="alert alert-success tempateDivs" id="123554_0" style="display:none;">
        HI, Your CAM Bill is now available pay online or to view. Click here (https://bit.ly/3dzZHXx) to access the same. Regards, NRWA Office.
    </div>
    
    <div class="alert alert-success tempateDivs" id="123553_0" style="display:none;">
        Hi, Your CAM Bill is now available pay online or to view. Click here https://bit.ly/3dzZHXx to access the same. 
        <br>
        User Name: <input class="no-border" readonly type="text"  value="USERNAME"> 
        Pwd: <input class="no-border" readonly type="text"  value="PASSWORD"><br> Regards, NRWA Office.
    </div>