<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image" href="OCRS Imgs/OCRS_LOGO.png" width=10px height=10px>

    <link rel="stylesheet" href="CSS/track_style_ocrs.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
    <title>Track | OCRS</title>
</head>
<body>

    <div class="wrapper">
        
        <?php 
        include 'navbar.php';
        include 'menu.php';
        include 'BACKEND/trackcase.php';
        ?>

        <div class="content">
            <div class="content-bg">
                <div class="content-wrapper">
                    <div class="herotext">
                        <div class="texts">
                            <h1>TRACK</h1>
                            <h2>YOUR REPORTS</h2>
                            <p>Input your Tracking ID to monitor and see the <br>progress of your report.</p>
                        </div>
                    </div>
                    <form method="post">
                        <div class="track-area">
                            <div class="track-content">
                                <input type="number" placeholder="Put your Tracking ID here" id="ID" name="search" value="<?php $searchTerm; ?>" required oninput="limitDigits(this, 10)">
                                <button class="track-btn" type="submit">Track</button>
                            </div>
                            <i class="uil uil-search-alt"></i>
                        </div>
                        <div class="track-wrapper" id="track-pop">
                            <?php 

                                include('BACKEND/trackcase.php');

                                if (isset($_POST['search'])) {
                                    $searchTerm = $_POST['search'];
                                
                                    // Use equality operator in the SQL query
                                    $sql = "SELECT * FROM tblcases WHERE id = '$searchTerm'";
                                    $result = $conn->query($sql);
                                
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                
                                        $statusColor = getStatusColor($row['reportProgress']);
                                
                                        echo "
                                        <div class='track-header'>
                                            <h1>Tracking ID: </h1>
                                            <h1 style='color:black; margin-left:20px'> #" . $row['id'] . "</h1>
                                        </div>
                                        <div class='track-report'>
                                            <div class='track-progress'>
                                                <hr>
                                                <div class='crime'>
                                                    <h2><b>Crime Reported:</b></h2>
                                                    <h2> " . $row['crimeType'] . "</h2>
                                                </div>
                                                <hr>
                                                <div class='report-date'>
                                                    <h2><b>Date Reported:</b></h2>
                                                    <h2> " . $row['dateofReport'] . "</h2>
                                                </div>
                                                <hr>
                                                <div class='status'>
                                                    <h2><b>Status:</b></h2>
                                                    <h2 style='color: $statusColor'> " . $row['reportProgress'] . "</h2>
                                                </div>
                                                <hr>
                                                <div class='email'>
                                                    <h2><b>E-mail:</b></h2>
                                                    <h2> " . $row['email'] . "</h2>
                                                </div>
                                                <div class='update'>
                                                    <p> Last update: " . $row['crimeUpdate'] . "</p>
                                                </div>
                                            </div>
                                        </div>";
                                    } else {
                                        echo " Tracking ID #$searchTerm does not exist.";
                                    }
                                }
                                

                                function getStatusColor($progress) {
                                    switch ($progress) {
                                        case 'PROCESSING':
                                            return 'goldenrod';    
                                        case 'RESOLVED':
                                            return 'green';
                                        case 'DISPOSED':
                                            return 'red';
                                        default:
                                            return 'blue';
                                    }
                                }
                            ?>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        let menupop = document.getElementById("menu-pop");
        function openMenu(){
            menupop.classList.add("open-menu");
        }
        function closeMenu(){
            menupop.classList.remove("open-menu");
        }


        // function limitDigits(input, maxLength) {
        //     let value = input.value.replace(/\D/g, '');

        //     if (value.length > maxLength) {
        //         value = value.slice(0, maxLength);
        //     }

        //     input.value = value;
        // }
        function limitDigits(input, maxLength) {
            let value = input.value.replace(/\D/g, '');
                if (value.length !== maxLength) {
                    input.setCustomValidity(`Tracking ID must be ${maxLength} digits.`);
                    if (value.length > maxLength) {
                        value = value.slice(0, maxLength);}
                } else {
                    input.setCustomValidity('');
                }
            input.reportValidity();
            input.value = value;
        }
    </script>
</body>
</html>
