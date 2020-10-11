<html>
<title> assigning car... </title>

<body>

<?php
include_once 'inc/config.php';
include_once 'inc/functions.php';

$getID = $_GET['ID'];
$getCODE = $_GET['code'];

$sql = "UPDATE carbasic 
SET Status = $getCODE WHERE ID = $getID";

if ($conn->query($sql) === TRUE){
	header("Location:http://car.jayashree-electrodevices.com/dispreq.php");
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

</body>
</html>