<?php

include_once 'inc/config.php';
include_once 'inc/functions.php';


//include 'inc/elements/header.php';

//setup some variables
$action = array();
$action['result'] = null;

//check if the $_GET variables are present
	
//quick/simple validation
if(empty($_GET['email']) || empty($_GET['regkey'])){
	$action['result'] = 'error';
	$action['text'] = 'The link is bad. Please speak to admin';			
}
		
if($action['result'] != 'error'){

	//cleanup the variables
	$email = mysqli_real_escape_string($conn, $_GET['email']);
	$key = mysqli_real_escape_string($conn, $_GET['regkey']);
	
	//check if the key is in the database
	$check_key = mysqli_query($conn, "SELECT * FROM `confirm` WHERE `email` = '$email' AND `key` = '$key' LIMIT 1") or die(mysql_error());
	
	$numrows = $check_key->num_rows;
	if($numrows != 0){
				
		//get the confirm info
		$confirm_info = mysqli_fetch_assoc($check_key);
		
		//confirm the email and update the users database
		$update_users = mysqli_query($conn, "UPDATE `users` SET `active` = 1 WHERE `id` = '$confirm_info[userid]' LIMIT 1") or die(mysql_error());
		//delete the confirm row
		$delete = mysqli_query($conn, "DELETE FROM `confirm` WHERE `id` = '$confirm_info[id]' LIMIT 1") or die(mysql_error());
		
		if($update_users){
						
			$action['result'] = 'success';
			$action['text'] = 'User has been confirmed. Thank-You!';
		
		}else{

			$action['result'] = 'error';
			$action['text'] = 'The user could not be updated Reason: '.mysql_error();;
		
		}
	
	}else{
	
		$action['result'] = 'error';
		$action['text'] = 'The key and email is not in our database.';
	
	}

}
?>
	<body>
		<div id="content">
		<h1>Registration Status</h1>
<?= show_errors($action); ?>
</body>