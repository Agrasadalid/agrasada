<?php
include 'config/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `users`(`id`, `uname`, `pass`, `email`) VALUES ('[value-1]','$uname','$password','$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registered Successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
 
</head>
<body>
    
    <form action="register.php" method="POST">
    <h1>Registration</h1>
        <label for="uname">Username:</label>
        <input type="text" id="uname" name="uname" required>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit" name="register">Register</button>

        <div class="text">
        <a href='index.php'><br>Login now</a>
      </div>
    </form>
</body>
</html>
