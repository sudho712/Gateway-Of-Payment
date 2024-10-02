<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
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
<?php
require 'config.php';

// SQL query to select all products
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); // Changed '$con' to '$conn'
?>
<div class="container">
    <div class="row">
    <?php
        // Loop through the fetched product data
        while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="col-lg-4 mt-3 mb-3">
            <div class="card-deck">
                <div class="card border-info p-2">
                    <img src="<?= $row['product_image']; ?>" class="card-img-top" height="320">
                    <h5 class="card_title"> Product: <?= $row['product_name']; ?></h5>
                    <h3 class="card_title"> Price: <?= number_format($row['product_price']); ?></h3>
                    <a href="order.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-block btn-lg">Buy Now</a>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</div>

</body>
</html>