<?php
include 'assets/php/connect.php';
?>

<!DOCTYPE html>

<head>
<?php include 'assets/php/head-meta.php';?>
<link rel="stylesheet" href="assets/css/shop.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<meta charset="utf-8" />
    <style type="text/css">
	</style>
	<title>Shop Page</title>
</head>
<body>
<?php
include 'assets/php/header.php';
?>

	<div class = "title">
		 <h1>Products </h1>
	</div>
	<div class = "prod-wrapper">
    <ul class="cont">
        <?php
$query = "SELECT MIN(productID) AS productID, productName, MIN(productLOC) AS productLOC, productVar, productPrice FROM `products` WHERE `productActiveStatus`='ACTIVE' GROUP BY productName";

$result = mysqli_query($conn, $query);

$delay=0;

while ($row = mysqli_fetch_assoc($result)) {
    $productID = $row['productID'];
    $productName = $row['productName'];
    $productLOC = $row['productLOC'];
    $productPrice = $row['productPrice'];
    $productVar = $row['productVar'];
    ?>
            <li class="grid_item prod1" data-aos="fade-up" data-aos-delay="<?= $delay+=100 ?>">
                <a href="product.php?productID=<?=$productID?>&productVar=<?=$productVar?>">
            <form method="post">
                <img src="media/products/<?php echo $productLOC ?>" alt="">
                <p> <?=$productName?> </p>
                <h2> <?="₱ " . number_format($productPrice, 2)?> </h2>
                <input type="hidden" name="productID" value="<?=$productID?>">
                <input type="hidden" name="productVar" value="<?=$productVar?>">
                </form>
                </a>
            </li>
        <?php
}
?>
    </ul>


	</div>

    <?php include 'assets/php/aos.php'?>

	<script> window.addEventListener("scroll", function () {
  let nav = this.document.querySelector("nav");
  let windowPosition = window.scrollY > 10;

  nav.classList.toggle("scrolling-active", windowPosition);
});
	</script>
</body>
</html>