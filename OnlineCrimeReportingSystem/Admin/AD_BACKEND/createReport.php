<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$response = array('success' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];
    $crimeType = $_POST['crimeType'];
    $crimeLoc = $_POST['crimeLoc'];
    $crimeDate = $_POST['crimeDate'];
    $crimeTime = $_POST['crimeTime'];
    $reportProgress = $_POST['reportProgress'];
    $currentDate = date("Y-m-d");

    if (!empty($_FILES['crimeImg']['name'])) {
        $filename = $_FILES['crimeImg']['name'];
        $tmpname = $_FILES['crimeImg']['tmp_name'];
        $date = date('YmdHmms');

        $target_dir = __DIR__ . "/../../uploads/$date-$filename";

        if (move_uploaded_file($tmpname, $target_dir)) {
            $query = "INSERT INTO tblcases (email, phoneNum, crimeType, crimeImg, crimeLoc, crimeDate, crimeTime, reportProgress, crimeUpdate) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($query);

            $crimeImg = $date . '-' . $filename;

            $stmt->bind_param("sssssssss", $email, $phoneNum, $crimeType, $crimeImg, $crimeLoc, $crimeDate, $crimeTime, $reportProgress, $currentDate);

            if ($stmt->execute()) {
                $_SESSION['crimeType'] = $crimeType;
                $_SESSION['crimeImg'] = $target_dir;
                $response['success'] = true;
                $response['message'] = "Record inserted successfully";
            } else {
                $response['message'] = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $response['message'] = "Error uploading file.";
        }
    } else {
        $response['message'] = "Fill out all Required Fields";
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
