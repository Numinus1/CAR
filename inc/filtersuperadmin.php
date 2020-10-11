<?php
session_start();

if (isset($_SESSION["credit"])){
	if ($_SESSION["credit"] < 3){
		header("Location:http://car.jayashree-electrodevices.com/unauth.php");
	}
}
else{
	header("Location:http://car.jayashree-electrodevices.com/unauth.php");

}

?>