<?php
if (isset($_POST['updateOrderStatus'])) {
    $orderStatus = $_POST['status'];
    $orderID = $_POST['orderID'];
    $query4 = "UPDATE `orderstatus` SET `status` = '$orderStatus' WHERE `orderID` = '$orderID'";
    $result4 = mysqli_query($conn, $query4);
    if ($result4) {
        header("Location: index.php?page=pages/orders.php");
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
}
?>


<link rel="stylesheet" href="../assets/css/profile.css">

<div class="w-100 flex">
    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            <h1>User Reviews</h1>
        </div>

        <div class="order-menu">

        <?php

$rating = isset($_GET['rating']) ? $_GET['rating'] : '';

if($rating === "5"){
    echo '<select id="rating" name="rating" onchange="showValue()">
    <option value="5" selected>5 Stars Reviews</option>
    <option value="4" >4 Stars Reviews</option>
    <option value="3" >3 Stars Reviews</option>
    <option value="2" >2 Stars Reviews</option>
    <option value="1" >1 Stars Reviews</option>
    <option value="All" >All Reviews</option>
  </select>';
}else if($rating === "4"){
    echo '<select id="rating" name="rating" onchange="showValue()">
    <option value="5">5 Stars Reviews</option>
    <option value="4" selected>4 Stars Reviews</option>
    <option value="3" >3 Stars Reviews</option>
    <option value="2" >2 Stars Reviews</option>
    <option value="1" >1 Stars Reviews</option>
    <option value="All" >All Reviews</option>
  </select>';
}else if($rating === "3"){
    echo '<select id="rating" name="rating" onchange="showValue()">
    <option value="5" >5 Stars Reviews</option>
    <option value="4" >4 Stars Reviews</option>
    <option value="3" selected>3 Stars Reviews</option>
    <option value="2" >2 Stars Reviews</option>
    <option value="1" >1 Stars Reviews</option>
    <option value="All" >All Reviews</option>
  </select>';
}else if($rating === "2"){
    echo '<select id="rating" name="rating" onchange="showValue()">
    <option value="5" >5 Stars Reviews</option>
    <option value="4" >4 Stars Reviews</option>
    <option value="3" >3 Stars Reviews</option>
    <option value="2" selected>2 Stars Reviews</option>
    <option value="1" >1 Stars Reviews</option>
    <option value="All" >All Reviews</option>
  </select>';
}else if($rating === "1"){
    echo '<select id="rating" name="rating" onchange="showValue()">
    <option value="5" >5 Stars Reviews</option>
    <option value="4" >4 Stars Reviews</option>
    <option value="3" >3 Stars Reviews</option>
    <option value="2" >2 Stars Reviews</option>
    <option value="1" selected>1 Stars Reviews</option>
    <option value="All" >All Reviews</option>
  </select>';
}else{
    echo '<select id="rating" name="rating" onchange="showValue()">
    <option value="5" >5 Stars Reviews</option>
    <option value="4" >4 Stars Reviews</option>
    <option value="3" >3 Stars Reviews</option>
    <option value="2" >2 Stars Reviews</option>
    <option value="1" >1 Stars Reviews</option>
    <option value="All" selected>All Reviews</option>
  </select>';
}


?>

        </div>

        <?php

        $orderStatusText = "Default";

if($rating === "5"){
    $ratingquery = "SELECT * FROM `reviews`  WHERE `rating` = '5'";
    $orderStatusText = "Total 5 Star Reviews";

}else if($rating === "4"){
    $ratingquery = "SELECT * FROM `reviews`  WHERE `rating` = '4'";
    $orderStatusText = "Total 4 Star Reviews";
}else if($rating === "3"){
    $ratingquery = "SELECT * FROM `reviews`  WHERE `rating` = '3'";
    $orderStatusText = "Total 3 Star Reviews";
}else if($rating === "2"){
    $ratingquery = "SELECT * FROM `reviews`  WHERE `rating` = '2'";
    $orderStatusText = "Total 2 Star Reviews";
}else if($rating === "1"){
    $ratingquery = "SELECT * FROM `reviews`  WHERE `rating` = '1'";
    $orderStatusText = "Total 1 Star Reviews";
}else{
    $ratingquery = "SELECT * FROM `reviews`";
    $orderStatusText = "Total Reviews";
}

?>

        <div class="w-100" style="margin: 30px 0;">
        <h2 class="flex fs-b1 bold"><?=$orderStatusText?></h2>
            <p class="flex fs-Xb3 bold">

            
<?php

    $ratingquery1 = mysqli_query($conn, $ratingquery);
    $rowCount = mysqli_num_rows($ratingquery1);
    echo $rowCount;

?>

            </p>
        </div>

        <div class="w-100">



        <?php
                while ($orderRow= mysqli_fetch_assoc($ratingquery1)){

                
        ?>


    <div class="order">
        <div class="order-header">
            <div>
            <h2>Order ID: <?php echo $orderRow["orderID"] ?></h2>
            <p style="margin-right: 5px;">Status: <b>Completed</b>
        </p>
        </div>
            </div>
            <div style="margin-left: 10px;margin-bottom: 20px;">
        <p>Order by: <b><?php
            $customerNamequery = "SELECT * FROM `users` WHERE `userID` = '{$orderRow["userID"]}'";
            $customerNameresult = mysqli_query($conn, $customerNamequery);
            while ($customerName = mysqli_fetch_assoc($customerNameresult)){
                echo $customerName["name"];
            }         ?></b></p>
            </div>
            
            <?php
$query = "SELECT * FROM `products` WHERE `productID`='{$orderRow["productID"]}'";
$result = mysqli_query($conn, $query);

while ($product= mysqli_fetch_assoc($result)){
?>
          <div class="order-product">
                    <div class="order-product-left">
                    <img src="../media/products/<?php echo $product["productLOC"] ?>" alt="">
                        <div class="order-product-left-details">
                            <h3><?php echo $product["productName"] ?></h3>
                            <p><?php echo $product["productVar"] ?></p>
                        </div>
                    </div>
            </div>

                <?php
                }
                ?>

<div class="order-product">
                    <div class="order-product-left">
                        <div class="order-product-left-details">
                        <?php
for($i=0; $i<intval($orderRow["rating"]); $i++)
{ 
  echo "⭐";
}
?>
                            <h2><?php echo $orderRow["subject"] ?></h2>
                            <p><?php echo $orderRow["message"] ?></p>
                        </div>
                    </div>
            </div>
    </div>

    <?php
                }
    ?>


        </div>
    </div>
</div>

<script>
const discoveriesOptions = document.getElementById('rating');
  function showValue(){
        const selectedValue = discoveriesOptions.value;
    const url = new URL(window.location.href);
    
    url.searchParams.set('rating', selectedValue);
    
    window.location.href = url.toString();
  }

  const urlParams = new URLSearchParams(window.location.search);
const option = urlParams.get("selectedValue");

</script>