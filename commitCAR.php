<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';

$id = $_GET['ID'];
$add = mysqli_query($conn, "UPDATE `carbasic` SET Status = 1 WHERE ID = '$id'");
$i = 0;
$j = 0;
$emailarray = array();
if ($add){
	$getcar = mysqli_query($conn, "SELECT * FROM `carbasic` WHERE ID = '$id'");
	while($row = $getcar->fetch_assoc()){
	if ($getcar){
		$getemails = mysqli_query($conn, "SELECT * FROM `users` WHERE active > 1");
		if ($getemails){
			while ($arow = $getemails->fetch_assoc()){
				$emailarray[$i] = $arow['email'];
				$i++;
			}
			$to = "";
			$j = 0;
			while ($j < $i){
				if ($j == 0){
					$to = $to . $emailarray[0];
				}
				else{
					$to = $to . "," . $emailarray[$j];
				}
				$j++;
			}
				$subject = 'CAR Submitted: ' . $row['Name'];
				$message = 'A new CAR has been submitted. Please review and approve or ask the author of the CAR to edit. This is an automated message, do not reply.';
				$header = 'From: car_notifications@jedl.com';
				
				$test = mail ($to, $subject, $message, $header);
				//echo "<script>window.close();</script>";
				//var_dump($test); 
				
				
			
			
		}
	}
	}
	header("Location:http://car.jayashree-electrodevices.com/dispmine.php");
	//echo "<script>window.close();</script>";
}
else{
	echo "problem";
}
?>