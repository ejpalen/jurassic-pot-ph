<?php
    $username ="root"; 
    $password=""; 
    $database="jurassicpot";  
    $conn = mysqli_connect("localhost",$username,$password);
    mysqli_select_db($conn, $database) or die ("Unable to select database");

    if (session_status() === PHP_SESSION_ACTIVE) {
        // Session is already active
    } else {
        // Session is not active, start a new session
        session_start();
    }
?>