

<?php
// Include the configuration file for database connection
require 'config.php';

$msg = ""; // Initialize the message variable

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $p_name = $_POST["pName"];  // Corrected '$_post' to '$_POST'
    $p_price = $_POST['pPrice']; // Corrected '$_post' to '$_POST'

    // Set the target directory for image upload
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES['pImage']['name']);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['pImage']['tmp_name'], $target_file)) {
        // SQL query to insert data into the product table
        $sql = "INSERT INTO product (product_name, product_price, product_image) VALUES ('$p_name', '$p_price', '$target_file')";
        
        // Execute the SQL query
        if (mysqli_query($conn, $sql)) {
            $msg = "Product added successfully.";
        } else {
            $msg = "Error: " . mysqli_error($conn);
        }
    } else {
        $msg = "Failed to upload the image.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gateway of Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 rounded">
                <h2 class="text-center p-2">Add Product Information</h2>
                <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                    <div class="form-group">
                        <input type="text" name="pName" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pPrice" class="form-control" placeholder="Product Price" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                            <label for="customFile" class="custom-file-label">Choose Product Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add">
                    </div>
                    <div class="form-group">
                        <h4 class="text-center">Success/Failure</h4>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center" >
            <div class="col-md-6 mt-3 p-4 bg-light rounded">
                <a href="index.php" class="btn-warning btn-block btn-lg">Go to Product Page</a>
            </div>
        </div>
    </div>
</body>
</html>
