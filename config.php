<?php
// Database connection details
$dbhost = "localhost";
$dbuser = "root";   // Corrected the username from 'ropt' to 'root' (if 'root' is intended)
$dbname = "shoping"; // Define your actual database name here
$dbpass = ""; // Add this if you have a password set for your database user

// Establishing the connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
