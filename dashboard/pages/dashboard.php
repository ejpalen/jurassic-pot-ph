<?php
    $totalUsersQ = "SELECT * FROM `users` WHERE `usertype`='CUSTOMER' AND `userStatus`='ACTIVE'";
    $totalUsersRow = mysqli_num_rows(mysqli_query($conn, $totalUsersQ));

    $pendingOrdersQ = "SELECT * FROM `orderstatus` WHERE `status`='Pending'";
    $pendingOrdersRow = mysqli_num_rows(mysqli_query($conn, $pendingOrdersQ));

    $CompletedOrdersQ = "SELECT * FROM `orderstatus` WHERE `status`='Completed'";
    $CompletedOrdersRow = mysqli_num_rows(mysqli_query($conn, $CompletedOrdersQ));

    $TotalOrdersQ = "SELECT * FROM `orderstatus`";
    $TotalOrdersRow = mysqli_num_rows(mysqli_query($conn, $TotalOrdersQ));

    $totalIncomequery = "SELECT * FROM `orderstatus` WHERE `status`='Completed'";
    $totalIncomeresult = mysqli_query($conn, $totalIncomequery);

    $totalIncome  = 0;

    while ($income = mysqli_fetch_assoc($totalIncomeresult)) {
        // echo intval( $income["orderTotal"])."<br>";
        $totalIncome += intval( $income["orderTotal"]);
    }

?>

<link rel="stylesheet" href="../assets/css/profile.css">

<div class="w-100 flex">
    <div class="dashboardSide1">


    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            <h1>Home</h1>
        </div>
        <div class="w-100 flex" style="gap: 10px;">
            <div class="homeSmBox">
                <img src="root/media/pendingOrder.png" alt="">
                <div>
                <div class="fs-b1 bold"><p><?= $pendingOrdersRow?></p></div>
                <div>Pending Orders</div>
                </div>
            </div>
            <div class="homeSmBox">
            <img src="root/media/completeOrder.png" alt="">
            <div>
                <div class="fs-b1 bold"><p><?= $CompletedOrdersRow?></p></div>
                <div>Completed Orders</div>
                </div>
            </div>
            <div class="homeSmBox">
            <img src="root/media/totalOrder.png" alt="">
            <div>
                <div class="fs-b1 bold"><p><?= $TotalOrdersRow?></p></div>
                <div>Total Orders</div>
                </div>
            </div>
            <div class="homeSmBox">
            <img src="root/media/totalIncome.png" alt="">
            <div>
                <div class="fs-b1 bold"><p><?= "₱ ".number_format($totalIncome, 2)?></p></div>
                <div>Total Income</div>
            </div>
            </div>
        </div>
        <div class="w-100" style="margin: 30px 0;">
            <h2 class="flex fs-b1 bold">Total Users</h2>
            <p class="flex fs-Xb3 bold"><?=$totalUsersRow?></p>
        </div>
        <div class="w-100">
        <h2 class="flex fs-b1 bold" style="margin-bottom: 10px;">Recent Orders</h2>
            <?php
$orderHistoryquerry = "SELECT DISTINCT orderID FROM `orders` LIMIT 5";
$orderHistoryresult = mysqli_query($conn, $orderHistoryquerry);

while ($orderRow = mysqli_fetch_assoc($orderHistoryresult)) {

?>

    <div class="order">
        <div class="order-header">
            <div>
            <h2>Order ID: <?php echo $orderRow["orderID"] ?></h2>
            <?php
            $orderDetailsQuery = "SELECT * FROM `orderstatus` WHERE `orderID` = '{$orderRow["orderID"]}'";
            $orderDetailsQueryresult = mysqli_query($conn, $orderDetailsQuery);
            while ($orderDetailsRow = mysqli_fetch_assoc($orderDetailsQueryresult)) {

                    
            ?>

            <p>Status: <b><?= $orderDetailsRow["status"]; ?></b></p>
            

            </div>

            <p>Order by: <b><?php
            
            $customerNamequery = "SELECT * FROM `users` WHERE `userID` = '{$orderDetailsRow["userID"]}'";
            $customerNameresult = mysqli_query($conn, $customerNamequery);
            while ($customerName = mysqli_fetch_assoc($customerNameresult)){
                echo $customerName["name"];
            }        
            
             ?>
             </b></p>
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

<?php } ?>
            </div>
        </div>
    </div>
</div>