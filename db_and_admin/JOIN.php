<?php
$myhost = 'localhost';
$root = 'root';
$pass = '';
$database = 'for_random_test';

$connected = @mysqli_connect($myhost, $root, $pass, $database);

if(!$connected ){
	die(@mysqli_error($connected));
}

?>