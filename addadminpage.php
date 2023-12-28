<?php
if (empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) === false) {
  // If the page is accessed directly or not from your domain, deny access
  header('HTTP/1.0 403 Forbidden');
  exit('Access denied.');
}
include('DB/connections/addadmin.php');


$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST['usname'];
  $firstName = $_POST['fname'];
  $secondName = $_POST['sname'];
  $phoneNumber = $_POST['number'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $confirmPassword = $_POST['confirmpass'];

  // Validate if password and confirm password match
  if ($password !== $confirmPassword) {
    $message = 'Passwords do not match.';
  } else {
    // Call the function from addadmin.php to handle form submission and database operations
    $message = addAdmin($username, $firstName, $secondName, $phoneNumber, $email, $password, $con);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>add admin</title>
  <link rel="stylesheet" href="css/adminsignup.css" />
</head>

<body>
  <div>
    <form method="post" id="signup-form">
      <h3 id="add">add admin</h3>
      <input type="text" name="usname" id="username" class="input" placeholder="Username" autofocus required />
      <br />

      <input type="text" name="fname" class="input" placeholder="First Name" required />

      <input type="text" name="sname" class="input" placeholder="Second Name" /><br />

      <input type="tel" name="number" class="input" placeholder="Phone number" pattern="[0-9]*" title="Please enter a valid phone number" required />

      <input type="email" name="email" class="input" placeholder="Email" pattern="[a-z0-9._%+-]{1,20}@[a-z0-9.-]{1,8}\.[a-z]{2,5}" required /><br />

      <input type="password" name="pass" id="password" class="inputPass" placeholder="Password" required />

      <input type="password" name="confirmpass" id="confirmPassword" class="inputConfirmPass" placeholder="Confirm password" required />

      <input type="submit" value="Add" id="sub" /><br />

      <?php echo $message; ?>
    </form>
  </div>
</body>

</html>