<?php
// Include the configuration file
require 'config.php';

// Read the POST data from Instamojo
$data = file_get_contents("php://input");
$decoded_data = json_decode($data, true);

// Extract the necessary data
$purpose = $decoded_data['purpose'];
$amount = $decoded_data['amount'];
$name = $decoded_data['buyer_name'];
$email = $decoded_data['buyer_email'];
$phone = $decoded_data['buyer_phone'];
$pid = $decoded_data['payment_id'];
$status = $decoded_data['status'];

// Insert the data into the pay table
$sql = "INSERT INTO pay (purpose, amount, name, email, phone, pid, status) 
        VALUES ('$purpose', '$amount', '$name', '$email', '$phone', '$pid', '$status')";

if ($conn->query($sql) === TRUE) {
    http_response_code(200); // Respond with a 200 status code to acknowledge receipt
} else {
    error_log("Error: " . $sql . "\n" . $conn->error); // Log error to a file
    http_response_code(500); // Respond with a 500 status code in case of an error
}

// Close the database connection
$conn->close();
?>
