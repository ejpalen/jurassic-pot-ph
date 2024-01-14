<?php 
include('assets/php/connect.php');


if (empty($_SESSION['userID'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['cancelOrder'])) {
    $orderID = $_POST['orderID'];
    
    $query4 = "DELETE FROM `orders` WHERE `orderID` = '{$orderID}'";
              
    $result4 = mysqli_query($conn, $query4);

    $query5 = "DELETE FROM `orderstatus` WHERE `orderID` = '{$orderID}'";
              
    $result5 = mysqli_query($conn, $query5);
        header("Refresh:0");
}



?>

<!DOCTYPE html>
<html lang="en" id="top">
  <head>
    <!-- <link rel="icon" href="Pictures/favicon.png" type="image/x-icon" /> -->
    <title>Jurassic Pot Ph | Profile</title>
    <?php include('assets/php/head-meta.php');?>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body>
    <?php
    include 'assets/php/header.php';
    ?>

<?php

$editBoolean = isset($_GET['edit']) ? $_GET['edit'] : '';

?>


<div class="profilewrapper">

<!-- Start here for user -->

<?php
$userquery = "SELECT * FROM `users` WHERE `userID` = '{$_SESSION['userID']}'";
$userresult = mysqli_query($conn, $userquery);


if($_SESSION['name'] == "GUEST"){

    ?>
    
    <div class="guest" data-aos="fade-up" data-aos-delay="100">
<h1>Hi, Guest!</h1>
<br>
<p><a href="signup.php">Create an Account</a> or <a href="index.php">Log in</a> to View Order History.</p>

    </div>

<?php

}else{


?>


    <?php

    ?>

<?php
while ($user = mysqli_fetch_assoc($userresult)) {
    
?>



    <div class="user-details">
        <section class="account-top">
        <h1>Account Details</h1>
        <a href="index.php" class="user-edit">Log Out</a>
        </section>

        <?php
if(!$editBoolean == "true"){

?>

        <div data-aos="fade-up" data-aos-delay="100">
            <h2 style="margin-bottom: 20px;"><?= $user["name"] ?></h2>
            <p>Email: <b><?= $user["email"] ?></b></p>
            <p>Password: <b><?= $maskedPassword = str_repeat("*", strlen($user["password"])) ?></b></p>
            <p>Phone Number: <b><?php
            $fromP = $user["phoneNum"];
            $phone = sprintf("%s-%s",
                          substr($fromP, 0, 4),
                          substr($fromP, 4, 11));

            echo $phone;
             ?></b></p>
            <p>Address: <b><?= $user["address"] ?></b></p>
            <section>
            <a href="profile.php?edit=true" class="user-edit">Edit</a>
            </section>
            </div>

            <?php
}

?>

    </div>

    

    <?php
    


if($editBoolean == "true"){

    ?>

    <form action="profile.php" method="POST" data-aos="fade-up" data-aos-delay="100">
        <label for="">
            <p>Name</p>
        <input type="text" name="editName" maxlength="100" minlength="2" value="<?= $user["name"] ?>" pattern="[a-zA-Z ]+" onkeydown="return /[0-9]/.test(event.key) === false || event.key === ' ' || event.key === '.';" required>
        </label>
        <label for="">
            <p>Email</p>
        <input type="email" name="editEmail" value="<?= $user["email"] ?>" 
        maxlength="50" minlength="5"
        required>
        </label>
        <label for="">
            <p>Password</p>
        <input type="password" name="editPassword" value="<?= $user["password"] ?>" required>
        </label>
        <label for="">
            <p>Phone Number</p>
        <input type="text" name="editPhoneNum" maxlength="11" minlength="11" value="<?= $user["phoneNum"]?>" oninput="this.value = this.value.replace(/^0+/,'').replace(/[^0-9]/g, '');" required/>
        </label>
        <label for="">
            <p>Address</p>
        <input type="text" name="editAddress" value="<?= $user["address"] ?>" 
        maxlength="400" minlength="4"
        required>
        </label>

        <div class="form-buttons">
        <label for="">
        <input type="submit" value="Save Changes" name="editUser">
        </label>
            <a href="deleteUser.php" class="delete-btn">
            Delete Account
            </a>
        <a href="profile.php" class="cancel-btn">Cancel</a>
    
        </div>
                
            </form>

<?php
}
else{

}

}

if (isset($_POST['editUser'])) {
    $editName = $_POST['editName'];
    $editEmail = $_POST['editEmail'];
    $editPhoneNum = $_POST['editPhoneNum'];
    $editPassword = $_POST['editPassword'];
    $editAddress = $_POST['editAddress'];
    
    $query3 = "UPDATE `users` SET
                `name` = '$editName',
                `email` = '$editEmail',
                `phoneNum` = '$editPhoneNum',
                `password` = '$editPassword',
                `address` = '$editAddress'
              WHERE `userID` = '{$_SESSION['userID']}'";
              
    $result3 = mysqli_query($conn, $query3);

    if (mysqli_query($conn, $query3)) {
        header("Refresh:0");
        
    }
}
?>

<!-- Stop here for user -->


    <div class="order-history">
        <div class="order-history-header" data-aos="fade-up" data-aos-delay="150">
        <h1>Order History</h1>
        <div class="order-menu">

<?php

$getStatus = isset($_GET['status']) ? $_GET['status'] : '';

if($getStatus === "pending"){
echo '<select id="orderStatus" name="orderStatus" onchange="showValue()">
<option value="pending" selected>Pending Orders</option>
<option value="ondelivery">On Delivery</option>
<option value="completed">Completed Orders</option>
<option value="all">All Orders</option>
</select>';
}else if($getStatus === "ondelivery"){
echo '<select id="orderStatus" name="orderStatus" onchange="showValue()">
<option value="pending">Pending Orders</option>
<option value="ondelivery" selected>On Delivery</option>
<option value="completed">Completed Orders</option>
<option value="all">All Orders</option>
</select>';
}else if($getStatus === "completed"){
echo '<select id="orderStatus" name="orderStatus" onchange="showValue()">
<option value="pending">Pending Orders</option>
<option value="ondelivery">On Delivery</option>
<option value="completed" selected>Completed Orders</option>
<option value="all">All Orders</option>
</select>';
}else{
echo '<select id="orderStatus" name="orderStatus" onchange="showValue()">
<option value="pending">Pending Orders</option>
<option value="ondelivery">On Delivery</option>
<option value="completed">Completed Orders</option>
<option value="all" selected>All Orders</option>
</select>';
}


?>

</div>
        </div>
        <div class="w-100">



<?php
$orderHistoryquerry = "SELECT DISTINCT orderID FROM `orders` WHERE `userID` = '{$_SESSION['userID']}'";
$orderHistoryresult = mysqli_query($conn, $orderHistoryquerry);
while ($orderRow = mysqli_fetch_assoc($orderHistoryresult)) {
?>

<?php

$orderID = $orderRow["orderID"];

if($getStatus === "pending"){
$orderDetailsQuery = "SELECT * FROM `orderstatus` WHERE `orderID` = '$orderID' AND `status` = 'Pending'";
}else if($getStatus === "ondelivery"){
$orderDetailsQuery = "SELECT * FROM `orderstatus` WHERE `orderID` = '$orderID' AND `status` = 'On Delivery'";
}else if($getStatus === "completed"){
$orderDetailsQuery = "SELECT * FROM `orderstatus` WHERE `orderID` = '$orderID' AND `status` = 'Completed'";
}else{
$orderDetailsQuery = "SELECT * FROM `orderstatus` WHERE `orderID` = '$orderID'";
}


    $orderDetailsQueryresult = mysqli_query($conn, $orderDetailsQuery);



    $status = "";

    if ($orderDetailsQueryresult && mysqli_num_rows($orderDetailsQueryresult) > 0){
    while ($orderDetailsRow = mysqli_fetch_assoc($orderDetailsQueryresult)) {

        $status = "{$orderDetailsRow["status"]}";
        ?>

<div class="order" data-aos="fade-up" data-aos-delay="200">
<div class="order-header">
    <div>
    <h2>Order ID: <?php echo $orderRow["orderID"] ?></h2>
    
<div>
    <p style="margin-right: 5px;">Status: <b>
<?= $orderDetailsRow["status"] ?>    
</b>
</p>
<?php

if($orderDetailsRow["status"] == "Pending"){



?>
<a class="canc-btn">
<form action="profile.php?status=<?php echo $getStatus?>" method="POST" class="canc-btn-form">
<input type="hidden" name="orderID" value="<?php echo $orderDetailsRow['orderID']?>">
<input type="submit" value="Cancel Order" name="cancelOrder">
</form>
</a>

<?php

}

?>

</div>
    </div>
    <p>Order Date: <b><?php 

$orderProductQuery1 = "SELECT DISTINCT orderDate FROM `orders` WHERE `orderID` = '{$orderRow["orderID"]}'";
$orderProductQueryresult1 = mysqli_query($conn, $orderProductQuery1);

while ($orderProduct1 = mysqli_fetch_assoc($orderProductQueryresult1)) {
    echo $orderProduct1["orderDate"] ;
}
?></b></p>
    <p>Email: <b><?= $orderDetailsRow["email"] ?></b></p>
    <p>Phone Number: <b><?= $orderDetailsRow["phoneNum"] ?></b></p>
    <p>Shipped to: <b><?= $orderDetailsRow["customerName"] ?></b></p>
    <p>Shipping Address: <b><?= $orderDetailsRow["shippingAddress"] ?></b></p>
    <?php
        
    }
    ?>
</div>

<?php
$orderProductQuery = "SELECT * FROM `orders` WHERE `orderID` = '{$orderRow["orderID"]}'";
$orderProductQueryresult = mysqli_query($conn, $orderProductQuery);
$orderTotal = 0;
while ($orderProduct = mysqli_fetch_assoc($orderProductQueryresult)) {
    $productQuery = "SELECT * FROM `products` WHERE `productID` = '{$orderProduct["products"]}'";
    $productQueryresult = mysqli_query($conn, $productQuery);

    while ($product = mysqli_fetch_assoc($productQueryresult)) {
        $productpricetotal = intval($product["productPrice"]) * intval($orderProduct["quantity"]);
        $orderTotal += $productpricetotal;
?>

        <div class="order-product">
            <div class="order-product-left">
            <img src="media/products/<?php echo $product["productLOC"] ?>" alt="">
                <div class="order-product-left-details">
                    <h3><?php echo $product["productName"] ?></h3>
                    <p>Qty: <b><?php echo $orderProduct["quantity"] ?></b></p>
                    <p>PHP <b><?php echo number_format($productpricetotal,2) ?></b></p>
                </div>
            </div>
            <div class="order-product-right">

                    <?php
                    
                    if($status == "Completed"){
                        if ($orderProduct["reviewStatus"] == "true"){
                            echo "<p>Reviewed</p>";
                        }
                        else{
                            echo '<a href="review.php?orderID='.$orderRow["orderID"].'&productID='.$orderProduct["products"].'">Review</a>';
                        }
                    }
                    else{

                    }
                    
                    ?>
                        
                    </div>
        </div>
<?php
    }
}
?>
<div class="order-total">
    <div class="order-total-wrapper">
        <p>Order Total:</p>
        <b><p>PHP <?php echo number_format($orderTotal,2) ?></p></b>
    </div>
</div>
</div>
<?php 
}

}
?>
</div>

    </div>   

<?php
}
?>




<!-- STOP HERE -->

</div>
</div>



<script src="assets/js/script.js"></script>
<script>
const discoveriesOptions = document.getElementById('orderStatus');
  function showValue(){
        const selectedValue = discoveriesOptions.value;
    const url = new URL(window.location.href);
    
    url.searchParams.set('status', selectedValue);
    
    window.location.href = url.toString();
  }

  const urlParams = new URLSearchParams(window.location.search);
const option = urlParams.get("selectedValue");

</script>
<?php include 'assets/php/aos.php'?>
  </body>
</html>