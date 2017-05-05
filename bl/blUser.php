<?php
	require_once("../dal/dalUser.php");
	
	class things{
		public $username;
		public $password;
		
			public function __construct($post)
		{
			$this->username = $)['userName'];
			$this->password = $post['pass'];
			
		
		}
		
		
		
		public function is_valid(){
			//server side validation needed here
			return true;
		}
		
		public function is_authenticated(){
			$user = new User($_POST);	
			$userData = $user -> getUserAccessLvl();
			try{
				//var_dump($userData[0][0]);
				if($userData[0][0] == null){
				return true;
			}else{
				return $userData;
			}
			} catch (PDOException $e){
				return false;
			} 
			
			
		}
	}



?>