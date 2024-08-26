<?php

include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="category">

   <h1 class="title">food category</h1>

   <div class="box-container">

      <a href="category.php?category=Momo" class="box">
         <img src="images/Cat1 Momo.png" alt="">
         <h3>Momo</h3>
      </a>

      <a href="category.php?category=Chowmein" class="box">
         <img src="images/Cat2 Chowmein.jpg" alt="">
         <h3>Chowmein</h3>
      </a>

      <a href="category.php?category=Biryani" class="box">
         <img src="images/Cat3 Biryani.jpg" alt="">
         <h3>Biryani</h3>
      </a>

      <a href="category.php?category=Burger" class="box">
         <img src="images/Cat4 Burger.jpg" alt="">
         <h3>Burger</h3>
      </a>

      <a href="category.php?category=Pizza" class="box">
         <img src="images/Cat5 Pizza.jpg" alt="">
         <h3>Pizza</h3>
      </a> 

      <a href="category.php?category=Fish" class="box">
         <img src="images/Cat6 Fish.jpg" alt="">
         <h3>Fish</h3>
      </a> 

      <a href="category.php?category=Dessert" class="box">
         <img src="images/Cat7 Dessert.jpg" alt="">
         <h3>Dessert</h3>
      </a> 

      <a href="category.php?category=Extras" class="box">
         <img src="images/Cat7 Extras.jpg" alt="">
         <h3>Extras</h3>
      </a> 

      <!-- <a href="category.php?category=Pizza" class="box">
         <img src="images/Cat5 Pizza.jpg" alt="">
         <h3>Pizza</h3>
      </a> -->

   </div>

</section>


<section class="products">

   <h1 class="title">Our latest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>NPR </span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">veiw all</a>
   </div>

</section>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>