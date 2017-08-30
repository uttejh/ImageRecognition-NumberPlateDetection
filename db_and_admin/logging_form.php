
<?php

require_once 'JOIN.php';
require_once 'core.inc.php';


if( isset($_POST['submit']) ) 
	{
	$username = $_POST['username'];
	$password = $_POST['passw'];
	$md5_password = md5($password);
	echo 'Entering the main if.<br>';


	if( !empty($username) || !empty($password) )
	{
		echo 'entering not empty if.<br>';

		global $connected;
			$query = "SELECT `id`,`username`, `password` FROM `users` WHERE `username`='$username' AND `password`='$md5_password'";
			$result = mysqli_query($connected,$query);
			
			if($result)
				{
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     				echo 'Entering result.<br>';
      			$check_rows = mysqli_num_rows($result);
				if( $check_rows == 1) { 
					
					$id = $row['id'];
					echo '<br> afdasd   '.$id;
					echo '<br> check rows = 1 .<br>';

					$_SESSION['user_id'] = $id;
					header('Location: logging_INDEX.php');
				}else if( $check_rows == 0) {
					echo 'check rows = 0.<br>';
					echo '<br>Invalid password/username combination';
				}
			}
 			}else{
		echo'<br>You must supply a password or username. ';
		}
		}else {
	echo '<br>You are not logged in<br>';
	}

?>

<form action="<?php echo $current_file; ?>" method="POST">
Username: <input type="text" id = "username" name="username">
Password: <input type="password" id = "passw" name="passw">
<input type="submit" id = "submit" name="submit" value="Log In">
</form>
