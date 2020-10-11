<?php
include_once 'inc/filteruser.php';
?>
<html>
<title> database connector </title>

<body>

<?php
include_once 'inc/config.php';

//calculate ID number as well as date
$query0 = "SELECT * FROM carbasic";
$result0 = $conn->query($query0);

$num0 = $result0->num_rows;
$num0++;


$date = date('Y-m-d H:i:s');

//check for other source
$checksource = $_POST['source'];
if ($checksource === "other"){
	$sourcer = $_POST['othersource'];
}
else{
	$sourcer = $_POST['source'];
}

//check for other process
$checkprocess = $_POST['process'];
if ($checkprocess === "other"){
	$processer = $_POST['otherprocess'];
}
else{
	$processer = $_POST['process'];
}
$desc = mysqli_real_escape_string($conn, $_POST['description']);
$uid = $_SESSION["uid"];
$sql = "INSERT INTO carbasic (ID, Name, Date, Type, Source, Process, Priority, 
Description, Status, EmployeeID, Proposal, creatorid) 
VALUES ('$num0' , '$_POST[name]', '$date', '$_POST[type]', '$sourcer', '$processer', '$_POST[priority]', '$desc', 0, 0, '', $uid)";

if ($conn->query($sql) === TRUE){
	header("Location:http://car.jayashree-electrodevices.com/dispmine.php");
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
?>
</body>
</html>