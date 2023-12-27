<!DOCTYPE html>
<html>

<head>
  <link id="css" rel="stylesheet" href="css/login.css" type="text/css"/>
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

<body class="bg">
  <div class="div1">
    <p id="welcomeback">Welcome Back !</p>
    <br />

    <form action="DB/connections/checkUser.php" method="post" id="loginForm">
      <input id="username" type="text" name="uname" placeholder="Enter Username..."/>

      <input id="password" type="password" name="pass" placeholder="Password"/>

      <p>
        <input id="rememberme" type="checkbox" name="rememberme" checked />
        <label id="rememberme">Remember me</label>
      </p>

      <?php 

        session_start();
        if(!empty($_SESSION['isFound'])){
          $isFound = $_SESSION['isFound'];
          if ($_SESSION['isFound'] == "100") {?>
            <span class="error" id="checkUser">User not found. Try signing up</span><br>
          <?php }else if($_SESSION['isFound'] == "-1") { ?> 
            <span class="error" id="checkUser">Fields required</span><br>
          <?php }else if($_SESSION['isFound'] == "1") { ?> 
            <span class="error" id="checkUser">Username or Password are incorrect</span><br>
          <?php }
        }
        session_destroy();
          
        ?>

      <br>
      <button id="login-button" name="login">Login</button>

      <hr id="hline" />
      <a id="forgetpass" href="forgetpassword.php">Forget password?</a>
      <a id="createacc" href="signup.php">Create account!</a>
    </form>
  </div>

</body>
</html>