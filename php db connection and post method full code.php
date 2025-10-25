 <?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "test";
$table = "customers_registration";
$conn = NEW mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = ($_POST['firstname']);
     $lastname = ($_POST['lastname']);
    $email = ($_POST['email']);
    $phonenumber = ($_POST['phonenumber']);
    $address =($_POST['address']);
    $birthdate =($_POST['birthdate']);
    $gender =($_POST['gender']);
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $stmt = $conn->prepare("INSERT INTO customers_registration (firstname,lastname,email,phonenumber,address,birthdate,gender,user_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssssssss", $firstname,$lastname,$email,$phonenumber,$address,$birthdate,$gender,$user_ip);
if (!$stmt->execute()) {
      die("Execute failed: " . $stmt->error);
} else {
  echo "<script>alert('Your Registration successful   ');
  window.location.href = '#';
  </script>";
}
}
$conn->close();
?>