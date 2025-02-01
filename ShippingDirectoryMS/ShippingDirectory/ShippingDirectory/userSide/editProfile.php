<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('location:userLogin.php'); // Redirect to login if not logged in
    exit();
}

// Database connection
$con = mysqli_connect('localhost', 'root', '', 'shippingdirectorydb');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user information from the database
$emp_id = $_SESSION['user'];
$sql = "SELECT * FROM userregister WHERE emp_id='$emp_id'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);

if (!$user) {
    echo "User not found.";
    exit();
}

// Update profile
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Update the user details in the database
    $updateSql = "UPDATE userregister SET name='$name', password='$password' WHERE emp_id='$emp_id'";
    
    if (mysqli_query($con, $updateSql)) {
        echo "<script>alert('Profile updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($con) . "');</script>";
    }

    // Refresh user data
    $sql = "SELECT * FROM userregister WHERE emp_id='$emp_id'";
    $query = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="ISO-8859-1">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/editProfile.css"> <!-- Link to your CSS file -->
</head>
<body>
    <!-- Include Header -->
    <?php include 'headerLogoutt.php'; ?>

    <div class="containerEditProfile">
        <h1>Edit Profile</h1>
        <div class="editProfileContent">
            <form action="" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your Name" value="<?php echo htmlspecialchars($user['name']); ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter new Password" required="required">
                </div>
                <button type="submit" class="updateBtn" name="update">Update</button>
            </form>
            <div class="cancelLink">
                <a href="userProfile.php">Cancel</a>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
