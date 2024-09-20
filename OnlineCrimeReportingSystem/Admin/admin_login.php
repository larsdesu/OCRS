
<html lang="en">
<head>
    <link rel="stylesheet" href="AD_CSS/admin_login_style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="../JS/sweetalert.js"></script>
    
    <title>Admin Login</title>
</head>
<body>

    <div class="wrapper" id="wrap">
        <div class="login-container">
            <h2>ADMIN LOGIN</h2>
            <form id="loginForm">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Username">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Password">
                <div class="clickables">
                    <a href="../home_ocrs.php">Go to OCRS</a>
                    <button type="button" onclick="login()" class="bn54"><span class="bn54span">Login</span></button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function login() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username === "admin" && password === "admin") {
                window.location.href = "admin_dash.php?login=success";
            } else {
                swal("Error", "Invalid username or password", "error");
            }
        }
    </script>

</body>
</html>