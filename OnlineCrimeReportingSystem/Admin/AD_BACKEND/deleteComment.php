<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $id = $_POST['id'];

    $sql = "DELETE FROM tblcands WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
