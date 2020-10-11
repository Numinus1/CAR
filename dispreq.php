<?php
include_once 'inc/filteruser.php';
include_once 'inc/config.php';
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="material.css">
<meta charset="utf-8"> <!-- This is a widely used standard set that includes characters from most languages-->
</head>
<title> Display CARs </title>


<?php
$query1 = "SELECT * FROM carbasic";
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

/*echo "<style> 
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>*/
echo "<body>";
echo "<table><thead>";
echo "<tr> 
<th>ID</th>
<th>Creator</th>
<th>Title</th>
<th>Date</th>
<th>Description</th>
<th>Attachments</th>
<th>Attach</th>
<th>Proposal</th>
<th>Assignee</th>
<th>Status</th>
 ";
$k = 0;
$j = 0;
while ($row = $result1->fetch_assoc()){
	
echo "</tr></thead><tbody><td>" . $row["ID"] . "</td>";

$creatorlooper = 0;
$creatorsid = $row["creatorid"];
$creatorname = "none";

while ($creatorlooper < $i){
	if ($idarray[$creatorlooper] == $creatorsid){
		$creatorname = $namearray[$creatorlooper];
		$creatorlooper = $i;
	}
	else{
		$creatorlooper++;
	}
}
echo "<td>$creatorname</td>";
$atkname = "<a href=\"viewcar.php?ID=" . $row["ID"] . "\" target=\"_blank\">" . $row["Name"] . "";
echo "<td>" . $atkname . "</td><td>Date: " . $row["Date"] . "</td><td>";

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
echo"</td><td><form action=\"upload.php?RE=0&ID=" . $row['ID'] . "\" method=\"post\" enctype=\"multipart/form-data\">
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
	$status = "Draft";
}
else if ($statusint == 1){
	$status = "Unapproved";
}
else if ($statusint == 2){
	$status = "Unassigned";
}
else if ($statusint == 3){
	$status = "Awaiting Proposal";
}
else if ($statusint == 4){
	$status = "Proposal Approval Pending";
}
else if ($statusint == 5){
	$status = "Solution In Process";
}
else if ($statusint == 6){
	$status = "Solution Verification Pending";
}
else if ($statusint == 7){
	$status = "Closed";
}
echo "<td>" . $status . "</td>";
echo "<td><a href='editCAR.php?ID=".$row['ID']."' target=\"_blank\" >Edit</a></td>";
if ($statusint == 1){
	echo "<td><a href='gateCAR.php?ID=".$row['ID']."&code=2' >Accept</a>";
	echo "/<a href='gateCAR.php?ID=".$row['ID']."&code=0' >Reject</a></td>";
}
else if ($statusint == 2){
	echo "<td><form action = \"assignCAR.php?index=" . $k . "&carid=" . $row['ID'] . "\" method = \"post\"> <select name = \"selection" . $k . "\">";
	$j = 0;
	while ($j < $i){
		echo "<option value = \"" . $idarray[$j] . "\" >" . $namearray[$j] . "</option>";
		$j++;
	}
	echo "</select><input type = \"submit\" name = \"assigner" . $k . "\" value = \"Assign\" /></form></td>";
}
else if ($statusint == 4){
	echo "<td><a href='seePropCAR.php?ID=".$row['ID']."' target=\"_blank\" >View Proposal</a></td>";
	echo "<td><a href='judgeProp.php?ID=".$row['ID']."&code=5' >Accept Proposal</a></td>";
	echo "<td><a href='judgeProp.php?ID=".$row['ID']."&code=3' >Reject Proposal</a></td>";
}
echo "</tr><br>";
$k++;
}
echo "</tbody></table>";


mysqli_close($conn); 
 	
?> 
</body>
</html>