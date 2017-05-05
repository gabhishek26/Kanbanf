<?php

session_start();
	require_once("../bl/blQuestion.php");
	
		$result = array("status" => -1, "msg" => "Invalid Request Method");
		
		switch ($_SERVER['REQUEST_METHOD']) {
			// return a record from the database
			case 'GET':
			if (isset($_GET['requested']) && isset($_GET['value'])){
				var_dump($_SESSION[$_GET['requested']]);
				$_SESSION[$_GET['requested']] = $_GET['value'];
				var_dump($_SESSION[$_GET['requested']]);
			}

			if (isset($_GET['quiz']) && isset($_GET['num'])){
				$quiz = new Quiz($_GET['quiz'],$_GET['num']);
				//var_dump($_GET['quiz'],$_GET['num']);
				$result = $quiz->get_quiz();
				//var_dump($result);
				$_SESSION['question'] = $result[0][0]["question"];
				$_SESSION['answer1'] = $result[0][0]["answer1"];
				$_SESSION['answer2'] = $result[0][0]["answer2"];
				$_SESSION['answer3'] = $result[0][0]["answer3"];
				$_SESSION['answer4'] = $result[0][0]["answer4"];
				
				if ($_GET['num'] <2){
				$result = $quiz->get_answer();
				var_dump($result);
				$_SESSION['answers']= $result[0][0]["Answer"];
				}
			
				//var_dump($_SESSION['answers']);
				//var_dump($_SESSION['question']);
				//var_dump($_SESSION['answer1']);
				//var_dump($_SESSION['answer2']);
				//var_dump($_SESSION['answer3']);
				//var_dump($_SESSION['answer4']);
			}
			if (isset($_GET['requested'])) {
				// return requested value
				print $_SESSION[$_GET['requested']];
			} else {
				// nothing requested, so return all values
				print json_encode($_SESSION);
			}
			
			if (isset($_GET['nextQuiz']) && isset($_GET['result'])){
				$quiz = new Quiz($_GET['nextQuiz'],$_GET['result'],$_SESSION['id']);
				var_dump($_GET['nextQuiz']);
				$result = $quiz->updateUser();
			}
			
				break;
		}



?>