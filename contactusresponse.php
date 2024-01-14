<?php 
include('assets/php/connect.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
		<?php 
		if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$conn = mysqli_connect("localhost",$username,$password);
		mysqli_select_db($conn, $database) or die ("Unable to select database");
		$query = "INSERT INTO `queries` (`name`, `email_add`, `message`) VALUES ('$name','$email','$message')";
		$result = @mysqli_query($conn, $query); 


		$mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPSecure = "TLS";  
        $mail->Host='smtp.gmail.com';  
        $mail->Port='587';   
        $mail->Username   = 'edgargpalen@gmail.com'; 
        $mail->Password   = 'etullisgqzukmuwv';  
        $mail->SMTPKeepAlive = true;  
        $mail->Mailer = "smtp"; 
        $mail->IsSMTP(); 
        $mail->SMTPAuth   = true;             
        $mail->CharSet = 'utf-8';  
        $mail->SMTPDebug  = 0;     
        
            // Recipients
            $mail->setFrom('jurassicpotph@gmail.com', 'Jurassic Pot PH');
            $mail->addAddress('johnejpalen13@gmail.com', 'Jurassic Pot PH');     
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');             
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');         
        
            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'New Query from '.$name.'';
            $mail->Body = '
            <p>Email: <b>'.$email.'</b></p>
            <h2>Message:</h2>
            <p>'.$message.'</p>
            <br>';
        
        // $_SESSION['cart'] = []; // Clears the cart array
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
        
    
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }   

			mysqli_close($conn);
            
			
			}
			else{
// 				header("Location: contactus.php");
//   exit; 
			}
		?>
		<div class = "contactus-wrapper contactus-response">
				<div class = "contactusresponse-img" data-aos="fade-up" data-aos-delay="0">
				<img src="media/home/contactus-image2.png" alt="" />
				</div>
				<div class="contactus-left">
				<div class = "bg">
				<div class = "heading" data-aos="fade-up" data-aos-delay="100">
					<h1>Thank you for contacting us.</h1>
				</div>
			
				<div class = "text-contactus" data-aos="fade-up" data-aos-delay="150">
					<p>We’ve received your query and our team is looking into it.
					   We’ve prioritized your request, and expect to have an answer for you within the next two working days.</p>
				</div>
			</div>
		
			<div class = "contactus-button" data-aos="fade-up" data-aos-delay="200">
			<a href="home.php">Home</a>
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
