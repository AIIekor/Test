<?php

include 'config/config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}
if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $adress = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND adress = '$adress' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, adress, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$adress', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}
?>   

    <div class="heading">
        <h3>Checkout</h3>
        <p><a href="/main">Home</a> / Checkout</p>
    </div>
    <section class="display-order">
        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart)>0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price; 
        ?>
        <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'] . '/- x ' . $fetch_cart['quantity'];?>) </span> </p>
        <?php       
                }
            }else{
                echo '<p class="empty">Your cart is empty</p>';
            }
        ?>
        <div class="grand-total">Grand total: <span>$<?php echo $grand_total; ?>/-</span></div>
    </section>
    <section class="checkout">
        <form action="" method="post">
            <h3>Place your order</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Your name: </span>
                    <input type="text" name="name" required placeholder="Enter your name">
                </div>
                <div class="inputBox">
                    <span>Your number: </span>
                    <input type="number" name="number" required placeholder="Enter your number">
                </div>
                <div class="inputBox">
                    <span>Your email: </span>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="inputBox">
                    <span>Payment method: </span>
                    <select name="method">
                        <option value="cash on delivery">Cash on delivery</option>
                        <option value="credit card">Credit card</option>
                        <option value="paypal">Paypal</option>
                        <option value="qiwi">Qiwi</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Address line 01: </span>
                    <input type="number" min="0" name="flat" required placeholder="For example flat №">
                </div>
                <div class="inputBox">
                    <span>Address line 02: </span>
                    <input type="text" name="street" required placeholder="For example street name">
                </div>
                <div class="inputBox">
                    <span>City : </span>
                    <input type="text" name="city" required placeholder="For example Moscow">
                </div>
                <div class="inputBox">
                    <span>Country : </span>
                    <input type="text" name="country" required placeholder="For example Russia">
                </div>
                <div class="inputBox">
                    <span>Pin code : </span>
                    <input type="number" min="0" name="pin_code" required placeholder="For example 123456">
                </div>
            </div>
            <input type="submit" value="Order now" class="btn" name="order_btn">
        </form>
    </section>