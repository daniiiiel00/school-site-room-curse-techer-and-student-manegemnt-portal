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
    <title>rigesterd students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

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
<a href="../techer_dashboard.php" class="logout-btn">Add new students mark</a>


<h2> students mark</h2>

<table>
    <thead>
        <tr>
                <th>ID</th>
            <th>student full Name</th>
            <th>student gread</th>
            <th>student section</th>
            <th>student mark 100%</th>
            <th>Actions</th>
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
            <td>
                <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>

    </tbody>
</table>

</body>
</html>

<?php $conn->close(); ?>
