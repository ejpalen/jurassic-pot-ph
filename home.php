<?php
include 'assets/php/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Jurassic Pot PH</title>
    <style>
    
    </style>
  </head>
  <body>
  <?php
    include 'assets/php/header.php';

    $delay = 0
    ?>
    <div class="hero">
      <hero-text class="hero-text" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <h1>Get your dinosaur-themed plant pots now!</h1>
        <p>
          Let our prehistoric planters help you bring the wild into your world!
        </p>
        <a href="" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">Shop Now</a>
      </hero-text>
      <div class="hero-image" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <img src="media/home/hero-image.png" alt="" />
      </div>
    </div>
    <div class="welcome-section" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
      <img src="media/home/welcome-image.png" alt="" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>"/>
      <div class="welcome-section-text" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <h1>Welcome to Our World!</h1>
        <p>
          Jurassic Pot offers an edgier take in gardening, making it more fun
          and exciting for everyone regardless of age and gender. Jurassic Pots
          are also low maintenance enough for kids and plant newbies to handle,
          and unique enough to belong in the collections of more experienced
          plant lovers! Just send us a DM for inquiries.
        </p>
      </div>
    </div>

    <div class="pot-content-wrapper">
      <div class="title">
        <h1>What’s in a Jurassic Pot?</h1>
      </div>
      <div class="pot-content" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <div class="content">
          <img src="media/home/potcontent1.png" alt="" />
          <div>
          <h2>Succulent</h2>
          <p>Carefull chosen succulent or a low maintenance indoor plant.</p>
          </div>
        </div>
        <div class="content" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
          <img src="media/home/potcontent2.png" alt="" />
          <div>
          <h2>Soil</h2>
          <p>Well-draining soil containing a mixture of sand, small rocks and twigs.</p>
          </div>
        </div>
        <div class="content" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
          <img src="media/home/potcontent3.png" alt="" />
          <div>
          <h2>Dinasour</h2>
          <p>Dinasour-shaped planter made of resin.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="collection-wrapper">
      <div class="title">
        <h1>Collections</h1>
      </div>
      <div class="collections" >
        <div class="collection collection1" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
          <img src="media/home/collection-1-image.png" alt="" />
          <h1>Skull Airplant Holder</h1>
          <a href=""> Shop Now </a>
        </div>
        <div class="collection collection2" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
          <img src="media/home/collection-2-image.png" alt="" />
          <h1>Skull Airplant Holder</h1>
          <a href=""> Shop Now </a>
        </div>
      </div>
    </div>

    <div class="featured-products-wrapper">
      <div class="title">
        <h1>Featured Products</h1>
      </div>

      <div id="banner_slideshow">
        <ul id="banner_slider" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <?php
$query = "SELECT MIN(productID) AS productID, productName, MIN(productLOC) AS productLOC, productVar, productPrice FROM `products` GROUP BY productName";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $productID = $row['productID'];
    $productName = $row['productName'];
    $productLOC = $row['productLOC'];
    $productPrice = $row['productPrice'];
    $productVar = $row['productVar'];
    ?>
          <li>
          <a href="product.php?productID=<?=$productID?>&productVar=<?=$productVar?>">
              <div class="featured-item">
              <form method="post">
              <img src="media/products/<?php echo $productLOC ?>" alt="">
                <div class="featured-item-text">
                <p> <?=$productName?> </p>
                <h2> <?="₱ " . number_format($productPrice, 2)?> </h2>
                <input type="hidden" name="productID" value="<?=$productID?>">
                <input type="hidden" name="productVar" value="<?=$productVar?>">
                </form>
                </div>
              </div>
            </a>
          </li>


          <?php
}
          ?>


        </ul>
      </div>
    </div>

    <div class="maintain-pot-wrapper">
      <div class="maintain-pot">
        <div class="title">
          <h1>How to take care a Dinoplant</h1>
        </div>
        <div class="requirement-wrapper" \>
          <div class="requirement" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
            <h2>Light Requirements</h2>
            <div class="requirement-list">
              <img src="media/home/plant-icon.png" alt="" />
              <p>Indoor plant still require SUNLIGHT to thrive</p>
            </div>
            <div class="requirement-list">
              <img src="media/home/location-icon.png" alt="" />
              <p>Place in a STABLE AREA near a BRIGHT WINDOW.</p>
            </div>
            <div class="requirement-list">
              <img src="media/home/sun-icon.png" alt="" />
              <p>MORNING SUN is the best.</p>
            </div>
            <div class="requirement-list">
              <img src="media/home/fire-icon.png" alt="" />
              <p>Avoid LONG EXPOSURE to direct sunlight.</p>
            </div>
          </div>
          <div class="requirement water-requirement" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
            <h2>Water Requirements</h2>
            <div class="requirement-list">
              <img src="media/home/water-icon.png" alt="" />
              <p>
                Water sparingly and NEVER OVER WATER. Let soil dry in between
                waterings.
              </p>
            </div>
            <div class="requirement-list">
              <img src="media/home/water-icon.png" alt="" />
              <p>
                Water only the soil around the plant. Water deposites can lead
                to rot.
              </p>
            </div>
            <div class="requirement-list">
              <img src="media/home/water-icon.png" alt="" />
              <p>Water well until water runs out of drainage</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="feedback">
      <div class="feedback-header">
        <h1>Feedback from customers</h1>
        <a href="">View All</a>
      </div>
      <ul id="feedback-slider" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <li>
          <a href="">
            <img src="media/home/feedback-image-1.png" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="media/home/feedback-image-2.png" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="media/home/feedback-image-3.png" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="media/home/feedback-image-4.png" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="media/home/feedback-image-5.png" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="media/home/feedback-image-3.png" alt="" />
          </a>
        </li>
      </ul>
    </div>

    <div class="action-bottom">
      <img src="media/home/action-bottom-image.png" alt="" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>"/>
      <div class="action-bottom-text" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 50?>">
        <h1>Liven up your space with ad-RAWR-able Jurassic Pots!</h1>
        <a href="">Shop Now</a>
      </div>
    </div>

    <?php
    include 'assets/php/footer.php';
    ?>
    
    <script
      type="text/javascript"
      src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
      $(function () {
  $("#banner_slider").slick({
    slidesToShow: 4,
    speed: 1000,
    autoplay: false,
    dots: true,
    prevArrow: '<span class="banner-prev-arrow banner-arrow">&#8592;</span>',
    nextArrow: '<span class="banner-next-arrow banner-arrow">&#8594;</span>',
    autoplaySpeed: 5000, //Responsive slider
  });
});

$(function () {
  $("#feedback-slider").slick({
    slidesToShow: 5,
    speed: 1000,
    autoplay: false,
    dots: true,
    prevArrow: '<span class="banner-prev-arrow banner-arrow">&#8592;</span>',
    nextArrow: '<span class="banner-next-arrow banner-arrow">&#8594;</span>',
    autoplaySpeed: 5000, //Responsive slider
  });
});

    </script>
    <?php include 'assets/php/aos.php'?>
  </body>
</html>
