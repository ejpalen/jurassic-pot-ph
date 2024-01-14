<link rel="stylesheet" href="../assets/css/profile.css">

<div class="w-100 flex">
    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            <h1>Queries</h1>
        </div>

        <div class="order-menu">

        </div>

        <?php

        $orderStatusText = "Default";


$contactquery = "SELECT * FROM `queries`";

?>

        <div class="w-100" style="margin: 30px 0;">
        <h2 class="flex fs-b1 bold">Total Queries</h2>
            <p class="flex fs-Xb3 bold">

            
<?php

    $contactresult = mysqli_query($conn, $contactquery);

	$rowCount = mysqli_num_rows($contactresult);
    echo $rowCount;

?>

            </p>
        </div>

        <div class="w-100">



        <?php
                while ($contact= mysqli_fetch_assoc($contactresult)){

                
        ?>


    <div class="order">
        <div class="order-header">
            <div>
            <h2>Query by: <?php echo $contact["name"] ?></h2>
            <p style="margin-right: 5px;">Email: <b><?php echo $contact["email_add"] ?></b>
        </p>
        </div>
            </div>
            <div style="margin-left: 10px;margin-bottom: 20px;">
        <p>Message: <b><?php echo $contact["message"] ?></b></p>
            </div>
    </div>

    <?php
                }
    ?>


        </div>
    </div>
</div>
