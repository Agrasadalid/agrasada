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
<body>
<div class="center-container">
    <div class="login-container">
        <form action="index.php" method="POST">
        <h1>LOGIN</h1>
            <input type="email" name="email" placeholder="Email" required autofocus>
            <br>
            <br>
            <input type="password" name="pass" placeholder="Password" required>
            <br>
            <br>
            <button type="submit" name="login">Login</button>
            <br>
            <br>
            <a href='register.php' class="register-button">Register</a>
        </form>
    </div>
</div>
</body>
</html>
