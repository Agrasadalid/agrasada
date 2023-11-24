<?php
include 'config/dbcon.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";

    $select = mysqli_query($conn, $sql);

    if ($select) {
        if (mysqli_num_rows($select) != 0) {
            $user = mysqli_fetch_array($select);
            $_SESSION['user_id'] = $user['id'];
            header("Location: admin/dashboard.php");
        } else {
            echo "Incorrect password or username! Try again";
        }
    } else {
        echo "Database query error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>  
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-image: url(https://cdn.wallpapersafari.com/9/11/9Xu1Sc.jpg);
            margin: 1600;
            padding: 900;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    .container {
        background-color: rgb(26, 114, 67);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.1);
        width: 600px;
    }
    .container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
</style>
<body>
<div class="center-container">
    <div class="login-container">
        <form action="index.php" method="POST">
        <h1>LOGIN</h1>
        <div class="form-group">
        <input type="email" name="email" placeholder="Email" required autofocus>
        </div>
        <div class="form-group">
        <input type="password" name="pass" placeholder="Password" required>
        </div>
        <div class="form-group">
        <button type="submit" name="login">Login</button>
        </div>

            <a href='register.php' class="register-button">Register</a>
        </form>
    </div>
</div>
</body>
</html>