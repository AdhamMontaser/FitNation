<?php
// include 'config.php'; 

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $uname = $_POST['uname'];
//     $password = $_POST['pass'];



  
//     if (!empty($uname) && !empty($password)) {
//         $sql = "SELECT * FROM user WHERE Username='$uname'";
//         $result = $con->query($sql);

//         if ($result->num_rows > 0) {
//             $user = $result->fetch_assoc();
           
//             if (password_verify($password, $user['Password'])) {
            
//                 echo "Login successful!";
            
//             } else {
               
//                 echo "Incorrect password!";
//             }
//         } else {
          
//             echo "Username not found!";
//         }
//     } else {
       
//         echo "Username and password are required!";
//     }
// }




//this is more optimized preventable sql injection using prepared stmt and mysqli_real_escape_string
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    if (!empty($uname) && !empty($password)) {
        $uname = mysqli_real_escape_string($con, $uname);

       
        $sql = "SELECT * FROM user WHERE Username=?";
        $stmt = $con->prepare($sql);

       
        $stmt->bind_param("s", $uname);
        $stmt->execute();

        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
           
            if (password_verify($password, $user['Password'])) {
                echo "Login successful!";
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "Username not found!";
        }

        
        $stmt->close();
    } else {
        echo "Username and password are required!";
    }
}
?>


