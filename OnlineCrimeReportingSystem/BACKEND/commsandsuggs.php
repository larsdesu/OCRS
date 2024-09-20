<?php
$email = $_POST['email'];
$comments = $_POST['comments'];

$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
    } else {
    $stmt = $conn->prepare("insert into tblcands(email, comments) values(?, ?)");
    $stmt->bind_param("ss", $email, $comments);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $stmt->error]);
        }

    $stmt->close();
    $conn->close();
    }
?>
