<?php
    include '../sharable/connect.php';
    $prodID = $_POST['prodID'];

    $query = "UPDATE `products` SET `productActiveStatus`='DELETED' WHERE `productID`=$prodID";
    if(mysqli_query($conn, $query)) {
        echo "success";
    }
    else {
        echo "failed";
    }
?>