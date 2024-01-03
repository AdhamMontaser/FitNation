<?php
include('DB/config.php');

// Assuming $username and $score are the values you want to check or add
$username = $_SESSION['user']['Username'];
$score = $_SESSION['newScore'];

// Check if the username exists in the database
$query = "SELECT * FROM score_board WHERE Username = '$username'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Username exists, check if the score is less than the new score
    $row = mysqli_fetch_assoc($result);
    $currentScore = $row['score'];

    if ($score > $currentScore) {
        // Update the score if the new score is higher
        $updateQuery = "UPDATE score_board SET score = $score WHERE Username = '$username'";
        mysqli_query($connection, $updateQuery);
        echo "Score updated successfully!";
    } else {
        // Keep the score the same
        echo "Score remains unchanged.";
    }
} else {
    // Username doesn't exist, add the username and score
    $insertQuery = "INSERT INTO score_board (Username, score) VALUES ('$username', $score)";
    mysqli_query($connection, $insertQuery);
    echo "Username and score added!";
}

mysqli_close($connection);
