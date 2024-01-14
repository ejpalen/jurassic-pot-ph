<?php 
include('assets/php/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<html>
	<head>
		<title> Contact Us </title>
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php include('assets/php/head-meta.php');?>
    <link rel="stylesheet" href="assets/css/aboutus.css">
	</head>

	<body>
	<?php
    include 'assets/php/header.php';
    ?>
	<div class="contactus-wrapper">
	<div class="contactus-left">
		<div class = "text">
			<div class = "text-header">
			<h1>How can we help you?</h1>
			</div>
		
			<div class = "text-paragraph" data-aos="fade-up" data-aos-delay="100">
				<p>Please let us know about your inquiry so we can do something about it.</p>
			</div>
		</div>
		<div class = "contactus-img" data-aos="fade-up" data-aos-delay="150">
			<img src="media/home/contactus-image.png" alt="" />
		</div>
		</div>
		
		<div class = "form-cont" data-aos="fade-up" data-aos-delay="200">
		<form action="contactusresponse.php" method="POST">
			<div class = "form">
				<div class = "form-txtname">
					<p>Name:</p>
					
				</div>
				<div class = "form-txtboxname">
					<input type="text" id="name" name="name" pattern="[a-zA-Z ]+" onkeydown="return /[0-9]/.test(event.key) === false || event.key === ' ' || event.key === '.';" required>
				</div>
				
				<div class = "form-txtemail">
					<p>Email:</p>
				</div>
				<div class = "form-txtboxemail">
					<input type="email" id="email" name="email" required>
				</div>
				
				<div class = "form-txtmessage">
					<p>Message:</p>
				</div>
				<div class = "form-txtboxmessage">
					<textarea name="message" id="message" cols="30" rows="5" required></textarea>
				</div>
				
				<div class = "button">
					<input  id="submit" type="submit" name="submit" value="SEND">
				</div>
			</div>
			
			<div class = "white">
		
			</div>
		</div>
		</div>
		
		<?php include 'assets/php/aos.php'?>

		<script> window.addEventListener("scroll", function () {
				  let nav = this.document.querySelector("nav");
				  let windowPosition = window.scrollY > 10;

				  nav.classList.toggle("scrolling-active", windowPosition);
				}); </script>
		
		<script src="assets/js/script.js"></script>
	</body>
</html>
