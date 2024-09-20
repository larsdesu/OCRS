<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $id = $_POST['id'];

    $sql = "DELETE FROM tblcases WHERE id = $id";
    $result = $conn->query($sql);

    if (!$result) {
        die('Deletion Failed: ' . $conn->error);
    }

    $conn->close();
}
?>
