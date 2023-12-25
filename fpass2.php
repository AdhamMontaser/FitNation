<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'fitnation');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $code_entered = $_POST['code'];

    if($code_entered==$_SESSION['code']){
        header("location: forgetpassword3.html");
    }

    else{
      
         include "forgetpassword2.php";
         $flag="6";
    }
    


}



?>
<script>
    const flag = <?php echo $flag ?>;
    if(flag=="6")
    document.getElementById("fpass2").innerHTML = "code is not correct";
</script>