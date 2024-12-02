<?php
    session_start();
    require "connection.php";
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"]; 

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if (password_verify($password, $row["password"])) { // Verifikasi password
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                echo "<script>
                alert('Login Berhasil');
                window.location.href = 'dashboard.php';
                </script>";
            } else {
                echo "<script> alert ('Wrong password'); </script>";
            }
        } else {
            echo "<script> alert ('User not found'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tambahkan animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="file_css/login.css">
</head>
<body>

    <!-- Login Container dengan animasi fade-in-left -->
    <div class="login-container animate__animated animate__fadeInLeft">
        <h2 class="text-center mb-4">Sign In</h2>
        <form action="" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
            </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary w-100 mt-4">Login</button>
            <div class="text-center mt-3 text-dark">
                <span>Don't have an account? </span><a href="signup.php" class="text-dark">Sign up</a>
            </div>
        </form>
    </div>

    <div class="right-space animate__animated animate__fadeInRight">
        <div class="text-container text-center">
            <hr>
            <p class="text-1"><b>Employee Management</b></p>
            <img src="image/login.png" alt="Logo">
            <hr>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
