<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('abhishek',$conn);
$id = $_GET['id'];
$result = mysql_query('select id, username, password, CASE WHEN accessLevel = 1 THEN \'Admin\' WHEN accessLevel = 2 THEN \'Faculty\' WHEN accessLevel = 3 THEN \'Student\' END AccessLevl from verification WHERE id='.$id.' ',$conn);
while($row=mysql_fetch_array($result))
{

$username= $row['username'];
$password = $row['password'];
$accessLevel= $row['AccessLevl'];
//echo $username.$password.$accessLevel;	
}
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
			 
				<div class = "divCenter">
				<div id="wel" style="font-weight: bold;font-size: 30px" class="text-primary text-center" > Welcome Username  </div> <br>
					<form method="post" action="edit_control.php">
		  	<table class="table table-bordered">
  
	  <tr><td>  Id  </td><td> <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" id="form-control1">   </td> </tr>
	<tr><td> username</td> <td> <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" id="form-control2"> </td>  </tr>			
			
	<tr><td> password</td> <td> <input type="text" name="password" class="form-control" value="<?php echo $password; ?>" id="form-control4">  </td>  </tr>
				<tr><td> Acceslevel</td> <td> <input type="text" name="accesslevel" class="form-control" value="<?php echo $accessLevel; ?>" id="form-control5">  </td>  </tr>
				
				<tr><td><button type="submit">Update</button></td> <td> <a href="user_reports.php"><button type="submit">Cancel</button></a> </td></tr>
			
			
		

				
</table>
				</form>
				</div>
		
			
		</div>
	</body>






</html>