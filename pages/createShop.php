<?php
session_start();

if(!isset($_SESSION["username"])) {
    header("location: ../refer.php");
} else {
    $email = $_SESSION['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shop</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/createShop.css">
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
                    <div id="user-lottie"></div>
                    <li><a href="../pages/signIn.html">Sign In</a></li>
                    <div class="divider"></div>
                    <li><a href="../pages/register.html">Register</a></li>
                </ul>
            </div>
            
            <div class="sell-button-div">
                <Button class="sell-button"><div><img id="money-icon" src="../icons/money.png"></img><span>Sell</span> </div></Button>
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

        <input type="hidden" id="email" value="<?php echo $email ?>">
        <!--Main-->
        <div class="main">
            <div class="userbox">
                <p class="heading">Let's create a shop for you</p>

                <div class="shopName">
                    <p id="parameter">Enter your shop Name</p>
                    <input class="field" id="shop_name" type="text">
                </div>

                <div class="momo">
                    <p id="parameter">Phone Number to receive payment</p>
                    <input class="field" id="momo" type="text">
                </div>
                
                <div class="create-btn">
                    <button onclick="createShop()">Create Shop</button>
                </div>

            </div>
        </div>
        
</body>
</html>