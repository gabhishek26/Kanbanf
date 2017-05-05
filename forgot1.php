<?php


$uname=(isset($_POST['userName']) ? $_POST['userName'] : null);
$pwd=(isset($_POST['pass']) ? $_POST['pass'] : null);


$con=mysqli_connect("localhost","root","password");
	echo "connection established.<br>";
	mysqli_select_db($con,"sw401team2");
	//$update="insert into validation (email,date)values('".$_POST["myEmail"]."','".date('m/d/Y ')."')";
  $update="update verification set password='$pwd'
           where id=5 ";
mysqli_query($con,$update);
echo"The record is updated";
mysqli_close($con);


?>