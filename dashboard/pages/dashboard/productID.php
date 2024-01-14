<?php
    include '../sharable/connect.php';
    
    $prodID = $_POST['prodID'];

    $query = "SELECT * FROM `products` WHERE `productID`=$prodID";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $productID  = $row['productID'];
        $productName = $row['productName'];
        $productVar = $row['productVar'];
        $productPrice = $row['productPrice'];
        $productDesc = $row['productDesc'];
        $stocks = $row['stocks'];
        $productActiveStatus = $row['productActiveStatus'];
        $productLOC = $row['productLOC'];

        $responseData = array(
            'id' => $productID,
            'name' => $productName,
            'variant' => $productVar,
            'price' => $productPrice,
            'description' => $productDesc,
            'stocks' => $stocks,
            'productActiveStatus' => $productActiveStatus,
            'pfp' => $productLOC
        );

        $jsonResponse = json_encode($responseData);

        echo $jsonResponse;
    }
    else {
        $response = 'error';
        echo $response;
    }
?>
