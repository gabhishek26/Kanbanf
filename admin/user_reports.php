<!DOCTYPE html>
	<?php
require_once("../dal/dalUser.php");
error_reporting(E_ALL ^ E_DEPRECATED);

	session_start();
	?>
<html> 
<head> 

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
				
			<!-- Bootstrap -->
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

			<link rel = "stylesheet" type = "text/css" href ="../css/Login.css" />
			


</head>

<body class="container" >
		<div id="result-display" class ="center">
			 
				<div class = "div">
                                                                     <!--		 Display the available  table data here-->
		  <div class="col-xs-12" style="height:0px;"></div>
		  <div class="col-xs-12">  
		  	
		  	<table class="table table-bordered">
<tr><td><a href="index.html"><button type="button" class="btn btn-primary">Back</button></a></td></tr>  
<tr class="info">

	  <td> Id</td>
	<td> User Name</td>			
	<td>Password</td>			
	<td> Access Level</td>
				<td> Edit User</td>
	            <td>Delete </td>
						
				</tr>
				
		<?php
	
	
$con = mysql_connect('localhost','root','');
mysql_select_db('abhishek',$con);

$result = mysql_query('select id, username, password, CASE WHEN accessLevel = 1 THEN \'Admin\' WHEN accessLevel = 2 THEN \'Faculty\' WHEN accessLevel = 3 THEN \'Student\' END AccessLevl from verification',$con);

while($row= mysql_fetch_array($result))
{
$id=$row['id'];	
	echo "<tr><td>".$row['id']."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['password']."</td>";
	echo "<td>".$row['AccessLevl']."</td>";
	
echo "<td>
  
<a href='edit_user.php?id=$id' class='btn btn-info' role='button'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Edit</a></td>";
	echo "<td>
  
<a href='deletecontrol.php?id=$id' class='btn btn-danger' role='button'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span> Delete</a></td>";
	echo "</tr>";
}


?>

				
</table>
			  
		  </div>
		  
	  
				</div>
		
			
		</div>
	</body>






</html>