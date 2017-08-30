k<?php
$mysql_host = 'localhost';
$mysql_user = 'root'; //go to home in phpmyadmin and check user accounts for all the priviledge access of different users
$mysql_pass = "";

$connection_error = 'Couldnt connect';

$mysql_db = 'plates';

$connected = @mysqli_connect($mysql_host , $mysql_user, $mysql_pass , $mysql_db);

if( !$connected ){
 die($connection_error);
 print "Error";
} else {
//echo 'Connected<br><br><br><br>';
}

// will only be connected if user has all priviledges or there is no mention of 4th argument in mysqli_connect() function, since here if Any user connects to mysql he wont have priviledge to access its databases

?>

