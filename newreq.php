<?php
include_once 'inc/filteruser.php'; 
include_once 'inc/config.php';
?>
<html>
<head>
<title> New CAR </title>
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
<h1>Create New CAR </h1>
</header>
<footer> </footer>
<form action = "insertcar.php" method = "post">
<br>
Title: <input type = "text" name = "name" /><br><br>
<footer> </footer>

<br>Type:<br>
<input type="radio" name="type" value="corrective action">Corrective Action (Existing Issue)  
<input type="radio" name="type" value="preventive action">Preventive Action (Risk/Potential Issue)  
<input type="radio" name="type" value="suggestion">Suggestion  
<br><br>
<footer> </footer>
<br>
Source of Feedback:<br>
<input type="radio" name="source" value="employee">Employee

<input type="radio" name="source" value="customer">Customer

<input type="radio" name="source" value="supplier/subcontractor">Supplier/Subcontractor

<input type="radio" name="source" value="external audit">External Audit

<input type="radio" name="source" value="internal audit">Internal Audit

<input type="radio" name="source" value="management">Management

<br>

<input type="radio" name="source" value="other">Other

<input type = "text" name = "othersource" /><br>

<br>
<footer> </footer>
<br>
Process:<br>
<input type="radio" name="process" value="new product development">New Product Development

<input type="radio" name="process" value="sales - quoting to order">Sales - Quoting and Order

<input type="radio" name="process" value="sales - oa to dispatch">Sales - OA to Dispatch

<input type="radio" name="process" value="materials planning/purchasing">Materials Planning/Purchasing

<input type="radio" name="process" value="production">Production

<input type="radio" name="process" value="dispatch, billing, collection">Dispatch, Billing, Collection

<input type="radio" name="process" value="customer feedback and compliance">Customer Feedback and Compliance

<input type="radio" name="process" value="skills management, hiring and training">Skills Management, Hiring, Training

<input type="radio" name="process" value="internal auditing">Internal Auditing

<input type="radio" name="process" value="management system">Management System

<br>
<input type="radio" name="process" value="other">Other

<input type = "text" name = "otherprocess" /><br>

<br>
<footer> </footer>
<br>
Priority:<br>

<input type="radio" name="priority" value="low">Low

<input type="radio" name="priority" value="medium">Medium

<input type="radio" name="priority" value="high">High

<input type="radio" name="priority" value="critical">Critical

<br><br>
<footer> </footer>
<br>
Description:<br>
<textarea name="description" rows="5" cols="200"></textarea>
<br><br><br>

<input type = "submit" name = "create car" value = "Create CAR" />
</form>
</body>
</html>