<?php
// Include database connection file
include '../components/connect.php';

// Start or resume session
session_start();

// Check if the login form was submitted
if (isset($_POST['submit'])) {
    // Sanitize the input for name and password
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    // Query to select admin from the database where name and password match
    $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
    $select_admin->execute([$name, $pass]);

    // Check if a matching admin is found
    if ($select_admin->rowCount() > 0) {
        // Set admin ID to the session and redirect to the dashboard
        $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
        $_SESSION['admin_id'] = $fetch_admin_id['id'];
        header('location:dashboard.php');
    } else {
        // If no match is found, add an error message
        $message[] = 'incorrect username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Include Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Include custom CSS file -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php
// Display any error messages
if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<!-- Admin login form section -->
<section class="form-container">
    <form action="" method="POST">
        <h3>Login</h3>
        <!-- Input fields for username and password -->
        <input type="text" name="name" maxlength="100" required placeholder="Enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="pass" maxlength="50" required placeholder="Enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <!-- Submit button for the login form -->
        <input type="submit" value="login now" name="submit" class="btn">
    </form>
</section>
<!-- Admin login form section ends -->

</body>
</html>
