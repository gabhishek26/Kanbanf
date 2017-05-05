<?php
session_start();	
		$result = array("status" => -1, "msg" => "Invalid Request Method");
		
		switch ($_SERVER['REQUEST_METHOD']) {
			// return a record from the database
			case 'GET':
				if (isset($_GET['requested'])) {
					// return requested value
					print $_SESSION[$_GET['requested']];
				} else {
					// nothing requested, so return all values
					print json_encode($_SESSION);
				}			
			
			break;
			
			
		}




?>

