<?php
include('connect.php');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Check if the cart array exists in the session, initialize it if not
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the value from the input fields
    $quantity = $_POST['cartNum'];
    $product_id = $_POST['product_id'];
    $reviewed = "false";

    // Perform validation if needed
    if (empty($quantity) || !is_numeric($quantity) || $quantity < 1 || $quantity > 10) {
        echo "Please enter a valid quantity.";
    } else {
        // Check if the product already exists in the cart
        $existingProductIndex = -1;
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['product_id'] === $product_id) {
                $existingProductIndex = $index;
                break;
            }
        }

        if ($existingProductIndex !== -1) {
            // Product already exists in the cart, update the quantity
            $_SESSION['cart'][$existingProductIndex]['quantity'] += $quantity;
        } else {
            // Product doesn't exist in the cart, add a new entry
            $_SESSION['cart'][] = ['product_id' => $product_id, 'quantity' => $quantity, 'reviewed' => $reviewed];
        }
    }
}

// Handle deletion of cart items
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
    header("Location: cart.php");
    exit();
}

if (isset($_POST['change'])) {
    $product_id = $_POST['product_id1'];
    $quantity = $_POST['changeQuantity'];
  
    foreach ($_SESSION['cart'] as $index => $item) {
      if ($item['product_id'] === $product_id) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;
        break;
      }
    }
  
    // Redirect to the same page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
  }



//FOR UNIQUE ORDER
$cartItems = $_SESSION['cart'];

// $productIDs = array_column($cartItems, 'product_id'); // Extract product IDs from cart items
// $productIDsString = implode(',', $productIDs); // Convert the array to a comma-separated string

// $productQuantities = array_column($cartItems, 'quantity'); // Extract product quantities from cart items
// $productQuantitiesString = implode(',', $productQuantities); // Convert the array to a comma-separated string

// $productReviews = array_column($cartItems, 'reviewed'); // Extract product quantities from cart items
// $productReviewsString = implode(',', $productReviews); // Convert the array to a comma-separated string


function generateUniqueString() {
  $prefix = 'JP-';
  $randomNumbers = '';
  $isUnique = false;
  
  while (!$isUnique) {
      $randomNumbers = mt_rand(1000000000, 9999999999); // Generate 10 random numbers
      
      // Check if the generated string already exists
      $existingString = checkExistingString($prefix . $randomNumbers);
      
      if (!$existingString) {
          $isUnique = true;
      }
      else{
        $randomNumbers + 50;
      }
  }
  return $prefix . $randomNumbers;
}

function checkExistingString($string) {
  return false;
}

// Generate a unique string
$uniqueString = generateUniqueString();

if (isset($_POST['placeorder'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];
    $address = $_POST['address'];
    $shippingMethod = $_POST['shippingMethod'];
    $paymentMethod = $_POST['paymentMethod'];


    foreach ($cartItems as $index => $item) {
        $query = "INSERT INTO `orders` (`orderID`, `userID`, `orderDate`, `products`, `quantity`, `reviewStatus`, `orderTotal`) VALUES ('$uniqueString', '{$_SESSION['userID']}', NOW(), '{$item["product_id"]}', '{$item["quantity"]}', '{$item["reviewed"]}', '{$_SESSION['orderTotal']}')";
        $result = mysqli_query($conn, $query);

        $stockquery = "SELECT * FROM `products` WHERE `productID` = '" . $item['product_id'] . "'";
    $stockresult = mysqli_query($conn, $stockquery);
    while($stock = mysqli_fetch_assoc($stockresult))  {
      $updatedStock = intval($stock["stocks"]) - intval($item['quantity']);
      $updatestockquery = "UPDATE products SET stocks = '$updatedStock' WHERE productID = '{$item['product_id']}'";
        $result = mysqli_query($conn, $updatestockquery);

    }

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
            exit; // Stop further processing if an error occurs
        }
    }

    $query = "INSERT INTO `orderstatus` (`orderID`, `userID`, `orderTotal`, `status`, `customerName`, `email`, `phoneNum`, `shippingAddress`, `shippingMethod`, `paymentMethod`) VALUES ('$uniqueString', '{$_SESSION['userID']}', '{$_SESSION['orderTotal']}', 'Pending', '$name', '$email', '$phoneNum', '$address', '$shippingMethod', '$paymentMethod')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
            exit; // Stop further processing if an error occurs
        }


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
    <p><b>ORDER: '.$uniqueString.'</b></p>
    <h2>Thank you for your purchase!</h2>
    <p>We are getting your order ready to be shipped. We will notify you when it has been sent</p>
    <br>
    <h3>Order summary</h3>
    <br>';

$_SESSION['cartTotal'] = 0;
$cartItems = $_SESSION['cart'];

$query1 = "SELECT * FROM `products` WHERE `productID` = '" . $item['product_id'] . "'";
    $result1 = mysqli_query($conn, $query1);

foreach ($cartItems as $index => $item) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $itemprice = intval($row1['productPrice']) * intval($item['quantity']);

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
                    <p><b>'.$row1['productName'].' '.$item['quantity'].'x</b></p>
                    <p><small>'.$row1['productVar'].'</small></p>
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
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// $_SESSION['cart'] = []; // Clears the cart array

    echo "New order created successfully.";
    $_SESSION['cart'] = []; // Clears the cart array
    header("Refresh:0");
    mysqli_close($conn);
}


?>
