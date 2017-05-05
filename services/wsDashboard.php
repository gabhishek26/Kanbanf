<?php
session_start();
	
	 switch ($_SERVER['REQUEST_METHOD']) {
			// return a record from the database
			case 'GET':
			if (isset($_GET['answer'])) {
				
				
			}

			if (isset($_GET['requested'])) {
				// return requested value
				print $_SESSION[$_GET['requested']];
			} else {
				// nothing requested, so return all values
				print json_encode($_SESSION);
			}
			
			return $_SESSION['id'];
				var_dump($_SESSION['id']);
				var_dump($_SESSION['username']);
				var_dump($_SESSION['password']);
				var_dump($_SESSION['accessLevel']);
				var_dump($_SESSION['currentLevel']);
				var_dump($_SESSION['highestLevel']);
				var_dump($_SESSION['quiz1Taken']); 
				var_dump($_SESSION['QuizLevel']);
				break;
			//save a new record
			case 'POST':
				break;
			// updtae cell
			case 'PUT': 
			
				break;
			// delete a record
			case 'DELETE':
			
				break;
			default: 
				$result["msg"] = "Request method not accepted" ;
				break;
		}//switch
		
		

?>