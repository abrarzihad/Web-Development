

<?php
session_start();

$servername   = "localhost";
$username     = "root";
$password     = null;
$dbName     = "regformcc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if ($conn) {

	
}
	else 
	{
    die("Connection failed: " . mysqli_connect_error());
	}


?>