<?php
session_start();
include "php/databaseConnection.php";

if(!isset($_SESSION["username"])) {
    header("location : ../index.php");
} else {
    $email = $_SESSION["email"];

    //Get Shop Name
    $get_shop = "SELECT * FROM shops WHERE email = '$email'";
    $get_shop_result = $conn->query($get_shop);
    if($get_shop_result->num_rows > 0) {
        $shop_object = $get_shop_result->fetch_object();
        $shop_name = $shop_object->shop_name;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="../js/gsap.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            function fetchProducts() {
                var screenWidth = window.screen.width;
                $.ajax({
                    type: "GET",
                    url: "php/loadProducts.php?screen_width="+screenWidth,
                    dataType: "text",
                    success: function(data) {
                        $('.products-section').html(data);
                    },
                    complete: function(data) {
                        setTimeout(fetchProducts, 1000);
                    }
                })
            }

            setTimeout(fetchProducts, 1000);
        })
    </script>
    <script>
        $(document).ready(function() {
            function fetchOrders() {
                var screenWidth = window.screen.width;
                var userEmail = document.getElementById("user_email").value;
                $.ajax({
                    type: "GET",
                    url: "manageOrders?screen_width="+screenWidth+"&user_email="+userEmail,
                    dataType: "text",
                    success: function(data) {
                        $('.orders-content').html(data);
                    },
                    complete: function(data) {
                        setTimeout(fetchOrders, 1000);
                    }
                })
            }

            setTimeout(fetchOrders, 1000);
        })
    </script>
</head>
<body>
    <input type="hidden" id="user_email" value="<?php $email ?>">

    <!-- Navigation Bar -->
    <div class="nav">
        <h3>SELLER DASHBOARD</h3>
        <ul class="nav-links">
            <li><a href="../index.php">Switch to buying</a></li>
            <li><a href="../pages/php/logOut.php"><div class="logout-div"><img src="../icons/svgs/user.svg">Log Out</div></a></li>
        </ul>
        <div id="menu"></div>
    </div>

    <div class="mobile-menu">
        <ul class="menu-list">
            <li><a href="../index.php" id="switch-mobile" class="mobile-menu-links">Switch to buying</a></li>
            <li><a href="../pages/php/logOut.php" id="logout-mobile" class="mobile-menu-links">Log Out</a></li>
        </ul>
    </div>

    <!-- Pop-up window -->
    <div class="pop-up">
        <div class="pop-up-form">
            <form class="inner-form">
            <div class="pop-up-header">ADD PRODUCT</div>
            
            <div id="parameter" class="pname">
                <p>Prouct Name</p>
                <input class="field" name="product-name" type="text">
            </div>

            <div id="parameter" class="p-price">
                <p>Prouct Price</p>
                <input class="field" name="product-price" type="number">
            </div>

            <div id="parameter" class="pno">
                <p>Number</p>
                <input class="field" name="number" type="number">
            </div>

            <div id="parameter" class="desc">
                <p>Description</p>
                <textarea class="field" name="description"></textarea>
            </div>

            <div class="upload">
                <input id="file" name="imgFile" type="file">
                <button class="upload-btn">Upload</button>
            </div>

            <div class="button">
                <button onclick="addProduct();return false">Add product</button>
            </div>

</form>
    </div>
    </div>

    <!-- Shop Header -->
    <div class="shop-header">
        <h5><?php echo $shop_name ?></h5>
        <div class="shop-header-links">
            <ul>
                <div></div>
                <li><a id="add-link-mobile" href="#"><button class="add-product">ADD</button></a></li>
            </ul>
            <a id="add-link" href="#"><button class="add-product">ADD</button></a>
        </div>
    </div>

    <!-- Tabs -->
    <div class="tabs-container">
        <div class="tabs">
        <div class="products-tab"><div><img src="../icons/categorize-blue.png" alt=""> <span>Products</span></div></div>
        <div class="orders-tab"><div><img src="../icons/order-grey.png" alt=""> <span>Orders</span></div></div>
    </div>
    <div id="slider"></div>
