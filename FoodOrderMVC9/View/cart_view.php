
<?php session_start();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bone.css">
    <style>
        .cart {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px; /* Khoảng cách giữa các dòng */
        }
        table tbody tr{
            padding: 15px 0; /* Điều chỉnh padding theo ý muốn */
            margin-bottom: 20px; /* Điều chỉnh margin giữa các hàng theo ý muốn */   
        }
        table th, table td {
            border: none; /* Loại bỏ border giữa các ô */
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Thêm border dưới */
        }
        table th:first-child,
        table td:first-child {
            border-left: 1px solid #ddd; /* Thêm border bên trái cho cột đầu tiên */
        }
        table th:last-child,
        table td:last-child {
            border-right: 1px solid #ddd; /* Thêm border bên phải cho cột cuối cùng */
        }
        .cart-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }
        .cart-summary label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        .cart-summary button {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .cart-summary button:hover {
            background-color: #0056b3;
        }
        /* CSS để thay đổi màu sắc và hiệu ứng cho các button */
        .minus-btn,
        .plus-btn {
            margin: 5px; /* Điều chỉnh khoảng cách theo ý muốn */
        }
        button {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }
        /* Màu mặc định của nút */
        button.default {
            background-color: #007bff;
            color: #fff;
        }
        /* Màu khi di chuột vào nút */
        button.default:hover {
            background-color: #0056b3;
        }
        /* Màu nút thực hiện hành động chính, ví dụ: Đặt hàng */
        button.primary {
            background-color: #ff4081;
            color: #fff;
        }
        /* Màu khi di chuột vào nút thực hiện hành động chính */
        button.primary:hover {
            background-color: #f50057;
        }
        /* Màu nền của checkbox "Chọn tất cả sản phẩm" */
        input[type="checkbox"] {
            /* Thêm các thuộc tính CSS cho checkbox nếu cần */
        }
        /* Màu và hiệu ứng cho label của checkbox */
        input[type="checkbox"]+label {
            font-weight: bold;
            color: #ff4081;
            cursor: pointer;
        }
        /* Màu khi di chuột vào label của checkbox */
        input[type="checkbox"]+label:hover {
            color: #f50057;
        }
    </style>
    <title>Giỏ Hàng</title>
</head>
<body>
    <!-- Logo Section -->

    <div class="cart">
        <h4>Danh sách giỏ hàng</h4>
        <?php

include '../Model/Database.php';
include '../Model/ProductModel.php';
include '../Controller/ProductController.php';
$database = new Database();
$productModel = new ProductModel($database);
$productController = new ProductController($productModel);
// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    ?>

    <body>
     
        <form action = "..Controller/process_checkout.php" method = "POST">
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $cartItem) {
                    ?>
                    <tr>
                        <td><?= $cartItem['IDMonAn'] ?></td>
                        <td><?= $cartItem['TenMonAn'] ?></td>
                        <td><?= $cartItem['Gia'] ?></td>
                        <td>
                            <button type="Button" class="minus-btn" onclick="updateQuantity(this, 'decrease', '<?= $cartItem['IDMonAn'] ?>')">-</button>
                            <span class="quantity-value" id="quantity_<?= $cartItem['IDMonAn'] ?>"><?= $cartItem['SoLuong'] ?></span>
                            <button type="Button" class="plus-btn" onclick="updateQuantity(this, 'increase', '<?= $cartItem['IDMonAn'] ?>')">+</button>
                        </td>
              
                        <td><?= $cartItem['Gia'] * $cartItem['SoLuong'] ?></td>
                    </tr>
                    <?php
                    $totalPrice += $cartItem['Gia'] * $cartItem['SoLuong'];
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Proceed to Checkout</button>
        <!-- Display total price -->
        
        <!-- You can add a button to proceed to checkout or continue shopping -->
    </body>
    </html>
    <?php
} else {
    // Display a message when the cart is empty
    echo "Your shopping cart is empty.";
}
?>

        <div class="cart-summary">
            <label>
                <input type="checkbox" id="checkAll"> Chọn tất cả sản phẩm
            </label>
            <p>Tổng tiền: <?= $totalPrice ?></p>
           
            <button type="submit" name="order">Đặt hàng</button> <!-- Thay đổi tên button theo nhu cầu của bạn -->
        </div>
    </div>
<script>
    function updateQuantity(button, action, productId) {
        // Lấy số lượng hiện tại từ span
        var quantityElement = document.getElementById('quantity_' + productId);
        var currentQuantity = parseInt(quantityElement.innerText);
        // Lấy giá sản phẩm từ cột "Price"
        var priceElement = button.parentElement.previousElementSibling;
        var price = parseFloat(priceElement.innerText);
        // Thực hiện hành động tăng/giảm số lượng
        if (action === 'increase') {
            currentQuantity++;
        } else if (action === 'decrease' && currentQuantity > 1) {
            currentQuantity--;
        }
        // Cập nhật số lượng mới vào span
        quantityElement.innerText = currentQuantity;
        // Cập nhật tổng tiền cho sản phẩm
        var totalElement = button.parentElement.nextElementSibling;
        var newTotal = currentQuantity * price;
        totalElement.innerText = newTotal;
        // Cập nhật tổng tiền cho toàn bộ giỏ hàng
        updateTotalPrice();
    }
    function updateTotalPrice() {
        var totalPrice = 0;
        var rows = document.querySelectorAll('tbody tr');
        rows.forEach(function (row) {
            var priceElement = row.querySelector('td:nth-child(3)');
            var quantityElement = row.querySelector('.quantity-value');
            var price = parseFloat(priceElement.innerText);
            var quantity = parseInt(quantityElement.innerText);
            totalPrice += price * quantity;
        });
        // Cập nhật tổng tiền vào phần tổng kết
        document.querySelector('.cart-summary p').innerText = 'Tổng tiền: ' + totalPrice;
    }
</script>



    <!-- Thêm sản phẩm khác tương tự ở đây -->
  </div>
    <!-- Footer Section -->
    <div class="footer-section">
        <div class="container">
            <h2>Footer</h2>
            <!-- Add your footer content here -->
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
