<?php
session_start();
	require_once("../bl/blLogin.php");

		
	$result = array("status" => -1, "msg" => "Invalid Request Method");
	$loginData = new Login($_POST);
	if($loginData -> is_valid()){
		switch ($_SERVER['REQUEST_METHOD']) {
			// return a record from the database
			case 'GET':
			if (isset($_GET['accessLevel'])) {
				// return requested value
				print $_SESSION[$_GET['accessLevel']];
			}
				break;
			//save a new record
			case 'POST':
				$result["status"]=1;
				if($loginData->is_authenticated()){
					$result= $loginData->is_authenticated();
								var_dump($result);
					$_SESSION['id'] = $result[0][0]["id"];
					$_SESSION['username'] = $result[0][0]["username"];
					$_SESSION['accessLevel'] = $result[0][0]["accessLevel"];
					$_SESSION['currentLevel'] = $result[0][0]["currentLevel"];
					$_SESSION['highestLevel'] = $result[0][0]["highestLevel"];
					$_SESSION['quiz1Taken'] = $result[0][0]["quiz1Taken"];
					$_SESSION['QuizLevel'] = $result[0][0]["QuizLevel"];
					$_SESSION['Quiz1Score'] = $result[0][0]["Quiz1Score"];
					$_SESSION['Quiz2Score'] = $result[0][0]["Quiz2Score"];
					$_SESSION['Quiz3Score'] = $result[0][0]["Quiz3Score"];
					$_SESSION['Quiz4Score'] = $result[0][0]["Quiz4Score"];
					$_SESSION['Quiz5Score'] = $result[0][0]["Quiz5Score"];
				
				var_dump($_SESSION['Quiz1Score']);
				var_dump($_SESSION['Quiz2Score']);
				var_dump($_SESSION['Quiz3Score']);
				var_dump($_SESSION['Quiz4Score']);
				var_dump($_SESSION['Quiz5Score']);
				
					
					if($_SESSION['id'] == null){
						return false;
					}else{
					return true;
					}
				}else{				
					$result["msg"] = "User's credentials could not be authenticated";
					
				}
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
	}// if 
	
	/* Output header */
	//header('Content-type: application/json');
	
	
	
	

?>

