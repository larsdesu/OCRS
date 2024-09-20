<?php
$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM tblcands ORDER BY commentDate DESC";
$result = $conn->query($sql);

if (!$result) {
    die('Invalid Query: ' . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['comments'] . "</td>
            <td>" . $row['commentDate'] . "</td>
            <td>" . $row['displayComment'] . "</td>
            <td><a id='edit-btn'><i class='uil uil-edit'></i></a></td>
          </tr>";
}
?>
