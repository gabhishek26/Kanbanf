 $(document).ready(function(){	
 
	var request;
	var username;
	var id;;
	var pass;
	var accessLevel;
	var currentLevel;
	var highestLevel;
	var quiz1Taken;
	var QuizLevel;
 
		window.onload = function() {
				//alert("Load");
				
			if(request){
					request.abort();
				};
					
				
			$.ajaxSetup({cache: false, async: false})
			request = $.get('../services/wsDashboard.php', {requested: 'username'}, function (data) {
				username = data;
				
				$.ajaxSetup({cache: false, async: false})
				request = $.get('../services/wsDashboard.php', {requested: 'id'}, function (data) {
					id = data;
					
					$.ajaxSetup({cache: false, async: false})
					request = $.get('../services/wsDashboard.php', {requested: 'accessLevel'}, function (data) {
						accessLevel = data;
						
						$.ajaxSetup({cache: false, async: false})
						request = $.get('../services/wsDashboard.php', {requested: 'currentLevel'}, function (data) {
							currentLevel = data;
							
								$.ajaxSetup({cache: false, async: false})
								request = $.get('../services/wsDashboard.php', {requested: 'highestLevel'}, function (data) {
									highestLevel = data;
									
								$.ajaxSetup({cache: false, async: false})
								request = $.get('../services/wsDashboard.php', {requested: 'quiz1Taken'}, function (data) {
									quiz1Taken = data;
									
									$.ajaxSetup({cache: false, async: false})
									request2 = $.get('../services/wsDashboard.php', {requested: 'QuizLevel'}, function (data) {
										QuizLevel = data;
										
									});
								});
							});	
						});
					});
				});
			});
			
			
			
			
			
			
			
			
	 
			request2.done(function (response, textStatus, jqXHR){
				// Log a message to the console
					console.log("Hooray, it WORKS!");
					document.getElementById("wel").innerHTML = " Welcome " + username;
					document.getElementById("wel2").innerHTML = " Welcome " + username;
					console.log(accessLevel);
					switch(accessLevel){
						case ('1'):
						
						break;
						case('2'):
						$("#formstudentDash").hide();
						$("#formteacherDash").show();

						break;
						case('3'):
						$("#formstudentDash").show();
						$("#formteacherDash").hide();


						break;
						default:
						alert("please go back and log in");
						break;
					}
					if (quiz1Taken == 0){
						$("#plGame").hide();
					} 
					console.log(username);
					console.log(id);
					console.log(accessLevel);
					console.log(currentLevel);
					console.log(highestLevel);
					console.log(quiz1Taken);
					console.log(QuizLevel);
					
			});
			
			
			
			
			
			
			request.fail(function (jqXHR, textStatus, errorThrown){
				// Log the error to the console
				//	console.error( "The following error occurred: " + textStatus, errorThrown );
			});
			
			$("#logout").click(function(){
				if (confirm('Are you sure you want to Logout?')) {
				window.location.replace("../index.html");
				}
				alert("this");
			});
			$("#takSQuiz").click(function(){
				window.location.replace("../view/Quiz.html");
			});
			
			$("#takTQuiz").click(function(){
				window.location.replace("../view/Quiz.html");
			});
			$("#seeReport").click(function(){
				window.location.replace("../view/Reports.html");
			});
			$("#seeClass").click(function(){
				window.location.replace("../view/class.html");
			});	
			$("#plGame").click(function(){
				window.location.replace("../view/game.html");
			});
			
			
			
				
			
		 };
		
		 

 });
 