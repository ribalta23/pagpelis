<?php
    include("connect.php");
    
    $cat = "SELECT * FROM category";
    $resultc = $conn->query($cat);
    
    $pro = "SELECT * FROM content WHERE id=".$_GET["content"].";";
    $resultp=mysqli_query($conn, $pro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="content.css">
    <title>PAGPELIS</title>
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/b79b517761.js" crossorigin="anonymous"></script>
    <header>
        <nav>
            <a href="index.php?category=0"><img src="./assets/banner.png" alt=""></a>
            <ul class="ulMain">
                <li>
                    <a href="index.php?category=1">FILMS</a>
                    <a href="index.php?category=2">SERIES</a>
                    <button onclick="mostrarCat()">CATEGORIES</button>
                </li>
            </ul>
            <ul class="ulUser">
                <li>
                    <a href=""><i class="fa-regular fa-bookmark fav"></i></a>
                    <i class='fa-regular fa-user user'></i> 
                    <?php
                        session_start();
                        if(isset($_SESSION['user'])) {
                            $user=$_SESSION['user'];
                            echo "<a href='user.php'>".$user."</a>";
                        }else {
                            echo "<a href='login.php'>LOGIN</a>";
                        }
                    ?>
                </li>
            </ul>
        </nav>
    </header>
    <div class="subheader"></div>
    <div id="categories" class="categories">
        <div class="containerCat">
            <?php
                if ($resultc->num_rows > 0) {
                    while($row = $resultc->fetch_assoc()) {
                        echo "<a href=''>".$row["name"]."</a>";
                    }
                }
            ?>
        </div>
    </div>
    <div class="contentPage">
        <?php
            if ($resultp->num_rows > 0) {
                while($row = $resultp->fetch_assoc()) {
                    echo "<img class='banner' src='./banners/".$row["banner"]."'>";
                    echo "<div class='contentText'>";
                    echo "<img src='./logos/".$row["logo"]."'>";
                    echo "<p>".$row["descrip"]."</p>";
                    echo "</div>";
                }
            }
        ?>
    </div>
    <script>
        function mostrarCat() {
            categories = document.getElementById('categories');
            categories.style.display = 'inline';
        }
        function amagarCat() {
            categories = document.getElementById('categories');
            categories.style.display = 'none';
        }
    </script>
</body>
</html>