
<html lang="en">
<head>
    <link rel="icon" type="image" href="OCRS Imgs/OCRS_LOGO.png" width=10px height=10px>

    <link rel="stylesheet" href="CSS/home_style_ocrs.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="JS/sweetalert.js"></script>
    
    <title>Home | OCRS</title>
</head>
<body>

    <div class="wrapper" id="wrap">

        <?php include 'navbar.php' ?>

        <div class="container">

        <?php include 'menu.php' ?>

            <div class="content">
                <div class="tagline">
                    <h1>Online Crime Reporting</h1>
                    <div class="content-texts">
                    <p>A digital platform that is a beacon of hope for citizens, offering a safe and convenient channel to report crimes and suspicious activities. It streamlined the reporting process, allowing users to submit information from the comfort of their homes, at any time of the day or night.</p>
                    </div>

                </div>
                <div class="but"> 
                    <h3><a href="about_ocrs.php">Learn more</a></h3>      
                    <div class="divider">|</div>
                    <button class="rep bn37" onclick="openReport()">Report Now</button>
                </div>
            </div>

            <?php include 'reportnow.php' ?>
        </div>
    </div>

    <script src="JS/popsModal.js"></script>
    <script src="JS/reportModal.js"></script>

    </body>
</html>