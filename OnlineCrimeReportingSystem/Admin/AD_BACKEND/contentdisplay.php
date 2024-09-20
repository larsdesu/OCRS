<?php
$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$recordsPerPage = 10;

$filterDate = isset($_GET['filterDate']) ? $_GET['filterDate'] : '';
$filterStatus = isset($_GET['filterStatus']) ? $_GET['filterStatus'] : '';

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($currentPage - 1) * $recordsPerPage;

$whereClause = '';

if ($filterDate != '') {
    $whereClause .= " AND crimeDate = '$filterDate'";
}

if ($filterStatus != '') {
    $whereClause .= " AND reportProgress = '$filterStatus'";
}

$searchById = isset($_GET['searchById']) ? $_GET['searchById'] : '';

if ($searchById != '') {
    $whereClause .= " AND id = '$searchById'";
}

$sql = "SELECT * FROM tblcases WHERE 1 $whereClause ORDER BY id DESC LIMIT $startFrom, $recordsPerPage";
$result = $conn->query($sql);

if (!$result) {
    die('Invalid Query: ' . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr data-id='" . $row['id'] . "' data-date='" . $row['crimeDate'] . "' data-status='" . $row['reportProgress'] . "'>
        <td>" . $row['id'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['crimeType'] . "</td>
        <td>" . $row['crimeDate'] . "</td>
        <td>" . $row['reportProgress'] . "</td>
        <td>" . $row['crimeUpdate'] . "</td>
        <td><a class='edit-btn' data-id='" . $row['id'] . "'><i class='uil uil-eye'></i></a></td>
    </tr>";
}


?>
