

<!DOCTYPE html>
<html>
<head>
    <title></title>
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
            background: #81eb08;
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
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #ff4d4d;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .logout-btn:hover {
            background: #cc0000;
        }
    </style>
    
</head>
<body>
<a href="students_crud/students_view.php" class="logout-btn">view students</a>

    <div class="login-box">
        <h2>student rigstration</h2>
        <form method="post" action="">
            <input type="text" name="u_name" placeholder="student user name" required>
            <input type="text" name="f_name" placeholder="student full name" required>
            <input type="text" name="grade" placeholder="student grade" id="">
            <input type="text" name="section" placeholder="student section" id="">
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Rigster">
        </form>
    </div>
    <?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "abc_high_school";
$table = "students";
$conn = NEW mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_name = ($_POST['u_name']);
     $f_name = ($_POST['f_name']);
    $grade = ($_POST['grade']);
    $section = ($_POST['section']);
    $password = ($_POST['password']);
    $stmt = $conn->prepare("INSERT INTO students (u_name,f_name,grade,section,password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssss", $u_name,$f_name,$grade,$section,$password);
if (!$stmt->execute()) {
      die("Execute failed: " . $stmt->error);
} else {
  echo "<script>alert(' Registration successful   ');
  window.location.href = 'students_crud/students_view.php';
  </script>";
}
}
$conn->close();
?>

</body>
</html>
