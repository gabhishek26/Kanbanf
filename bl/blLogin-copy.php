<?php
	require_once("dal/dalUser.php");
	
	class Login{
		public $username;
		public $password;
		
		public function __construct(){
			$this->username = "";
			$this->password = "";	
		}
		
		
		public function is_valid(){
			//server side validation needed here
			return true;
		}
		
		public function is_authenticated(){
			$user = new User();
			$user->username=$this->username;
			$user->password=$this->password;
			$userData = $user -> getUserAccessLvl();
			if ($userData == null){
				return false;
			}else{
			return $userData;	
			}
		}
	}



?>