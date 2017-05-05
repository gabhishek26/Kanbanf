<?php
	require_once("bl/blLogin-copy.php");
	
	$login= new Login();
	
	$login->username="student";
	$login->password="Password";
	var_dump($login->is_authenticated());
	



?>