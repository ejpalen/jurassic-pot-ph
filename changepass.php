<!DOCTYPE html>
<?php
    include('assets/php/connect.php');
?>
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
    <title>Change Password Page</title>
</head>
<body>
    <div class="user-wrapper">
        <div class="login-wrapper">
            <div class="log-in-header">
            <img id="login-logo" src="media/logo.png" alt="">
                <h1>Change Password</h1>
            </div>
            <form action='changepassfunction.php' method = 'POST'>
                <label>
                    <p>Email</p>
                    <input type="Email" name="email" id="" required>
                </label>
                <label>
                    <p>New Password</p>
                    <input type="password" name="new_pass" minlength="6" maxlenght ="15" id="" required>
                </label>
                <label>
                    <p>Confirm Password</p>
                    <input type="password" name="confirm_pass" maxlenght ="15" id="" required>
                </label>
                <input type="submit" name= "change_pass" value="Change Password">
                <p class="login-alternative">Back to <a href="index.php">Log in</a></p>
            </form>
			
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
          autoplay: true,
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
