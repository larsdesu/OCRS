<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image" href="OCRS Imgs/OCRS_LOGO.png" width=10px height=10px>
    <link rel="stylesheet" href="CSS/contact_style_ocrs.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="JS/sweetalert.js"></script>
    <script src="JS/sweetalertV2.js"></script>

    <title>Contact | OCRS</title>
</head>
<body>

    <div class="wrapper">
        <?php include 'navbar.php' ?>

        <?php include 'menu.php' ?>

        <div class="container">
            <form id="submitForm" action="BACKEND/commsandsuggs.php" method="post" onsubmit="event.preventDefault(); submitForm();">
                <div class="contactus">
                    <div class="inputcontacts">
                        <div class="cu">
                            <h1 class="ttl">Contact Us</h1>
                            <i class="fa-regular fa-comment-dots"></i>
                        </div>
                        <textarea cols="30" rows="10" type="text" name="comments" class="textarea" placeholder="Tell us something" maxlength="250" required></textarea>
                        <input type="email" name="email" class="type-email" placeholder="Your E-mail Here" required>
                        <button type="button" onclick="submitForm()">Submit</button>
                    </div>
                    <div class="displaycontacts">
                        <div class="mail">
                            <i class="fa-regular fa-envelope" style="color: #B70404;"></i>
                            <h1><a href="https://mail.google.com">@onlinecrimereporting</a></h1>
                        </div>
                        <div class="fb">
                            <i class="fa-brands fa-square-facebook" style="color: #0C356A;"></i>
                            <h1><a href="https://www.facebook.com/">@onlinecrimereporting</a></h1>
                        </div>
                        <div class="ig">
                            <i class="fa-brands fa-instagram" style="color: #FC2947;"></i>
                            <h1><a href="https://www.instagram.com/">@onlinecrimereporting</a></h1>
                        </div>
                        <hr>
                        <div class="EH">
                            <h4>Emergency Hotlines</h4>
                            <div class="EH-Cont">  
                                <p>Philippine Red Cross</p>
                                <p>143</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Philippine National Police</p>
                                <p>911</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Bureau of Fire Protection</p>
                                <p>911</p>
                            </div>
                            <div class="EH-Cont">
                                <p>National Complaint Hotline</p>
                                <p>8888</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Department of Health</p>
                                <p>1555</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Bantay Bata</p>
                                <p>163</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Commission on Human Rights</p>
                                <p>1343</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Land Transportation Franchising and Regulatory Board</p>
                                <p>1342</p>
                            </div>
                            <div class="EH-Cont">
                                <p>Metropolitan Manila Development Authority</p>
                                <p>136</p>
                            </div>
                            <div class="EH-Cont">
                                <p>North Luzon Expressway</p>
                                <p>3-5000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


<script>
    async function submitForm() {
        var form = document.getElementById("submitForm");
        if (form.checkValidity()) {
            // If the form is valid, send the data to the server
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: form.method,
                body: formData
            });

            try {
                const result = await response.json();

                if (result.success) {
                    displaySuccessAlert();
                } else {
                    displayErrorAlert(result.error);
                }
            } catch (error) {
                displayErrorAlert("An unexpected error occurred.");
            }
        } else {
            displayErrorAlert("Please fill in all required fields.");
        }
    }

    function displaySuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Comment Submitted!',
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location.href = 'contact_ocrs.php'; 
        });
    }

    function displayErrorAlert(errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: errorMessage
        });
    }
</script>

    <script>
        let menupop = document.getElementById("menu-pop");

        function openMenu() {
            menupop.classList.add("open-menu");
        }

        function closeMenu() {
            menupop.classList.remove("open-menu");
        }
    </script>
</body>
</html>
