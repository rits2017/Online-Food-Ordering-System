<?php

include 'connect.php'; // Include the connection file to connect to the database

session_start(); // Start the session to access session variables
session_unset(); // Unset all the session variables
session_destroy(); // Destroy the session to log the user out

header('location:../home.php'); // Redirect the user to the home page after logging out

?>
