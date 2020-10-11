<?php
include_once 'inc/filteruser.php';
?>
<html>

<head>
<title> View Proposal </title>
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
<h1>CAR - Solution Proposal </h1>
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
$Proposal = $row["Proposal"];

echo "<form action = \"propcar.php?ID= " . $editID . "\" method = \"post\" >

<br>

Name: <input type = \"text\" name = \"name\" value = \" $Name \" disabled=\"disabled\"/><br><br>
<footer> </footer>

<br>Type:<br>";
echo "<input type=\"radio\" name=\"type\" value=\"new action\" disabled=\"disabled\" ";
echo ($Type == "corrective action") ? "checked = \"checked\">" : " >"; 
echo "Corrective Action (Existing Issue)  
<input type=\"radio\" name=\"type\" value=\"preventive action\" disabled=\"disabled\" "; 
echo ($Type == "preventive action") ? "checked = \"checked\">" : " >"; 
echo "Preventive Action (Risk/Potential Issue)  
<input type=\"radio\" name=\"type\" value=\"suggestion\" disabled=\"disabled\" "; 
echo ($Type == "suggestion") ? "checked = \"checked\">" : " >"; 

echo "Suggestion";

echo"
<br><br>
<footer> </footer>
<br>
Source of Feedback:<br>";

echo "<input type=\"radio\" name=\"source\" value=\"employee\"  disabled=\"disabled\" ";
echo ($Source == "employee") ? "checked = \"checked\">" : " >";

echo"Employee

<input type=\"radio\" name=\"source\" value=\"customer\" disabled=\"disabled\"  ";

echo ($Source == "customer") ? "checked = \"checked\">" : " >";

echo "Customer

<input type=\"radio\" name=\"source\" value=\"supplier/subcontractor\" disabled=\"disabled\"  ";
echo ($Source == "supplier/subcontractor") ? "checked = \"checked\">" : " >";

echo"
Supplier/Subcontractor

<input type=\"radio\" name=\"source\" value=\"external audit\" disabled=\"disabled\"  ";
echo ($Source == "external audit") ? "checked = \"checked\">" : " >";
echo"External Audit

<input type=\"radio\" name=\"source\" value=\"internal audit\" disabled=\"disabled\"  ";
echo ($Source == "internal audit") ? "checked = \"checked\">" : " >";
echo"Internal Audit

<input type=\"radio\" name=\"source\" value=\"management\" disabled=\"disabled\"  ";
echo ($Source == "management") ? "checked = \"checked\">" : " >";
echo"Management

<br>

<input type=\"radio\" name=\"source\" value=\"other\" disabled=\"disabled\"  ";
echo (($Source != "employee")&&($Source != "customer")&&($Source != "supplier/subcontractor")&&($Source != "external audit")&&($Source != "internal audit")&&($Source != "management")) ? "checked = \"checked\">" : " >";
echo "Other

<input type = \"text\" name = \"othersource\" disabled=\"disabled\"  ";
echo (($Source != "employee")&&($Source != "customer")&&($Source != "supplier/subcontractor")&&($Source != "external audit")&&($Source != "internal audit")&&($Source != "management")) ? "value = \"$Source\">" : " >";

echo"
<br>

<br>
<footer> </footer>
<br>
Process:<br>
<input type=\"radio\" name=\"process\" value=\"new product development\"  disabled=\"disabled\" ";
echo ($Process == "new product development") ? "checked = \"checked\">" : " >";
echo "New Product Development
<input type=\"radio\" name=\"process\" value=\"sales - quoting to order\"  disabled=\"disabled\" ";
echo ($Process == "sales - quoting to order") ? "checked = \"checked\">" : " >";
echo "Sales - Quoting and Order

<input type=\"radio\" name=\"process\" value=\"sales - oa to dispatch\"  disabled=\"disabled\" ";
echo ($Process == "sales - oa to dispatch") ? "checked = \"checked\">" : " >";
echo "Sales - OA to Dispatch

<input type=\"radio\" name=\"process\" value=\"materials planning/purchasing\"  disabled=\"disabled\" ";
echo ($Process == "materials planning/purchasing") ? "checked = \"checked\">" : " >";

