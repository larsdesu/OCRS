<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AD_CSS/admin_dashboard_style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <script src="../JS/sweetalertV2.js"></script>
    <script src="../JS/iconscout_unicons.js"></script>
    <script src="../JS/sweetalert.js"></script>


    <title>OCRS | Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../OCRS Imgs/OCRS_LOGO.png" alt="">
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin_dash.php">
                    <i class="uil uil-estate" style="color: maroon;"></i>
                    <span class="link-name" style="color: maroon;"><b>Dashboard</b></span>
                </a></li>
                <li><a href="admin_content.php">
                    <i class="uil uil-folder-open"></i>
                    <span class="link-name">Reports</span>
                </a></li>
                <li><a href="admin_comments.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comments</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li>
                    <a href="#" id="logout-btn">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                    <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>          
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <?php include('AD_BACKEND/records.php') ?>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-file-upload-alt"></i>
                        <span class="text">Total Reports</span>
                        <a href="admin_content.php" class="number"><?php echo $totalRecords; ?></a>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total Comments</span>
                        <a href="admin_comments.php" class="number"><?php echo $totalComments; ?></a>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-bag"></i>
                        <span class="text">Total Case Resolved</span>
                        <span class="number"><?php echo $totalResolved; ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                <div class="list-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>E-mail</th>
                                <th>Type of Crime</th>
                                <th>Progress</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'AD_BACKEND/dashdisplay.php'; ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="AD_JS/jQuery.js"></script>
    <script src="AD_JS/script.js"></script>
    <script src="AD_JS/logout.js"></script>
</body>
</html>