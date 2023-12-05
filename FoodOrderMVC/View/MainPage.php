
<?php
include "Bone.php";
// Gọi file database.php

include "../Controller/MainpageController.php";

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
  

        .signup-section, .popular-categories-section, .super-delicious-section,.blog-section, .curated-collections-section{
            max-width: 1200px;
            margin: auto;
            
        }
        .signup-section {
            background-color: #f4d3e2; /* Light Sky Blue */
            color: white;
            text-align: center;
            padding: 50px 0;
        }
        /* Additional styles for the Sign Up Container */
        .signup-container {
            display: flex;
            justify-content: space-between;
            max-width: 550px; /* Adjust the width as needed */
            margin: auto;
            

        }

        .signup-form {
            width: 70%;
          
            
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            height:83px;
            
        }

        .signup-button {
            width: 30%;
            
            
        }

        .signup-button button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #ff69b4;  /* Adjust the color as needed */
            color: #fff;
            cursor: pointer;
            height: 83px;
        }

  


        .popular-categories-section {
           
            color: black;
            text-align: center;
            padding: 50px 0;
        }

        .super-delicious-section {
            background-color: #faf2f9; 
            color: black;
            text-align: center;
            padding: 50px 0;
        }

        .blog-section {
            background-color: #FF6347; /* Tomato */
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .curated-collections-section {
            background-color: #8A2BE2; /* Blue Violet */
            color: white;
            text-align: center;
            padding: 50px 0;
        }
        /* Default styles for larger screens */
        .card {
            width: 300px;
            height: 350px;
            background-color: #f4d3e2;
           
        }

        .card img {
        width: 100%;
        height: 75%;
        object-fit: cover; 
    }
        .card-title {
        font-size: 23px ;
        margin-top: -8px;
    }
    .card-text{
        font-size: 20px ;
        margin-top: -4px;
    }
       /* Adjust styles for medium screens */
        @media (max-width: 767px) {
            .card {
                width: 180px;
                height: 210px;
                
            }
            .card-title {
        font-size: 13px; 
        margin-top: -8px;
    }
    .card-text{
        font-size: 11px ;
       margin-top: -4px;
       
    }
        }

   


    </style>
    <title>MainPage</title>
</head>

<body>

   
            
        <!-- Signup Section -->
        <div class="signup-section">
            <div class="container">
              

                <!-- Sign Up Container -->
                <div class="signup-container">
                    <div class="signup-form">
                        <input type="tel" id="phoneNumber" placeholder="Enter your phone number">
                    </div>
                    <div class="signup-button">
                        <button onclick="submitSignUp()">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

  

<!-- Popular Categories Section -->
<div class="popular-categories-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-left">Popular Categories</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <?php
                        foreach ($result as $row) {
                            $categoryName = $row['LoaiMonAn'];
                            // Assuming you have a column named 'image' in your MonAn table that stores image paths
                            $imagePath = "../Popular-categories/{$categoryName}.jpg";
                            
            
                            // Display the category with a rounded image
                            echo '<div class="col-6 col-md-2" col-lg-2>';
                            echo '<div class="text-center">';
                            echo '<img src="' . $imagePath . '" alt="' . $categoryName . '" class="rounded-circle" style="width: 150px; height: 150px;">';
                            echo '<p>' . $categoryName . '</p>';
                            echo '</div>';
                            echo '</div>';
                        }

            ?>
        </div>
    </div>
</div>





<!-- Super Delicious Section -->
<div class="super-delicious-section">
    <div class="container">
        <h2 class="text-left">Super Delicious</h2>
        <div class="row">
            <?php


            foreach ($resultTopSellingItems as $row) {
                $itemName = $row['TenMonAn'];
                $itemPrice = $row['Gia'];
                $imageName_1 = $row['HinhAnh'];

            
                $imageName = strtolower(str_replace(" ", "", $imageName_1)); 
                $imagePath = "Dish/{$imageName}.jpg";

                // Display the top-selling item using Bootstrap card
                echo '<div class="col-6 col-md-6 col-lg-4 mt-3">';
                echo '<div class="card">';
                echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $itemName . '">';
                echo '<div class="card-body">';
                echo '<p class="card-text">$' . $itemPrice . '</p>';
                echo '<h5 class="card-title">' . $itemName . '</h5>';
                
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>




    <!-- Blog Section -->
    <div class="blog-section">
        <div class="container">
            <h2>Blog</h2>
            <!-- Add your blog content here -->
        </div>
    </div>

    <!-- Curated Collections Section -->
    <div class="curated-collections-section">
        <div class="container">
            <h2>Curated Collections</h2>
            <!-- Add your curated collections content here -->
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
