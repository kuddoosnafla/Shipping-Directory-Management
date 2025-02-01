<?php    
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user'])) {
    header('location:userLogin.php'); // Redirect to login page if not logged in
    exit();
} 
include 'dbconfig.php'; 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sri Lanka Ports Authority</title>
    <link rel="icon" type="image/x-icon" href="https://www.slpa.lk//favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .action-btns a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .edit_btn {
            background-color: #007BFF;
        }

        .del_btn {
            background-color: #DC3545;
        }

        .logout-button {
            background-color: #DC3545;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .logout-button:hover {
            background-color: #C82333;
        }

        .container {
            padding-top: 50px; /* Adjust this to move the content down */
        }
    </style>

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[5]; // Search by Category Name
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</head>

<body>

    <!-- Include Header -->
    <?php include 'headerLogoutt.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center">Shipping Directory</h2>

        <!-- Logout button -->
        <div class="text-center mb-4">
            <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Search Bar -->
        <div class="form-group">
            <input type="text" id="search" class="form-control" onkeyup="searchTable()" placeholder="Search for category...">
        </div>

        <!-- Display messages if any -->
        <?php include('messages.php'); ?>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Certified</th>
                        <th>Category Name</th>
                        <th>Email</th>
                        <th>Tell</th>
                        <th>Fax</th>
                        <th>Website</th>
                        <th>Home Address</th>
                        <th>Link Name</th>
                        <th>Link URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM form_responses";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $form_responses) {
                    ?>
                            <tr>
                                <td><?= $form_responses['id']; ?></td>
                                <td><?= $form_responses['companyname']; ?></td>
                                <td><?= $form_responses['name']; ?></td>
                                <td><?= $form_responses['address']; ?></td>
                                <td><?= $form_responses['certified']; ?></td>
                                <td><?= $form_responses['categoryName']; ?></td>
                                <td><?= $form_responses['email']; ?></td>
                                <td><?= $form_responses['tell']; ?></td>
                                <td><?= $form_responses['fax']; ?></td>
                                <td><?= $form_responses['website']; ?></td>
                                <td><?= $form_responses['homeaddress']; ?></td>
                                <td><?= $form_responses['linkname']; ?></td>
                                <td><a href="<?= $form_responses['link']; ?>" target="_blank"><?= $form_responses['link']; ?></a></td>
                                <td class="action-btns">
                                    <a href="Edit.php?id=<?= $form_responses['id']; ?>" class="btn btn-primary edit_btn">Update</a>
                                    <a href="Remove.php?id=<?= $form_responses['id']; ?>" class="btn btn-danger del_btn">Remove</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='14'>No Records Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Include footer -->
    <?php include 'footer.php'; ?>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
