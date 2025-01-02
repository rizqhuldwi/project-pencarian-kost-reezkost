<?php
session_start();
require 'functions.php';

if (isset($_SESSION))

    if (isset($_POST["login"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username == "admin" and $password == "admin") {
            $_SESSION["username"] = $username;
            header("location:admin.php");
        } else {
            header("location:login.php?login_gagal");
        }

        $result = mysqli_query($connect_db, "SELECT * FROM user WHERE username = '$username'");

        //  cek username
        if (mysqli_num_rows($result) == 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION["login"] = true;
                header("Location: index-user.php");
                exit;
            }
        }

        $error = true;
    }

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Registration successful!',
                        text: 'New user data added successfully!',
                        icon: 'success'
                    });
                });
              </script>";
    } else {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Username already used!',
                        text: 'User data failed to be added!',
                        icon: 'error'
                    });
                });
              </script>";
    }
}

if (isset($_GET["login_gagal"])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Oops!',
                text: 'Username or password is wrong!',
                icon: 'error'
            });
        });
    </script>";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register</title>
    <!--Boxicons CDN-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Custom CSS-->
    <link rel="stylesheet" href="login.css">
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="img/kost.png" type="img/x-icon">

</head>

<body>

    <div class="wrapper">
        <span class="rotate-bg"></span>
        <span class="rotate-bg2"></span>

        <div class="form-box login">
            <h2 class="title animation" style="--i:0; --j:21">Login</h2>
            <form action="" method="post">
                <div class="input-box animation" style="--i:1; --j:22">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-box animation" style="--i:2; --j:23">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn animation" style="--i:3; --j:24" name="login">Login</button>
                <div class="linkTxt animation" style="--i:5; --j:25">
                    <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20">Hello Friends! Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21"></p>
        </div>

        <div class="form-box register">


            <form action="" method="post">
                <h2 class="title animation" style="--i:17; --j:0">Sign Up</h2>
                <div class="input-box animation" style="--i:18; --j:1">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-box animation" style="--i:19; --j:2">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>

                <div class="input-box animation" style="--i:20; --j:3">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn animation" style="--i:21;--j:4" name="registrasi">Sign Up</button>
                <div class="linkTxt animation" style="--i:22; --j:5">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>

            </form>
        </div>

        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Don't Have an account? Register Here!</h2>
            <p class="animation" style="--i:18; --j:1;"></p>
        </div>

    </div>

    <!--Script.js-->
    <script src="login.js"></script>
</body>

</html>