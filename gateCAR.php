<html>
<title> assigning car... </title>

<body>

<?php
include_once 'inc/config.php';
include_once 'inc/functions.php';

$getID = $_GET['ID'];
$getCODE = $_GET['code'];
$id = $getID;
$sql = "UPDATE carbasic 
SET Status = $getCODE WHERE ID = $getID";

if ($conn->query($sql) === TRUE){
	$i = 0;
	$j = 0;
	$emailarray = array();
	$getcar = mysqli_query($conn, "SELECT * FROM `carbasic` WHERE ID = '$id'");
	while($row = $getcar->fetch_assoc()){
		$creatorsid = $row['creatorid'];
	if ($getcar){
		$getemails = mysqli_query($conn, "SELECT * FROM `users` WHERE `users`.`id` = '$creatorsid'");
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
				if ($getCODE == 2){
					$subject = 'CAR Approved: ' . $row['Name'];
					$message = 'The CAR titled ' . $row['Name'] . ' has been approved. Please begin creating a solution proposal.';
				}
				else{
					$subject = 'CAR Rejected: ' . $row['Name'];
					$message = 'The CAR titled ' . $row['Name'] . ' has been rejected. Please revise the CAR and re-submit for approval.';
				}
				
				$header = 'From: car_notifications@jedl.com';
				
				//echo $header . "<br>" . "To: " . $to . "<br><br>" . "subject: " . $subject . "<br><br>message: " . $message;
				$test = mail ($to, $subject, $message, $header);
				//die ("mail sent");
				//var_dump($test); 
				
				
			
			
		}
	}
	}	
	header("Location:http://car.jayashree-electrodevices.com/dispreq.php");
	//echo "<script>window.close();</script>";
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

</body>
</html>