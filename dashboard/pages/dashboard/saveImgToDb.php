<?php
    include '../sharable/connect.php';

    $prodPFP = $_POST['img'];
    $prodID = $_POST['prodID'];
    $query = "UPDATE `products` SET `productLOC`='$prodPFP' WHERE `productID`=$prodID";
    if(mysqli_query($conn, $query)) {
        echo "success";
    }
    else {
        echo "error";
    }
?>