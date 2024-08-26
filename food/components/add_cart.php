<?php

if(isset($_POST['add_to_cart'])){ // Check if the 'add_to_cart' button has been clicked

   if($user_id == ''){ // If the user ID is empty, redirect to the login page
      header('location:login.php');
   }else{

      // Retrieve and sanitize the product details from the form
      $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
      $image = filter_var($_POST['image'], FILTER_SANITIZE_STRING);
      $qty = filter_var($_POST['qty'], FILTER_SANITIZE_STRING);

      // Check if the product is already in the user's cart
      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'Already added to cart!'; // If it's already in the cart, display a message
      }else{
         // If it's not in the cart, insert the product into the cart table
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = 'Added to cart!'; // Display a message indicating the product was added to the cart
      }

   }

}
?>
