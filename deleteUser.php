<?php
include('assets/php/connect.php');

$query = "UPDATE `users` SET `userStatus`='DELETED' WHERE `userID`= {$_SESSION['userID']}";
    if(mysqli_query($conn, $query)) {
        $response = "success";
        echo $response;
        header("Location: index.php");
    }

?>