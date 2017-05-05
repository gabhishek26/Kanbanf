<?php

	require_once("../dal/dalQuestion.php");

class Quiz{
	public $quiznum;
	public $questnum;
	public $username;
	
	public function __construct($x,$y,$z){
		$this->quiznum = $x;
		$this->questnum = $y;
		$this->username =$z;


	}
	
	
	public function get_quiz(){
		var_dump($this->quiznum);
		$questions = new Questions($this->quiznum, $this->questnum);
		$question= $questions -> retreveQuizzes();
			return $question;
	}
	
	public function updateUser(){
		$questions = new Questions($this->quiznum, $this->questnum,$this->username);
		$question= $questions -> upUser();
	}
	public function get_answer(){
		$questions = new Questions($this->quiznum);
		$question= $questions -> retreveAnswers();
			return $question;
	}
	
	
	
	
	
	
	
	
	
	
	
	
}










?>