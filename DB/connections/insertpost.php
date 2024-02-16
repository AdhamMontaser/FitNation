<?php //insertpost.php
session_start();

$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["textarea"];
    $date = (string)date("d-m-Y");
    $user = $_SESSION['user']['Username'];

    $sql = "INSERT INTO posts (UserPosted, Time, Text) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);

    $stmt->bind_param("sss", $user, $date, $text);
    if ($stmt->execute()) {
        header("location: ../../blog.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$stmt->close();
