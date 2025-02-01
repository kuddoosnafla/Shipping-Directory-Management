<?php 
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user'])) {
    header('location:adminLogin.php');
    exit();
}

// Database connection
include 'dbconfig.php'; // Make sure the connection is established properly

// Handle user deletion
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $delete_query = "DELETE FROM userregister WHERE emp_id='$user_id'";
    mysqli_query($con, $delete_query); // Make sure to use $conn
    header('location:manage_users.php'); // Redirect to refresh the page after deletion
}

// Fetch all users from the database
$query = "SELECT * FROM userregister";
$result = mysqli_query($con, $query); // Make sure to use $conn

// Check for query errors
if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    <!-- Add CSS for managing users page -->
    <style>
        <?php include 'css/manage_users.css'; ?>
    </style>
</head>

<body>

    <!-- include header -->
    <?php include 'headerLogoutt.php'; ?>

    <div class="container">
        <h1>Manage Users</h1>

        <!-- Display Users in a Table -->
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['emp_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>
                            <a href="edit_user.php?emp_id=<?php echo $row['emp_id']; ?>">Edit</a> |
                            <a href="manage_users.php?delete=<?php echo $row['emp_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add New User Link -->
        <p>
            <a href="add_user.php" class="add-user-link">Add New User</a>
        </p>
    </div>

    <!-- include footer -->
    <?php include 'footer.php'; ?>

</body>

</html>
