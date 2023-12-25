<?php
$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $newpass = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];


    if($newpass != $confirmpass){
        $flag="33";
        include "forgetpassword3.php";
        
    }
    else{
        session_start();

        $stmt = $con ->prepare('UPDATE user SET Password = ? WHERE Email = ?');
        $hashed_password=crypt($newpass, PASSWORD_DEFAULT);
        $stmt ->bind_param("ss", $hashed_password , $_SESSION['email']);
        $stmt -> execute();

    }

    if ($stmt->execute()) {
        header("location: forgetpassword4.html");
    } else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}



?>
