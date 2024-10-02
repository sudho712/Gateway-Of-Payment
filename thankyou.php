<?php
// Fetching payment details from Instamojo response
$product_name = $_GET['product_name'] ?? 'Unknown Product';
$payment_id = $_GET['payment_id'] ?? 'N/A';
$name = $_GET['name'] ?? 'N/A';
$email = $_GET['email'] ?? 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thank You Page</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Thank You for Your Purchase!</h2>
        <p class="text-center">You have purchased: <strong><?php echo htmlspecialchars($product_name); ?></strong></p>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Payment ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($payment_id); ?></td>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
