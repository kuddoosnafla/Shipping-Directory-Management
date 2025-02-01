<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user'])) {
    header('location:adminLogin.php');
    exit();
}

// Database connection
include 'dbconfig.php';

// Fetch user data to be edited
$emp_id = $_GET['emp_id'];
$query = "SELECT * FROM userregister WHERE emp_id='$emp_id'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Update the user details after the form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']);
        $update_query = "UPDATE userregister SET name='$name', password='$password' WHERE emp_id='$emp_id'";
    } else {
        $update_query = "UPDATE userregister SET name='$name' WHERE emp_id='$emp_id'";
    }

    mysqli_query($con, $update_query);
    header('location:manage_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!-- Add your CSS -->
    <style>
        <?php include 'css/edit_user.css'; ?>
    </style>
</head>

<body>

    <!-- include header -->
    <?php include 'headerlogoutt.php'; ?>

    <div class="container">
        <h1>Edit User</h1>

        <form action="" method="POST">
            <div>
                <label>Employee ID</label>
                <input type="text" name="emp_id" value="<?php echo $user['emp_id']; ?>" disabled>
            </div>

            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            </div>

            <div>
                <label>New Password (Leave blank if not changing)</label>
                <input type="password" name="password">
            </div>

            <div>
                <button type="submit" name="submit">Update User</button>
            </div>
        </form>
    </div>

    <!-- include footer -->
    <?php include 'footer.php'; ?>

</body>

</html>
