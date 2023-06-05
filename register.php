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
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            include("connect.php");
            $sql="insert into usuarios(username,email,password)
            values('".$username."', '".$email."', '".$password."')";
            $result=mysqli_query($conn, $sql);
            if($result) {
                echo "<script>
                    location.assign('login.php')</script>";
            } else {
                echo "<script> alert('ERROR');
                    location.assign('register.php')</script>";
            }
        }else{
    ?>
    <div class="container">
        <div class="login">
            <img src="./assets/banner.png" alt="">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div>
                    <label for="">Username</label>
                    <input type="name" name="username" id="" placeholder="You Username">
                </div>
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
                <a href="login.php">Back to Login</a>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>