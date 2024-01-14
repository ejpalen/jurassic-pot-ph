<?php 
include('assets/php/connect.php');
?>

<!DOCTYPE html>
<html lang="en" id="top">
  <head>
  <?php include('assets/php/head-meta.php');?>
    <title>Jurassic Pot Ph | Review</title>
    <link rel="stylesheet" href="assets/css/review.css">
  </head>
  <body>
    <?php
    include 'assets/php/header.php';
    ?>

<div class="review-wrapper">
    <h1>Review Product</h1>
<div class="review">

<?php
$orderID = "";
$productID = "";

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];   
}

if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];
}
?>


<?php

$orderProductQuery = "SELECT * FROM `orders` WHERE `orderID` = '$orderID' and  `products` = '$productID'";
$orderProductQueryresult = mysqli_query($conn, $orderProductQuery);
while ($orderProduct = mysqli_fetch_assoc($orderProductQueryresult)) {

$productQuery = "SELECT * FROM `products` WHERE `productID` = '$productID'";
$productQueryresult = mysqli_query($conn, $productQuery);

while ($product = mysqli_fetch_assoc($productQueryresult)) {
    $productpricetotal = intval($product["productPrice"]) * intval($orderProduct["quantity"]);
?>

<div class="review-img-wrapper">
<img src="media/products/<?php echo $product["productLOC"] ?>" alt="">
</div>

<div>
<div class="review-product">


    <h2>Product: <?php echo $product["productName"]?></h2>
    <p>Order ID: <b><?php echo $orderID ?></b></p>
    <p>Qty: <b><?php echo $orderProduct["quantity"] ?></b></p>
    <p>Price: <b>PHP <?php echo $productpricetotal ?>.00</b></p>


</div>
    <form action="reviewConfirmation.php?orderID=<?php echo $orderID.'&productID='.$productID?>" method="POST">
    <!-- <form action="product.php?productID=" method="POST"> -->
    <div class="rating">
  <input type="radio" id="star5" name="rate" value="5">
  <label for="star5" title="text"></label>
  <input type="radio" id="star4" name="rate" value="4">
  <label for="star4" title="text"></label>
  <input checked="" type="radio" id="star3" name="rate" value="3">
  <label for="star3" title="text"></label>
  <input type="radio" id="star2" name="rate" value="2">
  <label for="star2" title="text"></label>
  <input type="radio" id="star1" name="rate" value="1">
  <label for="star1" title="text"></label>
</div>

        <label for="" style="margin-top: -10px;">
            <p>Subject</p>
            <input type="text" name="subject" value="Test 1">
        </label>
        <label for="">
            <p>Message</p>
            <textarea id="message" cols="30" rows="3" name="message"></textarea>
        </label>
        <input type="hidden" name="orderID" value=<?php echo $orderID ?>>
        <input type="hidden" name="productID" value=<?php echo $productID ?>>
        <input type="submit" value="Submit Review" name="review">
    </form>

    <?php }}?>

    </div>

    </div>
</div>

<?php


?>

<script src="assets/js/script.js"></script>

  </body>
</html>

