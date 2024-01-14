<?php include 'assets/php/cartfunction.php';
include('assets/php/connect.php');

?>

<!DOCTYPE html>
<html>
  <head>
  <?php include('assets/php/head-meta.php');?>
    <title>Jurassic Pot Ph | Product Name</title>
    <link rel="stylesheet" href="assets/css/product.css">
    
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

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  </head>
  <body>
  <?php
    include 'assets/php/header.php';
    ?>  

<div class="product-wrapper">

    <?php
    $productID = isset($_GET['productID']) ? $_GET['productID'] : '';
    $productVar = isset($_GET['productVar']) ? $_GET['productVar'] : '';

    if (empty($productID) || empty($productVar)) {
      header("Location: shop.php");
      exit;
  }

  $delay=0;
    
               $query = "SELECT * FROM `products` WHERE `productID` = '$productID'";
               $result = mysqli_query($conn, $query);
               
               while($row = mysqli_fetch_assoc($result))  {
                ?>

    <!--Parent Class of "Product" -->
    <div class="product2">
      <div class="prodimage2-contw" data-aos="fade-up" data-aos-delay="0">
        <img src="media/products/<?php echo $row["productLOC"] ?>" alt="">
      </div>
      <div class="prodd2-contw">
        <div class="details2">
          <h1 data-aos="fade-up" data-aos-delay="100"><?php echo $row['productName']." (".$row['productVar'].")";?></h1>
          <p class="description" data-aos="fade-up" data-aos-delay="150"><?php echo $row['productDesc'];?></p>
          <h2 class="price" data-aos="fade-up" data-aos-delay="200"><?= "₱ ".number_format($row['productPrice'], 2)?></h2>
          <p class="price" data-aos="fade-up" data-aos-delay="250">Variations</p>

          <div class="variations">
            <?php
            $query2 = "SELECT * FROM products WHERE productName = '{$row["productName"]}' AND productID <> '$productID'";
            $result2= mysqli_query($conn, $query2);
            while($row2 = mysqli_fetch_assoc($result2))  {
              ?>

              <a href="product.php?productID=<?= $row2["productID"] ?>&productVar=<?= $row2["productVar"] ?>" title="<?= $row2["productVar"] ?>" data-aos="fade-up" data-aos-delay="<?= $delay+=100 ?>">
              <img src="media/products/<?php echo $row2["productLOC"] ?>" alt="" >
              </a>

<?php
            }

            ?>



          </div>
          <p class="stocks" data-aos="fade-up" data-aos-delay="<?= $delay+=100 ?>"><?php echo $row['stocks'];?> Stocks Available</p>
          <!-- Order now button"-->
          <div class="order_buttons" data-aos="fade-up" data-aos-delay="<?= $delay+=100 ?>" data-aos-offset="0">
            <!-- <button class="butt cart" onclick="hideOrShow()">
              Add to cart
            </button> -->
            <form method="POST" action="cart.php">
        <input type="number" name="cartNum" value="1" id="cartNumInput" min="1" max="<?php echo $row['stocks'];?>">
        <!-- Include any additional inputs for the product -->
        <input type="hidden" name="product_id" value="<?php echo $productID ?>">

        <button class="butt cart" type="submit" name="submit">Add to Cart</button>
    </form>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Parent Class of "Info"-->
    
 
    <?php
               }
          ?>



<div class="reviews">
<h1 data-aos="fade-up" data-aos-delay="<?= $delay+=100 ?>" data-aos-offset="0">Reviews</h1>

<div class="review-wrapper" data-aos="fade-up" data-aos-delay="<?= $delay+=100 ?>" data-aos-offset="0">
<?php
$prodReviewquery = "SELECT * FROM `reviews` WHERE `productID` = '$productID'";
$prodReviewresult = mysqli_query($conn, $prodReviewquery);
if(mysqli_num_rows($prodReviewresult)) {
while ($prodReview = mysqli_fetch_assoc($prodReviewresult)){
    ?>
<div class="review">
<p><b><?php
 
  $userquery = "SELECT * FROM users WHERE userID = '{$prodReview["userID"]}'";
$userresult = mysqli_query($conn, $userquery);

while ($user = mysqli_fetch_assoc($userresult)){
  echo $user["name"];
}

  ?>
  
  </p>
</b>
  <?php
for($i=0; $i<intval($prodReview["rating"]); $i++)
{ 
  echo "⭐";
}
?>
  <h2 class="review-subject"><b><?= $prodReview["subject"] ?></b></h2>
  <p><?= $prodReview["message"] ?></p>
</div>
    <?php
}
}
else{
  echo '<p class="noreviews">No reviews yet.</p>';
}
?>
</div>
</div>



</div>

<?php
    include 'assets/php/footer.php';
    ?>

<?php include 'assets/php/aos.php'?>

   

    <script>
    $(function () {
      $(".review-wrapper").slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        speed: 1000,
        dots: true,
        autoplaySpeed: 3500,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>'
      });
    });

    
  </script>
   <script src="assets/js/script.js"></script>
    
  
  </body>
  

</html>
