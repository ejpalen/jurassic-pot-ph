<?php 
include('assets/php/connect.php');
include('assets/php/cartfunction.php');
?>


<html lang="en">

<html>
	<head>
	<title> Contact Us </title>
    <?php include('assets/php/head-meta.php');?>
    <link rel="stylesheet" href="assets/css/aboutus.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php include('assets/php/head-meta.php');?>
	</head>

	<body>
	<?php
    include 'assets/php/header.php';
    ?>
		<div class = "contactus-wrapper contactus-response">
				<div class = "contactusresponse-img" data-aos="fade-up" data-aos-delay="0">
				<img src="media/home/contactus-image2.png" alt="" />
				</div>
				<div class="contactus-left">
				<div class = "bg">
				<div class = "heading" data-aos="fade-up" data-aos-delay="100">
					<h1>Order Created Successfully!</h1>
				</div>
			
				<div class = "text-contactus" data-aos="fade-up" data-aos-delay="150">
					<p>Check your email for Order Confirmation and Receipt.</p>
				</div>
			</div>
		
			<div class = "contactus-button" data-aos="fade-up" data-aos-delay="200">
			<a href="profile.php">Go to Profile</a>
      <a href="shop.php">Shop More</a>
				</div>
				</div>
		</div>

		<?php include 'assets/php/aos.php'?>
		
		<script> window.addEventListener("scroll", function () {
				  let nav = this.document.querySelector("nav");
				  let windowPosition = window.scrollY > 10;

				  nav.classList.toggle("scrolling-active", windowPosition);
				}); </script>
		
	</body>
</html>
