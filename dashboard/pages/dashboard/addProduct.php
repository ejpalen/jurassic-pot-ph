<?php
    include '../sharable/connect.php';

    $prodName = $_POST['prodName'];
    $prodVar = $_POST['prodVar'];
    $prodPrice = $_POST['prodPrice'];
    $prodStock = $_POST['prodStock'];
    $prodDesc = $_POST['prodDesc'];
    $prodPFP = $_POST['prodPFP'];

    $query = "INSERT INTO `products`(`productName`, `productVar`, `productPrice`, `productDesc`, `stocks`, `productActiveStatus`, `productLOC`) 
    VALUES ('$prodName', '$prodVar', '$prodPrice', '$prodDesc', '$prodStock', 'ACTIVE', '$prodPFP')";

     if(mysqli_query($conn, $query)) {
        echo "success";
    }
    else {
        echo "failed";
    }

?>