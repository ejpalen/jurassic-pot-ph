<?php
 include('assets/php/connect.php');

if(isset($_POST['verifyEmail'])){
	$OTPverify = $_POST['OTPverify'];
	$verifyquery = "SELECT * FROM users WHERE code='$OTPverify'";
	$runverifyquery = mysqli_query($conn, $verifyquery);

	if ($runverifyquery){
		if(mysqli_num_rows($runverifyquery) > 0){
			$newquery = "UPDATE users SET code = 0";
			header("LOCATION: changepass.php");
		}

		else {
			echo "<script>
					window.alert('Invalid Verification Code');
				</script>";
		}
	}

	else {
		echo "<script>
					window.alert('Failed while checking Verificatio Code from database!');
				</script>";
	}

}
?>