</div>

    <!-- Product Card-->
    <div class="tab-content">

    <!--For products -->
    <div class="products-section">
    
    <!-- Product card for web -->
    <!--
    <div class="product-card">
            <div class="image-preview">
                <div class="product-header">Product</div>
                <div id="product-image" class="content"><img src="../items/default.png" alt=""></div>
            </div>

            <div class="right-details">

            <div class="right-horizontal">
            <div class="price">
                <div class="header">Price</div>
                <div class="content">
                    GH¢0.00
                </div>
            </div>
            <div class="pieces-left">
                <div class="header">Pieces Left</div>
                <div class="content">3</div>
            </div>
            <div class="clicks">
                <div class="header">Clicks</div>
                <div class="content">0</div>
            </div>
            <div class="views">
                <div class="header">Views</div>
                <div class="content">0</div>
            </div>
            <div class="impressions">
                <div class="header">Impressions</div>
                <div class="content">0</div>
            </div>
            <div class="orders">
                <div id= "orders-header-div" class="header">Orders</div>
                <span>Active</span>
                <div id= "order-content" class="content">0</div>
            </div>
            
        </div>

        <div class="horizontal-line-divider"></div>

            <div class="button-container">
                <button class="edit">Edit</button>
                <button class="delete">Delete</button>
                <button class="pause">Pause</button>
                <button class="preview">Preview</button>
                <button class="share">Share</button>
            </div>
    </div>
    </div>

    
-->
</div> 

    <!-- For Orders -->
    <div class="orders-content">
fsdfasfasdfsafdfsafdfasdf
        <div class="order-card">
            <div class="order-card-header">
                <p class="status">NEW ORDER!!</p>
                <p class="order-date">23/01/2021 5:30 PM</p>
            </div>

            <div class="order-contents">
                <div class="buyer-info">
                    <div class="buyer-info-header"><div id="buyer-info-lottie"></div><p class="title">BUYER INFO</p></div>
                    <p>Name: Theophilus Addo</p>
                    <p>Contact: 0269307266</p>
                    <p>XXXX: XXXXXXXXXXXXX</p>
                </div>
                <div class="order-line-divider"></div>
                <div class="order-details">
                    <div class="order-details-header"><div id="order-details-lottie"></div><p class="title">ORDER DETAILS</p></div>
                    <p>Product: Iphone 7+</p>
                    <p>Quantity: 1</p>
                    <p>Cost: <span class="price-span">GH¢450.00</span></p>
                </div>
                <div class="order-line-divider"></div>
                <div class="location">
                    <div class="location-header"><div id="location-lottie"></div><p class="title">LOCATION</p></div>
                    <p>School: University of Ghana</p>
                    <p>Hall: Mensah Sarbah Hall</p>
                    <p>Room No: C60</p>
                </div>
            </div>

            <div class="check-box-div">
                <div class="time-section"><div id="clock-lottie"></div><p>Time Left: Countdown</p></div>
                <button class="complete">Complete</button>
            </div>

        </div>

        <!--For mobile-->
        <div class="order-card-mobile">
            <div class="order-card-mobile-header">
                <div class="status-div">
                    <div id="buyer-info-lottie-mobile" class="buyer-details-lottie-mobile"></div>
                    <p>NEW ORDER!!</p>
                </div>
                <p>12/01/2021 5:30PM</p>
            </div>
            <div class="order-card-mobile-content">
                <div class="details-header-mobile">
                    <div class="order-details-header-container"><div id="order-details-lottie-mobile"></div><p class="order-details-header-mobile">ORDER DETAILS</p></div>
                    <div class="location-header-container"><div id="location-lottie-mobile"></div><p class="location-header-mobile">LOCATION</p></div>
                </div>
                <div class="order-card-mobile-upper-div">
                    <div class="order-details-mobile">
                        <p>Product: Iphone 7+ </p>
                        <p>Quantity: 1</p>
                        <p>Price: <span class="price-span">GH¢0.00</span></p>
                    </div>
                    <div class="order-mobile-line-break"></div>
                    <div class="location-mobile">
                        <p>School: UG</p>
                        <p>Hall: MSH</p>
                        <p>Room C60, Floor 1</p>
                    </div>
                </div>
                <hr class="hr">
                <div class="order-card-mobile-lower-div">
                    <div class="buyer-details-mobile">
                        <p>Name: Theophilus Addo</p>
                        <p>Contact: 0269545825</p>
                        <p>xxxx: xxxxxx</p>
                    </div>
                    <div class="timer">
                        <div id="clock-lottie-mobile"></div>
                        <div class="countdown-mobile">Countdown</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="../js/lottie.js"></script>
<script src="../js/dashboard.js"></script>
<script src="../js/dashboard2.js"></script>
</body>
</html>