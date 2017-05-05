 $(document).ready(function(){	
		$('#selectQuiz').show;
	document.getElementById('quest').style.display = 'none';
	//document.getElementById('selectQuiz').style.display = 'none';
		

 			//alert("i hit the js file ");
			var question;	
			var answer1;
			var answer2;
			var answer3;
			var answer4;
			var quiztitle;
			var nextquiz;
			var jLoop;
			var resLoop;
			var xrequest;
			var cliAnswer="";
			var srvrAnswer;
			var score=0;
			var cli;
			var srvr;
	
	$("#quiz1").click(function(){
		popQuiz(1);	
			quiztitle=1;
			nextquiz = quiztitle+1;
	});
	
	$("#quiz2").click(function(){
		popQuiz(2);	
			quiztitle=2;
			nextquiz = quiztitle+1;
	});
	
	$("#quiz3").click(function(){
		
		popQuiz(3);	
			quiztitle=3;
			nextquiz = quiztitle+1;
			
	});
		
	$("#formQuiz").submit(function(event){
		event.preventDefault();
			alert("Quiz #" + quiztitle + " will be sumbitted");
			$.ajaxSetup({cache: false, async: false});
			request1 = $.get('../services/wsQuiz.php', {requested: 'answers'}, function (data) {	
			srvrAnswer=data;
			});
			
			
			for(resLoop=1;resLoop<=10;resLoop++){
				
			cliAnswer+=document.querySelector('input[ name=Answer'+resLoop+']:checked').value;
			}
			
			 for(var x = 0; x <10;x++){
				cli = cliAnswer.substring(x, x+1);
				srvr = srvrAnswer.substring(x, x+1)
			
				if (cli==srvr){
					score +=1;
				}				
			}
			
		$.ajaxSetup({cache: false, async: false})
			request1 = $.get('../services/wsQuiz.php', {nextQuiz: quiztitle,result: score }, function (data) {
			}); 
		
			alert("You scored a " +score +"0 out of 100");

		$.ajaxSetup({cache: false, async: false})
			request1 = $.get('../services/wsQuiz.php', {requested: "quiz1Taken", value: "1" }, function (data) {
			}); 
		$.ajaxSetup({cache: false, async: false})
			request1 = $.get('../services/wsQuiz.php', {requested: "Quiz"+quiztitle+"Score", value: score }, function (data) {
			}); 
			
			window.location.replace("Dashboard.html");
	
	// create string for answer 
	// get answer string from database
	//compaire calculate grade
		
		
		
	});
	
	
		function popQuiz(quizcount){
		
			for (jLoop=1; jLoop<=10; jLoop++){
		console.log(jLoop);
			$.ajaxSetup({cache: false, async: false})
			request1 = $.get('../services/wsQuiz.php', {quiz: '1' ,num: jLoop}, function (data) {	
			
				$.ajaxSetup({cache: false, async: false})
				request2 = $.get('../services/wsQuiz.php', {requested: 'question'}, function (data) {
				question = data;
				
					$.ajaxSetup({cache: false, async: false})
					request3 = $.get('../services/wsQuiz.php', {requested: 'answer1'}, function (data) {
					answer1 = data;
				
						$.ajaxSetup({cache: false, async: false})
						request4 = $.get('../services/wsQuiz.php', {requested: 'answer2'}, function (data) {
						answer2 = data;
						
							$.ajaxSetup({cache: false, async: false})
							request5 = $.get('../services/wsQuiz.php', {requested: 'answer3'}, function (data) {
							answer3 = data;
							
								$.ajaxSetup({cache: false, async: false})
								request6 = $.get('../services/wsQuiz.php', {requested: 'answer4'}, function (data) {
								answer4 = data;
								printQuestions(quizcount);
				
								}); 
							});
						});
					});	
				});
			});
			
			
			
			}
		}	
			
			
			function printQuestions(quiznumeber){
				console.log(jLoop);
			document.getElementById('selectQuiz').style.display = 'none';

				//$('#selectQuiz').hide();
				var questions =  question+" <br/><input type='radio' name='Answer"+jLoop+"' value='1'> "+answer1+" <br><input type='radio' name='Answer"+jLoop+"' value='2'>  "+answer2+" <br><input type='radio' name='Answer"+jLoop+"' value='3'>  "+answer3+" <br> <input type='radio' name='Answer"+jLoop+"' value='4' checked> "+answer4+" <br>";
							document.getElementById('q'+jLoop).innerHTML = questions;
				console.log(jLoop);
			if (jLoop == 10 ){
				document.getElementById('quizHead').innerHTML = "Quiz #" + quiznumeber;
				document.getElementById('quest').style.display = 'block';
			}
				
			}
			
			
		
 });
 