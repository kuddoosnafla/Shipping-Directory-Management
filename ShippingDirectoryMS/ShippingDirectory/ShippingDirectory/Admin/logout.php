<?php
session_start();
session_destroy(); // Destroy the session data
header('location:adminLogin.php'); // Redirect to login page
exit();
?>
