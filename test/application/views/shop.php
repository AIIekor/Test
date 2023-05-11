<?php

include 'config/config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'Product added to cart!';
   }

}

?>

<div class="heading">
		<h3>Our shop</h3>
		<p><a href="/main">Home</a> / Shop</p>
	</div>
<section class="products">
	   <h1 class="title">latest products</h1>
	   <div class="box-container">
		  <?php  
			 $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
			 if(mysqli_num_rows($select_products) > 0){
				while($fetch_products = mysqli_fetch_assoc($select_products)){
		  ?>
		  <form action="" method="post" class="box">
			  <a href="/product"><img class="image" src="images/<?php echo $fetch_products['image']; ?>" alt=""></a>
			  <div class="name"><a href="/product"><?php echo $fetch_products['name']; ?></a></div>
			  <div class="price">$<?php echo $fetch_products['price']; ?></div>
			  <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
			  <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
			  <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
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