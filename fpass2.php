<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = "";
    $code_entered = $_POST['code'];
    $current_time = time();
    $time_difference = abs($current_time - $_SESSION['time1']);

    if ($code_entered == $_SESSION['code']) {
        if ($time_difference < 20) {
            header("Location: forgetpassword3.php");
            exit();
        } else {
            $flag = "66"; // Code expired flag
            header("Location: forgetpassword2.php?flag=$flag");
            exit();
        }
    } else {
        $flag = "6"; // Incorrect code flag
        header("Location: forgetpassword2.php?flag=$flag");
        exit();
    }
}
