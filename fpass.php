<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';  
require 'phpmailer/src/phpMailer.php';
require 'phpmailer/src/SMTP.php';



$con = new mysqli('localhost', 'root', '', 'fitnation');



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $stmt = $con ->prepare('SELECT Email FROM user WHERE Email = ?');
    $stmt ->bind_param("s", $email);

    $stmt -> execute();

    $stmt -> store_result();


    if($stmt->num_rows > 0){  
        $code = random_int(100000, 999999);




        $mail = new PHPMailer(true);

        $mail -> isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail ->SMTPAuth = true;
        $mail ->Username='fitnation400@gmail.com';
        $mail ->Password = 'ahrndlrzelpadmog';
        $mail ->SMTPSecure = 'ssl';
        $mail ->Port = 465;

        $mail ->setFrom('fitnation400@gmail.com');

        $mail ->addAddress($email);

        $mail -> isHTML(true);

        $mail -> Subject = 'FitNation password recovery';
        $mail -> Body = 'This is your code to recover your password [ ' .$code .' ] , please note that the code expires after 5 minutes.';

        $mail ->send();






        
        if ($stmt->execute()) {
            session_start();
            $_SESSION['email'] =$email;
            $_SESSION['code'] =$code;
            header("location: forgetpassword2.php");
        } else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }

    }
    else{
       
        include "forgetpassword.php";
        $flag="11";
        

    }







}


?>
<script>
    const flag = <?php echo $flag ?>;
    if(flag=="11")
    document.getElementById("fpass").innerHTML = "E-mail not found";
</script>
