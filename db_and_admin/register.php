<?php 
require_once 'JOIN.php';
require_once 'core.inc.php';

if(!loggedin()){
echo 'Register NOW!<br>';
global $connected;
	
	if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_agn']) && isset($_POST['firstname']) && isset($_POST['lastname']) ){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_agn = $_POST['password_agn'];
		$firstname = $_POST['firstname'];
		$lastname =  $_POST['lastname'];
		$password_hash = md5($password);
			
		if(!empty($_POST['username']) && !empty($_POST['password'])&& !empty($_POST['password_agn']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
					
				if(strlen($username)>30 || strlen($firstname)>40 || strlen($lastname)){
						echo '<br><strong>Please adhere to max length.</strong><br>';
				}else{

						if($password != $password_agn){
						echo '<br>Passwords don\'t match!<br><br>';
						}else{
						
							$q = "SELECT `username` FROM `users` WHERE `username`='$username'";
							
							$q_run = mysqli_query($connected, $q);
							$row = mysqli_num_rows($q_run);
						   
						   if($row >= 1){
						   		echo '<br>Username '.$username.' already exists ';
						   } 
						   else
						   {
						   	
						   		$q1 = "INSERT INTO `users` VALUES ('','".mysqli_real_escape_string($connected,$username)."','".mysqli_real_escape_string($connected, $password_hash)."','".mysqli_real_escape_string($connected, $firstname)."','".mysqli_real_escape_string($connected,$lastname)."') ";

						   		$q1_run = mysqli_query($connected , $q1);

						   		if($q1_run){
						   			echo '<br><strong> You have successfully registered.</strong>';
						   			header('Location: register_success.php');
						   		}else {
						   			echo '<br><strong>Couldnt register! SORRY. </strong>';
						   		}
							}
						}
				}	
					

		}else {
			echo '<br>All fields are required';
		}
	}
?>

<form action="register.php" method="POST">
Username: <br><input type="text" name="username" maxlength = "100" value="<?php if(isset($username)){ echo $username; } ?>"><br><br>
Password: <br><input type="password" name="password" ><br><br>
Confirm Password: <br><input type="password" name="password_agn"><br><br>
Firstname : <br><input type="text" name="firstname" maxlength = "40" value="<?php if(isset($firstname)){ echo $firstname; }?>"><br><br>
Lastname : <br><input type="text" name="lastname" maxlength = "40" value="<?php if(isset($lastname)){ echo $lastname; } ?>"><br><br>
<input type="submit" value="Register" name="Register"><br><br>

<?php
}else if(loggedin()){
	echo '<br>You\'re register and logged in already!';
}
?>