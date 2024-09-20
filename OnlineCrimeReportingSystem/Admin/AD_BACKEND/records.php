<?php
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
    if($conn->connect_error){
        die('Connection Faied: '.$conn->connect_error);
    }

    $reports = "SELECT COUNT(*) as total FROM tblcases";
    $result = $conn->query($reports);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalRecords = $row["total"];
    } else {
        $totalRecords = 0;
    }

    //

    $comments = "SELECT COUNT(*) as total FROM tblcands";
    $result = $conn->query($comments);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalComments = $row["total"];
    } else {
        $totalComments = 0;
    }

    $resolved = "SELECT COUNT(*) as total FROM tblcases WHERE reportProgress = 'RESOLVED'";
    $result = $conn->query($resolved);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalResolved = $row["total"];
    } else {
        $totalResolved = 0;
    }
    
?>