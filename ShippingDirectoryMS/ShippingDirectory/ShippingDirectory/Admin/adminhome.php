<?php  
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user'])) {
    header('location:adminLogin.php');
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shippingdirectorydb"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total users
$totalUsersQuery = "SELECT COUNT(*) AS totalUsers FROM userregister";
$totalUsersResult = $conn->query($totalUsersQuery);
$totalUsers = $totalUsersResult->fetch_assoc()['totalUsers'];

// Fetch total categories
$totalCategoriesQuery = "SELECT COUNT(*) AS totalCategories FROM categorynamelist";
$totalCategoriesResult = $conn->query($totalCategoriesQuery);
$totalCategories = $totalCategoriesResult->fetch_assoc()['totalCategories'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <style>
        <?php include 'css/adminhome.css'; ?>

        .logout-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #ff3333;
        }

        /* Centering and Styling Card Container */
        .card-container {
            display: flex;
            gap: 20px;
            justify-content: center; /* Centers the cards horizontally */
            align-items: center; /* Centers the cards vertically */
            margin-top: 50px;
        }

        .card {
            background-color: #fdfdfd;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 200px;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05); /* Adds a subtle zoom effect on hover */
        }

        .card h2 {
            font-size: 30px;
            color: #333;
            margin: 0;
        }

        .card p {
            font-size: 18px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php include 'headerLogoutt.php'; ?>

    <div class="welcome-container">
        <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
        <p>You have successfully logged in to the admin panel.</p>

        <!-- Centered Card Section for Total Users and Total Categories -->
        <div class="card-container">
            <div class="card">
                <h2><?php echo $totalUsers; ?></h2>
                <p>Total Users</p>
            </div>
            <div class="card">
                <h2><?php echo $totalCategories; ?></h2>
                <p>Total Categories</p>
            </div>
        </div>

        <div class="admin-options">
            <form action="logout.php" method="POST">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
