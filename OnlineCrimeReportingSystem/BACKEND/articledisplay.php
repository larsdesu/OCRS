<?php
$conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$resultsPerPage = 8;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = " AND crimeType LIKE '%$searchQuery%'"; 

$countQuery = "SELECT COUNT(*) as count FROM tblcases WHERE reportProgress = 'RESOLVED'$searchCondition";
$countResult = $conn->query($countQuery);

if ($countResult === false) {
    die('Count Query Error: ' . $conn->error);
}

$totalRows = $countResult->fetch_assoc()['count'];

$startIndex = ($page - 1) * $resultsPerPage;

$query = "SELECT * FROM tblcases WHERE reportProgress = 'RESOLVED'$searchCondition AND dateofReport >= DATE_SUB(CURDATE(), INTERVAL 10 YEAR) ORDER BY dateofReport DESC LIMIT $startIndex, $resultsPerPage";
$result = $conn->query($query);

if ($result === false) {
    die('Query Error: ' . $conn->error);
}

echo "<div class='article-wrap'>";

if ($result->num_rows > 0) {
    $count = 0;

    while ($row = $result->fetch_assoc()) {
        $crimeType = $row['crimeType'];
        $crimeImg = "uploads/" . $row['crimeImg'];
        $crimeLoc = $row['crimeLoc'];
        $dateofReport = $row['dateofReport'];
        $dateResolved = $row['crimeUpdate'];

        if ($count % 4 == 0) {
            echo "<div class='row'>";
        }

        echo "<div class='display-case'>
                <div class='case-card' onclick='openModal(\"$crimeType\", \"$crimeLoc\", \"$dateofReport\", \"$dateResolved\", \"$crimeImg\")'>
                    <div class='case-image'>
                        <img src='$crimeImg' alt='Crime Image'>
                    </div>
                    <div class='case-texts'>
                        <h2>$crimeType</h2>
                        <p>Location: $crimeLoc</p>
                        <p>Date Reported: $dateofReport</p>
                        <p>Date Resolved: $dateResolved</p>
                    </div>
                </div>
            </div>";

        $count++;

        if ($count % 4 == 0) {
            echo "</div>";
        }
    }

    echo "</div>";

    $totalPages = max(1, ceil($totalRows / $resultsPerPage));
} else {
    echo "<div class='no-records-dialog'>No records found for the given search.</div>";
}

?>

<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-border">
        <img id="modalImage" class="modal-content" src="" alt="Crime Image">
        <div id="modalTexts" class="modal-texts"></div>
    </div>
</div>

<script>
    function openModal(crimeType, crimeLoc, dateofReport, dateResolved, crimeImg) {
        document.getElementById("myModal").style.display = "block";
        document.getElementById("modalImage").src = crimeImg;
        document.getElementById("modalTexts").innerHTML = "<h2>" + crimeType + "</h2><p>Location: " + crimeLoc + "</p><p>Date Reported: " + dateofReport + "</p><p>Date Resolved: " + dateResolved + "</p>";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    window.onclick = function (event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
