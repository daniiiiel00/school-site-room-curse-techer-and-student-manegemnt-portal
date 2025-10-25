
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techers dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #575d63;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }

        /* box*/

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
    <div class="sidebar">
        <h3 class="text-center">Abc high School</h3>
        <a href="#"><i class="fas fa-home"></i> Dashboard</a>
        <a href="manage_student_greade_crud/manage_students_gread.php"><i class="fas fa-school"></i> Manage students greade</a>
        <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">back to Home</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!-- Main content starts here -->
        <div class="login-box">
        <h2>Add student Mark</h2>
        <form method="post" action="">
            <input type="text" name="f_name" placeholder="student full name" required>
            <input type="text" name="grade" placeholder="student grade" id="">
            <input type="text" name="section" placeholder="student section" id="">
            <input type="text" name="mark" placeholder="mark 100%" required>
            <input type="submit" name="login" value="ADD">
        </form>
    </div>
        
    </div>
    <?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "abc_high_school";
$table = "students_mark";
$conn = NEW mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $f_name = ($_POST['f_name']);
    $grade = ($_POST['grade']);
    $section = ($_POST['section']);
    $mark = ($_POST['mark']);
    $stmt = $conn->prepare("INSERT INTO students_mark (f_name,grade,section,mark) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssss",$f_name,$grade,$section,$mark);
if (!$stmt->execute()) {
      die("Execute failed: " . $stmt->error);
} else {
  echo "<script>alert('  student mark add successful   ');
  window.location.href = 'manage_student_greade_crud/manage_students_gread.php';
  </script>";
}
}
$conn->close();
?>
</body>
</html>

