<?php
include 'assets/php/cartfunction.php';
include('assets/php/connect.php');


$name = "Ej Palen";
    $email = "johnejpalen13@gmail.com";

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPSecure = "TLS";  
$mail->Host='smtp.gmail.com';  
$mail->Port='587';   
$mail->Username   = 'edgargpalen@gmail.com'; 
$mail->Password   = 'etullisgqzukmuwv';  
$mail->SMTPKeepAlive = true;  
$mail->Mailer = "smtp"; 
$mail->IsSMTP(); 
$mail->SMTPAuth   = true;             
$mail->CharSet = 'utf-8';  
$mail->SMTPDebug  = 0;     

    // Recipients
    $mail->setFrom('jurassicpotph@gmail.com', 'Jurassic Pot PH');
    $mail->addAddress($email, $name);     

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');             
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');         

    // Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Jurassic Pot PH Order Confirmation';
    $mail->Body = '
    <p><b>ORDER: '.$name.'</b></p>
    <h2>Thank you for your purchase!</h2>
    <p>We are getting your order ready to be shipped. We will notify you when it has been sent</p>
    <br>
    <h3>Order summary</h3>
    <br>';

$_SESSION['cartTotal'] = 0;
$cartItems = $_SESSION['cart'];

foreach ($cartItems as $index => $item) {
    $query = "SELECT * FROM `products` WHERE `productID` = '" . $item['product_id'] . "'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $itemprice = intval($row['productPrice']) * intval($item['quantity']);

        $mail->Body .= '
        <div class="prod1" style="
            display: flex;
            align-items: center;
            gap: 40px;
            border-bottom: 1px solid #F1E4DA;
            padding: 10px 0;
        ">
            <div class="prodinfo" style="
                display: flex;
                align-items: center;
                gap: 10px;
            ">
                <div>
                    <p><b>'.$row['productName'].' '.$item['quantity'].'x</b></p>
                    <p><small>'.$row['productVar'].'</small></p>
                </div>
            </div>
    
            <div class="prodpricewrapper">
                <div class="prodprice">
                <p style="
                padding-left: 60px;
            ">PHP '.$itemprice.'.00</p>
                </div>
            </div>
        </div>
        <br>';

        $_SESSION['cartTotal'] += $itemprice;
    }
}

$mail->Body .= '
    <p>Subtotal: <b>PHP '.number_format($_SESSION['cartTotal'], 2).'</b></p>
    <p>Shipping: <b>PHP 120.00</b></p>
    <br>
    <h2>Total: PHP '.number_format(($_SESSION['cartTotal'] + 120), 2).'</h2>';

// $_SESSION['cart'] = []; // Clears the cart array



// $_SESSION['cart'] = []; // Clears the cart array
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>