echo "Materials Planning/Purchasing
<input type=\"radio\" name=\"process\" value=\"production\"  disabled=\"disabled\" ";
echo ($Process == "production") ? "checked = \"checked\">" : " >";
echo "Production

<input type=\"radio\" name=\"process\" value=\"dispatch, billing, collection\"  disabled=\"disabled\" ";
echo ($Process == "dispatch, billing, collection") ? "checked = \"checked\">" : " >";
echo "Dispatch, Billing, Collection

<input type=\"radio\" name=\"process\" value=\"customer feedback and compliance\"  disabled=\"disabled\" ";
echo ($Process == "customer feedback and compliance") ? "checked = \"checked\">" : " >";
echo "Customer Feedback and Compliance

<input type=\"radio\" name=\"process\" value=\"skills management, hiring and training\" disabled=\"disabled\"  ";
echo ($Process == "skills management, hiring and training") ? "checked = \"checked\">" : " >";
echo "Skills Management, Hiring, Training

<input type=\"radio\" name=\"process\" value=\"internal auditing\"  disabled=\"disabled\" ";
echo ($Process == "internal auditing") ? "checked = \"checked\">" : " >";
echo "Internal Auditing

<input type=\"radio\" name=\"process\" value=\"management system\"  disabled=\"disabled\" ";
echo ($Process == "management system") ? "checked = \"checked\">" : " >";
echo "Management System

<br>
<input type=\"radio\" name=\"process\" value=\"other\"  disabled=\"disabled\" ";
echo (($Process != "new product development")&&($Process != "sales - quoting to order")&&($Process != "sales - oa to dispatch")&&($Process != "materials planning/purchasing")&&($Process != "production")&&($Process != "dispatch, billing, collection")&&($Process != "customer feedback and compliance")&&($Process != "skills management, hiring and training")&&($Process != "internal auditing")&&($Process != "management system")&&($Process != "internal auditing")) ? "checked = \"checked\">" : " >";
echo "Other

<input type = \"text\" name = \"otherprocess\"  disabled=\"disabled\" ";
echo (($Process != "new product development")&&($Process != "sales - quoting to order")&&($Process != "sales - oa to dispatch")&&($Process != "materials planning/purchasing")&&($Process != "production")&&($Process != "dispatch, billing, collection")&&($Process != "customer feedback and compliance")&&($Process != "skills management, hiring and training")&&($Process != "internal auditing")&&($Process != "management system")&&($Process != "internal auditing")) ? "value = \"$Process\">" : " >";


echo "<br>

<br>
<footer> </footer>
<br>
Priority:<br>

<input type=\"radio\" name=\"priority\" value=\"low\"  disabled=\"disabled\" ";
echo ($Priority == "low") ? "checked = \"checked\">" : " >";

echo "Low

<input type=\"radio\" name=\"priority\" value=\"medium\"  disabled=\"disabled\" ";
echo ($Priority == "medium") ? "checked = \"checked\">" : " >";
echo "Medium

<input type=\"radio\" name=\"priority\" value=\"high\"  disabled=\"disabled\" ";
echo ($Priority == "high") ? "checked = \"checked\">" : " >";
echo "High

<input type=\"radio\" name=\"priority\" value=\"critical\"  disabled=\"disabled\" ";
echo ($Priority == "critical") ? "checked = \"checked\">" : " >";

echo "Critical

<br><br>
<footer> </footer>
<br>
Description:<br>
<textarea name=\"description\" rows=\"5\" cols=\"200\"  disabled=\"disabled\" >$Description";


echo "</textarea><br><br>";

echo "Proposed Solution: <br> <textarea name = \"proposal\" rows = \"5\" cols = \"200\" disabled=\"disabled\" >$Proposal</textarea><br>";
echo "<a href='judgeProp.php?ID=".$row['ID']."&code=5' target=\"_blank\" >Accept Proposal</a>";
echo " or ";
echo "<a href='judgeProp.php?ID=".$row['ID']."&code=3' target=\"_blank\" >Reject Proposal</a>";
echo"
</form>";}
?>

</body>
</html>
	