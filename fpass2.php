<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'fitnation');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $flag="";
    $code_entered = $_POST['code'];
    $current_time = time();
    $time_difference = abs($current_time - $_SESSION['time1']);

    if($code_entered==$_SESSION['code']){

        if($time_difference<20){             //should be 300 if you want code expires after 5 mins
        header("location: forgetpassword3.php");
        }
        else{
           

            include "forgetpassword2.php";
            $flag="66";
        }


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
    if(flag=="66")
    document.getElementById("fpass2").innerHTML = "code expired. <a href='sendcodeagain.php'>Send again</a>";
</script>