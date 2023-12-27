<?php


$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];
    $ID = null;

    $hashed_password = crypt($pass, PASSWORD_DEFAULT);

    $stmt = $con->prepare('select Username from user where Username=?');

    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $stmt->store_result();

    $stmt2 = $con->prepare('SELECT Email FROM user WHERE Email = ?');
    $stmt2->bind_param("s", $email);
    $stmt2->execute();
    $stmt2->store_result();



    if ($stmt->num_rows > 0 || $stmt2->num_rows > 0) {
        if ($stmt->num_rows > 0) {
            session_start();
            $_SESSION["userExist"] = "userExist";
            header("location: ../../signup.php");
        } elseif ($stmt2->num_rows > 0) {
            session_start();
            $_SESSION["emailExist"] = "emailExist";
            header("location: ../../signup.php");
        }
    } else {
        $sql = "INSERT INTO user (ID, First_Name, Last_Name, Username, Password, Email, Phone_Number) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        $stmt->bind_param("issssss", $ID, $fname, $lname, $uname, $hashed_password, $email, $number);
        if ($stmt->execute()) {
            header("location: ../../login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}

$stmt->close();
