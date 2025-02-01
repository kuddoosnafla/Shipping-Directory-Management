<?php 
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user'])) {
    header('location:adminLogin.php');
    exit();
}

// Database connection
include 'dbconfig.php'; // Make sure the connection is established properly

// Handle user addition
if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $stmt = $con->prepare("INSERT INTO userregister(emp_id, name, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $emp_id, $name, $password);

    if ($stmt->execute()) {
        echo "User added successfully!";
        header('location:manage_users.php'); // Redirect to manage users after successful addition
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        <?php include 'css/add_user.css'; // Include your CSS file ?>
    </style>
</head>
<body>

    <!-- include header -->
    <?php include 'headerLogoutt.php'; ?>

    <div class="container">
        <h1>Add New User</h1>
        <form action="" method="post">
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="emp_id" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="submit">Add User</button>
        </form>
    </div>

    <!-- include footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
