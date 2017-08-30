<?php
require_once 'core.inc.php';
require_once 'JOIN.php';



if(loggedin()){
	$firstname =strtoupper(@getuserfield('firstname')); 
	$surname = strtoupper(@getuserfield('surname'));

	echo ' You\'re logged in, <strong> '.$firstname.' '.$surname.'.</strong>   <a href="logout.php">LOG OUT</a> ';
	
}else{
 include 'logging_form.php';
}

 