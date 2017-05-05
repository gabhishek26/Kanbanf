<?php

	class User{
		public  $id;
		public $first_name;
		public $last_name;
		public $username;
		public $password;	
		

		public function __construct($post)
		{
			
			$this->username = $post['userName'];
			$this->password = $post['pass'];	
		}
		public function getConnection(){			
			return new PDO("mysql:host=127.0.0.1;dbname=abhishek", "root", "" );
		}
		
		public function ins_upd_user(){
			
			$results = array();
			try{
				// Connect to the server and select a database
				$conn = $this->getConnection();
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Prepare the SQL statement and execute it
				$sql = "CALL ins_upd_usr(:id, :first_name, :last_name, :username, :password, @return_value)";
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
				$stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
				$stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
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
			
		
		function sel_userByUsername(){
			$results = array();
			try{
				// Connect to the server and select a database	
				$conn = $this->getConnection();			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Prepare the SQL statement and execute it
				$sql = "CALL sel_userByUsername(:username, @return_value)";
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':username', $this->username, PDO::PARAM_STR);				
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
		
		function getUserAccessLvl(){
			$results = array();
			try{
				//echo ":username: $this->username ";
				//echo ":password: $this->password ";
				$conn =  $this->getConnection();			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CALL GetUser(:username, :password, @return_value)";
			
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':username', $this->username, PDO::PARAM_STR);				
				$stmt->bindValue(':password', $this->password, PDO::PARAM_STR);			
				$stmt->execute();
				
				while ($row = $stmt->fetchAll ()){
					array_push($results, $row);
				}
				$stmt->closeCursor();
				//var_dump($results);
				array_push($results, array( "return_value" => $conn->query("select @return_value")->fetchAll(), "message" => ""));
				
				// Close connections
				$stmt = null;
				$conn = null;
				return($results);
			} catch (PDOException $e) {
				echo"<br/> $e";
				array_push($results, array( "return_value" => -1, "message" => "Error!: " . $e->getMessage()));
			}
		}
		
		
		
		
		
	}
?>