<?php
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
    if($conn->connect_error){
        die('Connection Faied: '.$conn->connect_error);
    }

    $currentDate = date("Y-m-d");
    $currentDateTime = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM tblcases WHERE crimeUpdate = '$currentDate'";
    $result = $conn->query($sql);
    

    if(!$result){
        die('Invalid Query: '.$conn->error);
    }

    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['crimeType'] . "</td>
            <td>" . $row['reportProgress'] . "</td>
            <td>" . $row['crimeUpdate'] . "</td>
        </tr>";
        
    }
?>