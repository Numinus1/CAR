<html>
<title> assigning car... </title>

<body>

<?php
include_once 'inc/config.php';
include_once 'inc/functions.php';

$getindex = $_GET['index'];
$getCarID = $_GET['carid'];
$namestring = "selection" . $getindex;
$empID = $_POST[$namestring];

$sql = "UPDATE carbasic 
SET EmployeeID = $empID WHERE ID = $getCarID";

if ($conn->query($sql) === TRUE){
	header("Location:http://car.jayashree-electrodevices.com/dispreq.php");
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

</body>
</html>