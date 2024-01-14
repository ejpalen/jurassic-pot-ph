<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$getStatus = isset($_GET['status']) ? $_GET['status'] : '';

if (isset($_POST['updateOrderStatus'])) {
    $orderStatus = $_POST['status'];
    $orderID = $_POST['orderID'];
    $email = $_POST['orderEmail'];
    $name = $_POST['name'];
    $query4 = "UPDATE `orderstatus` SET `status` = '$orderStatus' WHERE `orderID` = '$orderID'";
    $result4 = mysqli_query($conn, $query4);
    if ($result4) {
        header("Refresh:0");
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }

    if($orderStatus == "On Delivery"){
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPSecure = "TLS";  
        $mail->Host='smtp.gmail.com';  
        $mail->Port='587';   
        $mail->Username   = 'edgargpalen@gmail.com'; 
        $mail->Password   = 'etullisgqzukmuwv';  
        $mail->SMTPKeepAlive = true;  
        $mail->Mailer = "smtp"; 
        $mail->IsSMTP(); 
        $mail->SMTPAuth   = true;             
        $mail->CharSet = 'utf-8';  
        $mail->SMTPDebug  = 0;     
        
            // Recipients
            $mail->setFrom('jurassicpotph@gmail.com', 'Jurassic Pot PH');
            $mail->addAddress($email, $name);     
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');             
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');         
        
            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'A Shipment from Order '.$orderID.' is on the way';
            $mail->Body = '
            <p><b>ORDER: '.$orderID.'</b></p>
            <h2>Your order is on the way!</h2>
            <p>Kindly wait at least three working days for your order to arrive. Thank you!</p>
            <br>';
        
        // $_SESSION['cart'] = []; // Clears the cart array
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
        
            echo 'Message has been sent';
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }   
    }elseif($orderStatus == "Completed"){
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPSecure = "TLS";  
        $mail->Host='smtp.gmail.com';  
        $mail->Port='587';   
        $mail->Username   = 'edgargpalen@gmail.com'; 
        $mail->Password   = 'etullisgqzukmuwv';  
        $mail->SMTPKeepAlive = true;  
        $mail->Mailer = "smtp"; 
        $mail->IsSMTP(); 
        $mail->SMTPAuth   = true;             
        $mail->CharSet = 'utf-8';  
        $mail->SMTPDebug  = 0;     
        
            // Recipients
            $mail->setFrom('jurassicpotph@gmail.com', 'Jurassic Pot PH');
            $mail->addAddress($email, $name);     
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');             
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');         
        
            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Jurassic Pot PH Order '.$orderID.' Completed';
            $mail->Body = '
            <p><b>ORDER: '.$orderID.'</b></p>
            <h2>Your order is now completed!</h2>
            <p>Thank you for shopping with us!</p>
            <br>';
        
        // $_SESSION['cart'] = []; // Clears the cart array
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
        
            echo 'Message has been sent';
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }   
    }
}
?>



<link rel="stylesheet" href="../assets/css/profile.css">

<div class="w-100 flex">
    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            <h1>Orders</h1>
        </div>


        <div class="order-menu">

        <?php




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

        <?php

        $orderStatusText = "Default";

// if($getStatus === "pending"){
//     $orderDetailsQuery1 = "SELECT * FROM `orderstatus`  WHERE `status` = 'pending'";
//     $orderStatusText = "Total Pending Orders";

// }

if($getStatus === "Pending"){
    $orderDetailsQuery1 = "SELECT * FROM `orderstatus`  WHERE `status` = 'Pending'";
    $orderStatusText = "Total Pending Orders";

}
elseif($getStatus === "pending"){
    $orderDetailsQuery1 = "SELECT * FROM `orderstatus`  WHERE `status` = 'Pending'";
    $orderStatusText = "Total Pending Orders";

}else if($getStatus === "ondelivery"){
    $orderDetailsQuery1 = "SELECT * FROM `orderstatus`  WHERE `status` = 'On Delivery'";
    $orderStatusText = "Total On-Delivery Orders";
}else if($getStatus === "completed"){
    $orderDetailsQuery1 = "SELECT * FROM `orderstatus`  WHERE `status` = 'Completed'";
    $orderStatusText = "Total Completed Orders";
}else{
    $orderDetailsQuery1 = "SELECT * FROM `orderstatus`";
    $orderStatusText = "Total Orders";
}

