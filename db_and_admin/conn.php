<?php
require 'connecting.php';

echo 'OK<br>';



$query2 = "SELECT `name`, `age` FROM `sample` WHERE `age`>18 ORDER BY `id` DESC";

if($query_run2 = mysqli_query($connected, $query2) ){
	echo '<br>Query <strong>Success</strong>.';


	while($q_row2 = mysqli_fetch_assoc($query_run2)) {
		$name2 = $q_row2['name'];
		$age2 = $q_row2['age'];

		echo '<br>'.$name2.' ( '.$age2.' )'; 
	}


	}else {

	echo '<br><br>query <strong>Failed</strong>';
}




?>