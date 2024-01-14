<?php
    include('assets/php/connect.php');

    if(isset($_POST['change_pass'])){
        $password=$_POST['new_pass'];
        $confirmpassword=$_POST['confirm_pass'];

            if($password != $confirmpassword) {
                echo "<script>
						window.alert('New Password and Confirm Password did not match.');
					</script>";
            }
            
            else {
                $password=$_POST['new_pass'];
                $email=$_POST['email'];
                $updatepass = "UPDATE users SET password = '$password' WHERE email = '$email'";
                $updatepassrun = mysqli_query($conn, $updatepass) or die ("Query Failed");
                header("LOCATION: changepassSuccessfully.php");
            }
    }
?>