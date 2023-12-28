<?php

    // 8alatttt

    
    // $con = new mysqli('localhost', 'root', '', 'fitnation');

    // if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //     $id = (int)$_GET['id'];
    //     $likes = 0;

    //     $stmt = $con->prepare("SELECT Likes FROM posts WHERE Id=?");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $likesQ = $result->fetch_assoc();

    //     if ($result->num_rows > 0) {

    //         $likes = (int)$likesQ['Likes'];
    //         $likes++;

    //         $stmt2 = $con->prepare("UPDATE posts SET Likes = ? WHERE Id = ?");
    //         $stmt2->bind_param("ii", $likes , $id);
    //         if ($stmt2->execute()) {
    //             header("location: ../../blog.php");
    //             echo$likes;
    //         } else {
    //             echo "Error: " . $sql . "<br>" . $con->error;
    //         }    
    //         $stmt2->close();
    //     }

    //     $stmt->close();
    // }

    
?>