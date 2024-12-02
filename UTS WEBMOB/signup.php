<?php
    require "connection.php";
    if (isset($_POST["submit"])) {
        $username = $_POST["inputUsername"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $rePassword = $_POST["confirmPassword"];

        // Check if name or email already exists
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($result)) {
            echo "<script> alert('Name or Email is already taken'); </script>";
        } else {
            if ($password == $rePassword) {
                // Hash password before saving
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
                if (mysqli_query($conn, $query)) {
                    echo "<script> alert('Register Successful');</script>";
                } else {
                    echo "<script> alert('Register Failed');</script>";
                }
            } else {
                echo "<script> alert('Passwords do not match');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="file_css/signup.css">
</head>
<body>

    <div class="signup-container">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form method ="POST" action="">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name ="inputUsername" required>
                </div>
            </div>
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
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="confirmPpassword" name="confirmPassword" placeholder="Confirm password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-4" name="submit">Sign Up</button>
            <div class="text-center mt-3 text-light">
                <span>Already have an account? </span><a href="login.php" class="text-light">Sign In</a>
            </div>
        </form>
    </div>

    <div class="right-space">
        <div>
            <h1 align="center">Welcome!</h1>
            <img src="image/signup.png" width=250 align="center">
            <p align="center">Please Create Your Account!.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
