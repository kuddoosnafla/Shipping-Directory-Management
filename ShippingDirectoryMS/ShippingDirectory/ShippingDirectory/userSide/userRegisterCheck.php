<?php

$emp_id  = $_POST['emp_id'];
$name = $_POST['name'];
$password = md5($_POST['password']);



$con = new mysqli("localhost", "root", "", "shippingdirectorydb");
if ($con->connect_error) {
    die('Connection Failed: ' . $con->connect_error);
} else {
    $stmt = $con->prepare("INSERT INTO userregister(emp_id, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $emp_id, $name, $password);
    $stmt->execute();
    echo "Registration successful...<br>";
    header('location: userLogin.php');
    $stmt->close();
    $con->close();
}



?>