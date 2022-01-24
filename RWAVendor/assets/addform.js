var qno=1;
var str='';
var details={};
var questions=[];
//var CREATEFORMAPI = "http://localhost/feedback/crt.php";
var MAIN_SITE_URL= "http://therwa.in/";
$(document).ready(function(){
    $("#submit").click(function(){
        var file=$("#heading").val().replace(/ /g,"_");
        console.log(file);
        if(file==''){
            alert("Heading Can't be empty!");
        }
        else{
            details["formid"]=file;
            details["heading"]=$("#heading").val();
            details["desc"]=CKEDITOR.instances.desc.getData();
            details["start"]=$("#start").val();
            details["expiry"]=$("#exp").val();
            collect();
            $.post( "controller/FunctionCall.php" , {"ActionCall":"CreateForm", details:details, questions:questions1}).done(function(data){
                $("#content").html('Thank You. The link to the form will be: <span style="color:blue"><a href="'+ MAIN_SITE_URL + 'surveys.php?url='+ file +'">Here</a></span><br><button onclick="window.location.reload()">Close</button>');
            });
        }
    });

    $("#add").click(function(){
        $("#questions").append('<div class="qwrap"><div><label class="control-label">Select Question Type:</label><select class="types btn btn-primary"><option value="Rating">Star Rating</option><option value="MCQ">Multiple Choice</option><option value="text">Text Answer</option></select><div class="del"><img src="assets/minus.png" ></div><input class="form-control qbox" type="text" id="'+ qno +'" placeholder="Type the Question here"/></div><div></div></div>');
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

    function collect(){
        for(i=1;i<qno;i++){
            var obj={};
            obj.q=document.getElementById(i).value;
            var type=$("#"+i).prev().prev().val();
            obj.type=type;

            if(type=="MCQ"){
                obj.options=$("#"+i).parent().next().find("input").val();
            }
            questions.push(obj);
        }
    questions1=JSON.stringify(questions);
    console.log(questions1);
    }
});
