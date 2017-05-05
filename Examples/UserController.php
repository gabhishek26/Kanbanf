<?php
	class UserController {
		function Ins_Upd_Employees( $emp_no, $birth_date, $first_name, $last_name, $gender, $hire_date ){
			
			$results = array();
			try{
				// Connect to the server and select a database
				$conn =  new PDO("mysql:host=localhost;dbname=employees", 'sw516_agent', 'sw516_agent-1');
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Prepare the SQL statement and execute it
				$sql = "CALL ins_upd_employees(:emp_no, :birth_date, :first_name, :last_name, :gender, :hire_date, @return_value)";
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':emp_no', $emp_no, PDO::PARAM_INT);
				$stmt->bindValue(':birth_date', $birth_date, PDO::PARAM_STR);
				$stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
				$stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
				$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
				$stmt->bindValue(':hire_date', $hire_date, PDO::PARAM_STR);
				$stmt->execute();				
				$stmt->closeCursor();
				
				// Save the return value in an array
				array_push($results, array( "return_value" => $conn->query("select @return_value")->fetchAll(), "message" => ""));
				
				// Close connections
				$stmt = null;
				$conn = null;
				
			} catch (PDOException $e) {
				array_push($results, array( "return_value" => -1, "message" => "Error!: " . $e->getMessage()));
			}
			
			return $results;
		}	// End method Ins_Upd_Employees
		
		function Sel_Employees( $id ){
			$results = array();
			try{
				// Connect to the server and select a database
				$conn =  new PDO("mysql:host=localhost;dbname=employees", 'sw516_agent', 'sw516_agent-1');
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Prepare the SQL statement and execute it
				$sql = "CALL sel_employees(:id,@return_value)";
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_INT);				
				$stmt->execute();
				
				// Save the execution results and return value in an array
				while ($row = $stmt->fetch()){
					array_push($results, $row);
				}
				$stmt->closeCursor();
				array_push($results, array( "return_value" => $conn->query("select @return_value")->fetchAll(), "message" => ""));
				
				// Close connections
				$stmt = null;
				$conn = null;
				
			} catch (PDOException $e) {
				array_push($results, array( "return_value" => -1, "message" => "Error!: " . $e->getMessage()));
			}
			
			return $results;
		}	// End method Sel_Employees
	}	// End class UserController