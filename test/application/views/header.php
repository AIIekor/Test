<?php
include 'config/config.php';
session_start();

if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
           <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
};


$user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_cart'])){
	if($user_id > 0){
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
	} else{
	$message[] = 'You need to login first!';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Cpmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Home</title> 
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
	<div class="header-1">
		<div class="flex">
			<div class="share">
				<a href="#" class="fab fa-facebook-f"></a>
				<a href="#" class="fab fa-telegram"></a>
				<a href="#" class="fab fa-vk"></a>
				<a href="#" class="fab fa-instagram"></a>
			</div>
			<p>New <a href="/login">Login</a> | <a href="/register">Register</a></p>
		</div>
	</div>
	
	<div class="header-2">
		<div class="flex">
			<a href="/main" class="logo">Books#1</a>
			<nav class="navbar">
				<a href="/main">Home</a>
				<a href="/about">About</a>
				<a href="/shop">Shop</a>
				<a href="/contacts">Contacts</a>
				<a href="/orders">Orders</a>
			</nav>
			<div class="icons">
				<div id="menu-btn" class="fas fa-bars"></div>
				<a href="/search_page" class="fas fa-search"></a>
				<div id="user-btn" class="fas fa-user">
					<?php
					   $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
					   $cart_rows_number = mysqli_num_rows($select_cart_number); 
					?>
				</div>
				<a href="/cart"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
			</div>
			<div class="user-box">
				<p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
         		<p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
				<a href="/logout" class="delete-btn">Logout</a>
			</div>
		</div>
	</div>
</header>