<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';  
require 'phpmailer/src/phpMailer.php';
require 'phpmailer/src/SMTP.php';
$con = new mysqli('localhost', 'root', '', 'fitnation');


$code = random_int(100000, 999999);
$mail = new PHPMailer(true);

$mail -> isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail ->SMTPAuth = true;
$mail ->Username='fitnation400@gmail.com';
$mail ->Password = 'ahrndlrzelpadmog';
$mail ->SMTPSecure = 'ssl';
$mail ->Port = 465;

$mail ->setFrom('fitnation400@gmail.com');

$mail ->addAddress($_SESSION['email']);

$mail -> isHTML(true);

$mail -> Subject = 'FitNation password recovery';
$mail -> Body = 'This is your code to recover your password [ ' .$code .' ] , please note that the code expires after 1 minute.';

$mail ->send();
$_SESSION['code'] = $code;
$_SESSION['time1'] = time();


header("location: forgetpassword2.php");


?>