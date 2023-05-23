<?php

@include 'config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Hello ka-Brew!</span>
         <h3>WELCOME TO OUR ONLINE SHOP</h3>
         <p>A bad day with coffee is better than a good day without it.</p>
         <a href="" class="btn">about us</a>
      </div>

   </section>

</div>

<!-- <section class="home-category">

   <h1 class="title">shop by category</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/hot_coffee.webp" alt="">
         <h3>Hot</h3>
         <p></p>
         <a href="category.php?category=HOT" class="btn">Hot</a>
      </div>

      <div class="box">
         <img src="images/iced_coffee.jpg" alt="">
         <h3>Cold</h3>
         <p></p>
         <a href="category.php?category=ICED" class="btn">Cold</a>
      </div>

      <div class="box">
         <img src="images/pastries.webp" alt="">
         <h3>Pastries</h3>
         <p></p>
         <a href="category.php?category=PASTRIES/BREAD" class="btn">Pastries</a>
      </div>

      

   </div>

</section> -->

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">₱<span><?= $fetch_products['price']; ?></span></div>
      
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="category"><?= $fetch_products['category']; ?></div>
      <div class="details"><?= $fetch_products['details']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

</section>
<script src="js/script.js"></script>

</body>
</html>