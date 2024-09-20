<?php
    $sqlTotal = "SELECT COUNT(id) AS total FROM tblcases";
    $resultTotal = $conn->query($sqlTotal);

    if (!$resultTotal) {
        die('Invalid Query: ' . $conn->error);
    }

    $rowTotal = $resultTotal->fetch_assoc();
    $totalRecords = $rowTotal['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $activeClass = ($i == $currentPage) ? 'class="active"' : '';

        echo "<a $activeClass href='admin_content.php?page=$i'>$i</a> ";
    }
    echo "</div>";

    $conn->close();
?>
