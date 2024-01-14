<?php 
include('assets/php/connect.php');
?>

<!DOCTYPE html>
<html lang="en" id="top">
  <head>
    <!-- <link rel="icon" href="Pictures/favicon.png" type="image/x-icon" /> -->
    <title>Jurassic Pot Ph | Review</title>
    <?php include('assets/php/head-meta.php');?>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/review.css">
  </head>
  <body>
    <?php
    include 'assets/php/header.php';
    ?>

<div class="review-confirmation-wrapper">
<h1>New review created successfully</h1>
<div class="review-confirmation-buttons">
<a href="profile.php">Back to Profile</a>
<a href="profile.php">Shop More</a>
</div>
</div>

<?php

if (isset($_POST['review'])) {
    $rate = $_POST['rate'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $orderIDf = $_POST['orderID'];
    $productIDf = $_POST['productID'];
    
    $query = "INSERT INTO `reviews` (`userID`, `orderID`, `productID`, `rating`, `subject`, `message`, `reviewstatus`) 
              VALUES ('{$_SESSION['userID']}', '$orderIDf', '$productIDf', '$rate', '$subject', '$message', 'true');";
              
    $result = mysqli_query($conn, $query);

    $query2 = "UPDATE `orders` SET `reviewStatus` = 'true' WHERE `orderID` = '$orderIDf' and `products` = '$productIDf';";
    
    $result2 = mysqli_query($conn, $query2);

    if ($result) {

?>

        


        <?php

    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
}

?>

  </body>

</html>