 $(document).ready(function(){	
 
	var request;
 	var accessLevel;
	var request2;

	$("#formLog").submit(function(event){

	var x=document.forms["formLog"]["userName"].value;
	var y=document.forms["formLog"]["pass"].value;
		
		event.preventDefault();

		//Basic username and password validation
		//test
		/*if(x==null || x=="" || y==null || y=="" || document.getElementById("humanCheck").checked == false){
			alert("The combination of username and password is invalid");
			return false;
		}else{*/
			//alert("I hit the JS file");

			if(request){
				request.abort();
			}
			
			var $myForm = $(this);
			var serializedData = $myForm.serialize();
			
		var $inputs = $myForm.find("input, select, button, textarea");

			$inputs.prop("disabled",true);
			request = $.ajax({
				type:'POST',
				url: "services/wsLogin.php", 
				data: serializedData
			});
			
			
			//success 
			request.done(function (response, textStatus, jqXHR){
			// Log a message to the console
				console.log("Hooray, it WORKS!");
				accessLevel = serializedData;
				console.log(response);
				if(response.indexOf("null") !=-1){
					alert("Please check your Credentials");

					
				}else{
					console.log(response);
					window.location.replace("view/Dashboard.html");
					
				}

				
				//console.log("-----obj --------- " obj);
				//window.location.replace("http://stackoverflow.com");

			});
			// failure
			request.fail(function (jqXHR, textStatus, errorThrown){
			// Log the error to the console
			console.error( "The following error occurred: " + textStatus, errorThrown );
			});
			//allways
			request.always(function () {
			// Reenable the inputs
				$inputs.prop("disabled", false);
			});
		//}//close else
		
	});//close submit
 }); // close document
 
