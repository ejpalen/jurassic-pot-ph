<?php 
include('assets/php/connect.php');

unset($_SESSION['userID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/login_signup.css" />
    <?php include('assets/php/head-meta.php');?>

    <!--Slick Slider-->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <title>Jurassic Pot Ph | Log in</title>
</head>
<body>
    <div class="user-wrapper">
        <div class="login-wrapper">
            <div class="log-in-header">
            <img id="login-logo" src="media/logo.png" alt="">
                <h1>Log in to your account</h1>
                <p>Welcome back! Please enter your details.</p>
            </div>
            <form method='post'>
                <label>
                    <p>Email</p>
                    <input type="Email" name="loginEmail" id="" required>
                </label>
                <label>
                    <p>Password</p>
                    <input type="password" name="loginPass" id="" required>
                </label>
                <div class="user-options">
                    <label>
                    <input type="checkbox" name="Remember Me" id="" checked>
                    <p>Remember Me</p>
                    </label>
                    <a href="forgotPassword.php">Forgot Password?</a>
                </div>
                <input class="loginBtn" type="submit" name="loginSubmit" value="Log in">
                <p class="login-alternative">Don’t have an account? <a href="signup.php">Create an account</a></p>
                <p class="login-alternative">Or <a href="guest.php" >Continue as Guest</a></p>
            </form>
			
            <?php

                if(isset($_POST['loginSubmit'])) {

                    $query = "SELECT * FROM users WHERE email='".$_POST['loginEmail']."' AND password='".$_POST['loginPass']."'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
                    $row = mysqli_fetch_array($result);  

                    if($row != null && $row['userStatus'] == "ACTIVE") {

                        if($row['usertype'] == "CUSTOMER") {
                          $_SESSION['userID'] = $row['userID'];
                          $_SESSION['name'] = $row['name'];
                          $_SESSION['usertype'] = $row['usertype'];
                          header("Location: profile.php");
                        }
                        else if($row['usertype'] == "ADMIN") {
                          $_SESSION['usertype'] = $row['usertype'];
                          header("Location: dashboard/index.php");
                        }
                        else {
                          $_SESSION['id'] = $row['UserID'];
                          $_SESSION['name'] = $row['Name'];
                          $_SESSION['usertype'] = $row['usertype'];
                          header("Location: profile.php");
                        }
                    // }
                    // elseif($row['userStatus'] == "DELETED"){
                    //   echo "<script>
                    //             window.alert('Account Deleted');
                    //         </script>";

                    // }
                    }else {
                        echo "<script>
                                window.alert('Login Credentials does not match. Please try again.');
                            </script>";
							
                        //mysqli_close($conn);
                    }

                }
            ?>
        </div>

        <div class="login-slider">
        <?php include('assets/php/login-slider.php');?>
        </div>
    </div>
	
    <script>
      $(function () {
        $(".login-slider").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          speed: 1000,
          dots: false,
          draggable: true,
          autoplay: false,
          prevArrow: '<svg class="prev-arrow hangouts-arrow" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg" class=""> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.61039 1.53244C7.92174 2.86322 6.93268 4.393 5.95567 5.63889L5.67247 6H21.0361H20.9997V7V8H21.036H5.67214L6.06498 8.47222C6.83652 9.39956 7.98906 11.1893 8.71247 12.5833L9.4476 14H8.73856H8.02963L6.28942 12.2103C4.3558 10.2216 2.37307 8.619 0.904329 7.85756L0.000236511 7.38889L-0.000200272 6.92533C-0.000749588 6.49722 0.0275364 6.45222 0.368847 6.338C1.60186 5.92567 3.89959 4.16411 6.2005 1.86722L8.07085 0H8.73714H9.40342L8.61039 1.53244Z" /></svg>',
          nextArrow: '<svg class="next-arrow hangouts-arrow" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg" class=""> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.61039 1.53244C7.92174 2.86322 6.93268 4.393 5.95567 5.63889L5.67247 6H21.0361H20.9997V7V8H21.036H5.67214L6.06498 8.47222C6.83652 9.39956 7.98906 11.1893 8.71247 12.5833L9.4476 14H8.73856H8.02963L6.28942 12.2103C4.3558 10.2216 2.37307 8.619 0.904329 7.85756L0.000236511 7.38889L-0.000200272 6.92533C-0.000749588 6.49722 0.0275364 6.45222 0.368847 6.338C1.60186 5.92567 3.89959 4.16411 6.2005 1.86722L8.07085 0H8.73714H9.40342L8.61039 1.53244Z" /></svg>',
          autoplaySpeed: 3500, //Responsive slider
          responsive: [
            {
              breakpoint: 717,
              settings: {
                slidesToShow: 1,
              },
            },
          ], //End of Responsive slider
        });
      });
    </script>
</body>
</html>
