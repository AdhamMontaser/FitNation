<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/login.css" />
    <script>
      const text = "Welcome Back !";
      const delay = 100;

<<<<<<< Updated upstream
      function typeWriter(text, i) {
        const element = document.getElementById("typed-text");
        if (i < text.length) {
          element.innerHTML += text.charAt(i);
          i++;
          setTimeout(function () {
            typeWriter(text, i);
          }, delay);
        } else {
          element.style.borderRight = "none";
        }
      }
=======
<head>
  <link id="css" rel="stylesheet" href="css/login.css" type="text/css"/>
  <script>
    const text = "Welcome Back !";
    const delay = 100;
>>>>>>> Stashed changes

      window.onload = function () {
        typeWriter(text, 0);
      };
    </script>
    <title>Login</title>
  </head>

  <?php 
  $uname = $pass = "";
  $firstRowEr = $secondRowEr = "";
  $isValid = "-1";
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      
    if (empty($_POST['uname'])){
      $firstRowEr = "Field required";
      $isValid = "0";
    }else{
      $uname = $_POST["uname"];
      if(!preg_match("/^[a-zA-Z0-9-_].{1,30}$/",$uname)){
        $firstRowEr = "at most 30 characters"; 
        $isValid = "0";
      } else{  
        $isValid = "2";
      }
    }

<<<<<<< Updated upstream
    if(empty($_POST["pass"])){
      $secondRowEr = "Field required";
      $isValid = "0";
    }else{
      $pass = $_POST["pass"];
      if(!preg_match("/^[a-zA-Z0-9-_]{1,30}$/",$pass)){
        $secondRowEr = "Password must be at most 30 characters";
        $isValid = "0";
      }else{
        $isValid = "2";
      }
    }

    function cleanData($data) {
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

      <form action="" method ="post" id="loginForm">
        <input
          id="username"
          type="text"
          name="uname"
          placeholder="Enter Username..."
          value="<?php echo $uname; ?>"
        />
        <br>
        <span class="error"><?php echo $firstRowEr; ?></span>
        <br>

        <input
          id="password"
          type="password"
          name="pass"
          placeholder="Password"
          value="<?php echo $pass; ?>"
        />

        <br>
        <span class="error"><?php echo $secondRowEr; ?></span>

        <p>
          <input id="rememberme" type="checkbox" name="rememberme" checked />
          <label id="rememberme">Remember me</label>
        </p>

        <?php if($isValid == "-1") { ?>
          <button id="login-button" name="login">Validate</button>
        <?php }else if($isValid == "0"){ ?>
          <span class="error" id="thirdRowEr"><?php echo "Something went wrong "; ?></span><br>
          <button id="login-button" name="login">Validate</button>
        <?php }else if($isValid == "2"){ ?>
          <span class="error" id="thirdRowEr"><?php echo "All good "; ?></span><br>
          <span class="error" id="checkUser"><?php echo ""; ?></span><br>
          <button id="login-button" name="login">Login</button>
        <?php } ?>
        
        <hr id="hline" />
        <a id="forgetpass" href="forgetpassword.html">Forget password?</a>
        <a id="createacc" href="signup.php">Create account!</a>
      </form>
    </div>

    <script>

      const isValid = <?php echo $isValid ?>;
      document.getElementById("login-button").onclick = function(){
        if(isValid == "0"){
          const form = document.getElementById('loginForm');
          form.action = "login.php";
          document.form.submit();
        }else if(isValid == "2"){
          const form = document.getElementById('loginForm');
          form.action = "checkUser.php";
          document.form.submit();
        }
      }
    </script>
  </body>
</html>
=======
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
>>>>>>> Stashed changes
