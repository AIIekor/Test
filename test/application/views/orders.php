<?php

include 'config/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:/login');
}

?>

<div class="heading">
	 	<h3>Placed orders</h3>
		<p><a href="/main">Home</a> / Orders</p>
	</div>
<section class="placed-orders">
    	<h1 class="title">Placed orders</h1>
    	<div class="box-container">
    		<?php
				$order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('order failed');
				if(mysqli_num_rows($order_query)>0){
					while($fetch_orders = mysqli_fetch_assoc($order_query)){
			?>
  			<div class="box">
  				<p>Placen on: <span><?php echo $fetch_orders['placed_on']?></span></p>
				<p>Name: <span><?php echo $fetch_orders['name']?></span></p>
				<p>Number: <span><?php echo $fetch_orders['number']?></span></p>
				<p>Email: <span><?php echo $fetch_orders['email']?></span></p>
				<p>Address: <span><?php echo $fetch_orders['adress']?></span></p>
				<p>Payment method: <span><?php echo $fetch_orders['method']?></span></p>
				<p>Your orders: <span><?php echo $fetch_orders['total_products']?></span></p>
				<p>Total price: <span>$<?php echo $fetch_orders['total_price']?>/-</span></p>
				<p>Payment status: <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'red';}else{ echo 'green'; }?>"><?php echo $fetch_orders['payment_status']?></span></p>
  			</div>
   			<?php
					}
				}else{
					echo '<p class="empty">No orders yet!</p>';
				}
			?>
    	</div>
</section>