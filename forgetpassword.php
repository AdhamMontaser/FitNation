<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/forgetpassword.css" />
  <title>Forget Pass</title>
</head>

<body class="bg">
  <img src="assets/icons/resetpass.png" alt="" />
  <p id="forgetpass">Forget Password</p>
  <p id="providestat">
    Provide your account's email for which you want to reset your password
  </p>
  <form action="fpass.php" method="POST">
    <div class="email-input">
      <input id="email" type="email" name="email" placeholder="Email" required />
    </div>
    <br>
    <div id="fpass" style="color: #868686;text-align: center;margin-right:600px;"></div>
    <input id="login-button" type="submit" name="login" value="Next" />
  </form>
</body>

</html>