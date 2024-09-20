<?php

require '../../PHPMAILER/PHPMailer.php';
require '../../PHPMAILER/SMTP.php';
require '../../PHPMAILER/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $id = $_POST['id'];

    $fields = [
        'email' => $_POST['email'],
        'phoneNum' => $_POST['phoneNum'],
        'crimeType' => $_POST['crimeType'],
        'crimeImg' => $_POST['crimeImg'],
        'crimeLoc' => $_POST['crimeLoc'],
        'crimeDate' => $_POST['crimeDate'],
        'crimeTime' => $_POST['crimeTime'],
        'reportProgress' => $_POST['reportProgress'],
        'crimeUpdate' => date('Y-m-d')  
    ];

    $setClause = '';

    foreach ($fields as $field => $value) {
        $sanitizedValue = $conn->real_escape_string($value);
        $setClause .= "$field = '$sanitizedValue', ";
    }

    $setClause = rtrim($setClause, ', ');

    $sql = "UPDATE tblcases SET $setClause WHERE id = $id";
    $result = $conn->query($sql);

    if (!$result) {
        die('Update Failed: ' . $conn->error);
    }

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
    $mail->Body = 'Your report has been updated! Check the status of your report. Your Tracking ID is ' . $id;
    $mail->addAddress($_POST['email']);

    if (!$mail->send()) {
        die('Email could not be sent. Error: ' . $mail->ErrorInfo);
    }

    $conn->close();
}
?>
