<?php
// include 'config.php'; 

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $usname = $_POST['usname'];
//     $fname = $_POST['fname'];
//     $sname = $_POST['lname'];
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

$con = new mysqli('localhost', 'root', '', 'fitnation');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag="";
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
        if($stmt->num_rows > 0){
            $flag="44";
            include "../../signup.php";
            
        }
        elseif ($stmt2->num_rows > 0) {
            $flag="55";
            include "../../signup.php";
        }
        
        
    } 
    else {
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
?>
<script>
    const flag = <?php echo $flag ?>;
  if(flag=="44")
    document.getElementById("insertdata").innerHTML = "User already exist";
else if(flag=="55")
document.getElementById("insertdata").innerHTML = "E-mail already exist";

</script>