<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/forgetpassword2.css" />
  <title>Forget Password</title>
</head>

<body class="bg">
  <div class="container">
    <img src="assets/icons/sent.png" alt="">
    <p id="emailsent">E-mail Sent</p>
    <p id="regardingstat">
      The e-mail has been sent to <?php echo $_SESSION['email']; ?>. Please provide the code contained within the e-mail
    </p>
    <form action="fpass2.php" method="POST">
      <div class="code-input">
        <input id="code" type="text" name="code" placeholder="Enter the code" required />
      </div>
      <div id="fpass2" style="color: #868686; text-align: center;"></div>
      <input id="reset-button" type="submit" name="reset-button" value="Next" />
    </form>
  </div>
</body>

</html>