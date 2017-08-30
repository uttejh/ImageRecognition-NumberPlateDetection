<?php
ob_start();
@session_start();

require 'JOIN.php';

$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
	$http_referer =$_SERVER['HTTP_REFERER'];
}

function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ 
		return true;
	} else {
		return false;
	}
}

function getuserfield($field){
	global $connected;

	$q = "SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
	$q_run = mysqli_query($connected,$q);
	
	if($q_run){
		$row = mysqli_fetch_array($q_run,MYSQLI_NUM);
		$id = $row[0];

		if($id == NULL){
			echo '<br>not entering if $field ';
			printf ("%s\n",$row[0]);
	
		}else{
			return $id;
		}
	}else{
		echo'<br>Not entering $q_run';
		echo '<br>'.$_SESSION['user_id'];
	}
}

?>