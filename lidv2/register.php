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
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
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
    
    <form action="register.php" method="POST">
    <h1>Registration</h1>
    <div class="form-group">
        <label for="uname">Username:</label>
        <input type="text" id="uname" name="uname" required>
    </div>
    <div class="form-group">
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    
        <button type="submit" name="register">Register</button>

        <div class="text">
        <a href='index.php'><br>Login now</a>
      </div>
    </form>
</body>
</html>
