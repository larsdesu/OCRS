<?php 
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');

    if($conn->connect_error){
        die('Connection Faied: '.$conn->connect_error);
    }

    $sql = "SELECT * FROM tblcands WHERE displayComment = 'YES'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo"
                <div class='comments'>
                <hr>
                    <div class='comments-container'>
                    <i class='uil uil-comment'></i>
                        <div class='comments-content'>
                            <p>'" . $row["comments"] . "'</p>
                            <h4>-" . $row["email"] . "</h4>
                        </div>
                    </div>
                </div>
            ";
                
        }
    } else {
        echo "No comments found.";
    }
    $conn->close();

?>