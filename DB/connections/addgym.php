<?php

	include ('../config.php');
	
	$sql = "insert into gym (Gym_Name, Address, Phone_Number,latitude,longitude,picname) values 
	('$_POST[gname]', '$_POST[addr]', '$_POST[phone]' , '$_POST[latitude]' , '$_POST[longitude]' , '$_POST[picname]')";
	
	if (! mysqli_query ($con, $sql))
	{
		echo'Error '.mysqli_error($con);
	}else
		echo '<label style="color:black;">'.'1 row added'.'</label>';
	
?>