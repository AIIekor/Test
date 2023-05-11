<?php

include 'config/config.php';
session_start();

$user_id = $_SESSION['user_id'];
$fetch_products = $_GET['id'];

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}
?>

<div class="heading">
      <h3>Our shop</h3>
      <p><a href="/main">Home</a> / Shop</p>
</div>
<section class="product">
      <?php  
       $select_product = mysqli_query($conn, "SELECT * FROM `product` WHERE products_id = '$fetch_products'") or die('query failed');
       if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
      ?>
      <h1 class="title"><?php echo $fetch_product['name']; ?></h1>
      <div class="box-container">
        <form action="" method="post" class="box">
           <div class="top-img">
              <img class="image" src="images/<?php echo $fetch_product['image']; ?>" alt="">
           </div>
           <div class="top-info">
              <div class="name">Name: <span><?php echo $fetch_product['name']; ?></span></div>
              <div class="author">Author: <span><?php echo $fetch_product['author']; ?></span></div>
              <div class="pages">Pages: <span><?php echo $fetch_product['pages']; ?></span></div>
              <div class="publisher">Publisher: <span><?php echo $fetch_product['publisher']; ?></span></div>
              <div class="price">Price: <span>$<?php echo $fetch_product['price']; ?></span></div>
           </div>
           <div class="bottom-info">
               <div class="description"><?php echo $fetch_product['description']; ?></div>
           </div>
           <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
           <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
           <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
           <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
        <?php
             }
           }else{
             echo '<p class="empty">no products added yet!</p>';
           }
        ?>
      </div>
</section>