<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/adlogin.css" />
  <script>
    const text = "Welcome !";
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
  <div>
    <p id="welcome">Welcome !</p>
    <br />

    <form action="" method="post">
      <input id="username" type="text" name="uname" placeholder="Enter Email Address or Username..." />
      <br />
      <br />
      <input id="password" type="password" name="pass" placeholder="Password" />
      <br>
      <br>

      <input id="login-button" type="submit" name="login" value="Login" />
      <hr id="hline" />
    </form>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = new mysqli('localhost', 'root', '', 'fitnation');

    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }

    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    if (!empty($uname) && !empty($password)) {
      $uname = mysqli_real_escape_string($con, $uname);
      $sql = "SELECT * FROM admin WHERE Username=?";

      $stmt = $con->prepare($sql);
      $stmt->bind_param("s", $uname);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password == $user['Password'] && $uname == $user["Username"]) {
          session_start();
          $_SESSION['user'] = $user;
          header("location: admin.php");
        } else {
          $isFound = "1";
          session_start();
          $_SESSION['isFound'] = $isFound;
          header("location: adminlogin.php");
        }
      } else {
        $isFound = "100";
        session_start();
        $_SESSION['isFound'] = $isFound;
        header("location: adminlogin.php");
      }
      $stmt->close();
    } else {
      $isFound = "-1";
      session_start();
      $_SESSION['isFound'] = $isFound;
      header("location: adminlogin.php");
    }
    $con->close();
  }
  ?>
</body>

</html>