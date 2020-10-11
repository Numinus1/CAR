<?php
session_start();

$_SESSION["credit"] = 0;

include_once 'inc/config.php';
include_once 'inc/functions.php';

//setup some variables/arrays
$action = array();
$action['result'] = null;

$text = array();

$redirect = 0;

$cookie_name = "caruser";
$cookie_value = "lvl0";
setcookie($cookie_name, $cookie_value, time() + 2500, "/");

//check if the form has been submitted
if(isset($_POST['login'])){

	//cleanup the variables
	//prevent mysql injection
	$username = mysqli_real_escape_string($conn, $_POST['username_tr']);
	$password = mysqli_real_escape_string($conn, $_POST['password_tr']);
	
	//quick/simple validation
	if(empty($username)){ $action['result'] = 'error'; array_push($text,'You forgot your username'); }
	if(empty($password)){ $action['result'] = 'error'; array_push($text,'You forgot your password'); }
	
	if($action['result'] != 'error'){
				
		$password = md5($password);	
			
		//check password against the database
		/*$query0 = "SELECT `username`, `password` , `active` FROM users WHERE username = '$_POST[username_tr]'";
		$result0 = $conn->query($query0);*/
		$getpwd = mysqli_query($conn, "SELECT `id`, `username`, `password`, `active` FROM users WHERE `username` = '$username' AND `password` = '$password' LIMIT 1") or die(mysql_error());
		$resulta = mysqli_fetch_array($getpwd);
		//echo "the username is:<br>" . $resulta['username'] . "<br>And the password is: <br>" . $resulta['password'] . "<br>And the active is: <br>" . $resulta['active'] . "<br>";
		$numrows0 = $getpwd->num_rows;
		//echo "finally, the number of rows is: " . $numrows0 . "<br>";
		
		//if no username matches
		if ($numrows0 == 0)
		{
			$action['result'] = 'error'; array_push($text,'Either the username or password are incorrect');
		}
		
		else{
			//echo "1+ rows where <br>";
			$result0 = mysqli_fetch_array($getpwd);
			$_SESSION["uid"] = $resulta['id'];
			$redirect = $resulta['active'];
			//echo "active is: " . $resulta['active'] . "<br>";
			//echo "and redirect is: " . $redirect . "<br>";
			
		}
	
		
		if ($redirect == 1)
		{
			$_SESSION["credit"] = 1;
			
			//header("Location:http://localhost/CAR_Online/caruser.php");
			header("Location:http://car.jayashree-electrodevices.com/caruser.php");
			//echo "<script>window.location = 'http://car.jayashree-electrodevices.com/caruser.php'</script>";
		}
		
		else if ($redirect == 2)
		{
			$_SESSION["credit"] = 2;
			
			//header("Location:http://localhost/CAR_Online/caradmin.php");
			header("Location:http://car.jayashree-electrodevices.com/caradmin.php");
			//echo "<script>window.location = 'http://car.jayashree-electrodevices.com/caradmin.php'</script>";
		}
		
	
	}
	
	$action['text'] = $text;
}



?>
	<body>

		<div id="content">
		
		<h1>CAR User Login</h1>

<?php
//include 'inc/elements/header.php'; ?>

<?= show_errors($action); ?>

<form method="post" action="">

    <fieldset>
    
    	<ul>
    		<li>
    			<label for="username">Username:</label>
    			<input type="text" name="username_tr" />
    		</li>
    		<li>
    			<label for="password">Password:</label>
    			<input type="password" name="password_tr" />
    		</li>
    		<li>
    			<input type="submit" value="Login" class="large blue button" name="login" />			
    		</li>
			<li>
				<a href="registration.php" target="_blank">Register New Account</a>
			</li>
						<li>
				<a href="registration.php" target="_blank">Reset Password</a>
			</li>
    	</ul>
    	
    </fieldset>
    
</form>			
		
<?php
//include 'inc/elements/footer.php'; ?>