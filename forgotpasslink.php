<?php
require 'vendor/autoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader


	include('assets/php/connect.php');
	
	if (isset($_POST['submitbtn'])){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$_SESSION['email'] = $email;
		
		$check_mail = "SELECT email FROM users WHERE email='$email'";
		$check_mail_run = mysqli_query($conn, $check_mail);

		$namequery = "SELECT name FROM users WHERE email='$email'";
		$name = mysqli_query($conn, $namequery);
		

		if (mysqli_num_rows($check_mail_run) > 0) {
			$code =rand(999999,111111);
			$update_code = "UPDATE users SET code='$code' WHERE email='$email'";
			$update_code_run = mysqli_query($conn, $update_code);
			
			// Create an instance; passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
					// Server settings
					$mail->SMTPSecure = "TLS";  
					$mail->Host='smtp.gmail.com';  
					$mail->Port='587';   
					$mail->Username   = 'edgargpalen@gmail.com'; // SMTP account username
					$mail->Password   = 'etullisgqzukmuwv';  
					$mail->SMTPKeepAlive = true;  
					$mail->Mailer = "smtp"; 
					$mail->IsSMTP(); // telling the class to use SMTP  
					$mail->SMTPAuth   = true;                  // enable SMTP authentication  
					$mail->CharSet = 'utf-8';  
					$mail->SMTPDebug  = 0;                                   // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

					// Recipients
					$mail->setFrom('gacurajulina@gmail.com', 'Jurassic Pot PH');
					$mail->addAddress($email, $name);           // Add a recipient

					// Attachments
					// $mail->addAttachment('/var/tmp/file.tar.gz');               // Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Optional name

					// Content
					$mail->isHTML(true);                                        // Set email format to HTML
					$mail->Subject = 'Forgot Password Verification Code';
					$mail->Body    = 'This is your Verification Code <b>'. $code. '</b>!';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					$mail->send();
										
				}

				catch (Exception $e) {
					echo "<script>
							window.alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
						</script>";
				} 
			
				header("LOCATION: verifyEmail.php");
		}

		else {
			echo "<script>
						window.alert('Email does not exist in the database!');
				</script>";
		}
		
	}

?>