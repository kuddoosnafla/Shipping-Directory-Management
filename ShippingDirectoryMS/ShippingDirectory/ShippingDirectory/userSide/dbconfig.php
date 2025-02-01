<?php
    // Create DB Connection
    $con = mysqli_connect("localhost","root","","shippingdirectorydb");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
 ?>