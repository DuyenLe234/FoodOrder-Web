
<?php
        session_start();


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

    .flex-container {        
        background-color: pink;
        display: flex;
        flex-wrap: wrap;
        margin-top: 15px ;
        margin-bottom: 5% ;
        margin-left: 5%;
        margin-right: 5%;
        border-radius: 20px;
    }
        
    .ad-section {
        background-color: pink;
        border-radius: 20px;            
    }
    .ad-section img {
    max-width: 100%;
    max-height: 100%;
    width: 100%; 
    height: 100%;
    }

    .signin-section {
        background-color: pink; 
        border-radius: 20px;
    }

    .signin-section form {
        padding: 5%;
    }
    
    .signin-section form label,
    .signin-section form input,
    .signin-section form .form-group {
        font-family: 'Poppins', sans-serif;
    }

    </style>

    <title>sign-in</title>
</head>

<body>
    <!-- Logo Section -->
    <div class="logo-section">
        <div class="logo-container">
            <div class="social-icons">
                <img src="facebook-logo.png" alt="Facebook">
                <img src="instagram-logo.png" alt="Instagram">
                <img src="twitter-logo.png" alt="Twitter">
            </div>
            <div class="brand-logo">
                <img src="brand-logo.png" alt="Brand Logo">
            </div>
            <div class="search-login">
                <div class="search-icon" onclick="toggleSearchBox()">
                    <img src="search-logo.png" alt="Search">
                </div>
                <button class="login-button">Login</button>
                <div class="search-box" id="searchBox">
                    <input type="text" id="searchInput" placeholder="Search...">
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <div class="menu-section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="menu-toggle-text">ĂN ÍT THÔI</div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link menu-item" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="#">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="#">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="#">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="#">Khuyến mãi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

<div class="row flex-container">

    <div class="col-sm-12 col-md-7 ad-section d-none d-md-block">
        <img src="adpicture.jpg" alt="Mô tả về ảnh">
    </div>


    <div class="col-sm-12 col-md-5 signin-section">

        <form action="../Controller/Xulydangnhap.php" method="POST" role="form">                
            <h2>Đăng nhập tài khoản</h2>

            <div class="form-group">
                <label for="">Tên tài khoản</label>
                <input type="text" class="form-control" id="" placeholder="nhập tên tài khoản" name="tenTaiKhoan" required pattern="[A-Za-z0-9]+" title="Please enter a username without spaces or special characters">
            </div>

            <div class="form-group">                
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" id="matKhau" placeholder="nhập mật khẩu" name="matKhau" required minlength="6">
            </div>

            <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
        </form>
        <?php 
                // Display error message if there is one
                if (isset($_SESSION['error_message'])) {
                    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
        ?>
    </div>
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