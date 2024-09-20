<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="AD_CSS/admin_content_style.css">
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    

    <script src="../JS/sweetalertV2.js"></script>
    <script src="../JS/iconscout_unicons.js"></script>
    <script src="../JS/sweetalert.js"></script>

    <title>OCRS | Admin Content Page</title> 

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
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="admin_content.php" >
                    <i class="uil uil-folder-open" style="color: maroon;"></i>
                    <span class="link-name" style="color: maroon;"><b>Reports</b></span>
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

            <div class="filter-box">
                <div class="fil-content">
                    <form id="filterForm" action="admin_content.php" method="GET">
                        <div class="filter">
                            <label for="filterDate">Filter By:</label>
                            <input type="date" name="filterDate" id="filterDate">
                            <select name="filterStatus" id="filterStatus">
                                <option value="">Status</option>
                                <option value='SUBMITTED'>SUBMITTED</option>
                                <option value='REVIEWING'>REVIEWING</option>
                                <option value='PROCESSING'>PROCESSING</option>
                                <option value='RESOLVED'>RESOLVED</option>
                                <option value='DISPOSED'>DISPOSED</option>
                            </select>
                            <button type="submit" class="fltr-btn">Filter</button>
                        </div>
                        <div class="search">
                            <label for="searchById">Search ID:</label>
                            <input type="text" name="searchById" id="searchById">
                            <button type="submit" name="searchId" class="srch-btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-files-landscapes" style="color: maroon;"></i>
                    <span class="text">Reports</span>
                    <a id="insert-btn">Insert<i class="uil uil-plus"></i></a>
                </div>
            </div>

            <div class="activity">

                <div class="list-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>E-mail</th>
                                        <th>Type of Crime</th>
                                        <th>Date of Crime</th>
                                        <th>Progress</th>
                                        <th>Last Update</th>
                                    </tr>
                                </thead>
                                <tbody id="reportTableBody">
                                <?php include 'AD_BACKEND/contentdisplay.php'; ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <?php include 'AD_BACKEND/paginationContent.php' ?>
            </div>
        </div>
    </section>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="editModalData">
                <?php include 'AD_BACKEND/getReportrow.php' ?>
            </div>
        </div>
    </div>

    <?php include 'insertModal.php' ?>
    
    <script src="AD_JS/insertNewReport.js"></script>
    <script src="AD_JS/jQuery.js"></script>
    <script src="AD_JS/script.js"></script>
    <script src="AD_JS/logout.js"></script>
    <script src="AD_JS/editReport_script.js"></script>
</body>
</html>