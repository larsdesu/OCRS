<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $id = $_POST['id'];
    $updatedDisplayComment = $_POST['displayComment'];

    $sql = "UPDATE tblcands SET displayComment = '$updatedDisplayComment' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
