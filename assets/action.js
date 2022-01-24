var GET_FORM_API= "controller/getform.php"
var MAIN_SITE_URL="https://www.nirvanacountry.co.in/"
var questions;
var responses={};
var params = new window.URLSearchParams(window.location.search);
var str= params.get('url');
console.log(str);
var j=0;
$(document).ready(function(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
  	if (this.readyState == 4 && this.status == 200) {
   		questiontext = JSON.parse(this.responseText);
		questionsp= questiontext[0].Questions;
		questions=JSON.parse(questionsp);
		console.log(questions.length);
		console.log(this.responseText);
		console.log(questions);
		var utc = new Date();
		var expr=new Date(questions[0].expiry);
		//console.log(utc);
		if(utc>expr){
		document.write("No active form found with this link");
		
		      $("<h3>Looks like the link you visited is expired or may not be active</h3>").appendTo("body");

			}
		else{
			populate();
		}
		
	}	
	  
};
xmlhttp.open("GET", GET_FORM_API + "?formid=" + str, true);
xmlhttp.send();

function populate(){
	var heading=questiontext[0].survey_name.replace(/_/g," ");
	document.title = heading;
	$("#heading").html('<h1>'+heading+'</h1><br>');
	if(questions[0].Description != ''){
		$("#desc").html(questiontext[0].Description);
	}
	else{
		$("#desc").hide();
	}
	console.log(questionsp[0].Description);
	for(i=0;i<questions.length;i++){
	    var p= i+1;
	if(questions[i].type=="text"){
		$("#form").append('<div class="quest" id="'+ p +'">'+ p + '. '+ questions[i].q+'</div><br><textarea class="txtques" rows="6" cols="40"></textarea>');
	}
	else if(questions[i].type=="MCQ"){
		$("#form").append('<div class="quest" id="'+ p +'">'+ p + '. '+ questions[i].q+'</div><br><div id="mcq'+ i+'"></div>');
		var opt= questions[i].options;
		opt= opt.split(",");
		//console.log(opt);
		for(k=0;k<opt.length;k++)
			$("#mcq"+i).append('<input type="radio" name="'+ i+1 +'" value="'+ opt[k]+'"><label  class=""> &nbsp;'+ opt[k]+'</label><br>');
		}

	else{
		$("#form").append('<div class="quest" id="'+ p +'">' + p + '. ' + questions[i].q+'</div><div class="rating"><label><input type="checkbox" name="stars" value="1" /><span class="icon">★</span></label><label><input type="checkbox" name="stars" value="2" /> <span class="icon">★</span><span class="icon">★</span></label><label><input type="checkbox" name="stars" value="3" /><span class="icon">★</span><span class="icon">★</span> <span class="icon">★</span>   </label> <label> <input type="checkbox" name="stars" value="4" /><span class="icon">★</span><span class="icon">★</span><span class="icon">★</span><span class="icon">★</span></label> <label><input type="checkbox" name="stars" value="5" /><span class="icon">★</span><span class="icon">★</span><span class="icon">★</span><span class="icon">★</span><span class="icon">★</span></label></div><br>');
		}	
	}
//	$("#form").append('<div class="quest" style="line-height:0px">'+(i+1) +'. Suggestions</div><br><textarea rows="6" cols="40" id="suggest" style="width:60%"></textarea>');
//	$("#form").append('<div class="quest" style="line-height:0px">'+(i+2) +'. What are the additional features and benefits that you would like on your Nirvana website.</div><br><textarea rows="6" cols="40" id="features" name="features" style="width:60%"></textarea>');
	for(k=1;k<questions.length;k++)
		responses['q' + k]= 'N/A';

		$("input[type=checkbox]").click(function(){
			//console.log(this.value);
			j=$(this).parent().parent().prev().attr('id');
			responses['q'+ j]=this.value;j++;
		});
		$("input").on('click', function(e) {
       		$('html, body').animate({
           		scrollTop: $(this).offset().top -100
         	}, 500);
 		});
		$("textarea").on('change', function(e) {
       		$('html, body').animate({
           		scrollTop: $(this).offset().top -100
         	}, 500);
 		});
		$(".txtques").change(function(){
			j=$(this).prev().prev().attr('id');
			responses['q'+ j]=this.value;j++;
		});
		$("input[type=radio]").click(function(){
			j=$(this).parent().prev().prev().attr('id');
			responses['q'+ j]=this.value;j++;
		});
}
$(".done").click(function(){
	console.log(responses);
	responses["Suggestions"]= $("#suggest").val(); 
	responses["features"]= $("#features").val(); 
	responses["Name"]=$("#in").val();
	responses["House No"]=$("#hno").val();
	responses["Block No"]=$("#block").val();
	responses["Floor No"]=$("#floor").val();
	responses["formid"]=params.get('url');
	responses=JSON.stringify(responses);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
  		if (this.readyState == 4 && this.status == 200) {
		console.log(this.responseText);
  		}	
	};
	xmlhttp.open("POST", MAIN_SITE_URL+"assets/save.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("response=" + responses);
	$("#form").empty();
	$("#usrdetails").empty();
	$(this).hide();
	$("#form").append('<center><div class="alert alert-info col-md-4" style="margin: 5% 35%;"><h3>Thank you for your Response</h3></div></center>');
});
CheckLoggedin();
});
