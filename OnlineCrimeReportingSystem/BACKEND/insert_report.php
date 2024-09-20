<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMAILER/PHPMailer.php';
require '../PHPMAILER/SMTP.php';
require '../PHPMAILER/Exception.php';

$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$crimeType = $_POST['crimeType'];
$crimeDescrip = $_POST['crimeDescrip'];
$crimeLoc = $_POST['crimeLoc'];
$crimeDate = $_POST['crimeDate'];
$crimeTime = $_POST['crimeTime'];
$currentDate = date("Y-m-d");

$crimeImg = $_FILES['crimeImg'];

if ($crimeImg['error'] == 0) {
    $originalFilename = $crimeImg['name'];

    $dateAndTime = date('YmdHis');
    $filename = $dateAndTime . '_' . $originalFilename;

    $tmp_path = $crimeImg['tmp_name'];
    $uploadDir = '../uploads/';

    $uploadPath = $uploadDir . $filename;
    move_uploaded_file($tmp_path, $uploadPath);
} else {
    $filename = null;
}

$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO tblcases (email, phoneNum, crimeType, crimeImg, crimeDescrip, crimeLoc, crimeDate, crimeTime, crimeUpdate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssssss", $email, $phoneNum, $crimeType, $filename, $crimeDescrip, $crimeLoc, $crimeDate, $crimeTime, $currentDate);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Reported Successfully";
        $_SESSION['status_code'] = "success";

        $mail = new PHPMailer();

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = 'oncrimereporting@gmail.com';
        $mail->Password = 'tfwe urif uznf odou'; // Use your App Password if 2-step verification is enabled
        $mail->Subject = 'Crime Report Notification';

        // Recipients
        $mail->setFrom('oncrimereporting@gmail.com');
        $mail->Body = 'Your report has been received. Stay tuned for future updates regarding to your report.';
        $mail->addAddress($email);

        if ($mail->send()) {
            $query = "SELECT MAX(id) AS last_id FROM tblcases";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $last_id = $row['last_id'];

                echo json_encode(['success' => true, 'message' => '', 'tracking_id' => $last_id]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: ' . $query . '<br>' . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Email could not be sent. Error: ' . $mail->ErrorInfo]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit;
}

session_destroy();
?>
