<!DOCTYPE html>
<?php
    session_start();
    include '../assets/php/connect.php';

    $page = isset($_GET['page']) ? $_GET['page'] : '';

    if($page == ""){
        header("Location: index.php?page=pages/dashboard.php");
    }

    if($_SESSION['usertype'] == "CUSTOMER" || $_SESSION['usertype'] == "GUEST"){
        header("Location: ../index.php");
    }
    else{
        
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="root/css/style.css"/>
        <link rel="stylesheet" href="../assets/css/style.css">
        <?php include('../assets/php/head-meta.php');?>
        <link rel="icon" href="../media/favicon.ico" type="image/x-icon">
        <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            .sideNavLinksActive, .sideNavLinksActive p{
    color: white !important;
  }

  .sideNavLinksActive .fa-solid{
    color: white !important;
  }
        </style>
        <title>Jurassic Pot Ph | Admin</title>
    </head>
    <body>
            <?php
                include 'pages/sharable/adminSideNav.php';
            ?>
        </header>
        <main>
            <?php
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                else {
                    $page = 'pages/dashboard.php';
                }
                include($page);
            ?>
        </main>
        <script src="root/js/editProducts.js"></script>
        <script src="root/js/addProd.js"></script>
        <script src="root/js/deleteUser.js"></script>
    </body>
</html>