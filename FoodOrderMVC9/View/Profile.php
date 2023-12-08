<?php include "Bone.php"?>

<style>
    /* Add this style to hide the banner section on the profile.php page */
    .banner-section {
        display: none;
    }
</style>

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
        .row {
        display: flex;
        flex-wrap: wrap;
        margin: 2%;
        border-radius: 20px;
        }

        .left-bar {
            background-color: #ffc0cb;
            padding: 20px;
            border-radius: 20px;
            color: white; /* Thay đổi màu chữ thành màu trắng */
            /* Thêm đổ bóng */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng mờ nhẹ */
            transition: box-shadow 0.3s ease; /* Hiệu ứng chuyển động khi đổ bóng thay đổi */
        }

        .left-bar p {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .left-bar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .left-bar li {
            margin-bottom: 10px;
        }

        .left-bar a {
            text-decoration: none;
            color: #333;
        }

        .left-bar a:hover {
            color: #fff;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2); /* Đổ bóng lớn hơn khi hover */
        }

        .main-container {
            padding: 20px;
            background-color: #faf2f9;
            border-radius: 20px;
        }
    </style>


</head>

    <div class="col-sm-12 col-md-9 main-container" id="mainContainer">
    <!-- Nơi chứa thông tin khi nhấp vào chức năng -->
    <h2>Thông tin người dùng</h2>
    <p>Đây là nơi hiển thị thông tin người dùng</p>
    


    </div>
    <div class="row flex-container">
        <div class="col-sm-12 col-md-3 left-bar">
            <p>Xin chào tình yêu 💗 </p>
            <ul>
                <li><a href="#" onclick="showProfile()">Thông tin người dùng</a></li>
                <li><a href="#" onclick="showOrderHistory()">Lịch sử đặt hàng</a></li>
                <li><a href="#" onclick="logout()">Đăng xuất</a></li>
            </ul>
        </div>
    <script>
        function showProfile() {
            var profileForm = document.getElementById('profileForm');

            // Toggle the visibility of the profile form
            if (profileForm.style.display === 'none' || profileForm.style.display === '') {
                profileForm.style.display = 'block';
            } else {
                profileForm.style.display = 'none';
            }
        }
    </script>

        <div class="col-sm-12 col-md-9 main-container" id="mainContainer">
        <?php
   require_once '../Model/TaiKhoanModel.php';
   require_once '../Controller/ProfileController.php';
   
   // Assuming $model is an instance of TaiKhoanModel
   $model = new TaiKhoanModel();
   
   // Create an instance of the ProfileController
   $profileController = new ProfileController($model);
   
   if (isset($_SESSION['user_id'])) {
       $tenTaiKhoan = $_SESSION['user_id'];
       $customerProfile = $profileController->getCustomerProfile($tenTaiKhoan);
   
       // Display customer information
       if ($customerProfile) {
      
           ?>
           <form id="profileForm" action="../Controller/update_profile.php" method="post">
           <input type="hidden" id="customerId" name="customerId" value="<?php echo $customerProfile['IDKhachHang']; ?>">
               <label for="newName">Họ và Tên:</label>
               <input type="text" id="newName" name="newName" value="<?php echo $customerProfile['TenKhachHang']; ?>" required><br>
   
             
               <label for="newEmail">Gmail:</label>
               <input type="email" id="newEmail" name="newEmail" value="<?php echo $customerProfile['Email']; ?>" required><br>
   
               <label for="newPhoneNumber">Số điện thoại:</label>
               <input type="tel" id="newPhoneNumber" name="newPhoneNumber" value="<?php echo $customerProfile['SDT']; ?>" required><br>
   
               <label for="newBirthdate">Ngày Sinh</label>
               <input type="date" id="newBirthdate" name="newBirthdate" value="<?php echo $customerProfile['NgaySinh']; ?>" required><br>
               <label for="thanhPho">Thành Phố:</label>
                <input type="text" id="thanhPho" name="thanhPho" value="<?php echo $customerProfile['ThanhPho']; ?>" required><br>

                <label for="quan">Quận:</label>
                <input type="text" id="quan" name="quan" value="<?php echo $customerProfile['Quan']; ?>" required><br>

                <label for="phuong">Phường:</label>
                <input type="text" id="phuong" name="phuong" value="<?php echo $customerProfile['Phuong']; ?>" required><br>

                <label for="duong">Đường:</label>
                <input type="text" id="duong" name="duong" value="<?php echo $customerProfile['Duong']; ?>" required><br>

               <button type="submit">Cập nhật thông tin</button>
           </form>
           <?php
       } else {
           echo "Không tìm thấy thông tin khách hàng.";
       }
   } else {
       // Redirect to login page if not logged in
       header("Location: login.php");
       exit();
   }

            
    ?>
      

        </div>
    </div>


    <script>      
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
