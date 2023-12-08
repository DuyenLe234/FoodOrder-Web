 <?php  session_start(); // Mở phiên session 
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="bone.css">

</head>

<body>
    

    <!-- Logo Section -->
    <div class="logo-section">
      <div class="logo-container">
          <div class="social-icons">
              <img src="./Image/facebook-logo.png" alt="Facebook">
              <img src="./Image/instagram-logo.png" alt="Instagram">
              <img src="./image/twitter-logo.png" alt="Twitter">
          </div>
          <div class="brand-logo">
              <img src="./Image/brand-logo.png" alt="Brand Logo">
          </div>
   

        <div class="search-login">
        <div class="cart-icon">
        <img src="./Image/cart.jpg" alt="Cart" style="width: 40px; height: 40px;">
        
    </div>
            <div class="search-icon" onclick="toggleSearchBox()">
                <img src="./Image/search-logo.png" alt="Search">
            </div>
            <!-- Add cart icon here -->

            <button class="login-button" onclick="redirectToLogin()">Login</button>

            <script>
                function redirectToLogin() {
                    // Chuyển hướng đến trang login.php
                    window.location.href = 'Sign-In.php';
                }
            </script>
            <div class="search-box" id="searchBox">
                <input type="text" id="searchInput" placeholder="Search...">
            </div>

        </div>

            
          </div>
      </div>
  </div>
  <script>
    function redirectToMenuPage() {
        var searchInput = document.getElementById('searchInput');
        var keyword = searchInput.value.trim();

        if (keyword !== '') {
            
            localStorage.setItem('searchKeyword', keyword);

           
            window.location.href = 'Menupage.php?page=1&keyword=' + encodeURIComponent(keyword);
        }
    }

    // Function để lưu từ khóa vào Local Storage
    function saveKeywordToStorage(keyword) {
        localStorage.setItem('searchKeyword', keyword);
    }

    // Function để xử lý sự kiện khi nhấn enter trong ô tìm kiếm
    function handleEnterKeyPress(event) {
        if (event.key === 'Enter') {
            var searchInput = document.getElementById('searchInput');
            var keyword = searchInput.value.trim();

            if (keyword !== '') {
                // Lưu từ khóa vào Local Storage
                saveKeywordToStorage(keyword);

                // Gọi hàm tìm kiếm hoặc chuyển hướng đến trang tìm kiếm
                // Ở đây tôi giả sử bạn muốn gọi hàm toggleSearchBox khi nhấn enter
                toggleSearchBox();
                redirectToMenuPage();
            }
        }
    }

    // Thêm sự kiện lắng nghe khi nhấn phím enter trong ô tìm kiếm
    document.getElementById('searchInput').addEventListener('keyup', handleEnterKeyPress);
</script>

  <script>
    function toggleSearchBox() {
        var searchBox = document.getElementById('searchBox');
        searchBox.classList.toggle('active');
  
        var searchInput = document.getElementById('searchInput');
        if (searchBox.classList.contains('active')) {
            // Focus on the search input when the search box is active
            searchInput.focus();
            // Add a click event listener to the document body to close the search box if the user clicks outside of it
            document.body.addEventListener('click', closeSearchBox);
        } else {
            // Remove the click event listener when the search box is not active
            document.body.removeEventListener('click', closeSearchBox);
        }
    }
  
    function closeSearchBox(event) {
        var searchBox = document.getElementById('searchBox');
        var searchIcon = document.querySelector('.search-icon');
        // Check if the clicked element is not the search box or the search icon
        if (!searchBox.contains(event.target) && !searchIcon.contains(event.target)) {
            // If the click is outside the search box, hide it
            searchBox.classList.remove('active');
            // Remove the click event listener
            document.body.removeEventListener('click', closeSearchBox);
        }
    }
  </script>

        <!-- Menu Section -->
<!-- Menu Section -->
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
                <ul class="navbar-nav mx-auto" id="menuItems">
                    <li class="nav-item active">
                        <a class="nav-link menu-item" href="Mainpage.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="MenuPage.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="Promotion.php">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-item" href="#">Tin tức</a>
                    </li>
                    
                    <?php
                   
                    if (isset($_SESSION['user_id'])) {
                        echo '<li class="nav-item"><a class="nav-link menu-item" href="profile.php">Thông tin cá nhân</a></li>';
                        echo '<li class="nav-item"><a class="nav-link menu-item" href="../Controller/logout.php">Đăng Xuất</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</div>


          <!-- Banner Section -->
        <div class="banner-section">
            <img class="banner-image" src="Banner.jpg" alt="Banner Image">
            <div class="banner-text">
                Cinnamon Apple
            </div>
        </div>
            <!-- Signup Section -->

  

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

