<?php
session_start();
include "pages/php/databaseConnection.php";

if(isset($_SESSION["username"])) {
$email = $_SESSION["email"];
$user = true;

//Check if user has a shop
$check_shop = "SELECT * FROM shops WHERE email = '$email'";
$check_shop_result = $conn->query($check_shop);
if($check_shop_result->num_rows > 0) {
    $shop = "true";
} else {
    $shop = "false";
}

} else {
    $email = '';
    $user = false;
    $shop = "false";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Store</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/app.js"></script>
    <!--<script src='typewriterjs-master/dist/core.js'></script>-->
    <script src="js/gsap.min.js"></script>
    <script type="module" src="js/typeEffect.js"></script>
    <script src="js/lottie.min.js"></script>
    <script src="typewriterjs-master/dist/core.js"></script>
    <script src="js/sell.js"></script>
    <script src="bootstrap/jquery.js"></script>
    <script src="js/search.js"></script>
    <script>
        $(document).ready(function() {
            function fetchTopSelling() {
                var screenWidth = window.screen.width;
                var searchField = document.getElementById("search-field").value;
                if(searchField.length == 0) {
                $.ajax({
                    type: "GET",
                    url: "pages/fetchTopSelling.php?topSelling=true",
                    dataType: "text",
                    success: function(data) {
                        $('.top-selling-items').html(data);
                    },
                    complete: function(data) {
                        setTimeout(fetchTopSelling, 1000);
                    }
                })
            }
        }
            setTimeout(fetchTopSelling, 1000);
        })
    </script>
</head>
<body>
    <input type="hidden" id="shop_email" value="<?php echo $email ?>">
    <input type="hidden" id="shop" value="<?php echo $shop ?>">

    <!-- Navigation Bar -->
    <div class="mobile-wrapper1">
    <div id="nav-bar">
        <div class="logo" style="display:flex; justify-content:center; align-items:center; font-size:20px; color:#f53607; font-weight: bold; width:120px;">
            PROJECT 3
        </div>

        <div class="search-bar">           
            <input id="search-field" onkeyup="search()" type="text" placeholder="Search here....">
            <button class="search-button" onclick="search()"><img src="icons/search.png" alt=""></button>
        </div>

        <div class="navlinks">
            <ul>
                <?php
                if(!$user) {echo ' 
                <div id="user-lottie"></div>
                <li><a href="pages/signIn.html">Sign In</a></li>
                <div class="divider"></div>
                <li><a href="pages/register.html">Register</a></li>';
                } else {
                    echo '<li><a href="pages/php/logOut.php">LogOut</a></li>';
                }
                ?>
            </ul>
        </div>
        
        <div class="sell-button-div">
            <Button class="sell-button" onclick="moveToDashboard(<?php echo $user ?>)"><div><img id="money-icon" src="icons/money.png"></img><span>Sell</span> </div></Button>
        </div>
        
        <div id= "menu-lottie" class="menu", onclick="toggleMenu()">
            <!--<div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>-->
        </div>
    </div>

    <div class="mobile-menu">
        <ul class="menu-list">
            <li><a href="pages/signIn.html" id="signIn" class="mobile-menu-links">Sign In</a></li>
            <li><a href="pages/register.html" id="register" class="mobile-menu-links">Register</a></li>
        </ul>
    </div>

    <!-- Categories Section -->

    <div class="category-div">
    <div id="typewriting"><h2 id="help-text"></h2></div>

    <!--<div class="category-links">
        <ul>
            <li><div class="category-container"><img src="icons/smartphone.png" alt="" class="phone-icon"><a href="#">Mobile Phones</a></div></li>
            <div class="category-divider"></div>
            <li><div class="category-container"><img src="icons/laptop.png" alt="" class="laptop-icon"><a href="#">Computing</a></div></li>
            <div class="category-divider"></div>
            <li><div class="category-container"><img src="icons/electronics.png" alt="" class="electronics-icon"><a href="#">Electronics</a></div></li>
            <div class="category-divider"></div>
            <li><div class="category-container"><img src="icons/shirt.png" alt="" class="shirt-icon"><a href="#">Fashion</a></div></li>
            <div class="category-divider"></div>
            <li><div class="category-container"><img src="icons/comb.png" alt="" class="comb-icon"><a href="#">Health & Beauty</a></div></li>
            <div class="category-divider"></div>
            <li><div class="category-container"><img src="icons/ellipsis.svg" alt="" class="ellipsis-icon"><a href="#">Others</a></div></li>
        </ul>
    </div>-->
</div>
</div>

    <!-- Carousel -->
     <div class="carousel">
       <!-- <img class="pic" src="pic6.svg" alt=""></img> -->
       
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       
        <div class="carousel-inner">
          <div id="carousel-img-container" class="carousel-item active">
            <img class="pic" src="carousel/pic6.png" alt="First slide">
          </div>
          <div id="carousel-img-container" class="carousel-item">
            <img class="pic" src="carousel/pic5.png" alt="Second slide">
          </div>
          <div id="carousel-img-container" class="carousel-item">
            <img class="pic" src="carousel/pic7.png" alt="Second slide">
          </div>
          <!--<div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Third slide">
          </div> -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <p class="carousel-control-prev-icon" aria-hidden="true"></p>
          <p class="sr-only">Previous</p>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <p class="carousel-control-next-icon" aria-hidden="true"></p>
          <p class="sr-only">Next</p>
        </a>

      </div>
    </div>

    <!--Top Selling Section-->

    <div class="top-selling-section">
        <h3 class="top-selling-text">Products</h3>
        <div class="top-selling-items"></div>
    </div>

    <!-- Pagination Section -->

    <!--<div class="pagination">
        <img id="left" src="icons/left.png" alt="">
        <div class="selected"><p class="number">1</p></div>
        <div class="not-selected"><p class="number">2</p></div>
        <div class="not-selected"><p class="number">3</p></div>
        <div class="not-selected"><p class="number">4</p></div>
        <div class="not-selected"><p class="number">5</p></div>
        <div class="not-selected"><p class="number">6</p></div>
        <img id="right" src="icons/left.png" alt="">
    </div>-->

    <!-- Footer Section -->
    <div class="footer">
        <div class="footer-links-wrapper">
        <div class="about-us">
            <a href="#" class="footer-link-heading">About Us</a>
            <a href="#" class="footer-link">About This Project</a>
            <a href="#" class="footer-link">Terms and Conditions</a >
            <a href="#" class="footer-link">Privacy Policy</a>
        </div>
        <div class="support">
            <a href="#" class="footer-link-heading">Support</a>
            <a href="#" class="footer-link">support@project3.xyz</a>
            <a href="#" class="footer-link">Safety Tips</a>
            <a href="#" class="footer-link">FAQ</a>
        </div>
        <div class="top-sellers">
            <a href="#" class="footer-link-heading">Our Sellers</a>
            <a href="#" class="footer-link">Top Sellers</a>
            <a href="#" class="footer-link">Most trusted Sellers</a>
            <a href="#" class="footer-link">How To Become a Seller</a>
        </div>
    </div>

    <div class="social-media-links-wrapper">
        <div id="facebook"></div>
        <div id="twitter"></div>
        <div id="instagram"></div>
        <div id="telegram"></div>
        <div id="whatsApp"></div>
    </div>

    <div class="end">
    <div id="background-lottie"></div>
    <h5 id="rights">All Rights Reserved</h5>
    <h5 id="copyright">&copy Intro to software CPEN 2021 </h5>
</div>



    </div>


    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.5/lottie.min.js"></script>-->
    <script src="js/lottiePlayer.js"></script> 
    <script src="bootstrap/jquery.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="js/itemInserter.js"></script>
    <script src="js/itemResponsiveness.js"></script>
    <script src="js/lottie.min.js"></script>
</body>
</html>