<?php

$db_name = 'mysql:host=localhost;dbname=food_db'; // Define the database connection string, including the host and database name
$user_name = 'root'; // Define the database username
$user_password = ''; // Define the database user's password (empty in this case)

$conn = new PDO($db_name, $user_name, $user_password); // Create a new PDO instance to connect to the database

?>
