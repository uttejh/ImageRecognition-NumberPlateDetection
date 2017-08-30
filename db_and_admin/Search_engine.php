<?php
require 'JOIN.php';

	if( isset( $_POST['search_name'] ) ){
	 $search_name = $_POST['search_name'];

	 		if(!empty($search_name)){

	 			if(strlen($search_name) >= 3){
	 				global $connected;
	 				$count = 0;
					$q = "SELECT `name` from `owners` WHERE `name` LIKE '%".mysqli_real_escape_string($connected,$search_name)."%'";
	 				$q_run = mysqli_query($connected, $q);

	 				if(!@mysqli_num_rows($q_run)>=1){
	 				
	 					echo '<br>No results found!'; }
	 				else{
	 					while($q_row = mysqli_fetch_assoc($q_run)){
	 						echo $q_row['name'].'<br>';
	 						$count++;}
	 					echo'<br><strong>'.$count.' results found!</strong>';}
				}else {
					echo '<br>Must be 3 characters or more ';}
			}
		}		



?>

<form action="Search_engine.php" method="POST">
	Name: <input type="text" name = "search_name"> <input type="submit" name="submit" value="submit">
</form>