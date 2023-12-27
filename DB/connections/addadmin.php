<?php
if (empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) === false) {
	// If the page is accessed directly or not from your domain, deny access
	header('HTTP/1.0 403 Forbidden');
	exit('Access denied.');
}
include('DB/config.php');

function addAdmin($username, $firstName, $secondName, $phoneNumber, $email, $password, $con)
{
	// Check if username or email already exists in the database
	$check_query = "SELECT * FROM admin WHERE Username = '$username' OR Email = '$email'";
	$check_result = mysqli_query($con, $check_query);

	if (mysqli_num_rows($check_result) > 0) {
		return 'Username or Email already exists in the database.';
	} else {
		// Insert new admin into the database
		$sql = "INSERT INTO admin (Username, First_Name, Second_Name, Phone_Number, Email, Password) VALUES 
        ('$username', '$firstName', '$secondName', $phoneNumber, '$email', '$password')";

		if (!mysqli_query($con, $sql)) {
			return 'Error ' . mysqli_error($con);
		} else {
			return '1 row added';
		}
	}
}
