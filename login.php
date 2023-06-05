<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
    <title>PAGPELIS</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
        session_start();
        if(isset($_POST['submit'])) {
            if(empty($_POST['email']) || empty($_POST['password'])){
                echo "<script>alert('Syntax Error');
                    location.assign('login.php')</script>";
            } else {
                include("connect.php");
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "select * from usuarios where email='".$email."' and password='".$password."'";
                $result=mysqli_query($conn, $sql);
                if($row=mysqli_fetch_assoc($result)) {
                    $_SESSION['user'] = $row["username"];
                    echo "<script> alert('Welcome to PagPelis ".$row["username"]."');
                    location.assign('index.php?category=0')</script>";
                } else {
                    echo "<script> alert('ERROR');
                    location.assign('login.php')</script>";
                }
            }
        }else{
    ?>
    <div class="container">
        <div class="login">
            <img src="./assets/banner.png" alt="">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div>
                    <label for="">Email Address</label>
                    <input type="email" name="email" id="" placeholder="Email">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password" id="" placeholder="Password">
                </div>
                <input class="submit" name="submit" type="submit" value="Enter">
            </form>
            <div class="coses">
                <a href="register.php">Signup</a>
                <a href="">Forgot Password?</a>
            </div>
            <a class="lobbya" href="index.php"><button class="lobby">Back to Lobby</button></a>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>