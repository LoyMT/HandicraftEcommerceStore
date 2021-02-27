<?php 

session_start();

include("db.php");
include("functions.php");

if(isset($_SESSION['customer_name'])){

$customer_session = $_SESSION['customer_name'];

$get_customer = "select * from customer where customer_name='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

}
    
?>

<!DOCTYPE html>
<html>
<head>
<title>Miss DIY Handicrafts</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="layout/styles/bootstrap-337.min.css">
<link rel="stylesheet" href="layout/styles/font-awesome.min.css">
<link href="layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row1 bgded" style="background-image:url('https://img.freepik.com/free-photo/lovely-handicrafts-composition_23-2147899271.jpg?size=626&ext=jpg');">
  <div class="overlay">
    <header id="header" class="clear"> 
      <div id="logo">
        <h1><a href="home.php">Miss DIY Handicrafts</a></h1>
      </div>
      <nav id="mainav" class="clear">
        <ul class="clear">
          <li class="active"><a href="home.php">Home</a></li>
          <li><a class="drop" href="tutorial1.php">TUTORIALS</a>
            <ul>
              <li><a href="tutorial1.php">DIY Gift Box Organizer</a></li>
              <li><a href="tutorial2.php">Paper Cup Speaker</a></li>
		   	  <li><a href="tutorial3.php">Origami Jumping Frog</a></li>
			  <li><a href="tutorial4.php">Tissue Paper Puffy Heart Valentine's Window Decoration</a></li>
			  <li><a href="tutorial5.php">Palm Rose</a></li>
			  <li><a href="tutorial6.php">Vintage Style Spun Cotton and Paper Lantern Ornaments</a></li>
			  <li><a href="tutorial7.php">How to Dye Pipe Cleaners for Crafts</a></li>
            </ul>
          </li>
          <li><a class="drop" href="product.php">ORDER CRAFTKITS</a>
            <ul>
              <li><a href="details.php?pro_id=1">DIY Gift Box Organizer Kit</a></li>
              <li><a href="details.php?pro_id=2">Paper Cup Speaker Kit</a></li>
              <li><a href="details.php?pro_id=3">Jumping Frog Kit</a></li>
              <li><a href="details.php?pro_id=4">Tissue Paper Puffy Heart Kit</a></li>
              <li><a href="details.php?pro_id=10">Palm Rose Kit</a></li>
              <li><a href="details.php?pro_id=11">Cotton/Paper Lantern Kit</a></li>
              <li><a class="drop" href="product.php">Materials</a>
                <ul>
                  <li><a href="details.php?pro_id=12">Origami Paper</a></li>
                  <li><a href="details.php?pro_id=13">Woven String</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="cart.php">SHOPPING CART</a>
           <ul>
          	  <li><a href="cust_orders.php">Confirm Payment</a></li>
		  </ul>
		  </li>
          <li><a href="checkout.php">LOG IN/LOG OUT</a>
          <ul>
          	  <li><a href="checkout.php">Log In</a></li>
              <li><a href="logout.php">Log Out</a></li>
		  </ul>
          </li>
          <li><a href="register.php">REGISTER</a></li>
        </ul>
      </nav>        
    </header>
  </div>
<iframe style="visibility: visible;" align="right" width="5%" height="70" scrolling="no" frameborder="no" allow="autoplay" 
src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/597300714&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=false&show_reposts=false&show_teaser=false&visual=false" 
target="_blank">
</iframe>  
</div>
