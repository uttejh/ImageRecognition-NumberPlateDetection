<?php
//require 'connecting.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plates";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo 'Ok'
//ob_clean();
//$handle = fopen('out.txt', 'a');
$readall = fopen('out.txt', 'r');
//vardump($readall)
$read = fgets($readall);
print $read;
echo $read;
print "\n\n";
// $query1 = 'SELECT `state` FROM `numbers` WHERE `state`='.$state.';'

// $query2 = 'SELECT `district` FROM `numbers` WHERE `district`='.$district.';'


// $query3 = 'SELECT `letters` FROM `numbers` WHERE `letters`='.$letter.';'


// $query4 = 'SELECT `unique` FROM `numbers` WHERE `unique`='.$unique.';'
//  $query = "SELECT `plate` FROM `numbers` WHERE `plate`='".$read."';";

// if( $query_run = mysqli_query($connected, $query) ){
// 	$q_row = mysqli_fetch_assoc($query_run);

// 	$text = $q_row['plate'];
// 	//var_dump( $q_row);
// 	//print $text;
	
// 	if($text == $read ){
// 		print "Allow.";
//  	}else
//  	{
//  		print "Do not allow.";
//  	}	
// }else {
// 	print "Fatal error";
// }

$sql = "SELECT `plate` FROM `numbers` WHERE `plate`='".$read."';";
$result = $conn->query($sql);
echo $sql;
//echo $result;
if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
    //    echo "Allow";
    // }
	//if($text == $read ){
		print "Allow.";
 	//}

} else {
    echo "Do not allow";
}

?>