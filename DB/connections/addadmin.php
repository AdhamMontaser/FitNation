<?php

	include ('../config.php');
	
	$sql = "insert into admin(Username,First_Name,Second_Name,Phone_Number,Email,Password) values 
	('$_POST[usname]', '$_POST[fname]', '$_POST[sname]', $_POST[number], '$_POST[email]', '$_POST[pass]')";
	
	if (! mysqli_query ($con, $sql))
	{
		echo 'Error '.mysqli_error($con);
	}else
		echo '1 row added';
	
?>
