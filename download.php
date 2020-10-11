<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';
?>

<?php
$filename = 'Test.pdf'; // of course find the exact filename....        
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false); // required for certain browsers 
header('Content-Type: application/pdf');

header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));

readfile($filename);

exit;
?>

<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';

$fileID = $_GET['id'];
$getfile = mysqli_query($conn, "SELECT * FROM `attachments` WHERE ID = '$fileID'");
if ($getfile){
	$getrow = $getfile->fetch_assoc();
	$filetype = $getrow["type"];
	
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
else{
	echo "Error! Contact Administrator";
}
?>
