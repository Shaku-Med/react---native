<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

  $mail = new PHPMailer(true);

  $mail -> isSMTP();
  $mail -> Host = 'smtp.gmail.com';
  $mail -> SMTPAuth = true;
  $mail -> Username = 'jujubelt124@gmail.com';
  $mail -> Password = 'akiykpeyieemxajb';
  $mail -> SMTPSecure = 'ssl';
  $mail -> Port = 465;

  $mail -> setFrom('jujubelt124@gmail.com', "Medzy");
  $mail -> addAddress('meddivero@gmail.com', "Brima Amara");
  $mail -> isHTML(true);

  $mail -> Subject = 'Email verification Link';
  $mail -> Body = '

  <h1>Welcome Mohamed, Here is your Email Verification link. </h1>
  <p>Please Click on this link to verify the email you used to signup with on our website.</p>
  <hr>
  <p>
  Here Is you Link For the email, jujubelt124@gmail.com click on the link showned below.
    <a href="">
    <b>Click Here </b>
    </a>
  </p>

  <h1>Thanks For Your Interest. </h1>
  
  ';
  $mail -> send();

  echo 'Success';



?>
