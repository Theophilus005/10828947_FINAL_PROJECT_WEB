<?php
session_start();
require_once "php/databaseConnection.php";

if(isset($_SESSION["username"])) {
    $user = true;
    $email = $_SESSION["email"];
    $username = $_SESSION["username"];

} else {
    $email = '';
    $user = false;
    $username = '';
}


if(isset($_GET["product_id"])) {
    $id = $_GET["product_id"];

    //Fetch Selected Product details
    $getDetails = "SELECT * FROM products WHERE product_id = '$id'";
    $getDetails_result = $conn->query($getDetails);
    if($getDetails_result->num_rows > 0) {
        while($productDetails = $getDetails_result->fetch_assoc()) {
            $p_name = $productDetails["product_name"];
            $p_price = number_format((float)$productDetails["product_price"], 2, ".", ",");
            $p_description = $productDetails["description"];
            $image = $productDetails["img_link"];
            $number = $productDetails["number"];
            $seller_email = $productDetails["email"];
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/details.css">
    <script src="../js/order.js"></script>
    <script src="../js/sell.js"></script>
</head>
<body>


      <!-- Navigation Bar -->
      <div class="mobile-wrapper1">
        <div id="nav-bar">
        <div class="logo" style="display:flex; justify-content:center; align-items:center; font-size:20px; color:#f53607; font-weight: bold; width:120px;">
            PROJECT 3
        </div>
    
            <div class="search-bar">           
                <input id="search-field" type="text" placeholder="Search here....">
                <button class="search-button"><img src="../icons/search.png" alt=""></button>
            </div>
    
            <div class="navlinks">
                <ul>
                <?php
                if(!$user) {echo ' 
                <div id="user-lottie"></div>
                <li><a href="../pages/signIn.html">Sign In</a></li>
                <div class="divider"></div>
                <li><a href="../pages/register.html">Register</a></li>';
                } else {
                    echo '<li><a href="../pages/php/logOut.php">LogOut</a></li>';
                }
                ?>
                </ul>
            </div>
            
            <div class="sell-button-div">
                <Button onclick="moveToDashboard2(<?php echo $user ?>)" class="sell-button"><div><img id="money-icon" src="../icons/money.png"></img><span>Sell</span> </div></Button>
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

        <input type="hidden" id="product" value="<?php echo $p_name ?> ">
        <input type="hidden" id="price" value="<?php echo $p_price ?> ">
        <input type="hidden" id="buyername" value="<?php echo $username ?> ">
        <input type="hidden" id="selleremail" value="<?php echo $seller_email ?> ">

        <!-- Order Form -->
        <div class="order-pop-up">
            <div class="inner-order">
                <p class="head">Choose a location for delivery</p>
                <div class="location">
                <p class="parameter">LOCATION</p>
                <input id="destination" class="field" type="text">
                </div>
                
                <div class="contact">
                <p class="parameter">PHONE NUMBER</p>
                <input id="tel" class="field" type="text">
                </div>

                <div class="order2-div">
                    <button onclick="makeOrder('<?php echo $username ?>')">ORDER NOW</button>
                </div>
            </div>
        </div>
    
        <!--Details-->
        <div class="details-main">
            <div class="left">
                <div class="preview-div">
                    <img src="<?php echo $image ?>" alt="">
                </div>
            </div>

            <div class="right">
                <p class="pname"><?php echo $p_name ?> </p>
                <p class="category">Category</p>

                <div class="stars">
                    <img class="star" src="../icons/star-empty.png" alt="">
                    <img class="star" src="../icons/star-empty.png" alt="">
                    <img class="star" src="../icons/star-empty.png" alt="">
                    <img class="star" src="../icons/star-empty.png" alt="">
                    <img class="star" src="../icons/star-empty.png" alt="">
                </div>

                <p class="price3">GH¢<?php echo $p_price ?></p>

                <p class="description">PRODUCT DESCRIPTION</p>
                <div class="description-div">
                <p class="description-text"> <?php echo $p_description ?> </p>
                </div>

                <!--Counter-->
                <div class="maincounter">
                    <div onclick="minus()" class="minus">-</div>
                    <div class="num"><p class="total"> 1 </p></div>
                    <div onclick="plus()" class="plus">+</div>
                </div>

                <!--Buttons-->
                <div class="buttons">
                    <button onclick="showOrderForm()" class="order-btn">Order</button>
                </div>
            </div>
        </div>
</body>
</html>