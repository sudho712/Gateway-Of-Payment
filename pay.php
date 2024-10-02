<?php
$product_name = $_POST['product_name'];
$price = $_POST['product_price'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

include 'instamojo/Instamojo.php';

$api = new Instamojo\Instamojo('YOUR_API_KEY', 'YOUR_AUTH_TOKEN', 'https://www.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "email" => $email,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "allow_repeated_payments" => false,
        "redirect_url" => "http://gateway/thankyou.php",
        // If you have a webhook URL, add it here
        /* "webhook" => "http://yourwebsite.com/webhook.php"  */
    ));
    
    // Payment request URL
    $pay_url = $response['longurl'];
    header("Location: $pay_url");
    exit();
} catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>
