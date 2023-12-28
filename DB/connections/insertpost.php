<?php
    session_start();
    // echo $_POST["textarea"];

    $con = new mysqli('localhost', 'root', '', 'fitnation');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["textarea"];
        $imgPath = $_POST["image"];
        $date = (string)date("d-m-Y");
        $user = $_SESSION['user'];

        $sql = "INSERT INTO posts (UserPosted, Time, Text, Image) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        
        $stmt->bind_param("ssss", $user, $date, $text, $imgPath);
        if ($stmt->execute()) {
            header("location: ../../blog.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

    }

    $stmt->close();
?>