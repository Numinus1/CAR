<?php

include_once 'inc/config.php';
include_once 'inc/functions.php';

//setup some variables/arrays
$action = array();
$action['result'] = null;

$text = array();

if(isset($_POST['signup'])){

	//cleanup the variables
	//prevent mysql injection
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	//check for repeated email
	$emailsql = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
	if ($emailsql){
		$rowcount = $emailsql->num_rows;
		if ($rowcount > 0){
			$action['result'] = 'error'; array_push($text,'This email is already registered.'); 
		}
	}
	
	//quick/simple validation
	if(empty($username)){ $action['result'] = 'error'; array_push($text,'You forgot your username'); }
	if(empty($password)){ $action['result'] = 'error'; array_push($text,'You forgot your password'); }
	if(empty($email)){ $action['result'] = 'error'; array_push($text,'You forgot your email'); }
	
	if($action['result'] != 'error'){
				
		$password = md5($password);	
			
		//add to the database
		$add = mysqli_query($conn, "INSERT INTO `users` VALUES(NULL,'$username','$password','$email',1)");
		
		if($add){
			
			//get the new user id
			$userid = mysqli_insert_id($conn);
			
			//create a random key
			$key = $username . $email . date('mY');
			$key = md5($key);
			
			//add confirm row
			$confirm = mysqli_query($conn, "INSERT INTO `confirm` VALUES(NULL,'$userid','$key','$email')");	
			
			if($confirm){
				
				$confirmlink = 'http://car.jayashree-electrodevices.com/confirm.php?regkey=' . $key . '&email=' . $email;
				header($confirmlink);
				/*$to = $email;
				$subject = 'CAR User Registration - Confirmation Link';
				$reglink = 'car.jayashree-electrodevices.com/confirm.php?regkey=' . $key . '&email=' . $email;
				/*'http://localhost/CAR_Online/confirm.php?regkey=' . $key . '&email=' . $email;*/
				/*$message = $reglink . '
				Click the above link to complete your registration';
				$headers = 'From: car_registration@jedl.com';

				$test = mail ($to, $subject, $message, $headers);

				//var_dump($test); 
				die("A registration email has been sent to the specified email address. It can take up to five minutes to reach the inbox");*/
			
			}else{
				
				$action['result'] = 'error';
				array_push($text,'Confirm row was not added to the database. Reason: ' . mysql_error());
				
			}
			
		}else{
		
			$action['result'] = 'error';
			array_push($text,'User could not be added to the database. Reason: ' . mysql_error());
		
		}
	
	}
	
	$action['text'] = $text;

}

?>
	<body>

		<div id="content">
		
		<h1>CAR User Registration</h1>

<?php
//include 'inc/elements/header.php'; ?>

<?= show_errors($action); ?>

<form method="post" action="">

    <fieldset>
    
    	<ul>
    		<li>
    			<label for="username">Username:</label>
    			<input type="text" name="username" />
    		</li>
    		<li>
    			<label for="password">Password:</label>
    			<input type="password" name="password" />
    		</li>
    		<li>
    			<label for="email">Email:</label>
    			<input type="text" name="email" />	
    		</li>
    		<li>
    			<input type="submit" value="Register" class="large blue button" name="signup" />			
    		</li>
    	</ul>
    	
    </fieldset>
    
</form>			
		
<?php
//include 'inc/elements/footer.php'; ?>