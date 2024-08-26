<?php

include '../components/connect.php'; // Include the database connection to allow queries to the database

session_start(); // Start the session to keep track of user information across pages

$admin_id = $_SESSION['admin_id']; // Retrieve admin ID to identify the logged-in user

// Check if the admin ID is not set, to ensure that only logged-in admins can access the dashboard
if (!isset($admin_id)) {
    header('location:admin_login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Include external CSS for styling, to make the page visually appealing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

<?php include '../components/admin_header.php' // Include the header for consistent navigation across the admin panel ?>

<!-- Admin dashboard section starts, for displaying the overview and managing various aspects -->
<section class="dashboard">

    <h1 class="heading">ADMIN DASHBOARD</h1>

    <div class="box-container">

        <!-- Welcome box to make the user feel recognized -->
        <div class="box">
            <h3>Welcome!!</h3>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn">update profile</a>
        </div>

        <!-- Box to show pending payments, for tracking unpaid orders -->
        <div class="box">
            <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);
            while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                $total_pendings += $fetch_pendings['total_price'];
            }
            ?>
            <h3><span>NPR </span><?= $total_pendings; ?><span>/-</span></h3>
            <p>Total Pendings</p>
            <a href="placed_orders.php" class="btn">see orders</a>
        </div>



        <div class="box">
    <?php
    // Initialize the variable to keep track of total completed orders
    $total_completes = 0;

    // Prepare a SQL query to select all orders with payment status 'completed'
    $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");

    // Execute the query with 'completed' as a parameter
    $select_completes->execute(['completed']);

    // Loop through the results and accumulate the total price of completed orders
    while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
        $total_completes += $fetch_completes['total_price'];
    }
    ?>

    <!-- Display the total price of completed orders -->
    <h3><span>NPR </span><?= $total_completes; ?><span>/-</span></h3>
    <p>Sales Revenue</p>
    <!-- Link to see details of completed orders -->
    <a href="placed_orders.php" class="btn">see orders</a>
</div>



<div class="box">
    <?php
    // Prepare a SQL query to select all orders
    $select_orders = $conn->prepare("SELECT * FROM `orders`");

    // Execute the query
    $select_orders->execute();

    // Count the number of rows (orders) returned
    $numbers_of_orders = $select_orders->rowCount();
    ?>

    <!-- Display the total number of orders -->
    <h3><?= $numbers_of_orders; ?></h3>
    <p>Total Orders</p>
    <!-- Link to see details of the orders -->
    <a href="placed_orders.php" class="btn">see orders</a>
</div>

<div class="box">
    <?php
    // Prepare a SQL query to select all products
    $select_products = $conn->prepare("SELECT * FROM `products`");

    // Execute the query
    $select_products->execute();

    // Count the number of rows (products) returned
    $numbers_of_products = $select_products->rowCount();
    ?>

    <!-- Display the total number of products added -->
    <h3><?= $numbers_of_products; ?></h3>
    <p>Products Added</p>
    <!-- Link to see details of the products -->
    <a href="products.php" class="btn">see products</a>
</div>

<div class="box">
    <?php
    // Prepare a SQL query to select all users
    $select_users = $conn->prepare("SELECT * FROM `users`");

    // Execute the query
    $select_users->execute();

    // Count the number of rows (users) returned
    $numbers_of_users = $select_users->rowCount();
    ?>

    <!-- Display the total number of user accounts -->
    <h3><?= $numbers_of_users; ?></h3>
    <p>Users Accounts</p>
    <!-- Link to see details of the users -->
    <a href="users_accounts.php" class="btn">see users</a>
</div>

<div class="box">
    <?php
    // Prepare a SQL query to select all admins
    $select_admins = $conn->prepare("SELECT * FROM `admin`");

    // Execute the query
    $select_admins->execute();

    // Count the number of rows (admins) returned
    $numbers_of_admins = $select_admins->rowCount();
    ?>

    <!-- Display the total number of admin accounts -->
    <h3><?= $numbers_of_admins; ?></h3>
    <p>Admins</p>
    <!-- Link to see details of the admins -->
    <a href="admin_accounts.php" class="btn">see admins</a>
</div>

<!-- <div class="box"> -->
    <?php
    // Prepare a SQL query to select all messages
    // $select_messages = $conn->prepare("SELECT * FROM `messages`");

    // Execute the query
    // $select_messages->execute();

    // Count the number of rows (messages) returned
    // $numbers_of_messages = $select_messages->rowCount();
    ?>

    <!-- Display the total number of new messages -->
    <!-- <h3><?= $numbers_of_messages; ?></h3> -->
    <!-- <p>New Messages</p> -->
    <!-- Link to see details of the messages -->
    <!-- <a href="messages.php" class="btn">see messages</a> -->
<!-- </div> -->

</div>

</section>

<!-- The admin dashboard section ends here -->


<!-- Link to custom JavaScript file -->
<script src="../js/admin_script.js"></script>

</body>
</html>
