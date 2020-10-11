<?php
include_once 'inc/filteruser.php';
?>
<html>

<head>
<title> Edit CAR </title>
<style>
body {
	font-family: Calibri, Arial;
}

header{
	background-color: rgb(116, 166, 189);
	padding: 15px;
	text-align: center;
	font-size: 15px;
	color: black;	
}

section{
	background-color: rgb(116, 166, 189);
	padding: 5px;	
	text-align: center;
	font-size: 10px;
	color: black;
}

footer{
	background-color: black;
	padding:5px;
}

form{
	background-color: white;
}

</style>
</head>

<body>
<header>
<h1>Edit CAR </h1>
</header>
<footer> </footer>
<?php 
include_once 'inc/config.php';

$editID = $_GET['ID'];
$getquery = "SELECT * FROM carbasic WHERE ID = $editID";
$getresult = $conn->query($getquery);

$getnum = $getresult->num_rows;

while ($row = $getresult->fetch_assoc()){


$Name = $row["Name"];
$Date = $row["Date"];
$Type = $row["Type"];
$Process = $row["Process"];
$Source = $row["Source"];
$Priority = $row["Priority"];
$Description = $row["Description"];

echo "<form action = \"modifycar.php?ID=" . $editID . "\" method = \"post\">

<br>

Name: <input type = \"text\" name = \"name\" value = \" $Name \"/><br><br>
<footer> </footer>

<br>Type:<br>";
echo "<input type=\"radio\" name=\"type\" value=\"new action\" ";
echo ($Type == "corrective action") ? "checked = \"checked\">" : " >"; 
echo "Corrective Action (Existing Issue)  
<input type=\"radio\" name=\"type\" value=\"preventive action\" "; 
echo ($Type == "preventive action") ? "checked = \"checked\">" : " >"; 
echo "Preventive Action (Risk/Potential Issue)  
<input type=\"radio\" name=\"type\" value=\"suggestion\""; 
echo ($Type == "suggestion") ? "checked = \"checked\">" : " >"; 

echo "Suggestion";

echo"
<br><br>
<footer> </footer>
<br>
Source of Feedback:<br>";

echo "<input type=\"radio\" name=\"source\" value=\"employee\" ";
echo ($Source == "employee") ? "checked = \"checked\">" : " >";

echo"Employee

<input type=\"radio\" name=\"source\" value=\"customer\" ";

echo ($Source == "customer") ? "checked = \"checked\">" : " >";

echo "Customer

<input type=\"radio\" name=\"source\" value=\"supplier/subcontractor\" ";
echo ($Source == "supplier/subcontractor") ? "checked = \"checked\">" : " >";

echo"
Supplier/Subcontractor

<input type=\"radio\" name=\"source\" value=\"external audit\" ";
echo ($Source == "external audit") ? "checked = \"checked\">" : " >";
echo"External Audit

<input type=\"radio\" name=\"source\" value=\"internal audit\" ";
echo ($Source == "internal audit") ? "checked = \"checked\">" : " >";
echo"Internal Audit

<input type=\"radio\" name=\"source\" value=\"management\" ";
echo ($Source == "management") ? "checked = \"checked\">" : " >";
echo"Management

<br>

<input type=\"radio\" name=\"source\" value=\"other\" ";
echo (($Source != "employee")&&($Source != "customer")&&($Source != "supplier/subcontractor")&&($Source != "external audit")&&($Source != "internal audit")&&($Source != "management")) ? "checked = \"checked\">" : " >";
echo "Other

<input type = \"text\" name = \"othersource\" ";
echo (($Source != "employee")&&($Source != "customer")&&($Source != "supplier/subcontractor")&&($Source != "external audit")&&($Source != "internal audit")&&($Source != "management")) ? "value = \"$Source\">" : " >";

echo"
<br>

<br>
<footer> </footer>
<br>
Process:<br>
<input type=\"radio\" name=\"process\" value=\"new product development\" ";
echo ($Process == "new product development") ? "checked = \"checked\">" : " >";
echo "New Product Development
<input type=\"radio\" name=\"process\" value=\"sales - quoting to order\" ";
echo ($Process == "sales - quoting to order") ? "checked = \"checked\">" : " >";
echo "Sales - Quoting and Order

<input type=\"radio\" name=\"process\" value=\"sales - oa to dispatch\" ";
echo ($Process == "sales - oa to dispatch") ? "checked = \"checked\">" : " >";
echo "Sales - OA to Dispatch

<input type=\"radio\" name=\"process\" value=\"materials planning/purchasing\" ";
echo ($Process == "materials planning/purchasing") ? "checked = \"checked\">" : " >";

echo "Materials Planning/Purchasing
<input type=\"radio\" name=\"process\" value=\"production\" ";
echo ($Process == "production") ? "checked = \"checked\">" : " >";
echo "Production

<input type=\"radio\" name=\"process\" value=\"dispatch, billing, collection\" ";
echo ($Process == "dispatch, billing, collection") ? "checked = \"checked\">" : " >";
echo "Dispatch, Billing, Collection

<input type=\"radio\" name=\"process\" value=\"customer feedback and compliance\" ";
echo ($Process == "customer feedback and compliance") ? "checked = \"checked\">" : " >";
echo "Customer Feedback and Compliance

<input type=\"radio\" name=\"process\" value=\"skills management, hiring and training\" ";
echo ($Process == "skills management, hiring and training") ? "checked = \"checked\">" : " >";
echo "Skills Management, Hiring, Training

<input type=\"radio\" name=\"process\" value=\"internal auditing\" ";
echo ($Process == "internal auditing") ? "checked = \"checked\">" : " >";
echo "Internal Auditing

<input type=\"radio\" name=\"process\" value=\"management system\" ";
echo ($Process == "management system") ? "checked = \"checked\">" : " >";
echo "Management System

<br>
<input type=\"radio\" name=\"process\" value=\"other\" ";
echo (($Process != "new product development")&&($Process != "sales - quoting to order")&&($Process != "sales - oa to dispatch")&&($Process != "materials planning/purchasing")&&($Process != "production")&&($Process != "dispatch, billing, collection")&&($Process != "customer feedback and compliance")&&($Process != "skills management, hiring and training")&&($Process != "internal auditing")&&($Process != "management system")&&($Process != "internal auditing")) ? "checked = \"checked\">" : " >";
echo "Other

<input type = \"text\" name = \"otherprocess\" ";
echo (($Process != "new product development")&&($Process != "sales - quoting to order")&&($Process != "sales - oa to dispatch")&&($Process != "materials planning/purchasing")&&($Process != "production")&&($Process != "dispatch, billing, collection")&&($Process != "customer feedback and compliance")&&($Process != "skills management, hiring and training")&&($Process != "internal auditing")&&($Process != "management system")&&($Process != "internal auditing")) ? "value = \"$Process\">" : " >";


echo "<br>

<br>
<footer> </footer>
<br>
Priority:<br>

<input type=\"radio\" name=\"priority\" value=\"low\" ";
echo ($Priority == "low") ? "checked = \"checked\">" : " >";

echo "Low

<input type=\"radio\" name=\"priority\" value=\"medium\" ";
echo ($Priority == "medium") ? "checked = \"checked\">" : " >";
echo "Medium

<input type=\"radio\" name=\"priority\" value=\"high\" ";
echo ($Priority == "high") ? "checked = \"checked\">" : " >";
echo "High

<input type=\"radio\" name=\"priority\" value=\"critical\" ";
echo ($Priority == "critical") ? "checked = \"checked\">" : " >";

echo "Critical

<br><br>
<footer> </footer>
<br>
Description:<br>
<textarea name=\"description\" rows=\"5\" cols=\"200\">$Description";


echo "</textarea>

<br><br><br><input type = \"submit\" name = \"create car\" value = \"Submit Changes\"/>

</form>";}
?>

</body>
</html>
	