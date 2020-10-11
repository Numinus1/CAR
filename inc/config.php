<?php

//connect to the database
//online
$conn = new mysqli('localhost', 'car_manager', '&3woYgI7com3');
//wamp
//$conn = new mysqli('localhost', 'root', '');
if ($conn->connect_error){
	die("Connection error: " . $conn->connect_error);
}
//echo "Connected to Host";

mysqli_select_db($conn, "cartables");
?>