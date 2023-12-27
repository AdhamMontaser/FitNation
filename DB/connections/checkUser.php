<?php

$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    // $isFound = "-1";

    if (!empty($uname) && !empty($password)) {

        $uname = mysqli_real_escape_string($con, $uname);


        $sql = "SELECT * FROM user WHERE Username=?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['Password']) && $uname == $user["Username"]) {
                session_start();
                $_SESSION['user'] = $user;
                header("location: ../../index.php");
            } else {
                $isFound = "1";
                session_start();
                $_SESSION['isFound'] = $isFound;
                header("location: ../../login.php");
            }
        } else {
            $isFound = "100";
            session_start();
            $_SESSION['isFound'] = $isFound;
            header("location: ../../login.php");
        }
        $stmt->close();
    } else {
        $isFound = "-1";
        session_start();
        $_SESSION['isFound'] = $isFound;
        header("location: ../../login.php");
    }
}
