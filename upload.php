<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';

$getCarID = $_GET['ID'];
$getRE = $_GET['RE'];

echo "RE is: " . $RE;

$query0 = "SELECT * FROM attachments";
$result0 = $conn->query($query0);

$num0 = $result0->num_rows;
$num0++;

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
        $uploadOk = 1;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && 
$imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "csv" && $imageFileType != "zip") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO attachments (ID, path, carid, type) VALUES ('$num0', '$target_file', '$getCarID', '$imageFileType')";
		if ($conn->query($sql) === TRUE){
		//header("Location:http://localhost/CAR_Online/dispreq.php");
			if ($getRE == 0){
				header("Location:http://car.jayashree-electrodevices.com/dispreq.php");
			}
			else if ($getRE == 1){
				header("Location:http://car.jayashree-electrodevices.com/dispmine.php");
			}
			else if ($getRE == 2){
				header("Location:http://car.jayashree-electrodevices.com/dispour.php");
			}
			else{
				header("Location:http://car.jayashree-electrodevices.com/dispmine.php");
			}
		}
		else{
			echo "<br>sql failed";
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
;
?>