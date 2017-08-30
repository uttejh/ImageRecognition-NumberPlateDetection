<?php

require 'connecting.php';

$user_ip = $_SERVER['REMOTE_ADDR'];
echo $user_ip.'<br><br><br><br>';

function ip_exists($ip){
	global $user_ip;
	global $connected;
	
	$q = "SELECT `ip` FROM `hits_ip` WHERE `ip`= '$user_ip'";
	$q_run = mysqli_query( $connected , $q);
	$q_num = mysqli_num_rows($q_run);

	if($q_num == 0){
		return false;
	} else if ($q_num >=1){
		return true;
	}

}

function ip_add($ip){
	global $connected;
	$query1 ="INSERT INTO hits_ip (ip) VALUES('$ip')";
	$query_run1 = mysqli_query($connected, $query1);
	if($query_run1){
		echo '<br><br>Works';
	}
}

function update_count()
{
    global $connected;

    $query = "SELECT `count` FROM `hits_count`";  

    $query_run = mysqli_query($connected,$query);
    
    if($query_run)
    {
        $count = mysqli_fetch_row($query_run); //parameters are: result, row, field
        $count_inc = $count[0] + 1;

       $query_update = "UPDATE `hits_count` SET `count` = $count_inc ";
		if(mysqli_query($connected, $query_update)){
		echo '<br><br>OK incremented';	}
    }
    else{
        die(mysqli_error());   
    }
}


if(ip_exists($user_ip)){
	echo '<br>IP exits already';
} else{
	echo '<br>New IP. New HIT';
		update_count();
		ip_add($user_ip);
}

?>