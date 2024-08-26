<?php
// Connect to the database
include '../components/connect.php';

// Start a new session or resume the existing session
session_start();

// Retrieve the admin ID from the session
$admin_id = $_SESSION['admin_id'];

// If the admin is not logged in, redirect to the login page
if (!isset($admin_id)) {
    header('location:admin_login.php');
}

// If a delete request is received, delete the specified admin account
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_admin = $conn->prepare("DELETE FROM `admin` WHERE id = ?");
    $delete_admin->execute([$delete_id]);
    header('location:admin_accounts.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding, browser compatibility, and viewport settings -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins Accounts</title>

    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Link to a custom CSS file for styling -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php
// Include the admin header component
include '../components/admin_header.php';
?>

<!-- Section for managing admin accounts -->
<section class="accounts">
    <h1 class="heading">Admins Account</h1>
    <div class="box-container">

        <!-- Button for registering a new admin -->
        <div class="box">
            <p>Register New Admin</p>
            <a href="register_admin.php" class="option-btn">Register</a>
        </div>

        <?php
        // Query to select all admin accounts from the database
        $select_account = $conn->prepare("SELECT * FROM `admin`");
        $select_account->execute();
        
        // If there are admin accounts, display them
        if ($select_account->rowCount() > 0) {
            while ($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <!-- Box for each admin account -->
                <div class="box">
                    <p>Admin ID: <span><?= $fetch_accounts['id']; ?></span></p>
                    <p>Username: <span><?= $fetch_accounts['name']; ?></span></p>
                    <div class="flex-btn">
                        <!-- Button to delete an admin account -->
                        <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('Delete this account?');">Delete</a>
                        <?php
                        // If the admin account is the current user, show the update button
                        if ($fetch_accounts['id'] == $admin_id) {
                            echo '<a href="update_profile.php" class="option-btn">Update</a>';
                        }
                        ?>
                    </div>
                </div>
        <?php
            }
        } else {
            // Message if there are no admin accounts
            echo '<p class="empty">No accounts available</p>';
        }
        ?>

    </div>
</section>

<!-- Link to custom JavaScript file -->
<script src="../js/admin_script.js"></script>

</body>
</html>
