<?php 

session_start();

session_destroy();

echo "<script>alert('Logged out')</script>";
echo "<script>window.open('checkout.php','_self')</script>";

?>