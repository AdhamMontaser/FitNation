<?php
$exerciseId = $_POST['exerciseId'];
$user = $_POST['user'];
$flag = $_POST['flag'];
include('../config.php');

if ($flag == 1) {
    // Add to database
    $sql = "INSERT INTO favorite_exercises (username, id) VALUES 
	('$user', '$exerciseId')";
} else {
    // Remove from database
    $sql = "DELETE FROM favorite_exercises WHERE username = '$user' AND id = '$exerciseId'";
}

echo $sql; // Add this line before the mysqli_query to see the generated SQL statement
if (!mysqli_query($con, $sql)) {
    echo 'Error ' . mysqli_error($con);
} else {
    echo 'Operation Successful';
}
