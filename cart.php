<?php include 'assets/php/cartfunction.php';
include('assets/php/connect.php');

?>

<!DOCTYPE html>
<html lang="en" id="top">
  <head>
  <?php include('assets/php/head-meta.php');?>
    <title>Jurassic Pot Ph | Cart</title>
    <link rel="stylesheet" href="assets/css/cart.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>
  <body>
    <?php
    include 'assets/php/header.php';
    ?>

    <div class="cartwrapper">
      <h1>My cart</h1>
    </div>

    <div class="productswrapper">
      
    <?php

// Display the cart items
if (!empty($_SESSION['cart'])) {
  $cartItems = $_SESSION['cart'];
  // print_r($cartItems);
  // echo "<br>".count($cartItems);

  

  $_SESSION['cartTotal'] = 0;

  foreach ($cartItems as $index => $item) {
    // $stockquery = "SELECT * FROM `products` WHERE `productID` = '" . $item['product_id'] . "'";
    // $stockresult = mysqli_query($conn, $stockquery);
    // while($stock = mysqli_fetch_assoc($stockresult))  {
    //   $updatedStock = intval($stock["stocks"]) - intval($item['quantity']);
    //  echo "stock: ".$stock["stocks"]." -quantity: ".$item['quantity']." = ".$updatedStock."<br>";
    // }
  }

  $delay=0;


  foreach ($cartItems as $index => $item) {

      $query = "SELECT * FROM `products` WHERE `productID` = '" . $item['product_id'] . "'";

               $result = mysqli_query($conn, $query);
               while($row = mysqli_fetch_assoc($result))  {
                $itemprice = intval($row['productPrice']) * intval($item['quantity']);
                echo '
      <div class="prod1" data-aos="fade-up" data-aos-delay="'.($delay+=100).'">
        <div class="prodinfo">
          <img src="media/products/'.$row["productLOC"].'" alt="">
          <div>
          <p><b>'.$row['productName'].'</b></p>
          <p><small>'.$row['productVar'].'</small></p>
          </div>
          
        </div>

        <div class="prodpricewrapper">
          <div class="prodtotal">
          
            <form action="cart.php" method="POST">
              <label for="quantity">Quantity:</label>
              <input
                type="number"
                id="quantity"
                name="changeQuantity"
                placeholder="1"
                min="1"
                max="'.$row['stocks'].'"
                value="'.$item['quantity'].'"
              />
              <input type="hidden" name="product_id1" value="'. $item['product_id'] .'">
              
              <a><button type="submit" name="change">Change</button></a>
              
            </form>
          </div>

          <div class="prodprice">
            <p>PHP '.
            
            $itemprice

            .'.00</p>
          </div>

          <a href="cart.php?delete='. $index .'" class="deletebtn"><svg width="82" height="100" viewBox="0 0 82 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M28.6706 0.078767C28.5786 0.107531 28.0518 0.262723 27.4999 0.423601C25.1695 1.1034 23.4497 2.43174 22.1219 4.57751C21.2643 5.96304 20.8788 7.53386 20.7721 10.0758L20.6827 12.208L14.3081 12.2109C6.81233 12.2144 6.31364 12.2786 4.28711 13.5029C2.31058 14.697 0.804142 16.6783 0.247255 18.8162C-0.0828634 20.0835 -0.0823623 22.3944 0.248425 23.6702C0.902976 26.1961 2.95894 28.5074 5.45273 29.521L6.42853 29.9175L6.51215 59.8192L6.59576 89.7206L6.98826 91.0585C8.06909 94.7427 10.1445 97.2948 13.3874 98.9278C15.6168 100.051 14.3271 99.9996 40.5441 99.9996C60.7253 99.9996 64.4643 99.963 65.4436 99.7555C68.7226 99.061 72.19 96.1024 73.4372 92.9354C73.6264 92.4549 73.8776 91.8361 73.9955 91.5602C74.5492 90.2631 74.5761 88.7659 74.5761 59.2887C74.5761 31.4698 74.5915 29.9194 74.8687 29.8306C75.0296 29.7789 75.6882 29.4844 76.332 29.1758C78.1858 28.2875 79.8757 26.4441 80.5209 24.6067C80.6707 24.1799 80.8686 23.6894 80.9604 23.5168C81.0524 23.3443 81.1666 22.5165 81.2142 21.6773C81.2933 20.2862 81.255 20.0146 80.7804 18.5992C79.9553 16.1378 78.782 14.6735 76.5931 13.3731C74.7778 12.2947 74.099 12.2142 66.7825 12.2109L60.4104 12.208L60.3173 9.82495C60.2335 7.68052 60.1716 7.30575 59.7005 6.08261C58.893 3.98634 57.2671 2.10446 55.4279 1.13719C55.06 0.943698 54.2029 0.608729 53.5233 0.392664L52.2876 0L40.5627 0.0132118C34.114 0.0204029 28.7625 0.0500029 28.6706 0.078767ZM53.003 5.4503C53.6452 5.81136 54.1246 6.25737 54.5917 6.92864L55.2606 7.8899L55.3157 10.0489L55.3709 12.208H40.5573H25.744V10.3116C25.744 8.52421 25.7739 8.35531 26.2639 7.37449C26.6761 6.54952 26.9733 6.20837 27.6984 5.7269C28.2013 5.39294 28.9269 5.06683 29.3107 5.00228C29.6944 4.93773 34.9753 4.89575 41.0458 4.90913L52.0832 4.93338L53.003 5.4503ZM72.7365 17.2315C74.0789 17.4429 74.9693 18.0244 75.6591 19.1403C76.0986 19.8511 76.1648 20.1148 76.1648 21.155C76.1648 22.1932 76.0982 22.4596 75.6629 23.1636C75.387 23.61 74.7873 24.2438 74.3304 24.5719L73.4999 25.1686L40.8282 25.2121C9.33906 25.2539 8.13147 25.2444 7.45986 24.9459C5.81311 24.214 4.96491 22.9347 4.96574 21.1844C4.96691 18.9944 6.15611 17.5951 8.32813 17.2282C9.53506 17.0243 71.4411 17.0275 72.7365 17.2315ZM69.5178 59.9113C69.483 82.9253 69.4266 89.6865 69.2661 90.1486C69.1524 90.476 68.7671 91.2286 68.4099 91.8209C67.6724 93.0441 66.0256 94.4276 64.8424 94.8177C64.2401 95.0166 60.436 95.0637 41.2967 95.1106C26.7872 95.146 18.0792 95.1061 17.3985 95.0009C15.9799 94.7818 14.7072 94.1369 13.695 93.1248C12.7921 92.222 12.5938 91.8955 11.9111 90.1904L11.4552 89.0517L11.4041 59.6605L11.3531 30.2692H40.4578H69.5628L69.5178 59.9113ZM26.1621 36.2399C25.5102 36.4129 24.8725 37.0132 24.5559 37.7516C24.2444 38.4784 24.2365 39.1409 24.2788 60.9328C24.3198 81.967 24.3409 83.4022 24.617 83.9511C25.5065 85.7189 28.1931 85.6855 28.948 83.8971C29.1318 83.4616 29.1723 79.261 29.1723 60.5925C29.1723 37.8526 29.1718 37.8186 28.8274 37.3574C28.1478 36.4472 27.0753 35.9975 26.1621 36.2399ZM39.8531 36.3048C39.5651 36.3881 39.0571 36.7575 38.7243 37.126L38.1192 37.7957V60.6446C38.1192 83.3889 38.1207 83.496 38.4621 84.0484C39.2267 85.2853 40.6998 85.6418 41.8413 84.866C43.0586 84.0389 42.969 85.9495 42.969 60.8226C42.969 45.0802 42.9142 38.0217 42.7889 37.6624C42.4305 36.6343 41.0007 35.973 39.8531 36.3048ZM53.7555 36.2302C53.0992 36.3717 52.1555 37.3445 51.9942 38.0456C51.7733 39.006 51.7849 82.6861 52.0061 83.483C52.1136 83.8698 52.4379 84.3244 52.8714 84.6954C53.4435 85.1849 53.697 85.289 54.3188 85.289C55.1402 85.289 55.8597 84.8985 56.4313 84.1426C56.7619 83.7053 56.7657 83.4414 56.7657 60.7597C56.7657 37.8509 56.7652 37.8186 56.4209 37.3574C55.7466 36.4542 54.7233 36.0214 53.7555 36.2302Z"/>
          </svg>
          </a>
              
        </div>
      </div>
      ';

      $_SESSION['cartTotal'] += $itemprice;
               }

               
  }


?>

      <div class="total" data-aos="fade-up" data-aos-delay="<?=$delay+=100 ?>">
        <h2>Total</h2>
        <p>₱<?php echo $_SESSION['cartTotal']?>.00</p>

      <form action="Payment.php" method="post">
        <input type="submit" name="checkout" value="Checkout">
      </form>
      </div>
    </div>



    <?php
} else {
  echo "<p id='no-items'>No items in the cart.</p>";
}

    ?>

    </div>
<!-- 
    <script>
  const decrementBtn = document.getElementById('decrementBtn');
  const incrementBtn = document.getElementById('incrementBtn');
  const quantityLabel = document.getElementById('quantityLabel');

  decrementBtn.addEventListener('click', () => {
    let quantity = parseInt(quantityLabel.textContent);
    if (quantity > 0) {
      quantity--;
      quantityLabel.textContent = quantity;
    }
  });

  incrementBtn.addEventListener('click', () => {
    let quantity = parseInt(quantityLabel.textContent);
    quantity++;
    quantityLabel.textContent = quantity;
  });
</script> -->

<?php include 'assets/php/aos.php'?>
<script src="assets/js/script.js"></script>

  </body>
</html>
