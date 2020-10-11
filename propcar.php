<?php
include_once 'inc/filteruser.php';
?>

<?php
include_once 'inc/config.php';

$editID = $_GET['ID'];
$prop = mysqli_real_escape_string($conn, $_POST['proposal']);
$sql = "UPDATE carbasic
SET Proposal = '$prop', Status = 4
WHERE ID = $editID";

if ($conn->query($sql) === TRUE){
	header("Location:http://car.jayashree-electrodevices.com/dispour.php");
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}