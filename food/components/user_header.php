<?php
// If there are messages, display them
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <!-- Start of header section -->

   <section class="flex">
      <!-- Flex container for the header elements -->

      <a href="home.php" class="logo">Chhapiya Fish Village Resort</a> <!-- Logo and link to the home page -->

      <nav class="navbar">
         <!-- Navigation bar with links to various pages -->
         <a href="home.php">HOME</a>
         <a href="about.php">ABOUT</a>
         <a href="menu.php">MENU</a>
         <a href="orders.php">ORDERS</a>
         <!-- <a href="contact.php">CONTACT</a> -->
      </nav>

      <div class="icons">
         <!-- Icons and actions for search, cart, user, and menu -->
         <?php
            // Query to count the number of items in the user's cart
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a> <!-- Search icon and link -->
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a> <!-- Shopping cart icon and link with total items count -->
         <div id="user-btn" class="fas fa-user"></div> <!-- User icon -->
         <div id="menu-btn" class="fas fa-bars"></div> <!-- Menu icon -->
      </div>

      <div class="profile">
         <!-- Profile section with user details and options -->
         <?php
            // Query to select the user's profile
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p> <!-- Display user's name -->
         <div class="flex">
            <a href="profile.php" class="btn">profile</a> <!-- Profile link -->
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a> <!-- Logout link -->
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">Please login first!!</p> <!-- Prompt to login if not logged in -->
            <a href="login.php" class="btn">login</a> <!-- Login link -->
         <?php
          }
         ?>
      </div>

   </section>
</header>
