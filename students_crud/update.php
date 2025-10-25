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

// Get the record by ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();
}

// Handle Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $u_name = $conn->real_escape_string($_POST['u_name']);
    $f_name = $conn->real_escape_string($_POST['f_name']);
    $grade = $conn->real_escape_string($_POST['grade']);
    $section = $conn->real_escape_string($_POST['section']);
    $password = $conn->real_escape_string($_POST['password']);

    $conn->query("UPDATE students SET u_name='$u_name', f_name='$f_name', grade='$grade', section='$section', password='$password' WHERE id=$id");

    header("Location: students_view.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        /* Reset and General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Responsive Form Container */
        .form-container {
            background: white;
            max-width: 500px;
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Buttons */
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-update {
            background: #575d63;
            color: white;
        }

        .btn-back {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .form-container {
                width: 95%;
                padding: 15px;
            }

            input, .btn {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<h2>Edit </h2>

<div class="form-container">
    <form method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        
        <label>user Name:</label>
        <input type="text" name="u_name" value="<?= htmlspecialchars($row['u_name']) ?>" required>
        
        <label>full name:</label>
        <input type="text" name="f_name" value="<?= htmlspecialchars($row['f_name']) ?>" required>
        
        <label>grade:</label>
        <input type="text" name="grade" value="<?= htmlspecialchars($row['grade']) ?>" required>

        <label>section:</label>
        <input type="text" name="section" value="<?= htmlspecialchars($row['section']) ?>" required>

        <label>Password:</label>
        <input type="text" name="password" value="<?= htmlspecialchars($row['password']) ?>" required>
        
        <button type="submit" class="btn btn-update">Update</button>
    </form>

   
</div>

</body>
</html>

<?php $conn->close(); ?>
