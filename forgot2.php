<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "sw401team2";


// Create connection
$conn=mysqli_connect("localhost","root","password","sw401team2");// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE verification SET password='Doe' WHERE id=5";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);





?>