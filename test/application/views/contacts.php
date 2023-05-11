<?php

include 'config/config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message send already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message send successfully!';
   }

}

?>

<div class="heading">
		<h3>Contact us</h3>
		<p><a href="/main">Home</a> / Shop</p>
	</div>
<section class="contact">
    <form action="" method="post">
	   <h3>say something!</h3>
	   <input type="text" name="name" required placeholder="Enter your name" class="box">
	   <input type="email" name="email" required placeholder="Enter your email" class="box">
	   <input type="number" name="number" required placeholder="Enter your number" class="box">
	   <textarea name="message" class="box" placeholder="Enter your message" id="" cols="30" rows="10"></textarea>
	   <input type="submit" value="Send message" name="send" class="btn">
    </form>
</section>