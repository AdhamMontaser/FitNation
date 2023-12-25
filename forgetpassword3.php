<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/forgetpassword3.css" />
        <title>Forget Pass 3</title>
    </head>
    <body class="bg">
        <img src="assets/icons/reset.png" alt="">
        <p id="emailsent">New Credentials</p>
    <p id="regardingstat">    
        Your identity has been verified! Set your new password
    </p>
    <form action="fpass3.php" method="POST">
    <div class="pass-input">
        <input
          id="newpass"
          type="password"
          name="newpass"
          placeholder="New Password"
          required
        />
        <br><br>
        <input
          id="newpass"
          type="password"
          name="confirmpass"
          placeholder="Confirm Password"
          required
        />
      </div>
      <div id="fpass3" style = "color: #868686;text-align: center;margin-right:600px;"></div>
      <input id="update-button" type="submit" name="update-button" value="Update" />
    </form>
    <script>
      const flag = <?php echo $flag ?>;
      if(flag=="33")
      document.getElementById("fpass3").innerHTML = "Passwords aren't match";
  </script>

    </body>

</html>
