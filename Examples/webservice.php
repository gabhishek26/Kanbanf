<?php
	switch ($_SERVER['REQUEST_METHOD']) {
		//Return a record from the database
		case 'GET':
			$results = array();
			$id = $_GET['id'];
			if(!empty($id)){
				if (!get_magic_quotes_gpc())
					$id = addslashes($id);
				
				try{
					// Connect to the server and select a database
					$conn =  new PDO("mysql:host=localhost;dbname=employees", 'sw516_agent', 'sw516_agent-1');
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					// Prepare the SQL statement and execute it
					$sql = "SELECT id, username, email, password, status FROM employees.users WHERE id = :id";
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(':id', $id, PDO::PARAM_INT);				
					$stmt->execute();
					
					// Save the execution results and return value in an array
					while ($row = $stmt->fetch()){
						array_push($results, $row);
					}
					$stmt->closeCursor();
					$json = array("status" => 1, $results);
					
					// Close connections
					$stmt = null;
					$conn = null;
					
				} catch (PDOException $e) {
					$json = array("status" => 0, "msg" => $e);
				}
			}
			break;
		
		// Save a new record in the database
		case 'POST':	
			// Insert data into data base
			$results = array();
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
			
			$username = $request->username;
			$email = $request->email;
			$password = $request->password;
			$status = $request->status;
			
			/*
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$status = $_POST['status'];
			*/
			
			
			if( !empty($username) && !empty($email) && !empty($password)){
				if (!get_magic_quotes_gpc()){
					$username  = addslashes($username);
					$email = addslashes($email);
					$password = addslashes($password);
					$status = (trim($status) == "1") ? 1 : 0;
				}
				
				try{
					// Connect to the server and select a database
					$conn =  new PDO("mysql:host=localhost;dbname=employees", 'sw516_agent', 'sw516_agent-1');
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					// Prepare the SQL statement and execute it
					$sql = "INSERT INTO employees.users ( username, email, password, status ) VALUES ( :username, :email, :password, :status )";
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(':username', $username, PDO::PARAM_STR);
					$stmt->bindValue(':email', $email, PDO::PARAM_STR);
					$stmt->bindValue(':password', $password, PDO::PARAM_STR);
					$stmt->bindValue(':status', $status, PDO::PARAM_INT);
					$stmt->execute();				
					$stmt->closeCursor();
					
					// Save the return value in an array
					$json = array("status" => 1, "msg" => "Done User added!");
					
					// Close connections
					$stmt = null;
					$conn = null;
					
				} catch (PDOException $e) {
					$json = array("status" => 0, "msg" => $e);
				}
			}
			break;
		case 'PUT':
		
			// Update call
			break;
		case 'DELETE':

			//Delete a record in the database
			break;
		default:			
			$result = array("status" => 0, "msg" => "Request method not accepted");
			header('HTTP/1.1 405 Method Not Allowed');
			break;
	}	// End switch

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);
 ?>