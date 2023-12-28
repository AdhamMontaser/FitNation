<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/forgetpassword.css" />
  <title>Forget Password</title>
</head>

<body class="bg">
  <div class="container">
    <img src="assets/icons/resetpass.png" alt="Reset Password Icon" />
    <h1>Forget Password</h1>
    <p>Provide your account's email to reset your password</p>
    <form action="fpass.php" method="POST">
      <div class="email-input">
        <input id="email" type="email" name="email" placeholder="Email" required />
      </div>
      <div id="fpass"></div>
      <input id="login-button" type="submit" name="login" value="Next" />
    </form>
  </div>
</body>

</html>