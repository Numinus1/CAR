<?php
session_start();

$url = $_GET['url'];

if (isset($_SESSION["credit"])){
	echo "session is set<br><br>";
	if ($_SESSION["credit"] < 1){
		echo "session value below 1";
		header("Location:http://localhost/CAR_Online/unauth.php");
		//echo "<script>window.location = 'http://localhost/CAR_Online/unauth.php' <script>";
	}
	else{

	}
}
else{
	header("Location:http://localhost/CAR_Online/unauth.php");
	echo "<script>window.location = 'http://localhost/CAR_Online/unauth.php' <script>";
}

?>