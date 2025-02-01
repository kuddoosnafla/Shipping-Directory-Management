<?php 
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user'])) {
    header('location:adminLogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sri Lanka Ports Authority - Shipping Directory</title>
    <link rel="icon" type="image/x-icon" href="https://www.slpa.lk//favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        <?php include 'css/index.css'; ?>
    </style>
</head>

<body>
    <?php include 'headerLogoutt.php'; ?>

    <section class="sec-padding single-service-page">
        <div class="thm-container">
            <div class="row">
               

                <div class="col-md-8 pull-right">
                    <div class="sec-title">
                        <h2><span> SHIPPING DIRECTORY</span></h2>
                    </div>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Fax</th>
                                <th>Website</th>
                                <th>Home Address</th>
                                <th>Link Name</th>
                                <th>Link</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Database connection
                        $conn = new mysqli('localhost', 'root', '', 'shippingdirectorydb');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Query to get the data from the table
                        $sql = "SELECT companyname, name, address, email, tell, fax, website, homeaddress, linkname, link, categoryName FROM form_responses";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data for each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['companyname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['tell']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['fax']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['website']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['homeaddress']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['linkname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['link']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['categoryName']) . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="11" class="text-center">No records found</td></tr>';
                        }

                        // Close the connection
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
