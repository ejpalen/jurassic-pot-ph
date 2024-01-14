<?php
    include '../sharable/connect.php';

    $prodID = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $prodVar = $_POST['prodVar'];
    $prodPrice = $_POST['prodPrice'];
    $prodStock = $_POST['prodStock'];
    $prodDesc = $_POST['prodDesc'];

    $query = "UPDATE `products` SET `productName`='$prodName',`productVar`='$prodVar',`productPrice`='$prodPrice',`productDesc`='$prodDesc',`stocks`='$prodStock' WHERE `productID`='$prodID'";
    if(mysqli_query($conn, $query)) {
        echo "success";
    }
    else {
        echo "failed";
    }
?>