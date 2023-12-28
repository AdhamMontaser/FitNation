<?php
$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newpass = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];

    if ($newpass != $confirmpass) {
        $flag = "33";
        header("Location: forgetpassword3.php?flag=$flag"); // Sending flag as a query parameter
        exit(); // Add exit() after header to prevent further execution
    } else {
        session_start();

        $stmt = $con->prepare('UPDATE user SET Password = ? WHERE Email = ?');
        $hashed_password = crypt($newpass, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $hashed_password, $_SESSION['email']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("location: forgetpassword4.html?flag=success"); // Redirect with success flag
            exit(); // Add exit() after header to prevent further execution
        } else {
            header("location: forgetpassword4.html?flag=fail"); // Redirect with fail flag
            exit(); // Add exit() after header to prevent further execution
        }
    }
}
