<?php include 'assets/php/cartfunction.php';
include('assets/php/connect.php');

if (empty($_SESSION['userID'])) {
  header("Location: index.php");
  exit();
}

if (empty($_SESSION['cart'])) {
  header("Location: cart.php");
  exit; 
}

?>


<!DOCTYPE html>
<html lang="en" id="top">
  <head>
  <?php include('assets/php/head-meta.php');?>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>Jurassic Pot Ph | Payment</title>

    <!--Style-->
    <link rel="stylesheet" href="assets/css/Payment.css" />

    <script src="navscript.js" defer></script>
  </head>
  <body>
    
  <?php
    include 'assets/php/header.php';
    ?>

<div class="cartwrapper">
      <h1>Checkout Details</h1>
    </div>

    <div class="paymentwrapper">
        <div class="detailswrapper">
          <form action="orderconfirmation.php" method="POST">
      <div class="paymentdetails" data-aos="fade-up" data-aos-delay="100">
        <div class="paymentform">
          <h2>Contact Information</h2>
          <?php

$userquery = "SELECT * FROM `users` WHERE `userID` = '{$_SESSION['userID']}'";
$userresult = mysqli_query($conn, $userquery);

while ($user = mysqli_fetch_assoc($userresult)) {

?>
          <div class="div1">
              <div>
                <p class="label">Name</p>
                <input name="name" type="text" 
                maxlength="100" minlength="2"
                value="<?= $user["name"] ?>" pattern="[a-zA-Z ]+" onkeydown="return /[0-9]/.test(event.key) === false || event.key === ' ' || event.key === '.';" required/>
              </div>
          </div>

          <div class="div1">
            <p class="label">Email</p>
            <input type="text" 
            name="email"
            maxlength="50" minlength="5"
            value="<?= $user["email"] ?>" required/>
          </div>

          <div class="div1">
            <p class="label">Phone Number</p>
            <input type="text" name="phoneNum" maxlength="11" minlength="11" value="<?= $user["phoneNum"] ?>"
            oninput="this.value = this.value.replace(/^0+/,'').replace(/[^0-9]/g, '');" required/>
          </div>

          <h2 id="shiptxt">Shipping Address</h2>
          <div class="div1">
            <p class="label">Address</p>
            <input
              type="text"
              name="address"
              maxlength="400" minlength="4"
              value="<?= $user["address"] ?>"
              required
            />
          </div>
        </div>


        <?php

}

        ?>

        <h2 id="shiptxt">Shipping Method</h2>
        <div class="div1">
          <div class="div2 ship">
            <div class="shipradio">
              <input id="standard" type="radio" name="shippingMethod" value="Standard" checked/>
              <label for="standard">Standard</label>
            </div>
            <div class="shipprice">
              <p>₱120.00</p>
            </div>
          </div>
        </div>

        <h2 id="shiptxt">Payment Method</h2>
        <div class="div1">
          <div class="div2 ship paymethod">
            <div class="shipradio">
              <input id="standard" type="radio" name="paymentMethod" value="GCash" checked />
              <label for="standard">GCash</label>
            </div>
          </div>
          <div class="div2 ship">
            <div class="shipradio">
              <input id="standard" type="radio" name="paymentMethod" value="Cash" />
              <label for="standard">Cash</label>
            </div>
          </div>
        </div>
      </div>
      <div class="placeorder">
          <button class="placeorderbtn"><input type="submit" value="Place Order" name="placeorder"></button>
      </div>
      </form>
    </div>

      <div class="paymentproducts" data-aos="fade-up" data-aos-delay="150">

      <?php

// Display the cart items
if (!empty($_SESSION['cart'])) {
  $cartItems = $_SESSION['cart'];

  

  $_SESSION['cartTotal'] = 0;
  $_SESSION['orderTotal'] = 0;

  foreach ($cartItems as $index => $item) {




    $query = "SELECT * FROM `products` WHERE `productID` = '" . $item['product_id'] . "'";

    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))  {
     $itemprice = $row['productPrice'] * $item['quantity'];
    ?>

        <div class="prod1">
          <div class="prodinfo">
          <img src="media/products/<?php echo $row["productLOC"] ?>" alt="">
            <div class="prodinfochild">
            <p><?= $row['productName']   ?></p>
            <p><?= $item['quantity']?>x</p>
        </div>
          </div>

            <div class="prodprice">
              <?= "₱ ".number_format($itemprice, 2)?>
            </div>
          </div>



    <?php

$_SESSION['cartTotal'] += $itemprice;

    }
}
}
?>


              
        <div id="divider"></div>
        <div id="paymenttotal">

            <div class="total">
                <p>Subtotal</p>
                <p class="price"><?= "₱ ".number_format($_SESSION['cartTotal'], 2)?></p>
            </div>

            <div class="total">
                <p>Shipping Fee</p>
                <p class="price">₱120.00</p>
            </div>

            <div class="total finalamt">
                <p>Total</p>
                <p class="price">₱
                <?php

                $_SESSION['orderTotal'] = $_SESSION['cartTotal'] + 120;

                echo number_format($_SESSION['orderTotal'],2);

                ?></p>
            </div>
        </div>

        </div>
      </div>
    </div>


    <script src="assets/js/script.js"></script>
    <?php include 'assets/php/aos.php'?>

  </body>
</html>
