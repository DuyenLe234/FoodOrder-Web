<?php
include "Bone.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bone.css">
    
    <style>
 

        .flex-container {

            margin: auto;
        }
        .signup-section{
            max-width: 1400px;
            margin: auto;
        }

        .flex-container  {
        display: flex;
        flex-wrap: wrap;
        max-width: 1400px;
        }

        .filter {
            flex: 30%;
            background-color: lightcoral;
            padding: 40px;
            box-sizing: border-box; /* Include padding in the width calculation */
        }

        .display-category {
            flex: 70%;
            padding: 40px;
            background-color: ;
            box-sizing: border-box; /* Include padding in the width calculation */
        }
        /* ... your existing styles ... */

    @media (max-width: 768px) {
        .flex-container {
            flex-direction: column; /* Stack items vertically on smaller screens */
        }

        .filter, .display-category {
            flex: 100%; /* Take up full width on smaller screens */
        }
    }

        .signup-section {
            background-color: #87CEEB;
            color: white;
            text-align: center;
            padding: 50px 0;
          
        }

        .footer-section {
            background-color: #696969;
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        justify-content: center;
        border: 2px solid #ffc0cb;
        margin: 0 4px;
        border-radius: 4px;
        width: 45px; 
        align-items: center;
    }

    .pagination a:hover {
        background-color: #faf2f9;
        color: black;
    }

    .pagination .active {
        background-color: #007bff;
        color: black;
    }

        /* Default styles for larger screens */
        .card {
            width: 300px;
            height: 350px;
            background-color: #f4d3e2;      
        }

        .card img {
        width: 100%;
        height: 80%;
        object-fit: cover; /* Maintain aspect ratio and cover the container */
    }
        .card-title {
        font-size: 20px ; /* Adjust the font size to your preference */
        margin-top: -8px;
    }
    .card-text{
        font-size: 20px ;
        margin-top: -10px;
    }
       /* Adjust styles for medium screens */
        @media (max-width: 767px) {
            .card {
                width: 110px;
                height: 190px;
                
            }
            .card-title {
        font-size: 10px; /* Adjust the font size to your preference */
        margin-top: -8px;
    }
    .card-text{
        font-size: 11px ;
        margin-top: -12px;
       
    }
        }
        .product-detail-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: auto;
    padding: 20px;
    background-color: pink;
}

.product-image, .product-info {
    flex: 1 0 48%; /* Ensures that the image and product details take up roughly half the space */
    margin: 1%; /* Adds a small gap between the image and product details */
    box-sizing: border-box; /* Include padding and border in the total width and height */
}

.card {
    width: 100%;
    height: 100%;
}

.card-img-top {
    width: 100%;
    height: 80%;
    object-fit: cover; /* Maintain aspect ratio and cover the container */
}

@media (max-width: 768px) {
    .product-detail-container {
        flex-direction: column;
    }

    .product-image, .product-info {
        flex: 100%;
    }
}
/* Add this to your existing CSS */
.quantity-input {
    display: inline-block;
    width: 50px;
    text-align: center;
    margin-right: 10px;
}

.add-to-cart-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    border-radius: 4px;
}



.add-to-cart-btn:hover {
    background-color: #0056b3;
    color: white;
}

<style>
    .similar-products {
        margin-top: 20px;
    }

    .similar-products h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }

    .similar-products .card {
        margin-bottom: 20px;
        transition: transform 0.3s ease-in-out;
    }

    .similar-products .card:hover {
        transform: scale(1.05);
    }

    .similar-products .card img {
        width: 100%;
        height: 200px; /* Adjust the height as needed */
        object-fit: cover;
    }

    .similar-products .card-body {
        padding: 15px;
    }

    .similar-products .card-title {
        font-size: 18px;
        margin-top: 10px;
    }

    .similar-products .card-text {
        font-size: 16px;
        color: #666;
    }
</style>

    </style>
    <title>Product Detail</title>
</head>
<body>
    <!-- Product Detail Section -->
<!-- Product Detail Section -->
<div class="container product-detail-container">
    <div class="row no-gutters">
        <div class="col-md-6">
            <div class="product-image">
                <!-- Your product image code goes here -->
                <div class="card">
                    <?php foreach ($productDetails as $product): ?>
                        <div>
                            <img src="./Dish/<?= $product['HinhAnh'] ?>.png" alt="<?= $product['TenMonAn'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-info">
                <!-- Your product information code goes here -->
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($productDetails as $product): ?>
                            <div>
                                <h2><?= $product['TenMonAn'] ?></h2>
                                <p><?= $product['MoTa'] ?></p>
                                <p>Price: <?= $product['Gia'] ?></p>
                                <p>Category: <?= $product['LoaiMonAn'] ?></p>
                                <!-- Add more details as needed -->
                            </div>
                        <?php endforeach; ?>
                        <div>
                        <?php foreach ($productDetails as $product): ?>
        <!-- ... existing code ... -->
                            <form method="post" action="cart_handler.php">
                                <input type="hidden" name="productId" value="<?= $product['IDMonAn'] ?>">
                                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                            </form>
                        <?php endforeach; ?>
                        </div>
                          
                       
                        <!-- Add more product details as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Similar Products Section -->
<div class="similar-products">
    <h3>Similar Products</h3>
    <div class="row justify-content-center">
        <?php foreach ($similarProducts as $similarProduct): ?>
            <div class="col-md-3">
                <div class="card">
                    <a href="product_details.php?id=<?= $similarProduct['IDMonAn'] ?>"> <!-- Add this line -->
                        <img src="./Dish/<?= $similarProduct['HinhAnh'] ?>.png" class="card-img-top" alt="<?= $similarProduct['TenMonAn'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $similarProduct['TenMonAn'] ?></h5>
                            <p class="card-text">Price: <?= $similarProduct['Gia'] ?></p>
                            <!-- Add more product details as needed -->
                        </div>
                    </a> <!-- Add this line -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

