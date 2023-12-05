

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

    .signup-section {
        background-color: pink; 
        border-radius: 20px;
    }

    .signup-section form {
    padding: 5%;
    }
    
    .signup-section form label,
    .signup-section form input,
    .signup-section form .form-group {
        font-family: 'Poppins', sans-serif;
    }

    </style>

    <title>sign-up</title>
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
<?php
session_start();
?>




    <div class="col-sm-12 col-md-7 ad-section d-none d-md-block">
        <img src="adpicture.jpg" alt="Mô tả về ảnh">
    </div>

    <div class="col-sm-12 col-md-5 signup-section">
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']); // Clear the error message after displaying
            }
            ?>

        <form action="../Controller/Xuly.php" method="POST" role="form">                
            <h2>Đăng ký tài khoản</h2>

            <div class="form-group">
                <label for="">Tên người dùng</label>
                <input type="text" class="form-control" id="" placeholder="nhập tên người dùng" name="name"required>
            </div>

            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" placeholder="nhập số điện thoại" name="sdt" required pattern="\d{10}" title="Please enter a 10-digit phone number">
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="">Thành phố</label>
                        <input type="text" class="form-control" placeholder="nhập thành phố" name="thanhpho"required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="">Quận</label>
                        <input type="text" class="form-control" placeholder="nhập quận" name="quan"required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="">Phường</label>
                        <input type="text" class="form-control" placeholder="nhập phường" name="phuong" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="">Đường</label>
                        <input type="text" class="form-control" placeholder="nhập đường" name="duong" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Tên tài khoản</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="tenTaiKhoan" required pattern="[A-Za-z0-9]+" title="Please enter a username without spaces or special characters">
            </div>

            <div class="form-group">                
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" id="matKhau" placeholder="Input field" name="matKhau" required minlength="6">
            </div>


            <div class="form-group">                
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="rmatkhau" placeholder="Input field" name="rmatkhau" required minlength="6">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
<script>
    function checkPasswordMatch() {
        var matKhau = document.getElementById('matKhau').value;
        var rmatkhau = document.getElementById('rmatkhau').value;

        if (matKhau !== rmatkhau) {
            alert("Mật khẩu và Nhập lại mật khẩu phải giống nhau!");
            return false;
        }

        return true;
    }

    // Add an event listener to the form to call the checkPasswordMatch function before submission
    document.querySelector('form').addEventListener('submit', function(event) {
        if (!checkPasswordMatch()) {
            event.preventDefault(); // Prevent form submission
        }
    });
</script>



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

    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('searchBox');
            searchBox.classList.toggle('active');

            var searchInput = document.getElementById('searchInput');
            if (searchBox.classList.contains('active')) {
                searchInput.focus();
                document.body.addEventListener('click', closeSearchBox);
            } else {
                document.body.removeEventListener('click', closeSearchBox);
            }
        }

        function closeSearchBox(event) {
            var searchBox = document.getElementById('searchBox');
            var searchIcon = document.querySelector('.search-icon');
            if (!searchBox.contains(event.target) && !searchIcon.contains(event.target)) {
                searchBox.classList.remove('active');
                document.body.removeEventListener('click', closeSearchBox);
            }
        }
    </script>
</body>

</html>