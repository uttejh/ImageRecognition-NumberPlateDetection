<?php
 require 'connecting.php';
?>


<form action="queries1.php" method = "GET">
	<select name="age">
	<option name= "option "value = "18">18 or Less than 18</option>
	<option name = "option" value = "19">Above 18</option>
	</select><br><br>
	<input type="submit" value="submit">

</form>

<?php

if( isset($_GET['name']) && !empty($_GET['name']) ){

$name = strtolower($_GET['name']);
preg_match_all('!\d+!', $str, $matches);
print_r($matches);


if($name = 'above 18' || $name = '10 or under 18'){
	
	$query = " SELECT `name`, `age` FROM `sample` WHERE 'age'<1 ";




} else {
	echo '<br>Enter something';
}



}






?>