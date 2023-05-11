<?php

include 'config/config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
}
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
}
?>

 <div class="heading">
        <h3>Shopping cart</h3>
        <p><a href="/main">Home</a> / Cart</p>
    </div>
    <section class="shopping-cart">
        <h1 class="title">Products added</h1>
        <div class="box-container">
            <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <div class="box">
                <a href="/cart?delete=<?php echo $fetch_cart['id']?>" class="fas fa-times" onclick="return confirm('Delete this from cart?');"></a>
                <img src="images/<?php echo $fetch_cart['image']?>" alt="">
                <div class="name"><?php echo $fetch_cart['name']?></div>
                <div class="price">$<?php echo $fetch_cart['price']?></div>
                <form action="" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']?>">
                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']?>" data-max-count="20">
                    <input type="submit" name="update_cart" value="update" class="option-btn">
                </form>
                <div class="sum-total">Total sum : <span>$<?php echo $sum_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span></div>
            </div>
            <?php
                    $grand_total += $sum_total;
                    }
                }else{
                    echo '<p class="empty">Your cart is empty</p>';
                }
            ?>
        </div>
        <div style="margin-top: 2rem; text-align:center;">
            <a href="/cart?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Delete all from cart?');">Delete all</a>
        </div>
        <div class="cart-total">
            <p>Grand Total: <span>$<?php echo $grand_total; ?></span></p>
            <div class="flex">
                <a href="/shop" class="option-btn">Continue shopping</a>
                <a href="/checkout" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Procced to checkout</a>
            </div>
        </div>
    </section>