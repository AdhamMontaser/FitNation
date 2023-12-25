<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/login.css" />
  <script>
    const text = "Welcome Back !";
    const delay = 100;

    function typeWriter(text, i) {
      const element = document.getElementById("typed-text");
      if (i < text.length) {
        element.innerHTML += text.charAt(i);
        i++;
        setTimeout(function() {
          typeWriter(text, i);
        }, delay);
      } else {
        element.style.borderRight = "none";
      }
    }

    window.onload = function() {
      typeWriter(text, 0);
    };
  </script>
  <title>Login</title>
</head>

<?php
$uname = $pass = "";
$firstRowEr = $secondRowEr = "";
$isValid = "-1";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (empty($_POST['uname'])) {
    $firstRowEr = "Field required";
    $isValid = "0";
  } else {
    $uname = $_POST["uname"];
    if (!preg_match("/^[a-zA-Z0-9-_].{1,30}$/", $uname)) {
      $firstRowEr = "at most 30 characters";
      $isValid = "0";
    } else {
      $isValid = "2";
    }
  }

  if (empty($_POST["pass"])) {
    $secondRowEr = "Field required";
    $isValid = "0";
  } else {
    $pass = $_POST["pass"];
    if (!preg_match("/^[a-zA-Z0-9-_]{1,30}$/", $pass)) {
      $secondRowEr = "Password must be at most 30 characters";
      $isValid = "0";
    } else {
      $isValid = "2";
    }
  }

  function cleanData($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
?>

<body class="bg">
  <div class="div1">
    <p id="welcomeback">Welcome Back !</p>
    <br />

    <form action="" method="post" id="loginForm">
      <input id="username" type="text" name="uname" placeholder="Enter Username..." value="<?php echo $uname; ?>" />
      <br>
      <span class="error"><?php echo $firstRowEr; ?></span>
      <br>

      <input id="password" type="password" name="pass" placeholder="Password" value="<?php echo $pass; ?>" />

      <br>
      <span class="error"><?php echo $secondRowEr; ?></span>

      <p>
        <input id="rememberme" type="checkbox" name="rememberme" checked />
        <label id="rememberme">Remember me</label>
      </p>

      <?php if ($isValid == "-1") { ?>
        <button id="login-button" name="login">Validate</button>
      <?php } else if ($isValid == "0") { ?>
        <span class="error" id="thirdRowEr"><?php echo "Something went wrong "; ?></span><br>
        <button id="login-button" name="login">Validate</button>
      <?php } else if ($isValid == "2") { ?>
        <span class="error" id="thirdRowEr"><?php echo "All good "; ?></span><br>
        <span class="error" id="checkUser"><?php echo ""; ?></span><br>
        <button id="login-button" name="login">Login</button>
      <?php } ?>

      <hr id="hline" />
      <a id="forgetpass" href="forgetpassword.php">Forget password?</a>
      <a id="createacc" href="signup.php">Create account!</a>
    </form>
  </div>

  <script>
    const isValid = <?php echo $isValid ?>;
    document.getElementById("login-button").onclick = function() {
      if (isValid == "0") {
        const form = document.getElementById('loginForm');
        form.action = "login.php";
        document.form.submit();
      } else if (isValid == "2") {
        const form = document.getElementById('loginForm');
        form.action = "DB/connections/checkUser.php";
        document.form.submit();
      }
    }
  </script>
</body>

</html>