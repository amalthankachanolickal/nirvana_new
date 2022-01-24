var eqno=1;
var str='';
var editID;
var edetails={};
var equestions=[];
var SITE_URL= "http://therwa.in/RWAVendor/";
var MAIN_SITE_URL="http://therwa.in/";
function showEditQues(param,id){
editID=id;
$.get( MAIN_SITE_URL + "controller/getform.php?formid="+param).done(function(data){
console.log(JSON.parse(data));
var dataJSON= JSON.parse(data);
var prevQues= JSON.parse(dataJSON[0].Questions);
console.log(prevQues);
var prevHeading=dataJSON[0].survey_name.replace(/_/g, " ")
$("#eheading").val(prevHeading);
$("#estart").val(dataJSON[0].start_date);
$("#eexp").val(dataJSON[0].exp_date);
$("#edesc").val(dataJSON[0].Description);
for(a=0;a<prevQues.length;a++){
if(prevQues[a].type=="text"){
$("#edited_questions").append('<div class="qwrap"><div><label class="control-label">Select Question Type:</label><select class="types btn btn-primary"><option value="Rating">Star Rating</option><option value="MCQ">Multiple Choice</option><option value="text" selected>Text Answer</option></select><div class="del"><img src="assets/minus.png" ></div><input class="form-control qbox" type="text" id="e'+ eqno +'" placeholder="Type the Question here" value="'+ prevQues[a].q +'"/></div><div></div></div>');
eqno++;
}
if(prevQues[a].type=="Rating"){
$("#edited_questions").append('<div class="qwrap"><div><label class="control-label">Select Question Type:</label><select class="types btn btn-primary"><option value="Rating" selected>Star Rating</option><option value="MCQ">Multiple Choice</option><option value="text">Text Answer</option></select><div class="del"><img src="assets/minus.png" ></div><input class="form-control qbox" type="text" id="e'+ eqno +'" placeholder="Type the Question here" value="'+ prevQues[a].q +'"/></div><div></div></div>');
eqno++;
}
if(prevQues[a].type=="MCQ")
$("#edited_questions").append('<div class="qwrap"><div><label class="control-label">Select Question Type:</label><select class="types btn btn-primary"><option value="Rating">Star Rating</option><option value="MCQ" selected>Multiple Choice</option><option value="text">Text Answer</option></select><div class="del"><img src="assets/minus.png" ></div><input class="form-control qbox" type="text" id="e'+ eqno +'" placeholder="Type the Question here" value="'+ prevQues[a].q +'"/></div><div><p>Please Enter All options seperated by comma</p><input class="form-control qbox" type="text" value="'+prevQues[a].options + '"></div></div>');
eqno++;

}
$(".types").change(function(){
            var val= $(this).val();
            if(val=="MCQ"){
            $(this).parent().next().html('<p>Please Enter All options seperated by comma</p><input class="form-control qbox" type="text">');
            }
            if(val=="Rating"){
            $(this).parent().next().html('<p>Your question will be displayed as a five star rating</p>');
            }
            if(val=="text"){
            $(this).parent().next().html('<p>This question will accept text Responses</p>');
            }
        });
        $(".del").click(function(){
            $(this).parent().parent().remove();
            qno--;
        });
});
}

$(document).ready(function(){

    $("#esubmit").click(function(){
        var file=$("#eheading").val().replace(/ /g,"_");
        console.log(file);
        if(file==''){
            alert("Heading Can't be empty!");
        }
        else{
            edetails["formid"]=file;
            edetails["heading"]=$("#eheading").val();
            edetails["desc"]=$("#edesc").val();
            edetails["start"]=$("#estart").val();
            edetails["expiry"]=$("#eexp").val();
            ecollect();
            $.post( "controller/FunctionCall.php" , {"ActionCall":"EditForm", eid:editID, edetails:edetails, equestions:equestions1}).done(function(data){
                $("#econtent").html('Thank You. The link to the form will be: <span style="color:blue"><a href="'+ MAIN_SITE_URL + 'surveys.php?url='+ file +'">Here</a></span><br><button onclick="window.location.reload()">Close</button>');
            });
        }
    });

    $("#editaddq").click(function(){
        $("#edited_questions").append('<div class="qwrap"><div><label class="control-label">Select Question Type:</label><select class="types btn btn-primary"><option value="Rating">Star Rating</option><option value="MCQ">Multiple Choice</option><option value="text">Text Answer</option></select><div class="del"><img src="assets/minus.png" ></div><input class="form-control qbox" type="text" id="e'+ eqno +'" placeholder="Type the Question here"/></div><div></div></div>');
        eqno++;
        $(".types").change(function(){
            var val= $(this).val();
            if(val=="MCQ"){
            $(this).parent().next().html('<p>Please Enter All options seperated by comma</p><input class="form-control qbox" type="text">');
            }
            if(val=="Rating"){
            $(this).parent().next().html('<p>Your question will be displayed as a five star rating</p>');
            }
            if(val=="text"){
            $(this).parent().next().html('<p>This question will accept text Responses</p>');
            }
        });
        $(".del").click(function(){
            $(this).parent().parent().remove();
            qno--;
        });

    });

    function ecollect(){
        equestions=[];
        for(i=1;i<eqno;i++){
            if($("#e"+i).val()){
            var obj={};
            obj.q=$("#e"+i).val();
            var type=$("#e"+i).prev().prev().val();
            obj.type=type;

            if(type=="MCQ"){
                obj.options=$("#e"+i).parent().next().find("input").val();
            }
            equestions.push(obj);
        }}
    equestions1=JSON.stringify(equestions);
    console.log(equestions1);
    }
});
