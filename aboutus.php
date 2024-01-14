<?php 
include('assets/php/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		
		<title> About Us </title>
		<?php include('assets/php/head-meta.php');?>
    <link rel="stylesheet" href="assets/css/aboutus.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body>
	<?php
    include 'assets/php/header.php';
    ?>
	

	<div class="aboutus-wrapper">

	<div class="first">

	<div class = "first-img" data-aos="fade-up" data-aos-delay="0">
		<img src="media/products/im3.png" alt="" />
	</div>
	
	<div class = "first-container">
		<div class = "try" data-aos="fade-up" data-aos-delay="50">
			<h1><?php $try = mysqli_query($conn, "SELECT * FROM aboutus WHERE aboutus_ID = '1'");
			while($d = mysqli_fetch_array($try)){
				echo $d['header'];
			}?></h1>
		</div>
		
		<div class = "first-paragraph" data-aos="fade-up" data-aos-delay="100">
			<p> <?php $try = mysqli_query($conn, "SELECT * FROM aboutus WHERE aboutus_ID = '1'");
			while($d = mysqli_fetch_array($try)){
				echo $d['description'];
			}?> </p>
		</div>
		
		<div class = "btn" data-aos="fade-up" data-aos-delay="150">
			<a href="shop.php">See Products</a>
		</div>
		
	</div>

	</div>

	<div class="second">
	
	<div class = "third-container">
		<div class = "second-header" data-aos="fade-up" data-aos-delay="200">
			<h2><?php $try = mysqli_query($conn, "SELECT * FROM aboutus WHERE aboutus_ID = '2'");
			while($d = mysqli_fetch_array($try)){
				echo $d['header'];
			}?></h2>
		</div>
		
		<div class = "second-paragraph" data-aos="fade-up" data-aos-delay="250">
			<p> <?php $try = mysqli_query($conn, "SELECT * FROM aboutus WHERE aboutus_ID = '2'");
			while($d = mysqli_fetch_array($try)){
				echo $d['description'];
			}?> </p>
		</div>
	</div>
	<div class = "second-container">
		<div class = "second-img" data-aos="fade-up" data-aos-delay="300">
			<img src="media/home/contactus-image2.png" alt="" />
		</div>
	</div>

	</div>

	<div class="third">
	
	<div class = "third-img" data-aos="fade-up" data-aos-delay="350">
		<img src="media/home/contactus-image.png" alt="" />
	</div>
	
	<div class = "fourth-container">
		<div class = "third-header" data-aos="fade-up" data-aos-delay="400">
			<h2><?php $try = mysqli_query($conn, "SELECT * FROM aboutus WHERE aboutus_ID = '3'");
			while($d = mysqli_fetch_array($try)){
				echo $d['header'];
			}?></h2>
		</div>
		
		<div class = "third-paragraph" data-aos="fade-up" data-aos-delay="450">
			<p> <?php $try = mysqli_query($conn, "SELECT * FROM aboutus WHERE aboutus_ID = '3'");
			while($d = mysqli_fetch_array($try)){
				echo $d['description'];
			}?> </p>
		</div>
	</div>

	</div>

	</div>

	<?php
    include 'assets/php/footer.php';
    ?>
	<?php include 'assets/php/aos.php'?>

	
 
	<script> window.addEventListener("scroll", function () {
				  let nav = this.document.querySelector("nav");
				  let windowPosition = window.scrollY > 10;

				  nav.classList.toggle("scrolling-active", windowPosition);
				}); </script>

<script src="assets/js/script.js"></script>
	</body>
	
</html>
