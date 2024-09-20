<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image" href="OCRS Imgs/OCRS_LOGO.png" width=10px height=10px>

    <link rel="stylesheet" href="CSS/about_style_ocrs.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
    <title>About | OCRS</title>
</head>
<body>

    <div class="wrapper">
        
        <?php include 'navbar.php' ?>
        

        <div class="container">

            <?php include 'menu.php' ?>
        
            <div class="container-content">
                <div class="description">
                    <div class="hdr">
                        <div class="ocrs">
                            <img src="OCRS IMGS/OCRS_LOGO.png" alt="">
                            <div class="ocrs-info">
                                <p>A specific platform that allows people to report crimes and occurrences online. It gives the public a quick and secure way to report criminal activity to authorities agencies. Online Crime Reporting System aims to increase community engagement and empower citizens to make their communities safer.</p>
                                <br>
                                <p>The development of the Online Crime Reporting System emphasizes the need of bridging the gap between technology and public service, with the goal of making reporting crimes as convenient and user-friendly as feasible. The goal is not just to provide a platform that allows residents to report crimes from the comfort and privacy of their own homes, but also to streamline the reporting process, making it more efficient and accessible. This new method to crime reporting intends to encourage more people to come forward, report crimes immediately, and seek help when needed, thereby improving overall community safety.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mnv">
                    <div class="mnv-container">
                        <div class="mission">
                            <div class="mission-content">
                                <h1>Mission</h1>
                                <p>The Online Crime Reporting System's goal is to give the public a safe and simple way to report crimes and other incidents, assuring quick and efficient law enforcement action while promoting a more secure and cohesive community.</p>
                            </div>
                        </div>
                        <div class="vision">
                            <div class="vision-content">
                                <h1>Vision</h1>
                                <p>Create a comprehensive and user-friendly platform that allows people to report crimes and other incidents online, improving the effectiveness and efficiency of law enforcement organizations, encouraging community involvement, and making society a safer place.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="comments-wrapper">
                <div class="outer">
                    <?php include 'BACKEND/commentsdisplay.php' ?>
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
    </script>
</body>
</html>