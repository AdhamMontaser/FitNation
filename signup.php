<?php
// include 'config.php'; 

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $usname = $_POST['usname'];
//     $fname = $_POST['fname'];
//     $sname = $_POST['sname'];
//     $number = $_POST['number'];
//     $email = $_POST['email'];
//     $pass = $_POST['pass'];
//     $confirmpass = $_POST['confirmpass'];

//     $ID = null;

    





    
   
//     $hashed_password = crypt($pass, PASSWORD_DEFAULT);

//     $sql = "INSERT INTO user (ID,First_Name,Last_Name,Username,Password,Email,Phone_Number) VALUES ('$ID','$fname' ,'$sname','$usname','$hashed_password','$email','$number')";

//     if ($con->query($sql) === TRUE) {
//         echo "User registered successfully!";  //.....
        
//     } else {
//         echo "Error: " . $sql . "<br>" . $con->error;
//     }
// }




//this is more optimized preventable sql injection using prepared stmt and mysqli_real_escape_string 
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usname = mysqli_real_escape_string($con, $_POST['usname']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $sname = mysqli_real_escape_string($con, $_POST['sname']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];

    $ID = null;

    
    if ($pass !== $confirmpass) {
        echo "Passwords do not match!";
        exit(); 
    }

  
    $hashed_password = crypt($pass, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO user (ID, First_Name, Last_Name, Username, Password, Email, Phone_Number) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    
    $stmt->bind_param("issssss", $ID, $fname, $sname, $usname, $hashed_password, $email, $number);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    
    $stmt->close();
}


?>
