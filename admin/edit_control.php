<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('abhishek',$conn);

$id= $_POST['id'];
$username= $_POST['username'];
$password = $_POST['password'];
$accesslevel= $_POST['accesslevel'];

echo $id.$username.$password.$accesslevel;


$sql1 = " UPDATE verification SET username='$username', password='$password', accessLevel='$accesslevel'  WHERE id='$id' ";

mysql_query($sql1);
echo "Report Update Succesfully";
header( "refresh:0;url=user_reports.php" );

?>