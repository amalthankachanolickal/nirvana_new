var eqno=1;
var str='';
var edetails={};
var equestions=[];
//var CREATEFORMAPI = "http://localhost/feedback/crt.php";
var SITE_URL= "http://pts.palmterracesselect.com";
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
            $.post( "controller/FunctionCall.php" , {"ActionCall":"EditForm", edetails:edetails, questions:equestions1}).done(function(data){
                $("#econtent").html('Thank You. The link to the form will be: <span style="color:blue"><a href="'+ SITE_URL + '?url='+ file +'">Here</a></span><br><button onclick="window.location.reload()">new</button>');
            });
        }
    });

    $("#edit").click(function(){
        $("#edited_questions").append('<div class="qwrap"><div><label class="control-label">Select Question Type:</label><select class="types btn btn-primary"><option value="Rating">Star Rating</option><option value="MCQ">Multiple Choice</option><option value="text">Text Answer</option></select><div class="del"><img src="assets/minus.png" ></div><input class="form-control qbox" type="text" id="e'+ eqno +'" placeholder="Type the Question here"/></div><div></div></div>');
        qno++;
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
        for(i=1;i<qno;i++){
            var obj={};
            obj.q=document.getElementById("e"+i).value;
            var type=$("#e"+i).prev().prev().val();
            obj.type=type;

            if(type=="MCQ"){
                obj.options=$("#e"+i).parent().next().find("input").val();
            }
            equestions.push(obj);
        }
    equestions1=JSON.stringify(equestions);
    console.log(equestions1);
    }
});
