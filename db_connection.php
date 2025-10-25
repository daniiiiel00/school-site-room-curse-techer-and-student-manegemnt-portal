<?php
//db connection code
$serevername ="localhost";
$username ="root";
$password ="";
$dbname ="test";

$conn = new mysqli($serevername,$username,$password,$dbname);
if($conn->connect_error){
die("erorr" .$conn->connect_error);

}


//inserting code on php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$fname =($_POST['fname']);
$lname =($_POST['lname']);
$stmt = $conn->prepare("INSERT INTO test(fname,lname) VALUES (?,?)"); 

if ($stmt === false){
die("faild" .$conn->error);
}
$stmt->bind_param("ss", $fname,$lname);
if (!$stmt->execute()){
    die("error" .$stmt->error);
}else{
    echo("sucsses");
}
}
$conn->close();




?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <form action="" method="post">
    <p>f name</p>
    <input type="text" name="fname" id="">
    <p>l name</p>
    <input type="text" name="lname" id="">
    <button type="submit">send</button>
    </form>
</body>
</html>

