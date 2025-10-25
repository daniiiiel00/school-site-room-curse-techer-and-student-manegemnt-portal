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

// Fetch Data
$sql = "SELECT * FROM students_mark";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>students dashboard</title>
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

        /* table*/
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #575d63;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #ddd;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit {
            background: #28a745;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Click-to-Call Styling */
        .phone-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .phone-link:hover {
            text-decoration: underline;
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
        <a href="#"><i class="fas fa-school"></i> continue learning</a>
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
        <table>
    <thead>
        <tr>
                <th>student ID</th>
            <th>student full Name</th>
            <th>student gread</th>
            <th>student section</th>
            <th>student mark 100%</th>
          
        </tr>
    </thead>
    <tbody>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['f_name']) ?></td>
            <td><?= htmlspecialchars($row['grade']) ?></td>
            <td><?= htmlspecialchars($row['section']) ?></td>
            <td><?= htmlspecialchars($row['mark']) ?></td>
          
        </tr>
    <?php endwhile; ?>

    </tbody>
</table>


</body>
</html>

<?php $conn->close(); ?>

