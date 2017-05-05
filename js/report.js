 $(document).ready(function(){	
 
 
 var name;
 var jLoop;
 var score;
 
			$.ajaxSetup({cache: false,async: false})
			request = $.get('../services/wsReport.php', {requested: 'username'}, function (data) {
				name = data;
			document.getElementById("wel").innerHTML = " Welcome " + name;

			});
			for (jLoop =1; jLoop<=5; jLoop++){
			$.ajaxSetup({cache: false, async: false})
			request1 = $.get('../services/wsReport.php', {requested: 'Quiz'+jLoop+'Score'}, function (data) {	
				score = data;
				score = score*10;
				document.getElementById('q'+jLoop).innerHTML = "Quiz #"+jLoop+": "+ score+"/100";
				console.log('q'+jLoop);
			console.log('score' + score);

			});
			}
			
			$("#bTD").click(function(){
				window.location.replace("Dashboard.html");
			});
			
 
/* var questions =  question+" <br/><input type='radio' name='Answer"+jLoop+"' value='1'> "+answer1+" <br><input type='radio' name='Answer"+jLoop+"' value='2'>  "+answer2+" <br><input type='radio' name='Answer"+jLoop+"' value='3'>  "+answer3+" <br> <input type='radio' name='Answer"+jLoop+"' value='4' checked> "+answer4+" <br>";
							document.getElementById('q'+jLoop).innerHTML = questions;
				console.log(jLoop);
			if (jLoop == 10 ){
				document.getElementById('quizHead').innerHTML = "Quiz #" + quiznumeber;
				document.getElementById('quest').style.display = 'block';
			} */
			
 });