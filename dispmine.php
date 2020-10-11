<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';
?>

<html>
<head>
<title> Display Created CARs </title>


<?php
$uid0 = $_SESSION["uid"];
$query1 = "SELECT * FROM carbasic WHERE creatorid = $uid0";
$result1 = $conn->query($query1);

$userquery = "Select * FROM users";
$userresult = $conn->query($userquery);

$usernum = $userresult->num_rows;
$i = 0;
$namearray = array();
$idarray = array();

while ($userrow = $userresult->fetch_assoc()){
	$namearray[$i] = $userrow["username"];
	$idarray[$i] = $userrow["id"];
	$i++;
}

$num1 = $result1->num_rows;

echo "<style> 
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>";
echo "<table style=\"width:70%\">";
echo "<tr> 
<th>ID</th>
<th>Title</th>
<th>Date</th>
<th>Type</th>
<th>Source</th>
<th>Process</th>
<th>Priority</th>
<th>Description</th>
<th>Attachments</th>
<th>Attach</th>
<th>Proposal</th>
<th>Assignee</th>
 ";
$k = 0;
$j = 0;
while ($row = $result1->fetch_assoc()){
$atkname = "<a href=\"viewcar.php?ID=" . $row["ID"] . "\" target=\"_blank\">" . $row["Name"] . "";	
echo "<tr><td>" . $row["ID"] . "</td><td>" . $atkname . "</td><td>Date: " . $row["Date"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Source"] . "</td><td>" . $row["Process"]. "</td><td>" .$row["Priority"] . "</td><td>";

$desc = $row["Description"];
	if (str_word_count($desc) > 15) {
          $words = str_word_count($desc, 2);
          $pos = array_keys($words);
          $desc = substr($desc, 0, $pos[15]) . '...';
      }
echo $desc . "</td><td>";

$pickID = $row["ID"];
$getpicssql = "SELECT * FROM attachments WHERE carid = $pickID";

$picresult = $conn->query($getpicssql);

$picnum = $picresult->num_rows;

/*while ($picrow = $picresult->fetch_assoc()){
	echo "<img src=\"" . $picrow["path"] . "\" height=\"200\" width=\"200\">";
}*/
while ($picrow = $picresult->fetch_assoc()){
	$fullpath = $picrow["path"];
	$filename = str_replace("uploads/", "", $fullpath); 
	echo "<a href=\"download.php?id=" .$picrow["ID"] . "\" target=\"_blank\">" . $filename . "<br>";
}
echo"</td><td><form action=\"upload.php?ID=" . $row['ID'] . "\" method=\"post\" enctype=\"multipart/form-data\">
    Select image to upload:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
    <input type=\"submit\" value=\"Upload File\" name=\"submit\">
</form></td><td>";

if ($row["Proposal"] == "")
{
	echo "None";
}
else
{
	$proposition = $row["Proposal"];
	if (str_word_count($proposition) > 15) {
          $words = str_word_count($proposition, 2);
          $pos = array_keys($words);
          $proposition = substr($proposition, 0, $pos[15]) . '...';
      }
	echo $proposition;
}

echo "</td>";
if ($row["EmployeeID"] == 0)
{
	echo "<td> None </td>";
}
else
{
	$a = 0;
	while ($a < $i){
		if ($idarray[$a] == $row["EmployeeID"]){
			
			echo "<td>" . $namearray[$a] . "</td>";
			$a = $i;
		}
		else{
			$a++;
		}
	}
}
$statusint = $row['Status'];
if ($statusint == 0){
	echo "<td><a href='editCAR.php?RE=1&ID=".$row['ID']."'  >Edit</a></td>";
	echo "<td><a href='commitCAR.php?ID=".$row['ID']."'  >Commit</a></td>";	
}
else{
	echo "<td><a href='viewcar.php?ID=".$row['ID']."' target=\"_blank\" >View</a></td>";
}
echo "</tr><br>";
$k++;
}
echo "</table>";


mysqli_close($conn); 
 	
?> 
</body>
</html>