<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('abhishek',$conn);
$id = $_GET['id'];
$q = "DELETE FROM verification where id='$id' ";
echo $id;
if(mysql_query($q,$conn))
{
 
echo "Record Deleted";
	
	
}

else {

echo "Not deleted";
}

header( "refresh:0;url=user_reports.php" );
?>