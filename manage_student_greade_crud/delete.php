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

// Delete record by ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM students_mark WHERE id=$id");
}

// Redirect to index.php
header("Location: manage_students_gread.php");
exit();

?>
