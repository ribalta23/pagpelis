<?php
    include("connect.php");

    $cat = "SELECT * FROM category";
    $resultc = $conn->query($cat);

    if($_SERVER["REQUEST_URI"]=="/PAGPELIS/" || $_GET["category"]=="0"){
        $pro = " SELECT * FROM content";
    } else {
        $pro = " SELECT * FROM content where film = ".$_GET["category"].";";
    }
    $resultp=mysqli_query($conn, $pro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
    <title>PAGPELIS</title>
    <link rel="stylesheet" href="style.css">
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
                            echo "<a href='user.php?user=".$user."'>".$user."</a>";
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
    <div class="cont" onclick="amagarCat()">
        <div class="titleCo">
        <?php
            if($_SERVER["REQUEST_URI"]=="/PAGPELIS/" || $_GET["category"]=="0") {
                echo "<h1>FILMS & SERIES</h1>";
            } else if($_GET["category"]==1) {
                echo "<h1>FILMS</h1>";
            } else if($_GET["category"]==2) {
                echo "<h1>SERIES</h1>";
            }
        ?>
        </div>
        <div class="contents">
            <?php
                if ($resultp->num_rows > 0) {
                    while($row = $resultp->fetch_assoc()) {
                        echo "<a href='content.php?content=".$row["id"]."'>";
                        echo "<div class='content'>";
                        echo "<img src='./img/".$row["image"]."' alt='".$row["name"]."'>";
                        echo "<div class='contentT'>";
                        echo "<h3>".$row["name"]."</h3>";
                        echo "</div>";
                        echo "</div>";
                        echo "</a>";
                    }
                }
                else {
                    echo "No ni ha";
                }
            ?>
        </div>
    </div>
    <footer>
        <img src="./assets/banner.png" alt="">
        <div>
            <a href="">Privacy Policy</a>
            <a href="">Cookies</a>
            <a href="">Help</a>
            <a href="">How we are?</a>
        </div>
        <p>©Pagpelis. All rights reserved.</p>
    </footer>
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