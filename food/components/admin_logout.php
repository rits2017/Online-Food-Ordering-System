<?php

include 'connect.php'; // Include the connection file to connect to the database

session_start(); // Start the session to access session variables

session_unset(); // Unset all the session variables

session_destroy(); // Destroy the session, effectively logging the user out

header('location:../admin/admin_login.php'); // Redirect the user to the admin login page

?>
