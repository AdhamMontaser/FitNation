<?php
$username = $_SESSION['user']['Username'];
include('DB/config.php');
$sql = "SELECT * FROM favorite_exercises WHERE username = '$username'";

$favoriteExercises = mysqli_query($con, $sql); // Execute the SQL query
if ($favoriteExercises) {
    $favoriteExerciseIds = [];
    while ($row = mysqli_fetch_assoc($favoriteExercises)) {
        $favoriteExerciseIds[] = $row['id'];
    }
} else {
    echo "Error fetching favorite exercises: " . mysqli_error($con);
}
