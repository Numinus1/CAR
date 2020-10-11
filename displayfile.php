<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';

$fileID = $_GET['id'];
$getfile = mysqli_query($conn, "SELECT * FROM `attachments` WHERE ID = '$fileID'");
if ($getfile){
	$getrow = $getfile->fetch_assoc();
	$filetype = $getrow["type"];
	
	if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "gif"){
		echo "<img src=\"" . $getrow["path"] . "\" height=\"500\" width=\"500\">";
	}
	else if ($filetype == "doc" || $filetype == "docx" || $filetype == "pdf" || $filetype == "csv"){
		echo"<iframe src='https://docs.google.com/viewer?url=http://car.jayashree-electrodevices.com/" . $getrow["path"] . "&embedded=true' frameborder='0'></iframe>";
	}
	else{
	$file = $getrow["path"];
	if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
	}
}
else{
	echo "Error! Contact Administrator";
}
?>
