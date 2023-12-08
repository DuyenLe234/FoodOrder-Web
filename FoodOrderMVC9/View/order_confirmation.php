<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Add your CSS styles or link to external stylesheets here -->
</head>
<body>

<?php
session_start();

include '../Model/Database.php';
include '../Model/OrderModel.php';
include 'OrderController.php';

$database = new Database();
$orderModel = new OrderModel($database);
$orderController = new OrderController($orderModel);

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Retrieve order details for display
    $orderDetails = $orderModel->getOrderDetails($orderId);

    if ($orderDetails) {
        echo "<h1>Order Confirmation</h1>";
        echo "<p>Thank you for your order! Your order details are as follows:</p>";

        // Display order details
        echo "<p>Order ID: $orderId</p>";
        echo "<p>Total Price: $" . number_format($orderDetails['TONGDONHANG'], 2) . "</p>";

        // You can display more order details here as needed

        echo "<h2>Order Items:</h2>";
        // Display order items
        $orderItems = $orderModel->getOrderItems($orderId);
        if ($orderItems) {
            echo "<ul>";
            foreach ($orderItems as $item) {
                echo "<li>{$item['TenMonAn']} - Quantity: {$item['SOLUONG']}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No items found for this order.</p>";
        }

        // Add a link to go back to the home page or any other page
        echo "<p><a href='home.php'>Back to Home</a></p>";
    } else {
        echo "<p>Error retrieving order details.</p>";
    }
} else {
    echo "<p>Invalid order ID.</p>";
}
?>

</body>
</html>
