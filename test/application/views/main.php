<section class="home">
   		<div class="content">
   			<div class="outer">
   				<div class="details">
   					<h3>Hand picked book to your door.</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi. quod? Reiciendis ut porro iste totam.</p>
					<a href="/about" class="white-btn">Discover more</a>
   				</div>
   			</div>
   		</div>	
   	</section>
   	<section class="products">
	   <h1 class="title">latest products</h1>
	   <div class="box-container">
		  <?php  
			 $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
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
			  <input type="hidden" name="scroll" value="">
			  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
		  </form>
		  <?php
			 }
		  }else{
			 echo '<p class="empty">no products added yet!</p>';
		  }
		  ?>
	   </div>
	   <div class="load-more" style="margin-top: 2rem; text-align:center">
		  <a href="/shop" class="option-btn">Load More</a>
	   </div>
	</section>
   	<section class="about">
   		<div class="flex">
   			<div class="image">
   				<img src="images/about-img.jpg" alt="">
   			</div>
   			<div class="content">
   				<h3>About us</h3>
   				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi. quod? Reiciendis ut porro iste totam.</p>
   				<a href="/about" class="btn">Read more</a>
   			</div>
   		</div>
   	</section>
   	<section class="home-contact">
   		<div class="content">
   			<h3>Have any qustions?</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi. quod? Reiciendis ut porro iste totam.</p>
			<a href="/contacts" class="white-btn">Contact us</a>
   		</div>
   	</section>