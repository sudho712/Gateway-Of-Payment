<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Make sure you are using the correct connection variable $conn
    $sql = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($conn, $sql); // Changed $con to $conn
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result); // Corrected the function name
        
        $pname = $row['product_name'];
        $pprice = $row['product_price'];
        $del_charges = 50;
        $total_price = $pprice + $del_charges;

        $pimage = $row['product_image'];
    } else {
        echo 'No product found!';
    }
} else {
    echo 'No product found!';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete order</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gateway</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Product</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>           
    </ul>
    
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-5">
            <h2 class="text-center p-2 text-primary">Fill the details complete your order</h2>
            <h3>Product details :</h3>
            <table class="table table-bordered" width="500px">
                <tr>
                    <th>Product Name</th>
                    <td><?= $pname; ?></td>
                    <td rowspan="4" class="text-center"> <img src="<?= $pimage; ?>" width="200"></td>
                </tr>
                <tr>
                    <th>Product Price</th>
                    <td>Rs. <?= number_format($pprice) ?></td>
                </tr>
                <tr>
                    <th>Delivery Charges</th>
                    <td>Rs. <?= number_format($del_charges); ?></td>
                </tr>
                <tr>
                    <th>Total Price :</th>
                    <td>Rs. <?= number_format($total_price); ?></td>
                </tr>
            </table>
            
            <h4>Enter Your Details</h4>
<form action="pay.php" method="post" accept-charset="utf-8">
    <input type="hidden" name="product_name" value="<?= $pname; ?>"> <!-- Corrected PHP short tag -->
    <input type="hidden" name="product_price" value="<?= $pprice; ?>"> <!-- Corrected PHP short tag -->

    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Enter your name" required> <!-- Corrected "from-control" to "form-control" and "requierd" to "required" -->
    </div>

    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Enter your e-mail" required> <!-- Corrected "from-control" to "form-control" and "requierd" to "required" -->
    </div>

    <div class="form-group">
        <input type="tel" name="phone" class="form-control" placeholder="Enter your telephone" required> <!-- Corrected "from-control" to "form-control" and "requierd" to "required" -->
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click to Pay: Rs. <?= number_format($total_price); ?>/-"> <!-- Changed "btn-g" to "btn-lg" for better styling -->
    </div>
</form>




        </div>
    </div>
</div>
</body>
</html>