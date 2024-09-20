<?php

require 'PHPMAILER/PHPMailer.php';
require 'PHPMAILER/SMTP.php';
require 'PHPMAILER/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
$mail->Port = 587;
$mail->Username = 'oncrimereporting@gmail.com';
$mail->Password = 'tfwe urif uznf odou'; 
$mail->Subject = 'Crime Report Notification';

$mail->setFrom('oncrimereporting@gmail.com');
$mail->Body = 'Your report has been received. Thank you for reporting!';
$mail->addAddress($email);

// $mail->addAddress('oncrimereporting@gmail.com');

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->send();


?>
