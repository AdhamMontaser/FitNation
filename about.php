<!DOCTYPE html>
<?php
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}
?>
<html>

<head>
  <style>
    body {
      background-image: url("assets/img/login_wallpaper.png");
      color: grey
    }

    table {
      margin: auto;

      padding: 5%;
      text-align: center;
    }

    td {
      width: 30%;
      padding: 5%
    }

    img {
      border: grey 2px solid;
    }

    th {
      color: white;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 18px;
      font-weight: 15%;
      text-transform: uppercase;
      letter-spacing: 2px;
      word-spacing: 5px;
    }
  </style>
  <link rel="stylesheet" href="css/nav_bar.css" />
</head>

<body>
  <nav>
    <div class="navigation-bar">
      <div class="navigation-bar-logo">
        <a href="index.php">
          <img src="assets/img/logo.png" alt="logo" />
        </a>
      </div>
      <ul class="navigation-bar-options">
        <li><a href="index.php">home</a></li>
        <li><a href="about.html">about</a></li>
        <li><a href="blog.php">blog</a></li>
        <li><a href="">contact</a></li>
      </ul>
      <?php
      session_start();
      if (isset($_SESSION['user'])) {
        echo '<a href="logout.php"><button class="sign-in-button">sign out</button></a>';
      } else {
        echo '<a href="login.php"><button class="sign-in-button">sign in</button></a>';
      }
      ?>
      <!-- <a href="login.php">
              <button class="sign-in-button">sign in</button>
            </a> -->
    </div>
  </nav>
  <div>
    <table>
      <tr>
        <th colspan="2">
          <h2>meet our team</h2>
        </th>
      </tr>
      <tr>
        <td>
          <img src="assets\img\adham.jpg" width="65%">
          <h3>Name: Adham Montaser</h3>
          <h3>Age: 20</h3>
        </td>
        <td>
          <img src="assets\img\omda.jpg" width="40%">
          <h3>Name: Mohamed Emad</h3>
          <h3>Age: 20</h3>
        </td>
      </tr>
      <tr>
        <td>
          <img src="assets\img\mostafa.jpg" width="65%">
          <h3>Name: Mostafa Nabil</h3>
          <h3>Age: 20</h3>
        </td>
        <td>
          <img src="">
          <h3>Name: Ali Hesham</h3>
          <h3>Age: 21</h3>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h3>
            klam 3an el website...!!
          </h3>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>