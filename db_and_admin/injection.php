<?php
$myhost = 'localhost';
$root = 'root';
$pass = '';
$database = 'a_sample';

$conn = @mysqli_connect($myhost, $root, $pass, $database);

if(!$conn ){
	die('<br>Couldnt connect! <br>');
}


if(isset($_POST['username']) && isset($_POST['passw'])){
	
	$username = $_POST['username'];
	$password = $_POST['passw'];

	if(!empty($username)&&!empty($password)) {



		$q = "SELECT `id` FROM `sample` WHERE `username`='$username' AND `password` = '$password' ";
		$q_run = mysqli_query($conn , $q);

			if(mysqli_num_rows($q_run) >=1){
				echo '<br><br>Login success.';
			} else {
				echo '<br> Invalid username/password ';
			}


	}
}

?>

<form action="injection.php" method="POST">
Username: <input type="text" id = "username" name="username">
Password: <input type="password" id = "passw" name="passw">
<input type="submit" id = "submit" name="submit" value="Log In">
</form>
