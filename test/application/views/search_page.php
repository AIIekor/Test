<?php

include 'config/config.php';
session_start();

$user_id = $_SESSION['user_id'];

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
	 	<h3>Placed orders</h3>
		<p><a href="/main">Home</a> / Search</p>
	</div>
    <section class="search-form">
   		<form action="" method="post">
   			<input type="text" name="search" placeholder="search products..." class="box">
   			<input type="submit" name="submit" value="search" class="btn"> 
   		</form>	
    </section>
    <section class="products" style="padding-top: 0;">
    	<div class="box-container">
    		<?php
				if(isset($_POST['submit'])){
					$searc_item = $_POST['search'];
					$select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$searc_item}%'") or die('query failed');
			 		if(mysqli_num_rows($select_products) > 0){
						while($fetch_products = mysqli_fetch_assoc($select_products)){ 
			?>
  			<form action="" method="post" class="box">
				<img class="image" src="images/<?php echo $fetch_products['image']; ?>" alt="">
				<div class="name"><?php echo $fetch_products['name']; ?></div>
				<div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
				<input type="number" min="1" name="product_quantity" value="1" class="qty">
				<input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
				<input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
				<input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
				<input type="submit" value="add to cart" name="add_to_cart" class="btn">
			</form>
   			<?php
						}
					}else{
					 echo '<p class="empty">No result found!</p>';
					}
				}else{
					echo '<p class="empty">Search something!</p>';
				}				
			?>
    	</div>
</section>