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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO-8859-1">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/userProfile.css"> <!-- Link to your CSS file -->
</head>

<body>

    <!-- Include Header -->
    <?php include 'headerLogoutt.php'; ?>

    <div class="containerProfile">
        <h1>User Profile</h1>
        <div class="profileContent">
            <div class="profileInfo">
                <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
                <p><strong>Employee ID:</strong> <?php echo htmlspecialchars($user['emp_id']); ?></p>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <!-- You can add more user details here -->
            </div>
            <div class="profileActions">
                <a href="editProfile.php">Edit Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
