<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/signup.css" type="text/css" />
</head>

<?php
$uname = $fname = $lname = $email = $number = $pass = $confirmpass = "";
$firstRowEr = $secondRowEr = $thirdRowEr = $fourthRowEr = "";
$isValid = "0";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (empty($_POST['uname'])) {
    $firstRowEr = "Field required";
    $isValid = "0";
  } else {
    $uname = clean($_POST["uname"]);
    if (!preg_match("/^[a-zA-Z0-9-_].{1,30}$/", $uname)) {
      $firstRowEr = "at most 30 characters or digits and could include - or _";
      $isValid = "0";
    } else {
      $isValid = "1";
    }
  }

  if (empty($_POST['fname']) || empty($_POST["lname"])) {
    $secondRowEr = "Fields required";
    $isValid = "0";
  } else {
    $fname = clean($_POST["fname"]);
    $lname = clean($_POST["lname"]);
    if (!preg_match("/^[A-Za-z]{1,30}$/", $fname) || !preg_match("/^[A-Za-z]{1,30}$/", $lname)) {
      $secondRowEr = "First and last name must be at most 30 characters only";
      $isValid = "0";
    } else {
      $isValid = "1";
    }
  }

  if (empty($_POST['number'])) {
    $thirdRowEr = "Field required";
    $isValid = "0";
  } else {
    $number = clean($_POST["number"]);
    if (!preg_match("/^[0-9+].{1,15}$/", $number)) {
      $thirdRowEr = "Phone number must be in digits";
      $isValid = "0";
    } else {
      $isValid = "1";
    }
  }

  if (empty($_POST['email'])) {
    $thirdRowEr = "Field required";
    $isValid = "0";
  } else {
    $email = $_POST["email"];
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
      $thirdRowEr = "Incorrect email format";
      $isValid = "0";
    } else {
      $isValid = "1";
    }
  }

  if (empty($_POST["pass"]) | empty($_POST["confirmpass"])) {
    $fourthRowEr = "Field required";
    $isValid = "0";
  } else {
    $pass = $_POST["pass"];
    $confirmpass = $_POST["confirmpass"];
    if (!preg_match("/^[a-zA-Z0-9-_]{1,30}$/", $pass)) {
      $secondRowEr = "Password must be at most 30 characters";
      $isValid = "0";
    } else if ($pass != $confirmpass) {
      $fourthRowEr = "Passwords don't match";
      $isValid = "0";
    } else {
      $isValid = "1";
    }
  }
}
function clean($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<body>
  <div id="divForm">
    <form action="" method="post" id="signup-form">

      <div>
        <img id="h1Up" src="assets/img/logo.png" alt="" />
      </div>
      <br />

      <input type="text" name="uname" id="username" class="input" placeholder="Username" value="<?php echo $uname; ?>" />
      <br>
      <span class="error"><?php echo $firstRowEr; ?></span>
      <br>

      <input type="text" name="fname" class="input" placeholder="First Name" value="<?php echo $fname; ?>" />

      <input type="text" name="lname" class="input" placeholder="Last Name" value="<?php echo $lname; ?>" />
      <br>
      <span class="error"><?php echo $secondRowEr; ?></span>
      <br>

      <input type="tel" name="number" class="input" placeholder="Phone number" value="<?php echo $number; ?>" />

      <input type="text" name="email" class="input" placeholder="Email" value="<?php echo $email; ?>" />
      <br>
      <span class="error" id="secondRowEr"><?php echo $thirdRowEr; ?></span>
      <br>

      <div class="passDiv">
        <input type="password" name="pass" id="password" class="inputPass" placeholder="Password" value="<?php echo $pass; ?>" />
        <img src="assets/icons/eye-close.png" id="eye" class="img" />
      </div>

      <div class="ConfrimPassDiv">
        <input type="password" name="confirmpass" id="confirmPassword" class="inputConfirmPass" placeholder="Confirm password" value="<?php echo $confirmpass; ?>" />
        <img src="assets/icons/eye-close.png" id="confirmEye" class="img" />
      </div>

      <div class="error" id="thirdRowEr"><?php echo $fourthRowEr; ?></div>

      <?php if ($isValid == "1") { ?>
        <div class="error" id="thirdRowEr"><?php echo "All good"; ?></div>
      <?php } ?>        
      
      <?php
      session_start();
      if(!empty($_SESSION["userExist"])) { ?>
        <div class="error" id="insertdata">User name already exist</div>
      <?php } else if(!empty($_SESSION["emailExist"])) { ?>
        <div class="error" id="insertdata">Email already exist</div>
      <?php } 
      session_destroy();
      ?>


      <button id="submit">let's go</button><br>
    </form>
  </div>

  <div id="divSignIn">
    <h1 id="h1In">Already have an account!!</h1>
    <a href="login.php" class="btn">SIGN IN</a>
  </div>

  <script>
    const isValid = <?php echo $isValid ?>;

    document.getElementById("submit").onclick = function() {
      if (isValid == "0") {
        const form = document.getElementById('signup-form');
        form.action = "signup.php";
        document.form.submit();
      } else if (isValid == "1") {
        const form = document.getElementById('signup-form');
        form.action = "DB/connections/insertdata.php";
        document.form.submit();
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      let eyeIcon = document.getElementById("eye");
      let password = document.getElementById("password");

      eyeIcon.onclick = function() {
        if (password.type === "password") {
          password.type = "text";
          eyeIcon.src = "assets/icons/eye-open.png";
        } else {
          password.type = "password";
          eyeIcon.src = "assets/icons/eye-close.png";
        }
      };
    });

    document.addEventListener("DOMContentLoaded", function() {
      let confirmEyeIcon = document.getElementById("confirmEye");
      let confirmPassword = document.getElementById("confirmPassword");

      confirmEyeIcon.onclick = function() {
        if (confirmPassword.type === "password") {
          confirmPassword.type = "text";
          confirmEyeIcon.src = "assets/icons/eye-open.png";
        } else {
          confirmPassword.type = "password";
          confirmEyeIcon.src = "assets/icons/eye-close.png";
        }
      };
    });
  </script>
</body>
</html>