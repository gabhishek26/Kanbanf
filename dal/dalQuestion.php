<?php

class questions{
	public $quiznum;
	public $questnum;
	public $username;
	public $quizSCol;
	
	public function __construct($x,$y,$z){
		$this->quiznum = $x;
		$this->questnum = $y;
		$this->username = $z;

		

	}
	public function getConnection(){			
		return new PDO("mysql:host=localhost;dbname=sw401team2", "root", "Password" );
	}
	
	function upUser(){
		var_dump($this->quiznum);
		try{
				$conn =  $this->getConnection();			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CALL upUser(:quiznum,:questnum,:username,:quizcol)";
			
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':quiznum', $this->quiznum, PDO::PARAM_STR);				
				$stmt->bindValue(':questnum', $this->questnum, PDO::PARAM_STR);				
				$stmt->bindValue(':username', $this->username, PDO::PARAM_STR);				
				$stmt->execute();
				
				
				$stmt->closeCursor();
				// Close connections
				$stmt = null;
				$conn = null;
			} catch (PDOException $e) {
				echo"<br/> $e";
			}
		
	}
	
	function retreveQuizzes(){
		$results = array();
		try{
				$conn =  $this->getConnection();			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CALL getQuiz(:quiznum,:questnum)";
			
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':quiznum', $this->quiznum, PDO::PARAM_STR);				
				$stmt->bindValue(':questnum', $this->questnum, PDO::PARAM_STR);				
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
	
	function retreveAnswers(){
		$results = array();
		try{
				$conn =  $this->getConnection();			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CALL getAnswers(:quiznum)";
			
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':quiznum', $this->quiznum, PDO::PARAM_STR);				
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