?>

        <div class="w-100" style="margin: 30px 0;">
        <h2 class="flex fs-b1 bold"><?=$orderStatusText?></h2>
            <p class="flex fs-Xb3 bold">

            
<?php

    $orderDetailsQueryresult1 = mysqli_query($conn, $orderDetailsQuery1);
    $rowCount = mysqli_num_rows($orderDetailsQueryresult1);
    echo $rowCount;

?>

            </p>
        </div>

        <div class="w-100">



        <?php
$orderHistoryquerry = "SELECT DISTINCT orderID FROM `orders`";
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
            if ($orderDetailsQueryresult && mysqli_num_rows($orderDetailsQueryresult) > 0){
            while ($orderDetailsRow = mysqli_fetch_assoc($orderDetailsQueryresult)) {
                
                ?>

    <div class="order">

        <div class="order-header">
            <div>
            <h2>Order ID: <?php echo $orderRow["orderID"];?></h2>
            
<div>
            <p style="margin-right: 5px;">Status: <b>
            <form action="index.php?page=pages/orders.php" method="POST">

        <select name="status" id="status">
            <?php
            if($orderDetailsRow["status"] === "Pending"){
                echo '<option value="Pending" selected>Pending</option>
                <option value="On Delivery">On Delivery</option>
                <option value="Completed">Completed</option>';
            }else if($orderDetailsRow["status"] === "On Delivery"){
                echo '<option value="Pending">Pending</option>
                <option value="On Delivery" selected>On Delivery</option>
                <option value="Completed">Completed</option>';
            }else if($orderDetailsRow["status"] === "Completed"){
                echo '<option value="Pending">Pending</option>
                <option value="On Delivery">On Delivery</option>
                <option value="Completed" selected>Completed</option>';
            }else{
                echo '<option value="Pending">Pending</option>
                <option value="On Delivery">On Delivery</option>
                <option value="Completed" selected>Completed</option>';
            }
            ?>
        </select>
    <input type="hidden" name="orderID" value="<?php echo $orderDetailsRow['orderID']?>">
    <input type="hidden" name="orderEmail" value="<?php echo $orderDetailsRow['email']?>">
    <input type="hidden" name="name" value="<?php echo $orderDetailsRow['customerName']?>">
    <input type="submit" value="Update" name="updateOrderStatus">
        </form>
        </b>
        </p>
        </div>
            </div>
            <p><?=  $getStatus ?></p>
            <p>Order Date: <b><?php 
        
        $orderProductQuery1 = "SELECT DISTINCT orderDate FROM `orders` WHERE `orderID` = '{$orderRow["orderID"]}'";
        $orderProductQueryresult1 = mysqli_query($conn, $orderProductQuery1);

        while ($orderProduct1 = mysqli_fetch_assoc($orderProductQueryresult1)) {
            echo $orderProduct1["orderDate"] ;
        }
        ?></b></p>
            <p>Order by: <b><?php
            $customerNamequery = "SELECT * FROM `users` WHERE `userID` = '{$orderDetailsRow["userID"]}'";
            $customerNameresult = mysqli_query($conn, $customerNamequery);
            while ($customerName = mysqli_fetch_assoc($customerNameresult)){
                echo $customerName["name"];
            }         ?></b></p>
            <p>Email: <b><?= $orderDetailsRow["email"] ?></b></p>
            <p>Phone Number: <b><?= $orderDetailsRow["phoneNum"] ?></b></p>
            <p>Shipped to: <b><?= $orderDetailsRow["customerName"] ?></b></p>
            <p>Shipping Address: <b><?= $orderDetailsRow["shippingAddress"] ?></b></p>
            <p>Shipping Method: <b><?= $orderDetailsRow["shippingMethod"] ?></b></p>
            <p>Payment Method: <b><?= $orderDetailsRow["paymentMethod"] ?></b></p>
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
                    <img src="../media/products/<?php echo $product["productLOC"] ?>" alt="">
                        <div class="order-product-left-details">
                            <h3><?php echo $product["productName"] ?></h3>
                            <p>Qty: <b><?php echo $orderProduct["quantity"] ?></b></p>
                            <p>PHP <b><?php echo number_format($productpricetotal,2) ?></b></p>
                        </div>
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
<?php } }?>
        </div>
    </div>
</div>

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