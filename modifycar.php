<?php
include_once 'inc/filteruser.php';
?>
<html>
<title> database connector </title>

<body>

<?php
include_once 'inc/config.php';

$editID = $_GET['ID'];

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
$sql = "UPDATE carbasic
SET Name =  '$_POST[name]', Date = '$date', Type = '$_POST[type]', Source = '$sourcer', Process = '$processer', Priority = '$_POST[priority]', Description = '$desc'
WHERE ID = $editID";

if ($conn->query($sql) === TRUE){
	//echo "<script>window.close();</script>"
	echo "Changes Submitted";
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}