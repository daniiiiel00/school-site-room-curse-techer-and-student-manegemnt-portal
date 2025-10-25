<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abc_high_school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


session_start();


if (isset($_POST['login'])) {
    $admin_user = mysqli_real_escape_string($conn, $_POST['username']);
    $admin_pass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$admin_user' AND password='$admin_pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $admin_user;
        header("Location: techer_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #bdb5b5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            background:#81eb08;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-box input[type="submit"]:hover {
            background: #252517;
        }
        @media (max-width: 480px) {
            .login-box {
                padding: 15px;
            }
            .login-box h2 {
                font-size: 20px;
            }
        }
    </style>
    
<body>
    <div class="login-box">
        <h2>Techers login</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
