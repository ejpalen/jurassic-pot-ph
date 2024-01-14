<?php
    $username ="root"; 
    $password=""; 
    $database="jurassicpot";  
    $conn = mysqli_connect("localhost",$username,$password);
    mysqli_select_db($conn, $database) or die ("Unable to select database");
?>

<!-- <?php
    $username ="if0_34922834"; 
    $password="F2bivVXZU84"; 
    $database="if0_34922834_jurassicpot";  
    $conn = mysqli_connect("localhost",$username,$password);
    mysqli_select_db($conn, $database) or die ("Unable to select database");
?> -->