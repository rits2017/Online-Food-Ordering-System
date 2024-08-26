<?php
// Include the connection file
include 'components/connect.php';

// Start a new session
session_start();

// Check if the user ID is set in the session; otherwise, set it to an empty string
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8"> <!-- Character encoding for the HTML document -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Specifies rendering mode for Internet Explorer -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta tag for responsive design -->
   <title>About</title> <!-- Title of the webpage -->

   
   <!-- Link to Font Awesome for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Link to the custom CSS file -->
   <link rel="stylesheet" href="css/style.css">
</head>





<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>About Us</h3>
   <p><a href="home.php">Home</a> <span> / About</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p> At Chhapiya Fish Village Resort, we believe in delivering not just food, but an exceptional dining experience right to your doorstep.
          Our chefs create culinary masterpieces using only the freshest ingredients,
         ensuring that every bite is a taste sensation. We're committed to delivering your favorite meals hot and fresh, 
          right when you want them, through our state-of-the-art online food ordering platform. </p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/Step1 Choose Order.png" alt="">
         <h3>choose order</h3>
         <p>Choosing and placing an order at Chhapiya Fish Village Resort through our desktop website is effortless and convenient. 
            Start by visiting our website on your computer, where our extensive and diverse menu awaits.
         </p>
      </div>

      <div class="box">
         <img src="images/Step2 Fast delivery.png" alt="">
         <h3>fast delivery</h3>
         <p>Choosing and placing an order at Chhapiya Fish Village Resort through our desktop website is effortless and convenient.
          Start by visiting our website on your computer, where our extensive and diverse menu awaits.</p>
      </div>

      <div class="box">
         <img src="images/Step3 Enjoy food.jpg" alt="">
         <h3>enjoy food</h3>
         <p>Choosing and placing an order at Chhapiya Fish Village Resort through our desktop website is effortless and convenient. 
         Start by visiting our website on your computer, where our extensive and diverse menu awaits.
         </p>
      </div>

   </div>

</section>


<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>