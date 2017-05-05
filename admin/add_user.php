<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('abhishek',$conn);

$username = $_POST['username'];
$password = $_POST['password'];
$accesslevel = $_POST['accesslevel'];
//echo $username.$password;

//$q = "INSERT INTO verification VALUES('$username','$password','$accesslevel','0','0','0','0','0','0','0','0','0','0') ";
$q = "INSERT INTO `verification`( `username`, `password`, `accessLevel`, `currentLevel`, `highestLevel`, `quiz1Taken`, `QuizLevel`, `Quiz1Score`, `Quiz2Score`, `Quiz3Score`, `Quiz4Score`, `Quiz5Score`) VALUES ('$username','$password','$accesslevel',0,0,0,0,0,0,0,0,0)";

if(mysql_query($q,$conn))
{
 
echo "Record added";
	
	
}

else {

echo "Not Added";
}

header( "refresh:0;url=user_reports.php" );
?>