<?php

if (isset($_GET['id'])) {
    $conn = new mysqli('localhost', 'root', '', 'dbcrimereport');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM tblcases WHERE id = $id";
    $result = $conn->query($sql);

    if (!$result) {
        die('Invalid Query: ' . $conn->error);
    }

    $row = $result->fetch_assoc();

    echo "<form id='editForm'>
            <h1>ID: #{$row['id']}</h1>
        <div class='inputs'>
                <input type='hidden' name='id' value='{$row['id']}'>
            <div class='groups'>

                <div class='g1'>
                    <div class='edit-data'>
                        <label>E-mail:</label>
                        <input type='text' name='email' value='{$row['email']}'>
                    </div>

                    <div class='edit-data'>
                        <label>Phone Number:</label>
                        <input type='text' name='phoneNum' value='{$row['phoneNum']}'>
                    </div>
                </div>

                <div class='g12'>
                    <div class='edit-data'>
                        <label>Crime Description</label>
                        <textarea type='text' name='crimeDescrip' cols='30' rows='10' readonly>{$row['crimeDescrip']}</textarea>
                    </div>
                </div>

                <div class='g2'>
                    <div class='edit-data'>
                        <label>Type of Crime:</label>
                        <input type='text' name='crimeType' value='{$row['crimeType']}'>
                    </div>
                    
                    <div class='edit-data crimeimg'>
                        <label>Crime Image:</label>
                        <input type='hidden' name='crimeImg' value='{$row['crimeImg']}'>
                    <div id='crimeImageContainer' style='display: none;'>
                        <img id='crimeImage' src='../uploads/{$row['crimeImg']}' alt='Crime Image' onclick='closeCrimeImage()'>
                    </div>
                        <button type='button' onclick='showCrimeImage()'>Show Image</button>
                    </div>

                    <div class='edit-data'>
                        <label>Crime Location:</label>
                        <input type='text' name='crimeLoc' value='{$row['crimeLoc']}'>
                    </div>
                </div>

                <div class='g3'>
                    <div class='edit-data'>
                        <label>Date of Crime:</label>
                        <input type='date' name='crimeDate' value='{$row['crimeDate']}'>
                    </div>
                    <div class='edit-data'>
                        <label>Time of Crime:</label>
                        <input type='time' name='crimeTime' value='{$row['crimeTime']}'>
                    </div>

                    <div class='edit-data'>
                        <label>Status:</label>
                    <select name='reportProgress' value='{$row['reportProgress']}'>
                        <option value='{$row['reportProgress']}'>{$row['reportProgress']}</option>
                        <option value='REVIEWING'>REVIEWING</option>
                        <option value='PROCESSING'>PROCESSING</option>
                        <option value='RESOLVED'>RESOLVED</option>
                        <option value='DISPOSED'>DISPOSED</option>
                    </select>
                    </div>

                </div>

                <div class='buttons'>
                <button type='button' onclick='deleteRow({$row['id']})' id='del-btn'>Delete</button>
                <button type='button' onclick='saveData({$row['id']})' id='save-btn'>Save</button>
                </div>
            </div>

        </div>
        </form>";

    $conn->close();
}
?>
<script>

</script>

