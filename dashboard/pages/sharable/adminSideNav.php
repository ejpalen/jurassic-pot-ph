<div class="sideNav">
    <div class="sideNavLogo">
        <img src="root\media\logo.png" alt="">
    </div>
    <div class="sideNavTitle"><h4> Main Menu</h4></div>
    <div class="sideNavLinksCont">
        <a href="index.php?page=pages/dashboard.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/dashboard.php' || $_GET['page'] == '' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-house sideNavIcon"></i>
            <p>Home</p>
        </a>
        <a href="index.php?page=pages/users.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/users.php' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-users sideNavIcon"></i>
            <p>Users</p>
        </a>
        <a href="index.php?page=pages/orders.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/orders.php' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-shop sideNavIcon"></i>
            <p>Orders</p>
        </a>
        <a href="index.php?page=pages/products.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/products.php' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-box sideNavIcon"></i>
            <p>Products</p>
        </a>
        <a href="index.php?page=pages/reviews.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/reviews.php' ? "sideNavLinksActive" : "";?>">
        <i class="fa-solid fa-star sideNavIcon"></i>
            <p>Reviews</p>
        </a>
        <a href="index.php?page=pages/queries.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/queries.php' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-clipboard-question sideNavIcon"></i>
            <p>Queries</p>
        </a>
        <a href="index.php?page=pages/aboutUs.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/aboutUs.php' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-circle-info sideNavIcon"></i>
            <p>About us</p>
        </a>
        <a href="index.php?page=pages/faqs.php" class="sideNavLinks <?= $x = isset($_GET['page']) && $_GET['page'] == 'pages/faqs.php' ? "sideNavLinksActive" : "";?>">
            <i class="fa-solid fa-question sideNavIcon"></i>
            <p>FAQs</p>
        </a>
    </div>
    <div class="sideNavLogout">
        <a href="../" class="sideNavLinks">
            <i class="fa-solid fa-arrow-right-from-bracket sideNavIcon"></i>
            <p>Log out</p>
        </a>
    </div>
</div>