<?php 
include('assets/php/connect.php');

$query = "SELECT * FROM users WHERE name='GUEST'";

                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
                    $row = mysqli_fetch_array($result);  

                          $_SESSION['userID'] = $row['userID'];
                          $_SESSION['name'] = $row['name'];
                          header("Location: profile.php");

?>