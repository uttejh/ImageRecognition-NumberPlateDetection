<hr>
<form action="SELECTBY.php" method="GET">

<h3>Choose a food type Monsiour !<h3>
<select name="uh">
<option value="u">Unhealthy</option>
<option value="h">healthy</option>
 </select><br><br>
 
 <input type="Submit" value="Submit">
 
 
</form>

<hr>

<?php

if (isset($_GET['uh'])&&!empty($_GET['uh'])){


	$uh = strtolower($_GET['uh']);

	if($uh=='u' ||  $uh =='h'){
	//link to your database
			$aVar = mysqli_connect('localhost','root','','a_sample');

//MySQL filtering
 			$query = "SELECT `food`, `calories` FROM `food` WHERE `healthy_unhealthy`='$uh'  ORDER BY `id` DESC";

 			if ($query_run = mysqli_query($aVar,$query)){
	 
	 //cheking if the our $query is met, if not then report that a certain condition is obstructing
				 if (mysqli_num_rows($query_run)==NULL){
		 				echo 'Unfortunately, what you\'re searching for couldn\'t be found anywehre in the database.<br>Perhaps you can consider refiltering,... okay?';
		 
	 			 }else {
	 				while ($query_row = mysqli_fetch_assoc($query_run)){
				 	$food = $query_row['food'];
		 			$calories = $query_row['calories'];

		 			echo $food.' has '.$calories. ' calories.<br>';
	 					}
	 		}
     }else{
	 echo ' Query Failed. ';
	 
 } 

}
}
?>