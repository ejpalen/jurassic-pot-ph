<?php
    include '../sharable/connect.php';
    session_start();
    
    $userid = $_POST['userID'];

    $query = "UPDATE `users` SET `userStatus`='DELETED' WHERE `userID`=$userid";
    if(mysqli_query($conn, $query)) {
        $response = "success";
        echo $response;
    }
    else {
        $response = 'error';
        echo $response;
    }
?>