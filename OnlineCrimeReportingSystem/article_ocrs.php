<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image" href="OCRS Imgs/OCRS_LOGO.png" width=10px height=10px>

    <link rel="stylesheet" href="CSS/article_style_ocrs.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
    <title>Article | OCRS</title>
</head>
<body>

    <div class="wrapper">
        <?php include 'navbar.php' ?>
        
        <?php include 'menu.php' ?>

        <div class="content">
            <div class="article-header">
                <div class="header-texts">
                    <h1><i class="uil uil-file-check-alt"></i>Resolved Cases</h1>
                    <p>A place for showcasing the cases that have been resolved.</p>
                </div>
                <div class="header-filter">
                    <input type="text" id="searchInput" placeholder="Search for Crime">
                    <button class="srch-btn" onclick="searchCases()">Search</button>
                </div>
            </div>
            <div class="article-content" id="resolvedCases">
                <?php include('BACKEND/articledisplay.php') ?>
            </div>
            <div class="pagination-content">
                <?php 
                echo "<div class='pagination'>";
                for ($i = 1; $i <= $totalPages; $i++) {
                    $class = ($i == $page) ? 'current' : '';
                    echo "<a href='?page=$i&search=$searchQuery' class='$class'>$i</a>";
                }
                echo "</div>";
                
                $conn->close();
                ?>
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
    <script>
        function searchCases() {
            var input = document.getElementById('searchInput').value;
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var resultContainer = document.getElementById('resolvedCases');
                    
                    if (this.responseText.trim() === '') {
                        resultContainer.innerHTML = '<div>No records found.</div>';
                    } else {
                        resultContainer.innerHTML = this.responseText;
                    }
                }
            };

            xhr.open("GET", "BACKEND/articledisplay.php?search=" + input, true);
            xhr.send();
        }
    </script>

</body>
</html>